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
                <h1 class="m-0 text-dark">Document/Regulations</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Document/Regulations</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ Route('admin.regulations.create') }}" class="btn btn-success float-right">Add Regulations</a>
        <br>
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="row">
            @forelse ($regulations as $regulation)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-primary">{{ $regulation->title }}</h5>
                        <ul>
                            <li>For: <span class="text-primary">{{ $regulation->role }}</span></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ asset($regulation->document) }}" class="btn btn-primary"
                                    download>Download</a>
                            </div>
                            <div class="col-sm-4">
                                <a href="{{ Route('admin.regulations.show',$regulation->id) }}"
                                    class="btn btn-success">Show</a>
                            </div>
                            <div class="col-sm-4">
                                <form action="{{ Route('admin.regulations.destroy',$regulation->id) }}" method="post">
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
