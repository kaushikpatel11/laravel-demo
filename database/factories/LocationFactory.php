<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Location;
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

$factory->define( Location::class, function( Faker $faker ) {
    $faker->locale( 'es_ES' );
    $location = App\City::inRandomOrder()->first();
    return [
        'country_id' => $location->country_id,
        'state_id'   => $location->state_id,
        'county_id'  => $location->county_id,
        'city_id'    => $location->id,
        'street'     => $faker->streetAddress,
        'postcode'   => $faker->postcode,
        'latitude'   => $faker->latitude( $min = 37.07, $max = 42.39 ),
        'longitude'  => $faker->longitude( $min = -6.37, $max = 2.19 ),
        //        42.397539,-6.3704657        41.9206933,2.1912352
        //        37.076025,-6.3921167        37.636871,-0.8925487
    ];
} );
