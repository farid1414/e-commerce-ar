{{-- Iki seng dikirim, di unduh karo di cetak. Seng ditampilno nang user iku INVOICEPELANGGAN,blade,PHP --}}

{{-- Ketika user klik tombol unduh, kirim email karo cetak nang file File INVOICEPELANGGAN . blade . PHP, file iki seng di gae.
File INVOICEPELANGGAN . blade . PHP iku gae UI ne tok --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .table-header,
        .table-body,
        .table-footer {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table-header th,
        .table-body td,
        .table-footer td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table-header th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .bg-success {
            background-color: #28a745;
            color: white;
            padding: 0.2em 0.6em;
            border-radius: 0.25rem;
        }

        .bold {
            font-weight: bold;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .fw-bold {
            font-weight: bold;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
            padding: 1rem;
        }

        .card-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        .card-footer {
            border-top: 1px solid #ddd;
            padding-top: 0.5rem;
            margin-top: 1rem;
        }

        .d-flex {
            display: flex;
        }

        .align-items-center {
            align-items: center;
        }

        .justify-content-between {
            justify-content: space-between;
        }
    </style>
    <title>Invoice</title>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <img src="{{ $message->embed(public_path('/gambar/logo.png')) }}"
                        style="margin-right: 10px; max-height: 40px;" alt="">
                    <span style="font-size: 0.85rem;">{{ $transaction->code }}</span>
                </div>
            </div>
            <div class="card-body">
                <table class="table-body">
                    <tr>
                        <td><b>No. Pesanan</b></td>
                        <td>{{ $transaction->code }}</td>
                    </tr>
                    {{-- <tr>
                        <td><b>No. Transaksi</b></td>
                        <td>AR-F/ORD-20230815-0003</td>
                    </tr> --}}
                    <tr>
                        <td><b>Informasi Pemesan</b></td>
                        <td>{{ $transaction->user->name }}<br>{{ $transaction->user->email }}<br>{{ $transaction->user->customer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <td><b>Informasi Alamat Pengiriman</b></td>
                        <td>{!! $transaction->user->customer->address !!}</td>
                    </tr>
                    <tr>
                        <td><b>Status Pembayaran</b></td>
                        <td><span class="bg-success">Sudah Dibayar</span></td>
                    </tr>
                    <tr>
                        <td><b>Waktu Pemesanan</b></td>
                        <td>{{ $transaction->created_at }}</td>
                    </tr>
                    <tr>
                        <td><b>Waktu Pembayaran</b></td>
                        <td>{{ $transaction->updated_at }}</td>
                    </tr>
                    <tr>
                        <td><b>Metode Pembayaran</b></td>
                        <td>{{ $transaction->payment_type }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <hr>

        <h4 class="mt-3 fw-bold mb-3">Produk Yang Anda Pesan.</h4>
        <table class="table-header">
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
                @foreach ($transaction->transactionDetail as $i => $detail)
                    <tr>
                        <td class="text-center">{{ $i + 1 }}</td>
                        <td class="text-center">{{ $detail->product->name }}</td>
                        @if ($$detail->product_varian_id)
                            <td class="text-center">Varian {{ $detail->varian->name }}</td>
                        @endif
                        <td class="text-center">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $detail->quantity }}x</td>
                        <td class="text-center">Rp {{ number_format($detail->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <td class="text-center"><b>Total Kuantitas</b></td>
                    <td class="text-center"><b>{{ $transaction->transactionDetail->sum('quantity') }} Produk</b></td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td class="text-center"><b>Total Subtotal</b></td>
                    <td class="text-center"><b>Rp. {{ number_format($transaction->order_amount, 0, ',', '.') }}</b>
                    </td>
                </tr>
            </tfoot>
        </table>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p>Subtotal untuk Produk</p>
                    <p>Rp {{ number_format($transaction->transactionDetail->sum('harga'), 0, ',', '.') }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Total Diskon untuk Produk</p>
                    <p>Rp {{ number_format($transaction->transactionDetail->sum('ongkir'), 0, ',', '.') }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Subtotal Pengiriman</p>
                    <p>Rp {{ number_format($transaction->transactionDetail->sum('ongkir'), 0, ',', '.') }}</p>
                </div>
                {{-- <div class="d-flex justify-content-between">
                    <p>Total Diskon Pengiriman</p>
                    <p>-Rp8.000</p>
                </div> --}}
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <h5>Total Pembayaran</h5>
                    <h5>Rp. {{ number_format($transaction->order_amount, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
