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
                            <h3>Super Deluxe Room</h3>
                            <p>
                                123 Kathal St. Tampa City,
                            </p>
                        </div>

                        <div class="mb-30">
                            <!-- Title -->
                            <h3>Rooms Description</h3>
                            <!-- paragraph -->
                            <p>This is a woven house made almost entirely of bamboo. It is open air and as close to living in nature as you get. Our main lodge is down a private foot path only accessible to cottage guests. if you choose to join us for dinner, a swim or for socializing with other guests you are welcome to enjoy this common space with a saltwater pool and a swing. :)</p>
                        </div>

                        <hr class="custom-line">

                        <!-- Rooms features start -->
                        <div class="rooms-features mb-30">
                            <h3>Amenities</h3>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-air-conditioning"></i>Air conditioning
                                        </li>
                                        <li>
                                            <i class="flaticon-bed"></i>2 Bedroom
                                        </li>
                                        <li>
                                            <i class="flaticon-wifi-connection-signal-symbol"></i>Free Wi-Fi
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-bed"></i>2 Bedroom
                                        </li>
                                        <li>
                                            <i class="flaticon-graph-line-screen"></i>TV
                                        </li>
                                        <li>
                                            <i class="flaticon-no-smoking-sign"></i>No Smoking
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <ul class="condition">
                                        <li>
                                            <i class="flaticon-room-service"></i>Room Service
                                        </li>
                                        <li>
                                            <i class="flaticon-breakfast"></i>Breakfast
                                        </li>
                                        <li>
                                            <i class="flaticon-phone-receiver"></i>Telephone
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Rooms features end -->

                        <hr class="custom-line">

                        <!-- Comments section start -->
                        <div class="comments-section mb-30">
                            <!-- Main Title 2 -->
                            <div class="main-title-2">
                                <h1>Reviews</h1>
                            </div>

                            <ul class="comments">
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="{{ asset('img/users/user.png') }}" alt="avatar-5">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author">
                                                    Jane Doe
                                                </div>
                                                <div class="comment-meta-date">
                                                    <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="comment-body">
                                                <div class="comment-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, conser adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum et vel eros. Maecenas eros enim, tincidunt vel turpis vel, dapibus tempus nulla. Donec vel nulla dui. Pellentesque sed ante sed ligula hendrerit condimentum. Suspendisse rhoncus fringilla ipsum quis porta.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="comment">
                                        <div class="comment-author">
                                            <a href="#">
                                                <img src="{{ asset('img/users/user.png') }}" alt="avatar-5">
                                            </a>
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <div class="comment-meta-author">
                                                    Jane Doe
                                                </div>
                                                <div class="comment-meta-date">
                                                    <span class="hidden-xs">8:42 PM 3/3/2017</span>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="comment-body">
                                                <div class="comment-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
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
                            <h1>$260/Night</h1>
                            <div class="search-contents">
                                <form method="GET">
                                    <div class="row">
                                        <div class="search-your-details w-100">
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group fix-form-checkin-checkout">
                                                    <input type="text" class="btn-default datepicker" placeholder="Check In">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <div class="form-group fix-form-checkin-checkout">
                                                    <input type="text" class="btn-default datepicker" placeholder="Check Out">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <form class="form-inline">
                                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                            <option selected>Adults</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form class="form-inline">
                                                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                            <option selected>Children</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group mrg-btm-10">
                                                    <button class="search-button btn-theme">Book Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Search area box 2 end -->
                    </div>
                    <!-- Sidebar end -->
            </div>
        </div>
    </div>
@endsection