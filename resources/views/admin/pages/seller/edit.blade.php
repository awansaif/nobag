@extends('admin.layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Guide</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ Route('admin.guides.index') }}">Guides</a></li>
                    <li class="breadcrumb-item active">Update Guide</li>
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
        <form method="POST" action="{{ Route('admin.guides.update',$seller->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            placeholder="Username" value="{{ $seller->user_name }}" required onfocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Password" value="{{ $seller->visible_password }}" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <br>
                <hr>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" placeholder="firstname" value="{{ $seller->first_name }}" required>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Surname</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                            placeholder="Surname" value="{{ $seller->surname }}" required>
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Place of Birth</label>
                        <input type="text" class="form-control @error('pob') is-invalid @enderror" name="pob"
                            placeholder="Place of birth" value="{{ $seller->pob }}" required>
                        @error('pob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Date of Birth</label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                            value="{{ $seller->dob }}" required>
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nationality</label>
                        <input type="text" class="form-control @error('nationality') is-invalid @enderror"
                            name="nationality" placeholder="Nationality" value="{{ $seller->nationality }}" required
                            onfocus>
                        @error('nationality')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            placeholder="Phone Number" value="{{ $seller->phone }}" required onfocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Email" required value="{{ $seller->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Fiscal Code</label>
                        <input type="text" class="form-control @error('fiscal_code') is-invalid @enderror"
                            name="fiscal_code" placeholder="fiscal_code" required value="{{ $seller->fiscal_code }}">
                        @error('fiscal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Vat Number</label>
                        <input type="text" class="form-control @error('vat_number') is-invalid @enderror"
                            name="vat_number" placeholder="Vat Number" required value="{{ $seller->vat_number }}">
                        @error('vat_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">IBAN</label>
                        <input type="text" class="form-control @error('iban') is-invalid @enderror" name="iban"
                            placeholder="iban" required value="{{ $seller->iban }}">
                        @error('iban')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Guide</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection