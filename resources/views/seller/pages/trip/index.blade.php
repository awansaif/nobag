@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<section class="ct-u-paddingBoth80 ct-blog">
    <div class="ct-heading--withBorder ct-heading--withBorderGrey ct-u-marginBottom40">
        <h4 class="ct-u-colorMotive text-uppercase ct-u-marginBottom10">My Trips</h4>
        </p>
    </div>
    <div class="row">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        @forelse ($trips as $trip)
        <div class="col-sm-6" style="margin-bottom: 10px;">
            <div class="ct-productBox ct-productBox--moreInfo ct-productBox--moreInfo-inline">
                <h4 class="h4 ct-u-marginBottom30">
                    {{ $trip->event_title }}
                </h4>
                <div class="ct-productBox-Description">
                    <div class="ct-productBox-image">
                        <div class="ct-productBox-imageContainer">
                            <a href="basic-package-single.html">
                                @foreach (json_decode($trip->photos) as $item)
                                @if ($loop->first)
                                <img src="{{ asset($item) }}" alt="" width="100%" height="200px">
                                @endif
                                @endforeach
                            </a>
                        </div>
                    </div>
                    <div class="ct-productBox-Meta text-center">
                        <div class="ct-productBox-deliveryInformation">
                            <div class="ct-u-displayTableRow">
                                <div class="ct-productBox-MetaItem">
                                    <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Seats</span>
                                    <span class="h5 text-uppercase ct-days">{{ $trip->max_seats }}</span>
                                </div>
                                <div class="ct-productBox-MetaItem">
                                    <span class="ct-u-colorMotive ct-fw-700 text-uppercase">Remaining</span>
                                    <span class="h5 text-uppercase">{{ $trip->available_places }}</span>
                                </div>
                                <div class="ct-productBox-MetaItem">
                                    <div class="ct-productBox-price">
                                        <span class="ct-currency">Cost</span>
                                        <span class="ct-currency">${{ $trip->cost }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ct-u-displayTableRow">
                                <div class="ct-productBox-date ct-productBox-MetaItem">
                                    <span class="ct-u-colorMotive">
                                        <i class="fa fa-calendar"></i>Date
                                    </span>
                                    <span class="ct-date">{{ date('d M, Y', strtotime($trip->date)) }}</span>
                                </div>
                                <div class="ct-productBox-departure ct-productBox-MetaItem">
                                    <span class="ct-u-colorMotive">
                                        <i class="fa fa-plane"></i>Closing date
                                    </span>
                                    <span>{{ date('d M, Y', strtotime($trip->closing_date_of_the_sale)) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ Route('guide.trips.show', $trip->id) }}"
                                    class="btn btn-primary btn-sm text-uppercase ct-u-marginTop20">view trip</a>

                            </div>
                            <div class="col-sm-4">
                                <a href="{{ Route('guide.trips.edit', $trip->id) }}"
                                    class="btn btn-success btn-sm text-uppercase ct-u-marginTop20">Edit</a>

                            </div>
                            <div class="col-sm-4">
                                <form action="{{ Route('guide.trips.destroy', $trip->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        class="btn btn-danger btn-sm text-uppercase ct-u-marginTop20">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="ct-u-marginTop20"
                    style="width:100%; height:80px;display:block;overflow:hidden;word-break: break-word; word-wrap: break-word;">
                    {{ $trip->short_description }}
                </p>
            </div>
        </div>
        @empty
        <h2>No blog uploaded yet.</h2>
        @endforelse
    </div>
</section>
@endsection
