@extends('layouts.admin-master')
@section('title', trans('app.dashboard'))
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">{!! trans('app.dashboard') !!}</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {!! trans('app.dashboard-content') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
