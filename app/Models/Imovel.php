<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imovel extends Model
{
    protected $table = 'imoveis';

    Use SoftDeletes;

    protected $dates = ['deleted_at'];



    public function getImovel($param){
        return $this->join('tipos_imoveis', 'imoveis.id_tipo_imovel', '=', 'tipos_imoveis.id')
            ->where('imoveis.id_empresa', '=', $param)
            ->select('imoveis.*', 'tipos_imoveis.descricao')
            ->paginate(1);
    }
}
