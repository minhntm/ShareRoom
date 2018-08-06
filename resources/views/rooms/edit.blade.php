@extends('layouts.master')
@section('title', 'Update room')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h1>Update your room</h1>
    </div>
    <div class="card-body">
        <div class="container">
            {!! Form::open(['method' => 'PUT', 'url' => route('rooms.update', $room->id)]) !!}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('room_type', trans('app.room-type'), ['class' => 'control-label']) !!}
                            {!! Form::select('room_type', $roomTypes, $room->room_type, ['id' => 'home_type', 'placeholder' => 'Select...', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bed_room', trans('app.bedroom'), ['class' => 'control-label']) !!}
                            {!! Form::select('bed_room', ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5], $room->bed_room, ['placeholder' => 'Select...', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bath_room', trans('app.bathroom'), ['class' => 'control-label']) !!}
                            {!! Form::select('bath_room', ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5], $room->bath_room, ['placeholder' => 'Select...', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('name', trans('app.room-name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', $room->name, ['placeholder' => 'Be clear and descriptive', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('summary', trans('app.summary'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('summary', $room->summary, ['placeholder' => 'Tell about your house', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('address', trans('app.address'), ['class' => 'control-label']) !!}
                        {!! Form::text('address', $room->address, ['placeholder' => 'Your address', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('city_id', trans('app.city'), ['class' => 'control-label']) !!}
                        {!! Form::select('city_id', $cities, $room->city_id, ['placeholder' => 'Select...', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::hidden('is_tv', 0) !!}
                            {!! Form::checkbox('is_tv', 1, $room->is_tv) !!} {{ trans('app.tv') }}
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('is_kitchen', 0) !!}
                            {!! Form::checkbox('is_kitchen', 1, $room->is_kitchen) !!} {{ trans('app.kitchen') }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::hidden('is_internet', 0) !!}
                            {!! Form::checkbox('is_internet', 1, $room->is_internet) !!} {{ trans('app.internet') }}
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('is_heating', 0) !!}
                            {!! Form::checkbox('is_heating', 1, $room->is_heating) !!} {{ trans('app.heating') }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::hidden('is_air', 0) !!}
                            {!! Form::checkbox('is_air', 1, $room->is_air) !!} {{ trans('app.air') }}
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-3 form-group">
                        {!! Form::label('price', trans('app.price'), ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend input-group-text" >$</div>
                            {!! Form::text('price', $room->price, ['placeholder' => '100$', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="form-group">
                        <span class="btn btn-default btn-file">
                            <i class="fas fa-cloud-upload-alt"></i> {{ trans('app.upload-photo') }}
                            {!! Form::file('images[]', ['class' => 'form-control', 'multiple' => true]) !!}
                        </span>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::hidden('active', 0) !!}
                        {!! Form::checkbox('active', 1, $room->active) !!} {{ trans('app.active') }}
                    </div>
                </div>

                <br>
                <div class="actions text-center">
                    {!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
