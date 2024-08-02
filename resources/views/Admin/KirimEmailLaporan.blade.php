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
    <title></title>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <img src="{{ $message->embed(public_path('/gambar/logo.png')) }}"
                        style="margin-right: 10px; max-height: 40px;" alt="">
                    <span style="font-size: 0.85rem;">Laporan {{ $data['start_date'] }} - {{ $data['end_date'] }}</span>
                </div>
            </div>
            <div class="card-body">
                <table class="table-body">
                    <tr>
                        <td><b>Total Pelanggan</b></td>
                        <td>{{ $data['pelanggan'] }} Pelanggan</td>
                    </tr>
                    <tr>
                        <td><b>Total Produk Terjuak</b></td>
                        <td>{{ $data['countProd'] }} Produk Terjual</td>
                    </tr>
                    <tr>
                        <td><b>Total Ulasan</b></td>
                        <td>{{ $data['rating']->count() }} Ulasan</td>
                    </tr>
                    <tr>
                        <td><b>Total Transaksi sudah bayar</b></td>
                        <td>{{ $data['transaction']->count() }} Transaksi</td>
                    </tr>
                    <tr>
                        <td><b>Total Invoice</b></td>
                        <td>{{ $data['transaction']->count() }} Invoice</td>
                    </tr>
                    {{-- <tr>
                        <td><b>Total Produk</b></td>
                        <td>20 Produk</td>
                    </tr>
                    <tr>
                        <td><b>Total Kategori</b></td>
                        <td>20 Kategori</td>
                    </tr> --}}
                    <tr>
                        <td><b>Total Pendapatan</b></td>
                        <td>Rp {{ number_format($data['transaction']->sum('order_amount'), 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <hr>
        <h4 class="mt-3 fw-bold mb-3">5 Produk Terlaris Dataran.</h4>
        <table class="table-header">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Kategori</th>
                    {{-- <th class="text-center">Varian</th> --}}
                    <th class="text-center">Harga</th>
                    <th class="text-center">Terjual</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data['productCat']->where('m_categories', 1)->take(5) as $key => $prod)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center">{{ $prod->name }}</td>
                        <td class="text-center">{{ $prod->category->name }}, Dataran</td>
                        {{-- <td class="text-center">Merah</td> --}}
                        <td class="text-center">Rp {{ number_format($prod->harga, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $prod->terjual }}x</td>
                    </tr>
                @empty
                    <td colspan="5">Tidak ada data</td>
                @endforelse

            </tbody>
        </table>

        <h4 class="mt-3 fw-bold mb-3">5 Produk Terlaris Dinding.</h4>
        <table class="table-header">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Kategori</th>
                    {{-- <th class="text-center">Varian</th> --}}
                    <th class="text-center">Harga</th>
                    <th class="text-center">Terjual</th>
                </tr>
            </thead>
            <tbody>

                @forelse($data['productCat']->where('m_categories', 2)->take(5) as $key => $prod)
                    <tr>
                        <td class="text-center">
                            {{ $key + 1 }}
                        </td>
                        <td class="text-center">{{ $prod->name }}</td>
                        <td class="text-center fw-bold">
                            {{ $prod->category->name }}<br /><small>Dinding</small></td>
                        <td class="text-center">{{ formatRupiah($prod->harga) }}</td>
                        <td class="text-center fw-bold">{{ $prod->terjual }}</td>
                        {{-- <td class="text-center">100x</td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada product</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr>
        <h4 class="mt-3 fw-bold mb-3">5 Kategori Terlaris Dataran.</h4>
        <table class="table-header">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Total Produk</th>
                    <th class="text-center">Total Produk Terjual</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data['cat']->where('m_categories', 1)->take(5) as $key => $cat)
                    <tr>
                        <td class="text-center">
                            {{ $key + 1 }}
                        </td>
                        <td class="text-center">
                            <p class="fw-bold">{{ $cat->name }}</p>
                        </td>
                        <td class="text-center">{{ $cat->products->count() }} Produk</td>
                        <td class="text-center fw-bold">{{ $cat->products->sum('terjual') }}x Terjual
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada category</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <h4 class="mt-3 fw-bold mb-3">5 Kategori Terlaris Dinding.</h4>
        <table class="table-header">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Total Produk</th>
                    <th class="text-center">Total Produk Terjual</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data['cat']->where('m_categories', 1) as $key => $cat)
                    <tr>
                        <td class="text-center">
                            {{ $key + 1 }}
                        </td>
                        <td class="text-center">
                            <p class="fw-bold">{{ $cat->name }}</p>
                        </td>
                        <td class="text-center">{{ $cat->products->count() }} Produk</td>
                        <td class="text-center fw-bold">{{ $cat->products->sum('terjual') }}x
                            Terjual
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada category</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr>

        <h4 class="mt-3 fw-bold mb-3">Rating & Ulasan pelanggan tanggal 29 - 30 Agustus 2023.</h4>
        <table class="table-header">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pelanggan </th>
                    <th class="text-center">Rating Pelanggan </th>
                    <th class="text-center">Ulasan Pelanggan </th>
                    <th class="text-center">Waktu Memberi Ulasan </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data['rating'] as $key =>  $rat)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $rat->user->name }}</td>
                        <td>{{ $rat->rating_value }}</td>
                        <td>{!! $rat->text_value !!}</td>
                        <td>{{ $rat->created_date() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada rating</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <hr>

        <h4 class="mt-3 fw-bold mb-3">Data Lengkap Penjualan tanggal 29 - 30 Agustus 2023.</h4>
        <table class="table-header">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pelanggan </th>
                    <th class="text-center">Alamat </th>
                    <th class="text-center">Produk </th>
                    <th class="text-center">Pembayaran </th>
                    <th class="text-center">Waktu Pembayaran </th>
                    <th class="text-center">Sub Total </th>
                    <th class="text-center">Diskon </th>
                    <th class="text-center">Total Keseluruhan </th>




                </tr>
            </thead>
            <tbody>
                @forelse ($data['transaction'] as $index =>  $tr)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tr->user->name }}</td>
                        <td>{{ optional($tr->user->customer)->address }}</td>
                        <td class="fw-bold">
                            <ul>
                                @foreach ($tr->transactionDetail as $detail)
                                    <li>
                                        {{ $detail->product->name }}<br />
                                        @if ($detail->product_varian_id)
                                            <span><small>-{{ $detail->varian->name }}</small></span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $tr->payment_type }}</td>
                        <td>{{ $tr->payment_date() }}</td>
                        <td>{{ formatRupiah($tr->order_amount) }}</td>
                        <td class="fw-bold">{{ $tr->diskon }}</td>
                        <td>{{ formatRupiah($tr->order_amount - $tr->diskon) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <br>
    </div>

</body>

</html>
