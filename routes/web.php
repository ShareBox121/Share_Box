<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\PublicationController;
use App\Http\Requests\Auth\LoginRequest;
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

//login
Route::get('/login', [LoginRequest::class, 'directTologin'])->name('login');

Route::get('/publication', [PublicationController::class, 'index'])->name('publication.index');


// rota responsavel por criar, visualizar, editar, excluir e salvar
Route::get('/conteudo', [AddController::class, 'index'])->name('add.index');
Route::get('/conteudo/files', [AddController::class, 'carregarDados'])->name('add.index');
Route::post('/add', [AddController::class, 'store'])->name('add.store');
Route::get('/editar', [AddController::class, 'edit'])->name('add.edit');
Route::post('/conteudo/alterar/{id}/{path}', [AddController::class, 'update'])->name('add.update');
Route::post('/conteudo/delete/{id}', [AddController::class, 'destroy'])->name('add.destroy');
Route::get('/exibir/{id}', [AddController::class, 'show'])->name('add.show');
Route::get('/adicionar', [AddController::class, 'create'])->name('add.create');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
