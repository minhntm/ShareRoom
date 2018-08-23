@extends('layouts.home-master')
@section('title', trans('app.app-name'))
@section('content')
    <div class="content-custom">
        <div class="container">

            <br>
            <div class="text-center">
                <h2>Just for the weekend</h2>
                <p>Discover new, inspiring places close to home.</p>
            </div>

            <br>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="{{ route('search', ['location' => 'newyork']) }}">
                        <div class="discovery-card" style="background-image: url({{ asset('/img/banner/newyork.jpg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>New York</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="{{ route('search', ['location' => 'tokyo']) }}">
                        <div class="discovery-card" style="background-image: url({{ asset('/img/banner/tokyo.jpg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>Tokyo</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="{{ route('search', ['location' => 'hanoi']) }}">
                        <div class="discovery-card" style="background-image: url({{ asset('/img/banner/hanoi.jpg') }})">
                            <div class="va-container">
                                <div class="va-middle text-center">
                                    <h2><strong>Hanoi</strong></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <br>
            <br>
            <br>
            <div class="text-center">
                <h2>Explore the world</h2>
                <p>See what peopel are travelling, all around the world.</p>
            </div>

            <br>
            <div class="row">
                @each('rooms.complex_room', $rooms, 'room')
            </div>
        </div>
    </div>
@endsection
