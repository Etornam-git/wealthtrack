<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Barryvdh\Debugbar\DataCollector\SessionCollector;
use App\Http\Controllers\RegisterUserController;

// add new



Route::resource('users', UserController::class);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);


Route::get('/dashboard', [UserController::class, 'index']);


Route::view('/', 'home');
Route::view('/savings', 'savings');
Route::view('/budgets', 'budgets');
Route::view('/trends', 'trends');
Route::view('/features', 'features');
Route::view('/invest', 'invest');


