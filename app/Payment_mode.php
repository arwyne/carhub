<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_mode extends Model
{
    public function reservation(){
        return $this->hasMany('App\Reservation');
    }
}
