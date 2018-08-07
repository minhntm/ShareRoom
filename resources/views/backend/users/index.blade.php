@extends('layouts.admin-master')
@section('title', trans('app.user-index-title'))
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{!! trans('app.list-user') !!}</h4>
                            <h6 class="card-subtitle">
                                {!! trans('app.user-index-subtitle') !!}
                            </h6>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($users->isEmpty())
                            <p>{!! trans('app.user-empty') !!}</p>
                        @else
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">{!! trans('app.id') !!}</th>
                                        <th scope="col">{!! trans('app.name') !!}</th>
                                        <th scope="col">{!! trans('app.email') !!}</th>
                                        <th scope="col">{!! trans('app.join-at') !!}</th>
                                        <th scope="col">{!! trans('app.action') !!}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{!! $user->id !!}</td>
                                            <td>
                                                <a href="{!! route('admin.user.edit', $user->id) !!}">
                                                    {!! $user->name !!}
                                                </a>
                                            </td>
                                            <td>{!! $user->email !!}</td>
                                            <td>{!! $user->created_at !!}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-2 btn-action">
                                                        {{ Form::open(['method' => 'GET', 'url' => route('admin.user.edit', $user->id)]) }}
                                                        {{ Form::submit('Edit', ['class' => 'btn btn-raised btn-success']) }}
                                                        {{ Form::close() }}
                                                    </div>
                                                    <div class="col-md-2 btn-action">
                                                        {{ Form::open(['method' => 'DELETE', 'url' => route('admin.user.delete', $user->id)]) }}
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
        </div>
    </div>
@endsection
