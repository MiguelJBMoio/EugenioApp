<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class IniciarDesafio extends Controller
{
    function index(){
        return view('iniciar_desafio');
    }
}
