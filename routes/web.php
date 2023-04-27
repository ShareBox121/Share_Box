<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
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

// rota responsável pela tela principal
Route::get('/', [HomeController::class, 'index'])->name('site.home');

// rota responsavel por criar, visualizar, editar, excluir e salvar
Route::get('add.index', [AddController::class, 'index'])->name('add.index');
Route::get('add.edit', [AddController::class, 'edit'])->name('add.edit');
Route::get('add.destroy', [AddController::class, 'destroy'])->name('add.destroy');
Route::get('add.show', [AddController::class, 'show'])->name('add.show');
Route::get('add.store', [AddController::class, 'store'])->name('add.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
