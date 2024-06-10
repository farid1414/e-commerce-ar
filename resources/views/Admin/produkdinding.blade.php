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
            <h5 class="card-title">Produk Aktif</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                <i class="bi bi-box"></i>
              </div>
              <div class="ps-3">
                <h6>20</h6>
                <span class="text-muted small pt-1">
                  Total Produk Aktif
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
            <h5 class="card-title">Produk Segera Habis</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-box-seam"></i>
              </div>
              <div class="ps-3">
                <h6>20</h6>
                <span class="text-muted small pt-1" style="font-size: 13px;">
                  Total Produk Segera Habis
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card info-card customers-card">
          <!-- Jumlah Total Terjual -->
          <div class="card-body">
            <h5 class="card-title">Produk Habis</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-dropbox"></i>
              </div>
              <div class="ps-3">
                <h6>25</h6>
                <span class="text-muted small pt-1">
                  Total Produk Habis
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card info-card customers-card">
          <!-- Jumlah Total Terjual -->
          <div class="card-body">
            <h5 class="card-title">Produk Diarsipkan</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(232, 232, 232);">
                <i class="bi bi-box-fill" style="color: rgb(173, 173, 173);"></i>
              </div>
              <div class="ps-3">
                <h6>25</h6>
                <span class="text-muted small pt-1">
                  Total Produk Diarsipkan
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card info-card customers-card">
          <!-- Jumlah Total Terjual -->
          <div class="card-body">
            <h5 class="card-title">Total Keseluruhan</h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(255, 254, 217);">
                <i class="bi bi-boxes" style="color: rgb(255, 206, 69);"></i>
              </div>
              <div class="ps-3">
                <h6>200<span style="font-size: 1.2rem;"> Produk</span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-grid gap-2">
        <button class="btn btn-primary btn-lg" type="button">Tambah Produk</button>
      </div>
    <!-- Isi Konten Produk Dataran -->
    <div class="card mt-4">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="card-title">
            List Produk Furnitur Dinding <br />
            <span>Manajemen Produk Anda</span>
          </div>
        </div>
        <div class="d-none d-md-block">
          <div class="card top-selling overflow-auto mt-4">
            <div class="card-body pb-0">
              <div class="d-flex justify-content-between">
                <div class="card-title">
                  Produk Aktif <span></span>
                </div>
                <div class="card-title">
                  <span> 2 Produk </span>
                </div>
              </div>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="text-center">
                      Gambar
                    </th>
                    <th class="text-center">
                      Produk
                    </th>
                    <th class="text-center">
                      Varian
                    </th>
                    <th class="text-center">
                      Harga
                    </th>
                    <th class="text-center">
                      Kategori
                    </th>
                    <th class="text-center">
                      Stok Awal
                    </th>
                    <th class="text-center">
                      Stok Sekarang
                    </th>
                    <th class="text-center">
                      Terjual
                    </th>
                    <th class="text-center">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <a href="#">
                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
                      </a>
                    </td>
                    <td class="text-center font-weight-bold">
                      Sofa
                    </td>
                    <td class="text-center">
                      -
                    </td>
                    <td class="text-center">
                      Rp 1.200.000
                    </td>
                    <td class="text-center">
                      Meja
                    </td>
                    <td class="text-center">
                      10
                    </td>
                    <td class="text-center">
                      8
                    </td>
                    <td class="text-center">
                      2X
                    </td>
                    <td class="text-start">
                      <button class="btn btn-link" style="text-decoration:none;">Update Stok</button>
                      <br />
                      <a href="/edit-product">
                        <button class="btn btn-link" style="text-decoration:none;">Ubah</button>
                      </a>
                      <br />
                      <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Lainnya
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Hapus Produk</a></li>
                          <li><a class="dropdown-item" href="#">Arsipkan Produk</a></li>
                          <li><a class="dropdown-item" href="#">Lihat Detail Produk</a></li>
                        </ul>
                      </div>                       
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <a href="#">
                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
                      </a>
                    </td>
                    <td class="text-center font-weight-bold">
                      Meja
                    </td>
                    <td class="text-center">
                      Hijau
                    </td>
                    <td class="text-center">
                      Rp 900.000
                    </td>
                    <td class="text-center">
                      Meja
                    </td>
                    <td class="text-center">
                      15
                    </td>
                    <td class="text-center">
                      12
                    </td>
                    <td class="text-center">
                      3X
                    </td>
                    <td class="text-start">
                      <button class="btn btn-link" style="text-decoration:none;">Update Stok</button>
                      <br />
                      <a href="/edit-product">
                        <button class="btn btn-link" style="text-decoration:none;">Ubah</button>
                      </a>
                      <br />
                      <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Lainnya
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Hapus Produk</a></li>
                          <li><a class="dropdown-item" href="#">Arsipkan Produk</a></li>
                          <li><a class="dropdown-item" href="#">Lihat Detail Produk</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between align-items-center">
                <div class="form-group showperpage">
                  <label class="form-label">Show per page:</label>
                  <select class="form-control form-control-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                </div>
                <div class="pagination-info">
                  1 - 2 of 2 items
                </div>
              </div>
            </div>
          </div>
          


          {{-- Produk Segera Habis --}}
          <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
                <div class=" d-none d-md-block">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">Produk Aktif Segera Habis (Stok {"<"} 5)</div>
                        <div class="card-title">
                            <span>1 Produk </span>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between d-block d-md-none">
                  <div class="card-title" style="font-size: 1rem;">
                    Produk Aktif Segera <br />
                    Habis (Stok &lt; 5)
                </div>                        
                    <div class="card-title">
                        <span class="d-block d-md-none" style="font-size: 0.8rem;"> Produk Tampil </span>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Varian</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Stok Awal</th>
                            <th class="text-center">Stok Sekarang</th>
                            <th class="text-center">Terjual</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <a href="#">
                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
                                </a>
                            </td>
                            <td class="text-center fw-bold">Meja Makan</td>
                            <td class="text-center">-</td>
                            <td class="text-center">Rp 1.200.000</td>
                            <td class="text-center">Meja</td>
                            <td class="text-center">12</td>
                            <td class="text-center">4</td>
                            <td class="text-center">2X</td>
                            <td class="text-start">
                                <button class="btn btn-link" style="text-decoration:none;">Update Stok</button>
                                <br />
                                <a href="/edit-product">
                                    <button class="btn btn-link" style="text-decoration:none;">Ubah</button>
                                </a>
                                <br />
                                <div class="dropdown">
                                  <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Lainnya
                                  </button>
                                  <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Hapus Produk</a></li>
                                    <li><a class="dropdown-item" href="#">Arsipkan Produk</a></li>
                                    <li><a class="dropdown-item" href="#">Lihat Detail Produk</a></li>
                                  </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
        
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-group showperpage">
                            <label class="form-label">Show per page:</label>
                            <select class="form-control" size="sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="pagination-info">
                            1 - 1 of 1 items
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

{{-- Produk Diarsipkan --}}
<div class="card top-selling overflow-auto">
<div class="card-body pb-0">
<div class="d-none d-md-block">
  <div class="d-flex justify-content-between">
      <div class="card-title">Produk Habis (Stok = 0) dan Diarsipkan</div>
      <div class="card-title">
          <span>1 Produk </span>
      </div>
  </div>
</div>

<div class="d-flex justify-content-between d-block d-md-none">
  <div class="card-title" style="font-size: 1rem;">
      Produk Habis (Stok = 0) <br /> dan Diarsipkan
  </div>
  <div class="card-title">
      <span class="d-block d-md-none" style="font-size: 0.8rem;"> Tidak <br /> Ditampilkan </span>
  </div>
</div>
<table class="table table-bordered table-hover">
  <thead>
      <tr>
          <th scope="col" class="text-center">Gambar</th>
          <th scope="col" class="text-center">Produk</th>
          <th scope="col" class="text-center">Varian</th>
          <th scope="col" class="text-center">Harga</th>
          <th scope="col" class="text-center">Kategori</th>
          <th scope="col" class="text-center">Stok Awal</th>
          <th scope="col" class="text-center">Stok Sekarang</th>
          <th scope="col" class="text-center">Terjual</th>
          <th scope="col" class="text-center">Aksi</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td class="text-center">
              <a href="#">
                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
              </a>
          </td>
          <td class="text-center">
              <p class="text-dark fw-bold text-muted" style="margin-bottom: 1.5px;">Kursi</p>
              <span class="text-danger">(Habis)</span>
          </td>
          <td class="text-center">
              <div class="text-center">Putih</div>
              <div class="text-center">Hitam</div>
          </td>
          <td class="text-center" style="font-size: 0.75rem;">
              <div class="text-center">Rp 1.200.000</div>
              <div class="text-center">Rp 900.000</div>
          </td>
          <td class="text-center">Meja</td>
          <td class="text-center">
              <div class="text-center">9</div>
              <div class="text-center">2</div>
          </td>
          <td class="text-center">
              <div class="text-center">0</div>
              <div class="text-center">0</div>
          </td>
          <td class="text-center">2X</td>
          <td>
              <button class="btn btn-link" style="text-decoration: none;">Update Stok</button>
              <br />
              <button class="btn btn-link" style="text-decoration: none;">Ubah</button>
              <br />

              
              <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Lainnya
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Hapus Produk</a></li>
                  <li><a class="dropdown-item" href="#">Lihat Detail Produk</a></li>
                </ul>
              </div>
          </td>
      </tr>
      <tr>
          <td class="text-center">
              <a href="#">
                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
              </a>
          </td>
          <td class="text-center">
              <p class="text-dark fw-bold text-muted" style="margin-bottom: 1.5px;">Kursi Gaming</p>
              <span class="text-success">(Diarsipkan)</span>
          </td>
          <td class="text-center">
              <div class="text-center">-</div>
          </td>
          <td class="text-center" style="font-size: 0.75rem;">
              <div class="text-center">Rp 1.200.000</div>
          </td>
          <td class="text-center">Meja</td>
          <td class="text-center">
              <div class="text-center">4</div>
          </td>
          <td class="text-center">
              <div class="text-center">4</div>
          </td>
          <td class="text-center">2X</td>
          <td>
              <button class="btn btn-link" style="text-decoration: none;">Aktifkan</button>
              <br />
              <button class="btn btn-link" style="text-decoration: none;">Ubah</button>
              <br />


              <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Lainnya
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Hapus Produk</a></li>
                  <li><a class="dropdown-item" href="#">Update Stok</a></li>
                  <li><a class="dropdown-item" href="#">Lihat Detail Produk</a></li>
                </ul>
              </div>
          </td>
      </tr>
  </tbody>
</table>
<div class="card-footer">
  <div class="d-flex justify-content-between align-items-center">
      <div class="form-group showperpage">
          <label class="form-label">Show per page:</label>
          <select class="form-control" size="sm">
              <option value="10">10</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
          </select>
      </div>
      <div class="pagination-info">
          1 - 2 of 2 items
      </div>
  </div>
</div>
</div>
</div>
      </div>
    </div>
</div>
    </div>
</section>


@stop