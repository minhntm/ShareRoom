@extends('layouts.master')
@section('title', 'Your rooms')
@section('content')
    @foreach ($rooms as $room)
        <h2>{{ $room->name }}</h2>
    @endforeach
@endsection
