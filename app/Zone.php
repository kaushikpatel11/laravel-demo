<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Zones.
 * Areas/Places (countries, states, counties, cities) where the Real Estates work or want to work
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-19
 */
class Zone extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'zones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'realestate_id',
        'zoneable_id',
        'zoneable_type',
    ];

    /**
     * Get the owning zoneable model.
     * Area/Place (country, state, county, city) where the Real Estate work or want to work
     *
     * ```
     * Use:
     * $zone = App\Zone::find(1);
     * $zone->zoneable
     *
     * Returns:
     * A Country, State, County, City model depending on zoneable_type and zoneable_id values
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function zoneable()
    {
        return $this->morphTo();
    }

    /**
     * Get the Real Estate related to the zone
     *
     * ```
     * Use:
     * $zone = App\Zone::find(1);
     * $zone->realEstate->business_main
     *
     * Returns: Inmobiliaria del Sur, SL
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realEstate()
    {
        return $this->belongsTo('App\RealEstate', 'realestate_id','id');
    }

}
