<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('properties')->truncate();
        DB::table('locations')->truncate();
        DB::table('zones')->truncate();
        DB::table('retail_favorites_properties')->truncate();
        DB::table('historical_lines')->truncate();
        DB::table('images')->truncate();
        DB::table('cards')->truncate();
        DB::table('appointments')->truncate();
        DB::table('ratings')->truncate();
        DB::table('homes')->truncate();
        DB::table('flats')->truncate();
        exec('rm ./public/upload/images/*.jpg');

        // Create 3 properties by owner
        // Create the attached location
        // Create the attached images
        $owners = \App\Owner::all();
        foreach ( $owners as $owner ) {
            for($i=0; $i<3; $i++ ) {
                $property = null;
                $property = $owner->properties()->save( factory( App\Properties::class )->make() );
                $property->location()->save(factory(App\Location::class)->make());
                for($a=0; $a<5; $a++ ) {
                    $property->images()->create( factory( App\Image::class )->make()->toArray() );
                }

// Historical lines are automatically created when create a property but with admin_id and description to NULL
// Ahead we will truncate all of them and create new ones with data.
//                $property->historical()->save( factory( App\HistoricalLine::class )->make() );
            }
        }
        $owners = null;
        $property = null;

        // Create Real Estate favorites.
        // Create Real Estate cards.
        // All Real Estates have between 1 and 10 favorites.
        $realEstates = \App\RealEstate::all();
        foreach ( $realEstates as $realEstate ) {
            for($i=0; $i<rand(2,10); $i++ ) {
                $realEstate->locations()->save(factory(App\Location::class)->make());
                $realEstate->zones()->save(factory(App\Zone::class)->make());
            }
            $properties = App\Properties::inRandomOrder()->limit(rand(1, 10))->get();
            $properties->each(function ($property, $key) use ($realEstate) {
                $realEstate->fav_properties()->save($property);
                $realEstate->ficha()->save($property);
            });
        }
        $realEstates = null;
        $properties = null;

        // From every card, generate appointments.
        // From every card, generate ratings.
        $cards = \App\Ficha::all();
        foreach ($cards as $card) {
            for($i=0; $i<rand(1,7); $i++ ) {
                $card->appointment()->save(factory(App\Appointment::class)->make());
                factory(App\Rating::class)->create(['card_id' => $card->id]);
            }
        }
        $cards = null;

        // Create Real Estate historical lines.
        // WITH DATA, NOT NULL
        DB::table('historical_lines')->truncate();
        $properties = App\Properties::all();
        foreach ( $properties as $property ) {
            for($i=0; $i<rand(1,7); $i++ ) {
                $property->historical()->save(factory(App\HistoricalLine::class)->make());
            }
        }
        $properties = null;

        DB::table('properties')->update(['created_at'=>now()]);
        DB::table('locations')->update(['created_at'=>now()]);
        DB::table('zones')->update(['created_at'=>now()]);
        DB::table('retail_favorites_properties')->update(['created_at'=>now()]);
        DB::table('historical_lines')->update(['created_at'=>now()]);
        DB::table('images')->update(['created_at'=>now()]);
        DB::table('cards')->update(['created_at'=>now()]);
        DB::table('appointments')->update(['created_at'=>now()]);
        DB::table('ratings')->update(['created_at'=>now()]);
        DB::table('homes')->update(['created_at'=>now()]);
        DB::table('flats')->update(['created_at'=>now()]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
