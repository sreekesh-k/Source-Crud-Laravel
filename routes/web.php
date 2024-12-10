<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class, 'read'])->name('reading');
Route::get('/create', [CategoryController::class, 'create'])->name('creating');
Route::post('/create', [CategoryController::class, 'createConfirm'])->name('create.confirm');
Route::get('/update/{category}', [CategoryController::class, 'update'])->name('updating');
Route::put('/update/{category}', [CategoryController::class, 'updateConfirm'])->name('update.confirm');
Route::get('/delete/{category}', [CategoryController::class, 'delete'])->name('deleting');
