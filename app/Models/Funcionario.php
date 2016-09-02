<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionario extends Model
{
    Use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id'];


    public function getUser($param){
        return User::all()->where('id_empresa', $param);
    }

    public function getFuncionario($param){
        return $this->all()->where('id_empresa', $param);
    }
}
