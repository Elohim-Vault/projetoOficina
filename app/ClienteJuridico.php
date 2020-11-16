<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteJuridico extends Model
{

    public $primaryKey = 'IdJuridico';
    public $timestamps = false;
    protected $table = 'clientejuridico';

    protected $fillable = ['IdCliente', 'INS', 'CNPJ'];


}
