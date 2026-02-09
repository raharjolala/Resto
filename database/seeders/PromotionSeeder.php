<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromotionSeeder extends Seeder
{
    public function run()
    {
        $promotions = [
            [
                'title' => 'Rendang Sapi Premium',
                'description' => 'Dimasak 8 jam dengan 27 rempah pilihan khas Padang. Promosi terbatas hanya bulan ini.',
                'current_price' => 45000,
                'old_price' => 55000,
                'badge_text' => 'PROMO SPESIAL',
                'button_text' => 'Pesan Sekarang',
                'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'is_active' => true,
                'sort_order' => 1,
                'start_date' => Carbon::now()->subDays(5),
                'end_date' => Carbon::now()->addDays(30),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Paket Hemat 4 Orang',
                'description' => 'Nikmati 4 menu utama plus minuman spesial dengan harga hemat hingga 30%.',
                'current_price' => 150000,
                'old_price' => 210000,
                'badge_text' => 'PAKET KELUARGA',
                'button_text' => 'Lihat Paket',
                'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'is_active' => true,
                'sort_order' => 2,
                'start_date' => Carbon::now()->subDays(2),
                'end_date' => Carbon::now()->addDays(45),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Minuman Segar Double',
                'description' => 'Setiap pembelian 1 es teh manis atau jus alpukat dapat 1 gratis. Setiap hari pukul 14-16 WIB.',
                'current_price' => 0,
                'old_price' => null,
                'badge_text' => 'BUY 1 GET 1',
                'button_text' => 'Lihat Menu',
                'image_url' => 'https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                'is_active' => true,
                'sort_order' => 3,
                'start_date' => Carbon::now()->subDays(1),
                'end_date' => Carbon::now()->addDays(60),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('promotions')->insert($promotions);
        
        $this->command->info('✅ Promotions seeded successfully!');
    }
}