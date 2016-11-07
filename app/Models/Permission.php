<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function cargos(){
        return $this->belongsToMany(Cargo::class, 'permission_cargo', 'id_permission', 'id_cargo');
    }
}
