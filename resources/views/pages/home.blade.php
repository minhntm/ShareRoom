@extends('layouts.home-master')
@section('title', trans('app.app-name'))
@section('content')
    <div class="content-custom">
        <h2>{!! trans('app.test1') !!}</h2>
        <p>{!! trans('app.test2') !!}</p>
        <h2>{!! trans('app.test1') !!}</h2>
        <p>{!! trans('app.test2') !!}</p>
        <h2>{!! trans('app.test1') !!}</h2>
        <p>{!! trans('app.test2') !!}</p>
        <h2>{!! trans('app.test1') !!}</h2>
        <p>{!! trans('app.test2') !!}</p>
    </div>
@endsection
