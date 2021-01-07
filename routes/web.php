<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');
#Mostrar el contenido de los post
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
#Ruta para las categorias
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
#Ruta para las tags
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
