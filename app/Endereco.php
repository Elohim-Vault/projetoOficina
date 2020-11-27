<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\Bairro;
use App\Cidade;
use App\Funcionario;

class Endereco extends Model
{
    public $primaryKey = 'IdEndereco';
    public $timestamps = false;

    protected $fillable = ['IdEndereco', 'CEP', 'Cliente', 'Logradouro', 'Numero', 'BairroID', 'CidadeID'];

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function Funcionario(){
        return $this->belongsTo(Funcionario::class);
    }

    public function Bairro(){
        return $this->hasOne(Bairro::class, 'IdBairro', 'BairroID');
    }

    public function Cidade(){
        return $this->hasOne(Cidade::class, 'IdCidade', 'CidadeID');
    }

}
