<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {

        $user = Auth::user();
        $accounts = $user->accounts;
        if ($accounts->count() === 0) {
            
            return redirect()->route('accounts.create')->with('error', 'You must create an account before creating a transaction.');
        }
        
        $transactions = $accounts->flatMap(function ($account) {
            return $account->transactions;
        });

        return view('transactions.index', compact('accounts', 'transactions', 'user'));
        
        
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('transactions.create', compact('accounts', 'user'));
       
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // 1. Get the authenticated user and validate input
        $user = Auth::user();
        $validated = request()->validate([
            'account_id' => ['required', 'exists:accounts,id'],
            'amount' => ['required', 'numeric', 'gt:0'],
            'transaction_type' => ['required', 'in:deposit,withdrawal'],
            'description' => ['nullable', 'string', 'max:255'],
        ]);

        // 2. Get the account and check if it belongs to user
        $account = Account::where('id', $validated['account_id'])
                         ->where('user_id', $user->id)
                         ->first();
                         
        if (!$account) {
            return back()->withErrors(['account_id' => 'Invalid account selected.']);
        }

        // 3. Check if withdrawal is possible
        if ($validated['transaction_type'] === 'withdrawal' && $account->balance < $validated['amount']) {
            return back()
                ->withInput()
                ->withErrors(['amount' => 'Insufficient funds for withdrawal.']);
        }

        // 4. Update balance
        if ($validated['transaction_type'] === 'deposit') {
            $account->balance += $validated['amount'];
        } else {
            $account->balance -= $validated['amount'];
        }

        // 5. Save everything
        try {
            $account->save();
            $account->transactions()->create($validated);

            return redirect()
                ->route('transactions.index')
                ->with('success', 'Transaction completed successfully!');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
