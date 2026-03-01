<?php
// database/migrations/2026_02_24_000004_fix_reservations_columns.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Tambahkan kolom special_requests (dengan 's') jika belum ada
            if (!Schema::hasColumn('reservations', 'special_requests')) {
                $table->text('special_requests')->nullable()->after('guest_count');
            }
            
            // Tambahkan kolom reservation_code jika belum ada
            if (!Schema::hasColumn('reservations', 'reservation_code')) {
                $table->string('reservation_code', 50)->nullable()->unique()->after('special_requests');
            }
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['special_requests', 'reservation_code']);
        });
    }
};