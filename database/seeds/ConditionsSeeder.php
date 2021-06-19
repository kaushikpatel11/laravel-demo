<?php

use Illuminate\Database\Seeder;
use App\Conditions;

class ConditionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('conditions')->delete();
        $home_type = new Conditions();
        $home_type->key = "asdasd";
        $home_type->save();
    
    }
}
