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
                    <h5 class="card-title">{{ $fs->name }}</h5>
                    <h5>
                        @if ($fs->start_time > $dt)
                            <span class="badge rounded-pill bg-primary mt-3">Akan Datang</span>
                        @elseif($fs->start_time <= $dt && $fs->end_time >= $dt)
                            <span class="badge rounded-pill bg-primary mt-3">Sedang Berjalan</span>
                        @else
                            <span class="badge rounded-pill bg-primary mt-3">Telah Berakhir</span>
                        @endif
                    </h5>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Waktu Mulai : {{ $fs->start_time }}</p>
                    <p>Waktu Akhir : {{ $fs->end_time }}</p>
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
                                    {{ \App\Models\TransactionDetail::where('flash_sale_id', $fs->id)->get()->count() }}
                                    <span style="font-size: 1rem;">Produk</span>
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
                                    {{ \App\Models\TransactionDetail::where('flash_sale_id', $fs->id)->get()->groupBy('transaction_id')->count() }}
                                    <span style="font-size: 1rem;">Transaksi</span>
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
                                @php
                                    $total = 0;
                                    foreach ($detail->where('flash_sale_id', $fs->id) as $f) {
                                        $total += ($f->harga - $f->diskon) * $f->quantity + $f->ongkir;
                                    }
                                @endphp
                                <h6 style="font-size: 1.4rem;">{{ formatRupiah($total) }}</h6>
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

                                    {{ $detail->where('flash_sale_id', $fs->id)->groupBy('product_id')->count() }}<span
                                        style="font-size: 1rem;"> Produk</span>
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
                            <th class="text-center">Varian</th>
                            <th class="text-center">Harga Diskon</th>
                            <th class="text-center">Terjual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Mulai Looping Produk -->
                        @foreach ($fs->productFlashSale as $prod)
                            <tr>
                                <td class="text-center">
                                    <a href="#">
                                        <img src="{{ url($prod->product->thumbnail) }}" alt="Gambar Produk" />
                                    </a>
                                </td>
                                <td class="text-center">{{ $prod->product->name }}</td>
                                <td class="text-center">{{ $prod->varian->name }}</td>
                                <td class="text-center"><small>{{ formatRupiah($prod->custom_harga) }}</small></td>
                                <td class="text-center fw-bold">
                                    {{ \App\Models\TransactionDetail::where('flash_sale_id', $fs->id)->where('product_id', $prod->product_id)->where('product_varian_id', $prod->product_varian_id)->get()->count() }}x
                                </td>
                            </tr>
                        @endforeach

                        <!-- Selesai Looping Produk -->
                    </tbody>
                </table>
                {{-- <nav aria-label="Page navigation example">
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
                </nav> --}}
            </div>
        </div>


        {{-- <h5 class="card-title mt-4">Top 5 Produk Terlaris</h5>
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
        </div> --}}
    </section>
@stop
