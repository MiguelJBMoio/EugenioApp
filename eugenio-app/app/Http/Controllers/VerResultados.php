<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VerResultados extends Controller
{
    function index(){
        return view('ver_resultados');
    }
}
