<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Master\CategoryController;
use App\Http\Controllers\Master\ProductController;

// auth
Route::get('auth/login', function () {
    return view('auth.login');
});

Route::get('auth/registrasi', function () {
    return view('auth.registrasi');
});


// =================== !!  BATAS !! ===================== !! BATAS !! ======================== !! BATAS !! =====================

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


// list produk
Route::get('user/listproduk', function () {
    return view('user.listproduk');
});


// Kategori
Route::get('user/kategori', function () {
    return view('user.kategori');
});

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


// Tentang Kami

Route::get('user/tentangkami', function () {
    return view('user.tentangkami');
});


// hasil pencarian

Route::get('user/hasilpencarian', function () {
    return view('user.hasilpencarian');
});


// FAQ

Route::get('user/FAQ', function () {
    return view('user.FAQ');
});




// =================== !!  BATAS !! ===================== !! BATAS !! ======================== !! BATAS !! =====================




// Admin

// dashboard admin
// Route::get('admin/dashboardadmin', function () {
//     return view('admin.dashboardadmin');
// });


// Produk Dataran
// Route::get('admin/produkdataran', function () {
//     return view('admin.produkdataran');
// });

// Route::get('admin/tambahprodukdataran', function () {
//     return view('admin.tambahprodukdataran');
// });

// Produk dinding
// Route::get('admin/produkdinding', function () {
//     return view('admin.produkdinding');
// });

// Route::get('admin/tambahprodukdinding', function () {
//     return view('admin.tambahprodukdinding');
// });

// Detail produk
// Route::get('admin/detailproduk', function () {
//     return view('admin.detailproduk');
// });


// Kategori Dataran
// Route::get('admin/kategoridataran', function () {
//     return view('admin.kategoridataran');
// });

// Route::get('admin/tambahkategoridataran', function () {
//     return view('admin.tambahkategoridataran');
// });

Route::get('admin/detailkategori', function () {
    return view('admin.detailkategori');
});


// Kategori Dinding
// Route::get('admin/kategoridinding', function () {
//     return view('admin.kategoridinding');
// });

// Route::get('admin/tambahkategoridinding', function () {
//     return view('admin.tambahkategoridinding');
// });



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
        Route::get('/{slug?}', [CategoryController::class, 'index'])->name('index');
        Route::get('/form/{slug?}/{id?}', [CategoryController::class, 'form'])->name('form');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{slug?}/data', [CategoryController::class, 'data'])->name('data');
        Route::post('/status/{id?}', [CategoryController::class, 'status'])->name('status');
        Route::delete('{slug?}/delete/{id?}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('{slug?}/detail/{id?}', [CategoryController::class, 'detail'])->name('detail');
    });
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/{slug?}', [ProductController::class, 'index'])->name('index');
        Route::get('/form/{slug?}/{uuid?}', [ProductController::class, 'form'])->name('form');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{slug?}/data', [ProductController::class, 'data'])->name('data');
        Route::post('/{slug?}/update-stock', [ProductController::class, 'updateStock'])->name('update-stock');
        Route::delete('/{slug?}/delete/{product:uuid?}', [ProductController::class, 'delete'])->name('delete');
        Route::post('/{slug?}/status/{uuid?}', [ProductController::class, 'status'])->name('status');
        Route::get('{uuid?}/detail', [ProductController::class, 'detail'])->name('detail');
    });
});


Route::get('admin/detailflashsale', function () {
    return view('admin.detailflashsale');
});
