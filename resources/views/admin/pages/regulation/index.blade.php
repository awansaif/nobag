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
        <table id="datatable" class="table table-bordered  table-striped nowrap">
            <thead>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Title</th>
                    <th>For Role</th>
                    <th>Download</th>
                    <th>Show</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($regulations as $key => $regulation)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $regulation->title }}</td>
                    <td>
                        {{ $regulation->role }}
                    </td>
                    <td>
                        <a href="{{ asset($regulation->document) }}" class="btn btn-primary" download>Download</a>
                    </td>
                    <td>
                        <a href="{{ Route('admin.regulations.show',$regulation->id) }}" class="btn btn-success">Show</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.regulations.destroy',$regulation->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger float-right"
                                onclick="return confirm('Are you sure you want to delete this regulation?');">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Title</th>
                    <th>For Role</th>
                    <th>Download</th>
                    <th>Show</th>
                    <th>Remove</th>
                </tr>
            </tfoot>
        </table>
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
