@extends('layouts.master')
@section('title', $user->name . trans('app.edit'))
@section('content')
    <div class="row profile">
        <div class="col-md-4">
            <div class="profile-usermenu">
                <div class="card sidebar-card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="{{ asset('/img/users/user.png') }}" class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10">{!! $user->name !!}</h4>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <small class="text-muted">{!! trans('app.email-address') !!}</small>
                        <h6>{!! $user->email !!}</h6>
                    </div>
                    <div class="sidebar-footer">
                        {{ Form::open(['method' => 'GET', 'route' => ['users.edit', $user->id]]) }}
                        {{ Form::submit(trans('app.edit'), ['class' => 'btn btn-outline-secondary btn-edit-profile']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="profile-edit-form">
                <div class="card">
                    <div class="list-group">
                        <div class="card-header profile-edit-form-header">
                            {{ trans('app.about') }}
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
