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
        public function revisew(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Validate the request data
        $validated = $request->validate([
            'review' => 'required|string|max:1000',  
            'rating' => 'nullable|integer|min:1|max:5',  
        ]);

        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = $user->id;

        // Create the review in the database
        $review = Review::create($validated);

        if ($user->review()->exists() ){
            return redirect()->route('dashboard')->with('success', 'We have your review. Thanks.');
        }
        else {
            return redirect()->route('dashboard')->with('error', 'There was an error submitting your review. Please try again.');
        }
    }

        public function review(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the request data
        $validated = $request->validate([
            'review' => 'required|string|max:1000',  
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = $user->id;

        try {
            // Create the review in the database
            Review::create($validated);

            // If creation is successful, redirect with success message
            return redirect()->route('dashboard')->with('success', 'Your review has been submitted successfully.');
        } catch (\Exception $e) {
            // If something goes wrong, handle the exception and show an error message
            return redirect()->route('dashboard')->with('error', 'There was an error submitting your review. Please try again.');
        }
    }

    public function showReviews()
    {
        // Get all reviews, you can add any filter conditions if needed (e.g., limit or paginate)
        $reviews = Review::all(); 

        // Pass reviews to the view
        return view('reviews.index', compact('reviews'));
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

