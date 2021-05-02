@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<div class="container">
    <div class="ct-textBox ct-u-backgroundGrey">
        <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Change Password</h6>
        <div class="row">
            <form class="ct-form" method="POST" action="{{ Route('guide.update-password') }}">
                <div class="col-md-7 text-center">
                    <div class="ct-textBox-inner">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        @csrf
                        <div class="text-left">
                            <div class="">
                                <span class="ct-fw-600">Current Password:</span>
                                <input type="password" required="" name="current_password"
                                    class="form-control input-sm input--withBorder">
                            </div>
                            <div class="">
                                <span class="ct-fw-600">New Password:</span>
                                <input type="password" required="" name="password"
                                    class="form-control input-sm input--withBorder">
                            </div>
                            <div class="">
                                <span class="ct-fw-600">Confirm Password:</span>
                                <input type="password" required="" name="password_confirmation"
                                    class="form-control input-sm input--withBorder">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-success btn-lg text-uppercase ct-u-marginTop20">
                                    Change
                                    Password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
