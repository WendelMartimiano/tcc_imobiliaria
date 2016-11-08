<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DefenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * GRUPOS DE REGRAS
         */
        $grupoGerente = Defender::createRole('gerente');
        $grupoCorretor = Defender::createRole('corretor');
        $grupoAuxAdm = Defender::createRole('auxiliar_adm');

        /*
         * PERMISSÕES DE ACESSO
         */
        $cadastraUsuario =  Defender::createPermission('create.usuario', 'Cadastrar usuários');
        $visualizaUsuario =  Defender::createPermission('view.usuario', 'Visualizar usuários');
        $editaUsuario =  Defender::createPermission('edit.usuario', 'Editar usuários');
        $deletaUsuario =  Defender::createPermission('delete.usuario', 'Deletar usuários');

        $visualizaImobiliaria =  Defender::createPermission('view.imobiliaria', 'Visualizar imobiliária');

        $visualizaRelatorio =  Defender::createPermission('view.relatorio', 'Visualizar relatório');

        $visualizaContrato =  Defender::createPermission('view.contrato', 'Visualizar contrato');

        $cadastraReserva =  Defender::createPermission('create.reserva', 'Cadastrar reserva');
        $visualizaReserva =  Defender::createPermission('view.reserva', 'Visualizar reserva');
        $deletaReserva =  Defender::createPermission('delete.reserva', 'Deletar reserva');

        $cadastraVenda =  Defender::createPermission('create.venda', 'Cadastrar venda');
        $visualizaVenda =  Defender::createPermission('view.venda', 'Visualizar venda');
        $deletaVenda =  Defender::createPermission('delete.venda', 'Deletar venda');

        $cadastraCliente =  Defender::createPermission('create.cliente', 'Cadastrar cliente');
        $visualizaCliente =  Defender::createPermission('view.cliente', 'Visualizar cliente');
        $editaCliente =  Defender::createPermission('edit.cliente', 'Editar cliente');
        $deletaCliente =  Defender::createPermission('delete.cliente', 'Deletar cliente');

        $cadastraFuncionario =  Defender::createPermission('create.funcionario', 'Cadastrar funcionário');
        $visualizaFuncionario =  Defender::createPermission('view.funcionario', 'Visualizar funcionário');
        $editaFuncionario =  Defender::createPermission('edit.funcionario', 'Editar funcionário');
        $deletaFuncionario =  Defender::createPermission('delete.funcionario', 'Deletar funcionário');

        $cadastraImovel =  Defender::createPermission('create.imovel', 'Cadastrar imóvel');
        $visualizaImovel =  Defender::createPermission('view.imovel', 'Visualizar imóvel');
        $editaImovel =  Defender::createPermission('edit.imovel', 'Editar imóvel');
        $deletaImovel =  Defender::createPermission('delete.imovel', 'Deletar imóvel');



        /*
         * VINCULAR GRUPOS AS PERMISSÕES
         */
        $grupoGerente->attachPermission($cadastraUsuario);
        $grupoGerente->attachPermission($visualizaUsuario);
        $grupoGerente->attachPermission($editaUsuario);
        $grupoGerente->attachPermission($deletaUsuario);
        $grupoGerente->attachPermission($visualizaImobiliaria);
        $grupoGerente->attachPermission($visualizaRelatorio);
        $grupoGerente->attachPermission($visualizaContrato);
        $grupoGerente->attachPermission($cadastraReserva);
        $grupoGerente->attachPermission($visualizaReserva);
        $grupoGerente->attachPermission($deletaReserva);
        $grupoGerente->attachPermission($cadastraVenda);
        $grupoGerente->attachPermission($visualizaVenda);
        $grupoGerente->attachPermission($deletaVenda);
        $grupoGerente->attachPermission($cadastraCliente);
        $grupoGerente->attachPermission($visualizaCliente);
        $grupoGerente->attachPermission($editaCliente);
        $grupoGerente->attachPermission($deletaCliente);
        $grupoGerente->attachPermission($cadastraFuncionario);
        $grupoGerente->attachPermission($visualizaFuncionario);
        $grupoGerente->attachPermission($editaFuncionario);
        $grupoGerente->attachPermission($deletaFuncionario);
        $grupoGerente->attachPermission($cadastraImovel);
        $grupoGerente->attachPermission($visualizaImovel);
        $grupoGerente->attachPermission($editaImovel);
        $grupoGerente->attachPermission($deletaImovel);

        $grupoCorretor->attachPermission($cadastraReserva);
        $grupoCorretor->attachPermission($visualizaReserva);
        $grupoCorretor->attachPermission($deletaReserva);
        $grupoCorretor->attachPermission($visualizaCliente);
        $grupoCorretor->attachPermission($visualizaImovel);

        $grupoAuxAdm->attachPermission($visualizaUsuario);
        $grupoAuxAdm->attachPermission($visualizaImobiliaria);
        $grupoAuxAdm->attachPermission($visualizaRelatorio);
        $grupoAuxAdm->attachPermission($visualizaContrato);
        $grupoAuxAdm->attachPermission($cadastraReserva);
        $grupoAuxAdm->attachPermission($visualizaReserva);
        $grupoAuxAdm->attachPermission($deletaReserva);
        $grupoAuxAdm->attachPermission($cadastraVenda);
        $grupoAuxAdm->attachPermission($visualizaVenda);
        $grupoAuxAdm->attachPermission($deletaVenda);
        $grupoAuxAdm->attachPermission($cadastraCliente);
        $grupoAuxAdm->attachPermission($visualizaCliente);
        $grupoAuxAdm->attachPermission($editaCliente);
        $grupoAuxAdm->attachPermission($deletaCliente);
        $grupoAuxAdm->attachPermission($visualizaFuncionario);
        $grupoAuxAdm->attachPermission($cadastraImovel);
        $grupoAuxAdm->attachPermission($visualizaImovel);
        $grupoAuxAdm->attachPermission($editaImovel);
        $grupoAuxAdm->attachPermission($deletaImovel);

        /*
         * ATRIBUIR USUÁRIO AO GRUPO
         */
        $user1 = User::find(1);
        $user1->attachRole($grupoAuxAdm);

        $user2 = User::find(2);
        $user2->attachRole($grupoGerente);

        $user2 = User::find(3);
        $user2->attachRole($grupoCorretor);

        $user2 = User::find(4);
        $user2->attachRole($grupoCorretor);
    }
}
