<div class="ct-preloader">
    <div class="ct-preloader-content"></div>
</div>
<nav class="ct-menuMobile text-uppercase">
    <ul class="ct-menuMobile-navbar">
        <li>
            <a href="{{ route('welcome') }}">Home</a>
        </li>
        <li>
            <a href="{{ route('blogs') }}">Blogs</a>
        </li>
        <li>
            <a href="{{ route('about-us') }}">About Us</a>
        </li>
        <li>
            <a href="{{ route('contact-us.index') }}">contact</a>
        </li>
    </ul>
</nav>
<div id="ct-js-wrapper" class="ct-pageWrapper">
    <div class="ct-navbarMobile">
        <a href="{{ route('welcome') }}" class="navbar-brand">
            <h2>NOBAG</h2>
            {{-- <img src="./assets/images/content/guide-tour/logo.png" alt="Mobile Logo"> --}}
        </a>
        <button type="button" class="navbar-toggle">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="ct-topBar text-uppercase ct-fw-400">
        <div class="container">
            <ul class="list-inline pull-left ct-information-contact">
                <li>
                    <i class="fa fa-phone"></i>phone:
                    <a
                        href="tel:{{ App\Models\SiteProfile::pluck('phone')->first() }}">{{ App\Models\SiteProfile::pluck('phone')->first() }}</a>
                </li>
                <li>
                    <i class="fa fa-envelope-o"></i>mail:
                    <a href="mailto:{{ App\Models\SiteProfile::pluck('email')->first() }}">
                        {{ App\Models\SiteProfile::pluck('email')->first() }}
                    </a>
                </li>
            </ul>
            <div class="pull-right">
                <ul class="list-inline">
                    <li>
                        <ul class="list-inline ct-socials">
                            <li>
                                <a
                                    href="{{ App\Models\SiteProfile::pluck('facebook')->first() == null ? '#' : App\Models\SiteProfile::pluck('facebook')->first()}}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ App\Models\SiteProfile::pluck('twitter')->first() == null ? '#' : App\Models\SiteProfile::pluck('twitter')->first()}}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ App\Models\SiteProfile::pluck('instagram')->first() == null ? '#' : App\Models\SiteProfile::pluck('instagram')->first()}}">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ App\Models\SiteProfile::pluck('youtube')->first() == null ? '#' : App\Models\SiteProfile::pluck('youtube')->first()}}">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ Route('guide.loginForm') }}">Are you guide?</a></li>
                    <li><a href="{{ Route('tourist.loginForm') }}">login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar yamm text-uppercase">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ route('welcome') }}">
                    <h2 style="margin-top: 25px;">NOBAG</h2>
                    {{-- <img src="{{ asset('assets/images/content/guide-tour/logo.png') }}" alt="logo"> --}}
                </a>
            </div>
            <ul class="nav navbar-nav ct-navbar--fadeInUp pull-right">
                <li class="dropdown yamm-fw">
                    <a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="{{ route('blogs') }}">Blogs</a>
                </li>
                <li class="dropdown yamm-fw">
                    <a href="{{ route('about-us') }}">About Us</a>
                </li>

                <li class="dropdown">
                    <a href="{{ route('contact-us.index') }}">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
