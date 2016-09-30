<?php

use Illuminate\Database\Seeder;

class TiposClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_clientes = [
            0   =>  [
                'descricao'              =>  'VENDEDOR'
            ],
            1   =>  [
                'descricao'              =>  'COMPRADOR'
            ],
            2   =>  [
                'descricao'              =>  'VENDEDOR E COMPRADOR'
            ]
        ];

        DB::table('tipos_clientes')->insert($tipos_clientes);
    }
}
