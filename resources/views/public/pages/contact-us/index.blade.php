@extends('layout.app')

@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    data-background="./assets/images/content/guide-tour/header-mini8.jpg"
    data-background-mobile="./assets/images/content/guide-tour/header-mini8.jpg" class="ct-mediaSection">
    <div class="ct-breadcrumbs">
        <ul class="list-inline list-unstyled text-uppercase">
            <li>
                <a href="{{ route('welcome') }}">
                    <i class="fa fa-home"></i>
                </a>
                <i class="fa fa-angle-right"></i>contact us
            </li>
        </ul>
    </div>
</header>
<section class="ct-u-paddingTop80 ct-u-paddingBottom90">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom50">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">thank you for contacting tours & tickets
            </h4>
            <p>In order to respond to your inquiries in an expedient manner, please complete the required fields below.
            </p>
        </div>
        <div class="ct-js-googleMap--contact ct-u-marginBottom50"></div>
        <div class="row">
            <div class="col-md-3">
                <div class="ct-textBox--small ct-u-backgroundGrey">
                    <ul class="list-unstyled ct-list--circleWithIcons ct-list--circleWithIcons-bordered">
                        <li><span class="ct-list-iconContainer"><i class="fa fa-map-marker"></i></span>
                            <h6 class="ct-u-marginBottom10">Address</h6>
                            <p>
                                {{ App\Models\SiteProfile::pluck('address')->first() }}
                            </p>
                        </li>
                        <li>
                            <span class="ct-list-iconContainer">
                                <i class="fa fa-phone"></i>
                            </span>
                            <h6 class="ct-u-marginBottom10">Phone</h6>
                            <p>{{ App\Models\SiteProfile::pluck('phone')->first() }}</p>
                        </li>
                        <li>
                            <span class="ct-list-iconContainer">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <h6 class="ct-u-marginBottom10">Email</h6>
                            <a href="mailto:{{ App\Models\SiteProfile::pluck('email')->first() }}">
                                {{ App\Models\SiteProfile::pluck('email')->first() }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <h4 class="ct-u-marginBottom30">Send Us a Message</h4>
                <div role="alert" class="successMessage alert alert-success alert-dismissible">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                            aria-hidden="true">�</span></button><strong>Success!</strong>Congratulation, mission success
                </div>
                <div role="alert" class="errorMessage alert alert-danger alert-dismissible">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span
                            aria-hidden="true">�</span></button><strong>Danger!</strong>You did something wrong
                </div>
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
                <form action="{{ Route('contact-us.store') }}" method="POST"
                    class="ct-u-marginBottom30 ct-form ct-form-grey">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input placeholder="Name" type="text" name="name"
                                class="form-control input--withBorder ct-u-marginBottom10 input-focusMotive">
                            <label for="contact_name" class="sr-only"></label>
                        </div>
                        <div class="col-md-6">
                            <input placeholder="Email" type="email" name="email"
                                class="form-control input--withBorder ct-u-marginBottom10 input-focusMotive">
                            <label for="contact_email" class="sr-only"></label>
                        </div>
                    </div>
                    <textarea id="contact_message" placeholder="Message" rows="8" name="message" title="Message"
                        class="form-control input--withBorder ct-u-marginBottom20 input-focusMotive ct-u-marginBottom20"></textarea>
                    <button class="btn btn-primary btn-lg text-uppercase">send message</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
