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

    <!-- Testimonials Section - PERBAIKAN: 3 testimonial berdampingan -->
    <section class="testimonials-fixed-section" id="testimonials">
        <div class="testimonials-fixed-bg"></div>
        
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <div class="section-header-fixed">
                        <h2 class="testimonials-fixed-title">
                            Ulasan Pelanggan
                        </h2>
                        <div class="title-divider-fixed">
                            <span class="divider-line-fixed"></span>
                            <i class="fas fa-star divider-icon-fixed"></i>
                            <span class="divider-line-fixed"></span>
                        </div>
                        <p class="testimonials-fixed-subtitle">
                            Apa kata mereka yang telah merasakan kehangatan dan cita rasa Joss Gandos?
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Testimonials Carousel - 3 TESTIMONIAL BERDAMPINGAN -->
            <div class="testimonials-fixed-carousel-wrapper">
                <div class="testimonials-fixed-carousel" id="testimonialsFixedCarousel">
                    <!-- Slide 1 - 3 Testimonial Berdampingan -->
                    <div class="testimonial-fixed-slide active">
                        <div class="row g-4">
                            <!-- Testimonial 1 - Achmad Thoriq -->
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-fixed-card">
                                    <!-- BINTANG DI DALAM CARD -->
                                    <div class="testimonial-rating-fixed">
                                        <div class="stars-fixed">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-text-fixed">
                                        <div class="quote-mark-fixed">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p class="testimonial-content-fixed">
                                            Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!
                                        </p>
                                    </div>
                                    
                                    <div class="testimonial-author-fixed">
                                        <div class="author-info-fixed">
                                            <h4 class="author-name-fixed">Achmad Thoriq</h4>
                                            <p class="author-location-fixed">RESTO JOSS GANDOS - JEMURSARI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Testimonial 2 - Perpus Uinsa -->
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-fixed-card">
                                    <!-- BINTANG DI DALAM CARD -->
                                    <div class="testimonial-rating-fixed">
                                        <div class="stars-fixed">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-text-fixed">
                                        <div class="quote-mark-fixed">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p class="testimonial-content-fixed">
                                            Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.
                                        </p>
                                    </div>
                                    
                                    <div class="testimonial-author-fixed">
                                        <div class="author-info-fixed">
                                            <h4 class="author-name-fixed">Perpus Uinsa</h4>
                                            <p class="author-location-fixed">RESTO JOSS GANDOS - JEMURSARI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Testimonial 3 - Karenina Anisya -->
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-fixed-card">
                                    <!-- BINTANG DI DALAM CARD -->
                                    <div class="testimonial-rating-fixed">
                                        <div class="stars-fixed">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-text-fixed">
                                        <div class="quote-mark-fixed">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p class="testimonial-content-fixed">
                                            Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.
                                        </p>
                                    </div>
                                    
                                    <div class="testimonial-author-fixed">
                                        <div class="author-info-fixed">
                                            <h4 class="author-name-fixed">Karenina Anisya</h4>
                                            <p class="author-location-fixed">RESTO JOSS GANDOS - JEMURSARI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2 - 3 Testimonial Berdampingan Lainnya -->
                    <div class="testimonial-fixed-slide">
                        <div class="row g-4">
                            <!-- Testimonial 4 - Filidyo Bramanta -->
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-fixed-card">
                                    <div class="testimonial-rating-fixed">
                                        <div class="stars-fixed">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-text-fixed">
                                        <div class="quote-mark-fixed">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p class="testimonial-content-fixed">
                                            Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.
                                        </p>
                                    </div>
                                    
                                    <div class="testimonial-author-fixed">
                                        <div class="author-info-fixed">
                                            <h4 class="author-name-fixed">Filidyo Bramanta</h4>
                                            <p class="author-location-fixed">RESTO JOSS GANDOS - JEMURSARI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Testimonial 5 - M. Junianto Tri -->
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-fixed-card">
                                    <div class="testimonial-rating-fixed">
                                        <div class="stars-fixed">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-text-fixed">
                                        <div class="quote-mark-fixed">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p class="testimonial-content-fixed">
                                            Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.
                                        </p>
                                    </div>
                                    
                                    <div class="testimonial-author-fixed">
                                        <div class="author-info-fixed">
                                            <h4 class="author-name-fixed">M. Junianto Tri</h4>
                                            <p class="author-location-fixed">RESTO JOSS GANDOS - JEMURSARI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Testimonial 6 - Metha Prosper -->
                            <div class="col-lg-4 col-md-6">
                                <div class="testimonial-fixed-card">
                                    <div class="testimonial-rating-fixed">
                                        <div class="stars-fixed">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="testimonial-text-fixed">
                                        <div class="quote-mark-fixed">
                                            <i class="fas fa-quote-left"></i>
                                        </div>
                                        <p class="testimonial-content-fixed">
                                            Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul
                                        </p>
                                    </div>
                                    
                                    <div class="testimonial-author-fixed">
                                        <div class="author-info-fixed">
                                            <h4 class="author-name-fixed">Metha Prosper</h4>
                                            <p class="author-location-fixed">RESTO JOSS GANDOS - JEMURSARI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carousel Dots ONLY (NO ARROWS) -->
                <div class="carousel-dots-fixed">
                    <span class="dot-fixed active" data-index="0"></span>
                    <span class="dot-fixed" data-index="1"></span>
                </div>
            </div>
            
            <!-- View More Button - PERBAIKAN: Menggunakan URL langsung -->
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="https://www.google.com/search?q=Resto+Joss+Gandos+Ulasan&rlz=1C1VDKB_enID1074ID1074&oq=Resto+Joss+Gandos+Ulasan&gs_lcrp=EgZjaHJvbWUqBwgAEAAYgAQyBwgAEAAYgAQyBggBEEUYOTIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIHCAcQABiABDIHCAgQABiABDIHCAkQABiABNIBCDYxNjZqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8#lrd=0x2dd7f7e3d1d54b1b:0x6925233761792d0b,1,,,,"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-view-more-fixed"
                       id="googleReviewsBtn">
                        <i class="fab fa-google me-2"></i>
                        Lihat Ulasan Selengkapnya
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
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

    <!-- Features Section -->
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
       TESTIMONIALS FIXED SECTION - PERBAIKAN
       FIXED GLITCH ISSUE AND IMPROVED ANIMATIONS
    ============================================ */
    .testimonials-fixed-section {
        position: relative;
        padding: 100px 0;
        background: linear-gradient(135deg, #fffaf0 0%, #fff8e7 100%);
        overflow: hidden;
    }
    
    .testimonials-fixed-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 10% 20%, rgba(255, 215, 0, 0.08) 0%, transparent 30%),
            radial-gradient(circle at 90% 80%, rgba(220, 38, 38, 0.08) 0%, transparent 30%);
        z-index: 1;
    }
    
    /* Section Header */
    .section-header-fixed {
        position: relative;
        z-index: 2;
        padding: 0 20px;
        margin-bottom: 50px;
    }
    
    .testimonials-fixed-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2.5rem, 6vw, 3.5rem);
        font-weight: 900;
        color: #1a1a1a;
        margin-bottom: 15px;
        line-height: 1.2;
        text-align: center;
    }
    
    .title-divider-fixed {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .divider-line-fixed {
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #dc2626, #f97316);
        border-radius: 2px;
    }
    
    .divider-icon-fixed {
        color: #ffd700;
        font-size: 1.2rem;
    }
    
    .testimonials-fixed-subtitle {
        font-size: 1.1rem;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
        font-weight: 400;
        text-align: center;
    }
    
    /* Testimonial Cards - 3 BERDAMPINGAN - FIXED */
    .testimonials-fixed-carousel-wrapper {
        position: relative;
        z-index: 2;
        margin-top: 30px;
    }
    
    .testimonials-fixed-carousel {
        overflow: hidden;
        position: relative;
        min-height: 350px; /* Fixed height to prevent glitch */
    }
    
    .testimonial-fixed-slide {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        opacity: 0;
        transition: opacity 0.5s ease, transform 0.5s ease;
        transform: translateX(20px);
    }
    
    .testimonial-fixed-slide.active {
        display: block;
        position: relative;
        opacity: 1;
        transform: translateX(0);
    }
    
    .testimonial-fixed-slide.next {
        transform: translateX(20px);
    }
    
    .testimonial-fixed-slide.prev {
        transform: translateX(-20px);
    }
    
    .testimonial-fixed-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        height: 100%;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        text-align: center;
    }
    
    .testimonial-fixed-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }
    
    /* Bintang Rating DI DALAM CARD - DI ATAS */
    .testimonial-rating-fixed {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .stars-fixed {
        display: flex;
        gap: 5px;
    }
    
    .stars-fixed i {
        color: #ffd700;
        font-size: 1.3rem;
    }
    
    /* Testimonial Text */
    .testimonial-text-fixed {
        flex: 1;
        margin-bottom: 25px;
        position: relative;
    }
    
    .quote-mark-fixed {
        color: rgba(220, 38, 38, 0.2);
        font-size: 2rem;
        margin-bottom: 15px;
        line-height: 1;
    }
    
    .testimonial-content-fixed {
        font-size: 1rem;
        line-height: 1.7;
        color: #444;
        margin-bottom: 0;
        font-style: italic;
    }
    
    /* Testimonial Author */
    .testimonial-author-fixed {
        padding-top: 20px;
        border-top: 1px solid rgba(0, 0, 0, 0.08);
    }
    
    .author-info-fixed {
        text-align: center;
    }
    
    .author-name-fixed {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }
    
    .author-location-fixed {
        font-size: 0.85rem;
        color: #dc2626;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin: 0;
    }
    
    /* Carousel Dots ONLY - NO ARROWS - FIXED */
    .carousel-dots-fixed {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 40px;
        position: relative;
        z-index: 3;
    }
    
    .dot-fixed {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.1);
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        border: none;
        padding: 0;
        margin: 0;
    }
    
    .dot-fixed.active {
        background: #dc2626;
        transform: scale(1.3);
    }
    
    .dot-fixed.active::after {
        content: '';
        position: absolute;
        top: -4px;
        left: -4px;
        right: -4px;
        bottom: -4px;
        border: 2px solid #dc2626;
        border-radius: 50%;
        animation: pulse-dot-fixed 3s ease-in-out infinite;
    }
    
    @keyframes pulse-dot-fixed {
        0%, 100% {
            transform: scale(1);
            opacity: 0.7;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.3;
        }
    }
    
    /* View More Button - PERBAIKAN: Hanya menggunakan href normal */
    .btn-view-more-fixed {
        display: inline-flex;
        align-items: center;
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        padding: 16px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.05rem;
        transition: all 0.4s ease;
        box-shadow: 0 10px 40px rgba(220, 38, 38, 0.3);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        pointer-events: auto;
        z-index: 10;
    }
    
    .btn-view-more-fixed::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-view-more-fixed:hover::before {
        left: 100%;
    }
    
    .btn-view-more-fixed:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 50px rgba(220, 38, 38, 0.5);
        border-color: white;
    }
    
    /* ============================================
       CTA SECTION
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
       FEATURES SECTION
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
        
        .testimonial-fixed-card {
            padding: 25px;
            margin-bottom: 20px;
        }
        
        .testimonials-fixed-carousel {
            min-height: 400px;
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
        
        .cta-main-title {
            font-size: clamp(2rem, 5vw, 3rem);
        }
        
        .testimonials-fixed-title {
            font-size: clamp(2rem, 5vw, 2.8rem);
        }
        
        .testimonial-fixed-card {
            padding: 20px;
        }
        
        .testimonial-content-fixed {
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        .btn-view-more-fixed {
            padding: 14px 30px;
            font-size: 1rem;
        }
        
        .testimonials-fixed-carousel {
            min-height: 450px;
        }
    }
    
    @media (max-width: 576px) {
        .hero-nav-buttons {
            gap: 10px;
        }
        
        .hero-nav-btn {
            padding: 12px 20px;
            font-size: 0.9rem;
        }
        
        .hero-nav-btn i {
            font-size: 1rem;
        }
        
        .testimonials-fixed-title {
            font-size: 1.8rem;
        }
        
        .testimonials-fixed-subtitle {
            font-size: 1rem;
        }
        
        .testimonial-fixed-card {
            padding: 18px;
        }
        
        .testimonial-content-fixed {
            font-size: 0.9rem;
            line-height: 1.6;
        }
        
        .stars-fixed i {
            font-size: 1.1rem;
        }
        
        .author-name-fixed {
            font-size: 1rem;
        }
        
        .author-location-fixed {
            font-size: 0.8rem;
        }
        
        .btn-view-more-fixed {
            padding: 12px 25px;
            font-size: 0.95rem;
            width: 100%;
            max-width: 300px;
            justify-content: center;
        }
        
        .cta-btn-main {
            min-width: auto;
            width: 100%;
            padding: 18px 25px;
        }
        
        .testimonials-fixed-carousel {
            min-height: 500px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // ============================================
    // FIXED TESTIMONIAL CAROUSEL - NO GLITCH
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('testimonialsFixedCarousel');
        const slides = document.querySelectorAll('.testimonial-fixed-slide');
        const dots = document.querySelectorAll('.dot-fixed');
        
        let currentSlide = 0;
        let autoScrollInterval;
        const slideInterval = 6000; // 6 seconds
        
        // Initialize carousel
        function initCarousel() {
            if (!carousel || slides.length === 0) return;
            
            updateCarousel();
            startAutoScroll();
            
            // Add click event to dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    goToSlide(index);
                });
            });
            
            // Pause auto-scroll on hover
            carousel.addEventListener('mouseenter', pauseAutoScroll);
            carousel.addEventListener('mouseleave', startAutoScroll);
            
            // Touch/swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            
            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                pauseAutoScroll();
            });
            
            carousel.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
                startAutoScroll();
            });
            
            function handleSwipe() {
                const swipeThreshold = 50;
                
                if (touchStartX - touchEndX > swipeThreshold) {
                    // Swipe left - next slide
                    nextSlide();
                } else if (touchEndX - touchStartX > swipeThreshold) {
                    // Swipe right - previous slide
                    prevSlide();
                }
            }
        }
        
        function goToSlide(index) {
            // Remove active class from all slides
            slides.forEach(slide => {
                slide.classList.remove('active', 'next', 'prev');
            });
            
            // Update current slide
            currentSlide = index;
            
            // Update active slide with smooth transition
            setTimeout(() => {
                slides[currentSlide].classList.add('active');
            }, 10);
            
            updateDots();
        }
        
        function nextSlide() {
            let nextIndex = (currentSlide + 1) % slides.length;
            
            // Add transition classes
            slides[currentSlide].classList.add('prev');
            slides[nextIndex].classList.add('next');
            
            setTimeout(() => {
                goToSlide(nextIndex);
            }, 300);
        }
        
        function prevSlide() {
            let prevIndex = (currentSlide - 1 + slides.length) % slides.length;
            
            // Add transition classes
            slides[currentSlide].classList.add('next');
            slides[prevIndex].classList.add('prev');
            
            setTimeout(() => {
                goToSlide(prevIndex);
            }, 300);
        }
        
        function updateDots() {
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }
        
        function startAutoScroll() {
            if (autoScrollInterval) clearInterval(autoScrollInterval);
            
            autoScrollInterval = setInterval(() => {
                nextSlide();
            }, slideInterval);
        }
        
        function pauseAutoScroll() {
            if (autoScrollInterval) clearInterval(autoScrollInterval);
        }
        
        // Initialize the carousel
        initCarousel();
        
        // ============================================
        // GOOGLE REVIEWS BUTTON - SIMPLE FIX
        // Hapus semua event listener yang mungkin konflik
        // ============================================
        const googleReviewBtn = document.getElementById('googleReviewsBtn');
        
        if (googleReviewBtn) {
            // Remove any existing event listeners by replacing the element
            const newBtn = googleReviewBtn.cloneNode(true);
            googleReviewBtn.parentNode.replaceChild(newBtn, googleReviewBtn);
            
            // Tambahkan event listener sederhana untuk fallback
            const currentBtn = document.getElementById('googleReviewsBtn');
            
            // Cegah default behavior ganda
            currentBtn.addEventListener('click', function(e) {
                // Cegah double execution
                e.preventDefault();
                e.stopPropagation();
                
                // Biarkan href normal bekerja, sudah ada target="_blank"
                console.log('Opening Google Reviews in new tab');
            }, { once: true }); // Hanya sekali untuk mencegah multiple execution
        }
    });
    
    // ============================================
    // SMOOTH SCROLL - DIHAPUS UNTUK MENCEGAH KONFLIK
    // ============================================
    
    // ============================================
    // SCROLL ANIMATIONS OBSERVER
    // ============================================
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const animationName = Array.from(element.classList)
                    .find(className => className.startsWith('animate-'));
                
                if (animationName) {
                    element.style.animationPlayState = 'running';
                    element.style.opacity = '1';
                }
            }
        });
    }, observerOptions);
    
    // Observe all animate elements
    document.querySelectorAll('[class*="animate-"]').forEach(el => {
        el.style.animationPlayState = 'paused';
        el.style.opacity = '0';
        observer.observe(el);
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
</script>
@endsection