<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-4+eYkXUCukAjlC4JUzGlnj5KFCuvWRBXp6pW4z0ZB+F9gLFzGm1/KPV7RlBn7EnX9SCKjZtsns9lz01sH+QM/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Include AOS CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <style>
    /* Add your custom styles here */
  </style>
</head>
<body>
    @include('user.komponenuser.navbaruser')
    @include('user.include.style')

  <!-- Bottom Navbar -->
  <div id="bottom-navbar">
    <!-- Include your bottom navbar content here -->
  </div>
  
  <!-- Navbar -->
  <div id="navbar">
    <!-- Include your navbar content here -->
  </div>

  <!-- Content Loading -->
  <div id="content-loading">
    <!-- Include your content loading animation here -->
  </div>

  <!-- BreadCrumb -->
  <div id="breadcrumb">
    <!-- Include your breadcrumb content here -->
  </div>

  <!-- Login Section -->
  <section id="hero" class="d-flex align-items-center" style="margin-top: 40px; margin-bottom: 140px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 d-flex flex-column justify-content-center" style="margin-bottom: 30px;">
          <div class="d-none d-md-block">
            <p class="mb-3" data-aos="fade-up" style="font-size: 5vw; max-width: 600px;"><b>Silahkan masuk ke akun Anda.</b></p>
          </div>
          <div class="d-block d-lg-none">
            <p class="fw-bold" data-aos="fade-up" style="font-size: 2.4rem; max-width: 600px;">Silahkan <br/>masuk ke akun Anda.</p>
          </div>
          <div class="d-none d-md-block" data-aos="fade-up" style="font-size: 18px; margin-top: 15px;">
            Jika Anda belum memiliki akun <br />
            anda dapat 
            <a href="/auth/registrasi" style="text-decoration:none;"><b><u>Mendaftar di sini.</u></b></a>
          </div>
        </div>
        <div class="col-lg-6">
          <form id="login-form">
            <div class="form-group mb-3">
              <label for="email">Alamat Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" style="margin-top: 10px;" required>
            </div>
            <div class="form-group mb-4">
              <label for="password">Password</label>
              <div class="position-relative">
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan kata sandi Anda" style="margin-top: 10px;" required>
                <div class="input-group-append" id="toggle-password" style="cursor: pointer; font-size: 15px; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                  <i class="fas fa-eye"></i>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg w-100 btn-dark" style="border-radius: 25px;">Masuk</button>
          </form>
          <div class="d-block d-lg-none" style="margin-top: 20px; font-size: 18px; text-align: center;">
            Jika Anda belum memiliki akun anda dapat <a href="/auth/registrasi"><b> Mendaftar di sini.</b></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <!-- Include your footer content here -->
  </footer>

  <!-- Include Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Include AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    // Initialize AOS
    // Initialize AOS
AOS.init();

// Toggle Password Visibility
const togglePassword = document.getElementById('toggle-password');
const passwordInput = document.getElementById('password');

togglePassword.addEventListener('click', function() {
  const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
  passwordInput.setAttribute('type', type);
  this.querySelector('i').classList.toggle('fa-eye-slash');
});

// Form Submission
document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  // Your form submission logic here
  if (!validateEmail(email)) {
    Swal.fire({
      icon: "warning",
      title: "Format Email Salah",
      text: "Mohon masukkan alamat email yang valid.",
    });
    return;
  }

  if (!validatePassword(password)) {
    Swal.fire({
      icon: "warning",
      title: "Password Tidak Memadai",
      text: "Password harus memiliki setidaknya 15 karakter.",
    });
    return;
  }

  setLoading(true);
  setTimeout(() => {
    Swal.fire({
      icon: "success",
      title: "Berhasil Masuk",
      text: "Anda telah berhasil masuk.",
    }).then(() => {
      setLoading(false);
      window.location.href = "/";
    });
  }, 1500);
});

// Email Validation Function
function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Password Validation Function
function validatePassword(password) {
  return password.length >= 15;
}

  </script>
          @include('user.include.script')

</body>
</html>
