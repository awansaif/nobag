@extends('layout.app')
@section('content')
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
<section class="ct-u-paddingTop50 ct-u-paddingBottom70">
    <div class="container">
        <div class="col-md-10 m-auto">
            <div class="ct-js-gallery ct-gallery ct-gallery--product">
                @forelse ($trips as $trip)
                <div class="ct-gallery-item europe basic explore">
                    <div class="ct-productBox ct-productBox--moreInfo ct-productBox--moreInfo-inline">
                        <h4 class="h4 ct-u-marginBottom30">{{ $trip->event_title }}</h4>
                        <div class="ct-productBox-Description">
                            <div class="ct-productBox-image">
                                <div class="ct-productBox-imageContainer">
                                    <a href="{{ Route('singleTrip',$trip->id) }}">
                                        @foreach (json_decode($trip->photos) as $item)
                                        @if ($loop->first)
                                        <img src="{{ asset($item) }}" alt="Product" width="100%" height="280px">
                                        @endif
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                            <div class="ct-productBox-Meta text-center">
                                <div class="ct-productBox-deliveryInformation">
                                    <div class="ct-u-displayTableRow">
                                        <div class="ct-productBox-MetaItem">
                                            <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Date</span>
                                            <span
                                                class="h5 text-uppercase ct-days">{{ date('d/m/Y', strtotime($trip->date)) }}</span>
                                        </div>
                                        <div class="ct-productBox-MetaItem">
                                            <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Place</span>
                                            <span class="h5 text-uppercase">{{ $trip->place }}</span>
                                        </div>
                                        <div class="ct-productBox-MetaItem">
                                            <div class="ct-productBox-price">
                                                <span class="ct-u-colorMotive ct-fw-700 text-uppercase">COST</span>
                                                <span class="ct-currency">${{ $trip->cost }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ct-u-displayTableRow">
                                        <div class="ct-productBox-MetaItem">
                                            <div class="ct-productBox-price">
                                                <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Available
                                                    Seats</span>
                                                <span class="ct-currency">{{ $trip->available_places }}</span>
                                            </div>
                                        </div>
                                        <div class="ct-productBox-date ct-productBox-MetaItem">
                                            <span class="ct-u-colorMotive">
                                                <i class="fa fa-calendar"></i>Closing Date</span>
                                            <span
                                                class="ct-date">{{ date('d/m/Y', strtotime($trip->closing_date_of_the_sale)) }}</span>
                                        </div>

                                    </div>
                                </div>
                                <a href="{{ Route('singleTrip',$trip->id) }}"
                                    class="btn btn-primary btn-sm text-uppercase ct-u-marginTop20">view trip
                                </a>
                            </div>
                        </div>
                        <p class="ct-u-marginTop20"
                            style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; height:40px; width:800px;">
                            {{ $trip->short_description }}
                        </p>
                    </div>
                </div>
                @empty
                <h2>No result found</h2>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
