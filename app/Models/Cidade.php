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

    //metodo para relacionamento polimorficos
    public function comentarios() {
        return $this->morphMany(Comentario::class, 'coment');//passar a model que tem os comentarios em si, que faz o relacionamento
        //coment e o metodo la na model comentarios onde vai pegas a cidade e fazer o polimorfismo relacionando-a
    }
}
