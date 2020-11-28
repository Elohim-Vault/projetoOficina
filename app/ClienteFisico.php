<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteFisico extends Model
{

    public $primaryKey = 'IdCliente';
    public $timestamps = false;
    protected $table = 'clientefisico';

    protected $fillable = ['IdCliente', 'Rg', 'Cpf'];


}
