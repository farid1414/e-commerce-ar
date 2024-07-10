<!DOCTYPE html>
<html lang="en">

<head>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            max-width: 200px;
            /* Batasi lebar maksimum */
        }

        /* CSS untuk scrollbar */
        .product-list::-webkit-scrollbar {
            width: 5px;
            /* Lebar scrollbar */
        }

        /* Track */
        .product-list::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Warna track scrollbar */
        }

        /* Handle */
        .product-list::-webkit-scrollbar-thumb {
            background: #888;
            /* Warna handle scrollbar */
            border-radius: 10px;
        }

        /* Handle on hover */
        .product-list::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Warna handle scrollbar saat hover */
        }

        .carousel-item img {
            height: 400px;
            /* Tinggi tetap untuk semua gambar */
            object-fit: cover;
            /* Memastikan gambar sesuai dengan ukuran yang ditetapkan */
        }
    </style>
    <style>
        #controls {
            position: absolute;
            bottom: 16px;
            left: 16px;
            max-width: unset;
            transform: unset;
            pointer-events: auto;
            z-index: 100;
        }

        .dot {
            display: none;
        }

        .dim {
            background: #fff;
            border-radius: 4px;
            border: none;
            box-sizing: border-box;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
            color: rgba(0, 0, 0, 0.8);
            display: block;
            font-family: Futura, Helvetica Neue, sans-serif;
            font-size: 1em;
            font-weight: 700;
            max-width: 128px;
            overflow-wrap: break-word;
            padding: 0.5em 1em;
            position: absolute;
            width: max-content;
            height: max-content;
            transform: translate3d(-50%, -50%, 0);
            pointer-events: none;
            --min-hotspot-opacity: 0;
        }

        @media only screen and (max-width: 800px) {
            .dim {
                font-size: 3vw;
            }
        }

        .dimensionLineContainer {
            pointer-events: none;
            display: block;
        }

        .dimensionLine {
            stroke: #16a5e6;
            stroke-width: 2;
            stroke-dasharray: 2;
        }

        .hide {
            display: none;
        }

        /* This keeps child nodes hidden while the element loads */
        :not(:defined)>* {
            display: none;
        }
    </style>
    <style>
        .description {
            margin-top: -40px;
            word-wrap: break-word;
            white-space: pre-wrap;
            max-width: 50;
            /* Restrict the width to 30 characters */
        }
    </style>
</head>
{{-- INCLUDE & KOMPONEN --}}

@include('user.komponenuser.navbaruser')

@include('user.include.style')

<body>
    @include('layouts.loader')
    <div class="container">
        <div class="row mt-2">
            <div class="col-xs-12 col-md-8">
                <div class="container">

                    {{-- Gambar PRODUK untuk PC --}}
                    <div class='d-none d-md-block'>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="container">
                                    <div class="product-list d-flex flex-column overflow-auto"
                                        style="max-height: 350px; border-radius: 10px">
                                        @foreach ($product->images as $img)
                                            <img src="{{ url($img->image) }}" alt="Produk 1">
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                    <div class="carousel-indicators">
                                        @foreach ($product->images as $index => $img)
                                            <button type="button" data-bs-target="#carouselExampleDark"
                                                data-bs-slide-to="{{ $index }}"
                                                @if ($index == 0) class="active" @endif
                                                aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
                                        @endforeach
                                    </div>
                                    @php
                                        $incrementProduct = 0;
                                    @endphp
                                    <div class="carousel-inner">
                                        @foreach ($product->images as $index => $img)
                                            <div class="carousel-item @if ($index == 0) active @endif"
                                                data-bs-interval="{{ $incrementProduct += 1000 }}">
                                                <img src="{{ url($img->image) }}" class="d-block w-100" alt="..."
                                                    style="border-radius: 10px">
                                            </div>
                                        @endforeach
                                        {{-- <div class="carousel-item active">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar2.jpg"
                                                class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar3.jpg"
                                                class="d-block w-100" alt="...">
                                        </div> --}}
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleDark" data-bs-slide="next">
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
                                    @foreach ($product->images as $index => $img)
                                        <button type="button" data-bs-target="#carouselExampleDark"
                                            data-bs-slide-to="{{ $index }}"
                                            @if ($index == 0) class="active" @endif aria-current="true"
                                            aria-label="Slide {{ $index + 1 }}"></button>
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @foreach ($product->images as $index => $img)
                                        <div class="carousel-item @if ($index == 0) active @endif"
                                            data-bs-interval="{{ $incrementProduct += 1000 }}">
                                            <img src="{{ url($img->image) }}" class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleDark1" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleDark1" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                            <div class="container mt-4">
                                <div class="row">
                                    @foreach ($product->images as $index => $img)
                                        <div class="col">
                                            <img src="{{ url($img->image) }}" class="img-fluid" alt="Product 1">
                                        </div>
                                    @endforeach

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
                        {{-- @include('user.produk.arexperiment') --}}


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
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <b>Tentang Produk Ini</b>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body description">
                                        {!! $product->description ?? '' !!}
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
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo1" aria-expanded="true"
                                                aria-controls="collapseTwo1">
                                                <b>Penilaian Produk Ini</b>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo1" class="accordion-collapse collapse show"
                                            aria-labelledby="headingTwo1" data-bs-parent="#accordionExample2">
                                            <div class="accordion-body">
                                                <div>
                                                    @php
                                                        $rate = 0;
                                                        $count = 0;
                                                        $maxStars = 5;
                                                        $val = $ratings->sum('rating_value');
                                                        $count = $ratings->count();
                                                        if ($count > 0) {
                                                            $rate = $val / $count;
                                                        }
                                                        $ratingCounts = [
                                                            5 => $ratings->where('rating_value', '=', 5)->count(),
                                                            4 => $ratings->where('rating_value', '=', 4)->count(),
                                                            3 => $ratings->where('rating_value', '=', 3)->count(),
                                                            2 => $ratings->where('rating_value', '=', 2)->count(),
                                                            1 => $ratings->where('rating_value', '=', 1)->count(),
                                                        ];
                                                    @endphp
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="col">
                                                            <p style="font-size: 3rem; text-align: center;">
                                                                @if ($count > 0)
                                                                    {{ number_format($val / $count, 1) }}
                                                                @else
                                                                    0
                                                                @endif <span
                                                                    style="font-size: 1.2rem;">/{{ $count }}</span>
                                                            </p>
                                                            <div class="d-flex justify-content-center">
                                                                {{-- <i class="bi bi-star-fill"
                                                                    style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i>
                                                                <i class="bi bi-star-fill"
                                                                    style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i>
                                                                <i class="bi bi-star-fill"
                                                                    style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i>
                                                                <i class="bi bi-star-fill"
                                                                    style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i>
                                                                <i class="bi bi-star"
                                                                    style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i> --}}
                                                                @for ($i = 1; $i <= $maxStars; $i++)
                                                                    @if ($i <= $rate)
                                                                        <i class="bi bi-star-fill"
                                                                            style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i>
                                                                    @else
                                                                        <i class="bi bi-star"
                                                                            style="font-size: 1.5rem; color: gold; text-align: center; margin-top: -10px;"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <span class="text-muted"
                                                                    style="font-size: 0.9rem; margin-top: 10px;">
                                                                    {{ $count }} Ulasan
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            @foreach ($ratingCounts as $star => $cnt)
                                                                @php
                                                                    $percentage = $count ? ($cnt / $count) * 100 : 0;
                                                                @endphp
                                                                <div class="d-flex align-items-center">
                                                                    <span
                                                                        style="margin-right: 5px;">{{ $star }}</span>
                                                                    <div class="progress flex-grow-1 mb-2">
                                                                        <div class="progress-bar bg-dark"
                                                                            role="progressbar"
                                                                            style="width: {{ $percentage }}%;"
                                                                            aria-valuenow="{{ $percentage }}"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between"
                                                        style="margin-top: 30px;">
                                                        <p class="fw-bold">Filter Ulasan :</p>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-dark dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Terbaru
                                                            </button>
                                                            <ul class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
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
                                                        <small>Menampilkan 10 dari {{ $count }} ulasan</small>
                                                    </p>

                                                    <hr>

                                                    @php
                                                        // function maskString($string)
                                                        // {
                                                        //     if (strlen($string) <= 2) {
                                                        //         return $string;
                                                        //     }
                                                        //     $length = strlen($string);
                                                        //     $first = $string[0];
                                                        //     $last = $string[$length - 1];
                                                        //     $middle = str_repeat('*', $length - 2);
                                                        //     return $first . $middle . $last;
                                                        // }
                                                    @endphp

                                                    {{-- ULASAN PELANGGGAN --}}
                                                    <div>
                                                        @if ($ratings->count() > 0)
                                                            @foreach ($ratings as $index => $rating)
                                                                <div class="mb-3">
                                                                    <div class="d-flex justify-content-between mb-1">
                                                                        <h5 class="card-title">
                                                                            @if ($rating->is_samaran)
                                                                                {{ maskString($rating->user->name) }}
                                                                            @else
                                                                                {{ $rating->user->name }}
                                                                            @endif
                                                                        </h5>
                                                                        <span class="text-muted"
                                                                            style="font-size: 0.85rem;">{{ $rating->created_date() }}</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="d-flex justify-content-start">
                                                                                @for ($i = 0; $i < $rating->rating_value; $i++)
                                                                                    <i class="bi bi-star-fill"
                                                                                        style="font-size: 1.3rem; color: gold;"></i>
                                                                                @endfor
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if ($rating->varian_id)
                                                                        <p class="mt-2 text-muted">Varian :
                                                                            {{ $rating->varians->name }}</p>
                                                                    @endif
                                                                    <div class="row">
                                                                        @if ($rating->image)
                                                                            <div class="col">
                                                                                <img src="{{ url($rating->image) }}"
                                                                                    class="img-fluid" alt="Product 3"
                                                                                    style="max-height: 100px">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <p>{!! $rating->text_value !!}</p>

                                                                    @if ($rating->balasan)
                                                                        <div id="balasan">
                                                                            <div class="d-flex justify-content-end">
                                                                                <button class="btn btn-outline-dark "
                                                                                    type="button"
                                                                                    data-bs-toggle="collapse"
                                                                                    data-bs-target="#example-collapse-text_{{ $index }}"
                                                                                    aria-expanded="false"
                                                                                    aria-controls="example-collapse-text_{{ $index }}">
                                                                                    Lihat Balasan <i
                                                                                        class="bi bi-chevron-down"></i>
                                                                                </button>
                                                                            </div>

                                                                            <div id="example-collapse-text_{{ $index }}"
                                                                                class="collapse">
                                                                                <div class="card mt-3">
                                                                                    <div class="card-body">
                                                                                        <div
                                                                                            class="d-flex justify-content-between">
                                                                                            <h5 class="card-title">
                                                                                                AR-Furniture
                                                                                                <span
                                                                                                    class="badge bg-dark"
                                                                                                    style="font-size: 0.7rem;">Penjual</span>
                                                                                            </h5>
                                                                                            <p class="text-muted"
                                                                                                style="font-size: 0.85rem;">
                                                                                                {{ $rating->balasan->created_at }}
                                                                                            </p>
                                                                                        </div>
                                                                                        {!! $rating->balasan->balasan !!}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <hr>
                                                            @endforeach
                                                            {{ $ratings->links() }}
                                                        @else
                                                            <p class="text-center">Tidak ada rating</p>
                                                        @endif
                                                        <hr />
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
                            <b>{{ $product->name }}</b>
                        </div>

                        {{-- SUB NAMA PRODUK --}}
                        <div class="mt-3">
                            <p>
                                {{ $product->sub_name }}
                            </p>

                            @php
                                $harga = number_format($product->harga, 0, ',', '.');
                                if ($product->varians->count()) {
                                    $min = number_format($product->varians->min('harga'), 0, ',', '.');
                                    $max = number_format($product->varians->max('harga'), 0, ',', '.');
                                    $harga = $min . ' - ' . $max;
                                }
                            @endphp
                            {{-- HARGA DAN RENTANG HARGA PRODUK  --}}
                            <h2 style="font-size: 1.4rem;">
                                <b>Rp {{ $harga }}</b>
                            </h2>
                        </div>


                        {{-- BINTANG PRODUK --}}
                        <div class="mt-3">
                            <div class="d-flex align-items-center">
                                <!-- Placeholder for star ratings -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-start me-3">
                                            @for ($i = 1; $i < $rate; $i++)
                                                <i class="bi bi-star-fill"
                                                    style="font-size: 1.3rem; color: gold;"></i>
                                            @endfor
                                            {{-- <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                            <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i>
                                            <i class="bi bi-star-fill" style="font-size: 1.3rem; color: gold;"></i> --}}
                                        </div>
                                    </div>
                                </div>
                                <span style="font-size: 20px;">{{ $rate }}</span>
                            </div>
                        </div>

                        {{-- VARIAN PRODUK --}}
                        <div class="mt-3">
                            <hr />
                            <p>Varian Produk</p>
                            <div class="d-flex justify-content-start">
                                @if ($product->varians->count())
                                    @foreach ($product->varians as $v)
                                        <div class="color-box"
                                            style="background-color: {{ $v->warna ?? '#fff' }}; width: 30px; height: 30px; margin-right: 10px; position: relative; border-radius: 5px;">
                                            <!-- Placeholder for variant color box 1 -->
                                        </div>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </div>
                            <hr />

                            {{-- STOCK YANG TERSEDIAA --}}
                            <span>Total Stock yang tersedia: {{ $product->stock }}</span>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-outline-dark btn-lg w-100" style="border-radius: 25px;"
                                id="btnMasukkanKeranjang">Masukkan Keranjang</button>
                        </div>
                        <hr />
                        {{-- ONGKOS KIRIM   --}}
                        <p>Biaya ongkos kirim produk ini adalah :</p>
                        @if ($product->harga_ongkir)
                            <h4>
                                <b>{{ $product->harga_ongkir }}</b>
                            </h4>
                            <span style="text-align: justify;">
                                ("Harga ongkos kirim yang tertera berlaku untuk pembelian satu produk saja. Jika membeli
                                lebih dari satu produk, maka akan dikenakan biaya kirim yang berkelipatan.")
                            </span>
                        @else
                            <span class="badge badge-success">Gratis Ongkir</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Modal KERANJANG -->
    <div class="modal fade" id="modalMasukkanKeranjang" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document"
            style="display: flex; align-items: center; justify-content: center; height: 100vh;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah ke Keranjang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="form-cart">
                    <div class="modal-body">
                        <div class="d-flex justify-content-between">
                            <label for="" class="form-label">Pilih Varian Produk</label>
                            <div>
                                <select name="varian" required id="varian" class="form-select">
                                    <option value="" selected>Pilih Varian</option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p>Kuantitas</p>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-light btn-sm" onclick="decreaseQuantity()">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <span id="quantityDisplay" class="mx-3">1</span>
                                <input type="hidden" name="quantity" id="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="button" class="btn btn-light btn-sm" onclick="increaseQuantity()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p>Harga Produk</p>
                            <p id="label-harga">0</p>
                            <input type="hidden" readonly name="harga" id="harga">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Diskon</p>
                            <p id="label-diskon">0</p>
                            <input type="hidden" name="diskon" readonly id="diskon">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Ongkos Kirim</p>
                            <p id="label-ongkir">0</p>
                            <input type="hidden" name="ongkir" readonly id="ongkir">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"
                            onclick="closeModal()">Tutup</button>
                        <button type="submit" class="btn btn-dark">Ya, Masukkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('user.include.script')

    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>

    @include('user.komponenuser.footer')
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const $loaderEl = $("#loading");
        // document.getElementById('btnMasukkanKeranjang').addEventListener('click', function() {
        //     $('#modalMasukkanKeranjang').modal('show');
        // });

        function formatRupiah(angka, prefix = 'Rp') {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        let DataProduct = ''
        let DataVarian = ''
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $("body").on("click", '#btnMasukkanKeranjang', function() {
                $.ajax({
                    url: "{{ route('get-detail-product', $product->uuid) }}",
                    method: 'GET',
                    beforeSend: function() {
                        $loaderEl.removeClass('d-none')
                    },
                    success: function(response) {
                        $loaderEl.addClass('d-none')
                        DataProduct = response.data
                        DataVarian = response.data.varians
                        createKeranjang(response.data)
                    },
                    error: function(xhr) {
                        $loaderEl.addClass('d-none')
                        console.error("err", xhr);
                    }
                })
            })
        })

        const createKeranjang = (data) => {
            let ongkir = 0
            if (data.varians.length > 0) {
                $.each(data.varians, function(i, val) {
                    $('#varian').append($('<option>', {
                        value: val.id,
                        text: val.name
                    }));
                })
            }
            if (data.harga_ongkir) {
                ongkir = formatRupiah(data.harga_ongkir)
            }
            $('#harga').val(data.harga)
            $('#label-harga').html(formatRupiah(data.harga))
            $('#label-ongkir').html(ongkir)
            $('#ongkir').val(ongkir)
            $('#modalMasukkanKeranjang').modal('show');
        }

        $('body').on('change', '#varian', function() {
            if ($(this).val()) {
                let id = $(this).val()
                let data = DataVarian.filter(val => val.id == id)
                $('#harga').val(data[0].harga)
                $('#label-harga').html(formatRupiah(data[0].harga))
                if (data[0].diskon) {
                    $('#diskon').val(data[0].diskon)
                    $('#label-diskon').html(formatRupiah(data[0].diskon))
                }
            }
        })

        $('body').on('submit', '#form-cart', function(e) {
            e.preventDefault()
            let data = new FormData(this)
            $.ajax({
                url: "{{ route('add-to-cart') }}",
                method: 'POST',
                data: data,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $loaderEl.removeClass('d-none')
                },
                success: function(response) {
                    $loaderEl.addClass('d-none')
                    Swal.fire({
                        title: 'Sucess',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = response.url
                        }
                    });
                },
                error: function(err) {
                    $loaderEl.addClass('d-none')
                    let message = "";
                    const json = err.responseJSON;
                    if (json !== undefined) {
                        message = json.message ?? "Internal Server Error";
                        if (json.errors !== undefined && typeof json.errors === "string") message +=
                            `\n${json.errors}`;
                    } else message = `[${err.status}] ${err.statusText}`;
                    let login = "{{ route('login') }}"
                    if (message == "Unauthenticated.") {
                        window.location.href = login;
                        return
                    }

                    Swal.fire({
                        title: 'Error',
                        text: message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            })
        })

        const modelViewerColor = document.querySelector("model-viewer#color");

        // document.querySelector('#color-controls').addEventListener('click', (event) => {
        $('body').on('click', '#color-controls', function(e) {
            // document.querySelector('#color-controls').addEventListener('click', (event) => {
            event.preventDefault()
            const colorString = event.target.dataset.color;
            const [material] = modelViewerColor.model.materials;
            if (colorString) {
                if (colorString === "Original") {
                    // Jika memilih Original, gunakan warna bawaan
                    material.pbrMetallicRoughness.setBaseColorFactor(null);

                    // Perbarui teks dropdown menjadi "Original"
                    document.getElementById('selectedColor').textContent = 'Original';
                } else {
                    let color = ''
                    try {
                        color = JSON.parse(colorString)
                    } catch {
                        color = colorString
                    }
                    // console.log("color", JSON.parse(colorString));
                    material.pbrMetallicRoughness.setBaseColorFactor(color);
                    // material.pbrMetallicRoughness.setBaseColorFactor(JSON.parse("colorString"));

                    // Perbarui teks dropdown dengan warna yang dipilih
                    const selectedColorText = `${event.target.textContent}`;
                    document.getElementById('selectedColor').textContent = selectedColorText;
                }
            }
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
            $('#quantity').val(quantity)
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
