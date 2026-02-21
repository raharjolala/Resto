@extends('layouts.app')

@section('title', $page->meta_title ?? 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Ketintang')

@section('meta_description', $page->meta_description ?? 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman')

@section('content')
@php
    // DEFAULT CONTENT - DIPINDAHKAN KE ATAS AGAR VARIABLE $content TERSEDIA
    $defaultContent = [
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
        
        // Testimoni 7 (BARU)
        'testimonial_7_name' => 'Budi Santoso',
        'testimonial_7_text' => 'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!',
        'testimonial_7_source' => 'Google Reviews',
        'testimonial_7_rating' => 5,
        
        // Testimoni 8 (BARU)
        'testimonial_8_name' => 'Siti Nurhaliza',
        'testimonial_8_text' => 'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.',
        'testimonial_8_source' => 'Google Reviews',
        'testimonial_8_rating' => 5,
        
        // Testimoni 9 (BARU)
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
    ];
    
    $content = array_merge($defaultContent, $page->content ?? []);
@endphp

<!-- ELEGANT RED GRADIENT HERO SECTION DENGAN ANIMASI SUPER HIDUP -->
<section class="elegant-hero">
    <!-- Soft Gradient Background -->
    <div class="elegant-gradient"></div>
    
    <!-- Decorative Elements -->
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>
    
    <!-- Animated Particles -->
    <div class="particle-container">
        @for($i = 1; $i <= 30; $i++)
            <div class="particle"></div>
        @endfor
    </div>
    
    <div class="container">
        <div class="row align-items-center" style="min-height: 85vh;">
            <div class="col-lg-6 col-xl-6">
                <!-- Premium Badge dengan Animasi -->
                <div class="premium-badge animate__animated animate__fadeInUp">
                    <span class="badge-dot"></span>
                    <span>{{ $content['hero_premium_badge'] }}</span>
                    <span class="badge-dot"></span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="elegant-heading">
                    <span class="heading-line reveal-text">{{ $content['hero_title_line1'] }}</span>
                    <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">{{ $content['hero_title_line2'] }}</span>
                    <span class="heading-line reveal-text" style="animation-delay: 0.4s">{{ $content['hero_title_line3'] }}</span>
                </h1>
                
                <!-- Description -->
                <p class="elegant-desc animate__animated animate__fadeInUp animate__delay-1s">
                    {{ $content['hero_description'] }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="elegant-cta">
                    <a href="{{ route('menu') }}" class="btn-elegant btn-primary-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>{{ $content['hero_button_menu'] }}</span>
                        <i class="fas fa-utensils"></i>
                    </a>
                    <a href="{{ route('reservation.create') }}" class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>{{ $content['hero_button_reservation'] }}</span>
                        <i class="fas fa-calendar-alt"></i>
                    </a>
                </div>
            </div>
            
            <!-- HERO IMAGE -->
            <div class="col-lg-6 col-xl-6">
                <div class="hero-image-wrapper animate__animated animate__fadeInRight animate__delay-0s">
                    <div class="hero-image-container hero-image-extra-large">
                        <div class="hero-image-frame hero-frame-premium">
                            <img src="{{ $content['hero_image_url'] }}"
                                 alt="Resto Joss Gandos Ketintang"
                                 class="hero-image img-fluid">
                            
                            <div class="image-overlay"></div>
                            <div class="image-glow"></div>
                            <div class="image-shine"></div>
                            
                            <div class="image-frame">
                                <div class="frame-corner top-left"></div>
                                <div class="frame-corner top-right"></div>
                                <div class="frame-corner bottom-left"></div>
                                <div class="frame-corner bottom-right"></div>
                            </div>
                            
                            <div class="image-premium-label animate__animated animate__pulse animate__infinite">
                                <span>{{ $content['hero_premium_badge'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="welcome-content-section" id="welcome">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="welcome-image-simple">
                    <div class="welcome-image-main-simple">
                        <img src="{{ $content['welcome_image_url'] }}" alt="Restaurant Interior">
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
                {{ $content['services_title_line1'] ?? 'Fasilitas &' }}<br>
                <span class="text-gradient">{{ $content['services_title_line2'] ?? 'Pelayanan Premium' }}</span>
            </h2>
            @if(!empty($content['services_subtitle']))
                <p class="section-subtitle-enhanced">
                    {{ $content['services_subtitle'] }}
                </p>
            @endif
        </div>

        <div class="row g-4 mt-4">
            @for($i = 1; $i <= 6; $i++)
            @php
                $iconDefault = $i == 1 ? 'fas fa-utensils' : ($i == 2 ? 'fas fa-users' : ($i == 3 ? 'fas fa-calendar-alt' : ($i == 4 ? 'fas fa-wifi' : ($i == 5 ? 'fas fa-mosque' : 'fas fa-parking'))));
                $titleDefault = $i == 1 ? 'Dine In' : ($i == 2 ? 'Private Room' : ($i == 3 ? 'Event & Catering' : ($i == 4 ? 'Free WiFi' : ($i == 5 ? 'Musholla' : 'Parkir Luas'))));
                $descDefault = $i == 1 ? 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan' : 
                               ($i == 2 ? 'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke' : 
                               ($i == 3 ? 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda' : 
                               ($i == 4 ? 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda' : 
                               ($i == 5 ? 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang' : 
                               'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda'))));
            @endphp
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $i }}">
                <div class="service-card-enhanced">
                    <div class="service-icon-enhanced">
                        <i class="{{ $content['service_'.$i.'_icon'] ?? $iconDefault }}"></i>
                    </div>
                    <h3 class="service-title-enhanced">{{ $content['service_'.$i.'_title'] ?? $titleDefault }}</h3>
                    <p class="service-description-enhanced">
                        {{ $content['service_'.$i.'_description'] ?? $descDefault }}
                    </p>
                    <div class="service-hover-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section-enhanced" id="testimonials">
    <div class="container">
        <div class="section-header-enhanced text-center" data-aos="fade-up">
            <div class="section-tag-enhanced mx-auto">
                <span class="tag-dot"></span>
                TESTIMONI
            </div>
            <h2 class="section-title-enhanced">
                {{ $content['testimonials_title_line1'] ?? 'Apa Kata' }}<br>
                <span class="text-gradient">{{ $content['testimonials_title_line2'] ?? 'Pelanggan Kami?' }}</span>
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
                        @for($i = 1; $i <= 3; $i++)
                        @php
                            $nameDefault = $i == 1 ? 'Achmad Thoriq' : ($i == 2 ? 'Perpus Uinsa' : 'Karenina Anisya');
                            $textDefault = $i == 1 ? 'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!' : 
                                          ($i == 2 ? 'Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.' : 
                                          'Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.');
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-enhanced">
                                <div class="testimonial-rating-enhanced">
                                    @for($r = 1; $r <= 5; $r++)
                                        @if($r <= ($content['testimonial_'.$i.'_rating'] ?? 5))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="testimonial-text-enhanced">
                                    "{{ $content['testimonial_'.$i.'_text'] ?? $textDefault }}"
                                </p>
                                <div class="testimonial-author-enhanced">
                                    <div class="author-avatar-enhanced">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="author-info-enhanced">
                                        <h4>{{ $content['testimonial_'.$i.'_name'] ?? $nameDefault }}</h4>
                                        <p>{{ $content['testimonial_'.$i.'_source'] ?? 'Google Reviews' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="testimonials-slide">
                    <div class="row g-4">
                        @for($i = 4; $i <= 6; $i++)
                        @php
                            $nameDefault = $i == 4 ? 'Filidyo Bramanta' : ($i == 5 ? 'M. Junianto Tri' : 'Metha Prosper');
                            $textDefault = $i == 4 ? 'Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.' : 
                                          ($i == 5 ? 'Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.' : 
                                          'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul');
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-enhanced">
                                <div class="testimonial-rating-enhanced">
                                    @for($r = 1; $r <= 5; $r++)
                                        @if($r <= ($content['testimonial_'.$i.'_rating'] ?? 5))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="testimonial-text-enhanced">
                                    "{{ $content['testimonial_'.$i.'_text'] ?? $textDefault }}"
                                </p>
                                <div class="testimonial-author-enhanced">
                                    <div class="author-avatar-enhanced">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="author-info-enhanced">
                                        <h4>{{ $content['testimonial_'.$i.'_name'] ?? $nameDefault }}</h4>
                                        <p>{{ $content['testimonial_'.$i.'_source'] ?? 'Google Reviews' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- Slide 3 - BARISAN TESTIMONI BARU -->
                <div class="testimonials-slide">
                    <div class="row g-4">
                        @for($i = 7; $i <= 9; $i++)
                        @php
                            $nameDefault = $i == 7 ? 'Budi Santoso' : ($i == 8 ? 'Siti Nurhaliza' : 'Rizki Firmansyah');
                            $textDefault = $i == 7 ? 'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!' : 
                                          ($i == 8 ? 'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.' : 
                                          'Live musicnya seru, makanannya lezat, minumannya juga segar-segar. Pelayanan memuaskan, bikin betah berlama-lama.');
                        @endphp
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-enhanced">
                                <div class="testimonial-rating-enhanced">
                                    @for($r = 1; $r <= 5; $r++)
                                        @if($r <= ($content['testimonial_'.$i.'_rating'] ?? 5))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="testimonial-text-enhanced">
                                    "{{ $content['testimonial_'.$i.'_text'] ?? $textDefault }}"
                                </p>
                                <div class="testimonial-author-enhanced">
                                    <div class="author-avatar-enhanced">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="author-info-enhanced">
                                        <h4>{{ $content['testimonial_'.$i.'_name'] ?? $nameDefault }}</h4>
                                        <p>{{ $content['testimonial_'.$i.'_source'] ?? 'Google Reviews' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="testimonials-indicators">
                <span class="testimonial-indicator active" onclick="testimonialsCarouselGoTo(0)"></span>
                <span class="testimonial-indicator" onclick="testimonialsCarouselGoTo(1)"></span>
                <span class="testimonial-indicator" onclick="testimonialsCarouselGoTo(2)"></span>
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
                            <span>{{ $content['cta_button1_text'] ?? 'Pesan Sekarang' }}</span>
                        </a>
                        <a href="{{ route('reservation.create') }}" class="btn-rounded-cta btn-rounded-cta-secondary">
                            <i class="fas fa-calendar-check"></i>
                            <span>{{ $content['cta_button2_text'] ?? 'Reservasi Sekarang' }}</span>
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
    /* ============================================
       CSS VARIABLES
    ============================================ */
    :root {
        --primary: #dc2626;
        --primary-dark: #b91c1c;
        --secondary: #f97316;
        --accent: #fbbf24;
        --accent-gold: #FFD700;
        --accent-light: #FFE55C;
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
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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

    /* ========== HERO IMAGE ========== */
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

    /* WELCOME SECTION */
    .welcome-content-section {
        padding: 120px 0;
        background: linear-gradient(135deg, #ffffff 0%, #fef2f2 100%);
        position: relative;
        overflow: hidden;
    }

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

    .text-gradient {
        background: linear-gradient(135deg, #dc2626 0%, #f97316 50%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

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

    .welcome-action-buttons {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 40px;
    }

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

    /* SERVICES SECTION */
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

    /* TESTIMONIALS SECTION */
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

    /* CTA SECTION */
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
    }

    .btn-rounded-cta-secondary:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
    }

    /* RESPONSIVE */
    @media (max-width: 1200px) {
        .heading-line {
            font-size: 3.8rem;
        }
    }

    @media (max-width: 992px) {
        .heading-line {
            font-size: 3.2rem;
        }
        .elegant-desc {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .elegant-hero {
            padding: 80px 0 40px;
        }
        .heading-line {
            font-size: 2.8rem;
        }
        .elegant-cta {
            flex-direction: column;
        }
        .btn-elegant {
            width: 100%;
            justify-content: center;
        }
        .welcome-content-enhanced {
            padding-left: 0;
            padding-top: 30px;
        }
        .welcome-image-main-simple img {
            height: 400px;
        }
    }

    @media (max-width: 576px) {
        .heading-line {
            font-size: 2.2rem;
        }
        .elegant-desc {
            font-size: 1rem;
        }
        .premium-badge span {
            font-size: 0.8rem;
        }
        .welcome-image-main-simple img {
            height: 350px;
        }
        .btn-enhanced {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Animate.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

    // Testimonials Carousel
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

    if (testimonialsSlides.length > 0) {
        testimonialsAutoSlide();
    }

    const carouselWrapper = document.querySelector('.testimonials-carousel-wrapper');
    if (carouselWrapper) {
        carouselWrapper.addEventListener('mouseenter', () => {
            clearInterval(testimonialsAutoSlideInterval);
        });

        carouselWrapper.addEventListener('mouseleave', () => {
            testimonialsAutoSlide();
        });
    }

    // Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
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