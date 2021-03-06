<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Car;
use App\Payment_mode;
use App\Status;
use Carbon\Carbon;

use DB;

class TransactionController extends Controller
{
    public function transactionList() {

        // $reservations = Reservation::latest()->get();

        $sort = request('sort', 'desc');

        $reservations = Reservation::orderBy('reservation_created', $sort)->get();

        return view('transactions.list', compact('reservations', 'sort'));

    }


    public function transactionDelete($id) {
        
        $reservation = Reservation::find($id);
        
        $user = $reservation->user()->first();
        $user->rent_status = 0;
        $user->update();
        $reservation->delete();

        alert()->success('Deleted Successfully');
        return redirect('/transactions');

    }


    public function transactionDeploy($id) {
        
        $reservation = Reservation::find($id);
        $car = $reservation->car()->first();

        // decrement quantity of cars
        if($car->quantity >= 1) {
            $car->quantity --;
            $car->update();

            $reservation->status_id = 2;
            $reservation->update();
            alert()->success('Deployed Successfully!');
            return redirect()->back()->with('message', "Deployed Successfully");

        } else {
            alert()->error("There is no available $car->model");
            return redirect()->back();
        }
        
        // decrement quantity of cars when deployed
        

    }


    public function transactionReturn($id) {

        $reservation = Reservation::find($id);
        $reservation->status_id = 3;
        $reservation->update();

        // increment quantity of cars when returned
        $car = $reservation->car()->first();
        $car->quantity ++;
        $car->update();

        // update rent status of user
        $user = $reservation->user()->first();
        $user->rent_status = 0;
        $user->update();
        alert()->success('Transaction Completed!');
        return redirect()->back();

    }


    public function transactionInfo($id) {

        $reservation = Reservation::find($id);

        return view('transactions.info', compact('reservation'));
    }

    public function transactionEdit($id) {

        $reservation = Reservation::find($id);
        $payment_modes = Payment_mode::all();
        $statuses = Status::all();
        $car = $reservation->car()->first();
        
        return view('transactions.edit', compact('reservation', 'car', 'payment_modes', 'statuses'));

    }


    public function transactionUpdate(Request $request, $id) {

        $data = $request->validate([
            'car_id' => 'required',
            'pickup_time' => 'required',
            'pickup_date' => 'required',
            'return_date' => 'required|after:pickup_date',
            'payment_mode_id' => 'required',
            'status_id' => 'required'
        ]);

        $startDate = Carbon::parse($request->pickup_date);
        $endDate = Carbon::parse($request->return_date);
        
        $rent_days = $startDate->diffInDays($endDate);

        $total_price = ($request->rates + $request->withdriver) * $rent_days;

        $updateReservation = Reservation::find($id);
        $updateReservation->car_id = $request->car_id;
        $updateReservation->pickup_time = $request->pickup_time;
        $updateReservation->pickup_date = $request->pickup_date;
        $updateReservation->return_date = $request->return_date;
        $updateReservation->payment_mode_id = $request->payment_mode_id;
        $updateReservation->status_id = $request->status_id;
        $updateReservation->rent_days = $rent_days;
        $updateReservation->total_price = $total_price;
        // dd(isset($request->withdriver) == 1);
        

        if($request->withdriver == "2000"){
            $request->withdriver = 1;
            $updateReservation->withdriver = $request->withdriver;
        } else {
            $request->withdriver = 0;
            $updateReservation->withdriver = $request->withdriver;
        }

        $updateReservation->save();
        alert()->success('Updated Successfully');
        return redirect('/transactions');
        
    }

}
