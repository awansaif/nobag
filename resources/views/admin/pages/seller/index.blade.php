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
                <h1 class="m-0 text-dark">Guides</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Guide</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ Route('admin.guides.create') }}" class="btn btn-success float-right">Add Guide</a>
        <br>
        <br>
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
        @endif
        <table id="datatable" class="table table-bordered table-responsive table-striped nowrap">
            <thead>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Nationality</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Trips</th>
                    {{-- <th>Sales</th> --}}
                    {{-- <th>Review</th> --}}
                    <th>Activate/Deactivate</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sellers as $key => $seller)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $seller->first_name }}</td>
                    <td>{{ $seller->surname }}</td>
                    <td>{{ $seller->nationality }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>
                        @if($seller->is_verified)
                        verified
                        @else
                        <a class="btn btn-success" href="{{ Route('admin.sellerVerification',$seller->id) }}">Verify</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ Route('admin.guideTours', $seller->id) }}" class="btn btn-success">Trips</a>
                    </td>
                    {{-- <td>
                        <a href="#" class="btn btn-success">Sales</a>
                    </td> --}}
                    {{-- <td>
                        <a href="#" class="btn btn-success">Review</a>
                    </td> --}}
                    <td>
                        <a href="{{ Route('admin.guide-status',$seller->id) }}"
                            class="btn btn-primary">{{ $seller->is_active? 'Active': 'Deactivate' }}</a>
                    </td>
                    <td>
                        <a href="{{ Route('admin.guides.edit', $seller->id) }}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ Route('admin.guides.destroy',$seller->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this Guide?');">Remove</button>
                        </form>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Nationality</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Trips</th>
                    {{-- <th>Sales</th> --}}
                    {{-- <th>Review</th> --}}
                    <th>Activate/Deactivate</th>
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
