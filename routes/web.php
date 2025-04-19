<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use Barryvdh\Debugbar\DataCollector\SessionCollector;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\BudgetController;

Route::view('/', 'home');

// user routes
Route::resource('users', UserController::class);
Route::get('/dashboard', [UserController::class, 'index']);

// authentication routes
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

// Transaction Routes
Route::resource('transactions', TransactionController::class);

// Account Routes
Route::resource('accounts', UserAccountController::class); 

// Budget Routes
Route::resource('budgets', BudgetController::class);


// Temporal ROUTES
Route::view('/savings', 'savings');
Route::view('/trends', 'trends');
Route::view('/features', 'features');
Route::view('/invest', 'invest');



