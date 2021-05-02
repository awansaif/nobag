@extends('admin.layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Tourist</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.tourists.index') }}">Tourist</a>
                    </li>
                    <li class="breadcrumb-item active"> Add Tourist</li>
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
        <form method="POST" action="{{ Route('admin.tourists.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">First Name</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                    placeholder="firstname" value="{{ old('first_name') }}" required onfocus>
                @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Surname</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                    placeholder="surname" value="{{ old('surname') }}" required onfocus>
                @error('surname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Date of Birth</label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                    value="{{ old('dob') }}" required onfocus>
                @error('dob')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Email" required value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    placeholder="Password" required value="{{ old('password') }}">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Tourist</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
