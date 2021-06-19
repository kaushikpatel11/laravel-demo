<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    
    protected $fillable = [
        'promotion_name', 'promotion_property_types', 'promotion_price_min',
        'promotion_price_max', 'promotion_meters_min', 'promotion_meters_max',
        'promotion_bathrooms_min', 'promotion_bathrooms_max', 'promotion_bedrooms_min',
        'promotion_bedrooms_max', 'promotion_agency_commissions', 'promotion_rappel',
        'promotion_delivery_date', 'promotion_description', 'promotion_characteristics',
        'promotion_dropbox', 'promotion_web', 'promotion_other'
    ];

    //
    public function property(){
        return $this->morphOne('App\Properties', 'propertyable');
    }

    public function getPromotionDeliveryDateAttribute($value){
        return Carbon::createFromFormat('Y-m-d', $value)->format('d-m-Y');
    }
}
