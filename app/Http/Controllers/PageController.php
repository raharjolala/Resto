<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
 
  /**
     * Display the about page
     */
    public function indexAbout()
    {
        // Ambil data dari database
        $page = Page::where('slug', 'about')->first();
        
        // Jika tidak ada data di database, buat default
        if (!$page) {
            // Create default about page if not exists
            $page = Page::create([
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'meta_title' => 'Tentang Resto Joss Gandos',
                'meta_description' => 'Kenali lebih dekat Resto Joss Gandos',
                'content' => [
                    'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
                    'hero_image' => 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw',
                    'history_description_1' => 'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
                    'history_description_2' => 'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah Bebek Joss Gandos — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
                    'history_description_3' => 'Nama Joss Gandos dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
                    'history_description_4' => 'Berdiri pada 28 Oktober 2017, kami menjadi salah satu resto pionir di kawasan Jalan Jemursari, jauh sebelum banyak resto lain bermunculan di sepanjang jalan ini.',
                    'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',
                    'founder_description' => 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.',
                    'founder_story_1' => 'Berawal dari rintisan sederhana bernama "Bebek Joss Gandos", beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.',
                    'founder_story_2' => 'Di bawah kepemimpinan beliau dengan filosofi semangat "Joss, Mantap, dan Luar Biasa", resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik Gulai Kepala Ikan Salmon.',
                    'founder_commitment' => 'Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.',
                    'founder_image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'cta_title' => 'Rasakan Cita Rasa Luar Biasa',
                    'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.',
                    
                    // Default timeline
                    'timeline' => [
                        ['year' => '2017', 'title' => 'Awal Berdiri', 'items' => ['Didirikan oleh CEO Dr. Siswanto', 'Menu khas Banyuwangi (Bebek & Rujak Soto)', 'Nama awal: "Bebek Joss Gandos"', 'Fasilitas: Karaoke VIP, Wedding, Live Music', 'Tim awal: 15 orang']],
                        ['year' => '2018-19', 'title' => 'Merintis & Inovasi', 'items' => ['Masa perjuangan mendapatkan kepercayaan customer', 'Mengembangkan variasi menu', 'Menjadi pionir kuliner di Jemursari']],
                        ['year' => '2020', 'title' => 'Bertahan di Pandemi', 'items' => ['Tutup sementara 3 bulan & SDM terbatas', 'Beradaptasi dengan jual sembako & pesan antar', 'Bukti kekuatan dan solidaritas tim']],
                        ['year' => '2021', 'title' => 'Bangkit & Menu Baru', 'items' => ['Renovasi area VIP & Outdoor', 'Peluncuran Gulai Kepala Ikan Salmon', 'Aneka menu nusantara autentik']],
                        ['year' => '2022', 'title' => 'Semakin Dipercaya', 'items' => ['Peningkatan pesat customer event & gathering', 'Fasilitas Karaoke VIP menjadi daya tarik utama']],
                        ['year' => '2023', 'title' => 'Ekspansi & Menu Ikonik', 'items' => ['Renovasi besar: 6 VIP Room', 'Gulai Kepala Ikan Salmon menjadi ikon', 'Tanpa santan, kaya rempah']],
                        ['year' => '2024', 'title' => 'Cabang Baru', 'items' => ['Peningkatan layanan pesan antar & reservasi', 'Agustus 2024: Cabang baru di Ketintang']],
                        ['year' => '2025', 'title' => 'Sewindu Joss Gandos!', 'items' => ['8 tahun perjalanan penuh perjuangan', 'Siap melangkah lebih jauh']],
                    ],
                    
                    // Default missions
                    'missions' => [
                        ['title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar pilihan.'],
                        ['title' => 'Pelayanan Prima', 'description' => 'Memberikan pelayanan cepat, ramah, dan profesional kepada setiap tamu.'],
                        ['title' => 'Suasana Nyaman', 'description' => 'Menciptakan suasana bersih, nyaman, dan bersahabat untuk seluruh keluarga.'],
                        ['title' => 'Inovasi Berkelanjutan', 'description' => 'Terus berinovasi dalam menu dan layanan untuk kepuasan pelanggan.'],
                        ['title' => 'Standar Kebersihan', 'description' => 'Menjaga standar kebersihan (hygiene) tertinggi di setiap area.'],
                        ['title' => 'Kontribusi Sosial', 'description' => 'Memberikan kontribusi positif bagi lingkungan sekitar.'],
                    ],
                    
                    // Default team members
                    'team_members' => [
                        ['name' => 'Ahmad Santoso', 'position' => 'Head Chef', 'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional'],
                        ['name' => 'Sari Dewi', 'position' => 'Restaurant Manager', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'],
                        ['name' => 'Budi Hartono', 'position' => 'F&B Director', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Pengembangan menu dan kontrol kualitas bahan'],
                    ],
                ]
            ]);
        }
        
        // Kirim data ke view
        return view('pages.about', compact('page'));
    }
    
    /**
     * Display the contact page
     */
    public function indexContact()
    {
        $page = Page::findBySlug('contact');
        
        if (!$page) {
            // Create default contact page if not exists
            $page = Page::create([
                'slug' => 'contact',
                'title' => 'Hubungi Kami',
                'meta_title' => 'Kontak Resto Joss Gandos',
                'meta_description' => 'Hubungi Resto Joss Gandos untuk reservasi dan informasi',
                'content' => [
                    'address' => 'Jl. Ketintang No. 123, Surabaya',
                    'phone' => '(031) 1234-5678',
                    'email' => 'info@jossgandos.com',
                    'map_embed' => 'https://www.google.com/maps/embed?pb=...'
                ]
            ]);
        }
        
        return view('pages.contact', compact('page'));
    }
    
    /**
     * Show the form for editing the home page
     */
    public function editHome()
    {
        $page = Page::findBySlug('home');
        
        if (!$page) {
            // Create default home page if not exists
            $page = Page::create([
                'slug' => 'home',
                'title' => 'Beranda',
                'meta_title' => 'Resto Joss Gandos - Restoran & Cafe Terbaik di Ketintang',
                'meta_description' => 'Resto Joss Gandos - Tempat makan keluarga dengan hidangan lezat dan suasana nyaman',
                'content' => [
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
                    
                    // Services Section
                    'services_title_line1' => 'Fasilitas &',
                    'services_title_line2' => 'Pelayanan Premium',
                    'services_subtitle' => 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',
                    
                    // Services Details
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
                    
                    // Testimoni 1
                    'testimonial_1_name' => 'Achmad Thoriq',
                    'testimonial_1_text' => 'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!',
                    'testimonial_1_source' => 'Google Reviews',
                    'testimonial_1_rating' => 5,
                    
                    // Testimoni 2
                    'testimonial_2_name' => 'Perpus Uinsa',
                    'testimonial_2_text' => 'Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.',
                    'testimonial_2_source' => 'Google Reviews',
                    'testimonial_2_rating' => 5,
                    
                    // Testimoni 3
                    'testimonial_3_name' => 'Karenina Anisya',
                    'testimonial_3_text' => 'Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.',
                    'testimonial_3_source' => 'Google Reviews',
                    'testimonial_3_rating' => 5,
                    
                    // Testimoni 4
                    'testimonial_4_name' => 'Filidyo Bramanta',
                    'testimonial_4_text' => 'Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.',
                    'testimonial_4_source' => 'Google Reviews',
                    'testimonial_4_rating' => 5,
                    
                    // Testimoni 5
                    'testimonial_5_name' => 'M. Junianto Tri',
                    'testimonial_5_text' => 'Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.',
                    'testimonial_5_source' => 'Google Reviews',
                    'testimonial_5_rating' => 5,
                    
                    // Testimoni 6
                    'testimonial_6_name' => 'Metha Prosper',
                    'testimonial_6_text' => 'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul',
                    'testimonial_6_source' => 'Google Reviews',
                    'testimonial_6_rating' => 5,
                    
                    // Testimoni 7
                    'testimonial_7_name' => 'Budi Santoso',
                    'testimonial_7_text' => 'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!',
                    'testimonial_7_source' => 'Google Reviews',
                    'testimonial_7_rating' => 5,
                    
                    // Testimoni 8
                    'testimonial_8_name' => 'Siti Nurhaliza',
                    'testimonial_8_text' => 'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.',
                    'testimonial_8_source' => 'Google Reviews',
                    'testimonial_8_rating' => 5,
                    
                    // Testimoni 9
                    'testimonial_9_name' => 'Rizki Firmansyah',
                    'testimonial_9_text' => 'Live musicnya seru, makanannya lezat, minumannya juga segar-segar. Pelayanan memuaskan, bikin betah berlama-lama.',
                    'testimonial_9_source' => 'Google Reviews',
                    'testimonial_9_rating' => 5,
                    
                    // CTA Section
                    'cta_title_line1' => 'Siap Merasakan',
                    'cta_title_line2' => 'Pengalaman Kuliner Terbaik?',
                    'cta_description' => 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
                    'cta_button1_text' => 'Pesan Sekarang',
                    'cta_button2_text' => 'Reservasi Sekarang',
                ]
            ]);
        }
        
        return view('admin.pages.home', compact('page'));
    }
    
    /**
     * Update the home page
     */
    public function updateHome(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                
                // Hero Section
                'hero_title_line1' => 'required|string|max:255',
                'hero_title_line2' => 'required|string|max:255',
                'hero_title_line3' => 'required|string|max:255',
                'hero_description' => 'required|string',
                'hero_button_menu' => 'required|string|max:100',
                'hero_button_reservation' => 'required|string|max:100',
                'hero_image_url' => 'required|url',
                'hero_premium_badge' => 'required|string|max:255',
                
                // Welcome Section
                'welcome_title_line1' => 'required|string|max:255',
                'welcome_title_line2' => 'required|string|max:255',
                'welcome_description' => 'required|string',
                'welcome_image_url' => 'required|url',
                
                'feature_1_text' => 'required|string|max:255',
                'feature_2_text' => 'required|string|max:255',
                'feature_3_text' => 'required|string|max:255',
                'feature_4_text' => 'required|string|max:255',
                
                // Services Section
                'services_title_line1' => 'required|string|max:255',
                'services_title_line2' => 'required|string|max:255',
                'services_subtitle' => 'required|string',
                
                // Testimonials Section
                'testimonials_title_line1' => 'required|string|max:255',
                'testimonials_title_line2' => 'required|string|max:255',
                'testimonials_subtitle' => 'required|string',
                
                // CTA Section
                'cta_title_line1' => 'required|string|max:255',
                'cta_title_line2' => 'required|string|max:255',
                'cta_description' => 'required|string',
            ]);
            
            // Prepare content array
            $content = [];
            
            // Ambil semua data dari request kecuali token dan field khusus
            foreach ($request->except(['_token', 'title', 'meta_title', 'meta_description', 'image']) as $key => $value) {
                $content[$key] = $value;
            }
            
            // Handle image upload if exists
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('pages', 'public');
                $content['image'] = basename($path);
            }
            
            // Update or create the page
            Page::updateOrCreate(
                ['slug' => 'home'],
                [
                    'title' => $request->title,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'content' => $content
                ]
            );
            
            return redirect()
                ->route('admin.pages.home.edit')
                ->with('success', 'Halaman home berhasil diperbarui!');
                
        } catch (\Exception $e) {
            Log::error('Error updating home page: ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    /**
     * Show the form for editing the about page
     */
    public function editAbout()
    {
        $page = Page::findBySlug('about');
        
        if (!$page) {
            $page = Page::create([
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'meta_title' => 'Tentang Resto Joss Gandos',
                'meta_description' => 'Kenali lebih dekat Resto Joss Gandos',
                'content' => [
                    'hero_subtitle' => 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.',
                    'hero_image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'history_description_1' => 'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
                    'history_description_2' => 'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah Bebek Joss Gandos — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
                    'history_description_3' => 'Nama Joss Gandos dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
                    'vision_quote' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',
                    'founder_description' => 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.',
                    'founder_story_1' => 'Berawal dari rintisan sederhana bernama "Bebek Joss Gandos", beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.',
                    'founder_story_2' => 'Di bawah kepemimpinan beliau dengan filosofi semangat "Joss, Mantap, dan Luar Biasa", resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik Gulai Kepala Ikan Salmon.',
                    'founder_commitment' => 'Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.',
                    'founder_image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'cta_title' => 'Rasakan Cita Rasa Luar Biasa',
                    'cta_description' => 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.',
                    
                    // Default timeline
                    'timeline' => [
                        ['year' => '2017', 'title' => 'Awal Berdiri', 'items' => ['Didirikan oleh CEO Dr. Siswanto', 'Menu khas Banyuwangi (Bebek & Rujak Soto)', 'Nama awal: "Bebek Joss Gandos"', 'Fasilitas: Karaoke VIP, Wedding, Live Music', 'Tim awal: 15 orang']],
                        ['year' => '2018-19', 'title' => 'Merintis & Inovasi', 'items' => ['Masa perjuangan mendapatkan kepercayaan customer', 'Mengembangkan variasi menu', 'Menjadi pionir kuliner di Jemursari']],
                        ['year' => '2020', 'title' => 'Bertahan di Pandemi', 'items' => ['Tutup sementara 3 bulan & SDM terbatas', 'Beradaptasi dengan jual sembako & pesan antar', 'Bukti kekuatan dan solidaritas tim']],
                        ['year' => '2021', 'title' => 'Bangkit & Menu Baru', 'items' => ['Renovasi area VIP & Outdoor', 'Peluncuran Gulai Kepala Ikan Salmon', 'Aneka menu nusantara autentik']],
                        ['year' => '2022', 'title' => 'Semakin Dipercaya', 'items' => ['Peningkatan pesat customer event & gathering', 'Fasilitas Karaoke VIP menjadi daya tarik utama']],
                        ['year' => '2023', 'title' => 'Ekspansi & Menu Ikonik', 'items' => ['Renovasi besar: 6 VIP Room', 'Gulai Kepala Ikan Salmon menjadi ikon', 'Tanpa santan, kaya rempah']],
                        ['year' => '2024', 'title' => 'Cabang Baru', 'items' => ['Peningkatan layanan pesan antar & reservasi', 'Agustus 2024: Cabang baru di Ketintang']],
                        ['year' => '2025', 'title' => 'Sewindu Joss Gandos!', 'items' => ['8 tahun perjalanan penuh perjuangan', 'Siap melangkah lebih jauh', 'Pengalaman yang Joss, Mantap, Luar Biasa!']],
                    ],
                    
                    // Default vision pillars
                    'vision_pillars' => [
                        ['icon' => 'fas fa-utensils', 'title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas dengan bahan segar'],
                        ['icon' => 'fas fa-heart', 'title' => 'Pelayanan Ramah', 'description' => 'Memberikan pengalaman terbaik bagi pelanggan'],
                        ['icon' => 'fas fa-leaf', 'title' => 'Inovasi', 'description' => 'Terus berinovasi dalam menu dan layanan'],
                        ['icon' => 'fas fa-users', 'title' => 'Kebersamaan', 'description' => 'Menciptakan suasana nyaman untuk keluarga'],
                    ],
                    
                    // Default missions
                    'missions' => [
                        ['icon' => 'fas fa-leaf', 'title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar.'],
                        ['icon' => 'fas fa-smile', 'title' => 'Pelayanan Prima', 'description' => 'Pelayanan cepat, ramah, dan profesional.'],
                        ['icon' => 'fas fa-home', 'title' => 'Suasana Nyaman', 'description' => 'Suasana bersih, nyaman, dan bersahabat.'],
                        ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi Berkelanjutan', 'description' => 'Terus berinovasi menu dan layanan.'],
                        ['icon' => 'fas fa-broom', 'title' => 'Standar Kebersihan', 'description' => 'Menjaga standar kebersihan (hygiene) tertinggi.'],
                        ['icon' => 'fas fa-hand-holding-heart', 'title' => 'Kontribusi Sosial', 'description' => 'Kontribusi positif bagi lingkungan sekitar.'],
                    ],
                    
                    // Default team members
                    'team_members' => [
                        ['name' => 'Ahmad Santoso', 'position' => 'Head Chef', 'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional'],
                        ['name' => 'Sari Dewi', 'position' => 'Restaurant Manager', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'],
                        ['name' => 'Budi Hartono', 'position' => 'F&B Director', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Pengembangan menu dan kontrol kualitas bahan'],
                    ],
                ]
            ]);
        }
        
        return view('admin.pages.about', compact('page'));
    }
 /**
 * Update the about page - FULLY FIXED VERSION
 */
public function updateAbout(Request $request)
{
    try {
        // Validasi dasar
        $request->validate([
            'title' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            
            // Hero Section
            'hero_subtitle' => 'nullable|string',
            'hero_image' => 'nullable|url',
            
            // History Section - menggunakan array
            'history_paragraphs' => 'nullable|array',
            'history_paragraphs.*' => 'string',
            
            // Founder Section
            'founder_description' => 'nullable|string',
            'founder_story' => 'nullable|string',
            'founder_philosophy' => 'nullable|string',
            'founder_commitment' => 'nullable|string',
            'founder_image' => 'nullable|url',
            
            // Vision
            'vision_quote' => 'nullable|string',
            
            // CTA
            'cta_title' => 'nullable|string',
            'cta_description' => 'nullable|string',
            
            // Timeline
            'timeline' => 'nullable|array',
            'timeline.*.year' => 'required_with:timeline|string',
            'timeline.*.title' => 'required_with:timeline|string',
            'timeline.*.items' => 'required_with:timeline|string',
            
            // Missions
            'missions' => 'nullable|array',
            'missions.*.title' => 'required_with:missions|string',
            'missions.*.description' => 'required_with:missions|string',
            
            // Team Members
            'team_members' => 'nullable|array',
            'team_members.*.name' => 'required_with:team_members|string',
            'team_members.*.position' => 'required_with:team_members|string',
            'team_members.*.image' => 'required_with:team_members|url',
            'team_members.*.description' => 'required_with:team_members|string',
        ]);

        // Prepare content array
        $content = [];

        // ===== HERO SECTION =====
        $content['hero_subtitle'] = $request->hero_subtitle;
        $content['hero_image'] = $request->hero_image;

        // ===== HISTORY SECTION - Konversi array ke individual fields =====
        if ($request->has('history_paragraphs') && is_array($request->history_paragraphs)) {
            foreach ($request->history_paragraphs as $index => $paragraph) {
                $content['history_description_' . ($index + 1)] = $paragraph;
            }
        }

        // ===== FOUNDER SECTION =====
        $content['founder_description'] = $request->founder_description;
        $content['founder_story_1'] = $request->founder_story; // Sesuaikan dengan nama di view
        $content['founder_story_2'] = $request->founder_philosophy; // Philosophy jadi story 2
        $content['founder_commitment'] = $request->founder_commitment;
        $content['founder_image'] = $request->founder_image;

        // ===== VISION =====
        $content['vision_quote'] = $request->vision_quote;

        // ===== CTA =====
        $content['cta_title'] = $request->cta_title;
        $content['cta_description'] = $request->cta_description;

        // ===== TIMELINE =====
        if ($request->has('timeline') && is_array($request->timeline)) {
            $timeline = [];
            foreach ($request->timeline as $item) {
                if (isset($item['year']) && isset($item['title']) && isset($item['items'])) {
                    // Convert items textarea to array
                    $items = explode("\n", trim($item['items']));
                    $items = array_map('trim', $items);
                    $items = array_filter($items);
                    
                    $timeline[] = [
                        'year' => $item['year'],
                        'title' => $item['title'],
                        'items' => array_values($items)
                    ];
                }
            }
            $content['timeline'] = $timeline;
        }

        // ===== MISSIONS =====
        if ($request->has('missions') && is_array($request->missions)) {
            $missions = [];
            foreach ($request->missions as $mission) {
                if (!empty($mission['title']) && !empty($mission['description'])) {
                    $missions[] = [
                        'title' => $mission['title'],
                        'description' => $mission['description']
                    ];
                }
            }
            $content['missions'] = $missions;
        }

        // ===== TEAM MEMBERS =====
        if ($request->has('team_members') && is_array($request->team_members)) {
            $teamMembers = [];
            foreach ($request->team_members as $member) {
                if (!empty($member['name']) && !empty($member['position']) && !empty($member['image']) && !empty($member['description'])) {
                    $teamMembers[] = [
                        'name' => $member['name'],
                        'position' => $member['position'],
                        'image' => $member['image'],
                        'description' => $member['description']
                    ];
                }
            }
            $content['team_members'] = $teamMembers;
        }

        // Handle image upload jika ada
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pages', 'public');
            $content['image'] = basename($path);
        }

        // Update atau buat page
        $page = Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => $request->title,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'content' => $content
            ]
        );

        Log::info('About page updated successfully', ['id' => $page->id]);

        return redirect()
            ->route('admin.pages.about.edit')
            ->with('success', 'Halaman about berhasil diperbarui!');
            
    } catch (\Exception $e) {
        Log::error('Error updating about page: ' . $e->getMessage());
        Log::error($e->getTraceAsString());
        
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    /**
     * Show the form for editing the contact page
     */
    public function editContact()
    {
        $page = Page::findBySlug('contact');
        
        if (!$page) {
            $page = Page::create([
                'slug' => 'contact',
                'title' => 'Hubungi Kami',
                'meta_title' => 'Kontak Resto Joss Gandos',
                'meta_description' => 'Hubungi Resto Joss Gandos untuk reservasi dan informasi',
                'content' => [
                    'address' => 'Jl. Ketintang No. 123, Surabaya',
                    'phone' => '(031) 1234-5678',
                    'email' => 'info@jossgandos.com',
                    'hours' => 'Setiap Hari: 10.00 - 22.00',
                    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.815195192596!2d112.731234!3d-7.297234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb8f9d8f8f8f%3A0x8f8f8f8f8f8f8f8f!2sSurabaya!5e0!3m2!1sen!2sid!4v1234567890',
                    'whatsapp_admin_1' => '081234567890',
                    'whatsapp_admin_1_name' => 'Admin Jemursari',
                    'whatsapp_admin_2' => '081234567891',
                    'whatsapp_admin_2_name' => 'Admin Ketintang',
                    'delivery_gofood' => 'https://gofood.link/resto-joss-gandos',
                    'delivery_grabfood' => 'https://food.grab.com/resto-joss-gandos',
                    'facebook_url' => 'https://facebook.com/restojossgandos',
                    'instagram_url' => 'https://instagram.com/restojossgandos',
                    'tiktok_url' => 'https://tiktok.com/@restojossgandos',
                    'hero_subtitle' => 'HUBUNGI KAMI',
                    'hero_title_line1' => 'Kami Siap',
                    'hero_title_line2' => 'Melayani Dengan',
                    'hero_title_line3' => 'Sepenuh Hati',
                    'hero_description' => 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.',
                    'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                ]
            ]);
        }
        
        return view('admin.pages.contact', compact('page'));
    }
    
    /**
     * Update the contact page - FIXED VERSION with proper validation
     */
    public function updateContact(Request $request)
    {
        try {
            // Validasi hanya untuk field yang ADA di form contact.blade.php
            $validated = $request->validate([
                'title' => 'nullable|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                
                // Hero Section - SEMUA DIJADIKAN NULLABLE KARENA TIDAK ADA DI FORM
                'hero_subtitle' => 'nullable|string',
                'hero_title_line1' => 'nullable|string',
                'hero_title_line2' => 'nullable|string',
                'hero_title_line3' => 'nullable|string',
                'hero_description' => 'nullable|string',
                'hero_image_url' => 'nullable|url',
                
                // Contact Info - INI YANG ADA DI FORM
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|email',
                'hours' => 'required|string',
                'map_embed' => 'required|string',
                
                // WhatsApp - INI YANG ADA DI FORM
                'whatsapp_admin_1' => 'required|string',
                'whatsapp_admin_1_name' => 'required|string',
                'whatsapp_admin_2' => 'required|string',
                'whatsapp_admin_2_name' => 'required|string',
                
                // Delivery - INI YANG ADA DI FORM
                'delivery_gofood' => 'nullable|url',
                'delivery_grabfood' => 'nullable|url',
                
                // Social Media - INI YANG ADA DI FORM (tiktok_url ada di form)
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'tiktok_url' => 'nullable|url', // TAMBAHKAN INI KARENA ADA DI FORM
            ]);
            
            // Prepare content array
            $content = [];
            
            // Ambil semua data dari request kecuali token dan field khusus
            foreach ($request->except(['_token', 'title', 'meta_title', 'meta_description']) as $key => $value) {
                // Handle checkbox fields
                if ($value === 'on') {
                    $content[$key] = true;
                } else {
                    $content[$key] = $value;
                }
            }
            
            // Set default values untuk field yang tidak ada di form tapi diperlukan
            // Ambil dari page yang sudah ada atau set default
            $existingPage = Page::where('slug', 'contact')->first();
            $existingContent = $existingPage ? $existingPage->content : [];
            
            // Hero section defaults - pertahankan yang lama atau set default
            $content['hero_subtitle'] = $content['hero_subtitle'] ?? ($existingContent['hero_subtitle'] ?? 'HUBUNGI KAMI');
            $content['hero_title_line1'] = $content['hero_title_line1'] ?? ($existingContent['hero_title_line1'] ?? 'Kami Siap');
            $content['hero_title_line2'] = $content['hero_title_line2'] ?? ($existingContent['hero_title_line2'] ?? 'Melayani Dengan');
            $content['hero_title_line3'] = $content['hero_title_line3'] ?? ($existingContent['hero_title_line3'] ?? 'Sepenuh Hati');
            $content['hero_description'] = $content['hero_description'] ?? ($existingContent['hero_description'] ?? 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.');
            $content['hero_image_url'] = $content['hero_image_url'] ?? ($existingContent['hero_image_url'] ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
            
            // Pastikan social_media array juga terisi untuk kompatibilitas
            $content['social_media'] = [
                'facebook' => $content['facebook_url'] ?? '#',
                'instagram' => $content['instagram_url'] ?? '#',
                'twitter' => $content['twitter_url'] ?? '#',
                'linkedin' => $content['linkedin_url'] ?? '#',
                'tiktok' => $content['tiktok_url'] ?? '#',
            ];
            
            // Update atau buat page
            Page::updateOrCreate(
                ['slug' => 'contact'],
                [
                    'title' => $request->title ?? ($existingPage->title ?? 'Kontak Kami'),
                    'meta_title' => $request->meta_title ?? ($existingPage->meta_title ?? 'Kontak Resto Joss Gandos'),
                    'meta_description' => $request->meta_description ?? ($existingPage->meta_description ?? 'Hubungi Resto Joss Gandos untuk reservasi dan informasi'),
                    'content' => $content
                ]
            );
            
            return redirect()
                ->route('admin.pages.contact.edit')
                ->with('success', 'Halaman contact berhasil diperbarui!');
                
        } catch (\Exception $e) {
            Log::error('Error updating contact page: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}