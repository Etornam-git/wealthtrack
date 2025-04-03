<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Account;

class UserAccountController extends Controller
{
    public function index()
    {
        $accounts = Auth::user()->accounts;
        return view('accounts.index', compact('accounts'));
    }

    public function show(Account $account)
    {
        // $this->authorize('view', $account); // optional if using policies
        return view('accounts.show', compact('account'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'balance' => 'required|numeric',
            'email' => 'required|email',
        ]);

        Auth::user()->accounts()->create($validated);

        return redirect()->back()->with('success', 'Account created successfully.');
    }

    public function update(Request $request, Account $account)
    {
        // $this->authorize('update', $account);

        $validated = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type' => 'required|string|min:3',
            'balance' => 'required|numeric',
            'email' => 'required|email',
        ]);

        $account->update($validated);

        return redirect()->back()->with('success', 'Account updated successfully.');
    }

    public function destroy(Account $account)
    {
        // $this->authorize('delete', $account);

        $account->delete();

        return redirect()->back()->with('success', 'Account deleted successfully.');
    }
}


// namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;
// use App\Models\Account;
// use App\Models\Transaction;
// use Illuminate\Http\Request;

// // class UserAccountController extends Controller
// {

//     public function index(){
        
//         return view('accounts.index');
//     }

//     public function show(Account $account){}

//     public function create(Request $request){

//         $user = Auth::user();
//         $new_account = $request->validate([
//             'first_name' => 'required|string|min:3',
//             'last_name' => 'required|string|min:3',
//             'account_type'=> 'required|string|min:3',
//             'balance' => 'required|integer',
//             'email' => 'required|email',
//         ]);

        
//         $user->accounts()->create($new_account);
//     }

//     public function update(Account $account){
//         $user = Auth::user();
//         $data = request()->validate([
//             'first_name' => 'required|string|min:3',
//             'last_name' => 'required|string|min:3',
//             'account_type'=> 'required|string|min:3',
//             'balance' => 'required|integer',
//             'email' => 'required|email',
//         ]);
//         $user->$account->update($data);
//     }

//     public function destroy(Account $account){
//         $user = Auth::user();
//         $user->$account->delete();
//     }

// }
