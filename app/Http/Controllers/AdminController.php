<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Reservation;
use App\User;

class AdminController extends Controller
{
    public function assetsList() {
        
        $sort = request('sort', 'desc');

        $cars = Car::orderBy('created_at', $sort)->get();

        return view('admin.list', compact('cars', 'sort'));

    }

    public function dashboard() {

        $registered = User::all()->count();
        $profit = Reservation::all()->sum('total_price');
        $deployed = Reservation::where('status_id', 2)->count();
        $pending = Reservation::where('status_id', 1)->count();
        
        return view('admin.dashboard', compact('registered', 'profit', 'deployed', 'pending'));

    }
}
