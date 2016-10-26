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

    public function getImovel($param){
        return $this->join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
            ->where('imoveis.id_empresa', '=', $param)
            ->select('imoveis.*', 'tipos_imoveis.descricao as nome_tipo')
            ->paginate(1);
    }

    public function getResultadoPesquisa($dados){
        return $this->join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
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

}
