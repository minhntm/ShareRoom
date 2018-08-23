@extends('layouts.showRoom-master')
@section('title', 'Search room')
@section('content')
<div id="wrapper">
    
    <div id="sidebar">
        <div id="widget">
            <script>
                function initialize(rooms) {
                    var location = {lat: 20.99, lng: 105.85}
                    @isset($location_geo)
                        var location = {lat: {{$location_geo[0]}}, lng: {{$location_geo[1]}} }
                    @endisset

                    if (rooms.length > 0) {
                        location = {lat: rooms[0].lat, lng: rooms[0].long}
                    }

                    var map = new google.maps.Map(document.getElementById('widget'), {
                        center: location,
                        zoom: 12
                    });

                    var marker, inforwindow;

                    rooms.forEach(function(room) {
                        console.log(room);
                        marker = new google.maps.Marker({
                            position: {lat: room.lat, lng: room.long},
                            map: map
                        });
                    
                        inforwindow = new google.maps.InfoWindow({
                            content: "<div class='map_price'>$" + room.price + "</div>"
                        });
                        inforwindow.open(map, marker);
                    })
                }
                google.maps.event.addDomListener(window, 'load', function() {
                    initialize( @json($result))
                });
            </script>
        </div>
    </div>

    <div id="article">
        
        <div class="row">
            
            <div class="col-md-12">

                {{ Form::open(['method' => 'GET', 'url' => route('search')])}}
                    
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::text('start_date', Request::get('start_date'), ['id' => 'start_date', 'placeholder' => 'Start Date', 'class' => 'form-control', 'readonly' => 'true'])}}
                        </div>
                        <div class="col-md-3">
                            {{ Form::text('end_date', Request::get('end_date'), ['id' => 'end_date', 'placeholder' => 'End Date', 'class' => 'form-control', 'readonly' => 'true', 'disabled' => 'true'])}}
                        </div>
                        <div class="col-md-3">
                            {{ Form::text('price_gteq', Request::get('price_gteq'), ['placeholder' => 'Min Price', 'class' => 'form-control'])}}
                        </div>
                        <div class="col-md-3">
                            {{ Form::text('price_lteq', Request::get('price_lteq'), ['placeholder' => 'Max Price', 'class' => 'form-control'])}}
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('room_type', trans('app.room-type'), ['class' => 'control-label']) !!}
                                {!! Form::select('room_type', $roomTypes, Request::get('room_type'), ['id' => 'home_type', 'placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('bed_room', trans('app.bedroom'), ['class' => 'control-label']) !!}
                                {!! Form::select('bed_room', $numberSelection, Request::get('bed_room'), ['placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('bath_room', trans('app.bathroom'), ['class' => 'control-label']) !!}
                                {!! Form::select('bath_room', $numberSelection, Request::get('bath_room'), ['placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('city_id', trans('app.city'), ['class' => 'control-label']) !!}
                                {!! Form::select('city_id', $cities, Request::get('city_id'), ['placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::checkbox('is_tv', 1, Request::get('is_tv') ? true : false) !!} {{ trans('app.tv') }}
                            </div>
                            <div class="form-group">
                                {!! Form::checkbox('is_air', 1, Request::get('is_air') ? true : false) !!} {{ trans('app.air') }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::checkbox('is_internet', 1, Request::get('is_internet') ? true : false) !!} {{ trans('app.internet') }}
                            </div>
                            <div class="form-group">
                                {!! Form::checkbox('is_phone', 1, Request::get('is_phone') ? true : false) !!} Telephone
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::checkbox('is_kitchen', 1, Request::get('is_kitchen') ? true : false) !!} Kitchen
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        {!! Form::submit('Search', ['id' => 'submit-btn', 'class' => 'btn btn-primary btn-theme']) !!}
                    </div>

                {{ Form::close() }}

                <hr>
                <div class="row">
                    @each('rooms.search_room', $result, 'room')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#start_date").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            maxDate: '3m',
            onSelect: function(selected) {
                $('#end_date').datepicker("option", "minDate", selected);
                $('#end_date').attr('disabled', false);
            }
        });
        $("#end_date").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            maxDate: '3m',
            onSelect: function(selected) {
                $('#start_date').datepicker("option", "maxDate", selected);
            }
        });
    })
</script>

<script>
    
    $(function(){ // document ready
 
      if (!!$('.sticky').offset()) { // make sure ".sticky" element exists
     
        var stickyTop = $('.sticky').offset().top; // returns number 
     
        $(window).scroll(function(){ // scroll event
     
          var windowTop = $(window).scrollTop(); // returns number 
     
          if (stickyTop < windowTop){
            $('.sticky').css({ position: 'fixed', top: 0 });
          }
          else {
            $('.sticky').css('position','static');
          }
     
        });
     
      }
     
    });
</script>

@endsection
