<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory, HasUuids;
    
    protected $casts = [
        'balance' => 'decimal:2',
        'password' => 'hashed',
        'id' => 'string', // Cast the UUID to string
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

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
   
    public static function generateAccountNumber()
    {
        return 'ACC' .'-'. strtoupper(Str::random(3)) . rand(10000, 99999);
    }

    // account belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // account has many transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function savings(){
        return $this->hasMany(Savings::class);
    }

    public function updateBalance($amount, $type)
    {
        if ($type === 'deposit') {
            $this->balance += $amount;
        } else {
            $this->balance -= $amount;
        }
        return $this->save();
    }
}
