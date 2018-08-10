@extends('layouts.nonavbar_master')
@section('title', trans('app.login'))
@section('content')
    <div class="contact-bg overview-bgi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-content-box">
                        <a href="{{ route('home') }}" class="clearfix alpha-logo">
                            <img src="{{ url('img/logos/white-logo.png') }}" alt="white-logo">
                        </a>
                        <div class="details">
                            <h3>{{ trans('app.login-title') }}</h3>
                            {!! Form::open(['method' => 'POST', 'url' => route('login'), 'aria-label' => __('Login')]) !!}
                                <div class="form-group">
                                    {!! Form::email('email', old('email'), ['id' => 'email', 'class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ), 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => __('E-Mail Address')]) !!}
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback invalid-feedback-custom" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    {!! Form::password('password', ['id' => 'password', 'class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' ), 'required' => 'required', 'placeholder' => __('Password')]) !!}
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback invalid-feedback-custom" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="row checkbox">
                                    <div class="col ez-checkbox pull-left">
                                        {!! Form::checkbox('remember', '1', old('remember') ? true : false, ['class' => 'ez-hide']) !!}
                                        {{ __('Remember Me') }}
                                    </div>
                                    <div class="col link-not-important-custom">
                                        <a href="{{ route('password.request') }}" class="link-not-important pull-right">{{ trans('app.forgot-password') }}</a>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    {!! Form::submit(__('Login'), ['class' => 'btn-md btn-theme btn-block']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="footer">
                            <span>
                                {{ trans('app.dont-have-account') }} <a href="{{ route('register') }}">{{ trans('app.register-here') }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
