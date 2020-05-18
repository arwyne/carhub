<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Car;
use App\Payment_mode;
use Session;
use Carbon\Carbon;
use Auth;

class ReservationController extends Controller
{
    // show reservation form
    public function reservationAdd($id)
    {   
        $rent_auth = Auth::user()->rent_status;
        // if rent status == 0 there is no existing reservation
        if($rent_auth == 0) {
            $car = Car::find($id);
            $payment_modes = Payment_mode::all();
            return view('reservation.add', compact('car', 'payment_modes'));
        } else {
            return redirect('/profile/reservation');
        }

    }


    // create session reserve
    public function reservationSave(Request $request)
    {
        $data = $request->validate([
            'car_id' => 'required',
            'pickup_time' => 'required',
            'pickup_date' => 'required|after_or_equal:today',
            'return_date' => 'required|after:pickup_date',
            'payment_mode' => 'required'
        ]);

        $startDate = Carbon::parse($request->pickup_date);
        $endDate = Carbon::parse($request->return_date);
        
        $rent_days = $startDate->diffInDays($endDate);

        $total_price = ($request->rates + $request->withdriver) * $rent_days;

        // $data['rates'] = $request->rates;
        $data['rent_days'] = $rent_days;
        if($request->withdriver) {
            $data['withdriver'] = "w/ Driver";
        }
        $data['total_price'] = $total_price;


        session()->put('reserve', $data);

        return redirect('/reservation');
        
    }


    // show session reserve info
    public function reservationInfo() {
        
        if(Session::get('reserve')) {
            // dd(Session::get('reserve'));
            $data = Session::get('reserve');

            $car = Car::find($data['car_id']);

            $payment_mode = Payment_mode::find($data['payment_mode'])->payment_mode_name;
            $rent_days = $data['rent_days'];
            $total_price = $data['total_price'];
            
            $pickup_time = Carbon::parse($data["pickup_time"])->isoFormat('h:mm a');
            $pickup_date = Carbon::parse($data['pickup_date'])->isoFormat('MMMM Do YYYY');
            $return_date = Carbon::parse($data['return_date'])->isoFormat('MMMM Do YYYY');
            
            if(isset($data['withdriver'])) {
                $withdriver = 'w/ Driver';
                return view('reservation.info', compact('data', 'car', 'pickup_time', 'pickup_date', 'return_date', 'payment_mode', 'rent_days', 'total_price', 'withdriver'));

            } else {
                return view('reservation.info', compact('data', 'car', 'pickup_time', 'pickup_date', 'return_date', 'payment_mode', 'rent_days', 'total_price'));
            }


        } else {
            return redirect('/cars');
        }

    }


    // save session reserve on database
    public function reservationConfirm() {

        if(Session::get('reserve')) {
            $data = Session::get('reserve');
            
            
            $newReservation = new Reservation();
            $newReservation->reference_no = "CRHB".time();
            $newReservation->user_id = Auth::user()->id;
            $newReservation->car_id = $data['car_id'];
            $newReservation->payment_mode_id = $data['payment_mode'];
            $newReservation->total_price = $data['total_price'];
            $newReservation->reservation_created = Carbon::now();
            $newReservation->pickup_time = $data['pickup_time'];
            $newReservation->pickup_date = $data['pickup_date'];
            $newReservation->return_date = $data['return_date'];
            $newReservation->rent_days = $data['rent_days'];
            $newReservation->status_id = 1; // Reserved status when confirmed
            if(isset($data['withdriver'])) {
                $newReservation->withdriver = 1;
            };
            $newReservation->save();
            
            // update rent status of user when confirmed
            $user = Auth::user();
            $user->rent_status = 1;
            $user->save();
    
            Session::forget('reserve');
            return redirect('/profile/reservation')->with('message', "Your reservation was successfully created!");

        } else {
            return redirect('/cars');
        }

    }


    // clear session reserve
    public function reservationClear() {

        Session::forget('reserve');
        return redirect('/cars');
    }


    // cancel resesrvation of user on profile page
    public function reservationCancel($id) {

        $reservation = Reservation::find($id);
        $reservation->delete();

        // update rent status of user when reservation is cancelled
        $user = Auth::user();
        $user->rent_status = 0;
        $user->save();

        return redirect('/cars')->with('message', "Your reservation was successfully cancelled!");
    }

}
