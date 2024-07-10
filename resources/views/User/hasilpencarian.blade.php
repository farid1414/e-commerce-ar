<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
    @include('user.komponenuser.bottomnavbar')
</div>

@include('user.include.style')

<body>
    @include('layouts.loader')
    {{-- hasil pencarian untuk search bar PC only --}}
    <section>
        <div class="container">
            <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
                <h2><b>Temukan produk yang anda cari.
                    </b></h2>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span style="font-size: 1rem;">Menampilkan <b>
                            "
                            {{ $req }}
                            "
                            .</b></span>
                </div>
                <select name="" id="" class="urutkan-produk form-select w-25 ">
                    <option>Pilih</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="harga_tertinggi">Harga Tertinggi</option>
                    <option value="harga_rendah">Harga Terendah</option>
                    <option value="az">Alfabet A-Z</option>
                    <option value="za">Alfabet Z-A</option>
                    <option value="gratis_ongkir">Gratis Ongkir</option>
                </select>
                {{-- <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Produk Terbaru
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" onclick="handleSortOption('Produk Terbaru')">Produk
                                Terbaru</a></li>
                        <li><a class="dropdown-item" href="#" onclick="handleSortOption('Harga Tertinggi')">Harga
                                Tertinggi</a></li>
                        <li><a class="dropdown-item" href="#" onclick="handleSortOption('Harga Terendah')">Harga
                                Terendah</a></li>
                        <li><a class="dropdown-item" href="#" onclick="handleSortOption('Alfabet A-Z')">Alfabet
                                A-Z</a></li>
                        <li><a class="dropdown-item" href="#" onclick="handleSortOption('Alfabet Z-A')">Alfabet
                                Z-A</a></li>
                        <li><a class="dropdown-item" href="#" onclick="handleSortOption('Gratis Ongkir')">Gratis
                                Ongkir</a></li>
                    </ul>
                </div> --}}
            </div>
            <br>

            <div class="container mt-2">
                <div class="row elem-prod">
                    @forelse ($product as $prod)
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                            <a href="{{ route('detail-product', $prod->uuid) }}" style="text-decoration: none;">
                                <div class="card"
                                    style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s; border-radius: 6px""
                                    onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                                    onmouseleave="this.style.boxShadow = 'none'">
                                    <span class="badge bg-danger"
                                        style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">Produk
                                        Terbaru !!</span>
                                    <img src="{{ url($prod->thumbnail) }}" alt="Product"
                                        style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                                    <div class="card-body">
                                        <p class="fw-bold" style="font-size: 1rem;">{{ $prod->name }}</p>
                                        <div
                                            style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <p class="card-text" style="text-align: justify; font-size: 0.9rem;">
                                                {!! $prod->description !!}
                                            </p>
                                        </div>
                                        <div
                                            style="margin-top: 10px; display: flex; align-items: center; justify-content: left; margin-bottom: -12px;">
                                            <!-- Star Rating -->
                                            <span style="color: gold; font-size: 0.9rem;" id="rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <!-- Rating Text -->
                                            <span style="margin-left: 5px; font-size: 0.8rem;" id="count_rate">5
                                                (10)
                                            </span>
                                        </div>
                                        <br>
                                        <!-- Price -->
                                        <div
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            <span
                                                style="font-size: 1rem; font-weight: bold;">{{ formatRupiah($prod->harga) }}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div
                                            class="d-flex @if (!$prod->harga_ongkir) justify-content-between
                                                @else
                                                    justify-content-end @endif ">
                                            <!-- Free Shipping Badge -->
                                            @if (!$prod->harga_ongkir)
                                                <span class="badge bg-success" style="font-size: 0.7rem;"><i
                                                        class="fa-solid fa-truck-fast me-2"></i>Free Ongkir</span>
                                            @endif
                                            <!-- Sold Badge -->
                                            <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual 10x</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <h3 class="text-center">Tidak Ada Product</h3>
                    @endforelse
                    <!-- End of Loop -->
                </div>
            </div>
        </div>

        <div class="template-prod d-none">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <a href="" id="link_prod" style="text-decoration: none;">
                    <div class="card"
                        style="width: 100%; margin-bottom: 20px; position: relative; transition: box-shadow 0.3s; border-radius: 6px""
                        onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                        onmouseleave="this.style.boxShadow = 'none'">
                        <span class="badge bg-danger"
                            style="position: absolute; top: 10px; right: 10px; font-size: 0.8rem;">Produk
                            Terbaru !!</span>
                        <img id="img_prod" src="" alt="Product"
                            style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                        <div class="card-body">
                            <p class="fw-bold" id="prod_name" style="font-size: 1rem;"></p>
                            <div
                                style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                <p class="card-text" style="text-align: justify; font-size: 0.9rem;" id="desc_prod">
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
                                <span style="font-size: 1rem; font-weight: bold;" id="harga_prod"></span>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="d-flex justify-content-between">
                                <!-- Free Shipping Badge -->
                                <span class="badge bg-success d-none" id="free_ongkir" style="font-size: 0.7rem;"><i
                                        class="fa-solid fa-truck-fast me-2"></i>Free Ongkir</span>
                                <!-- Sold Badge -->
                                <span class="badge bg-dark" style="font-size: 0.65rem;" id="terjual">Terjual
                                    x</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </section>
    @include('user.komponenuser.footer')
    @include('user.include.script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // const sortCardsAlphabetically = (cards, option) => {
        //     switch (option) {
        //         case "Alfabet A-Z":
        //             return cards.sort((a, b) => a.title.localeCompare(b.title));
        //         case "Alfabet Z-A":
        //             return cards.sort((a, b) => b.title.localeCompare(a.title));
        //         default:
        //             return cards;
        //     }
        // };

        // const sortCardsByNewest = (cards, option) => {
        //     if (option === "Produk Terbaru") {
        //         const cardsWithGratisOngkir = cards.filter(
        //             (card) =>
        //             card.Badge === "Produk Terbaru !!" &&
        //             card.ongkoskirim === "Gratis Ongkir",
        //         );

        //         const cardsWithoutGratisOngkir = cards.filter(
        //             (card) =>
        //             card.Badge === "Produk Terbaru !!" &&
        //             card.ongkoskirim !== "Gratis Ongkir",
        //         );

        //         const otherCards = cards.filter(
        //             (card) => card.Badge !== "Produk Terbaru !!" || !card.Badge,
        //         );

        //         const sortedCardsWithGratisOngkir = cardsWithGratisOngkir.sort(
        //             (a, b) => b.id - a.id,
        //         );

        //         const sortedCardsWithoutGratisOngkir = cardsWithoutGratisOngkir.sort(
        //             (a, b) => b.id - a.id,
        //         );

        //         return [
        //             ...sortedCardsWithGratisOngkir,
        //             ...sortedCardsWithoutGratisOngkir,
        //             ...otherCards,
        //         ];
        //     } else if (option === "Gratis Ongkir") {
        //         const cardsWithGratisOngkir = cards.filter(
        //             (card) => card.ongkoskirim === "Gratis Ongkir",
        //         );

        //         const cardsWithoutGratisOngkir = cards.filter(
        //             (card) => card.ongkoskirim !== "Gratis Ongkir",
        //         );

        //         const sortedCardsWithGratisOngkir = cardsWithGratisOngkir.sort(
        //             (a, b) => b.id - a.id,
        //         );

        //         const sortedCardsWithoutGratisOngkir = cardsWithoutGratisOngkir.sort(
        //             (a, b) => b.id - a.id,
        //         );

        //         return [
        //             ...sortedCardsWithGratisOngkir,
        //             ...sortedCardsWithoutGratisOngkir,
        //         ];
        //     }
        //     return cards;
        // };

        // const sortCards = (cards, option) => {
        //     switch (option) {
        //         case "Harga Tertinggi":
        //             return cards.sort((a, b) => b.price - a.price);
        //         case "Harga Terendah":
        //             return cards.sort((a, b) => a.price - b.price);
        //         case "Alfabet A-Z":
        //         case "Alfabet Z-A":
        //         case "Produk Terbaru":
        //         case "Gratis Ongkir":
        //             return sortCardsByNewest(
        //                 sortCardsAlphabetically([...cards], option),
        //                 option,
        //             );
        //         default:
        //             return cards;
        //     }
        // };

        // let sortOption = "Produk Terbaru";

        // const handleSortOption = (option) => {
        //     sortOption = option === "Produk Terbaru" ? "Produk Terbaru" : option;
        // };
    </script>

    <script>
        const $loaderEl = $("#loading");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('body').on('change', '.urutkan-produk', function() {
                // let data = $(this).attr('data-id')
                let data = $(this).val()
                $.ajax({
                    url: "{{ route('order-product') }}",
                    method: 'GET',
                    data: {
                        data: data,
                        search: "{{ $req }}"
                    },
                    contentType: true,
                    processData: true,
                    beforeSend: function() {
                        $loaderEl.removeClass('d-none')
                    },
                    success: function(resp) {
                        $loaderEl.addClass('d-none')

                        if (resp.success) {
                            $('.elem-prod').html('')
                            let html = ''
                            let routeTemplate = "{{ route('detail-product', 'UUID') }}";
                            $.each(resp.data, function(i, prod) {
                                let route = routeTemplate.replace('UUID', prod.uuid);
                                let clone = $('.template-prod > div').clone()
                                clone.find('#link_prod').attr('href', route)
                                clone.find('#img_prod').attr('src', prod.thumbnail)
                                clone.find('#prod_name').html(prod.name)
                                clone.find('#desc_prod').html(prod.description)
                                clone.find('#harga_prod').html(prod.harga)
                                clone.find('#terjual').html(`Terjual ${prod.quantity}x`)
                                if (prod.harga_ongkir == null) {
                                    $('#free_ongkir').removeClass('d-none')
                                } else {
                                    $('#free_ongkir').addClass('d-none')
                                }
                                if (prod.countRate > 0) {
                                    let html = ''
                                    for (let index = 0; index < prod
                                        .countRate; index++) {
                                        html += ' <i class="fas fa-star"></i>'
                                    }
                                    clone.find('#rate').html(html)
                                    clone.find('#count_rate').html(
                                        `${prod.rate} (${prod.countRate})`)
                                }
                                $('.elem-prod').append(clone)
                            })
                        }
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
                // sortOption = option === "Produk Terbaru" ? "Produk Terbaru" : option;
            });
        })
    </script>
    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>
</body>

</html>
