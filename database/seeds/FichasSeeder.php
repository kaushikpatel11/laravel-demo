<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FichasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->modify('-1 months');
        //
        DB::table('cards')->delete();
        DB::table('cards')->insert([
            'real_estate_id' => '1',
            'property_id' => '1',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
        DB::table('cards')->insert([
            'real_estate_id' => '1',
            'property_id' => '2',
            'updated_at' => Carbon::now()->modify('-1 months'),
            'created_at' => Carbon::now()->modify('-1 months'),
        ]);
        DB::table('cards')->insert([
            'real_estate_id' => '1',
            'property_id' => '3',
            'updated_at' => Carbon::now()->modify('-2 months'),
            'created_at' => Carbon::now()->modify('-2 months'),
        ]);
        DB::table('cards')->insert([
            'real_estate_id' => '2',
            'property_id' => '1',
            'updated_at' => Carbon::now()->modify('-3 months'),
            'created_at' => Carbon::now()->modify('-3 months'),
        ]);
        DB::table('cards')->insert([
            'real_estate_id' => '2',
            'property_id' => '2',
            'updated_at' => Carbon::now()->modify('-3 months'),
            'created_at' => Carbon::now()->modify('-3 months'),
        ]);
        DB::table('cards')->insert([
            'real_estate_id' => '3',
            'property_id' => '4',
            'updated_at' => Carbon::now()->modify('-2 months'),
            'created_at' => Carbon::now()->modify('-2 months'),
        ]);
    }
}
