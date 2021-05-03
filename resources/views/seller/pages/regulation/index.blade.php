@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')

<div class="container">
    <div class="ct-heading--withBorder ct-u-marginBottom70">
        <h4 class="text-uppercase ct-u-marginBottom10">Document/Regulation From Admin</h4>
    </div>
    <div class="row">
        @foreach ($regulations as $regulation)
        <div class="col-md-6">
            <div class="ct-productBox ct-u-marginBottom50">
                <div class="ct-productBox-Description">
                    <div class="ct-productBox-DescriptionInner">
                        <div class="ct-article-title">
                            <a href="{{ asset($regulation->document) }}" download>
                                <h5 class="text-uppercase ct-u-colorMotive ct-fw-700">{{ $regulation->title }}</h5>
                            </a>
                        </div>
                        <p>
                            {!! $regulation->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
