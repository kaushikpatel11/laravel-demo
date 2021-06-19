<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('admins')->truncate();
        DB::table('owners')->truncate();
        DB::table('real_estates')->truncate();
        DB::table('users')->truncate();

        factory(App\User::class, 20)->create()->each(function ($user) {
            // if ('real_estate' == $user->type) {
            //     $user->real_estate()->save( factory( App\RealEstate::class )->make() );
            // }
            if ('admin' == $user->type) {
                $user->admin()->save( factory( App\Admin::class )->make() );
            }
            // if ('owner' == $user->type) {
            //     $user->owner()->save( factory( App\Owner::class )->make() );
            // }
        });

        DB::table('admins')->update(['created_at'=>now()]);
        DB::table('owners')->update(['created_at'=>now()]);
        DB::table('real_estates')->update(['created_at'=>now()]);
        DB::table('users')->update(['created_at'=>now()]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
