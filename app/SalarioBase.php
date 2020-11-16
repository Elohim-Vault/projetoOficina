<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Funcionario;
use App\SalarioHistorico;

class SalarioBase extends Model
{
    public $primaryKey = 'IdSalario';
    public $timestamps = false;
    protected $table = 'SalarioBase';

    protected $fillable = ['IdSalario', 'IdFuncionario', 'Salario'];

    public function funcionario(){
        return $this->hasOne(Funcionario::class, 'IdFuncionario', 'IdFuncionario');
    }

    public function salarioHistorico(){
        return $this->belongsTo(SalarioHistorico::class, 'IdSalario', 'IdSalario');
    }
}
