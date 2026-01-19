<!-- home.blade.php -->
@extends('layouts.app')

@section('title', 'JOSS GANDOS - Restoran Indonesia Modern')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Cita Rasa Autentik<br>
                            <span>Indonesia</span> Modern
                        </h1>
                        <p class="hero-subtitle">
                            Setiap hidangan kami adalah perpaduan sempurna antara resep tradisional dan sentuhan modern. 
                            Nikmati pengalaman kuliner yang tak terlupakan di tengah suasana yang hangat dan elegan.
                        </p>
                        <div class="mt-5 d-flex flex-wrap gap-3">
                            <a href="/menu" class="btn btn-primary btn-lg">
                                <i class="fas fa-utensils me-2"></i> LIHAT MENU
                            </a>
                            <a href="/reservation" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-calendar-check me-2"></i> RESERVASI
                            </a>
                        </div>
                        <div class="mt-5 d-flex flex-wrap gap-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star me-2" style="color: var(--accent-gold);"></i>
                                <span>Rating 4.9/5.0</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-clock me-2" style="color: var(--accent-gold);"></i>
                                <span>Buka Setiap Hari</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-truck me-2" style="color: var(--accent-gold);"></i>
                                <span>Gratis Ongkir</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="position-relative animate-float">
                        <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-4 shadow-lg" alt="Signature Dish"
                             style="border: 5px solid white; transform: rotate(3deg);">
                        <div class="position-absolute bottom-0 start-0 translate-middle">
                            <div class="bg-white p-3 rounded-3 shadow" style="transform: rotate(-5deg);">
                                <h5 class="mb-0 text-dark fw-bold">Chef's Special</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section class="section-padding" id="featured-menu">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Menu Andalan</h2>
                <p>Hidangan istimewa yang selalu dinanti pelanggan setia kami</p>
            </div>
            
            <div class="row g-4">
                @php
                    $featuredItems = [
                        [
                            'name' => 'Nasi Goreng Spesial JOSS', 
                            'price' => 45000, 
                            'desc' => 'Nasi goreng dengan daging ayam suwir, udang, telur, dan sayuran segar, disajikan dengan kerupuk', 
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'BEST SELLER'
                        ],
                        [
                            'name' => 'Ayam Penyet Sambal Terasi', 
                            'price' => 42000, 
                            'desc' => 'Ayam goreng krispi dengan sambal terasi khas dan lalapan segar, disajikan dengan nasi panas', 
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'SPICY'
                        ],
                        [
                            'name' => 'Rendang Sapi Padang', 
                            'price' => 55000, 
                            'desc' => 'Rendang sapi dengan bumbu rempah lengkap khas Padang, dimasak 8 jam', 
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'badge' => 'PREMIUM'
                        ],
                    ];
                @endphp
                
                @foreach($featuredItems as $index => $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            @if($item['badge'])
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge px-3 py-2" 
                                          style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); color: white; border-radius: 20px;">
                                        {{ $item['badge'] }}
                                    </span>
                                </div>
                            @endif
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img src="{{ $item['image'] }}" 
                                     class="w-100 h-100" alt="{{ $item['name'] }}" 
                                     style="object-fit: cover;">
                            </div>
                            <div class="p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal);">{{ $item['name'] }}</h4>
                                    <span class="fw-bold" style="color: var(--primary-red); font-size: 1.2rem;">
                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                    </span>
                                </div>
                                <p class="mb-4" style="color: var(--warm-brown); line-height: 1.6;">
                                    {{ $item['desc'] }}
                                </p>
                                <button class="btn btn-primary w-100 py-2 add-to-cart" 
                                        data-name="{{ $item['name'] }}" 
                                        data-price="{{ $item['price'] }}">
                                    <i class="fas fa-plus me-2"></i> Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="text-center mt-5 animate-fade-in">
                <a href="/menu" class="btn btn-lg px-5" 
                   style="background: transparent; border: 2px solid var(--primary-red); color: var(--primary-red);">
                    LIHAT MENU LENGKAP <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="section-padding" style="background: var(--light-gray);">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Mengapa Memilih Kami</h2>
                <p>Keunggulan yang membuat pengalaman makan Anda lebih berarti</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4 animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="mb-4">
                            <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1);">
                                <i class="fas fa-leaf fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3">Bahan Segar</h5>
                        <p style="color: var(--warm-brown);">
                            Bahan-bahan pilihan yang selalu segar, dipilih langsung dari pasar terbaik
                        </p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4 animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="mb-4">
                            <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1);">
                                <i class="fas fa-user-chef fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3">Chef Profesional</h5>
                        <p style="color: var(--warm-brown);">
                            Di tangan chef berpengalaman dengan sertifikasi internasional
                        </p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4 animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="mb-4">
                            <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1);">
                                <i class="fas fa-award fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3">Resep Autentik</h5>
                        <p style="color: var(--warm-brown);">
                            Resep turun-temurun yang dijaga keasliannya selama puluhan tahun
                        </p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-4 animate-fade-in" style="animation-delay: 0.4s;">
                        <div class="mb-4">
                            <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1);">
                                <i class="fas fa-shipping-fast fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mb-3">Pengiriman Cepat</h5>
                        <p style="color: var(--warm-brown);">
                            Makanan tetap panas dan segar sampai ke tangan Anda
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-padding">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Apa Kata Mereka</h2>
                <p>Testimoni dari pelanggan yang sudah merasakan kelezatan masakan kami</p>
            </div>
            
            <div class="row g-4">
                @php
                    $testimonials = [
                        [
                            'name' => 'Budi Santoso', 
                            'role' => 'Food Blogger', 
                            'avatar' => 'B',
                            'text' => '"Nasi goreng spesial JOSS benar-benar istimewa! Rasanya autentik, bahan-bahannya segar, dan penyajiannya sangat menarik. Sudah jadi tempat favorit keluarga."'
                        ],
                        [
                            'name' => 'Sari Dewi', 
                            'role' => 'Pelanggan Setia', 
                            'avatar' => 'S',
                            'text' => '"Ayam penyetnya luar biasa! Sambalnya pas pedasnya, ayamnya krispi di luar lembut di dalam. Pelayanan ramah dan tempatnya nyaman."'
                        ],
                        [
                            'name' => 'Rudi Hartono', 
                            'role' => 'Pengusaha', 
                            'avatar' => 'R',
                            'text' => '"Sering bawa klien bisnis ke sini. Makanan enak, suasana elegan tapi tetap hangat. Perfect untuk meeting bisnis sambil menikmati kuliner Indonesia."'
                        ],
                    ];
                @endphp
                
                @foreach($testimonials as $index => $testimonial)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="p-4">
                                <div class="mb-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star me-1" style="color: var(--accent-gold);"></i>
                                    @endfor
                                </div>
                                <p class="mb-4" style="color: var(--warm-brown); font-style: italic; line-height: 1.8;">
                                    {{ $testimonial['text'] }}
                                </p>
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 1.2rem;">
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
                    <h3 class="text-white mb-3">Siap menikmati pengalaman kuliner terbaik?</h3>
                    <p class="text-white opacity-90 mb-0">Pesan sekarang dan rasakan kelezatan autentik Indonesia</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/reservation" class="btn btn-light btn-lg px-5">
                        <i class="fas fa-calendar-alt me-2"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), 
                    url('https://images.unsplash.com/photo-1578474846511-04ba529f0b88?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') !important;
    }
    
    .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }
    
    .add-to-cart {
        position: relative;
        overflow: hidden;
    }
    
    .add-to-cart::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .add-to-cart:active::after {
        width: 300px;
        height: 300px;
    }
</style>
@endsection

@section('scripts')
<script>
    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-name');
            const itemPrice = this.getAttribute('data-price');
            
            // Animation
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-2"></i> Ditambahkan';
            this.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
            
            // Create notification
            createNotification('success', `${itemName} berhasil ditambahkan ke keranjang!`);
            
            // Reset button after 2 seconds
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.style.background = '';
            }, 2000);
        });
    });
    
    // Notification function
    function createNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed top-0 end-0 m-4 shadow`;
        notification.style.zIndex = '9999';
        notification.style.borderRadius = '10px';
        notification.style.border = '2px solid var(--primary-red)';
        notification.style.background = 'white';
        notification.style.animation = 'slideInRight 0.3s ease-out';
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-3" style="color: var(--primary-red); font-size: 1.2rem;"></i>
                <div>
                    <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
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
    }
    
    // Add CSS animation
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