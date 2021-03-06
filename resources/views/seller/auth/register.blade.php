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
                        <form class="ct-form" method="POST" action="{{ Route('guide.register') }}">
                            @csrf
                            <div class="input-group text-left">
                                <div class="input-item"><span class="ct-fw-600">User Name:</span>
                                    <input type="text" required="" name="user_name"
                                        class="form-control input-sm input--withBorder" value="{{ old('user_name') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">first Name:</span>
                                    <input type="text" required="" name="first_name"
                                        class="form-control input-sm input--withBorder" value="{{ old('first_name') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">Sur Name:</span>
                                    <input type="text" required="" name="surname"
                                        class="form-control input-sm input--withBorder" value="{{ old('surname') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">Place of Birth:</span>
                                    <input type="text" required="" name="pob"
                                        class="form-control input-sm input--withBorder" value="{{ old('pob') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">Date of Birth:</span>
                                    <input type="date" required="" name="dob"
                                        class="form-control input-sm input--withBorder" max="2002-12-31"
                                        value="{{ old('dob') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">Nationality:</span>
                                    <input type="text" name="nationality" id=""
                                        class="form-control input-sm input--withBorder" placeholder="Nationality">
                                    {{-- <select class="ct-select ct-js-selectize" name="nationality">
                                        <option value="1">USA</option>
                                        <option value="2">Poland</option>
                                        <option value="3">UK</option>
                                    </select> --}}
                                </div>
                                <div class="input-item"><span class="ct-fw-600">phone:</span>
                                    <input type="tel" required="" name="phone"
                                        class="form-control input-sm input--withBorder" value="{{ old('phone') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">email address:</span>
                                    <input type="email" required="" name="email"
                                        class="form-control input-sm input--withBorder" value="{{ old('email') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">Fiscal code:</span>
                                    <input type="tel" required="" name="fiscal_code"
                                        class="form-control input-sm input--withBorder"
                                        value="{{ old('fiscal_code') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">VAT Number:</span>
                                    <input type="tel" required="" name="vat_number"
                                        class="form-control input-sm input--withBorder" value="{{ old('vat_number') }}">
                                </div>
                                <div class="input-item"><span class="ct-fw-600">IBAN:</span>
                                    <input type="tel" required="" name="iban"
                                        class="form-control input-sm input--withBorder" value="{{ old('iban') }}">
                                </div>
                                <div class="input-item">
                                    <span class="ct-fw-600">Password:
                                    </span>
                                    <input type="password" required="" name="password"
                                        class="form-control input-sm input--withBorder">
                                </div>
                                <div class="input-item">
                                    <span class="ct-fw-600">Rules:
                                    </span>
                                    <p class="color: #202020;">Password must be greater then 8.</p>
                                    <p class="color: #202020;">Password must contain aphla-numeric and special
                                        character.</p>
                                </div>
                                <div style="display: flex; justify-content:start; height:20px; align-items: center;">
                                    <input type="checkbox" name="rule" id="rule" required checked
                                        class="input-sm input--withBorder">
                                    <label for="" style="margin-left: 10px; margin-top:4px;">
                                        By selecting <b>Agree and continue</b> below, I agree to noBag's
                                        <a href="#" class="text-primary">Terms of
                                            Service </a>,
                                        <a href="#" class="text-primary">Payments Terms of Service
                                        </a>,
                                        <a href="#" class="text-primary">Privacy Policy </a>
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
                    </ul><a href="{{ Route('guide.login') }}" class="btn btn-primary btn-lg text-uppercase">Access
                        Account</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
