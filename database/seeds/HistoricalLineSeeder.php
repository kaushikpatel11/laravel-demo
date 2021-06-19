<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class HistoricalLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        DB::table('historical_lines')->truncate();
        DB::table('historical_lines')->insert([
            'status_id' => '1',
            'property_id' => '1',
            'reason' => '',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '3',
            'property_id' => '1',
            'reason' => 'Las fotos no son aptas para la venta',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '4',
            'property_id' => '1',
            'reason' => 'Hemos decidido alquilarla',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '2',
            'property_id' => '1',
            'reason' => '',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '1',
            'property_id' => '2',
            'reason' => '',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '2',
            'property_id' => '3',
            'reason' => '',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '5',
            'property_id' => '3',
            'reason' => '',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
        DB::table('historical_lines')->insert([
            'status_id' => '2',
            'property_id' => '4',
            'reason' => '',
            'updated_at' => Carbon::now(),
            'admin_id' => '1',
        ]);
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
