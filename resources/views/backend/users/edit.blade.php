@extends('layouts.admin-master')
@section('title', $user->name . trans('app.edit'))
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">{!! trans('app.user-edit') !!}</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="{{ asset('/img/users/user.png') }}" class="rounded-circle" width="150" />
                                <h4 class="card-title m-t-10">{!! $user->name !!}</h4>
                                <h6 class="card-subtitle">
                                    @foreach($roles as $role)
                                        @if(in_array($role->name, $selectedRoles))
                                            {!! $role->name !!}
                                        @endif
                                    @endforeach
                                </h6>
                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body">
                            <small class="text-muted">{!! trans('app.email-address') !!}</small>
                            <h6>{!! $user->email !!}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['method' => 'PUT', 'url' => route('admin.users.update', $user->id)]) }}
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
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
                                    {!! Form::label('name', trans('app.select-role'), ['class' => 'col-sm-12']) !!}
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" id="role" name="role[]">
                                            @foreach($roles as $role)
                                                <option value="{!! $role->name !!}"
                                                        @if(in_array($role->name, $selectedRoles))
                                                        selected="selected"
                                                    @endif>
                                                    {!! $role->name !!}
                                                </option>
                                            @endforeach
                                        </select>
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
