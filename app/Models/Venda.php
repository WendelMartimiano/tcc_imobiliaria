<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $guarded = ['id'];


    public function getClienteComprador($param){
        return Cliente::join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $param)
            ->whereIn('clientes.id_tipo_cliente', [2,3])
            ->select('clientes.*')
            ->orderBy('clientes.nome_razao')
            ->get();
    }

    public function getClienteVendedor($param){
        return Cliente::join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $param)
            ->whereIn('clientes.id_tipo_cliente', [1,3])
            ->select('clientes.*')
            ->orderBy('clientes.nome_razao')
            ->get();
    }

    public function getCorretor($param){
        return Funcionario::join('cargos', 'funcionarios.id_cargo', '=', 'cargos.id')
            ->where('funcionarios.id_empresa', '=', $param)
            ->where('funcionarios.id_cargo', '=', 3)
            ->select('funcionarios.*')
            ->orderBy('funcionarios.nome_razao')
            ->get();
    }

    public function getImovel($param){
        return Imovel::where('id_empresa', '=', $param)
            ->orderBy('codigo')
            ->get();
    }
}
