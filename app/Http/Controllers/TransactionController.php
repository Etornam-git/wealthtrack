<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $transactions = Transaction::where('user_id', $user->id)->get();
        return view('dashboard', ['transactions' => $transactions]);
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        
        $user = Auth::user();
        $transactions = $user->transactions;
        $transactions = Transaction::where('user_id', $user->id)->get();
        return view('transactions.index', compact('user', 'transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Transaction $transaction)
    {
        $transaction = request()->validate([
            'amount' => ['required','integer'],
            'transaction_type' => ['required', 'string', 'min:3','max:255'],
            'description' => ['required'],
            
        ]);
        
        $user = Transaction::create($transaction);

        return redirect('transaction.index')->withMessage('Transaction successful');
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
