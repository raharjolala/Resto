<?php
// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\Promotion;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        try {
            // Get categories with active menu items
            $categories = MenuCategory::with(['menuItems' => function($query) {
                $query->where('is_available', true)
                      ->orderBy('sort_order');
            }])->where('is_active', true)
               ->orderBy('sort_order')
               ->get();

            // ========== FIXED: PROMOTION QUERY WITH PROPER TIMEZONE HANDLING ==========
            
            // Waktu sekarang dalam Asia/Jakarta (untuk filter)
            $nowJakarta = Carbon::now('Asia/Jakarta');
            
            // Log untuk debugging
            Log::info('========== MENU PAGE ACCESS ==========');
            Log::info('Current time (Asia/Jakarta): ' . $nowJakarta->format('Y-m-d H:i:s'));
            Log::info('Current time (UTC): ' . Carbon::now('UTC')->format('Y-m-d H:i:s'));

            // Ambil semua promosi dengan is_active = true
            $allPromotions = Promotion::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('start_date', 'asc')
                ->get();

            Log::info('Total promotions with is_active=true: ' . $allPromotions->count());

            // Filter manual untuk memastikan yang aktif berdasarkan waktu Asia/Jakarta
            // Karena accessor di model sudah mengubah ke Asia/Jakarta, kita bandingkan dengan Asia/Jakarta
            $activePromotions = $allPromotions->filter(function($promo) use ($nowJakarta) {
                // Pastikan start_date dan end_date tidak null
                if (!$promo->start_date || !$promo->end_date) {
                    return false;
                }

                $isActive = $promo->start_date <= $nowJakarta && $promo->end_date >= $nowJakarta;
                
                if ($isActive) {
                    Log::info('ACTIVE PROMO FOUND:', [
                        'id' => $promo->id,
                        'title' => $promo->title,
                        'start_date' => $promo->start_date->format('Y-m-d H:i:s'),
                        'end_date' => $promo->end_date->format('Y-m-d H:i:s'),
                        'now_jakarta' => $nowJakarta->format('Y-m-d H:i:s')
                    ]);
                }
                
                return $isActive;
            });

            Log::info('Active promotions after filter: ' . $activePromotions->count());

            // Ambil maksimal 5 promosi untuk carousel
            $promotions = $activePromotions->take(5);

            // ========== FALLBACK: Jika tidak ada promosi aktif ==========
            if ($promotions->isEmpty()) {
                Log::info('NO ACTIVE PROMOTIONS FOUND - Using static fallback');
                
                // Cek statistik database untuk debugging
                $totalAll = Promotion::count();
                $totalActiveFlag = Promotion::where('is_active', true)->count();
                
                Log::info('Database statistics:', [
                    'total_all' => $totalAll,
                    'total_active_flag' => $totalActiveFlag,
                    'total_filtered' => $allPromotions->count()
                ]);

                // Static promotions as fallback
                $promotions = collect([
                    (object) [
                        'id' => 1,
                        'title' => 'Rendang Sapi Premium',
                        'description' => 'Dimasak 8 jam dengan 27 rempah pilihan khas Padang. Promosi terbatas hanya bulan ini.',
                        'current_price' => 45000,
                        'old_price' => 55000,
                        'badge_text' => 'PROMO SPESIAL',
                        'button_text' => 'Pesan Sekarang',
                        'image_url' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                        'sort_order' => 1,
                        'start_date' => $nowJakarta->copy()->subDays(5),
                        'end_date' => $nowJakarta->copy()->addDays(25),
                        'is_active' => true
                    ],
                    (object) [
                        'id' => 2,
                        'title' => 'Paket Hemat 4 Orang',
                        'description' => 'Nikmati 4 menu utama plus minuman spesial dengan harga hemat hingga 30%.',
                        'current_price' => 150000,
                        'old_price' => 210000,
                        'badge_text' => 'PAKET KELUARGA',
                        'button_text' => 'Lihat Paket',
                        'image_url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                        'sort_order' => 2,
                        'start_date' => $nowJakarta->copy()->subDays(10),
                        'end_date' => $nowJakarta->copy()->addDays(20),
                        'is_active' => true
                    ],
                    (object) [
                        'id' => 3,
                        'title' => 'Minuman Segar Double',
                        'description' => 'Setiap pembelian 1 es teh manis atau jus alpukat dapat 1 gratis. Setiap hari pukul 14-16 WIB.',
                        'current_price' => 0,
                        'old_price' => null,
                        'badge_text' => 'BUY 1 GET 1',
                        'button_text' => 'Lihat Menu',
                        'image_url' => 'https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80',
                        'sort_order' => 3,
                        'start_date' => $nowJakarta->copy()->subDays(15),
                        'end_date' => $nowJakarta->copy()->addDays(15),
                        'is_active' => true
                    ]
                ]);
            }

            // Log final result
            Log::info('Final promotions count sent to view: ' . $promotions->count());
            Log::info('========== END MENU PAGE ==========');

            return view('pages.menu', compact('categories', 'promotions'));

        } catch (\Exception $e) {
            Log::error('ERROR in MenuController@index: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            // Return with empty data on error
            $categories = collect([]);
            $promotions = collect([]);
            
            return view('pages.menu', compact('categories', 'promotions'))
                ->with('error', 'Terjadi kesalahan saat memuat menu');
        }
    }
}