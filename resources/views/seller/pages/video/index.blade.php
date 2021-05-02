@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<div class="ct-textBox ct-u-backgroundGrey">
    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Add Video</h6>
    <div class="row">
        <form class="ct-form" method="POST" action="{{ Route('guide.videos.store') }}">
            <div class="col-md-7">
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
                @csrf
                <span>Please enter youtube video url</span>
                <div class="input-item">
                    <span class="ct-fw-600">Video:</span>
                    <input type="url" required="" name="video" class="form-control input-sm input--withBorder"
                        value="{{ old('video') }}" placeholder="YouTube Video Link">
                </div>

            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-success btn-sm text-uppercase ct-u-marginTop20">Add
                    Video</button>
            </div>
        </form>
    </div>
    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Videos</h6>
    <div class="row">
        @foreach ($videos as $video)
        <div class="col-md-4 ct-u-marginBoth20" style="margin:10px; position:relative;">
            <iframe width="100%" height="250px" src="{{ $video->video }}" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div style="position: absolute; bottom: 20px; right:20px">
                <form action="{{ Route('guide.videos.destroy', $video->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm text-uppercase ct-u-marginTop20">Remove</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
