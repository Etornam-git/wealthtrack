<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function show(Account $account){}

    public function create(Request $request){

        $user = Auth::user();
        $new_account = $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type'=> 'required|string|min:3',
            'balance' => 'required|integer',
            'email' => 'required|email',
        ]);

        
        $user->accounts()->create($new_account);
    }

    public function update(Account $account){
        $user = Auth::user();
        $data = request()->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'account_type'=> 'required|string|min:3',
            'balance' => 'required|integer',
            'email' => 'required|email',
        ]);
        $user->$account->update($data);
    }

    public function destroy(Account $account){
        $user = Auth::user();
        $user->$account->delete();
    }

}
