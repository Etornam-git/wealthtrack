<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete();
            $table->string('planName');
            $table->decimal('desiredAmount', 12, 2); 
            $table->enum('regularity', ['daily', 'weekly', 'biweekly', 'monthly']);
            $table->decimal('amount_per_interval', 12, 2)->nullable(); 
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('savedAmount', 12, 2)->default(0);
            $table->enum('status', ['active', 'paused', 'completed'])->default('active');
            $table->boolean('automatic')->default(false);
            $table->text('description')->nullable();
        
            $table->timestamps();
        });
        
    }
// 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings');
    }
};
