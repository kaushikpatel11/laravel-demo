<?php

namespace App;

use App\BaseModel;

class Rating extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'ratings';
    
    //
    protected $fillable = ['card_id', 'appointment_id', 'comment_key', 'rating', 'open_comment'];
}
