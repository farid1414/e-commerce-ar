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
          <!-- Card Informasi Atas -->
          <section class="section dashboard">
            <div>
                <div class="pagetitle">
                    <h1>Tambah Produk Dataran</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Tambah Produk Dataran</li>
                        </ol>
                    </nav>
                </div>
            
                <section class="section dashboard">
                    <div class="card large-card">
                        <div class="card-body">

                            @include('admin.produk.formprodukdinding')        
                                                
                        </div>
                    </div>
                   
                </section>
            </div>
            
          </section>
        </div>
  </main><!-- End #main -->

                @include('admin.komponenadmin.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.include.script')



</body>

</html>