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

        // Check if pages already exist
        $existingPages = DB::table('pages')->whereIn('name', ['about', 'home', 'contact'])->count();
        
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
                    'title' => 'Selamat Datang di JOSS GANDOS',
                    'content' => json_encode([
                        'hero_subtitle' => 'Nikmati Berbagai Sajian Kuliner Lezat dengan Suasana yang Nyaman dan Ramah di Joss Gandos.',
                        'hero_image' => null,
                        'features' => [
                            ['title' => 'Makanan Lezat', 'description' => 'Hidangan berkualitas tinggi'],
                            ['title' => 'Pelayanan Ramah', 'description' => 'Staff profesional dan ramah'],
                            ['title' => 'Suasana Nyaman', 'description' => 'Tempat yang cozy untuk bersantai']
                        ]
                    ]),
                    'meta_title' => 'JOSS GANDOS - Restoran & Cafe Terbaik',
                    'meta_description' => 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman',
                    'is_active' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'contact',
                    'slug' => 'hubungi-kami',
                    'title' => 'Hubungi Kami',
                    'content' => json_encode([
                        'description' => 'Silakan hubungi kami untuk reservasi atau pertanyaan lainnya.',
                        'address' => 'JL Baye Kuliner No. 123, Jakarta, Indonesia',
                        'phone' => '(021) 1234-5678',
                        'email' => 'info@jossgandos.com',
                        'hours' => 'Setiap Hari: 10:00 - 22:00 WIB',
                        'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641914256999!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
                    ]),
                    'meta_title' => 'Hubungi JOSS GANDOS',
                    'meta_description' => 'Hubungi JOSS GANDOS untuk reservasi atau informasi lebih lanjut',
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