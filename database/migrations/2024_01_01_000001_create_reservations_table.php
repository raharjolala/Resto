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
        if (!Schema::hasTable('reservations')) {
            Schema::create('reservations', function (Blueprint $table) {
                $table->id();
                $table->string('reservation_code')->unique()->nullable();
                $table->string('customer_name');
                $table->string('email');
                $table->string('phone');
                $table->date('reservation_date');
                $table->string('reservation_time');
                $table->string('guest_count');
                $table->text('special_requests')->nullable();
                $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
                $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
                $table->text('notes')->nullable();
                $table->timestamps();
                
                // Indexes for better performance
                $table->index('reservation_date');
                $table->index('status');
                $table->index('reservation_code');
                $table->index('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};