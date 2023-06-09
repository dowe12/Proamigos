<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
/* Rutas publicas chavales*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/simulador', function () {
    return view('simulator');
})->name('simulador');

Route::get('/informacion', function () {
    return view('info');
})->name('info');

Route::get('/documentos', function () {
    return view('documentos');
})->name('documentos');


/* Rutas privadas chavales*/

Route::get('/posts',[PostController::class,'index'])->name('posts.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__.'/auth.php';
