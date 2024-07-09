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
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Produk Terbaru {{-- {{sortOption}} --}}
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
                </div>
            </div>
            <br>
    
            <div class="container mt-5">
                <div class="row">
                    @foreach ($category->products->where('is_active', '=', true) as $prod)
                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mb-4">
                            <a href="{{ route('detail-product', $prod->uuid) }}" class="text-decoration-none">
                                <div class="card h-100" style="transition: box-shadow 0.3s; border-radius: 6px;"
                                    onmouseenter="this.style.boxShadow = '0px 4px 8px rgba(0, 0, 0, 0.2)'"
                                    onmouseleave="this.style.boxShadow = 'none'">
                                    <span class="badge bg-danger position-absolute" style="top: 10px; right: 10px; font-size: 0.8rem;">Produk Terbaru !!</span>
                                    <img src="{{ url($prod->thumbnail) }}" alt="Product" class="card-img-top" style="max-height: 200px; object-fit: cover; border-radius: 6px 6px 0 0;">
                                    <div class="card-body d-flex flex-column">
                                        <p class="fw-bold" style="font-size: 1rem;">{{ $prod->name }}</p>
                                        <div class="flex-grow-1" style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                            <p class="card-text" style="text-align: justify; font-size: 0.9rem;">{!! $prod->description !!}</p>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="d-flex align-items-center">
                                                <span class="text-warning" style="font-size: 0.9rem;">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="ms-2" style="font-size: 0.8rem;">5 (10)</span>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="fw-bold" style="font-size: 1rem;">{{ formatRupiah($prod->harga) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <div class="d-flex @if (!$prod->harga_ongkir) justify-content-between @else justify-content-end @endif">
                                            @if (!$prod->harga_ongkir)
                                                <span class="badge bg-success" style="font-size: 0.7rem;">
                                                    <i class="fa-solid fa-truck-fast me-2"></i>Free Ongkir
                                                </span>
                                            @endif
                                            <span class="badge bg-dark" style="font-size: 0.65rem;">Terjual {{ $prod->transactionDetail->sum('quantity') }}x</span>
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
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const handleSortOption = (option) => {
            console.log("op", option);
        }
        console.log("asas");
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
    @include('user.komponenuser.footer')
    @include('user.include.script')
    <div class='d-block d-lg-none'>
        @include('user.komponenuser.bottomnavbar')
    </div>
</body>

</html>
