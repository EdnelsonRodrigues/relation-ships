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
}
