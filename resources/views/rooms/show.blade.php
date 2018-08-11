@extends('layouts.master')
@section('title', $room->name)
@section('content')
    <img src="{{ URL::asset(config('image.images_url') . '/' . $photo->resized_name) }}" />
    <br><br><br>
    <div class="row">
        <div class="col-md-4">
            @include('reservations.form', ['room' => $room])
        </div>
    </div>

    <br><br><br>
    <h1>{{ $room->name }}</h1>
    <br><hr>
    <h3>{{ trans('app.address') }}: {{ $room->address }}</h3>
    <br>
    <h3>{{ trans('app.price') }}: {{ $room->price}}</h3>
    <br>
    <h3>{{ trans('app.summary') }}: {{ $room->summary}}</h3>
    <br>
    <h3>{{ trans('app.bedroom') }}: {{ $room->bed_room}}</h3>
    <br>
    <h3>{{ trans('app.bathroom') }}: {{ $room->bath_room}}</h3>
    <br>
    <h3>{{ trans('app.tv') }}: {{ config('custom.' . $room->is_tv) }}</h3>
    <br>
    <h3>{{ trans('app.kitchen') }}: {{ config('custom.' . $room->is_kitchen )}}</h3>
    <br>
    <h3>{{ trans('app.air') }}: {{ config('custom.' . $room->is_air )}}</h3>
    <br>
    <h3>{{ trans('app.heating') }}: {{ config('custom.' . $room->is_heating)}}</h3>
    <br>
    <h3>{{ trans('app.internet') }}: {{ config('custom.' . $room->is_internet )}}</h3>
    <br>
    <h3>{{ trans('app.active') }}: {{ config('custom.' . $room->active)}}</h3>
    <br>
    <h3>{{ trans('app.verified') }}: {{ config('custom.' . $room->verified )}}</h3>
    <br>
    <h3>{{ trans('app.room-type') }}: {{ $room->roomType()->get()[0]->type }}</h3>
    <br>
    <h3>{{ trans('app.owner') }}: {{ $room->owner()->get()[0]->name }}</h3>
    <br>
    <h3>{{ trans('app.city') }}: {{ $room->city()->get()[0]->name }}</h3>

@endsection

@section('scripts')
    <script src="{{ url('/bower_components/jquery-ui/ui/widgets/datepicker.js') }}"></script>
@endsection

@section('styles')
    <!-- <link rel="stylesheet" type="text/css" href="{{ url('/bower_components/jquery-ui/themes/base/datepicker.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/jquery-ui-1.10.0.custom.css') }}">
@endsection
