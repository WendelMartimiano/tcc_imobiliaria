<?php

use Illuminate\Database\Seeder;

class OpcoesPlanosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Script de popular a tabela de opções por planos
         */
        $opcoes_planos = [
            0   =>  [
                'id_plano'      =>  1,
                'id_opcao'      =>  1
            ],
            1   =>  [
                'id_plano'      =>  1,
                'id_opcao'      =>  2
            ],
            2   =>  [
                'id_plano'      =>  2,
                'id_opcao'      =>  1
            ],
            3   =>  [
                'id_plano'      =>  2,
                'id_opcao'      =>  2
            ],
            4   =>  [
                'id_plano'      =>  2,
                'id_opcao'      =>  3
            ],
            5   =>  [
                'id_plano'      =>  3,
                'id_opcao'      =>  1
            ],
            6   =>  [
                'id_plano'      =>  3,
                'id_opcao'      =>  2
            ],
            7   =>  [
                'id_plano'      =>  3,
                'id_opcao'      =>  3
            ],
            8   =>  [
                'id_plano'      =>  3,
                'id_opcao'      =>  4
            ],
            9   =>  [
                'id_plano'      =>  3,
                'id_opcao'      =>  5
            ],
            10   =>  [
                'id_plano'      =>  3,
                'id_opcao'      =>  6
            ]
        ];


        DB::table('opcoes_planos')->insert($opcoes_planos);
    }
}
