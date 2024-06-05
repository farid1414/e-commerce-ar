<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chekout Produk</title>
</head>

@include('user.komponenuser.navbaruser')

<div class='d-block d-lg-none'>
@include('user.komponenuser.bottomnavbar')
</div>

@include('user.include.style')
<body>
    
    <div class="container">
        <div class="text-center mt-5 mb-5"> <!-- Menggunakan kelas text-center -->
            <h2><b>Periksa Kembali Pesanan Anda.
            </b></h2>
        </div>

            <div class
                <div class="mb-4">
                    <h5><b>Informasi Pelanggan.</b></h5>
                    <p>Jhon Doe</p>
                    <p>john.doe@example.com</p>
                    <p>081391972873</p>
                </div>
            
                <hr class="my-4" />
            
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h5 class="font-weight-bold"><b>Alamat Lengkap Anda.</b></h5>
                        <p>Jl. Contoh No. 123, Kota Contoh, Provinsi Contoh</p>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <button class="btn btn-outline-dark mr-2" style="margin-right: 10px;">Batal</button>
                        <button class="btn btn-dark">Simpan</button>
                    </div>
                </div>
            
                <hr style="margin-top: -5px;" />
            
                
                <div>
                    <div class="mb-4">
                        <h4 style="margin-bottom: 25px; margin-top: 30px;"><b>Ringkasan Pesanan Anda.</b></h4>
                
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                                    <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col d-flex flex-column">
                                        <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Produk" style="max-width: 130px; border-radius: 10px; margin-left: 17px;" />
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
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p>Harga Satuan: </p>
                                    <p>Rp 500.000</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Harga Flash Sale:</p>
                                    <p>Rp 500.000 <span class="badge rounded-pill text-bg-warning">-25%</span></p>
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
                                    <p>-Rp 500.000</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Total Pesanan: </p>
                                    <p class="fw-bold ">Rp 500.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="card mb-4 mt-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between" style="margin-bottom: -20px;">
                                <p class="fw-bold" style="font-size: 20px;">Rician Pesanan</p>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col d-flex flex-column">
                                    <img src="../GambarProduk/Dataran/Kategori Kursi/Produk 1/Produk1gambar1.jpg" alt="Produk" style="max-width: 130px; border-radius: 10px; margin-left: 17px;" />
                                </div>
                
                                <div class="col d-flex flex-column">
                                    <div>
                                        <p class="fw-bold" style="font-size: 1.2rem;">Sofa Ruang Tamu</p>
                                        <p class="text-muted">Varian : -</p>
                                        <span>Kuantitas : 1x</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p style="font-size: 20px;"><b>Rincian Harga</b></p>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p>Harga Satuan: </p>
                                <p>Rp 500.000</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Harga Flash Sale:</p>
                                <p>Rp 500.000 <span class="badge rounded-pill text-bg-warning">-25%</span></p>
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
                                <p>-Rp 500.000</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold">Total Pesanan: </p>
                                <p class="fw-bold ">Rp 500.000</p>
                            </div>
                        </div>
                    </div>
                
                    <hr style="margin-top: 40px;" />
                
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">Total Keseluruhan :</p>
                        <p class="fw-bold">2 Produk,</p>
                        <p class="fw-bold">Rp. 1.500.000</p>
                    </div>
                </div>
                
                

                <hr style="margin-top: -5px; margin-bottom: 40px;" />
            
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3><b>Metode Pembayaran Yang Tersedia.</b></h3>
                        <p style="text-align: justify;">
                            Kami menyediakan berbagai opsi metode pembayaran yang dapat Anda pilih. Kami menerima metode pembayaran berikut ini. Silakan pilih metode pembayaran yang sesuai dengan preferensi Anda.
                        </p>
                    </div>
                    <div class="col-md-6 text-center mt-3 mt-md-0">
                        <img src="../gambar/metode-pembayaran.png" alt="Metode Pembayaran" class="img-fluid" />
                    </div>
                </div>
            
                <hr />
            
                <!-- Tombol navigasi -->
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-dark">
                        <i class="fas fa-arrow-left ml-2" style="margin-right: 10px;"></i>
                        Kembali
                    </button>
                    <button class="btn btn-dark d-flex align-items-center">
                        Tampilkan Snap Midtrans
                        <i class="fas fa-arrow-right ml-2" style="margin-left: 10px;"></i>
                    </button>
                </div>
            

        </div>
    </div>
    @include('user.include.script')

    @include('user.komponenuser.footer')

</body>
</html>
