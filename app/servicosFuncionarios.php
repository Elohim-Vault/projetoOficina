<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicosFuncionarios extends Model
{
    public $timestamps = false;
    public $table = 'servicosfuncionarios';

    protected $fillable = ['IdFuncionario', 'IdServico'];
}
