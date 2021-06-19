<?php

use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('homes')->delete();

        DB::table('homes')->insert([
            'type' => 'Chalet adosado',
            'state' => 'Buen estado',
            'built_meters' => 200,
            'bathrooms' => 2,
            'bedrooms' => 3,
            'energetic_certification' => true,
            'characteristics' => 'terraza;balcon',
            'building_characteristics' => 'piscina',
            'community_fees' => 50,
        ]);
    }
}
