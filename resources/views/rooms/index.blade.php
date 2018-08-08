@extends('layouts.master')
@section('title', 'Your rooms')

@section('content')
    <div class="content-area hotel-section chevron-icon">
        <div class="overlay">
            <div class="container">
                <div class="main-title">
                    <h1>{{ trans('app.your-room') }}</h1>
                    <p>{{ trans('app.slogan') }}</p>
                </div>
                <div class="carousel our-partners slide" id="ourPartners3">
                    <div class="carousel-inner">
                            <div class="row">
                                @each('rooms.simple_room', $rooms, 'room')
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
