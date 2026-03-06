@extends('layouts.app')

@section('title', $page->meta_title ?? 'Tentang Kami - JOSS GANDOS')
@section('meta-description', $page->meta_description ?? 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017')

@php
    $content = $page->content ?? [];
    
    // Ambil history paragraphs dari database
    $historyParagraphs = [];
    for ($i = 1; $i <= 10; $i++) {
        if (isset($content['history_description_' . $i])) {
            $historyParagraphs[] = $content['history_description_' . $i];
        }
    }
    
    // Jika tidak ada data history, gunakan default sesuai gambar
    if (empty($historyParagraphs)) {
        $historyParagraphs = [
            'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
            'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah <strong class="text-gradient-red">Bebek Joss Gandos</strong> — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
            'Nama <strong class="text-gradient-red">\'Joss Gandos\'</strong> dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
            'Berdiri pada <strong class="text-gradient-red">28 Oktober 2017</strong>, kami menjadi salah satu resto pionir di kawasan Jalan Jemursari, jauh sebelum banyak resto lain bermunculan di sepanjang jalan ini.'
        ];
    }
    
    // Ambil timeline dari database
    $timeline = $content['timeline'] ?? [
        ['year' => '2017', 'title' => 'Awal Berdiri', 'items' => [
            'Didirikan oleh CEO Dr. Siswanto',
            'Menu khas Banyuwangi (Bebek & Rujak Soto)',
            'Nama awal: "Bebek Joss Gandos"',
            'Fasilitas: Karaoke VIP, Wedding, Live Music',
            'Tim awal: 15 orang'
        ]],
        ['year' => '2018-19', 'title' => 'Merintis & Inovasi', 'items' => [
            'Masa perjuangan mendapatkan kepercayaan customer',
            'Mengembangkan variasi menu',
            'Menjadi pionir kuliner di Jemursari'
        ]],
        ['year' => '2020', 'title' => 'Bertahan di Pandemi', 'items' => [
            'Tutup sementara 3 bulan & SDM terbatas',
            'Beradaptasi dengan jual sembako & pesan antar',
            'Bukti kekuatan dan solidaritas tim'
        ]],
        ['year' => '2021', 'title' => 'Bangkit & Menu Baru', 'items' => [
            'Renovasi area VIP & Outdoor',
            'Peluncuran Gulai Kepala Ikan Salmon',
            'Aneka menu nusantara autentik'
        ]],
        ['year' => '2022', 'title' => 'Semakin Dipercaya', 'items' => [
            'Peningkatan pesat customer event & gathering',
            'Fasilitas Karaoke VIP menjadi daya tarik utama'
        ]],
        ['year' => '2023', 'title' => 'Ekspansi & Menu Ikonik', 'items' => [
            'Renovasi besar: 6 VIP Room',
            'Gulai Kepala Ikan Salmon menjadi ikon',
            'Tanpa santan, kaya rempah'
        ]],
        ['year' => '2024', 'title' => 'Cabang Baru', 'items' => [
            'Peningkatan layanan pesan antar & reservasi',
            'Agustus 2024: Cabang baru di Ketintang'
        ]],
        ['year' => '2025', 'title' => 'Sewindu Joss Gandos!', 'items' => [
            '8 tahun perjalanan penuh perjuangan',
            'Siap melangkah lebih jauh'
        ]],
    ];
    
    // Ambil missions dari database
    $missions = $content['missions'] ?? [
        ['title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar pilihan.'],
        ['title' => 'Pelayanan Prima', 'description' => 'Memberikan pelayanan cepat, ramah, dan profesional kepada setiap tamu.'],
        ['title' => 'Suasana Nyaman', 'description' => 'Menciptakan suasana bersih, nyaman, dan bersahabat untuk seluruh keluarga.'],
        ['title' => 'Inovasi Berkelanjutan', 'description' => 'Terus berinovasi dalam menu dan layanan untuk kepuasan pelanggan.'],
        ['title' => 'Standar Kebersihan', 'description' => 'Menjaga standar kebersihan (hygiene) tertinggi di setiap area.'],
        ['title' => 'Kontribusi Sosial', 'description' => 'Memberikan kontribusi positif bagi lingkungan sekitar.'],
    ];
    
    // Ambil team members dari database
    $teamMembers = $content['team_members'] ?? [
        ['name' => 'Ahmad Santoso', 'position' => 'Head Chef', 'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional'],
        ['name' => 'Sari Dewi', 'position' => 'Restaurant Manager', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'],
        ['name' => 'Budi Hartono', 'position' => 'F&B Director', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Pengembangan menu dan kontrol kualitas bahan'],
    ];
    
    // Ambil founder data dari database
    $founderDescription = $content['founder_description'] ?? 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.';
    $founderStory1 = $content['founder_story_1'] ?? 'Berawal dari rintisan sederhana bernama <strong>"Bebek Joss Gandos"</strong>, beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.';
    $founderStory2 = $content['founder_story_2'] ?? 'Di bawah kepemimpinan beliau dengan filosofi semangat <strong>"Joss, Mantap, dan Luar Biasa"</strong>, resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik <span class="text-primary">Gulai Kepala Ikan Salmon</span>. Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.';
    
    // Ambil vision dari database
    $visionQuote = $content['vision_quote'] ?? 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.';
    
    // Ambil CTA dari database
    $ctaTitle = $content['cta_title'] ?? 'Rasakan Cita Rasa Luar Biasa';
    $ctaDescription = $content['cta_description'] ?? 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.';
    
    // Gabungkan founder story untuk bagian kedua
    $founderStoryCombined = $founderStory2;
@endphp

@section('content')
<!-- ========== HERO SECTION ========== -->
<section class="elegant-hero">
    <!-- Soft Gradient Background -->
    <div class="elegant-gradient"></div>
    
    <!-- Decorative Elements -->
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>
    
    <!-- Animated Particles -->
    <div class="particle-container">
        @for($i = 1; $i <= 33; $i++)
        <div class="particle"></div>
        @endfor
    </div>
    
    <div class="container">
        <div class="row align-items-center" style="min-height: 85vh;">
            <div class="col-lg-6 col-xl-6">
                <!-- Premium Badge dengan Animasi -->
                <div class="premium-badge animate__animated animate__fadeInUp">
                    <span class="badge-dot"></span>
                    <span>EST. 2017</span>
                    <span class="badge-dot"></span>
                </div>
                
                <!-- Main Heading dengan Animasi Text Reveal -->
                <h1 class="elegant-heading">
                    <span class="heading-line reveal-text">Cerita Kami,</span>
                    <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">Lebih dari Sekadar</span>
                    <span class="heading-line reveal-text" style="animation-delay: 0.4s">Restoran</span>
                </h1>
                
                <!-- Description dengan Animasi -->
                <p class="elegant-desc animate__animated animate__fadeInUp animate__delay-1s">
                    {{ $content['hero_subtitle'] ?? 'Delapan tahun perjalanan dari semangat IT hingga menjadi pionir kuliner di Jemursari dengan menu andalan yang menginspirasi.' }}
                </p>
                
                <!-- CTA Buttons dengan Animasi -->
                <div class="elegant-cta">
                    <a href="#sejarah" class="btn-elegant btn-primary-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Telusuri Sejarah</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="#tim" class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Kenali Tim Kami</span>
                        <i class="fas fa-users"></i>
                    </a>
                </div>
                
            </div>
            
            <!-- HERO IMAGE -->
            <div class="col-lg-6 col-xl-6">
                <div class="hero-image-wrapper animate__animated animate__fadeInRight animate__delay-0s">
                    <div class="hero-image-container hero-image-extra-large">
                        <!-- Main Image Frame -->
                        <div class="hero-image-frame hero-frame-premium">
                            <img src="{{ $content['hero_image'] ?? 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw' }}"
                                 alt="Resto Joss Gandos Ketintang"
                                 class="hero-image img-fluid">
                            
                            <!-- Overlay Layers for Hover Effect -->
                            <div class="image-overlay"></div>
                            <div class="image-glow"></div>
                            <div class="image-shine"></div>
                            
                            <!-- Decorative Frame -->
                            <div class="image-frame">
                                <div class="frame-corner top-left"></div>
                                <div class="frame-corner top-right"></div>
                                <div class="frame-corner bottom-left"></div>
                                <div class="frame-corner bottom-right"></div>
                            </div>
                            
                            <!-- Premium Label dengan Animasi -->
                            <div class="image-premium-label animate__animated animate__pulse animate__infinite">
                                <span>KETINTANG</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== SEJARAH SECTION DENGAN FONT MODERN ========== -->
<section id="sejarah" class="section-padding sejarah-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-header mb-5" data-aos="fade-right" data-aos-duration="1000">
                    <div class="section-tag-wrapper">
                        <span class="section-tag-glow"></span>
                        <span class="section-tag">SEJARAH KAMI</span>
                    </div>
                    <h2 class="display-4 fw-bold mb-4">
                        Delapan Tahun<br>
                        <span class="text-gradient-red">Dedikasi & Inovasi</span>
                    </h2>
                    
                    <div class="history-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="history-card-inner">
                            <div class="history-icon-wrapper">
                                <div class="history-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="history-icon-pulse"></div>
                            </div>
                            <div class="history-text">
                                <h5>Berdiri: 28 Oktober 2017</h5>
                                <p>Pionir restoran di kawasan Jalan Jemursari</p>
                                <div class="history-decoration"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- HISTORY CONTENT - LENGKAP SESUAI GAMBAR -->
                <div class="history-content modern-text" data-aos="fade-up" data-aos-delay="400">
                    @php
                        // Pastikan kita menggunakan teks yang tepat sesuai gambar
                        $displayParagraphs = [
                            'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
                            'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah <strong class="text-gradient-red">Bebek Joss Gandos</strong> — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
                            'Nama <strong class="text-gradient-red">\'Joss Gandos\'</strong> dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
                            'Berdiri pada <strong class="text-gradient-red">28 Oktober 2017</strong>, kami menjadi salah satu resto pionir di kawasan Jalan Jemursari, jauh sebelum banyak resto lain bermunculan di sepanjang jalan ini.'
                        ];
                    @endphp
                    
                    @foreach($displayParagraphs as $index => $paragraph)
                        @if($loop->last)
                            <p class="history-paragraph history-last">
                                {!! $paragraph !!}
                            </p>
                        @else
                            <p class="history-paragraph">
                                {!! $paragraph !!}
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <div class="col-lg-6">
                <!-- ========== PERJALANAN RESTO DENGAN FONT MODERN ========== -->
                <div class="journey-card premium-card" data-aos="fade-left" data-aos-duration="1000">
                    <div class="card-bg-pattern"></div>
                    <div class="journey-header">
                        <h3 class="journey-main-title">PERJALANAN RESTO JOSS GANDOS</h3>
                        <p class="journey-quote">"Dari langkah kecil hingga menjadi resto kebanggaan bersama"</p>
                        <div class="header-decoration">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    
                    <div class="timeline-wrapper modern-timeline">
                        @foreach($timeline as $item)
                        <div class="timeline-item" data-aos="fade-left" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="timeline-year-badge">{{ $item['year'] ?? '' }}</div>
                            <div class="timeline-content-card">
                                <h5 class="timeline-year-title">{{ $item['title'] ?? '' }}</h5>
                                <ul class="timeline-list">
                                    @foreach($item['items'] as $listItem)
                                        <li>{{ $listItem }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== VISI MISI SECTION DENGAN FONT MODERN ========== -->
<section class="vision-mission-single-card-section" style="padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <!-- SINGLE CARD PREMIUM - VISI & MISI DALAM SATU CARD -->
                <div class="vision-mission-premium-card" data-aos="fade-up" data-aos-duration="1200">
                    <!-- Decorative Elements -->
                    <div class="card-bg-ornament">
                        <div class="ornament-circle circle-1"></div>
                        <div class="ornament-circle circle-2"></div>
                        <div class="ornament-line"></div>
                    </div>
                    
                    <div class="card-content-wrapper">
                        <!-- VISI SECTION DENGAN FONT SAMA SEPERTI "KUALITAS PREMIUM" -->
                        <div class="visi-section">
                            <div class="visi-header">
                                <div class="icon-badge visi-icon-badge">
                                    <i class="fas fa-gem"></i>
                                </div>
                                <h3 class="visi-title">VISI</h3>
                            </div>
                            
                            <div class="visi-text">
                                <p class="visi-full-text visi-bold-text">
                                    {{ $visionQuote }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- MISI SECTION -->
                        <div class="misi-section">
                            <div class="misi-header">
                                <div class="icon-badge misi-icon-badge">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h3 class="misi-title">MISI</h3>
                            </div>
                            
                            <div class="misi-list">
                                @foreach($missions as $index => $mission)
                                <div class="misi-item misi-item-static">
                                    <div class="misi-number-static">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                    <div class="misi-content">
                                        <h4>{{ $mission['title'] ?? '' }}</h4>
                                        <p>{{ $mission['description'] ?? '' }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Card Footer - DIPOSISIKAN DI TENGAH -->
                    <div class="card-footer-premium text-center">
                        <div class="footer-quote d-flex justify-content-center align-items-center">
                            <i class="fas fa-quote-left"></i>
                            <span>JOSS, MANTAP, LUAR BIASA</span>
                            <i class="fas fa-quote-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== FOUNDER SECTION ========== -->
<section class="founder-section" style="padding: 80px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="founder-image-wrapper extra-large" data-aos="fade-right">
                    <div class="founder-image premium founder-premium-large">
                        <div class="image-rotator">
                            <img src="{{ $content['founder_image'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                                 class="img-fluid" alt="Dr. Siswanto - Founder JOSS GANDOS">
                            <div class="image-overlay-glow"></div>
                        </div>
                        <div class="frame-accent">
                            <div class="accent-corner tl"></div>
                            <div class="accent-corner tr"></div>
                            <div class="accent-corner bl"></div>
                            <div class="accent-corner br"></div>
                        </div>
                    </div>
                    <div class="founder-pattern"></div>
                    <div class="founder-badge">
                        <span>FOUNDER & CEO</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="founder-content" data-aos="fade-left">
                    <span class="section-tag mb-3 d-inline-block">PENDIRI</span>
                    <h2 class="founder-title">
                        Dr. Siswanto:<br>
                        <span class="text-gradient-red">Dari IT ke Kuliner</span>
                    </h2>
                    
                    <div class="founder-quote">
                        <i class="fas fa-quote-left quote-icon"></i>
                        <p>
                            {{ $founderDescription }}
                        </p>
                    </div>
                    
                    <div class="founder-story">
                        <p>
                            {!! $founderStory1 !!}
                        </p>
                        <p>
                            {!! $founderStoryCombined !!}
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========== TIM KAMI SECTION ========== -->
<section id="tim" class="team-section" style="padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="section-header" data-aos="fade-up">
                    <span class="section-tag mb-3 d-inline-block">TIM KAMI</span>
                    <h2 class="display-4 fw-bold mb-4">
                        Orang-orang Berdedikasi<br>
                        <span class="text-gradient-red">di Balik Layar</span>
                    </h2>
                    <p class="lead text-muted">Tim yang memastikan pengalaman bersantap Anda sempurna</p>
                </div>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach($teamMembers as $member)
            <div class="col-lg-4 col-md-6">
                <div class="team-card" data-aos="fade-up">
                    <div class="team-image">
                        <img src="{{ $member['image'] ?? '' }}" alt="{{ $member['name'] ?? '' }}">
                    </div>
                    <div class="team-info">
                        <h5>{{ $member['name'] ?? '' }}</h5>
                        <span class="team-position">{{ $member['position'] ?? '' }}</span>
                        <p class="team-desc">{{ $member['description'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ========== CTA SECTION ========== -->
<section class="cta-section-red-gradient" style="padding: 80px 0;">
    <div class="container">
        <div class="cta-wrapper-red">
            <!-- Decorative Elements -->
            <div class="cta-shapes">
                <div class="shape s1"></div>
                <div class="shape s2"></div>
                <div class="shape s3"></div>
            </div>
            
            <!-- Animated Particles -->
            <div class="cta-particles">
                @for($i = 1; $i <= 6; $i++)
                <div class="particle"></div>
                @endfor
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <!-- Premium Badge -->
                    <div class="cta-badge animate__animated animate__fadeInDown">
                        <span class="badge-dot"></span>
                        <span>#JOSS GANDOS EXPERIENCE</span>
                        <span class="badge-dot"></span>
                    </div>
                    
                    <!-- Main Title -->
                    <h2 class="cta-title-red animate__animated animate__fadeInUp">
                        {{ $ctaTitle }}
                    </h2>
                    
                    <!-- Description -->
                    <p class="cta-description-red animate__animated animate__fadeInUp animate__delay-1s">
                        {{ $ctaDescription }}
                    </p>
                    
                    <!-- CTA Buttons - BUTTON KUNJUNGI KAMI DIHUBUNGKAN KE RESERVATION PAGE SECTION LOKASI -->
                    <div class="cta-buttons-red animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="{{ route('reservation.create') }}" class="btn-cta-red btn-primary-red">
                            <span>Reservasi Sekarang</span>
                            <i class="fas fa-calendar-check"></i>
                        </a>
                        <a href="{{ route('reservation.create') }}#map-section" class="btn-cta-red btn-outline-red">
                            <span>Kunjungi Kami</span>
                            <i class="fas fa-map-marker-alt"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BACK TO TOP BUTTON -->
<div class="back-to-top">
    <i class="fas fa-arrow-up"></i>
</div>
@endsection

@section('styles')
<style>
    /* ========== IMPORT FONT MODERN ========== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap');
    @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

    /* ========== VARIABLES ========== */
    :root {
        --primary-red: #B22222;
        --primary-dark: #8B0000;
        --primary-soft: #CD5C5C;
        --accent-gold: #D4A017;
        --accent-light: #FFD700;
        --accent-rose: #E8B4B4;
        --bg-light: #FFF9F0;
        --text-dark: #1E2A36;
        --text-gray: #5A6A72;
        --text-elegant: #2C3E50;
        --shadow-sm: 0 5px 20px rgba(0,0,0,0.02);
        --shadow-md: 0 10px 30px rgba(0,0,0,0.05);
        --shadow-lg: 0 20px 40px rgba(0,0,0,0.08);
        --shadow-red: 0 10px 30px rgba(178,34,34,0.1);
        --shadow-gold: 0 10px 30px rgba(212,160,23,0.15);
        --border-radius-sm: 12px;
        --border-radius-md: 20px;
        --border-radius-lg: 30px;
        --border-radius-xl: 50px;
        --font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        --glass-bg: rgba(255, 255, 255, 0.7);
        --glass-border: rgba(255, 255, 255, 0.2);
        --glass-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
    }

    /* ========== TYPOGRAPHY MODERN ========== */
    body {
        font-family: var(--font-primary);
        color: var(--text-elegant);
        line-height: 1.6;
        font-weight: 400;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-size: 16px;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: var(--font-primary);
        font-weight: 600;
        letter-spacing: -0.02em;
        line-height: 1.3;
    }

    p {
        font-family: var(--font-primary);
        font-weight: 400;
        line-height: 1.7;
    }

    .fw-semibold {
        font-weight: 600;
    }
    
    .fw-bold {
        font-weight: 700;
    }

    /* ========== ELEGANT RED GRADIENT HERO ========== */
    .elegant-hero {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        padding: 100px 0 60px;
        margin-top: -80px;
        overflow: hidden;
        background: #8B0000;
    }

    .elegant-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 70% 30%, #A52A2A 0%, #8B0000 40%, #6B0F0F 100%);
        z-index: 1;
    }

    .hero-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        z-index: 2;
    }

    .shape-1 {
        width: 600px;
        height: 600px;
        background: rgba(205, 92, 92, 0.15);
        top: -200px;
        right: -100px;
        animation: shapeFloat 20s ease-in-out infinite;
    }

    .shape-2 {
        width: 400px;
        height: 400px;
        background: rgba(244, 164, 96, 0.1);
        bottom: -100px;
        left: -50px;
        animation: shapeFloat 25s ease-in-out infinite reverse;
    }
    
    .shape-3 {
        width: 300px;
        height: 300px;
        background: rgba(255, 215, 0, 0.08);
        top: 50%;
        left: 20%;
        filter: blur(100px);
        animation: shapeFloat 18s ease-in-out infinite;
    }

    @keyframes shapeFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.95); }
    }

    .particle-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 2;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 215, 0, 0.3);
        border-radius: 50%;
        animation: particleFloat 15s infinite linear;
    }

    .particle:nth-child(1) { top: 20%; left: 10%; animation-duration: 12s; }
    .particle:nth-child(2) { top: 70%; left: 20%; animation-duration: 18s; background: rgba(255,255,255,0.4); }
    .particle:nth-child(3) { top: 30%; left: 80%; animation-duration: 20s; width: 6px; height: 6px; }
    .particle:nth-child(4) { top: 80%; left: 40%; animation-duration: 14s; }
    .particle:nth-child(5) { top: 40%; left: 90%; animation-duration: 22s; width: 5px; height: 5px; }
    .particle:nth-child(6) { top: 50%; left: 50%; animation-duration: 16s; width: 8px; height: 8px; }
    .particle:nth-child(7) { top: 15%; left: 60%; animation-duration: 24s; }
    .particle:nth-child(8) { top: 85%; left: 75%; animation-duration: 19s; }
    .particle:nth-child(9) { top: 45%; left: 25%; animation-duration: 21s; }
    .particle:nth-child(10) { top: 10%; left: 40%; animation-duration: 17s; }
    .particle:nth-child(11) { top: 60%; left: 70%; animation-duration: 23s; }
    .particle:nth-child(12) { top: 25%; left: 95%; animation-duration: 15s; }
    .particle:nth-child(13) { top: 75%; left: 5%; animation-duration: 26s; }
    .particle:nth-child(14) { top: 35%; left: 15%; animation-duration: 18s; }
    .particle:nth-child(15) { top: 90%; left: 55%; animation-duration: 20s; }

    @keyframes particleFloat {
        0% { transform: translateY(0) translateX(0); opacity: 0; }
        10% { opacity: 0.5; }
        90% { opacity: 0.5; }
        100% { transform: translateY(-100vh) translateX(20px); opacity: 0; }
    }

    .container {
        position: relative;
        z-index: 10;
    }

    /* Text Reveal Animation */
    .reveal-text {
        animation: revealText 1.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes revealText {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .premium-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 10px 24px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 100px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 20px;
    }

    .badge-dot {
        width: 8px;
        height: 8px;
        background: var(--accent-light);
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.2); opacity: 0.8; }
    }

    .premium-badge span {
        color: white;
        font-size: 0.9rem;
        font-weight: 500;
        letter-spacing: 3px;
    }

    .elegant-heading {
        margin-bottom: 20px;
    }

    .heading-line {
        display: block;
        font-size: 4.2rem;
        font-weight: 700;
        line-height: 1.2;
        color: white;
        text-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        font-family: var(--font-primary);
    }

    .gradient-highlight {
        background: linear-gradient(120deg, #FFE55C, #FFD700, #FFA500);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
    }

    .elegant-desc {
        font-size: 1.2rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin-bottom: 30px;
        font-weight: 300;
        letter-spacing: 0.3px;
        font-family: var(--font-primary);
    }

    .elegant-cta {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .btn-elegant {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 36px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        overflow: hidden;
        border: none;
        font-family: var(--font-primary);
    }

    .btn-primary-elegant {
        background: white;
        color: var(--primary-dark);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .btn-primary-elegant:hover {
        background: #fff5f5;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        color: var(--primary-dark);
    }

    .btn-primary-elegant i {
        transition: transform 0.3s ease;
    }

    .btn-primary-elegant:hover i {
        transform: translateX(8px);
    }

    .btn-outline-elegant {
        background: transparent;
        color: white;
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(5px);
    }

    .btn-outline-elegant:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.8);
        transform: translateY(-3px);
    }

    /* Hero Image */
    .hero-image-wrapper {
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    .hero-image-container.hero-image-extra-large {
        position: relative;
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
    }

    .hero-image-frame.hero-frame-premium {
        position: relative;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.7);
        border: 12px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
        transform: translateY(0);
    }

    .hero-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.7s ease;
        object-fit: cover;
        aspect-ratio: 16/9;
    }

    .hero-image-frame.hero-frame-premium:hover {
        transform: translateY(-15px) scale(1.03);
        border-color: rgba(255, 215, 0, 0.6);
        box-shadow: 0 50px 80px -20px rgba(178, 34, 34, 0.6);
    }

    .hero-image-frame.hero-frame-premium:hover .hero-image {
        transform: scale(1.1);
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, 
            rgba(178, 34, 34, 0.2) 0%, 
            rgba(0, 0, 0, 0.4) 50%,
            rgba(178, 34, 34, 0.2) 100%);
        opacity: 0.3;
        transition: opacity 0.5s ease;
        z-index: 2;
        pointer-events: none;
    }

    .hero-image-frame.hero-frame-premium:hover .image-overlay {
        opacity: 0.7;
    }

    .image-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, 
            rgba(255, 215, 0, 0.3) 0%, 
            transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 3;
        pointer-events: none;
    }

    .hero-image-frame.hero-frame-premium:hover .image-glow {
        opacity: 0.8;
    }

    .image-shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            to bottom right,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.2) 50%,
            rgba(255, 255, 255, 0) 100%
        );
        transform: rotate(30deg) translateX(-100%);
        transition: transform 0.8s ease;
        z-index: 4;
        pointer-events: none;
    }

    .hero-image-frame.hero-frame-premium:hover .image-shine {
        transform: rotate(30deg) translateX(100%);
    }

    .image-frame {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 5;
        pointer-events: none;
    }

    .frame-corner {
        position: absolute;
        width: 35px;
        height: 35px;
        border-color: rgba(255, 215, 0, 0.7);
        transition: all 0.4s ease;
    }

    .frame-corner.top-left {
        top: 20px;
        left: 20px;
        border-top: 3px solid var(--accent-gold);
        border-left: 3px solid var(--accent-gold);
    }

    .frame-corner.top-right {
        top: 20px;
        right: 20px;
        border-top: 3px solid var(--accent-gold);
        border-right: 3px solid var(--accent-gold);
    }

    .frame-corner.bottom-left {
        bottom: 20px;
        left: 20px;
        border-bottom: 3px solid var(--accent-gold);
        border-left: 3px solid var(--accent-gold);
    }

    .frame-corner.bottom-right {
        bottom: 20px;
        right: 20px;
        border-bottom: 3px solid var(--accent-gold);
        border-right: 3px solid var(--accent-gold);
    }

    .hero-image-frame.hero-frame-premium:hover .frame-corner {
        width: 50px;
        height: 50px;
        border-color: var(--accent-gold);
    }

    .image-premium-label {
        position: absolute;
        bottom: 30px;
        left: 30px;
        background: rgba(255, 215, 0, 0.9);
        color: var(--primary-dark);
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 0.9rem;
        z-index: 7;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* ========== SEJARAH SECTION DENGAN FONT MODERN ========== */
    .sejarah-section {
        padding: 80px 0;
        background: white;
    }
    
    .section-tag-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 15px;
    }
    
    .section-tag-glow {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(178,34,34,0.2) 0%, transparent 70%);
        filter: blur(10px);
        z-index: 0;
    }
    
    .section-tag {
        background: var(--primary-red);
        color: white;
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        box-shadow: var(--shadow-red);
        position: relative;
        z-index: 1;
        font-family: var(--font-primary);
    }

    .text-gradient-red {
        background: linear-gradient(135deg, var(--primary-red), var(--accent-gold));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* History Card Modern */
    .history-card {
        background: linear-gradient(145deg, #ffffff, #f8f8f8);
        border-radius: 25px;
        padding: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        border-left: 5px solid var(--primary-red);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .history-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(178,34,34,0.03) 0%, transparent 70%);
        border-radius: 50%;
    }

    .history-card:hover {
        transform: translateX(10px) translateY(-5px);
        box-shadow: 0 25px 45px rgba(178, 34, 34, 0.15);
    }

    .history-card-inner {
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        z-index: 2;
    }
    
    .history-icon-wrapper {
        position: relative;
    }
    
    .history-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        color: white;
        box-shadow: 0 10px 20px rgba(178, 34, 34, 0.2);
        position: relative;
        z-index: 2;
    }
    
    .history-icon-pulse {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: 70px;
        background: rgba(178, 34, 34, 0.2);
        border-radius: 20px;
        animation: pulse-ring 2s infinite;
        z-index: 1;
    }
    
    @keyframes pulse-ring {
        0% { transform: translate(-50%, -50%) scale(0.8); opacity: 0.5; }
        70% { transform: translate(-50%, -50%) scale(1.3); opacity: 0; }
        100% { transform: translate(-50%, -50%) scale(0.8); opacity: 0; }
    }

    .history-text {
        flex: 1;
    }

    .history-text h5 {
        font-size: 1.2rem;
        font-weight: 700;
        margin-bottom: 5px;
        color: var(--text-dark);
        font-family: var(--font-primary);
    }

    .history-text p {
        color: var(--text-gray);
        margin-bottom: 0;
        font-size: 0.95rem;
        font-family: var(--font-primary);
    }
    
    .history-decoration {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(212,160,23,0.05) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Modern Text Styles */
    .modern-text {
        color: var(--text-elegant);
    }
    
    .history-paragraph {
        font-size: 1.1rem;
        margin-bottom: 20px;
        color: var(--text-gray);
        font-family: var(--font-primary);
        line-height: 1.8;
    }
    
    .history-paragraph .text-gradient-red {
        font-weight: 700;
    }
    
    .history-last {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid rgba(0,0,0,0.08);
        color: var(--text-dark);
    }

    /* Journey Card Premium */
    .journey-card.premium-card {
        background: linear-gradient(145deg, #ffffff, #f9f9f9);
        border-radius: 40px;
        padding: 35px;
        box-shadow: 0 25px 50px -10px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 215, 0, 0.1);
    }
    
    .card-bg-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(var(--primary-red) 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.02;
        pointer-events: none;
    }

    .journey-header {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(178, 34, 34, 0.1);
    }

    .journey-main-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 10px;
        letter-spacing: 1px;
        font-family: var(--font-primary);
    }
    
    .journey-quote {
        color: var(--primary-red);
        font-style: italic;
        font-size: 1.1rem;
        margin-bottom: 15px;
        font-family: var(--font-primary);
        font-weight: 400;
    }
    
    .header-decoration {
        display: flex;
        justify-content: center;
        gap: 8px;
    }
    
    .header-decoration span {
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
        border-radius: 3px;
    }
    
    .header-decoration span:nth-child(2) {
        width: 20px;
        opacity: 0.5;
    }
    
    .header-decoration span:nth-child(3) {
        width: 10px;
        opacity: 0.3;
    }

    /* Modern Timeline */
    .timeline-wrapper.modern-timeline {
        max-height: 650px;
        overflow-y: auto;
        padding-right: 15px;
        scrollbar-width: thin;
        scrollbar-color: var(--primary-red) #f1f1f1;
    }

    .timeline-wrapper.modern-timeline::-webkit-scrollbar {
        width: 4px;
    }

    .timeline-wrapper.modern-timeline::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }

    .timeline-wrapper.modern-timeline::-webkit-scrollbar-thumb {
        background: var(--primary-red);
        border-radius: 4px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 25px;
        padding-left: 110px;
        transition: transform 0.3s ease;
    }
    
    .timeline-item:hover {
        transform: translateX(5px);
    }

    .timeline-year-badge {
        position: absolute;
        left: 0;
        top: 0;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        padding: 10px 20px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.9rem;
        min-width: 95px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(178, 34, 34, 0.3);
        z-index: 2;
        border: 2px solid rgba(255, 255, 255, 0.2);
        font-family: var(--font-primary);
    }
    
    .timeline-content-card {
        background: white;
        padding: 25px;
        border-radius: 24px;
        border-left: 4px solid var(--accent-gold);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .timeline-content-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(178,34,34,0.02) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .timeline-item:hover .timeline-content-card {
        box-shadow: 0 15px 35px rgba(178, 34, 34, 0.1);
        border-left-color: var(--primary-red);
    }

    .timeline-year-title {
        color: var(--primary-red);
        font-weight: 700;
        margin-bottom: 15px;
        font-size: 1.2rem;
        position: relative;
        z-index: 2;
        font-family: var(--font-primary);
    }
    
    .timeline-list {
        list-style: none;
        padding: 0;
        margin: 0;
        position: relative;
        z-index: 2;
    }
    
    .timeline-list li {
        position: relative;
        padding-left: 20px;
        margin-bottom: 10px;
        color: var(--text-gray);
        font-size: 0.95rem;
        line-height: 1.6;
        font-family: var(--font-primary);
    }
    
    .timeline-list li::before {
        content: "•";
        position: absolute;
        left: 0;
        color: var(--accent-gold);
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* ========== VISI MISI SECTION DENGAN FONT MODERN ========== */
    .vision-mission-single-card-section {
        padding: 80px 0;
        background: linear-gradient(145deg, #fcf9f7 0%, #ffffff 100%);
        position: relative;
        overflow: hidden;
    }

    .vision-mission-premium-card {
        background: white;
        border-radius: 60px;
        padding: 50px;
        box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 215, 0, 0.2);
        transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
    }

    .vision-mission-premium-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 40px 80px -20px rgba(178, 34, 34, 0.2);
        border-color: rgba(178, 34, 34, 0.2);
    }

    .card-bg-ornament {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .ornament-circle {
        position: absolute;
        border-radius: 50%;
    }

    .ornament-circle.circle-1 {
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(178,34,34,0.02) 0%, transparent 70%);
        top: -150px;
        right: -150px;
    }

    .ornament-circle.circle-2 {
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(212,160,23,0.02) 0%, transparent 70%);
        bottom: -100px;
        left: -100px;
    }

    .ornament-line {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(178,34,34,0.1), transparent);
        transform: rotate(10deg);
    }

    .card-content-wrapper {
        position: relative;
        z-index: 2;
    }

    .visi-section {
        text-align: center;
        margin-bottom: 50px;
        padding-bottom: 40px;
        border-bottom: 2px solid rgba(178,34,34,0.1);
    }

    .visi-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .icon-badge.visi-icon-badge {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        box-shadow: 0 15px 30px rgba(178,34,34,0.2);
    }

    .icon-badge.misi-icon-badge {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--accent-gold), #B8860B);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        box-shadow: 0 15px 30px rgba(212,160,23,0.2);
    }

    .visi-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        position: relative;
        font-family: var(--font-primary);
    }

    .visi-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
        border-radius: 4px;
        transform: scaleX(0.3);
        transition: transform 0.3s ease;
    }

    .visi-section:hover .visi-title::after {
        transform: scaleX(1);
    }

    /* VISI TEXT */
    .visi-full-text {
        font-size: 1.3rem;
        line-height: 1.8;
        color: var(--text-dark);
        max-width: 800px;
        margin: 0 auto;
        font-family: var(--font-primary);
    }
    
    .visi-bold-text {
        font-weight: 490 !important;
    }

    .misi-section {
        position: relative;
    }

    .misi-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        margin-bottom: 40px;
    }

    .misi-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
        position: relative;
        font-family: var(--font-primary);
    }

    .misi-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--accent-gold), var(--primary-red));
        border-radius: 4px;
        transform: scaleX(0.3);
        transition: transform 0.3s ease;
    }

    .misi-section:hover .misi-title::after {
        transform: scaleX(1);
    }

    .misi-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-top: 30px;
    }

    .misi-item-static {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.5);
        position: relative;
        overflow: hidden;
    }

    .misi-item-static::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, var(--primary-red), var(--accent-gold));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .misi-item-static:hover {
        transform: translateX(10px) translateY(-5px);
        background: white;
        box-shadow: 0 15px 30px rgba(178,34,34,0.1);
        border-color: rgba(178,34,34,0.2);
    }

    .misi-item-static:hover::before {
        opacity: 1;
    }

    .misi-number-static {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        border-radius: 15px;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
        box-shadow: 0 8px 15px rgba(178,34,34,0.2);
        font-family: var(--font-primary);
    }

    .misi-content {
        flex: 1;
    }

    .misi-content h4 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
        font-family: var(--font-primary);
    }

    .misi-content p {
        font-size: 0.9rem;
        color: var(--text-gray);
        margin-bottom: 0;
        line-height: 1.6;
        font-family: var(--font-primary);
    }

    .card-footer-premium {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 2px solid rgba(178,34,34,0.1);
        display: flex;
        align-items: center;
        justify-content: center !important;
        width: 100%;
    }

    .footer-quote {
        display: flex;
        align-items: center;
        gap: 15px;
        color: var(--primary-red);
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 2px;
        margin: 0 auto;
    }

    .footer-quote i {
        color: var(--accent-gold);
        font-size: 1.1rem;
        opacity: 0.5;
    }

    .footer-quote span {
        font-family: var(--font-primary);
        font-weight: 600;
    }

    /* ========== FOUNDER SECTION ========== */
    .founder-section {
        padding: 80px 0;
        background: white;
        position: relative;
        overflow: hidden;
    }

    .founder-image-wrapper.extra-large {
        position: relative;
        padding-right: 0;
        max-width: 500px;
        margin: 0 auto;
    }

    .founder-image.premium.founder-premium-large {
        position: relative;
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 0 30px 50px rgba(0, 0, 0, 0.15);
        border: 12px solid white;
        z-index: 2;
        transition: all 0.6s cubic-bezier(0.2, 0.9, 0.4, 1);
    }

    .image-rotator {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
    }

    .image-rotator img {
        width: 100%;
        height: auto;
        aspect-ratio: 1/1.1;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.2, 0.9, 0.4, 1);
        display: block;
    }

    .founder-image.premium.founder-premium-large:hover {
        transform: translateY(-12px);
        box-shadow: 0 45px 70px rgba(178, 34, 34, 0.25);
        border-color: rgba(255, 215, 0, 0.4);
    }

    .founder-image.premium.founder-premium-large:hover .image-rotator img {
        transform: scale(1.1);
    }

    .image-overlay-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 30% 30%, rgba(255, 215, 0, 0.2), transparent 70%);
        opacity: 0;
        transition: opacity 0.6s ease;
        pointer-events: none;
        z-index: 3;
    }

    .founder-image.premium.founder-premium-large:hover .image-overlay-glow {
        opacity: 1;
    }

    .frame-accent {
        position: absolute;
        top: -8px;
        left: -8px;
        right: -8px;
        bottom: -8px;
        pointer-events: none;
        z-index: 4;
    }

    .accent-corner {
        position: absolute;
        width: 30px;
        height: 30px;
        border-color: var(--accent-gold);
        transition: all 0.5s ease;
        opacity: 0.8;
    }

    .accent-corner.tl {
        top: 0;
        left: 0;
        border-top: 3px solid var(--accent-gold);
        border-left: 3px solid var(--accent-gold);
    }

    .accent-corner.tr {
        top: 0;
        right: 0;
        border-top: 3px solid var(--accent-gold);
        border-right: 3px solid var(--accent-gold);
    }

    .accent-corner.bl {
        bottom: 0;
        left: 0;
        border-bottom: 3px solid var(--accent-gold);
        border-left: 3px solid var(--accent-gold);
    }

    .accent-corner.br {
        bottom: 0;
        right: 0;
        border-bottom: 3px solid var(--accent-gold);
        border-right: 3px solid var(--accent-gold);
    }

    .founder-image.premium.founder-premium-large:hover .accent-corner {
        width: 45px;
        height: 45px;
        opacity: 1;
    }

    .founder-pattern {
        position: absolute;
        top: -25px;
        right: -25px;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(var(--primary-red) 2px, transparent 2px);
        background-size: 25px 25px;
        opacity: 0.1;
        border-radius: 40px;
        z-index: 1;
        transition: all 0.6s ease;
    }

    .founder-image-wrapper.extra-large:hover .founder-pattern {
        opacity: 0.2;
        transform: scale(1.08);
    }

    .founder-badge {
        position: absolute;
        bottom: -15px;
        right: 30px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        padding: 12px 30px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 2.5px;
        box-shadow: 0 15px 30px rgba(178, 34, 34, 0.4);
        z-index: 10;
        border: 2px solid rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(5px);
        animation: badgeFloat 3s ease-in-out infinite;
        font-family: var(--font-primary);
    }

    @keyframes badgeFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .founder-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 30px;
        line-height: 1.2;
        font-family: var(--font-primary);
    }

    .founder-quote {
        position: relative;
        padding-left: 30px;
        margin-bottom: 30px;
        border-left: 4px solid var(--accent-gold);
    }

    .quote-icon {
        color: var(--accent-gold);
        font-size: 1.5rem;
        opacity: 0.3;
        margin-bottom: 10px;
    }

    .founder-quote p {
        font-size: 1.1rem;
        line-height: 1.7;
        color: var(--text-gray);
        font-style: italic;
        margin-bottom: 0;
        font-family: var(--font-primary);
    }

    .founder-story p {
        color: var(--text-gray);
        line-height: 1.8;
        margin-bottom: 20px;
        font-family: var(--font-primary);
    }
    
    .founder-story strong {
        color: var(--primary-red);
    }
    
    .text-primary {
        color: var(--primary-red) !important;
        font-weight: 600;
    }

    /* ========== TIM KAMI SECTION ========== */
    .team-section {
        padding: 80px 0;
        background: #fafafa;
    }

    .team-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
    }

    .team-image {
        position: relative;
        height: 300px;
        overflow: hidden;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .team-card:hover .team-image img {
        transform: scale(1.1);
    }

    .team-info {
        padding: 25px;
        text-align: center;
    }

    .team-info h5 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
        font-family: var(--font-primary);
    }

    .team-position {
        display: inline-block;
        padding: 6px 18px;
        background: var(--primary-red);
        color: white;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 15px;
        font-family: var(--font-primary);
    }

    .team-desc {
        color: var(--text-gray);
        line-height: 1.6;
        margin-bottom: 0;
        font-size: 0.95rem;
        font-family: var(--font-primary);
    }

    /* ========== CTA SECTION ========== */
    .cta-section-red-gradient {
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .cta-wrapper-red {
        position: relative;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark), #6B0F0F);
        border-radius: 80px;
        padding: 60px 60px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(178, 34, 34, 0.3);
        border: 1px solid rgba(255, 215, 0, 0.2);
    }

    .cta-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .cta-shapes .shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
    }

    .cta-shapes .s1 {
        width: 400px;
        height: 400px;
        background: rgba(255, 215, 0, 0.1);
        top: -100px;
        right: -100px;
        animation: shapeFloat 20s ease-in-out infinite;
    }

    .cta-shapes .s2 {
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.05);
        bottom: -100px;
        left: -50px;
        animation: shapeFloat 25s ease-in-out infinite reverse;
    }

    .cta-shapes .s3 {
        width: 200px;
        height: 200px;
        background: rgba(212, 160, 23, 0.08);
        top: 50%;
        left: 20%;
        filter: blur(80px);
        animation: shapeFloat 18s ease-in-out infinite;
    }

    .cta-particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .cta-particles .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 215, 0, 0.3);
        border-radius: 50%;
        animation: particleFloat 15s infinite linear;
    }

    .cta-badge {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        padding: 12px 30px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 100px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 30px;
    }

    .cta-badge .badge-dot {
        width: 8px;
        height: 8px;
        background: var(--accent-light);
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.5);
        animation: pulse 2s infinite;
    }

    .cta-badge span {
        color: white;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 3px;
        font-family: var(--font-primary);
    }

    .cta-title-red {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 25px;
        line-height: 1.2;
        font-family: var(--font-primary);
    }

    .cta-description-red {
        font-size: 1.1rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin: 0 auto 40px;
        font-weight: 300;
        font-family: var(--font-primary);
    }

    .cta-buttons-red {
        display: flex;
        gap: 25px;
        justify-content: center;
        margin-bottom: 0;
    }

    .btn-cta-red {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 36px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        overflow: hidden;
        border: none;
        font-family: var(--font-primary);
    }

    .btn-primary-red {
        background: white;
        color: var(--primary-dark);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-primary-red:hover {
        background: #fff5f5;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        color: var(--primary-dark);
    }

    .btn-outline-red {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(5px);
    }

    .btn-outline-red:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
        transform: translateY(-3px);
    }

    /* Back to Top Button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(178, 34, 34, 0.3);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        border: 2px solid rgba(255, 215, 0, 0.3);
    }
    
    .back-to-top.show {
        opacity: 1;
        visibility: visible;
    }
    
    .back-to-top:hover {
        transform: translateY(-5px);
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-red));
        box-shadow: 0 15px 30px rgba(178, 34, 34, 0.4);
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .heading-line {
            font-size: 3.5rem;
        }
        
        .hero-image-container.hero-image-extra-large {
            max-width: 600px;
        }
        
        .founder-image-wrapper.extra-large {
            max-width: 450px;
        }
        
        .cta-title-red {
            font-size: 2.8rem;
        }
        
        .founder-title {
            font-size: 2.2rem;
        }
        
        .visi-title, .misi-title {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 992px) {
        .elegant-hero {
            min-height: auto;
            padding: 120px 0 60px;
            text-align: center;
        }
        
        .heading-line {
            font-size: 3rem;
        }
        
        .elegant-desc {
            margin-left: auto;
            margin-right: auto;
        }
        
        .elegant-cta {
            justify-content: center;
        }
        
        .hero-image-wrapper {
            margin-top: 40px;
        }
        
        .hero-image-container.hero-image-extra-large {
            max-width: 100%;
        }
        
        .founder-image-wrapper.extra-large {
            margin-bottom: 40px;
            max-width: 400px;
        }
        
        .founder-title {
            font-size: 2rem;
        }
        
        .visi-title, .misi-title {
            font-size: 2rem;
        }
        
        .visi-full-text {
            font-size: 1.2rem;
        }
        
        .misi-list {
            grid-template-columns: 1fr;
        }
        
        .vision-mission-premium-card {
            padding: 40px 30px;
        }
        
        .cta-title-red {
            font-size: 2.5rem;
        }
        
        .cta-buttons-red {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-cta-red {
            width: 100%;
            max-width: 300px;
        }
        
        .timeline-item {
            padding-left: 0;
            padding-top: 60px;
        }
        
        .timeline-year-badge {
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }
    }

    @media (max-width: 768px) {
        .heading-line {
            font-size: 2.2rem;
        }
        
        .elegant-desc {
            font-size: 1rem;
        }
        
        .elegant-cta {
            flex-direction: column;
            align-items: center;
        }
        
        .btn-elegant {
            width: 100%;
            max-width: 280px;
        }
        
        .visi-header, .misi-header {
            flex-direction: column;
        }
        
        .visi-title, .misi-title {
            font-size: 1.8rem;
        }
        
        .visi-full-text {
            font-size: 1.1rem;
        }
        
        .vision-mission-premium-card {
            padding: 30px 20px;
            border-radius: 40px;
        }
        
        .misi-item-static {
            padding: 15px;
        }
        
        .card-footer-premium {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        
        .cta-wrapper-red {
            padding: 50px 30px;
            border-radius: 40px;
        }
        
        .cta-title-red {
            font-size: 2rem;
        }
        
        .cta-description-red {
            font-size: 1rem;
        }
        
        .history-card-inner {
            flex-direction: column;
            text-align: center;
        }
        
        .team-image {
            height: 250px;
        }
    }

    @media (max-width: 576px) {
        .heading-line {
            font-size: 1.8rem;
        }
        
        .visi-title, .misi-title {
            font-size: 1.6rem;
        }
        
        .icon-badge.visi-icon-badge,
        .icon-badge.misi-icon-badge {
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
        }
        
        .misi-number-static {
            width: 40px;
            height: 40px;
            font-size: 0.9rem;
        }
        
        .misi-content h4 {
            font-size: 1rem;
        }
        
        .misi-content p {
            font-size: 0.85rem;
        }
        
        .footer-quote {
            font-size: 0.9rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .cta-wrapper-red {
            padding: 40px 20px;
        }
        
        .cta-title-red {
            font-size: 1.8rem;
        }
        
        .section-tag {
            padding: 6px 18px;
            font-size: 0.75rem;
        }
        
        .display-4 {
            font-size: 2rem;
        }
        
        .founder-title {
            font-size: 1.8rem;
        }
        
        .journey-card.premium-card {
            padding: 25px;
        }
        
        .journey-main-title {
            font-size: 1.5rem;
        }
        
        .timeline-content-card {
            padding: 20px;
        }
        
        .timeline-year-title {
            font-size: 1.1rem;
        }
        
        .timeline-list li {
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50,
                easing: 'ease-out-cubic'
            });
        }
        
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Parallax effect for hero shapes
        window.addEventListener('mousemove', function(e) {
            const shapes = document.querySelectorAll('.hero-shape, .cta-shapes .shape');
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            shapes.forEach((shape, index) => {
                const speed = (index + 1) * 20;
                const xOffset = (x - 0.5) * speed;
                const yOffset = (y - 0.5) * speed;
                shape.style.transform = `translate(${xOffset}px, ${yOffset}px)`;
            });
        });
        
        // Random animation delays for particles
        document.querySelectorAll('.particle').forEach((el, index) => {
            el.style.animationDelay = `${index * 0.3}s`;
        });
        
        // Back to top button
        const backToTop = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });
        
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
@endsection