<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Telefone extends Model
{
    public $primaryKey = 'TelID';
    public $timestamps = false;

    protected $fillable = ['Tipo', 'Numero', 'Cliente'];

    public function Cliente(){
        return $this->hasOne(Cliente::class, 'IdCliente', 'Cliente');
    }
}
