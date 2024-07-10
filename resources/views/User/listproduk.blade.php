<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@include('user.komponenuser.navbaruser')



@include('user.include.style')

<body>
    @include('layouts.loader')
    <section>
        <div class="container">
            <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
                <h2><b>Telusuri Semua Produk Category {{ $category->name }}.
                    </b></h2>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{-- <span style="font-size: 1rem;">Menampilkan <b>
                            "
                            {{sortOption}}
                            "
                            .</b></span> --}}
                </div>
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
                <select name="" id="" class="urutkan-produk form-select w-25 ">
                    <option>Pilih</option>
                    <option value="terbaru">Terbaru</option>
                    <option value="harga_tertinggi">Harga Tertinggi</option>
                    <option value="harga_rendah">Harga Terendah</option>
                    <option value="az">Alfabet A-Z</option>
                    <option value="za">Alfabet Z-A</option>
                    <option value="gratis_ongkir">Gratis Ongkir</option>
                </select>
            </div>
            <br>

            <div class="container mt-5">
                <div class="row elem-prod">
                    @foreach ($category->products->where('is_active', '=', 1) as $prod)
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="{{ route('detail-product', $prod->uuid) }}" class="text-decoration-none">
                                <div class="card h-100" style="transition: box-shadow 0.3s; border-radius: 6px;"
                                    onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                                    onmouseleave="this.style.boxShadow = 'none'">
                                    <span class="badge bg-danger position-absolute"
                                        style="top: 10px; right: 10px; font-size: 0.8rem;">Produk Terbaru !!</span>
                                    <img src="{{ url($prod->thumbnail) }}" alt="Product" class="card-img-top"
                                        style="max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                                    <div class="card-body d-flex flex-column">
                                        <p class="fw-bold" style="font-size: 1rem;">{{ $prod->name }}</p>
                                        <div class="flex-grow-1"
                                            style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <p class="card-text" style="text-align: justify; font-size: 0.9rem;">
                                                {!! $prod->description !!}</p>
                                        </div>
                                        <div class="mt-auto">
                                            @php
                                                $rating = 0;
                                                $count = 0;
                                                $val = $ratings
                                                    ->where('product_id', '=', $prod->id)
                                                    ->sum('rating_value');
                                                $count = $ratings->where('product_id', '=', $prod->id)->count();
                                                if ($count > 0) {
                                                    $rating = $val / $count;
                                                }

                                            @endphp
                                            @if ($count > 0)
                                                <div class="d-flex align-items-center">
                                                    <span class="text-warning" style="font-size: 0.9rem;">
                                                        @for ($i = 0; $i < $rating; $i++)
                                                            <i class="fas fa-star" style="font-size: 11px"></i>
                                                        @endfor
                                                    </span>
                                                    <span class="ms-2" style="font-size: 0.8rem;">{{ $rating }}
                                                        ({{ $count }})</span>
                                                </div>
                                            @endif
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-bold"
                                                style="font-size: 1rem;">{{ formatRupiah($prod->harga) }}</span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div
                                            class="d-flex @if (!$prod->harga_ongkir) justify-content-between @else justify-content-end @endif">
                                            @if (!$prod->harga_ongkir)
                                                <span class="badge bg-success" style="font-size: 0.7rem;">
                                                    <i class="fa-solid fa-truck-fast me-2"></i>Free Ongkir
                                                </span>
                                            @endif
                                            <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual
                                                {{ $prod->transactionDetail->sum('quantity') }}x</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="d-flex justify-content-end align-items-center mt-4" style="font-size: 1rem;">
                    <span class="me-2">
                        <a href="/Listseluruhproduk" class="text-decoration-none text-dark"><b>Lihat Selengkapnya</b></a>
                    </span>
                    <i class="fas fa-arrow-right"></i>
                </div> --}}
                <hr style="clear: both;">
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
                                <span style="color: gold; font-size: 0.9rem;" id="rate">
                                    <i class="fas fa-star"></i>
                                </span>
                                <!-- Rating Text -->
                                <span style="margin-left: 5px; font-size: 0.8rem;" id="count_rate">5 (10)</span>
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
        const handleSortOption = (option) => {
            console.log("op", option);
        }
        const $loaderEl = $("#loading");
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

        $(document).ready(function() {
            $('body').on('change', '.urutkan-produk', function() {
                // let data = $(this).attr('data-id')
                let data = $(this).val()
                $.ajax({
                    url: "{{ route('order-product') }}",
                    method: 'GET',
                    data: {
                        data: data,
                        category: "{{ $category->id }}"
                    },
                    contentType: true,
                    processData: true,
                    beforeSend: function() {
                        $loaderEl.removeClass('d-none')
                    },
                    success: function(resp) {
                        $loaderEl.addClass('d-none')
                        // console.log("res", resp);
                        if (resp.success) {
                            $('.elem-prod').html('')
                            let html = ''
                            let routeTemplate = "{{ route('detail-product', 'UUID') }}";
                            $.each(resp.data, function(i, prod) {
                                console.log("prod", prod);
                                let route = routeTemplate.replace('UUID', prod.uuid);
                                let clone = $('.template-prod > div').clone()
                                clone.find('#link_prod').attr('href', route)
                                clone.find('#img_prod').attr('src', prod.thumbnail)
                                clone.find('#prod_name').html(prod.name)
                                clone.find('#desc_prod').html(prod.description)
                                clone.find('#harga_prod').html(prod.harga)
                                clone.find('#terjual').html(`Terjual ${prod.quantity}x`)
                                clone.find('#rate').html('')
                                clone.find('#count_rate').html('')
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
            });
        })
    </script>
    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>
</body>

</html>
