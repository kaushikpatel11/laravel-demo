<?php

use Illuminate\Database\Seeder;

class TranslationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('translation')->delete();
        DB::table('translation')->insert([
            'key' => 'asdasd',
            'es' => 'easl',
            'en' => 'ddsa',
            'fr' => 'aasd',
        ]);
    }
}
