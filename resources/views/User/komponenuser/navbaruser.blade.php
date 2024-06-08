
{{-- pc --}}
<div class='d-none d-md-block'>
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
                <i class="bi bi-person" style="font-size: 30px; margin-right: 35px;"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Keranjang">
                <div class="position-relative">
                 <b> <i class="bi bi-cart2" style="font-size: 30px; margin-right: 30px;"></i> </b>
                </div>
              </a>
            </li>
          </ul>
    </div>
  </nav>
</div>
  
{{-- hp --}}
  <div class='d-block d-lg-none'>
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
      <div class="container">
        <a class="navbar-brand" href="user/dashboarduser">
          <img src="../gambar/logo.png" width="auto" class="d-inline-block align-top img-fluid" alt="" style="height: 70px;">
        </a>
      </div>
    </nav>
  </div>
  
    