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
            <h1>Data Akun</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">
                  Data Akun
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
                    <h5 class="card-title">Akun Admin</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                        <i class="bi bi-box"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1">
                          Total Akun Admin
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
                    <h5 class="card-title">Admin Non-Aktif</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1" style="font-size: 13px;">
                          Total Admin Non-Aktif
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
                    <h5 class="card-title">Pelanggan</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-dropbox"></i>
                      </div>
                      <div class="ps-3">
                        <h6>25</h6>
                        <span class="text-muted small pt-1">
                          Total Akun Pelanggan
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
                    <h5 class="card-title">Pelanggan di hapus</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-dropbox"></i>
                      </div>
                      <div class="ps-3">
                        <h6>25</h6>
                        <span class="text-muted small pt-1">
                          Total Pelanggan dihapus
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg" type="button">Tambah Admin</button>
              </div>
            <!-- Isi Konten Produk Dataran -->
            <div class="card mt-4">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="card-title">
                    List Akun Yang Terdaftar<br />
                    <span>Manajemen Akun</span>
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