<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateController;



Route::group(['middleware' => 'guest'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create',[CreateController::class,'createMembers'])->name('create');
    Route::post('/create',[CreateController::class,'addMembers'])->name('store');
});