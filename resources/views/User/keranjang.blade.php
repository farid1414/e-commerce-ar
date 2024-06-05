<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>
</head>
@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
@include('user.komponenuser.bottomnavbar')
</div>

@include('user.include.style')

<body>
  

    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Keranjang Belanja Anda.</b></h2>
        </div>


            {{-- {products.length === 0 ? ( --}}
				{{-- <div className="text-center">
					<img
						src="./gambar/emptycart.png"
						alt="Keranjang Kosong"
						style={{ maxWidth: "320px" }}
					/>
					<h3>Oops, Keranjang Anda kosong.</h3>
				</div> --}}

        {{-- PC --}}
<div class='d-none d-md-block'>
    <div class="card bg-white mb-3 mt-5" style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s;" onclick="handleProductClick(product.id)" onmouseenter="(event) => (event.currentTarget.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)')" onmouseleave="(event) => (event.currentTarget.style.boxShadow = 'none')">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">
                                <i class="fas fa-check"></i>
                            </th>
                            <th>Produk</th>
                            <th>Varian</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Ongkir</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-index" checked="selectedProducts.includes(index)" onchange="handleCheckboxChange(index)">
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Kursi Klasik Eropa" width="100" height="100" style="border-radius: 10px; object-fit: cover;">
                            </td>
                            <td class="align-middle text-center">
                                <div class="dropdown ml-4">
                                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Varian
                                    </button>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Putih</a></li>
                                      <li><a class="dropdown-item" href="#">Merah</a></li>
                                      <li><a class="dropdown-item" href="#">Hijau</a></li>
                                    </ul>
                                  </div>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-light btn-sm" onclick="decreaseQuantity()">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span id="quantityDisplay" class="mx-3">1</span>
                                    <button class="btn btn-light btn-sm" onclick="increaseQuantity()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="align-middle">
                                <del>1000000</del> <br />
                                <span>
                                    <small>500000</small>
                                </span>
                                <br />
                                <span class="badge bg-warning ml-2">
                                    <i class="fas fa-bolt"></i>
                                    Flash Sale 1.1
                                </span>
                            </td>
                            <td class="align-middle">
                                <del>20000</del>
                                <br />
                                <span>
                                    <small>0</small>
                                </span>
                                <br />
                                <span class="badge bg-success ml-2">
                                    <i class="fa-solid fa-truck-fast"></i>
                                    Gratis Ongkir
                                </span>
                            </td>
                            <td class="align-middle">
                                500000
                            </td>
                            <td class="align-middle">
                                <button class="btn btn-danger" onclick="removeProduct(index)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card bg-white mb-3" style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s;" onclick="handleProductClick(product.id)" onmouseenter="(event) => (event.currentTarget.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)')" onmouseleave="(event) => (event.currentTarget.style.boxShadow = 'none')">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">
                                <i class="fas fa-check"></i>
                            </th>
                            <th>Produk</th>
                            <th>Varian</th>
                            <th>Kuantitas</th>
                            <th>Harga Satuan</th>
                            <th>Ongkir</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-index" checked="selectedProducts.includes(index)" onchange="handleCheckboxChange(index)">
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 2/Produk2gambar1.jpg" alt="Kursi Klasik Eropa" width="100" height="100" style="border-radius: 10px; object-fit: cover;">
                            </td>
                            <td class="align-middle text-center">
                                <div class="me-5">-</div>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center ml-5">
                                    <button class="btn btn-light btn-sm" onclick="decreaseQuantity(index)" disabled="isMinusDisabled(index)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="mx-3">1</span>
                                    <button class="btn btn-light btn-sm" onclick="increaseQuantity(index)" disabled="product.quantity >= product.quantityLimit">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="align-middle">
                                1000000
                            </td>
                            <td class="align-middle">
                                20000
                            </td>
                            <td class="align-middle">
                                500000
                            </td>
                            <td class="align-middle">
                                <button class="btn btn-danger" onclick="removeProduct(index)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




{{-- Mobile --}}
<div class='d-block d-lg-none'>

<div class="card mb-4 mt-5">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-1">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" />
          </div>
        </div>
        <div class="col">
          <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Kursi Klasik Eropa" style="max-width: 140px; border-radius: 10px;" />
        </div>
        <div class="col">
          <div>
            <p class="fw-bold" style="font-size: 12px;">Kursi Klasik Eropa</p>
            <p class="fw-bold text-muted" style="font-size: 0.8rem;">Kursi Asli Eropa Dengan Desain Klasik</p>
          </div>
        </div>
      </div>
      
      <div class="card mt-3">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <span>Stok Tersedia : </span>
            <span>10 Produk</span>
          </div>
          <div class="d-flex justify-content-between mt-2">
            <span>Varian yang dipilih: </span>
            <span><div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  merah
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">putih</a></li>
                  <li><a class="dropdown-item" href="#">biru</a></li>
                  <li><a class="dropdown-item" href="#">hijau</a></li>
                </ul>
              </div></span>
          </div>
          <div class="d-flex justify-content-between">
            <span>Stock varian yang tersisa: </span>
            <span>20</span>
          </div>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <span style="font-size: 1.1rem;">Harga Satuan : </span>
            <span>Rp. 2.000.000</span>
          </div>
          <div class="d-flex justify-content-between">
            <span style="font-size: 1.1rem;">Ongkos Kirim : </span>
            <span>Rp. 5.000</span>
          </div>
          <div class="d-flex justify-content-between">
            <span style="font-size: 1.1rem;">Total Harga : </span>
            <span>Rp. 1.505.000</span>
          </div>
          <br />
        </div>
      </div>
    </div>
    <div class="card-footer bg-white">
      <div class="d-flex justify-content-between">
        <button class="btn btn-danger">
          <i class="fas fa-trash"></i>
        </button>
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
  </div>
</div>
                
            

            <div class="d-flex justify-content-between mt-5">
                <button class="btn btn-outline-dark">
                    <span class="ml-2">
                        <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>
                        Kembali
                    </span>
                </button>
                <!-- Conditional Button -->
                <!-- Kondisional hanya muncul jika ada produk -->
                <!-- Jika selectedProducts kosong, tombol akan disembunyikan -->
                <!-- Kondisi ini ditentukan oleh JavaScript di sisi klien -->
                <button class="btn btn-primary mx-3" >
                    Pilih Semua
                </button>
                <!-- Tombol untuk membuat pesanan -->
                <!-- Tombol ini akan menampilkan tooltip 'disabled' jika selectedProducts kosong -->
                <a href="" class="btn btn-dark d-flex align-items-center disabled">
                    <span class="ml-2">
                        Buat Pesanan
                        <i class="fas fa-arrow-right ml-2" style="margin-left: 10px;"></i>
                    </span>
                </a>
            </div>


        <hr/>

    </div>

    
     {{-- PRORDUK Baru dilihat --}}
     <div class="container">
        <p style="font-size: 2rem;">
            <b>Produk yang baru dilihat. </b>
        </p>
        <div class="row">
            <!-- Start of Loop -->
            <!-- Ganti col-lg-3 menjadi col-lg-4 agar card tersusun dengan baik di grid -->
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <a href="/Detailproduk" style="text-decoration: none;">
                    <div class="card"
                        style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s; border-radius: 6px"
                        onclick="handleProductClick(produk.id)"
                        onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                        onmouseleave="this.style.boxShadow = 'none'">
                        <span class="badge bg-primary"
                            style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">Produk Terlaris</span>
                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Product"
                            style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                        <div class="card-body">
                            <p class="fw-bold" style="font-size: 1rem;">Kursi Skandinavia</p>
                            <div
                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                <p class="card-text" style="text-align: justify; font-size: 0.9rem;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in quam mattis, tincidunt
                                    urna tincidunt, volutpat libero. Praesent at sapien volutpat, cursus nulla in, aliquet
                                    erat
                                </p>
                            </div>
                            <div
                                style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">
                                <!-- Star Rating -->
                                <span style="color: gold; font-size: 0.9rem;">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <!-- Rating Text -->
                                <span style="margin-left: 5px; font-size: 0.8rem;">5 (10)</span>
                            </div>
                            <br>
                            <!-- Price -->
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span style="font-size: 1rem; font-weight: bold;">Rp. 15.000.000</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between">
                                <!-- Free Shipping Badge -->
                                <span class="badge bg-success" style="font-size: 0.7rem;"><i
                                        class="fa-solid fa-truck-fast me-2"></i>Free Ongkir</span>
                                <!-- Sold Badge -->
                                <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual 10x</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- End of Loop -->
        </div>
    @include('user.include.script')

    @include('user.komponenuser.footer')


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


</body>
</html>
