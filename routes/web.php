<?php

use App\Http\Controllers\FeaturesController;
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

// Route::get('/', [\App\Http\Controllers\BooksController::class, 'index'])->name('books');
// Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);

// Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

// Route::get('/', [FeaturesController::class, 'index'])->name('features');
// Route::get('/features/{feature}', [FeaturesController::class, 'show']);

// Route::get('/', [\App\Http\Controllers\CustomerController::class, 'index']);

Route::get('/', [\App\Http\Controllers\DevicesController::class, 'index']);
