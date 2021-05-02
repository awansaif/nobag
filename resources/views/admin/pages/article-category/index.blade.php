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
                <h1 class="m-0 text-dark">Article Categories</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('editor.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ Route('admin.article-categories.create') }}" class="btn btn-success float-right">Add Category</a>
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
                    <th>Category</th>
                    <th>No. Articles</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $key => $category)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->articles->count() }}</td>
                    <td>
                        <a href="{{ Route('admin.article-categories.edit', $category->id) }}"
                            class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.article-categories.destroy', $category->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"
                                onclick="return conifrm('Are you sure to delete category');">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>No. Articles</th>
                    <th>Edit</th>
                    <th>Remove</th>
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
