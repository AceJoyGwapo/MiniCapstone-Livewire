<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class ViewBookings extends Component
{
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
    public function editBooking(int $booking_id){
        $booking = Booking::find($booking_id);
        if($booking){
            $this->booking_id = $booking->id;
            $this->user_id = $booking->user_id;
            $this->band_id = $booking->band_id;
            $this->event_name = $booking->event_name;
            $this->event_location = $booking->event_location;
            $this->event_date = $booking->event_date;
            $this->time_start = $booking->time_start;
            $this->time_end = $booking->time_end;
            $this->event_details = $booking->event_details;
            $this->status = $booking->status;

        }else{
            return redirect()->to('/');
        }
    }

    public function updateBooking(){
        $this->validate([
            'event_name' => 'nullable',
            'event_location' => 'nullable',
            'event_date' => 'nullable',
            'time_start' => 'nullable',
            'time_end' => 'nullable',
            'event_details' => 'nullable',

        ]);
        $booking = Booking::find($this->id);

        Booking::where('id',$this->booking_id)->update([
            'user_id' => $this->user_id,
            'band_id' => $this->band_id,
            'event_name' => $this->event_name,
            'event_location' => $this->event_location,
            'event_date' => $this->event_date,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'event_details' => $this->event_details,
            'status' => 'CANCELLED',
        ]);


        return redirect('/bookings')->with('message', 'Updated Successfully');
    }

    public function render()
    {
        $bookings = Booking::all();
        $totalBooking = Booking::count();
        $totalApplications = Booking::where('status', '=', 'PENDING')->count();
        $activeBookings = Booking::where('status', '=', 'COMPLETED')->count();
        return view('livewire.view-bookings', compact('totalBooking', 'totalApplications', 'activeBookings', 'bookings'));
    }

}
