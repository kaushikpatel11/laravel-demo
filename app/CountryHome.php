<?php

namespace App;

use App\BaseModel;

/**
 * App\CountryHome
 *
 * @property int $id
 * @property int $property_id
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
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereBedrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereBuildingCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereBuiltMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereCommunityFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereEnergeticCertification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereNotBuiltMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome wherePropertiesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryHome whereUsefulMeters($value)
 * @mixin \Eloquent
 */
class CountryHome extends BaseModel
{
    protected $table = 'country_homes';

    protected $fillable = [
        'properties_id', 'state', 'built_meters', 'bathrooms',  'bedrooms',
        'energetic_certification', 'characteristics', 'xml_characteristics', 'building_characteristics', 'community_fees',
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
