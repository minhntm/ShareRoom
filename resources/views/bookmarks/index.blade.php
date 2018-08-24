@extends('layouts.master')
@section('title', 'Saved room')

@section('content')
    <div class="content-area hotel-section chevron-icon">
        <div class="overlay">
            <div class="container">
                <div class="main-title">
                    <h1>Saved room</h1>
                    <p>{{ trans('app.slogan') }}</p>
                </div>
                <div class="carousel our-partners slide" id="ourPartners3">
                    <div class="carousel-inner">
                        <div class="row">
                            @if (count($bookmarks) > 0)
                                @each('bookmarks.simple_room', $bookmarks, 'bookmark')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
