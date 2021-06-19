<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
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
            ['id' => 1, 'country_id' => 1, 'name' => 'Andalucía'],
            ['id' => 2, 'country_id' => 1, 'name' => 'Aragón'],
            ['id' => 3, 'country_id' => 1, 'name' => 'Canarias'],
            ['id' => 4, 'country_id' => 1, 'name' => 'Cantabria'],
            ['id' => 5, 'country_id' => 1, 'name' => 'Castilla La Mancha'],
            ['id' => 6, 'country_id' => 1, 'name' => 'Castilla y León'],
            ['id' => 7, 'country_id' => 1, 'name' => 'Catalunya'],
            ['id' => 8, 'country_id' => 1, 'name' => 'Ciudad de Ceuta'],
            ['id' => 9, 'country_id' => 1, 'name' => 'Ciudad de Melilla'],
            ['id' => 10, 'country_id' => 1, 'name' => 'Comunidad de Madrid'],
            ['id' => 11, 'country_id' => 1, 'name' => 'Comunidad Foral de Navarra'],
            ['id' => 12, 'country_id' => 1, 'name' => 'Comunitat Valenciana'],
            ['id' => 13, 'country_id' => 1, 'name' => 'Extremadura'],
            ['id' => 14, 'country_id' => 1, 'name' => 'Galicia'],
            ['id' => 15, 'country_id' => 1, 'name' => 'Illes Balears'],
            ['id' => 16, 'country_id' => 1, 'name' => 'La Rioja'],
            ['id' => 17, 'country_id' => 1, 'name' => 'País Vasco'],
            ['id' => 18, 'country_id' => 1, 'name' => 'Principado de Asturias'],
            ['id' => 19, 'country_id' => 1, 'name' => 'Región de Murcia'],
        ];

        DB::table('states')->truncate();
        DB::table('states')->insert($data);
        DB::table('states')->update(['created_at'=>date('Y-m-d H:i:s')]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
