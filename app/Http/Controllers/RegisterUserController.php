<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return view('auth.regsiter');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $new = request()->validate([
            'first_name' => ['required', 'string', 'min:3','max:255'],
            'last_name' => ['required', 'string', 'min:3','max:255'],
            'phone' => ['required', 'max:15','string'],
            'location' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'confirmed']
        ]);
        
        $user = User::create($new);

        
        Auth::login($user);

        return redirect('/dashboard');

       
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return view('users', ['users'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $update = request()->validate([
            'first_name' => ['required', 'string', 'min:3','max:255'],
            'last_name' => ['required', 'string', 'min:3','max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['required', 'string']
        ]);
    
        $user->update($update);
        
        return redirect('users');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users');
    }
}
