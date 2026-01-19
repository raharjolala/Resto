@extends('layouts.app')

@section('title', 'Reservasi - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Reservasi Meja<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Pesan meja Anda sekarang untuk pengalaman makan yang lebih baik dan terjamin.
                            Nikmati hidangan spesial kami tanpa harus menunggu.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-clock me-1"></i> Konfirmasi Cepat
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-check-circle me-1"></i> Gratis Reservasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation Form -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="modern-card" style="overflow: hidden;">
                        <div class="p-0">
                            <div class="row g-0">
                                <!-- Left Side - Form -->
                                <div class="col-lg-8">
                                    <div class="p-4 p-lg-5">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="me-3" style="color: var(--primary-red); font-size: 2rem;">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <div>
                                                <h2 class="fw-bold mb-1" style="color: var(--dark-charcoal);">RESERVASI MEJA</h2>
                                                <p class="text-muted mb-0">Isi formulir untuk memesan meja Anda</p>
                                            </div>
                                        </div>
                                        
                                        <form id="reservationForm">
                                            <!-- Personal Information -->
                                            <div class="mb-4">
                                                <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">
                                                    <i class="fas fa-user-circle me-2" style="color: var(--primary-red);"></i>
                                                    Informasi Pribadi
                                                </h5>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                                            Nama Lengkap *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05);">
                                                                <i class="fas fa-user" style="color: var(--primary-red);"></i>
                                                            </span>
                                                            <input type="text" class="form-control" id="customer_name" required 
                                                                   placeholder="Masukkan nama lengkap Anda">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                                            Email *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05);">
                                                                <i class="fas fa-envelope" style="color: var(--primary-red);"></i>
                                                            </span>
                                                            <input type="email" class="form-control" id="email" required 
                                                                   placeholder="contoh@email.com">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                                            Nomor Telepon *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05);">
                                                                <i class="fas fa-phone" style="color: var(--primary-red);"></i>
                                                            </span>
                                                            <input type="tel" class="form-control" id="phone" required 
                                                                   placeholder="0812-3456-7890">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                                            Jumlah Tamu *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05);">
                                                                <i class="fas fa-users" style="color: var(--primary-red);"></i>
                                                            </span>
                                                            <select class="form-control" id="guest_count" required>
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
                                                <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">
                                                    <i class="fas fa-clock me-2" style="color: var(--primary-red);"></i>
                                                    Detail Reservasi
                                                </h5>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                                            Tanggal Reservasi *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05);">
                                                                <i class="fas fa-calendar-day" style="color: var(--primary-red);"></i>
                                                            </span>
                                                            <input type="date" class="form-control" id="reservation_date" required 
                                                                   min="{{ date('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                                            Waktu *
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" style="background: rgba(180, 34, 34, 0.05);">
                                                                <i class="fas fa-clock" style="color: var(--primary-red);"></i>
                                                            </span>
                                                            <select class="form-control" id="reservation_time" required>
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
                                                <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">
                                                    <i class="fas fa-star me-2" style="color: var(--primary-red);"></i>
                                                    Permintaan Khusus
                                                </h5>
                                                <div class="input-group">
                                                    <span class="input-group-text align-items-start" style="background: rgba(180, 34, 34, 0.05); padding-top: 14px;">
                                                        <i class="fas fa-edit" style="color: var(--primary-red);"></i>
                                                    </span>
                                                    <textarea class="form-control" id="special_request" rows="4" 
                                                              placeholder="Contoh: Meja dekat jendela, ada anak kecil, alergi seafood, dll."></textarea>
                                                </div>
                                                <small class="text-muted">* Opsional</small>
                                            </div>
                                            
                                            <!-- Submit -->
                                            <div class="mt-5">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                                        <label class="form-check-label" for="terms" style="color: var(--warm-brown);">
                                                            Saya setuju dengan syarat dan ketentuan
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary px-5 py-3">
                                                        <i class="fas fa-calendar-check me-2"></i> Pesan Sekarang
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Right Side - Info -->
                                <div class="col-lg-4" style="background: linear-gradient(135deg, var(--dark-charcoal), #1a1a1a);">
                                    <div class="p-4 p-lg-5 h-100 text-white">
                                        <h4 class="fw-bold mb-4" style="color: var(--accent-gold);">Proses Reservasi</h4>
                                        
                                        <div class="mb-5">
                                            <div class="d-flex align-items-start mb-4">
                                                <div class="me-3">
                                                    <div class="rounded-circle d-flex align-items-center justify-content-center" 
                                                         style="width: 40px; height: 40px; background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); font-weight: 600;">
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
                                                         style="width: 40px; height: 40px; background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); font-weight: 600;">
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
                                                         style="width: 40px; height: 40px; background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); font-weight: 600;">
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
                                            <h5 class="fw-bold mb-3">Informasi Penting</h5>
                                            <ul class="small" style="opacity: 0.8;">
                                                <li class="mb-2">Reservasi dikonfirmasi dalam 1x24 jam</li>
                                                <li class="mb-2">Mohon datang 15 menit sebelum waktu</li>
                                                <li class="mb-2">Reservasi hangus jika terlambat 30 menit</li>
                                                <li>Hubungi kami untuk pembatalan</li>
                                            </ul>
                                        </div>
                                        
                                        <div class="mt-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fas fa-phone me-3" style="color: var(--accent-gold);"></i>
                                                <span style="opacity: 0.9;">(021) 1234-5678</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <i class="fab fa-whatsapp me-3" style="color: var(--accent-gold);"></i>
                                                <span style="opacity: 0.9;">0812-3456-7890</span>
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

@section('scripts')
<script>
    // Set minimum date to today
    document.getElementById('reservation_date').min = new Date().toISOString().split('T')[0];
    
    // Form submission
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
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
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memproses...';
        submitBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Success
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i> Berhasil Dipesan!';
            submitBtn.style.background = '#2a9d8f';
            
            // Show success message
            createNotification('success', 
                `Reservasi berhasil! Kami akan mengirimkan konfirmasi ke ${document.getElementById('email').value} dalam 24 jam.`);
            
            // Reset form after 3 seconds
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = '';
                this.reset();
                document.getElementById('reservation_date').min = new Date().toISOString().split('T')[0];
            }, 3000);
        }, 2000);
    });
    
    // Guest count validation
    document.getElementById('guest_count').addEventListener('change', function() {
        if (this.value === '11') {
            createNotification('info', 
                'Untuk reservasi lebih dari 10 orang, harap hubungi kami langsung di (021) 1234-5678.');
        }
    });
    
    // Date validation
    document.getElementById('reservation_date').addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const today = new Date();
        
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            createNotification('error', 'Tidak bisa memilih tanggal yang sudah lewat.');
            this.value = today.toISOString().split('T')[0];
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
        notification.style.background = 'white';
        notification.style.animation = 'slideInRight 0.3s ease-out';
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'} me-3" 
                   style="color: ${type === 'success' ? '#2a9d8f' : type === 'error' ? '#e63946' : '#4361ee'}; font-size: 1.2rem;"></i>
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