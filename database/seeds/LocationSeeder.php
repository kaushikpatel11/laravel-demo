<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $data = [
            ['id' =>  1, 'country_id' => 1, 'state_id' => 12, 'county_id' => 37, 'city_id' => 20971, 'locationable_id' => 1, 'locationable_type' => 'App\Properties', 'street' => 'Jose Cabo Palomares, 42', 'postcode' => '03008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  2, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 1, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  3, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 2, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  4, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 3, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  5, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 4, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  6, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 5, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  7, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 6, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],
            ['id' =>  8, 'country_id' => 1, 'state_id' => 6, 'county_id' => 25, 'city_id' => 14569, 'locationable_id' => 7, 'locationable_type' => 'App\RealEstate', 'street' => 'Inventada, 44', 'postcode' => '12008', 'latitude' => 38.328739, 'longitude' => -0.5164742],

        ];

        DB::table('locations')->truncate();
        DB::table('locations')->insert($data);
        DB::table('locations')->update(['created_at'=>date('Y-m-d H:i:s')]);


        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
