<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servico;

class Produto extends Model{

    public $primaryKey = 'Codigo';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['Codigo', 'Nomeproduto', 'Tipoproduto', 'Marcaproduto', 'Quantidade', 'Valor'];

    public function Servico(){
        return $this->belongsToMany(Servico::class, 'ProdutoServicos', 'IdProduto', 'IdServico');
    }
}

