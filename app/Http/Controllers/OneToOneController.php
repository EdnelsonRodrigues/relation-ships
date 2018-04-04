<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Localizacao;

class OneToOneController extends Controller
{
    //padrão relacionamento One To One
    public function oneToOne() {
        $pais = Pais::where('nome', 'China')->get()->first();
        
        echo $pais->nome;

        $localizacao = $pais->localizacao;
        echo "<hr>Latitude: ($localizacao->latitude) <br>
            Longitude: ($localizacao->longitude)";
    }

    //One To One Inverso pegando pela localização
    public function oneToOneInverso() {
        $latitude = 456;
        $longitude = 654;

        $localizacao = Localizacao::where('latitude', $latitude)
                        ->where('longitude', $longitude)
                        ->get()
                        ->first();
        
        $pais = $localizacao->pais()->get()->first();
        echo "Código: $pais->id <br>
                Pais: $pais->nome";
    }

    //metodo para inserir em duas tabelas one to one
    public function oneToOneInsert() {
        $dados = [
            'nome' => 'Dinamarca',
            'latitude' => '223',
            'longitude' => '322',
        ];

        //inserindo os dados do Pais no array acima
        $pais = Pais::create($dados);

        $pais = Pais::where('nome','Dinamarca')->get()->first();

        //inserindo os dados da Localização recuperando o id do Pais relacionado
        /*$localizacao = new Localizacao;
        $localizacao->latitude = $dados['latitude'];
        $localizacao->longitude = $dados['longitude'];
        //rec. id do Pais
        $localizacao->pais_id = $pais->id;
        //salvando os dados na banco
        $salvarLocalizacao = $localizacao->save();*/

        $localizacao = $pais->localizacao()->create($dados);

        echo "Código da Localização: $localizacao->id <br>
                Pais: $pais->nome <br>
                Latitude: $localizacao->latitude <br>
                Longitude: $localizacao->longitude";
    }
}
