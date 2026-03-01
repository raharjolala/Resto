<?php
// database/migrations/2026_02_26_000001_fix_reservations_columns_final.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Periksa dan perbaiki kolom yang mungkin bermasalah
            
            // Kolom special_requests (pastikan ada)
            if (!Schema::hasColumn('reservations', 'special_requests')) {
                $table->text('special_requests')->nullable()->after('guest_count');
            }
            
            // Kolom reservation_code (pastikan ada)
            if (!Schema::hasColumn('reservations', 'reservation_code')) {
                $table->string('reservation_code', 50)->nullable()->unique()->after('special_requests');
            }
            
            // Kolom branch_id (pastikan ada)
            if (!Schema::hasColumn('reservations', 'branch_id')) {
                $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete()->after('reservation_code');
            }
            
            // Kolom notes (pastikan ada)
            if (!Schema::hasColumn('reservations', 'notes')) {
                $table->text('notes')->nullable()->after('branch_id');
            }
            
            // Kolom status (pastikan ada)
            if (!Schema::hasColumn('reservations', 'status')) {
                $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending')->after('notes');
            }
        });
    }

    public function down(): void
    {
        // Tidak perlu di-rollback karena ini hanya memastikan kolom ada
    }
};