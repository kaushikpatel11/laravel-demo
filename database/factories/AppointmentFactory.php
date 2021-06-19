<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
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

$factory->define(Appointment::class, function (Faker $faker) {
    $faker->locale('es_ES');
    return [
        'card_id'     => null,
        'status'      => 'Aceptada',
        'date'        => $faker->dateTimeBetween('-3 months', '+2 months', 'Europe/Madrid'), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos'),
        'client_name' => $faker->name,
        'client_nif'  => $faker->numerify('########') . strtoupper($faker->randomLetter),
    ];
});
