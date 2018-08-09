@extends('layouts.admin-master')
@section('title', trans('app.role-index-title'))
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-5">
                    <h4 class="page-title">{!! trans('app.role-index-title') !!}</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! trans('app.all-role') !!}</h4>
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('role-delete-success'))
                                <div class="alert alert-success">
                                    {{ session('role-delete-success') }}
                                </div>
                            @endif
                            @if($roles->isEmpty())
                                <p>{!! trans('app.role-empty') !!}</p>
                            @else
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{!! trans('app.id') !!}</th>
                                            <th scope="col">{!! trans('app.name') !!}</th>
                                            <th scope="col">{!! trans('app.action') !!}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td>{!! $role->id !!}</td>
                                                <td>{!! $role->name !!}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-2 btn-action">
                                                            {{ Form::open(['method' => 'DELETE', 'url' => route('admin.roles.destroy', $role->id)]) }}
                                                            {{ Form::submit('Delete', ['class' => 'btn btn-raised btn-danger']) }}
                                                            {{ Form::close() }}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            {{ Form::open(['method' => 'POST', 'url' => route('admin.roles.store')]) }}
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                            @if(session('role-exist'))
                                <div class="alert alert-danger">
                                    {{ session('role-exist') }}
                                </div>
                            @elseif(session('create-role-success'))
                                <div class="alert alert-success">
                                    {{ session('create-role-success') }}
                                </div>
                            @endif
                            <h4 class="card-title">{!! trans('app.create-role') !!}</h4>
                            <div class="form-group">
                                {{ Form::text('name', old('name'), ['class' => 'form-control']) }}
                                <br>
                                {{ Form::submit('Create', ['class' => 'btn btn-success']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
