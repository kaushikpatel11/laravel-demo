<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Properties;
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
//$faker = \Faker\Factory::create('es_ES'); // create a Spanish faker

$factory->define(Properties::class, function (Faker $faker) {
    $faker->locale('es_ES');
    $propertyable_types = ['Home', 'Flat' ];
    $key = array_rand( $propertyable_types, 1 );
    switch ( $key ) {
        case 0:
            $propertyable = factory( App\Home::class )->create();
            break;
        case 1:
            $propertyable = factory( App\Flat::class )->create();
            break;
        default:
            $propertyable = factory( App\Home::class )->create();
            break;
    }

    return [
        'id'                      => null,
        'ref'                     => $faker->randomNumber($nbDigits = 9),
        'owner_id'                => null,
        'legal_validator_id'      => '1',
        'commercial_validator_id' => '1',
        'legal_validated'         => now(),
        'commercial_validated'    => now(),
        'operation_type'          => '1',
        'url_image'               => '2',
        'price'                   => $faker->numberBetween( 100000, 300000 ),
        'agency_commissions'      => 3,
        'plf_commissions'         => 3,
        'margin_performance'      => 5,
        'description'             => $faker->text( $maxNbChars = 200 ),
        'distance_airport'        => $faker->numberBetween( 2, 20 ),
        'distance_sea'            => $faker->numberBetween( 2, 20 ),
        'distance_beach'          => $faker->numberBetween( 2, 20 ),
        'distance_city'           => $faker->numberBetween( 2, 20 ),
        'distance_golf'           => $faker->numberBetween( 2, 20 ),
        'propertyable_type'       => 'App\\' . $propertyable_types[ $key ],
        'propertyable_id'         => $propertyable->id,
    ];
});
