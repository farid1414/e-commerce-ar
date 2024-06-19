<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Master\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Master\Product;
use Illuminate\Support\Carbon;
use App\Models\Master\FlashSale;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Master\ProductFlashSale;

class MainController extends Controller
{
    public function index()
    {
        $currentDateTime = Carbon::now();
        $product = Product::select('*')->where('is_active', true);
        $flashsale = FlashSale::where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->with('productFlashSale')->first();

        return view('user.dashboarduser', [
            'flash_sale' => $flashsale,
            'newProducts' => $product->orderBy('created_at', 'desc')->get()->take(4)
        ]);
    }

    public function detailProduct(string $uuid)
    {
        $product = Product::firstWhere('uuid', $uuid);

        return view('user.detailproduk', [
            'product' => $product
        ]);
    }

    public function getDetailProduct(string $uuid)
    {

        $product = Product::where('uuid', $uuid)->with('varians')->first();
        if (!$product) return ERROR_RESPONSE("Product not found");

        return JSON_RESPONSE("Detail product", $product);
    }

    public function addToCart(Request $request)
    {
        $data = [
            'product_id' => $request->product_id,
            'product_varian_id' => $request->varian,
            'user_id' => Auth::user()->id,
            'qty' => $request->quantity,
            'harga' => $request->harga,
            'sub_total' => $request->harga * $request->quantity,
            'ongkir' => str_replace(['Rp', '.', ' '], '', $request->ongkir),
            'diskon' => $request->diskon ?? null,
            'status' => true
        ];
        $flashsale = ProductFlashSale::where('product_id', $request->product_id)->where('product_varian_id', $request->varian);


        if ($flashsale->first() && $flashsale->first()->count()) $data['flash_sale_id'] = $flashsale->first()->flash_sale_id;
        try {
            DB::beginTransaction();
            Cart::create($data);
            DB::commit();
            return JSON_RESPONSE("Success.\nAdd to cart ", null, [
                'url' => route('index'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function keranjang()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->where('status', true)->get();

        return view('user.keranjang', [
            'carts' => $carts
        ]);
    }
    public function deleteCart(int $id)
    {
        $cart = Cart::findOrFail($id);
        if (!$cart) return ERROR_RESPONSE("Cart product not found");

        try {
            DB::beginTransaction();
            $cart->delete();
            DB::commit();
            return JSON_RESPONSE("Success delete cart");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed delete cart ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function postCheckout(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $cart = Cart::whereIn('id', $data['id']);

        try {
            DB::beginTransaction();
            $cart->update(['status' => false]);
            DB::commit();
            return JSON_RESPONSE("Success.\nCheckout product", null, [
                'url' => route('checkout'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function checkout()
    {
        $cart = Cart::where('status', false)->where('user_id', Auth::user()->id)->get();
        $order_amount = 0;
        $order =  $cart->each(function ($item) use (&$order_amount) {
            $order_amount += ($item->sub_total - $item->diskon) + $item->ongkir;
        });
        $code = "AR-F/ORD-" . now()->toDateString() . "-" . (Transaction::withTrashed()->count() + 1);
        try {
            DB::beginTransaction();
            $transaction = Transaction::create([
                'code' => $code,
                'status' => 0,
                'order_amount' => $order_amount,
                'user_id' => Auth::user()->id
            ]);

            foreach ($cart as $key => $cart) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $cart->product_id,
                    'product_varian_id' => $cart->product_varian_id,
                    'flash_sale_id' => $cart->flash_sale_id ?? null,
                    'quantity' => $cart->qty,
                    'harga' => $cart->harga,
                    'total' => $cart->sub_total,
                    'diskon' => $cart->diskon ?? 0,
                    'ongkir' => $cart->ongkir ?? 0
                ]);
            }

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $order_amount,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email
                )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->snap_token = $snapToken;
            $transaction->save();

            DB::commit();
            $carts = Cart::where('status', false)->where('user_id', Auth::user()->id)->get();
            return view('user.checkout', [
                'carts' => $carts,
                'transaction' => $transaction
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            // return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
            return redirect()->back();
        }
    }

    public function transaction(Request $request)
    {
        $code = "AR-F/ORD-" . now()->toDateString() . "-" . (Transaction::withTrashed()->count() + 1);
        try {
            DB::beginTransaction();
            $transaction = Transaction::create([
                'code' => $code,
                'order_amount' => $request->order_amount,
                'user_id' => Auth::user()->id
            ]);

            foreach ($request->product_id as $key => $prod) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $prod,
                    'product_varian_id' => $request->varian_id[$key],
                    'flash_sale_id' => $request->flash_sale_id[$key] ?? null,
                    'quantity' => $request->qty[$key],
                    'harga' => $request->harga[$key],
                    'total' => $request->total[$key],
                    'diskon' => $request->diskon[$key],
                    'ongkir' => $request->ongkir[$key]
                ]);
            }

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $request->order_amount,
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email
                )
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->snap_token = $snapToken;
            $transaction->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function transactionSuccess(int $id)
    {
        $tr = Transaction::findOrFail($id);
        $tr->update(['status' => true, 'payment_at' => now()->toDateString()]);
        $product = $tr->transactionDetail->pluck('product_id');
        $varian = $tr->transactionDetail->pluck('product_varian_id');
        $carts = Cart::where('user_id', Auth::user()->id)->whereIn('product_id', $product)->whereIn('product_varian_id', $varian)->update(['status' => -1]);

        return view('user.pembayaranberhasil');
    }
    public function transactionFail(int $id)
    {
        $tr = Transaction::findOrFail($id);
        $tr->update(['status' => -1]);

        return view('user.pembayarangagal');
    }
    public function profil()
    {

        $transaction = Transaction::where('user_id', Auth::user()->id)->get();

        return view('user.akunpelanggan', [
            'transaction' => $transaction
        ]);
    }
    public function editProfil()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('User.editProfil', [
            'user' => $user
        ]);
    }
}
