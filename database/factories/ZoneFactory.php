<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Zone;
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


$factory->define( Zone::class, function( Faker $faker ) {
    $faker->locale( 'es_ES' );
    $zoneableable_types = [ 'Country', 'State', 'County', 'City' ];
    $key                = array_rand( $zoneableable_types, 1 );
    
    $location = null;
    switch ( $key ) {
        case 0:
            $location = App\Country::inRandomOrder()->first();
            break;
        case 1:
            $location = App\State::inRandomOrder()->first();
            break;
        case 2:
            $location = App\County::inRandomOrder()->first();
            break;
        case 3:
            $location = App\City::inRandomOrder()->first();
            break;
        default:
            $location = App\City::inRandomOrder()->first();
            break;
    }
    return [
        'realestate_id' => null,
        'zoneable_type' => 'App\\' . $zoneableable_types[ $key ],
        'zoneable_id'   => $location->id,
    ];
} );
