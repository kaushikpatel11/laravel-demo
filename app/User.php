<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Admin|null $admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Owner|null $owner
 * @property-read \App\RealEstate|null $real_estate
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable 
{
    //implements MustVerifyEmail
    use Notifiable;

    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
     /*   'name', 'surname', 'address',  'email', 'phone_1',
        'dni', 'rol', 'phone_2'*/
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /////   @TODO RELACION POLMORFICA    /////////
    public function owner(){
        return $this->hasOne('App\Owner', 'user_id');
    }

    public function admin(){
        return $this->hasOne('App\Admin', 'user_id');
    }

    public function real_estate(){
        return $this->hasOne('App\RealEstate', 'user_id');
    }
    /////////////////////////////////////////////

    /**
     * Get the zone records associated with the user.
     *
     * ```
     * Use:
     * $user = App\User::find(1);
     * $user->zones
     *
     * Returns:
     *  Illuminate\Database\Eloquent\Collection {#4170
     *    all: [
     *        App\Zone {#4171
     *          id: 1,
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function zones()
    {
        return $this->hasMany('App\Zone', 'user_id', 'id');
    }

}
