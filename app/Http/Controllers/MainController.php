<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\Customer;
use Barryvdh\DomPDF\PDF;
use App\Models\ImageRating;
use App\Models\Master\Cart;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\TransactionEmail;
use App\Models\Master\Product;
use Illuminate\Support\Carbon;
use App\Models\Master\Category;
use App\Models\Master\FlashSale;
use App\Models\Master\MCategory;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Master\ProductFlashSale;

class MainController extends Controller
{
    public function index()
    {
        $currentDateTime = Carbon::now();
        $product = Product::select('*')->where('is_active', '=', 1)->where('stock', '>', 0);
        $flashsale = FlashSale::where('shutdown', '=', 0)->where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->with('productFlashSale')->first();
        $ratings = Rating::orderBy('created_at', 'asc')->get();
        $categories = Category::where('is_active', 1)->get();
        return view('user.dashboarduser', [
            'flash_sale' => $flashsale,
            'newProducts' => $product->orderBy('created_at', 'desc')->get()->take(4),
            'ratings' => $ratings,
            'categories' => $categories
        ]);
    }

    public function category()
    {
        return view('user.kategori');
    }

    public function detailProduct(string $uuid)
    {
        $product = Product::firstWhere('uuid', $uuid);
        $ratings = Rating::where('product_id', $product->id)->with('balasan')->orderBy('created_at', 'asc')->paginate(10);

        // return view('user.detailproduk', [
        //     'product' => $product,
        //     'rating' => $rating
        // ]);
        return view('User.detailproduk', compact('product', 'ratings'));
    }

    public function getDetailProduct(string $uuid)
    {
        $currentDateTime = Carbon::now();
        $product = Product::where('uuid', $uuid)->with(['varians', 'flashSale'])->first();
        $fs = FlashSale::where('shutdown', '=', 0)->where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->with('productFlashSale')->first();
        if (!$product) return ERROR_RESPONSE("Product not found");

        $data = [
            'product' => $product,
            'fs' => $fs
        ];
        return JSON_RESPONSE("Detail product", $data);
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

        $currentDateTime = Carbon::now();
        $productFlashSale = null;
        $fs = FlashSale::where('shutdown', '=', 0)->where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->with('productFlashSale')->get();

        if ($fs->count()) {
            foreach ($fs as $key => $f) {
                $prodFs = $f->productFlashSale->where('product_id', $request->product_id)->where('product_varian_id', $request->varian)->first();
                if ($prodFs) {
                    if ($prodFs->custom_stock && $request->quantity > $prodFs->custom_stock) {
                        return ERROR_RESPONSE("Stok tidak ada");
                    }
                    ($prodFs);
                    $productFlashSale = $prodFs->flash_sale_id;
                }
            }
        }
        if ($productFlashSale) {
            $data['flash_sale_id'] = $productFlashSale;
        }
        // if ($flashsale->latest()->first() && $flashsale->latest()->first()->count()) $data['flash_sale_id'] = $flashsale->latest()->first()->flash_sale_id;
        // dd($request->all(), $flashsale->latest()->first());
        try {
            DB::beginTransaction();
            Cart::create($data);
            DB::commit();
            return JSON_RESPONSE("Success.\nAdd to cart ", null, [
                'url' => route('keranjang'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateCart(Request $request)
    {
        $id = $request->id;
        $type = $request->type;
        $cart = Cart::findOrFail($id);

        $qty = $cart->qty;
        if ($type == 'add') {
            $qty += 1;
        } else {
            $qty -= 1;
        }
        try {
            DB::beginTransaction();
            $cart->update(['qty' => $qty]);
            DB::commit();
            return JSON_RESPONSE("Update quantity");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed to update category {$request->name} ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function masterCategory(string $slug)
    {
        // $cat = MCategory::firstWhere('slug', $slug);
        $cat = Category::where('m_categories', $slug)->where('is_active', true)->get();
        return view('user.kategoridataran', [
            'cat' => $cat
        ]);
    }

    public function prodCat(int $id)
    {
        $cat = Category::findOrFail($id);
        $rat = Rating::get();

        return view('User.listproduk', [
            'category' => $cat,
            'ratings' => $rat
        ]);
    }

    public function pencarian(Request $request)
    {
        $req = $request->input('search');
        // $product = Product::where('name', 'like', '%' . $req . '%')->get();
        $product = DB::table('products')
            ->join('categories', 'products.categori_id', '=', 'categories.id')
            ->where('products.is_active', '=', true)
            ->where('products.name', 'like', '%' . $req . '%')
            ->orWhere('categories.name', 'like', '%' . $req . '%')
            ->orWhere('products.sub_name', 'like', '%' . $req . '%')
            ->select('products.*')
            ->get();
        return view('User.hasilpencarian', [
            'req' => $req,
            'product' => $product
        ]);
    }

    public function searchProd(Request $request)
    {
        $req = $request->input('search');
        if ($req) {
            $product = Product::query()
                ->where('products.is_active', '=', true)
                ->where('products.stock', '>', 0)
                ->join('categories', 'products.categori_id', '=', 'categories.id')
                ->where('products.name', 'like', '%' . $req . '%')
                ->orWhere('categories.name', 'like', '%' . $req . '%')
                ->orWhere('products.sub_name', 'like', '%' . $req . '%')
                ->select('products.*')
                ->get();

            $product = collect($product)->map(function ($pr) {
                $pr->thumbnail = url($pr->thumbnail);
                $pr->description = nl2br($pr->description);
                $pr->harga = 'Rp ' . number_format($pr->harga, 0, ',', '.');
                $pr->quantity = $pr->transactionDetail->sum('quantity');
                $pr->countVarian = $pr->varians->count();
                return $pr;
            });
        } else {
            $product = collect(); // Mengembalikan koleksi kosong jika $req null atau kosong
        }
        return JSON_RESPONSE("Success delete cart", $product);
    }

    public function product(Request $request)
    {
        $req = $request->input('data');
        $prod = Product::query()->where('is_active', '=', true)->where('stock', '>', 0);
        if ($req == 'terbaru') {
            $prod =  $prod->orderBy('created_at');
        } else if ($req == 'harga_tertinggi') {
            $prod = $prod->orderBy('harga');
        }

        $prod =  $prod->get();
        $ratings = Rating::get();
        return view('User.produkall', [
            'prod' => $prod,
            'ratings' => $ratings
        ]);
    }

    public function orderProd(Request $request)
    {
        $search = $req = $request->input('search');
        $req = $request->input('data');
        $cat = $request->input('category');
        $prod = Product::select('products.*')->where('is_active', '=', true)->where('stock', '>', 0);
        // $prod = DB::table('products');
        if ($search) {
            $prod = $prod->join('categories', 'products.categori_id', '=', 'categories.id')
                ->where('products.name', 'like', '%' . $search . '%')
                ->orWhere('categories.name', 'like', '%' . $search . '%')
                ->orWhere('products.sub_name', 'like', '%' . $search . '%');
        }
        if ($req == 'terbaru') {
            $prod = $prod->orderBy('created_at');
        } else if ($req == 'harga_tertinggi') {
            $prod = $prod->orderBy('harga', 'DESC');
        } else if ($req == 'harga_rendah') {
            $prod = $prod->orderBy('harga', "ASC");
        } else if ($req == 'az') {
            $prod = $prod->orderBy('name', "ASC");
        } else if ($req == 'za') {
            $prod = $prod->orderBy('name', 'DESC');
        } else if ($req == 'gratis_ongkir') {
            $prod = $prod->orderBy('harga_ongkir', 'DESC');
        }

        if ($cat) {
            $prod = $prod->where('categori_id', $cat);
        }

        $prod = $prod->with('ratings')->get();
        $prod = $prod->map(function ($pr) {
            $pr->thumbnail = url($pr->thumbnail);
            $pr->description = nl2br($pr->description);
            $pr->harga = 'Rp ' . number_format($pr->harga, 0, ',', '.');
            $pr->quantity = $pr->transactionDetail->sum('quantity');
            $pr->countVarian = $pr->varians->count();
            $pr->rate = $pr->ratings->count() ?  $pr->ratings->sum('rating_value') / $pr->ratings->count() : 0;
            $pr->countRate = $pr->ratings->count();
            return $pr;
        });

        return JSON_RESPONSE("Success delete cart", $prod);
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
        $cart = Cart::whereIn('id', $data['id'])->get();

        $order_amount = 0;
        $order =  $cart->each(function ($item) use (&$order_amount) {
            $order_amount += (($item->harga - $item->diskon) * $item->qty)  + $item->ongkir;
        });
        $code = "AR-F/ORD-" . now()->toDateString() . "-" . (Transaction::withTrashed()->count() + 1);

        try {
            DB::beginTransaction();
            $cart->each->update(['status' => false]);
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

            DB::commit();
            return JSON_RESPONSE("Success.\nCheckout product", null, [
                'url' => route('checkout', $transaction->id),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function checkout(int $transaction_id = null)
    {
        // $cart = Cart::where('status', false)->where('user_id', Auth::user()->id)->get();
        // $order_amount = 0;
        // $order =  $cart->each(function ($item) use (&$order_amount) {
        //     $order_amount += ($item->sub_total - $item->diskon) + $item->ongkir;
        // });
        // $code = "AR-F/ORD-" . now()->toDateString() . "-" . (Transaction::withTrashed()->count() + 1);
        $transaction = Transaction::findOrFail($transaction_id);
        try {
            DB::beginTransaction();
            // $transaction = Transaction::create([
            //     'code' => $code,
            //     'status' => 0,
            //     'order_amount' => $order_amount,
            //     'user_id' => Auth::user()->id
            // ]);

            // foreach ($cart as $key => $cart) {
            //     TransactionDetail::create([
            //         'transaction_id' => $transaction->id,
            //         'product_id' => $cart->product_id,
            //         'product_varian_id' => $cart->product_varian_id,
            //         'flash_sale_id' => $cart->flash_sale_id ?? null,
            //         'quantity' => $cart->qty,
            //         'harga' => $cart->harga,
            //         'total' => $cart->sub_total,
            //         'diskon' => $cart->diskon ?? 0,
            //         'ongkir' => $cart->ongkir ?? 0
            //     ]);
            // }

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
                    'gross_amount' => $transaction->order_amount,
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

    public function transactionSuccess(int $id, string $type = '')
    {
        $tr = Transaction::findOrFail($id);
        $tr->update(['status' => true, 'payment_at' => now()->toDateString(), 'payment_type' => $type]);
        $tr = Transaction::findOrFail($id);
        $product = $tr->transactionDetail->pluck('product_id');
        $varian = $tr->transactionDetail->pluck('product_varian_id');

        $currentDateTime = Carbon::now();
        $productFlashSale = null;
        $fs = FlashSale::where('shutdown', '=', 0)->where(function ($query) use ($currentDateTime) {
            $query->where('start_time', '<=', $currentDateTime)
                ->where('end_time', '>=', $currentDateTime);
        })->with('productFlashSale')->get();

        foreach ($tr->transactionDetail as $det) {
            $prod = Product::findorFail($det->product_id);
            $qty = $prod->terjual ?? 0;
            $terjual = $qty + $det->quantity;
            $stock = $prod->stock;
            $st = $stock - $det->quantity;
            $prod->update(['terjual' => $terjual, 'stock' => $st]);
            if ($fs->count()) {
                foreach ($fs as $key => $f) {
                    $prodFs = $f->productFlashSale->where('product_id', $det->product_id)->where('product_varian_id', $det->product_varian_id)->first();
                    if ($prodFs) {
                        $qty = $prodFs->custom_stock;
                        $qty -= $det->quantity;
                        $prodFs->update(['custom_stock' => $qty]);
                    }
                }
            }
        }

        $carts = Cart::where('user_id', Auth::user()->id)->whereIn('product_id', $product)->whereIn('product_varian_id', $varian)->delete();

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

        $transaction = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
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

    public function detailTransaction(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        $reason = Transaction::REASON;
        $rating = Rating::get();

        return view('user.detailtransaksi', [
            'transaction' => $transaction,
            'reason' => $reason,
            'rating' => $rating
        ]);
    }

    public function storeRating(Request $request)
    {
        $data = [
            'transaction_id' => $request->transaction_id,
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'rating_value' => intval($request->rate),
            'text_value' => $request->text,
            'varian_id' => $request->varian_id,
            'is_samaran' => $request->samaran ? 1 : 0
        ];

        try {
            DB::beginTransaction();
            $rating = Rating::create($data);
            if (isset($request->image)) {
                foreach ($request->image as $img) {
                    $file = $img;
                    $filename = Str::random(3) . time() . '.' . $file->getClientOriginalExtension();
                    $folder = 'storage/product/rating/';
                    $file->move(public_path($folder), $filename);
                    $url = $folder . $filename;
                    ImageRating::create(['image' => $url, 'rating_id' => $rating->id]);
                }
            }
            DB::commit();
            return JSON_RESPONSE("Success create rating produk");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateProfil(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $customer = Customer::where('user_id', Auth::user()->id)->first();

        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        try {
            DB::beginTransaction();
            $user->update($data);
            $customer->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address ?? null
            ]);
            DB::commit();
            return JSON_RESPONSE("Success, \n Update profil");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function invoicePelanggan(int $id)
    {
        $tr = Transaction::findOrFail($id);
        return view('user.invoicepelanggan', [
            'tr' => $tr
        ]);
    }

    public function sendEmail(int $id)
    {
        $tr = Transaction::findOrFail($id);

        Mail::to(Auth::user()->email)->send(new TransactionEmail($tr));

        return redirect()->back();
    }

    public function batalkanPesanan(Request $request)
    {
        $tr = Transaction::findOrFail($request->transaction_id);
        try {
            DB::beginTransaction();
            $tr->update(['status' => -1, 'reason' => $request->reason]);
            DB::commit();
            return JSON_RESPONSE("Succes batalkan pesanan");
        } catch (\Throwable $th) {
            DB::rollBack();
            return ERROR_RESPONSE("Failed checkout ", $th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
