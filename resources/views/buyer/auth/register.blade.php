@extends('layout.app')
@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    data-background="{{ asset('assets/images/content/guide-tour/header-mini7.jpg') }}"
    data-background-mobile="{{ asset('assets/images/content/guide-tour/header-mini7.jpg') }}" class="ct-mediaSection">
    <div class="ct-breadcrumbs">
        <ul class="list-inline list-unstyled text-uppercase">
            <li><a href="{{ Route('welcome') }}"><i class="fa fa-home"></i></a><i class="fa fa-angle-right"></i>register
            </li>
        </ul>
    </div>
</header>
<section class="ct-u-paddingTop60 ct-u-paddingBottom90">
    <div class="container">
        <div class="row">
            <div class="col-md-7 text-center">
                <div class="ct-textBox ct-u-backgroundGrey">
                    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">register today</h6>
                    <div class="ct-textBox-inner">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form class="ct-form" method="POST" action="{{ Route('tourist.register') }}">
                            @csrf
                            <p class="text-left text-danger">* All fields are mondatory</p>
                            <br>
                            <div class="input-group text-left">
                                <div class="input-item">
                                    <span class="ct-fw-600">Full Name
                                    </span>
                                    <input type="text" required="" name="first_name"
                                        class="form-control input-sm input--withBorder" value="{{ old('first_name') }}">
                                </div>
                                <div class="input-item">
                                    <span class="ct-fw-600">Sur Name:
                                    </span>
                                    <input type="text" required="" name="surname"
                                        class="form-control input-sm input--withBorder" value="{{ old('surname') }}">
                                </div>
                                <div class="input-item">
                                    <span class="ct-fw-600">Date of Birth:
                                    </span>
                                    <input type="date" class="form-control input-sm input--withBorder" required=""
                                        width="276" name="dob" value="{{ old('dob') }}" max="2002-12-31">
                                </div>
                                <div class="input-item">
                                    <span class="ct-fw-600">email address:
                                    </span>
                                    <input type="email" required="" name="email"
                                        class="form-control input-sm input--withBorder" value="{{ old('email') }}">
                                </div>
                                <div class="input-item">
                                    <span class="ct-fw-600">Password:
                                    </span>
                                    <input type="password" required="" name="password"
                                        class="form-control input-sm input--withBorder">
                                </div>
                                <div style="display: flex; justify-content:start; height:20px; align-items: center;">
                                    <input type="checkbox" name="rule" id="rule" required checked
                                        class="input-sm input--withBorder">
                                    <label for="" style="margin-left: 10px; margin-top:4px;">
                                        acceptance of the regulations and rules of use
                                    </label>
                                </div>

                            </div>
                            <div class="text-right">
                                <button type="submit"
                                    class="btn btn-primary btn-lg text-uppercase ct-u-marginTop20">Register</button>
                            </div>
                        </form>
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
                    </ul><a href="{{ Route('tourist.loginForm') }}" class="btn btn-primary btn-lg text-uppercase">Access
                        Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
