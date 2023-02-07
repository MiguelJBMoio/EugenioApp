<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;
use App\Models\Sessao;
use App\Models\Classificacao;
use Illuminate\Support\Facades\DB;

class VerResultados extends Controller
{
    function index(){
        // Obter a sessão mais recente
        $sessaoRecente = Sessao::latest('PK_Sessao')->first()->PK_Sessao;

        // Obter as classificações dos jogadores
        $classificacoes = Classificacao::join('Teste', 'Classificacao.PK_Classificacao', '=', 'Teste.FK_Classificacao')
        ->join('Jogador', 'Teste.FK_Jogador', '=', 'Jogador.PK_Jogador')
        ->join('Sessao', 'Teste.FK_Sessao', '=', 'Sessao.PK_Sessao')
        ->where('Sessao.PK_Sessao', $sessaoRecente)
        ->groupBy('Jogador.PK_Jogador', 'Jogador.Nome')
        ->get([
          'Jogador.Nome as Nome_Jogador', 
          'Jogador.PK_Jogador as id_jogador', 
          DB::raw('AVG(Classificacao.WPM) as WPM'),
          DB::raw('SUM(Classificacao.QTD_Certas) as QTD_Certas'),
          DB::raw('SUM(Classificacao.QTD_Erros) as QTD_Erradas'),
          DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(Classificacao.Tempo))) as Tempo'),
          DB::raw('SUM(Classificacao.Pontuacao_Final) as Pontuacao_Final')
        ]);
        
        return view('ver_resultados')->with(['classificacoes' => $classificacoes]);


    }
}
