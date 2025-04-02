<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;
    
    protected $casts = [
        'balance' => 'integer',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'account_type',
        'balance',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_acccounts()
    {
        return $this->belongsTo(User::class);
    }

}
