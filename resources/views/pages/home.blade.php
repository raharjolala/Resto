[file name]: image.png
[file content begin]
Selamat Datang
Resto Loss Candles
[file content end]

@extends('layouts.app')

@section('title', $page->meta_title ?? 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Jemursari')

@section('meta_description', $page->meta_description ?? 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman')

@section('content')
    @php
        // Default content jika tidak ada dari database
        $defaultContent = [
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
        
        // Gabungkan default dengan content dari database
        $content = array_merge($defaultContent, $content ?? []);
    @endphp

    <!-- Hero Carousel Section - AUTO SLIDE (FULLY ROUNDED DESIGN) -->
    <section class="hero-carousel-section">
        <div class="hero-carousel-wrapper">
            <!-- Slide 1 - Welcome -->
            <div class="hero-carousel-slide active" style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
                <div class="hero-carousel-overlay"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-center">
                            <div class="hero-carousel-content">
                                <span class="hero-badge" data-aos="fade-down">EST. 2017</span>
                                <h1 class="hero-carousel-title" data-aos="fade-up" data-aos-delay="100">
                                    {{ $content['hero_title_line1'] }}<br>
                                    <span class="text-gradient">{{ $content['hero_title_line2'] }}</span>
                                </h1>
                                <p class="hero-carousel-subtitle" data-aos="fade-up" data-aos-delay="200">
                                    {{ $content['hero_subtitle'] }}
                                </p>
                                <div class="hero-carousel-buttons" data-aos="fade-up" data-aos-delay="300">
                                    @if(!empty($content['hero_button1_text']))
                                        <a href="#welcome" class="btn-hero btn-hero-primary">
                                            <span>{{ $content['hero_button1_text'] }}</span>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    @endif
                                    @if(!empty($content['hero_button2_text']))
                                        <a href="{{ route('reservation.create') }}" class="btn-hero btn-hero-outline">
                                            <span>{{ $content['hero_button2_text'] }}</span>
                                            <i class="fas fa-calendar-check"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 - Menu -->
            <div class="hero-carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
                <div class="hero-carousel-overlay"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-center">
                            <div class="hero-carousel-content">
                                <span class="hero-badge">MENU SPESIAL</span>
                                <h1 class="hero-carousel-title">
                                    Cita Rasa<br>
                                    <span class="text-gradient">Autentik Nusantara</span>
                                </h1>
                                <p class="hero-carousel-subtitle">
                                    50+ Menu Pilihan dengan Bahan Premium
                                </p>
                                <div class="hero-carousel-buttons">
                                    <a href="{{ route('menu') }}" class="btn-hero btn-hero-primary">
                                        <span>Lihat Menu</span>
                                        <i class="fas fa-book-open"></i>
                                    </a>
                                    <a href="#order" class="btn-hero btn-hero-outline">
                                        <span>Pesan Sekarang</span>
                                        <i class="fas fa-shopping-bag"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 - Facilities -->
            <div class="hero-carousel-slide" style="background-image: url('https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
                <div class="hero-carousel-overlay"></div>
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-center">
                            <div class="hero-carousel-content">
                                <span class="hero-badge">FASILITAS LENGKAP</span>
                                <h1 class="hero-carousel-title">
                                    Suasana Nyaman<br>
                                    <span class="text-gradient">Untuk Keluarga</span>
                                </h1>
                                <p class="hero-carousel-subtitle">
                                    AC Room • Karaoke • Musholla • Private Room
                                </p>
                                <div class="hero-carousel-buttons">
                                    <a href="#gallery" class="btn-hero btn-hero-primary">
                                        <span>Lihat Galeri</span>
                                        <i class="fas fa-images"></i>
                                    </a>
                                    <a href="#testimonials" class="btn-hero btn-hero-outline">
                                        <span>Testimoni</span>
                                        <i class="fas fa-star"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Indicators -->
            <div class="hero-carousel-indicators">
                <span class="hero-indicator active" onclick="heroCarouselGoTo(0)"></span>
                <span class="hero-indicator" onclick="heroCarouselGoTo(1)"></span>
                <span class="hero-indicator" onclick="heroCarouselGoTo(2)"></span>
            </div>
        </div>
    </section>

    <!-- Welcome Section (Ganti dari About Section) -->
    <section class="welcome-content-section" id="welcome">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="welcome-image-simple">
                        <div class="welcome-image-main-simple">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Restaurant Interior">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="welcome-content-enhanced">
                        <h2 class="welcome-title-main">
                            {{ $content['welcome_title_line1'] }}<br>
                            <span class="text-gradient">{{ $content['welcome_title_line2'] }}</span>
                        </h2>

                        <div class="section-divider-enhanced">
                            <span></span>
                            <i class="fas fa-star"></i>
                            <span></span>
                        </div>

                        <p class="welcome-description-main">
                            {{ $content['welcome_description'] }}
                        </p>

                        <div class="welcome-features-enhanced">
                            @if(!empty($content['feature_1_text']))
                                <div class="feature-item-enhanced">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ $content['feature_1_text'] }}</span>
                                </div>
                            @endif
                            @if(!empty($content['feature_2_text']))
                                <div class="feature-item-enhanced">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ $content['feature_2_text'] }}</span>
                                </div>
                            @endif
                            @if(!empty($content['feature_3_text']))
                                <div class="feature-item-enhanced">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ $content['feature_3_text'] }}</span>
                                </div>
                            @endif
                            @if(!empty($content['feature_4_text']))
                                <div class="feature-item-enhanced">
                                    <i class="fas fa-check-circle"></i>
                                    <span>{{ $content['feature_4_text'] }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="welcome-action-buttons">
                            <a href="{{ route('menu') }}" class="btn-enhanced btn-primary-enhanced">
                                <span>Lihat Menu Kami</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section-enhanced">
        <div class="container">
            <div class="section-header-enhanced text-center" data-aos="fade-up">
                <div class="section-tag-enhanced mx-auto">
                    <span class="tag-dot"></span>
                    LAYANAN KAMI
                </div>
                <h2 class="section-title-enhanced">
                    {{ $content['services_title_line1'] }}<br>
                    <span class="text-gradient">{{ $content['services_title_line2'] }}</span>
                </h2>
                @if(!empty($content['services_subtitle']))
                    <p class="section-subtitle-enhanced">
                        {{ $content['services_subtitle'] }}
                    </p>
                @endif
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card-enhanced">
                        <div class="service-icon-enhanced">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h3 class="service-title-enhanced">Dine In</h3>
                        <p class="service-description-enhanced">
                            Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan
                        </p>
                        <div class="service-hover-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card-enhanced">
                        <div class="service-icon-enhanced">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="service-title-enhanced">Private Room</h3>
                        <p class="service-description-enhanced">
                            Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke
                        </p>
                        <div class="service-hover-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card-enhanced">
                        <div class="service-icon-enhanced">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h3 class="service-title-enhanced">Event & Catering</h3>
                        <p class="service-description-enhanced">
                            Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda
                        </p>
                        <div class="service-hover-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card-enhanced">
                        <div class="service-icon-enhanced">
                            <i class="fas fa-wifi"></i>
                        </div>
                        <h3 class="service-title-enhanced">Free WiFi</h3>
                        <p class="service-description-enhanced">
                            Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda
                        </p>
                        <div class="service-hover-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-card-enhanced">
                        <div class="service-icon-enhanced">
                            <i class="fas fa-mosque"></i>
                        </div>
                        <h3 class="service-title-enhanced">Musholla</h3>
                        <p class="service-description-enhanced">
                            Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang
                        </p>
                        <div class="service-hover-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-card-enhanced">
                        <div class="service-icon-enhanced">
                            <i class="fas fa-parking"></i>
                        </div>
                        <h3 class="service-title-enhanced">Parkir Luas</h3>
                        <p class="service-description-enhanced">
                            Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda
                        </p>
                        <div class="service-hover-arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section - AUTO SLIDE CAROUSEL -->
    <section class="testimonials-section-enhanced" id="testimonials">
        <div class="container">
            <div class="section-header-enhanced text-center" data-aos="fade-up">
                <div class="section-tag-enhanced mx-auto">
                    <span class="tag-dot"></span>
                    TESTIMONI
                </div>
                <h2 class="section-title-enhanced">
                    {{ $content['testimonials_title_line1'] }}<br>
                    <span class="text-gradient">{{ $content['testimonials_title_line2'] }}</span>
                </h2>
                @if(!empty($content['testimonials_subtitle']))
                    <p class="section-subtitle-enhanced">
                        {{ $content['testimonials_subtitle'] }}
                    </p>
                @endif
            </div>

            <div class="testimonials-carousel-wrapper" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonials-carousel-container" id="testimonialsCarousel">
                    <!-- Slide 1 -->
                    <div class="testimonials-slide active">
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-card-enhanced">
                                    <div class="testimonial-rating-enhanced">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="testimonial-text-enhanced">
                                        "Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!"
                                    </p>
                                    <div class="testimonial-author-enhanced">
                                        <div class="author-avatar-enhanced">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="author-info-enhanced">
                                            <h4>Achmad Thoriq</h4>
                                            <p>Google Reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-card-enhanced">
                                    <div class="testimonial-rating-enhanced">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="testimonial-text-enhanced">
                                        "Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen."
                                    </p>
                                    <div class="testimonial-author-enhanced">
                                        <div class="author-avatar-enhanced">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="author-info-enhanced">
                                            <h4>Perpus Uinsa</h4>
                                            <p>Google Reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-card-enhanced">
                                    <div class="testimonial-rating-enhanced">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="testimonial-text-enhanced">
                                        "Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga."
                                    </p>
                                    <div class="testimonial-author-enhanced">
                                        <div class="author-avatar-enhanced">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="author-info-enhanced">
                                            <h4>Karenina Anisya</h4>
                                            <p>Google Reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="testimonials-slide">
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-card-enhanced">
                                    <div class="testimonial-rating-enhanced">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="testimonial-text-enhanced">
                                        "Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup."
                                    </p>
                                    <div class="testimonial-author-enhanced">
                                        <div class="author-avatar-enhanced">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="author-info-enhanced">
                                            <h4>Filidyo Bramanta</h4>
                                            <p>Google Reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-card-enhanced">
                                    <div class="testimonial-rating-enhanced">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="testimonial-text-enhanced">
                                        "Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan."
                                    </p>
                                    <div class="testimonial-author-enhanced">
                                        <div class="author-avatar-enhanced">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="author-info-enhanced">
                                            <h4>M. Junianto Tri</h4>
                                            <p>Google Reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-card-enhanced">
                                    <div class="testimonial-rating-enhanced">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <p class="testimonial-text-enhanced">
                                        "Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul"
                                    </p>
                                    <div class="testimonial-author-enhanced">
                                        <div class="author-avatar-enhanced">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="author-info-enhanced">
                                            <h4>Metha Prosper</h4>
                                            <p>Google Reviews</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Indicators -->
                <div class="testimonials-indicators">
                    <span class="testimonial-indicator active" onclick="testimonialsCarouselGoTo(0)"></span>
                    <span class="testimonial-indicator" onclick="testimonialsCarouselGoTo(1)"></span>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a href="https://www.google.com/search?q=Resto+Joss+Gandos+Ulasan" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="btn-enhanced btn-secondary-enhanced">
                    <i class="fab fa-google me-2"></i>
                    <span>Lihat Semua Review di Google</span>
                    <i class="fas fa-external-link-alt ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Rounded CTA Section -->
    <section class="rounded-cta-section">
        <div class="container">
            <div class="rounded-cta-card" data-aos="fade-up">
                <div class="row align-items-center g-5">
                    <div class="col-lg-8">
                        <div class="rounded-cta-content">
                            <h3 class="rounded-cta-title">
                                {{ $content['cta_title_line1'] }}<br>
                                <span class="text-gradient">{{ $content['cta_title_line2'] }}</span>
                            </h3>
                            @if(!empty($content['cta_description']))
                                <p class="rounded-cta-description">
                                    {{ $content['cta_description'] }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="rounded-cta-buttons">
                            <a href="{{ route('menu') }}" class="btn-rounded-cta btn-rounded-cta-primary">
                                <i class="fas fa-shopping-bag"></i>
                                <span>Pesan Sekarang</span>
                            </a>
                            <a href="{{ route('reservation.create') }}" class="btn-rounded-cta btn-rounded-cta-secondary">
                                <i class="fas fa-calendar-check"></i>
                                <span>Reservasi Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    :root {
        --primary: #dc2626;
        --primary-dark: #b91c1c;
        --secondary: #f97316;
        --accent: #fbbf24;
        --dark: #1a1a1a;
        --light: #f8fafc;
        --white: #ffffff;
        --text-dark: #1e293b;
        --text-gray: #64748b;
        --border: #e2e8f0;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
        --shadow-md: 0 8px 30px rgba(0,0,0,0.12);
        --shadow-lg: 0 20px 60px rgba(0,0,0,0.15);
        --gradient-primary: linear-gradient(135deg, #dc2626 0%, #f97316 100%);
        --gradient-red-white: linear-gradient(135deg, #dc2626 0%, #ffffff 100%);
        --gradient-dark: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ============================================
       HERO CAROUSEL - FULLY ROUNDED DESIGN
    ============================================ */
    .hero-carousel-section {
        position: relative;
        height: 100vh;
        overflow: hidden;
        margin-top: -1px;
    }

    .hero-carousel-wrapper {
        position: relative;
        width: calc(100% - 40px);
        height: calc(100% - 40px);
        margin: 20px auto;
        border-radius: 40px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(220, 38, 38, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    @media (max-width: 768px) {
        .hero-carousel-wrapper {
            width: calc(100% - 20px);
            height: calc(100% - 20px);
            margin: 10px auto;
            border-radius: 30px;
        }
    }

    @media (max-width: 576px) {
        .hero-carousel-wrapper {
            width: calc(100% - 16px);
            height: calc(100% - 16px);
            margin: 8px auto;
            border-radius: 25px;
        }
    }

    /* ============================================
       WELCOME CONTENT SECTION - IMAGE SEDERHANA
    ============================================ */
    .welcome-content-section {
        padding: 120px 0;
        background: linear-gradient(135deg, #ffffff 0%, #fef2f2 100%);
        position: relative;
        overflow: hidden;
    }

    .welcome-content-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23dc2626" fill-opacity="0.03" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
        background-size: cover;
        opacity: 0.5;
    }

    /* Welcome Image - Simplified */
    .welcome-image-simple {
        position: relative;
    }

    .welcome-image-main-simple {
        border-radius: 30px;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        position: relative;
    }

    .welcome-image-main-simple img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: var(--transition);
    }

    .welcome-image-main-simple:hover img {
        transform: scale(1.03);
    }

    /* Welcome Content */
    .welcome-content-enhanced {
        position: relative;
        z-index: 2;
        padding-left: 20px;
    }

    .welcome-title-main {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        color: var(--text-dark);
        line-height: 1.1;
        margin-bottom: 25px;
    }

    .welcome-description-main {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-gray);
        margin-bottom: 35px;
        max-width: 600px;
    }

    .welcome-features-enhanced {
        display: grid;
        gap: 15px;
        margin-bottom: 35px;
    }

    .feature-item-enhanced {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 1rem;
        color: var(--text-gray);
    }

    .feature-item-enhanced i {
        color: var(--primary);
        font-size: 1.2rem;
    }

    /* Action Buttons */
    .welcome-action-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 40px;
    }

    /* ============================================
       ROUNDED CTA SECTION
    ============================================ */
    .rounded-cta-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #ffffff 0%, #fef2f2 100%);
    }

    .rounded-cta-card {
        background: var(--white);
        border-radius: 30px;
        padding: 50px;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(220, 38, 38, 0.1);
        position: relative;
        overflow: hidden;
    }

    .rounded-cta-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.05) 0%, transparent 70%);
        border-radius: 50%;
        z-index: 0;
    }

    .rounded-cta-content {
        position: relative;
        z-index: 1;
    }

    .rounded-cta-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 900;
        color: var(--text-dark);
        line-height: 1.1;
        margin-bottom: 15px;
    }

    .rounded-cta-description {
        font-size: 1.1rem;
        line-height: 1.6;
        color: var(--text-gray);
        margin-bottom: 0;
        max-width: 500px;
    }

    .rounded-cta-buttons {
        display: flex;
        flex-direction: column;
        gap: 15px;
        position: relative;
        z-index: 1;
    }

    .btn-rounded-cta {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 18px 30px;
        border-radius: 15px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1rem;
        transition: var(--transition);
        justify-content: center;
        text-align: center;
        border: 2px solid transparent;
    }

    .btn-rounded-cta-primary {
        background: var(--gradient-primary);
        color: var(--white);
        box-shadow: 0 8px 30px rgba(220, 38, 38, 0.3);
    }

    .btn-rounded-cta-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(220, 38, 38, 0.5);
        color: var(--white);
    }

    .btn-rounded-cta-secondary {
        background: var(--white);
        color: var(--primary);
        border-color: var(--primary);
        box-shadow: var(--shadow-sm);
    }

    .btn-rounded-cta-secondary:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(220, 38, 38, 0.3);
    }

    .btn-rounded-cta i {
        font-size: 1.2rem;
    }

    /* ============================================
       EXISTING STYLES (Unchanged)
    ============================================ */
    .hero-carousel-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .hero-carousel-slide.active {
        opacity: 1;
        z-index: 1;
    }

    .hero-carousel-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, 
            rgba(15, 23, 42, 0.95) 0%, 
            rgba(30, 41, 59, 0.88) 50%, 
            rgba(15, 23, 42, 0.92) 100%);
    }

    .hero-carousel-content {
        position: relative;
        z-index: 2;
        color: var(--white);
        padding: 20px;
    }

    .hero-badge {
        display: inline-block;
        background: var(--gradient-primary);
        color: var(--white);
        padding: 10px 30px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.85rem;
        letter-spacing: 3px;
        margin-bottom: 25px;
        box-shadow: 0 8px 30px rgba(220, 38, 38, 0.4);
        animation: badgePulse 3s ease-in-out infinite;
    }

    @keyframes badgePulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .hero-carousel-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(3rem, 8vw, 5.5rem);
        font-weight: 900;
        line-height: 1.1;
        margin-bottom: 20px;
        text-shadow: 3px 3px 20px rgba(0, 0, 0, 0.8);
    }

    .text-gradient {
        background: linear-gradient(135deg, #dc2626 0%, #f97316 50%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        background-size: 200% 200%;
        animation: gradientFlow 5s ease infinite;
    }

    @keyframes gradientFlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-carousel-subtitle {
        font-size: clamp(1.1rem, 2vw, 1.4rem);
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        letter-spacing: 1px;
    }

    .hero-carousel-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 18px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1rem;
        transition: var(--transition);
    }

    .btn-hero-primary {
        background: var(--gradient-primary);
        color: var(--white);
        box-shadow: 0 10px 40px rgba(220, 38, 38, 0.4);
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.6);
        color: var(--white);
    }

    .btn-hero-outline {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: var(--white);
        backdrop-filter: blur(10px);
    }

    .btn-hero-outline:hover {
        background: var(--white);
        color: var(--primary);
        border-color: var(--white);
        transform: translateY(-3px);
    }

    /* Carousel Indicators */
    .hero-carousel-indicators {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 15px;
        z-index: 10;
    }

    .hero-indicator {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        cursor: pointer;
        transition: var(--transition);
    }

    .hero-indicator.active {
        background: var(--white);
        transform: scale(1.3);
        box-shadow: 0 0 10px rgba(220, 38, 38, 0.5);
    }

    .hero-indicator:hover {
        background: var(--white);
        transform: scale(1.2);
    }

    /* Section Divider */
    .section-divider-enhanced {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 30px;
    }

    .section-divider-enhanced span {
        flex: 1;
        max-width: 60px;
        height: 3px;
        background: var(--gradient-primary);
        border-radius: 2px;
    }

    .section-divider-enhanced i {
        color: var(--accent);
        font-size: 1.2rem;
    }

    /* Buttons */
    .btn-enhanced {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 18px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1rem;
        transition: var(--transition);
    }

    .btn-primary-enhanced {
        background: var(--gradient-primary);
        color: var(--white);
        box-shadow: 0 10px 40px rgba(220, 38, 38, 0.3);
    }

    .btn-primary-enhanced:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.5);
        color: var(--white);
    }

    .btn-secondary-enhanced {
        background: var(--white);
        color: var(--primary);
        border: 2px solid var(--primary);
        box-shadow: var(--shadow-sm);
    }

    .btn-secondary-enhanced:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.4);
    }

    /* ============================================
       SERVICES SECTION
    ============================================ */
    .services-section-enhanced {
        padding: 120px 0;
        background: var(--white);
    }

    .section-header-enhanced {
        margin-bottom: 50px;
    }

    .section-tag-enhanced {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(220, 38, 38, 0.08);
        color: var(--primary);
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .tag-dot {
        width: 8px;
        height: 8px;
        background: var(--primary);
        border-radius: 50%;
    }

    .section-title-enhanced {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 900;
        color: var(--text-dark);
        line-height: 1.1;
        margin-bottom: 25px;
    }

    .section-subtitle-enhanced {
        font-size: 1.1rem;
        color: var(--text-gray);
        line-height: 1.6;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Service Cards */
    .service-card-enhanced {
        position: relative;
        background: var(--white);
        border-radius: 25px;
        padding: 40px 30px;
        box-shadow: var(--shadow-sm);
        border: 2px solid var(--border);
        transition: var(--transition);
        height: 100%;
        overflow: hidden;
    }

    .service-card-enhanced::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: var(--transition);
    }

    .service-card-enhanced:hover::before {
        transform: scaleX(1);
    }

    .service-card-enhanced:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(220, 38, 38, 0.2);
    }

    .service-icon-enhanced {
        width: 80px;
        height: 80px;
        background: var(--gradient-primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 2rem;
        margin-bottom: 25px;
        transition: var(--transition);
    }

    .service-card-enhanced:hover .service-icon-enhanced {
        transform: scale(1.1) rotate(10deg);
    }

    .service-title-enhanced {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 15px;
    }

    .service-description-enhanced {
        font-size: 0.95rem;
        color: var(--text-gray);
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .service-hover-arrow {
        color: var(--primary);
        font-size: 1.2rem;
        opacity: 0;
        transform: translateX(-10px);
        transition: var(--transition);
    }

    .service-card-enhanced:hover .service-hover-arrow {
        opacity: 1;
        transform: translateX(0);
    }

    /* ============================================
       TESTIMONIALS SECTION
    ============================================ */
    .testimonials-section-enhanced {
        padding: 120px 0;
        background: linear-gradient(135deg, #fffbf5 0%, #fff8ed 100%);
    }

    .testimonials-carousel-wrapper {
        position: relative;
        margin-top: 50px;
    }

    .testimonials-carousel-container {
        position: relative;
        overflow: hidden;
        min-height: 400px;
    }

    .testimonials-slide {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        opacity: 0;
        transition: opacity 0.6s ease;
    }

    .testimonials-slide.active {
        display: block;
        position: relative;
        opacity: 1;
    }

    .testimonial-card-enhanced {
        background: var(--white);
        border-radius: 25px;
        padding: 35px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(220, 38, 38, 0.08);
        transition: var(--transition);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .testimonial-card-enhanced::before {
        content: '"';
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 100px;
        font-family: 'Playfair Display', serif;
        color: rgba(220, 38, 38, 0.05);
        line-height: 1;
    }

    .testimonial-card-enhanced:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
        border-color: rgba(220, 38, 38, 0.15);
    }

    .testimonial-rating-enhanced {
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
    }

    .testimonial-rating-enhanced i {
        color: #fbbf24;
        font-size: 1.2rem;
    }

    .testimonial-text-enhanced {
        font-size: 1rem;
        line-height: 1.7;
        color: var(--text-gray);
        margin-bottom: 25px;
        font-style: italic;
    }

    .testimonial-author-enhanced {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-top: 20px;
        border-top: 2px solid var(--border);
    }

    .author-avatar-enhanced {
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.2rem;
        flex-shrink: 0;
        box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
    }

    .author-info-enhanced h4 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .author-info-enhanced p {
        font-size: 0.85rem;
        color: var(--primary);
        font-weight: 600;
        margin: 0;
    }

    .testimonials-indicators {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 40px;
    }

    .testimonial-indicator {
        width: 12px;
        height: 12px;
        background: rgba(220, 38, 38, 0.2);
        border-radius: 50%;
        cursor: pointer;
        transition: var(--transition);
    }

    .testimonial-indicator.active {
        background: var(--primary);
        transform: scale(1.3);
        box-shadow: 0 0 10px rgba(220, 38, 38, 0.3);
    }

    .testimonial-indicator:hover {
        background: var(--primary);
        transform: scale(1.2);
    }

    /* ============================================
       RESPONSIVE DESIGN
    ============================================ */
    @media (max-width: 992px) {
        .welcome-content-section,
        .services-section-enhanced,
        .testimonials-section-enhanced,
        .rounded-cta-section {
            padding: 80px 0;
        }

        .welcome-content-enhanced {
            padding-left: 0;
            padding-top: 30px;
        }

        .rounded-cta-card {
            padding: 40px;
        }

        .rounded-cta-buttons {
            margin-top: 20px;
        }

        .welcome-action-buttons {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .hero-carousel-section {
            height: 90vh;
        }

        .hero-carousel-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-hero {
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }

        .welcome-title-main,
        .rounded-cta-title {
            font-size: clamp(2rem, 4vw, 3rem);
        }

        .welcome-description-main,
        .rounded-cta-description {
            font-size: 1rem;
        }

        .welcome-image-main-simple img {
            height: 400px;
        }

        .rounded-cta-card {
            padding: 30px;
        }

        .btn-rounded-cta {
            padding: 16px 25px;
            font-size: 0.95rem;
        }

        .welcome-action-buttons {
            flex-direction: column;
        }

        .btn-enhanced {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .hero-carousel-section {
            height: 85vh;
        }

        .hero-carousel-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
        }

        .hero-carousel-subtitle {
            font-size: 1rem;
        }

        .hero-badge {
            padding: 8px 20px;
            font-size: 0.75rem;
        }

        .btn-hero {
            padding: 15px 30px;
            font-size: 0.95rem;
        }

        .btn-rounded-cta {
            padding: 14px 20px;
            font-size: 0.9rem;
        }

        .welcome-title-main,
        .rounded-cta-title {
            font-size: clamp(1.8rem, 3.5vw, 2.5rem);
        }

        .welcome-description-main,
        .rounded-cta-description {
            font-size: 0.95rem;
        }

        .welcome-image-main-simple img {
            height: 350px;
        }

        .rounded-cta-card {
            padding: 25px;
        }

        .service-card-enhanced {
            padding: 30px 20px;
        }

        .service-icon-enhanced {
            width: 70px;
            height: 70px;
            font-size: 1.8rem;
        }
    }
</style>

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // ============================================
    // HERO CAROUSEL - AUTO SLIDE
    // ============================================
    let heroCurrentSlide = 0;
    const heroSlides = document.querySelectorAll('.hero-carousel-slide');
    const heroIndicators = document.querySelectorAll('.hero-indicator');
    let heroAutoSlideInterval;

    function heroCarouselShowSlide(index) {
        heroSlides.forEach((slide, i) => {
            slide.classList.remove('active');
            heroIndicators[i].classList.remove('active');
        });

        heroCurrentSlide = (index + heroSlides.length) % heroSlides.length;
        heroSlides[heroCurrentSlide].classList.add('active');
        heroIndicators[heroCurrentSlide].classList.add('active');
    }

    function heroCarouselNext() {
        heroCarouselShowSlide(heroCurrentSlide + 1);
        heroResetAutoSlide();
    }

    function heroCarouselPrev() {
        heroCarouselShowSlide(heroCurrentSlide - 1);
        heroResetAutoSlide();
    }

    function heroCarouselGoTo(index) {
        heroCarouselShowSlide(index);
        heroResetAutoSlide();
    }

    function heroAutoSlide() {
        heroAutoSlideInterval = setInterval(() => {
            heroCarouselNext();
        }, 5000);
    }

    function heroResetAutoSlide() {
        clearInterval(heroAutoSlideInterval);
        heroAutoSlide();
    }

    // Start auto slide
    heroAutoSlide();

    // Pause on hover
    document.querySelector('.hero-carousel-section').addEventListener('mouseenter', () => {
        clearInterval(heroAutoSlideInterval);
    });

    document.querySelector('.hero-carousel-section').addEventListener('mouseleave', () => {
        heroAutoSlide();
    });

    // ============================================
    // TESTIMONIALS CAROUSEL - AUTO SLIDE
    // ============================================
    let testimonialsCurrentSlide = 0;
    const testimonialsSlides = document.querySelectorAll('.testimonials-slide');
    const testimonialIndicators = document.querySelectorAll('.testimonial-indicator');
    let testimonialsAutoSlideInterval;

    function testimonialsCarouselShowSlide(index) {
        testimonialsSlides.forEach((slide, i) => {
            slide.classList.remove('active');
            testimonialIndicators[i].classList.remove('active');
        });

        testimonialsCurrentSlide = (index + testimonialsSlides.length) % testimonialsSlides.length;
        testimonialsSlides[testimonialsCurrentSlide].classList.add('active');
        testimonialIndicators[testimonialsCurrentSlide].classList.add('active');
    }

    function testimonialsCarouselNext() {
        testimonialsCarouselShowSlide(testimonialsCurrentSlide + 1);
        testimonialsResetAutoSlide();
    }

    function testimonialsCarouselPrev() {
        testimonialsCarouselShowSlide(testimonialsCurrentSlide - 1);
        testimonialsResetAutoSlide();
    }

    function testimonialsCarouselGoTo(index) {
        testimonialsCarouselShowSlide(index);
        testimonialsResetAutoSlide();
    }

    function testimonialsAutoSlide() {
        testimonialsAutoSlideInterval = setInterval(() => {
            testimonialsCarouselNext();
        }, 6000);
    }

    function testimonialsResetAutoSlide() {
        clearInterval(testimonialsAutoSlideInterval);
        testimonialsAutoSlide();
    }

    // Start auto slide
    testimonialsAutoSlide();

    // Pause on hover
    document.querySelector('.testimonials-carousel-wrapper').addEventListener('mouseenter', () => {
        clearInterval(testimonialsAutoSlideInterval);
    });

    document.querySelector('.testimonials-carousel-wrapper').addEventListener('mouseleave', () => {
        testimonialsAutoSlide();
    });

    // ============================================
    // SMOOTH SCROLL
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#order') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
</script>
@endsection