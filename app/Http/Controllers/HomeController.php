<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Master\Product;
use Illuminate\Support\Carbon;
use App\Models\Master\Category;
use App\Models\Master\FlashSale;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->hasRole('admin')) {
            $user = User::get();
            $userCount = 0;
            foreach ($user as $u) {
                if (!$u->hasRole('admin')) $userCount++;
            }
            $transaction = Transaction::where('status', 0)->get();
            $transactionSuccess = Transaction::where('status', 1)->get();
            $produk = Product::get();
            $categori = Category::get();

            $currentDateTime = Carbon::now();

            $activeFlashSales = FlashSale::where(function ($query) use ($currentDateTime) {
                $query->where('start_time', '<=', $currentDateTime)
                    ->where('end_time', '>=', $currentDateTime);
            })->with('productFlashSale')->get();

            return view('admin.dashboard', [
                'userCount' => $userCount,
                'transactionPending' => $transaction,
                'produk' => $produk,
                'categori' => $categori,
                'transactionSuccess' => $transactionSuccess,
                'activeFlashSales' => $activeFlashSales
            ]);
        }
        return redirect()->route('index');
    }
}
