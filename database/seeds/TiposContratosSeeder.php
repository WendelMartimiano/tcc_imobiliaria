<?php

use Illuminate\Database\Seeder;

class TiposContratosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_contratos = [
            0   =>  [
                'descricao'              =>  'RESERVA'
            ],
            1   =>  [
                'descricao'              =>  'VENDA'
            ]
        ];

        DB::table('tipos_contratos')->insert($tipos_contratos);
    }
}
