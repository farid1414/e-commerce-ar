<div class="card mt-3">
    <div class="card-header bg-dark text-white">
        <div class="row">
            <div class="col">
                <span style="font-size: 0.85rem;">AR-F/ORD-20230815-0001</span>
            </div>
            <div class="col-auto">
                <span style="font-size: 0.85rem;">16-02-2023 12:30:34</span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h5 class="card-title" style="margin-bottom: -10px;">
                    <p class="fs-3 fs-md-5">Rp 1.500.000</p>
                </h5>
            </div>
            <div class="col-auto">
                <button onclick="toggleCollapse('collapse2')" class="btn btn-light collapse-button" style="border-radius: 15px;">
                    <svg class="bi bi-chevron-up" width="30" height="30" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 5.707 5.354 8.354a.5.5 0 11-.708-.708l3-3z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-right">2 Produk</div>
                <div class="col-auto text-right">Sudah Dibayar</div>
            </div>
        </div>
    </div>
</div>

<div class="collapse" id="collapse2">
    <br>
    <p class="p-3 bg-success text-white text-center" style="border-radius: 3px;">Lunas</p>
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-bold">No. Pesanan</h5>
                <h5 class="card-title text-muted d-flex align-items-center" style="font-size: 1rem;">AR-F/ORD-20230815-0001</h5>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                    <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                </div>
                <hr>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <img src="./gambar/product-1.jpg" alt="Produk" style="max-width: 150px; border-radius: 10px;">
                    </div>
                    <div class="col d-flex flex-column">
                        <div>
                            <p class="fw-bold" style="font-size: 1.2rem;">Kursi Klasik Eropa</p>
                            <p class="text-muted">Varian : Biru</p>
                            <span>Kuantitas : 1x</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <p style="font-size: 20px;"><b>Rincian Harga</b></p>
                <hr>
                <div class="d-flex justify-content-between">
                    <p>Harga Satuan: </p>
                    <p>Rp 500.000</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Sub Total Produk: </p>
                    <p>Rp 500.000</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Ongkos Kirim: </p>
                    <p>Rp 500.000</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Sub Total Ongkos Kirim: </p>
                    <p>Rp 500.000</p>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <p class="fw-bold">Total Pesanan: </p>
                    <p class="fw-bold">Rp 500.000</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
        <p class="fw-bold">Total Keseluruhan: </p>
        <p class="fw-bold">2 Produk</p>
        <p><b> Rp. 1.500.000</b></p>
    </div>
    <hr>
    <!-- Baris tombol -->
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <a href="/DetailPesananUserLunas" class="btn btn-outline-dark mb-3">Detail Pesanan</a>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-success mr-2" onclick="handleShowModal()">
                    Beri Penilaian
                </button>
            </div>
            <div class="col-auto">
                <a href="/Invoicepesanan" class="btn btn-dark d-flex align-items-center">
                    Tampilkan Invoice
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ml-2" viewBox="0 0 16 16" style="margin-left: 20px;">
                        <path fill-rule="evenodd" d="M9.5 1.5a.5.5 0 01.5.5v4a.5.5 0 01-1 0v-3h-3a.5.5 0 010-1h4a.5.5 0 01.5.5z"/>
                        <path fill-rule="evenodd" d="M9.293 1.207a.5.5 0 01.708 0l4 4a.5.5 0 010 .708l-4 4a.5.5 0 01-.708-.708L12.793 6H1.5a.5.5 0 010-1h11.293L9.293 2.707a.5.5 0 010-.708z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
