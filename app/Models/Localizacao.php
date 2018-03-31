<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    protected $table = 'localizacoes';

    protected $fillable = ['latitude', 'longitude'];

    //retorna o pais que esta relacionado a essa localização
    public function pais() {
        return $this->belongsTo(Pais::class);
    }
}
