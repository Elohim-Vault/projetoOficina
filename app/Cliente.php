<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    public $primaryKey = 'IdCliente';
    public $timestamps = false;

    protected $fillable = ['IdCliente', 'Nome', 'IdEndereco'];

    public function Carros(){
        return $this->belongsTo(Carro::class, 'IdCliente', 'Proprietario');
    }

    public function Endereco(){
        return $this->HasMany(Endereco::class, 'IdEndereco', 'IdEndereco');
    }

    public function Telefones(){
        return $this->belongsTo(Telefone::class, 'IdCliente', 'Cliente');
    }

    public function Juridico(){
        return $this->belongsTo(ClienteJuridico::class, 'IdCliente', 'IdCliente');
    }

    public function Fisico(){
        return $this->belongsTo(ClienteFisico::class, 'IdCliente', 'IdCliente');
    }
}
