<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;
use App\Models\Teste;
use App\Models\Sessao;

class RealizarInscricoes extends Controller
{
    function index() {
        //Obter a sessão mais recente
        $ultima_sessao = Sessao::latest('PK_Sessao')->first();
        
        // Obter os jogadores inscritos na sessão
        $jogadores = Jogador::whereHas('testes', function($query) use ($ultima_sessao) {
            $query->whereHas('sessao', function($query) use ($ultima_sessao) {
                $query->where('PK_Sessao', $ultima_sessao->PK_Sessao);
            });
        })->get();
        return view('realizar_inscricoes', ['jogadores' => $jogadores]);
    }

    public function adicionarJogador(Request $request) {

        // Criar o jogador
        $jogador = new Jogador();
        $jogador->Nome = $request->input('nomeJogador');
        $jogador->Idade = 0;
        $jogador->save();
        

        // Criar os testes para as configurações
        $ultimaSessao = Sessao::max('PK_Sessao');
        for ($i = 1; $i <= 6; $i++) {
            $teste = new Teste();
            $teste->FK_Jogador = $jogador->PK_Jogador;
            $teste->FK_Configuracao = $i;
            $teste->FK_Sessao = $ultimaSessao;
            $teste->save();
        }
        return redirect()->route('realizar-inscricoes');
    }
}
