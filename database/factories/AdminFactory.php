<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
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

$factory->define(Admin::class, function (Faker $faker) {
    $faker->locale('es_ES');

    return [
        'id'            => null,
//        'user_id'       => function() {
//            return App\User::inRandomOrder()->where( 'type', 'admin' )->first()->id;
//        },
        'name'          => 'Admin',
        'surname'       => 'Admin',
        'address'       => $faker->address,
        'phone_1'       => $faker->phoneNumber,
        'phone_2'       => $faker->phoneNumber,
        'type'          => 'gerencia'
    ];

});
