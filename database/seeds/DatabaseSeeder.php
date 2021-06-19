<?php

use App\HistoricalLine;
use Composer\XdebugHandler\Status;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call (UserSeeder::class);
        //$this->call (AdminSeeder::class);
        $this->call (OwnersSeeder::class);
        $this->call (RealEstateSeeder::class);
        $this->call (StatusSeeder::class);
        $this->call (RatingCommentsSeeder::class);
        //$this->call (PropertiesRealEstateFavoritesSeeder::class);
        $this->call (FlatSeeder::class);
        $this->call (HomeSeeder::class);
        $this->call (HistoricalLineSeeder::class);
        //$this->call (FichasSeeder::class);
        $this->call (ConfigSeeder::class);
        //$this->call (AppointmentSeeder::class);
        //$this->call (RatingsSeeder::class);

        //
        // ZONES, LOCATIONS (GPS)
        // Countries, States, Counties, Cities
        //
        $this->call (CountrySeeder::class);
        $this->call (StateSeeder::class);
        $this->call (CountySeeder::class);
        $this->call (CitySeeder::class);
        //$this->call (StreetSeeder::class);
        $this->call (LocationSeeder::class);
        $this->call (ZoneSeeder::class);
        $this->call (PropertiesSeeder::class);

    }
}
