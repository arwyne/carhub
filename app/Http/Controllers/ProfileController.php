<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Reservation;
use Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function profileStatus() {
        // $id = Auth::user()->id;
        // $reservation = Reservation::where('user_id', $id)->latest('reservation_created')->first();
        // $car = $reservation->car()->get();

        $user = Auth::user();
        $reservation = $user->reservation()->get()->last();
        $car = $reservation->car()->get()->first();
        $payment_mode = $reservation->payment_mode()->get()->first();
        
        $time = $reservation->pickup_time;
        $pickup_time = Carbon::parse($time)->isoFormat('h:mm a');

        $date1 =  $reservation->pickup_date;
        $pickup_date = Carbon::parse($date1)->isoFormat('MMMM Do YYYY');

        $date2 =  $reservation->return_date;
        $return_date = Carbon::parse($date2)->isoFormat('MMMM Do YYYY');

        if($user->rent_status == 1) { 
            return view('profile.status', compact('user', 'reservation', 'car', 'payment_mode', 'pickup_time', 'pickup_date', 'return_date'));
        } else {
            return redirect('/cars')->with('message', 'You dont have existing Reservation');
        }

    }


    public function profileList() {
        $user = Auth::user();

        $sort = request('sort', 'desc');
        $reservations = $user->reservation()->orderBy('reservation_created', $sort)->get();

        return view('profile.list', compact('reservations', 'sort'));

    }
}
