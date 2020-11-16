<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class produtoServico extends Pivot
{
    public $timestamps = false;
    protected $table = 'produtoservicos';
    protected $fillable = ['IdServico', 'IdProduto', 'Quantidade'];
}
