<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserProfileController;
use App\Http\Livewire\NoteWireController;
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
    return view('welcome');
});
Route::middleware('logA')->group(function () {
    Route::get('/userprofile', [UserProfileController::class, 'index'])->name('up.index');
    Route::get('/userprofile/create', [UserProfileController::class, 'create'])->name('up.create');
    Route::post('/userprofile', [UserProfileController::class, 'store'])->name('up.store');
    Route::get('/userprofile/{model}/edit', [UserProfileController::class, 'edit'])->name('up.edit');
    Route::match(['PUT', 'PATCH'], '/userprofile/{model}', [UserProfileController::class, 'update'])->name('up.update');
    Route::delete('/userprofile/{model}', [ArticleController::class, 'delete'])->name('art.delete');


    Route::get('/article', [ArticleController::class, 'index'])->name('art.index');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('art.create');
    Route::post('/article', [ArticleController::class, 'store'])->name('art.store');
    Route::get('/article/{model}/edit', [ArticleController::class, 'edit'])->name('art.edit');
    Route::match(['PUT', 'PATCH'], '/article/{model}', [ArticleController::class, 'update'])->name('art.update');
    Route::delete('/article/{model}', [ArticleController::class, 'delete'])->name('art.delete');


    Route::get('/notes',NoteWireController::class)->name('note.list');
});
