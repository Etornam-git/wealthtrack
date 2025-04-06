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
        $user=Auth::user();
        $accounts = $user->accounts;
        return view('accounts.index', compact('accounts','user'));
    }

    public function create(Account $account)
    {
        
        $user = Auth::user();
        if(!$user) {
            return redirect()->back()->withErrors(['error' => 'You must be logged in to create an account.']);
        }
        return view('accounts.new', ['account' => $account,'user' => $user]);
    }


    public function show(Account $account)
    {
        return view('accounts.show', ['account' => $account]);
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', ['account' => $account]);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'balance' => 'required|numeric',
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

