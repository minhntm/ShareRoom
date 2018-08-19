@extends('layouts.master')
@section('title', 'Create new room')
@section('content')
<div class="card">
    <div class="card-header text-center">
        <h1>{!! trans('app.create-room-step2') !!}</h1>
    </div>
    <div class="card-body">
        <div class="container">
            {!! Form::open(['method' => 'POST', 'url' => route('rooms.store')]) !!}

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('room_type', trans('app.room-type'), ['class' => 'control-label']) !!}
                            {!! Form::select('room_type', $roomTypes, null, ['id' => 'home_type', 'placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bed_room', trans('app.bedroom'), ['class' => 'control-label']) !!}
                            {!! Form::select('bed_room', $numberSelection, null, ['placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bath_room', trans('app.bathroom'), ['class' => 'control-label']) !!}
                            {!! Form::select('bath_room', $numberSelection, null, ['placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('name', trans('app.room-name'), ['class' => 'control-label']) !!}
                        {!! Form::text('name', old('name'), ['placeholder' => trans('app.room-name-placeholder'), 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('summary', trans('app.summary'), ['class' => 'control-label']) !!}
                        {!! Form::textarea('summary', old('summary'), ['placeholder' => trans('app.room-summary-placeholder'), 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('rule', 'Home Rules', ['class' => 'control-label']) !!}
                        {!! Form::textarea('rule', old('rule'), ['placeholder' => 'What that gues can and can not', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('address', trans('app.address'), ['class' => 'control-label']) !!}
                        {!! Form::text('address', old('address'), ['placeholder' => trans('app.room-address-placeholder'), 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('city_id', trans('app.city'), ['class' => 'control-label']) !!}
                        {!! Form::select('city_id', $cities, null, ['placeholder' => trans('app.select'), 'class' => 'form-control']) !!}
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::hidden('is_tv', 0) !!}
                            {!! Form::checkbox('is_tv', 1) !!} {{ trans('app.tv') }}
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('is_air', 0) !!}
                            {!! Form::checkbox('is_air', 1) !!} {{ trans('app.air') }}
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::hidden('is_internet', 0) !!}
                            {!! Form::checkbox('is_internet', 1) !!} {{ trans('app.internet') }}
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('is_phone', 0) !!}
                            {!! Form::checkbox('is_phone', 1) !!} Telephone
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::hidden('is_kitchen', 0) !!}
                            {!! Form::checkbox('is_kitchen', 1) !!} Kitchen
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-3 form-group">
                        {!! Form::label('price', trans('app.price'), ['class' => 'control-label']) !!}
                        <div class="input-group">
                            <div class="input-group-prepend input-group-text" >$</div>
                            {!! Form::text('price', old('price'), ['placeholder' => trans('app.room-price-placeholder'), 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::hidden('active', 0) !!}
                        {!! Form::checkbox('active', 1) !!} {{ trans('app.active') }}
                    </div>
                </div>

                {!! Form::hidden('images_id', $id) !!}
                {!! Form::hidden('verified', 0) !!}

                <br>
                <div class="actions text-center">
                    {!! Form::submit(trans('app.save'), ['class' => 'btn btn-primary btn-theme']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
