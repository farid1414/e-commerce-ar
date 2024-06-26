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
        /* Style tambahan */
    .product-list img {
        max-width: 100%;
        height: auto;
    }
    .product-list {
        max-width: 200px; /* Batasi lebar maksimum */
    }
    /* CSS untuk scrollbar */
    .product-list::-webkit-scrollbar {
        width: 5px; /* Lebar scrollbar */
    }

    /* Track */
    .product-list::-webkit-scrollbar-track {
        background: #f1f1f1; /* Warna track scrollbar */
    }

    /* Handle */
    .product-list::-webkit-scrollbar-thumb {
        background: #888; /* Warna handle scrollbar */
        border-radius: 10px;
    }

    /* Handle on hover */
    .product-list::-webkit-scrollbar-thumb:hover {
        background: #555; /* Warna handle scrollbar saat hover */
    }
    .carousel-item img {
        height: 400px; /* Tinggi tetap untuk semua gambar */
        object-fit: cover; /* Memastikan gambar sesuai dengan ukuran yang ditetapkan */
    }
    </style>
</head>
{{-- INCLUDE & KOMPONEN --}}

@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
@include('user.komponenuser.bottomnavbar')
</div>

@include('user.include.style')
<body>
    <div class="container">
                   <div class="row mt-2">
                <div class="col-xs-12 col-md-8">
                    <div class="container">

                        {{-- Gambar PRODUK untuk PC --}}
                        <div class='d-none d-md-block'>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="container">
                                        <div class="product-list d-flex flex-column overflow-auto" style="max-height: 350px;">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Produk 1" class="mb-2">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar2.jpg" alt="Produk 2" class="mb-2">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar3.jpg" alt="Produk 3" class="mb-2">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar4.jpg" alt="Produk 3" class="mb-2">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar5.jpg" alt="Produk 3" class="mb-2">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar6.jpg" alt="Produk 3" class="mb-2">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Produk 3" class="mb-2">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                   

                                    <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="10000">
                                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar2.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar3.jpg" class="d-block w-100" alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>


                                </div>


                            </div>
                              </div>    
                      


                              {{-- Gambar PRODUK untuk HP --}}
                              <div class='d-block d-lg-none'>
                                <div class="container">
                                    <div id="carouselExampleDark1" class="carousel carousel-dark slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active" data-bs-interval="10000">
                                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100" alt="...">
                                               
                                            </div>
                                            <div class="carousel-item" data-bs-interval="2000">
                                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100" alt="...">
                                                
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="d-block w-100" alt="...">
                                                
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark1" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark1" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
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
                    <div class="mt-5">
                        <div>
                            {{-- Dataran --}}

                            @include('user.produk.ardataranpolos')
                            {{-- @include('user.produk.ardataranvarian') --}}
                            {{-- @include('user.produk.ardatarandimensi') --}}
                            {{-- @include('user.produk.ardatarandimensivarian') --}}


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
                                                                <h5 class="card-title">Jhon Doe</h5>
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
                                                            <div class="row">
                                                                <div class="col">
                                                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 1" style="max-height: 100px">
                                                                </div>
                                                                <div class="col">
                                                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 2" style="max-height: 100px">
                                                                </div>
                                                                <div class="col">
                                                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 3" style="max-height: 100px">
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
                                                                <h5 class="card-title">J********E</h5>
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
                                                            <div class="row">
                                                                <div class="col">
                                                                  <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" class="img-fluid" alt="Product 1" style="max-height: 100px">
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
                                <b>SÖDERHAMN CHAIR</b>
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
                                <button class="btn btn-outline-dark btn-lg w-100" style="border-radius: 25px;" id="btnMasukkanKeranjang">Masukkan Keranjang</button>
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

<!-- Modal KERANJANG -->
<div class="modal fade" id="modalMasukkanKeranjang" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="display: flex; align-items: center; justify-content: center; height: 100vh;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-between">
          <p>Pilih varian Produk</p>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Merah
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item">Merah</a></li>
              <li><a class="dropdown-item">Putih</a></li>
              <li><a class="dropdown-item">Biru</a></li>
            </ul>
          </div>
        </div>
        <hr/>
        <div class="d-flex justify-content-between">
            <p>Kuantitas</p>
            <div class="d-flex align-items-center">
                <button class="btn btn-light btn-sm" onclick="decreaseQuantity()">
                    <i class="fas fa-minus"></i>
                </button>
                <span id="quantityDisplay" class="mx-3">1</span>
                <button class="btn btn-light btn-sm" onclick="increaseQuantity()">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
          <hr/>
        <div class="d-flex justify-content-between">
          <p>Harga Produk</p>
          <p>RP 1000000</p>
        </div>
        <div class="d-flex justify-content-between">
          <p>Ongkos Kirim</p>
          <p>Rp 5000</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="closeModal()">Tutup</button>
        <button type="button" class="btn btn-dark" onclick="addToCart()">Ya, Masukkan</button>
      </div>
    </div>
  </div>
</div>

<!-- Script -->
<script>
  document.getElementById('btnMasukkanKeranjang').addEventListener('click', function() {
    $('#modalMasukkanKeranjang').modal('show');
  });

  function closeModal() {
    $('#modalMasukkanKeranjang').modal('hide');
  }

  function addToCart() {
    Swal.fire({
      title: 'Produk berhasil dimasukkan ke keranjang!',
      icon: 'success',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        closeModal(); // Tutup modal setelah pesan dikonfirmasi
      }
    });
  }
</script>

<script>
    var quantity = 1; // Kuantitas awal
    var quantityLimit = 10; // Batas kuantitas

    function updateQuantityDisplay() {
        document.getElementById('quantityDisplay').innerText = quantity;
    }

    function decreaseQuantity() {
        if (quantity > 1) {
            quantity--;
            updateQuantityDisplay();
        }
    }

    function increaseQuantity() {
        if (quantity < quantityLimit) {
            quantity++;
            updateQuantityDisplay();
        }
    }
</script>


@include('user.include.script')

@include('user.komponenuser.footer')
</body>
</html>
