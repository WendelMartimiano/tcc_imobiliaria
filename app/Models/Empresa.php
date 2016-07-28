<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];

    static $rules = [
        'razao_social'      =>'required|min:6',
        'cnpj'              =>'required',
        'inscricao'         =>'required',
        'email'             =>'required|email',
        'cep'               =>'required|min:5',
        'rua'               =>'required|min:6',
        'numero'            =>'required',
        'bairro'            =>'required|min:4',
        'cidade'            =>'required|min:4',
        'uf'                =>'required|min:2',
        'creci'             =>'required',
        'id_plano'          =>'required'
    ];

    static $rules_cnpj = [
        'cnpj'              =>'cnpj'
    ];
}
