<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tambah Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('admin.include.style')
</head>

<body>

 @include('admin.komponenadmin.header')
@include('admin.komponenadmin.sidebar')

  <main id="main" class="main">
                <div class="pagetitle">
              <h1>Detail Akun (Jhon Doe 1)</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail akun pelanggan</li>
                </ol>
              </nav>
            </div>
            <section class="section dashboard">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    <i class="bi bi-geo-alt-fill"></i> Informasi Pelanggan
                  </h5>
                  <p style="margin-bottom: 4px;" class="text-muted">Jhon Doe 2</p>
                  <p style="margin-bottom: 4px;" class="text-muted">JhonDoe2@gmail.com</p>
                  <p style="margin-bottom: 4px;" class="text-muted">081213133187</p>
                  <p class="text-muted">Jl. Mangga BesarSikep, Keboansikep, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254</p>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    <i class="bi bi-person-lines-fill me-2"></i> Informasi Akun
                  </h5>
                  <div class="d-flex justify-content-between" style="margin-bottom: -10px;">
                    <p class="text-muted">Waktu Registrasi</p>
                    <p class="text-muted" style="font-size: 0.9rem;">2023-06-21 12:20</p>
                  </div>
                  <div class="d-flex justify-content-between" style="margin-bottom: -10px;">
                    <p class="text-muted">Terakhir Login</p>
                    <p class="text-muted" style="font-size: 0.9rem;">2023-06-21 22:20</p>
                  </div>
                  <div class="d-flex justify-content-between" style="margin-bottom: -10px;">
                    <p class="text-muted">Produk Yang Dibeli (Lunas)</p>
                    <p class="text-end text-muted" style="font-size: 0.9rem;">10 Produk</p>
                  </div>
                </div>
              </div>

<div class="card-title">
    Pesanan yang dipesan
</div>

              <div class="contentpesananyangdipesan">
                <!-- Isi dari Contentpesananyangdipesan -->
                {{-- Lunas --}}
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Kuantitas</th>
                            <th class="text-center">Sub Total Harga</th>
                            <th class="text-center">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">
                              <img src="assets/assets/img/product-1.jpg" alt="" style="max-width: 100px; border-radius: 10px;">
                            </td>
                            <td>
                              <div class="text-dark fw-bold">
                                Produk 1 <br>
                                <small style="font-size: 0.8rem;">Varian: Biru</small>
                              </div>
                            </td>
                            <td class="text-center">Meja</td>
                            <td class="text-center">2 Produk</td>
                            <td class="text-center fw-bold">Rp 3.010.000</td>
                            <td class="text-center">
                                <span class="badge text-bg-success">Lunas</span>

                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="d-flex justify-content-between">
                        <p>Harga satuan :</p>
                        <p>Rp 1.500.000</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Sub Total Produk :</p>
                        <p>Rp 3.000.000</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Ongkos Kirim :</p>
                        <p>Rp 5.000</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Sub Total Ongkos Kirim :</p>
                        <p>Rp 10.000</p>
                      </div>
                      <hr style="margin-top: -5px;">
                      <div class="d-flex justify-content-between">
                        <p>No Pesanan :</p>
                        <p>AR-F/ORD-20230815-0001</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>No Transaksi :</p>
                        <p>AR-F/TRX-20230815-0001</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Waktu Pemesanan:</p>
                        <p class="text-muted">10-05-2023 00:18</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Waktu Pembayaran:</p>
                        <p class="text-muted">11-05-2023 07:30</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Status Pembayaran :</p>
                        <p>Lunas</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Metode Pembayaran :</p>
                        <p>BCA</p>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between">
                        <p><b>Total Keseluruhan :</b></p>
                        <p>Produk 1, 2x, Biru, <b>Rp 3.010.000</b></p>
                      </div>
                    </div>
                  </div>
                  

{{-- Belum dibayar --}}

<div class="card">
    <div class="card-body">
      <h5 class="card-title"></h5>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">Produk</th>
            <th class="text-center">Nama Produk</th>
            <th class="text-center">Kategori</th>
            <th class="text-center">Kuantitas</th>
            <th class="text-center">Sub Total Harga</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">
              <img src="assets/assets/img/product-1.jpg" alt="" style="max-width: 100px; border-radius: 10px;">
            </td>
            <td>
              <div class="text-dark fw-bold">
                Produk 1 <br>
                <small style="font-size: 0.8rem;">Varian: Biru</small>
              </div>
            </td>
            <td class="text-center">Meja</td>
            <td class="text-center">2 Produk</td>
            <td class="text-center fw-bold">Rp 3.010.000</td>
            <td class="text-center">
                <span class="badge text-bg-primary">Menunggu <br> Pembayaran</span>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="d-flex justify-content-between">
        <p>Harga satuan :</p>
        <p>Rp 1.500.000</p>
      </div>
      <div class="d-flex justify-content-between">
        <p>Sub Total Produk :</p>
        <p>Rp 3.000.000</p>
      </div>
      <div class="d-flex justify-content-between">
        <p>Ongkos Kirim :</p>
        <p>Rp 5.000</p>
      </div>
      <div class="d-flex justify-content-between">
        <p>Sub Total Ongkos Kirim :</p>
        <p>Rp 10.000</p>
      </div>
      <hr style="margin-top: -5px;">
      <div class="d-flex justify-content-between">
        <p>No Pesanan :</p>
        <p>AR-F/ORD-20230815-0001</p>
      </div>
      <div class="d-flex justify-content-between">
        <p>No Transaksi :</p>
        <p>AR-F/TRX-20230815-0001</p>
      </div>
      <div class="d-flex justify-content-between">
        <p>Waktu Pemesanan:</p>
        <p class="text-muted">10-05-2023 00:18</p>
      </div>
      <div class="d-flex justify-content-between">
        <p>Status Pembayaran :</p>
        <p>Menunggu Pembayaran</p>
      </div>
      <hr>
      <div class="d-flex justify-content-between">
        <p>
          <b> Total Keseluruhan :</b>
        </p>
        <!-- Nama Produk -->
        <p> Produk 1,</p>
        <!-- Jumlah kuantitas -->
        <p> 2x,</p>
        <!-- Varian Produk -->
        <p>Biru,</p>
        <!-- Total Keseluruhan Harga -->
        <p>
          <b> Rp 3.010.000</b>
        </p>
      </div>
    </div>
  </div>
  



                {{-- Dibtalakan --}}
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title"></h5>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Kuantitas</th>
                            <th class="text-center">Sub Total Harga</th>
                            <th class="text-center">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">
                              <img src="assets/assets/img/product-1.jpg" alt="" style="max-width: 100px; border-radius: 10px;">
                            </td>
                            <td>
                              <div class="text-dark fw-bold">
                                Produk 1 <br>
                                <small style="font-size: 0.8rem;">Varian: Biru</small>
                              </div>
                            </td>
                            <td class="text-center">Meja</td>
                            <td class="text-center">2 Produk</td>
                            <td class="text-center fw-bold">Rp 3.010.000</td>
                            <td class="text-center">
                                
                                <span class="badge text-bg-danger">Dibatalkan</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <hr>
                      <div class="d-flex justify-content-between">
                        <p>No Pengajuan Pembatalan :</p>
                        <p class="fw-bold">AR-F/ORD/C4NC3L-20230815-0001</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Diminta Oleh :</p>
                        <p class="text-muted">Pembeli</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Diminta Pada :</p>
                        <p class="text-muted">26-09-2023 00:51</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Alasan :</p>
                        <p class="text-muted">Lainnya/ berubah pikiran</p>
                      </div>
                      <hr style="margin-top: -5px;">
                      <div class="d-flex justify-content-between">
                        <p>Harga satuan :</p>
                        <p>Rp 1.500.000</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Sub Total Produk :</p>
                        <p>Rp 3.000.000</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Ongkos Kirim :</p>
                        <p>Rp 5.000</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Sub Total Ongkos Kirim :</p>
                        <p>Rp 10.000</p>
                      </div>
                      <hr style="margin-top: -5px;">
                      <div class="d-flex justify-content-between">
                        <p>No Pesanan :</p>
                        <p class="fw-bold">AR-F/ORD-20230815-0001</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>No Transaksi :</p>
                        <p class="fw-bold">AR-F/TRX-20230815-0001</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Waktu Pemesanan :</p>
                        <p class="text-muted">10-05-2023 00:18</p>
                      </div>
                      <div class="d-flex justify-content-between">
                        <p>Status Pemesanan :</p>
                        <p>Dibatalkan</p>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-between">
                        <p>
                          <b> Total Keseluruhan :</b>
                        </p>
                        <!-- Nama Produk -->
                        <p> Produk 1,</p>
                        <!-- Jumlah kuantitas -->
                        <p> 2x,</p>
                        <!-- Varian Produk -->
                        <p>Biru,</p>
                        <!-- Total Keseluruhan Harga -->
                        <p>
                          <b> Rp 3.010.000</b>
                        </p>
                      </div>
                    </div>
                  </div>

                  


              </div>
            </section>
          


        </div>
  </main><!-- End #main -->

                @include('admin.komponenadmin.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.include.script')



</body>

</html>