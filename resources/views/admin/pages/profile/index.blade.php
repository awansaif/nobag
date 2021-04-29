@extends('admin.layout.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Site Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ Route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Site Profile</li>
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
        <form method="POST" action="{{ Route('admin.profile.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="8" name="description"
                    autofocus>{{ $profile == null ? old('description') : $profile->description  }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Site Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Site Email" value="{{ $profile == null ? old('email') : $profile->email  }}" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{  $profile == null ? old('phone') : $profile->phone   }}"
                    oninvalid="this.setCustomValidity('Enter digits from 0-9 only')">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Address</label>
                <input type="text" class="form-control
                    @error('address') is-invalid @enderror" name="address" placeholder="Address of site ofice"
                    value="{{  $profile == null ? old('address') : $profile->address   }}">
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label for="email">Facebook</label>
                    <input type="url" class="form-control
                                        @error('facebook') is-invalid @enderror" name="facebook"
                        placeholder="Facebook profile link"
                        value="{{  $profile == null ? old('facebook') : $profile->facebook   }}">
                    @error('facebook')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="email">Twitter</label>
                    <input type="url" class="form-control
                                        @error('twitter') is-invalid @enderror" name="twitter"
                        placeholder="Twitter profile link"
                        value="{{  $profile == null ? old('twitter') : $profile->twitter   }}">
                    @error('twitter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="email">Instagram</label>
                    <input type="url" class="form-control
                                        @error('instagram') is-invalid @enderror" name="instagram"
                        placeholder="Instagram profile link"
                        value="{{  $profile == null ? old('instagram') : $profile->instagram   }}">
                    @error('instagram')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="email">YouTube</label>
                    <input type="url" class="form-control
                                        @error('youtube') is-invalid @enderror" name="youtube"
                        placeholder="Instagram profile link"
                        value="{{  $profile == null ? old('youtube') : $profile->youtube   }}">
                    @error('youtube')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="mt-4 mb-4 btn btn-primary">Save</button>
        </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
