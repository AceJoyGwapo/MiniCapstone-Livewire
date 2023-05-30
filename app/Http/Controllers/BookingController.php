<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index($id)
    {
        return view('Pages.booking', compact('id'));
    }

    public function bookingRequest(){
        return view('Pages.booking-request');
    }

    public function bookings(){
        return view('Pages.bookings');
    }
}
