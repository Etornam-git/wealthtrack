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
            
            return redirect()->route('accounts.new')->with('error', 'You must create an account before creating a transaction.');
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
        return view('transactions.new', compact('accounts', 'user'));
       
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        $user = Auth::user();
        $account = $user->accounts()->findOrFail(request('account_id'));
        $transactions = request()->validate([
            'amount' => ['required','integer', 'gt:0'],
            'transaction_type' => ['required', 'string', 'min:3','max:255'],
            'description' => 'nullable|string|max:255', 
            
        ]);
        if($transactions['transaction_type'] == 'deposit'){
            $account->balance += $transactions['amount']; 
        }else if($transactions['transaction_type'] == 'withdrawal'){
            if ($account->balance < $transactions['amount']) {
                throw ValidationException::withMessages(['amount' => 'Insufficient funds for withdrawal.']);
            }
            $account->balance -= $transactions['amount'];
        }
        
        $account->transactions()->create($transactions);
        $accounts = $user->accounts;
       
        // dd($transactions);

        return view('transactions.index', compact('user', 'accounts','transactions'))->with('success', ('Transaction created successfully.'));
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
