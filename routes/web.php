<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;  // <-- Add this line
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();  


Route::get('/', [CategoryController::class, 'read'])->name('reading');
Route::get('/create', [CategoryController::class, 'create'])->name('creating');
Route::post('/create', [CategoryController::class, 'createConfirm'])->name('create.confirm');
Route::get('/update/{category}', [CategoryController::class, 'update'])->name('updating');
Route::put('/update/{category}', [CategoryController::class, 'updateConfirm'])->name('update.confirm');
Route::get('/delete/{category}', [CategoryController::class, 'delete'])->name('deleting');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
