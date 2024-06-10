{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Detail Produk')

@section('content_header')
    <li class="breadcrumb-item">
        <a href="/">Home</a>
    </li>
    <li class="breadcrumb-item active">
        Detail Product {{ $product->name }}
    </li>
@stop

{{-- tahap section jangan lupa di tutup --}}
@section('content')

    <section class="section dashboard">
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
                                        @if ($product->is_active)
                                            <span class="badge rounded-pill bg-success text-light">
                                                Produk Aktif | Produk Tampil
                                            </span>
                                        @else
                                            <span class="badge rounded-pill bg-danger text-light">
                                                Produk Tidak Aktif | Produk Tidak Tampil
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Produk</td>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Nama Produk</td>
                                    <td>{{ $product->sub_name }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>{{ $product->category->name }}</td>
                                </tr>
                                @php
                                    $prodVarian = false;
                                    $varian = '-';
                                    if ($product->varians->count()) {
                                        $prodVarian = true;
                                        $prodVar = $product->varians->pluck('name')->toArray();
                                        $varian = implode(', ', $prodVar);
                                    }
                                @endphp
                                <tr>
                                    <td>Varian</td>
                                    <td>{{ $varian }}</td>
                                </tr>
                                <tr>
                                    <td>Harag Product</td>
                                    <td>{{ formatRupiah($product->harga) }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Varian</td>
                                    <td>
                                        @if ($prodVarian)
                                            <ul>
                                                @foreach ($product->varians as $varian)
                                                    <li>{{ $varian->name }} : {{ formatRupiah($varian->harga) }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stok Awal</td>
                                    <td>
                                        @if ($prodVarian)
                                            <ul>
                                                @foreach ($product->varians as $var)
                                                    <li>{{ $var->name }} : {{ $var->stock }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Stok Saat Ini</td>
                                    <td>
                                        @if ($prodVarian)
                                            <ul>
                                                @foreach ($product->varians as $var)
                                                    <li>{{ $var->name }} : {{ $var->stock }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Terjual</td>
                                    <td>0 Produk Terjual</td>
                                </tr>
                                <tr>
                                    <td>Ongkos Kirim</td>
                                    <td>
                                        @if ($product->harga_ongkir)
                                            {{ formatRupiah($product->harga_ongkir) }}
                                        @else
                                            Gratis Ongkir
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diskon Produk</td>
                                    <td>
                                        @if ($prodVarian)
                                            <ul>
                                                @foreach ($product->varians as $var)
                                                    <li>{{ $var->name }} : {{ $var->diskon ? $var->diskon : '-' }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dimensi Produk</td>
                                    <td>
                                        @if ($prodVarian)
                                            <ul>
                                                @foreach ($product->varians as $var)
                                                    <li>{{ $var->name }} : Tinggi ({{ $var->tinggi ?? 0 }}), Lebar
                                                        ({{ $var->lebar ?? 0 }})
                                                        , Panjang ({{ $var->panjang ?? 0 }})</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi Produk</td>
                                    <td>{!! $product->description !!}</td>
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
                                    <td style="width: 70%;">{{ $product->link_ar }}</td>
                                </tr>
                                <tr>
                                    <td>Link AR iOS</td>
                                    <td style="width: 70%;">{{ $product->link_ar_ios }}</td>
                                </tr>
                                <tr>
                                    <td>Link SkyBox</td>
                                    <td style="width: 70%;">{{ $product->link_skybox }}</td>
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
                            <img src="{{ url($product->thumbnail) }}" class="d-block w-100" alt="Slide 1"
                                style="border-radius: 10px;">
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
                                    @foreach ($product->images as $i => $img)
                                        <div class="carousel-item @if ($i == 0) active @endif">
                                            <img src="{{ url($img->image) }}" class="d-block w-100"
                                                alt="Slide {{ $i + 1 }}" style="border-radius: 10px;">
                                        </div>
                                    @endforeach
                                    {{-- <div class="carousel-item">
                                        <img src="assets/assets/img/product-2.jpg" class="d-block w-100" alt="Slide 2"
                                            style="border-radius: 10px;">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/assets/img/product-3.jpg" class="d-block w-100" alt="Slide 3"
                                            style="border-radius: 10px;">
                                    </div> --}}
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
