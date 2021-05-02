@extends('admin.layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Article</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.articles.index') }}">Articles</a>
                    </li>
                    <li class="breadcrumb-item active">Update Article</li>
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
        <form method="POST" action="{{ Route('admin.articles.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            placeholder="Article Title" value="{{ $article->title }}" required onfocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category" id="category"
                            class="form-control custom-select @error('category') is-invalid @enderror">
                            <option value="" class="disabled selected">Choose Category</option>
                            @foreach ($categories as $category)
                            <option {{ $article->category_id == $category->id ? 'selected' :
                            '' }} value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Body</label>
                        <textarea name="body" id="body" cols="30" rows="10"
                            class="form-control @error('body') is-invalid @enderror">{!! $article->body !!} </textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Featurd Image:</label>
                        <img src="{{ asset($article->featured_image) }}" alt="" width="100%" height="250px">
                        <br>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            placeholder="Article Featued Image" value="{{ old('image') }}" accept="image/*">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="name">Tags</label>
                    <select class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="select2"
                        multiple="multiple">
                        @if($article->tags)
                        @foreach ($article->tags as $tag)
                        <option value="{{ $tag->tag }}" selected>{{ $tag->tag }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-4">Update Article</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
        $("#select2").select2({
        tags: true,
        tokenSeparators: [',', ' ']
        })
</script>
@endsection
