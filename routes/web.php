<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\{SuporteController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site/contact', [SiteController::class, 'action']);

//suporte
Route::delete('/admins/suportes/{id}', [SuporteController::class, 'destroy'])->name('suportes.destroy');
Route::put('/admins/suportes/{id}', [SuporteController::class, 'update'])->name('suportes.update');
Route::get('/admins/suportes/{id}/edit', [SuporteController::class, 'edit'])->name('suportes.edit');
Route::get('/admins/suportes/create', [SuporteController::class, 'create'])->name('suportes.create');
Route::get('/admins/suportes/{id}', [SuporteController::class, 'show'])->name('suportes.show');
Route::get('/admins/suportes', [SuporteController::class, 'index'])->name('suportes.index');
Route::post('/admins/suportes', [SuporteController::class, 'store'])->name('suportes.store');

//Transações Financeiras - contas 
Route::delete('/admins/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
Route::put('/admins/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::get('/admins/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/admins/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::get('/admins/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/admins/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::post('/admins/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');



