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
    <h1>Program Flash Sale</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active">
          Program Flash Sale
        </li>
      </ol>
    </nav>
  </div>
  <section class="section dashboard">
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="card-title">{sale.title}</h5>
              <h5>
                <small class="badge badge-pill {sale.statusClass}">
                  {sale.status}
                </small>
              </h5>
            </div>
            <p class="card-text">
              <div class="d-flex justify-content-between">
                <p><b>Waktu Mulai</b></p>
                <span class="text-muted">{sale.startTime}</span>
              </div>
              <div class="d-flex justify-content-between">
                <p><b>Waktu Berakhir</b></p>
                <span class="text-muted">{sale.endTime}</span>
              </div>
              <div class="d-flex justify-content-between">
                <p><b>Total Produk</b></p>
                <span class="text-muted">{sale.totalProducts}</span>
              </div>
              <div class="d-flex justify-content-between">
                <p><b>Total Terjual</b></p>
                <span class="text-muted">{sale.totalSold}</span>
              </div>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="card-title">{sale.title}</h5>
              <h5>
                <small class="badge badge-pill {sale.statusClass}">
                  {sale.status}
                </small>
              </h5>
            </div>
            <p class="card-text">
              <div class="d-flex justify-content-between">
                <p><b>Waktu Mulai</b></p>
                <span class="text-muted">{sale.startTime}</span>
              </div>
              <div class="d-flex justify-content-between">
                <p><b>Waktu Berakhir</b></p>
                <span class="text-muted">{sale.endTime}</span>
              </div>
              <div class="d-flex justify-content-between">
                <p><b>Total Produk</b></p>
                <span class="text-muted">{sale.totalProducts}</span>
              </div>
              <div class="d-flex justify-content-between">
                <p><b>Total Terjual</b></p>
                <span class="text-muted">{sale.totalSold}</span>
              </div>
            </p>
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
            List Program Flash Sale<br />
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
