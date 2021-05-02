@extends('admin.layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Article Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.article-categories.index') }}">Blog
                            Categories</a>
                    </li>
                    <li class="breadcrumb-item active"> Add Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <form method="POST" action="{{ Route('admin.article-categories.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Category</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" name="category"
                    placeholder="Category" value="{{ old('category') }}" required onfocus>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add category</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
