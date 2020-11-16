<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SalarioBase;
use App\Endereco;

class Funcionario extends Model
{
    public $primaryKey = 'IdFuncionario';
    public $timestamps = false;

    protected $fillable = ['IdFuncionario', 'Cpf', 'NomeFuncionario', 'Funcao', 'TurnoInicio', 'TurnoFim', 'RG', 'IdEndereco'];

    public function SalarioBase(){
        return $this->belongsTo(SalarioBase::class, 'IdFuncionario', 'IdFuncionario');
    }

    public function Endereco(){
        return $this->hasMany(Endereco::class, 'IdEndereco', 'IdEndereco');
    }

    public function Servicos(){
        return $this->belongsToMany(Funcionario::class, 'servicosfuncionarios', 'IdFuncionario', 'IdServico');
    }
}
