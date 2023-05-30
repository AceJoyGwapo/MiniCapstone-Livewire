<div>
    <div wire:ignore.self class="modal fade modal-md" id="viewBooking{{ $booking->id }}" tabindex="-1"
        aria-labelledby="viewBookingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark border border-dark rounded-3 border-5">
                <div class="modal-body text-white">
                        <h6>Event Performer</h6>
                        <div class="card text-dark shadow-lg mx-auto p-2 mb-3">
                            <h5 class="card-title">{{$booking->band->bandName}}</h5>
                            <h5 class="card-title">{{$booking->band->genre}}</h5>
                        </div>
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
                            <span class="text-{{ $booking->status === 'CANCELLED' ? 'danger' : 'dark' }} fs-6">{{ $booking->status }}</span>
                        </p>
                    <hr>
                    <h5 class="font-a">Details:</h5>
                    <p class="text-center">{{ $booking->event_details }}</p>
                </div>

            </div>
        </div>
    </div>
</div>
