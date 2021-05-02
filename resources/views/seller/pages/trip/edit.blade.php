@extends('seller.layout.seller')

@section('title')
{{ Auth::guard('seller')->user()->first_name }} - Guide
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
<div class="ct-textBox ct-u-backgroundGrey">
    <h6 class="ct-u-colorMotive text-uppercase ct-fw-700 ct-u-marginBottom50">Update Trip</h6>
    <div class="row">
        <form class="ct-form" method="POST" action="{{ route('guide.trips.update', $trip->id) }}"
            enctype="multipart/form-data">
            @method('PUT')
            <div class="message">
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
            </div>
            <div class="col-md-6">
                @csrf
                <div class="input-item">
                    <span class="ct-fw-600">Title:</span>
                    <input type="text" name="title" class="form-control input-sm input--withBorder"
                        value="{{ $trip->event_title }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Place:</span>
                    <input type="text" name="place" class="form-control input-sm input--withBorder"
                        value="{{ $trip->place }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Description</span>
                    <textarea name="description" cols="10" rows="20" style="resize: none; height:100px"
                        class="form-control input-sm input--withBorder">{{ $trip->description }}</textarea>
                </div>
                <div class=" input-item">
                    <span class="ct-fw-600">short Description</span>
                    <textarea name="short_description" cols="10" rows="20" style="resize: none; height:100px"
                        class="form-control input-sm input--withBorder">{{$trip->short_description }}</textarea>
                </div>
                <div class=" input-item">
                    <span class="ct-fw-600">Date:</span>
                    <input type="date" name="date" class="form-control input-sm input--withBorder"
                        value="{{ $trip->date }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Time:</span>
                    <input type="time" name="time" class="form-control input-sm input--withBorder"
                        value="{{ $trip->time }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Tongue:</span>
                    <input type="text" name="tongue" class="form-control input-sm input--withBorder"
                        value="{{ $trip->tongue }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Virtual Link:</span>
                    <input type="url" name="link" class="form-control input-sm input--withBorder"
                        value="{{ $trip->virtual_connection_link }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-item">
                    <span class="ct-fw-600">Cost:</span>
                    <input type="text" name="cost" class="form-control input-sm input--withBorder"
                        value="{{ $trip->cost }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Video Trailer:</span>
                    <input type="url" name="video" class="form-control input-sm input--withBorder"
                        value="{{ $trip->video_trailer }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Photos:</span>
                    <input type="file" name="photos[]" multiple class="form-control input-sm input--withBorder"
                        accept="image/*">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Google Map:</span>
                    <input type="text" name="map" multiple class="form-control input-sm input--withBorder"
                        value="{{ $trip->google_map }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Max No. Seats:</span>
                    <input type="text" name="max_seats" multiple class="form-control input-sm input--withBorder"
                        value="{{ $trip->max_seats }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Min No. Seats:</span>
                    <input type="text" name="min_seats" multiple class="form-control input-sm input--withBorder"
                        value="{{$trip->min_seats }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Closing date:</span>
                    <input type="date" name="closing_date" multiple class="form-control input-sm input--withBorder"
                        value="{{ $trip->closing_date_of_the_sale }}">
                </div>
                <div class="input-item">
                    <span class="ct-fw-600">Digital Guide:</span>
                    <input type="file" name="guide" multiple class="form-control input-sm input--withBorder">
                </div>
                <div class="">
                    <span class="ct-fw-600">Tags: </span>
                    <select class="form-control js-example-theme-multiple select2" required name="tags[]" multiple>
                        @if($trip->tags)
                        @foreach ($trip->tags as $tag)
                        <option value="{{ $tag->tag }}" selected>{{ $tag->tag }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success btn-lg text-uppercase ct-u-marginTop20">update
                    Trip</button>
            </div>
        </form>
    </div>
</div>
@endsection
