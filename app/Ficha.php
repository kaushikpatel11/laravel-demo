<?php

namespace App;

use App\BaseModel;

class Ficha extends BaseModel
{
    /**
     * The table associated with the model.
     * By convention, the "snake case", plural name of the class will be used as the table name
     * unless another name is explicitly specified.
     *
     * @var string
     */
    protected $table = 'cards';

    public function appointment()
    {
        return $this->hasMany('App\Appointment','card_id','id');
    }

}
