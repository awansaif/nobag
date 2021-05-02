@extends('editor.layout.editor')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Article</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('editor.articles.index') }}">Articles</a>
                    </li>
                    <li class="breadcrumb-item active">Add Article</li>
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
        <form method="POST" action="{{ Route('editor.articles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            placeholder="Article Title" value="{{ old('title') }}" required onfocus>
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
                            <option {{ old('category') == $category->id ? 'selected' :
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
                            class="form-control @error('body') is-invalid @enderror">{{ old('body') }} </textarea>
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
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            placeholder="Article Featued Image" value="{{ old('image') }}" required accept="image/*">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label for="name">Tags</label>
                    <select class="form-control @error('tags') is-invalid @enderror" name="tags[]" id="select2"
                        multiple="multiple">
                        @if(old('tags'))
                        @foreach (old('tags') as $tag)
                        <option value="{{ $tag }}" selected>{{ $tag }}</option>
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
            <button type="submit" class="btn btn-primary">Add Article</button>
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
