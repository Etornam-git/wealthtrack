<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Auth::user()->budgets()->with('transactions')->get();
        return view('budgets.index', compact('budgets'));
    }

    public function create()
    {
        $accounts = Auth::user()->accounts()->get();
        return view('budgets.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'period' => 'required|in:weekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string',
        ]);

        // Check if the account belongs to the authenticated user
        $account = $user->accounts->firstWhere('id', $validated['account_id']);

        if (!$account) {
            return back()->with('error', 'Selected account not found.');
        }
        
        // Check if the new budget amount would exceed the account balance
         // Check if the budget amount exceeds the account balance
        if ($validated['amount'] > $account->balance) {
            return back()->withErrors([
                'amount' => "Your account balance (GHS {$account->balance}) is less than the budget limit you set (GHS {$validated['amount']}). Please reduce the budget amount or choose a different account."
            ])->withInput();
        }
        dd($validated);
        $user->budgets()->create($validated);
        
        return redirect()->route('budgets.index')
            ->with('success', 'Budget created successfully.');
        
    }

    public function show(Budget $budget)
    {
        $budget->load('transactions');
        $remainigAmount = $budget->remaining_amount;

        // calculation to get current budget limit progress.
        $progressPercentage = $budget->progress_percentage;
        return view('budgets.show', compact('budget'));
    }

    public function edit(Budget $budget)
    {
        return view('budgets.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'period' => 'required|in:monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string',
            'status' => 'required|in:active,completed,cancelled',
        ]);

        $budget->update($validated);

        return redirect()->route('budgets.index')
            ->with('success', 'Budget updated successfully.');
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        return redirect()->route('budgets.index')
            ->with('success', 'Budget deleted successfully.');
    }

    public function track(Budget $budget)
    {
        // after performing a transaction tied to a specified budget
        $remainigAmount = $budget->remaining_amount;

        // calculation to get current budget limit progress.
        $progressPercentage = $budget->progress_percentage;


        $transactions = $budget->transactions()
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('budgets.track', compact('budget', 'transactions'));
    }
    
}
