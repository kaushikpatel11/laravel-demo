<?php

namespace App;

use App\BaseModel;

/**
 * This is the model for Documents attached to a property.
 *
 * @package    App
 * @author     David Cigala
 * @version    0.0.1
 * @since      2020-09-02
 */
class Document extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'documents';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'url',
    ];
    
    /**
     * Get the property associated with a document.
     *
     * ```
     * Use:
     * $data = App\Document::find(15);
     * $data->property
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
