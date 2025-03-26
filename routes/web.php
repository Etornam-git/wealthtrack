<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

// login
Route::get('/user/login', function () {
    return view('user.login');
});

// add new
Route::get('/user/register', function () {
    return view('user.register');
});

// show
Route::get('/users', function () {
    $user = User::all();
    return view('users', ['users'=>$user]);
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

// edit
Route::get('user/edit/{id}', function ($id){
    $user = User::find($id);
    return view('user.edit', ['user'=>$user]);
});

// update
Route::patch('user/{id}/', function ($id){
    request()->validate([
        'first_name' => ['required', 'string', 'min:3','max:255'],
        'last_name' => ['required', 'string', 'min:3','max:255'],
        'email' => ['required', 'email'],
        'password' => ['required', 'string']
    ]);
    $user = User::findOrFail($id);

    $user->update([
        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'email' => request('email'),
        'password' => request('password'),
        'email_verified_at' => 'null'
    ]);
    
    return redirect('users');   
});

// delete
Route::delete('user/{id}', function ($id){
    User::findOrFail($id)->delete();
    return redirect('users');
});

// The GET method is not supported for route user/d/5. Supported methods: DELETE.

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


