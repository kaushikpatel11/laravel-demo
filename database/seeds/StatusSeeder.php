<?php

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        DB::table('statuses')->truncate();
        DB::table('statuses')->insert([
            'name' => 'Sin revisar',
            ]);
        DB::table('statuses')->insert([
            'name' => 'Activa',
            ]);
        DB::table('statuses')->insert([
            'name' => 'Cancelada',
            ]);
        DB::table('statuses')->insert([
            'name' => 'Desactivada',
            ]);
        DB::table('statuses')->insert([
            'name' => 'En proceso inmozon',
            ]);
        DB::table('statuses')->insert([
            'name' => 'En proceso propietario',
            ]);
        DB::table('statuses')->insert([
            'name' => 'Vendida',
            ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
