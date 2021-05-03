@extends('buyer.layout.buyer')

@section('content')
<header id="home" data-stellar-background-ratio="0.3" data-height="230" data-type="parallax"
    @foreach(json_decode($trip->photos) as $item)
    @if ($loop->first)
    data-background="{{ asset($item) }}"
    @endif
    @endforeach
    @foreach(json_decode($trip->photos) as $item)
    @if ($loop->first)
    data-background-mobile="{{ asset($item) }}"
    @endif
    @endforeach
    class="ct-mediaSection"
    style="background-image: url(&quot;./assets/images/content/guide-tour/header-mini3.jpg&quot;); min-height: 230px;
    background-position: 0% 44.4px;">
    <div class="ct-breadcrumbs">
        <ul class="list-inline list-unstyled text-uppercase">
            <li>
                <a href="{{ Route('tourist.dashboard') }}">
                    <i class="fa fa-home"></i>
                </a>
                <i class="fa fa-angle-right"></i>
                Trip
            </li>
        </ul>
    </div>
</header>
<section class="ct-u-paddingTop50 ct-u-paddingBottom70">
    <div class="container">
        @if($message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif
        <h4 class="ct-u-marginBottom30">
            {{ $trip->event_title }}
            <a href="#" class="btn btn-success text-uppercase btn-xs pull-right">Booking Confirmed</a>
        </h4>
        <div class="row ct-u-colorBlackLight">
            <div class="col-md-8">
                <div class="ct-deliveryBox text-center">
                    <div class="ct-productBox-deliveryInformation">
                        <div class="ct-u-displayTableRow">
                            <div class="ct-productBox-MetaItem">
                                <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Seats</span>
                                <span class="h5 text-uppercase ct-days">{{ $trip->max_seats }}</span>
                            </div>
                            <div class="ct-productBox-MetaItem">
                                <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Available Seats</span>
                                <span class="h5 text-uppercase">{{ $trip->available_places }}</span>
                            </div>
                            <div class="ct-productBox-MetaItem">
                                <div class="ct-productBox-price">
                                    <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Cost</span>
                                    <span class="ct-currency">${{ $trip->cost }}</span>
                                </div>
                            </div>
                            <div class="ct-productBox-MetaItem">
                                <div class="ct-productBox-price">
                                    <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Min Seats</span>
                                    <span class="ct-currency">{{ $trip->min_seats }}</span>
                                </div>
                            </div>
                            <div class="ct-productBox-MetaItem">
                                <div class="ct-productBox-price">
                                    <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Place</span>
                                    <span class="ct-currency">{{ $trip->place }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ct-divider--greyBig ct-u-marginBoth30"></div>
        <p class="ct-u-marginBottom30 ct-u-colorBlackLight">
            {{ $trip->short_description }}
        </p>
        <div class="row">
            @foreach (json_decode($trip->photos) as $key => $item)
            <div class="col-md-4" style="margin: 10px">
                <img src="{{ asset($item) }}" alt="">
            </div>
            @endforeach
        </div>
    </div>
    <div class="container ct-u-marginTop50">
        <div class="ct-textBox--small ct-u-backgroundGrey ct-u-marginTop50 ct-u-marginBottom60 ct-u-colorBlackLight">
            <h4 class="ct-u-marginBottom30">Description</h4>
            <p class="ct-u-marginBottom30 ct-u-colorBlackLight">
                {{ $trip->description }}
            </p>
            <div class="clearfix"></div>
        </div>
        <h4 id="notes" class="ct-u-marginBottom30 ct-u-marginTop50">Video Trailer</h4>
        <iframe src="{{ $trip->video_trailer }}" frameborder="0" width="800px" height="280px"></iframe>
        </a>
        <h4 id="notes" class="ct-u-marginBottom30 ct-u-marginTop50">Map</h4>
        {!! $trip->google_map !!}
        </a>
        <h4 id="notes" class="ct-u-marginBottom30 ct-u-marginTop50">Important Guide</h4>
        <a href="{{ asset($trip->digital_guide) }}" download class="">
            <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Please click on this guide to
                download guide</span>
        </a>
        <div class="ct-textBox--small ct-u-backgroundGrey ct-u-marginTop50 ct-u-marginBottom60 ct-u-colorBlackLight">
            <ul class="list-unstyled list-default">
                <li><span class="ct-fw-700">Start:</span> {{ $trip->date }}</li>
                <li><span class="ct-fw-700">Time:</span> {{ $trip->time }}</li>
                <li><span class="ct-fw-700">Closing Date:</span> {{ $trip->closing_date_of_the_sale }}</li>
            </ul>
            <ul class="list-unstyled list-default">
                <li><span class="ct-fw-700">Tongue:</span> {{ $trip->tongue }}</li>
                <li>
                    <span class="ct-fw-700">Tags:</span>
                    @foreach ($trip->tags as $item)
                    {{ $item->tag }},
                    @endforeach
                </li>
                <li><span class="ct-fw-700">Virtual Link:</span> {{ $trip->virtual_connection_link }}</li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

</section>
@endsection
