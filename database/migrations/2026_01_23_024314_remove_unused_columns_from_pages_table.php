<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Hapus kolom yang menyebabkan error
            if (Schema::hasColumn('pages', 'is_active')) {
                $table->dropColumn('is_active');
            }
            
            if (Schema::hasColumn('pages', 'name')) {
                $table->dropColumn('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Kembalikan jika diperlukan
            if (!Schema::hasColumn('pages', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
            
            if (!Schema::hasColumn('pages', 'name')) {
                $table->string('name')->nullable();
            }
        });
    }
};