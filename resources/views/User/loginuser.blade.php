{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @include('user.include.style')
    <style>
        .password-toggle {
            cursor: pointer;
            font-size: 15px;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    @include('user.komponenuser.navbaruser')

    <div class="d-block d-lg-none">
        @include('user.komponenuser.bottomnavbar')
    </div>

    <div class="container mt-5" style="margin-top: 40px; margin-bottom: 140px;">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 d-flex flex-column justify-content-center" style="margin-bottom: 30px;">
                <div class="d-none d-md-block">
                    <p class="mb-3" data-aos="fade-up" style="font-size: 5vw; max-width: 600px;">
                        <b>Silahkan masuk ke akun Anda.</b>
                    </p>
                </div>
                <div class="d-block d-lg-none">
                    <p class="fw-bold" data-aos="fade-up" style="font-size: 2.4rem; max-width: 600px;">
                        Silahkan <br/>masuk ke akun Anda.
                    </p>
                </div>
                <div class="d-none d-md-block" data-aos="fade-up" style="font-size: 18px; margin-top: 15px;">
                    Jika Anda belum memiliki akun <br />
                    anda dapat 
                    <a href="/daftar" style="text-decoration: none;">
                        <b><u>Mendaftar di sini.</u></b>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <form id="loginForm">
                    <div class="form-group mb-3">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata sandi Anda" required>
                            <div class="password-toggle" onclick="togglePassword()">
                                <i id="passwordIcon" class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 btn-dark" style="border-radius: 25px;">
                        Masuk
                    </button>
                </form>
                <div class="d-block d-lg-none" style="margin-top: 20px; font-size: 18px; text-align: center;">
                    Jika Anda belum memiliki akun anda dapat 
                    <a href="/daftar"><b> Mendaftar di sini.</b></a>
                </div>
            </div>
        </div>
    </div>

    @include('user.include.script')
    @include('user.komponenuser.footer')

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const passwordIcon = document.getElementById("passwordIcon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html> --}}
