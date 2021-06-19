<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
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
            ['id' => 1, 'realestate_id' => 1, 'zoneable_id' => 1, 'zoneable_type' => 'App\Country'],
            ['id' => 2, 'realestate_id' => 1, 'zoneable_id' => 14, 'zoneable_type' => 'App\State'],
            ['id' => 3, 'realestate_id' => 1, 'zoneable_id' => 20, 'zoneable_type' => 'App\County'],
            ['id' => 4, 'realestate_id' => 1, 'zoneable_id' => 12345, 'zoneable_type' => 'App\City'],
        ];

        DB::table('zones')->truncate();
        DB::table('zones')->insert($data);
        DB::table('zones')->update(['created_at' => date('Y-m-d H:i:s')]);


        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
