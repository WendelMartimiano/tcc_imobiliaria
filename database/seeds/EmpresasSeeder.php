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
                'razao_social'         =>  'ADP Imobiliária',
                'nome_fantasia'        =>  'ADP',
                'cnpj'                 =>  '34301387000138',
                'inscricao'            =>  '1111111111',
                'email'                =>  'adp@gmail.com',
                'telefone'             =>  '16991765753',
                'cep'                  =>  '14407624',
                'rua'                  =>  'Rua Dorivaldo Chioca',
                'numero'               =>  '2955',
                'bairro'               =>  'Jardim Luiza II',
                'cidade'               =>  'Franca',
                'uf'                   =>  'SP',
                'creci'                =>  '123131',
                'data_confirmacao'     =>  '2016-09-30',
                'id_plano'             =>  '3'
            ],
            1   =>  [
                'razao_social'         =>  'Villa Imóveis LTDA',
                'nome_fantasia'        =>  'Villa Imóveis',
                'cnpj'                 =>  '74058208000106',
                'inscricao'            =>  '1111111111',
                'email'                =>  'vila_imoveis@gamil.com',
                'telefone'             =>  '16991765753',
                'cep'                  =>  '14407624',
                'rua'                  =>  'Rua Dorivaldo Chioca',
                'numero'               =>  '2955',
                'bairro'               =>  'Jardim Luiza II',
                'cidade'               =>  'Franca',
                'uf'                   =>  'SP',
                'creci'                =>  '123131',
                'data_confirmacao'     =>  '2016-09-30',
                'id_plano'             =>  '3'
            ],
            2   =>  [
                'razao_social'         =>  'Espaço Nobre LTDA',
                'nome_fantasia'        =>  'Espaço Nobre',
                'cnpj'                 =>  '66193017000110',
                'inscricao'            =>  '1111111111',
                'email'                =>  'espaco_nobre@gmail.com',
                'telefone'             =>  '16991765753',
                'cep'                  =>  '14407624',
                'rua'                  =>  'Rua Dorivaldo Chioca',
                'numero'               =>  '2955',
                'bairro'               =>  'Jardim Luiza II',
                'cidade'               =>  'Franca',
                'uf'                   =>  'SP',
                'creci'                =>  '123131',
                'data_confirmacao'     =>  NULL,
                'id_plano'             =>  '3'
            ]
        ];

        DB::table('empresas')->insert($empresas);
    }
}
