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


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

//Protected routes. Only authenticated user access.
Route::middleware('auth')->group(function (){

    Route::post('/logout', [SessionController::class, 'destroy']);

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'index'])->name('customer.profile');


    Route::resource('transactions', TransactionController::class);
    
    Route::resource('accounts', UserAccountController::class); 
    
    Route::resource('savings', SavingsController::class);
    Route::get('/deposit', [SavingsController::class, 'deposit'])->name('savings.deposit');
    Route::post('/deposit/{id}', [SavingsController::class, 'deposit'])->name('savings.deposit');
    
    // Budget Routes
    Route::resource('budgets',BudgetController::class);
    Route::get('/budgets/{budget}/track', [BudgetController::class, 'track'])->name('budgets.track');
    
    // Route::resource('investment', InvestmentController::class);
    Route::post('/leave-a-review', [UserController::class, 'storeReview'])->name('leave-a-review.store');
    
});



