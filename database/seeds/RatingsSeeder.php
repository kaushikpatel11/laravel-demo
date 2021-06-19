<?php

use Illuminate\Database\Seeder;

class RatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ratings')->delete();
        DB::table('ratings')->insert([
            'card_id' => '1',
            'comment_key' => 'p_profesional;p_presencia',
            'rating' => '5',
            'open_comment' => 'Buen trato y rapidez',
        ]);
        DB::table('ratings')->insert([
            'card_id' => '1',
            'comment_key' => 'p_presencia;p_seriedad',
            'rating' => '4',
            'open_comment' => 'Buena gestion',
        ]);
        DB::table('ratings')->insert([
            'card_id' => '1',
            'comment_key' => 'n_poco_profesional;n_mala_presencia',
            'rating' => '4',
            'open_comment' => 'Estafadores!!',
        ]);
    }
}
