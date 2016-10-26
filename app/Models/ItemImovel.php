<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImovel extends Model
{
    protected $table = 'itens_imoveis';

    public function imovel()
    {
        return $this->belongsTo('App\Models\Imovel', 'id_imovel');
    }
}
