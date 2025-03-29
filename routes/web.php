<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

// login
Route::get('/user/login', function () {
    return view('users.login');
});

// add new
// Route::view('/user/register', 'user.register');


Route::resource('users', UserController::class);

Route::get('/users', [UserController::class, 'index']);

Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::get('user/edit/{user}',  [UserController::class, 'edit']);
Route::patch('user/{user}/', [UserController::class, 'update'] );
Route::delete('user/{user}',  [UserController::class, 'destroy']);

Route::get('/user/{user}', [SessionController::class, 'show']);


Route::view('/', 'home');
Route::get('/savings', function () {
    return view('savings');
});

Route::get('/budgets', function () {
    return view('budgets');
});

Route::get('/trends', function () {
    return view('trends');
});

Route::get('/features', function () {
    return view('features');
});

Route::get('/invest', function () {
    return view('invest');
});


