<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientes = [
            0   =>  [
                'cpf_cnpj'                  =>  '87501423000173',
                'rg'                        =>  '',
                'nome_razao'                =>  'ADP Imobiliária',
                'nome_fantasia'             =>  'ADP',
                'data_nascimento'           =>  '2016-09-30',
                'rep_legal'                 =>  'Wendel M. Gonçalves',
                'inscricao'                 =>  '312313',
                'telefone'                  =>  '37247083',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'J',
                'id_tipo_cliente'           =>  '3',
                'id_empresa'                =>  '1'
            ],
            1   =>  [
                'cpf_cnpj'                  =>  '41295266857',
                'rg'                        =>  '491723295',
                'nome_razao'                =>  'Wendel M. Gonçalves',
                'nome_fantasia'             =>  '',
                'data_nascimento'           =>  '1993-10-20',
                'rep_legal'                 =>  '',
                'inscricao'                 =>  '',
                'telefone'                  =>  '991765753',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'F',
                'id_tipo_cliente'           =>  '2',
                'id_empresa'                =>  '1'
            ],
            2   =>  [
                'cpf_cnpj'                  =>  '38251634075',
                'rg'                        =>  '439739123',
                'nome_razao'                =>  'Taisa Palenciano',
                'nome_fantasia'             =>  '',
                'data_nascimento'           =>  '1990-09-11',
                'rep_legal'                 =>  '',
                'inscricao'                 =>  '',
                'telefone'                  =>  '37246766',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'F',
                'id_tipo_cliente'           =>  '1',
                'id_empresa'                =>  '1'
            ],
            3   =>  [
                'cpf_cnpj'                  =>  '38639319000134',
                'rg'                        =>  '',
                'nome_razao'                =>  'Viviane Design de Interiores',
                'nome_fantasia'             =>  'Vivi Interiores',
                'data_nascimento'           =>  '1997-05-20',
                'rep_legal'                 =>  'Dedé Colezionne',
                'inscricao'                 =>  '312313',
                'telefone'                  =>  '37247083',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'J',
                'id_tipo_cliente'           =>  '3',
                'id_empresa'                =>  '1'
            ],
            4   =>  [
                'cpf_cnpj'                  =>  '63766198009',
                'rg'                        =>  '291348026',
                'nome_razao'                =>  'Mailson Marques',
                'nome_fantasia'             =>  '',
                'data_nascimento'           =>  '1980-03-22',
                'rep_legal'                 =>  '',
                'inscricao'                 =>  '',
                'telefone'                  =>  '37246766',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'F',
                'id_tipo_cliente'           =>  '1',
                'id_empresa'                =>  '1'
            ]

        ];

        DB::table('clientes')->insert($clientes);
    }
}
