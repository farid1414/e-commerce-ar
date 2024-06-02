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






// Admin
Route::get('admin/dashboardadmin', function () {
    Return view ('admin.dashboardadmin');
});

Route::get('admin/produkdataran', function () {
    Return view ('admin.produkdataran');
});

Route::get('admin/produkdinding', function () {
    Return view ('admin.produkdinding');
});

Route::get('admin/kategoridataran', function () {
    Return view ('admin.kategoridataran');
});

Route::get('admin/kategoridinding', function () {
    Return view ('admin.kategoridinding');
});

Route::get('admin/dataakun', function () {
    Return view ('admin.dataakun');
});

Route::get('admin/ratingdanulasan', function () {
    Return view ('admin.ratingdanulasan');
});

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

Route::get('admin/laporanharian', function () {
    Return view ('admin.laporanharian');
});

Route::get('admin/laporanbulanan', function () {
    Return view ('admin.laporanbulanan');
});

Route::get('admin/laporantahunan', function () {
    Return view ('admin.laporantahunan');
});

Route::get('admin/programflashsale', function () {
    Return view ('admin.programflashsale');
});

