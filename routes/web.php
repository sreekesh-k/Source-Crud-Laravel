<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SourceMemberController;


Route::get('/', [SourceMemberController::class, 'index'])->name('index');
Route::get('/create', [SourceMemberController::class, 'create'])->name('source_members.create');
Route::post('/source_members', [SourceMemberController::class, 'store'])->name('source_members.store');
Route::get('/source_members/{sourceMember}/edit', [SourceMemberController::class, 'edit'])->name('source_members.edit');
Route::put('/source_members/{sourceMember}', [SourceMemberController::class, 'update'])->name('source_members.update');
Route::delete('/source_members/{sourceMember}', [SourceMemberController::class, 'destroy'])->name('source_members.destroy');
