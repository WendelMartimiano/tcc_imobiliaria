<?php

use Illuminate\Database\Seeder;

class OpcoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Script de popular tabela de opções de menu
         */

        $opcoes = [
            0   =>  [
                'nome'          =>  'Imóveis',
                'uri'           =>  NULL,
                'action'        =>  NULL,
                'controller'    =>  NULL,
                'apelido'       =>  'Controle de Imóveis',
                'id_pai'        =>  NULL
            ],
            1   =>  [
                'nome'          =>  'Usuários',
                'uri'           =>  NULL,
                'action'        =>  NULL,
                'controller'    =>  NULL,
                'apelido'       =>  'Controle de Usuários',
                'id_pai'        =>  NULL
            ],
            2   =>  [
                'nome'          =>  'Clientes',
                'uri'           =>  NULL,
                'action'        =>  NULL,
                'controller'    =>  NULL,
                'apelido'       =>  'Controle de Clientes',
                'id_pai'        =>  NULL
            ],
            3   =>  [
                'nome'          =>  'Funcionários',
                'uri'           =>  NULL,
                'action'        =>  NULL,
                'controller'    =>  NULL,
                'apelido'       =>  'Controle de Funcionários',
                'id_pai'        =>  NULL
            ],
            4   =>  [
                'nome'          =>  'Agendamentos',
                'uri'           =>  NULL,
                'action'        =>  NULL,
                'controller'    =>  NULL,
                'apelido'       =>  'Controle de Agendamentos',
                'id_pai'        =>  NULL
            ],
            5   =>  [
                'nome'          =>  'Permissões',
                'uri'           =>  NULL,
                'action'        =>  NULL,
                'controller'    =>  NULL,
                'apelido'       =>  'Controle de Acesso',
                'id_pai'        =>  NULL
            ]
        ];

        DB::table('opcoes_menus')->insert($opcoes);
    }
}
