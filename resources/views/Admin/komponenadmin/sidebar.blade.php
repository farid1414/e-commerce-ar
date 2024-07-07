<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('home') ? '' : 'collapsed' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/product/*') ? '' : 'collapsed' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-box"></i><span>Produk</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('master.product.index', 'dataran') }}">
                        <i class="bi bi-circle"></i><span>Produk Dataran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.product.index', 'dinding') }}">
                        <i class="bi bi-circle"></i><span>Produk Dinding</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/category/*') ? '' : 'collapsed' }}" data-bs-target="#forms-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kategori</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('master.category.index', 'dataran') }}">
                        <i class="bi bi-circle"></i><span>Kategori Dataran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.category.index', 'dinding') }}">
                        <i class="bi bi-circle"></i><span>Kategori Dinding</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Akun & Ulasan</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/dataakun">
                        <i class="bi bi-circle"></i><span>Data Akun</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.rating.index') }}">
                        <i class="bi bi-circle"></i><span>Rating & Ulasan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('master.transaksi.pending') }}">
                        <i class="bi bi-circle"></i><span>Belum Bayar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.transaksi.success') }}">
                        <i class="bi bi-circle"></i><span>Sudah Bayar</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master.transaksi.failed') }}">
                        <i class="bi bi-circle"></i><span>Dibatalkan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-graph-up-arrow"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/laporanharian">
                        <i class="bi bi-circle"></i><span>Laporan Harian</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/laporanbulanan">
                        <i class="bi bi-circle"></i><span>Laporan Bulanan</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/laporantahunan">
                        <i class="bi bi-circle"></i><span>Laporan Tahunan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Icons Nav --> --}}

        <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/laporanharian">
                <i class="bi bi-graph-up-arrow"></i>
                <span>Laporan</span>
            </a>
        </li><!-- End Profile Page Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('master.flash-sale.index') }}">
                <i class="bi bi-lightning-charge"></i>
                <span>Program Flash Sale</span>
            </a>
        </li><!-- End Profile Page Nav -->


    </ul>

</aside><!-- End Sidebar-->
