<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Companhia;


class ManyToManyController extends Controller
{
    public function manyToMany() {
        $cidade = Cidade::where('nome', 'Castanhal')->get()->first();

        echo "<strong>$cidade->nome</strong><br>";

        $companhias = $cidade->companhias;
        //loop
        foreach ($companhias as $companhia) {
            echo "$companhia->nome <br>";  
        }
    }

    public function manyToManyInverso() {
        $companhia = Companhia::where('nome', 'Next Sistemas')->get()->first();
        echo "<strong>$companhia->nome</strong><br>";

        $cidades = $companhia->cidades;
        //loop
        foreach ($cidades as $cidade) {
            echo "$cidade->nome <br>";  
        }
    }

    //metodo para inserção
    public function manyToManyInsert() {

        $dados = [1,2];//cidades

        $companhia = Companhia::find(1);
        echo "<strong>$companhia->nome</strong><br>";

        //$companhia->cidades()->attach($dados);//adiciona enquanto der refresh no browser
        //$companhia->cidades()->sync($dados);//adiciona e sincroniza sem repetir dados
        $companhia->cidades()->detach([1,2]);//remove o que for chamado no detach
        
        

        //loop
        $cidades = $companhia->cidades;
        foreach ($cidades as $cidade) {
            echo "$cidade->nome <br>";  
        }
    }
}
