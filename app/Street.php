<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Streets and Postcodes.
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-20
 */
class Street extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'streets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'state_id',
        'county_id',
        'city_id',
        'postcode',
        'name',
    ];

    /**
     * Get the country record associated with the street.
     *
     * ```
     * Use:
     * $street = App\Street::find(12345);
     * $street->country->name
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
     * Get the state record associated with the street.
     *
     * ```
     * Use:
     * $street = App\Street::find(12345);
     * $street->state->name
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
     * Get the county record associated with the street.
     *
     * ```
     * Use:
     * $street = App\Street::find(12345);
     * $street->county->name
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
     * Get the city record associated with the street.
     *
     * ```
     * Use:
     * $street = App\Street::find(12345);
     * $street->city->name
     *
     * Returns: Elche
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }
}
