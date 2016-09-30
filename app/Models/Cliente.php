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
        return $this->where('id_empresa', '=', $param)->paginate(1);
    }
}
