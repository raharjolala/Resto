<?php

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
        $promotions = Promotion::active()
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
                // ... other static promotions
            ]);
        }

        return view('pages.menu', compact('categories', 'promotions'));
    }
}