@extends('layouts.nonavbar_master')
@section('title', trans('app.register'))

@section('content')
<div class="contact-bg overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-content-box">
                    <a href="index.html" class="clearfix alpha-logo">
                        <img src="{{ url('img/logos/white-logo.png') }}" alt="white-logo">
                    </a>
                    <div class="details">
                        <h3>{{ trans('app.create-an-account') }}</h3>
                        {!! Form::open(['method' => 'POST', 'url' => route('register'), 'aria-label' => __('Register')]) !!}
                            {!! Form::text('name', old('name'), ['id' => 'name', 'class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ), 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => trans('app.enter-username')]) !!}
                            @if ($errors->has('name'))
                                <span class="invalid-feedback invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                            {!! Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ), 'required' => 'required', 'placeholder' => trans('app.enter-email')]) !!}
                            @if ($errors->has('email'))
                                <span class="invalid-feedback invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' ), 'required' => 'required', 'placeholder' => trans('app.enter-password')]) !!}
                            @if ($errors->has('password'))
                                <span class="invalid-feedback invalid-feedback-custom" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            {!! Form::password('password_confirmation', ['id' => 'password-confirm', 'class' => 'form-control', 'required' => 'required', 'placeholder' => trans('app.enter-password-confirm')]) !!}
                            {!! Form::submit(trans('app.register'), ['class' => 'btn-md btn-theme btn-block btn-register']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="footer">
                        <span>
                            {{ trans('app.already-a-member') }} <a href="{{ route('login') }}">{{ trans('app.login-here') }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
