<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RealizarInscricoes extends Controller
{
    function index(){
        return view('realizar_inscricoes');
    }
}
