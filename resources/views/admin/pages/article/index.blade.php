@extends('admin.layout.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Articles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Artilce</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="row">
            @forelse ($artilcess as $article)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <p class="">
                            <i class="fa fa-calendar"></i>
                            <span class="font-weight-bold">Publish At:</span>
                            {{ date('d M, Y', strtotime($article->created_at)) }}
                        </p>
                        <img src="{{ asset($article->featured_image) }}" alt="" width="100%" height="250px">
                        <hr>
                        <h4 class="text-turncate">{{ $article->title }}</h4>
                        <div class="d-flex justify-content-between p-0">
                            <a href="{{ Route('admin.articles.edit',$article->id) }}" class="btn float-left">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ Route('admin.articles.destroy', $article->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        <hr>
                        <span class="d-inline-block text-truncate"
                            style="max-width: 100%; height:120px; overflow:hidden;">
                            {!! $article->body !!}
                        </span>
                        <hr>
                        <div class="d-flex flex-column">
                            <p class="">
                                <span class="font-weight-bold">
                                    <i class="fa fa-category"></i>
                                    Categpry:
                                </span>
                                {{ $article->category->category }}
                            </p>
                            <p class="">
                                <span class="font-weight-bold">
                                    <i class="fa fa-tags"></i>
                                    Tags:
                                </span>
                                @foreach ($article->tags as $tag)
                                {{ $tag->tag }},
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection


@section('scripts')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $("#datatable").DataTable();
    });
</script>
@endsection
