<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;
use App\Models\Teste;
use App\Models\Sessao;
use App\Models\Configuracao;


class DesafioController extends Controller
{
    function index(){
        $configuracaoID = request()->get('configuracoes');
        $configuracao = Configuracao::find($configuracaoID);

        $jogadorID = request()->get('jogadores');
        $jogador = Jogador::find($jogadorID);

        return view('desafio', [
            'configuracao' => $configuracao,
            'jogador' => $jogador,
        ]);
    }
}
