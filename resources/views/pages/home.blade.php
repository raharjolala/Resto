@extends('layouts.app')

@section('title', 'JOSS GANDOS - Restoran Indonesia Modern')

@section('content')
    <!-- Hero Section with Indonesian Elegance -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content animate-fade-in">
                        <div class="mb-4">
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.15); color: white; border-radius: 6px;">
                                <i class="fas fa-star me-1"></i> #1 Restoran Indonesia di Jakarta
                            </span>
                        </div>
                        <h1 class="hero-title">
                            Rasa <span class="highlight">Nusantara</span><br>
                            dalam Setiap <span class="highlight">Sajian</span>
                        </h1>
                        <p class="hero-subtitle">
                            Mengangkat kelezatan kuliner Indonesia dengan sentuhan modern yang elegan. 
                            Setiap hidangan adalah cerita tentang warisan dan inovasi.
                        </p>
                        <div class="mt-5 d-flex flex-wrap gap-3">
                            <a href="/menu" class="btn btn-primary btn-lg">
                                <i class="fas fa-utensils me-2"></i> Lihat Menu
                            </a>
                            <a href="/reservation" class="btn btn-outline-light btn-lg" style="border: 2px solid rgba(255, 255, 255, 0.3);">
                                <i class="fas fa-calendar-check me-2"></i> Reservasi Meja
                            </a>
                        </div>
                        
                        <!-- Traditional Decorative Element -->
                        <div class="mt-5 pt-4" style="border-top: 1px solid rgba(255, 255, 255, 0.1); position: relative;">
                            <div class="d-flex align-items-center justify-content-between">
                                <small style="color: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-leaf me-1"></i> Bahan Lokal Terbaik
                                </small>
                                <small style="color: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-history me-1"></i> Resep Turun-temurun
                                </small>
                                <small style="color: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-heart me-1"></i> Disajikan dengan Cinta
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu - Indonesian Style -->
    <section class="section-padding" style="background: linear-gradient(135deg, rgba(255, 249, 240, 0.5), rgba(255, 245, 230, 0.5));">
        <div class="container">
            <div class="section-title animate-fade-in">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div style="width: 60px; height: 3px; background: linear-gradient(90deg, transparent, var(--primary-red), transparent);"></div>
                    <div class="mx-3" style="color: var(--primary-red);">
                        <i class="fas fa-star"></i>
                    </div>
                    <div style="width: 60px; height: 3px; background: linear-gradient(90deg, transparent, var(--secondary-gold), transparent);"></div>
                </div>
                <h2>Menu Andalan</h2>
                <p class="text-muted">Hidangan istimewa yang menjadi favorit pelanggan kami</p>
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
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'Spesial',
                            'icon' => 'fas fa-gem'
                        ],
                    ];
                @endphp
                
                @foreach($featuredItems as $index => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s; position: relative; overflow: hidden;">
                            <!-- Decorative Corner -->
                            <div style="position: absolute; top: 0; right: 0; width: 60px; height: 60px; background: var(--primary-red); clip-path: polygon(100% 0, 0 0, 100% 100%); z-index: 1;">
                                <i class="{{ $item['icon'] }}" style="position: absolute; top: 8px; right: 8px; color: white; font-size: 0.8rem;"></i>
                            </div>
                            
                            <div class="p-0">
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    <img src="{{ $item['image'] }}" 
                                         class="w-100 h-100" alt="{{ $item['name'] }}" 
                                         style="object-fit: cover; transition: transform 0.5s ease;">
                                    @if($item['badge'])
                                        <div class="position-absolute top-3 start-3">
                                            <span class="badge px-3 py-2" style="background: var(--primary-red); color: white; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                                                {{ $item['badge'] }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="p-4">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal);">{{ $item['name'] }}</h4>
                                        <span class="fw-bold" style="color: var(--primary-red);">
                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                        </span>
                                    </div>
                                    
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
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5 animate-fade-in">
                <a href="/menu" class="btn btn-primary btn-lg px-5" style="position: relative; overflow: hidden;">
                    <span>Lihat Menu Lengkap</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                    <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);"></div>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us - Indonesian Values -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title animate-fade-in">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div style="width: 40px; height: 3px; background: var(--primary-red);"></div>
                    <div class="mx-3" style="color: var(--primary-red); font-size: 1.5rem;">
                        ✦
                    </div>
                    <div style="width: 40px; height: 3px; background: var(--secondary-gold);"></div>
                </div>
                <h2>Nilai Keunggulan Kami</h2>
                <p class="text-muted">Prinsip yang menjadikan JOSS GANDOS berbeda</p>
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
                            <div class="p-4 text-center position-relative">
                                <!-- Decorative Border -->
                                <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));"></div>
                                
                                <div class="mb-4">
                                    <div class="mx-auto" style="width: 70px; height: 70px; background: linear-gradient(135deg, rgba(180, 34, 34, 0.1), rgba(212, 161, 23, 0.1)); 
                                            border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 2px solid rgba(212, 161, 23, 0.2);">
                                        <i class="{{ $value['icon'] }} fa-2x" style="color: {{ $value['color'] }};"></i>
                                    </div>
                                </div>
                                <h5 class="fw-bold mb-3" style="color: var(--dark-charcoal); position: relative; padding-bottom: 15px;">
                                    {{ $value['title'] }}
                                    <div style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 30px; height: 2px; background: {{ $value['color'] }};"></div>
                                </h5>
                                <p style="color: var(--warm-brown); line-height: 1.7; font-size: 0.95rem;">
                                    {{ $value['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials - Indonesian Style -->
    <section class="section-padding" style="background: linear-gradient(135deg, rgba(180, 34, 34, 0.02), rgba(212, 161, 23, 0.02));">
        <div class="container">
            <div class="section-title animate-fade-in">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div style="width: 60px; height: 2px; background: var(--warm-brown); opacity: 0.3;"></div>
                    <div class="mx-3" style="color: var(--accent-gold);">
                        <i class="fas fa-quote-right fa-rotate-180"></i>
                        <i class="fas fa-quote-right"></i>
                    </div>
                    <div style="width: 60px; height: 2px; background: var(--warm-brown); opacity: 0.3;"></div>
                </div>
                <h2>Ulasan Pelanggan</h2>
                <p class="text-muted">Bagaimana mereka menikmati pengalaman kuliner di JOSS GANDOS</p>
            </div>
            
            <div class="row g-4">
                @php
                    $testimonials = [
                        [
                            'name' => 'Budi Santoso', 
                            'role' => 'Food Blogger', 
                            'avatar' => 'BS',
                            'text' => '"Nasi goreng spesial JOSS benar-benar autentik! Rasanya seperti buatan nenek saya dulu. Tempatnya nyaman dengan sentuhan modern yang tetap hangat."'
                        ],
                        [
                            'name' => 'Sari Dewi', 
                            'role' => 'Pelanggan Setia', 
                            'avatar' => 'SD',
                            'text' => '"Rendangnya lembut dan bumbunya meresap sempurna. Pelayanan ramah khas Indonesia membuat saya selalu kembali."'
                        ],
                        [
                            'name' => 'Rudi Hartono', 
                            'role' => 'Pengusaha', 
                            'avatar' => 'RH',
                            'text' => '"Sering bawa klien asing ke sini. Mereka terkesan dengan kuliner Indonesia. Perfect untuk memperkenalkan budaya kita."'
                        ],
                    ];
                @endphp
                
                @foreach($testimonials as $index => $testimonial)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="p-4">
                                <div class="mb-3" style="color: var(--accent-gold);">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                
                                <div class="mb-4 position-relative">
                                    <i class="fas fa-quote-left fa-lg" style="color: var(--primary-red); opacity: 0.2; position: absolute; top: -5px; left: -5px;"></i>
                                    <p style="color: var(--warm-brown); line-height: 1.7; font-size: 0.95rem; position: relative; padding-left: 20px;">
                                        {{ $testimonial['text'] }}
                                    </p>
                                </div>
                                
                                <div class="d-flex align-items-center pt-3 border-top" style="border-color: rgba(180, 34, 34, 0.1) !important;">
                                    <div class="me-3">
                                        <div style="width: 45px; height: 45px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; 
                                                    color: white; font-weight: 600; font-size: 1rem; box-shadow: 0 4px 10px rgba(178, 34, 34, 0.2);">
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

    <!-- CTA Section - Indonesian Elegance -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark)); position: relative; overflow: hidden;">
        <!-- Decorative Pattern -->
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.05;">
            <div style="position: absolute; top: 20%; left: 10%; font-size: 3rem; color: white;">❖</div>
            <div style="position: absolute; bottom: 20%; right: 10%; font-size: 3rem; color: white;">❖</div>
        </div>
        
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="text-white mb-3">Siap Menikmati Kelezatan Indonesia?</h3>
                    <p class="text-white-50 mb-0">
                        Jadikan momen spesial Anda lebih berarti dengan cita rasa autentik Nusantara
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/reservation" class="btn btn-light btn-lg px-4 py-3" style="border-radius: 12px; font-weight: 600; position: relative; overflow: hidden;">
                        <i class="fas fa-calendar-alt me-2"></i> Pesan Meja
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--primary-red), transparent);"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* Enhanced Indonesian Card Hover Effects */
    .modern-card img {
        transition: transform 0.5s ease;
    }
    
    .modern-card:hover img {
        transform: scale(1.05);
    }
    
    /* Button Glow Effect */
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
    
    /* Testimonial Card Special Effects */
    .modern-card .fa-quote-left {
        transition: transform 0.3s ease;
    }
    
    .modern-card:hover .fa-quote-left {
        transform: scale(1.1);
    }
</style>
@endsection

@section('scripts')
<script>
    // Enhanced Add to cart functionality with Indonesian style
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-name');
            const originalHTML = this.innerHTML;
            
            // Show loading state with Indonesian style
            this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Menambahkan...';
            this.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Success state
                this.innerHTML = '<i class="fas fa-check me-2"></i> Ditambahkan!';
                this.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
                
                // Show elegant Indonesian notification
                showIndonesianNotification('success', `"${itemName}" berhasil ditambahkan ke pesanan`);
                
                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = originalHTML;
                    this.disabled = false;
                    this.style.background = '';
                }, 2000);
            }, 800);
        });
    });
    
    // Indonesian Style Notification
    function showIndonesianNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = 'notification-indonesian';
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: white;
            border-left: 4px solid ${type === 'success' ? '#2a9d8f' : '#e63946'};
            border-radius: 12px;
            padding: 16px 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
            max-width: 350px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: 1px solid rgba(180, 34, 34, 0.1);
        `;
        
        notification.innerHTML = `
            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                        border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 4px 10px rgba(178, 34, 34, 0.2);">
                <i class="fas fa-${type === 'success' ? 'check' : 'exclamation'}"></i>
            </div>
            <div>
                <strong class="d-block" style="color: var(--dark-charcoal); margin-bottom: 4px;">${message}</strong>
                <small style="color: var(--warm-brown);">JOSS GANDOS Restoran</small>
            </div>
            <button type="button" class="btn-close" style="margin-left: auto;" onclick="this.parentElement.remove()"></button>
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