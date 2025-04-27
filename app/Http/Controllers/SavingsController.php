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
            
        if ($accounts->isEmpty()) {
            return redirect()->route('accounts.create')
                ->with('error', 'You need to create an account first before creating a savings plan.');
        }
            
        return view('savings.create', compact('accounts'));
    }

    // Store a new savings plan
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'planName' => 'required|string|max:255',
            'desiredAmount' => 'required|gt:0|numeric|max:999999999.99',
            'amount_per_interval' => 'nullable|gt:0|numeric|max:999999999.99',
            'regularity' => 'required|string|in:daily,weekly,biweekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'automatic' => 'boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        // Force 'automatic' to true or false
        $validated['automatic'] = $request->has('automatic');

        // Confirm the account belongs to the user
        $account = $user->accounts->firstWhere('id', $validated['account_id']);


        if (!$account) {
            return back()->with('error', 'Selected account not found or does not belong to you.');
        }

        // Validate if amount per interval makes sense with the desired amount
        if (!empty($validated['amount_per_interval'])) {
            $startDate = new \DateTime($validated['start_date']);
            $endDate = new \DateTime($validated['end_date']);
            $interval = $endDate->diff($startDate);
            $totalDays = $interval->days;
            
            $periodsMap = [
                'daily' => 1,
                'weekly' => 7,
                'biweekly' => 14,
                'monthly' => 30,
                'quarterly' => 90,
                'yearly' => 365
            ];
            
            $periodDays = $periodsMap[$validated['regularity']];
            $numberOfPeriods = ceil($totalDays / $periodDays);
            $totalPossibleAmount = $validated['amount_per_interval'] * $numberOfPeriods;
            
            if ($totalPossibleAmount < $validated['desiredAmount']) {
                return back()->withInput()->with('error', 
                    'With the current amount per interval, you cannot reach your desired amount within the specified time period.');
            }
        }

        // Set default values
        $validated['user_id'] = $user->id;
        // $validated['account_id'] = $user->accounts->id;
        $validated['savedAmount'] = 0;
        $validated['status'] = 'active';

        // dd($validated);

        // Create the new savings plan
        $user->savings()->create($validated);

        return redirect()->route('savings.index')
            ->with('success', 'Savings plan created successfully.');
    }

    // Show a single savings plan
    public function show($id)
    {
        $user = Auth::user();
        $savings = Savings::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();
        return view('savings.show', compact('savings'));
    }

    // Show form to edit a savings plan
    public function edit($id)
    {
        $user = Auth::user();
        $savings = Savings::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();
        $accounts = $user->accounts;
        return view('savings.edit', compact('savings', 'accounts'));
    }

    // Update a savings plan
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $savings = Savings::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'planName' => 'required|string|max:255',
            'desiredAmount' => 'required|gt:0|numeric|max:999999999.99',
            'savedAmount' => 'required|gte:0|numeric|max:999999999.99',
            'status' => 'required|string|in:active,paused,completed',
            'amount_per_interval' => 'nullable|gt:0|numeric|max:999999999.99',
            'regularity' => 'required|string|in:daily,weekly,biweekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'automatic' => 'required|boolean',
            'description' => 'nullable|string|max:1000',
        ]);

        // Verify account ownership
        $account = Account::where('id', $validated['account_id'])
            ->where('user_id', $user->id)
            ->first();

        if (!$account) {
            return back()->with('error', 'Selected account not found or does not belong to you.');
        }

        $savings->update($validated);

        return redirect()->route('savings.index')
            ->with('success', 'Savings plan updated successfully.');
    }

    //Deposit into the savings
    public function deposit(Request $request, $id){
        // verify authenticated user
        $user = Auth::user();

        //amount submitted via form
        $deposit = $request->validate([
            'amount' => 'required|numeric|gt:0',
        ]);

        //confirm  savins belongs to user, hence get the related accounts
        
        $savings = Savings::where('id', $id)->where('user_id',$user->id)->firstOrFail();
        $account = $savings->account;
        
        //if automatic saving allowed....
        if($savings->automatic && $account->balance >= $savings->amount_per_interval){
            $account->balance -=  $savings->amount_per_interval;
            $savings->savedAmount += $savings->amount_per_interval;
            $savings->save();
            $account->save();
            if( $savings->savedAmount >= $savings->desiredAmount){
                $savings->status = 'completed';
                $savings->save();
                return redirect()->route('savings.show', $savings->id)->with('success', 'Savings plan completed successfully.');
            }
            
        }


        //else do the normal way
        else {
            if($account->balance < $deposit['amount']){
                return back()->with('error', 'Insufficient balance.');
            }
            $amount = $deposit['amount'];
            $account->balance = $account->balance - $amount;
            $savings->savedAmount += $amount;
            $savings->save();
            $account->save();

            // Check if the savings plan is completed
            if ($savings->savedAmount >= $savings->desiredAmount) {
                $savings->status = 'completed';
                $savings->save();
            }
            return redirect()->route('savings.show', $savings->id)->with('success', 'Deposit successful.');
        }
    }

    // Delete a savings plan
    public function destroy($id)
    {
        $user = Auth::user();
        $savings = Savings::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();
            
        $savings->delete();
        
        return redirect()->route('savings.index')
            ->with('success', 'Savings plan deleted successfully.');
    }
}
