@extends('layouts.master')

@section('styles')
<script src="{{ asset('/js/app.js') }}" defer></script>
<link rel="stylesheet" type="text/css" href="{{ url('/css/chat.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}"> 
@endsection

@section('content')
<div id="app">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection