<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Counties.
 * Provincia (spain), Prefectura (france), Condado (uk)
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-17
 */
class County extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'counties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'state_id',
        'name',
    ];

    /**
     * Get the country record associated with the county, provincia.
     *
     * ```
     * Use:
     * $county = App\County::find(37);
     * $county->country->name
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
     * Get the state record associated with the county, provincia.
     *
     * ```
     * Use:
     * $county = App\County::find(37);
     * $county->state->name
     *
     * Returns: Comunitat Valenciana
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function state()
    {
        return $this->hasOne('App\State', 'id', 'state_id');
    }

    /**
     * Get all of the zones/real estates who wants to work for the county. Provincia
     *
     * ```
     * Use:
     * $county = App\County::find(1);
     * $county->zones
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
