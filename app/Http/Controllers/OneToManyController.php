<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Estado;

class OneToManyController extends Controller
{
    public function oneToMany() {

        $pesquisa = 'a';

        //$pais = Pais::where('nome', 'Brasil')->get()->first(); //tras umunico pais com seus estados
        $paises = Pais::where('nome', 'LIKE', "%$pesquisa%")->with('estados')->get(); //with pega a relaçao dos estados vicunlado e um pais da lista

        //dd($paises);

        foreach ($paises as $pais) { //lista de paises
            echo "<strong>$pais->nome</strong>";

            $estados = $pais->estados/*()->where('sigla', 'PA')*//*->get()*/;

            foreach ($estados as $estado) { //lista de estados
                echo "<br> $estado->sigla - $estado->nome";
            }

            echo "<hr>";
        }
    }

    public function manyToOne() {
        $estadoNome = 'Estado TEste';
        $estado = Estado::where('nome', $estadoNome)->get()->first();

        echo "<strong>$estado->nome</strong>";

        $pais = $estado->pais;// pega o metodo criado na model estado para retornar seu pais
        echo "<br> Pais: $pais->nome";
    }

    public function oneToManyTwo() {

        $pesquisa = 'a';

        //$pais = Pais::where('nome', 'Brasil')->get()->first(); //tras umunico pais com seus estados
        $paises = Pais::where('nome', 'LIKE', "%$pesquisa%")->with('estados')->get(); //with pega a relaçao dos estados vicunlado e um pais da lista

        //dd($paises);

        foreach ($paises as $pais) { //lista de paises
            echo "<strong>$pais->nome</strong>";

            $estados = $pais->estados/*()->where('sigla', 'PA')*//*->get()*/;

            //loop para exibir os estados de um determinado pais
            foreach ($estados as $estado) { //lista de estados
                echo "<br> $estado->sigla - $estado->nome:";

                foreach ($estado->cidades as $cidade) {
                    echo " <i>$cidade->nome,</i> ";
                }
            }

            echo "<hr>";
        }
    }
}
