<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imovel extends Model
{
    protected $table = 'imoveis';

    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    //regra para campos obrigatórios
    static $rules_required = [
        'codigo'            =>'required',
        'cpf_cnpj'          =>'required',
        'rua'               =>'required',
        'numero'            =>'required',
        'cep'               =>'required',
        'bairro'            =>'required',
        'cidade'            =>'required',
        'uf'                =>'required',
        'descricao'         =>'required',
        'valor'             =>'required',
        'situacao'          =>'required',
        'id_tipo_imovel'    =>'required',
        'id_empresa'        =>'required'
    ];

    //regra para mínimo de caracteres
    static $rules_size = [
        'cep'               =>'min:5',
        'rua'               =>'min:6',
        'numero'            =>'min:1',
        'bairro'            =>'min:4',
        'cidade'            =>'min:4',
        'uf'                =>'min:2'
    ];

    //regra para tipo do campo
    static $rules_type = [
        'cep'               =>'numeric',
        'numero'            =>'numeric'
    ];

    //regra para cnpj válido
    static $rules_cnpj = [
        'cpf_cnpj'          =>'cnpj'
    ];

    //regra para cpf válido
    static $rules_cpf = [
        'cpf_cnpj'          =>'cpf'
    ];

    //regra para codigo duplicado
    static $rules_duplicatedCode = [
        'codigo'          =>'unique:imoveis,codigo'
    ];

    public function getDisponiveis($param){
        return $this->where('id_empresa', '=', $param)
            ->where('status', '=', NULL)
            ->get();
    }

    public function getReservados($param){
        return $this->where('id_empresa', '=', $param)
            ->where('status', '=', 'RESERVADO')
            ->get();
    }

    public function getVendidos($param){
        return $this->where('id_empresa', '=', $param)
            ->where('status', '=', 'VENDIDO')
            ->get();
    }

    public function getImovel($param){
        return $this->join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
            ->where('imoveis.id_empresa', '=', $param)
            ->select('imoveis.*', 'tipos_imoveis.descricao as nome_tipo')
            ->paginate(1);
    }

    public function getVendedor($param){
        return Cliente::join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $param)
            ->whereIn('clientes.id_tipo_cliente', [1,3])
            ->select('clientes.*')
            ->orderBy('clientes.nome_razao')
            ->get();
    }

    public function getResultadoPesquisa($dados, $empresaUserAtual){
        return $this->join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
            ->where('imoveis.id_empresa', '=', $empresaUserAtual)
            ->where(function($query) use($dados){
                if($dados['codigo']){
                    $query->where('imoveis.codigo', '=', $dados['codigo']);
                }
                if($dados['id_tipo_imovel']){
                    $query->where('imoveis.id_tipo_imovel', '=', $dados['id_tipo_imovel']);
                }
            })
            ->select('imoveis.*', 'tipos_imoveis.descricao as nome_tipo')
            ->paginate(10);
    }

    public function imagens()
    {
        return $this->hasMany('App\Models\ItemImovel', 'id_imovel');
    }

    public function getDadosRelatorio($dadosForm, $empresaAtual){
        return $this->join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
            ->join('clientes', 'imoveis.cpf_cnpj', '=', 'clientes.cpf_cnpj')
            ->where('imoveis.id_empresa', '=', $empresaAtual)
            ->where(function($query) use($dadosForm){
                if($dadosForm['cep']){
                    $query->where('imoveis.cep', '=', $dadosForm['cep']);
                }
                if($dadosForm['id_tipo_imovel']){
                    $query->where('imoveis.id_tipo_imovel', '=', $dadosForm['id_tipo_imovel']);
                }
                if($dadosForm['status']){
                    $query->where('imoveis.status', '=', $dadosForm['status']);
                }
                if($dadosForm['situacao']){
                    $query->where('imoveis.situacao', '=', $dadosForm['situacao']);
                }
                if($dadosForm['data_inicial'] && $dadosForm['data_final']){
                    $query->whereBetween('imoveis.created_at', [$dadosForm['data_inicial'], $dadosForm['data_final']]);
                }
                if($dadosForm['valor_inicial'] && $dadosForm['valor_final']){
                    $query->whereBetween('imoveis.valor', [$dadosForm['valor_inicial'], $dadosForm['valor_final']]);
                }
            })
            ->select('imoveis.*', 'tipos_imoveis.descricao as tipo', 'clientes.nome_razao as vendedor')
            ->orderBy('imoveis.codigo')
            ->get();
    }

}
