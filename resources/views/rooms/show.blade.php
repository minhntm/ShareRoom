@extends('layouts.showRoom-master')
@section('content')
    <!-- Sub banner start -->
    <div class="sub-banner">
        <div class="container">
            <div class="sub-banner-button-area-1">
                <button type="button" class="btn btn-light sub-banner-button-1">View Photos</button>
            </div>
            <div class="sub-banner-button-area-2">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="sub-banner-button-area-2-child">
                            <button type="button" class="btn btn-light sub-banner-button-1">Share</button>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="sub-banner-button-area-2-child">
                            <button type="button" class="btn btn-light sub-banner-button-1">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sub Banner end -->

    <div class="content-area rooms-details-page">
        <div class="container">
            <div class="row custom-row-show-room">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <!-- Rooms details section start -->
                    <div class="rooms-detail-slider  sidebar-widget">
                        <!-- Header -->
                        <div class="heading-rooms  clearfix sidebar-widget fix-sidebar-widget">
                            <h3>{{ $room->name }}</h3>
                            <p>
                                {{ $room->address }}
                            </p>
                        </div>

                        <div class="mb-30">
                            <!-- Title -->
                            <h3>Rooms Description</h3>
                            <!-- paragraph -->
                            <p  style="white-space: pre-wrap;">{{ $room->summary }}</p>

                        </div>

                        <hr class="custom-line">

                        <!-- Rooms features start -->
                        <div class="rooms-features mb-30">
                            <h3>Amenities</h3>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-air-conditioning"></i>
                                            @if ($room->is_air)
                                                <span>
                                                    Air conditioning
                                                </span>
                                            @else
                                                <span class="text-line-through">
                                                    Air conditioning
                                                </span>
                                            @endif
                                        </li>
                                        <li>
                                            <i class="fas fa-utensils"></i>
                                            @if ($room->is_kitchen)
                                                <span>
                                                    Kitchen
                                                </span>
                                            @else
                                                <span class="text-line-through">
                                                    Kitchen
                                                </span>
                                            @endif
                                        </li>
                                        <li>
                                            <i class="fas fa-wifi"></i>
                                            @if ($room->is_internet)
                                                <span>
                                                    Wifi
                                                </span>
                                            @else
                                                <span class="text-line-through">
                                                    Wifi
                                                </span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="fas fa-shower"></i>
                                            <span>
                                                {{ $room->bath_room }} Bathroom
                                            </span>
                                        </li>
                                        <li>
                                            <i class="fas fa-tv"></i>
                                            @if ($room->is_tv)
                                                <span>
                                                    Television
                                                </span>
                                            @else
                                                <span class="text-line-through">
                                                    Television
                                                </span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="fas fa-bed"></i>
                                            <span>
                                                {{ $room->bed_room }} Bedroom
                                            </span>
                                        </li>
                                        <li>
                                            <i class="flaticon-phone-receiver"></i>
                                            @if ($room->is_phone)
                                                <span>
                                                    Telephone
                                                </span>
                                            @else
                                                <span class="text-line-through">
                                                    Telephone
                                                </span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Rooms features end -->

                        <hr class="custom-line">
                        <div class="mb-30">
                            <!-- Title -->
                            <h3>Rooms Rules</h3>
                            <!-- paragraph -->
                            <p style="white-space: pre-wrap;">{{ $room->rule }}</p>
                        </div>

                        <hr class="custom-line">

                        <!-- Comments section start -->
                        <div class="comments-section mb-30">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1>Reviews</h1>
                            </div>
                            @each('reviews.show', $reviews, 'review')

                            @include('reviews.form', ['room' => $room])
                        </div>
                        <!-- Comments section end -->
                    </div>
                    <!-- Course details section end -->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <!-- Sidebar start -->
                    <div class="sidebar right">

                        <!-- Search area box 2 start -->
                        <div class="sidebar-widget search-area-box-2 hidden-sm hidden-xs clearfix bg-grey ">
                            <div class="search-contents">
                                @include('reservations.form', ['room' => $room])
                            </div>
                        </div>
                        <!-- Search area box 2 end -->
                    </div>
                    <!-- Sidebar end -->
            </div>
        </div>
    </div>
@endsection
