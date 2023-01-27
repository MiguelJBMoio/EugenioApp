<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Jogador;

class RealizarInscricoes extends Controller
{
    function index(){
        $jogadores = Jogador::all();
        return view('realizar_inscricoes', ['jogadores' => $jogadores]);
    }

    public function adicionarJogador(Request $request) {
        $jogador = new Jogador();
        $jogador->Nome = $request->input('nomeJogador');
        $jogador->Idade = 0;
        $jogador->save();
        return redirect()->route('realizar-inscricoes');
    }
}
