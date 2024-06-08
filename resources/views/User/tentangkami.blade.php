<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Tentang Kami</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS file -->
    <style>
        /* Your custom styles here */
        .mt-5 {
            margin-top: 5rem !important;
        }
        .mb-5 {
            margin-bottom: 5rem !important;
        }
        .text-center {
            text-align: center !important;
        }
        .fw-bold {
            font-weight: bold !important;
        }
        .h1 {
            font-size: 1.9rem !important;
            margin-top: 20px !important;
        }
        .h2 {
            font-size: 40px !important;
        }
        .description {
            font-family: Arial;
            margin-bottom: 20px !important;
            font-size: 18px !important;
            margin-top: 15px !important;
        }
        .image {
            width: 100% !important;
        }
    </style>
    @include('user.komponenuser.navbaruser')

    <div class='d-block d-lg-none'>
    @include('user.komponenuser.bottomnavbar')
    </div>
    @include('user.komponenuser.breadcrumb')

    @include('user.include.style')
</head>
<body>
    <div>
        <div class="text-center mt-5 mb-5">
            <h1 class="fw-bold">#TheFutureisToday.</h1>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="d-flex flex-column justify-content-center align-items-lg-start">
                        <h1 class="h1">E-Commerce Dengan</h1>
                        <h1 class="h2">Konsep Masa Depan.</h1>
                        <div class="description">
                            Sebagai toko online dengan konsep "The Future is Today" yang menyediakan teknologi Augmented Reality berbasis web dan visualisasi 3D yang bisa diakses secara langsung melalui ponsel Anda tanpa perlu mengunduh aplikasi apapun.
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="text-center">
                        <img src="../gambar/tentangkami4.gif" class="img-fluid animated image" alt="">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="../gambar/tentangkami2.jpg" class="img-fluid image" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-column justify-content-center align-items-lg-start">
                        <h1 class="h1">Hanya Menjual Produk</h1>
                        <h1 class="h2">Yang Berkualitas.</h1>
                        <div class="description">
                            AR-FURNITURE menyediakan beragam gaya dan desain terbaru untuk memenuhi kebutuhan Anda terhadap furnitur idaman. Kami menyediakan berbagai koleksi furnitur berkualitas. Bagi kami, pemilihan bahan adalah keharusan.
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="d-flex flex-column justify-content-center align-items-lg-start">
                        <h1 class="h1">Mengutamakan Kebutuhan</h1>
                        <h1 class="h2">& Selera Anda.</h1>
                        <div class="description">
                            AR-Furniture merupakan tim ahli yang selalu mengutamakan kebutuhan klien. Fokus utama kami adalah inovasi produk dan solusi digital terintegrasi, membantu Anda membuat furnitur di rumah anda lebih indah.
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="text-center">
                        <img src="../gambar/tentangkami1.jpg" class="img-fluid image" alt="">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="../gambar/tentangkami5.jpg" class="img-fluid image" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex flex-column justify-content-center align-items-lg-start mt-4">
                        <h1 class="h1">#TheFutureisToday</h1>
                        <h1 class="h2">Bersama AR-FURNITURE.</h1>
                        <div class="description">
                            AR-FURNITURE memahami apa yang Anda butuhkan. Perabotan yang bagus dapat merilekskan tubuh atau membangkitkan indera Anda. Lebih penting lagi, perabot yang bagus bertahan lama serta dapat membuat ruangan Anda terlihat lebih indah.
                        </div>
                        <br>
                        <a href="/KategoriSC" class="btn btn-dark btn-lg">Belanja Sekarang <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="aos.js"></script>
    <script>
        // Initialize AOS library
        AOS.init();
        // Scroll to top of the page on load
        window.scrollTo(0, 0);
    </script>
        @include('user.include.script')

        @include('user.komponenuser.footer')
    
</body>
</html>
