<?php

namespace App;

use App\BaseModel;

/**
 * App\RealEstate
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Properties[] $fav_properties
 * @property-read int|null $fav_properties_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RealEstate query()
 * @mixin \Eloquent
 */
class RealEstate extends BaseModel
{
    /**
     * Real Estate status constants
     *
     * A real estate has three statuses:
     * 0 = New sign up and it is INACTIVE
     * 1 = A validator enables a TRIAL_PERIOD, the real estate can work with the application, BUT IT CANNOT OPEN A CARD.
     * 2 = After a trail preriod, It has to pay and the status changes to VALIDATED
     *
     * ```
     * Use:
     *      echo \App\RealEstate::VALIDATED;
     * Returns:
     *      2
     *
     * Use:
     *      $realEstate = App\RealEstate::findorFail($id);
     *
     *      if(RealEstate::TRIAL_PERIOD == $realEstate->status) {
     *          //
     *          // actions when the Real Estate is in its trial period
     *          //
     *      }
     * ```
     */
    public const INACTIVE     = 0;
    public const TRIAL_PERIOD = 1;
    public const VALIDATED    = 2;
    
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'real_estates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'web',
        'business_name',
        'commercial_name',
        'vat_number',
        'name',
        'surname',
        'phone_1',
        'phone_2',
        'punctuation',
        'status', // ENUM, 0=inactive, 1=trial period, 2=validated/active
        'origin',
        'language',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function fav_properties()
    {
        return $this->belongsToMany(
            'App\Properties',
            'retail_favorites_properties',
            'real_estate_id',
            'property_id'
        );
    }

    public function averageRating(){
        return $this->ratings()->average('rating');
    }

    public function ficha()
    {
        return $this->belongsToMany(
            'App\Properties',
            'cards',
            'real_estate_id',
            'property_id',
        )->withPivot('id', 'created_at');
    }

    /**
     * Get the location records associated with a property.
     *
     * ```
     * Use:
     * $realstate = App\RealEstate::find(15);
     * $realstate->locations
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Location {#4171
     *          id: 1,
     *
     * ```
     *
     * ```
     * How to save a location associated to a Real Estate (same for Property):
     *
     * $location = new App\Location()   or  $location=App\Location::find(1);
     * $realEstate->save()
     *
     * $location->realEstate()->save($realEstate)
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function locations()
    {
        return $this->morphMany('App\Location', 'locationable');
    }

    /**
     * Get all of the zones what the Real Estate works
     *
     * ```
     * Use:
     * $realestate = App\RealEstate::find(1);
     * $realestate->zones
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Zone {#4171
     *          id: 1,
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function zones()
    {
        return $this->hasMany('App\Zone', 'realestate_id', 'id');
    }

    public function ratings()
    {
        return $this->hasManyThrough(
            'App\Rating',         // Final model
            'App\Ficha',                // Intermediate model
            'real_estate_id',           // Foreign key (to real_estates) on cards table...
            'card_id',                 // Foreign key (to fichas) on ratings table...
            'id',                     // Local key on real_estates table...
            'id'                        // Local key on fichas table...
        );
    }
}
