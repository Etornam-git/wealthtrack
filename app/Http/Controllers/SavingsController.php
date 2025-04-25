<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Savings;
use App\Models\User;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $savings = $user->savings;
        return view('savings.index',compact('savings'));
    }

    public function create()
    {
        $user = Auth::user();
        $accounts = $user->accounts;
        return view('savings.create', compact('accounts'));
    }

    public function store(Request $request){

        // authenticated user
        $user = Auth::user();

        //validate user input
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'planName' => 'required|string',
            'desiredAmount' => 'required|gt:0|numeric',
            'status' => 'required|string|in:active,paused,completed',
            'amount_per_interval' => 'nullable|gt:0|numeric',
            'regularity' => 'required|string|in:daily,weekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'automatic' => 'boolean',
            'description'=> 'nullable|string'
        ]);

        $validated['automatic'] = $request->has('automatic');

        // Add defaults
        $validated['user_id'] = $user->id;
        $validated['savedAmount'] = 0; // Default
        $validated['status'] = 'active'; // Default

        //confirm the account exists and is for the assigned user.
        $account = $user->accounts->firstWhere('id', $validated['account_id']);
        
        //redirect back to the page if not.
        if (!$account) {
            return back()->with('error', 'Selected account not found.');
        }


        //create the new record.
        $user->savings->create($validated);
        
        //redirect to the savings index page.
        return view('savings.index', compact('savings'));
    }

    //Details for a singgle plan
    public function show($id)
    {
        $savings = Savings::findOrFail($id);
        return view('savings.show', compact('savings'));
    }

    //Page for editing a plan
    public function edit($id)
    {
        $savings = Savings::findOrFail($id);
        return view('savings.edit', compact('savings'));
    }

    //Update plan form
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $savings = $user->savings;
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'user_id' => 'required|exists:users,id',
            'planName' => 'required|string',
            'desiredAmount' => 'required|gt:0|numeric',
            'savedAmount' => 'required|gt:0|numeric',
            'status' => 'required|string|in:active,paused,completed',
            'amount_per_interval' => 'nullabe|gt:0|numeric',
            'regularity' => 'required|string|in:daily,weekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'automatic' => 'required|boolean',
            'description'=> 'nullabel|string'
        ]);
        $savings->update($validated);
        return redirect()->route('savings.index')->with('success', 'Savings updated successfully.');
    }

    //Delete a plan
    public function destroy($id)
    {
        $savings = Savings::findOrFail($id);
        $savings->delete();
        return redirect()->route('savings.index')->with('success', 'Savings deleted successfully.');
    }
}
