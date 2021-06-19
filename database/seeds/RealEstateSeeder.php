<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('real_estates')->truncate();
        DB::table('real_estates')->insert([
              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 2,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);
        DB::table('real_estates')->insert([
              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 4,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);
        DB::table('real_estates')->insert([
              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 6,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);
        DB::table('real_estates')->insert([
              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 8,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);//4
        DB::table('real_estates')->insert([
              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 9,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);
        DB::table('real_estates')->insert([
              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 10,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);
        DB::table('real_estates')->insert([

              'business_name' => 'Inmobiliaria Costa S.L.',
              'user_id'       => 11,
              'vat_number'    => '48628778W',
              'name'          => 'Inmozon',
              'surname'       => 'nozomni',
              'phone_1'       => '999999999',
              'status'        => 2, // 0=inactive, 1=trial period, 2=validated
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
