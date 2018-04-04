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

    //metodo para inserir dados em estados com um pais especifico
    public function oneToManyInsert() {

        //inserindo estados em um determinado pais
        $dados = [
            'nome' => 'Bahia',
            'sigla' => 'BA',
        ];

        //vincular o pais de foi recuperado de id 1
        $pais = Pais::find(3);

        $inserirEstados = $pais->estados()->create($dados);
        var_dump($inserirEstados);
    }

    //metodo para inserir dados em estados com um pais especifico segunda opcao
    public function oneToManyInsertTwo() {

        //inserindo estados em um determinado pais
        $dados = [
            'nome' => 'Bahia',
            'sigla' => 'BA',
            'pais_id' => '3',
        ];

        $inserirEstados = Estado::create($dados);
        var_dump($inserirEstados->nome);
    }

    public function hasManyThrough() {
        $pais = Pais::find(3);
        echo "<strong>$pais->nome:</strong> <br>";

        $cidades = $pais->cidades;

        //loop para exibir as cidades pulando o estado que elas pertencem
        foreach ($cidades as $cidade) {
            echo "$cidade->nome <br>";
        }

        //retorna a quantidade de cidades do pais selecionado de id 3
        echo "<strong>Total de cidades: </strong> {$cidades->count()}";
    }
}
