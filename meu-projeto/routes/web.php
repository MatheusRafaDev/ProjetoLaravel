<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;

Route::resource('tarefas', TarefaController::class);
