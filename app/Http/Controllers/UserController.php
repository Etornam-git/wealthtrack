<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Account $account)
    {
        $accounts = Auth::user()->accounts();
        $transactions = $account->transactions;
        $transactions = Transaction::where('account_id', $account->id)->get();
        return view('dashboard', compact('accounts','transactions'));
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user)
    {
        request()->validate([
            'first_name' => ['required', 'string', 'min:3','max:255'],
            'last_name' => ['required', 'string', 'min:3','max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
        
        $user->create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => request('password'),
            'email_verified_at' => 'null'
    
        ]);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('users', ['users'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        // request()->validate([
        //     'first_name' => ['required', 'string', 'min:3','max:255'],
        //     'last_name' => ['required', 'string', 'min:3','max:255'],
        //     'email' => ['required', 'email'],
        //     'password' => ['required', 'string']
        // ]);
    
        // $user->update([
        //     'first_name' => request('first_name'),
        //     'last_name' => request('last_name'),
        //     'email' => request('email'),
        //     'password' => request('password'),
        //     'email_verified_at' => 'null'
        // ]);
        
        // return redirect('users');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users');
    }
}
