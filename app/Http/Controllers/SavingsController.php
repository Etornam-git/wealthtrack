<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Savings;
use App\Models\Account;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    // List all savings plans for user
    public function index()
    {
        $user = Auth::user();
        $savings = $user->savings;
        return view('savings.index', compact('savings'));
    }

    // Show form to create new savings plan
    public function create()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('savings.create', compact('accounts'));
    }

    // Store a new savings plan
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'planName' => 'required|string',
            'desiredAmount' => 'required|gt:0|numeric',
            'status' => 'required|string|in:active,paused,completed',
            'amount_per_interval' => 'nullable|gt:0|numeric',
            'regularity' => 'required|string|in:daily,weekly,biweekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'automatic' => 'boolean',
            'description' => 'nullable|string',
        ]);

        // Force 'automatic' to true or false
        $validated['automatic'] = $request->has('automatic');

        // Confirm the account belongs to the user
        $account = Account::where('id', $validated['account_id'])
            ->where('user_id', $user->id)
            ->first();

        if (!$account) {
            return back()->with('error', 'Selected account not found.');
        }

        // Set default values
        $validated['user_id'] = $user->id;
        $validated['savedAmount'] = 0;
        $validated['status'] = 'active'; // Always start with 'active' status

        // Create the new savings plan
        $user->savings()->create($validated);

        return redirect()->route('savings.index')->with('success', 'Savings plan created successfully.');
    }

    // Show a single savings plan
    public function show($id)
    {
        $savings = Savings::findOrFail($id);
        return view('savings.show', compact('savings'));
    }

    // Show form to edit a savings plan
    public function edit($id)
    {
        $savings = Savings::findOrFail($id);
        return view('savings.edit', compact('savings'));
    }

    // Update a savings plan
    public function update(Request $request, $id)
    {
        $savings = Savings::findOrFail($id); // Correct way: find specific record

        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'user_id' => 'required|exists:users,id',
            'planName' => 'required|string',
            'desiredAmount' => 'required|gt:0|numeric',
            'savedAmount' => 'required|gte:0|numeric', // Corrected to allow 0
            'status' => 'required|string|in:active,paused,completed',
            'amount_per_interval' => 'nullable|gt:0|numeric',
            'regularity' => 'required|string|in:daily,weekly,biweekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'automatic' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $savings->update($validated);

        return redirect()->route('savings.index')->with('success', 'Savings updated successfully.');
    }

    // Delete a savings plan
    public function destroy($id)
    {
        $savings = Savings::findOrFail($id);
        $savings->delete();
        return redirect()->route('savings.index')->with('success', 'Savings deleted successfully.');
    }
}
