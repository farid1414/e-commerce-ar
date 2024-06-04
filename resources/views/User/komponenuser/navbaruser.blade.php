<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container">
          <a class="navbar-brand" href="user/dashboarduser">
            <img src="../gambar/logo.png" width="auto" class="d-inline-block align-top img-fluid" alt="" style="max-height: 70px;">
          </a>
      
          <!-- Content Pencarian di Navbar -->
          <form onsubmit="handleSearch" class="d-flex flex-grow-1 mx-lg-5">
            <div class="input-group" style="width: 645px;">
              <input
                type="search"
                class="form-control"
                placeholder="Cari yang terbaik untuk rumahmu..."
                value=""
                onchange="handleChange"
                onclick="handleInputClick"
                list="datalistOptions"
                ref="{inputRef}"
              />
              <button type="submit" class="btn btn-outline-dark">
                <i class="bi bi-search" style="font-size: 16px;"></i>
              </button>
            </div>
          </form>
      
          <!-- Content Akun dan Keranjang di Navbar -->
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="/auth/login">
                    <i class="bi bi-person" style="font-size: 28px; margin-right: 26px;"></i>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/Keranjang">
                    <div class="position-relative">
                      <i class="bi bi-cart" style="font-size: 28px; margin-left: 33px;"></i>
                    </div>
                  </a>
                </li>
              </ul>
        </div>
      </nav>
</body>
</html>