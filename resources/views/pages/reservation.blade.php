@extends('layouts.app')

@section('title', 'Reservasi & Kontak - JOSS GANDOS')

@section('content')
<!-- ELEGANT RED GRADIENT HERO SECTION DENGAN ANIMASI SUPER HIDUP - ORIGINAL PRESERVED -->
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
                
                <!-- Main Heading - ORIGINAL PRESERVED -->
                <h1 class="elegant-heading">
                    <span class="heading-line reveal-text">Pesan Meja</span>
                    <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">Untuk Momen</span>
                    <span class="heading-line reveal-text" style="animation-delay: 0.4s">Spesial Anda</span>
                </h1>
                
                <!-- Description - ORIGINAL PRESERVED -->
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
                    <a href="#contact-info" class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Info Kontak</span>
                        <i class="fas fa-info-circle"></i>
                    </a>
                </div>
            </div>
            
            <!-- HERO IMAGE - ORIGINAL PRESERVED -->
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

<!-- Reservation Form Section -->
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
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
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
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
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
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="081234567890" required>
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
                                        <textarea class="form-control @error('specialRequests') is-invalid @enderror" id="specialRequests" name="specialRequests" rows="4" placeholder="Contoh: Meja dekat jendela, kursi bayi, request menu khusus, dll.">{{ old('specialRequests') }}</textarea>
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

<!-- Contact Info & Map Section -->
<section class="section-padding bg-light" id="contact-info">
    <div class="container">
        <div class="row justify-content-center mb-6">
            <div class="col-lg-8 text-center">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="display-4 fw-bold mb-4">Informasi <span class="text-gradient">Kontak</span></h2>
                    <p class="lead text-muted">Hubungi kami untuk pertanyaan, reservasi, atau informasi lainnya</p>
                    <div class="divider"></div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Quick Contact Info Cards -->
            <div class="col-lg-4">
                <div class="contact-info-card h-100 animate-fade-in">
                    <div class="p-4">
                        <h4 class="fw-bold mb-4 text-center" style="color: #b42222;">
                            <i class="fas fa-info-circle me-2"></i>Info Kontak
                        </h4>
                        <div class="quick-contact-list">
                            <div class="quick-contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #333;">Lokasi Restoran</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                        {{ $settings['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231' }}
                                    </p>
                                </div>
                            </div>
                            <div class="quick-contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #333;">Jam Operasional</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                        {{ $settings['hours'] ?? '10:00 - 22:00 WIB (Setiap Hari)' }}
                                    </p>
                                </div>
                            </div>
                            <div class="quick-contact-item d-flex align-items-center mb-3">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #333;">Email</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                        {{ $settings['email'] ?? 'info@jossgandos.com' }}
                                    </p>
                                </div>
                            </div>
                            <div class="quick-contact-item d-flex align-items-center">
                                <div class="contact-icon me-3">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1" style="color: #333;">Telepon</h6>
                                    <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                        {{ $settings['phone'] ?? '0896-9907-1599' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media & Quick Actions - FIXED dengan Icon Facebook, Instagram, TikTok -->
            <div class="col-lg-4">
                <div class="social-media-card h-100 animate-fade-in">
                    <div class="p-4 text-center">
                        <h4 class="fw-bold mb-4" style="color: #333;">
                            <i class="fas fa-share-alt me-2"></i>Ikuti Kami
                        </h4>
                        
                        <!-- Social Media Icons dengan styling yang lebih baik -->
                        <div class="d-flex justify-content-center gap-3 mb-4 flex-wrap">
                            @php
                                // Ambil data dari settings
                                $social = $settings['social_media'] ?? [];
                                $facebook = $settings['facebook_url'] ?? ($social['facebook'] ?? '#');
                                $instagram = $settings['instagram_url'] ?? ($social['instagram'] ?? '#');
                                $tiktok = $settings['tiktok_url'] ?? ($social['tiktok'] ?? '#');
                            @endphp
                            
                            <!-- Facebook Icon -->
                            @if($facebook && $facebook != '#')
                            <a href="{{ $facebook }}" class="social-icon" style="background: #1877f2; box-shadow: 0 5px 15px rgba(24, 119, 242, 0.3);" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            @else
                            <a href="#" class="social-icon" style="background: #1877f2; opacity: 0.5; cursor: not-allowed;" onclick="return false;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            @endif
                            
                            <!-- Instagram Icon dengan gradient background -->
                            @if($instagram && $instagram != '#')
                            <a href="{{ $instagram }}" class="social-icon" style="background: radial-gradient(circle at 30% 30%, #fdf497, #fd5949, #d6249f, #285AEB); box-shadow: 0 5px 15px rgba(225, 48, 108, 0.4);" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @else
                            <a href="#" class="social-icon" style="background: radial-gradient(circle at 30% 30%, #fdf497, #fd5949, #d6249f, #285AEB); opacity: 0.5; cursor: not-allowed;" onclick="return false;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif
                            
                            <!-- TikTok Icon -->
                            @if($tiktok && $tiktok != '#')
                            <a href="{{ $tiktok }}" class="social-icon" style="background: #000000; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            @else
                            <a href="#" class="social-icon" style="background: #000000; opacity: 0.5; cursor: not-allowed;" onclick="return false;">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            @endif
                        </div>
                        
                        <!-- Informasi jika tidak ada social media yang aktif -->
                        @if(($facebook == '#' || !$facebook) && ($instagram == '#' || !$instagram) && ($tiktok == '#' || !$tiktok))
                            <p class="text-muted mb-3">
                                <i class="fas fa-info-circle me-1"></i> Belum ada tautan media sosial
                            </p>
                        @endif
                        
                        <!-- Quick Actions -->
                        <div class="quick-actions mt-4">
                            <a href="#map-section" class="contact-link d-block mb-2">
                                <i class="fas fa-map-marked-alt me-1"></i> Lihat Peta Lokasi
                            </a>
                            <a href="https://wa.me/{{ $settings['whatsapp_admin_1'] ?? '6289699071599' }}?text=Halo%20JOSS%20GANDOS,%20saya%20ingin%20bertanya" 
                               target="_blank" class="contact-link d-block">
                                <i class="fab fa-whatsapp me-1"></i> Chat via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Opening Hours & Additional Info -->
            <div class="col-lg-4">
                <div class="contact-info-card h-100 animate-fade-in">
                    <div class="p-4">
                        <h4 class="fw-bold mb-4 text-center" style="color: #b42222;">
                            <i class="fas fa-clock me-2"></i>Jam Operasional
                        </h4>
                        
                        <div class="opening-hours-list">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Senin - Kamis</span>
                                <span class="fw-semibold">10:00 - 22:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Jumat - Sabtu</span>
                                <span class="fw-semibold">10:00 - 23:00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Minggu</span>
                                <span class="fw-semibold">10:00 - 22:00</span>
                            </div>
                            
                            <hr>
                            
                            <div class="text-center mt-3">
                                <p class="text-muted mb-2">
                                    <i class="fas fa-utensils me-2"></i>Kitchen terakhir order 1 jam sebelum tutup
                                </p>
                                <p class="text-success mb-0">
                                    <i class="fas fa-check-circle me-1"></i>Buka setiap hari
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section-padding bg-white" id="map-section">
    <div class="container">
        <div class="map-card shadow-lg animate-fade-in" style="border-radius: 20px; overflow: hidden;">
            <!-- Map Header -->
            <div class="map-header p-4 p-md-5" 
                 style="background: linear-gradient(135deg, #b42222, #e63946);">
                <div class="row align-items-center">
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="d-flex align-items-center">
                            <div class="map-icon me-4">
                                <i class="fas fa-map-marked-alt fa-3x text-white"></i>
                            </div>
                            <div>
                                <h4 class="text-white mb-2 fw-bold">Lokasi Kami</h4>
                                <p class="text-white mb-0 opacity-90" style="font-size: 1.1rem;">
                                    {{ $settings['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <a href="https://maps.google.com/?q={{ urlencode($settings['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231') }}" 
                           target="_blank" 
                           class="btn btn-light btn-lg px-4 py-2">
                            <i class="fas fa-directions me-2"></i> Petunjuk Arah
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div class="map-container">
                <div class="ratio ratio-16x9">
                    <iframe 
                        src="{{ $settings['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid' }}" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>
            
            <!-- Map Features -->
            <div class="map-features p-4" style="background: #f8f9fa;">
                <div class="row text-center">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-icon me-3">
                                <i class="fas fa-car fa-2x" style="color: #b42222;"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold">Parkir Luas</p>
                                <small class="text-muted">Tersedia parkir luas</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-icon me-3">
                                <i class="fas fa-wheelchair fa-2x" style="color: #b42222;"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold">Aksesibilitas</p>
                                <small class="text-muted">Ramah difabel</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-icon me-3">
                                <i class="fas fa-train fa-2x" style="color: #b42222;"></i>
                            </div>
                            <div>
                                <p class="mb-0 fw-semibold">Transportasi</p>
                                <small class="text-muted">Akses mudah</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delivery Services Section - FIXED dengan Button GoFood & GrabFood -->
<section id="delivery-services" class="section-padding bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-5 fw-bold mb-3" style="color: #b42222;">
                    Pesan <span class="text-warning">Delivery</span>
                </h2>
                <p class="lead text-muted mb-4">
                    Nikmati menu favorit JOSS GANDOS langsung di rumah Anda melalui layanan delivery kami
                </p>
                <div class="divider"></div>
            </div>
        </div>

        <!-- Delivery Apps -->
        <div class="row g-4">
            <!-- GoFood -->
            <div class="col-md-4">
                <div class="delivery-app-card text-center animate-fade-in">
                    <div class="delivery-app-logo mb-3">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjnA6euTxY_3bBbvCPE1E_j98O3fWg1WF2IbWmr4cNbt9VsFiY_Fwq7j9TnutdF8KDblPyno9HNOidxExb_pwbQtuMOT8Cdyc7KD01WhRtDlA82X4JybUimnGfUFdoBV9jsTN_eZEzbj37RlpPfXW2InMsaNsEf8bwd4ePUCRclJX9pRf11C-tHNTiZ/w380/GKL20_GoFood%20-%20Koleksilogo.com.jpg" 
                             alt="GoFood" 
                             class="img-fluid" 
                             style="max-height: 50px; object-fit: contain;">
                    </div>
                    <div class="delivery-app-content">
                        <h4 class="fw-bold mb-3" style="color: #333;">GoFood</h4>
                        <p class="text-muted mb-3">
                            Pesan melalui aplikasi GoFood untuk pengiriman cepat dan mudah
                        </p>
                        
                        <!-- GoFood Button - FIXED -->
                        @if(isset($settings['delivery_gofood']) && $settings['delivery_gofood'] != '' && $settings['delivery_gofood'] != '#')
                        <a href="{{ $settings['delivery_gofood'] }}" 
                           target="_blank"
                           class="btn w-100 py-3 fw-bold delivery-btn d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-external-link-alt"></i> 
                            <span>Buka di GoFood</span>
                        </a>
                        @else
                        <button class="btn w-100 py-3 fw-bold delivery-btn d-flex align-items-center justify-content-center gap-2" 
                                style="opacity: 0.6; cursor: not-allowed;" 
                                disabled>
                            <i class="fas fa-external-link-alt"></i> 
                            <span>Buka di GoFood</span>
                        </button>
                        <p class="text-muted small mt-2">
                            <i class="fas fa-info-circle me-1"></i> Link belum tersedia
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- GrabFood -->
            <div class="col-md-4">
                <div class="delivery-app-card text-center animate-fade-in">
                    <div class="delivery-app-logo mb-3">
                        <img src="https://seduhteh.wordpress.com/wp-content/uploads/2019/11/grabfood-vector-logo.png" 
                             alt="GrabFood" 
                             class="img-fluid" 
                             style="max-height: 50px; object-fit: contain;">
                    </div>
                    <div class="delivery-app-content">
                        <h4 class="fw-bold mb-3" style="color: #333;">GrabFood</h4>
                        <p class="text-muted mb-3">
                            Pesan melalui aplikasi GrabFood dengan berbagai pilihan menu lengkap
                        </p>
                        
                        <!-- GrabFood Button - FIXED -->
                        @if(isset($settings['delivery_grabfood']) && $settings['delivery_grabfood'] != '' && $settings['delivery_grabfood'] != '#')
                        <a href="{{ $settings['delivery_grabfood'] }}" 
                           target="_blank"
                           class="btn w-100 py-3 fw-bold delivery-btn d-flex align-items-center justify-content-center gap-2">
                            <i class="fas fa-external-link-alt"></i> 
                            <span>Buka di GrabFood</span>
                        </a>
                        @else
                        <button class="btn w-100 py-3 fw-bold delivery-btn d-flex align-items-center justify-content-center gap-2" 
                                style="opacity: 0.6; cursor: not-allowed;" 
                                disabled>
                            <i class="fas fa-external-link-alt"></i> 
                            <span>Buka di GrabFood</span>
                        </button>
                        <p class="text-muted small mt-2">
                            <i class="fas fa-info-circle me-1"></i> Link belum tersedia
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- WhatsApp Order dengan Admin - BUTTON MERAH SEPERTI GRABFOOD -->
            <div class="col-md-4">
                <div class="delivery-app-card text-center animate-fade-in">
                    <div class="delivery-app-logo mb-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2048px-WhatsApp.svg.png" 
                             alt="WhatsApp" 
                             class="img-fluid" 
                             style="max-height: 50px; object-fit: contain;">
                    </div>
                    <div class="delivery-app-content">
                        <h4 class="fw-bold mb-3" style="color: #333;">WhatsApp Order</h4>
                        <p class="text-muted mb-3">
                            Pesan langsung via WhatsApp untuk konsultasi menu khusus
                        </p>
                        
                        <!-- WhatsApp Admin Contacts - DUA BUTTON MERAH SEJAJAR (SEPERTI GRABFOOD) -->
                        <div class="whatsapp-admin-buttons mb-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <a href="https://wa.me/{{ $settings['whatsapp_admin_1'] ?? '6289699071599' }}?text=Halo%20{{ urlencode($settings['whatsapp_admin_1_name'] ?? 'Admin 1') }}%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                                       target="_blank"
                                       class="btn w-100 py-2 whatsapp-admin-btn-red d-flex align-items-center justify-content-center">
                                        <i class="fab fa-whatsapp me-2 fs-5"></i>
                                        <div class="text-start">
                                            <div class="fw-bold" style="font-size: 0.9rem;">{{ $settings['whatsapp_admin_1_name'] ?? 'Admin 1' }}</div>
                                            <div style="font-size: 0.75rem; opacity: 0.9;">{{ $settings['whatsapp_admin_1'] ?? '0896-9907-1599' }}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="https://wa.me/{{ $settings['whatsapp_admin_2'] ?? '6289532682495' }}?text=Halo%20{{ urlencode($settings['whatsapp_admin_2_name'] ?? 'Admin 2') }}%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                                       target="_blank"
                                       class="btn w-100 py-2 whatsapp-admin-btn-red d-flex align-items-center justify-content-center">
                                        <i class="fab fa-whatsapp me-2 fs-5"></i>
                                        <div class="text-start">
                                            <div class="fw-bold" style="font-size: 0.9rem;">{{ $settings['whatsapp_admin_2_name'] ?? 'Admin 2' }}</div>
                                            <div style="font-size: 0.75rem; opacity: 0.9;">{{ $settings['whatsapp_admin_2'] ?? '0895-3268-2495' }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <p class="whatsapp-info small text-muted mt-2">
                            <i class="fas fa-clock me-1"></i> Respon cepat 5-10 menit
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<!-- All the CSS styles remain exactly the same, ditambah styling untuk button merah -->
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
    
    /* Contact Info Card */
    .contact-info-card {
        background: white;
        border-radius: 15px;
        border: 1px solid rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .contact-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: #b42222;
    }
    
    .contact-icon {
        width: 45px;
        height: 45px;
        background: rgba(180, 34, 34, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b42222;
        font-size: 18px;
    }
    
    .quick-contact-item {
        transition: all 0.3s ease;
    }
    
    .quick-contact-item:hover {
        transform: translateX(5px);
    }
    
    .social-media-card {
        background: white;
        border-radius: 15px;
        border: 1px solid rgba(0,0,0,0.1);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        height: 100%;
    }
    
    .social-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }
    
    .social-icon:hover {
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .contact-link {
        color: #b42222;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .contact-link:hover {
        color: #8a1a1a;
        text-decoration: underline;
    }
    
    .map-card {
        background: white;
        border: 1px solid rgba(0,0,0,0.1);
    }
    
    .map-icon {
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .feature-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .delivery-app-card {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border: 1px solid rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .delivery-app-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(180, 34, 34, 0.1);
        border-color: #b42222;
    }
    
    .delivery-app-logo img {
        transition: transform 0.3s ease;
        max-height: 50px;
        object-fit: contain;
    }
    
    .delivery-app-card:hover .delivery-app-logo img {
        transform: scale(1.1);
    }
    
    .delivery-btn {
        color: white;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        margin-top: auto;
        font-weight: 600;
        padding: 12px;
        background: linear-gradient(135deg, #b42222, #e63946) !important;
    }
    
    .delivery-btn:hover:not(:disabled) {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(180, 34, 34, 0.3);
        color: white;
    }
    
    .delivery-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    /* Style untuk button admin merah seperti GrabFood - BARU */
    .whatsapp-admin-btn-red {
        color: white;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        padding: 10px 12px;
        text-align: left;
        background: linear-gradient(135deg, #b42222, #e63946) !important;
        height: 100%;
        box-shadow: 0 4px 10px rgba(180, 34, 34, 0.3);
    }
    
    .whatsapp-admin-btn-red:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(180, 34, 34, 0.4);
        color: white;
        background: linear-gradient(135deg, #c53030, #ff4757) !important;
    }
    
    .whatsapp-admin-btn-red i {
        color: white;
        font-size: 1.2rem;
    }
    
    .whatsapp-admin-btn-red .fw-bold,
    .whatsapp-admin-btn-red div {
        color: white !important;
    }
    
    .divider {
        width: 100px;
        height: 4px;
        background: #b42222;
        margin: 20px auto;
        border-radius: 2px;
    }
    
    .opening-hours-list {
        padding: 10px;
    }
    
    .quick-actions {
        border-top: 1px solid rgba(0,0,0,0.1);
        padding-top: 20px;
    }
    
    /* Animation */
    .animate-fade-in {
        animation: fadeInUp 0.8s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
        
        .contact-info-card,
        .social-media-card {
            margin-bottom: 20px;
        }
        
        .map-icon {
            width: 60px;
            height: 60px;
        }
        
        .map-icon i {
            font-size: 2rem !important;
        }
        
        .delivery-app-card {
            padding: 15px;
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

    /* CSS Tambahan untuk Timer dan Kode Reservasi */
    .reservation-code-container {
        animation: slideDown 0.5s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    #reservationTimer {
        transition: all 0.3s ease;
    }

    #timerDisplay {
        font-family: 'Courier New', monospace;
        background: white;
        padding: 3px 10px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        animation: pulse 1s infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
            background: #f8f9fa;
        }
    }

    /* Styling untuk alert success yang lebih baik */
    .alert-success {
        border-left: 4px solid #28a745;
        background: #f8f9fa;
        border-radius: 10px;
        padding: 0;
        overflow: hidden;
    }

    /* Styling untuk kode reservasi */
    .reservation-code-container {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-top: 15px;
        border-left: 4px solid #28a745;
    }

    .reservation-code-container .code-box {
        background: #b42222;
        color: white;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 15px;
    }

    .reservation-code-container .code-box span {
        font-size: 24px;
        font-weight: bold;
        letter-spacing: 2px;
        font-family: monospace;
    }

    /* CSS tambahan untuk social icons */
    .social-icon i {
        font-size: 1.2rem;
    }
    
    .whatsapp-admin-btn-red .fab {
        font-size: 1.2rem;
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
            this.style.borderColor = '#b42222';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
        });
        
        // Time select enhancement
        const timeSelect = document.getElementById('time');
        timeSelect.addEventListener('change', function() {
            this.style.borderColor = '#b42222';
            setTimeout(() => {
                this.style.borderColor = '';
            }, 1000);
        });
        
        // Special requests textarea enhancement
        const specialRequestsTextarea = document.getElementById('specialRequests');
        specialRequestsTextarea.addEventListener('focus', function() {
            this.style.borderColor = '#b42222';
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

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                          document.querySelector('input[name="_token"]')?.value;

        // Form submission with AJAX dan timer 5 menit untuk kode reservasi
        const form = document.getElementById('reservationForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        // Variable untuk menyimpan timer
        let reservationCodeTimer = null;

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
            
            // Cancel previous timer jika ada
            if (reservationCodeTimer) {
                clearInterval(reservationCodeTimer);
                reservationCodeTimer = null;
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
            
            // Send AJAX request
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
                    // Set waktu timer 5 menit (300 detik)
                    let timeLeft = 300; // 5 menit dalam detik
                    
                    // Format waktu ke menit:detik
                    const formatTime = (seconds) => {
                        const mins = Math.floor(seconds / 60);
                        const secs = seconds % 60;
                        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
                    };
                    
                    // Buat HTML untuk menampilkan kode reservasi dengan timer
                    const reservationHTML = `
                        <div class="reservation-code-container">
                            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                                <i class="fas fa-check-circle" style="color: #28a745; font-size: 24px; margin-right: 10px;"></i>
                                <h5 style="margin: 0; color: #155724; font-weight: 600;">Reservasi Berhasil!</h5>
                            </div>
                            
                            <!-- Tampilan persis seperti di image -->
                            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 15px;">
                                <p style="font-size: 1.1rem; margin-bottom: 10px; color: #333;">
                                    <strong>Reservasi berhasil! Kode reservasi Anda:</strong>
                                </p>
                                <div class="code-box">
                                    <span>${data.data?.reservation_code || 'JOSS-MR6QII'}</span>
                                </div>
                                
                                <!-- Timer countdown -->
                                <div id="reservationTimer" style="text-align: center; padding: 10px; background: #fff3cd; border: 1px solid #ffeeba; border-radius: 8px; margin-top: 10px;">
                                    <i class="fas fa-hourglass-half" style="color: #856404; margin-right: 5px;"></i>
                                    <span style="color: #856404; font-weight: 600;">
                                        Waktu untuk menyimpan kode: <span id="timerDisplay" style="font-size: 20px; font-weight: bold; background: white; padding: 3px 10px; border-radius: 5px; margin-left: 5px;">5:00</span>
                                    </span>
                                </div>
                                
                                <p style="margin-top: 15px; margin-bottom: 5px; color: #666; font-size: 0.9rem;">
                                    <i class="fas fa-camera me-1"></i> Screenshot atau foto kode ini sebelum timer habis
                                </p>
                            </div>
                            
                            <p style="margin-bottom: 5px;"><strong>🔍 Informasi Pribadi</strong></p>
                            <p style="color: #666; font-size: 0.9rem;">Lengkapi data diri Anda untuk keperluan konfirmasi</p>
                        </div>
                    `;
                    
                    // Tampilkan pesan sukses dengan kode reservasi
                    successMessage.innerHTML = reservationHTML;
                    successMessage.classList.remove('d-none');
                    
                    // Scroll ke atas untuk menampilkan pesan
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    
                    // Jalankan timer
                    reservationCodeTimer = setInterval(() => {
                        timeLeft--;
                        
                        // Update tampilan timer
                        const timerDisplay = document.getElementById('timerDisplay');
                        if (timerDisplay) {
                            timerDisplay.textContent = formatTime(timeLeft);
                        }
                        
                        // Jika waktu habis
                        if (timeLeft <= 0) {
                            clearInterval(reservationCodeTimer);
                            reservationCodeTimer = null;
                            
                            // Update tampilan timer menjadi expired
                            const reservationTimer = document.getElementById('reservationTimer');
                            if (reservationTimer) {
                                reservationTimer.innerHTML = `
                                    <i class="fas fa-exclamation-triangle" style="color: #721c24; margin-right: 5px;"></i>
                                    <span style="color: #721c24; font-weight: 600;">
                                        Waktu penyimpanan kode telah habis. Silakan reservasi ulang jika diperlukan.
                                    </span>
                                `;
                                reservationTimer.style.background = '#f8d7da';
                                reservationTimer.style.borderColor = '#f5c6cb';
                            }
                        }
                    }, 1000);
                    
                    // Reset form
                    form.reset();
                    
                    // Reset date to today
                    const today = new Date();
                    dateInput.value = today.toISOString().split('T')[0];
                    
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

        // WhatsApp click tracking
        document.querySelectorAll('a[href*="whatsapp"]').forEach(link => {
            link.addEventListener('click', function() {
                console.log('WhatsApp link clicked:', this.href);
            });
        });

        // Delivery app cards hover effect
        document.querySelectorAll('.delivery-app-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const logo = this.querySelector('.delivery-app-logo img');
                if (logo) {
                    logo.style.transform = 'scale(1.1)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const logo = this.querySelector('.delivery-app-logo img');
                if (logo) {
                    logo.style.transform = 'scale(1)';
                }
            });
        });
    });
</script>
@endsection