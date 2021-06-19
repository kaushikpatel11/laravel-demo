<?php

namespace App;

use App\BaseModel;

/**
 * App\Office
 *
 * @property int $id
 * @property int $property_id
 * @property string $state
 * @property int $built_meters
 * @property int|null $useful_meters
 * @property int|null $minimum_meters
 * @property string $facade
 * @property string $distribution
 * @property int $floors
 * @property int $office_exclusive_use
 * @property int|null $bathrooms
 * @property int $elevator
 * @property int $energetic_certification
 * @property int $garage
 * @property string $airconditioning
 * @property string $security
 * @property string $office_characteristics
 * @property string $building_characteristics
 * @property float $community_fees
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Properties $property
 * @method static \Illuminate\Database\Eloquent\Builder|Office newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Office newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Office query()
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereAirconditioning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereBathrooms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereBuildingCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereBuiltMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereCommunityFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereDistribution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereElevator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereEnergeticCertification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereFacade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereGarage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereMinimumMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereOfficeCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereOfficeExclusiveUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office wherePropertiesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereSecurity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Office whereUsefulMeters($value)
 * @mixin \Eloquent
 */
class Office extends BaseModel
{
    protected $table = 'offices';

    protected $fillable = [
        'state',
        'built_meters',
        'useful_meters',
        'minimum_meters',
        'facade',
        'distribution',
        'floors',
        'office_exclusive_use',
        'bathrooms',
        'elevator',
        'energetic_certification',
        'garage',
        'airconditioning',
        'security',
        'office_characteristics',
        'xml_characteristics',
        'building_characteristics',
        'community_fees',
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
