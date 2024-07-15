<?php

namespace App\Http\Controllers\Master;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class AkunController extends Controller
{
    //
    const ROUTE = 'master.akun.';

    public function __construct()
    {
        view()->share('this_helper', self::ROUTE);
    }

    public function index()
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        $nonAdmins = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return view('admin.dataakun', [
            'admins' => $admins,
            'nonAdmins' => $nonAdmins
        ]);
    }


    //     <button class="btn btn-link" style="text-decoration: none;">
    //     <a href="/Datadetailakunadmin">Lihat</a>
    // </button>
    // <br />
    // <button class="btn btn-link" style="text-decoration: none;">
    //     Non-Aktifkan
    // </button>
    // <br />
    // <button class="btn btn-link" style="text-decoration: none;">
    //     Hapus Akun
    // </button>
    public function dataAdmin()
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return DataTables::of($admins)
            ->addIndexColumn()
            ->addColumn('status', function ($query) {
                if ($query->status) {
                    return ' <span class="badge rounded-pill bg-success">Aktif</span>';
                } else {
                    return '<span class="badge rounded-pill text-bg-secondary">Non-Aktif</span>';
                }
            })
            ->addColumn('action', function ($query) {
                $html = '<a href="' . route(self::ROUTE . 'detail-admin', $query->id) . '"> Lihat </a> <br/> ';
                if ($query->status) {
                    $html .= '<a href="' . route(self::ROUTE . 'status-admin', $query->id) . '"> Non-Aktifkan </a>';
                } else {
                    $html .= '<a href="' . route(self::ROUTE . 'status-admin', $query->id) . '"> Aktifkan </a>';
                }

                $html .= '<form action="' . route(Self::ROUTE . 'delete-admin', $query->id) . '" method="POST">
                                       ' . method_field('delete') . csrf_field() . '
                                       <button type="submit" class="btn">
                                       Hapus
                                    </button>';


                return $html;
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_date();
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function detailAdmin(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.detailakunadmin', [
            'user' => $user
        ]);
    }

    public function tambahAdmin()
    {
        return view('admin.tambahadmin');
    }

    public function storeAdmin(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user->assignRole('admin');
        DB::commit();

        return redirect()->route(self::ROUTE . 'index');
    }

    public function statusAdmin(int $id)
    {
        $user = User::findOrFail($id);

        $active = true;

        if ($user->status) $active = false;
        DB::beginTransaction();
        $user->status = $active;
        $user->save();
        DB::commit();
        return redirect()->back();
    }

    public function deleteAdmin(int $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->back();
    }

    public function dataPelanggan()
    {
        $nonAdmins = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->get();

        return DataTables::of($nonAdmins)
            ->addIndexColumn()
            ->addColumn('action', function ($query) {
                $html = '<a href="' . route(self::ROUTE . 'detail-pelanggan', $query->id) . '"> Lihat </a> <br/> ';

                $html .= '<form action="' . route(Self::ROUTE . 'delete-pelanggan', $query->id) . '" method="POST">
                                   ' . method_field('delete') . csrf_field() . '
                                   <button type="submit" class="btn">
                                   Hapus
                                </button>';


                return $html;
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_date();
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function detailPelanggan(int $id)
    {
        $user = User::findOrFail($id);
        $transaction = Transaction::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $productdibeli = 0;

        $detail = TransactionDetail::whereIn('transaction_id', $transaction->pluck('id'))->get();

        return view('admin.detailakunpelanggan', [
            'user' => $user,
            'transaction' => $transaction,
            'countProd' => $detail ? $detail->count() : 0,
            'detail' => $detail
        ]);
    }
}
