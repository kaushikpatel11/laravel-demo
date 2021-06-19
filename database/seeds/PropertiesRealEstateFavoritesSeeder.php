<?php

use Illuminate\Database\Seeder;

class PropertiesRealEstateFavoritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('retail_favorites_properties')->delete();
        DB::table('retail_favorites_properties')->insert([
            'real_estate_id' => '1',
            'property_id' => '1',
            ]);
    }
}
