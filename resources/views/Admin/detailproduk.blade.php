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
          <!-- Card Informasi Atas -->
          <div>
            <div class="pagetitle">
              <h1>Detail Produk Sofa Arab</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Detail Produk Sofa Arab</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-8 col-sm-12">
               
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Informasi Produk</h5>
                      <table class="table table-bordered table-hover">
                        <tbody>
                          <tr>
                            <td>Status Produk</td>
                            <td style="width: 65%;">
                              <span class="badge rounded-pill bg-success text-light">
                                Produk Aktif | Produk Tampil
                              </span>
                            </td>
                          </tr>
                          <tr>
                            <td>Produk</td>
                            <td>Sofa Arab</td>
                          </tr>
                          <tr>
                            <td>Sub Nama Produk</td>
                            <td>Excepteur sint occaecat cupidatat non proident.</td>
                          </tr>
                          <tr>
                            <td>Kategori</td>
                            <td>Sofa</td>
                          </tr>
                          <tr>
                            <td>Varian</td>
                            <td>Merah, Putih, Biru</td>
                          </tr>
                          <tr>
                            <td>Harga</td>
                            <td>
                              <ul>
                                <li>Merah: Rp 2.000.000</li>
                                <li>Putih: Rp 2.100.000</li>
                                <li>Biru: Rp 2.800.000</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Stok Awal</td>
                            <td>
                              <ul>
                                <li>Merah: 10</li>
                                <li>Putih: 10</li>
                                <li>Biru: 10</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Stok Saat Ini</td>
                            <td>
                              <ul>
                                <li>Merah: 8</li>
                                <li>Putih: 9</li>
                                <li>Biru: 10</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Total Terjual</td>
                            <td>2 Produk Terjual</td>
                          </tr>
                          <tr>
                            <td>Ongkos Kirim</td>
                            <td>Rp 10.000</td>
                          </tr>
                          <tr>
                            <td>Diskon Produk</td>
                            <td>
                              <ul>
                                <li>Merah: 10%</li>
                                <li>Putih: 20%</li>
                                <li>Biru: 15%</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Dimensi Produk</td>
                            <td>
                              <ul>
                                <li>Merah: Tinggi (100cm), Lebar (60cm), Panjang (100cm)</li>
                                <li>Putih: Tinggi (100cm), Lebar (60cm), Panjang (100cm)</li>
                                <li>Biru: Tinggi (80cm), Lebar (60cm), Panjang (100cm)</li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td>Deskripsi Produk</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                          </tr>
                          <tr>
                            <td>Produk Terlaris</td>
                            <td>-</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                <!-- ContentInformasiDetailProdukDiarsipkan -->
                <!-- ContentinformasiDetailProdukHabis -->
                <!-- ContentInformasiDetailProdukSegeraHabis -->



                <div class="card">
  <div class="card-body">
    <h5 class="card-title">Augmented Reality Dataran</h5>
    <table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <td>Link AR Android</td>
          <td style="width: 70%;">www....</td>
        </tr>
        <tr>
          <td>Link AR iOS</td>
          <td style="width: 70%;">www....</td>
        </tr>
        <tr>
          <td>Link SkyBox</td>
          <td style="width: 70%;">www....</td>
        </tr>
        <tr>
          <td>AR Dimensi</td>
          <td style="width: 70%;">Aktif</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

              </div>
              <div class="col-lg-4 col-sm-12">
                <!-- ContentDetailProdukGambarThumbnail -->
                <div>
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Gambar Thumbnail</h5>
                        <img src="assets/assets/img/product-1.jpg" class="d-block w-100" alt="Slide 1" style="border-radius: 10px;">
                      </div>
                    </div>
                  </div>
                  


                <!-- ContentDetailProdukGambarPendukung -->
                <div>
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Gambar Pendukung</h5>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="assets/assets/img/product-4.jpg" class="d-block w-100" alt="Slide 1" style="border-radius: 10px;">
                            </div>
                            <div class="carousel-item">
                              <img src="assets/assets/img/product-2.jpg" class="d-block w-100" alt="Slide 2" style="border-radius: 10px;">
                            </div>
                            <div class="carousel-item">
                              <img src="assets/assets/img/product-3.jpg" class="d-block w-100" alt="Slide 3" style="border-radius: 10px;">
                            </div>
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  
              </div>
            </div>
          </div>





    </div>
  </main><!-- End #main -->

                @include('admin.komponenadmin.footer')
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.include.script')



</body>

</html>