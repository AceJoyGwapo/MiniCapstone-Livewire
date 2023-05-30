<?php

namespace App\Http\Livewire;

use App\Models\Band;
use App\Models\Booking;
use Livewire\Component;
use App\Models\Feedback;

class GiveFeedback extends Component
{
    public $bandId;
    public $booking_id;
    public $user_id;
    public $band_id;
    public $event_name;
    public $event_location;
    public $event_date;
    public $time_start;
    public $time_end;
    public $event_details;
    public $status;
    public $feedback, $rating;

    public function getBandProperty(){
        return Band::find($this->bandId);
    }

    public function mount()
{
    $this->booking = Booking::find($this->bandId);
    // Check if the booking exists
    if ($this->booking) {
        $this->user_id = $this->booking->user_id;
        $this->band_id = $this->booking->band_id;
        $this->event_name = $this->booking->event_name;
        $this->event_location = $this->booking->event_location;
        $this->event_date = $this->booking->event_date;
        $this->time_start = $this->booking->time_start;
        $this->time_end = $this->booking->time_end;
        $this->event_details = $this->booking->event_details;
        $this->status = $this->booking->status;
    } else {
        // Redirect or handle the case when the booking doesn't exist
        return redirect('/all-bookings')->with('error', 'Booking not found');
    }
}


    public function updateBooking()
{
    $this->validate([
        'event_name' => 'nullable',
        'event_location' => 'nullable',
        'event_date' => 'nullable',
        'time_start' => 'nullable',
        'time_end' => 'nullable',
        'event_details' => 'nullable',
        'rating' => 'nullable',
        'feedback' => 'nullable',
    ]);
    Feedback::create([
        'user_id' => auth()->user()->id,
        'band_id' => $this->bandId,
        'rating' => $this->rating -1,
        'feedback' => $this->feedback,
    ]);
    if ($this->booking) {
        $this->booking->update([
            'user_id' => $this->user_id,
            'band_id' => $this->bandId,
            'event_name' => $this->event_name,
            'event_location' => $this->event_location,
            'event_date' => $this->event_date,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'event_details' => $this->event_details,
            'status' => 'COMPLETED',
        ]);

        return redirect('/bookings');
    }

}

    public function render()
    {
        $bookings = Booking::all();
        return view('livewire.give-feedback', compact('bookings'));
    }
}
