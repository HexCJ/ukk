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
Route::get('/edit/{id}', [TodolistController::class, 'edit'])->name('edit');
Route::get('/show/{id}', [TodolistController::class, 'show'])->name('show');
Route::get('/complete', [TodolistController::class, 'complete'])->name('complete');
Route::get('/cancel', [TodolistController::class, 'cancel'])->name('cancel');
Route::post('/store', [TodolistController::class, 'store'])->name('store');
Route::post('/destroy', [TodolistController::class, 'destroy'])->name('destroy');
Route::put('/status/{id}', [TodolistController::class, 'status'])->name('status');
Route::put('/update/{id}', [TodolistController::class, 'update'])->name('update');
Route::get('/subtask/{id}', [TodolistController::class, 'subtask'])->name('subtask');
Route::post('/substore', [TodolistController::class, 'substore'])->name('substore');
