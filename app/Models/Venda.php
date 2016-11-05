<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model
{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];


    //regra para campos obrigatórios
    static $rules_required = [
        'comprador'                 =>'required',
        'vendedor'                  =>'required',
        'corretor'                  =>'required',
        'id_imovel'                 =>'required',
        'id_tipo_contrato'          =>'required',
        'id_empresa'                =>'required'
    ];


    public function getVenda($param){
        return $this->join('imoveis', 'vendas.id_imovel', '=', 'imoveis.id')
            ->where('vendas.id_empresa', '=', $param)
            ->select('vendas.*', 'imoveis.codigo')
            ->orderBy('vendas.id')
            ->paginate(1);
    }

    public function getComprador($param){
        return Cliente::join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $param)
            ->whereIn('clientes.id_tipo_cliente', [2,3])
            ->select('clientes.*')
            ->orderBy('clientes.nome_razao')
            ->get();
    }

    public function getVendedor($param){
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
            ->where('status', null)
            ->orderBy('codigo')
            ->get();
    }

    public function getDadosImobiliaria($param){
        return Empresa::where('id', '=', $param)->get();
    }

    public function getDadosCliente($param){
        return Cliente::where('cpf_cnpj', '=', $param)->get();
    }

    public function getDadosCorretor($param){
        return Funcionario::where('cpf_cnpj', '=', $param)->get();
    }

    public function getDadosImovel($param){
        return Imovel::join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
            ->where('imoveis.id', '=', $param)
            ->select('imoveis.*', 'tipos_imoveis.descricao as tipo')
            ->get();
    }

    public function getResultadoPesquisa($dadosForm, $empresaUserAtual){
        return $this->where('id_empresa', '=', $empresaUserAtual)
            ->where(function($query) use($dadosForm){
            if($dadosForm['id']){
                $query->where('id', '=', "{$dadosForm['id']}");
            }
            if($dadosForm['vendedor']){
                $query->where('vendedor', '=', "{$dadosForm['vendedor']}");
            }
        })->paginate(10);
    }
}
