<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Cliente extends Model
{
    protected $table = 'clientes';

    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];


    //regra para campos obrigatórios do tipo pessoa fisíca
    static $rules_requiredPessoaF = [
        'cpf_cnpj'          =>'required',
        'rg'                =>'required',
        'nome_razao'        =>'required',
        'data_nascimento'   =>'required',
        'telefone'          =>'required',
        'cep'               =>'required',
        'rua'               =>'required',
        'numero'            =>'required',
        'bairro'            =>'required',
        'cidade'            =>'required',
        'uf'                =>'required',
        'tipo_pessoa'       =>'required',
        'id_empresa'        =>'required',
        'id_tipo_cliente'   =>'required'
    ];

    //regra para campos obrigatórios do tipo pessoa jurídica
    static $rules_requiredPessoaJ = [
        'cpf_cnpj'          =>'required',
        'nome_razao'        =>'required',
        'rep_legal'         =>'required',
        'inscricao'         =>'required',
        'data_nascimento'   =>'required',
        'telefone'          =>'required',
        'cep'               =>'required',
        'rua'               =>'required',
        'numero'            =>'required',
        'bairro'            =>'required',
        'cidade'            =>'required',
        'uf'                =>'required',
        'tipo_pessoa'       =>'required',
        'id_empresa'        =>'required',
        'id_tipo_cliente'    =>'required'
    ];

    //regra para mínimo de caracteres
    static $rules_size = [
        'rg'                =>'min:9|max:9',
        'nome_razao'        =>'min:6',
        'telefone'          =>'min:8',
        'inscricao'         =>'min:2',
        'cep'               =>'min:5',
        'rua'               =>'min:6',
        'numero'            =>'min:1',
        'bairro'            =>'min:4',
        'cidade'            =>'min:4',
        'uf'                =>'min:2'
    ];

    //regra para tipo do campo
    static $rules_type = [
        'telefone'          =>'numeric',
        'inscricao'         =>'numeric',
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

    //regra para cpf ou cnpj duplicado
    static $rules_duplicatedCpfCnpj = [
        'cpf_cnpj'          =>'unique:clientes,cpf_cnpj'
    ];

    //regra para rg duplicado
    static $rules_duplicatedRG = [
        'rg'                =>'unique:clientes,rg'
    ];

    public function getCliente($param){
        return $this->join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $param)
            ->select('clientes.*', 'tipos_clientes.descricao')
            ->paginate(5);
    }

    public function getResultadoPesquisa($dados, $empresaUserAtual){
        return $this->join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $empresaUserAtual)
            ->where(function($query) use($dados){
                    if($dados['cpf_cnpj']){
                        $query->where('clientes.cpf_cnpj', '=', $dados['cpf_cnpj']);
                    }
                    if($dados['nome_razao']){
                        $query->where('clientes.nome_razao', 'LIKE', "%{$dados['nome_razao']}%");
                    }
                })
            ->select('clientes.*', 'tipos_clientes.descricao')
            ->paginate(10);
    }

    public function getDadosRelatorio($dadosForm, $empresaAtual){
        return $this->join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $empresaAtual)
            ->where(function($query) use($dadosForm){
                if($dadosForm['cpf_cnpj']){
                    $query->where('clientes.cpf_cnpj', '=', $dadosForm['cpf_cnpj']);
                }
                if($dadosForm['nome_razao']){
                    $query->where('clientes.nome_razao', 'LIKE', "%{$dadosForm['nome_razao']}%");
                }
                if($dadosForm['id_tipo_cliente']){
                    $query->where('clientes.id_tipo_cliente', '=', $dadosForm['id_tipo_cliente']);
                }
                if($dadosForm['tipo_pessoa']){
                    $query->where('clientes.tipo_pessoa', '=', $dadosForm['tipo_pessoa']);
                }
                if($dadosForm['data_inicial'] && $dadosForm['data_final']){
                    $query->whereBetween('clientes.created_at', [$dadosForm['data_inicial'], $dadosForm['data_final']]);
                }
            })
            ->select('clientes.*', 'tipos_clientes.descricao as tipo')
            ->orderBy('clientes.nome_razao')
            ->get();
    }
}