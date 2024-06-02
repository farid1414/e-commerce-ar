<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('admin.include.style')
</head>

<body>

 @include('admin.komponenadmin.header')
@include('admin.komponenadmin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
            
      <!-- Total Pelanggan Keseluruhan -->
            <div class="col-xl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Pelanggan Keseluruhan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
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
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>20</h6>
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
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>20</h6>
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
              <h6>1244</h6>
              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
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
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6>1244</h6>
              <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
            </div>
          </div>
        </div>
      </div>
     </div>

     {{-- Program Flash Sale yang berjalan --}}
<div class="col">
<div>
<div class="card info-card revenue-card">
  <div class="card-body" style="margin-bottom: -15px;">
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
            <tr>
                <td class="text-center">
                    <a href="/Detailtransaksibelumdibayar" class="text-dark fw-bold">Jhon Doe 1</a>
                </td>
                <td class="text-center">1 Produk</td>
                <td class="text-center">2001-02-21</td>
                <td class="text-center">
                    <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                        Pembayaran</span>
                </td>
                <td class="text-center">
                    <a href="/Transaksibelumbayar">Lihat</a>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <a href="/Detailtransaksibelumdibayar" class="text-dark fw-bold">Jhon Doe 2</a>
                </td>
                <td class="text-center">12 Produk</td>
                <td class="text-center">2001-02-21</td>
                <td class="text-center">
                    <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                        Pembayaran</span>
                </td>
                <td class="text-center">
                    <a href="/Transaksibelumbayar">Lihat</a>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <a href="/Detailtransaksibelumdibayar" class="text-dark fw-bold">Jhon Doe 3</a>
                </td>
                <td class="text-center">1 Produk</td>
                <td class="text-center">2001-02-21</td>
                <td class="text-center">
                    <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                        Pembayaran</span>
                </td>
                <td class="text-center">
                    <a href="/Transaksibelumbayar">Lihat</a>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <a href="/Detailtransaksibelumdibayar" class="text-dark fw-bold">Jhon Doe 4</a>
                </td>
                <td class="text-center">1 Produk</td>
                <td class="text-center">2001-02-21</td>
                <td class="text-center">
                    <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                        Pembayaran</span>
                </td>
                <td class="text-center">
                    <a href="/Transaksibelumbayar">Lihat</a>
                </td>
            </tr>
            <tr>
                <td class="text-center">
                    <a href="/Detailtransaksibelumdibayar" class="text-dark fw-bold">Jhon Doe 5</a>
                </td>
                <td class="text-center">1 Produk</td>
                <td class="text-center">2001-02-21</td>
                <td class="text-center">
                    <span class="badge bg-primary" style="white-space: pre-line">Menunggu
                        Pembayaran</span>
                </td>
                <td class="text-center">
                    <a href="/Transaksibelumbayar">Lihat</a>
                </td>
            </tr>
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
              <tr>
                <td class="text-center"><img src="assets/assets/img/product-1.jpg" alt="Meja Gaming"></td>
                <td class="text-center">Meja Gaming<br><span>Varian : -</span></td>
                <td class="text-center fw-bold">Meja<br><small>Dataran</small></td>
                <td class="text-center">Rp 1.200.000</td>
                <td class="text-center fw-bold">20x</td>
              </tr>
              <!-- Repeat the above <tr> block for other products -->
              <!-- Remember to update image source, product details, and other data accordingly -->
            </tbody>
          </table>
        </div>
      </div>


<div style="margin-top: -15px;">
<!-- Card Produk Yang Telah Habis (Stok = 0) -->
<h5 class="card-title">Produk Yang Segera Habis (Stok &lt; 5)</h5>
<div class="row">
<div class="col-md-6">
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title">Furnitur Pada Dataran</h5>
            <!-- Contentdataransegerahabis / ContentprodukdataransegerahabisPC -->
            <!-- Silakan letakkan konten Anda di sini -->
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title">Furnitur Pada Dinding</h5>
            <!-- ContentprodukdindingsegerahabisPC -->
            <!-- Silakan letakkan konten Anda di sini -->
        </div>
    </div>
</div>
</div>
</div>


<div style="margin-top: -15px;">
<!-- Card Produk Yang Telah Habis (Stok = 0) -->
<h5 class="card-title">Produk Yang Telah Habis (Stok = 0)</h5>
<div class="row">
<div class="col-md-6">
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title">Furnitur Pada Dataran</h5>
            <!-- Contentdataransegerahabis / ContentprodukdataransegerahabisPC -->
            <!-- Silakan letakkan konten Anda di sini -->
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card top-selling overflow-auto">
        <div class="card-body pb-0">
            <h5 class="card-title">Furnitur Pada Dinding</h5>
            <!-- ContentprodukdindingsegerahabisPC -->
            <!-- Silakan letakkan konten Anda di sini -->
        </div>
    </div>
</div>
</div>
</div>

    </div>
    </div>
      </div>

      
    </section>
  </main><!-- End #main -->

                @include('admin.komponenadmin.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.include.script')



</body>

</html>