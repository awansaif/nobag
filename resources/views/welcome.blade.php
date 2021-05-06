@extends('layout.app')
@section('content')
<header id="home" class="ct-u-colorWhite text-left">
    <div data-adaptiveHeight="true" data-animations="true" data-autoplay="true" data-infinite="true"
        data-autoplaySpeed="6000" data-draggable="true" data-touchMove="false" data-arrows="true" data-items="1"
        class="ct-slick ct-js-slick">
        <div data-bg="./assets/images/content/guide-tour/sliderImage.jpg" class="item">
            <div class="ct-slick-inner">
                <div class="ct-slick-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="ct-textDecoration--underline ct-u-marginBottom60 ct-fw-300"><span
                                        class="ct-u-text-big text-uppercase">new</span>Get 15% off on vacations
                                </h1>
                                <p class="ct-u-marginBottom50">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Proin ipsum nibh, maluit esuada a sem id, tincidunt
                                    tristique nibh. Mauris tristique velit massam, in frinui gilla turpis semper
                                    quis. Sed sagittis cursus erat, et ibendum nec.</p><a href="#packages"
                                    class="btn btn-lg btn-default btn-transparent text-uppercase ct-js-btnScroll">more
                                    details</a><a href="basic-package-single.html"
                                    class="btn btn-lg btn-primary text-uppercase">book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div data-bg="./assets/images/content/guide-tour/sliderImage3.jpg" class="item">
            <div class="ct-slick-inner">
                <div class="ct-slick-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="ct-textDecoration--underline ct-u-marginBottom60 ct-fw-300"><span
                                        class="ct-u-text-big text-uppercase">new</span>Get 15% off on vacations
                                </h1>
                                <p class="ct-u-marginBottom50">Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit. Proin ipsum nibh, maluit esuada a sem id, tincidunt
                                    tristique nibh. Mauris tristique velit massam, in frinui gilla turpis semper
                                    quis. Sed sagittis cursus erat, et ibendum nec.</p><a href="#packages"
                                    class="btn btn-lg btn-default btn-transparent text-uppercase">more
                                    details</a><a href="basic-package-single.html"
                                    class="btn btn-lg btn-primary text-uppercase">book now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<section id="packages" class="ct-u-decoration--triangleBefore ct-u-backgroundMotive">
    <div class="container">
        <div class="ct-heading--withBorder ct-u-marginBottom70">
            <h4 class="ct-u-colorWhite text-uppercase ct-u-marginBottom10">popular packages</h4>
            <p class="ct-u-colorBlueLight"></p>
        </div>
        <div class="row">
            @foreach ($trips as $trip)
            <div class="col-md-6">
                <div class="ct-productBox ct-u-marginBottom50">
                    <div class="ct-productBox-image">
                        <div class="ct-productBox-imageContainer">
                            <a href="itinerary.html">
                                @foreach (json_decode($trip->photos) as $item)
                                @if ($loop->last)
                                <img src="{{ asset($item) }}" alt="Product" width="220px" height="220px">
                                @endif
                                @endforeach
                            </a>
                        </div>
                    </div>
                    <div class="ct-productBox-Description">
                        <div class="ct-productBox-DescriptionInner">
                            <a href="itinerary.html">
                                <h5 class="text-uppercase ct-u-marginBottom20 ct-fw-700">{{ $trip->event_title }}</h5>
                            </a>
                            <p
                                style="width:250px; height:80px;display:block;overflow:hidden;word-break: break-word; word-wrap: break-word;">
                                {{ $trip->short_description }}</p>
                        </div>
                        <div class="ct-productBox-Meta">
                            <a href="{{ Route('singleTrip',$trip->id) }}"
                                class="btn btn-primary btn-xs text-uppercase ct-u-marginBoth10">more
                                details</a>
                            <span class="ct-price">${{ $trip->cost }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="ct-u-paddingBottom50">
    <div class="container">
        <h2 class="text-center ct-u-marginTop70 text-primary">SEARCH HERE</h2>
        <div class="row">
            <form class="ct-form ct-u-marginTop40" action="{{ Route('search')  }}" method="POST">
                @csrf
                <div class="col-md-4">
                    <div class="">
                        <span class="ct-fw-600">TOUR NAME:</span>
                        <input type="text" name="name" class="form-control input-sm input--withBorder"
                            value="{{ old('name') }}" placeholder="TOUR NAME">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <span class="ct-fw-600">PRICE:</span>
                        <input type="text" name="price" class="form-control input-sm input--withBorder"
                            value="{{ old('price') }}" placeholder="PRICE">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <span class="ct-fw-600">DATE:</span>
                        <input type="text" name="date" class="form-control input-sm input--withBorder"
                            value="{{ old('date') }}" placeholder="DATE">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm text-uppercase ct-u-marginTop20">SEARCH</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section>
    <div style="position: relative;">
        <img src="{{ asset('assets/images/content/guide-tour/slider-tabImage.jpg') }}" alt="" width="100%">
        <div style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);">
            <h1 class="text-center" style="color: #ffff">Nobag</h1>
            <p style="color: #ffffff; margin-top:20px; text-align: center;">
                {{ App\Models\SiteProfile::pluck('description')->first() }}
            </p>
            <a href="{{ Route('about-us') }}" class="btn btn-primary"
                style="margin-top: 20px; display:block; text-align:center;">
                {{ __('More About us') }}
            </a>

        </div>
    </div>
</section>


<section class="">
    <div class="container">
        <div class="row">
            <div class="ct-heading--striped text-uppercase">
                <h4 class="pull-left">latest destinations</h4><a href="customize-destination.html"
                    class="btn btn-default btn-xs pull-right">see all</a>
                <div class="clearfix"></div>
                <div class="ct-right-extension"></div>
            </div>
            <div class="col-sm-12">
                <div role="tabpanel">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul role="tablist" class="nav nav-tabs ct-nav--left">
                                <li role="presentation" class="active"><a href="#history" aria-controls="history"
                                        role="tab" data-toggle="tab"><span class="ct-tab-number">1</span>Prague, Czech
                                        Republic</a></li>
                                <li role="presentation"><a href="#history2" aria-controls="history2" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">2</span>Barcelona,
                                        Spain</a></li>
                                <li role="presentation"><a href="#history3" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">3</span>Los Angles,
                                        California, USA</a></li>
                                <li role="presentation"><a href="#history4" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">4</span>Tokyo, Japan</a>
                                </li>
                                <li role="presentation"><a href="#history5" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">5</span>Amstedam,
                                        Netherlands</a></li>
                                <li role="presentation"><a href="#history6" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">6</span>Seoul, South
                                        Korea</a></li>
                                <li role="presentation"><a href="#history7" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">7</span>Hong Kong,
                                        China</a></li>
                                <li role="presentation"><a href="#history8" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">8</span>Venice, Italy</a>
                                </li>
                                <li role="presentation"><a href="#history9" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">9</span>Kuala Lumpur,
                                        Malaysia</a></li>
                                <li role="presentation"><a href="#history10" aria-controls="history3" role="tab"
                                        data-toggle="tab"><span class="ct-tab-number">10</span>New York, USA</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div role="tabpanel" id="history" class="tab-pane active">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history2" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history3" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history4" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history5" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history6" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history7" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history8" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history9" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                                <div role="tabpanel" id="history10" class="tab-pane">
                                    <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true"
                                        data-infinite="true" data-autoplaySpeed="6000" data-draggable="true"
                                        data-touchMove="false" data-arrows="true" data-items="1"
                                        class="ct-slick ct-js-slick ct-u-marginBottom20">
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                        <div class="item"><img
                                                src="./assets/images/content/guide-tour/slider-tabImage.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="ct-heading--withPrice ct-u-displayTableVertical ct-u-marginBottom20">
                                        <div class="ct-u-displayTableCell">
                                            <h5 class="text-uppercase ct-fw-700">Skip the line: venice in one
                                                day & boat tour</h5>
                                        </div>
                                        <div class="ct-u-displayTableCell text-right">
                                            <div class="ct-u-displayTableVertical">
                                                <div class="ct-u-displayTableCell"><a href="basic-package-single.html"
                                                        class="btn btn-primary btn-xs text-uppercase">book
                                                        now</a></div>
                                                <div class="ct-u-displayTableCell">
                                                    <div class="ct-productPrice"><span
                                                            class="ct-u-colorMotive ct-productPrice-price"><span
                                                                class="ct-currency">$</span>65</span><span
                                                            class="ct-productPrice-meta ct-u-colorMotive"><span
                                                                class="ct-discount">$75</span>Save $10</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Book this tour and save 10% compared to booking each attraction on
                                        separately! Relax while cruising along the Lovely Grand Canal as well as
                                        minorcanals aboard a water taxi for one hour. Explore small back streets
                                        & passageways.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ct-u-paddingBoth80 ct-blog">
    <div class="container">
        <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom40">
            <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">latest Articles</h4>
        </div>
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-sm-6 col-md-3">
                <article class="ct-article ct-fw-600 ct-article--grey">
                    <a href="{{ Route('singleBlog',$article->id) }}" itemprop="url">
                        <img src="{{ asset($article->featured_image) }}" alt="Blog Post" itemprop="image" width="100%"
                            height="200px"></a>
                    <div class="ct-article-body">
                        <div class="ct-article-title">
                            <a href="" {{ Route('singleBlog',$article->id) }}">
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $article->title }}</h5>
                            </a>
                        </div>
                        <ul class="ct-article-meta list-unstyled list-inline">
                            <li itemprop="dateCreated" class="ct-article-date">
                                <i class="fa fa-calendar"></i>
                                {{ date('d F,Y', strtotime($article->created_at)) }}
                            </li>
                            <li class="ct-article-category">
                                <a href="#">
                                    <i class="fa fa-folder"></i>{{ $article->category->category }}
                                </a>
                            </li>
                            <li class="ct-article-tags">
                                <ul class="list-unstyled list-inline text-uppercase">
                                    @forelse ($article->tags as $tag)
                                    <li>
                                        <a href="#">{{ $tag->tag }}</a>,
                                    </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </li>
                        </ul>
                        <div class="ct-article-description">
                            {{-- <span
                                style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; height:50px; width:400px;">
                                {!! $article->body !!}</span> --}}
                            <a href="{{ Route('singleBlog',$article->id) }}"
                                class="btn-primary btn-xs btn text-uppercase">read article</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="ct-u-paddingTop70 ct-u-backgroundGreyLight">
    <div class="container ct-u-relative"><img src="./assets/images/content/guide-tour/testimonials.png" data-bottom="0"
            data-left="0" alt="testimonials" class="ct-js-imageOffset">
        <div class="row">
            <div class="col-md-6 col-md-offset-6">
                <div class="ct-heading--withBorder ct-heading--withBorderGreyDark">
                    <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">latest posts</h4><span
                        class="text-capitalize ct-u-colorMotive">our happy clients</span>
                </div>
                <div data-adaptiveHeight="false" data-animations="true" data-autoplay="true" data-infinite="true"
                    data-autoplaySpeed="3000" data-draggable="true" data-touchMove="false" data-arrows="true"
                    data-items="1" class="ct-slick ct-js-slick ct-slick--arrowsTopBlue">
                    @foreach (App\Models\Testmonial::all() as $testimonial)
                    <div class="item">
                        <div class="ct-slick-inner">
                            <div class="ct-slick-content ct-u-paddingTop40 ct-u-paddingBottom70">
                                <p class="ct-u-marginBottom40">
                                    {!! $testimonial->message !!}
                                </p>
                                <span class="ct-fw-700 ct-u-italic">- {{ $testimonial->name }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
