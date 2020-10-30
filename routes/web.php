<?php

use App\Http\Controllers\ChapasController;
use App\Http\Controllers\EleicaosController;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\TelaPrincipalController;
use App\Http\Controllers\VotacaosController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginsController::class,'create']);
Route::post('/login',[LoginsController::class,'buscaLogin'])->name('login');

Route::get('/principal',[TelaPrincipalController::class,'create']);

Route::get('/pessoa',[PessoasController::class,'create']);
Route::get('/pessoa/novo',[PessoasController::class,'createNew']);
Route::post('/pessoa/novo',[PessoasController::class,'store'])->name('membro.novo');
Route::get('/pessoa/editar/{id}',[PessoasController::class,'edit'])->name('membro.consultar');
Route::post('/pessoa/editar/{id}',[PessoasController::class,'update'])->name('membro.editar');


Route::get('/eleicoes',[EleicaosController::class,'create']);
Route::post('/eleicoes',[EleicaosController::class,'store'])->name('eleicao.novo');
Route::get('/eleicoes/edit/{id}',[EleicaosController::class,'edit'])->name('eleicao.consultar');
Route::post('/eleicoes/edit/{id}',[EleicaosController::class,'update'])->name('eleicao.editar');

Route::get('/eleicoes/novaChapa/{id}',[ChapasController::class,'create'])->name('eleicao.chapa');
Route::post('/eleicoes/novaChapa/{id}',[ChapasController::class,'store'])->name('eleicao.salvarchapa');

Route::get('/eleicoes/votacao/{eleicao}',[VotacaosController::class,'create'])->name('eleicao.votacao');

Route::get('/votacao',[VotacaosController::class,'create']);