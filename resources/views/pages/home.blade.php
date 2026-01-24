@extends('layouts.app')

@section('title', 'JOSS GANDOS - Restoran Indonesia Modern')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content animate-fade-in">
                        <div class="mb-4">
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.15); color: white; border-radius: 20px;">
                                <i class="fas fa-star me-1"></i> #1 Restoran Indonesia di Jakarta
                            </span>
                        </div>
                        
                        <h1 class="hero-title">
                            Rasa <span class="highlight">Nusantara</span><br>
                            Sentuhan <span class="highlight">Modern</span>
                        </h1>
                        
                        <p class="hero-subtitle">
                            Pengalaman kuliner autentik Indonesia yang disajikan dengan elegan. 
                            Warisan cita rasa Nusantara bertemu dengan presentasi kontemporer.
                        </p>
                        
                        <div class="mt-5 d-flex flex-wrap gap-3">
                            <a href="{{ route('menu') }}" class="btn btn-primary btn-lg px-4 py-3">
                                <i class="fas fa-utensils me-2"></i> Jelajahi Menu
                            </a>
                            <a href="{{ route('reservation.create') }}" class="btn btn-outline-light btn-lg px-4 py-3" 
                               style="border: 2px solid rgba(255, 255, 255, 0.3);">
                                <i class="fas fa-calendar-check me-2"></i> Reservasi
                            </a>
                        </div>
                        
                        <!-- Traditional Highlights -->
                        <div class="mt-5 pt-4" style="border-top: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="row g-3">
                                <div class="col-4">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="fas fa-leaf fa-xl" style="color: var(--accent-gold);"></i>
                                        </div>
                                        <small class="text-white-50">Bahan Lokal</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="fas fa-history fa-xl" style="color: var(--accent-gold);"></i>
                                        </div>
                                        <small class="text-white-50">Resep Tradisional</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="fas fa-heart fa-xl" style="color: var(--accent-gold);"></i>
                                        </div>
                                        <small class="text-white-50">Disajikan dengan Cinta</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Image -->
                <div class="col-lg-6">
                    <div class="position-relative animate-fade-in" style="animation-delay: 0.3s;">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-4 shadow-lg" 
                             alt="Makanan Indonesia" 
                             style="border: 8px solid rgba(255, 255, 255, 0.1);">
                        
                        <!-- Decorative Badges -->
                        <div class="position-absolute top-0 start-0 translate-middle">
                            <div class="bg-white rounded-circle shadow d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px;">
                                <div class="text-center">
                                    <div class="fw-bold" style="color: var(--primary-red); font-size: 1.5rem;">8+</div>
                                    <small class="text-muted">Tahun</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Menu Andalan</h2>
                <p class="text-muted mt-3">Hidangan istimewa yang menjadi favorit pelanggan kami</p>
                <div class="title-decoration">
                    <span></span>
                    <i class="fas fa-star" style="color: var(--accent-gold);"></i>
                    <span></span>
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">
                @php
                    $featuredItems = [
                        [
                            'name' => 'Nasi Goreng Spesial JOSS', 
                            'price' => 45000, 
                            'desc' => 'Nasi goreng premium dengan ayam suwir, udang, telur, dan sayuran segar', 
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'Terlaris',
                            'icon' => 'fas fa-fire'
                        ],
                        [
                            'name' => 'Rendang Sapi Padang', 
                            'price' => 55000, 
                            'desc' => 'Rendang sapi dengan bumbu rempah lengkap, dimasak 8 jam', 
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'Premium',
                            'icon' => 'fas fa-crown'
                        ],
                        [
                            'name' => 'Soto Betawi', 
                            'price' => 38000, 
                            'desc' => 'Soto khas Jakarta dengan santan, daging sapi, dan rempah pilihan', 
                            'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'Spesial',
                            'icon' => 'fas fa-gem'
                        ],
                    ];
                @endphp
                
                @foreach($featuredItems as $index => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img src="{{ $item['image'] }}" 
                                     class="w-100 h-100" 
                                     alt="{{ $item['name'] }}" 
                                     style="object-fit: cover; transition: transform 0.5s ease;">
                                
                                @if($item['badge'])
                                    <div class="position-absolute top-3 start-3">
                                        <span class="badge px-3 py-2" 
                                              style="background: var(--primary-red); color: white; border-radius: 20px;">
                                            <i class="{{ $item['icon'] }} me-1"></i>
                                            {{ $item['badge'] }}
                                        </span>
                                    </div>
                                @endif
                                
                                <!-- Price Tag -->
                                <div class="position-absolute bottom-0 end-0 m-3">
                                    <div class="bg-white px-3 py-2 rounded-3 shadow">
                                        <span class="fw-bold" style="color: var(--primary-red);">
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-4">
                                <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">{{ $item['name'] }}</h5>
                                
                                <p class="text-muted mb-4" style="font-size: 0.95rem; line-height: 1.6;">
                                    {{ $item['desc'] }}
                                </p>
                                
                                <button class="btn btn-primary w-100 add-to-cart" 
                                        data-name="{{ $item['name'] }}" 
                                        data-price="{{ $item['price'] }}">
                                    <i class="fas fa-plus me-2"></i> Tambah ke Pesanan
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5 animate-fade-in" style="animation-delay: 0.4s;">
                <a href="{{ route('menu') }}" class="btn btn-primary btn-lg px-5 py-3">
                    <span>Lihat Menu Lengkap</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section-padding" style="background: linear-gradient(135deg, rgba(255, 249, 240, 0.5), rgba(255, 245, 230, 0.5));">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Keunggulan Kami</h2>
                <p class="text-muted mt-3">Apa yang membuat JOSS GANDOS istimewa</p>
                <div class="title-decoration">
                    <span></span>
                    <i class="fas fa-award" style="color: var(--primary-red);"></i>
                    <span></span>
                </div>
            </div>
            
            <div class="row g-4">
                @php
                    $values = [
                        ['icon' => 'fas fa-mortar-pestle', 'title' => 'Resep Otentik', 'desc' => 'Resep turun-temurun dari berbagai daerah Indonesia', 'color' => 'var(--primary-red)'],
                        ['icon' => 'fas fa-leaf', 'title' => 'Bahan Pilihan', 'desc' => 'Bahan segar langsung dari pasar tradisional terbaik', 'color' => 'var(--secondary-gold)'],
                        ['icon' => 'fas fa-user-chef', 'title' => 'Chef Berpengalaman', 'desc' => 'Diawasi oleh chef dengan sertifikasi nasional', 'color' => 'var(--accent-gold)'],
                        ['icon' => 'fas fa-handshake', 'title' => 'Pelayanan Ramah', 'desc' => 'Pelayanan dengan senyum khas Indonesia', 'color' => 'var(--primary-red)'],
                        ['icon' => 'fas fa-award', 'title' => 'Kualitas Terjamin', 'desc' => 'Standar higienis dan kualitas tertinggi', 'color' => 'var(--secondary-gold)'],
                        ['icon' => 'fas fa-users', 'title' => 'Komunitas Lokal', 'desc' => 'Mendukung petani dan produsen lokal', 'color' => 'var(--accent-gold)'],
                    ];
                @endphp
                
                @foreach($values as $index => $value)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="p-4 text-center">
                                <div class="mb-4">
                                    <div class="mx-auto" style="width: 70px; height: 70px; 
                                          background: linear-gradient(135deg, rgba(180, 34, 34, 0.1), rgba(212, 161, 23, 0.1)); 
                                          border-radius: 50%; display: flex; align-items: center; justify-content: center; 
                                          border: 2px solid rgba(212, 161, 23, 0.2);">
                                        <i class="{{ $value['icon'] }} fa-2x" style="color: {{ $value['color'] }};"></i>
                                    </div>
                                </div>
                                
                                <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal);">
                                    {{ $value['title'] }}
                                </h5>
                                
                                <p class="text-muted" style="line-height: 1.7; font-size: 0.95rem;">
                                    {{ $value['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Ulasan Pelanggan</h2>
                <p class="text-muted mt-3">Bagaimana mereka menikmati pengalaman di JOSS GANDOS</p>
                <div class="title-decoration">
                    <span></span>
                    <i class="fas fa-quote-right" style="color: var(--secondary-gold);"></i>
                    <span></span>
                </div>
            </div>
            
            <div class="row g-4">
                @php
                    $testimonials = [
                        [
                            'name' => 'Budi Santoso', 
                            'role' => 'Food Blogger', 
                            'avatar' => 'BS',
                            'text' => '"Nasi goreng spesial JOSS benar-benar autentik! Rasanya seperti buatan nenek saya dulu. Tempatnya nyaman dengan sentuhan modern yang tetap hangat."',
                            'rating' => 5
                        ],
                        [
                            'name' => 'Sari Dewi', 
                            'role' => 'Pelanggan Setia', 
                            'avatar' => 'SD',
                            'text' => '"Rendangnya lembut dan bumbunya meresap sempurna. Pelayanan ramah khas Indonesia membuat saya selalu kembali."',
                            'rating' => 5
                        ],
                        [
                            'name' => 'Rudi Hartono', 
                            'role' => 'Pengusaha', 
                            'avatar' => 'RH',
                            'text' => '"Sering bawa klien asing ke sini. Mereka terkesan dengan kuliner Indonesia. Perfect untuk memperkenalkan budaya kita."',
                            'rating' => 5
                        ],
                    ];
                @endphp
                
                @foreach($testimonials as $index => $testimonial)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="p-4">
                                <!-- Rating -->
                                <div class="mb-3" style="color: var(--accent-gold);">
                                    @for($i = 1; $i <= $testimonial['rating']; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                
                                <!-- Quote -->
                                <div class="mb-4 position-relative">
                                    <i class="fas fa-quote-left" style="color: var(--primary-red); opacity: 0.2; position: absolute; top: 0; left: 0;"></i>
                                    <p class="text-muted" style="line-height: 1.7; font-size: 0.95rem; padding-left: 20px;">
                                        {{ $testimonial['text'] }}
                                    </p>
                                </div>
                                
                                <!-- Author -->
                                <div class="d-flex align-items-center pt-3" style="border-top: 1px solid rgba(180, 34, 34, 0.1);">
                                    <div class="me-3">
                                        <div style="width: 45px; height: 45px; 
                                              background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                              border-radius: 50%; display: flex; align-items: center; justify-content: center; 
                                              color: white; font-weight: 600; font-size: 1rem;">
                                            {{ $testimonial['avatar'] }}
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold" style="color: var(--dark-charcoal);">{{ $testimonial['name'] }}</h6>
                                        <small class="text-muted">{{ $testimonial['role'] }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="text-white mb-3">Siap Menikmati Kelezatan Indonesia?</h3>
                    <p class="text-white-50 mb-0">
                        Jadikan momen spesial Anda lebih berarti dengan cita rasa autentik Nusantara
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="{{ route('reservation.create') }}" class="btn btn-light btn-lg px-4 py-3">
                        <i class="fas fa-calendar-alt me-2"></i> Pesan Meja Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* Image Hover Effects */
    .modern-card img {
        transition: transform 0.5s ease;
    }
    
    .modern-card:hover img {
        transform: scale(1.05);
    }
    
    /* Value Card Hover Effects */
    .modern-card:hover .fa-2x {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
    
    /* Button Animation */
    .btn-primary {
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }
    
    .btn-primary:hover::after {
        left: 100%;
    }
    
    /* Testimonial Card Effects */
    .fa-quote-left {
        transition: transform 0.3s ease;
    }
    
    .modern-card:hover .fa-quote-left {
        transform: scale(1.1);
    }
</style>
@endsection

@section('scripts')
<script>
    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-name');
            const originalHTML = this.innerHTML;
            
            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menambahkan...';
            this.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Success state
                this.innerHTML = '<i class="fas fa-check me-2"></i> Ditambahkan!';
                this.style.background = '#2a9d8f';
                
                // Show notification
                showNotification(`"${itemName}" berhasil ditambahkan ke pesanan`, 'success');
                
                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.disabled = false;
                    this.style.background = '';
                }, 2000);
            }, 800);
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
                          background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                          border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}"></i>
                    </div>
                </div>
                <div>
                    <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
                    <small class="text-muted">JOSS GANDOS Restoran</small>
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