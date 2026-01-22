@extends('layouts.app')

@section('title', 'Reservasi - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.9), rgba(44, 44, 44, 0.95)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Reservasi<br>
                            <span>Mudah</span>
                        </h1>
                        <p class="hero-subtitle">
                            Pesan meja Anda dalam beberapa langkah mudah. 
                            Nikmati pengalaman makan yang lebih baik tanpa harus menunggu.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-bolt me-1"></i> Konfirmasi Instan
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

    <!-- Reservation Process -->
    <section class="section-padding">
        <div class="container">
            <!-- Process Steps -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="modern-card" style="border: none; background: rgba(180, 34, 34, 0.05);">
                        <div class="p-4">
                            <h3 class="fw-bold text-center mb-4" style="color: var(--dark-charcoal);">Langkah Reservasi</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="process-step text-center">
                                        <div class="step-number mb-3">
                                            <div class="mx-auto" style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.5rem;">
                                                1
                                            </div>
                                        </div>
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Isi Formulir</h5>
                                        <p class="mb-0" style="color: var(--warm-brown); font-size: 0.9rem;">
                                            Lengkapi data diri dan detail reservasi
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="process-step text-center">
                                        <div class="step-number mb-3">
                                            <div class="mx-auto" style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.5rem;">
                                                2
                                            </div>
                                        </div>
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Konfirmasi</h5>
                                        <p class="mb-0" style="color: var(--warm-brown); font-size: 0.9rem;">
                                            Terima konfirmasi via email/SMS
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="process-step text-center">
                                        <div class="step-number mb-3">
                                            <div class="mx-auto" style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.5rem;">
                                                3
                                            </div>
                                        </div>
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Nikmati</h5>
                                        <p class="mb-0" style="color: var(--warm-brown); font-size: 0.9rem;">
                                            Datang dan nikmati pengalaman kuliner
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reservation Form -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="modern-card">
                        <div class="p-4 p-lg-5">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fas fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="fw-bold mb-1" style="color: var(--dark-charcoal);">Formulir Reservasi</h2>
                                        <p class="text-muted mb-0">Isi dengan data yang valid untuk proses lebih cepat</p>
                                    </div>
                                </div>
                            </div>
                            
                            <form id="reservationForm">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Nama Lengkap *
                                        </label>
                                        <input type="text" class="form-control" id="name" required 
                                               placeholder="Masukkan nama lengkap">
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Email *
                                        </label>
                                        <input type="email" class="form-control" id="email" required 
                                               placeholder="email@contoh.com">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Nomor Telepon *
                                        </label>
                                        <input type="tel" class="form-control" id="phone" required 
                                               placeholder="0812-3456-7890">
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Jumlah Tamu *
                                        </label>
                                        <select class="form-control" id="guests" required>
                                            <option value="">Pilih jumlah tamu</option>
                                            <option value="1">1 Orang</option>
                                            <option value="2">2 Orang</option>
                                            <option value="3">3 Orang</option>
                                            <option value="4">4 Orang</option>
                                            <option value="5">5 Orang</option>
                                            <option value="6">6 Orang</option>
                                            <option value="7">7 Orang</option>
                                            <option value="8">8 Orang</option>
                                            <option value="9">9 Orang</option>
                                            <option value="10">10 Orang</option>
                                            <option value="more">Lebih dari 10 Orang</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Tanggal Reservasi *
                                        </label>
                                        <input type="date" class="form-control" id="date" required 
                                               min="{{ date('Y-m-d') }}">
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                            Waktu *
                                        </label>
                                        <select class="form-control" id="time" required>
                                            <option value="">Pilih waktu</option>
                                            <option value="10:00">10:00 - 11:00</option>
                                            <option value="11:00">11:00 - 12:00</option>
                                            <option value="12:00">12:00 - 13:00</option>
                                            <option value="13:00">13:00 - 14:00</option>
                                            <option value="14:00">14:00 - 15:00</option>
                                            <option value="15:00">15:00 - 16:00</option>
                                            <option value="16:00">16:00 - 17:00</option>
                                            <option value="17:00">17:00 - 18:00</option>
                                            <option value="18:00">18:00 - 19:00</option>
                                            <option value="19:00">19:00 - 20:00</option>
                                            <option value="20:00">20:00 - 21:00</option>
                                            <option value="21:00">21:00 - 22:00</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                        Permintaan Khusus
                                    </label>
                                    <textarea class="form-control" id="specialRequests" rows="4" 
                                              placeholder="Contoh: Meja dekat jendela, alergi tertentu, ulang tahun, dll."></textarea>
                                </div>
                                
                                <!-- Location Selection -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold" style="color: var(--dark-charcoal);">
                                        Pilih Lokasi *
                                    </label>
                                    <div class="row">
                                        @php
                                            $locations = [
                                                ['id' => 'jakarta', 'name' => 'Jakarta Pusat', 'address' => 'JL Baye Kuliner No. 123'],
                                                ['id' => 'bandung', 'name' => 'Bandung', 'address' => 'JL Braga No. 45'],
                                                ['id' => 'surabaya', 'name' => 'Surabaya', 'address' => 'JL Tunjungan No. 78'],
                                            ];
                                        @endphp
                                        
                                        @foreach($locations as $location)
                                            <div class="col-md-4 mb-3">
                                                <div class="location-card" data-location="{{ $location['id'] }}">
                                                    <input type="radio" name="location" id="{{ $location['id'] }}" 
                                                           class="location-radio" value="{{ $location['id'] }}" 
                                                           {{ $loop->first ? 'checked' : '' }}>
                                                    <label for="{{ $location['id'] }}" class="location-label">
                                                        <div class="location-name">{{ $location['name'] }}</div>
                                                        <div class="location-address">{{ $location['address'] }}</div>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- Terms and Submit -->
                                <div class="mt-5">
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" required>
                                            <label class="form-check-label" for="terms" style="color: var(--warm-brown);">
                                                Saya setuju dengan 
                                                <a href="#" class="text-decoration-none" style="color: var(--primary-red);">syarat dan ketentuan</a> 
                                                reservasi
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                                            <i class="fas fa-calendar-check me-2"></i> Pesan Sekarang
                                        </button>
                                        <p class="text-muted mt-3 mb-0" style="font-size: 0.9rem;">
                                            Reservasi akan dikonfirmasi via email/SMS dalam 1x24 jam
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card" style="border: none; background: rgba(180, 34, 34, 0.05);">
                        <div class="p-4 p-lg-5">
                            <h3 class="fw-bold text-center mb-4" style="color: var(--dark-charcoal);">Pertanyaan Umum</h3>
                            
                            <div class="accordion" id="faqAccordion">
                                @php
                                    $faqs = [
                                        [
                                            'q' => 'Berapa lama waktu konfirmasi reservasi?',
                                            'a' => 'Reservasi akan dikonfirmasi dalam 1x24 jam via email dan SMS.'
                                        ],
                                        [
                                            'q' => 'Apakah ada biaya reservasi?',
                                            'a' => 'Tidak, reservasi di JOSS GANDOS sepenuhnya gratis.'
                                        ],
                                        [
                                            'q' => 'Berapa lama saya bisa menunggu jika terlambat?',
                                            'a' => 'Kami akan menahan meja maksimal 30 menit dari waktu reservasi.'
                                        ],
                                        [
                                            'q' => 'Bagaimana cara membatalkan reservasi?',
                                            'a' => 'Hubungi kami di 021-1234-5678 atau email reservation@jossgandos.com.'
                                        ],
                                        [
                                            'q' => 'Apakah bisa memesan untuk acara khusus?',
                                            'a' => 'Ya, hubungi tim Event kami di 021-1234-5680.'
                                        ],
                                    ];
                                @endphp
                                
                                @foreach($faqs as $index => $faq)
                                    <div class="accordion-item" style="border: none; background: transparent;">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" 
                                                    data-bs-target="#faq{{ $index }}" style="background: white; color: var(--dark-charcoal); border-radius: 10px; margin-bottom: 10px;">
                                                {{ $faq['q'] }}
                                            </button>
                                        </h2>
                                        <div id="faq{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                            <div class="accordion-body" style="color: var(--warm-brown); padding: 20px; background: white; border-radius: 0 0 10px 10px;">
                                                {{ $faq['a'] }}
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
    .process-step {
        position: relative;
        padding: 20px;
    }
    
    .process-step::after {
        content: '';
        position: absolute;
        top: 30px;
        right: -25%;
        width: 50%;
        height: 2px;
        background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
        opacity: 0.3;
    }
    
    .process-step:last-child::after {
        display: none;
    }
    
    @media (max-width: 768px) {
        .process-step::after {
            display: none;
        }
    }
    
    /* Location Cards */
    .location-card {
        position: relative;
        border: 2px solid rgba(180, 34, 34, 0.1);
        border-radius: 10px;
        padding: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
    }
    
    .location-radio {
        display: none;
    }
    
    .location-label {
        display: block;
        cursor: pointer;
    }
    
    .location-name {
        font-weight: 600;
        color: var(--dark-charcoal);
        margin-bottom: 5px;
    }
    
    .location-address {
        color: var(--warm-brown);
        font-size: 0.9rem;
    }
    
    .location-radio:checked + .location-label .location-card {
        border-color: var(--primary-red);
        background: rgba(180, 34, 34, 0.05);
    }
    
    .location-radio:checked + .location-label .location-name {
        color: var(--primary-red);
    }
    
    .location-radio:checked + .location-label::before {
        content: '✓';
        position: absolute;
        top: 10px;
        right: 10px;
        width: 20px;
        height: 20px;
        background: var(--primary-red);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }
    
    /* Form Styles */
    .form-control {
        border: 2px solid rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: var(--primary-red);
        box-shadow: 0 0 0 0.25rem rgba(180, 34, 34, 0.1);
    }
    
    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23B22222' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }
    
    /* Accordion Styles */
    .accordion-button {
        font-weight: 500;
        box-shadow: none !important;
    }
    
    .accordion-button:not(.collapsed) {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    
    .accordion-button::after {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23B22222' viewBox='0 0 16 16'%3E%3Cpath d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/%3E%3C/svg%3E");
    }
    
    .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' viewBox='0 0 16 16'%3E%3Cpath d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/%3E%3C/svg%3E");
    }
</style>
@endsection

@section('scripts')
<script>
    // Set minimum date
    document.getElementById('date').min = new Date().toISOString().split('T')[0];
    
    // Date validation
    document.getElementById('date').addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const today = new Date();
        
        today.setHours(0, 0, 0, 0);
        
        if (selectedDate < today) {
            createNotification('error', 'Tidak bisa memilih tanggal yang sudah lewat.');
            this.value = today.toISOString().split('T')[0];
        }
    });
    
    // Location selection
    document.querySelectorAll('.location-card').forEach(card => {
        card.addEventListener('click', function() {
            const radio = this.querySelector('.location-radio');
            radio.checked = true;
            
            // Update all cards
            document.querySelectorAll('.location-card').forEach(c => {
                c.style.borderColor = 'rgba(180, 34, 34, 0.1)';
                c.style.background = 'white';
            });
            
            // Style selected card
            this.style.borderColor = 'var(--primary-red)';
            this.style.background = 'rgba(180, 34, 34, 0.05)';
        });
    });
    
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
        
        // Check guests count
        const guests = document.getElementById('guests').value;
        if (guests === 'more') {
            createNotification('info', 
                'Untuk reservasi lebih dari 10 orang, harap hubungi kami langsung di 021-1234-5678.');
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
            
            // Create reservation summary
            const summary = `
                Reservasi untuk ${document.getElementById('name').value}<br>
                Tanggal: ${document.getElementById('date').value}<br>
                Waktu: ${document.getElementById('time').value}<br>
                ${guests} tamu
            `;
            
            // Show success message with details
            createNotification('success', 
                `Reservasi berhasil! Konfirmasi akan dikirim ke ${document.getElementById('email').value}`);
            
            // Reset form after 3 seconds
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                submitBtn.style.background = '';
                this.reset();
                document.getElementById('date').min = new Date().toISOString().split('T')[0];
                
                // Reset location cards
                document.querySelectorAll('.location-card').forEach(c => {
                    c.style.borderColor = 'rgba(180, 34, 34, 0.1)';
                    c.style.background = 'white';
                });
                document.querySelector('.location-radio').checked = true;
                document.querySelector('.location-card').style.borderColor = 'var(--primary-red)';
                document.querySelector('.location-card').style.background = 'rgba(180, 34, 34, 0.05)';
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
                    <div style="width: 40px; height: 40px; background: ${type === 'success' ? '#2a9d8f' : type === 'error' ? '#e63946' : '#4361ee'}; 
                                border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-${type === 'success' ? 'check' : type === 'error' ? 'exclamation' : 'info'}"></i>
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