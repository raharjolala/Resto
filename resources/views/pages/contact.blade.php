@extends('layouts.app')

@section('title', 'Kontak - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.9), rgba(44, 44, 44, 0.95)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Hubungi<br>
                            <span>Kami</span>
                        </h1>
                        <p class="hero-subtitle">
                            Kami selalu siap mendengarkan dan membantu Anda. 
                            Hubungi kami untuk informasi, reservasi, atau masukan berharga.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-headset me-1"></i> 24/7 Support
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-clock me-1"></i> Response < 2h
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
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
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
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
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
                                    <div class="text-end mt-2">
                                        <small class="text-muted" id="charCount">0/500 karakter</small>
                                    </div>
                                </div>
                                
                                <div class="mt-5">
                                    <div class="d-flex align-items-center justify-content-between">
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <!-- Contact Cards -->
                    <div class="modern-card mb-4">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Alamat</h4>
                                    <p class="mb-2" style="color: var(--warm-brown); line-height: 1.6;">
                                        JL Baye Kuliner No. 123<br>
                                        Jakarta, Indonesia 10110
                                    </p>
                                    <a href="#map" class="text-decoration-none" style="color: var(--primary-red);">
                                        <i class="fas fa-directions me-1"></i> Lihat Peta
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modern-card mb-4">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Telepon</h4>
                                    <div class="mb-3">
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Customer Service</p>
                                        <p class="mb-0" style="color: var(--warm-brown);">(021) 1234-5678</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">WhatsApp</p>
                                        <p class="mb-0" style="color: var(--warm-brown);">0812-3456-7890</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modern-card mb-4">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                border-radius: 50%; display: flex; align-items-center: center; justify-content: center; color: white;">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Email</h4>
                                    <div class="mb-3">
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Informasi Umum</p>
                                        <p class="mb-0" style="color: var(--warm-brown);">info@jossgandos.com</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Reservasi</p>
                                        <p class="mb-0" style="color: var(--warm-brown);">reservation@jossgandos.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modern-card">
                        <div class="p-4">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="mb-2" style="color: var(--dark-charcoal);">Jam Operasional</h4>
                                    <div class="mb-3">
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Restoran</p>
                                        <p class="mb-0" style="color: var(--warm-brown);">10:00 - 22:00 WIB</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 fw-semibold" style="color: var(--dark-charcoal);">Customer Service</p>
                                        <p class="mb-0" style="color: var(--warm-brown);">08:00 - 20:00 WIB</p>
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
                    <div class="section-title">
                        <h3>Tim & Departemen</h3>
                        <p>Hubungi departemen yang sesuai dengan kebutuhan Anda</p>
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
                        
                        @foreach($departments as $dept)
                            <div class="col-lg-3 col-md-6">
                                <div class="modern-card h-100">
                                    <div class="p-4 text-center">
                                        <div class="mb-3">
                                            <div style="width: 60px; height: 60px; background: linear-gradient(135deg, rgba(180, 34, 34, 0.1), rgba(212, 161, 23, 0.1)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                                <i class="{{ $dept['icon'] }} fa-2x" style="color: var(--primary-red);"></i>
                                            </div>
                                        </div>
                                        <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">{{ $dept['title'] }}</h5>
                                        <div class="mb-2">
                                            <small class="text-muted d-block mb-1">Email</small>
                                            <small style="color: var(--warm-brown);">{{ $dept['email'] }}</small>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block mb-1">Telepon</small>
                                            <small style="color: var(--warm-brown);">{{ $dept['phone'] }}</small>
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
                    <div class="modern-card">
                        <div class="p-0" style="overflow: hidden; border-radius: 20px;">
                            <div class="p-4" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-map-marked-alt fa-2x text-white"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white mb-0 fw-bold">Lokasi Kami</h4>
                                            <p class="text-white mb-0 opacity-90">Temukan jalan menuju restoran kami</p>
                                        </div>
                                    </div>
                                    <a href="https://maps.google.com/?q=JL+Baye+Kuliner+No.+123+Jakarta" 
                                       target="_blank" 
                                       class="btn btn-light">
                                        <i class="fas fa-directions me-2"></i> Petunjuk Arah
                                    </a>
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
                            <div class="p-4" style="background: rgba(180, 34, 34, 0.05);">
                                <div class="row">
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-car me-3" style="color: var(--primary-red);"></i>
                                            <div>
                                                <small class="text-muted d-block">Parkir</small>
                                                <small style="color: var(--warm-brown);">Tersedia parkir luas</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mb-md-0">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-wheelchair me-3" style="color: var(--primary-red);"></i>
                                            <div>
                                                <small class="text-muted d-block">Aksesibilitas</small>
                                                <small style="color: var(--warm-brown);">Ramp dan lift tersedia</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-train me-3" style="color: var(--primary-red);"></i>
                                            <div>
                                                <small class="text-muted d-block">Transportasi</small>
                                                <small style="color: var(--warm-brown);">Dekat stasiun MRT</small>
                                            </div>
                                        </div>
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
    .input-group-text {
        transition: all 0.3s ease;
        border-right: none;
    }
    
    .form-control {
        border-left: none;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(180, 34, 34, 0.1);
        border-color: var(--primary-red);
    }
    
    .form-control:focus + .input-group-text {
        border-color: var(--primary-red);
        background: rgba(180, 34, 34, 0.1);
    }
    
    .modern-card:hover {
        transform: translateY(-5px);
    }
    
    .department-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .department-card:hover {
        border-color: rgba(180, 34, 34, 0.2);
        transform: translateY(-5px);
    }
</style>
@endsection

@section('scripts')
<script>
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
    
    // Form validation and submission
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
            createNotification('success', 
                'Pesan Anda berhasil dikirim! Tim kami akan membalas dalam 1x24 jam.');
            
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
    
    function createNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = `alert position-fixed top-0 end-0 m-4 shadow`;
        notification.style.zIndex = '9999';
        notification.style.borderRadius = '15px';
        notification.style.border = '2px solid var(--primary-red)';
        notification.style.background = 'white';
        notification.style.animation = 'slideInRight 0.3s ease-out';
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <div style="width: 40px; height: 40px; background: ${type === 'success' ? '#2a9d8f' : '#e63946'}; 
                                border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}"></i>
                    </div>
                </div>
                <div class="flex-grow-1">
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
</script>
@endsection