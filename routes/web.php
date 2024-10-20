<?php

use App\Http\Controllers\CategoryController;
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

Route::get('/', [CategoryController::class, 'index']);
Route::get('/create', [CategoryController::class, 'create'])->name('view_create');
Route::post('/create', [CategoryController::class, 'store'])->name('create');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');

