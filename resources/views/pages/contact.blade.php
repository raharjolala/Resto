@extends('layouts.app')

@section('title', 'Kontak - JOSS GANDOS')

@section('meta-description', 'Hubungi JOSS GANDOS untuk reservasi, catering, atau informasi lainnya. Kami siap melayani Anda')

@section('content')
    <!-- Hero Section -->
    <section class="contact-hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                url('https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title display-3 fw-bold text-white mb-4">
                            Hubungi <span class="text-warning">Kami</span>
                        </h1>
                        <p class="hero-subtitle lead text-light mb-5" style="font-size: 1.25rem;">
                            Kami selalu siap mendengarkan dan membantu Anda. 
                            Hubungi kami untuk informasi, reservasi, atau masukan berharga.
                        </p>
                        <div class="d-flex flex-wrap gap-3 justify-content-center">
                            <span class="badge px-4 py-3" style="background: rgba(255, 204, 0, 0.2); color: #ffcc00; border-radius: 25px; font-size: 1rem;">
                                <i class="fas fa-headset me-2"></i> Support 24/7
                            </span>
                            <span class="badge px-4 py-3" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 25px; font-size: 1rem;">
                                <i class="fas fa-clock me-2"></i> Response < 2 Jam
                            </span>
                            <span class="badge px-4 py-3" style="background: rgba(255, 204, 0, 0.2); color: #ffcc00; border-radius: 25px; font-size: 1rem;">
                                <i class="fas fa-envelope me-2"></i> Email Responsif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="section-padding bg-light">
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
                                                <i class="fas fa-user text-muted"></i>
                                            </span>
                                            <input type="text" class="form-control border-start-0" 
                                                   id="name" name="name" required 
                                                   placeholder="Nama lengkap Anda">
                                        </div>
                                        <div class="invalid-feedback">Harap isi nama lengkap</div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold mb-2" style="color: #333;">
                                            <i class="fas fa-envelope me-2" style="color: #b42222;"></i>Email *
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </span>
                                            <input type="email" class="form-control border-start-0" 
                                                   id="email" name="email" required 
                                                   placeholder="email@contoh.com">
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
                                                <i class="fas fa-phone text-muted"></i>
                                            </span>
                                            <input type="tel" class="form-control border-start-0" 
                                                   id="phone" name="phone" required 
                                                   placeholder="0812-3456-7890">
                                        </div>
                                        <div class="invalid-feedback">Harap isi nomor telepon</div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold mb-2" style="color: #333;">
                                            <i class="fas fa-tag me-2" style="color: #b42222;"></i>Subjek *
                                        </label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text bg-white border-end-0">
                                                <i class="fas fa-tag text-muted"></i>
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
                                            <i class="fas fa-edit text-muted"></i>
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
                                            Jl. Jemursari No. 123, Surabaya
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
                                            10:00 - 22:00 WIB (Setiap Hari)
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
                                            info@jossgandos.com
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
                                <a href="#" class="social-icon" style="background: #1877f2;">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-icon" style="background: #e4405f;">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-icon" style="background: #1da1f2;">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-icon" style="background: #0a66c2;">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
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
                                        Jl. Jemursari No. 123, Surabaya
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <a href="https://maps.google.com/?q=Jl+Jemursari+No.+123+Surabaya" 
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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jemursari%2C%20Kec.%20Wonocolo%2C%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid" 
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
            <div class="row mb-5">
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
            <div class="row g-4 mb-5">
                <!-- GoFood -->
                <div class="col-md-4">
                    <div class="delivery-app-card text-center animate-fade-in">
                        <div class="delivery-app-logo mb-4">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjnA6euTxY_3bBbvCPE1E_j98O3fWg1WF2IbWmr4cNbt9VsFiY_Fwq7j9TnutdF8KDblPyno9HNOidxExb_pwbQtuMOT8Cdyc7KD01WhRtDlA82X4JybUimnGfUFdoBV9jsTN_eZEzbj37RlpPfXW2InMsaNsEf8bwd4ePUCRclJX9pRf11C-tHNTiZ/w380/GKL20_GoFood%20-%20Koleksilogo.com.jpg" 
                                 alt="GoFood" 
                                 class="img-fluid" 
                                 style="max-height: 50px;">
                        </div>
                        <div class="delivery-app-content">
                            <h4 class="fw-bold mb-3" style="color: #333;">GoFood</h4>
                            <p class="text-muted mb-4">
                                Pesan melalui aplikasi GoFood untuk pengiriman cepat dan mudah
                            </p>
                            <a href="https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17" 
                               target="_blank"
                               class="btn w-100 py-3 fw-bold delivery-btn"
                               style="background: linear-gradient(135deg, #b42222, #e63946);">
                                <i class="fas fa-external-link-alt me-2"></i> Buka di GoFood
                            </a>
                        </div>
                    </div>
                </div>

                <!-- GrabFood -->
                <div class="col-md-4">
                    <div class="delivery-app-card text-center animate-fade-in">
                        <div class="delivery-app-logo mb-4">
                            <img src="https://seduhteh.wordpress.com/wp-content/uploads/2019/11/grabfood-vector-logo.png" 
                                 alt="GrabFood" 
                                 class="img-fluid" 
                                 style="max-height: 50px;">
                        </div>
                        <div class="delivery-app-content">
                            <h4 class="fw-bold mb-3" style="color: #333;">GrabFood</h4>
                            <p class="text-muted mb-4">
                                Pesan melalui aplikasi GrabFood dengan berbagai pilihan menu lengkap
                            </p>
                            <a href="https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d?sourceID=20251119_121557_7BFCA7D892634AB597F132E1189364C5_MEXMPS" 
                               target="_blank"
                               class="btn w-100 py-3 fw-bold delivery-btn"
                               style="background: linear-gradient(135deg, #b42222, #e63946);">
                                <i class="fas fa-external-link-alt me-2"></i> Buka di GrabFood
                            </a>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Order dengan Admin -->
                <div class="col-md-4">
                    <div class="delivery-app-card text-center animate-fade-in" style="height: auto;">
                        <div class="delivery-app-logo mb-4">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2048px-WhatsApp.svg.png" 
                                 alt="WhatsApp" 
                                 class="img-fluid" 
                                 style="max-height: 50px;">
                        </div>
                        <div class="delivery-app-content">
                            <h4 class="fw-bold mb-3" style="color: #333;">WhatsApp Order</h4>
                            <p class="text-muted mb-4">
                                Pesan langsung via WhatsApp untuk konsultasi menu khusus
                            </p>
                            
                            <!-- WhatsApp Admin Contacts -->
                            <div class="whatsapp-admin-list mb-4">
                                <div class="whatsapp-admin-item d-flex align-items-center mb-3 p-3" style="background: #f8f9fa; border-radius: 10px;">
                                    <div class="admin-avatar me-3">
                                        <div class="avatar-circle" style="width: 40px; height: 40px; background: #25D366; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="admin-info flex-grow-1">
                                        <h6 class="fw-bold mb-1" style="color: #333;">Admin 1</h6>
                                        <p class="mb-0 text-muted" style="font-size: 0.9rem;">0896-9907-1599</p>
                                    </div>
                                    <div class="admin-action">
                                        <a href="https://wa.me/6289699071599?text=Halo%20Admin%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                                           target="_blank"
                                           class="btn btn-sm whatsapp-btn"
                                           style="background: #25D366; color: white; border-radius: 8px; padding: 5px 12px;">
                                            <i class="fab fa-whatsapp me-1"></i> Chat
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="whatsapp-admin-item d-flex align-items-center p-3" style="background: #f8f9fa; border-radius: 10px;">
                                    <div class="admin-avatar me-3">
                                        <div class="avatar-circle" style="width: 40px; height: 40px; background: #128C7E; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="admin-info flex-grow-1">
                                        <h6 class="fw-bold mb-1" style="color: #333;">Admin 2</h6>
                                        <p class="mb-0 text-muted" style="font-size: 0.9rem;">0895-3268-2495</p>
                                    </div>
                                    <div class="admin-action">
                                        <a href="https://wa.me/6289532682495?text=Halo%20Admin%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                                           target="_blank"
                                           class="btn btn-sm whatsapp-btn"
                                           style="background: #25D366; color: white; border-radius: 8px; padding: 5px 12px;">
                                            <i class="fab fa-whatsapp me-1"></i> Chat
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="whatsapp-tips mb-4 p-3" style="background: #f0fff4; border-radius: 10px; border-left: 4px solid #25D366;">
                                <p class="mb-0 text-muted" style="font-size: 0.85rem;">
                                    <i class="fas fa-lightbulb me-1" style="color: #25D366;"></i>
                                    <strong>Tips:</strong> Sertakan alamat lengkap dan nomor telepon saat pesan
                                </p>
                            </div>
                            
                            <a href="https://wa.me/6289699071599?text=Halo%20Admin%20JOSS%20GANDOS,%20saya%20ingin%20memesan%20delivery" 
                               target="_blank"
                               class="btn w-100 py-3 fw-bold delivery-btn"
                               style="background: linear-gradient(135deg, #b42222, #e63946);">
                                <i class="fab fa-whatsapp me-2"></i> Pesan via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Delivery Information -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto">
                    <div class="delivery-info-grid animate-fade-in">
                        <div class="row g-4">
                            <div class="col-md-3 col-6">
                                <div class="delivery-info-item text-center p-3">
                                    <div class="info-icon mb-3">
                                        <div style="width: 60px; height: 60px; background: #b42222; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; margin: 0 auto;">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-2">Waktu Pengiriman</h6>
                                    <p class="mb-0 text-muted">45-60 menit</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="delivery-info-item text-center p-3">
                                    <div class="info-icon mb-3">
                                        <div style="width: 60px; height: 60px; background: #b42222; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; margin: 0 auto;">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-2">Area Pengiriman</h6>
                                    <p class="mb-0 text-muted">Seluruh Surabaya</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="delivery-info-item text-center p-3">
                                    <div class="info-icon mb-3">
                                        <div style="width: 60px; height: 60px; background: #b42222; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; margin: 0 auto;">
                                            <i class="fas fa-money-bill-wave"></i>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-2">Min. Pembelian</h6>
                                    <p class="mb-0 text-muted">Rp 25.000</p>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="delivery-info-item text-center p-3">
                                    <div class="info-icon mb-3">
                                        <div style="width: 60px; height: 60px; background: #b42222; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; margin: 0 auto;">
                                            <i class="fas fa-truck"></i>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold mb-2">Ongkir</h6>
                                    <p class="mb-0 text-muted">Mulai Rp 10.000</p>
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
    /* Custom Styles for Contact Page */
    :root {
        --primary-red: #b42222;
        --accent-gold: #ffcc00;
        --dark-charcoal: #333;
        --light-gray: #f8f9fa;
    }
    
    /* Hero Section */
    .contact-hero-section {
        padding: 120px 0;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .contact-hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(180, 34, 34, 0.3), rgba(255, 204, 0, 0.3));
        z-index: 1;
    }
    
    .contact-hero-section .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .section-padding {
        padding: 80px 0;
    }
    
    /* Contact Form Card */
    .contact-form-card {
        background: white;
        border: 1px solid rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .contact-form-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    
    .form-icon-wrapper {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-red), #e63946);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
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
    
    /* Delivery App Cards */
    .delivery-app-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
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
    
    .delivery-btn {
        color: white;
        border: none;
        border-radius: 12px;
        transition: all 0.3s ease;
        margin-top: auto;
    }
    
    .delivery-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(180, 34, 34, 0.3);
        color: white;
    }
    
    /* WhatsApp Admin Styles dalam Kartu */
    .whatsapp-admin-item {
        transition: all 0.3s ease;
    }
    
    .whatsapp-admin-item:hover {
        transform: translateX(5px);
        background: #e9ecef !important;
    }
    
    .whatsapp-btn {
        transition: all 0.3s ease;
        font-size: 0.85rem;
    }
    
    .whatsapp-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        color: white;
    }
    
    /* Delivery Info Items */
    .delivery-info-item {
        background: white;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .delivery-info-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: var(--primary-red);
    }
    
    .delivery-info-item .info-icon {
        transition: transform 0.3s ease;
    }
    
    .delivery-info-item:hover .info-icon div {
        background: linear-gradient(135deg, #b42222, #e63946);
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
    
    /* Responsive */
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
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .delivery-info-item {
            margin-bottom: 15px;
            padding: 20px 15px;
        }
        
        .delivery-info-item .info-icon div {
            width: 50px;
            height: 50px;
            font-size: 20px;
        }
        
        .whatsapp-admin-item {
            padding: 15px !important;
        }
        
        .admin-avatar .avatar-circle {
            width: 35px !important;
            height: 35px !important;
        }
    }
    
    @media (max-width: 576px) {
        .delivery-app-card {
            padding: 15px;
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
        
        .whatsapp-admin-item {
            padding: 12px !important;
        }
        
        .admin-info h6 {
            font-size: 0.9rem;
        }
        
        .admin-info p {
            font-size: 0.8rem;
        }
        
        .whatsapp-btn {
            padding: 4px 10px !important;
            font-size: 0.8rem;
        }
        
        .delivery-info-item h6 {
            font-size: 0.9rem;
        }
        
        .delivery-info-item p {
            font-size: 0.8rem;
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