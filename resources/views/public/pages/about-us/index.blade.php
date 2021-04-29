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
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">About Us</h4>
            <p>{{ App\Models\SiteProfile::pluck('description')->first() }}</p>
        </div>
        <div class="row">
            @foreach ($teamMembers as $member)
            <div class="col-sm-6 col-md-3">
                <div class="ct-personBox dasdas">
                    <div class="ct-personBox-image">
                        <img src="{{ asset($member->image) }}" alt="person" width="300px" height="300px">
                    </div>
                    <div class="ct-personBox-description">
                        <h5 class="ct-personBox-title">{{ $member->name }}</h5>
                        <span class="ct-personBox-meta">{{ $member->position }}</span>
                    </div>
                </div>
            </div>
            <div class="clearfix visible-sm"></div>
            @endforeach
        </div>
    </div>
</section>
@endsection
