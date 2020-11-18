<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    public $primaryKey = 'IdServico';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = ['IdFuncionario', 'Carro', 'Tiposervico', 'StatusServ', 'DataChegada', 'PrevisãoSaida'];

    public function Carros(){
        return $this->hasOne(Carro::class, 'Idcarro','Carro');
    }

    public function Produtos(){
        return $this->belongsToMany(Produto::class, 'produtoservicos', 'IdServico', 'IdProduto');
    }

    public function Funcionarios(){
            return $this->belongsToMany(Funcionario::class, 'servicosfuncionarios', 'IdServico', 'IdFuncionario');
    }


}
