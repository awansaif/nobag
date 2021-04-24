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
        <li><a href="itinerary.html">Itinerary</a></li>
        <li class="dropdown"><a href="index.html">Pages</a>
            <ul class="dropdown-menu">
                <li><a href="customize-destination.html">customize destination</a></li>
                <li><a href="customize-package.html">customize package</a></li>
                <li><a href="customize-wedding.html">customize wedding</a></li>
                <li><a href="wedding-design.html">wedding design</a></li>
                <li><a href="wedding-themes.html">wedding themes</a></li>
                <li><a href="wedding-honeymoon.html">wedding honeymoon</a></li>
                <li><a href="wedding-review.html">wedding review</a></li>
                <li><a href="wedding-personalize.html">wedding personalize</a></li>
                <li><a href="wedding-honeymoon.html">wedding honeymoon</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="faq2.html">FAQ type 2</a></li>
                <li><a href="signin.html">sign in</a></li>
                <li><a href="register.html">register</a></li>
                <li><a href="tours-compare.html">compare tours</a></li>
                <li><a href="about.html">gallery</a></li>
                <li><a href="rewards.html">rewards</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="blog-single.html">blog single post</a></li>
                <li><a href="testimonials.html">testimonials</a></li>
            </ul>
        </li>
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
                    <li class="dropdown"><a href="private-tours.html">Ticket</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="basic-package.html">Ticket</a>
                                    <a href="basic-package-single.html">New Ticket Sale</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{ Route('guide.blog.index') }}">Blog</a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <a href="{{ Route('guide.blog.index') }}">Blogs</a>
                                    <a href="{{ Route('guide.blog.create') }}">New Blog</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="private-tours.html">Gallery</a>
                    </li>

                    <li class="dropdown"><a href="index.html">{{ Auth::guard('seller')->user()->first_name }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ Route('guide.profileForm') }}">Profile</a>
                                <hr>
                                <a href="{{ Route('guide.logout') }}">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
