<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;
    
    protected $casts = [
        'balance' => 'decimal:2',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'account_number', 
        'account_type',
        'balance',
        'password',
        'email',
        'user_id', 
    ];

    

   
    public static function generateAccountNumber()
    {
        return 'ACC' .'-'. strtoupper(Str::random(3)) . rand(10000, 99999);
    }





    // account belongs to a user
    public function acccounts()
    {
        return $this->belongsTo(User::class);
    }

    // account has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
