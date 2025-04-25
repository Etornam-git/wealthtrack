<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\BudgetController;

Route::view('/', 'home');

Route::resource('users', UserController::class);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/dashboard', [UserController::class, 'index']);

Route::resource('transactions', TransactionController::class);

Route::resource('accounts', UserAccountController::class); 

Route::resource('savings', SavingsController::class);

// Budget Routes
Route::resource('/budgets',BudgetController::class);
Route::get('/budgets/{budget}/track', [BudgetController::class, 'track'])->name('budgets.track');

Route::resource('investment', InvestmentController::class);


