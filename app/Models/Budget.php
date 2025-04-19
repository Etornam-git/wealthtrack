<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    /** @use HasFactory<\Database\Factories\BudgetFactory> */
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'category',
        'amount',
        'period', // monthly, quarterly, yearly
        'start_date',
        'end_date',
        'description',
        'status' // active, completed, cancelled
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getRemainingAmountAttribute()
    {
        $spent = $this->transactions()->sum('amount');
        return $this->amount - $spent;
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->amount == 0) return 0;
        return ($this->transactions()->sum('amount') / $this->amount) * 100;
    }
}
