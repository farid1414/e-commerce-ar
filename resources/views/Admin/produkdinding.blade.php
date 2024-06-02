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
        <h1>Produk Furnitur Pada Dinding</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Produk Furnitur Pada Dinding
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
                  <!-- Tambahkan konten tabel di sini -->
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