<div>
    <div class="container">
        <h4>Booking Request</h4>
        <div class="mb-3 d-flex justify-content-between">
            <div class="col-md-6">
            <label class="form-label">Band Name</label>
            <input type="text" class="form-control" value="{{ $bandName }}" readonly>

            </div>
            <div class="col-md-6 ms-2">
            <label class="form-label">Talent Fee</label>
            <input type="text" class="form-control" value="{{ $rate }}" readonly>
            </div>
        </div>
        <div class="card shadow-lg p-1 mb-3">
            <form class="m-5" wire:submit.prevent="store">
                @csrf
                <h4>Booking Details</h4>
                <hr>
                <div class="mb-3 d-flex justify-content-between">
                    <div class="col-md-4">
                        <label class="form-label">Event Name</label>
                        <input type="text" class="form-control" wire:model='event_name'>
                        @error('event_name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-4 ms-2">
                        <label class="form-label">Event Location</label>
                        <input type="text" class="form-control" wire:model='event_location'>
                        @error('event_location')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-4 ms-2">
                        <label class="form-label">Event Date</label>
                        <input type="date" class="form-control" wire:model='event_date'>
                        @error('event_date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div class="col-md-6 ms-2">
                        <label class="form-label">Time Start</label>
                        <input type="time" class="form-control" wire:model='time_start'>
                        @error('time_start')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 ms-2">
                        <label class="form-label">Time End</label>
                        <input type="time" class="form-control" wire:model='time_end'>
                        @error('time-end')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <div class="col-md-12 ms-2">
                        <label class="form-label">Event Details</label>
                        <textarea class="form-control" wire:model='event_details'></textarea>
                        @error('event_details')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Send Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
