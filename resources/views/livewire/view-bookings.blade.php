<div>
    <div class="row d-flex justify-content-between m-2 mb-5">
        <div class="card text-center bg-info text-dark" style="width: 25rem;">
            <div class="card-body">
              <h1 class="card-title">{{$totalBooking}}</h1>
              <h6 class="card-subtitle mb-2 text-body-secondary">Total Bookings</h6>

            </div>
        </div>
        <div class="card text-center bg-info  text-dark" style="width: 25rem;">
            <div class="card-body">
              <h1 class="card-title">{{$totalApplications}}</h1>
              <h6 class="card-subtitle mb-2 text-body-secondary">Total Applications</h6>

            </div>
        </div>
        <div class="card text-center bg-info  text-dark" style="width: 25rem;">
            <div class="card-body">
              <h1 class="card-title">{{$activeBookings}}</h1>
              <h6 class="card-subtitle mb-2 text-body-secondary">Active Bookings</h6>

            </div>
        </div>
    </div>
          <div class="card-body dashboard-tabs p-0">
            <ul class="nav nav-tabs px-4 mb-3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="bookings-tab" data-bs-toggle="tab" href="#bookings" role="tab" aria-controls="bookings" aria-selected="true">Bookings</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" id="applications-tab" data-bs-toggle="tab" href="#applications" role="tab" aria-controls="applications" aria-selected="false">Applications</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="gigPosts-tab" data-bs-toggle="tab" href="#gigPosts" role="tab" aria-controls="gigPosts" aria-selected="false">Gig Posts</a>
              </li>

            </ul>
            <div class="tab-content py-0 px-0">
              <div class="tab-pane fade show active" id="bookings" role="tabpanel" aria-labelledby="bookings-tab">
                <div class="row d-flex justify-content-between m-2 mb-5">
                    @foreach ($bookings as $booking )
                    <div class="card mb-3" style="width: 25rem;" >
                    @include('livewire.booking-view')
                        <div class="card-body" data-bs-toggle="modal"
                        data-bs-target="#viewBooking{{ $booking->id }}">
                          <h5 class="card-title">{{$booking->user->name}}</h5>

                            <div class="d-flex justify-content-between">
                                <p>Performer: {{$booking->event_name}}</p>
                                <p>Date: {{$booking->event_date}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Start: {{$booking->time_start}}</p>
                                <p>End: {{$booking->time_end}}</p>
                            </div>

                            <p>Location: {{$booking->event_location}}</p>

                            <p>STATUS:
                                <span class="text-{{ $booking->status === 'CANCELLED' ? 'danger' : 'info' }} fs-6">{{ $booking->status }}</span>
                            </p>

                        </div>
                        @if ($booking->status == 'PENDING')
                                <div class="d-flex justify-content-end mb-2">
                                    <a class="btn btn-success me-2" href="{{url('feedback', ['feedback' => $booking->id])}}" >Finish</a>
                                    {{-- @include('livewire.feedback') --}}
                                    <button class="btn btn-danger" wire:click='editBooking({{ $booking->id }})' data-bs-toggle="modal"
                                    data-bs-target="#cancelBooking{{ $booking->id }}">Cancel</button>
                                    @include('livewire.cancellation')
                                </div>
                            @endif
                    </div>
                    @endforeach

                </div>
              </div>
            </div>
          </div>
    </div>

