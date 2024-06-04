<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./path/to/aos.css">
    <style>
        /* Your custom styles here */
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-white">
        <div class="navbar-brand">
            <img src="{{ asset('gambar/logo.png') }}" alt="" style="max-height: 70px;">
        </div>
    </nav>
    <!-- Login Form Section -->
    <section class="d-flex align-items-center justify-content-center" style="background: white;">
        <div class="container" style="margin-top: 70px; margin-bottom: 150px;">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 d-flex flex-column justify-content-center">
                    <h1 style="font-size: 6.2vw; max-width: 600px; margin-bottom: 30px;">
                        <b>THE FUTURE IS TODAY.</b>
                    </h1>
                </div>

                <div class="col-lg-6">
                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Masukkan email" value="{{ old('email') }}" required>
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
                        <button type="submit" class="btn btn-primary btn-lg w-100 btn-dark"
                            style="border-radius: 25px;">
                            Masuk
                        </button>
                    </form>
                    <!-- Text Below Submit Button for Responsive Mode -->
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./path/to/aos.js"></script>
    <script>
        // Your JavaScript logic here
        AOS.init();

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var togglePasswordIcon = document.getElementById("togglePassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.classList.remove("fas", "fa-eye");
                togglePasswordIcon.classList.add("fas", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.classList.remove("fas", "fa-eye-slash");
                togglePasswordIcon.classList.add("fas", "fa-eye");
            }
        }
    </script>
</body>

</html>
