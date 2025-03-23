<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user/login', function () {
    return view('user.login');
});

Route::get('/user/register', function () {
    return view('user.register');
});

Route::post('/user', function () {
    User::create([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'email' => request('email'),
        'password' => request('password'),
        'email_verified_at' => 'null'

    ]);
    return redirect('users');
});


Route::get('/', function () {
    return view('home');
});

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

Route::get('/users', function () {
    $users = User::all();
    return view('users', ['users'=>$users]);
});
