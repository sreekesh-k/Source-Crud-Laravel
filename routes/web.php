<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateController;



Route::group(['middleware' => 'guest'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create',[CreateController::class,'createMembers'])->name('create');
    Route::post('/create',[CreateController::class,'addMembers'])->name('store');
    Route::get('/viewmembers', [CreateController::class, 'view'])->name('list');
    Route::get('/members/edit/{member}', [CreateController::class, 'edit'])->name('edit');
    Route::put('/members/{member}', [CreateController::class, 'editpost'])->name('update');
    Route::delete('/destroy/{member}', [CreateController::class, 'Destroy'])->name('destroy');
   
});