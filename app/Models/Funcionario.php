<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Funcionario extends Model
{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    //regra para campos obrigatórios do tipo pessoa fisíca
    static $rules_requiredPessoaF = [
        'cpf_cnpj'          =>'required',
        'rg'                =>'required',
        'nome_razao'        =>'required',
        'data_nascimento'   =>'required',        
        'creci'             =>'required',
        'telefone'          =>'required',
        'cep'               =>'required',
        'rua'               =>'required',
        'numero'            =>'required',
        'bairro'            =>'required',
        'cidade'            =>'required',
        'uf'                =>'required',
        'tipo_pessoa'       =>'required',
        'id_user'           =>'required',
        'id_empresa'        =>'required',
        'id_cargo'          =>'required'
    ];

    //regra para campos obrigatórios do tipo pessoa jurídica
    static $rules_requiredPessoaJ = [
        'cpf_cnpj'          =>'required',       
        'nome_razao'        =>'required',
        'rep_legal'         =>'required',
        'inscricao'         =>'required',
        'data_nascimento'   =>'required',
        'creci'             =>'required',
        'telefone'          =>'required',
        'cep'               =>'required',
        'rua'               =>'required',
        'numero'            =>'required',
        'bairro'            =>'required',
        'cidade'            =>'required',
        'uf'                =>'required',
        'tipo_pessoa'       =>'required',
        'id_user'           =>'required',
        'id_empresa'        =>'required',
        'id_cargo'          =>'required'
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
        'uf'                =>'min:2',
        'creci'             =>'min:2'
    ];

    //regra para tipo do campo
    static $rules_type = [
        'telefone'          =>'numeric',
        'inscricao'         =>'numeric',
        'cep'               =>'numeric',
        'numero'            =>'numeric',
        'creci'             =>'numeric'
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
        'cpf_cnpj'          =>'unique:funcionarios,cpf_cnpj'
    ];

   //regra para rg duplicado
    static $rules_duplicatedRG = [
        'rg'                =>'unique:funcionarios,rg'
    ];

   //regra para usuário duplicado
    static $rules_duplicatedUser = [
        'id_user'          =>'unique:funcionarios,id_user'
    ];



    public function getUser($param){
        return User::all()->where('id_empresa', $param);
    }

    public function getFuncionario($param){
        return $this->where('id_empresa', $param)->paginate(1);
    }

    public function getTotalFuncionario($param){
        return $this->where('id_empresa', $param)->get();
    }

    public function getResultadoPesquisa($dados){
        return $this->where(function($query) use($dados){
            if($dados['cpf_cnpj']){
                $query->where('cpf_cnpj', '=', "%{$dados['cpf_cnpj']}%");
            }
            if($dados['nome_razao']){
                $query->where('nome_razao', 'LIKE', "%{$dados['nome_razao']}%");
            }
        })->paginate(10);
    }

    public function getDadosRelatorio($dadosForm, $empresaAtual){
        return $this->join('cargos', 'funcionarios.id_cargo', '=', 'cargos.id')
            ->where('funcionarios.id_empresa', '=', $empresaAtual)
            ->where(function($query) use($dadosForm){
                if($dadosForm['cpf_cnpj']){
                    $query->where('funcionarios.cpf_cnpj', '=', $dadosForm['cpf_cnpj']);
                }
                if($dadosForm['nome_razao']){
                    $query->where('funcionarios.nome_razao', 'LIKE', "%{$dadosForm['nome_razao']}%");
                }
                if($dadosForm['id_cargo']){
                    $query->where('funcionarios.id_cargo', '=', $dadosForm['id_cargo']);
                }
                if($dadosForm['tipo_pessoa']){
                    $query->where('funcionarios.tipo_pessoa', '=', $dadosForm['tipo_pessoa']);
                }
                if($dadosForm['situacao'] && $dadosForm['situacao'] == 'ATIVO'){
                    $query->whereNull('funcionarios.deleted_at');
                }
                if($dadosForm['situacao'] && $dadosForm['situacao'] == 'DEMITIDO'){
                    $query->whereNotNull('funcionarios.deleted_at');
                }
                if($dadosForm['data_inicial'] && $dadosForm['data_final']){
                    $query->whereBetween('funcionarios.created_at', [$dadosForm['data_inicial'], $dadosForm['data_final']]);
                }
            })
            ->select('funcionarios.*', 'cargos.nome as funcao')
            ->orderBy('funcionarios.nome_razao')
            ->get();
    }
}
