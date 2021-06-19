<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for States.
 * @example Comunidad Autonoma, Estado (usa), Lander (germany), Canton (swiss)
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-17
 */
class State extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
    ];

    /**
     * Get the country record associated with the state, comunidad autonoma.
     *
     * ```
     * Use:
     * $state = App\State::find(15);
     * $state->country->name
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
     * Get all of the zones/real estates who wants to work for the state. Comunidad Autonoma
     *
     * ```
     * Use:
     * $state = App\State::find(1);
     * $state->zones
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
