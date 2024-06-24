{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Transksi {{ $status }}
    </li>
@stop

{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <section class="section dashboard">
        <div class="row">
            <!-- Card Informasi Atas -->
            <section class="section dashboard">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card info-card sales-card">
                            <!-- Jumlah Pelanggan -->
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $status }}

                                </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                        style="background-color: rgb(242, 242, 242);">
                                        <i class="bi bi-box"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $transactions->count() }}</h6>
                                        <span class="text-muted small pt-1">
                                            Total {{ $status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($status == 'Sudah dibayar')
                        <div class="col-sm-4">
                            <div class="card info-card revenue-card">
                                <!-- Jumlah Terjual -->
                                <div class="card-body">
                                    <h5 class="card-title">Invoice</h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box-seam"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $transactions->count() }}</h6>
                                            <span class="text-muted small pt-1" style="font-size: 13px;">
                                                Total Invoice
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                <!-- Isi Konten Produk Dataran -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">
                                List Transaksi {{ $status }}<br />
                                <span>Manajemen transaksi {{ $status }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <div>
                                @foreach ($transactions as $tr)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title" style="font-size: 0.9rem;">No Transaksi
                                                    {{ $tr->code }}</h5>
                                                <h5 class="card-title" style="font-size: 0.9rem;">{{ $status }}</h5>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">No Pesanan</th>
                                                            <th class="text-center">Waktu Pembayaran</th>
                                                            <th class="text-center">QTY</th>
                                                            <th class="text-center">Total Pesanan</th>
                                                            <th class="text-center">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center">
                                                                <a href="/Detailakunpelanggan"
                                                                    class="text-primary fw-bold">{{ $tr->user->name }}</a>
                                                            </td>
                                                            <td class="text-center" style="font-size: 0.85rem;">
                                                                {{ $tr->code }}</td>
                                                            <td class="text-center">{{ $tr->payment_date() }}</td>
                                                            <td class="text-center">{{ $tr->transactionDetail->count() }}
                                                                Produk</td>
                                                            <td class="text-center fw-bold">
                                                                {{ formatRupiah($tr->order_amount) }}</td>
                                                            <td class="text-center">
                                                                <a href="{{ route('master.transaksi.detail', $tr->id) }}"
                                                                    class="btn btn-link"
                                                                    style="text-decoration: none;">Lihat</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            {{-- <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group showperpage">
                                    <label for="exampleFormControlSelect1">Show per page:</label>
                                    <select class="form-control form-control-sm" id="exampleFormControlSelect1">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <div class="pagination-info">1 - 2 of 2 items</div>
                            </div> --}}
                        </div>
                    </div>
                </div>
        </div>
    </section>

@stop
