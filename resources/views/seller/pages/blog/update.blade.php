@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<div class="container">
    <div class="ct-textBox ct-u-backgroundGrey">
        <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Update Blog</h6>
        <div class="row">
            <form class="ct-form" method="POST" action="{{ route('guide.blog.update', $blog->id) }}"
                enctype="multipart/form-data">
                @method('PATCH')
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
                            <input type="text" name="title" class="form-control input-sm input--withBorder"
                                value="{{ $blog->title }}">
                        </div>
                        <div class="input-item"><span class="ct-fw-600">Category :</span>
                            <select class="form-control" name="category">
                                @forelse ($categories as $category)
                                <option {{ $blog->category_id == $category->id ? 'selected' : ''  }}
                                    value="{{ $category->id }}">{{ $category->category }}</option>
                                @empty
                                <option value="" disabled>Contact with admin</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="input-item">
                            <span class="ct-fw-600">Body: </span>
                            <textarea name="body" cols="10" rows="30"
                                class="form-control  input-sm input--withBorder">{{ $blog->body }}</textarea>
                        </div>
                    </div>
                    <div>
                        <span class="ct-fw-600">Tags: </span>
                        <select class="form-control js-example-theme-multiple select2" required name="tags[]" multiple>
                            @forelse ($blog->tags as $tag)
                            <option value="{{ $tag->tag_title }}" selected>{{ $tag->tag_title }}</option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="input-group text-left">
                        <img src="{{ asset($blog->featured_image) }}" alt="" width="100%" height="200px">
                        <div class="input-item ct-u-marginTop10">
                            <span class="ct-fw-600">Featured Image:</span>
                            <input type="file" name="featured_image" class="form-control input-sm input--withBorder">
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-lg text-uppercase ct-u-marginTop20">Update
                        Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
