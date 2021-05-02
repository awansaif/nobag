@extends('layout.app')

@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    data-background="{{ asset('assets/images/content/guide-tour/header-mini7.jpg') }}"
    data-background-mobile="{{ asset('assets/images/content/guide-tour/header-mini7.jpg') }}" class="ct-mediaSection">
    <div class="ct-breadcrumbs">
        <ul class="list-inline list-unstyled text-uppercase">
            <li><a href="{{ Route('welcome') }}"><i class="fa fa-home"></i></a><i class="fa fa-angle-right"></i>login
            </li>
        </ul>
    </div>
</header>
<section class="ct-u-paddingTop60 ct-u-paddingBottom90">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center">
                <div class="ct-textBox ct-u-backgroundGrey">
                    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Existing Tourist</h6>
                    <div class="ct-textBox-inner ct-u-marginBottom30">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <form class="ct-form" method="POST" action="{{ Route('tourist.login') }}">
                            @csrf
                            <div class="input-group text-left">
                                <div class="input-item"><span class="ct-fw-600">Email address:</span>
                                    <input type="email" required="" name="email"
                                        class="form-control input-sm input--withBorder" value="{{ old('email') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">Password:</span>
                                    <input type="password" required="" name="password"
                                        class="form-control input-sm input--withBorder">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="btn btn-primary btn-lg text-uppercase ct-u-marginTop20">sign in</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-left">
                        <a href="{{ Route('tourist.forgetPassword') }}"
                            class="text-capitalize ct-u-colorMotive ct-fw-700">Forgot your
                            password?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <div class="ct-textBox ct-u-backgroundGrey">
                    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom30">Why Create An Account?
                    </h6>
                    <ul class="list-inline list-unstyled ct-u-marginBottom40 text-left ct-list--moreSpace">
                        <li><i class="fa fa-long-arrow-right ct-u-colorMotive"></i>Book tours and vacations quickly and
                            easily</li>
                        <li><i class="fa fa-long-arrow-right ct-u-colorMotive"></i>Save itineraries, review reservations
                        </li>
                        <li><i class="fa fa-long-arrow-right ct-u-colorMotive"></i>Sign up for weekly unique,
                            subscriber-only savings</li>
                        <li><i class="fa fa-long-arrow-right ct-u-colorMotive"></i>Earn travel credits by referring
                            friends & family</li>
                    </ul><a href="{{ Route('tourist.registerForm') }}"
                        class="btn btn-primary btn-lg text-uppercase">Create
                        Account</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
