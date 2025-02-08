<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('admin') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets') }}/img/logo.png" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Data</span>
                </li>
                <li
                    class="sidebar-item {{ in_array(Route::currentRouteName(), ['akun.admin', 'akun.guru', 'akun.ortu', 'akun.pembeli', 'editAkun', 'editPassword']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('akun.admin') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Akun</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['siswa.index', 'siswa.create', 'siswa.edit', 'showKindergarten', 'showPlaygroup', 'showBabycamp']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('siswa.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['kelompok.index', 'kelompok.create', 'kelompok.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('kelompok.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-id-badge"></i>
                        </span>
                        <span class="hide-menu">Kelas</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['tahun.index', 'tahun.create', 'tahun.edit', 'tahun.editStatus']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('tahun.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Tahun</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Program</span>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['tema.index', 'tema.create', 'tema.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('tema.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-star"></i>
                        </span>
                        <span class="hide-menu">Tema</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['topik.index', 'topik.create', 'topik.edit', 'subtopik.index', 'subtopik.create', 'subtopik.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('topik.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-book"></i>
                        </span>
                        <span class="hide-menu">Topik & Sub Topik</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['pdf.index', 'pdf.create', 'pdf.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('pdf.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file"></i>
                        </span>
                        <span class="hide-menu">Pdf</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['youtube.index', 'youtube.create', 'youtube.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('youtube.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-video"></i>
                        </span>
                        <span class="hide-menu">Youtube</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Join Us</span>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['brosur.index', 'brosur.create', 'brosur.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('brosur.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-bookmark"></i>
                        </span>
                        <span class="hide-menu">Brosur</span>
                    </a>
                </li>
            </ul>
            <br><br>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
