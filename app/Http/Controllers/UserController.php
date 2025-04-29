<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Savings;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //user profile
    public function index(User $user)
    {
        $user = Auth::user();
        $accounts = $user->accounts()->with('transactions')->get();
        $budget = $user->budgets;
        $totalExpenses = Transaction::where('user_id', $user->id)
            ->where('transaction_type', 'withdrawal')
            ->sum('amount');
        $totalSavings = Savings::where('user_id', $user->id)->sum('savedAmount');
        $transactions = $accounts->flatMap(function ($account) {
            return $account->transactions;
        })->sortByDesc('created_at')->values();

        

        return view('customer.profile', compact('user','accounts', 'transactions', 'budget', 'totalExpenses', 'totalSavings'));
    }

    /**
     * Dashboard
     */
    public function dashboard(User $user)
    {
        $user = Auth::user();
        $accounts = $user->accounts()->with('transactions')->get();
        $budget = $user->budgets;
        $totalExpenses = Transaction::where('user_id', $user->id)
            ->where('transaction_type', 'withdrawal')
            ->sum('amount');
        $totalSavings = Savings::where('user_id', $user->id)->sum('savedAmount');
        $transactions = $accounts->flatMap(function ($account) {
            return $account->transactions;
        })->sortByDesc('created_at')->values();

        

        return view('dashboard', compact('accounts', 'transactions', 'budget', 'totalExpenses', 'totalSavings'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'review' => 'required',
        ]);
        $review = Review::where('user_id', $user->id)->first();

        $review->create($validated);


        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('customer.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ]);

        $user->update($validated);

        return redirect()->route('customer.profile')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('login')->with('success', 'User deleted successfully.');
    }
}

