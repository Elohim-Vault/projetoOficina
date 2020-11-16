<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    public $primaryKey = 'IdBairro';
    public $timestamps = false;

    protected $fillable = ['IdBairro', 'Bairro'];

    public function Endereco(){
        return $this->belongsTo(Endereco::class, 'IdBairro','BairroID');
    }
}
