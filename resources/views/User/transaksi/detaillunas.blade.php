<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-6">
                <div class="mb-3">
                    <p><b>Informasi Pemesan</b></p>
                    <span>John Doe</span><br />
                    <span>john.doe@example.com</span><br />
                    <span>081-283-3293-392</span>
                </div>
                <div>
                    <p><b>Informasi Alamat Pelanggan</b></p>
                    <p>Jl. Mangga BesarSikep, Keboansikep, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-6">
                <div>
                    <p><b>No. Transaksi</b></p>
                    <p>AR-F/TRX-20230815-0003</p>
                </div>
                <div>
                    <p><b>No. Pesanan</b></p>
                    <p>AR-F/ORD-20230815-0003</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-4 col-6">
                <div>
                    <p><b>Waktu Pemesanan</b></p>
                    <p>2023-01-19 03:12:06</p>
                </div>
                <div>
                    <p><b>Status Pembayaran</b></p>
                    <h4><b><span class="badge rounded-pill bg-success text-white">Lunas/ Sudah dibayar</span></b></h4>
                    <p><b>Waktu Pembayaran</b></p>
                    <p>2023-01-19 03:12:06</p>
                    <p><b>Metode Pembayaran</b></p>
                    <p>BCA</p>
                </div>
            </div>
        </div>
        <hr>
        <h4 class="mb-4"><b>Produk Yang Anda Pesan.</b></h4>
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                    <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                </div>
                <hr>
                <div class="row">
                    <div class="col d-flex flex-column">
                        <img src="./gambar/product-5.jpg" alt="Produk" style="max-width: 150px; border-radius: 10px;">
                    </div>
                    <div class="col d-flex flex-column">
                        <div>
                            <p class="fw-bold" style="font-size: 1.2rem;">Kursi Klasik Eropa</p>
                            <p class="text-muted">Biru</p>
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
        <div class="mt-4 mb-4">
            <h4 class="fw-bold" style="font-size: 1.4rem;">Penilaian & Ulasan Anda.</h4>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Tampilkan ulasan yang anda berikan.
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <Ulasanprodukdihalamandetailpesananlunas />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <hr class="mt-5">
        <div class="d-flex justify-content-between">
            <p class="fw-bold">Total Keseluruhan: </p>
            <p class="fw-bold">2 Produk </p>
            <p><b> Rp. 1.500.000</b></p>
        </div>
        <hr style="margin-top: -5px;">
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-success">Beri Penilaian</button>
            <a href="/Invoicepesanan" class="btn btn-dark">
                Tampilkan Invoice
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
