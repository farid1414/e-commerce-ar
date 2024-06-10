<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori Dataran</title>
</head>
@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
@include('user.komponenuser.bottomnavbar')
</div>

@include('user.include.style')

<body>
    
    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Kategori Terbaik Untuk Anda.
            </b></h2>
        </div>

        
        <div class="container">
            
            <div class="row">
              <div class="col-xs-12 col-md-4" style="flex-basis: 33.33%;">
                <a href="/Listprodukkategori" style="text-decoration: none;">
                  <div class="text-center">
                    <img src="../gambar/product-9.jpg" alt="Gambar 1" style="border-radius: 10px; max-width: 100%;" class="img-fluid">
                    <p class="fw-bold mt-3 text-black">Meja Klasik</p>
                  </div>
                </a>
              </div>
              <div class="col-xs-12 col-md-4" style="flex-basis: 33.33%;">
                <a href="/Listprodukkategori" style="text-decoration: none;">
                  <div class="text-center">
                    <img src="../gambar/product-3.jpg" alt="Gambar 2" style="border-radius: 10px; max-width: 100%;" class="img-fluid">
                    <p class="fw-bold mt-3 text-black">Kursi Taman</p>
                  </div>
                </a>
              </div>
              <div class="col-xs-12 col-md-4" style="flex-basis: 33.33%;">
                <a href="/Listprodukkategori" style="text-decoration: none;">
                  <div class="text-center">
                    <img src="../gambar/product-2.jpg" alt="Gambar 3" style="border-radius: 10px; max-width: 100%;" class="img-fluid">
                    <p class="fw-bold mt-3 text-black">Sofa Outdoor</p>
                  </div>
                </a>
              </div>
              <!-- Add more columns for additional images -->
            </div>
          </div>
          


    </div>
    @include('user.include.script')

    @include('user.komponenuser.footer')

</body>
</html>
