<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Conditions
 *
 * @property int $id
 * @property string $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Properties[] $properties
 * @property-read int|null $properties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions query()
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conditions whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Conditions extends Model
{
    //
    protected $table = 'conditions';

    protected $fillable = ['key'];
    
    public function properties(){
        return $this->hasMany('App\Properties');
    }
}
