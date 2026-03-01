<?php
// database/migrations/2026_02_25_xxxxxx_add_description_to_galleries_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            // Cek dulu apakah kolom sudah ada
            if (!Schema::hasColumn('galleries', 'description')) {
                $table->text('description')->nullable()->after('caption');
            }
        });
    }

    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            if (Schema::hasColumn('galleries', 'description')) {
                $table->dropColumn('description');
            }
        });
    }
};