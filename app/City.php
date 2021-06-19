<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Cities.
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-17
 */
class City extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'state_id',
        'county_id',
        'name',
    ];

    /**
     * Get the country record associated with the city.
     *
     * ```
     * Use:
     * $city = App\City::find(12345);
     * $city->country->name
     *
     * Returns: España
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }

    /**
     * Get the state record associated with the city.
     *
     * ```
     * Use:
     * $city = App\City::find(12345);
     * $city->state->name
     *
     * Returns: Castilla y León
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\State', 'id', 'state_id');
    }

    /**
     * Get the county record associated with the city.
     *
     * ```
     * Use:
     * $city = App\City::find(12345);
     * $city->county->name
     *
     * Returns: LEON
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function county()
    {
        return $this->hasOne('App\County', 'id', 'county_id');
    }

    /**
     * Get all of the zones/real estates who wants to work for the city.
     *
     * ```
     * Use:
     * $city = App\City::find(1);
     * $city->zones
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
        return $this->morphMany('App\Zone', 'zoneable');
    }

}
