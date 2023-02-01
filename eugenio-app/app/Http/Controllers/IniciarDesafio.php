<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;
use App\Models\Configuracao;
use App\Models\Sessao;

class IniciarDesafio extends Controller
{
    function index(){
        $ultima_sessao = Sessao::latest('PK_Sessao')->first();
        $configuracoes = Configuracao::all();
        $jogadores = Jogador::whereHas('testes', function($query) use ($ultima_sessao) {
            $query->whereHas('sessao', function($query) use ($ultima_sessao) {
                $query->where('PK_Sessao', $ultima_sessao->PK_Sessao);
            });
        })->get();
        return view('iniciar_desafio', [
            'configuracoes' => $configuracoes,
            'jogadores' => $jogadores
        ]);
    }
}
