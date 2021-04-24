@extends('layout.app')

@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    data-background="./assets/images/content/guide-tour/header-mini.jpg"
    data-background-mobile="./assets/images/content/guide-tour/header-mini.jpg" class="ct-mediaSection">
    <div class="ct-breadcrumbs">
        <ul class="list-inline list-unstyled text-uppercase">
            <li>
                <a href="{{ route('welcome') }}">
                    <i class="fa fa-home"></i>
                </a>
                <i class="fa fa-angle-right"></i>About us
            </li>
        </ul>
    </div>
</header>
<section class="ct-u-paddingTop60 ct-u-paddingBottom50">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom40">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">our staff</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed arcu ac ligula volutpat tincidunt
                vel ut mauris. Fusce nec ultrices leo.</p>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="ct-personBox dasdas">
                    <div class="ct-personBox-image"><img src="./assets/images/content/guide-tour/personBox.jpg"
                            alt="person"></div>
                    <div class="ct-personBox-description">
                        <h5 class="ct-personBox-title">Kareb Dhonson</h5><span class="ct-personBox-meta">The ceo</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="ct-personBox">
                    <div class="ct-personBox-image"><img src="./assets/images/content/guide-tour/personBox2.jpg"
                            alt="person"></div>
                    <div class="ct-personBox-description">
                        <h5 class="ct-personBox-title">Derrick James</h5><span class="ct-personBox-meta">manager</span>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm"></div>
            <div class="col-sm-6 col-md-3">
                <div class="ct-personBox">
                    <div class="ct-personBox-image"><img src="./assets/images/content/guide-tour/personBox3.jpg"
                            alt="person"></div>
                    <div class="ct-personBox-description">
                        <h5 class="ct-personBox-title">Dan Memphis</h5><span class="ct-personBox-meta">guide</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="ct-personBox">
                    <div class="ct-personBox-image"><img src="./assets/images/content/guide-tour/personBox4.jpg"
                            alt="person"></div>
                    <div class="ct-personBox-description">
                        <h5 class="ct-personBox-title">Jessica Knowles</h5><span class="ct-personBox-meta">guide</span>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm"></div>
        </div>
    </div>
</section>
@endsection
