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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'car_id' => 'required',
            'pickup_time' => 'required',
            'pickup_date' => 'required',
            'return_date' => 'required',
            'payment_mode' => 'required'
        ]);

        $startDate = Carbon::parse($request->pickup_date);
        $endDate = Carbon::parse($request->return_date);
        
        $rent_days = $startDate->diffInDays($endDate);

        $total_price = ($request->rates + $request->withdriver) * $rent_days;

        $data['rates'] = $request->rates;
        $data['rent_days'] = $rent_days;
        if($request->withdriver) {
            $data['withdriver'] = "w/ Driver";
        }
        $data['total_price'] = $total_price;


        session()->put('reserve', $data);
        // return view('reservation.confirm', compact('viewdata'));

        return redirect('/confirm');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $payment_modes = Payment_mode::all();
        return view('reservation.show', compact('car', 'payment_modes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewConfirm() {

        $data = Session::get('reserve');
        $time = Carbon::parse($data["pickup_time"])->isoFormat('h:mm:ss a');

        return view('reservation.confirm', compact('data', 'time'));

    }

    public function sendConfirm() {
        
        $data = Session::get('reserve');
        // dd($data);

        $newReservation = new Reservation();
        $newReservation->reference_no = "CRHB".time();
        $newReservation->user_id = Auth::user()->id;
        $newReservation->car_id = $data['car_id'];
        $newReservation->payment_mode_id = $data['payment_mode'];
        // $newReservation->total_price = $data['total_price'];
        $newReservation->reservation_created = Carbon::now();
        $newReservation->pickup_time = $data['pickup_time'];
        $newReservation->pickup_date = $data['pickup_date'];
        $newReservation->return_date = $data['return_date'];
        // $newReservation->rent_days = $data['rent_days'];
        $newReservation->status_id = 1; // Reserved status when confirmed

        $newReservation->save();

        return redirect('/cars');

    }

}
