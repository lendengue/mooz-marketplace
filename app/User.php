<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

    protected $connection = 'mysql';
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nome',
        'email',
        'senha'
    ];

    protected $hidden = ['senha'];

    public function getAuthIdentifierName(){
        return 'email';
    }

    public function getAuthIdentifier(){
        return $this->attributes[$this->getAuthIdentifierName()];
    }

    public function getAuthPassword(){
        return $this->senha;
    }
}
