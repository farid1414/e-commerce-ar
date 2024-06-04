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
        <h1>Kategori Furnitur Pada Dataran</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Kategori Furnitur Pada Dataran
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
                    <h5 class="card-title">Kategori Aktif</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                        <i class="bi bi-box"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1">
                          Total Kategori Aktif
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
                    <h5 class="card-title">Kategori Diarsipkan</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1" style="font-size: 13px;">
                          Total Kategori Diarsipkan
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
                    <h5 class="card-title">Total Keseluruhan</h5>
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
            
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="button">Tambah Kategori</button>
              </div>
            <!-- Isi Konten Produk Dataran -->
            <div class="card mt-4">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="card-title">
                    List Kategori Furnitur Dataran <br />
                    <span>Manajemen Kategori Anda</span>
                  </div>
                </div>
                <div class="d-none d-md-block">
                 
                  <div class="card top-selling overflow-auto mt-4">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <div class="card-title">Kategori Aktif</div>
                            <div class="card-title">
                                <span>1 Kategori</span>
                            </div>
                        </div>
                
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Nama Kategori</th>
                                    <th class="text-center">Total Produk</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">
                                      <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
                                    </td>
                                    <td class="text-center fw-bold">Meja</td>
                                    <td class="text-center">
                                        <a class="text-dark fw-bold">
                                            8 <br />
                                            <small>Produk</small>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-dark fw-bold text-center">Admin 1 <br />
                                            <small>09/30/2023 23:59:00</small>
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-link" style="text-decoration: none;" onclick="handleArchiveClick()">Arsipkan</button>
                                        <br />
                                        <button class="btn btn-link" style="text-decoration: none;">Ubah</button>
                                        <br />

                                        <div class="dropdown">
                                          <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Lainnya
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Hapus Kategori</a></li>
                                            <li><a class="dropdown-item" href="#">Lihat Detail Kategori</a></li>
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
                                <div class="pagination-info">1 - 1 of 1 items</div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card top-selling overflow-auto mt-4">
                  <div class="card-body pb-0">
                      <div class="d-flex justify-content-between">
                          <div class="card-title">Kategori Non-aktif / Diarsipkan</div>
                          <div class="card-title">
                              <span>1 Produk</span>
                          </div>
                      </div>
              
                      <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th class="text-center">Kategori</th>
                                  <th class="text-center">Nama Kategori</th>
                                  <th class="text-center">Total Produk</th>
                                  <th class="text-center">Dibuat Oleh</th>
                                  <th class="text-center">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="text-center">
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" width="50" alt="" class="img-fluid"  />
                                  </td>
                                  <td class="text-center">
                                      <a href="#" class="text-primary fw-bold">Meja</a>
                                  </td>
                                  <td class="text-center">
                                      <a class="text-dark fw-bold">8 <br /><small>Produk</small></a>
                                  </td>
                                  <td class="text-center">
                                      <a class="text-dark fw-bold">Admin 1 <br /><small>09/30/2023 23:59:00</small></a>
                                  </td>
                                  <td>
                                      <button class="btn btn-link" style="text-decoration: none;" onclick="handleActivateClick()">Aktifkan</button>
                                      <br />
                                      <button class="btn btn-link" style="text-decoration: none;">Ubah</button>
                                      <br />
                                      <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle" style="text-decoration:none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Lainnya
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Hapus Kategori</a></li>
                                          <li><a class="dropdown-item" href="#">Lihat Detail Kategori</a></li>
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
                              <div class="pagination-info">1 - 1 of 1 items</div>
                          </div>
                      </div>
                  </div>
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