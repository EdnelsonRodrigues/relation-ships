<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = ['nome', 'sigla', 'pais_id'];

    public function pais() {
        return $this->belongsto(Pais::class);
        //return $this->belongsto(Pais::class, 'pais_id', 'id');
    }

    //metodo que retorna as cidades de um determinado estado
    public function cidades() {
        return $this->hasMany(Cidade::class);
    }

    //metodo para relacionamento polimorficos
    public function comentarios() {
        return $this->morphMany(Comentario::class, 'coment');//passar a model que tem os comentarios em si, que faz o relacionamento
        //coment e o metodo la na model comentarios onde vai pegas a cidade e fazer o polimorfismo relacionando-a
    }
}
