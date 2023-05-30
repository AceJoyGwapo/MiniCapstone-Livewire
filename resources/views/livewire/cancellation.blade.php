<div>
    <div wire:ignore.self class="modal fade modal-md" id="cancelBooking{{ $booking->id }}" tabindex="-1"
        aria-labelledby="cancelBookingLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark border border-dark rounded-3 border-5">
                <div class="modal-body text-white">
                        <h6>Event Performer</h6>
                        <div class="card text-dark shadow-lg mx-auto p-2">
                            <h5 class="card-title">{{$booking->band->band}}</h5>
                            <h5 class="card-title">{{$booking->band->genre}}</h5>
                        </div>
                        <h5 class="card-title">{{$booking->user->name}}</h5>
                          <div class="d-flex justify-content-between">
                              <p>Performer: {{$booking->event_name}}</p>
                              <p>Performer: {{$booking->event_details}}</p>
                          </div>
                          <div class="d-flex justify-content-between">
                              <p>Start: {{$booking->time_start}}</p>
                              <p>End: {{$booking->time_end}}</p>
                          </div>

                          <p>Location: {{$booking->event_location}}</p>
                          <p>STATUS: <span class="text-white fs-6">{{$booking->status}}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" wire:click='updateBooking'>Cancel Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>
