<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <style>
        .color-box.selected::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 5px;
        }
    
        .variant-text {
            position: absolute;
            top: 35px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 12px;
            color: #333;
            border: solid;
            width: 40px;
            border-radius: 5px;
        }
    </style>
</head>
{{-- INCLUDE & KOMPONEN --}}
@include('user.komponenuser.navbaruser')
@include('user.include.style')
@include('user.komponenuser.breadcrumb')

<body>
    <div class="container">
                   <div class="row mt-2">
                <div class="col-xs-12 col-md-8">
                    <div class="container">

                        {{-- Gambar PRODUK untuk PC --}}
                        <div class='d-none d-md-block'>
                            <div class="card" style="background-color: #F9F9F9; border: 0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" style="border-radius: 10px; max-height: 400px; max-width: 350px; width: 100%; height: 100%; object-fit: cover;" onclick="openModal(0)" />
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar2.jpg" class="img-fluid" style="border-radius: 10px;" onclick="openModal(1)" />
                                                </div>
                                                <div class="col">
                                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar3.jpg" class="img-fluid" style="border-radius: 10px;" onclick="openModal(2)" />
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col">
                                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar4.jpg" class="img-fluid" style="border-radius: 10px;" onclick="openModal(3)" />
                                                </div>
                                                <div class="col">
                                                    <div style="position: relative;">
                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar5.jpg" class="img-fluid" style="border-radius: 10px;" onclick="openModal(4)" />
                                                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center; background: rgba(115, 115, 115, 0.6); border-radius: 10px;">
                                                            <button class="btn btn-link text-white" style="text-decoration: none;" onclick="openModal(4)">+ 5 Lainnya</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              </div>    
                      
                              {{-- Gambar PRODUK untuk HP --}}
                              <div class='d-block d-lg-none'>
                                <div class="container">
                                    <!-- Gambar 1 -->
                                    <div class="card">
                                      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100 img-fluid" alt="First slide" style="max-height: 500px; object-fit: cover;">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100 img-fluid" alt="Second slide" style="max-height: 500px; object-fit: cover;">
                                          </div>
                                          <div class="carousel-item">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100 img-fluid" alt="Third slide" style="max-height: 500px; object-fit: cover;">
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
                                   
                                    <div class="container mt-4">
                                      <div class="row">
                                        <div class="col">
                                          <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 1">
                                        </div>
                                        <div class="col">
                                          <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 2">
                                        </div>
                                        <div class="col">
                                          <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 3">
                                        </div>
                                        <div class="col">
                                          <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 4">
                                        </div>
                                        <div class="col">
                                          <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 5">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div> 
                    </div>
                    <div>
                    </div>
        
                    {{-- AUGMENTED REALITYY --}}
                    <div class="mt-4">
                        <div>
                            {{-- Dataran --}}

                            {{-- @include('user.produk.ardataranpolos') --}}
                            @include('user.produk.ardataranvarian')



                            {{-- Dinding --}}

                            {{-- @include('user.produk.ardindingpolos') --}}

                        </div>
                    </div>
        
                    {{-- TENTANG PRODUK INI --}}
                    <div class="mt-4">
                        <div>
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <b>Tentang Produk Ini</b>
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      The SÖDERHAMN CHAIR is seating for extra support. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <hr />
        
                    {{-- PENILAIAN PRODUK --}}
                    <div class="mt-4">
                        <div>
                            <div>
                                <div class="mt-4">
                                    <div class="accordion" id="accordionExample2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="true" aria-controls="collapseTwo1">
                                                    <b>Penilaian Produk Ini</b>
                                                </button>
                                            </h2>
                                            <div id="collapseTwo1" class="accordion-collapse collapse show" aria-labelledby="headingTwo1" data-bs-parent="#accordionExample2">
                                                <div class="accordion-body">
                                                    <div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="col">
                                                                <p style="font-size: 3rem; text-align: center;">
                                                                    4.2<span style="font-size: 1.2rem;">/5</span>
                                                                </p>
                                                                <div class="d-flex justify-content-center">
                                                                    <i
                                                                        class="bi bi-star-fill"
                                                                        style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"
                                                                    ></i>
                                                                    <i
                                                                        class="bi bi-star-fill"
                                                                        style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"
                                                                    ></i>
                                                                    <i
                                                                        class="bi bi-star-fill"
                                                                        style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"
                                                                    ></i>
                                                                    <i
                                                                        class="bi bi-star-fill"
                                                                        style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"
                                                                    ></i>
                                                                    <i
                                                                        class="bi bi-star"
                                                                        style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"
                                                                    ></i>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <span class="text-muted" style="font-size: 0.9rem; margin-top: 10px;">
                                                                        62 Ulasan
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="d-flex align-items-center">
                                                                    <span style="margin-right: 5px;">5</span>
                                                                    <div class="progress flex-grow-1 mb-2">
                                                                        <div
                                                                            class="progress-bar bg-dark"
                                                                            role="progressbar"
                                                                            style="width: 100%;"
                                                                            aria-valuenow="100"
                                                                            aria-valuemin="0"
                                                                            aria-valuemax="100"
                                                                        ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <span style="margin-right: 5px;">4</span>
                                                                    <div class="progress flex-grow-1 mb-2">
                                                                        <div
                                                                            class="progress-bar bg-dark"
                                                                            role="progressbar"
                                                                            style="width: 75%;"
                                                                            aria-valuenow="75"
                                                                            aria-valuemin="0"
                                                                            aria-valuemax="100"
                                                                        ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <span style="margin-right: 5px;">3</span>
                                                                    <div class="progress flex-grow-1 mb-2">
                                                                        <div
                                                                            class="progress-bar bg-dark"
                                                                            role="progressbar"
                                                                            style="width: 50%;"
                                                                            aria-valuenow="50"
                                                                            aria-valuemin="0"
                                                                            aria-valuemax="100"
                                                                        ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <span style="margin-right: 5px;">2</span>
                                                                    <div class="progress flex-grow-1 mb-2">
                                                                        <div
                                                                            class="progress-bar bg-dark"
                                                                            role="progressbar"
                                                                            style="width: 25%;"
                                                                            aria-valuenow="25"
                                                                            aria-valuemin="0"
                                                                            aria-valuemax="100"
                                                                        ></div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <span style="margin-right: 5px;">1</span>
                                                                    <div class="progress flex-grow-1 mb-2">
                                                                        <div
                                                                            class="progress-bar bg-dark"
                                                                            role="progressbar"
                                                                            style="width: 0%;"
                                                                            aria-valuenow="0"
                                                                            aria-valuemin="0"
                                                                            aria-valuemax="100"
                                                                        ></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between" style="margin-top: 30px;">
                                                            <p class="fw-bold">Filter Ulasan :</p>
                                                            <div class="dropdown">
                                                                <button
                                                                    class="btn btn-outline-dark dropdown-toggle"
                                                                    type="button"
                                                                    id="dropdownMenuButton"
                                                                    data-bs-toggle="dropdown"
                                                                    aria-expanded="false"
                                                                >
                                                                    Terbaru
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            Terbaru
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            Rating Tertinggi
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="#">
                                                                            Rating Terendah
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="mt-1 text-muted">
                                                            <small>Menampilkan 10 dari 773 ulasan</small>
                                                        </p>
                                                        
                                                        <hr>
                                                        

                                                        {{-- ULASAN PELANGGGAN --}}
                                                        <div>
                                                            <div class="d-flex justify-content-between mb-1">
                                                                <h5 class="card-title">Jhon Doe 1</h5>
                                                                <span class="text-muted" style="font-size: 0.85rem;">10/03/2023</span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex justify-content-start">
                                                                        <i class="bi bi-star-fill"   style="font-size: 1.3rem; color: gold;"></i>
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mt-2 text-muted">Varian : Biru</p>
                                                            <div class="row mt-3">
                                                                <div class="col-xs-4 col-md-4 col-lg-2 mb-3">
                                                                    <div class="image-container" onclick="handleImageClick('../gambar/product-2.jpg')">
                                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid rounded" alt="Product Image">
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-4 col-md-4 col-lg-2 mb-3">
                                                                    <div class="image-container" onclick="handleImageClick('../gambar/product-5.jpg')">
                                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar2.jpg" class="img-fluid rounded" alt="Product Image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac scelerisque arcu, et placerat velit. Phasellus in nisl nisi. Nullam varius purus id justo posuere mollis.
                                                            </p>
                                                       
                                                            <div class="d-flex justify-content-end">
                                                            <button class="btn btn-outline-dark " type="button" data-bs-toggle="collapse" data-bs-target="#example-collapse-text" aria-expanded="false" aria-controls="example-collapse-text">
                                                                Lihat Balasan <i class="bi bi-chevron-down"></i>
                                                            </button>
                                                        </div>

                                                            <div id="example-collapse-text" class="collapse">
                                                                <div class="card mt-3">
                                                                    <div class="card-body">
                                                                        <div class="d-flex justify-content-between">
                                                                            <h5 class="card-title">AR-Furniture <span class="badge bg-dark" style="font-size: 0.7rem;">Penjual</span></h5>
                                                                            <p class="text-muted" style="font-size: 0.85rem;">08/03/2023</p>
                                                                        </div>
                                                                        Terima kasih atas penilaian anda, semoga produknya awet.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            
                                                            <div class="d-flex justify-content-between mb-1">
                                                                <h5 class="card-title">J********1</h5>
                                                                <span class="text-muted" style="font-size: 0.85rem;">08/03/2023</span>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="d-flex justify-content-start">
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                        <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3">
                                                                <!-- Loop over imageUrls to display images -->
                                                                <div class="col-xs-4 col-md-4 col-lg-2 mb-3">
                                                                    <div class="image-container" onclick="handleImageClick(imageUrl)">
                                                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 2/Produk2gambar2.jpg" class="img-fluid rounded" alt="Product Image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>
                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac scelerisque arcu, et placerat velit. Phasellus in nisl nisi. Nullam varius purus id justo posuere mollis.
                                                            </p>
                                                            <hr />
                                                            <nav aria-label="Page navigation example">
                                                                <ul class="pagination justify-content-end">
                                                                    <li class="page-item disabled">
                                                                        <a class="page-link">Previous</a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#">Next</a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <hr />
                            <div>
                                
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
        


                {{-- INFORMASI PRODUK --}}
                <div class="col-xs-12 col-md-4 mb-5">
                    <div class="card">
                        <div class="card-body">

                            {{-- NAMA PRODUK --}}
                            <div>
                                SÖDERHAMN CHAIR
                            </div>

                            {{-- SUB NAMA PRODUK --}}
                            <div class="mt-3">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit."
                                </p>


                                {{-- HARGA DAN RENTANG HARGA PRODUK  --}}
                                <h2 style="font-size: 1.4rem;">
                                    <b>1.500.000 - 2.000.000</b>
                                </h2>
                            </div>


                            {{-- BINTANG PRODUK --}}
                            <div class="mt-3">
                                <div class="d-flex align-items-center">
                                    <!-- Placeholder for star ratings -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start me-3">
                                                <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                                <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="font-size: 20px;">4</span>
                                </div>
                            </div>

                            {{-- VARIAN PRODUK --}}
                            <div class="mt-3">
                                <hr />
                                <p>Varian Produk</p>
                                <div class="d-flex justify-content-start">
                                    <div class="color-box" style="background-color: #ff0000; width: 30px; height: 30px; margin-right: 10px; position: relative; border-radius: 5px;">
                                        <!-- Placeholder for variant color box 1 -->
                                    </div>
                                    <div class="color-box" style="background-color: #00ff00; width: 30px; height: 30px; margin-right: 10px; position: relative; border-radius: 5px;">
                                        <!-- Placeholder for variant color box 2 -->
                                    </div>
                                </div>
                                <hr />

                                {{-- STOCK YANG TERSEDIAA --}}
                                <span>Total Stock yang tersedia: 24</span>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-outline-dark btn-lg w-100" style="border-radius: 25px;">Masukkan Keranjang</button>
                            </div>
                            <hr />


                            {{-- ONGKOS KIRIM   --}}
                            <p>Biaya ongkos kirim produk ini adalah :</p>
                            <h4>
                                <b>5.000</b>
                            </h4>
                            <span style="text-align: justify;">
                                ("Harga ongkos kirim yang tertera berlaku untuk pembelian satu produk saja. Jika membeli lebih dari satu produk, maka akan dikenakan biaya kirim yang berkelipatan.")
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        
       
        
    </div>
    @include('user.include.script')

    @include('user.komponenuser.footer')

</body>
</html>
