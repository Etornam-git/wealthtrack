<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Savings extends Model
{
    /** @use HasFactory<\Database\Factories\SavingsFactory> */
    use HasFactory, HasUuids;

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
        'amount_per_interval' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'automatic' => 'boolean',
    ];

    public static function validationRules($id = null)
    {
        return [
            'planName' => 'required|string|max:255',
            'desiredAmount' => 'required|numeric|gt:0|max:999999999.99',
            'amount_per_interval' => 'nullable|numeric|gt:0|max:999999999.99',
            'regularity' => 'required|in:daily,weekly,biweekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'automatic' => 'boolean',
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    protected $appends = ['amount_saved', 'progress', 'remaining_amount', 'days_remaining'];

    public function getAmountSavedAttribute()
    {
        return $this->savedAmount ?? 0;
    }

    public function getProgressAttribute()
    {
        if ($this->desiredAmount == 0) return 0;
        return round(($this->savedAmount / $this->desiredAmount) * 100, 2);
    }

    public function getRemainingAmountAttribute()
    {
        return max(0, $this->desiredAmount - $this->savedAmount);
    }

    public function getDaysRemainingAttribute()
    {
        $endDate = \Carbon\Carbon::parse($this->end_date);
        $now = \Carbon\Carbon::now();
        return max(0, $now->diffInDays($endDate, false));
    }

    public function canDeposit($amount)
    {
        return ($this->savedAmount + $amount) <= $this->desiredAmount;
    }

    public function isCompleted()
    {
        return $this->status === 'completed' || $this->savedAmount >= $this->desiredAmount;
    }
}
