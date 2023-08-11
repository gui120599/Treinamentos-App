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
    Route::delete('/settings/setores/{id}', [SetorController::class, 'destroy'])->name('setores.destroy');
    Route::put('/settings/setores/{id}', [SetorController::class, 'update'])->name('setores.update');
    Route::get('/settings/setores/{id}/edit', [SetorController::class, 'edit'])->name('setores.edit');
    Route::get('/settings/setores/{id}', [SetorController::class, 'show'])->name('setores.show');
    Route::post('/settings/setores', [SetorController::class, 'store'])->name('setores.store');
    Route::get('/settings/setores/edit', [SetorController::class, 'edit'])->name('setores.edit');
    Route::get('/settings/setores', [SetorController::class, 'index'])->name('setores.index');

    //Rotas Cargos
    Route::delete('/settings/cargos/{id}', [CargoController::class, 'destroy'])->name('cargos.destroy');
    Route::put('/settings/cargos/{id}', [CargoController::class, 'update'])->name('cargos.update');
    Route::get('/settings/cargos/{id}/edit', [CargoController::class, 'edit'])->name('cargos.edit');
    Route::get('/settings/cargos/{id}', [CargoController::class, 'show'])->name('cargos.show');
    Route::post('/settings/cargos', [CargoController::class, 'store'])->name('cargos.store');
    Route::get('/settings/cargos/edit', [CargoController::class, 'edit'])->name('cargos.edit');
    Route::get('/settings/cargos', [CargoController::class, 'index'])->name('cargos.index');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/settings/', [SettingsController::class, 'index'])->name('settings');

    Route::post('/settings', [SettingsController::class, 'index'])->name('settings');

    //Rotas de Store
});
