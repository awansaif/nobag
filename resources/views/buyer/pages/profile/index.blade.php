@extends('buyer.layout.buyer')

@section('title')
{{ Auth::guard('buyer')->user()->first_name }} - Tourist
@endsection

@section('content')
<div class="container">
    <div class="ct-textBox ct-u-backgroundGrey">
        <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Update Profile</h6>
        <div class="row">
            <form class="ct-form" method="POST" action="{{ Route('tourist.profile',$profile->id) }}"
                enctype="multipart/form-data">
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
                        <div class="input-group text-left">
                            <div class="input-item"><span class="ct-fw-600">first Name:</span>
                                <input type="text" required="" name="first_name"
                                    class="form-control input-sm input--withBorder" value="{{ $profile->first_name }}">
                            </div>
                            <div class="input-item"><span class="ct-fw-600">Nick Name:</span>
                                <input type="text" name="nick_name" class="form-control input-sm input--withBorder"
                                    value="{{ $profile->profile ? $profile->profile->nickename : '' }}">
                            </div>
                            <div class="input-item"><span class="ct-fw-600">Self Description:</span>
                                <textarea name="self_description" id="self" cols="10" rows="10"
                                    class="form-control input-sm input--withBorder">{{ $profile->profile ? $profile->profile->short_description : '' }}</textarea>
                            </div>
                            <div class="input-item"><span class="ct-fw-600">Date of Birth:</span>
                                <input type="date" required="" name="dob"
                                    class="form-control input-sm input--withBorder" value="{{ $profile->dob }}"
                                    max="2002-12-31">
                            </div>
                            <div class="input-item"><span class="ct-fw-600">Spoken Language:</span>
                                <input type="text" name="spoken_language"
                                    class="form-control input-sm input--withBorder"
                                    value="{{  $profile->profile ? $profile->profile->tongue : '' }}">
                            </div>
                            <div class="input-item"><span class="ct-fw-600">Passion:</span>
                                <input type="text" name="passion" class="form-control input-sm input--withBorder"
                                    value="{{ $profile->profile ? $profile->profile->passions : '' }}">
                            </div>

                            <div class="input-item"><span class="ct-fw-600">Fisacal Code:</span>
                                <input type="text" name="fiscal_code" class="form-control input-sm input--withBorder"
                                    value="{{ $profile->profile ? $profile->profile->fiscal_code : '' }}">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <img src="{{ asset($profile->profile ? $profile->profile->personal_photo : '') }}"
                        style="margin-bottom: 2px;" alt="" width="200px" height="200px">
                    <div class="input-item">
                        <span class="ct-fw-600">Peranol Photo:</span>
                        <input type="file" name="personal_photo" class="form-control input-sm input--withBorder"
                            accept="image/*">
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success btn-lg text-uppercase ct-u-marginTop20">Update
                        Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
