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
            <h1>Detail Akun Admin (Anda)</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail akun admin (Anda)</li>
                </ol>
            </nav>
        </div>
        <h5 class="card-title">Informasi Akun</h5>
        
        <section class="section dashboard">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-person-badge"></i> Informasi Admin
                    </h5>
                    <p class="text-muted">Jhon Doe 1</p>
                    <p class="text-muted">JhonDoe1@gmail.com</p>
                    <p class="text-muted">081213133187</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-person-lines-fill me-2"></i> Informasi Akun
                    </h5>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="text-muted">Waktu Ditambahkan</p>
                        <p class="text-muted" style="font-size: 0.9rem;">2023-06-21 12:20</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="text-muted">Terakhir Login</p>
                        <p class="text-muted" style="font-size: 0.9rem;">2023-06-21 22:20</p>
                    </div>
                    <h5 class="card-title">
                        <i class="bi bi-person-exclamation me-2"></i>Status Akun
                    </h5>
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="bi bi-check-lg me-2"></i>
                        <div>Akun Aktif</div>
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