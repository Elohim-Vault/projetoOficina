<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Endereco;

class Cidade extends Model
{
    public $primaryKey = 'IdCidade';
    public $timestamps = false;

    protected $fillable = ['IdCidade', 'Cidade'];

    public function Endereco(){
        return $this->belongsTo(Endereco::class, 'IdCidade', 'CidadeID');
    }
}
