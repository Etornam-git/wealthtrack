<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/user/login', function () {
    return view('user.login');
});

Route::get('/user/register', function () {
    return view('user.register');
});

//create
Route::post('/user', function () {
    request()->validate([
        'first_name' => ['required', 'string', 'min:3','max:255'],
        'last_name' => ['required', 'string', 'min:3','max:255'],
        'email' => ['required', 'email'],
        'password' => ['required', 'string']
    ]);
    User::create([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'email' => request('email'),
        'password' => request('password'),
        'email_verified_at' => 'null'

    ]);
    return redirect('users');
});

Route::patch('user/{id}/', function ($id){
    request()->validate([
        'first_name' => ['required', 'string', 'min:3','max:255'],
        'last_name' => ['required', 'string', 'min:3','max:255'],
        'email' => ['required', 'email'],
        'password' => ['required', 'string']
    ]);
    $user = User::find(request('id'));

    $user->update([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'email' => request('email'),
        'password' => request('password'),
        'email_verified_at' => 'null'
    ]);
});

// delete
Route::delete('user/{id}', function ($id){
    User::findOrFail($id)->delete();
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
