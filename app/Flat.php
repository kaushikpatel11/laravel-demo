<?php

namespace App;

use App\BaseModel;

/**
 * App\Flat
 *
 * @property int $id
 * @property int $property_id
 * @property string $floor
 * @property string|null $urbanization
 * @property string $type
 * @property string $state
 * @property float $built_meters
 * @property float|null $useful_meters
 * @property int $bathrooms
 * @property int $bedrooms
 * @property string $facade
 * @property int $elevator
 * @property int $energetic_certification
 * @property string|null $orientation
 * @property string $characteristics
 * @property string $building_characteristics
 * @property float $community_fees
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Properties $property
 * @method static \Illuminate\Database\Eloquent\Builder|Flat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereBuildingCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereBuiltMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereCommunityFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereElevator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereEnergeticCertification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereFacade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat wherePropertiesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereUrbanization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flat whereUsefulMeters($value)
 * @mixin \Eloquent
 */
class Flat extends BaseModel
{
    protected $table = 'flats';

    protected $fillable = [
        'floor', 'urbanization', 'type', 'state', 'bathrooms', 'bedrooms', 'facade', 'elevator',
        'energetic_certification', 'characteristics', 'xml_characteristics', 'building_characteristics', 'community_fees', 'built_meters'
    ];
    
    /**
     * Get the xml_characteristics with the HTML accents and replace semicolons by dots
     *
     * @return string
     */
    public function getXmlCharacteristicsAttribute($value)
    {
        $value = html_entity_decode($value);
        return str_replace(';','. ',$value);
    }
    
    public function property(){
        return $this->morphOne('App\Properties', 'propertyable');
    }
}
