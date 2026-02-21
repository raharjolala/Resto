@extends('layouts.app')

@section('title', $content['meta_title'] ?? 'Kontak - JOSS GANDOS')
@section('meta-description', $content['meta_description'] ?? 'Hubungi JOSS GANDOS untuk reservasi, catering, atau informasi lainnya. Kami siap melayani Anda')

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
                    <span>{{ $content['hero_subtitle'] ?? 'HUBUNGI KAMI' }}</span>
                    <span class="badge-dot"></span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="elegant-heading">
                    @php
                        $heroTitle = $content['hero_title'] ?? 'Kami Siap Melayani Dengan Sepenuh Hati';
                        $titleParts = explode(' ', $heroTitle, 3);
                    @endphp
                    
                    @if(isset($content['hero_title_line1']) && isset($content['hero_title_line2']) && isset($content['hero_title_line3']))
                        <span class="heading-line reveal-text">{{ $content['hero_title_line1'] }}</span>
                        <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">{{ $content['hero_title_line2'] }}</span>
                        <span class="heading-line reveal-text" style="animation-delay: 0.4s">{{ $content['hero_title_line3'] }}</span>
                    @else
                        <span class="heading-line reveal-text">{{ $titleParts[0] ?? 'Kami Siap' }}</span>
                        <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">{{ $titleParts[1] ?? 'Melayani Dengan' }}</span>
                        <span class="heading-line reveal-text" style="animation-delay: 0.4s">{{ $titleParts[2] ?? 'Sepenuh Hati' }}</span>
                    @endif
                </h1>
                
                <!-- Description -->
                <p class="elegant-desc animate__animated animate__fadeInUp animate__delay-1s">
                    {{ $content['hero_description'] ?? 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.' }}
                </p>
                
                <!-- CTA Buttons -->
                <div class="elegant-cta">
                    <a href="#contact-form" class="btn-elegant btn-primary-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Kirim Pesan</span>
                        <i class="fas fa-paper-plane"></i>
                    </a>
                    <a href="#map" class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Lihat Lokasi</span>
                        <i class="fas fa-map-marker-alt"></i>
                    </a>
                </div>
            </div>
            
            <!-- HERO IMAGE -->
            <div class="col-lg-6 col-xl-6">
                <div class="hero-image-wrapper animate__animated animate__fadeInRight animate__delay-0s">
                    <div class="hero-image-container hero-image-extra-large">
                        <div class="hero-image-frame hero-frame-premium">
                            <img src="{{ $content['hero_image_url'] ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}"
                                 alt="Hubungi Resto Joss Gandos"
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
                                <span>#{{ str_replace(' ', '', $content['hero_subtitle'] ?? 'HUBUNGI KAMI') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Contact Form & Info Section -->
    <section class="section-padding bg-light" id="contact-form">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form-card shadow-lg animate-fade-in" style="border-radius: 20px; overflow: hidden;">
                        <div class="p-4 p-md-5">
                            <!-- Form Header -->
                            <div class="form-header mb-5">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="form-icon-wrapper me-3">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <div>
                                        <h2 class="fw-bold mb-1" style="color: #b42222;">Kirim Pesan</h2>
                                        <p class="text-muted mb-0">Tim kami akan membalas dalam 1x24 jam</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Contact Form -->
                            <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold mb-2" style="color: #333;">
                                            <i class="fas fa-user me-2" style="color: #b42222;"></i>Nama Lengkap *
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="text-muted"></i>
                                            </span>
                                            <input type="text" class="form-control border-start-0" 
                                                   id="name" name="name" required 
                                                   placeholder="Masukkan nama lengkap Anda">
                                        </div>
                                        <div class="invalid-feedback">Harap isi nama lengkap</div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold mb-2" style="color: #333;">
                                            <i class="fas fa-envelope me-2" style="color: #b42222;"></i>Email *
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="text-muted"></i>
                                            </span>
                                            <input type="email" class="form-control border-start-0" 
                                                   id="email" name="email" required 
                                                   placeholder="contoh@email.com">
                                        </div>
                                        <div class="invalid-feedback">Harap isi email yang valid</div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold mb-2" style="color: #333;">
                                            <i class="fas fa-phone me-2" style="color: #b42222;"></i>Telepon *
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="text-muted"></i>
                                            </span>
                                            <input type="tel" class="form-control border-start-0" 
                                                   id="phone" name="phone" required 
                                                   placeholder="08123456789">
                                        </div>
                                        <div class="invalid-feedback">Harap isi nomor telepon</div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold mb-2" style="color: #333;">
                                            <i class="fas fa-tag me-2" style="color: #b42222;"></i>Subjek *
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="text-muted"></i>
                                            </span>
                                            <select class="form-select border-start-0" id="subject" name="subject" required>
                                                <option value="" selected disabled>Pilih subjek</option>
                                                <option value="reservation">Reservasi Meja</option>
                                                <option value="catering">Layanan Catering</option>
                                                <option value="event">Acara & Paket</option>
                                                <option value="complaint">Keluhan & Saran</option>
                                                <option value="partnership">Kerjasama</option>
                                                <option value="other">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="invalid-feedback">Harap pilih subjek</div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label fw-semibold mb-2" style="color: #333;">
                                        <i class="fas fa-edit me-2" style="color: #b42222;"></i>Pesan *
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-white align-items-start border-end-0" style="padding-top: 14px;">
                                            <i class="text-muted"></i>
                                        </span>
                                        <textarea class="form-control border-start-0" 
                                                  id="message" name="message" rows="6" required 
                                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                            <label class="form-check-label text-muted" for="newsletter">
                                                Berlangganan newsletter
                                            </label>
                                        </div>
                                        <div>
                                            <small class="text-muted" id="charCount">0/500 karakter</small>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">Harap isi pesan</div>
                                </div>
                                
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3 shadow" 
                                            style="background: linear-gradient(135deg, #b42222, #e63946); border: none; border-radius: 12px;">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Contact & Social Media -->
                <div class="col-lg-4">
                    <!-- Quick Contact Card -->
                    <div class="contact-info-card mb-4 animate-fade-in" style="animation-delay: 0.1s;">
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
                                            {{ $content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231' }}
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
                                            {{ $content['hours'] ?? '10:00 - 22:00 WIB (Setiap Hari)' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="quick-contact-item d-flex align-items-center">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #333;">Email</h6>
                                        <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                            {{ $content['email'] ?? 'info@jossgandos.com' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="quick-contact-item d-flex align-items-center mt-3">
                                    <div class="contact-icon me-3">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-1" style="color: #333;">Telepon</h6>
                                        <p class="mb-0 text-muted" style="font-size: 0.95rem;">
                                            {{ $content['phone'] ?? '(021) 1234-5678' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="social-media-card animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="p-4 text-center">
                            <h4 class="fw-bold mb-4" style="color: #333;">
                                <i class="fas fa-share-alt me-2"></i>Ikuti Kami
                            </h4>
                            <div class="d-flex justify-content-center gap-3 mb-4">
                                @php
                                    $social = $content['social_media'] ?? [];
                                    $facebook = $content['facebook_url'] ?? ($social['facebook'] ?? '#');
                                    $instagram = $content['instagram_url'] ?? ($social['instagram'] ?? '#');
                                    $twitter = $content['twitter_url'] ?? ($social['twitter'] ?? '#');
                                    $linkedin = $content['linkedin_url'] ?? ($social['linkedin'] ?? '#');
                                @endphp
                                
                                @if($facebook && $facebook != '#')
                                <a href="{{ $facebook }}" class="social-icon" style="background: #1877f2;" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                @endif
                                
                                @if($instagram && $instagram != '#')
                                <a href="{{ $instagram }}" class="social-icon" style="background: #e4405f;" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                @endif
                                
                                @if($twitter && $twitter != '#')
                                <a href="{{ $twitter }}" class="social-icon" style="background: #1da1f2;" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif
                                
                                @if($linkedin && $linkedin != '#')
                                <a href="{{ $linkedin }}" class="social-icon" style="background: #0a66c2;" target="_blank">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                @endif
                            </div>
                            <div class="map-cta">
                                <a href="#map" class="contact-link">
                                    <i class="fas fa-map-marked-alt me-1"></i> Lihat Peta Lokasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section-padding bg-light" id="map">
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
                                        {{ $content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="https://maps.google.com/?q={{ urlencode($content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231') }}" 
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
                            src="{{ $content['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid' }}" 
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

    <!-- Delivery Services Section -->
    <section class="section-padding bg-white">
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
                                 style="max-height: 50px;">
                        </div>
                        <div class="delivery-app-content">
                            <h4 class="fw-bold mb-3" style="color: #333;">GoFood</h4>
                            <p class="text-muted mb-3">
                                Pesan melalui aplikasi GoFood untuk pengiriman cepat dan mudah
                            </p>
                            @if(isset($content['delivery_gofood']) && $content['delivery_gofood'] != '#')
                            <a href="{{ $content['delivery_gofood'] }}" 
                               target="_blank"
                               class="btn w-100 py-2 fw-bold delivery-btn"
                               style="background: linear-gradient(135deg, #b42222, #e63946); border: none; border-radius: 10px;">
                                <i class="fas fa-external-link-alt me-2"></i> Buka di GoFood
                            </a>
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
                                 style="max-height: 50px;">
                        </div>
                        <div class="delivery-app-content">
                            <h4 class="fw-bold mb-3" style="color: #333;">GrabFood</h4>
                            <p class="text-muted mb-3">
                                Pesan melalui aplikasi GrabFood dengan berbagai pilihan menu lengkap
                            </p>
                            @if(isset($content['delivery_grabfood']) && $content['delivery_grabfood'] != '#')
                            <a href="{{ $content['delivery_grabfood'] }}" 
                               target="_blank"
                               class="btn w-100 py-2 fw-bold delivery-btn"
                               style="background: linear-gradient(135deg, #b42222, #e63946); border: none; border-radius: 10px;">
                                <i class="fas fa-external-link-alt me-2"></i> Buka di GrabFood
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Order dengan Admin -->
                <div class="col-md-4">
                    <div class="delivery-app-card text-center animate-fade-in">
                        <div class="delivery-app-logo mb-3">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2048px-WhatsApp.svg.png" 
                                 alt="WhatsApp" 
                                 class="img-fluid" 
                                 style="max-height: 50px;">
                        </div>
                        <div class="delivery-app-content">
                            <h4 class="fw-bold mb-3" style="color: #333;">WhatsApp Order</h4>
                            <p class="text-muted mb-3">
                                Pesan langsung via WhatsApp untuk konsultasi menu khusus
                            </p>
                            
                            <!-- WhatsApp Admin Contacts - DUA BUTTON SEJAJAR -->
                            <div class="whatsapp-admin-buttons mb-3">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="https://wa.me/{{ $content['whatsapp_admin_1'] ?? '6289699071599' }}?text=Halo%20{{ urlencode($content['whatsapp_admin_1_name'] ?? 'Admin') }}%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                                           target="_blank"
                                           class="btn w-100 py-2 whatsapp-admin-btn d-flex align-items-center justify-content-center"
                                           style="background: linear-gradient(135deg, #b42222, #e63946); color: white; border: none; border-radius: 10px; font-weight: 500; transition: all 0.3s ease;">
                                            <i class="fab fa-whatsapp me-2 fs-5"></i>
                                            <div class="text-start">
                                                <div class="fw-bold" style="font-size: 0.9rem;">{{ $content['whatsapp_admin_1_name'] ?? 'Admin 1' }}</div>
                                                <div style="font-size: 0.75rem; opacity: 0.9;">{{ $content['whatsapp_admin_1'] ?? '0896-9907-1599' }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="https://wa.me/{{ $content['whatsapp_admin_2'] ?? '6289532682495' }}?text=Halo%20{{ urlencode($content['whatsapp_admin_2_name'] ?? 'Admin') }}%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                                           target="_blank"
                                           class="btn w-100 py-2 whatsapp-admin-btn d-flex align-items-center justify-content-center"
                                           style="background: linear-gradient(135deg, #b42222, #e63946); color: white; border: none; border-radius: 10px; font-weight: 500; transition: all 0.3s ease;">
                                            <i class="fab fa-whatsapp me-2 fs-5"></i>
                                            <div class="text-start">
                                                <div class="fw-bold" style="font-size: 0.9rem;">{{ $content['whatsapp_admin_2_name'] ?? 'Admin 2' }}</div>
                                                <div style="font-size: 0.75rem; opacity: 0.9;">{{ $content['whatsapp_admin_2'] ?? '0895-3268-2495' }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
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

    /* Custom Styles for Contact Page */
    :root {
        --primary-red: #b42222;
        --accent-gold: #ffcc00;
        --dark-charcoal: #333;
        --light-gray: #f8f9fa;
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

    /* Contact Info Card */
    .contact-info-card {
        background: white;
        border-radius: 15px;
        border: 1px solid rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .contact-info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: var(--primary-red);
    }
    
    .contact-icon {
        width: 45px;
        height: 45px;
        background: rgba(180, 34, 34, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
        font-size: 18px;
    }
    
    .quick-contact-item {
        transition: all 0.3s ease;
    }
    
    .quick-contact-item:hover {
        transform: translateX(5px);
    }
    
    .contact-link {
        color: var(--primary-red);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .contact-link:hover {
        color: #8a1a1a;
        text-decoration: underline;
    }
    
    /* Social Media Card */
    .social-media-card {
        background: white;
        border-radius: 15px;
        border: 1px solid rgba(0,0,0,0.1);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
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
        transition: transform 0.3s ease;
    }
    
    .social-icon:hover {
        transform: translateY(-3px);
    }
    
    /* Map Card */
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
    
    /* Form Styles */
    .input-group-text {
        border-color: #dee2e6;
        background: white;
    }
    
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(180, 34, 34, 0.1);
        border-color: var(--primary-red);
    }
    
    /* Divider */
    .divider {
        width: 100px;
        height: 4px;
        background: var(--primary-red);
        margin: 20px auto;
        border-radius: 2px;
    }
    
    /* Delivery App Cards - SEMUA BUTTON SEJAJAR */
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
        min-height: 220px;
    }
    
    .delivery-app-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(180, 34, 34, 0.1);
        border-color: var(--primary-red);
    }
    
    .delivery-app-logo img {
        transition: transform 0.3s ease;
        max-height: 50px;
        object-fit: contain;
    }
    
    .delivery-app-card:hover .delivery-app-logo img {
        transform: scale(1.1);
    }
    
    /* SEMUA BUTTON DELIVERY MENGGUNAKAN STYLE YANG SAMA */
    .delivery-btn {
        color: white;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        margin-top: auto;
        font-weight: 600;
        padding: 10px;
        background: linear-gradient(135deg, #b42222, #e63946) !important;
    }
    
    .delivery-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(180, 34, 34, 0.3);
        color: white;
    }
    
    /* WhatsApp Admin Buttons - WARNA MERAH */
    .whatsapp-admin-btn {
        color: white;
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        padding: 10px 12px;
        text-align: left;
        background: linear-gradient(135deg, #b42222, #e63946) !important;
        height: 100%;
    }
    
    .whatsapp-admin-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(180, 34, 34, 0.3);
        color: white;
    }
    
    /* WhatsApp icon color */
    .whatsapp-admin-btn .fab {
        color: white !important;
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
    
    /* Responsive untuk semua tombol sejajar */
    @media (max-width: 768px) {
        .contact-hero-section {
            padding: 80px 0;
        }
        
        .hero-title {
            font-size: 2.5rem !important;
        }
        
        .section-padding {
            padding: 60px 0;
        }
        
        .form-icon-wrapper {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .map-header .btn {
            width: 100%;
            margin-top: 10px;
        }
        
        .delivery-app-card {
            padding: 15px;
            margin-bottom: 20px;
            min-height: 400px;
        }
        
        .delivery-app-logo img {
            max-height: 40px;
        }
        
        .delivery-btn, .whatsapp-admin-btn {
            padding: 8px 10px;
        }
        
        .whatsapp-admin-btn .fw-bold {
            font-size: 0.8rem !important;
        }
        
        .whatsapp-admin-btn div div:last-child {
            font-size: 0.7rem !important;
        }
    }
    
    @media (max-width: 576px) {
        .delivery-app-card {
            padding: 15px;
            min-height: 380px;
        }
        
        .delivery-app-logo img {
            max-height: 40px !important;
        }
        
        .delivery-app-content h4 {
            font-size: 1.1rem;
        }
        
        .delivery-app-content p {
            font-size: 0.9rem;
        }
        
        .delivery-btn, .whatsapp-admin-btn {
            padding: 8px;
            font-size: 0.9rem;
        }
        
        .whatsapp-admin-btn {
            padding: 6px 8px;
        }
        
        .whatsapp-admin-btn .fab {
            font-size: 0.9rem !important;
        }
        
        .whatsapp-admin-btn .fw-bold {
            font-size: 0.75rem !important;
        }
        
        .whatsapp-admin-btn div div:last-child {
            font-size: 0.65rem !important;
        }
        
        .whatsapp-info {
            font-size: 0.8rem !important;
            padding: 8px !important;
        }
    }
    
    @media (max-width: 400px) {
        .whatsapp-admin-btn {
            flex-direction: column;
            text-align: center !important;
            padding: 8px 4px;
        }
        
        .whatsapp-admin-btn .fab {
            margin-right: 0 !important;
            margin-bottom: 4px;
            font-size: 1rem !important;
        }
        
        .whatsapp-admin-btn .text-start {
            text-align: center !important;
        }
        
        .delivery-btn {
            font-size: 0.85rem;
            padding: 8px 4px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Character counter for message textarea
        const messageTextarea = document.getElementById('message');
        const charCount = document.getElementById('charCount');
        
        messageTextarea.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = `${length}/500 karakter`;
            
            if (length > 500) {
                this.value = this.value.substring(0, 500);
                charCount.textContent = '500/500 karakter';
                charCount.style.color = '#e63946';
            } else if (length > 450) {
                charCount.style.color = '#e63946';
            } else if (length > 400) {
                charCount.style.color = '#ff6b6b';
            } else {
                charCount.style.color = '#6c757d';
            }
        });
        
        // Form validation
        const contactForm = document.getElementById('contactForm');
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset validation
            this.querySelectorAll('.form-control, .form-select').forEach(input => {
                input.classList.remove('is-invalid');
            });
            
            // Validation
            let isValid = true;
            const requiredFields = this.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                }
            });
            
            // Email validation
            const emailField = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailField.value && !emailRegex.test(emailField.value)) {
                emailField.classList.add('is-invalid');
                emailField.nextElementSibling.textContent = 'Format email tidak valid';
                isValid = false;
            }
            
            if (!isValid) {
                showNotification('Harap lengkapi semua field yang wajib diisi dengan benar.', 'error');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengirim...';
            submitBtn.disabled = true;
            
            // In real implementation, you would use AJAX or form submission
            // Simulate API call
            setTimeout(() => {
                // Success
                submitBtn.innerHTML = '<i class="fas fa-check me-2"></i> Terkirim!';
                submitBtn.style.background = '#2a9d8f';
                
                // Show success message
                showNotification('Pesan Anda berhasil dikirim! Tim kami akan menghubungi Anda dalam 1x24 jam.', 'success');
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    submitBtn.style.background = '';
                    contactForm.reset();
                    document.getElementById('charCount').textContent = '0/500 karakter';
                    
                    // Reset validation
                    contactForm.querySelectorAll('.form-control, .form-select').forEach(input => {
                        input.classList.remove('is-invalid');
                    });
                }, 3000);
            }, 2000);
        });
        
        // Real-time validation
        contactForm.querySelectorAll('[required]').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
                
                // Email specific validation
                if (this.type === 'email' && this.value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(this.value)) {
                        this.classList.add('is-invalid');
                        this.nextElementSibling.textContent = 'Format email tidak valid';
                    }
                }
            });
            
            field.addEventListener('focus', function() {
                this.classList.remove('is-invalid');
            });
        });
        
        // Smooth scroll to map
        document.querySelectorAll('a[href="#map"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const mapSection = document.getElementById('map');
                if (mapSection) {
                    mapSection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Smooth scroll to contact form
        document.querySelectorAll('a[href="#contact-form"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const formSection = document.getElementById('contact-form');
                if (formSection) {
                    formSection.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);
        
        // Observe all animate elements
        document.querySelectorAll('.animate-fade-in').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            observer.observe(el);
        });
        
        // WhatsApp click tracking
        document.querySelectorAll('a[href*="whatsapp"]').forEach(link => {
            link.addEventListener('click', function() {
                // You can add analytics tracking here
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
    
    // Notification function
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'notification-toast';
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-left: 4px solid ${type === 'success' ? '#2ecc71' : '#e74c3c'};
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            padding: 20px;
            max-width: 400px;
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            font-family: 'Poppins', sans-serif;
        `;
        
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div style="width: 40px; height: 40px; 
                          background: ${type === 'success' ? '#2ecc71' : '#e74c3c'}; 
                          border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}"></i>
                    </div>
                </div>
                <div>
                    <strong class="d-block" style="color: #333;">${type === 'success' ? 'Sukses!' : 'Perhatian!'}</strong>
                    <span style="color: #666;">${message}</span>
                </div>
                <button type="button" class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                notification.style.transition = 'all 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }
    
    // Add keyframe animation for notifications
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection