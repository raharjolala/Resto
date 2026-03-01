<?php
// database/migrations/2024_02_24_000002_add_special_requests_to_reservations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpecialRequestsToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Cek dan tambahkan kolom yang kurang
            if (!Schema::hasColumn('reservations', 'special_requests')) {
                $table->text('special_requests')->nullable()->after('reservation_time');
            }
            
            if (!Schema::hasColumn('reservations', 'reservation_code')) {
                $table->string('reservation_code', 50)->nullable()->unique()->after('special_requests');
            }
            
            if (!Schema::hasColumn('reservations', 'status')) {
                $table->string('status', 20)->default('pending')->after('reservation_code');
            }
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['special_requests', 'reservation_code', 'status']);
        });
    }
}