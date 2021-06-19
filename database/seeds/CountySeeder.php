<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
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
            ['id' => 1, 'country_id' => 1, 'state_id' => 1, 'name' => 'ALMERIA'],
            ['id' => 2, 'country_id' => 1, 'state_id' => 1, 'name' => 'CADIZ'],
            ['id' => 3, 'country_id' => 1, 'state_id' => 1, 'name' => 'CORDOBA'],
            ['id' => 4, 'country_id' => 1, 'state_id' => 1, 'name' => 'GRANADA'],
            ['id' => 5, 'country_id' => 1, 'state_id' => 1, 'name' => 'HUELVA'],
            ['id' => 6, 'country_id' => 1, 'state_id' => 1, 'name' => 'JAEN'],
            ['id' => 7, 'country_id' => 1, 'state_id' => 1, 'name' => 'MALAGA'],
            ['id' => 8, 'country_id' => 1, 'state_id' => 1, 'name' => 'SEVILLA'],
            ['id' => 9, 'country_id' => 1, 'state_id' => 2, 'name' => 'HUESCA'],
            ['id' => 10, 'country_id' => 1, 'state_id' => 2, 'name' => 'TERUEL'],
            ['id' => 11, 'country_id' => 1, 'state_id' => 2, 'name' => 'ZARAGOZA'],
            ['id' => 12, 'country_id' => 1, 'state_id' => 3, 'name' => 'LAS PALMAS'],
            ['id' => 13, 'country_id' => 1, 'state_id' => 3, 'name' => 'SANTA CRUZ DE TENERIFE'],
            ['id' => 14, 'country_id' => 1, 'state_id' => 4, 'name' => 'CANTABRIA'],
            ['id' => 15, 'country_id' => 1, 'state_id' => 5, 'name' => 'ALBACETE'],
            ['id' => 16, 'country_id' => 1, 'state_id' => 5, 'name' => 'CIUDAD REAL'],
            ['id' => 17, 'country_id' => 1, 'state_id' => 5, 'name' => 'CUENCA'],
            ['id' => 18, 'country_id' => 1, 'state_id' => 5, 'name' => 'GUADALAJARA'],
            ['id' => 19, 'country_id' => 1, 'state_id' => 5, 'name' => 'TOLEDO'],
            ['id' => 20, 'country_id' => 1, 'state_id' => 6, 'name' => 'AVILA'],
            ['id' => 21, 'country_id' => 1, 'state_id' => 6, 'name' => 'BURGOS'],
            ['id' => 22, 'country_id' => 1, 'state_id' => 6, 'name' => 'LEON'],
            ['id' => 23, 'country_id' => 1, 'state_id' => 6, 'name' => 'PALENCIA'],
            ['id' => 24, 'country_id' => 1, 'state_id' => 6, 'name' => 'SALAMANCA'],
            ['id' => 25, 'country_id' => 1, 'state_id' => 6, 'name' => 'SEGOVIA'],
            ['id' => 26, 'country_id' => 1, 'state_id' => 6, 'name' => 'SORIA'],
            ['id' => 27, 'country_id' => 1, 'state_id' => 6, 'name' => 'VALLADOLID'],
            ['id' => 28, 'country_id' => 1, 'state_id' => 6, 'name' => 'ZAMORA'],
            ['id' => 29, 'country_id' => 1, 'state_id' => 7, 'name' => 'BARCELONA'],
            ['id' => 30, 'country_id' => 1, 'state_id' => 7, 'name' => 'GIRONA'],
            ['id' => 31, 'country_id' => 1, 'state_id' => 7, 'name' => 'LLEIDA'],
            ['id' => 32, 'country_id' => 1, 'state_id' => 7, 'name' => 'TARRAGONA'],
            ['id' => 33, 'country_id' => 1, 'state_id' => 8, 'name' => 'CEUTA'],
            ['id' => 34, 'country_id' => 1, 'state_id' => 9, 'name' => 'MELILLA'],
            ['id' => 35, 'country_id' => 1, 'state_id' => 10, 'name' => 'MADRID'],
            ['id' => 36, 'country_id' => 1, 'state_id' => 11, 'name' => 'NAVARRA'],
            ['id' => 37, 'country_id' => 1, 'state_id' => 12, 'name' => 'ALICANTE'],
            ['id' => 38, 'country_id' => 1, 'state_id' => 12, 'name' => 'CASTELLON'],
            ['id' => 39, 'country_id' => 1, 'state_id' => 12, 'name' => 'VALENCIA'],
            ['id' => 40, 'country_id' => 1, 'state_id' => 13, 'name' => 'BADAJOZ'],
            ['id' => 41, 'country_id' => 1, 'state_id' => 13, 'name' => 'CACERES'],
            ['id' => 42, 'country_id' => 1, 'state_id' => 14, 'name' => 'A CORUNA'],
            ['id' => 43, 'country_id' => 1, 'state_id' => 14, 'name' => 'LUGO'],
            ['id' => 44, 'country_id' => 1, 'state_id' => 14, 'name' => 'OURENSE'],
            ['id' => 45, 'country_id' => 1, 'state_id' => 14, 'name' => 'PONTEVEDRA'],
            ['id' => 46, 'country_id' => 1, 'state_id' => 15, 'name' => 'BALEARES (ILLES)'],
            ['id' => 47, 'country_id' => 1, 'state_id' => 16, 'name' => 'LA RIOJA'],
            ['id' => 48, 'country_id' => 1, 'state_id' => 17, 'name' => 'ALAVA'],
            ['id' => 49, 'country_id' => 1, 'state_id' => 17, 'name' => 'GUIPUZCOA'],
            ['id' => 50, 'country_id' => 1, 'state_id' => 17, 'name' => 'VIZCAYA'],
            ['id' => 51, 'country_id' => 1, 'state_id' => 18, 'name' => 'ASTURIAS'],
            ['id' => 52, 'country_id' => 1, 'state_id' => 19, 'name' => 'MURCIA'],
        ];

        DB::table('counties')->truncate();
        DB::table('counties')->insert($data);
        DB::table('counties')->update(['created_at'=>date('Y-m-d H:i:s')]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
