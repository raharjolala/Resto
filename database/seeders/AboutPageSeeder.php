<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class AboutPageSeeder extends Seeder
{
    public function run()
    {
        $content = [
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
        
        Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'Tentang Kami',
                'meta_title' => 'Tentang Kami - JOSS GANDOS',
                'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017',
                'image' => null, // Tambahkan image null di sini
                'content' => $content,
            ]
        );
        
        $this->command->info('About page seeded successfully!');
    }
}