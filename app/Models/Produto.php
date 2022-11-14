<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model{

    protected $table = 'tbl_produto';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
