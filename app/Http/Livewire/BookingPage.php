<?php

namespace App\Http\Livewire;

use App\Models\Band;
use App\Models\Booking;
use Livewire\Component;

class BookingPage extends Component
{

    public $event_name, $event_location, $event_date, $time_start, $time_end, $event_details, $status;

    public $bandName, $rate;
    public $bandId;

    public function mount(){
        $band = Band::find($this->bandId);
        // Check if the band exists
        if ($band) {
            $this->bandName = $band->bandName;
            $this->rate = $band->rate;
        }
    }
    public function store(){
        $this->validate([
            'event_name' => 'required',
            'event_location' => 'required',
            'event_date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'event_details' => 'required',
        ]);

            Booking::create([
                'user_id' => auth()->user()->id,
                'band_id' => $this->bandId,
                'event_name' => $this->event_name,
                'event_location' => $this->event_location,
                'event_date' => $this->event_date,
                'time_start' => $this->time_start,
                'time_end' => $this->time_end,
                'event_details' => $this->event_details,
                'status' => 'PENDING',
            ]);
            return redirect('/booking-request')->with('message', 'Created Successfully');

    }


    public function getBandProperty(){
        return Band::find($this->bandId);
    }
    public function render()
    {
        return view('livewire.booking-page');
    }
}
