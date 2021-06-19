<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
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

$factory->define(Image::class, function (Faker $faker)   {
    $folder = substr($_SERVER['DOCUMENT_ROOT'] . 'public/' . config( 'inmozon.propertyImages' ),0,-1);
    // Faker generates a random image and copy it to $folder
    // It returns a string ($image) with the full file path and a filename.
    //$image  = $faker->image( $folder,640, 480, 'city' ); // public/upload/images/f0534c04cf42038249704c0332c2b3af.jpg
    $image  = 'public/upload/images/casa_prefabricada.jpg';
    // Remove upload/ from the path returned from Faker to follow our file path structure
    //$folder = substr($image,7); // upload/images/f0534c04cf42038249704c0332c2b3af.jpg
    $folder = 'public/upload/images/casa_prefabricada.jpg';

    return [
        'id'          => null,
        'property_id' => null,
        'url'         => $folder,
    ];
} );
