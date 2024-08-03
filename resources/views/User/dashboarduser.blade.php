<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beranda</title>
    <style>
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

        .pageStyle {
            height: 100%;
            overflow: hidden;
        }

        .body {
            overflow-y: auto;
            /* Allow vertical scrolling */
        }

        .flash-sale-header {
            display: flex;
            align-items: center;
        }

        .countdown-timer {
            font-size: 12px;
            color: white;
            display: flex;
            justify-content: center;
        }

        .countdown-box {
            background-color: black;
            padding: 5px 10px;
            margin: 0 5px;
            border-radius: 5px;
        }
    </style>
    <style>
        /* Webkit browsers (Chrome, Safari) */
        .container::-webkit-scrollbar {
            width: 8px;
            /* Width of the scrollbar */
            border-radius: 10px;
        }

        .container::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Color of the track */
        }

        .container::-webkit-scrollbar-thumb {
            background: #333;
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Rounded corners for the scrollbar thumb */
        }

        .container::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Slightly lighter color when hovering */
        }
    </style>
</head>

@include('user.komponenuser.navbaruser')

@include('user.include.style')

<body>
    {{-- Hero --}}
    @include('user.komponenuser.loadingUser')

    <div class="pageStyle">
        <main>
            <section id="hero" class="d-flex align-items-center my-3 mt-4">
                <div class="container">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1">
                                <div class="d-flex flex-column justify-content-center align-items-lg-start">
                                    <div class="d-none d-md-block">
                                        <h1 data-aos="fade-up" style="font-size: 3rem; margin-top: 15px;"><b>Find
                                                Your</b></h1>
                                        <h2 data-aos="fade-up" style="font-size: 3.5rem; margin-top: -5px;"><b>Dream
                                                Furniture.</b></h2>
                                    </div>
                                    <div class="d-block d-lg-none">
                                        <h1 data-aos="fade-up" style="font-size: 3rem; margin-top: 5px;"><b>Find
                                                Your</b></h1>
                                        <h2 data-aos="fade-up" style="font-size: 3.5rem; margin-top: -5px;"><b>Dream
                                                Furniture.</b></h2>
                                    </div>
                                    <div class="col-lg-12 order-lg-3">
                                        <div class="d-none d-lg-block">
                                            <div data-aos="fade-up" data-aos-delay="200"
                                                style="margin-bottom: 20px; font-size: 1.26rem; margin-top: 15px; margin-left: -15px">
                                                Membawa sentuhan elegan dengan pilihan
                                                furnitur berkualitas tinggi yang benar-benar
                                                membuat ruangan Anda terasa seperti rumah impian.
                                            </div>
                                            <button data-aos="fade-up" data-aos-delay="300" class="btn-dark btn-lg"
                                                style="border-radius: 100px; margin-top: 20px; margin-left: -15px">
                                                Browse Our Collection
                                                <i class="fas fa-arrow-down" style="margin-left: 15px;"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 order-lg-5 mb-4">
                                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                                    <img src="../gambar/none.jpg" class="img-fluid animated mt-2 mb-2" alt=""
                                        style="width: 100%; border-radius: 15px;" />
                                </div>
                                <div class="d-lg-none">
                                    <div data-aos="fade-up" data-aos-delay="200"
                                        style="margin-bottom: 20px; font-size: 1.26rem; margin-top: 15px;">
                                        Membawa sentuhan elegan dengan pilihan
                                        furnitur berkualitas tinggi yang benar-benar
                                        membuat ruangan Anda terasa seperti rumah impian.
                                    </div>
                                    <button data-aos="fade-up" data-aos-delay="300" class="btn btn-dark btn-lg"
                                        style="border-radius: 100px; margin-top: 20px;">
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
                                    <div class="d-none d-md-block">
                                        <p style="font-size: 33px;">
                                            <b>Browse The Categories</b>
                                        </p>
                                        <p style="font-size: 40px; margin-top: -20px">
                                            <b>That We Designed For
                                                You.</b>
                                        </p>
                                    </div>

                                    <div class="d-block d-md-none">
                                        <p style="font-size: 22px; margin-Bottom: -5px">
                                            <b>Browse The Categories</b>
                                        </p>
                                        <p style="font-size: 27px;">
                                            <b>That We Designed For
                                                You.</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Kategori yang hanya tampil di desktop -->
                    <div class="d-none d-md-block" style="margin-top: -50px">
                        <div class="container my-5">
                            <div class="row">
                                <!-- Card 1 -->
                                @foreach ($categories as $cat)
                                    <div class="col-md-3 col-sm-6 mb-4">
                                        <div class="card"
                                            style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; max-width: 100%;">
                                            <img src="{{ url($cat->image) }}" class="card-img-top" alt="Kategori 1" style="height: 150px; width: 100%; object-fit: cover;" loading="lazy">
                                            <div class="card-body" style="height: 60px; text-align: left;">
                                                <h5 class="card-title" style="font-size: 15px; font-weight: bold;">
                                                    {{$cat->name}}.
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    

                    <!-- Kategori yang hanya tampil di mobile -->
                    <div class="d-block d-md-none" style="margin-top: -40px">
                        <div class="container my-5">
                            <!-- Horizontal Scroll Container -->
                            <div
                                style="display: flex; overflow-x: auto; padding: 1rem 0; scroll-behavior: smooth; scrollbar-width: thin; scrollbar-color: #333 #f1f1f1;">
                                <!-- Card 1 -->
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami5.jpg" alt="Kategori 1"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 2"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 3"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 4 -->
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 4"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 4"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori</h5>
                                        </div>
                                    </div>
                                </div>
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 4"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 4"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div style="flex: 0 0 auto; margin-right: 1rem;">
                                    <div class="card"
                                        style="border-radius: 10px; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s; width: 200px; max-width: 100%;">
                                        <img src="../gambar/tentangkami2.jpg" alt="Kategori 4"
                                            style="width: 100%; height: 150px; object-fit: cover;">
                                        <div class="card-body" style="padding: 1rem;">
                                            <h5 class="card-title" style="font-size: 1.25rem; font-weight: bold;">Nama
                                                Kategori.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    {{-- Kategori
                    <div style="margin-bottom: 30px;">
                        <div class="container">
                            <div class="row">
                                <div class="col" data-aos="fade-up-right">
                                    <a href="{{ route('category-user', 'dataran') }}">
                                        <div style="position: relative; overflow: hidden; border-radius: 12px;">
                                            <img class="img-fluid" src="{{ asset('/gambar/testbg.png') }}"
                                                alt="" />
                                            <div
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); border-radius: 10px;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 15px; color: white; font-weight: bold; font-size: 3.4vw; display: flex; flex-direction: column; align-items: start;">
                                                <span>
                                                    Place <br /> Furniture <br /> On The Ground.
                                                </span>
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; right: 15px; color: white; font-size: 5vw;">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col" data-aos="fade-up-left">
                                    <a href="{{ route('category-user', 'dinding') }}">
                                        <div style="position: relative; overflow: hidden; border-radius: 12px;">
                                            <img class="img-fluid" src="../gambar/testbg2.png" alt=""
                                                style="border-radius: 20px;" />
                                            <div
                                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.7); border-radius: 10px;">
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; left: 15px; color: white; font-weight: bold; font-size: 3.4vw; display: flex; flex-direction: column; align-items: start;">
                                                <span>
                                                    Place <br /> Furniture <br /> On The Wall.
                                                </span>
                                            </div>
                                            <div
                                                style="position: absolute; bottom: 10px; right: 15px; color: white; font-size: 5vw;">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    @if ($flash_sale)
                        {{-- PROGRAM Flash Sale --}}
                        <div class="container">
                            <div class="row">
                                <div class="col flash-sale-header" data-aos="fade-right" data-aos-delay="300">
                                    <h1 style="font-size: 3.4vw; margin-right: 10px;">
                                        <b>{{ $flash_sale->name ?? '-' }}</b>
                                    </h1>

                                    <span style="font-size: 10px;">Berakhir dalam:</span>
                                    <div class="countdown-timer">
                                        <!-- Kotak hitam untuk bagian days -->
                                        <div class="countdown-box" id="days"></div>
                                        <span style="color: black;">:</span>
                                        <!-- Kotak hitam untuk bagian hours -->
                                        <div class="countdown-box" id="hours"></div>
                                        <span style="color: black;">:</span>
                                        <!-- Kotak hitam untuk bagian minutes -->
                                        <div class="countdown-box" id="minutes"></div>
                                        <span style="color: black;">:</span>
                                        <!-- Kotak hitam untuk bagian seconds -->
                                        <div class="countdown-box" id="seconds"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-row mt-3">
                                @foreach ($flash_sale->productFlashSale->groupBy('product_id') as $key => $prod)
                                    @php
                                        $product = App\Models\Master\Product::findOrFail($key);
                                    @endphp
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                        <a href="{{ route('detail-product', $product->uuid) }}"
                                            style="text-decoration: none;">
                                            <div class="card"
                                                style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s; border-radius: 6px"
                                                onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                                                onmouseleave="this.style.boxShadow = 'none'">
                                                <span class="badge bg-warning"
                                                    style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">{{ $flash_sale->name }}</span>
                                                <img src="{{ url($product->thumbnail) }}" alt="Product"
                                                    style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                                                <div class="card-body">
                                                    <p class="fw-bold" style="font-size: 1rem;">
                                                        {{ $product->name }}
                                                    </p>
                                                    <div
                                                        style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                        <p class="card-text"
                                                            style="text-align: justify; font-size: 0.9rem;">
                                                            {!! $product->description !!}
                                                        </p>
                                                    </div>
                                                    <div
                                                        style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">
                                                        <!-- Star Rating -->
                                                        <span style="color: gold; ">
                                                            <i class="fas fa-star" style="font-size: 11px"></i>
                                                            <i class="fas fa-star" style="font-size: 11px"></i>
                                                            <i class="fas fa-star" style="font-size: 11px"></i>
                                                            <i class="fas fa-star" style="font-size: 11px"></i>
                                                            <i class="fas fa-star" style="font-size: 11px"></i>
                                                        </span>
                                                        <!-- Rating Text -->
                                                        <span style="margin-left: 5px; font-size: 0.8rem;">5
                                                            (10)
                                                        </span>
                                                    </div>
                                                    <br>
                                                    <!-- Price -->
                                                    <div
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <span style="font-size: 1rem; font-weight: bold;">
                                                            {{ formatRupiah($product->harga) }}</span>
                                                    </div>


                                                    @if ($product->stok_sekarang <= 5)
                                                        <div class="mt-2">
                                                            <span style="color: red; font-size: 1rem;">
                                                                Segera Habis <i class="bi bi-fire"></i>
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="mt-2">
                                                            <span style="color: green; font-size: 1rem;">
                                                                Tersedia <i class="bi bi-check-circle"></i>
                                                            </span>
                                                        </div>
                                                    @endif

                                                </div>


                                                <div class="card-footer bg-white">
                                                    <div class="d-flex justify-content-between">
                                                        <!-- Free Shipping Badge -->
                                                        @if (!$product->harga_ongkir)
                                                            <span class="badge bg-success"
                                                                style="font-size: 0.7rem;"><i
                                                                    class="fa-solid fa-truck-fast me-2"></i>Free
                                                                Ongkir</span>
                                                        @endif
                                                        <!-- Sold Badge -->
                                                        <span class="badge bg-dark"
                                                            style="font-size: 0.65rem;">Terjual
                                                            {{ $product->transactionDetail->sum('quantity') ?? 0 }}x</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                                <!-- card .... -->
                            </div>

                        </div>
                    @endif
                    <hr />


                    {{-- PRORDUK TERBARU --}}
                    <div class="container mt-5">
                        <div class="d-none d-md-block">
                            <p style="font-size: 33px;">
                                <b>Hey, New Arrivals Are Here.</b>
                            </p>
                        </div>

                        <div class="d-block d-md-none">
                            <p style="font-size: 26px;">
                                <b>Hey, New Arrivals Are Here.</b>
                            </p>
                        </div>
                        <div class="row">
                            <!-- Loop products here -->
                            @foreach ($newProducts as $new)
                                <div class="col-6 col-lg-3" style="margin-bottom: 20px;">
                                    <a href="{{ route('detail-product', $new->uuid) }}"
                                        style="text-decoration: none;">
                                        <div class="card"
                                            style="width: 100%; position: relative; transition: box-shadow 0.3s; border-radius: 6px; height: 100%; display: flex; flex-direction: column; justify-content: space-between;"
                                            onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                                            onmouseleave="this.style.boxShadow = 'none'">
                                            <span class="badge bg-danger"
                                                style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">Produk
                                                Terbaru !!</span>
                                            <img src="{{ url($new->thumbnail) }}" alt="Product"
                                                style="width: 100%; height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                                            <div class="card-body" style="flex-grow: 1;">
                                                <p class="fw-bold" style="font-size: 1rem;">{{ $new->name }}</p>
                                                <div
                                                    style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                    <p class="card-text"
                                                        style="text-align: justify; font-size: 0.9rem;">
                                                        {!! strlen($new->description) > 70 ? substr($new->description, 0, 70) . '...' : $new->description !!}
                                                    </p>
                                                </div>
                                                @php
                                                    $rating = 0;
                                                    $count = 0;
                                                    $val = $ratings
                                                        ->where('product_id', '=', $new->id)
                                                        ->sum('rating_value');
                                                    $count = $ratings->where('product_id', '=', $new->id)->count();
                                                    if ($count > 0) {
                                                        $rating = $val / $count;
                                                    }

                                                @endphp
                                                @if ($count > 0)
                                                    <div
                                                        style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">
                                                        <!-- Star Rating -->
                                                        <span style="color: gold;">
                                                            @for ($i = 0; $i < $rating; $i++)
                                                                <i class="fas fa-star" style="font-size: 11px"></i>
                                                            @endfor

                                                        </span>
                                                        <!-- Rating Text -->
                                                        <span
                                                            style="margin-left: 5px; font-size: 0.8rem;">{{ $rating }}
                                                            ({{ $count }})</span>
                                                    </div>
                                                @endif
                                                <br>
                                                <!-- Price -->
                                                <div
                                                    style="display: flex; justify-content: space-between; align-items: center;">
                                                    <span
                                                        style="font-size: 1rem; font-weight: bold;">{{ formatRupiah($new->harga) }}</span>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <div
                                                    class="d-flex @if (!$new->harga_ongkir) justify-content-between
                                                @else
                                                    justify-content-end @endif ">
                                                    <!-- Free Shipping Badge -->
                                                    @if (!$new->harga_ongkir)
                                                        <span class="badge bg-success me-2"
                                                            style="font-size: 0.68rem; margin-left: -12px">
                                                            <i class="fa-solid fa-truck-fast me-1"
                                                                style="font-size: 0.55rem"></i>Free Ongkir</span>
                                                    @endif

                                                    <!-- Sold Badge -->
                                                    <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual
                                                        {{ $new->transactionDetail->sum('quantity') }}x</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>


                        <div class="mt-4"
                            style="text-align: right; display: flex; align-items: center; justify-content: flex-end; font-size: 1rem;">
                            <span style="margin-right: 5px;">
                                <a href="{{ route('product') }}"
                                    style="text-decoration: none; color: black;"><b>Lihat
                                        Selengkapnya</b></a>
                            </span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <hr style="clear: both;">
                    </div>



                    {{-- PRORDUK Baru dilihat --}}
                    {{-- <div class="container">
                        <p style="font-size: 33px;">
                            <b>Produk yang baru dilihat. </b>
                        </p>
                        <div class="row row-cols-2 row-cols-md-4">
                            <!-- Start of Loop -->
                            <div class="col">
                                <a href="/Detailproduk" style="text-decoration: none;">
                                    <div class="card"
                                        style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s; border-radius: 6px"
                                        onclick="handleProductClick(produk.id)"
                                        onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                                        onmouseleave="this.style.boxShadow = 'none'">
                                        <span class="badge bg-primary"
                                            style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">Produk
                                            Terlaris</span>
                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg"
                                            alt="Product"
                                            style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                                        <div class="card-body">
                                            <p class="fw-bold" style="font-size: 1rem;">Kursi Skandinavia</p>
                                            <div
                                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                <p class="card-text" style="text-align: justify; font-size: 0.9rem;">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in
                                                    quam mattis, tincidunt
                                                    urna tincidunt, volutpat libero. Praesent at sapien volutpat, cursus
                                                    nulla in, aliquet
                                                    erat
                                                </p>
                                            </div>
                                            <div
                                                style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">

                                                <span style="color: gold; ">
                                                    <i class="fas fa-star" style="font-size: 11px"></i>
                                                    <i class="fas fa-star" style="font-size: 11px"></i>
                                                    <i class="fas fa-star" style="font-size: 11px"></i>
                                                    <i class="fas fa-star" style="font-size: 11px"></i>
                                                    <i class="fas fa-star" style="font-size: 11px"></i>
                                                </span>

                                                <span style="margin-left: 5px; font-size: 0.8rem;">5 (10)</span>
                                            </div>
                                            <br>
                                            <!-- Price -->
                                            <div
                                                style="display: flex; justify-content: space-between; align-items: center;">
                                                <span style="font-size: 1rem; font-weight: bold;">Rp. 15.000.000</span>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <div class="d-flex justify-content-between">

                                                <span class="badge bg-success" style="font-size: 0.7rem;"><i
                                                        class="fa-solid fa-truck-fast me-2"></i>Free Ongkir</span>

                                                <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual
                                                    10x</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>
                        <div
                            style="text-align: right; display: flex; align-items: center; justify-content: flex-end; font-size: 1rem;">
                            <span style="margin-right: 5px;">
                                <a href="/Listseluruhproduk" style="text-decoration: none; color: black;"><b>Lihat
                                        Selengkapnya</b></a>
                            </span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                        <hr style="clear: both;">
                    </div> --}}


                    {{-- dashboard AR --}}
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
                                        <div data-aos="fade-up" data-aos-delay="200"
                                            style="margin-bottom: 20px; font-size: 18px; margin-top: 15px; margin-left: -15px">
                                            Lihat produk furnitur kami dengan teknologi Augmented Reality yang
                                            menampilkan furnitur 3D secara virtual dan letakkan pada ruangan anda tanpa
                                            perlu mengunduh aplikasi apapun. Pastikan anda mengakses teknologi ini
                                            melalui smartphone yang dapat menjalankan teknologi AR.
                                        </div>
                                        <div data-aos="fade-up" data-aos-delay="200">
                                            <a href="{{ route('category-all') }}" class="btn btn-dark btn-lg"
                                                style="border-radius: 100px; margin-bottom: 100px; margin-left: -15px">
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
                                    <model-viewer
                                        src="https://cdn.glitch.global/483eed9c-fdd2-44f9-bc4b-a9d47fa50b8b/arm_chair__furniture.glb?v=1701710260247"
                                        ios-src=""
                                        skybox-image="https://cdn.glitch.global/eeff5289-f8a2-4538-8a01-b356b23342ea/AdobeStock_190358116_Preview.jpeg?v=1673511925791"
                                        ar ar-modes="scene-viewer webxr quick-look" xr-environment ar-scale="auto"
                                        skybox-height="1.8m" shadow-intensity="1" camera-controls
                                        touch-action="pan-y" ar-placement="floor" auto-rotate
                                        style="width: 100%; height: 400px; border-radius: 15px; position: relative;">
                                        <div class="d-flex justify-content-end"
                                            style="position: absolute; bottom: 10px; right: 10px;">
                                            <span id="arSupportBadge" class="badge" style="font-size: 15px;"></span>
                                        </div>
                                        <div class="d-block d-lg-none">
                                            <button id="arButton" onclick="activateAR()"
                                                style="background-color: white; border-radius: 4px; border: none; position: absolute; top: 16px; right: 16px; height: 30px;">
                                                👋 Hey, Gunakan AR
                                            </button>
                                        </div>
                                    </model-viewer>
                                </div>
                            </div>
                            <div class="d-lg-none">
                                <div data-aos="fade-up" data-aos-delay="200"
                                    style="margin-bottom: 20px; font-size: 18px; margin-top: 15px;">
                                    Lihat produk furnitur kami dalam bentuk Augmented Reality (AR) 3D di smartphone Anda
                                    tanpa perlu mengunduh aplikasi.
                                </div>
                                <div data-aos="fade-up" data-aos-delay="200">
                                    <a href="/KategoriSC" class="btn btn-dark btn-lg"
                                        style="border-radius: 100px; margin-bottom: 100px;">
                                        Coba Pada Produk Lain
                                        <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    @include('user.komponenuser.footer')
    @include('user.include.script')
    <script>
        // Tambahkan efek hover menggunakan JavaScript
        document.querySelectorAll('.card').forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if ($flash_sale)
        <script>
            // Mengatur waktu akhir countdown
            const flashSaleDate = new Date("{{ $flash_sale->end_time }}");

            // Memperbarui hitungan mundur setiap detik
            var countdownFunction = setInterval(function() {
                // Dapatkan waktu sekarang
                var now = new Date().getTime();

                // Hitung jarak antara sekarang dan waktu akhir countdown
                var distance = flashSaleDate - now;

                // Hitung waktu untuk hari, jam, menit, dan detik
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Tampilkan hasil dalam elemen yang sesuai
                document.getElementById('days').textContent = days;
                document.getElementById('hours').textContent = hours;
                document.getElementById('minutes').textContent = minutes;
                document.getElementById('seconds').textContent = seconds;

                // Jika hitungan mundur selesai, tulis teks ini
                if (distance < 0) {
                    clearInterval(countdownFunction);
                    document.querySelector('.countdown-timer').innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    @endif

    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>
</body>

</html>

</body>

</html>
