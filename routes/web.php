<?php

use Illuminate\Support\Facades\Route;

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
    Return view ('user.dashboarduser');
});


// Keranjang

Route::get('user/keranjang', function () {
    Return view ('user.keranjang');
});

Route::get('user/checkout', function () {
    Return view ('user.checkout');
});


// Detail Produk

Route::get('user/detailproduk', function () {
    Return view ('user.detailproduk');
});


// Kategori
Route::get('user/kategoridataran', function () {
    Return view ('user.kategoridataran');
});

Route::get('user/kategoridinding', function () {
    Return view ('user.kategoridinding');
});


// Profil Pelanggan

Route::get('user/akunpelanggan', function () {
    Return view ('user.akunpelanggan');
});


// detail transaksi 

Route::get('user/detailtransaksi', function () {
    Return view ('user.detailtransaksi');
});


// status pembayaran
Route::get('user/pembayaranberhasil', function () {
    Return view ('user.pembayaranberhasil');
});

Route::get('user/pembayarangagal', function () {
    Return view ('user.pembayarangagal');
});



// Invoice PELANGGAN

Route::get('user/invoicepelanggan', function () {
    Return view ('user.invoicepelanggan');
});










// -----------------------------------------------------------------


// Admin

// dashboard admin
Route::get('admin/dashboardadmin', function () {
    Return view ('admin.dashboardadmin');
});


// Produk Dataran
Route::get('admin/produkdataran', function () {
    Return view ('admin.produkdataran');
});

Route::get('admin/tambahprodukdataran', function () {
    Return view ('admin.tambahprodukdataran');
});

// Produk dinding
Route::get('admin/produkdinding', function () {
    Return view ('admin.produkdinding');
});

Route::get('admin/tambahprodukdinding', function () {
    Return view ('admin.tambahprodukdinding');
});

// Detail produk
Route::get('admin/detailproduk', function () {
    Return view ('admin.detailproduk');
});


// Kategori Dataran
Route::get('admin/kategoridataran', function () {
    Return view ('admin.kategoridataran');
});

Route::get('admin/tambahkategoridataran', function () {
    Return view ('admin.tambahkategoridataran');
});

Route::get('admin/detailkategori', function () {
    Return view ('admin.detailkategori');
});


// Kategori Dinding
Route::get('admin/kategoridinding', function () {
    Return view ('admin.kategoridinding');
});

Route::get('admin/tambahkategoridinding', function () {
    Return view ('admin.tambahkategoridinding');
});



// Data Akun
Route::get('admin/dataakun', function () {
    Return view ('admin.dataakun');
});

Route::get('admin/tambahadmin', function () {
    Return view ('admin.tambahadmin');
});

Route::get('admin/detailakunadmin', function () {
    Return view ('admin.detailakunadmin');
});

Route::get('admin/profiladmin', function () {
    Return view ('admin.profiladmin');
});

Route::get('admin/detailakunpelanggan', function () {
    Return view ('admin.detailakunpelanggan');
});


// Rating dan ulasan
Route::get('admin/ratingdanulasan', function () {
    Return view ('admin.ratingdanulasan');
});


// Transaksi
Route::get('admin/transaksibelumdibayar', function () {
    Return view ('admin.transaksibelumdibayar');
});

Route::get('admin/transaksisudahdibayar', function () {
    Return view ('admin.transaksisudahdibayar');
});

Route::get('admin/transaksidibatalkan', function () {
    Return view ('admin.transaksidibatalkan');
});

Route::get('admin/transaksidibatalkan', function () {
    Return view ('admin.transaksidibatalkan');
});

Route::get('admin/detailtransaksi', function () {
    Return view ('admin.detailtransaksi');
});

Route::get('admin/invoiceadmin', function () {
    Return view ('admin.invoiceadmin');
});



// Laporan
Route::get('admin/laporanharian', function () {
    Return view ('admin.laporanharian');
});

Route::get('admin/laporanbulanan', function () {
    Return view ('admin.laporanbulanan');
});

Route::get('admin/laporantahunan', function () {
    Return view ('admin.laporantahunan');
});


// Program Flash sale
Route::get('admin/programflashsale', function () {
    Return view ('admin.programflashsale');
});

Route::get('admin/tambahflashsale', function () {
    Return view ('admin.tambahflashsale');
});
