<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pelanggan</title>
</head>
@include('user.komponenuser.navbaruser')



@include('user.include.style')

<body>
    @include('user.komponenuser.loadingUser')

    <div class="text-center mt-3 mb-4">
        <h1><b>Invoice Pesanan Anda.</b></h1>
        <span>Terima Kasih Sudah Berbelanja Di AR-Furniture</span>
    </div>

    <!-- CSS styles -->
    <style>
        @media print {

            .navbar,
            .footer,
            .button,
            .print-hidden {
                display: none !important;
            }
        }
    </style>

    <div class="container">

        <!-- ContentinvoicePC -->
        <div class="print-hidden">

            <div class='d-none d-md-block'>
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="../gambar/logo.png" style="margin-right: 10px; max-height: 40px;"
                                    alt="">
                                <span style="font-size: 0.85rem;">{{ $tr->code }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p><b>No. Pesanan</b></p>
                                    <p>{{ $tr->code }}</p>
                                    {{-- <p><b>No. Transaksi</b></p>
                                    <p>AR-F/ORD-20230815-0003</p> --}}
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
                                        <h4 style="font-size: 1.2rem;"><b><span
                                                    class="badge rounded-pill bg-success">Sudah Dibayar</span></b></h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><b>Waktu Pemesanan</b></p>
                                            <p>{{ $tr->created_at }}</p>
                                            <p><b>Waktu Pembayaran</b></p>
                                            <p>{{ $tr->payment_at }}</p>
                                            <p><b>Metode Pembayaran</b></p>
                                            <p>
                                                @if ($tr->payment_type)
                                                    {{ $tr->payment_type }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="mt-3 fw-bold mb-3">Produk Yang Anda Pesan.</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Produk</th>
                                <th class="text-center">Varian</th>
                                <th class="text-center">Harga Produk</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tr->transactionDetail as $i => $detail)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td class="text-center">{{ $detail->product->name }}</td>
                                    <td class="text-center">Varian {{ $detail->varian->name }}</td>
                                    <td class="text-center">{{ formatRupiah($detail->harga) }}</td>
                                    <td class="text-center">{{ $detail->quantity }}x</td>
                                    <td class="text-center">{{ formatRupiah($detail->total) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-center"><b>Total Kuantitas</b></td>
                                <td class="text-center"><b>{{ $tr->transactionDetail->sum('quantity') }} Produk</b>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-center"><b>Total Subtotal</b></td>
                                <td class="text-center"><b>{{ formatRupiah($tr->order_amount) }}</b></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p>Subtotal untuk Produk</p>
                                <p>{{ formatRupiah($tr->transactionDetail->sum('harga')) }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Total Diskon untuk Produk</p>
                                <p>
                                    @if ($tr->transactionDetail->sum('diskon') > 0)
                                        {{ $tr->transactionDetail->sum('diskon') }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Subtotal Pengiriman</p>
                                <p>{{ formatRupiah($tr->transactionDetail->sum('ongkir')) }}</p>
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


            <div class='d-block d-lg-none'>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between">
                                <p><b>No. Pesanan</b></p>
                                <p>{{ $tr->code }}</p>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>No. Transaksi</b></p>
                                <p>{{ $tr->code }}</p>
                            </div>
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
                                <p>{{ $tr->created_at }}</p>
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
                                <p>{{ $tr->payment_at }}</p>
                            </div>
                            <hr style="margin-top: -5px;" />
                            <div class="d-flex justify-content-between">
                                <p><b>Metode Pembayaran</b></p>
                                <p class="fw-bold">
                                    @if ($tr->payment_type)
                                        {{ $tr->payment_type }}
                                    @endif
                                </p>
                            </div>
                            <hr style="margin-top: -5px;" />
                        </div>
                        <div class="col-md-6">
                            <h4 class="mt-5 mb-3 fw-bold">Produk yang anda pesan.</h4>
                            @foreach ($tr->transactionDetail as $detail)
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">{{ $detail->product->name }}</p>
                                            <p class="text-muted">x {{ $detail->quantity }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between" style="margin-top: -15px;">
                                            <p class="text-muted">varian : {{ $detail->varian->name }}</p>
                                            <p>{{ formatRupiah($detail->harga) }}</p>
                                        </div>
                                        <hr />
                                        <div class="d-flex justify-content-between">
                                            <p>Harga Satuan: </p>
                                            <p>{{ formatRupiah($detail->harga) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p>Sub Total Produk: </p>
                                            <p>{{ formatRupiah($detail->total) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p>Ongkos Kirim: </p>
                                            <p>{{ formatRupiah($detail->ongkir) }}</p>
                                        </div>
                                        {{-- <div class="d-flex justify-content-between">
                                            <p>Sub Total Ongkos Kirim: </p>
                                            <p>Rp 500.000</p>
                                        </div> --}}
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold">Total Pesanan: </p>
                                            <p class="fw-bold">{{ formatRupiah($tr->order_amount) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>


        </div>



        <!-- Actions -->
        <div class="container">

            <div class="card mt-3 print-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opsi Unduh Invoice
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('send-email', $tr->id) }}">Kirim
                                        Invoice via E-mail</a></li>
                                {{-- <li><a class="dropdown-item" href="{{ route('send-pdf', $tr->id) }}">Unduh via
                                        PDF</a></li> --}}
                            </ul>
                        </div>
                        {{-- <button class="btn btn-dark d-flex align-items-center" onclick="handlePrint()">
                            Cetak Invoice
                            <i class="fas fa-print ml-2"></i>
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('user.include.script')
    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>
    @include('user.komponenuser.footer')
</body>

</html>
