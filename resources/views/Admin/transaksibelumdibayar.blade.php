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
        <h1>Transaksi Belum Dibayar</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
              Transaksi Belum Dibayar
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
                    <h5 class="card-title">Belum Dibayar</h5>
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: rgb(242, 242, 242);">
                        <i class="bi bi-box"></i>
                      </div>
                      <div class="ps-3">
                        <h6>20</h6>
                        <span class="text-muted small pt-1">
                          Total Belum Dibayar
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