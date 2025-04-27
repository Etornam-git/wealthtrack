<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Savings extends Model
{
    /** @use HasFactory<\Database\Factories\SavingsFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_id',
        'planName',
        'desiredAmount',
        'status',
        'amount_per_interval',
        'regularity',
        'start_date',
        'end_date',
        'automatic',
        'description',
    ];

    protected $casts = [
        'desiredAmount' => 'decimal:2',
        'savedAmount' => 'decimal:2',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    protected $appends = ['amount_saved', 'progress'];

    public function getAmountSavedAttribute()
    {
        return $this->savedAmount ?? 0;
    }

    public function getProgressAttribute()
    {
        if ($this->desiredAmount == 0) return 0;
        return ($this->savedAmount / $this->desiredAmount) * 100;
    }

}
