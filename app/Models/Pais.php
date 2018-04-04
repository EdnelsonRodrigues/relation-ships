<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //linha onde mudei o nome do banco padrao
    protected $table = 'paises';

    protected $fillable = ['nome'];

    public function localizacao() {
        return $this->hasOne(Localizacao::class); //funcao hasOne retorna o relacionamento um para um
    }

    //metodo no plural porque irá retornar varios estados
    public function estados() {
        return $this->hasMany(Estado::class);//funcao hasOne retorna o relacionamento um para Muitos
        //return $this->hasMany(Estado::class, 'pais_id', 'id');
    }

    //metodo no plural para pegas as cidades pulando os estados
    public function cidades() {
        return $this->hasManyThrough(Cidade::class, Estado::class);
    }
}
