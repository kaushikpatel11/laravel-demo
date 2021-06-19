<?php

use Illuminate\Database\Seeder;
use App\Owner;
use Illuminate\Support\Facades\DB;


class OwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('owners')->delete();
        $owner = new Owner();
        $owner->user_id = 1;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->vat_number = '48628775Q';
        $owner->type = 'particular';
        $owner->save();*/
        //
        $owner = new Owner();
        $owner->user_id = 3;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->vat_number = '48628775Q';
        $owner->type = 'particular';
        $owner->save();
        //
        $owner = new Owner();
        $owner->user_id = 12;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->vat_number = '48628775Q';
        $owner->type = 'particular';
        $owner->save();
        //
        $owner = new Owner();
        $owner->user_id = 13;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->vat_number = '48628775Q';
        $owner->type = 'particular';
        $owner->save();
        //
        $owner = new Owner();
        $owner->user_id = 14;
        $owner->name = 'german';
        $owner->surname = 'costa';
        $owner->address = 'calle ejemplo';
        $owner->phone_1 = '999999999';
        $owner->phone_2 = '999999999';
        $owner->vat_number = '48628775Q';
        $owner->type = 'particular';
        $owner->save();
        //
    }
}
