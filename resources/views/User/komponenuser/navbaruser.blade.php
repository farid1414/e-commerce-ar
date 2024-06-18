{{-- pc --}}
<div class='d-none d-md-block'>
    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('gambar/logo.png') }}" width="auto" class="d-inline-block align-top img-fluid"
                    alt="" style="max-height: 70px;">
            </a>

            <!-- Content Pencarian di Navbar -->
            <form onsubmit="handleSearch" class="d-flex flex-grow-1 mx-lg-5">
                <div class="input-group" style="width: 645px;">
                    <input type="search" class="form-control" placeholder="Cari yang terbaik untuk rumahmu..."
                        value="" onchange="handleChange" onclick="handleInputClick" list="datalistOptions" />
                    <button type="submit" class="btn btn-outline-dark">
                        <i class="bi bi-search" style="font-size: 16px;"></i>
                    </button>
                </div>
            </form>

            <!-- Content Akun dan Keranjang di Navbar -->
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item dropdown">
                    @if (Auth::check())
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-arrow profile">
                            <li><a class="dropdown-item d-flex align-items-center"
                                    href="{{ route('profil-pelanggan') }}">
                                    <i class="bi bi-person me-1"></i>
                                    <span>Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-gear me-1"></i>
                                    <span>Log Out / Keluar</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @if (config('adminlte.logout_method'))
                                        {{ method_field(config('adminlte.logout_method')) }}
                                    @endif
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-person" style="font-size: 30px; margin-right: 35px;"></i>
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('keranjang') }}">
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
                <img src="{{ asset('gambar/logo.png') }}" width="auto" class="d-inline-block align-top img-fluid"
                    alt="" style="height: 70px;">
            </a>
        </div>
    </nav>
</div>
