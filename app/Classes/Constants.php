<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class Constants extends Model
{
    public const sub_types =
    [
        'flat' => ['Piso', 'Ático', 'Dúplex', 'Estudio/loft'],
        'home' => ['Casa o chalet independiente', 'Chalet pareado', 'Chalet adosado']
    ];
/*
    public const filters_subtype =
    [
        'flat' = []
    ]*/
    public const prices = array(10000, 20000, 50000, 100000, 200000, 500000, 1000000);
    public const square_meters = array(50, 100, 150, 200, 250, 300, 350, 500);

}
