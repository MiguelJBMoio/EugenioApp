<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classificacao;
use App\Models\Sessao;
use App\Models\Teste;
use App\Models\Jogador;

class ClassificacaoAtualController extends Controller
{
    function index(Request $request){
        $wpm = $request->input('wpm');
        $correctWords = $request->input('correctWords');
        $incorrectWords = $request->input('incorrectWords');
        $timePassed = $request->input('timePassed');
        $pontuacaoFinal = $request->input('pontuacaoFinal');
        $PK_Configuracao = $request->input('configuracao');
        $PK_Jogador = $request->input('jogador');

        $classificacao = new Classificacao();
        $classificacao->WPM = $wpm;
        $classificacao->QTD_Erros = $incorrectWords;
        $classificacao->QTD_Certas = $correctWords;
        $classificacao->Tempo = $timePassed;
        $classificacao->Pontuacao_Final = $pontuacaoFinal;
        $classificacao->save();

        $recentTest = Teste::where('FK_Sessao', Sessao::latest('PK_Sessao')->first()->PK_Sessao)
        ->where('FK_Configuracao', $PK_Configuracao)
        ->where('FK_Jogador', $PK_Jogador)
        ->first();

        $recentTest->update(['FK_Classificacao' => $classificacao->PK_Classificacao]);

        $sessao_atual = Sessao::latest('PK_Sessao')->first();

        $classificacoes = Classificacao::join('Teste', 'Classificacao.PK_Classificacao', '=', 'Teste.FK_Classificacao')
                    ->join('Jogador', 'Teste.FK_Jogador', '=', 'Jogador.PK_Jogador')
                    ->get(['Teste.FK_Configuracao as id_configuracao','Jogador.Nome as Nome_Jogador', 'Jogador.PK_Jogador as id_jogador', 'Classificacao.*']);

        return view('classificacao-config', [
            'classificacoes' => $classificacoes,
            'jogadorAtual' => $PK_Jogador,
            'idConfiguracao' => $PK_Configuracao
        ]);

    }
}
