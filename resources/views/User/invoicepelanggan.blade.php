<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Pelanggan</title>
</head>
@include('user.komponenuser.navbaruser')
@include('user.include.style')
@include('user.komponenuser.breadcrumb')

<body>            
            <div class="text-center mt-5 mb-4">
                <h1><b>Invoice Pesanan Anda.</b></h1>
                <span>Terima Kasih Sudah Berbelanja Di AR-Furniture</span>
            </div>
            
            <!-- CSS styles -->
            <style>
                @media print {
                    .navbar,
                    .footer,
                    .button,
                    .print-hidden {
                        display: none !important;
                    }
                }
            </style>
            
            <div class="container">
                
                <!-- ContentinvoicePC -->
                <div class="print-hidden">
               
                    <div class='d-none d-md-block'>
                        <div class="container mt-5">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <img src="../gambar/logo.png" style="margin-right: 10px; max-height: 40px;" alt="">
                                        <span style="font-size: 0.85rem;">AR-F/ORD-003/TRX-003/INV-001</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>No. Pesanan</b></p>
                                            <p>AR-F/ORD-20230815-0003</p>
                                            <p><b>No. Transaksi</b></p>
                                            <p>AR-F/ORD-20230815-0003</p>
                                            <p><b>Informasi Pemesan</b></p>
                                            <span>John Doe</span><br/>
                                            <span>john.doe@example.com</span><br/>
                                            <span>081-02172-781</span>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <p><b>Informasi Alamat Pengiriman</b></p>
                                                <p>Jalan Raya No. 123</p>
                                                <p><b>Status Pembayaran</b></p>
                                                <h4 style="font-size: 1.2rem;"><b><span class="badge rounded-pill bg-success">Sudah Dibayar</span></b></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><b>Waktu Pemesanan</b></p>
                                                    <p>2023-01-19 03:12:06</p>
                                                    <p><b>Waktu Pembayaran</b></p>
                                                    <p>2023-01-19 03:12:06</p>
                                                    <p><b>Metode Pembayaran</b></p>
                                                    <p>BCA</p>
                                                </div>
                                                <div class="col"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <h4 class="mt-3 fw-bold mb-3">Produk Yang Anda Pesan.</h4>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Varian</th>
                                        <th class="text-center">Harga Produk</th>
                                        <th class="text-center">Kuantitas</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Produk 1</td>
                                        <td class="text-center">Varian 1</td>
                                        <td class="text-center">Rp. 100,000</td>
                                        <td class="text-center">2x</td>
                                        <td class="text-center">Rp. 200,000</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-center">Produk 2</td>
                                        <td class="text-center">Varian 2</td>
                                        <td class="text-center">Rp. 150,000</td>
                                        <td class="text-center">3x</td>
                                        <td class="text-center">Rp. 450,000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="text-center"><b>Total Kuantitas</b></td>
                                        <td class="text-center"><b>5 Produk</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"></td>
                                        <td class="text-center"><b>Total Subtotal</b></td>
                                        <td class="text-center"><b>Rp. 650,000</b></td>
                                    </tr>
                                </tfoot>
                            </table>
                    
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p>Subtotal untuk Produk</p>
                                        <p>Rp24.000</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Total Diskon untuk Produk</p>
                                        <p>-</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Subtotal Pengiriman</p>
                                        <p>Rp8.000</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Total Diskon Pengiriman</p>
                                        <p>-Rp8.000</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between">
                                        <h5>Total Pembayaran</h5>
                                        <h5>Rp. 650,000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    
                    
                    <div class='d-block d-lg-none'>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between">
                                        <p><b>No. Pesanan</b></p>
                                        <p>AR-F/ORD-20230815-0003</p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>No. Transaksi</b></p>
                                        <p>AR-F/ORD-20230815-0003</p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>Informasi Pemesan</b></p>
                                        <p class="text-end">
                                            John Doe 1 <br />
                                            john.doe@example.com
                                            <br />
                                            0813-2534-5828
                                        </p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>Alamat Pelanggan</b></p>
                                        <p> Jalan Raya No. 123</p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>Waktu Pemesanan</b></p>
                                        <p>2023-01-19 03:12:06</p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>Status Pembayaran</b></p>
                                        <h4 style="font-size: 1.3rem;">
                                            <b>
                                                <span class="badge rounded-pill text-success">
                                                    Sudah Dibayar
                                                </span>
                                            </b>
                                        </h4>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>Waktu Pembayaran</b></p>
                                        <p>2023-01-19 03:12:06</p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                    <div class="d-flex justify-content-between">
                                        <p><b>Metode Pembayaran</b></p>
                                        <p class="fw-bold">BCA</p>
                                    </div>
                                    <hr style="margin-top: -5px;"/>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mt-5 mb-3 fw-bold">Produk yang anda pesan.</h4>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="fw-bold">Sofa Klasik Eropa</p>
                                                <p class="text-muted">x 1</p>
                                            </div>
                                            <div class="d-flex justify-content-between" style="margin-top: -15px;">
                                                <p class="text-muted">varian : Biru</p>
                                                <p>Rp. 1.500.000</p>
                                            </div>
                                            <hr />
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
                            </div>
                        </div>
                        
                    </div>
                    

                    <div class="container mt-5">
                        <div class="card">
                            <div class="card-header bg-white">
                                <div class="d-flex align-items-center justify-content-between">
                                    <img src="../gambar/logo.png" style="margin-right: 10px; max-height: 40px;" alt="">
                                    <span style="font-size: 0.85rem;">AR-F/ORD-003/TRX-003/INV-001</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><b>No. Pesanan</b></p>
                                        <p>AR-F/ORD-20230815-0003</p>
                                        <p><b>No. Transaksi</b></p>
                                        <p>AR-F/ORD-20230815-0003</p>
                                        <p><b>Informasi Pemesan</b></p>
                                        <span>John Doe</span><br/>
                                        <span>john.doe@example.com</span><br/>
                                        <span>081-02172-781</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <p><b>Informasi Alamat Pengiriman</b></p>
                                            <p>Jalan Raya No. 123</p>
                                            <p><b>Status Pembayaran</b></p>
                                            <h4 style="font-size: 1.2rem;"><b><span class="badge rounded-pill bg-success">Sudah Dibayar</span></b></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><b>Waktu Pemesanan</b></p>
                                                <p>2023-01-19 03:12:06</p>
                                                <p><b>Waktu Pembayaran</b></p>
                                                <p>2023-01-19 03:12:06</p>
                                                <p><b>Metode Pembayaran</b></p>
                                                <p>BCA</p>
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <h4 class="mt-3 fw-bold mb-3">Produk Yang Anda Pesan.</h4>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Produk</th>
                                    <th class="text-center">Varian</th>
                                    <th class="text-center">Harga Produk</th>
                                    <th class="text-center">Kuantitas</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Produk 1</td>
                                    <td class="text-center">Varian 1</td>
                                    <td class="text-center">Rp. 100,000</td>
                                    <td class="text-center">2x</td>
                                    <td class="text-center">Rp. 200,000</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-center">Produk 2</td>
                                    <td class="text-center">Varian 2</td>
                                    <td class="text-center">Rp. 150,000</td>
                                    <td class="text-center">3x</td>
                                    <td class="text-center">Rp. 450,000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-center"><b>Total Kuantitas</b></td>
                                    <td class="text-center"><b>5 Produk</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-center"><b>Total Subtotal</b></td>
                                    <td class="text-center"><b>Rp. 650,000</b></td>
                                </tr>
                            </tfoot>
                        </table>
                
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p>Subtotal untuk Produk</p>
                                    <p>Rp24.000</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Total Diskon untuk Produk</p>
                                    <p>-</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Subtotal Pengiriman</p>
                                    <p>Rp8.000</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p>Total Diskon Pengiriman</p>
                                    <p>-Rp8.000</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <h5>Total Pembayaran</h5>
                                    <h5>Rp. 650,000</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <!-- ContentinvoiceMobile -->
                <!-- ContentinvoiceMobile content goes here -->
                
                <!-- Actions -->
                <div class="card mt-3 print-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdown-basic" data-toggle="dropdown">
                                    Opsi Lain Invoice
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" onclick="handleEmailSend()">Kirim Invoice via Email</a>
                                    <a class="dropdown-item">Unduh Via .pdf</a>
                                </div>
                            </div>
                            <button class="btn btn-dark d-flex align-items-center" onclick="handlePrint()">
                                Cetak Invoice
                                <i class="fas fa-print ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
           
        
            
    @include('user.include.script')

    @include('user.komponenuser.footer')
</body>
</html>
