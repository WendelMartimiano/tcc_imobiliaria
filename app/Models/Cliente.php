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

    public function getCliente($param){
        return $this->join('tipos_clientes', 'clientes.id_tipo_cliente', '=', 'tipos_clientes.id')
            ->where('clientes.id_empresa', '=', $param)
            ->select('clientes.*', 'tipos_clientes.descricao')
            ->paginate(1);
    }
}
