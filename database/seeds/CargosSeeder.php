<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            0   =>  [
                'nome'              =>  'MASTER',
                'data_cadastro'     =>  '01082016'
            ],
            1   =>  [
                'nome'              =>  'GERENTE',
                'data_cadastro'     =>  '01082016'
            ],
            2   =>  [
                'nome'              =>  'CORRETOR',
                'data_cadastro'     =>  '01082016'
            ],
            3   =>  [
                'nome'              =>  'AUXILIAR ADMINISTRATIVO',
                'data_cadastro'     =>  '01082016'
            ]
        ];

        DB::table('cargos')->insert($cargos);
    }
}
