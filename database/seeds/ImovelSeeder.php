<?php

use Illuminate\Database\Seeder;

class ImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imoveis = [
            0   =>  [
                'codigo'                  =>  '0001',
                'cpf_cnpj'                =>  '87501423000173',
                'rua'                     =>  'Rua Antônio Bernardes Pinto',
                'numero'                  =>  '3804',
                'cep'                     =>  '14405233',
                'bairro'                  =>  'Vila Chico Julho',
                'cidade'                  =>  'Franca',
                'uf'                      =>  'SP',
                'descricao'               =>  'Casa com 2 vagas de garagem, com ampla sala com ar condicionado split, 
                                               escritório, cozinha, área de serviço, área gourmet com banheiro, 
                                               3 suítes e banheiro social. Sistema de segurança com cerca elétrica, 
                                               alarme e monitoramento por câmeras. 
                                               Todos os cômodos contam com armário embutido de primeira qualidade.',
                'valor'                   =>  '520.000',
                'situacao'                =>  'NOVO',
                'status'                  =>  NULL,
                'id_tipo_imovel'          =>  '1',
                'id_empresa'              =>  '1'
            ],
            1   =>  [
                'codigo'                  =>  '0002',
                'cpf_cnpj'                =>  '38251634075',
                'rua'                     =>  'Rua Antônio Bernardes Pinto',
                'numero'                  =>  '3804',
                'cep'                     =>  '14405233',
                'bairro'                  =>  'Vila Chico Julho',
                'cidade'                  =>  'Franca',
                'uf'                      =>  'SP',
                'descricao'               =>  'Casa com 2 vagas de garagem, com ampla sala com ar condicionado split, 
                                               escritório, cozinha, área de serviço, área gourmet com banheiro, 
                                               3 suítes e banheiro social. Sistema de segurança com cerca elétrica, 
                                               alarme e monitoramento por câmeras. 
                                               Todos os cômodos contam com armário embutido de primeira qualidade.',
                'valor'                   =>  '210.000',
                'situacao'                =>  'USADO',
                'status'                  =>  NULL,
                'id_tipo_imovel'          =>  '8',
                'id_empresa'              =>  '1'
            ]

        ];

        DB::table('imoveis')->insert($imoveis);
    }
}
