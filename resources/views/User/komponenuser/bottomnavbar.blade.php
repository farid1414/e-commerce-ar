<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom"
    style="border-style: solid; border-color: rgba(245, 245, 220);">
    <div class="container-fluid"> <!-- Tambahkan container-fluid -->
        <ul class="navbar-nav flex-row w-100 d-flex justify-content-around"> <!-- Ganti d-flex menjadi flex-row -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fa fa-home"></i>
                        <div>Beranda</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product') }}">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fa fa-tags"></i>
                        <div>Produk</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="showSearchModal()">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fa fa-search"></i>
                        <div>Pencarian</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('keranjang') }}">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fa fa-shopping-cart"></i>
                        <div>Keranjang</div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fa fa-user"></i>
                        <div>Akun</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal Pencarian -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true"
    style="width: 85%,">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Pencarian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                <div>
                    <input type="text" id="searchInput" placeholder="Cari yang terbaik untuk rumahmu..."
                        style="width: 100%; padding: 10px;" oninput="handleSearch()" value="" />
                    <hr />
                    <div id="searchResults"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<script>
    function showSearchModal() {
        $('#searchModal').modal('show');
    }

    const dataPencarianProduk = [{
            id: 1,
            nama: "Meja Eropa",
            varian: "2 Varian",
            harga: "Rp 550,000",
            gambar: "../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg",
        },
        {
            id: 2,
            nama: "Kursi Arabic",
            harga: "Rp 2.550,000",
            gambar: "../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg",
            badge: "Produk Terbaru",
        },
        {
            id: 3,
            nama: "Kabinet Dinding",
            varian: "6 Varian",
            harga: "Rp 1.550,000",
            gambar: "../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg",
            badge: "Produk Terlaris",
        },
        {
            id: 4,
            nama: "Lemari Klasik",
            varian: "3 Varian",
            harga: "Rp 110.150,000",
            gambar: "../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg",
        },
    ];

    function handleSearch() {
        const searchTerm = document.getElementById("searchInput").value.toLowerCase();

        const searchResults = dataPencarianProduk.filter((produk) =>
            produk.nama.toLowerCase().includes(searchTerm)
        );

        const searchResultsContainer = document.getElementById("searchResults");
        searchResultsContainer.innerHTML = "";

        if (searchTerm !== "" && searchResults.length > 0) {
            const resultCount = document.createElement("span");
            resultCount.innerHTML =
                `<span>Hasil Pencarian <b>"${searchTerm}"</b></span> <span class="text-muted">${searchResults.length} produk</span>`;
            searchResultsContainer.appendChild(resultCount);
        } else if (searchTerm !== "" && searchResults.length === 0) {
            const notFoundMessage = document.createElement("div");
            notFoundMessage.className = "justify-content-center mt-5";
            notFoundMessage.innerHTML = `
          <div xs="12" md="6" class="text-center">
            <img src="../gambar/Produk-tidak-ditemukan.png" alt="Product Not Found" style="max-width: 59%;" />
            <p style="margin-top: 10px; font-size: 1.2rem;"><b>Oops, maaf produk yang Anda cari tidak ditemukan.</b></p>
            <p style="font-size: 18px; margin-top: -10px;">Coba gunakan kata kunci lain.</p>
          </div>
        `;
            searchResultsContainer.appendChild(notFoundMessage);
        }

        searchResults.forEach((produk) => {
            const card = document.createElement("div");
            card.className = "card mt-3 ml-5 ";
            card.innerHTML = `
          <div class="card-body d-flex align-items-center"s>
            <div class="me-2">
              <img
                src="${produk.gambar}"
                alt="Gambar Produk"
                style="max-width: 100px; max-height: 90px; border-radius: 10px;"
              />
            </div>
            <div style="flex: 1;">
              <div class="d-flex justify-content-between">
                <div class="fw-bold">${produk.nama}</div>
                ${
                  produk.bintang
                    ? `<span class="text-muted"><i class="bi bi-star-fill" style="color: gold;"></i> ${produk.bintang}</span>`
                    : ""
                }
              </div>
              ${produk.varian ? `<span class="text-muted">${produk.varian}</span>` : ""}
              <div class="d-flex justify-content-between">
                ${
                  produk.harga
                    ? `<span class="text-muted">${produk.harga}</span>`
                    : ""
                }
                ${
                  produk.terjual
                    ? `<span class="text-muted">${produk.terjual}</span>`
                    : ""
                }
              </div>
            </div>
          </div>
        `;
            searchResultsContainer.appendChild(card);
        });
    }
</script>
