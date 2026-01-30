@extends('layouts.app')

@section('title', 'Resto Joss Gandos - Pelopor No. 1 Resto dan Cafe di Jemursari')

@section('content')
    <!-- Hero Section - Matches Screenshot 1 -->
    <section class="hero-section-main">
        <div class="hero-overlay"></div>
        <div class="hero-background-image"></div>
        
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100">
                <div class="col-12 text-center">
                    <div class="hero-content-wrapper">
                        <!-- EST Badge -->
                        <div class="est-badge animate-fade-in">
                            EST. 2017
                        </div>
                        
                        <!-- Main Title -->
                        <h1 class="hero-main-title animate-slide-up">
                            Resto <span class="joss-text">Joss Gandos</span>
                        </h1>
                        
                        <!-- Subtitle -->
                        <p class="hero-main-subtitle animate-slide-up" style="animation-delay: 0.2s;">
                            Pelopor No. 1 Resto dan Cafe di Jemursari
                        </p>
                        
                        <!-- Navigation Buttons -->
                        <div class="hero-nav-buttons animate-slide-up" style="animation-delay: 0.3s;">
                            <a href="#about" class="hero-nav-btn">
                                <i class="fas fa-info-circle"></i>
                                <span>Tentang Kami</span>
                            </a>
                            <a href="{{ route('menu') }}" class="hero-nav-btn">
                                <i class="fas fa-book-open"></i>
                                <span>Menu Kami</span>
                            </a>
                            <a href="#gallery" class="hero-nav-btn">
                                <i class="fas fa-images"></i>
                                <span>Galeri Kami</span>
                            </a>
                            <a href="{{ route('reservation.create') }}" class="hero-nav-btn">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Reservasi</span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section - Matches Screenshot 2 -->
    <section class="about-section" id="about">
        <div class="about-pattern-bg"></div>
        
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content animate-slide-right">
                        <div class="section-label">
                            SELAMAT DATANG
                        </div>
                        
                        <h2 class="about-title">
                            Resto <span class="joss-text">Joss</span><br>
                            <span class="gandos-text">Gandos</span>
                        </h2>
                        
                        <div class="about-divider"></div>
                        
                        <p class="about-description">
                            Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. 
                            Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.
                        </p>
                        
                        <a href="{{ route('menu') }}" class="about-cta-btn">
                            Lihat Menu Kami <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="about-image-wrapper animate-slide-left">
                        <div class="about-image-glow"></div>
                        <div class="about-image-frame">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 alt="Resto Joss Gandos Team" 
                                 class="about-main-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section - Matches Screenshot 3 -->
    <section class="testimonials-section-main">
        <div class="testimonials-pattern-bg"></div>
        
        <div class="container position-relative">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="testimonials-main-title animate-fade-in">
                        Ulasan <span class="pelanggan-text">Pelanggan</span>
                    </h2>
                    <p class="testimonials-subtitle animate-fade-in" style="animation-delay: 0.1s;">
                        Apa kata mereka yang telah merasakan kehangatan dan cita rasa Joss Gandos?
                    </p>
                </div>
            </div>
            
            <div class="testimonials-slider-wrapper">
                <div class="row g-4">
                    @php
                        $testimonials = [
                            [
                                'text' => 'Layanan satset dan super ramah. Mushola luass, bisa shalat jamaah. Ruangan vip tersedia karaoke, mantab buat seru-seruan.',
                                'name' => 'M. Junianto Tri',
                                'location' => 'RESTO JOSS GANDOS - JEMURSARI',
                                'avatar' => 'https://ui-avatars.com/api/?name=M+Junianto+Tri&background=dc2626&color=fff&size=200',
                                'rating' => 5
                            ],
                            [
                                'text' => 'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul',
                                'name' => 'Metha Prosper',
                                'location' => 'RESTO JOSS GANDOS - JEMURSARI',
                                'avatar' => 'https://ui-avatars.com/api/?name=Metha+Prosper&background=b45309&color=fff&size=200',
                                'rating' => 5
                            ],
                            [
                                'text' => 'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerdyain ulang tahun disini seru banget!',
                                'name' => 'Achmad Thoriq',
                                'location' => 'RESTO JOSS GANDOS - JEMURSARI',
                                'avatar' => 'https://ui-avatars.com/api/?name=Achmad+Thoriq&background=b42222&color=fff&size=200',
                                'rating' => 5
                            ],
                        ];
                    @endphp
                    
                    @foreach($testimonials as $index => $testimonial)
                        <div class="col-lg-4 col-md-6">
                            <div class="testimonial-card-main animate-fade-in" style="animation-delay: {{ $index * 0.15 }}s;">
                                <div class="testimonial-rating-stars">
                                    @for($i = 1; $i <= $testimonial['rating']; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                
                                <p class="testimonial-text-main">
                                    "{{ $testimonial['text'] }}"
                                </p>
                                
                                <div class="testimonial-author-main">
                                    <img src="{{ $testimonial['avatar'] }}" 
                                         alt="{{ $testimonial['name'] }}" 
                                         class="testimonial-avatar-main">
                                    <div class="testimonial-author-info">
                                        <h6 class="testimonial-author-name">{{ $testimonial['name'] }}</h6>
                                        <p class="testimonial-author-location">{{ $testimonial['location'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination Dots -->
                <div class="testimonial-pagination">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot active"></span>
                </div>
                
                <!-- View More Button -->
                <div class="text-center mt-5 animate-fade-in" style="animation-delay: 0.5s;">
                    <a href="#" class="view-more-testimonials-btn">
                        <i class="fab fa-google me-2"></i>
                        Lihat Ulasan Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section - Matches Screenshot 4 -->
    <section class="cta-section-main">
        <div class="cta-pattern-overlay"></div>
        
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h2 class="cta-main-title animate-slide-up">
                        Siap Merasakan<br>
                        Pengalaman Kuliner Terbaik?
                    </h2>
                    
                    <p class="cta-main-subtitle animate-fade-in" style="animation-delay: 0.2s;">
                        Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan<br>
                        hidangan istimewa kami. Pesan dan reservasi sekarang!
                    </p>
                    
                    <div class="cta-buttons-wrapper animate-scale-in" style="animation-delay: 0.3s;">
                        <a href="#order" class="cta-btn-main cta-btn-outline">
                            Pesan Sekarang
                        </a>
                        <a href="{{ route('reservation.create') }}" class="cta-btn-main cta-btn-solid">
                            Reservasi Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Features Section (Optional Enhancement) -->
    <section class="features-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-mini animate-fade-in">
                        <div class="feature-icon-mini">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <h6 class="feature-title-mini">Menu Variatif</h6>
                        <p class="feature-desc-mini">50+ pilihan menu autentik</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-mini animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="feature-icon-mini">
                            <i class="fas fa-award"></i>
                        </div>
                        <h6 class="feature-title-mini">Kualitas Terjamin</h6>
                        <p class="feature-desc-mini">Bahan premium pilihan</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-mini animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="feature-icon-mini">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h6 class="feature-title-mini">Pelayanan Ramah</h6>
                        <p class="feature-desc-mini">Tim profesional siap melayani</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card-mini animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="feature-icon-mini">
                            <i class="fas fa-home"></i>
                        </div>
                        <h6 class="feature-title-mini">Suasana Nyaman</h6>
                        <p class="feature-desc-mini">Ruangan ber-AC & karaoke</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* ============================================
       HERO SECTION - SCREENSHOT 1 STYLE
    ============================================ */
    .hero-section-main {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: #1a1a1a;
    }
    
    .hero-background-image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.75) 50%, rgba(0, 0, 0, 0.85) 100%);
        z-index: 1;
    }
    
    .hero-content-wrapper {
        position: relative;
        z-index: 2;
        padding: 40px 20px;
    }
    
    .est-badge {
        display: inline-block;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        padding: 8px 30px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 3px;
        margin-bottom: 30px;
        box-shadow: 0 8px 30px rgba(220, 38, 38, 0.4);
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    .hero-main-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(3rem, 10vw, 7rem);
        font-weight: 900;
        color: white;
        margin-bottom: 20px;
        line-height: 1.1;
        text-shadow: 3px 3px 20px rgba(0, 0, 0, 0.8);
    }
    
    .joss-text {
        background: linear-gradient(135deg, #dc2626 0%, #f97316 50%, #fbbf24 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
        animation: gradientFlow 3s ease infinite;
        background-size: 200% 200%;
    }
    
    @keyframes gradientFlow {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .hero-main-subtitle {
        font-size: clamp(1.1rem, 2.5vw, 1.5rem);
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 50px;
        font-weight: 400;
        letter-spacing: 1px;
    }
    
    /* Navigation Buttons */
    .hero-nav-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 50px;
    }
    
    .hero-nav-btn {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 18px 35px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.4s ease;
        overflow: hidden;
    }
    
    .hero-nav-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .hero-nav-btn:hover::before {
        left: 100%;
    }
    
    .hero-nav-btn:hover {
        background: rgba(220, 38, 38, 0.9);
        border-color: #dc2626;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(220, 38, 38, 0.5);
    }
    
    .hero-nav-btn i {
        font-size: 1.2rem;
    }
    
    .hero-bottom-text {
        margin-top: 40px;
    }
    
    .hero-bottom-text p {
        color: rgba(255, 255, 255, 0.6);
        font-size: 1.1rem;
        font-style: italic;
        margin: 0;
    }
    
    /* ============================================
       ABOUT SECTION - SCREENSHOT 2 STYLE
    ============================================ */
    .about-section {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        overflow: hidden;
    }
    
    .about-pattern-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(220, 38, 38, 0.02) 35px, rgba(220, 38, 38, 0.02) 70px),
            radial-gradient(circle at 20% 50%, rgba(251, 191, 36, 0.05) 0%, transparent 50%);
        opacity: 0.6;
    }
    
    .about-content {
        padding-right: 50px;
    }
    
    .section-label {
        display: inline-block;
        color: #dc2626;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 3px;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    
    .about-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        color: #1a1a1a;
        margin-bottom: 25px;
        line-height: 1.2;
    }
    
    .about-title .joss-text {
        color: #dc2626;
    }
    
    .about-title .gandos-text {
        background: linear-gradient(135deg, #dc2626 0%, #f97316 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .about-divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #dc2626, #f97316, #fbbf24);
        border-radius: 2px;
        margin-bottom: 30px;
    }
    
    .about-description {
        font-size: 1.15rem;
        line-height: 1.8;
        color: #4b5563;
        margin-bottom: 40px;
    }
    
    .about-cta-btn {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        padding: 18px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.05rem;
        transition: all 0.4s ease;
        box-shadow: 0 10px 40px rgba(220, 38, 38, 0.3);
    }
    
    .about-cta-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.5);
        color: white;
    }
    
    /* About Image */
    .about-image-wrapper {
        position: relative;
        padding: 30px;
    }
    
    .about-image-glow {
        position: absolute;
        top: 0;
        right: -50px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(220, 38, 38, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        filter: blur(60px);
        animation: float 8s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-30px); }
    }
    
    .about-image-frame {
        position: relative;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 
            0 30px 80px rgba(0, 0, 0, 0.15),
            0 0 0 10px rgba(220, 38, 38, 0.1),
            0 0 0 20px rgba(251, 191, 36, 0.05);
        transition: transform 0.5s ease;
    }
    
    .about-image-frame:hover {
        transform: scale(1.02) rotate(1deg);
    }
    
    .about-main-image {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 30px;
    }
    
    /* ============================================
       TESTIMONIALS SECTION - SCREENSHOT 3 STYLE
    ============================================ */
    .testimonials-section-main {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #fef3c7 0%, #fef9e7 50%, #fef3c7 100%);
        overflow: hidden;
    }
    
    .testimonials-pattern-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(220, 38, 38, 0.02) 35px, rgba(220, 38, 38, 0.02) 70px),
            repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(251, 191, 36, 0.02) 35px, rgba(251, 191, 36, 0.02) 70px);
        opacity: 0.5;
    }
    
    .testimonials-main-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        color: #1a1a1a;
        margin-bottom: 15px;
    }
    
    .pelanggan-text {
        color: #dc2626;
    }
    
    .testimonials-subtitle {
        font-size: 1.15rem;
        color: #6b7280;
        margin-bottom: 50px;
    }
    
    .testimonials-slider-wrapper {
        position: relative;
    }
    
    .testimonial-card-main {
        background: white;
        border-radius: 25px;
        padding: 35px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 2px solid transparent;
    }
    
    .testimonial-card-main:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(220, 38, 38, 0.15);
        border-color: rgba(220, 38, 38, 0.2);
    }
    
    .testimonial-rating-stars {
        color: #fbbf24;
        font-size: 1.2rem;
        margin-bottom: 20px;
    }
    
    .testimonial-rating-stars i {
        margin-right: 3px;
    }
    
    .testimonial-text-main {
        font-size: 1.05rem;
        line-height: 1.8;
        color: #374151;
        font-style: italic;
        margin-bottom: 25px;
        flex: 1;
    }
    
    .testimonial-author-main {
        display: flex;
        align-items: center;
        gap: 15px;
        padding-top: 25px;
        border-top: 2px solid rgba(0, 0, 0, 0.05);
    }
    
    .testimonial-avatar-main {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #dc2626;
        box-shadow: 0 5px 20px rgba(220, 38, 38, 0.3);
    }
    
    .testimonial-author-info {
        flex: 1;
    }
    
    .testimonial-author-name {
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 5px;
        font-size: 1.05rem;
    }
    
    .testimonial-author-location {
        color: #dc2626;
        font-size: 0.85rem;
        font-weight: 600;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Pagination Dots */
    .testimonial-pagination {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 50px;
    }
    
    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(220, 38, 38, 0.2);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dot.active {
        background: #dc2626;
        width: 35px;
        border-radius: 6px;
    }
    
    .dot:hover {
        background: #dc2626;
    }
    
    /* View More Button */
    .view-more-testimonials-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        padding: 18px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.05rem;
        transition: all 0.4s ease;
        box-shadow: 0 10px 40px rgba(220, 38, 38, 0.3);
    }
    
    .view-more-testimonials-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.5);
        color: white;
    }
    
    /* ============================================
       CTA SECTION - SCREENSHOT 4 STYLE
    ============================================ */
    .cta-section-main {
        position: relative;
        padding: 120px 0;
        background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        overflow: hidden;
    }
    
    .cta-pattern-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(220, 38, 38, 0.02) 35px, rgba(220, 38, 38, 0.02) 70px),
            radial-gradient(circle at 50% 50%, rgba(251, 191, 36, 0.05) 0%, transparent 50%);
        opacity: 0.6;
    }
    
    .cta-main-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 6vw, 4rem);
        font-weight: 900;
        color: #dc2626;
        margin-bottom: 25px;
        line-height: 1.3;
    }
    
    .cta-main-subtitle {
        font-size: 1.2rem;
        color: #6b7280;
        margin-bottom: 50px;
        line-height: 1.7;
    }
    
    .cta-buttons-wrapper {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    
    .cta-btn-main {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 20px 45px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.4s ease;
        min-width: 250px;
    }
    
    .cta-btn-outline {
        background: transparent;
        border: 3px solid #dc2626;
        color: #dc2626;
    }
    
    .cta-btn-outline:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.4);
    }
    
    .cta-btn-solid {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        border: 3px solid transparent;
        box-shadow: 0 10px 40px rgba(220, 38, 38, 0.3);
    }
    
    .cta-btn-solid:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.5);
        color: white;
    }
    
    /* ============================================
       FEATURES SECTION (BONUS)
    ============================================ */
    .features-section {
        padding: 80px 0;
        background: white;
    }
    
    .feature-card-mini {
        background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        transition: all 0.4s ease;
        border: 2px solid rgba(0, 0, 0, 0.05);
        height: 100%;
    }
    
    .feature-card-mini:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(220, 38, 38, 0.1);
        border-color: rgba(220, 38, 38, 0.2);
    }
    
    .feature-icon-mini {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #dc2626, #f97316);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        margin: 0 auto 20px;
        box-shadow: 0 10px 30px rgba(220, 38, 38, 0.3);
        transition: transform 0.3s ease;
    }
    
    .feature-card-mini:hover .feature-icon-mini {
        transform: scale(1.1) rotate(10deg);
    }
    
    .feature-title-mini {
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 10px;
        font-size: 1.1rem;
    }
    
    .feature-desc-mini {
        color: #6b7280;
        font-size: 0.95rem;
        margin: 0;
    }
    
    /* ============================================
       ANIMATIONS
    ============================================ */
    @keyframes animate-fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes animate-slide-up {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes animate-slide-right {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes animate-slide-left {
        from {
            opacity: 0;
            transform: translateX(40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes animate-scale-in {
        from {
            opacity: 0;
            transform: scale(0.9);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .animate-fade-in {
        animation: animate-fade-in 1s ease-out forwards;
        opacity: 0;
    }
    
    .animate-slide-up {
        animation: animate-slide-up 1s ease-out forwards;
        opacity: 0;
    }
    
    .animate-slide-right {
        animation: animate-slide-right 1s ease-out forwards;
        opacity: 0;
    }
    
    .animate-slide-left {
        animation: animate-slide-left 1s ease-out forwards;
        opacity: 0;
    }
    
    .animate-scale-in {
        animation: animate-scale-in 0.8s ease-out forwards;
        opacity: 0;
    }
    
    /* ============================================
       RESPONSIVE DESIGN
    ============================================ */
    @media (max-width: 992px) {
        .hero-nav-buttons {
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto 50px;
        }
        
        .hero-nav-btn {
            width: 100%;
            justify-content: center;
        }
        
        .about-content {
            padding-right: 0;
            margin-bottom: 50px;
        }
        
        .about-image-wrapper {
            padding: 20px;
        }
        
        .cta-buttons-wrapper {
            flex-direction: column;
            align-items: center;
        }
        
        .cta-btn-main {
            width: 100%;
            max-width: 400px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-main-title {
            font-size: clamp(2.5rem, 8vw, 5rem);
        }
        
        .est-badge {
            font-size: 0.8rem;
            padding: 6px 20px;
        }
        
        .hero-nav-btn {
            padding: 15px 25px;
            font-size: 0.95rem;
        }
        
        .about-title {
            font-size: clamp(2rem, 5vw, 3rem);
        }
        
        .testimonials-main-title {
            font-size: clamp(2rem, 5vw, 3rem);
        }
        
        .cta-main-title {
            font-size: clamp(2rem, 5vw, 3rem);
        }
        
        .testimonial-card-main {
            padding: 25px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // ============================================
    // SMOOTH SCROLL
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // ============================================
    // SCROLL ANIMATIONS OBSERVER
    // ============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);
    
    document.querySelectorAll('[class*="animate-"]').forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });
    
    // ============================================
    // TESTIMONIAL PAGINATION (Optional)
    // ============================================
    document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.addEventListener('click', function() {
            document.querySelectorAll('.dot').forEach(d => d.classList.remove('active'));
            this.classList.add('active');
            // Add carousel logic here if needed
        });
    });
    
    // ============================================
    // PARALLAX EFFECT ON SCROLL
    // ============================================
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroImage = document.querySelector('.hero-background-image');
        
        if (heroImage) {
            heroImage.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
    
    // ============================================
    // HOVER EFFECTS ENHANCEMENT
    // ============================================
    document.querySelectorAll('.testimonial-card-main').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
</script>
@endsection