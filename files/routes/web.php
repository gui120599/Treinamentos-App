<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {// Rotas que requerem autenticação

    //Rotas Setores
    Route::delete('/setores/{id}', [SetorController::class, 'destroy'])->name('setores.destroy');
    Route::put('/setores/{id}', [SetorController::class, 'update'])->name('setores.update');
    Route::get('/setores/{id}/edit', [SetorController::class, 'edit'])->name('setores.edit');
    Route::get('/setores/{id}', [SetorController::class, 'show'])->name('setores.show');
    Route::post('/setores', [SetorController::class, 'store'])->name('setores.store');
    Route::get('/setores/edit', [SetorController::class, 'edit'])->name('setores.edit');
    Route::get('/setores', [SetorController::class, 'index'])->name('setores.index');

    //Rotas Cargos
    Route::delete('/cargos/{id}', [CargoController::class, 'destroy'])->name('cargos.destroy');
    Route::put('/cargos/{id}', [CargoController::class, 'update'])->name('cargos.update');
    Route::get('/cargos/{id}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
    Route::get('/cargos/{id}', [CargoController::class, 'show'])->name('cargos.show');
    Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');
    Route::get('/cargos/edit', [CargoController::class, 'edit'])->name('cargos.edit');
    Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    Route::post('/settings', [SettingsController::class, 'index'])->name('settings');

    //Rotas de Store
});
