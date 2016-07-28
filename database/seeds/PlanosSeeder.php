<?php

use Illuminate\Database\Seeder;

class PlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Script de popular a tabela de planos
         */

        $planos = [
            0   =>  [
                'nome'      =>  'STARTER',
                'valor'     =>  'FREE',
                'descricao' =>  'Plano inicial'
            ],
            1   =>  [
                'nome'      =>  'STANDARD',
                'valor'     =>  '59,90',
                'descricao' =>  'Plano padrão'
            ],
            2   =>  [
                'nome'      =>  'PREMIUM',
                'valor'     =>  '109,90',
                'descricao' =>  'Plano completo'
            ]
        ];


        DB::table('planos')->insert($planos);
    }
}
