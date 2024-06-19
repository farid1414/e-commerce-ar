<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
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
            $transaction = Transaction::where('status', true)->get();
            return view('admin.dashboard', [
                'userCount' => $userCount
            ]);
        }
        return redirect()->route('index');
    }
}
