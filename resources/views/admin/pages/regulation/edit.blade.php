@extends('admin.layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Regulation</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.regulations.index') }}">Regulation</a>
                    </li>
                    <li class="breadcrumb-item active">Update Regulation</li>
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
        <form method="POST" action="{{ Route('admin.regulations.update', $regulation->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            placeholder="Article Title" value="{{ $regulation->title }}" required onfocus>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Role</label>
                        <select name="role" id="role"
                            class="form-control custom-select @error('role') is-invalid @enderror">
                            <option value="" class="disabled selected">Choose role</option>
                            <option {{ $regulation->role == 'Guide'? 'selected' : '' }} value="Guide">Guide</option>
                            <option {{ $regulation->role == 'Guide'? 'selected' : '' }} value="Tourist">Tourist</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Body</label>
                        <textarea name="description" id="description" cols="30" rows="10"
                            class="form-control @error('description') is-invalid @enderror">{!! $regulation->description !!} </textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Document File</label>
                        <input type="file" name="document" id="document"
                            class="form-control @error('document') is-invalid @enderror">
                        @error('document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-4">Update Regulation</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
