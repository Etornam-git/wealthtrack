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


Route::resource('users', UserController::class);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/dashboard', [UserController::class, 'index']);

Route::resource('transactions', TransactionController::class);

Route::get('/accounts/new', [UserAccountController::class, 'create'])->name('accounts.new'); 
Route::get('/accounts/{account}', [UserAccountController::class, 'show'])->name('account.show');
Route::get('/accounts', [UserAccountController::class, 'index'])->name('accounts.index');
Route::post('/accounts', [UserAccountController::class, 'store'])->name('accounts.store');
Route::get('/accounts/edit/{account}', [UserAccountController::class, 'edit'])->name('accounts.edit');
Route::patch('/accounts/{account}', [UserAccountController::class, 'update'])->name('accounts.update');
Route::delete('/accounts/{account}', [UserAccountController::class, 'destroy'])->name('accounts.destroy');

// Budget Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::get('/budgets/{budget}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::get('/budgets/{budget}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
    Route::patch('/budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('/budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');
    Route::get('/budgets/{budget}/track', [BudgetController::class, 'track'])->name('budgets.track');
});

Route::view('/', 'home');
Route::view('/savings', 'savings');
// Route::view('/budgets', 'budgets');
Route::view('/trends', 'trends');
Route::view('/features', 'features');
Route::view('/invest', 'invest');


// ADMIN PASSWORD : admin@123

