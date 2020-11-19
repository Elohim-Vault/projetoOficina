<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servico;

class balancoFinanceiro extends Model
{
    public $primaryKey = 'IdbalancoFinanceiro';
    protected $table = 'balancoFinanceiro';
    public $timestamps = false;

    protected $fillable = ['Valor', 'Justificativa', 'Notafiscal', 'Servico', 'Produto'];

    public function Servico(){
        return $this->hasOne(Servico::class, 'IdServico', 'Servico');
    }

    public function Produto(){
        return $this->hasOne(Produto::class, 'Codigo', 'Produto');
    }

}
