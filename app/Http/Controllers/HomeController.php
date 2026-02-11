<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Branch;
use App\Models\Review;
use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Cek apakah page home ada di database
        try {
            $page = Page::where('slug', 'home')->first();
            
            if ($page) {
                // Jika ada, tampilkan halaman home dari PageController
                return $this->showHomePage($page);
            }
        } catch (\Exception $e) {
            // Log error jika perlu
            \Log::error('Error checking home page: ' . $e->getMessage());
            // continue with original logic
        }
        
        // Original logic as fallback (jika tidak ada page di database)
        return $this->showDefaultHome();
    }

    /**
     * Display home page from Page data
     */
    private function showHomePage($page)
    {
        // Ambil data tambahan yang dibutuhkan untuk halaman home
        $featuredItems = $this->getFeaturedItems();
        $branches = $this->getBranches();
        $reviews = $this->getReviews();
        $gallery = $this->getGallery();

        // Kirim data page dan data tambahan ke view
        return view('pages.home', compact('page', 'featuredItems', 'branches', 'reviews', 'gallery'));
    }

    /**
     * Display default home page (fallback)
     */
    private function showDefaultHome()
    {
        $featuredItems = $this->getFeaturedItems();
        $branches = $this->getBranches();
        $reviews = $this->getReviews();
        $gallery = $this->getGallery();

        // Buat page object default
        $page = (object) [
            'title' => 'Beranda',
            'meta_title' => 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Jemursari',
            'meta_description' => 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman',
            'content' => [
                'hero_title_line1' => 'Selamat Datang di',
                'hero_title_line2' => 'Resto Joss Gandos',
                'hero_subtitle' => 'Pelopor No. 1 Resto dan Cafe di Jemursari',
                'hero_button1_text' => 'Jelajahi',
                'hero_button2_text' => 'Reservasi',
                
                'welcome_title_line1' => 'Selamat Datang',
                'welcome_title_line2' => 'Resto Joss Gandos',
                'welcome_description' => 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.',
                
                'feature_1_text' => 'Bahan premium pilihan terbaik',
                'feature_2_text' => 'Chef berpengalaman & profesional',
                'feature_3_text' => 'Suasana nyaman untuk keluarga',
                'feature_4_text' => 'Pelayanan ramah & cepat',
                
                'stat_menu_count' => '50',
                'stat_customer_count' => '1000',
                'stat_rating_count' => '5',
                
                'services_title_line1' => 'Fasilitas &',
                'services_title_line2' => 'Pelayanan Premium',
                'services_subtitle' => 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',
                
                'testimonials_title_line1' => 'Apa Kata',
                'testimonials_title_line2' => 'Pelanggan Kami?',
                'testimonials_subtitle' => 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos',
                
                'cta_title_line1' => 'Siap Merasakan',
                'cta_title_line2' => 'Pengalaman Kuliner Terbaik?',
                'cta_description' => 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
            ]
        ];

        return view('pages.home', compact('page', 'featuredItems', 'branches', 'reviews', 'gallery'));
    }

    /**
     * Get featured items with error handling
     */
    private function getFeaturedItems()
    {
        try {
            return MenuItem::where('is_featured', true)
                ->where('is_available', true)
                ->orderBy('sort_order')
                ->limit(4)
                ->get();
        } catch (\Exception $e) {
            \Log::error('Error getting featured items: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Get branches with error handling
     */
    private function getBranches()
    {
        try {
            return Branch::where('is_active', true)->get();
        } catch (\Exception $e) {
            \Log::error('Error getting branches: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Get reviews with error handling
     */
    private function getReviews()
    {
        try {
            return Review::where('is_approved', true)
                ->latest()
                ->limit(3)
                ->get();
        } catch (\Exception $e) {
            \Log::error('Error getting reviews: ' . $e->getMessage());
            return collect([]);
        }
    }

    /**
     * Get gallery with error handling
     */
    private function getGallery()
    {
        try {
            return Gallery::where('is_active', true)
                ->latest()
                ->limit(6)
                ->get();
        } catch (\Exception $e) {
            \Log::error('Error getting gallery: ' . $e->getMessage());
            return collect([]);
        }
    }
}