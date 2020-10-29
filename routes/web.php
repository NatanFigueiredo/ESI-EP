<?php

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

Route::get('/eleicoes',[EleicaosController::class,'create']);



Route::get('/votacao',[VotacaosController::class,'create']);