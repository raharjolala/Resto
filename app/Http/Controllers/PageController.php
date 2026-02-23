<?php
// app/Http/Controllers/PageController.php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Branch;
use App\Models\MenuItem;
use App\Models\Review;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * =============================================
     * PUBLIC PAGE METHODS (USER FACING)
     * =============================================
     */

    /**
     * Display home page for user
     */
    public function indexHome()
    {
        try {
            $page = Page::findBySlug('home');
            
            if (!$page) {
                return app(HomeController::class)->index();
            }
            
            $featuredItems = $this->getFeaturedItems();
            $branches = $this->getBranches();
            $reviews = $this->getReviews();
            $gallery = $this->getGallery();

            return view('pages.home', compact('page', 'featuredItems', 'branches', 'reviews', 'gallery'));
            
        } catch (\Exception $e) {
            Log::error('Error in PageController@indexHome: ' . $e->getMessage());
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
     * Display contact page for user
     */
    public function indexContact()
    {
        try {
            $page = Page::findBySlug('contact');
            
            if (!$page) {
                return $this->showDefaultContact();
            }
            
            return view('pages.contact', compact('page'));
            
        } catch (\Exception $e) {
            Log::error('Error in PageController@indexContact: ' . $e->getMessage());
            return $this->showDefaultContact();
        }
    }

    /**
     * =============================================
     * DEFAULT PAGE SHOW METHODS
     * =============================================
     */

    /**
     * Show default about page
     */
    private function showDefaultAbout()
    {
        try {
            $branchCount = Branch::count();
        } catch (\Exception $e) {
            $branchCount = 2;
        }
        
        return view('pages.about', compact('branchCount'));
    }

    /**
     * Show default contact page
     */
    private function showDefaultContact()
    {
        return view('pages.contact');
    }

    /**
     * =============================================
     * ADMIN EDIT METHODS
     * =============================================
     */

    /**
     * Display home edit page for admin
     */
    public function editHome()
    {
        $page = Page::findBySlug('home');
        
        if (!$page) {
            // Default content lengkap sesuai dengan view user
            $page = new Page([
                'slug' => 'home',
                'title' => 'Beranda',
                'meta_title' => 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Ketintang',
                'meta_description' => 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman',
                'content' => $this->getDefaultHomeContent()
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
            // Validasi dasar
            $request->validate([
                'title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                
                // Hero Section
                'hero_title_line1' => 'required|string|max:100',
                'hero_title_line2' => 'required|string|max:100',
                'hero_title_line3' => 'required|string|max:100',
                'hero_description' => 'required|string',
                'hero_button_menu' => 'required|string|max:50',
                'hero_button_reservation' => 'required|string|max:50',
                'hero_image_url' => 'required|url',
                'hero_premium_badge' => 'required|string|max:100',
                
                // Welcome Section
                'welcome_title_line1' => 'required|string|max:100',
                'welcome_title_line2' => 'required|string|max:100',
                'welcome_description' => 'required|string',
                'welcome_image_url' => 'required|url',
                'feature_1_text' => 'required|string|max:100',
                'feature_2_text' => 'required|string|max:100',
                'feature_3_text' => 'required|string|max:100',
                'feature_4_text' => 'required|string|max:100',
                
                // Services Section
                'services_title_line1' => 'required|string|max:100',
                'services_title_line2' => 'required|string|max:100',
                'services_subtitle' => 'required|string',
                
                // Testimonials Section
                'testimonials_title_line1' => 'required|string|max:100',
                'testimonials_title_line2' => 'required|string|max:100',
                'testimonials_subtitle' => 'required|string',
                
                // CTA Section
                'cta_title_line1' => 'required|string|max:100',
                'cta_title_line2' => 'required|string|max:100',
                'cta_description' => 'required|string',
            ]);

            // Prepare content array
            $content = [
                // Hero Section
                'hero_title_line1' => $request->hero_title_line1,
                'hero_title_line2' => $request->hero_title_line2,
                'hero_title_line3' => $request->hero_title_line3,
                'hero_description' => $request->hero_description,
                'hero_button_menu' => $request->hero_button_menu,
                'hero_button_reservation' => $request->hero_button_reservation,
                'hero_image_url' => $request->hero_image_url,
                'hero_premium_badge' => $request->hero_premium_badge,
                
                // Welcome Section
                'welcome_title_line1' => $request->welcome_title_line1,
                'welcome_title_line2' => $request->welcome_title_line2,
                'welcome_description' => $request->welcome_description,
                'welcome_image_url' => $request->welcome_image_url,
                'feature_1_text' => $request->feature_1_text,
                'feature_2_text' => $request->feature_2_text,
                'feature_3_text' => $request->feature_3_text,
                'feature_4_text' => $request->feature_4_text,
                
                // Services Section
                'services_title_line1' => $request->services_title_line1,
                'services_title_line2' => $request->services_title_line2,
                'services_subtitle' => $request->services_subtitle,
            ];
            
            // Add service details (1-6)
            for ($i = 1; $i <= 6; $i++) {
                $content["service_{$i}_icon"] = $request->input("service_{$i}_icon");
                $content["service_{$i}_title"] = $request->input("service_{$i}_title");
                $content["service_{$i}_description"] = $request->input("service_{$i}_description");
            }
            
            // Add testimonials section
            $content['testimonials_title_line1'] = $request->testimonials_title_line1;
            $content['testimonials_title_line2'] = $request->testimonials_title_line2;
            $content['testimonials_subtitle'] = $request->testimonials_subtitle;
            
            // Add testimonials (1-9)
            for ($i = 1; $i <= 9; $i++) {
                $content["testimonial_{$i}_name"] = $request->input("testimonial_{$i}_name");
                $content["testimonial_{$i}_source"] = $request->input("testimonial_{$i}_source");
                $content["testimonial_{$i}_rating"] = $request->input("testimonial_{$i}_rating");
                $content["testimonial_{$i}_text"] = $request->input("testimonial_{$i}_text");
            }
            
            // Add CTA section
            $content['cta_title_line1'] = $request->cta_title_line1;
            $content['cta_title_line2'] = $request->cta_title_line2;
            $content['cta_description'] = $request->cta_description;
            $content['cta_button1_text'] = $request->cta_button1_text ?? 'Pesan Sekarang';
            $content['cta_button2_text'] = $request->cta_button2_text ?? 'Reservasi Sekarang';

            // Update or create page
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
                ->with('success', 'Halaman home berhasil diperbarui! Semua data telah tersimpan.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $errorMessage = implode(', ', $errors);
            
            return redirect()->route('admin.pages.home.edit')
                ->withInput()
                ->withErrors($e->validator)
                ->with('error', 'Terjadi kesalahan validasi: ' . $errorMessage);
                
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
            $page = new Page([
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'meta_title' => 'Tentang Kami - JOSS GANDOS',
                'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017',
                'content' => $this->getDefaultAboutContent()
            ]);
        }
        
        return view('admin.pages.about', compact('page'));
    }

    /**
     * Update about page - FIXED VERSION DENGAN IMAGE UPLOAD
     */
    public function updateAbout(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Validasi untuk upload file
                
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
                
                // CTA Section
                'cta_title' => 'required|string|max:255',
                'cta_description' => 'required|string|max:500',
            ]);

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile('image')) {
                $oldPage = Page::findBySlug('about');
                if ($oldPage && $oldPage->image) {
                    // Hapus gambar lama jika ada
                    Storage::delete('public/pages/' . $oldPage->image);
                }
                
                $image = $request->file('image');
                $imageName = 'about-' . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/pages', $imageName);
                $imagePath = $imageName;
            } else {
                $oldPage = Page::findBySlug('about');
                $imagePath = $oldPage->image ?? null;
            }

            // Process complex arrays with proper validation
            $processedVisionPillars = $this->processVisionPillars($request->vision_pillars ?? []);
            $processedMissions = $this->processMissions($request->missions ?? []);
            $processedTeamMembers = $this->processTeamMembers($request->team_members ?? []);
            $processedTimeline = $this->processTimeline($request->timeline ?? []);

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
                'vision_pillars' => $processedVisionPillars,
                
                // Mission Section
                'missions' => $processedMissions,
                
                // Team Section
                'team_members' => $processedTeamMembers,
                
                // CTA Section
                'cta_title' => $request->cta_title,
                'cta_description' => $request->cta_description,
                
                // Timeline
                'timeline' => $processedTimeline,
            ];

            // Update or create page - PASTIKAN KOLOM IMAGE DIISI
            $page = Page::updateOrCreate(
                ['slug' => 'about'],
                [
                    'title' => $request->title,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'image' => $imagePath, // INI PENTING - kolom image diisi
                    'content' => $content,
                ]
            );

            return redirect()->route('admin.pages.about.edit')
                ->with('success', 'Halaman about berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $errorMessage = implode(', ', $errors);
            
            return redirect()->route('admin.pages.about.edit')
                ->withInput()
                ->withErrors($e->validator)
                ->with('error', 'Terjadi kesalahan validasi: ' . $errorMessage);
                
        } catch (\Exception $e) {
            Log::error('Error updating about page: ' . $e->getMessage());
            return redirect()->route('admin.pages.about.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display contact edit page for admin
     */
    public function editContact()
    {
        $page = Page::findBySlug('contact');
        
        if (!$page) {
            $page = new Page([
                'slug' => 'contact',
                'title' => 'Kontak Kami',
                'meta_title' => 'Kontak Kami - JOSS GANDOS',
                'meta_description' => 'Hubungi JOSS GANDOS untuk reservasi, pertanyaan, atau informasi lebih lanjut',
                'content' => $this->getDefaultContactContent()
            ]);
        }
        
        return view('admin.pages.contact', compact('page'));
    }

    /**
     * Update contact page - FIXED VERSION dengan struktur data yang sesuai dengan view
     */
    public function updateContact(Request $request)
    {
        try {
            $request->validate([
                'title' => 'nullable|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                
                // Hero Section - SESUAIKAN DENGAN FORM DI CONTACT.BLADE.PHP
                'hero_subtitle' => 'required|string|max:255',
                'hero_title_line1' => 'required|string|max:255',
                'hero_title_line2' => 'required|string|max:255',
                'hero_title_line3' => 'required|string|max:255',
                'hero_description' => 'required|string',
                'hero_image_url' => 'required|url',
                
                // Contact Information
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'hours' => 'required|string|max:255',
                'map_embed' => 'required|string',
                
                // WhatsApp Admins
                'whatsapp_admin_1' => 'required|string|max:20',
                'whatsapp_admin_1_name' => 'required|string|max:255',
                'whatsapp_admin_2' => 'required|string|max:20',
                'whatsapp_admin_2_name' => 'required|string|max:255',
                
                // Delivery Links
                'delivery_gofood' => 'nullable|url',
                'delivery_grabfood' => 'nullable|url',
                
                // Social Media
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'twitter_url' => 'nullable|url',
                'linkedin_url' => 'nullable|url',
            ]);

            // Gunakan default title jika tidak ada
            $title = $request->title ?? 'Kontak Kami';

            // Prepare content array dengan FLAT structure (sesuai dengan yang digunakan di view)
            $content = [
                // Hero Section
                'hero_subtitle' => $request->hero_subtitle,
                'hero_title_line1' => $request->hero_title_line1,
                'hero_title_line2' => $request->hero_title_line2,
                'hero_title_line3' => $request->hero_title_line3,
                'hero_description' => $request->hero_description,
                'hero_image_url' => $request->hero_image_url,
                
                // Contact Information
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'hours' => $request->hours,
                'map_embed' => $request->map_embed,
                
                // WhatsApp Admins
                'whatsapp_admin_1' => $request->whatsapp_admin_1,
                'whatsapp_admin_1_name' => $request->whatsapp_admin_1_name,
                'whatsapp_admin_2' => $request->whatsapp_admin_2,
                'whatsapp_admin_2_name' => $request->whatsapp_admin_2_name,
                
                // Delivery Links
                'delivery_gofood' => $request->delivery_gofood,
                'delivery_grabfood' => $request->delivery_grabfood,
                
                // Social Media - FLAT structure
                'facebook_url' => $request->facebook_url ?? '#',
                'instagram_url' => $request->instagram_url ?? '#',
                'twitter_url' => $request->twitter_url ?? '#',
                'linkedin_url' => $request->linkedin_url ?? '#',
                
                // Also keep social_media array for backward compatibility
                'social_media' => [
                    'facebook' => $request->facebook_url ?? '#',
                    'instagram' => $request->instagram_url ?? '#',
                    'twitter' => $request->twitter_url ?? '#',
                    'linkedin' => $request->linkedin_url ?? '#',
                ],
            ];

            $page = Page::updateOrCreate(
                ['slug' => 'contact'],
                [
                    'title' => $title,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'content' => $content,
                ]
            );

            return redirect()->route('admin.pages.contact.edit')
                ->with('success', 'Halaman kontak berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->all();
            $errorMessage = implode(', ', $errors);
            
            return redirect()->route('admin.pages.contact.edit')
                ->withInput()
                ->withErrors($e->validator)
                ->with('error', 'Terjadi kesalahan validasi: ' . $errorMessage);
                
        } catch (\Exception $e) {
            Log::error('Error updating contact page: ' . $e->getMessage());
            return redirect()->route('admin.pages.contact.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * =============================================
     * DATA PROCESSING METHODS
     * =============================================
     */

    /**
     * Process timeline data
     */
    private function processTimeline($timelineData)
    {
        $timeline = [];
        
        if (!is_array($timelineData)) {
            return $timeline;
        }
        
        foreach ($timelineData as $index => $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $year = $item['year'] ?? '';
            $title = $item['title'] ?? '';
            
            if (empty($year) || empty($title)) {
                continue;
            }
            
            // Process items - handle both string and array
            $items = [];
            if (isset($item['items'])) {
                if (is_array($item['items'])) {
                    // If it's already an array, use it directly
                    $items = array_values(array_filter($item['items'], function($val) {
                        return !empty(trim($val));
                    }));
                } elseif (is_string($item['items'])) {
                    // If it's a string, split by newline
                    $items = array_filter(array_map('trim', explode("\n", $item['items'])));
                    $items = array_values($items);
                }
            }
            
            // Ensure we have at least some items
            if (empty($items)) {
                $items = ['No data available'];
            }
            
            $timeline[] = [
                'year' => $year,
                'title' => $title,
                'items' => $items
            ];
        }
        
        // Sort by year if possible
        usort($timeline, function($a, $b) {
            return strcmp($a['year'], $b['year']);
        });
        
        return $timeline;
    }

    /**
     * Process vision pillars data
     */
    private function processVisionPillars($pillarsData)
    {
        $pillars = [];
        
        if (!is_array($pillarsData)) {
            return $pillars;
        }
        
        foreach ($pillarsData as $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $icon = $item['icon'] ?? '';
            $title = $item['title'] ?? '';
            $description = $item['description'] ?? '';
            
            if (!empty($icon) && !empty($title) && !empty($description)) {
                $pillars[] = [
                    'icon' => $icon,
                    'title' => $title,
                    'description' => $description
                ];
            }
        }
        
        return $pillars;
    }

    /**
     * Process missions data
     */
    private function processMissions($missionsData)
    {
        $missions = [];
        
        if (!is_array($missionsData)) {
            return $missions;
        }
        
        foreach ($missionsData as $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $icon = $item['icon'] ?? '';
            $title = $item['title'] ?? '';
            $description = $item['description'] ?? '';
            
            if (!empty($icon) && !empty($title) && !empty($description)) {
                $missions[] = [
                    'icon' => $icon,
                    'title' => $title,
                    'description' => $description
                ];
            }
        }
        
        return $missions;
    }

    /**
     * Process team members data
     */
    private function processTeamMembers($membersData)
    {
        $members = [];
        
        if (!is_array($membersData)) {
            return $members;
        }
        
        foreach ($membersData as $item) {
            if (!is_array($item)) {
                continue;
            }
            
            $name = $item['name'] ?? '';
            $position = $item['position'] ?? '';
            $image = $item['image'] ?? '';
            $description = $item['description'] ?? '';
            
            if (!empty($name) && !empty($position) && !empty($image) && !empty($description)) {
                $members[] = [
                    'name' => $name,
                    'position' => $position,
                    'image' => $image,
                    'description' => $description
                ];
            }
        }
        
        return $members;
    }

    /**
     * =============================================
     * DEFAULT CONTENT METHODS
     * =============================================
     */

    /**
     * Get default home content
     */
    private function getDefaultHomeContent()
    {
        return [
            // Hero Section
            'hero_title_line1' => 'Nikmati Kelezatan',
            'hero_title_line2' => 'Hidangan Spesial',
            'hero_title_line3' => 'di Joss Gandos',
            'hero_description' => 'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.',
            'hero_button_menu' => 'Lihat Menu',
            'hero_button_reservation' => 'Pesan Meja',
            'hero_image_url' => 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw',
            'hero_premium_badge' => '#1 RESTO & CAFE KETINTANG',
            
            // Welcome Section
            'welcome_title_line1' => 'Selamat Datang',
            'welcome_title_line2' => 'Resto Joss Gandos',
            'welcome_description' => 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.',
            'welcome_image_url' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            'feature_1_text' => 'Bahan premium pilihan terbaik',
            'feature_2_text' => 'Chef berpengalaman & profesional',
            'feature_3_text' => 'Suasana nyaman untuk keluarga',
            'feature_4_text' => 'Pelayanan ramah & cepat',
            
            'services_title_line1' => 'Fasilitas &',
            'services_title_line2' => 'Pelayanan Premium',
            'services_subtitle' => 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',
            
            // Service Details
            'service_1_icon' => 'fas fa-utensils',
            'service_1_title' => 'Dine In',
            'service_1_description' => 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan',
            
            'service_2_icon' => 'fas fa-users',
            'service_2_title' => 'Private Room',
            'service_2_description' => 'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke',
            
            'service_3_icon' => 'fas fa-calendar-alt',
            'service_3_title' => 'Event & Catering',
            'service_3_description' => 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda',
            
            'service_4_icon' => 'fas fa-wifi',
            'service_4_title' => 'Free WiFi',
            'service_4_description' => 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda',
            
            'service_5_icon' => 'fas fa-mosque',
            'service_5_title' => 'Musholla',
            'service_5_description' => 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang',
            
            'service_6_icon' => 'fas fa-parking',
            'service_6_title' => 'Parkir Luas',
            'service_6_description' => 'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda',
            
            // Testimonials Section
            'testimonials_title_line1' => 'Apa Kata',
            'testimonials_title_line2' => 'Pelanggan Kami?',
            'testimonials_subtitle' => 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos',
            
            // Testimonials Details
            'testimonial_1_name' => 'Achmad Thoriq',
            'testimonial_1_source' => 'Google Reviews',
            'testimonial_1_rating' => 5,
            'testimonial_1_text' => 'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!',
            
            'testimonial_2_name' => 'Perpus Uinsa',
            'testimonial_2_source' => 'Google Reviews',
            'testimonial_2_rating' => 5,
            'testimonial_2_text' => 'Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.',
            
            'testimonial_3_name' => 'Karenina Anisya',
            'testimonial_3_source' => 'Google Reviews',
            'testimonial_3_rating' => 5,
            'testimonial_3_text' => 'Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.',
            
            'testimonial_4_name' => 'Filidyo Bramanta',
            'testimonial_4_source' => 'Google Reviews',
            'testimonial_4_rating' => 5,
            'testimonial_4_text' => 'Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.',
            
            'testimonial_5_name' => 'M. Junianto Tri',
            'testimonial_5_source' => 'Google Reviews',
            'testimonial_5_rating' => 5,
            'testimonial_5_text' => 'Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.',
            
            'testimonial_6_name' => 'Metha Prosper',
            'testimonial_6_source' => 'Google Reviews',
            'testimonial_6_rating' => 5,
            'testimonial_6_text' => 'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul',
            
            // Testimoni 7 (BARU)
            'testimonial_7_name' => 'Budi Santoso',
            'testimonial_7_source' => 'Google Reviews',
            'testimonial_7_rating' => 5,
            'testimonial_7_text' => 'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!',
            
            // Testimoni 8 (BARU)
            'testimonial_8_name' => 'Siti Nurhaliza',
            'testimonial_8_source' => 'Google Reviews',
            'testimonial_8_rating' => 5,
            'testimonial_8_text' => 'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.',
            
            // Testimoni 9 (BARU)
            'testimonial_9_name' => 'Rizki Firmansyah',
            'testimonial_9_source' => 'Google Reviews',
            'testimonial_9_rating' => 5,
            'testimonial_9_text' => 'Live musicnya seru, makanannya lezat, minumannya juga segar-segar. Pelayanan memuaskan, bikin betah berlama-lama.',
            
            // CTA Section
            'cta_title_line1' => 'Siap Merasakan',
            'cta_title_line2' => 'Pengalaman Kuliner Terbaik?',
            'cta_description' => 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
            'cta_button1_text' => 'Pesan Sekarang',
            'cta_button2_text' => 'Reservasi Sekarang',
        ];
    }

    /**
     * Get default about content
     */
    private function getDefaultAboutContent()
    {
        return [
            // Hero Section
            'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
            'hero_image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // History Section
            'history_description_1' => 'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
            'history_description_2' => 'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah Bebek Joss Gandos — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
            'history_description_3' => 'Nama Joss Gandos dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
            
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
                        'Tim awal: 15 orang'
                    ]
                ],
                [
                    'year' => '2018-19',
                    'title' => 'Merintis & Inovasi',
                    'items' => [
                        'Masa perjuangan mendapatkan kepercayaan customer',
                        'Mengembangkan variasi menu',
                        'Menjadi pionir kuliner di Jemursari'
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
                        'Peluncuran Gulai Kepala Ikan Salmon',
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
                        'Tanpa santan, kaya rempah'
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
                        '8 tahun perjalanan penuh perjuangan',
                        'Siap melangkah lebih jauh',
                        'Pengalaman yang Joss, Mantap, Luar Biasa!'
                    ]
                ],
            ],
            
            // Founder Section
            'founder_description' => 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.',
            'founder_story_1' => 'Berawal dari rintisan sederhana bernama "Bebek Joss Gandos", beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.',
            'founder_story_2' => 'Di bawah kepemimpinan beliau dengan filosofi semangat "Joss, Mantap, dan Luar Biasa", resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik Gulai Kepala Ikan Salmon.',
            'founder_commitment' => 'Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.',
            'founder_image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Vision Section
            'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',
            'vision_pillars' => [
                [
                    'icon' => 'fas fa-utensils',
                    'title' => 'Kualitas Premium',
                    'description' => 'Menyajikan hidangan berkualitas dengan bahan segar'
                ],
                [
                    'icon' => 'fas fa-heart',
                    'title' => 'Pelayanan Ramah',
                    'description' => 'Memberikan pengalaman terbaik bagi pelanggan'
                ],
                [
                    'icon' => 'fas fa-leaf',
                    'title' => 'Inovasi',
                    'description' => 'Terus berinovasi dalam menu dan layanan'
                ],
                [
                    'icon' => 'fas fa-users',
                    'title' => 'Kebersamaan',
                    'description' => 'Menciptakan suasana nyaman untuk keluarga'
                ],
            ],
            
            // Mission Section
            'missions' => [
                [
                    'icon' => 'fas fa-leaf',
                    'title' => 'Kualitas Premium',
                    'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar.'
                ],
                [
                    'icon' => 'fas fa-smile',
                    'title' => 'Pelayanan Prima',
                    'description' => 'Pelayanan cepat, ramah, dan profesional.'
                ],
                [
                    'icon' => 'fas fa-home',
                    'title' => 'Suasana Nyaman',
                    'description' => 'Suasana bersih, nyaman, dan bersahabat.'
                ],
                [
                    'icon' => 'fas fa-lightbulb',
                    'title' => 'Inovasi Berkelanjutan',
                    'description' => 'Terus berinovasi menu dan layanan.'
                ],
                [
                    'icon' => 'fas fa-broom',
                    'title' => 'Standar Kebersihan',
                    'description' => 'Menjaga standar kebersihan (hygiene) tertinggi.'
                ],
                [
                    'icon' => 'fas fa-hand-holding-heart',
                    'title' => 'Kontribusi Sosial',
                    'description' => 'Kontribusi positif bagi lingkungan sekitar.'
                ],
            ],
            
            // Team Section
            'team_members' => [
                [
                    'name' => 'Ahmad Santoso',
                    'position' => 'Head Chef',
                    'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional'
                ],
                [
                    'name' => 'Sari Dewi',
                    'position' => 'Restaurant Manager',
                    'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'
                ],
                [
                    'name' => 'Budi Hartono',
                    'position' => 'F&B Director',
                    'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'description' => 'Pengembangan menu dan kontrol kualitas bahan'
                ],
            ],
            
            // CTA Section
            'cta_title' => 'Rasakan Cita Rasa Luar Biasa',
            'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.',
        ];
    }

    /**
     * Get default contact content - SESUAIKAN DENGAN FORM DI CONTACT.BLADE.PHP
     */
    private function getDefaultContactContent()
    {
        return [
            // Hero Section
            'hero_subtitle' => 'HUBUNGI KAMI',
            'hero_title_line1' => 'Kami Siap',
            'hero_title_line2' => 'Melayani Dengan',
            'hero_title_line3' => 'Sepenuh Hati',
            'hero_description' => 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.',
            'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Contact Information
            'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
            'phone' => '(021) 1234-5678',
            'email' => 'info@jossgandos.com',
            'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
            
            // WhatsApp Admins
            'whatsapp_admin_1' => '6289699071599',
            'whatsapp_admin_1_name' => 'Admin 1',
            'whatsapp_admin_2' => '6289532682495',
            'whatsapp_admin_2_name' => 'Admin 2',
            
            // Delivery Links
            'delivery_gofood' => 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17',
            'delivery_grabfood' => 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d',
            
            // Social Media
            'facebook_url' => '#',
            'instagram_url' => '#',
            'twitter_url' => '#',
            'linkedin_url' => '#',
            
            // Backward compatibility
            'social_media' => [
                'facebook' => '#',
                'instagram' => '#',
                'twitter' => '#',
                'linkedin' => '#',
            ],
        ];
    }

    /**
     * =============================================
     * HELPER METHODS FOR GETTING DATA
     * =============================================
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
            return 2;
        }
    }
}