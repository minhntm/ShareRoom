@extends('layouts.master')
@section('content')
    <!-- Main title -->
    <div class="main-title">
        <h1>Your Reservations</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            @each('reservations.item', $reservations, 'reservation')
        </div>
    </div>
@endsection
