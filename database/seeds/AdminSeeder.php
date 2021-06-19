<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('owners')->delete();
        $owner = new Admin();
        $owner->user_id = 5;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->type = 'gerencia';
        $owner->save();
        //
        $owner = new Admin();
        $owner->user_id = 15;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->type = 'gerencia';
        $owner->save();
        //
        $owner = new Admin();
        $owner->user_id = 16;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->type = 'gerencia';
        $owner->save();
        //
        $owner = new Admin();
        $owner->user_id = 17;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->type = 'gerencia';
        $owner->save();
        //
    
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    
        DB::table('admins')->truncate();
    
        factory(App\User::class, 50)->create()->each(function ($user) {
            if ('real_estate' == $user->type) {
                $user->real_estate()->save( factory( App\RealEstate::class )->make() );
            }
        });
    
        DB::table('users')->update(['created_at'=>now()]);
    
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    
    }
}
