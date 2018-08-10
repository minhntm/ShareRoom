@extends('layouts.master')
@section('title', $room->name)
@section('content')
<div class="blog-section content-area-11">
    <div class="container">
        <div class="main-title">
            <h1></h1>
            <p></p>
        </div>
        <div class="row">
            @include('rooms.complex_room', ['room' => $room])
        </div>
    </div>
</div>
@endsection
