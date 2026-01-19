<!-- home.blade.php -->
@extends('layouts.app')

@section('title', 'JOSS GANDOS RESTO & CAFE')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" data-animate="fade-in">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Selamat Datang di<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Nikmati Berbagai Sajian Kuliner Lezat dengan Suasana yang Nyaman dan Ramah di Joss Gandos.
                            Rasa autentik Indonesia dalam setiap suapan.
                        </p>
                        <div class="mt-5 d-flex flex-wrap gap-3">
                            <a href="/menu" class="btn btn-primary">
                                <i class="fas fa-utensils me-2"></i> LIHAT MENU
                            </a>
                            <a href="/reservation" class="btn btn-outline-primary">
                                <i class="fas fa-calendar-check me-2"></i> RESERVASI MEJA
                            </a>
                        </div>
                        <div class="mt-4 d-flex flex-wrap gap-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock me-2" style="color: #FFD700;"></i>
                                <span>10:00 - 22:00 WIB</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt me-2" style="color: #FFD700;"></i>
                                <span>Jakarta, Bandung, Surabaya</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block">
                    <div class="promo-card floating">
                        <div class="text-center mb-4">
                            <i class="fas fa-gem fa-3x" style="color: #C62828;"></i>
                        </div>
                        <h3 class="text-center mb-3" style="color: #C62828;">PROMO SPESIAL</h3>
                        <h2 class="text-center mb-4" style="color: #FFD700; font-weight: bold;">DISKON 20%</h2>
                        <p class="text-center mb-3" style="color: #666;">
                            Setiap Hari Jumat<br>
                            Minimal Pembelian Rp 100.000
                        </p>
                        <a href="/menu" class="btn btn-primary w-100">
                            <i class="fas fa-tag me-2"></i> CEK PROMO
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section class="section-padding batik-pattern-red" id="featured-menu" data-animate="fade-in">
        <div class="container">
            <div class="section-title">
                <h2>Menu Favorit Kami</h2>
                <p>Cicipi Berbagai Hidangan Favorit Kami yang Menggugah Selera</p>
            </div>
            
            <div class="row g-4">
                @php
                    $featuredItems = [
                        ['name' => 'Nasi Goreng Spesial JOSS', 'price' => 35000, 'desc' => 'Nasi goreng dengan campuran daging ayam, udang, telur, dan sayuran segar', 'icon' => '🍚', 'badge' => true],
                        ['name' => 'Ayam Penyet Sambal Terasi', 'price' => 32000, 'desc' => 'Ayam goreng krispi dengan sambal terasi khas dan lalapan segar', 'icon' => '🍗', 'badge' => true],
                        ['name' => 'Sate Ayam Madura', 'price' => 28000, 'desc' => 'Sate ayam dengan bumbu kacang khas Madura dan lontong', 'icon' => '🍢', 'badge' => true],
                        ['name' => 'Rendang Sapi Padang', 'price' => 45000, 'desc' => 'Rendang sapi dengan bumbu rempah lengkap khas Padang', 'icon' => '🥩', 'badge' => false],
                        ['name' => 'Gado-gado Jakarta', 'price' => 25000, 'desc' => 'Sayuran segar dengan bumbu kacang khas Betawi', 'icon' => '🥗', 'badge' => true],
                        ['name' => 'Soto Ayam Lamongan', 'price' => 30000, 'desc' => 'Soto ayam dengan bumbu kuning khas Lamongan', 'icon' => '🍲', 'badge' => false],
                    ];
                @endphp
                
                @foreach($featuredItems as $item)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="indo-card menu-card">
                            @if($item['badge'])
                                <div class="featured-badge">
                                    <i class="fas fa-crown me-1"></i> FAVORIT
                                </div>
                            @endif
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                     class="menu-img w-100 h-100" alt="{{ $item['name'] }}">
                                <div class="position-absolute top-0 start-0 p-3">
                                    <span style="font-size: 2rem;">{{ $item['icon'] }}</span>
                                </div>
                            </div>
                            <div class="menu-content">
                                <h4 class="menu-title">{{ $item['name'] }}</h4>
                                <p class="menu-description">{{ $item['desc'] }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                    <button class="btn btn-sm px-3" style="background: linear-gradient(135deg, #C62828, #8B0000); color: white; border-radius: 8px;">
                                        <i class="fas fa-shopping-cart me-1"></i> Pesan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5">
                <a href="/menu" class="btn btn-primary px-5 py-3">
                    LIHAT MENU LENGKAP <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats & Promo Section -->
    <section class="promo-section section-padding" data-animate="fade-in">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="promo-card">
                        <div class="text-center mb-4">
                            <i class="fas fa-star fa-3x" style="color: #C62828;"></i>
                        </div>
                        <h3 class="text-center mb-3" style="color: #C62828;">RASA 5 BINTANG</h3>
                        <h2 class="text-center mb-4" style="color: #FFD700;">DISKON 20%!</h2>
                        <p class="text-center mb-4" style="color: #666; font-size: 1.1rem;">
                            Promo Makan Berkah<br>
                            Nikmati Diskon 20% Untuk Semua Menu Setiap Hari Jumat!
                        </p>
                        <div class="text-center">
                            <a href="/menu" class="btn btn-primary px-5">
                                <i class="fas fa-shopping-cart me-2"></i> PESAN SEKARANG
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="stat-box">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3 class="stat-number">5.0</h3>
                                <p class="fw-semibold mb-0" style="color: #666;">Rating Pelanggan</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="stat-box">
                                <div class="stat-icon">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h3 class="stat-number">50+</h3>
                                <p class="fw-semibold mb-0" style="color: #666;">Menu Lezat</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="stat-box">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3 class="stat-number">1000+</h3>
                                <p class="fw-semibold mb-0" style="color: #666;">Pelanggan Puas</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="stat-box">
                                <div class="stat-icon">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h3 class="stat-number">8+</h3>
                                <p class="fw-semibold mb-0" style="color: #666;">Tahun Pengalaman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section-padding" data-animate="fade-in">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-3 shadow-lg" alt="Joss Gandos Resto" 
                             style="border: 5px solid #FFECB3;">
                        <div class="position-absolute bottom-0 end-0 translate-middle-y me-n4">
                            <div class="p-4 rounded-3 shadow" style="background: linear-gradient(135deg, #C62828, #8B0000); color: white; max-width: 200px;">
                                <h5 class="fw-bold mb-2">Sejak 2015</h5>
                                <p class="mb-0" style="opacity: 0.9;">Melayani dengan cita rasa terbaik</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="fw-bold mb-4" style="color: #C62828; font-size: 2.2rem;">Sajian Autentik dengan Cita Rasa Terbaik</h2>
                    <p class="mb-4" style="color: #666; line-height: 1.8; font-size: 1.1rem;">
                        JOSS GANDOS telah menjadi pilihan utama bagi pecinta kuliner Indonesia sejak 2015. 
                        Kami menghadirkan cita rasa autentik dengan bahan-bahan segar pilihan yang diolah oleh chef berpengalaman.
                    </p>
                    <p class="mb-5" style="color: #666; line-height: 1.8; font-size: 1.1rem;">
                        Dengan suasana yang nyaman dan pelayanan yang hangat, kami berkomitmen untuk memberikan 
                        pengalaman makan yang tak terlupakan bagi setiap pelanggan.
                    </p>
                    
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: rgba(198, 40, 40, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check" style="color: #C62828;"></i>
                            </div>
                            <span style="color: #555; font-weight: 500;">Bahan-bahan segar setiap hari</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: rgba(198, 40, 40, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check" style="color: #C62828;"></i>
                            </div>
                            <span style="color: #555; font-weight: 500;">Chef berpengalaman</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: rgba(198, 40, 40, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check" style="color: #C62828;"></i>
                            </div>
                            <span style="color: #555; font-weight: 500;">Pelayanan ramah dan profesional</span>
                        </li>
                        <li class="mb-3 d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: rgba(198, 40, 40, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check" style="color: #C62828;"></i>
                            </div>
                            <span style="color: #555; font-weight: 500;">Harga terjangkau</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="me-3" style="width: 40px; height: 40px; background: rgba(198, 40, 40, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-check" style="color: #C62828;"></i>
                            </div>
                            <span style="color: #555; font-weight: 500;">Suasana nyaman dan bersih</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-padding batik-pattern-red" data-animate="fade-in">
        <div class="container">
            <div class="section-title">
                <h2>Testimoni Pelanggan</h2>
                <p>Apa kata mereka tentang pengalaman di JOSS GANDOS</p>
            </div>
            
            <div class="row g-4">
                @php
                    $testimonials = [
                        ['name' => 'Budi Santoso', 'location' => 'Jakarta', 'rating' => 5, 'text' => 'Makanan sangat enak dan pelayanan ramah. Suasana restoran nyaman, cocok untuk keluarga. Nasi goreng spesialnya juara!'],
                        ['name' => 'Sari Dewi', 'location' => 'Bandung', 'rating' => 5, 'text' => 'Ayam penyetnya juara! Sambalnya pedas tapi enak. Tempatnya bersih dan pelayanan cepat. Akan kembali lagi.'],
                        ['name' => 'Rudi Hartono', 'location' => 'Bekasi', 'rating' => 5, 'text' => 'Harga terjangkau dengan kualitas premium. Nasi goreng spesialnya wajib dicoba! Suasana sangat Indonesia banget.'],
                    ];
                @endphp
                
                @foreach($testimonials as $testimonial)
                    <div class="col-md-4">
                        <div class="indo-card h-100">
                            <div class="p-4">
                                <div class="mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $testimonial['rating'] ? 'text-warning' : 'text-muted' }}"></i>
                                    @endfor
                                </div>
                                <p class="card-text fst-italic mb-4" style="color: #555; line-height: 1.6;">
                                    "{{ $testimonial['text'] }}"
                                </p>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #C62828, #8B0000); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                            {{ strtoupper(substr($testimonial['name'], 0, 1)) }}
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold" style="color: #C62828;">{{ $testimonial['name'] }}</h6>
                                        <small class="text-muted">{{ $testimonial['location'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="promo-section py-5" data-animate="fade-in">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="mb-3 text-white">Ingin pesan dalam jumlah besar untuk acara spesial?</h3>
                    <p class="mb-0 text-white opacity-90">Hubungi kami untuk layanan catering dan reservasi grup</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/contact" class="btn btn-outline-primary px-4 py-3">
                        <i class="fas fa-phone-alt me-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* Additional custom styles for home page */
    .hero-section {
        background: linear-gradient(rgba(198, 40, 40, 0.9), rgba(139, 0, 0, 0.95)), 
                    url('https://images.unsplash.com/photo-1551503759-5c7ecd1520c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
    }
    
    .promo-card {
        border: 3px solid #FFD700;
        background: white;
    }
    
    .menu-card {
        background: white;
        border: 2px solid #FFECB3;
    }
    
    .menu-card:hover {
        border-color: #C62828;
    }
    
    .text-warning {
        color: #FFD700 !important;
    }
</style>
@endsection

@section('scripts')
<script>
    // Add to cart functionality
    document.querySelectorAll('.btn').forEach(button => {
        if (button.textContent.includes('Pesan')) {
            button.addEventListener('click', function() {
                const card = this.closest('.menu-card');
                const itemName = card.querySelector('.menu-title').textContent;
                const itemPrice = card.querySelector('.menu-price').textContent;
                
                // Animation
                const originalHTML = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check me-1"></i> Ditambahkan';
                this.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
                
                // Create notification
                const notification = document.createElement('div');
                notification.className = 'alert alert-success position-fixed top-0 end-0 m-4 shadow';
                notification.style.zIndex = '9999';
                notification.style.borderRadius = '10px';
                notification.style.border = '2px solid #C62828';
                notification.style.background = '#FFF5F5';
                notification.innerHTML = `
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle me-3" style="color: #C62828; font-size: 1.2rem;"></i>
                        <div>
                            <strong class="d-block" style="color: #C62828;">${itemName}</strong>
                            <small style="color: #666;">Berhasil ditambahkan ke keranjang!</small>
                        </div>
                        <button type="button" class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
                    </div>
                `;
                document.body.appendChild(notification);
                
                // Auto remove notification
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.style.opacity = '0';
                        notification.style.transform = 'translateX(100%)';
                        notification.style.transition = 'all 0.3s ease';
                        setTimeout(() => {
                            notification.remove();
                        }, 300);
                    }
                }, 3000);
                
                // Reset button after 2 seconds
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.style.background = 'linear-gradient(135deg, #C62828, #8B0000)';
                }, 2000);
            });
        }
    });
    
    // Auto-slide testimonials
    let testimonialIndex = 0;
    const testimonialCards = document.querySelectorAll('.col-md-4');
    
    function rotateTestimonials() {
        testimonialCards.forEach(card => {
            card.style.opacity = '0.7';
            card.style.transform = 'scale(0.98)';
        });
        
        if (testimonialCards[testimonialIndex]) {
            testimonialCards[testimonialIndex].style.opacity = '1';
            testimonialCards[testimonialIndex].style.transform = 'scale(1)';
        }
        
        testimonialIndex = (testimonialIndex + 1) % testimonialCards.length;
    }
    
    // Start rotation every 5 seconds
    setInterval(rotateTestimonials, 5000);
</script>
@endsection