<div class="ct-preloader">
    <div class="ct-preloader-content"></div>
</div>
<nav class="ct-menuMobile text-uppercase">
    <ul class="ct-menuMobile-navbar">
        <li><a href="itinerary.html">Itinerary</a></li>
        <li><a href="contact.html">contact</a></li>
    </ul>
</nav>
<div id="ct-js-wrapper" class="ct-pageWrapper">
    <div class="ct-navbarMobile">
        <a href="{{ route('guide.dashboard') }}" class="navbar-brand">
            <img src="{{ asset('assets/images/content/guide-tour/logo.png') }}" alt="Mobile Logo">
        </a>
        <button type="button" class="navbar-toggle"><span class="sr-only">Toggle Navigation</span><span
                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    </div>
    <div class="ct-topBar text-uppercase ct-fw-400">
        <nav class="navbar yamm text-uppercase">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ route('guide.dashboard') }}">
                        <img src="{{ asset('assets/images/content/guide-tour/logo.png') }}" alt="logo">
                    </a>
                </div>
                <ul class="nav navbar-nav ct-navbar--fadeInUp pull-right">
                    <li class="dropdown">
                        <a href="#">Trip</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="{{ Route('guide.trips.index') }}">Trip</a>
                                    <a href="{{ Route('guide.trips.create') }}">New Trip</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Tutorials</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="{{ Route('guide.tutorials.index') }}">Toutorial</a>
                                    <a href="{{ Route('guide.regulations.index') }}">Documents/regulation</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            Gallery
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="{{ Route('guide.images.index') }}">Images</a>
                                    <a href="{{ Route('guide.videos.index') }}">Video</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="index.html">
                            <i class="fa fa-user"></i>
                            {{ Auth::guard('seller')->user()->first_name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ Route('guide.profileForm') }}">Profile</a>
                                <hr>
                                <a href="{{ Route('guide.setting') }}">Setting</a>
                                <hr>
                                <a href="{{ Route('guide.logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
