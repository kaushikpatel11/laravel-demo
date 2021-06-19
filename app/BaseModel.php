<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BaseModel
 *
 * This is the Base Model to be extended in all the application models.
 *
 * It sets up some common properties as softdeletes, incremmenting, timestamps
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-08-17
 */
class BaseModel extends Model
{
    use SoftDeletes;

    /**
     * The primary key associated with the table.
     * Eloquent will also assume that each table has a primary key column named id.
     * You may define a protected $primaryKey property to override this convention
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * Eloquent assumes that the primary key is an incrementing integer value,
     * which means that by default the primary key will automatically be cast to an int.
     * If you wish to use a non-incrementing or a non-numeric primary key
     * you must set the public $incrementing property on your model to false
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The "type" of the auto-incrementing ID.
     * If your primary key is not an integer, you should set the protected $keyType property on your model to string:
     *
     * @var string
     */
    protected $keyType = 'bigIncrements';

    /**
     * Indicates if the model should be timestamped.
     * Eloquent expects created_at and updated_at columns to exist on your tables.
     * If you do not wish to have these columns automatically managed by Eloquent,
     * set the $timestamps property on your model to false:
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at',
    ];
}
