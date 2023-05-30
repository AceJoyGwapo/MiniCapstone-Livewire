<div>
    <div class="col-md-8 bg-white mx-auto card p-3">
        <h6>Event Performer</h6>
        <div class="card shadow-lg p-2 mb-2">
            <h5 class="card-title">{{$this->band->bandName}}</h5>
            <h5 class="card-title">{{$this->band->genre}}</h5>
        </div>
        <h6>Rate and Feedback</h6>
        <form wire:submit.prevent="updateBooking">
            @csrf
            <div class="star-rating">
                <input type="radio" id="rating1" name="rating" value="1" wire:model="rating">
                <label for="rating1"></label>
                <input type="radio" id="rating2" name="rating" value="2" wire:model="rating">
                <label for="rating2"></label>
                <input type="radio" id="rating3" name="rating" value="3" wire:model="rating">
                <label for="rating3"></label>
                <input type="radio" id="rating4" name="rating" value="4" wire:model="rating">
                <label for="rating4"></label>
                <input type="radio" id="rating5" name="rating" value="5" wire:model="rating">
                <label for="rating5"></label>
              </div>

        <p>Give Feedback:</p>
        <textarea name="feedback" id="" class="form-control mb-2" placeholder="Write your feedback here" wire:model='feedback'></textarea>

    <div class="">
        <button type="submit" class="btn btn-info">Submit</button>
        <a type="button" class="btn btn-secondary" href="{{url('/bookings')}}">Close</a>
    </div>
</form>
</div>
</div>
