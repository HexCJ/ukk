<?php

use App\Http\Controllers\TodolistController;
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

Route::get('/', [TodolistController::class, 'index'])->name('index');
Route::get('/create', [TodolistController::class, 'create'])->name('create');
Route::get('/edit', [TodolistController::class, 'edit'])->name('edit');
Route::get('/complete', [TodolistController::class, 'complete'])->name('complete');