<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SalarioBase;

class SalarioHistorico extends Model
{
    public $primaryKey = 'IdSalt';
    public $timestamps = false;
    protected $table = "SalarioHistorico";

    protected $fillable = ['IdSalario', 'HoraExtra', 'Desconto', 'MesAno'];

    public function Funcionario(){
        return $this->hasOne(SalarioBase::class, 'IdSalario', 'IdSalario');
    }
}
