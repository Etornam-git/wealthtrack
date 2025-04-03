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
        
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
       
        $user = Auth::user();
        $account = Auth::user()->accounts()->find(request('account_id'));
        
       
        if (! $account){
            return view('dashboard')->with('error','No Accounts available');
        }

        $transactions = $account->transactions;
        return view('transactions.index', compact('transactions','user','account'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        $account = Auth::user()->accounts()->findOrFail(request('account_id'));
        $transactions = request()->validate([
            'amount' => ['required','integer'],
            'transaction_type' => ['required', 'string', 'min:3','max:255'],
            'description' => ['required'],
            
        ]);
       
        
        $account->transactions()->create($transactions);
       
        // dd($transactions);

        return redirect('transactions.index')->with('success', ('Transaction created successfully.'));
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
