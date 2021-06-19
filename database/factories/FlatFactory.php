<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flat;
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

$factory->define(Flat::class, function (Faker $faker) {
    return [
        'id'                       => null,
        'floor'                    => $faker->randomElement( [ 'Bajo', 'Intermedio', 'Ático' ] ),
        'type'                     => $faker->randomElement( [ 'Piso', 'Dúplex', 'Ático', 'Estudio/loft' ] ),
        'state'                    => $faker->randomElement( [ 'A reformar', 'Buen estado' ] ),
        'built_meters'             => $faker->numberBetween( 70, 300 ),
        'bathrooms'                => $faker->numberBetween( 2, 5 ),
        'bedrooms'                 => $faker->numberBetween( 2, 5 ),
        'facade'                   => $faker->randomElement( [ 'Exterior', 'Interior' ] ),
        'elevator'                 => ( ( rand( 0, 10 ) / 10 ) < 0.5 ) ? true : false,
        'energetic_certification'  => ( ( rand( 0, 10 ) / 10 ) < 0.5 ) ? true : false,
        'characteristics'          => implode( ';', $faker->randomElements( [ 'terraza', 'balcon', 'trastero', 'garaje' ], rand( 1, 4 ) ) ),
        'building_characteristics' => implode( ';', $faker->randomElements( [ 'piscina', 'zona_verde' ], rand( 1, 2 ) ) ),
        'community_fees'           => $faker->numberBetween( 50, 275 ),
    ];
});
