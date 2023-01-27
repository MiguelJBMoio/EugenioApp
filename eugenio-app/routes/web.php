<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IniciarDesafio;
use App\Http\Controllers\RealizarInscricoes;
use App\Http\Controllers\VerResultados;


//ROTA HOME
Route::get('/', [HomeController::class,'index']);

//ROTA REALIZAR INSCRIÇÕES
Route::get('/realizar-inscricoes', [RealizarInscricoes::class, 'index']);

//ROTA INICIAR DESAFIO
Route::get('/iniciar-desafio', [IniciarDesafio::class, 'index']);

//ROTA VER RESULTADOS
Route::get('/ver-resultados', [VerResultados::class, 'index']);

//ROTA SAIR
Route::get('/sair', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/