@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<div class="ct-textBox ct-u-backgroundGrey">
    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Add Image</h6>
    <div class="row">
        <form class="ct-form" method="POST" action="{{ Route('guide.images.store') }}" enctype="multipart/form-data">
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
                <div class="input-item">
                    <span class="ct-fw-600">Image:</span>
                    <input type="file" required="" name="image" class="form-control input-sm input--withBorder"
                        accept="image/*">
                </div>

            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-success btn-sm text-uppercase">Add
                    Image</button>
            </div>
        </form>
    </div>
    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Images</h6>
    <hr>
    <div class="row">
        @foreach ($images as $image)
        <div class="col-md-4 ct-u-marginBoth20" style="margin:10px; position:relative;">
            <img src="{{ asset($image->image) }}" alt="" width="100%" height="300px">
            <div style="position: absolute; bottom: 20px; right:20px">
                <form action="{{ Route('guide.images.destroy', $image->id) }}" method="post">
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
