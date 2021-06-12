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
        <table id="datatable" class="table table-bordered  table-striped nowrap">
            <thead>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Tutorial</th>
                    <th>Title</th>
                    <th>For Role</th>
                    <th>Read More</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tutorials as $key => $tutorial)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <div style="width:200px; height:200px; overflow:hidden;">
                            {!! $tutorial->tutorial !!}
                        </div>
                    </td>
                    <td>{{ $tutorial->title }}</td>
                    <td>
                        {{ $tutorial->role }}
                    </td>
                    <td>
                        <a href="{{ Route('admin.tutorials.show',$tutorial->id) }}" class="btn btn-primary">Read
                            More</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.tutorials.destroy',$tutorial->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger float-right"
                                onclick="return confirm('Are you sure you want to delete this tutorial?');">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Tutorial</th>
                    <th>Title</th>
                    <th>For Role</th>
                    <th>Read More</th>
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
