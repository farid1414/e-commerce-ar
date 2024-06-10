
{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Detail Flash Sale')

{{-- tahap section jangan lupa di tutup --}}
@section('content')

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title">Program Flash Sale 1.1</h5>
                <h5>
                    <span class="badge rounded-pill bg-primary mt-3">Sedang Berjalan</span>
                </h5>
            </div>
            <div class="d-flex justify-content-between">
                <p>Waktu Mulai : 2023-05-29</p>
                <p>Waktu Akhir : 2023-05-30</p>
            </div>
        </div>
    </div>
    <h5 class="card-title mt-4">Overview</h5>
    <div class="row">
        <div class="col-sm-4">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Terjual</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>
                                12 <span style="font-size: 1rem;">Produk</span>
                            </h6>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card info-card revenue-card">
              
                {{-- Transaksi --}}
                <div class="card-body">
                    <h5 class="card-title">Transaksi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle 
                                    d-flex align-items-center 
                                    justify-content-center"
                             style="background-color: rgb(245, 255, 253);">
                            <i class="bi bi-bar-chart" style="color: rgb(0, 209, 167);"></i>
                        </div>
                        <div class="ps-3">
                            <h6>
                                48 <span style="font-size: 1rem;">Transaksi</span>
                            </h6>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card info-card customers-card">
                {{-- Pendapatan --}}
                <div class="card-body">
                    <h5 class="card-title">Pendapatan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cash"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 1.4rem;">Rp. 1.500.000</h6>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            {{-- <ContentisianalisisTotalProduk /> --}}
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total Produk</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle 
                                    d-flex align-items-center 
                                    justify-content-center" 
                             style="background-color: rgb(251, 237, 255);">
                            <i class="bi bi-box" style="color: rgb(120, 48, 219);"></i>
                        </div>
                        <div class="ps-3">
                            <h6>
                                12<span style="font-size: 1rem;"> Produk</span>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h5 class="card-title mt-4">List Produk Flash Sale</h5>
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title">Produk yang di Flash Sale</h5>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center">Diskon</th>
                        <th class="text-center">Harga Diskon</th>
                        <th class="text-center">Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mulai Looping Produk -->
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="assets/assets/img/product-1.jpg" alt="Gambar Produk" />
                            </a>
                        </td>
                        <td class="text-center">Meja Gaming</td>
                        <td class="text-center"><small>10%</small></td>
                        <td class="text-center">Rp 1.200.000</td>
                        <td class="text-center fw-bold">10x</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="assets/assets/img/product-2.jpg" alt="Gambar Produk" />
                            </a>
                        </td>
                        <td class="text-center">
                            Meja Rias Aesthetic <br />
                            <small class="text-muted">Varian : Kuning</small>
                        </td>
                        <td class="text-center"><small>10%</small></td>
                        <td class="text-center">Rp 1.200.000</td>
                        <td class="text-center fw-bold">8x</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="assets/assets/img/product-3.jpg" alt="Gambar Produk" />
                            </a>
                        </td>
                        <td class="text-center">
                            Kabinet Dinding <br />
                            <small class="text-muted">Varian : Putih</small>
                        </td>
                        <td class="text-center"><small>10%</small></td>
                        <td class="text-center">Rp 1.200.000</td>
                        <td class="text-center fw-bold">5x</td>
                    </tr>
                    <!-- Selesai Looping Produk -->
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    
    <h5 class="card-title mt-4">Top 5 Produk Terlaris</h5>
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title">Produk yang di Flash Sale</h5>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Gambar</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center">Diskon</th>
                        <th class="text-center">Harga Diskon</th>
                        <th class="text-center">Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mulai Looping Produk -->
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="assets/assets/img/product-1.jpg" alt="Gambar Produk" />
                            </a>
                        </td>
                        <td class="text-center">Meja Gaming</td>
                        <td class="text-center"><small>10%</small></td>
                        <td class="text-center">Rp 1.200.000</td>
                        <td class="text-center fw-bold">10x</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="assets/assets/img/product-2.jpg" alt="Gambar Produk" />
                            </a>
                        </td>
                        <td class="text-center">
                            Meja Rias Aesthetic <br />
                            <small class="text-muted">Varian : Kuning</small>
                        </td>
                        <td class="text-center"><small>10%</small></td>
                        <td class="text-center">Rp 1.200.000</td>
                        <td class="text-center fw-bold">8x</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <a href="#">
                                <img src="assets/assets/img/product-3.jpg" alt="Gambar Produk" />
                            </a>
                        </td>
                        <td class="text-center">
                            Kabinet Dinding <br />
                            <small class="text-muted">Varian : Putih</small>
                        </td>
                        <td class="text-center"><small>10%</small></td>
                        <td class="text-center">Rp 1.200.000</td>
                        <td class="text-center fw-bold">5x</td>
                    </tr>
                    <!-- Selesai Looping Produk -->
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@stop