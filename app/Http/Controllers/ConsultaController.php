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
        $nome = $request->input('nome');
        $nome_lista = ItemLista::with('lista:id,nome as lista')->where('nome', 'like', '%' . $nome . '%')->get(['nome','documento','motivo','lista_id']);

        $resultado = [
            'nome' => $nome,
            'similar_text' => similar_text("Osama bin Mohammed bin Awad bin Laden", "Usamah Bin Muhammad bin Awad bin Ladin", $percent),
            'percent' => $percent,
            'nome_lista' => $nome_lista
        ];


        return response()->json($resultado);
    }
}
