<?php

namespace App\Http\Controllers\Master;

use App\Models\Rating;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Master\Product;
use App\Models\Master\Category;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailLaporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LaporanController extends Controller
{
    const ROUTE = 'master.laporan.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function index(Request $request)
    {
        $transaction = null;
        $countProd = null;
        $rating = null;
        $productCat = null;
        $cat = null;
        if ($request->input('start_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date') ? $request->input('end_date') : Date('Y-m-d');
            $transaction = Transaction::whereBetween('payment_at', [$start_date, $end_date])->get();

            $countProd = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))
                ->select('product_id', DB::raw('count(*) as total'))
                ->groupBy('product_id')
                ->get();

            $productCat = Product::whereIn('id', $countProd->pluck('product_id'))->where('terjual', '>=', 5)->get();
            $cat = Category::whereIn('id', $productCat->pluck('categori_id'))->get();
            $rating = Rating::whereIn('transaction_id', $transaction->pluck('id'))->with('balasan')->get();
        }
        $product = Product::where('is_active', true)->get();
        $categori = Category::where('is_active', true)->get();

        return view('admin.laporanharian', [
            'transaction' => $transaction ?? null,
            'start_date' => $start_date ?? null,
            'end_date' => $end_date ?? null,
            'pelanggan' => $transaction ? $transaction->groupBy('user_id')->count() : 0,
            'countProd' => $countProd ? $countProd->sum('total') : 0,
            'rating' => $rating ?? 0,
            'product' => $product,
            'categori' => $categori,
            'productCat' => $productCat,
            'cat' => $cat
        ]);
    }

    public function sendEmail(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date') ? $request->input('end_date') : Date('Y-m-d');
        $transaction = Transaction::whereBetween('payment_at', [$start_date, $end_date])->get();

        $countProd = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))
            ->select('product_id', DB::raw('count(*) as total'))
            ->groupBy('product_id')
            ->get();

        $productCat = Product::whereIn('id', $countProd->pluck('product_id'))->where('terjual', '>=', 5)->get();
        $cat = Category::whereIn('id', $productCat->pluck('categori_id'))->get();
        $rating = Rating::whereIn('transaction_id', $transaction->pluck('id'))->with('balasan')->get();

        $data = [
            'transaction' => $transaction ?? null,
            'start_date' => $start_date ?? null,
            'end_date' => $end_date ?? null,
            'pelanggan' => $transaction ? $transaction->groupBy('user_id')->count() : 0,
            'countProd' => $countProd ? $countProd->sum('total') : 0,
            'rating' => $rating ?? 0,
            'productCat' => $productCat,
            'cat' => $cat
        ];

        Mail::to(Auth::user()->email)->send(new SendEmailLaporan($data));

        return redirect()->back();
        dd($request->all(), $transaction);
    }
}
