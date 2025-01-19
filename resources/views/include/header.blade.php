<!-- ======= Header ======= -->
<header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
        <ul>
            <li>
                <a href="/#hero" class="nav-link scrollto {{ request()->is('/') ? 'active' : '' }}">
                    <i class="bx bx-home"></i> <span>Home</span>
                </a>
            </li>
            <li>
                <a href="/#about" class="nav-link scrollto {{ request()->is('#about') ? 'active' : '' }}">
                    <i class="bx bx-user"></i> <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('program.index') }}"
                    class="nav-link scrollto {{ request()->routeIs('program.index') ? 'active' : '' }}">
                    <i class="bx bx-server"></i> <span>Program</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}" target="_blank" class="nav-link scrollto">
                    <img src="{{ asset('assets') }}/img/logo.svg" width="20px">
                    <span>Hugs Me</span>
                </a>
            </li>
            <li>
                <a href="/#support" class="nav-link scrollto {{ request()->is('#support') ? 'active' : '' }}">
                    <i class="bx bx-support"></i> <span>Support System</span>
                </a>
            </li>
            <li>
                <a href="#" onclick="showPopup()" class="nav-link scrollto">
                    <i class="bx bx-cart"></i> <span>Bie-Leaf</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="nav-link scrollto" target="_blank">
                    <i class="bx bx-log-in"></i> <span>Login</span>
                </a>
            </li>
        </ul>
    </nav><!-- .nav-menu -->

</header><!-- End Header -->
