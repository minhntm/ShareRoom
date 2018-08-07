@extends('layouts.master')
@section('title', 'Show Image')
@section('content')
    <div class="container content-custom">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">{{ trans('app.image') }}</th>
                    <th scope="col">{{ trans('app.filename') }}</th>
                    <th scope="col">{{ trans('app.resized-filename') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td><img src="{{ URL::asset(config('image.images_url') . '/' . $photo->resized_name) }}" /></td>
                        <td>{{ $photo->filename }}</td>
                        <td>{{ $photo->resized_name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>    
@endsection
