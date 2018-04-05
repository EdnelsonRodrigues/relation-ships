<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    //tarzer todas as empresas da cidade especifica
    public function companhias() {
        // retorna TODAS AS EMPRESAS da determinada cidade
        return $this->belongsToMany(Companhia::class, 'companhia_cidade');
    }
}
