@extends('layouts.app')

@section('title', 'Kontak - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Hubungi Kami<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kami siap mendengarkan dan memberikan yang terbaik untuk pengalaman kuliner Anda.
                            Jangan ragu untuk menghubungi kami untuk informasi, reservasi, atau masukan.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-headset me-1"></i> 24/7 Support
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-clock me-1"></i> Respons Cepat
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
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="modern-card animate-fade-in">
                        <div class="p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3" style="color: var(--primary-red); font-size: 2rem;">
                                    <i class="fas fa-comment-dots"></i>
                                </div>
                                <div>
                                    <h3 class="mb-0 fw-bold" style="color: var(--dark-charcoal);">Kirim Pesan</h3>
                                    <p class="text-muted mb-0">Kami akan membalas dalam 1x24 jam</p>
                                </div>
                            </div>
                            
                            <form action="#" method="POST" id="contactForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Nama Lengkap *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                                <i class="fas fa-user" style="color: var(--primary-red);"></i>
                                            </span>
                                            <input type="text" class="form-control" id="name" name="name" required 
                                                   placeholder="Masukkan nama lengkap Anda">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Email *
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                                <i class="fas fa-envelope" style="color: var(--primary-red);"></i>
                                            </span>
                                            <input type="email" class="form-control" id="email" name="email" required 
                                                   placeholder="contoh@email.com">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="subject" class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                        Subjek *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                            <i class="fas fa-tag" style="color: var(--primary-red);"></i>
                                        </span>
                                        <input type="text" class="form-control" id="subject" name="subject" required 
                                               placeholder="Tentang apa pesan Anda?">
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="message" class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                        Pesan *
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text align-items-start" style="background: rgba(180, 34, 34, 0.05); border-color: #e0e0e0;">
                                            <i class="fas fa-edit" style="color: var(--primary-red);"></i>
                                        </span>
                                        <textarea class="form-control" id="message" name="message" rows="5" required 
                                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                                    </div>
                                    <div class="text-end mt-2">
                                        <small class="text-muted" id="charCount">0/500 karakter</small>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-between mt-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                        <label class="form-check-label" for="newsletter" style="color: var(--warm-brown);">
                                            Berlangganan newsletter kami
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary px-5 py-3">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info Sidebar -->
                <div class="col-lg-4">
                    <div class="modern-card mb-4 animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: var(--primary-red); font-size: 1.5rem;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h4 class="mb-0" style="color: var(--dark-charcoal);">Alamat</h4>
                            </div>
                            <p class="mb-0" style="color: var(--warm-brown); line-height: 1.6;">
                                JL Baye Kuliner No. 123<br>
                                Jakarta, Indonesia 10110
                            </p>
                        </div>
                    </div>
                    
                    <div class="modern-card mb-4 animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: var(--primary-red); font-size: 1.5rem;">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <h4 class="mb-0" style="color: var(--dark-charcoal);">Telepon</h4>
                            </div>
                            <p class="mb-2" style="color: var(--dark-charcoal); font-size: 1.1rem; font-weight: 500;">
                                (021) 1234-5678
                            </p>
                            <small style="color: var(--warm-brown);">Customer Service</small>
                        </div>
                    </div>
                    
                    <div class="modern-card mb-4 animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: var(--primary-red); font-size: 1.5rem;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h4 class="mb-0" style="color: var(--dark-charcoal);">Email</h4>
                            </div>
                            <p class="mb-2" style="color: var(--dark-charcoal); font-size: 1.1rem; font-weight: 500;">
                                info@jossgandos.com
                            </p>
                            <small style="color: var(--warm-brown);">Respon dalam 24 jam</small>
                        </div>
                    </div>
                    
                    <div class="modern-card animate-fade-in" style="animation-delay: 0.4s;">
                        <div class="p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: var(--primary-red); font-size: 1.5rem;">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4 class="mb-0" style="color: var(--dark-charcoal);">Jam Operasional</h4>
                            </div>
                            <div class="mb-3">
                                <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Setiap Hari</p>
                                <p class="mb-0" style="color: var(--warm-brown);">10:00 - 22:00 WIB</p>
                            </div>
                            <div class="pt-3 border-top">
                                <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Layanan Catering</p>
                                <p class="mb-0" style="color: var(--warm-brown);">08:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="mt-4 animate-fade-in" style="animation-delay: 0.5s;">
                        <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="social-btn d-flex align-items-center justify-content-center" 
                               style="width: 45px; height: 45px; background: #1877f2; color: white; border-radius: 10px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-btn d-flex align-items-center justify-content-center" 
                               style="width: 45px; height: 45px; background: #1da1f2; color: white; border-radius: 10px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-btn d-flex align-items-center justify-content-center" 
                               style="width: 45px; height: 45px; background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); color: white; border-radius: 10px;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-btn d-flex align-items-center justify-content-center" 
                               style="width: 45px; height: 45px; background: #ff0000; color: white; border-radius: 10px;">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="p-0" style="overflow: hidden; border-radius: 20px;">
                            <div class="p-4" style="background: rgba(180, 34, 34, 0.05); border-bottom: 1px solid rgba(0,0,0,0.05);">
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="color: var(--primary-red); font-size: 1.5rem;">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal);">Lokasi Kami</h4>
                                </div>
                            </div>
                            <div class="ratio ratio-16x9">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641914256999!5m2!1sen!2sus" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy">
                                </iframe>
                            </div>
                            <div class="p-4 text-center" style="background: rgba(180, 34, 34, 0.05);">
                                <p class="mb-0" style="color: var(--warm-brown);">
                                    <i class="fas fa-car me-1" style="color: var(--primary-red);"></i>
                                    Tersedia parkir luas • 
                                    <i class="fas fa-wheelchair me-1 ms-3" style="color: var(--primary-red);"></i>
                                    Akses disabilitas • 
                                    <i class="fas fa-wifi me-1 ms-3" style="color: var(--primary-red);"></i>
                                    Free WiFi
                                </p>
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
    .form-control:focus {
        border-color: var(--primary-red) !important;
        box-shadow: 0 0 0 0.25rem rgba(180, 34, 34, 0.25) !important;
    }
    
    .input-group-text {
        transition: all 0.3s ease;
    }
    
    .form-control:focus + .input-group-text {
        background: rgba(180, 34, 34, 0.1) !important;
    }
    
    .social-btn {
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
</style>
@endsection

@section('scripts')
<script>
    // Form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Validation
        let isValid = true;
        this.querySelectorAll('[required]').forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#e63946';
                isValid = false;
            } else {
                field.style.borderColor = '#2a9d8f';
            }
        });
        
        if (!isValid) {
            createNotification('error', 'Harap lengkapi semua field yang wajib diisi.');
            return;
        }
        
        // Show loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengirim...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Success
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i> Terkirim!';
            submitBtn.style.background = '#2a9d8f';
            
            // Show success message
            createNotification('success', 'Pesan Anda berhasil dikirim! Kami akan membalas dalam 1x24 jam.');
            
            // Reset form after 3 seconds
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = '';
                this.reset();
                document.getElementById('charCount').textContent = '0/500 karakter';
            }, 3000);
        }, 2000);
    });
    
    // Character counter for message
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
    
    // Real-time validation
    document.querySelectorAll('[required]').forEach(field => {
        field.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.style.borderColor = '#e63946';
            } else {
                this.style.borderColor = '#2a9d8f';
            }
        });
        
        field.addEventListener('focus', function() {
            this.style.borderColor = 'var(--primary-red)';
        });
    });
    
    // Notification function
    function createNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed top-0 end-0 m-4 shadow`;
        notification.style.zIndex = '9999';
        notification.style.borderRadius = '10px';
        notification.style.border = type === 'success' ? '2px solid #2a9d8f' : '2px solid #e63946';
        notification.style.background = 'white';
        notification.style.animation = 'slideInRight 0.3s ease-out';
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-3" 
                   style="color: ${type === 'success' ? '#2a9d8f' : '#e63946'}; font-size: 1.2rem;"></i>
                <div>
                    <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
                </div>
                <button type="button" class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
            </div>
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                notification.style.transition = 'all 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 5000);
    }
    
    // Add CSS animations
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