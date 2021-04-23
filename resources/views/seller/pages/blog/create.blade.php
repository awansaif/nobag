@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<div class="container">
    <div class="ct-textBox ct-u-backgroundGrey">
        <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Add Blog</h6>
        <div class="row">
            <form class="ct-form" method="POST" action="{{ route('guide.blogStore') }}" enctype="multipart/form-data">
                <div class="message">
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
                </div>
                <div class="col-md-7 text-center">
                    @csrf
                    <div class="input-group text-left">
                        <div class="input-item">
                            <span class="ct-fw-600">Title:</span>
                            <input type="text" name="title" required="" class="form-control input-sm input--withBorder"
                                value="{{ old('title') }}">
                        </div>
                        <div class="input-item"><span class="ct-fw-600">Category :</span>
                            <select class="ct-select ct-js-selectize" name="category">
                                <option value="1">USA</option>
                                <option value="2">Poland</option>
                                <option value="3">UK</option>
                            </select>
                        </div>
                        <div class="input-item">
                            <span class="ct-fw-600">Body: </span>
                            <textarea name="body" cols="10" rows="30" class="form-control  input-sm input--withBorder"
                                required="">{{ old('body') }}</textarea>
                        </div>
                        <div class="input-item">
                            <span class="ct-fw-600">Tags:</span>
                            <div class="simple-tags" data-simple-tags="Article">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="input-group text-left">
                        <div class="input-item">
                            <span class="ct-fw-600">Featured Image:</span>
                            <input type="file" required="" name="featured_image"
                                class="form-control input-sm input--withBorder">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-lg text-uppercase ct-u-marginTop20">Add
                        Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
