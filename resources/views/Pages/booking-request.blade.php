@extends('layouts.app')

@section('content')

<div class="card mx-auto bg-info" style="width: 25rem;">
    <div class="card-body">
      <h5 class="card-title">Booking Sent</h5>
      <p class="card-text">Your booking has been requested. We will update you once approved.</p>

      <a href="{{ url('/bookings') }}" class="btn btn-success">View Booking</a>
    </div>
  </div>
@endsection
