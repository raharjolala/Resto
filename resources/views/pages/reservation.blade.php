@extends('layouts.app')

@section('title', 'Reservasi - JOSS GANDOS')

@section('content')
    <!-- Modern Hero Section -->
    <section class="modern-hero position-relative overflow-hidden">
        <div class="hero-gradient-overlay"></div>
        <div class="hero-pattern"></div>
        
        <div class="container position-relative z-3">
            <div class="row align-items-center min-vh-80">
                <div class="col-lg-8 col-md-10 mx-auto text-center">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-badge mb-4">
                            <div class="floating-badge">
                                <i class="fas fa-crown"></i>
                                <span>Restoran Terbaik 2024</span>
                            </div>
                        </div>
                        <h1 class="hero-title display-2 fw-bold text-white mb-4">
                            Nikmati Momen Spesial
                            <span class="text-gradient">di JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle lead text-light opacity-90 mb-5">
                            Pesan meja favorit Anda dengan mudah dan rasakan pengalaman kuliner tak terlupakan
                        </p>
                        
                        <div class="hero-stats">
                            <div class="row g-4 justify-content-center">
                                <div class="col-auto">
                                    <div class="stat-item">
                                        <div class="stat-number text-warning">5</div>
                                        <div class="stat-label">Menit Konfirmasi</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-divider"></div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-item">
                                        <div class="stat-number text-warning">100%</div>
                                        <div class="stat-label">Gratis Reservasi</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-divider"></div>
                                </div>
                                <div class="col-auto">
                                    <div class="stat-item">
                                        <div class="stat-number text-warning">⭐ 4.9</div>
                                        <div class="stat-label">Rating Pelanggan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="scroll-indicator mt-5">
                            <a href="#reservation-form" class="scroll-down">
                                <i class="fas fa-chevron-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating Elements -->
        <div class="floating-elements">
            <div class="element element-1"></div>
            <div class="element element-2"></div>
            <div class="element element-3"></div>
        </div>
    </section>

    <!-- Process Steps -->
    <section class="process-section section-padding bg-light-cream">
        <div class="container">
            <div class="row justify-content-center mb-6">
                <div class="col-lg-8 text-center">
                    <div class="section-header" data-aos="fade-up">
                        <span class="section-tag mb-3 d-inline-block">PROSES MUDAH</span>
                        <h2 class="display-4 fw-bold mb-4">Reservasi dalam <span class="text-gradient">3 Langkah Sederhana</span></h2>
                        <p class="lead text-muted">Nikmati kemudahan booking dengan sistem kami yang user-friendly</p>
                    </div>
                </div>
            </div>
            
            <div class="process-timeline" data-aos="fade-up">
                <div class="row g-4">
                    @foreach([
                        ['number' => '01', 'icon' => 'fas fa-edit', 'title' => 'Isi Formulir', 'desc' => 'Lengkapi data reservasi dengan informasi Anda'],
                        ['number' => '02', 'icon' => 'fas fa-bell', 'title' => 'Konfirmasi Instan', 'desc' => 'Dapatkan konfirmasi via WhatsApp & Email'],
                        ['number' => '03', 'title' => 'Nikmati Waktu', 'icon' => 'fas fa-utensils', 'desc' => 'Datang dan nikmati pengalaman terbaik']
                    ] as $step)
                    <div class="col-lg-4">
                        <div class="process-card card border-0 shadow-lg h-100">
                            <div class="card-body p-5 text-center">
                                <div class="process-number mb-4">
                                    <span class="number-circle">{{ $step['number'] }}</span>
                                </div>
                                <div class="process-icon mb-4">
                                    <i class="{{ $step['icon'] }} fa-3x text-primary-red"></i>
                                </div>
                                <h4 class="fw-bold mb-3">{{ $step['title'] }}</h4>
                                <p class="text-muted mb-0">{{ $step['desc'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                        <span class="section-tag mb-3 d-inline-block">RESERVASI ONLINE</span>
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
                            <form id="reservationForm" class="needs-validation" novalidate>
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
                                                <i class="fas fa-user input-icon"></i>
                                                <input type="text" class="form-control" id="name" 
                                                       placeholder="Masukkan nama lengkap Anda" required>
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
                                                <i class="fas fa-envelope input-icon"></i>
                                                <input type="email" class="form-control" id="email" 
                                                       placeholder="contoh@email.com" required>
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
                                                <i class="fas fa-phone input-icon"></i>
                                                <input type="tel" class="form-control" id="phone" 
                                                       placeholder="0812 3456 7890" required>
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
                                                    <i class="fas fa-users input-icon"></i>
                                                    <select class="form-select" id="guests" required>
                                                        <option value="" disabled selected>Pilih jumlah tamu</option>
                                                        @for($i = 1; $i <= 8; $i++)
                                                        <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'Orang' : 'Orang' }}</option>
                                                        @endfor
                                                        <option value="9-12">9-12 Orang (Medium Group)</option>
                                                        <option value="13+">13+ Orang (Large Group)</option>
                                                    </select>
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
                                                    <i class="fas fa-calendar-day input-icon"></i>
                                                    <input type="date" class="form-control date-picker" id="date" required 
                                                           min="{{ date('Y-m-d') }}">
                                                </div>
                                                <div class="date-info mt-2">
                                                    <small class="text-muted">
                                                        <i class="fas fa-info-circle me-1"></i>
                                                        Pilih tanggal yang diinginkan
                                                    </small>
                                                    <div class="selected-date mt-1 d-none">
                                                        <span class="badge bg-primary-red">
                                                            <i class="fas fa-calendar me-1"></i>
                                                            <span id="selectedDateText"></span>
                                                        </span>
                                                    </div>
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
                                                    <i class="fas fa-clock input-icon"></i>
                                                    <select class="form-select time-select" id="time" required>
                                                        <option value="" disabled selected>Pilih waktu reservasi</option>
                                                        <option value="10:00">10:00 Pagi</option>
                                                        <option value="11:00">11:00 Pagi</option>
                                                        <option value="12:00">12:00 Siang</option>
                                                        <option value="13:00">13:00 Siang</option>
                                                        <option value="14:00">14:00 Siang</option>
                                                        <option value="15:00">15:00 Sore</option>
                                                        <option value="17:00">17:00 Sore</option>
                                                        <option value="18:00">18:00 Malam</option>
                                                        <option value="19:00">19:00 Malam</option>
                                                        <option value="20:00">20:00 Malam</option>
                                                        <option value="21:00">21:00 Malam</option>
                                                    </select>
                                                </div>
                                                <div class="time-info mt-2">
                                                    <small class="text-muted">
                                                        <i class="fas fa-info-circle me-1"></i>
                                                        Waktu operasional: 10:00 - 22:00
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
                                            <i class="fas fa-comment-alt textarea-icon"></i>
                                            <textarea class="form-control" id="specialRequests" rows="4" 
                                                      placeholder="Contoh: Meja dekat jendela, perayaan ulang tahun, aksesibilitas kursi roda, atau permintaan khusus lainnya..."></textarea>
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
                                                </div>
                                                <p class="text-muted small mt-2 mb-0">
                                                    <i class="fas fa-shield-alt me-1"></i>
                                                    Data Anda terlindungi dan aman bersama kami
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 text-lg-end">
                                            <button type="submit" class="btn btn-primary-red btn-lg px-5 py-3">
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
    <section class="benefits-section section-padding bg-light-cream">
        <div class="container">
            <div class="row justify-content-center mb-6">
                <div class="col-lg-8 text-center">
                    <div class="section-header" data-aos="fade-up">
                        <span class="section-tag mb-3 d-inline-block">KEUNTUNGAN</span>
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
    
    /* Modern Hero Section */
    .modern-hero {
        background: linear-gradient(135deg, rgba(25, 25, 25, 0.95) 0%, rgba(0, 0, 0, 0.95) 100%), 
                    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 140px 0 80px;
        margin-top: -80px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-gradient-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, 
                    rgba(178, 34, 34, 0.3) 0%, 
                    rgba(212, 160, 23, 0.2) 100%);
        z-index: 1;
    }
    
    .hero-pattern {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.05) 2px, transparent 2px),
                          radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.05) 2px, transparent 2px);
        background-size: 50px 50px;
        z-index: 1;
    }
    
    .min-vh-80 {
        min-height: 80vh;
    }
    
    .floating-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, var(--secondary-gold), var(--accent-gold));
        color: var(--dark-charcoal);
        padding: 12px 24px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        box-shadow: 0 10px 20px rgba(212, 160, 23, 0.3);
        animation: float 3s ease-in-out infinite;
    }
    
    .floating-badge i {
        font-size: 1.2rem;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .text-gradient {
        background: linear-gradient(135deg, var(--accent-gold), #FFD700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }
    
    .hero-stats {
        margin-top: 40px;
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        line-height: 1;
        margin-bottom: 5px;
    }
    
    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        color: white;
    }
    
    .stat-divider {
        width: 1px;
        height: 40px;
        background: rgba(255, 255, 255, 0.3);
        margin: 0 20px;
    }
    
    .scroll-indicator {
        margin-top: 40px;
    }
    
    .scroll-down {
        display: inline-block;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        animation: bounce 2s infinite;
        transition: all 0.3s ease;
    }
    
    .scroll-down:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .floating-elements {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 2;
    }
    
    .floating-elements .element {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(212, 160, 23, 0.1), rgba(178, 34, 34, 0.1));
        animation: float-element 20s infinite linear;
    }
    
    .floating-elements .element-1 {
        width: 200px;
        height: 200px;
        top: 10%;
        left: 5%;
        animation-delay: 0s;
    }
    
    .floating-elements .element-2 {
        width: 150px;
        height: 150px;
        bottom: 20%;
        right: 10%;
        animation-delay: 5s;
    }
    
    .floating-elements .element-3 {
        width: 100px;
        height: 100px;
        top: 50%;
        left: 80%;
        animation-delay: 10s;
    }
    
    @keyframes float-element {
        0% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
        100% {
            transform: translateY(0) rotate(360deg);
        }
    }
    
    /* Section Styles */
    .section-padding {
        padding: 100px 0;
    }
    
    .mb-6 {
        margin-bottom: 5rem;
    }
    
    .bg-light-cream {
        background-color: var(--light-cream);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
    }
    
    .section-tag {
        background: var(--primary-red);
        color: white;
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 0.9rem;
        letter-spacing: 1px;
        font-weight: 600;
        text-transform: uppercase;
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
        const selectedDateText = document.getElementById('selectedDateText');
        const selectedDateBadge = document.querySelector('.selected-date');
        const today = new Date();
        const maxDate = new Date();
        maxDate.setMonth(today.getMonth() + 3);
        
        // Set min and max dates
        dateInput.min = today.toISOString().split('T')[0];
        dateInput.max = maxDate.toISOString().split('T')[0];
        
        // Set default to today
        dateInput.value = today.toISOString().split('T')[0];
        updateDateDisplay(today);
        
        // Date change handler with enhanced display
        dateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            updateDateDisplay(selectedDate);
            
            // Add animation effect
            this.style.borderColor = 'var(--primary-red)';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
        });
        
        // Function to update date display
        function updateDateDisplay(date) {
            const dayOfWeek = date.toLocaleDateString('id-ID', { weekday: 'long' });
            const formattedDate = date.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            selectedDateText.textContent = `${dayOfWeek}, ${formattedDate}`;
            selectedDateBadge.classList.remove('d-none');
        }
        
        // Time select enhancement
        const timeSelect = document.getElementById('time');
        timeSelect.addEventListener('change', function() {
            // Add visual feedback
            this.style.borderColor = 'var(--primary-red)';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
            
            // Show selected time info
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                console.log('Waktu dipilih:', selectedOption.text);
            }
        });
        
        // Set default time to 18:00 if available
        const defaultTimeOption = Array.from(timeSelect.options).find(option => option.value === '18:00');
        if (defaultTimeOption) {
            defaultTimeOption.selected = true;
        }
        
        // Special requests textarea enhancement
        const specialRequestsTextarea = document.getElementById('specialRequests');
        specialRequestsTextarea.addEventListener('focus', function() {
            this.parentElement.style.borderColor = 'var(--primary-red)';
        });
        
        specialRequestsTextarea.addEventListener('blur', function() {
            this.parentElement.style.borderColor = '';
        });
        
        // Auto-expand textarea based on content
        specialRequestsTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
        
        // Form validation
        const form = document.getElementById('reservationForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add('was-validated');
                
                // Scroll to first invalid field
                const firstInvalid = this.querySelector(':invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                    firstInvalid.focus();
                }
                return;
            }
            
            // Form is valid, proceed with submission
            submitReservation();
        });
        
        // Real-time form validation
        document.querySelectorAll('[required]').forEach(field => {
            field.addEventListener('input', function() {
                validateField(this);
            });
            
            field.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                }
            });
        });
        
        function validateField(field) {
            if (field.checkValidity()) {
                field.classList.remove('is-invalid');
                field.classList.add('is-valid');
            } else {
                field.classList.remove('is-valid');
                field.classList.add('is-invalid');
            }
        }
        
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
        
        // Form submission function
        function submitReservation() {
            const submitBtn = form.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            
            // Show loading state
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            submitBtn.disabled = true;
            
            // Collect form data
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                date: document.getElementById('date').value,
                time: document.getElementById('time').value,
                guests: document.getElementById('guests').value,
                specialRequests: document.getElementById('specialRequests').value
            };
            
            // Validate date is not in the past
            const selectedDate = new Date(formData.date);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (selectedDate < today) {
                alert('Tanggal reservasi tidak boleh di masa lalu');
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                submitBtn.disabled = false;
                return;
            }
            
            // Simulate API call
            setTimeout(() => {
                // Show success animation
                showSuccessConfetti();
                
                // Show success message
                showSuccessModal(formData);
                
                // Reset loading state
                setTimeout(() => {
                    btnText.classList.remove('d-none');
                    btnLoading.classList.add('d-none');
                    submitBtn.disabled = false;
                }, 2000);
                
            }, 1500);
        }
        
        // Success confetti effect
        function showSuccessConfetti() {
            const colors = ['#B22222', '#D4A017', '#FFC145', '#FFFFFF'];
            
            for (let i = 0; i < 80; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.cssText = `
                        position: fixed;
                        width: ${Math.random() * 10 + 5}px;
                        height: ${Math.random() * 10 + 5}px;
                        background: ${colors[Math.floor(Math.random() * colors.length)]};
                        border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                        top: -20px;
                        left: ${Math.random() * 100}vw;
                        z-index: 9999;
                        animation: confetti-fall ${Math.random() * 1 + 1}s linear forwards;
                        transform: rotate(${Math.random() * 360}deg);
                    `;
                    
                    document.body.appendChild(confetti);
                    
                    // Remove confetti after animation
                    setTimeout(() => confetti.remove(), 2000);
                }, i * 20);
            }
            
            // Add animation keyframes
            const style = document.createElement('style');
            style.textContent = `
                @keyframes confetti-fall {
                    0% {
                        transform: translateY(-20px) rotate(0deg);
                        opacity: 1;
                    }
                    100% {
                        transform: translateY(100vh) rotate(${Math.random() * 360}deg);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }
        
        // Success modal
        function showSuccessModal(data) {
            // Format the date for display
            const date = new Date(data.date);
            const formattedDate = date.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            
            const modalHTML = `
                <div class="modal fade show d-block" style="background: rgba(0,0,0,0.8)" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                            <div class="modal-header border-0 position-relative pt-5">
                                <div class="success-icon mx-auto mb-4">
                                    <div class="icon-circle">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <button type="button" class="btn-close position-absolute top-0 end-0 m-4" 
                                        onclick="this.closest('.modal').remove()"></button>
                            </div>
                            <div class="modal-body text-center py-4 px-5">
                                <h3 class="fw-bold mb-3" style="color: var(--primary-red)">Reservasi Berhasil!</h3>
                                <p class="text-muted mb-4">
                                    Terima kasih atas reservasi Anda. Detail reservasi telah dikirim ke 
                                    <strong>${data.email}</strong> dan WhatsApp Anda.
                                </p>
                                
                                <div class="reservation-card bg-light-cream rounded-3 p-4 mb-4">
                                    <h5 class="fw-bold mb-4 text-dark">Detail Reservasi</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="detail-item">
                                                <small class="text-muted d-block mb-1">Nama</small>
                                                <strong>${data.name}</strong>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="detail-item">
                                                <small class="text-muted d-block mb-1">Tanggal</small>
                                                <strong>${formattedDate}</strong>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="detail-item">
                                                <small class="text-muted d-block mb-1">Waktu</small>
                                                <strong>${data.time}</strong>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="detail-item">
                                                <small class="text-muted d-block mb-1">Jumlah Tamu</small>
                                                <strong>${data.guests} orang</strong>
                                            </div>
                                        </div>
                                        ${data.specialRequests ? `
                                        <div class="col-12">
                                            <div class="detail-item">
                                                <small class="text-muted d-block mb-1">Permintaan Khusus</small>
                                                <strong>${data.specialRequests}</strong>
                                            </div>
                                        </div>
                                        ` : ''}
                                    </div>
                                </div>
                                
                                <div class="reservation-code bg-gradient-primary text-white rounded-3 p-4 mb-4">
                                    <small class="d-block opacity-75 mb-2">Kode Reservasi</small>
                                    <h4 class="fw-bold mb-0">JOSS-${Math.random().toString(36).substr(2, 6).toUpperCase()}</h4>
                                </div>
                                
                                <div class="reservation-instructions">
                                    <div class="alert alert-warning rounded-3 mb-3">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Silakan tunjukkan kode reservasi ini saat tiba di restoran
                                    </div>
                                    <p class="text-muted small mb-0">
                                        <i class="fas fa-clock me-1"></i>
                                        Reservasi berlaku hingga 30 menit setelah waktu yang ditentukan
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer border-0 justify-content-center pb-5">
                                <button type="button" class="btn btn-outline-primary-red px-4" 
                                        onclick="window.print()">
                                    <i class="fas fa-print me-2"></i>Cetak Reservasi
                                </button>
                                <button type="button" class="btn btn-primary-red px-4" 
                                        onclick="this.closest('.modal').remove()">
                                    <i class="fas fa-check me-2"></i>Mengerti
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            const modal = document.createElement('div');
            modal.innerHTML = modalHTML;
            document.body.appendChild(modal);
            
            // Add modal styles
            const modalStyle = document.createElement('style');
            modalStyle.textContent = `
                .icon-circle {
                    width: 100px;
                    height: 100px;
                    background: linear-gradient(135deg, #28A745, #20C997);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 2.5rem;
                    margin: 0 auto;
                    box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
                    animation: iconPulse 0.6s ease-out;
                }
                .reservation-card {
                    border: 2px solid rgba(178, 34, 34, 0.1);
                }
                .detail-item {
                    text-align: left;
                    padding: 10px 0;
                }
                .modal-content {
                    animation: modalSlideIn 0.3s ease-out;
                }
                @keyframes modalSlideIn {
                    from {
                        opacity: 0;
                        transform: translateY(-50px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                @keyframes iconPulse {
                    0% {
                        transform: scale(0.5);
                        opacity: 0;
                    }
                    70% {
                        transform: scale(1.1);
                    }
                    100% {
                        transform: scale(1);
                        opacity: 1;
                    }
                }
            `;
            document.head.appendChild(modalStyle);
            
            // Reset form after modal shows
            setTimeout(() => {
                form.reset();
                form.classList.remove('was-validated');
                
                // Reset date to today
                const today = new Date();
                dateInput.value = today.toISOString().split('T')[0];
                updateDateDisplay(today);
                
                // Reset time to default
                if (defaultTimeOption) {
                    defaultTimeOption.selected = true;
                }
                
                // Reset special requests
                specialRequestsTextarea.value = '';
                specialRequestsTextarea.style.height = 'auto';
                
                // Reset validation states
                document.querySelectorAll('.form-control, .form-select').forEach(field => {
                    field.classList.remove('is-valid', 'is-invalid');
                });
                
            }, 3000);
        }
        
        // Add some example text for special requests
        const examples = [
            "Meja dekat jendela untuk pemandangan terbaik",
            "Perayaan ulang tahun dengan kue khusus",
            "Meja romantis untuk anniversary",
            "Area khusus untuk anak-anak",
            "Aksesibilitas kursi roda",
            "Menu khusus untuk alergi makanan"
        ];
        
        // Add click to insert example
        const examplesElement = document.querySelector('.request-examples');
        if (examplesElement) {
            examplesElement.addEventListener('click', function() {
                const randomExample = examples[Math.floor(Math.random() * examples.length)];
                specialRequestsTextarea.value = randomExample;
                specialRequestsTextarea.dispatchEvent(new Event('input'));
                specialRequestsTextarea.focus();
            });
            
            examplesElement.style.cursor = 'pointer';
            examplesElement.title = 'Klik untuk contoh permintaan';
        }
    });
</script>
@endsection