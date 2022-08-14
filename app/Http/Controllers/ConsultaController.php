<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\ItemLista;

class ConsultaController extends Controller
{
    //consulta_nome
    public function consulta_nome(Request $request)
    {
        //pega o nome da pessoa que esta sendo consultada
        $nome = $request->input('nome');

        //transforma nome em array de nomes
        $nome_explode = explode(' ', $nome, 6);

        //buscando nome na lista
        $query = ItemLista::with('lista:id,nome as lista')->where('nome', 'like', '%' . $nome . '%');

        //se tiver mais ou igual 2 a nomes
        if (count($nome_explode) >= 2) {
            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%']
            ]);
        }

        //se tiver mais ou igual a 3 nomes
        if (count($nome_explode) >= 3) {

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%']
            ]);

        }

        //se tiver mais ou igual a 4 nomes
        if (count($nome_explode) >= 4) {

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%']
            ]);

        }

        //se tiver mais ou igual a 5 nomes
        if (count($nome_explode) >= 5) {

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%']
            ]);

            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%']
            ]);

        }

        //se tiver mais de cinco nome
        if (count($nome_explode) >= 6) {
            $query->orWhere([
                ['nome', 'like', '%' . $nome_explode[0] . '%'],
                ['nome', 'like', '%' . $nome_explode[1] . '%'],
                ['nome', 'like', '%' . $nome_explode[2] . '%'],
                ['nome', 'like', '%' . $nome_explode[3] . '%'],
                ['nome', 'like', '%' . $nome_explode[4] . '%'],
                ['nome', 'like', '%' . $nome_explode[5] . '%']
            ]);
        }

        $nome_lista = $query->get(['nome', 'documento', 'motivo', 'lista_id']);

        //monta resultado de retorno da consulta
        $resultado = [
            'nome' => $nome,
            'nome_lista' => $nome_lista,
            'tst_count_explode' => count($nome_explode),
            'tst_similar_text' => similar_text("Osama bin Mohammed bin Awad bin Laden", "Usamah Bin Muhammad bin Awad bin Ladin", $percent),
            'tst_percent' => $percent,
            'tst_nome_explode' => $nome_explode
        ];


        return response()->json($resultado);
    }
}
