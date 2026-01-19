@extends('layouts.app')

@section('title', 'Kontak - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="resto-hero-section" style="height: 70vh; margin-top: 76px; background: linear-gradient(rgba(42, 42, 42, 0.85), rgba(42, 42, 42, 0.9)), url('https://images.unsplash.com/photo-1560185007-cde436f6a4d0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8">
                    <div class="hero-content text-white">
                        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
                            Hubungi<br>
                            <span class="text-warning">JOSS GANDOS</span>
                        </h1>
                        <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.9;">
                            Kami siap melayani Anda dengan sepenuh hati dan memberikan pengalaman terbaik.
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-headset me-1"></i> 24/7 Support
                            </span>
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-clock me-1"></i> Respons Cepat
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="resto-section-padding" style="padding: 5rem 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3" style="color: #d4a574; font-size: 2rem;">
                                    <i class="fas fa-comment-dots"></i>
                                </div>
                                <h3 class="mb-0 fw-bold" style="color: #2a2a2a;">Kirim Pesan</h3>
                            </div>
                            <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label fw-semibold" style="color: #555;">Nama Lengkap *</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                <i class="fas fa-user" style="color: #d4a574;"></i>
                                            </span>
                                            <input type="text" class="form-control" id="name" name="name" required 
                                                   style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;"
                                                   placeholder="Masukkan nama lengkap Anda">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label fw-semibold" style="color: #555;">Email *</label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                <i class="fas fa-envelope" style="color: #d4a574;"></i>
                                            </span>
                                            <input type="email" class="form-control" id="email" name="email" required 
                                                   style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;"
                                                   placeholder="contoh@email.com">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="subject" class="form-label fw-semibold" style="color: #555;">Subjek *</label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                            <i class="fas fa-tag" style="color: #d4a574;"></i>
                                        </span>
                                        <input type="text" class="form-control" id="subject" name="subject" required 
                                               style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;"
                                               placeholder="Tentang apa pesan Anda?">
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="message" class="form-label fw-semibold" style="color: #555;">Pesan *</label>
                                    <div class="input-group">
                                        <span class="input-group-text align-items-start" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0; padding-top: 14px;">
                                            <i class="fas fa-edit" style="color: #d4a574;"></i>
                                        </span>
                                        <textarea class="form-control" id="message" name="message" rows="5" required 
                                                  style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0; resize: none;"
                                                  placeholder="Tulis pesan Anda di sini..."></textarea>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" checked>
                                        <label class="form-check-label" for="newsletter" style="color: #666; font-size: 0.9rem;">
                                            Berlangganan newsletter kami
                                        </label>
                                    </div>
                                    <button type="submit" class="btn px-4 py-3" 
                                            style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border: none; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                                        <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <!-- Contact Info Cards -->
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #2a2a2a, #1a1a1a);">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: #d4a574; font-size: 1.5rem;">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h4 class="mb-0" style="color: white;">Alamat</h4>
                            </div>
                            <p class="mb-0" style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                                JL Baye Kuliner No. 123<br>
                                Jakarta, Indonesia 10110
                            </p>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: #d4a574; font-size: 1.5rem;">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <h4 class="mb-0" style="color: #2a2a2a;">Telepon</h4>
                            </div>
                            <p class="mb-0" style="color: #555; font-size: 1.1rem; font-weight: 500;">
                                (021) 1234-5678
                            </p>
                            <small style="color: #888;">Customer Service</small>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-lg mb-4" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: #d4a574; font-size: 1.5rem;">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h4 class="mb-0" style="color: #2a2a2a;">Email</h4>
                            </div>
                            <p class="mb-0" style="color: #555; font-size: 1.1rem; font-weight: 500;">
                                info@jossgandos.com
                            </p>
                            <small style="color: #888;">Respon dalam 24 jam</small>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3" style="color: #d4a574; font-size: 1.5rem;">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4 class="mb-0" style="color: #2a2a2a;">Jam Operasional</h4>
                            </div>
                            <div class="mb-2">
                                <p class="mb-1 fw-semibold" style="color: #2a2a2a;">Setiap Hari</p>
                                <p class="mb-0" style="color: #555;">10:00 - 22:00 WIB</p>
                            </div>
                            <div class="mt-3 pt-3 border-top">
                                <p class="mb-1 fw-semibold" style="color: #2a2a2a;">Layanan Catering</p>
                                <p class="mb-0" style="color: #555;">08:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="mt-4">
                        <h5 class="fw-bold mb-3" style="color: #2a2a2a;">Ikuti Kami</h5>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn px-3 py-2" 
                               style="background: linear-gradient(135deg, #1877f2, #0d5cb6); color: white; border-radius: 10px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn px-3 py-2" 
                               style="background: linear-gradient(135deg, #1da1f2, #0c85d0); color: white; border-radius: 10px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="btn px-3 py-2" 
                               style="background: linear-gradient(135deg, #e1306c, #c13584); color: white; border-radius: 10px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="btn px-3 py-2" 
                               style="background: linear-gradient(135deg, #ff0000, #cc0000); color: white; border-radius: 10px; width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center p-4" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-bottom: 1px solid #eee;">
                                <div class="me-3" style="color: #d4a574; font-size: 1.5rem;">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <h4 class="mb-0 fw-bold" style="color: #2a2a2a;">Lokasi Kami</h4>
                            </div>
                            <div class="ratio ratio-16x9">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641914256999!5m2!1sen!2sus" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy">
                                </iframe>
                            </div>
                            <div class="p-4 border-top">
                                <p class="mb-0 text-center" style="color: #666;">
                                    <i class="fas fa-car me-1" style="color: #d4a574;"></i>
                                    Tersedia parkir luas • 
                                    <i class="fas fa-wheelchair me-1 ms-3" style="color: #d4a574;"></i>
                                    Akses disabilitas • 
                                    <i class="fas fa-wifi me-1 ms-3" style="color: #d4a574;"></i>
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
    .resto-hero-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, transparent, #f8f5f2);
        z-index: 1;
    }
    
    .form-control:focus {
        border-color: #d4a574 !important;
        box-shadow: 0 0 0 0.25rem rgba(212, 165, 116, 0.25) !important;
    }
    
    .card {
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .input-group-text {
        transition: all 0.3s ease;
    }
    
    .form-control:focus + .input-group-text {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.2), rgba(212, 165, 116, 0.1)) !important;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
    }
    
    .social-btn {
        transition: all 0.3s ease;
    }
    
    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    .btn-submit:hover {
        animation: pulse 0.5s ease;
    }
</style>
@endsection

@section('scripts')
<script>
    // Form submission animation
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Add loading animation
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Mengirim...';
        submitBtn.disabled = true;
        
        // Simulate submission (remove in production)
        setTimeout(() => {
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i> Terkirim!';
            submitBtn.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
            
            // Show success message
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success mt-3';
            alertDiv.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                Pesan Anda berhasil dikirim! Kami akan membalas dalam 1x24 jam.
            `;
            this.parentNode.insertBefore(alertDiv, this.nextSibling);
            
            // Reset form after 3 seconds
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = 'linear-gradient(135deg, #d4a574, #b38b5d)';
                this.reset();
                alertDiv.remove();
            }, 3000);
        }, 2000);
    });
    
    // Character counter for message
    const messageTextarea = document.getElementById('message');
    const counter = document.createElement('div');
    counter.className = 'text-end mt-1';
    counter.style.fontSize = '0.85rem';
    counter.style.color = '#888';
    messageTextarea.parentNode.appendChild(counter);
    
    function updateCounter() {
        const length = messageTextarea.value.length;
        counter.textContent = `${length}/500 karakter`;
        
        if (length > 450) {
            counter.style.color = '#e63946';
        } else if (length > 400) {
            counter.style.color = '#f8961e';
        } else {
            counter.style.color = '#888';
        }
    }
    
    messageTextarea.addEventListener('input', updateCounter);
    updateCounter();
    
    // Form validation
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '' && this.hasAttribute('required')) {
                this.style.borderColor = '#e63946';
            } else {
                this.style.borderColor = '#e0e0e0';
            }
        });
        
        input.addEventListener('focus', function() {
            this.style.borderColor = '#d4a574';
        });
    });
</script>
@endsection