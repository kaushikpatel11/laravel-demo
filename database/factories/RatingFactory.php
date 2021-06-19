<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rating;
use Illuminate\Support\Facades\DB;
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

$factory->define( Rating::class, function( Faker $faker ) {
    $faker->locale( 'es_ES' );
    $comments = DB::table( 'rating_comments' )->inRandomOrder()->pluck( 'key' )->toArray();
    return [
        'card_id'      => null,
        'comment_key'  => implode( ';', $faker->randomElements( $comments, rand(1, 5 ) ) ),
        'rating'       => $faker->numberBetween( 1, 5 ),
        'open_comment' => $faker->realText( $maxNbChars = 200 ),
    ];
} );
