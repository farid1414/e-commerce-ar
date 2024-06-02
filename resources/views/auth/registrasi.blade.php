<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* CSS untuk elemen HTML */
        #hero {
            margin-top: 40px;
            margin-bottom: 140px;
        }

        #hero h1 {
            font-size: 3.9rem;
            max-width: 600px;
            margin-bottom: 40px;
        }

        #hero .d-none {
            display: none;
        }

        #hero .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
            width: 100%;
        }

        #hero .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* tambahkan gaya lainnya sesuai kebutuhan */
    </style>
</head>
<body>
    @include('user.komponenuser.navbaruser')
    @include('user.include.style')

    <section id="hero" class="d-flex align-items-center" style="margin-top: 40px; margin-bottom: 140px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="d-none d-md-block">
                        <h1 data-aos="fade-up" style="font-size: 3.9rem; max-width: 600px; margin-bottom: 40px;"><b>Registrasi Untuk Menjadi Pelanggan.</b></h1>
                    </div>
                    <div class="d-block d-lg-none">
                        <h1 data-aos="fade-up" style="font-size: 2.4rem; max-width: 600px; margin-bottom: 40px;"><b>Registrasi Untuk <br> Menjadi Pelanggan.</b></h1>
                    </div>
                    <!-- Teks di bawah teks "Registrasi Untuk Menjadi Pelanggan." pada mode desktop -->
                    <div class="d-none d-lg-block" data-aos="fade-up" style="font-family: Arial; margin-bottom: 10px; margin-top: 10px; font-size: 17px;">
                        Jika Anda sudah memiliki akun <br>
                        anda dapat <a href="/login"><b>Masuk disini.</b></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form onsubmit="handleSubmit(event)">
                        <div class="form-group mb-3">
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="Masukkan nama Anda" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="nomorHandphone">Nomor Handphone</label>
                            <input type="text" class="form-control" id="nomorHandphone" name="nomorHandphone" placeholder="Masukkan nomor handphone Anda (maks. 13 digit)" pattern="[0-9]{1,13}" title="Harus berupa angka dengan maksimal 13 digit" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="alamatLengkap">Alamat Lengkap</label>
                            <textarea class="form-control" id="alamatLengkap" name="alamatLengkap" placeholder="Masukkan alamat lengkap Anda" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi Anda" required>
                                <div class="input-group-append" onclick="setShowPassword(!showPassword)" style="cursor: pointer; font-size: 15px; border-radius: 0px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                    <i class="fas fa-eye"></i>
                                </div>
                            </div>
                            <small id="passwordHelpBlock" class="form-text text-muted">Password harus memiliki minimal 15 karakter, mengandung huruf, angka, dan karakter.</small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-dark btn-block">Daftar</button>
                    </form>
                    <!-- Teks di bawah tombol "Daftar" pada mode responsif -->
                    <div style="margin-top: 20px; font-size: 17px; text-align: center;" class="d-block d-lg-none">
                        Jika Anda sudah memiliki akun <a href="/login"><b>Masuk disini.</b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        @include('user.include.script')

</body>
</html>