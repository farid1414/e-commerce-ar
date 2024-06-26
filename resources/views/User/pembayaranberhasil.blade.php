<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Berhasil</title>
</head>
@include('user.include.style')

<body>
    <div class="d-flex justify-content-center align-items-center mt-4" style="min-height: 70vh;">
        <div class="card" style="max-width: 400px;" data-aos="fade-up">
            <div class="card-body">
                <h5 class="card-title mt-3 mb-2 text-center" style="font-size: 1.6rem;">Pembayaran Telah Berhasil.</h5>
                <div class="text-center">
                    <img src="../gambar/Pembayaranberhasil2.png" alt="Payment Successful" class="img-fluid" style="width: 350px;">
                </div>
                <p class="card-text text-center">
                    Terima kasih sudah berbelanja di AR-Furniture. <br>
                    Struk pembayaran otomatis akan dikirimkan ke email Anda yang terdaftar.
                </p>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between mt-2">
                    <button onclick="handleBerandaClick()" class="btn btn-outline-dark">Beranda</button>
                    <button onclick="handlePesanansayaClick()" class="btn btn-dark">Lihat Pesanan Saya <i class="bi bi-arrow-right" style="margin-left: 8px;"></i></button>
                </div>
            </div>
        </div>
    </div>
    
    @include('user.include.script')

</body>
</html>