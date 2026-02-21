@extends('layouts.app')

@section('title', 'Reservasi - JOSS GANDOS')

@section('content')
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
                    <span>RESERVASI ONLINE</span>
                    <span class="badge-dot"></span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="elegant-heading">
                    <span class="heading-line reveal-text">Pesan Meja</span>
                    <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">Untuk Momen</span>
                    <span class="heading-line reveal-text" style="animation-delay: 0.4s">Spesial Anda</span>
                </h1>
                
                <!-- Description -->
                <p class="elegant-desc animate__animated animate__fadeInUp animate__delay-1s">
                    Pastikan tempat duduk terbaik untuk acara keluarga, pertemuan bisnis, 
                    atau momen romantis bersama orang tersayang di Joss Gandos.
                </p>
                
                <!-- CTA Buttons -->
                <div class="elegant-cta">
                    <a href="#reservation-form" class="btn-elegant btn-primary-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Reservasi Sekarang</span>
                        <i class="fas fa-calendar-check"></i>
                    </a>
                    <a href="#benefits" class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Info & Manfaat</span>
                        <i class="fas fa-info-circle"></i>
                    </a>
                </div>
            </div>
            
            <!-- HERO IMAGE -->
            <div class="col-lg-6 col-xl-6">
                <div class="hero-image-wrapper animate__animated animate__fadeInRight animate__delay-0s">
                    <div class="hero-image-container hero-image-extra-large">
                        <div class="hero-image-frame hero-frame-premium">
                            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                 alt="Reservasi Resto Joss Gandos"
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
                                <span>#PESAN MEJA</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>   

<!-- Reservation Form -->
<section id="reservation-form" class="form-section section-padding">
    <div class="container">
        <div class="row justify-content-center mb-6">
            <div class="col-lg-8 text-center">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-4">Booking Meja <span class="text-gradient">Anda Sekarang</span></h2>
                    <p class="lead text-muted">Pastikan tempat duduk terbaik untuk momen spesial Anda</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="form-wrapper" data-aos="fade-up">
                    <div class="form-header">
                        <div class="header-content">
                            <div class="header-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold text-white mb-2">Formulir Reservasi</h3>
                                <p class="text-light opacity-90 mb-0">Isi data dengan benar untuk pengalaman terbaik</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-body bg-white p-4 p-lg-5">
                        <!-- Success Message Container -->
                        <div id="successMessage" class="alert alert-success d-none"></div>
                        
                        <!-- Error Message Container -->
                        <div id="errorMessage" class="alert alert-danger d-none"></div>
                        
                        <!-- Display validation errors from session -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form id="reservationForm" action="{{ route('reservation.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            
                            <!-- Personal Information -->
                            <div class="form-section-title mb-5">
                                <h5 class="fw-bold d-flex align-items-center">
                                    <i class="fas fa-user-circle me-3 text-primary-red"></i>
                                    Informasi Pribadi
                                </h5>
                                <p class="text-muted mb-0 small">Lengkapi data diri Anda untuk keperluan konfirmasi</p>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-semibold d-flex align-items-center">
                                            <div class="label-icon me-2">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            Nama Lengkap *
                                        </label>
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-semibold d-flex align-items-center">
                                            <div class="label-icon me-2">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            Email *
                                        </label>
                                        <div class="input-with-icon">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-semibold d-flex align-items-center">
                                            <div class="label-icon me-2">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            Nomor WhatsApp *
                                        </label>
                                        <div class="input-with-icon">
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-semibold d-flex align-items-center">
                                            <div class="label-icon me-2">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            Jumlah Tamu *
                                        </label>
                                        <div class="guest-selector">
                                            <div class="input-with-icon">
                                                <select class="form-select @error('guests') is-invalid @enderror" id="guests" name="guests" required>
                                                    <option value="" disabled {{ old('guests') ? '' : 'selected' }}>Pilih jumlah tamu</option>
                                                    @for($i = 1; $i <= 8; $i++)
                                                    <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Orang' : 'Orang' }}</option>
                                                    @endfor
                                                    <option value="9-12" {{ old('guests') == '9-12' ? 'selected' : '' }}>9-12 Orang (Medium Group)</option>
                                                    <option value="13+" {{ old('guests') == '13+' ? 'selected' : '' }}>13+ Orang (Large Group)</option>
                                                </select>
                                                @error('guests')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Reservation Details -->
                            <div class="form-section-title my-5">
                                <h5 class="fw-bold d-flex align-items-center">
                                    <i class="fas fa-calendar-alt me-3 text-primary-red"></i>
                                    Detail Reservasi
                                </h5>
                                <p class="text-muted mb-0 small">Tentukan waktu dan tanggal kunjungan Anda</p>
                            </div>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-semibold d-flex align-items-center">
                                            <div class="label-icon me-2">
                                                <i class="fas fa-calendar-day"></i>
                                            </div>
                                            Tanggal Reservasi *
                                        </label>
                                        <div class="date-picker-container">
                                            <div class="input-with-icon">
                                                <input type="date" class="form-control date-picker @error('date') is-invalid @enderror" id="date" name="date" required 
                                                       min="{{ date('Y-m-d') }}" value="{{ old('date', date('Y-m-d')) }}">
                                                @error('date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="date-info mt-2">
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-semibold d-flex align-items-center">
                                            <div class="label-icon me-2">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                            Waktu Reservasi *
                                        </label>
                                        <div class="time-select-container">
                                            <div class="input-with-icon">
                                                <select class="form-select time-select @error('time') is-invalid @enderror" id="time" name="time" required>
                                                    <option value="" disabled {{ old('time') ? '' : 'selected' }}>Pilih waktu reservasi</option>
                                                    <option value="10:00" {{ old('time') == '10:00' ? 'selected' : '' }}>10:00 Pagi</option>
                                                    <option value="11:00" {{ old('time') == '11:00' ? 'selected' : '' }}>11:00 Pagi</option>
                                                    <option value="12:00" {{ old('time') == '12:00' ? 'selected' : '' }}>12:00 Siang</option>
                                                    <option value="13:00" {{ old('time') == '13:00' ? 'selected' : '' }}>13:00 Siang</option>
                                                    <option value="14:00" {{ old('time') == '14:00' ? 'selected' : '' }}>14:00 Siang</option>
                                                    <option value="15:00" {{ old('time') == '15:00' ? 'selected' : '' }}>15:00 Sore</option>
                                                    <option value="17:00" {{ old('time') == '17:00' ? 'selected' : '' }}>17:00 Sore</option>
                                                    <option value="18:00" {{ old('time') == '18:00' ? 'selected' : '' }}>18:00 Malam</option>
                                                    <option value="19:00" {{ old('time') == '19:00' ? 'selected' : '' }}>19:00 Malam</option>
                                                    <option value="20:00" {{ old('time') == '20:00' ? 'selected' : '' }}>20:00 Malam</option>
                                                    <option value="21:00" {{ old('time') == '21:00' ? 'selected' : '' }}>21:00 Malam</option>
                                                </select>
                                                @error('time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="time-info mt-2">
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Special Requests -->
                            <div class="form-section-title my-5">
                                <h5 class="fw-bold d-flex align-items-center">
                                    <i class="fas fa-star me-3 text-primary-red"></i>
                                    Permintaan Khusus (Opsional)
                                </h5>
                                <p class="text-muted mb-0 small">Berikan informasi tambahan untuk pengalaman terbaik</p>
                            </div>
                            
                            <div class="special-requests-section">
                                <div class="form-group">
                                    <label class="form-label fw-semibold d-flex align-items-center mb-3">
                                        <div class="label-icon me-2">
                                            <i class="fas fa-comment-dots"></i>
                                        </div>
                                        Tulis Permintaan Khusus Anda
                                    </label>
                                    <div class="request-textarea">
                                        <textarea class="form-control @error('specialRequests') is-invalid @enderror" id="specialRequests" name="specialRequests" rows="4">{{ old('specialRequests') }}</textarea>
                                        @error('specialRequests')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Terms and Submit -->
                            <div class="form-footer mt-5 pt-5 border-top">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 mb-4 mb-lg-0">
                                        <div class="terms-agreement">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms" required>
                                                <label class="form-check-label" for="terms">
                                                    Saya menyetujui 
                                                    <a href="#" class="text-primary-red text-decoration-none fw-semibold">
                                                        Syarat & Ketentuan
                                                    </a> 
                                                    dan memahami bahwa reservasi dapat dibatalkan maksimal 2 jam sebelumnya.
                                                </label>
                                                <div class="invalid-feedback d-block" id="termsError" style="display: none !important;">
                                                    Anda harus menyetujui syarat & ketentuan
                                                </div>
                                            </div>
                                            <p class="text-muted small mt-2 mb-0">
                                                <i class="fas fa-shield-alt me-1"></i>
                                                Data Anda terlindungi dan aman bersama kami
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-lg-end">
                                        <button type="submit" class="btn btn-primary-red btn-lg px-5 py-3" id="submitBtn">
                                            <span class="btn-text">
                                                <i class="fas fa-paper-plane me-2"></i> Reservasi Sekarang
                                            </span>
                                            <span class="btn-loading d-none">
                                                <i class="fas fa-spinner fa-spin me-2"></i> Memproses...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section section-padding bg-light-cream" id="benefits">
    <div class="container">
        <div class="row justify-content-center mb-6">
            <div class="col-lg-8 text-center">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-4">Kenapa Reservasi <span class="text-gradient">Online?</span></h2>
                    <p class="lead text-muted">Manfaat yang Anda dapatkan dengan booking meja melalui sistem kami</p>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            @foreach([
                ['icon' => 'fas fa-bolt', 'title' => 'Konfirmasi Instan', 'desc' => 'Reservasi dikonfirmasi dalam 5 menit via WhatsApp'],
                ['icon' => 'fas fa-gift', 'title' => 'Bonus Spesial', 'desc' => 'Dapatkan welcome drink untuk reservasi online'],
                ['icon' => 'fas fa-star', 'title' => 'Prioritas Meja', 'desc' => 'Meja terbaik disiapkan untuk Anda'],
                ['icon' => 'fas fa-clock', 'title' => 'Tidak Antri', 'desc' => 'Langsung duduk tanpa menunggu'],
                ['icon' => 'fas fa-calendar-check', 'title' => 'Gratis Reservasi', 'desc' => 'Tidak ada biaya booking apapun'],
                ['icon' => 'fas fa-headset', 'title' => 'Dukungan 24/7', 'desc' => 'Tim kami siap membantu kapan saja']
            ] as $benefit)
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card card border-0 shadow-sm h-100" data-aos="fade-up">
                    <div class="card-body p-4">
                        <div class="benefit-icon mb-4">
                            <i class="{{ $benefit['icon'] }}"></i>
                        </div>
                        <h5 class="fw-bold mb-3">{{ $benefit['title'] }}</h5>
                        <p class="text-muted mb-0">{{ $benefit['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section section-padding">
    <div class="container">
        <div class="row justify-content-center mb-6">
            <div class="col-lg-8 text-center">
                <div class="section-header" data-aos="fade-up">
                    <span class="section-tag mb-3 d-inline-block">BANTUAN</span>
                    <h2 class="display-4 fw-bold mb-4">Pertanyaan <span class="text-gradient">Yang Sering Diajukan</span></h2>
                    <p class="lead text-muted">Temukan jawaban untuk pertanyaan umum tentang reservasi</p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    @php
                        $faqs = [
                            [
                                'q' => 'Berapa lama waktu konfirmasi reservasi?',
                                'a' => 'Reservasi Anda akan dikonfirmasi maksimal 5 menit setelah pengisian formulir. Konfirmasi dikirim via WhatsApp dan email yang terdaftar.',
                                'icon' => 'fa-clock'
                            ],
                            [
                                'q' => 'Apakah ada biaya untuk reservasi?',
                                'a' => 'Tidak, semua reservasi di JOSS GANDOS sepenuhnya gratis. Tidak ada biaya tambahan apapun untuk booking meja.',
                                'icon' => 'fa-money-bill-wave'
                            ],
                            [
                                'q' => 'Bagaimana jika saya terlambat datang?',
                                'a' => 'Kami menahan meja maksimal 30 menit dari waktu reservasi. Jika lebih dari itu, meja akan tersedia untuk tamu lain. Silakan hubungi kami jika mengalami keterlambatan.',
                                'icon' => 'fa-hourglass'
                            ],
                            [
                                'q' => 'Bisa untuk acara khusus seperti ulang tahun?',
                                'a' => 'Ya, kami menyediakan layanan khusus untuk ulang tahun, anniversary, meeting, dan acara lainnya. Tuliskan permintaan Anda di kolom "Permintaan Khusus".',
                                'icon' => 'fa-gift'
                            ],
                            [
                                'q' => 'Bagaimana cara membatalkan reservasi?',
                                'a' => 'Anda dapat membatalkan reservasi melalui WhatsApp di nomor 0812-3456-7890 atau email reservation@jossgandos.com minimal 2 jam sebelum waktu reservasi.',
                                'icon' => 'fa-calendar-xmark'
                            ],
                        ];
                    @endphp
                    
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item border-0 mb-3" data-aos="fade-up">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                    data-bs-target="#faq{{ $index }}">
                                <div class="d-flex align-items-center w-100">
                                    <div class="faq-icon me-3">
                                        <i class="fas {{ $faq['icon'] }}"></i>
                                    </div>
                                    <span class="fw-semibold">{{ $faq['q'] }}</span>
                                </div>
                            </button>
                        </h3>
                        <div id="faq{{ $index }}" class="accordion-collapse collapse" 
                             data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq['a'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="text-center mt-5" data-aos="fade-up">
                    <p class="text-muted mb-4">Masih punya pertanyaan lain?</p>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary-red px-5 py-3">
                        <i class="fas fa-comments me-2"></i>Hubungi Tim Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<!-- Keep all your existing CSS styles exactly as they were -->
<style>
    :root {
        --primary-red: #B22222;
        --primary-dark: #8B0000;
        --secondary-gold: #D4A017;
        --accent-gold: #FFC145;
        --light-cream: #FFF9F0;
        --dark-charcoal: #2C2C2C;
        --success-green: #28A745;
        --info-blue: #4361EE;
        --light-gray: #F8F9FA;
        --border-radius: 20px;
        --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --box-shadow-lg: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    
    /* ============================================
       CSS VARIABLES - MODERN SOPHISTICATED PALETTE
    ============================================ */
    :root {
        /* Primary Colors - Refined & Sophisticated */
        --primary: #C62828;           /* Modern Red (lebih soft & elegant) */
        --primary-dark: #B71C1C;      /* Deep Wine Red */
        --primary-light: #EF5350;     /* Coral Red */
        
        /* Secondary & Accent - Warm & Balanced */
        --secondary: #F57C00;         /* Warm Orange */
        --accent: #FFA726;            /* Sophisticated Amber (bukan gold murni) */
        --accent-light: #FFB74D;      /* Light Amber */
        
        /* Neutral Colors */
        --dark: #1a1a1a;
        --light: #f8fafc;
        --white: #ffffff;
        --text-dark: #1e293b;
        --text-gray: #64748b;
        --border: #e2e8f0;
        
        /* Background Colors - Warm & Inviting */
        --bg-cream: #FFF8F0;          /* Warm Cream */
        --bg-peach: #FFEBEE;          /* Soft Peach */
        --hero-bg: #8D1212;           /* Rich Maroon (lebih terang dari sebelumnya) */
        
        /* Shadows */
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
        --shadow-md: 0 8px 30px rgba(0,0,0,0.12);
        --shadow-lg: 0 20px 60px rgba(0,0,0,0.15);
        
        /* Gradients - More Refined */
        --gradient-primary: linear-gradient(135deg, #C62828 0%, #F57C00 100%);
        --gradient-hero: radial-gradient(circle at 70% 30%, #A52A2A 0%, #8D1212 40%, #6B1111 100%);
        
        /* Transitions */
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
        background: var(--hero-bg);
    }

    .elegant-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient-hero);
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
        background: rgba(198, 40, 40, 0.15);
        top: -200px;
        right: -100px;
        animation: shapeFloat 20s ease-in-out infinite;
    }

    .shape-2 {
        width: 400px;
        height: 400px;
        background: rgba(245, 124, 0, 0.12);
        bottom: -100px;
        left: -50px;
        animation: shapeFloat 25s ease-in-out infinite reverse;
    }
    
    .shape-3 {
        width: 300px;
        height: 300px;
        background: rgba(255, 167, 38, 0.1);
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
        background: rgba(255, 167, 38, 0.35);
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
        box-shadow: 0 0 15px rgba(255, 167, 38, 0.6);
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
        background: linear-gradient(120deg, #FFB74D, #FFA726, #F57C00);
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
        border-color: rgba(255, 167, 38, 0.6);
        box-shadow: 0 50px 80px -20px rgba(198, 40, 40, 0.6);
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
            rgba(198, 40, 40, 0.2) 0%, 
            rgba(0, 0, 0, 0.4) 50%,
            rgba(198, 40, 40, 0.2) 100%);
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
            rgba(255, 167, 38, 0.3) 0%, 
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
        border-color: rgba(255, 167, 38, 0.7);
        transition: all 0.4s ease;
    }

    .frame-corner.top-left {
        top: 20px;
        left: 20px;
        border-top: 3px solid var(--accent);
        border-left: 3px solid var(--accent);
    }

    .frame-corner.top-right {
        top: 20px;
        right: 20px;
        border-top: 3px solid var(--accent);
        border-right: 3px solid var(--accent);
    }

    .frame-corner.bottom-left {
        bottom: 20px;
        left: 20px;
        border-bottom: 3px solid var(--accent);
        border-left: 3px solid var(--accent);
    }

    .frame-corner.bottom-right {
        bottom: 20px;
        right: 20px;
        border-bottom: 3px solid var(--accent);
        border-right: 3px solid var(--accent);
    }

    .hero-image-frame.hero-frame-premium:hover .frame-corner {
        width: 50px;
        height: 50px;
        border-color: var(--accent-light);
    }

    .image-premium-label {
        position: absolute;
        bottom: 30px;
        left: 30px;
        background: rgba(255, 167, 38, 0.95);
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

    /* Process Section */
    .process-card {
        background: white;
        border-radius: var(--border-radius);
        transition: all 0.4s ease;
        border: 2px solid transparent;
    }
    
    .process-card:hover {
        transform: translateY(-15px);
        border-color: var(--primary-red);
        box-shadow: var(--box-shadow-lg);
    }
    
    .number-circle {
        display: inline-block;
        width: 60px;
        height: 60px;
        background: var(--primary-red);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(178, 34, 34, 0.3);
    }
    
    /* Form Section Title Styles */
    .form-section-title {
        padding-bottom: 15px;
        border-bottom: 2px solid rgba(178, 34, 34, 0.1);
        margin-bottom: 30px;
    }
    
    .form-section-title h5 {
        color: var(--dark-charcoal);
        font-size: 1.25rem;
        margin-bottom: 8px;
    }
    
    .form-section-title h5 i {
        font-size: 1.5rem;
    }
    
    .form-section-title .small {
        font-size: 0.875rem;
        opacity: 0.8;
    }
    
    /* Form Section */
    .form-wrapper {
        border-radius: var(--border-radius);
        overflow: hidden;
        box-shadow: var(--box-shadow-lg);
    }
    
    .form-header {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        padding: 40px;
        position: relative;
        overflow: hidden;
    }
    
    .form-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.1;
    }
    
    .header-content {
        display: flex;
        align-items: center;
        gap: 20px;
        position: relative;
        z-index: 2;
    }
    
    .header-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: white;
    }
    
    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .label-icon {
        width: 36px;
        height: 36px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
    }
    
    .input-with-icon {
        position: relative;
    }
    
    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-600);
        z-index: 1;
    }
    
    .form-control, .form-select {
        padding-left: 45px !important;
        border: 2px solid #E9ECEF;
        border-radius: 12px;
        height: 52px;
        transition: all 0.3s ease;
        font-size: 1rem;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 0.25rem rgba(178, 34, 34, 0.1);
    }
    
    /* Enhanced Date Picker */
    .date-picker-container {
        position: relative;
    }
    
    .date-picker {
        appearance: none;
        -webkit-appearance: none;
        background-color: white;
        cursor: pointer;
    }
    
    .date-picker::-webkit-calendar-picker-indicator {
        position: absolute;
        right: 15px;
        width: 20px;
        height: 20px;
        cursor: pointer;
        opacity: 0.6;
        transition: opacity 0.3s ease;
    }
    
    .date-picker::-webkit-calendar-picker-indicator:hover {
        opacity: 1;
    }
    
    .date-info {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    
    .selected-date .badge {
        background: var(--primary-red);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        animation: fadeIn 0.3s ease;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Time Select Dropdown */
    .time-select-container {
        position: relative;
    }
    
    .time-select {
        appearance: none;
        -webkit-appearance: none;
        background-color: white;
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23676767' viewBox='0 0 16 16'%3E%3Cpath d='M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z'/%3E%3Cpath d='M7.5 12h1v1a.5.5 0 0 1-1 0v-1zm-3-4.5a.5.5 0 0 1 0-1H5a.5.5 0 0 1 0 1H4.5zm0 2a.5.5 0 0 1 0-1h6a.5.5 0 0 1 0 1h-6zm0 2a.5.5 0 0 1 0-1h6a.5.5 0 0 1 0 1h-6z'/%3E%3Cpath d='M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }
    
    .time-info {
        color: #666;
        font-size: 0.875rem;
    }
    
    /* Special Requests Textarea */
    .request-textarea {
        position: relative;
    }
    
    .textarea-icon {
        position: absolute;
        left: 15px;
        top: 15px;
        color: var(--gray-600);
    }
    
    textarea.form-control {
        padding-left: 45px !important;
        min-height: 120px;
        border: 2px solid #E9ECEF;
        border-radius: 12px;
        resize: vertical;
        font-size: 1rem;
        line-height: 1.5;
    }
    
    textarea.form-control:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 0.25rem rgba(178, 34, 34, 0.1);
    }
    
    .request-examples {
        background: rgba(178, 34, 34, 0.05);
        padding: 12px 16px;
        border-radius: 10px;
        border-left: 3px solid var(--secondary-gold);
    }
    
    /* Form Footer */
    .form-footer {
        border-top: 2px solid rgba(0, 0, 0, 0.05);
    }
    
    .btn-primary-red {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary-red:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(178, 34, 34, 0.3);
    }
    
    .btn-primary-red::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: 0.5s;
    }
    
    .btn-primary-red:hover::before {
        left: 100%;
    }
    
    .btn-outline-primary-red {
        border: 2px solid var(--primary-red);
        color: var(--primary-red);
        background: transparent;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary-red:hover {
        background: var(--primary-red);
        color: white;
        transform: translateY(-2px);
    }
    
    /* Benefits Section */
    .benefit-card {
        background: white;
        border-radius: var(--border-radius);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .benefit-card:hover {
        transform: translateY(-10px);
        border-color: var(--primary-red);
        box-shadow: var(--box-shadow-lg);
    }
    
    .benefit-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }
    
    /* FAQ Section */
    .accordion-button {
        background: white;
        border: 2px solid rgba(178, 34, 34, 0.1);
        border-radius: 12px !important;
        padding: 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .accordion-button:not(.collapsed) {
        background: rgba(178, 34, 34, 0.05);
        border-color: var(--primary-red);
        color: var(--primary-red);
        box-shadow: none;
    }
    
    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
    
    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23B22222'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
    
    .faq-icon {
        width: 40px;
        height: 40px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
    }
    
    .accordion-body {
        background: white;
        border: 2px solid rgba(178, 34, 34, 0.1);
        border-top: none;
        border-radius: 0 0 12px 12px;
        padding: 25px;
    }
    
    /* CTA Section */
    .cta-wrapper {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        box-shadow: var(--box-shadow-lg);
        position: relative;
        overflow: hidden;
    }
    
    .cta-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 20px 20px;
        opacity: 0.1;
    }
    
    .btn-light {
        background: white;
        color: var(--primary-red);
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-light:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 255, 255, 0.2);
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-title {
            font-size: 3rem;
        }
        
        .display-4 {
            font-size: 2.5rem;
        }
        
        .display-5 {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 992px) {
        .modern-hero {
            padding: 120px 0 60px;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .header-content {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .header-icon {
            margin: 0 auto;
        }
        
        .form-section-title h5 {
            font-size: 1.1rem;
        }
        
        .form-section-title h5 i {
            font-size: 1.3rem;
        }
        
        .stat-divider {
            display: none;
        }
        
        .stat-item {
            margin-bottom: 20px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .floating-badge {
            font-size: 1rem;
            padding: 10px 20px;
        }
        
        .form-header {
            padding: 30px 20px;
        }
        
        .form-control, .form-select {
            font-size: 0.95rem;
        }
        
        textarea.form-control {
            font-size: 0.95rem;
        }
        
        .cta-wrapper {
            padding: 30px 20px;
            text-align: center;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
    }
    
    @media (max-width: 576px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .section-tag {
            padding: 6px 20px;
            font-size: 0.8rem;
        }
        
        .form-section-title h5 {
            font-size: 1rem;
        }
        
        .form-section-title h5 i {
            font-size: 1.2rem;
        }
        
        .benefit-card {
            padding: 20px;
        }
        
        .benefit-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
        
        .date-picker::-webkit-calendar-picker-indicator {
            width: 16px;
            height: 16px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Enhanced Date Picker
        const dateInput = document.getElementById('date');
        const today = new Date();
        const maxDate = new Date();
        maxDate.setMonth(today.getMonth() + 3);
        
        // Set min and max dates
        dateInput.min = today.toISOString().split('T')[0];
        dateInput.max = maxDate.toISOString().split('T')[0];
        
        // Date change handler with enhanced display
        dateInput.addEventListener('change', function() {
            // Add animation effect
            this.style.borderColor = 'var(--primary-red)';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
        });
        
        // Time select enhancement
        const timeSelect = document.getElementById('time');
        timeSelect.addEventListener('change', function() {
            // Add visual feedback
            this.style.borderColor = 'var(--primary-red)';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
        });
        
        // Special requests textarea enhancement
        const specialRequestsTextarea = document.getElementById('specialRequests');
        specialRequestsTextarea.addEventListener('focus', function() {
            this.style.borderColor = 'var(--primary-red)';
        });
        
        specialRequestsTextarea.addEventListener('blur', function() {
            this.style.borderColor = '';
        });
        
        // Auto-expand textarea based on content
        specialRequestsTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            
            if (value.length > 0) {
                // Format: 0812 3456 7890
                if (value.length <= 4) {
                    value = value;
                } else if (value.length <= 8) {
                    value = value.replace(/(\d{4})(\d{1,4})/, '$1 $2');
                } else {
                    value = value.replace(/(\d{4})(\d{4})(\d{1,4})/, '$1 $2 $3');
                }
            }
            
            this.value = value;
        });

        // Get CSRF token from meta tag or form
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                          document.querySelector('input[name="_token"]')?.value;

        // Form submission with AJAX
        const form = document.getElementById('reservationForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Check terms checkbox
            const termsCheckbox = document.getElementById('terms');
            const termsError = document.getElementById('termsError');
            
            if (!termsCheckbox.checked) {
                termsError.style.display = 'block';
                termsCheckbox.classList.add('is-invalid');
                return;
            } else {
                termsError.style.display = 'none';
                termsCheckbox.classList.remove('is-invalid');
            }
            
            // Hide any previous messages
            successMessage.classList.add('d-none');
            errorMessage.classList.add('d-none');
            
            // Show loading state
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Collect form data
            const formData = new FormData(form);
            
            // Send AJAX request with CSRF token in headers
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Server error');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Show success message
                    successMessage.textContent = data.message;
                    successMessage.classList.remove('d-none');
                    
                    // Scroll to top to show message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    
                    // Reset form
                    form.reset();
                    
                    // Reset date to today
                    dateInput.value = today.toISOString().split('T')[0];
                    
                    // Show reservation code if available
                    if (data.data && data.data.reservation_code) {
                        successMessage.innerHTML += `<br><strong>Kode Reservasi: ${data.data.reservation_code}</strong>`;
                    }
                    
                    // Auto hide success message after 5 seconds
                    setTimeout(() => {
                        successMessage.classList.add('d-none');
                    }, 5000);
                } else {
                    // Show error message
                    errorMessage.textContent = data.message || 'Terjadi kesalahan. Silakan coba lagi.';
                    errorMessage.classList.remove('d-none');
                    
                    // Scroll to top to show message
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = error.message || 'Terjadi kesalahan koneksi. Silakan coba lagi.';
                errorMessage.classList.remove('d-none');
                
                // Scroll to top to show message
                window.scrollTo({ top: 0, behavior: 'smooth' });
            })
            .finally(() => {
                // Hide loading state
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                submitBtn.disabled = false;
            });
        });

        // Reset terms validation on checkbox change
        document.getElementById('terms').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('termsError').style.display = 'none';
                this.classList.remove('is-invalid');
            }
        });

        // Display any flash messages from session
        @if(session('success'))
            successMessage.textContent = "{{ session('success') }}";
            successMessage.classList.remove('d-none');
            setTimeout(() => {
                successMessage.classList.add('d-none');
            }, 5000);
        @endif

        @if(session('error'))
            errorMessage.textContent = "{{ session('error') }}";
            errorMessage.classList.remove('d-none');
            setTimeout(() => {
                errorMessage.classList.add('d-none');
            }, 5000);
        @endif
    });
</script>
@endsection