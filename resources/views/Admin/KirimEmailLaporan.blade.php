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
        .table-header, .table-body, .table-footer {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table-header th, .table-body td, .table-footer td {
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
                <img src="../gambar/logo.png" style="margin-right: 10px; max-height: 40px;" alt="">
                <span style="font-size: 0.85rem;">Laporan 29 Juli - 30 Agustus 2024</span>
            </div>
        </div>
        <div class="card-body">
            <table class="table-body">
                <tr>
                    <td><b>Total Pelanggan</b></td>
                    <td>20 Pelanggan</td>
                </tr>
                <tr>
                    <td><b>Total Produk Terjuak</b></td>
                    <td>20 Produk Terjual</td>
                </tr>
                <tr>
                    <td><b>Total Ulasan</b></td>
                    <td>20 Ulasan</td>
                </tr>
                <tr>
                    <td><b>Total Transaksi sudah bayar</b></td>
                    <td>20 Transaksi</td>
                </tr>
                <tr>
                    <td><b>Total Invoice</b></td>
                    <td>20 Invoice</td>
                </tr>
                <tr>
                    <td><b>Total Produk</b></td>
                    <td>20 Produk</td>
                </tr>
                <tr>
                    <td><b>Total Kategori</b></td>
                    <td>20 Kategori</td>
                </tr>
                <tr>
                    <td><b>Total Pendapatan</b></td>
                    <td>Rp 1000.0000</td>
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
                <th class="text-center">Varian</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Terjual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Produk 1</td>
                <td class="text-center">Meja, Dataran</td>
                <td class="text-center">Merah</td>
                <td class="text-center">Rp. 200,000</td>
                <td class="text-center">14x</td>
            </tr>
            <tr>
              <td class="text-center">1</td>
              <td class="text-center">Produk 1</td>
              <td class="text-center">Meja, Dataran</td>
              <td class="text-center">Merah</td>
              <td class="text-center">Rp. 200,000</td>
              <td class="text-center">14x</td>
          </tr>
        </tbody>
    </table>

    <h4 class="mt-3 fw-bold mb-3">5 Produk Terlaris Dinding.</h4>
    <table class="table-header">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Produk</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Varian</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Terjual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Produk 1</td>
                <td class="text-center">Meja, Dataran</td>
                <td class="text-center">Merah</td>
                <td class="text-center">Rp. 200,000</td>
                <td class="text-center">14x</td>
            </tr>
            <tr>
              <td class="text-center">1</td>
              <td class="text-center">Produk 1</td>
              <td class="text-center">Meja, Dataran</td>
              <td class="text-center">Merah</td>
              <td class="text-center">Rp. 200,000</td>
              <td class="text-center">14x</td>
          </tr>
        </tbody>
    </table>

    <hr>
    <h4 class="mt-3 fw-bold mb-3">5 Kategori Terlaris Dataran.</h4>
    <table class="table-header">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Produk</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Varian</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Terjual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Produk 1</td>
                <td class="text-center">Meja, Dataran</td>
                <td class="text-center">Merah</td>
                <td class="text-center">Rp. 200,000</td>
                <td class="text-center">14x</td>
            </tr>
            <tr>
              <td class="text-center">1</td>
              <td class="text-center">Produk 1</td>
              <td class="text-center">Meja, Dataran</td>
              <td class="text-center">Merah</td>
              <td class="text-center">Rp. 200,000</td>
              <td class="text-center">14x</td>
          </tr>
        </tbody>
    </table>
    <h4 class="mt-3 fw-bold mb-3">5 Kategori Terlaris Dinding.</h4>
    <table class="table-header">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Produk</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Varian</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Terjual</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Produk 1</td>
                <td class="text-center">Meja, Dataran</td>
                <td class="text-center">Merah</td>
                <td class="text-center">Rp. 200,000</td>
                <td class="text-center">14x</td>
            </tr>
            <tr>
              <td class="text-center">1</td>
              <td class="text-center">Produk 1</td>
              <td class="text-center">Meja, Dataran</td>
              <td class="text-center">Merah</td>
              <td class="text-center">Rp. 200,000</td>
              <td class="text-center">14x</td>
          </tr>
        </tbody>
    </table>

    <hr>

    <h4 class="mt-3 fw-bold mb-3">Rating & Ulasan pelanggan tanggal 29 - 30 Agustus 2023.</h4>
    <table class="table-header">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pelanggan	</th>
                <th class="text-center">Rating Pelanggan	</th>
                <th class="text-center">Ulasan Pelanggan	</th>
                <th class="text-center">Waktu Memberi Ulasan                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Jhon doe</td>
                <td class="text-center">5</td>
                <td class="text-center">Produk baik</td>
                <td class="text-center">2024-06-29</td>
            </tr>
            <tr>
              <td class="text-center">1</td>
              <td class="text-center">Jhon doe</td>
              <td class="text-center">5</td>
              <td class="text-center">Produk baik</td>
              <td class="text-center">2024-06-29</td>
          </tr>
        </tbody>
    </table>

    <hr>

    <h4 class="mt-3 fw-bold mb-3">Data Lengkap Penjualan tanggal 29 - 30 Agustus 2023.</h4>
    <table class="table-header">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pelanggan	</th>
                <th class="text-center">Alamat		</th>
                <th class="text-center">Produk	</th>
                <th class="text-center">Pembayaran                </th>
                <th class="text-center">Waktu Pembayaran	</th>
                <th class="text-center">Sub Total	</th>
                <th class="text-center">Diskon	</th>
                <th class="text-center">Total Keseluruhan	</th>




            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Jhon doe</td>
                <td class="text-center">aaaaaaaaaaaaaaa</td>
                <td class="text-center">Sofa,  merah</td>
                <td class="text-center">Transfer Bank</td>
                <td class="text-center">2024-06-29</td>
                <td class="text-center">Rp 100.000.000</td>
                <td class="text-center">-</td>
                <td class="text-center">Rp 100.000.000</td>
            </tr>
            <tr>
              <td class="text-center">1</td>
              <td class="text-center">Jhon doe</td>
              <td class="text-center">aaaaaaaaaaaaaaa</td>
              <td class="text-center">Sofa,  merah</td>
              <td class="text-center">Transfer Bank</td>
              <td class="text-center">2024-06-29</td>
              <td class="text-center">Rp 100.000.000</td>
              <td class="text-center">-</td>
              <td class="text-center">Rp 100.000.000</td>
          </tr>
        </tbody>
    </table>
<br>
</div>

</body>
</html>
