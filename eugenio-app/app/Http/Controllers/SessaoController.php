<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;

class SessaoController extends Controller
{
    public function criarSessao(Request $request)
    {
        // Criar uma nova sessão
        $sessao = new Sessao();
        $sessao->Data_sessao = now();
        $sessao->save();
        return redirect()->back()->with('success', 'Sessão criada com sucesso');
    }
}