<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


Route::get('/', [userController::class, 'index']);
Route::get('/user.form', [userController::class, 'showUserForm'])->name('user.form');
Route::post('/create.user', [userController::class, 'create'])->name('create.user');
