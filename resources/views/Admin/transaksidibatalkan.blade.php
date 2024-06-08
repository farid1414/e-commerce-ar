{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <!-- Card Informasi Atas -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-sm-4">
          <div class="card info-card sales-card">
            <!-- Jumlah Pelanggan -->
            <div class="card-body">
              <h5 class="card-title">Dibatalkan</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                  <i class="bi bi-box"></i>
                </div>
                <div class="ps-3">
                  <h6>20</h6>
                  <span class="text-muted small pt-1">
                    Total Dibatalkan
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
            List Rating dan Ulasan<br />
            <span>Manajemen Rating & Ulasan Pelanggan
            </span>
          </div>
        </div>
       
        
        <div>
          <div class="d-flex justify-content-between">
              <h4 class="card-title" style="font-size: 1.2rem;">Dibatalkan</h4>
              <h5 class="card-title" style="font-size: 0.9rem;">2 Transaksi</h5>
          </div>
      
          <div>
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <h5 class="card-title" style="font-size: 0.9rem;">No Transaksi AR-F/TRX-20230815-0002</h5>
                          <h5 class="card-title" style="font-size: 0.9rem;">Dibatalkan</h5>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th class="text-center">Nama</th>
                                      <th class="text-center">No Pesanan</th>
                                      <th class="text-center">Waktu Pemesanan</th>
                                      <th class="text-center">QTY</th>
                                      <th class="text-center">Total Pesanan</th>
                                      <th class="text-center">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="text-center">
                                          <a href="/Detailtransaksidibatalkan" class="text-primary fw-bold">Jhon Doe 1</a>
                                      </td>
                                      <td class="text-center">AR-F/ORD-20230815-0002</td>
                                      <td class="text-center">2023-15-05 11:10</td>
                                      <td class="text-center">2 Produk</td>
                                      <td class="text-center fw-bold">Rp 3.010.000</td>
                                      <td class="text-center">
                                          <a href="/Detailtransaksidibatalkan" class="btn btn-link" style="text-decoration: none;">Lihat</a>
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
                          <h5 class="card-title" style="font-size: 0.9rem;">Dibatalkan</h5>
                      </div>
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover">
                              <thead>
                                  <tr>
                                      <th class="text-center">Nama</th>
                                      <th class="text-center">No Pesanan</th>
                                      <th class="text-center">Waktu Pemesanan</th>
                                      <th class="text-center">QTY</th>
                                      <th class="text-center">Total Pesanan</th>
                                      <th class="text-center">Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td class="text-center">
                                          <a href="/Detailtransaksidibatalkandiskon" class="text-primary fw-bold">Jhon Doe 2</a>
                                      </td>
                                      <td class="text-center">AR-F/ORD-20230815-0004</td>
                                      <td class="text-center">2023-15-05 11:10</td>
                                      <td class="text-center">2 Produk</td>
                                      <td class="text-center fw-bold">
                                          Rp 1.500.000
                                          <br />
                                          <span class="badge rounded-pill text-bg-warning">Flash Sale 1.1 <i class="bi bi-lightning-fill"></i></span>
                                      </td>
                                      <td class="text-center">
                                          <a href="/Detailtransaksidibatalkandiskon" class="btn btn-link" style="text-decoration: none;">Lihat</a>
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
  </div>
</section>



@stop