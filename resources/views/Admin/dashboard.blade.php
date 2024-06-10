{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')
    <section class="section dashboard">
        <div class="row">

            <!-- Total Pelanggan Keseluruhan -->
            <div class="col-xl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Pelanggan Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                                {{-- <h6>{{   $totalPelanggan    }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Total Pelanggan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Total Produk terjual Keseluruhan -->
            <div class="col-xl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Terjual Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bag"></i>
                            </div>
                            <div class="ps-3">
                                <h6>20</h6>
                                {{-- <h6>{{    $totalTerjual   }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Produk Terjual</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Total Transaksi Keseluruhan (3 transaksi ditotal dan dijumlah) -->
            <div class="col-xl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Transaksi Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>20</h6>
                                {{-- <h6>{{   $totalTransaksi     }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Produk Terjual</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Total Pendapatan dari aplikasi bukan midtrans --}}
        <div class="row">
            <div class="col">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>Rp. 50.000.000</h6>
                                {{-- <h6>  Rp.   {{ number_format($totalRevenue, 0, ',', '.')   }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Total Pendapatan</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Invoice  --}}
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-envelope-paper"></i>
                            </div>
                            <div class="ps-3">
                                <h6>44</h6>
                                {{-- <h6>{{ $totalInvoice }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Total Invoice</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Program Flash Sale yang berjalan --}}

            {{-- @foreach($flashSales as $flashSale) --}}
            <div class="col">
                <div>
                    <div class="card info-card revenue-card">
                        <div class="card-body" style="margin-bottom: 12px;">
                            <h5 class="card-title">
                                Flash Sale Sedang Berjalan
                            </h5>
                            <div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-lightning-charge"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 style="font-size: 1.2rem;">Flash Sale 1.1</h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            8 Produk Total,
                                        </span>

                                        {{-- <h6 style="font-size: 1.2rem;">{{ $flashSale->nama }}</h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            {{ $flashSale->total_produk }} Produk Total,
                                        </span> --}}

                                        <br />

                                        {{-- @if($flashSale->status == 'ongoing')
                                        <span class="text-muted small pt-2 ps-1">
                                            Sedang Berjalan
                                        </span>
                                        @elseif($flashSale->status == 'upcoming')
                                        <span class="text-muted small pt-2 ps-1">
                                            Akan Datang
                                        </span>
                                        @endif --}}

                                        {{-- <span class="text-muted small pt-2 ps-1">
                                            {{ $flashSale->start_time }} - {{ $flashSale->end_time }}
                                        </span> --}}
                                        <span class="text-muted small pt-2 ps-1">
                                            Sedang Berjalan
                                        </span>
                                        <br />
                                        <span class="text-muted small pt-2 ps-1">
                                            2023-05-12 12:00 - 2023-05-12 13:59
                                        </span>
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-lightning-charge"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6 style="font-size: 1.2rem;">Flash Sale 2.2</h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            12 Produk Total,
                                        </span>
                                        <br />
                                        <span class="text-muted small pt-2 ps-1">
                                            Akan Datang
                                        </span>
                                        <br />
                                        <span class="text-muted small pt-2 ps-1">
                                            2023-05-12 13:00 - 2023-05-12 15:59
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}



            <!-- List transaksi Belum bayar -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <h5 class="card-title">List Transaksi Belum Bayar</h5>

                        <table border="1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Pelanggan</th>
                                    <th class="text-center">Pembelian</th>
                                    <th class="text-center">Waktu Pemesanan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($transaksiBelumbayar as $transaksi) --}}

                                <tr>
                                    <td class="text-center">
                                        <a href="/Detailtransaksibelumdibayar" class="text-dark fw-bold">Jhon Doe
                                            1</a>
                                    </td>
                                    {{-- <td class="text-center">
                                        <a href="/detail-transaksi-belum-dibayar/{{ $transaksi->id }}" class="text-dark fw-bold">{{ $transaction->customer_nama }}</a>
                                    </td> --}}

                                    <td class="text-center">1 Produk</td>
                                    {{-- <td class="text-center">{{ $transaksi->total_produk }} Produk</td> --}}

                                    <td class="text-center">2001-02-21</td>
                                    {{-- <td class="text-center">{{ $transaksin>waktu_pemesanan }}</td> --}}

                                    <td class="text-center">
                                        <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                                            Pembayaran</span>
                                    </td>
                                    {{-- <td class="text-center">
                                        <span class="badge bg-primary" style="white-space: pre-line">{{ $transaksi->status }}</span>
                                    </td> --}}

                                    <td class="text-center">
                                        <a href="/Transaksibelumbayar">Lihat</a>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                    <div>
                        <a href="/" target="_blank">
                            <div style="margin-bottom: -10px;" class="d-flex justify-content-end">
                                <p style="margin-right: 20px;">Selengkapnya</p>
                                <i style="font-size: 20px; margin-top: 2px;" class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Produk Terlaris Terjual 10 keatas --}}
                <div class="card top-selling overflow-auto">
                    <div class="card-body pb-0">
                        <h5 class="card-title">
                            Top 5 Produk Terlaris (Terjual lebih dari 10)
                        </h5>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach($produkTerlaris as $produk) --}}
                                <tr>
                                    <td class="text-center"><img
                                            src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                            alt="alt="Meja Gaming"></td>
                            {{-- <td class="text-center"><img src="{{ asset($produk->image_path) }}" alt="{{ $produk->nama }}"></td> --}}

                                    <td class="text-center">Meja Gaming<br><span>Varian : -</span></td>
                                    {{-- <td class="text-center">{{ $produk->nama }}<br><span>Varian : {{ $produk->varian }}</span></td> --}}

                                    <td class="text-center fw-bold">Meja<br><small>Dataran</small></td>
                                    {{-- <td class="text-center fw-bold">{{ $produk->kategori }}<br><small>{{ $produk->area }}</small></td> --}}

                                    <td class="text-center">Rp 1.200.000</td>
                                    {{-- <td class="text-center">{{ $produk->harga }}</td> --}}

                                    <td class="text-center fw-bold">20x</td>
                                    {{-- <td class="text-center fw-bold">{{ $produk->terjual }}</td> --}}

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            <!-- Card Produk Yang Telah Habis (Stok kurang dari 5) -->
                <div style="margin-top: -15px;">
                    <h5 class="card-title">Produk Yang Segera Habis (Stok &lt; 5)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dataran</h5>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($furniturDataran as $produk) --}}

                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                    <a href="#">
                                                        <img src="{{ asset($produk->image_path) }}" alt="" />
                                                    </a>
                                                </td> --}}

                                                <td>Ut inventore</td>
                                                {{-- <td>{{ $produk->nama }}</td> --}}

                                                <td class="fw-bold">
                                                    Biru<br />
                                                    -
                                                </td>
                                                {{-- <td class="fw-bold">{{ $produk->varian }}</td> --}}

                                                <td class="fw-bold text-center">
                                                    0
                                                </td>

                                                {{-- <td class="fw-bold text-center">{{ $produk->stok }}</td> --}}

                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Exercitationem</td>
                                                <td class="fw-bold">
                                                    Biru<br />
                                                    Kuning
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0<br />
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Doloribus</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Officiis</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Sit unde debitis</td>
                                                <td class="fw-bold">
                                                    Merah
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>

                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dinding</h5>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($furniturDinding as $produk) --}}

                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>

                                                {{-- <td>
                                                    <a href="#">
                                                        <img src="{{ asset($produk->image_path) }}" alt="" />
                                                    </a>
                                                </td> --}}

                                                <td>Ut inventore</td>
                                                {{-- <td>{{ $produk->nama }}</td> --}}

                                                <td class="fw-bold">
                                                    Biru<br />
                                                    -
                                                </td>

                                                {{-- <td class="fw-bold">{{ $produk->varian }}</td> --}}

                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                {{-- <td class="fw-bold text-center">{{ $produk->stok }}</td> --}}

                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Exercitationem</td>
                                                <td class="fw-bold">
                                                    Biru<br />
                                                    Kuning
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0<br />
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Doloribus</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Officiis</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Sit unde debitis</td>
                                                <td class="fw-bold">
                                                    Merah
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>

                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            <!-- Card Produk Yang Telah Habis (Stok = 0) -->
                <div style="margin-top: -15px;">
                    <h5 class="card-title">Produk Yang Telah Habis (Stok = 0)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dataran</h5>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($furniturDataran as $produk) --}}

                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                    <a href="#">
                                                        <img src="{{ asset($produk->image_path) }}" alt="" />
                                                    </a>
                                                </td> --}}

                                                <td>Ut inventore</td>
                                                {{-- <td>{{ $produk->nama }}</td> --}}

                                                <td class="fw-bold">
                                                    Biru<br />
                                                    -
                                                </td>
                                                {{-- <td class="fw-bold">{{ $produk->varian }}</td> --}}

                                                <td class="fw-bold text-center">
                                                    0
                                                </td>

                                                {{-- <td class="fw-bold text-center">{{ $produk->stok }}</td> --}}

                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Exercitationem</td>
                                                <td class="fw-bold">
                                                    Biru<br />
                                                    Kuning
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0<br />
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Doloribus</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Officiis</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Sit unde debitis</td>
                                                <td class="fw-bold">
                                                    Merah
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            
                                            {{-- @endforeach --}}

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dinding</h5>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                {{-- @foreach($furniturDinding as $produk) --}}

                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                    <a href="#">
                                                        <img src="{{ asset($produk->image_path) }}" alt="" />
                                                    </a>
                                                </td> --}}
                                                <td>Ut inventore</td>
                                                {{-- <td>{{ $produk->nama }}</td> --}}

                                                <td class="fw-bold">
                                                    Biru<br />
                                                    -
                                                </td>
                                                {{-- <td class="fw-bold">{{ $produk->varian }}</td> --}}

                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                {{-- <td class="fw-bold text-center">{{ $produk->stok }}</td> --}}

                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Exercitationem</td>
                                                <td class="fw-bold">
                                                    Biru<br />
                                                    Kuning
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0<br />
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Doloribus</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Officiis</td>
                                                <td class="fw-bold">
                                                    -
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                                            alt="" />
                                                    </a>
                                                </td>
                                                <td>Sit unde debitis</td>
                                                <td class="fw-bold">
                                                    Merah
                                                </td>
                                                <td class="fw-bold text-center">
                                                    0
                                                </td>
                                                <td class='text-start'>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleUpdateStokClick()"><i
                                                            class="bi bi-plus-lg me-1"></i>Stok</button>
                                                    <button type="button" class="btn btn-link"
                                                        style="text-decoration: none; font-size: 0.8rem;"
                                                        onclick="handleArsipkanClick()">Arsipkan</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- @endforeach --}}


            </div>
        </div>
    </section>
@stop
