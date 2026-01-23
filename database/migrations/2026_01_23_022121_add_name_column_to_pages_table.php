<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'name')) {
                $table->string('name')->nullable()->after('id');
            }
        });
        
        // Update data yang ada
        DB::table('pages')->whereNull('name')->update([
            'name' => DB::raw("CASE 
                WHEN slug = 'tentang-kami' THEN 'about'
                WHEN slug = 'beranda' THEN 'home'
                WHEN slug = 'hubungi-kami' THEN 'contact'
                ELSE slug
            END")
        ]);
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};