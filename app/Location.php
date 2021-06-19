<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Locations.
 *
 * A zone is the place where a property is located.
 *
 * It has a street name and number, city, county, state, country and GPS position
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.2
 * @since      2020-08-17
 */
class Location extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'locations';

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
        'locationable_id',
        'locationable_type',
        'street',
        'postcode',
        'latitude',
        'longitude',
    ];

    /**
     * Get the country record associated with the zone, comunidad autonoma.
     *
     * ```
     * Use:
     * $zone = App\Location::find(1);
     * $zone->country->name
     *
     * Returns: España
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country()
    {
        return $this->hasOne('App\Country', 'id', 'country_id')->withDefault([
                                                                                 'name' => '',
                                                                             ]);
    }

    /**
     * Get the state record associated with the zone.
     *
     * ```
     * Use:
     * $zone = App\Location::find(1);
     * $zone->state->name
     *
     * Returns: Comunitat Valenciana
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\State', 'id', 'state_id')->withDefault([
                                                                             'name' => '',
                                                                         ]);
    }

    /**
     * Get the county record associated with the zone.
     *
     * ```
     * Use:
     * $zone = App\Location::find(1);
     * $zone->county->name
     *
     * Returns: ALICANTE
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function county()
    {
        return $this->hasOne('App\County', 'id', 'county_id')->withDefault([
                                                                               'name' => '',
                                                                           ]);
    }

    /**
     * Get the city record associated with the zone.
     *
     * ```
     * Use:
     * $zone = App\Location::find(1);
     * $zone->city->name
     *
     * Returns: ALACANT/LICANTE
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city()
    {
        return $this->hasOne('App\City', 'id', 'city_id')->withDefault([
                                                                           'name' => '',
                                                                       ]);
    }


    /**
     * Get the owning locationable model.
     *
     * ```
     * Use:
     * $location = App\Location::find(1);
     * $location->locationable
     *
     * Returns:
     * A Property model or a RealEstate model depending on locationable_type and locationable_id values
     * ```
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function locationable()
    {
        return $this->morphTo();
    }
}
