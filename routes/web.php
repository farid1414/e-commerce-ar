<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\CategoryController;

// auth
Route::get('auth/login', function () {
    return view('auth.login');
});

Route::get('auth/registrasi', function () {
    return view('auth.registrasi');
});



// User
Route::get('/', function () {
    return view('welcome');
});

Route::get('user/dashboarduser', function () {
    return view('user.dashboarduser');
});


// Keranjang

Route::get('user/keranjang', function () {
    return view('user.keranjang');
});

Route::get('user/checkout', function () {
    return view('user.checkout');
});


// Detail Produk

Route::get('user/detailproduk', function () {
    return view('user.detailproduk');
});


// Kategori
Route::get('user/kategoridataran', function () {
    return view('user.kategoridataran');
});

Route::get('user/kategoridinding', function () {
    return view('user.kategoridinding');
});


// Profil Pelanggan

Route::get('user/akunpelanggan', function () {
    return view('user.akunpelanggan');
});


// detail transaksi

Route::get('user/detailtransaksi', function () {
    return view('user.detailtransaksi');
});


// status pembayaran
Route::get('user/pembayaranberhasil', function () {
    return view('user.pembayaranberhasil');
});

Route::get('user/pembayarangagal', function () {
    return view('user.pembayarangagal');
});



// Invoice PELANGGAN

Route::get('user/invoicepelanggan', function () {
    return view('user.invoicepelanggan');
});










// -----------------------------------------------------------------


// Admin

// dashboard admin
Route::get('admin/dashboardadmin', function () {
    return view('admin.dashboardadmin');
});


// Produk Dataran
Route::get('admin/produkdataran', function () {
    return view('admin.produkdataran');
});

Route::get('admin/tambahprodukdataran', function () {
    return view('admin.tambahprodukdataran');
});

// Produk dinding
Route::get('admin/produkdinding', function () {
    return view('admin.produkdinding');
});

Route::get('admin/tambahprodukdinding', function () {
    return view('admin.tambahprodukdinding');
});

// Detail produk
Route::get('admin/detailproduk', function () {
    return view('admin.detailproduk');
});


// Kategori Dataran
Route::get('admin/kategoridataran', function () {
    return view('admin.kategoridataran');
});

Route::get('admin/tambahkategoridataran', function () {
    return view('admin.tambahkategoridataran');
});

Route::get('admin/detailkategori', function () {
    return view('admin.detailkategori');
});


// Kategori Dinding
Route::get('admin/kategoridinding', function () {
    return view('admin.kategoridinding');
});

Route::get('admin/tambahkategoridinding', function () {
    return view('admin.tambahkategoridinding');
});



// Data Akun
Route::get('admin/dataakun', function () {
    return view('admin.dataakun');
});

Route::get('admin/tambahadmin', function () {
    return view('admin.tambahadmin');
});

Route::get('admin/detailakunadmin', function () {
    return view('admin.detailakunadmin');
});

Route::get('admin/profiladmin', function () {
    return view('admin.profiladmin');
});

Route::get('admin/detailakunpelanggan', function () {
    return view('admin.detailakunpelanggan');
});


// Rating dan ulasan
Route::get('admin/ratingdanulasan', function () {
    return view('admin.ratingdanulasan');
});


// Transaksi
Route::get('admin/transaksibelumdibayar', function () {
    return view('admin.transaksibelumdibayar');
});

Route::get('admin/transaksisudahdibayar', function () {
    return view('admin.transaksisudahdibayar');
});

Route::get('admin/transaksidibatalkan', function () {
    return view('admin.transaksidibatalkan');
});

Route::get('admin/transaksidibatalkan', function () {
    return view('admin.transaksidibatalkan');
});

Route::get('admin/detailtransaksi', function () {
    return view('admin.detailtransaksi');
});

Route::get('admin/invoiceadmin', function () {
    return view('admin.invoiceadmin');
});



// Laporan
Route::get('admin/laporanharian', function () {
    return view('admin.laporanharian');
});

Route::get('admin/laporanbulanan', function () {
    return view('admin.laporanbulanan');
});

Route::get('admin/laporantahunan', function () {
    return view('admin.laporantahunan');
});


// Program Flash sale
Route::get('admin/programflashsale', function () {
    return view('admin.programflashsale');
});

Route::get('admin/tambahflashsale', function () {
    return view('admin.tambahflashsale');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('master.')->prefix('/admin')->middleware('auth')->group(function () {
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/dataran', [CategoryController::class, 'indexDataran'])->name('index-dataran');
    });
});
