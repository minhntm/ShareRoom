@extends('layouts.master')
@section('title', 'show room')
@section('content')
    <img src="{{ url('images/demo.jpg') }}" alt="Demo">

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
    <h3>{{ trans('app.tv') }}: {{ $room->is_tv === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.kitchen') }}: {{ $room->is_kitchen === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.air') }}: {{ $room->is_air === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.heating') }}: {{ $room->is_heating === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.internet') }}: {{ $room->is_internet === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.active') }}: {{ $room->active === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.verified') }}: {{ $room->verified === 1 ? trans('app.yes') : trans('app.no') }}</h3>
    <br>
    <h3>{{ trans('app.room-type') }}: {{ $room->roomType()->get()[0]->type }}</h3>
    <br>
    <h3>{{ trans('app.owner') }}: {{ $room->owner()->get()[0]->name }}</h3>
    <br>
    <h3>{{ trans('app.city') }}: {{ $room->city()->get()[0]->name }}</h3>
@endsection
