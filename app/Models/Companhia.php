<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companhia extends Model
{
    //tarzer todas as cidades da companhia especifica
    public function cidades() {
        // retorna TODAS AS CIDADES da determinada companhia
        return $this->belongsToMany(Cidade::class, 'companhia_cidade');
    }
}
