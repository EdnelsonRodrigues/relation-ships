<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['descricao'];
    
    public function coment() {
        return $this->morphTo(); //faz o relacionamento polimorfico
    }
}
