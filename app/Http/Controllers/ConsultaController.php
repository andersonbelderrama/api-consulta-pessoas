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
        $nome_explode = explode(' ', $nome);

        //buscando nome na lista
        $nome_lista = ItemLista::with('lista:id,nome as lista')
                    ->where('nome', 'like', '%' . $nome . '%')
                    ->orWhere([
                        ['nome', 'like', '%' . $nome_explode[0] . '%'],
                        ['nome', 'like', '%' . $nome_explode[1] . '%']
                    ])
                    ->orWhere([
                        ['nome', 'like', '%' . $nome_explode[2] . '%'],
                        ['nome', 'like', '%' . $nome_explode[3] . '%']
                    ])
                    ->orWhere([
                        ['nome', 'like', '%' . $nome_explode[4] . '%'],
                        ['nome', 'like', '%' . $nome_explode[5] . '%']
                    ])
                    ->get(['nome','documento','motivo','lista_id']);

        //monta resultado de retorno da consulta
        $resultado = [
            'nome' => $nome,
            'similar_text' => similar_text("Osama bin Mohammed bin Awad bin Laden", "Usamah Bin Muhammad bin Awad bin Ladin", $percent),
            'percent' => $percent,
            'nome_lista' => $nome_lista,
            'nome_explode' => $nome_explode
        ];


        return response()->json($resultado);
    }
}
