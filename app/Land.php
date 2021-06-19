<?php

namespace App;

use App\BaseModel;

/**
 * App\Land
 *
 * @property int $id
 * @property int $property_id
 * @property string $type
 * @property int $meters
 * @property int $buildable_meters
 * @property int $minimum_meters
 * @property string|null $calification
 * @property int $maximum_buildable_floors
 * @property int $acceso_rodado
 * @property string|null $distance_to_city
 * @property string $characteristics
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Properties $property
 * @method static \Illuminate\Database\Eloquent\Builder|Land newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Land newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Land query()
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereAccesoRodado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereBuildableMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereCalification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereCharacteristics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereDistanceToCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereMaximumBuildableFloors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereMinimumMeters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land wherePropertiesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Land whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Land extends BaseModel
{
    protected $table = 'lands';

    protected $fillable = [
        'type',
        'meters',
        'buildable_meters',
        'minimum_meters',
        'calification',
        'maximum_buildable_floors',
        'acceso_rodado',
        'distance_to_city',
        'land_characteristics',
        'xml_characteristics',
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
