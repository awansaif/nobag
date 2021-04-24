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
                <h1 class="m-0 text-dark">Tourists</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tourists</li>
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
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <table id="datatable" class="table table-bordered  table-striped nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Sur Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Verified at</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tourists as $key => $tourist)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $tourist->first_name }}</td>
                    <td>{{ $tourist->surname }}</td>
                    <td>{{ date('Y F, Y', strtotime($tourist->dob)) }}</td>
                    <td>{{ $tourist->email }}</td>
                    <td>{{ date('Y F, Y, H:m', strtotime($tourist->email_verified_at)) }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Sur Name</th>
                    <th>Date of Birth</th>
                    <th>Email</th>
                    <th>Verified at</th>
                </tr>
            </tfoot>
        </table>
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
