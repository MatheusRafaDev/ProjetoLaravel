<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\MovimentacaoFinanceiraController;
use App\Http\Controllers\TransferenciaController;
use App\Http\Controllers\CategoriaTransacaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuarios', UsuarioController::class);
Route::resource('contas', ContaController::class);
Route::resource('movimentacoes', MovimentacaoFinanceiraController::class);
Route::resource('transferencias', TransferenciaController::class);
Route::resource('categorias', CategoriaTransacaoController::class);