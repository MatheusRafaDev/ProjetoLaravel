<?php

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});

use App\Http\Controllers\TransactionController;

Route::middleware(['auth'])->group(function () {
    Route::resource('transactions', TransactionController::class);
});

Route::get('/dashboard', [TransactionController::class, 'dashboard'])
     ->name('transactions.dashboard')
     ->middleware('auth');

