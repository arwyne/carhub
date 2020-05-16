<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function driver(){
        return $this->belongsTo('App\Driver');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function payment_mode(){
        return $this->belongsTo('App\Payment_mode');
    }
}
