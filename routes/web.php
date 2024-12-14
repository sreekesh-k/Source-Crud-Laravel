<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateController;



Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
   
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/create',[CreateController::class,'createMembers'])->name('create');
    Route::post('/create',[CreateController::class,'addMembers'])->name('store');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
   
});
Route::get('/viewmembers', [CreateController::class, 'view'])->name('list');
Route::get('/members/edit/{member}', [CreateController::class, 'edit'])->name('edit');
Route::put('/members/{member}', [CreateController::class, 'editpost'])->name('update');
Route::delete('/destroy/{member}', [CreateController::class, 'Destroy'])->name('destroy');
    