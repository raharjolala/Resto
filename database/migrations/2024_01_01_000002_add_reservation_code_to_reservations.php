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
        if (Schema::hasTable('reservations') && !Schema::hasColumn('reservations', 'reservation_code')) {
            Schema::table('reservations', function (Blueprint $table) {
                $table->string('reservation_code')->nullable()->unique()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('reservations') && Schema::hasColumn('reservations', 'reservation_code')) {
            Schema::table('reservations', function (Blueprint $table) {
                $table->dropColumn('reservation_code');
            });
        }
    }
};