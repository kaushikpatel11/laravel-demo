<?php

use Illuminate\Database\Seeder;
use App\Home_types;

class Home_TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_types')->delete();
        $home_type = new Home_types();
        $home_type->key = "asdasd";
        $home_type->save();
    
    }
}
