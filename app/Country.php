<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Countries.
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-17
 */
class Country extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iso',
        'name',
    ];

    /**
     * Get all of the zones/real estates who wants to work for the country.
     *
     * ```
     * Use:
     * $country = App\Country::find(1);
     * $country->zones
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
