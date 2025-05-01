<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\BudgetController;
use App\Models\Review;
use App\Http\Controllers\HelpController;

Route::get('/', function () {
    $reviews = Review::latest()->take(3)->get();
    return view('home', compact('reviews'));
})->name('home');


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);

Route::get('/register', [RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store']);

//Protected routes. Only authenticated user access.
Route::middleware('auth')->group(function (){

    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');

    Route::resource('transactions', TransactionController::class);
    
    Route::resource('accounts', UserAccountController::class); 
    
    Route::resource('savings', SavingsController::class);
    Route::get('/savings/{saving}/deposit', [SavingsController::class, 'showDepositForm'])->name('savings.deposit.form');
    Route::post('/savings/{saving}/deposit', [SavingsController::class, 'processDeposit'])->name('savings.deposit.process');
    
    // Budget Routes
    Route::resource('budgets', BudgetController::class);
    Route::get('/budgets/{budget}/track', [BudgetController::class, 'track'])->name('budgets.track');

    // Help Route
    Route::get('/help', [HelpController::class, 'index'])->name('help');

    //Reviews
    Route::get('/profile/review', [UserController::class, 'showReviewForm'])->name('profile.review');
    Route::post('/profile/review', [UserController::class, 'storeReview'])->name('profile.review.store');
    
});



