<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model{

    protected $table = 'tbl_usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
