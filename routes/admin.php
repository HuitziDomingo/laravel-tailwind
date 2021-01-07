<?php

use App\Http\Controllers\Admin\CateoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

#Categorias controlador
Route::resource('categories', CateoryController::class)->names('admin.categories');

#Tags Controlador
Route::resource('tag', TagController::class)->names('admin.tags');
