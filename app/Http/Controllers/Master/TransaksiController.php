<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function success()
    {
        $transactions = Transaction::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('Admin.transaksisudahdibayar', [
            'transactions' => $transactions,
            'status' => 'Sudah dibayar'
        ]);
    }

    public function pending()
    {
        $transaction = Transaction::where('status', 0)->orderBy('created_at', 'DESC')->get();
        return view('Admin.transaksisudahdibayar', [
            'transactions' => $transaction,
            'status' => 'Belum dibayar'
        ]);
    }

    public function failed()
    {
        $transaction = Transaction::where('status', -1)->orderBy('created_at', 'DESC')->get();
        return view('Admin.transaksisudahdibayar', [
            'transactions' => $transaction,
            'status' => 'Dibatalkan'
        ]);
    }

    public function detail(int $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('Admin.detailtransaksi', [
            'transaction' => $transaction
        ]);
    }

    public function detailInvoice(int $id)
    {
        $tr = Transaction::findOrFail($id);
        return view('admin.invoiceadmin', [
            'tr' => $tr
        ]);
    }
}
