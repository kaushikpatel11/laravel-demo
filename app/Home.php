<?php

namespace App;

use App\BaseModel;

/**
 * App\Home
 *
 * @property int $id
 * @property int $property_id
 * @property string $type
 * @property string $state
 * @property int $built_meters
 * @property int|null $useful_meters
 * @property int|null $not_built_meters
 * @property int $bathrooms
 * @property int $bedrooms
 * @property int $energetic_certification
 * @property string|null $orientation
 * @property int|null $floors
 * @property string $characteristics
 * @property string $building_characteristics
 * @property float $community_fees
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Properties $property
 * @method static \Illuminate\Database\Eloquent\Builder|Home newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Home newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Home query()
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBuildingCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereBuiltMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereCommunityFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereEnergeticCertification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereNotBuiltMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home wherePropertiesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Home whereUsefulMeters($value)
 * @mixin \Eloquent
 */
class Home extends BaseModel
{
    protected $table = 'homes';

    protected $fillable = [
        'type', 'state', 'built_meters', 'bathrooms', 'bedrooms',
        'energetic_certification', 'characteristics', 'xml_characteristics', 'building_characteristics',
        'community_fees'
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
    
    public function property()
    {
        return $this->morphOne('App\Properties', 'propertyable');
    }
}
