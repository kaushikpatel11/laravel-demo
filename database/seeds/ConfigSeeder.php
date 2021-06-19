<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('configs')->delete();
        DB::table('configs')->insert([
            'name' => 'open_price',
            'value' => '3',
        ]);
        DB::table('configs')->insert([
            'name' => 'minimum_commission',
            'value' => '3',
        ]);
        DB::table('configs')->insert([
            'name' => 'minimum_commission_agente',
            'value' => '2',
        ]);
        DB::table('configs')->insert([
            'name' => 'subscription_price',
            'value' => '50',
        ]);
    }
}
