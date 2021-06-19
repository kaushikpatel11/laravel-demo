<?php

namespace App;

use App\BaseModel;

class Image extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'images';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'url',
        'order',
    ];
    
    /**
     * Get the property associated with an image.
     *
     * ```
     * Use:
     * $image = App\Image::find(15);
     * $image->property
     *
     * Returns:
     *        App\Properties {#4171
     *          id: 1,
     *
     * ```
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo('App\Properties', 'property_id','id');
    }
    
}
