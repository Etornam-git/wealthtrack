<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Rename type to transaction_type for consistency
            
            // Add indexes for frequently queried columns
            $table->index('date');
            $table->index('transaction_type');
            $table->index('category');
            $table->index('account_id');
            $table->index('budget_id');
            
            // Add composite index for common queries
            $table->index(['user_id', 'date']);
            $table->index(['account_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Remove indexes
            $table->dropIndex(['date']);
            $table->dropIndex(['transaction_type']);
            $table->dropIndex(['category']);
            $table->dropIndex(['account_id']);
            $table->dropIndex(['budget_id']);
            $table->dropIndex(['user_id', 'date']);
            $table->dropIndex(['account_id', 'date']);
            
            // Rename column back
            $table->renameColumn('transaction_type', 'type');
        });
    }
}; 