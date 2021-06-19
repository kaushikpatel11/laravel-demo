<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricalLine extends Model
{
    //

    

    public function property()
    {
        return $this->belongsTo('App\Properties', 'property_id');
    }
    
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
