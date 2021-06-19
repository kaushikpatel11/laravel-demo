<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{

/*

@DCA Consultas SQL para extraer los datos

select count(*) from zipCodes where streetName is null;

update zipCodes
left join cities on zipCodes.cityID = cities.cityID
set zipCodes.city_id=cities.id
where true;


SET @pos := 0;
UPDATE zipCodes SET id = ( SELECT @pos := @pos + 1 ) where true ORDER BY country_id,state_id,county_id,city_id,zipCode,streetName ASC;

UPDATE zipCodes SET streetName = REPLACE(streetName, '[[:space:]]+', ' ') WHERE true;

# ['id' => 1, 'country_id' => 1, 'state_id' => 1, 'county_id' => 1, 'name' => "ABEJUELA"],

SELECT @@secure_file_priv;
select concat('[\'id\' => ',id,', \'country_id\' => ',country_id,', \'state_id\' => ',state_id, ', \'county_id\' => ',county_id, ', \'city_id\' => ',city_id, ', \'postcode\' => \'',zipCode,'\', \'name\' => \'',streetName,'\'],') as seeder from zipCodes where streetName is not null order by id INTO OUTFILE '/var/lib/mysql-files/querydump.csv';

LINUX console:

$ split -l 5000 ~/Downloads/querydump.csv
$ cat start.txt xaa middle.txt xab  middle.txt xac middle.txt xad middle.txt xae middle.txt xaf middle.txt xag middle.txt xah middle.txt xai middle.txt xaj middle.txt xak middle.txt xal middle.txt xam middle.txt xan middle.txt xao middle.txt xap middle.txt xaq middle.txt xar middle.txt xas  middle.txt xat end.txt > StreetSeeder.php
$ cp StreetSeeder.php ~/Projects/inmozon-web/database/seeds/


*/


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $data = [
            ['id' => 1, 'iso' => 'esp', 'name' => 'España'],
        ];

        DB::table('countries')->truncate();
        DB::table('countries')->insert($data);
        DB::table('countries')->update(['created_at'=>date('Y-m-d H:i:s')]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
