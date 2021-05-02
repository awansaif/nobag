<div class="ct-preloader">
    <div class="ct-preloader-content"></div>
</div>
<nav class="ct-menuMobile text-uppercase">

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
                    <li class="dropdown">
                        <a href="#">Trip</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="{{ Route('tourist.trips.index') }}">New Trips</a>
                                    <a href="{{ Route('tourist.takenTrips') }}">Taken Trip</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Tutorials</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="#">Tutorial</a>
                                    <a href="#">Documents/regulation</a>
                            </li>
                        </ul>
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
