<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Artigo;

class SearchController extends Controller
{

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('busca.busca');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::get("https://www.questmultimarcas.com.br/estoque?termo=$request->busca");

        if(!$response->failed()){
            $regexNome = '/<h2 class="card__title ui-title-inner">.*">(.*?)<\/a><\/h2>/';
            $regexLink = '/<h2 class="card__title ui-title-inner"><a href="(.*?)">/';
            $regexAno = '/Ano: <\/span>\r\n\r\n                                                            <span class="card-list__info">\r\n                                                                (.*?)<\/span>/';
            $regexCombustivel = '/Combustível: <\/span>\r\n                                                            <span class="card-list__info">\r\n                                                                (.*?) <\/span>/';
            $regexPortas = '/Portas: <\/span>\r\n\r\n                                                            <span class="card-list__info">\r\n                                                                (.*?) <\/span>/';
            $regexKm = '/Quilometragem: <\/span>\r\n\r\n                                                            <span class="card-list__info">\r\n                                                                (.*?) <\/span>/';
            $regexCambio = '/Câmbio: <\/span>\r\n                                                            <span class="card-list__info">\r\n                                                                (.*?) <\/span>/';
            $regexCor = '/Cor: <\/span>\r\n\r\n                                                            <span class="card-list__info">\r\n                                                                (.*?) <\/span>/';
            preg_match_all($regexNome, $response->body(), $nome);
            preg_match_all($regexLink, $response->body(), $link);
            preg_match_all($regexAno, $response->body(), $ano);
            preg_match_all($regexCombustivel, $response->body(), $combustivel);
            preg_match_all($regexPortas, $response->body(), $portas);
            preg_match_all($regexKm, $response->body(), $km);
            preg_match_all($regexCambio, $response->body(), $cambio);
            preg_match_all($regexCor, $response->body(), $cor);
            // dd($km);
            if(!empty($nome[1])){
                for ($i=0; $i < count($nome[1]); $i++) { 
                    $carro = Artigo::create([
                        "id_usuario" => Auth::id(),
                        "nome_veiculo"=> $nome[1][$i],
                        "link" => $link[1][$i],
                        "ano" => $ano[1][$i],
                        "combustivel" => $combustivel[1][$i],
                        "portas" => $portas[1][$i],
                        "quilometragem" => $km[1][$i],
                        "cambio" => $cambio[1][$i],
                        "cor" => $cor[1][$i]
                    ]);
        
                    $id[] = $carro->id;
                }

                return redirect('capturar')->with('ok', serialize($id));
            }else{
                return redirect('capturar')->with('error', "Não encontramos veículos com a sua busca. Favor tentar outro modelo!");
            }
    
        }else{
            return redirect('capturar')->with('error', "Houve um erro com a sua busca. Favor tentar novamente!");
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(isset($request->resultado)){
            return view('busca.exibe', ['id' => Artigo::find(unserialize($request->resultado))]);
        }else{
            return view('busca.exibe', ['id' => Artigo::all()]);
        }
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Artigo::destroy($id)){
            return redirect('exibir')->with('destroy', "Exclusão realizada com sucesso!");
        }else{
            return redirect('exibir')->with('destroy', "Houve um erro ao realizar a exclusão. Favor tentar novamente!");
        }

    }
}
