<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('title');
            $table->longText('content');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Insert default about page data
        $this->seedDefaultPages();
    }

    private function seedDefaultPages(): void
    {
        // Default about page
        $aboutContent = [
            'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat dengan bahan-bahan berkualitas tinggi. Didirikan pada tahun 2017, kami telah melayani ribuan pelanggan dengan penuh dedikasi.',
            'history' => 'Didirikan pada 28 Oktober 2017 oleh Dr. Siswanto, JOSS GANDOS dimulai sebagai rumah makan sederhana dengan menu andalan bebek goreng. Nama "JOSS GANDOS" dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa.',
            'vision' => 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.',
            'mission' => "1. Menyajikan hidangan berkualitas tinggi dengan bahan segar\n2. Pelayanan cepat, ramah, dan profesional\n3. Suasana bersih, nyaman, dan bersahabat\n4. Terus berinovasi menu dan layanan\n5. Menjaga standar kebersihan (hygiene)\n6. Kontribusi positif bagi lingkungan sekitar",
            'image' => null
        ];

        // Default home page content
        $homeContent = [
            // Hero Section
            'hero_title_line1' => 'Selamat Datang di',
            'hero_title_line2' => 'Resto Joss Gandos',
            'hero_subtitle' => 'Pelopor No. 1 Resto dan Cafe di Jemursari',
            'hero_button1_text' => 'Jelajahi',
            'hero_button2_text' => 'Reservasi',
            
            // Welcome/About Section
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
            
            // Services Section
            'services_title_line1' => 'Fasilitas &',
            'services_title_line2' => 'Pelayanan Premium',
            'services_subtitle' => 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda',
            
            // Testimonials Section
            'testimonials_title_line1' => 'Apa Kata',
            'testimonials_title_line2' => 'Pelanggan Kami?',
            'testimonials_subtitle' => 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos',
            
            // CTA Section
            'cta_title_line1' => 'Siap Merasakan',
            'cta_title_line2' => 'Pengalaman Kuliner Terbaik?',
            'cta_description' => 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!',
        ];

        // Check if pages already exist
        $existingPages = DB::table('pages')->whereIn('name', ['about', 'home'])->count();
        
        if ($existingPages === 0) {
            DB::table('pages')->insert([
                [
                    'name' => 'about',
                    'slug' => 'tentang-kami',
                    'title' => 'Tentang Kami - JOSS GANDOS',
                    'content' => json_encode($aboutContent),
                    'meta_title' => 'Tentang Kami - JOSS GANDOS Restoran & Cafe',
                    'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'home',
                    'slug' => 'beranda',
                    'title' => 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Jemursari',
                    'content' => json_encode($homeContent),
                    'meta_title' => 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Jemursari',
                    'meta_description' => 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};