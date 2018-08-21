@extends('layouts.master')
@section('title', $user->name . trans('app.edit'))
@section('content')
    <div class="row profile">
        <div class="col-md-4">
            <div class="profile-usermenu">
                <div class="card sidebar-card">
                    <div class="list-group">
                        <div class="card-header sidebar-header">
                            {{ trans('app.edit-profile') }}
                        </div>
                        <a href="{{ route('upload') }}" class="list-group-item list-group-item-action sidebar-item">{{ trans('app.photo') }}</a>
                        <a href="{{ route('rooms.index') }}" class="list-group-item list-group-item-action sidebar-item">{{ trans('app.room') }}</a>
                        <a href="{{ route('users.reservation.index', ['user' => $user->id]) }}" class="list-group-item list-group-item-action sidebar-item">{{ trans('app.reservation') }}</a>
                        <a href="#" class="list-group-item list-group-item-action sidebar-item">{{ trans('app.references') }}</a>
                        <div class="sidebar-footer">
                            {{ Form::open(['method' => 'GET', 'route' => ['users.show', $user->id]]) }}
                            {{ Form::submit(trans('app.view-profile'), ['class' => 'btn btn-outline-secondary btn-show-profile']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile-edit-form">
                <div class="card">
                    <div class="list-group">
                        <div class="card-header profile-edit-form-header">
                            {{ trans('app.require') }}
                        </div>
                        <div class="card-body">
                            {{ Form::open(['method' => 'PUT', 'url' => route('users.update', $user->id)]) }}
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                            <div class="form-group">
                                {!! Form::label('name', trans('app.full-name'), ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('name', $user->name, ['id' => 'name', 'placeholder' => trans('app.user-name'), 'class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ), 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('app.email'), ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::email('email', $user->email, ['id' => 'email', 'placeholder' => trans('app.email-address'), 'class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ), 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', trans('app.password'), ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::password('password', ['id' => 'password', 'placeholder' => trans('app.enter-password'), 'class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' )]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password-confirm', trans('app.password-confirm'), ['class' => 'col-md-12']) !!}
                                <div class="col-md-12">
                                    {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'placeholder' => trans('app.enter-password-confirm'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    {!! Form::submit(trans('app.update-profile'), ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
