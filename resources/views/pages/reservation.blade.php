@extends('layouts.app')

@section('title', 'Reservasi - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="resto-hero-section" style="height: 70vh; margin-top: 76px; background: linear-gradient(rgba(42, 42, 42, 0.85), rgba(42, 42, 42, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8">
                    <div class="hero-content text-white">
                        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
                            Reservasi Meja<br>
                            <span class="text-warning">JOSS GANDOS</span>
                        </h1>
                        <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.9;">
                            Pesan meja Anda sekarang untuk pengalaman makan yang lebih baik dan terjamin
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-clock me-1"></i> Konfirmasi Cepat
                            </span>
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-check-circle me-1"></i> Gratis Reservasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation Form -->
    <section class="resto-section-padding" style="padding: 5rem 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg" style="border-radius: 25px; overflow: hidden;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <!-- Left Side - Form -->
                                <div class="col-lg-8">
                                    <div class="p-4 p-lg-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="me-3" style="color: #d4a574; font-size: 2rem;">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div>
                                                <h2 class="fw-bold mb-1" style="color: #2a2a2a;">RESERVASI MEJA</h2>
                                                <p class="text-muted mb-0">Isi formulir di bawah untuk memesan meja</p>
                                            </div>
                                        </div>
                                        
                                        <form action="{{ route('reservation.store') }}" method="POST" id="reservationForm">
                                            @csrf
                                            
                                            <!-- Personal Information -->
                                            <div class="mb-4">
                                                <h5 class="fw-bold mb-3" style="color: #2a2a2a;">
                                                    <i class="fas fa-user-circle me-2" style="color: #d4a574;"></i>
                                                    Informasi Pribadi
                                                </h5>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="customer_name" class="form-label fw-semibold" style="color: #555;">
                                                            Nama Lengkap *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                                <i class="fas fa-user" style="color: #d4a574;"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="customer_name" name="customer_name" required 
                                                                   style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;"
                                                                   placeholder="Masukkan nama lengkap Anda">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="email" class="form-label fw-semibold" style="color: #555;">
                                                            Email *
                                                        </label>
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
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="phone" class="form-label fw-semibold" style="color: #555;">
                                                            Nomor Telepon *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                                <i class="fas fa-phone" style="color: #d4a574;"></i>
                                                            </span>
                                                            <input type="tel" class="form-control" id="phone" name="phone" required 
                                                                   style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;"
                                                                   placeholder="0812-3456-7890">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="guest_count" class="form-label fw-semibold" style="color: #555;">
                                                            Jumlah Tamu *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                                <i class="fas fa-users" style="color: #d4a574;"></i>
                                                            </span>
                                                            <select class="form-control" id="guest_count" name="guest_count" required 
                                                                    style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;">
                                                                <option value="">Pilih jumlah tamu</option>
                                                                @for($i = 1; $i <= 10; $i++)
                                                                    <option value="{{ $i }}">{{ $i }} Orang</option>
                                                                @endfor
                                                                <option value="11">Lebih dari 10 Orang</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Reservation Details -->
                                            <div class="mb-4">
                                                <h5 class="fw-bold mb-3" style="color: #2a2a2a;">
                                                    <i class="fas fa-clock me-2" style="color: #d4a574;"></i>
                                                    Detail Reservasi
                                                </h5>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="reservation_date" class="form-label fw-semibold" style="color: #555;">
                                                            Tanggal Reservasi *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                                <i class="fas fa-calendar-day" style="color: #d4a574;"></i>
                                                            </span>
                                                            <input type="date" class="form-control" id="reservation_date" name="reservation_date" required 
                                                                   style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;"
                                                                   min="{{ date('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="reservation_time" class="form-label fw-semibold" style="color: #555;">
                                                            Waktu *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0;">
                                                                <i class="fas fa-clock" style="color: #d4a574;"></i>
                                                            </span>
                                                            <select class="form-control" id="reservation_time" name="reservation_time" required 
                                                                    style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0;">
                                                                <option value="">Pilih waktu kedatangan</option>
                                                                <option value="10:00">10:00</option>
                                                                <option value="11:00">11:00</option>
                                                                <option value="12:00">12:00</option>
                                                                <option value="13:00">13:00</option>
                                                                <option value="14:00">14:00</option>
                                                                <option value="15:00">15:00</option>
                                                                <option value="16:00">16:00</option>
                                                                <option value="17:00">17:00</option>
                                                                <option value="18:00">18:00</option>
                                                                <option value="19:00">19:00</option>
                                                                <option value="20:00">20:00</option>
                                                                <option value="21:00">21:00</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Special Requests -->
                                            <div class="mb-4">
                                                <h5 class="fw-bold mb-3" style="color: #2a2a2a;">
                                                    <i class="fas fa-star me-2" style="color: #d4a574;"></i>
                                                    Permintaan Khusus
                                                </h5>
                                                <div class="input-group">
                                                    <span class="input-group-text align-items-start" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-color: #e0e0e0; padding-top: 14px;">
                                                        <i class="fas fa-edit" style="color: #d4a574;"></i>
                                                    </span>
                                                    <textarea class="form-control" id="special_request" name="special_request" rows="4" 
                                                              style="border-color: #e0e0e0; padding: 12px; border-radius: 0 8px 8px 0; resize: none;"
                                                              placeholder="Contoh: Meja dekat jendela, ada anak kecil, alergi seafood, meja untuk ulang tahun, dll."></textarea>
                                                </div>
                                                <small class="text-muted">* Opsional</small>
                                            </div>
                                            
                                            <!-- Terms & Submit -->
                                            <div class="mb-4">
                                                <div class="alert alert-light border" style="border-radius: 12px; background: rgba(212, 165, 116, 0.05);">
                                                    <div class="d-flex">
                                                        <i class="fas fa-info-circle me-3 mt-1" style="color: #d4a574;"></i>
                                                        <div>
                                                            <strong class="d-block" style="color: #2a2a2a;">Informasi Penting:</strong>
                                                            <small class="text-muted">
                                                                • Reservasi akan dikonfirmasi melalui email atau telepon dalam waktu 1x24 jam<br>
                                                                • Mohon datang 15 menit sebelum waktu reservasi<br>
                                                                • Reservasi akan hangus jika Anda terlambat lebih dari 30 menit<br>
                                                                • Untuk pembatalan, harap hubungi kami minimal 3 jam sebelumnya
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                                    <label class="form-check-label" for="terms" style="color: #666; font-size: 0.9rem;">
                                                        Saya setuju dengan <a href="#" style="color: #d4a574;">syarat dan ketentuan</a>
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn px-4 py-3" 
                                                        style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border: none; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                                                    <i class="fas fa-calendar-check me-2"></i> Pesan Sekarang
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Right Side - Info & Steps -->
                                <div class="col-lg-4" style="background: linear-gradient(135deg, #2a2a2a, #1a1a1a);">
                                    <div class="p-4 p-lg-5 h-100 text-white">
                                        <h4 class="fw-bold mb-4" style="color: #d4a574;">Langkah Reservasi</h4>
                                        
                                        <div class="mb-5">
                                            <div class="d-flex align-items-start mb-4">
                                                <div class="me-3">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                                         style="width: 40px; height: 40px; background: rgba(212, 165, 116, 0.2); color: #d4a574; font-weight: 600;">
                                                        1
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-1">Isi Formulir</h6>
                                                    <p class="mb-0" style="opacity: 0.8; font-size: 0.9rem;">
                                                        Lengkapi data diri dan detail reservasi
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex align-items-start mb-4">
                                                <div class="me-3">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                                         style="width: 40px; height: 40px; background: rgba(212, 165, 116, 0.2); color: #d4a574; font-weight: 600;">
                                                        2
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-1">Konfirmasi</h6>
                                                    <p class="mb-0" style="opacity: 0.8; font-size: 0.9rem;">
                                                        Kami akan mengonfirmasi dalam 24 jam
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="d-flex align-items-start">
                                                <div class="me-3">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                                         style="width: 40px; height: 40px; background: rgba(212, 165, 116, 0.2); color: #d4a574; font-weight: 600;">
                                                        3
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-1">Nikmati Makan</h6>
                                                    <p class="mb-0" style="opacity: 0.8; font-size: 0.9rem;">
                                                        Datang sesuai waktu yang dipesan
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <hr style="border-color: rgba(255,255,255,0.1);">
                                        
                                        <div class="mb-4">
                                            <h5 class="fw-bold mb-3">Jam Operasional</h5>
                                            <div class="mb-2">
                                                <p class="mb-1 fw-semibold">Setiap Hari</p>
                                                <p class="mb-0" style="opacity: 0.9;">10:00 - 22:00 WIB</p>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <h5 class="fw-bold mb-3">Hubungi Kami</h5>
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-phone me-3" style="color: #d4a574;"></i>
                                                <span style="opacity: 0.9;">(021) 1234-5678</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-whatsapp me-3" style="color: #d4a574;"></i>
                                                <span style="opacity: 0.9;">0812-3456-7890</span>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <p class="mb-3" style="opacity: 0.8; font-size: 0.9rem;">
                                                <i class="fas fa-exclamation-circle me-2" style="color: #d4a574;"></i>
                                                Untuk reservasi grup besar (>20 orang), harap hubungi kami langsung.
                                            </p>
                                            <button class="btn w-100 py-2" 
                                                    style="background: rgba(212, 165, 116, 0.2); color: #d4a574; border: 1px solid rgba(212, 165, 116, 0.3); border-radius: 8px;">
                                                <i class="fas fa-download me-2"></i> Download Menu PDF
                                            </button>
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
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-4 text-center" style="color: #2a2a2a;">
                                <i class="fas fa-question-circle me-2" style="color: #d4a574;"></i>
                                Pertanyaan yang Sering Diajukan
                            </h3>
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item border-0 mb-3" style="border-radius: 12px !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" 
                                                style="background: rgba(212, 165, 116, 0.05); border-radius: 12px; color: #2a2a2a;">
                                            Berapa lama waktu konfirmasi reservasi?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body" style="color: #666;">
                                            Kami akan mengonfirmasi reservasi Anda dalam waktu 1x24 jam melalui email atau telepon yang telah Anda berikan.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item border-0 mb-3" style="border-radius: 12px !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" 
                                                style="background: rgba(212, 165, 116, 0.05); border-radius: 12px; color: #2a2a2a;">
                                            Bisakah saya membatalkan reservasi?
                                        </button>
                                    </h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body" style="color: #666;">
                                            Ya, Anda dapat membatalkan reservasi minimal 3 jam sebelum waktu kedatangan. Silakan hubungi kami di (021) 1234-5678 untuk pembatalan.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item border-0" style="border-radius: 12px !important;">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" 
                                                style="background: rgba(212, 165, 116, 0.05); border-radius: 12px; color: #2a2a2a;">
                                            Apakah ada biaya reservasi?
                                        </button>
                                    </h2>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body" style="color: #666;">
                                            Tidak, reservasi di JOSS GANDOS sepenuhnya gratis. Kami hanya meminta Anda untuk datang sesuai waktu yang telah dipesan.
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
    
    .form-control:focus, .form-select:focus {
        border-color: #d4a574 !important;
        box-shadow: 0 0 0 0.25rem rgba(212, 165, 116, 0.25) !important;
    }
    
    .input-group-text {
        transition: all 0.3s ease;
    }
    
    .form-control:focus + .input-group-text,
    .form-select:focus + .input-group-text {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.2), rgba(212, 165, 116, 0.1)) !important;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
    }
    
    /* Custom accordion styling */
    .accordion-button:not(.collapsed) {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)) !important;
        color: #d4a574 !important;
    }
    
    .accordion-button:focus {
        border-color: rgba(212, 165, 116, 0.25);
        box-shadow: 0 0 0 0.25rem rgba(212, 165, 116, 0.25);
    }
    
    /* Form validation styling */
    .form-control:invalid {
        border-color: #e63946;
    }
    
    .form-control:valid {
        border-color: #2a9d8f;
    }
    
    /* Calendar customization */
    input[type="date"]::-webkit-calendar-picker-indicator {
        cursor: pointer;
        filter: invert(0.7);
    }
    
    /* Animation for form sections */
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .col-lg-8 {
        animation: slideInLeft 0.6s ease-out;
    }
    
    .col-lg-4 {
        animation: slideInRight 0.6s ease-out;
    }
</style>
@endsection

@section('scripts')
<script>
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('reservation_date').min = today;
    
    // Form validation and submission
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        // Validate form
        let isValid = true;
        const requiredFields = this.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#e63946';
                isValid = false;
                
                // Add shake animation
                field.style.animation = 'shake 0.5s';
                setTimeout(() => {
                    field.style.animation = '';
                }, 500);
            } else {
                field.style.borderColor = '#2a9d8f';
            }
        });
        
        if (!isValid) {
            // Show error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'alert alert-danger mt-3';
            errorDiv.innerHTML = `
                <i class="fas fa-exclamation-triangle me-2"></i>
                Harap lengkapi semua field yang wajib diisi.
            `;
            
            const existingError = this.querySelector('.alert-danger');
            if (existingError) {
                existingError.remove();
            }
            
            this.insertBefore(errorDiv, this.querySelector('.d-flex.align-items-center.justify-content-between'));
            
            // Auto remove error after 5 seconds
            setTimeout(() => {
                if (errorDiv.parentElement) {
                    errorDiv.remove();
                }
            }, 5000);
            
            return;
        }
        
        // Show loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memproses...';
        submitBtn.disabled = true;
        
        // Simulate API call (remove this in production)
        setTimeout(() => {
            // Success animation
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i> Berhasil Dipesan!';
            submitBtn.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
            
            // Show success message
            const successDiv = document.createElement('div');
            successDiv.className = 'alert alert-success mt-3';
            successDiv.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-3 fa-2x" style="color: #2a9d8f;"></i>
                    <div>
                        <h5 class="mb-1">Reservasi Berhasil!</h5>
                        <p class="mb-0">
                            Reservasi Anda telah berhasil diproses. Kami akan mengirimkan konfirmasi ke 
                            <strong>${document.getElementById('email').value}</strong> dalam waktu 24 jam.
                        </p>
                    </div>
                </div>
            `;
            
            this.parentNode.insertBefore(successDiv, this.nextSibling);
            
            // Reset form after 5 seconds
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = 'linear-gradient(135deg, #d4a574, #b38b5d)';
                this.reset();
                
                // Remove success message
                if (successDiv.parentElement) {
                    successDiv.style.opacity = '0';
                    successDiv.style.transform = 'translateY(-20px)';
                    successDiv.style.transition = 'all 0.3s ease';
                    setTimeout(() => {
                        successDiv.remove();
                    }, 300);
                }
            }, 5000);
            
            // In production, you would submit the form here:
            // this.submit();
            
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
        
        field.addEventListener('input', function() {
            this.style.borderColor = '#d4a574';
        });
    });
    
    // Date validation - prevent past dates and weekends if needed
    document.getElementById('reservation_date').addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const today = new Date();
        
        // Reset time for comparison
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            alert('Tidak bisa memilih tanggal yang sudah lewat.');
            this.value = today.toISOString().split('T')[0];
        }
    });
    
    // Guest count validation
    document.getElementById('guest_count').addEventListener('change', function() {
        if (this.value === '11') {
            const infoDiv = document.createElement('div');
            infoDiv.className = 'alert alert-info mt-2';
            infoDiv.innerHTML = `
                <i class="fas fa-info-circle me-2"></i>
                Untuk reservasi lebih dari 10 orang, harap hubungi kami langsung di (021) 1234-5678.
            `;
            
            const existingInfo = this.parentNode.parentNode.querySelector('.alert-info');
            if (existingInfo) {
                existingInfo.remove();
            }
            
            this.parentNode.parentNode.appendChild(infoDiv);
        } else {
            const infoDiv = this.parentNode.parentNode.querySelector('.alert-info');
            if (infoDiv) {
                infoDiv.remove();
            }
        }
    });
    
    // Add shake animation CSS
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .alert {
            animation: slideInUp 0.3s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection