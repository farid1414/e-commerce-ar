<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Gagal</title>
</head>
@include('user.include.style')

<body>
    <div class="d-flex justify-content-center align-items-center mt-4" style="min-height: 70vh;">
        <div class="card" style="max-width: 405px;" data-aos="fade-up">
            <div class="card-body">
                <h5 class="card-title mt-3 mb-2 text-center" style="font-size: 1.6rem;">Pembayaran Gagal.</h5>
                <div class="text-center">
                    <img src="{{ asset('/gambar/Pembayarangagal2.png') }}" alt="Payment Failed" class="img-fluid"
                        style="width: 300px;">
                </div>
                <p class="card-text text-center">
                    Pembayaran tidak berhasil karena terjadi kesalahan. <br>
                    Mohon coba lagi nanti atau gunakan metode pembayaran lainnya.
                </p>
            </div>
            <div class="card-footer bg-white">
                <div class="d-flex justify-content-between mt-2">
                    <a href="{{ route('index') }}" class="btn btn-outline-dark">Kembali Ke Beranda</a>
                    <a href="{{ route('profil-pelanggan') }}" class="btn btn-dark">Coba Lagi</a>
                </div>
            </div>
        </div>
    </div>

    @include('user.include.script')

</body>

</html>
