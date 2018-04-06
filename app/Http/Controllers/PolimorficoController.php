<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\Comentario;


class PolimorficoController extends Controller
{
    public function polimorfico() {

    }

    public function polimorficoInsert() { //metodo para inserir dados polimorficos das tabelas relacionadas

        //----------------------------------------------------------------------------------------------

        /*$cidade = Cidade::where('nome', 'Castanhal')->get()->first();

        echo "$cidade->nome";

        //criando um comentario para essa cidade
        $comentario = $cidade->comentarios()->create([// nao esquecer de criar o atributo $fillable na model 
            'descricao' => "Novo Comentario CIDADE $cidade->nome ".date('YmdHis'), //passando um novo cometario usando polimorfismo
            // concatenando o nome da cidade e a data desse coemtario
        ]);
        var_dump($comentario->descricao);*/

        //----------------------------------------------------------------------------------------------

        /*$estado = Estado::where('nome', 'Pará')->get()->first();

        echo "$estado->nome";

        //criando um comentario para esse estado
        $comentario = $estado->comentarios()->create([// nao esquecer de criar o atributo $fillable na model 
            'descricao' => "Novo Comentario ESTADO $estado->nome ".date('YmdHis'), //passando um novo cometario usando polimorfismo
            // concatenando o nome do estado e a data desse coemtario
        ]);
        var_dump($comentario->descricao);*/

        //----------------------------------------------------------------------------------------------

        $pais = Pais::where('nome', 'Brasil')->get()->first();

        echo "$pais->nome";

        //criando um comentario para esse pais
        $comentario = $pais->comentarios()->create([// nao esquecer de criar o atributo $fillable na model 
            'descricao' => "Novo Comentario PAIS $pais->nome ".date('YmdHis'), //passando um novo cometario usando polimorfismo
            // concatenando o nome do pais e a data desse coemtario
        ]);
        var_dump($comentario->descricao);
    }
}
