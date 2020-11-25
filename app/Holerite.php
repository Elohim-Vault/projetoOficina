<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holerite extends Model
{
    protected $primaryKey = 'idHolerite';
    public $timestamps = false;

    protected $fillable = ['dataRecebimento', 'idFuncionario','salario', 'extra'];

    public function Funcionario(){
        return $this->hasOne(Funcionario::class, 'IdFuncionario', 'idFuncionario');
    }

}

