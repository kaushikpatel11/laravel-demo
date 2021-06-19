<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Owner
 *
 * @property int                                                             $id
 * @property int                                                             $user_id
 * @property string                                                          $name
 * @property string                                                          $surname
 * @property string                                                          $address
 * @property string                                                          $phone_1
 * @property string                                                          $phone_2
 * @property string                                                          $vat_number
 * @property string                                                          $type
 * @property \Illuminate\Support\Carbon|null                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                 $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Properties[] $properties
 * @property-read int|null                                                   $properties_count
 * @property-read \App\User                                                  $user
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereNif($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePhone1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner wherePhone2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Owner whereUsersId($value)
 * @mixin \Eloquent
 */
class Owner extends Model
{
    //
    protected $table = 'owners';

    protected $fillable = [];

    public function properties()
    {
        return $this->hasMany('App\Properties', 'owner_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get all the appointments of an owner.
     *
     * ```
     * Use:
     * $owner = \App\Owner::find(1);
     * $owner->appointments;            OR
     * $owner->appointments()->get(['appointments.client_name','appointments.client_nif','appointments.status']);
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4187
     *    all: [
     *    App\Ficha {#4188
     *    client_name: "Namreg atsoc",
     *    client_nif: "48628779E",
     *    status: "Aceptada",
     *    laravel_through_key: 1,
     * },
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function appointments()
    {
        // #
        // # HAS MANY THROUGH
        // #
        // SET @owner_id=1;
        // SELECT owners.id,owners.user_id, concat(owners.name, ' ',owners.surname) as name, properties.id, properties.property_type, appointments.id, appointments.client_name, appointments.status  FROM owners
        // LEFT JOIN properties ON owners.id = properties.owner_id
        // LEFT JOIN cards ON cards.property_id = properties.id
        // LEFT JOIN appointments ON cards.id = appointments.card_id
        // WHERE owners.id = @owner_id and appointments.id is not null and cards.id is not null;

        return $this->hasManyThrough(
            'App\Ficha',        // Final model
            'App\Properties',  // Intermediate model
            'owner_id', // Foreign key (to owners) on properties table...
            'property_id', // Foreign key (to properties) on cards table...
            'id', // Local key on owners table...
            'id' // Local key on properties table...
        )->leftJoin('appointments', 'cards.id', '=', 'appointments.card_id')
            ->whereNotNull(['cards.id', 'appointments.id']);
    }


    public function fichas()
    {
        // #
        // # HAS MANY THROUGH
        // #
        // SET @owner_id=1;
        // SELECT owners.id,owners.user_id, concat(owners.name, ' ',owners.surname) as name, properties.id, properties.property_type, appointments.id, appointments.client_name, appointments.status  FROM owners
        // LEFT JOIN properties ON owners.id = properties.owner_id
        // LEFT JOIN fichas ON fichas.property_id = properties.id
        // LEFT JOIN appointments ON fichas.id = appointments.card_id
        // WHERE owners.id = @owner_id and appointments.id is not null and fichas.id is not null;

        return $this->hasManyThrough(
            'App\Ficha',        // Final model
            'App\Properties',  // Intermediate model
            'owner_id', // Foreign key (to owners) on properties table...
            'property_id', // Foreign key (to properties) on fichas table...
            'id', // Local key on owners table...
            'id' // Local key on properties table...
        );
    }

    public function isAgente(){
        return Auth::user()->owner->type == "agente";
    }

    public function isParticular(){
        return Auth::user()->owner->type == "particular";
    }

    public function getMinimumCommission(){
        if($this->isAgente())
            return Config::minimum_commission_agente();
        else
            return Config::minimum_commission();
    }
}
