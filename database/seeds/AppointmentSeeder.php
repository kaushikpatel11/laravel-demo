<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->delete();
        DB::table('appointments')->insert([
            'card_id' => '1',
            'status' => 'Aceptada',
            'date' => Carbon::now(),
            'client_name' => 'German Costa',
            'client_nif' => '48628779E',
        ]);
        DB::table('appointments')->insert([
            'card_id' => '1',
            'status' => 'Aceptada',
            'date' => Carbon::now(),
            'client_name' => 'German Costa',
            'client_nif' => '48628779E',
        ]);
        DB::table('appointments')->insert([
            'card_id' => '2',
            'status' => 'Aceptada',
            'date' => Carbon::now(),
            'client_name' => 'German Costa',
            'client_nif' => '48628779E',
        ]);
    }
}
