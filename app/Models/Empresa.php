<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    //regra para campos obrigatórios
    static $rules_required = [
        'razao_social'      =>'required',
        'cnpj'              =>'required',
        'inscricao'         =>'required',
        'email'             =>'required',
        'cep'               =>'required',
        'rua'               =>'required',
        'numero'            =>'required',
        'bairro'            =>'required',
        'cidade'            =>'required',
        'uf'                =>'required',
        'creci'             =>'required',
        'id_plano'          =>'required'
    ];

    //regra para mínimo de caracteres
    static $rules_size = [
        'razao_social'      =>'min:6',
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
        'email'             =>'email',
        'cnpj'              =>'numeric',
        'inscricao'         =>'numeric',
        'cep'               =>'numeric',
        'numero'            =>'numeric',
        'creci'             =>'numeric',
    ];

    //regra para cnpj válido
    static $rules_cnpj = [
        'cnpj'              =>'cnpj'
    ];
}
