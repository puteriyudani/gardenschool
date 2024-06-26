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
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('teacher.kindergarten') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-star"></i>
                        </span>
                        <span class="hide-menu">Kindergarten</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('teacher.playgroup') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-rocket"></i>
                        </span>
                        <span class="hide-menu">Playgroup</span>
                    </a>
                </li>
                <li class="sidebar-item">
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
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('video.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-video"></i>
                        </span>
                        <span class="hide-menu">Video</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('menu.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-bread"></i>
                        </span>
                        <span class="hide-menu">Menu</span>
                    </a>
                </li>
                <li class="sidebar-item">
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
