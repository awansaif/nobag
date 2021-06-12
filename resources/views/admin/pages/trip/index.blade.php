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
                <h1 class="m-0 text-dark">Trips</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Trips</li>
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
        <table id="datatable" class="table table-bordered  table-striped nowrap">
            <thead>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Total Seats</th>
                    <th>Available Seats</th>
                    <th>Closing date</th>
                    <th>Guide</th>
                    <th>Read More</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($trips as $key => $trip)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @foreach (json_decode($trip->photos) as $item)
                        @if ($loop->first)
                        <img src="{{ asset($item) }}" alt="" class="card-img" width="100" height="100px">
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $trip->event_title }}</td>
                    <td>
                        {{ $trip->max_seats }}
                    </td>
                    <td>{{ $trip->available_places }}</td>
                    <td>{{ date('d/m/Y', strtotime($trip->closing_date_of_the_sale)) }}</td>
                    <td>{{ $trip->guide->first_name }}</td>
                    <td>
                        <a href="{{ Route('singleTrip',$trip->id) }}" target="__blank" class="btn btn-primary">Read
                            More</a>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th><i class="fas fa-list"></i></th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Total Seats</th>
                    <th>Available Seats</th>
                    <th>Closing date</th>
                    <th>Guide</th>
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
