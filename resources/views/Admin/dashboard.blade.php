{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')
@section('content_header')
    <li class="breadcrumb-item active">
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
@stop
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
                                <h6>{{ $userCount }}</h6>
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
                                @php
                                    $count = 0;
                                    foreach ($transactionSuccess as $tr) {
                                        $count += $tr->transactionDetail->count();
                                    }
                                @endphp
                                <h6>{{ $count }}</h6>
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
                                <h6>{{ $transactionSuccess->count() }}</h6>
                                {{-- <h6>{{   $totalTransaksi     }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Produk Terjual</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Produk Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $produk->count() }}</h6>
                                <span class="text-success small pt-1 fw-bold">Total Produk Keseluruhan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $categori->count() }}</h6>
                                {{-- <h6>  Rp.   {{ number_format($totalRevenue, 0, ',', '.')   }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Total Kategori Keseluruhan</span>
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
                                <h6>{{ formatRupiah($transactionSuccess->sum('order_amount')) }}</h6>
                                {{-- <h6>  Rp.   {{ number_format($totalRevenue, 0, ',', '.')   }}</h6> --}}
                                <span class="text-success small pt-1 fw-bold">Total Pendapatan</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Invoice  --}}
                {{-- <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Invoice Keseluruhan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-envelope-paper"></i>
                            </div>
                            <div class="ps-3">
                                <h6>44</h6>
                                <span class="text-success small pt-1 fw-bold">Total Invoice</span>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            {{-- Program Flash Sale yang berjalan --}}

            {{-- @foreach ($flashSales as $flashSale) --}}
            <div class="col">
                <div>
                    <div class="card info-card revenue-card">
                        <div class="card-body" style="margin-bottom: 12px;">
                            <h5 class="card-title">
                                Flash Sale Sedang Berjalan
                            </h5>
                            @forelse ($activeFlashSales as $active)
                                <div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-lightning-charge"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 style="font-size: 1.2rem;">{{ $active->name }}</h6>
                                            <span class="text-success small pt-1 fw-bold">
                                                8 Produk Total,
                                            </span>
                                            <br />

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
                            @empty
                                <h5 class="text-center">Tidak Ada Flash Sale</h5>
                            @endforelse
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
                                @foreach ($transactionPending as $pending)
                                    <tr>
                                        <td class="text-center">
                                            <a href="{{ route('master.transaksi.detail', $pending->id) }}"
                                                class="text-dark fw-bold">{{ $pending->user->name }}</a>
                                        </td>
                                        <td class="text-center">{{ $pending->transactionDetail->count() }} Produk</td>
                                        <td class="text-center">{{ $pending->created_date() }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                                                Pembayaran</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('master.transaksi.detail', $pending->id) }}">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <a href="{{ route('master.transaksi.pending') }}" target="_blank">
                            <div style="margin-bottom: -10px;" class="d-flex justify-content-end">
                                <p style="margin-right: 20px;">Selengkapnya</p>
                                <i style="font-size: 20px; margin-top: 2px;" class="fa fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>


                {{-- Produk Terlaris Terjual 10 keatas --}}
                {{-- <div class="card top-selling overflow-auto">
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
                                <tr>
                                    <td class="text-center"><img
                                            src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                            alt="alt="Meja Gaming"></td>

                                    <td class="text-center">Meja Gaming<br><span>Varian : -</span></td>
                                    <td class="text-center fw-bold">Meja<br><small>Dataran</small></td>
                                    <td class="text-center">Rp 1.200.000</td>
                                    <td class="text-center fw-bold">20x</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> --}}


                <!-- Card Produk Yang Telah Habis (Stok kurang dari 5) -->
                <div style="margin-top: -15px;">
                    <h5 class="card-title">Produk Yang Segera Habis (Stok &lt; 5)</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dataran</h5>
                                    <table class="table table-bordered table-hover" id="table_produk_kurang">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody> </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dinding</h5>
                                    <table class="table table-bordered table-hover" id="table_dinding_kurang">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                    <table class="table table-bordered table-hover" id="table_dataran_habis">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card top-selling overflow-auto">
                                <div class="card-body pb-0">
                                    <h5 class="card-title">Furnitur Pada Dinding</h5>
                                    <table class="table table-bordered table-hover" id="table_dinding_habis">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Varian</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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

@push('js')
    <script>
        $(document).ready(function() {
            $('#table_produk_kurang').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('master.product.data', 'dataran') }}/" +
                    "?categori=" + 1 + " &is_active=" + 1 + "&akan_habis=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#table_dinding_kurang').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('master.product.data', 'dinding') }}/" +
                    "?categori=" + 2 + " &is_active=" + 1 + "&akan_habis=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#table_dataran_habis').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('master.product.data', 'dataran') }}/" +
                    "?categori=" + 1 + " &is_active=" + 0 + "&habis=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#table_dinding_habis').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('master.product.data', 'dinding') }}/" +
                    "?categori=" + 2 + " &is_active=" + 0 + "&habis=" + 1,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        visible: false
                    },
                    {
                        data: 'gambar',
                        name: 'gambar',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'varians',
                        name: 'varians'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        })
    </script>
@endpush
