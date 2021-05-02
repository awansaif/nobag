<div class="ct-preloader">
    <div class="ct-preloader-content"></div>
</div>
<nav class="ct-menuMobile text-uppercase">
    <ul class="ct-menuMobile-navbar">
        <li class="dropdown"><a href="index.html">home</a>
            <ul class="dropdown-menu">
                <li><a href="index.html">homepage</a></li>
                <li><a href="onepager.html">onepager</a></li>
                <li><a href="adventure.html">Adventure</a></li>
                <li><a href="adventure2.html">Adventure - next</a></li>
                <li><a href="travel.html">Travel</a></li>
                <li><a href="travel-deals.html">Travel Deals</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="private-tours.html">private tours</a>
            <ul class="dropdown-menu">
                <li><a href="basic-package.html">Basic Package</a></li>
                <li><a href="basic-package-single.html">Basic Package - single product</a></li>
                <li><a href="things-to-do.html">Things to do</a></li>
                <li><a href="tours-compare.html">compare tours</a></li>
            </ul>
        </li>

        <li><a href="contact.html">contact</a></li>
    </ul>
</nav>
<div id="ct-js-wrapper" class="ct-pageWrapper">
    <div class="ct-navbarMobile">
        <a href="{{ Route('tourist.dashboard') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/content/guide-tour/logo.png') }}" alt="Mobile Logo">
        </a>
        <button type="button" class="navbar-toggle"><span class="sr-only">Toggle Navigation</span><span
                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
    <div class="ct-topBar text-uppercase ct-fw-400">
        <nav class="navbar yamm text-uppercase">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ Route('tourist.dashboard') }}">
                        <img src="{{ asset('assets/images/content/guide-tour/logo.png') }}" alt="logo">
                    </a>
                </div>
                <ul class="nav navbar-nav ct-navbar--fadeInUp pull-right">
                    <li class="dropdown"><a href="private-tours.html">private tours</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content"><a href="basic-package.html">Basic Package</a><a
                                        href="basic-package-single.html">Basic Package - single product</a><a
                                        href="things-to-do.html">Things to do</a><a href="tours-compare.html">compare
                                        tours</a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <i class="fas fa-cart"></i>
                        <a href="contact.html">Cart</a>
                    </li>
                    <li class="dropdown">
                        <a href="index.html"> <i class="fa fa-user"></i>
                            {{ Auth::guard('buyer')->user()->first_name }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ Route('tourist.profileForm') }}">Profile</a>
                            </li>
                            <hr>
                            <li>
                                <a href="{{ Route('tourist.setting') }}">Settings</a>
                            </li>
                            <hr>
                            <li>
                                <a href="{{ Route('tourist.logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
