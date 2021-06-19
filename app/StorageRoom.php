<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Storage Rooms.
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-27
 */
class StorageRoom extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'storage_rooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
    
    /**
     * Get the property related to this model.
     *
     * ```
     * Use:
     * $storageRoom = App\StorageRoom::find(15);
     * $storageRoom->property
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Property {#4171
     *          id: 1,
     *
     * ```
     *
     * ```
     * How to save a Property associated to a Commercial Property:
     *
     * $property = new App\Properties()   or  $property=App\Properties::find(1);
     * $property->save()
     *
     * $property->storageRoom()->save($storageRoom)
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function property()
    {
        return $this->morphOne('App\Properties', 'propertyable');
    }
}
