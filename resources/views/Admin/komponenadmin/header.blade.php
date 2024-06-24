 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="{{ route('home') }}" class="logo d-flex align-items-center">
             <img src="{{ asset('gambar/logo.png') }}" alt="" style="max-height: 60px;">
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->

     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">

             <li class="nav-item dropdown pe-3">

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                     data-bs-toggle="dropdown">
                     <img src="{{ asset('gambar/adminavatar.jpg') }}" alt="Profile" class="rounded-circle">
                     <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <h6>{{ Auth::user()->name }}</h6>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="{{ route('master.profil.index') }}">
                             <i class="bi bi-person"></i>
                             <span>Profil Saya</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                             <i class="bi bi-gear"></i>
                             <span>Log Out / Keluar</span>
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @if (config('adminlte.logout_method'))
                                 {{ method_field(config('adminlte.logout_method')) }}
                             @endif
                             {{ csrf_field() }}
                         </form>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>
                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->
         </ul>
     </nav><!-- End Icons Navigation -->
 </header><!-- End Header -->
