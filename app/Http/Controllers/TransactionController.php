<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
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
    public function create(User $user)
    {
    
        $user = Auth::user();
        $transactions = $user->transactions;
        return view('transactions.index', compact('user', 'transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $user = Auth::user();
        $Valtransactions = request()->validate([
            'amount' => ['required','integer'],
            'transaction_type' => ['required', 'string', 'min:3','max:255'],
            'description' => ['required'],
            
        ]);
       
        // dd($Valtransactions);
        // if(! Auth::attempt($Valtransactions)){
        //     throw ValidationException::withMessages([
        //         'amount'=>"chaale no good o"
        //     ]);
        //     return back()->withErrors(['error'=>'Error processing transaction']);
        // };
        $transactions = $user->transactions()->create($Valtransactions);
       
        // dd($transactions);

        return view('transactions.index',['transactions' => $transactions, 'user'=>$user]);
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
