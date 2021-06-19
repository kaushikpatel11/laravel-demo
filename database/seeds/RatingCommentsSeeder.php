<?php

use Illuminate\Database\Seeder;

class RatingCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rating_comments')->truncate();

        ////////////////////////////////////////////////////
        ////////////////                    ///////////////
        ////////////////        ES          ////////////////
        ////////////////                    ///////////////
        //////////////////////////////////////////////////

        /////// comentarios positivos   /////////////////
        DB::table('rating_comments')->insert([
            'key' => 'p_profesional',
            'es' => 'Muy profesionales',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_presencia',
            'es' => 'buena presencia',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_seriedad',
            'es' => 'Cliente serio y cualificado',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_puntual',
            'es' => 'Puntual en la cita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_previo',
            'es' => 'Buen trabajo previo a la cita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_durante',
            'es' => 'Buen trabajo con el cliente durante la visita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_informacion_previa',
            'es' => 'El cliente disponía de información de la casa previo a la cita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_seguimiento',
            'es' => 'Seguimiento con el cliente y conmigo tras la cita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_informa',
            'es' => 'Me informa de la opinión del cliente tras la cita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_propuesta',
            'es' => 'Presenta propuesta de precio bien argumentada',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'p_consejos',
            'es' => 'Me da consejos para facilitar la venta de mi casa',
        ]);

        ///////////////////     comentarios regulares   //////////////////
        DB::table('rating_comments')->insert([
            'key' => 'r_poca_informacion',
            'es' => 'Cliente comprador pero con poca información sobre la casa',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'r_tarde_con_aviso',
            'es' => 'Llegó tarde a la cita aunque avisa previamente',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'r_falta_con_aviso',
            'es' => 'No se presenta a la cita, pero me avisa previamente',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'r_poco_argumentada',
            'es' => 'Presenta oferta poco argumentada, aunque realista',
        ]);

        ////////////////    comentarios negativos   //////////////
        DB::table('rating_comments')->insert([
            'key' => 'n_poco_profesional',
            'es' => 'Poco profesional',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_mala_presencia',
            'es' => 'Mala presencia/imagen',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_poco_cualificado',
            'es' => 'Cliente poco cualificado y sin interés real de compra',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_tarde_sin_aviso',
            'es' => 'Llegó tarde a la cita sin avisar previamente',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_falta_sin_aviso',
            'es' => 'No se presenta a la cita ni avisa',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_sin_cliente',
            'es' => 'Se presenta a la cita, pero sin cliente',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_no_informa',
            'es' => 'No me informa de nada tras la visita',
        ]);
        DB::table('rating_comments')->insert([
            'key' => 'n_oferta_inaceptable',
            'es' => 'Presenta oferta totalmente inaceptable',
        ]);
    }
}
