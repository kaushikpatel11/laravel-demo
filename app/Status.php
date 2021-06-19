<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    public function historical(){
        return $this->hasMany('App\HistoricalLine');
    }
}
