<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HistoricalLine;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$faker = \Faker\Factory::create('es_ES'); // create a Spanish faker

$factory->define( HistoricalLine::class, function( Faker $faker ) {
    $status        = App\Status::inRandomOrder()->first();
    $administrator = App\Admin::inRandomOrder()->first();
    
    return [
        'id'          => null,
        'status_id'   => $status->id,
        'property_id' => null,
        'admin_id'    => $administrator->id,
        'reason'      => $faker->text( 200 ),
    
    ];
} );
