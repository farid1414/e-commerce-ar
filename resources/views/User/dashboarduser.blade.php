<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hero Section</title>
  <!-- Bootstrap CSS -->

  <style>
    /* Your CSS Styles */
    .overlay-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      border-radius: 10px;
    }

    .text-overlay-container {
      position: absolute;
      bottom: 10px;
      left: 15px;
      color: white;
      font-weight: bold;
      font-size: 3.4vw;
      display: flex;
      flex-direction: column;
      align-items: start;
    }

    .arrow-icon-container {
      position: absolute;
      bottom: 10px;
      right: 15px;
      color: white;
      font-size: 5vw;
    }
    .card-row {
      display: flex;
      flex-wrap: nowrap;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
    }
    .card {
      flex: 0 0 auto;
      width: 18rem;
      margin-right: 1rem;
      scroll-snap-align: start;
    }
  </style>
</head>
<body>
    @include('user.komponenuser.navbaruser')
    @include('user.include.style')

    {{-- Hero --}}
    <section id="hero" class="d-flex align-items-center my-3 mt-4">
        <div class="container">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 order-lg-1">
                <div class="d-flex flex-column justify-content-center align-items-lg-start">
                  <div class="d-none d-md-block">
                    <h1 data-aos="fade-up" style="font-size: 3rem; margin-top: 15px;"><b>Find Your</b></h1>
                    <h2 data-aos="fade-up" style="font-size: 3.5rem; margin-top: -5px;"><b>Dream Furniture.</b></h2>
                  </div>
                  <div class="d-block d-lg-none">
                    <h1 data-aos="fade-up" style="font-size: 3rem; margin-top: 15px;"><b>Find Your</b></h1>
                    <h2 data-aos="fade-up" style="font-size: 3.5rem; margin-top: -5px;"><b>Dream Furniture.</b></h2>
                  </div>
                  <div class="col-lg-12 order-lg-3">
                    <div class="d-none d-lg-block">
                      <div data-aos="fade-up" data-aos-delay="200" style="margin-bottom: 20px; font-size: 1.26rem; margin-top: 15px;">
                        Membawa sentuhan elegan dengan pilihan 
                        furnitur berkualitas tinggi yang benar-benar 
                        membuat ruangan Anda terasa seperti rumah impian.
                      </div>
                      <button data-aos="fade-up" data-aos-delay="300" class="btn-dark btn-lg" style="border-radius: 100px; margin-top: 20px;">
                        <span>
                          Browse Our Collection
                          <i class="fas fa-arrow-down" style="margin-left: 15px;"></i>
                        </span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="col-lg-6 order-lg-5 mb-4">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                  <img src="../gambar/none.jpg" class="img-fluid animated mt-2 mb-2" alt="" style="width: 100%; border-radius: 15px;" />
                </div>
                <div class="d-lg-none">
                  <div data-aos="fade-up" data-aos-delay="200" style="margin-bottom: 20px; font-size: 1.26rem; margin-top: 15px;">
                    Membawa sentuhan elegan dengan pilihan 
                    furnitur berkualitas tinggi yang benar-benar 
                    membuat ruangan Anda terasa seperti rumah impian.
                  </div>
                  <button data-aos="fade-up" data-aos-delay="300" class="btn-dark btn-lg" style="border-radius: 100px; margin-top: 20px;">
                    <span>
                      Browse Our Collection
                      <i class="fas fa-arrow-down" style="margin-left: 15px;"></i>
                    </span>
                  </button>
                </div>
              </div>
            </div>
      
            <div class="row">
              <div class="col">
                <div id="collection" style="margin-top: 75px;">
                  <h1 data-aos="fade-up" data-aos-delay="100" style="font-size: 1.65rem; margin-bottom: 10px;"><b>Browse The Categories</b></h1>
                  <h1 data-aos="fade-up" data-aos-delay="200" style="font-size: 1.75rem; margin-bottom: 20px;"><b>That We Designed For You.</b></h1>
                </div>
              </div>
            </div>

          </div>

          {{-- Kategori --}}

          <div style="margin-bottom: 30px;">
            <div class="container">
              <div class="row">
                <div class="col" data-aos="fade-up-right">
                  <a href="/Kategoriground">
                    <div style="position: relative; overflow: hidden; border-radius: 12px;">
                      <img class="img-fluid" src="../gambar/testbg.png" alt="" />
                      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); border-radius: 10px;"></div>
                      <div style="position: absolute; bottom: 10px; left: 15px; color: white; font-weight: bold; font-size: 3.4vw; display: flex; flex-direction: column; align-items: start;">
                        <span>
                          Place <br /> Furniture <br /> On The Ground
                        </span>
                      </div>
                      <div style="position: absolute; bottom: 10px; right: 15px; color: white; font-size: 5vw;">
                        <i class="fas fa-arrow-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col" data-aos="fade-up-left">
                  <a href="/Kategoridinding">
                    <div style="position: relative; overflow: hidden; border-radius: 12px;">
                      <img class="img-fluid" src="../gambar/testbg2.png" alt="" style="border-radius: 20px;" />
                      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); border-radius: 10px;"></div>
                      <div style="position: absolute; bottom: 10px; left: 15px; color: white; font-weight: bold; font-size: 3.4vw; display: flex; flex-direction: column; align-items: start;">
                        <span>
                          Place <br /> Furniture <br /> On The Wall
                        </span>
                      </div>
                      <div style="position: absolute; bottom: 10px; right: 15px; color: white; font-size: 5vw;">
                        <i class="fas fa-arrow-right"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
    
          {{-- Flash Sale --}}
          <h1 style="font-size: 3.4vw; margin-right: 10px;">
            <b>Flash Sale 1.1</b>
        </h1>
        
            <div class="card-row">
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 1</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card 3</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Add more cards as needed -->
            </div>


            {{-- Produk baru di riliss --}}
            <div class="container">
                <p style="font-size: 2rem;">
                  <b>Hey, New Arrivals Are Here.</b>
                </p>
                <div class="row">
                  <!-- Start of Loop -->
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                    <a href="/Detailproduk" style="text-decoration: none;">
                      <div style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s;"
                        onclick="handleProductClick(produk.id)" onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'" onmouseleave="this.style.boxShadow = 'none'">
                        <span class="badge bg-danger" style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">Produk Terbaru !!</span>
                        <img src="produk.image" alt="Product" style="width: 100%; height: 200px;">
                        <div class="card-body">
                          <p class="fw-bold" style="font-size: 1rem;">{/* Penting */} shortenTitle(produk.title) {/* End Penting */}</p>
                          <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            <p class="card-text" style="text-align: justify; font-size: 0.9rem;">produk.description</p>
                          </div>
                          <div style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">
                            <!-- Star Rating -->
                            <span style="color: gold; font-size: 0.9rem;">
                              <i class="fas fa-star"></i>
                            </span>
                            <!-- Rating Text -->
                            <span style="margin-left: 5px; font-size: 0.8rem;">produk.rating (produk.reviews)</span>
                          </div>
                          <br>
                          <!-- Price -->
                          <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 1rem; font-weight: bold;">formatRupiah(produk.price)</span>
                          </div>
                        </div>
                        <div class="card-footer bg-white">
                          <div class="d-flex justify-content-between">
                            <!-- Free Shipping Badge -->
                            <span class="badge bg-success" style="font-size: 0.7rem;"><i class="fas fa-truck-fast me-2"></i>produk.ongkoskirim</span>
                            <!-- Sold Badge -->
                            <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual produk.sold</span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <!-- End of Loop -->
                </div>
                <div style="text-align: right; display: flex; align-items: center; justify-content: flex-end; font-size: 1rem;">
                  <span style="margin-right: 5px;">
                    <a href="/Listseluruhproduk" style="text-decoration: none; color: black;"><b>Lihat Selengkapnya</b></a>
                  </span>
                  <i class="fas fa-arrow-right"></i>
                </div>
                <hr style="clear: both;">
              </div>
              


              {{-- Produk yang beru di lihat --}}
              <div class="container">
                <p style="font-size: 1.8rem;">
                  <b>Produk yang baru dilihat.</b>
                </p>
                <div class="row">
                  <!-- Start of Loop -->
                  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                    <a href="/Detailproduk" style="text-decoration: none;">
                      <div style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s;" onclick="handleProductClick(produk.id)" onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'" onmouseleave="this.style.boxShadow = 'none'">
                        <!-- Status Badge -->
                        <span class="badge bg-info" style="position: absolute; top: 10px; right: 10px;">produk.status <i class="fas fa-bolt-lightning" style="margin-left: 5px;"></i></span>
                        <!-- Image -->
                        <img src="produk.image" alt="Product" style="width: 100%; height: 200px;">
                        <div class="card-body">
                          <!-- Title -->
                          <p class="fw-bold" style="font-size: 1rem;">produk.title</p>
                          <!-- Description -->
                          <div style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                            <p class="card-text" style="text-align: justify; font-size: 0.9rem;">produk.description</p>
                          </div>
                          <!-- Rating -->
                          <div style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">
                            <span style="color: gold;">
                              <i class="fas fa-star"></i>
                            </span>
                            <span style="margin-left: 5px;">produk.rating (produk.reviews)</span>
                          </div>
                          <br>
                          <!-- Price -->
                          <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                              <p style="font-size: 14px; text-decoration: line-through; color: #999; margin-top: -12px; margin-bottom: -25px;">formatRupiah(produk.price)</p>
                              <p style="font-size: 18px; font-weight: bold; margin-bottom: -7px;">formatRupiah(produk.price - produk.diskon)</p>
                            </div>
                            <span style="font-size: 18px; font-weight: bold;">formatRupiah(produk.price)</span>
                          </div>
                        </div>
                        <!-- Footer -->
                        <div class="card-footer bg-white">
                          <div class="d-flex justify-content-between">
                            <!-- Free Shipping Badge -->
                            <span class="badge bg-success" style="font-size: 0.6rem;"><i class="fas fa-truck-fast me-1"></i>produk.ongkoskirim</span>
                            <!-- Sold Badge -->
                            <span class="badge bg-dark" style="font-size: 0.6rem;">Terjual produk.sold</span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <!-- End of Loop -->
                </div>
                <!-- View All Link -->
                <div style="text-align: right; display: flex; align-items: center; justify-content: flex-end;">
                  <span style="margin-right: 5px;">
                    <a href="/Listseluruhproduklastseen" style="text-decoration: none; color: black;"><b>Lihat Selengkapnya</b></a>
                  </span>
                  <i class="fas fa-arrow-right me-2"></i>
                </div>
                <!-- Horizontal Line -->
                <hr style="clear: both;">
              </div>

              
{{-- dashboard AR --}}
              <section id="hero" class="d-flex align-items-center my-4">
                  <div class="row">
                    <div class="col-lg-6 order-lg-1">
                      <div class="d-flex flex-column justify-content-center align-items-lg-start">
                        <h4 data-aos="fade-up" style="font-size: 1.2rem;" class="mt-2">
                          <b>The Future is Today !</b>
                        </h4>
                        <h2 data-aos="fade-up" style="font-size: 1.8rem; margin-top: -5px;">
                          <b>Show Furniture In</b>
                        </h2>
                        <h2 data-aos="fade-up" style="font-size: 1.9rem; margin-top: -5px;">
                          <b>Your Room With WebAR!</b>
                        </h2>
                        <div class="col-lg-12 order-lg-3 mt-3">
                          <div class="d-none d-lg-block">
                            <div data-aos="fade-up" data-aos-delay="200" style="margin-bottom: 20px; font-size: 18px; margin-top: 15px;">
                              Lihat produk furnitur kami dengan teknologi Augmented Reality yang menampilkan furnitur 3D secara virtual dan letakkan pada ruangan anda tanpa perlu mengunduh aplikasi apapun. Pastikan anda mengakses teknologi ini melalui smartphone yang dapat menjalankan teknologi AR.
                            </div>
                            <div data-aos="fade-up" data-aos-delay="200">
                              <a href="/KategoriSC" class="btn btn-dark btn-lg" style="border-radius: 100px; margin-bottom: 100px;">
                                Coba Pada Produk Lain
                                <i class="fas fa-arrow-right ml-2"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 order-lg-5">
                      <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                        <div data-aos="fade-left" data-aos-delay="100">
                          <model-viewer src="https://cdn.glitch.global/483eed9c-fdd2-44f9-bc4b-a9d47fa50b8b/arm_chair__furniture.glb?v=1701710260247" ios-src="https://cdn.glitch.global/483eed9c-fdd2-44f9-bc4b-a9d47fa50b8b/Arm_chair__Furniture.usdz?v=1701711222687" skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791" id="ARdimension" ar="true" ar-modes="webxr scene-viewer quick-look" xr-environment ar-scale="auto" skybox-height="1.8m" shadow-intensity="1" camera-controls touch-action="pan-y" ar-placement="floor" auto-rotate style="width: 100%; height: 400px; border-radius: 15px; position: relative;">
                            <a class="chakra-badge css-bfz86h" href="https://developers.google.com/ar/discover/supported-devices"></a>
                            <button class="btn-primary" slot="ar-button" style="background-color: white; border-radius: 4px; border: none; position: absolute; top: 16px; right: 16px; height: 30px; display: none;">
                              👋 Hey, Gunakan AR
                            </button>
                          </model-viewer>
                        </div>
                      </div>
                      <div class="d-lg-none">
                        <div data-aos="fade-up" data-aos-delay="200" style="margin-bottom: 20px; font-size: 18px; margin-top: 15px;">
                          Lihat produk furnitur kami dalam bentuk Augmented Reality (AR) 3D di smartphone Anda tanpa perlu mengunduh aplikasi.
                        </div>
                        <div data-aos="fade-up" data-aos-delay="200">
                          <a href="/KategoriSC" class="btn btn-dark btn-lg" style="border-radius: 100px; margin-bottom: 100px;">
                            Coba Pada Produk Lain
                            <i class="fas fa-arrow-right ml-2"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>
              

        </div>


        

      </section>
      


      

      
            @include('user.include.script')

</body>
</html>
