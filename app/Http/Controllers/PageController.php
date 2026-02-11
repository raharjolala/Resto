<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Branch;
use App\Models\MenuItem;
use App\Models\Review;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Display home page for user
     */
    public function indexHome()
    {
        try {
            $page = Page::findBySlug('home');
            
            if (!$page) {
                // Jika tidak ada data di database, arahkan ke HomeController
                return app(HomeController::class)->index();
            }
            
            // Ambil data tambahan yang dibutuhkan untuk halaman home
            $featuredItems = $this->getFeaturedItems();
            $branches = $this->getBranches();
            $reviews = $this->getReviews();
            $gallery = $this->getGallery();

            return view('pages.home', compact('page', 'featuredItems', 'branches', 'reviews', 'gallery'));
            
        } catch (\Exception $e) {
            Log::error('Error in PageController@indexHome: ' . $e->getMessage());
            // Jika ada error, fallback ke HomeController
            return app(HomeController::class)->index();
        }
    }

    /**
     * Display about page for user
     */
    public function indexAbout()
    {
        try {
            $page = Page::findBySlug('about');
            
            if (!$page) {
                // Jika tidak ada data di database, gunakan default
                return $this->showDefaultAbout();
            }
            
            $branchCount = $this->getBranchCount();
            return view('pages.about', compact('page', 'branchCount'));
            
        } catch (\Exception $e) {
            Log::error('Error in PageController@indexAbout: ' . $e->getMessage());
            return $this->showDefaultAbout();
        }
    }

    /**
     * Show default about page
     */
    private function showDefaultAbout()
    {
        try {
            $branchCount = Branch::count();
        } catch (\Exception $e) {
            $branchCount = 2; // Default value
        }
        
        return view('pages.about', compact('branchCount'));
    }

    /**
     * Display home edit page for admin
     */
    public function editHome()
    {
        $page = Page::findBySlug('home');
        
        if (!$page) {
            // Default content
            $page = new Page([
                'slug' => 'home',
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
            ]);
        }
        
        return view('admin.pages.home', compact('page'));
    }

    /**
     * Update home page
     */
    public function updateHome(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                
                // Hero Section
                'hero_title_line1' => 'required|string|max:100',
                'hero_title_line2' => 'required|string|max:100',
                'hero_subtitle' => 'required|string|max:200',
                'hero_button1_text' => 'required|string|max:50',
                'hero_button2_text' => 'required|string|max:50',
                
                // Welcome Section
                'welcome_title_line1' => 'required|string|max:100',
                'welcome_title_line2' => 'required|string|max:100',
                'welcome_description' => 'required|string|max:500',
                'feature_1_text' => 'required|string|max:100',
                'feature_2_text' => 'required|string|max:100',
                'feature_3_text' => 'required|string|max:100',
                'feature_4_text' => 'required|string|max:100',
                'stat_menu_count' => 'required|integer',
                'stat_customer_count' => 'required|integer',
                'stat_rating_count' => 'required|integer',
                
                // Services Section
                'services_title_line1' => 'required|string|max:100',
                'services_title_line2' => 'required|string|max:100',
                'services_subtitle' => 'required|string|max:200',
                
                // Testimonials Section
                'testimonials_title_line1' => 'required|string|max:100',
                'testimonials_title_line2' => 'required|string|max:100',
                'testimonials_subtitle' => 'required|string|max:200',
                
                // CTA Section
                'cta_title_line1' => 'required|string|max:100',
                'cta_title_line2' => 'required|string|max:100',
                'cta_description' => 'required|string|max:300',
            ]);

            // Prepare content array
            $content = [
                // Hero Section
                'hero_title_line1' => $request->hero_title_line1,
                'hero_title_line2' => $request->hero_title_line2,
                'hero_subtitle' => $request->hero_subtitle,
                'hero_button1_text' => $request->hero_button1_text,
                'hero_button2_text' => $request->hero_button2_text,
                
                // Welcome Section
                'welcome_title_line1' => $request->welcome_title_line1,
                'welcome_title_line2' => $request->welcome_title_line2,
                'welcome_description' => $request->welcome_description,
                'feature_1_text' => $request->feature_1_text,
                'feature_2_text' => $request->feature_2_text,
                'feature_3_text' => $request->feature_3_text,
                'feature_4_text' => $request->feature_4_text,
                'stat_menu_count' => $request->stat_menu_count,
                'stat_customer_count' => $request->stat_customer_count,
                'stat_rating_count' => $request->stat_rating_count,
                
                // Services Section
                'services_title_line1' => $request->services_title_line1,
                'services_title_line2' => $request->services_title_line2,
                'services_subtitle' => $request->services_subtitle,
                
                // Testimonials Section
                'testimonials_title_line1' => $request->testimonials_title_line1,
                'testimonials_title_line2' => $request->testimonials_title_line2,
                'testimonials_subtitle' => $request->testimonials_subtitle,
                
                // CTA Section
                'cta_title_line1' => $request->cta_title_line1,
                'cta_title_line2' => $request->cta_title_line2,
                'cta_description' => $request->cta_description,
            ];

            // Update or create the page
            $page = Page::updateOrCreate(
                ['slug' => 'home'],
                [
                    'title' => $request->title,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'content' => $content,
                ]
            );

            return redirect()->route('admin.pages.home.edit')
                ->with('success', 'Halaman home berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating home page: ' . $e->getMessage());
            return redirect()->route('admin.pages.home.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display about edit page for admin
     */
    public function editAbout()
    {
        $page = Page::findBySlug('about');
        
        if (!$page) {
            // Parse data dari view about.blade.php
            $parsedData = $this->parseAboutPageData();
            
            $page = new Page([
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'meta_title' => 'Tentang Kami - JOSS GANDOS',
                'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017',
                'content' => $parsedData
            ]);
        }
        
        return view('admin.pages.about', compact('page'));
    }

    /**
     * Update about page
     */
    public function updateAbout(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                
                // Hero Section
                'hero_subtitle' => 'required|string',
                'hero_image' => 'required|url',
                
                // History Section
                'history_description_1' => 'required|string',
                'history_description_2' => 'required|string',
                'history_description_3' => 'required|string',
                
                // Founder Section
                'founder_description' => 'required|string',
                'founder_story_1' => 'required|string',
                'founder_story_2' => 'required|string',
                'founder_commitment' => 'required|string',
                'founder_image' => 'required|url',
                
                // Vision Section
                'vision_quote' => 'required|string',
                'vision_pillars' => 'required|array|min:4',
                'vision_pillars.*.icon' => 'required|string',
                'vision_pillars.*.title' => 'required|string|max:100',
                'vision_pillars.*.description' => 'required|string|max:200',
                
                // Mission Section
                'missions' => 'required|array|min:6',
                'missions.*.icon' => 'required|string',
                'missions.*.title' => 'required|string|max:100',
                'missions.*.description' => 'required|string|max:200',
                
                // Team Section
                'team_members' => 'required|array|min:3',
                'team_members.*.name' => 'required|string|max:100',
                'team_members.*.position' => 'required|string|max:100',
                'team_members.*.description' => 'required|string|max:300',
                'team_members.*.image' => 'required|url',
                
                // CTA Section
                'cta_title' => 'required|string|max:255',
                'cta_description' => 'required|string|max:500',
                
                // Timeline
                'timeline' => 'required|array|min:8',
                'timeline.*.year' => 'required|string|max:20',
                'timeline.*.title' => 'required|string|max:100',
                'timeline.*.items' => 'required|array|min:1',
                'timeline.*.items.*' => 'required|string|max:200',
            ]);

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                // Delete old image if exists
                $oldPage = Page::findBySlug('about');
                if ($oldPage && isset($oldPage->content['image']) && $oldPage->content['image']) {
                    Storage::delete('public/pages/' . $oldPage->content['image']);
                }
                
                // Upload new image
                $image = $request->file('image');
                $imageName = 'about-' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/pages', $imageName);
                $imagePath = $imageName;
            } else {
                // Keep old image if exists
                $oldPage = Page::findBySlug('about');
                $imagePath = $oldPage->content['image'] ?? null;
            }

            // Prepare content array
            $content = [
                // Hero Section
                'hero_subtitle' => $request->hero_subtitle,
                'hero_image' => $request->hero_image,
                
                // History Section
                'history_description_1' => $request->history_description_1,
                'history_description_2' => $request->history_description_2,
                'history_description_3' => $request->history_description_3,
                
                // Founder Section
                'founder_description' => $request->founder_description,
                'founder_story_1' => $request->founder_story_1,
                'founder_story_2' => $request->founder_story_2,
                'founder_commitment' => $request->founder_commitment,
                'founder_image' => $request->founder_image,
                
                // Vision Section
                'vision_quote' => $request->vision_quote,
                'vision_pillars' => $request->vision_pillars,
                
                // Mission Section
                'missions' => $request->missions,
                
                // Team Section
                'team_members' => $request->team_members,
                
                // CTA Section
                'cta_title' => $request->cta_title,
                'cta_description' => $request->cta_description,
                
                // Timeline
                'timeline' => $request->timeline,
                
                // Image
                'image' => $imagePath,
            ];

            // Update or create the page
            $page = Page::updateOrCreate(
                ['slug' => 'about'],
                [
                    'title' => $request->title,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'content' => $content,
                ]
            );

            return redirect()->route('admin.pages.about.edit')
                ->with('success', 'Halaman about berhasil diperbarui! Perubahan akan langsung terlihat di halaman user.');

        } catch (\Exception $e) {
            Log::error('Error updating about page: ' . $e->getMessage());
            return redirect()->route('admin.pages.about.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Parse data dari view about.blade.php
     */
    private function parseAboutPageData()
    {
        // Data default dari view about.blade.php
        return [
            // Hero Section
            'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
            'hero_image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // History Section
            'history_description_1' => 'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
            'history_description_2' => 'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah Bebek Joss Gandos — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
            'history_description_3' => 'Nama Joss Gandos dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
            
            // Founder Section
            'founder_description' => 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.',
            'founder_story_1' => 'Berawal dari rintisan sederhana bernama "Bebek Joss Gandos", beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.',
            'founder_story_2' => 'Di bawah kepemimpinan beliau dengan filosofi semangat "Joss, Mantap, dan Luar Biasa", resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik Gulai Kepala Ikan Salmon.',
            'founder_commitment' => 'Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.',
            'founder_image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Vision Section
            'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',
            'vision_pillars' => [
                ['icon' => 'fas fa-utensils', 'title' => 'Cita Rasa Autentik', 'description' => 'Resep warisan dengan sentuhan modern'],
                ['icon' => 'fas fa-smile-beam', 'title' => 'Pelayanan Ramah', 'description' => 'Tim yang melayani dengan senyuman'],
                ['icon' => 'fas fa-home-heart', 'title' => 'Suasana Nyaman', 'description' => 'Lingkungan seperti di rumah sendiri'],
                ['icon' => 'fas fa-users', 'title' => 'Untuk Semua', 'description' => 'Semua usia dan kebutuhan']
            ],
            
            // Mission Section
            'missions' => [
                ['icon' => 'fas fa-leaf', 'title' => 'Bahan Berkualitas', 'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar'],
                ['icon' => 'fas fa-user-clock', 'title' => 'Pelayanan Profesional', 'description' => 'Pelayanan cepat, ramah, dan profesional'],
                ['icon' => 'fas fa-couch', 'title' => 'Suasana Nyaman', 'description' => 'Suasana bersih, nyaman, dan bersahabat'],
                ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi Terus', 'description' => 'Terus berinovasi menu dan layanan'],
                ['icon' => 'fas fa-hand-sparkles', 'title' => 'Standar Kebersihan', 'description' => 'Menjaga standar kebersihan (hygiene)'],
                ['icon' => 'fas fa-hand-holding-heart', 'title' => 'Kontribusi Sosial', 'description' => 'Kontribusi positif bagi lingkungan sekitar']
            ],
            
            // Team Section
            'team_members' => [
                [
                    'name' => 'Ahmad Santoso',
                    'position' => 'Head Chef',
                    'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional dengan sentuhan modern',
                    'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                [
                    'name' => 'Sari Dewi',
                    'position' => 'Restaurant Manager',
                    'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan',
                    'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ],
                [
                    'name' => 'Budi Hartono',
                    'position' => 'Food & Beverage Director',
                    'description' => 'Bertanggung jawab atas pengembangan menu dan kualitas bahan',
                    'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                ]
            ],
            
            // CTA Section
            'cta_title' => 'Rasakan Kehangatan dan Cita Rasa Kami',
            'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan filosofi JOSS GANDOS.',
            
            // Timeline
            'timeline' => [
                [
                    'year' => '2017',
                    'title' => 'Awal Berdiri',
                    'items' => [
                        'Didirikan oleh CEO Dr. Siswanto',
                        'Menu khas Banyuwangi (Bebek & Rujak Soto)',
                        'Nama awal: "Bebek Joss Gandos"',
                        'Fasilitas: Karaoke VIP, Wedding, Live Music',
                        'Tim awal: 15 orang dengan semangat kekeluargaan'
                    ]
                ],
                [
                    'year' => '2018-2019',
                    'title' => 'Merintis & Inovasi',
                    'items' => [
                        'Masa perjuangan mendapatkan kepercayaan customer',
                        'Mengembangkan variasi menu (tidak hanya bebek)',
                        'Menjadi pionir kuliner di kawasan Jemursari'
                    ]
                ],
                [
                    'year' => '2020',
                    'title' => 'Bertahan di Pandemi',
                    'items' => [
                        'Tutup sementara 3 bulan & SDM terbatas',
                        'Beradaptasi dengan jual sembako & pesan antar',
                        'Bukti kekuatan dan solidaritas tim'
                    ]
                ],
                [
                    'year' => '2021',
                    'title' => 'Bangkit & Menu Baru',
                    'items' => [
                        'Renovasi area VIP & Outdoor',
                        'Peluncuran Gulai Kepala Ikan Salmon (Menu Andalan)',
                        'Aneka menu nusantara autentik'
                    ]
                ],
                [
                    'year' => '2022',
                    'title' => 'Semakin Dipercaya',
                    'items' => [
                        'Peningkatan pesat customer event & gathering',
                        'Fasilitas Karaoke VIP menjadi daya tarik utama'
                    ]
                ],
                [
                    'year' => '2023',
                    'title' => 'Ekspansi & Menu Ikonik',
                    'items' => [
                        'Renovasi besar: 6 VIP Room',
                        'Gulai Kepala Ikan Salmon menjadi ikon',
                        'Tanpa santan, kaya rempah, gurih'
                    ]
                ],
                [
                    'year' => '2024',
                    'title' => 'Cabang Baru',
                    'items' => [
                        'Peningkatan layanan pesan antar & reservasi',
                        'Agustus 2024: Cabang baru di Ketintang'
                    ]
                ],
                [
                    'year' => '2025',
                    'title' => 'Sewindu Joss Gandos!',
                    'items' => [
                        '8 tahun perjalanan penuh perjuangan & inovasi',
                        'Siap melangkah lebih jauh',
                        'Pengalaman yang Joss, Mantap, dan Luar Biasa!'
                    ]
                ]
            ],
            
            // Image
            'image' => null,
        ];
    }

    /**
     * Helper methods for getting data
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
            Log::error('Error getting featured items: ' . $e->getMessage());
            return collect([]);
        }
    }

    private function getBranches()
    {
        try {
            return Branch::where('is_active', true)->get();
        } catch (\Exception $e) {
            Log::error('Error getting branches: ' . $e->getMessage());
            return collect([]);
        }
    }

    private function getReviews()
    {
        try {
            return Review::where('is_approved', true)
                ->latest()
                ->limit(3)
                ->get();
        } catch (\Exception $e) {
            Log::error('Error getting reviews: ' . $e->getMessage());
            return collect([]);
        }
    }

    private function getGallery()
    {
        try {
            return Gallery::where('is_active', true)
                ->latest()
                ->limit(6)
                ->get();
        } catch (\Exception $e) {
            Log::error('Error getting gallery: ' . $e->getMessage());
            return collect([]);
        }
    }

    private function getBranchCount()
    {
        try {
            return Branch::count();
        } catch (\Exception $e) {
            Log::error('Error getting branch count: ' . $e->getMessage());
            return 2; // Default value
        }
    }
}