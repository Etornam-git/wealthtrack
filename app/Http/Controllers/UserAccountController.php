<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Str;

class UserAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('accounts.index', compact('accounts', 'user'));
    }

    public function create(Account $account)
    {
        
        $user = Auth::user();
        if(!$user) {
            return redirect()->back()->withErrors(['error' => 'You must be logged in to create an account.']);
        }
        return view('accounts.create', ['account' => $account, 'user' => $user]);
    }


    public function show(Account $account)
    {
        // Check if the account belongs to the authenticated user
        if (Auth::id() !== $account->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('accounts.show', ['account' => $account]);
    }

    public function edit(Account $account)
    {
        // Check if the account belongs to the authenticated user
        if (Auth::id() !== $account->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('accounts.edit', ['account' => $account]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email',
        ]);

        $validated['account_number'] = Account::generateAccountNumber();
        $validated['user_id'] = Auth::id(); 
        
        if(!$validated['user_id']) {
            return redirect()->back()->withErrors(['error' => 'You must be logged in to create an account.']);
        }

        Account::create($validated);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public static function generateAccountNumber()
    {
        return 'ACC' .'-'. strtoupper(Str::random(3)) . rand(10000, 99999);
    }

    public function update(Request $request, Account $account)
    {
        // Check if the account belongs to the authenticated user
        if (Auth::id() !== $account->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'email' => 'required|email',
        ]);

        $account->update($validated);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy(Account $account)
    {
        // Check if the account belongs to the authenticated user
        if (Auth::id() !== $account->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}

