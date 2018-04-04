<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function pais() {
        return $this->belongsto(Pais::class);
        //return $this->belongsto(Pais::class, 'pais_id', 'id');
    }

    //metodo que retorna as cidades de um determinado estado
    public function cidades() {
        return $this->hasMany(Cidade::class);
    }
}
