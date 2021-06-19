<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('flats')->delete();
        DB::table('flats')->insert([
            'floor' => 'Intermedio',
            'type' => 'Dúplex',
            'state' => 'Buen estado',
            'built_meters' => 200,
            'bathrooms' => 2,
            'bedrooms' => 3,
            'facade' => 'Interior',
            'elevator' => true,
            'energetic_certification' => true,
            'characteristics' => 'terraza;balcon',
            'building_characteristics' => 'piscina',
            'community_fees' => 50,
        ]);
        DB::table('flats')->insert([
            'floor' => 'Intermedio',
            'type' => 'Dúplex',
            'state' => 'Buen estado',
            'built_meters' => 200,
            'bathrooms' => 2,
            'bedrooms' => 3,
            'facade' => 'Interior',
            'elevator' => true,
            'energetic_certification' => true,
            'characteristics' => 'terraza;balcon',
            'building_characteristics' => 'piscina',
            'community_fees' => 50,
        ]);
        DB::table('flats')->insert([
            'floor' => 'Intermedio',
            'type' => 'Dúplex',
            'state' => 'Buen estado',
            'built_meters' => 200,
            'bathrooms' => 2,
            'bedrooms' => 3,
            'facade' => 'Interior',
            'elevator' => true,
            'energetic_certification' => true,
            'characteristics' => 'terraza;balcon',
            'building_characteristics' => 'piscina',
            'community_fees' => 50,
        ]);
    }
}
