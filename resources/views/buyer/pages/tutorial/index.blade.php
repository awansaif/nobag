@extends('buyer.layout.buyer')

@section('title')
{{ Auth::guard('buyer')->user()->first_name }} - Tourist
@endsection

@section('content')

<div class="container">
    <div class="ct-heading--withBorder ct-u-marginBottom70">
        <h4 class="text-uppercase ct-u-marginBottom10">Tutorial From Admin</h4>
    </div>
    <div class="row">
        @foreach ($tutorials as $tutorial)
        <div class="col-md-6">
            <div class="ct-productBox ct-u-marginBottom50">
                <div class="ct-productBox-Description">
                    <div style="width: 200px;">
                        {!! $tutorial->tutorial !!}
                    </div>
                    <div class="ct-productBox-DescriptionInner">
                        <h5 class="text-uppercase ct-fw-700">{{ $tutorial->title }}</h5>
                        <p style="width:250px; height:80px;display:block;overflow:hidden;word-break: break-word;
                            word-wrap: break-word;">
                            {!! $tutorial->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
