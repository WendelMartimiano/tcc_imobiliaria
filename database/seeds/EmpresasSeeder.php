<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresas = [
            0   =>  [
                'razao_social'         =>  'Wendel & Taisa - Agência de Desenvolvimento',
                'nome_fantasia'        =>  'EndSystem',
                'cnpj'                 =>  '34301387000138',
                'inscricao'            =>  '1111111111',
                'email'                =>  'endsystem@outlook.com',
                'telefone'             =>  '16991765753',
                'cep'                  =>  '14407624',
                'rua'                  =>  'Rua Dorivaldo Chioca',
                'numero'               =>  '2955',
                'bairro'               =>  'Jardim Luiza II',
                'cidade'               =>  'Franca',
                'uf'                   =>  'SP',
                'creci'                =>  '123131',
                'id_plano'             =>  '3',
                'data_confirmacao'     =>  '2016-09-30'
            ]
        ];

        DB::table('empresas')->insert($empresas);
    }
}
