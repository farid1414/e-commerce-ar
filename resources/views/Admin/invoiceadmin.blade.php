{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')
@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item ">
        Transaksi
    </li>
    <li class="breadcrumb-item active">
        Detail Invoice
    </li>
@stop
{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <section class="section dashboard">
        <div class="print-hidden">
            {{-- pc --}}
            <div class='d-none d-md-block'>
                <div class="container">
                    <div class="card">
                        <div class="card-header bg-white mb-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{ asset('gambar/logo.png') }}" style="margin-right: 10px; max-height: 40px;"
                                    alt="">
                                <span style="font-size: 0.85rem;">{{ $tr->code }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- <p><b>No. Pesanan</b></p>
                                    <p>AR-F/ORD-20230815-0003</p> --}}
                                    <p><b>No. Transaksi</b></p>
                                    <p>{{ $tr->code }}</p>
                                    <p><b>Informasi Pemesan</b></p>
                                    <span>{{ $tr->user->name }}</span><br />
                                    <span>{{ $tr->user->email }}</span><br />
                                    <span>{{ $tr->user->customer->phone }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <p><b>Informasi Alamat Pengiriman</b></p>
                                        <p>{!! $tr->user->customer->address !!}</p>
                                        <p><b>Status Pembayaran</b></p>
                                        <h4 style="font-size: 1.2rem;"><b><span class="badge rounded-pill bg-success">Sudah
                                                    Dibayar</span></b></h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><b>Waktu Pemesanan</b></p>
                                            <p>{{ $tr->created_date() }}</p>
                                            <p><b>Waktu Pembayaran</b></p>
                                            <p>{{ $tr->payment_date() }}</p>
                                            <p><b>Metode Pembayaran</b></p>
                                            <p>{{ $tr->payment_type }}</p>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-3 fw-bold mb-3">Produk Yang di pesan.</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Produk</th>
                                <th class="text-center">Varian</th>
                                <th class="text-center">Harga Produk</th>
                                <th class="text-center">Diskon</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tr->transactionDetail as $i => $det)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td class="text-center">{{ $det->product->name }}</td>
                                    <td class="text-center">Varian {{ optional($det->varian)->name }}</td>
                                    <td class="text-center">{{ formatRupiah($det->harga) }}</td>
                                    <td class="text-center">{{ formatRupiah($det->diskon) }}</td>
                                    <td class="text-center">{{ $det->quantity }}x</td>
                                    <td class="text-center">
                                        {{ formatRupiah(($det->harga - $det->diskon) * $det->quantity + $det->ongkir) }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                                <td class="text-center"><b>Total Kuantitas</b></td>
                                <td class="text-center"><b>{{ $tr->transactionDetail->sum('quantity') }} Produk</b></td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td class="text-center"><b>Total Subtotal</b></td>
                                <td class="text-center"><b>{{ formatRupiah($tr->order_amount) }}</b></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-title"></div>
                            <div class="d-flex justify-content-between">
                                <p>Subtotal untuk Produk</p>
                                <p>{{ formatRupiah($tr->order_amount) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Total Diskon untuk Produk</p>
                                <p>{{ $tr->diskon }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Subtotal Pengiriman</p>
                                <p>{{ formatRupiah($tr->ongkir) }}</p>
                            </div>
                            {{-- <div class="d-flex justify-content-between">
                                <p>Total Diskon Pengiriman</p>
                                <p>-Rp8.000</p>
                            </div> --}}
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <h5>Total Pembayaran</h5>
                                <h5>{{ formatRupiah($tr->order_amount) }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- hp --}}
            <div class='d-block d-lg-none'>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <p><b>No. Pesanan</b></p>
                                <p>{{ $tr->code }}</p>
                            </div>
                            {{-- <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>No. Transaksi</b></p>
                                <p>AR-F/ORD-20230815-0003</p>
                            </div> --}}
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Informasi Pemesan</b></p>
                                <p class="text-end">
                                    {{ $tr->user->name }} <br />
                                    {{ $tr->user->email }}
                                    <br />
                                    {{ $tr->user->customer->phone }}
                                </p>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Alamat Pelanggan</b></p>
                                <p> {!! $tr->user->customer->address !!}</p>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Waktu Pemesanan</b></p>
                                <p>{{ $tr->created_date() }}</p>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Status Pembayaran</b></p>
                                <h4 style="font-size: 1.3rem;">
                                    <b>
                                        <span class="badge rounded-pill text-success">
                                            Sudah Dibayar
                                        </span>
                                    </b>
                                </h4>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Waktu Pembayaran</b></p>
                                <p>{{ $tr->payment_date() }}</p>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Metode Pembayaran</b></p>
                                <p class="fw-bold">{{ $tr->payment_type }}</p>
                            </div>
                            <hr style="margin-top: -5px;" />
                        </div>
                        <div class="col-md-6">
                            <h4 class="mt-5 mb-3 fw-bold">Produk yang di pesan.</h4>
                            <div class="card">
                                <div class="card-body">
                                    @foreach ($tr->transactionDetail as $det)
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">{{ $det->product->name }}</p>
                                            <p class="text-muted">x {{ $det->quantity }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between" style="margin-top: -15px;">
                                            <p class="text-muted">varian : {{ optional($det->varian)->name }}</p>
                                            <p>{{ formatRupiah($det->total) }}</p>
                                        </div>
                                        <hr />
                                    @endforeach
                                    {{-- <div class="d-flex justify-content-between">
                                        <p>Harga Satuan: </p>
                                        <p>Rp 500.000</p>
                                    </div> --}}
                                    <div class="d-flex justify-content-between">
                                        <p>Sub Total Produk: </p>
                                        <p>{{ formatRupiah($tr->order_amount) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Ongkos Kirim: </p>
                                        <p>{{ formatRupiah($tr->diskon) }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Sub Total Ongkos Kirim: </p>
                                        <p>{{ formatRupiah($tr->diskon) }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <p class="fw-bold">Total Pesanan: </p>
                                        <p class="fw-bold">{{ formatRupiah($tr->order_amount) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="card mt-3 print-hidden">
            <div class="card-body">
                <div class="card-title" style="margin-top: -20px"></div>
                <a href="{{ route('send-email', $tr->id) }}" class="btn btn-primary">Kirim Invoice via Email Admin</a>
                {{-- <div class="d-flex justify-content-between">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown-basic"
                            data-toggle="dropdown">
                            Opsi Lain Invoice
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" onclick="handleEmailSend()">Kirim Invoice via Email</a>
                            <a class="dropdown-item">Unduh Via .pdf</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

@stop
