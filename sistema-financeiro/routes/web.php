<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ContaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\MovimentacaoFinanceiraController;
use App\Http\Controllers\CategoriaTransacaoController;
use App\Http\Controllers\TransferenciaController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Movimentações Financeiras
    Route::get('/movimentacoes', [MovimentacaoFinanceiraController::class, 'index'])->name('movimentacoes.index');
    Route::get('/movimentacoes/create', [MovimentacaoFinanceiraController::class, 'create'])->name('movimentacoes.create');
    Route::post('/movimentacoes', [MovimentacaoFinanceiraController::class, 'store'])->name('movimentacoes.store');
    Route::get('/movimentacoes/{id}/edit', [MovimentacaoFinanceiraController::class, 'edit'])->name('movimentacoes.edit');
    Route::put('/movimentacoes/{id}', [MovimentacaoFinanceiraController::class, 'update'])->name('movimentacoes.update');
    Route::delete('/movimentacoes/{id}', [MovimentacaoFinanceiraController::class, 'destroy'])->name('movimentacoes.destroy');


    // Categorias
    Route::get('/categorias', [CategoriaTransacaoController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/create', [CategoriaTransacaoController::class, 'create'])->name('categorias.create');
    Route::post('/categorias', [CategoriaTransacaoController::class, 'store'])->name('categorias.store');
    Route::get('/categorias/{id}/edit', [CategoriaTransacaoController::class, 'edit'])->name('categorias.edit');
    Route::put('/categorias/{id}', [CategoriaTransacaoController::class, 'update'])->name('categorias.update');
    Route::delete('/categorias/{id}', [CategoriaTransacaoController::class, 'destroy'])->name('categorias.destroy');


    // Transferências
    Route::get('/transferencias', [TransferenciaController::class, 'index'])->name('transferencias.index');
    Route::get('/transferencias/create', [TransferenciaController::class, 'create'])->name('transferencias.create');
    Route::post('/transferencias', [TransferenciaController::class, 'store'])->name('transferencias.store');
    Route::get('/transferencias/{id}/edit', [TransferenciaController::class, 'edit'])->name('transferencias.edit');
    Route::put('/transferencias/{id}', [TransferenciaController::class, 'update'])->name('transferencias.update');
    Route::delete('/transferencias/{id}', [TransferenciaController::class, 'destroy'])->name('transferencias.destroy');


    // Contas
    Route::get('/contas', [ContaController::class, 'index'])->name('contas.index');
    Route::get('/contas/create', [ContaController::class, 'create'])->name('contas.create');
    Route::post('/contas', [ContaController::class, 'store'])->name('contas.store');
    Route::get('/contas/{id}/edit', [ContaController::class, 'edit'])->name('contas.edit');
    Route::put('/contas/{id}', [ContaController::class, 'update'])->name('contas.update');
    Route::delete('/contas/{id}', [ContaController::class, 'destroy'])->name('contas.destroy');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('usuarios', UsuarioController::class);
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

require __DIR__.'/auth.php';