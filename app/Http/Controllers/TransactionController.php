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
    public function create()
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
       
        
        $user->transactions()->create($Valtransactions);
       
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
