<?php

namespace App;

use App\BaseModel;

class Appointment extends BaseModel
{

    protected $fillable = ['card_id', 'status', 'date', 'client_name', 'client_nif', 'accomplished'];

    public function ficha()
    {
        return $this->belongsTo('App\Ficha','id','card_id');
    }
}
