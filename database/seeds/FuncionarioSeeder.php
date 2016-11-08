<?php

use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionarios = [
            0   =>  [
                'cpf_cnpj'                  =>  '87501423000173',
                'rg'                        =>  '',
                'nome_razao'                =>  'Wendel M. Gonçalves',
                'nome_fantasia'             =>  'Wendel',
                'data_nascimento'           =>  '2016-09-30',
                'rep_legal'                 =>  'Fulano de Tal',
                'inscricao'                 =>  '312313',
                'creci'                     =>  '22002',
                'telefone'                  =>  '37247083',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'J',
                'id_user'                   =>  '1',
                'id_empresa'                =>  '1',
                'id_cargo'                  =>  '4'
            ],
            1   =>  [
                'cpf_cnpj'                  =>  '41295266857',
                'rg'                        =>  '491723295',
                'nome_razao'                =>  'Taisa Palenciano',
                'nome_fantasia'             =>  '',
                'data_nascimento'           =>  '1993-10-20',
                'rep_legal'                 =>  '',
                'inscricao'                 =>  '',
                'creci'                     =>  '6464',
                'telefone'                  =>  '991765753',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'F',
                'id_user'                   =>  '2',
                'id_empresa'                =>  '1',
                'id_cargo'                  =>  '2'
            ],
            2   =>  [
                'cpf_cnpj'                  =>  '29313585090',
                'rg'                        =>  '333359562',
                'nome_razao'                =>  'Mailson Marques',
                'nome_fantasia'             =>  '',
                'data_nascimento'           =>  '1995-04-20',
                'rep_legal'                 =>  '',
                'inscricao'                 =>  '',
                'creci'                     =>  '1500',
                'telefone'                  =>  '37247083',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'F',
                'id_user'                   =>  '3',
                'id_empresa'                =>  '1',
                'id_cargo'                  =>  '3'
            ],
            3   =>  [
                'cpf_cnpj'                  =>  '21437376000138',
                'rg'                        =>  '',
                'nome_razao'                =>  'Lucas Maximiano',
                'nome_fantasia'             =>  'Maximiano',
                'data_nascimento'           =>  '2014-05-25',
                'rep_legal'                 =>  'Taisa Palenciano',
                'inscricao'                 =>  '4443',
                'creci'                     =>  '1001',
                'telefone'                  =>  '991223467',
                'cep'                       =>  '14405233',
                'rua'                       =>  'Rua Dorivaldo Chioca',
                'numero'                    =>  '2955',
                'bairro'                    =>  'Jardim Luiza II',
                'cidade'                    =>  'Franca',
                'uf'                        =>  'SP',
                'tipo_pessoa'               =>  'J',
                'id_user'                   =>  '4',
                'id_empresa'                =>  '1',
                'id_cargo'                  =>  '3'
            ]

        ];

        DB::table('funcionarios')->insert($funcionarios);
    }
}
