<?php

use Illuminate\Database\Seeder;

class TiposImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_imoveis = [
            0   =>  [
                'descricao'              =>  'CASA'
            ],
            1   =>  [
                'descricao'              =>  'APARTAMENTO'
            ],
            2   =>  [
                'descricao'              =>  'RANCHO'
            ],
            3   =>  [
                'descricao'              =>  'CHÁCARA'
            ],
            4   =>  [
                'descricao'              =>  'TERRENO'
            ],
            5   =>  [
                'descricao'              =>  'EDÍCULA'
            ],
            6   =>  [
                'descricao'              =>  'GALPÃO'
            ],
            7   =>  [
                'descricao'              =>  'COMERCIAL'
            ]
        ];

        DB::table('tipos_imoveis')->insert($tipos_imoveis);
    }
}
