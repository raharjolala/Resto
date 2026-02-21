<?php
// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\Promotion;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Get categories with active menu items
        $categories = MenuCategory::with(['menuItems' => function($query) {
            $query->where('is_available', true)
                  ->orderBy('sort_order');
        }])->where('is_active', true)
           ->orderBy('sort_order')
           ->get();

        // Get active promotions for carousel
        $promotions = Promotion::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderBy('sort_order')
            ->limit(3)
            ->get();

        // If no promotions in database, use static promotions as fallback
        if ($promotions->isEmpty()) {
            $promotions = collect([
                (object) [
                    'title' => 'Rendang Sapi Premium',
                    'description' => 'Dimasak 8 jam dengan 27 rempah pilihan khas Padang. Promosi terbatas hanya bulan ini.',
                    'current_price' => 45000,
                    'old_price' => 55000,
                    'badge_text' => 'PROMO SPESIAL',
                    'button_text' => 'Pesan Sekarang',
                    'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                ],
                (object) [
                    'title' => 'Paket Hemat 4 Orang',
                    'description' => 'Nikmati 4 menu utama plus minuman spesial dengan harga hemat hingga 30%.',
                    'current_price' => 150000,
                    'old_price' => 210000,
                    'badge_text' => 'PAKET KELUARGA',
                    'button_text' => 'Lihat Paket',
                    'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                ],
                (object) [
                    'title' => 'Minuman Segar Double',
                    'description' => 'Setiap pembelian 1 es teh manis atau jus alpukat dapat 1 gratis. Setiap hari pukul 14-16 WIB.',
                    'current_price' => 0,
                    'old_price' => null,
                    'badge_text' => 'BUY 1 GET 1',
                    'button_text' => 'Lihat Menu',
                    'image_url' => 'https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                ]
            ]);
        }

        return view('pages.menu', compact('categories', 'promotions'));
    }
}