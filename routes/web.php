<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


Route::get('/',[MemberController::class,'member'])->name('member.index');
Route::get('/member/create',[MemberController::class,'mcreate'])->name('member.create');
Route::post('/store',[MemberController::class,'mstore'])->name('member.store');
Route::get('/member/{id}/edit',[MemberController::class,'medit']);
