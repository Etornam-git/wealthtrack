<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account;

class UserAccountController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $accounts = $user->accounts;
        return view('accounts.index', compact('accounts','user'));
    }

    public function create(Account $account)
    {
        // $this->authorize('view', $account); // optional if using policies
        $user=Auth::user();
        $accounts = $user->accounts;
        return view('accounts.create', compact('accounts','user'));
    }


    public function show(Account $account)
    {
        // $this->authorize('view', $account); // optional if using policies
        return view('accounts.show', compact('account'));
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'balance' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $validated['user_id'] = Auth::id(); 
        if(!$validated['user_id']) {
            
            return redirect()->back()->withErrors(['error' => 'You must be logged in to create an account.']);
        }
        Account::create($validated);

        return redirect()->back()->with('success', 'Account created successfully.');
    }

    public function update(Request $request, Account $account)
    {
        // $this->authorize('update', $account);

        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'balance' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $account->update($validated);

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

    public function destroy(Account $account)
    {
        // $this->authorize('delete', $account);

        $account->delete();

        return redirect()->back()->with('success', 'Account deleted successfully.');
    }
}

