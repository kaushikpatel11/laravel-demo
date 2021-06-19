<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 class  Config extends Model
{
    //
    

    public static function open_price(){
        return Config::where('name', '=', 'open_price')->first()->value;
    }
    public static function minimum_commission(){
        return Config::where('name', '=', 'minimum_commission')->first()->value;
    }
    public static function minimum_commission_agente(){
        return Config::where('name', '=', 'minimum_commission_agente')->first()->value;
    }
    public static function subscription_price(){
        return Config::where('name', '=', 'subscription_price')->first()->value;
    }


}
