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
                <h1 class="m-0 text-dark">Tutorial</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Tutorial</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ Route('admin.tutorials.create') }}" class="btn btn-success float-right">Add Tutorial</a>
        <br>
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="row">
            @forelse ($tutorials as $tutorial)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-head">
                        <div style="width:100%; height:200px; overflow:hidden;">
                            {!! $tutorial->tutorial !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="text-primary">{{ $tutorial->title }}</h5>
                        <ul>
                            <li>For: <span class="text-primary">{{ $tutorial->role }}</span></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ Route('admin.tutorials.show',$tutorial->id) }}" class="btn btn-primary">Read
                                    More</a>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{ Route('admin.tutorials.destroy',$tutorial->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger float-right">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
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
