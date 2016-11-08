<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

use Artesaos\Defender\Traits\HasDefender;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, HasDefender;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    Use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'id_empresa'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    //regra para campos obrigatórios
    static $rules_required = [
        'name'                      =>'required',
        'email'                     =>'required',
        'password'                  =>'required',
        'password_confirmation'     =>'required',
        'id_empresa'                =>'required'
    ];

    //regra para mínimo de caracteres
    static $rules_size = [
        'password'                  =>'min:6',
    ];

    //regra para tipo do campo
    static $rules_type = [
        'email'                     =>'email'
    ];

    //regra para registro duplicado
    static $rules_duplicated = [
        'email'                     =>'unique:users,email'
    ];

    //validando a confirmação de senha
    static $rules_confirmation = [
        'password'                  =>'confirmed'
    ];


    public function getUser($param){
        return $this->where('id_empresa', $param)->paginate(5);
    }

    public function getResultadoPesquisa($dados, $empresaUserAtual){
        return $this->where('id_empresa', '=', $empresaUserAtual)
            ->where(function($query) use($dados){
            if($dados['name']){
                $query->where('name', 'LIKE', "%{$dados['name']}%");
            }
            if($dados['email']){
                $query->where('email', 'LIKE', "%{$dados['email']}%");
            }
        })->paginate(10);
    }
}
