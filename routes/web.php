<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


Route::get('/',[MemberController::class,'member'])->name('member.index');
Route::get('/member/create',[MemberController::class,'mcreate'])->name('member.create');
Route::post('/store',[MemberController::class,'mstore'])->name('member.store');
Route::get('/member/{id}/edit',[MemberController::class,'medit']);
Route::put('/members/{id}/mupdate',[MemberController::class,'mupdate'])->name('member.update');
Route::get('/members/{id}/delete',[MemberController::class,'mdelete'])->name('member.delete');

