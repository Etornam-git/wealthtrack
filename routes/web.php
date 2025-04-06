<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Barryvdh\Debugbar\DataCollector\SessionCollector;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserAccountController;

// add new



Route::resource('users', UserController::class);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/dashboard', [UserController::class, 'index']);

Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/new', [TransactionController::class, 'create']);
Route::post('/transactions', [TransactionController::class, 'store']);

Route::get('/accounts/{account)', [UserAccountController::class, 'show']);
Route::get('/accounts', [UserAccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/create', [UserAccountController::class, 'create'])->name('accounts.create'); 
Route::post('/accounts', [UserAccountController::class, 'store'])->name('accounts.store');
Route::patch('/accounts/{account)', [UserAccountController::class, 'update']);
Route::delete('/accounts/{account)', [UserAccountController::class, 'destroy']);




Route::view('/', 'home');
Route::view('/savings', 'savings');
Route::view('/budgets', 'budgets');
Route::view('/trends', 'trends');
Route::view('/features', 'features');
Route::view('/invest', 'invest');


// ADMIN PASSWORD : admin@123

