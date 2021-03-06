@extends('buyer.layout.buyer')

@section('title')
{{ Auth::guard('buyer')->user()->first_name }} - Tourist
@endsection

@section('content')

<div class="container">
    <div class="ct-heading--withBorder ct-u-marginBottom70">
        <h4 class="text-uppercase ct-u-marginBottom10">popular packages</h4>
    </div>
    <div class="row">
        @foreach ($trips as $trip)
        <div class="col-md-6">
            <div class="ct-productBox ct-u-marginBottom50">
                <div class="ct-productBox-image">
                    <div class="ct-productBox-imageContainer">
                        <a href="{{ Route('tourist.trips.show',$trip->id) }}">
                            @foreach (json_decode($trip->photos) as $item)
                            @if ($loop->first)
                            <img src="{{ asset($item) }}" alt="Product" width="150px" height="150px">
                            @endif
                            @endforeach
                        </a>
                    </div>
                </div>
                <div class="ct-productBox-Description">
                    <div class="ct-productBox-DescriptionInner">
                        <a href="{{ Route('tourist.trips.show',$trip->id) }}">
                            <h5 class="text-uppercase ct-u-marginBottom20 ct-fw-700">{{ $trip->event_title }}</h5>
                        </a>
                        <p
                            style="width:250px; height:80px;display:block;overflow:hidden;word-break: break-word; word-wrap: break-word;">
                            {{ $trip->short_description }}</p>
                    </div>
                    <div class="ct-productBox-Meta">
                        <a href="{{ Route('tourist.trips.show',$trip->id) }}"
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
@endsection
