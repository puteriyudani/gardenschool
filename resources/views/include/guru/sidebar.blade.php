<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('teacher.index') }}" class="text-nowrap logo-img">
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
                    <a class="sidebar-link" href="{{ route('teacher.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">GARDENCHOOL</span>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['teacher.kindergarten', 'tkwelcome.siswa', 'tkmorning.siswa', 'tkbreakfast.siswa', 'tkislamic.siswa', 'tkpreschool.siswa', 'tktematik.siswa', 'tkpooppee.siswa', 'tkrecalling.siswa', 'tkvocabulary.siswa', 'tkwelcome.index', 'tkmorning.index', 'tkbreakfast.index', 'tkislamic.index', 'tkpreschool.index', 'tktematik.index', 'tkpooppee.index', 'tkrecalling.index', 'tkvocabulary.index']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('teacher.kindergarten') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-star"></i>
                        </span>
                        <span class="hide-menu">Kindergarten</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['teacher.playgroup', 'tpwelcome.siswa', 'tpmorning.siswa', 'tpbreakfast.siswa', 'tpislamic.siswa', 'tppreschool.siswa', 'tptematik.siswa', 'tppooppee.siswa', 'tprecalling.siswa', 'tpvocabulary.siswa', 'tpwelcome.index', 'tpmorning.index', 'tpbreakfast.index', 'tpislamic.index', 'tppreschool.index', 'tptematik.index', 'tppooppee.index', 'tprecalling.index', 'tpvocabulary.index']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('teacher.playgroup') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-rocket"></i>
                        </span>
                        <span class="hide-menu">Playgroup</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['teacher.babycamp', 'tbwelcome.siswa', 'tbmorning.siswa', 'tbbreakfast.siswa', 'tbislamic.siswa', 'tbact.siswa', 'tbfun.siswa', 'tblunch.siswa', 'tbrecalling.siswa', 'tbwelcome.index', 'tbmorning.index', 'tbbreakfast.index', 'tbislamic.index', 'tbrecalling.index', 'tblunch.index', 'tbact.index', 'tbfun.index']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('teacher.babycamp') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-car"></i>
                        </span>
                        <span class="hide-menu">Babycamp</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">KELOLA</span>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['video.index', 'video.create', 'video.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('video.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-video"></i>
                        </span>
                        <span class="hide-menu">Video</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['menu.index', 'menu.create', 'menu.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('menu.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-bread"></i>
                        </span>
                        <span class="hide-menu">Menu</span>
                    </a>
                </li>
                <li class="sidebar-item {{ in_array(Route::currentRouteName(), ['tkislamic.kelola', 'doa.index', 'doa.create', 'doa.edit', 'hadist.index', 'hadist.create', 'hadist.edit', 'quran.index', 'quran.create', 'quran.edit', 'doababy.index', 'doababy.create', 'doababy.edit', 'hadistbaby.index', 'hadistbaby.create', 'hadistbaby.edit', 'quranbaby.index', 'quranbaby.create', 'quranbaby.edit']) ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('tkislamic.kelola') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-moon"></i>
                        </span>
                        <span class="hide-menu">Islamic</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
