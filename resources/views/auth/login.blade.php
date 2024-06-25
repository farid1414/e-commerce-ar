<!DOCTYPE html>
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
                        Silahkan <br />masuk ke akun Anda.
                    </p>
                </div>
                <div class="d-none d-md-block" data-aos="fade-up" style="font-size: 18px; margin-top: 15px;">
                    Jika Anda belum memiliki akun <br />
                    anda dapat
                    <a href="{{ route('register') }}" style="text-decoration: none;">
                        <b><u>Mendaftar di sini.</u></b>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="position-relative">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Masukkan kata sandi Anda" required>
                            <div class="input-group-append" onclick="togglePasswordVisibility()"
                                style="cursor: pointer; font-size: 15px; border-radius: 0px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                <i id="togglePassword" class="fas fa-eye"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 btn-dark" style="border-radius: 25px;">
                        Masuk
                    </button>
                </form>
                <div class="d-block d-lg-none" style="margin-top: 20px; font-size: 18px; text-align: center;">
                    Jika Anda belum memiliki akun anda dapat
                    <a href="{{ route('register') }}"><b> Mendaftar di sini.</b></a>
                </div>
            </div>
        </div>
    </div>

    @include('user.include.script')
    @include('user.komponenuser.footer')

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const passwordIcon = document.getElementById("togglePassword");
    
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

</html>
