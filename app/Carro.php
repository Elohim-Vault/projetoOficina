<?php

namespace App;
use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public $primaryKey = 'Idcarro';
    public $timestamps = false;

    protected $fillable = ['Proprietario', 'Placa', 'Cor', 'Modelo',];

    public function servico(){
        return $this->belongsTo('App/Servico');
    }

    public function Proprietario(){
        return $this->hasOne(Cliente::class, 'IdCliente', 'Proprietario');
    }
}
