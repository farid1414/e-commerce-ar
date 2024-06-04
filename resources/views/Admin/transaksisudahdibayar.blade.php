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
        <h1>Transaksi Sudah Dibayar</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Transaksi Sudah Dibayar
            </li>
          </ol>
        </nav>
      </div>
    <section class="section dashboard">
      <div class="row">
          <!-- Card Informasi Atas -->
          <section class="section dashboard">
            <div class="row">
              <div class="col-sm-4">
                <div class="card info-card sales-card">
                  <!-- Jumlah Pelanggan -->
                  <div class="card-body">
                    <h5 class="card-title">Sudah Dibayar</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                        <i class="bi bi-box"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1">
                          Total Sudah dibayar
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card info-card revenue-card">
                  <!-- Jumlah Terjual -->
                  <div class="card-body">
                    <h5 class="card-title">Invoice</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1" style="font-size: 13px;">
                          Total Invoice
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
           <!-- Isi Konten Produk Dataran -->
           <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div class="card-title">
                  List Transaksi Sudah dibayar<br />
                  <span>Manajemen transaksi sudah dibayar
                  </span>
                </div>
              </div>
             
              <div>
                <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title" style="font-size: 0.9rem;">No Transaksi AR-F/TRX-20230815-0002</h5>
                                <h5 class="card-title" style="font-size: 0.9rem;">Sudah Dibayar</h5>
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
                                                <a href="/Detailakunpelanggan" class="text-primary fw-bold">Jhon Doe 1</a>
                                            </td>
                                            <td class="text-center" style="font-size: 0.85rem;">AR-F/ORD-20230815-0002</td>
                                            <td class="text-center">2023-15-05 11:10</td>
                                            <td class="text-center">2 Produk</td>
                                            <td class="text-center fw-bold">Rp 3.010.000</td>
                                            <td class="text-center">
                                                <a href="/Detailtransaksisudahdibayar" class="btn btn-link" style="text-decoration: none;">Lihat</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title" style="font-size: 0.9rem;">No Transaksi AR-F/TRX-20230815-0004</h5>
                                <h5 class="card-title" style="font-size: 0.9rem;">Sudah Dibayar</h5>
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
                                                <a href="/Detailakunpelanggan" class="text-primary fw-bold">Jhon Doe 2</a>
                                            </td>
                                            <td class="text-center" style="font-size: 0.85rem;">AR-F/ORD-20230815-0004</td>
                                            <td class="text-center">2023-15-05 11:10</td>
                                            <td class="text-center">2 Produk</td>
                                            <td class="text-center fw-bold">Rp 1.500.000</td>
                                            <td class="text-center">
                                                <a href="/Detailtransaksisudahbayardiskon" class="btn btn-link" style="text-decoration: none;">Lihat</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="d-flex justify-content-between align-items-center">
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