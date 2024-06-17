<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CascadaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [RegistroController::class, 'index'])->name('inicio.Index');

Route::prefix('registro')->group(function () {
    Route::get('index', [RegistroController::class, 'registro'])->name('<registro>registro.index');
    Route::get('visualizacion', [RegistroController::class, 'visualizacion'])->name('<registro>registro.visualizacion');
    Route::post('crear', [RegistroController::class, 'registrar'])->name('<registro>registro.registrar');
    Route::delete('eliminar/{id}', [RegistroController::class, 'eliminar'])->name('<registro>registro.eliminar');
    Route::put('editar', [RegistroController::class, 'editar'])->name('<registro>registro.editar');
    Route::get('selectRegistro/{id}', [RegistroController::class, 'selectRegistro'])->name('<registro>registro.selectRegistro');
});

Route::prefix('cascada')->group(function () {
    Route::get('index', [CascadaController::class, 'index'])->name('<cascada>cascada.index');
    Route::post('crearCategoria', [CascadaController::class, 'crearCategoria'])->name('<cascada>cascada.crearCategoria');
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
