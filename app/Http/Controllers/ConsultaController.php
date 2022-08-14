<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemLista;
use Exception;

class ConsultaController extends Controller
{
    //consulta_nome
    public function consulta_nome(Request $request)
    {
        //valida se campo nome foi preenchido
        if(!$request->nome)
        {
            return response()->json(['status' => 'error', 'code' => 400, 'message' => 'Campo nome não foi preenchido'], 400);
        }

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

        //executando query
        $resultado = $query->get(['nome', 'documento', 'motivo', 'lista_id']);

        //montando resultado de retorno da consulta
        // $resultado = [
        //     'status' => 'success',
        //     'message' => 'Consulta realizada com sucesso',
        //     'nome' => $nome,
        //     'nome_lista' => $nome_lista,
        //     'tst_count_explode' => count($nome_explode),
        //     'tst_similar_text' => similar_text("Osama bin Mohammed bin Awad bin Laden", "Usamah Bin Muhammad bin Awad bin Ladin", $percent),
        //     'tst_percent' => $percent,
        //     'tst_nome_explode' => $nome_explode
        // ];


        //verificando se a consulta retornou algum resultado
        if (count($resultado) > 0) {
            $http_response = [
                'status' => 'success',
                'message' => 'Consulta realizada com sucesso',
                'nome' => $nome,
                'data' => $resultado
            ];

            $http_code = 200;

        } else {
            $http_response = [
                'status' => 'success',
                'message' => 'Nenhum resultado encontrado',
                'nome' => $nome,
                'data' => $resultado
            ];

            $http_code = 200;

        }

        return response()->json($http_response, $http_code);

    }


    //consulta_documento
    public function consulta_documento(Request $request)
    {
        //valida se campo nome foi preenchido
        if(!$request->documento)
        {
            return response()->json(['status' => 'error', 'code' => 400, 'message' => 'Campo documento não foi preenchido'], 400);
        }

        //pega o nome da pessoa que esta sendo consultada
        $documento = $request->input('documento');

        //formatando documento para consulta
        $documento = trim($documento);
        $documento = str_replace(' ', '', $documento);
        $documento = str_replace('.', '', $documento);
        $documento = str_replace('-', '', $documento);
        $documento = str_replace('/', '', $documento);

        //buscando nome na lista
        $query = ItemLista::with('lista:id,nome as lista')->where('nome', 'like', '%' . $documento . '%');

        //executando query
        $resultado = $query->get(['nome', 'documento', 'motivo', 'lista_id']);

        //verificando se a consulta retornou algum resultado
        if (count($resultado) > 0) {
            $http_response = [
                'status' => 'success',
                'message' => 'Consulta realizada com sucesso',
                'documento' => $documento,
                'data' => $resultado
            ];

            $http_code = 200;

        } else {
            $http_response = [
                'status' => 'success',
                'message' => 'Nenhum resultado encontrado',
                'documento' => $documento,
                'data' => $resultado
            ];

            $http_code = 200;

        }

        return response()->json($http_response, $http_code);

    }

}
