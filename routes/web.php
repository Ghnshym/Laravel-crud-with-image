<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


Route::get('/form.user', [userController::class, 'showUserForm'])->name('form.user');
Route::post('/create.user', [userController::class, 'create'])->name('create.user');
Route::get('/', [userController::class, 'index']);
Route::get('/showDetailes.user/{id}', [userController::class, 'showDetailes'])->name('showDetailes.user');

Route::get('/showEdit.user/{id}', [userController::class, 'showEdit'])->name('showEdit.user');
Route::patch('/update.user/{id}', [userController::class, 'update'])->name('update.user');

Route::get('/destroy.user/{id}', [UserController::class, 'destroy'])->name('destroy.user');