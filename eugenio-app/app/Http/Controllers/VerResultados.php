<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;
use App\Models\Teste;
use App\Models\Classificacao;
use Illuminate\Support\Facades\DB;

class VerResultados extends Controller
{
    function index(){
        $classificacoes = Classificacao::join('Teste', 'Classificacao.PK_Classificacao', '=', 'Teste.FK_Classificacao')
        ->join('Jogador', 'Teste.FK_Jogador', '=', 'Jogador.PK_Jogador')
        ->groupBy('Jogador.PK_Jogador', 'Jogador.Nome')
        ->get([
          'Jogador.Nome as Nome_Jogador', 
          'Jogador.PK_Jogador as id_jogador', 
          DB::raw('SUM(Classificacao.WPM) as WPM'),
          DB::raw('SUM(Classificacao.QTD_Certas) as QTD_Certas'),
          DB::raw('SUM(Classificacao.QTD_Erros) as QTD_Erradas'),
          DB::raw('SUM(Classificacao.Tempo) as Tempo'),
          DB::raw('SUM(Classificacao.Pontuacao_Final) as Pontuacao_Final')
        ]);

        return view('ver_resultados')->with(['classificacoes' => $classificacoes]);


    }
}
