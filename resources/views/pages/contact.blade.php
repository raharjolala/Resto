@extends('layouts.app')

@section('title', 'Kontak - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), 
                url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Hubungi<br>
                            <span class="highlight">Kami</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kami selalu siap mendengarkan dan membantu Anda. 
                            Hubungi kami untuk informasi, reservasi, atau masukan berharga.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-headset me-1"></i> Support 24/7
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-clock me-1"></i> Response < 2h
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-envelope me-1"></i> Email Responsif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="modern-card animate-fade-in">
                        <div class="p-4 p-lg-5">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div style="width: 50px; height: 50px; 
                                                  background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                  border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fas fa-comment-dots"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="fw-bold mb-1" style="color: var(--dark-charcoal);">Kirim Pesan</h3>
                                        <p class="text-muted mb-0">Tim kami akan membalas dalam 1x24 jam</p>
                                    </div>
                                </div>
                            </div>
                            
                            <form id="contactForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Nama Lengkap *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                                <i class="fas fa-user" style="color: var(--primary-red);"></i>
                                            </span>
                                            <input type="text" class="form-control" id="name" name="name" required 
                                                   placeholder="Nama lengkap Anda">
                                        </div>
                                        <div class="invalid-feedback">Harap isi nama lengkap</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Email *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                                <i class="fas fa-envelope" style="color: var(--primary-red);"></i>
                                            </span>
                                            <input type="email" class="form-control" id="email" name="email" required 
                                                   placeholder="email@contoh.com">
                                        </div>
                                        <div class="invalid-feedback">Harap isi email yang valid</div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Telepon *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                                <i class="fas fa-phone" style="color: var(--primary-red);"></i>
                                            </span>
                                            <input type="tel" class="form-control" id="phone" name="phone" required 
                                                   placeholder="0812-3456-7890">
                                        </div>
                                        <div class="invalid-feedback">Harap isi nomor telepon</div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Subjek *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                                <i class="fas fa-tag" style="color: var(--primary-red);"></i>
                                            </span>
                                            <select class="form-select" id="subject" name="subject" required>
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
                                    <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                        Pesan *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text align-items-start" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0; padding-top: 14px;">
                                            <i class="fas fa-edit" style="color: var(--primary-red);"></i>
                                        </span>
                                        <textarea class="form-control" id="message" name="message" rows="6" required 
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
                                    <button type="submit" class="btn btn-primary btn-lg w-100 py-3">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <!-- Contact Cards -->
                    <div class="modern-card mb-4 animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; 
                                              background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                              border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Alamat</h4>
                                    <p class="mb-2 text-muted" style="line-height: 1.6;">
                                        Jl. Baye Kuliner No. 123<br>
                                        Jakarta Selatan, Indonesia 10110
                                    </p>
                                    <a href="#map" class="text-decoration-none" style="color: var(--primary-red);">
                                        <i class="fas fa-directions me-1"></i> Lihat Peta
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modern-card mb-4 animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; 
                                              background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                              border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Telepon & WhatsApp</h4>
                                    <div class="mb-3">
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Customer Service</p>
                                        <p class="mb-0 text-muted">(021) 1234-5678</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">WhatsApp</p>
                                        <p class="mb-0 text-muted">0812-3456-7890</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modern-card mb-4 animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; 
                                              background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                              border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Email</h4>
                                    <div class="mb-3">
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Informasi Umum</p>
                                        <p class="mb-0 text-muted">info@jossgandos.com</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Reservasi</p>
                                        <p class="mb-0 text-muted">reservation@jossgandos.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modern-card animate-fade-in" style="animation-delay: 0.4s;">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; 
                                              background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                              border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Jam Operasional</h4>
                                    <div class="mb-3">
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Restoran</p>
                                        <p class="mb-0 text-muted">10:00 - 22:00 WIB (Setiap Hari)</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Catering</p>
                                        <p class="mb-0 text-muted">08:00 - 20:00 WIB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Departments -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="section-title animate-fade-in">
                        <h2>Tim & Departemen</h2>
                        <p class="text-muted mt-3">Hubungi departemen yang sesuai dengan kebutuhan Anda</p>
                        <div class="title-decoration">
                            <span></span>
                            <i class="fas fa-users" style="color: var(--primary-red);"></i>
                            <span></span>
                        </div>
                    </div>
                    
                    <div class="row g-4">
                        @php
                            $departments = [
                                ['icon' => 'fas fa-calendar-alt', 'title' => 'Reservasi', 'email' => 'reservation@jossgandos.com', 'phone' => '021-1234-5678'],
                                ['icon' => 'fas fa-utensils', 'title' => 'Catering', 'email' => 'catering@jossgandos.com', 'phone' => '021-1234-5679'],
                                ['icon' => 'fas fa-users', 'title' => 'Event', 'email' => 'events@jossgandos.com', 'phone' => '021-1234-5680'],
                                ['icon' => 'fas fa-briefcase', 'title' => 'Karir', 'email' => 'career@jossgandos.com', 'phone' => '021-1234-5681'],
                            ];
                        @endphp
                        
                        @foreach($departments as $index => $dept)
                            <div class="col-lg-3 col-md-6">
                                <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                                    <div class="p-4 text-center">
                                        <div class="mb-3">
                                            <div style="width: 60px; height: 60px; 
                                                      background: linear-gradient(135deg, rgba(180, 34, 34, 0.1), rgba(212, 161, 23, 0.1)); 
                                                      border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                <i class="{{ $dept['icon'] }} fa-2x" style="color: var(--primary-red);"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">{{ $dept['title'] }}</h5>
                                        <div class="mb-2">
                                            <small class="text-muted d-block mb-1">Email</small>
                                            <small class="text-muted">{{ $dept['email'] }}</small>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block mb-1">Telepon</small>
                                            <small class="text-muted">{{ $dept['phone'] }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Map Section -->
            <div class="row mt-5" id="map">
                <div class="col-12">
                    <div class="modern-card animate-fade-in">
                        <div class="p-0" style="overflow: hidden; border-radius: 20px;">
                            <!-- Map Header -->
                            <div class="p-4" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <div class="me-3">
                                            <i class="fas fa-map-marked-alt fa-2x text-white"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white mb-0 fw-bold">Lokasi Kami</h4>
                                            <p class="text-white mb-0 opacity-90">Temukan jalan menuju restoran kami</p>
                                        </div>
                                    </div>
                                    <a href="https://maps.google.com/?q=Jl+Baye+Kuliner+No.+123+Jakarta" 
                                       target="_blank" 
                                       class="btn btn-light">
                                        <i class="fas fa-directions me-2"></i> Petunjuk Arah
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Map -->
                            <div class="ratio ratio-16x9">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641914256999!5m2!1sen!2sus" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy">
                                </iframe>
                            </div>
                            
                            <!-- Map Features -->
                            <div class="p-4" style="background: rgba(180, 34, 34, 0.05);">
                                <div class="row text-center">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="fas fa-car me-3" style="color: var(--primary-red);"></i>
                                            <div>
                                                <small class="text-muted d-block">Parkir</small>
                                                <small class="text-muted">Tersedia parkir luas</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="fas fa-wheelchair me-3" style="color: var(--primary-red);"></i>
                                            <div>
                                                <small class="text-muted d-block">Aksesibilitas</small>
                                                <small class="text-muted">Ramp dan lift tersedia</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="fas fa-train me-3" style="color: var(--primary-red);"></i>
                                            <div>
                                                <small class="text-muted d-block">Transportasi</small>
                                                <small class="text-muted">Dekat stasiun MRT</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card animate-fade-in">
                        <div class="p-5">
                            <div class="text-center mb-5">
                                <h3 class="fw-bold mb-3" style="color: var(--dark-charcoal);">Pertanyaan Umum</h3>
                                <p class="text-muted">Cari jawaban untuk pertanyaan yang sering diajukan</p>
                            </div>
                            
                            <div class="accordion" id="faqAccordion">
                                @php
                                    $faqs = [
                                        ['question' => 'Berapa lama waktu respon untuk email?', 'answer' => 'Kami membalas semua email dalam waktu 1x24 jam pada hari kerja. Untuk reservasi mendesak, harap hubungi via telepon atau WhatsApp.'],
                                        ['question' => 'Apakah tersedia layanan catering untuk acara?', 'answer' => 'Ya, kami menyediakan layanan catering untuk berbagai acara seperti ulang tahun, rapat perusahaan, dan pernikahan. Minimum order 50 porsi.'],
                                        ['question' => 'Bagaimana cara reservasi meja?', 'answer' => 'Anda dapat reservasi melalui: 1) Website kami 2) Telepon 3) WhatsApp 4) Datang langsung ke restoran.'],
                                        ['question' => 'Apakah tersedia parkir yang luas?', 'answer' => 'Ya, kami menyediakan area parkir yang luas dan aman untuk kendaraan roda dua dan empat.'],
                                        ['question' => 'Apakah restoran ramah untuk difabel?', 'answer' => 'Ya, kami memiliki fasilitas aksesibilitas lengkap termasuk ramp, lift, dan toilet khusus difabel.'],
                                    ];
                                @endphp
                                
                                @foreach($faqs as $index => $faq)
                                    <div class="accordion-item mb-3">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#faq{{ $index }}" style="background: rgba(180, 34, 34, 0.05);">
                                                <i class="fas fa-question-circle me-3" style="color: var(--primary-red);"></i>
                                                {{ $faq['question'] }}
                                            </button>
                                        </h2>
                                        <div id="faq{{ $index }}" class="accordion-collapse collapse" 
                                             data-bs-parent="#faqAccordion">
                                            <div class="accordion-body">
                                                {{ $faq['answer'] }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
    /* Form Styles */
    .input-group-text {
        transition: all 0.3s ease;
        border-right: none;
    }
    
    .form-control, .form-select {
        border-left: none;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.25rem rgba(180, 34, 34, 0.1);
        border-color: var(--primary-red);
    }
    
    .form-control:focus + .input-group-text,
    .form-select:focus + .input-group-text {
        border-color: var(--primary-red);
        background: rgba(180, 34, 34, 0.1);
    }
    
    /* Modern Card Hover Effects */
    .modern-card:hover {
        transform: translateY(-5px);
    }
    
    /* Department Card Hover */
    .department-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .department-card:hover {
        border-color: rgba(180, 34, 34, 0.2);
        transform: translateY(-5px);
    }
    
    /* Accordion Styles */
    .accordion-button:not(.collapsed) {
        background: rgba(180, 34, 34, 0.1) !important;
        color: var(--primary-red);
        box-shadow: none;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: var(--primary-red);
    }
    
    .accordion-body {
        background: rgba(180, 34, 34, 0.02);
    }
    
    /* Contact Card Styles */
    .contact-info-card {
        transition: all 0.3s ease;
    }
    
    .contact-info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }
    
    /* Map Styles */
    iframe {
        filter: grayscale(20%);
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Character counter
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
                charCount.style.color = '#f8961e';
            } else {
                charCount.style.color = 'var(--warm-brown)';
            }
        });
        
        // Form validation
        const contactForm = document.getElementById('contactForm');
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        
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
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengirim...';
            submitBtn.disabled = true;
            
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
        
        // Accordion animation
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                const icon = this.querySelector('i');
                if (this.classList.contains('collapsed')) {
                    icon.className = 'fas fa-chevron-down me-3';
                } else {
                    icon.className = 'fas fa-chevron-up me-3';
                }
            });
        });
        
        // Smooth scroll to map
        document.querySelectorAll('a[href="#map"]').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const mapSection = document.getElementById('map');
                if (mapSection) {
                    mapSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
    
    // Notification function
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = 'position-fixed top-0 end-0 m-4 p-3 shadow rounded';
        notification.style.cssText = `
            background: white;
            border-left: 4px solid ${type === 'success' ? '#2ecc71' : '#e74c3c'};
            z-index: 9999;
            max-width: 350px;
            animation: slideInRight 0.3s ease;
            font-family: 'Poppins', sans-serif;
            border-radius: 12px;
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
                    <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
                    <small class="text-muted">JOSS GANDOS</small>
                </div>
                <button type="button" class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 4 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                notification.style.transition = 'all 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 4000);
    }
</script>
@endsection