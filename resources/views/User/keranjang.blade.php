<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keranjang</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
    @include('user.komponenuser.bottomnavbar')
</div>

@include('user.include.style')

<body>
    @include('layouts.loader')
    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Keranjang Belanja Anda.</b></h2>
        </div>


        {{-- {products.length === 0 ? ( --}}
        @if ($carts->count() == 0)
            <div class="d-none d-md-block">
                <div class="text-center">
                    <img src="{{ asset('gambar/emptycart.png') }}" alt="Keranjang Kosong"
                        style="width: 100%; max-width: 460px;" />
                    <h3 style="font-size: 20px">Oops, Keranjang Anda kosong.</h3>
                </div>
            </div>

            <div class="d-block d-md-none">
                <div class="text-center">
                    <img src="{{ asset('gambar/emptycart.png') }}" alt="Keranjang Kosong"
                        style="width: 100%; max-width: 300px;" />
                    <h3 style="font-size: 20px">Oops, Keranjang Anda kosong.</h3>
                </div>

            </div>
        @else
            {{-- PC --}}
            <div class='d-none d-md-block'>
                @foreach ($carts as $cart)
                    <div class="card bg-white mb-3 mt-5"
                        style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s;"
                        onmouseenter="(event) => (event.currentTarget.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)')"
                        onmouseleave="(event) => (event.currentTarget.style.boxShadow = 'none')">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">
                                                <i class="fas fa-check"></i>
                                            </th>
                                            <th>Produk.</th>
                                            <th>Varian.</th>
                                            <th>Kuantitas.</th>
                                            <th>Harga Satuan.</th>
                                            <th>Ongkir.</th>
                                            <th>Total Harga.</th>
                                            <th>Aksi.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="check_art[]"
                                                            type="checkbox" value="{{ $cart->id }}" id="check_cart">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <img src="{{ url($cart->product->thumbnail) }}" alt="Kursi Klasik Eropa"
                                                    width="100" height="100"
                                                    style="border-radius: 10px; object-fit: cover;">
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ $cart->varian->name }}
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <button class="btn btn-light btn-sm decre-qty" type="button">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <span id="quantityDisplay" class="mx-3">{{ $cart->qty }}</span>
                                                    <input type="hidden" name="qty" value="{{ $cart->qty }}"
                                                        id="qty">
                                                    <button class="btn btn-light btn-sm add-qty" type="button">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                @if ($cart->diskon)
                                                    @php
                                                        $harga = $cart->harga - $cart->diskon;
                                                    @endphp
                                                    <del>{{ formatRupiah($cart->harga) }}</del> <br />
                                                    <span>
                                                        {{ formatRupiah($harga) }}
                                                    </span>
                                                @else
                                                    <span>
                                                        {{ formatRupiah($cart->harga) }}
                                                    </span>
                                                @endif
                                                {{-- <del>1000000</del> <br /> --}}
                                                <br />
                                                @if ($cart->product->flashSale)
                                                    <span class="badge bg-warning ml-2">
                                                        <i class="fas fa-bolt"></i>
                                                        {{ $cart->product->flashSale->where('product_varian_id', $cart->product_varian_id)->first()->flashSale->name ?? '' }}
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="align-middle">
                                                @if ($cart->ongkir)
                                                    {{ formatRupiah($cart->ongkir) }}
                                                @else
                                                    <br />
                                                    <span>
                                                        <small>0</small>
                                                    </span>
                                                    <br />
                                                    <span class="badge bg-success">
                                                        <i class="fa-solid fa-truck-fast"></i>
                                                        Gratis Ongkir.
                                                    </span>
                                                @endif
                                            </td>
                                            @php
                                                $harga = $cart->harga;
                                                if ($cart->diskon) {
                                                    $harga = $cart->harga - $cart->diskon;
                                                }
                                                $total = $cart->qty * $harga + $cart->ongkir;
                                            @endphp
                                            <td class="align-middle">
                                                {{ formatRupiah($total) }}
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-danger remove-cart" type="button"
                                                    data-id="{{ $cart->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- Mobile --}}
            <div class='d-block d-lg-none'>
                @foreach ($carts as $cart)
                    <div class="card mb-4 mt-5">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-1">
                                    <div class="form-check">
                                        <input class="form-check-input" name="check_art_mobile_[]" id="check_cart"
                                            value="{{ $cart->id }}" type="checkbox" />
                                    </div>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <img src="{{ url($cart->product->thumbnail) }}" alt="Kursi Klasik Eropa"
                                        style="max-width: 140px; border-radius: 10px; margin-right: 10px;" />
                                    <div>
                                        <p class="fw-bold" style="font-size: 14.5px;">{{ $cart->product->name }}</p>
                                        {{-- <p class="fw-bold text-muted" style="font-size: 0.8rem;">{!! $cart->product->description !!}</p> --}}
                                    </div>
                                </div>
                            </div>


                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span>Stok Tersedia : </span>
                                        <span>{{ $cart->product->stok_sekarang }} Produk</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span>Varian yang dipilih: </span>
                                        <div>{{ $cart->varian->name }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Stock varian yang tersisa: </span>
                                        <span>{{ $cart->varian->stock }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <span style="font-size: 1.1rem;">Harga Satuan : </span>
                                        @if ($cart->diskon)
                                            @php
                                                $harga = $cart->harga - $cart->diskon;
                                            @endphp
                                            <del>{{ formatRupiah($cart->harga) }}</del> <br />
                                            <span>
                                                {{ formatRupiah($harga) }}
                                            </span>
                                        @else
                                            <span>
                                                {{ formatRupiah($cart->harga) }}
                                            </span>
                                        @endif
                                        {{-- <span>{{ formatRupiah($cart->harga) }}</span> --}}
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span style="font-size: 1.1rem;">Ongkos Kirim : </span>
                                        <span>{{ formatRupiah($cart->ongkir) }}</span>
                                    </div>
                                    @php
                                        $harga = $cart->harga;
                                        if ($cart->diskon) {
                                            $harga = $cart->harga - $cart->diskon;
                                        }
                                    @endphp
                                    <div class="d-flex justify-content-between">
                                        <span style="font-size: 1.1rem;">Total Harga : </span>
                                        <span>{{ formatRupiah($harga) }}</span>
                                    </div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger remove-cart" type="button"
                                    data-id="{{ $cart->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-light btn-sm decre-qty" type="button">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="quantityDisplay" class="mx-3">{{ $cart->qty }}</span>
                                        <input type="hidden" name="qty" value="{{ $cart->qty }}"
                                            id="qty">
                                        <button class="btn btn-light btn-sm add-qty" type="button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                @if ($carts->count() > 0)
                    <div class="d-block d-lg-none">
                        <button class="btn btn-primary mx-3 check-all-mobile" type="button">
                            Pilih Semua
                        </button>
                    </div>
                    <div class="d-lg-block d-none">
                        <button class="btn btn-primary mx-3 check-all-web" type="button">
                            Pilih Semua
                        </button>
                    </div>
                @endif
                <!-- Tombol untuk membuat pesanan -->
                <!-- Tombol ini akan menampilkan tooltip 'disabled' jika selectedProducts kosong -->
                {{-- <a href="" class="btn btn-dark d-flex align-items-center">
                    <span class="ml-2">

                    </span>
                </a> --}}
                <div class="d-block d-lg-none">
                    <button class="btn btn-dark d-flex align-items-center buat-pesanan" type="button">
                        Buat Pesanan
                        <i class="fas fa-arrow-right ml-2" style="margin-left: 10px;"></i>
                    </button>
                </div>
                <div class="d-lg-block d-none">
                    <button class="btn btn-dark d-flex align-items-center buat-pesanan-web" type="button">
                        Buat Pesanan
                        <i class="fas fa-arrow-right ml-2" style="margin-left: 10px;"></i>
                    </button>
                </div>
            </div>
        @endif
        <hr />


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
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in quam mattis,
                                        tincidunt
                                        urna tincidunt, volutpat libero. Praesent at sapien volutpat, cursus nulla in,
                                        aliquet
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
        </div>
    </div>

    @include('user.include.script')

    @include('user.komponenuser.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var quantity = 1; // Kuantitas awal
        var quantityLimit = 10; // Batas kuantitas
        const $loaderEl = $("#loading");

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
                console.log("asa", $(this));
                quantity++;
                updateQuantityDisplay();
            }
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {

            $('body').on('click', '.add-qty', function() {
                let parent = $(this).parent()
                let qty = parseInt(parent.find('#qty').val())
                if (qty < quantityLimit) {
                    qty++
                    parent.find('#qty').val(qty)
                    parent.find('#quantityDisplay').html(qty)
                }
            })

            $('body').on('click', '.decre-qty', function() {
                let parent = $(this).parent()
                let qty = parseInt(parent.find('#qty').val())
                if (qty > 1) {
                    qty--
                    parent.find('#qty').val(qty)
                    parent.find('#quantityDisplay').html(qty)
                }
            })

            $('body').on('click', '.remove-cart', function() {
                let id = $(this).attr('data-id')
                Swal.fire({
                    icon: 'warning',
                    title: "Apakah anda ingin menghapus product ini?",
                    text: "Product yang sudah di hapus tidak bisa dikembalikan",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Delete",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('delete-cart') }}/" + id,
                            method: 'DELETE',
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
                                        location.reload()
                                    }
                                });
                            },
                            error: function(err) {
                                $loaderEl.addClass('d-none')
                                let message = "";
                                const json = err.responseJSON;
                                if (json !== undefined) {
                                    message = json.message ?? "Internal Server Error";
                                    if (json.errors !== undefined && typeof json
                                        .errors === "string") message +=
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
                    }
                })
            })

            $('body').on('click', '.check-all-mobile', function() {
                $.each($('input[name="check_art_mobile_[]"]'), function(i, elem) {
                    if ($(elem).is(':checked')) {
                        $(elem).attr('checked', false)
                    } else {
                        $(elem).attr('checked', true)
                    }
                })
            })

            $('body').on('click', '.check-all-web', function() {
                $.each($('input[name="check_art[]"]'), function(i, elem) {
                    if ($(elem).is(':checked')) {
                        $(elem).attr('checked', false)
                    } else {
                        $(elem).attr('checked', true)
                    }
                })
            })

            $('body').on('click', '.buat-pesanan-web', function() {
                let cart = []
                $.each($('input[name="check_art[]"]'), function(i, elem) {
                    if ($(elem).is(':checked')) {
                        cart.push($(elem).val())
                    }
                })
                if (cart.length < 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Harap pilih product cart terlebih dahulu',
                    });
                    return
                }

                $.ajax({
                    url: "{{ route('post-checkout') }}",
                    method: 'POST',
                    data: JSON.stringify({
                        id: cart
                    }),
                    contentType: 'application/json',
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
                            if (json.errors !== undefined && typeof json
                                .errors === "string") message +=
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
        })
    </script>
</body>

</html>
