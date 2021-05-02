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
                <h1 class="m-0 text-dark">Editor</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Editor</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ Route('admin.editor.create') }}" class="btn btn-success float-right">Add Editor</a>
        <br>
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered  table-striped nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Phone #</th>
                        <th>Email</th>
                        <th>Activate/Deactivate</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($editors as $key => $editor)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $editor->username }}</td>
                        <td>{{ $editor->visible_password }}</td>
                        <td>{{ $editor->first_name }}</td>
                        <td>{{ $editor->surname }}</td>
                        <td>{{ $editor->phone }}</td>
                        <td>{{ $editor->email }}</td>
                        <td>
                            <a href="{{ Route('admin.editor-status',$editor->id) }}"
                                class="btn btn-primary">{{ $editor->is_active? 'Active': 'Deactivate' }}</a>
                        </td>
                        <td>
                            <a href="{{ Route('admin.editor.edit',$editor->id) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ Route('admin.editor.destroy',$editor->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Phone #</th>
                        <th>Email</th>
                        <th>Activate/Deactivate</th>
                        <th>Edit</th>
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
