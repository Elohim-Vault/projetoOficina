<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servico;

class balancoFinanceiro extends Model
{
    public $primaryKey = 'IdbalancoFinanceiro';
    protected $table = 'balancoFinanceiro';
    public $timestamps = false;

    protected $fillable = ['Valor', 'Justificativa', 'Notafiscal', 'Servico',];

    public function servico(){
        return $this->hasOne(Servico::class, 'Servico', 'IdServico');
    }

}
