<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function reservation(){
        return $this->hasMany('App\Reservation');
    }
}
