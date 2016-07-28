<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Imovel extends Model
{
    protected $table = 'imoveis';

    Use SoftDeletes;

    protected $dates = ['deleted_at'];
}
