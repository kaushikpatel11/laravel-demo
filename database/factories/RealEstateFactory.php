<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RealEstate;
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
// $users = App\User::where( 'type', 'real_estate' )->pluck('id')->toArray();

$faker = \Faker\Factory::create('es_ES'); // create a Spanish faker

$factory->define( RealEstate::class, function( Faker $faker ) {
    return [
        'id'            => null,
//        'user_id'       => function() {
//            return App\User::inRandomOrder()->where( 'type', 'real_estate' )->first()->id;
//        },
        'business_name' => $faker->company . ', S.L.',
        'commercial_name' => $faker->company,
        'vat_number'    => 'B12345678', // $faker->vat,  $faker->companyIdNumber, $faker->taxpayerIdentificationNumber
        'name'          => $faker->firstName,
        'surname'       => $faker->lastName,
        'phone_1'       => $faker->phoneNumber,
        'phone_2'       => $faker->phoneNumber,
        'status'        => (string) rand( 0, 2 ), //$faker->numberBetween( 0, 2 ), ENUMS ARE TREATED AS STRINGS
    ];
} );
