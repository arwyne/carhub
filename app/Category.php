<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function car(){
        return $this->hasMany('App\Car');
    }

}
