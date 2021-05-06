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
<section>
    <div class="container">
        <div class="ct-divider--greyBig ct-u-marginTop20 ct-u-marginBottom30"></div>
        <h5 class="text-uppercase ct-fw-700 ct-u-marginBottom20">2 comments</h5>
        <span class="ct-u-marginBottom20 ct-u-block">See what other people say about this Tour.</span>
        <div class="ct-comments ct-comments--style2">
            <ul class="ct-commentList list-unstyled ct-fw-700">
                <li>
                    <div class="ct-u-displayTable ct-u-marginBottom30">
                        <div class="ct-u-displayTableCell">
                            <div class="ct-userImage"><img
                                    src="{{ asset('assets/images/content/guide-tour/user-comments4.jpg') }}" alt="user">
                            </div>
                        </div>
                        <div class="ct-u-displayTableCell">
                            <div class="ct-u-displayTableVertical ct-title--withDecoration">
                                <div class="ct-u-displayTableCell">
                                    <h4>Can't argue with that</h4>
                                </div>
                                {{-- <div class="ct-u-displayTableCell text-right">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="#">Replay<i class="fa fa-reply"></i></a></li>
                                        <li>
                                            <div data-rating="3" class="starrr"><span>Rating:</span><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="active fa fa-star"></i><i
                                                    class="active fa fa-star"></i></div>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="ct-userText">
                        <p class="ct-fw-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vulputate
                            odio
                            felis, at consectetur elit ullamcorper sit amet. Nullam eget hendrerit dui. Aenean augue
                            leo,
                            vestibulum ut faucibus sed, porttitor a dolor. Nullam maximus ligula ut risus sagittis
                            mattis.</p>
                    </div>
                    <div class="ct-article-date">by<a href="#"> the_flower1233</a> on<span class="ct-u-colorMotive">
                            June 30,
                            2015</span> |<span class="ct-u-colorMotive"> 12:32 pm</span></div>
                </li>
                <li>
                    <div class="ct-u-displayTable ct-u-marginBottom30">
                        <div class="ct-u-displayTableCell">
                            <div class="ct-userImage"><img src="{{ asset('assets/images/content/guide-tour/user-comments5.jpg') }}"
                                    alt="user"></div>
                        </div>
                        <div class="ct-u-displayTableCell">
                            <div class="ct-u-displayTableVertical ct-title--withDecoration">
                                <div class="ct-u-displayTableCell">
                                    <h4>There's something I want to say</h4>
                                </div>
                                {{-- <div class="ct-u-displayTableCell text-right">
                                    <ul class="list-unstyled list-inline">
                                        <li><a href="#">Replay<i class="fa fa-reply"></i></a></li>
                                        <li>
                                            <div data-rating="3" class="starrr"><span>Rating:</span><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="active fa fa-star"></i><i
                                                    class="active fa fa-star"></i></div>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="ct-userText">
                        <p class="ct-fw-400">Ut mattis feugiat laoreet. Aenean ut pulvinar leo. Morbi placerat justo ac
                            turpis
                            volutpat suscipit. Integer commodo sem mattis arcu blandit, sit amet tincidunt ante
                            vulputate. Fusce
                            hendrerit et nibh ut feugiat. Ut eleifend felis et nisl efficitur, eu placerat metus
                            rhoncus.</p>
                    </div>
                    <div class="ct-article-date">by<a href="#"> theon56</a> on<span class="ct-u-colorMotive"> June 30,
                            2015</span> |<span class="ct-u-colorMotive"> 11:35 pm</span></div>
                </li>
            </ul>
        </div>
        <div class="ct-divider--greyBig ct-u-marginTop80 ct-u-marginBottom30"></div>
        <div class="row">
            <div class="col-md-9">
                <form class="ct-form">
                    <div class="input-group text-left">
                        <div class="input-item"><span class="ct-fw-600">Title*:</span>
                            <input type="text" required="" name="field[]"
                                class="form-control input-lg input--withBorder input-focusMotive">
                        </div>
                        <div class="input-item"><span class="ct-fw-600">Comment*:</span>
                            <textarea data-error-message="Message is required" rows="7" required="" name="field[]"
                                title="Message"
                                class="form-control input--withBorder input-focusMotive ct-u-marginBottom20"></textarea>
                            <button type="submit" class="btn btn-primary btn-lg text-uppercase ct-u-marginTop20">submit
                                comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
