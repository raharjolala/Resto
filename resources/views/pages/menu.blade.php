@extends('layouts.app')

@section('title', 'Menu Lengkap - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), url('https://images.unsplash.com/photo-1578474846511-04ba529f0b88?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Menu Lengkap<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Jelajahi keanekaragaman kuliner Indonesia dalam setiap sajian kami. 
                            Dari hidangan klasik hingga kreasi modern, semua dibuat dengan bahan terbaik.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-utensils me-1"></i> 50+ Menu
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-leaf me-1"></i> Vegetarian Options
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Content -->
    <section class="section-padding">
        <div class="container">
            <!-- Category Filter -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="animate-fade-in">
                            <h2 class="fw-bold mb-2" style="color: var(--dark-charcoal); font-size: 2.2rem;">Menu Kami</h2>
                            <p class="text-muted mb-0">Pilih kategori favorit Anda</p>
                        </div>
                        <div class="dropdown animate-fade-in" style="animation-delay: 0.1s;">
                            <button class="btn btn-outline-primary dropdown-toggle px-4 py-2" type="button" id="categoryFilter" data-bs-toggle="dropdown">
                                <i class="fas fa-filter me-2"></i> Filter Kategori
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" style="border-radius: 15px;">
                                <li><a class="dropdown-item" href="#" data-category="all">
                                    <i class="fas fa-list me-2"></i> Semua Menu
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" data-category="mains">
                                    <i class="fas fa-utensils me-2"></i> Menu Utama
                                </a></li>
                                <li><a class="dropdown-item" href="#" data-category="appetizers">
                                    <i class="fas fa-leaf me-2"></i> Appetizer
                                </a></li>
                                <li><a class="dropdown-item" href="#" data-category="drinks">
                                    <i class="fas fa-glass-whiskey me-2"></i> Minuman
                                </a></li>
                                <li><a class="dropdown-item" href="#" data-category="desserts">
                                    <i class="fas fa-ice-cream me-2"></i> Dessert
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Menu Items Grid -->
            <div class="row g-4">
                @php
                    $menuItems = [
                        [
                            'category' => 'mains',
                            'name' => 'Nasi Goreng Spesial JOSS',
                            'price' => 45000,
                            'desc' => 'Nasi goreng dengan ayam suwir, udang, telur, dan sayuran segar',
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 2,
                            'vegetarian' => false,
                            'featured' => true
                        ],
                        [
                            'category' => 'mains',
                            'name' => 'Ayam Penyet Sambal Terasi',
                            'price' => 42000,
                            'desc' => 'Ayam goreng krispi dengan sambal terasi dan lalapan segar',
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 4,
                            'vegetarian' => false,
                            'featured' => true
                        ],
                        [
                            'category' => 'mains',
                            'name' => 'Rendang Sapi Padang',
                            'price' => 55000,
                            'desc' => 'Rendang sapi dengan bumbu rempah khas Padang',
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 3,
                            'vegetarian' => false,
                            'featured' => true
                        ],
                        [
                            'category' => 'appetizers',
                            'name' => 'Lumpia Sayur',
                            'price' => 28000,
                            'desc' => 'Lumpia goreng dengan isian sayuran segar',
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 0,
                            'vegetarian' => true,
                            'featured' => false
                        ],
                        [
                            'category' => 'appetizers',
                            'name' => 'Sate Ayam',
                            'price' => 35000,
                            'desc' => 'Sate ayam dengan bumbu kacang khas',
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 2,
                            'vegetarian' => false,
                            'featured' => false
                        ],
                        [
                            'category' => 'drinks',
                            'name' => 'Es Teh Manis',
                            'price' => 12000,
                            'desc' => 'Es teh dengan gula aren asli',
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 0,
                            'vegetarian' => true,
                            'featured' => false
                        ],
                        [
                            'category' => 'drinks',
                            'name' => 'Wedang Jahe',
                            'price' => 18000,
                            'desc' => 'Minuman jahe hangat dengan madu',
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 0,
                            'vegetarian' => true,
                            'featured' => false
                        ],
                        [
                            'category' => 'desserts',
                            'name' => 'Es Campur',
                            'price' => 22000,
                            'desc' => 'Es campur dengan buah segar dan sirup special',
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                            'spicy' => 0,
                            'vegetarian' => true,
                            'featured' => false
                        ],
                    ];
                @endphp
                
                @foreach($menuItems as $index => $item)
                    <div class="col-lg-6 menu-item animate-fade-in" data-category="{{ $item['category'] }}" 
                         style="animation-delay: {{ $index * 0.05 }}s;">
                        <div class="modern-card h-100">
                            <div class="d-flex h-100">
                                <div class="position-relative" style="width: 150px; flex-shrink: 0;">
                                    <img src="{{ $item['image'] }}" 
                                         class="h-100 w-100" style="object-fit: cover;" alt="{{ $item['name'] }}">
                                    @if($item['featured'])
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <span class="badge px-2 py-1" style="background: var(--primary-red); color: white; font-size: 0.7rem;">
                                                <i class="fas fa-crown me-1"></i> FAVORIT
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4 flex-grow-1 d-flex flex-column">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal);">{{ $item['name'] }}</h4>
                                            <span class="fw-bold" style="color: var(--primary-red);">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                                        </div>
                                        <p class="mb-0" style="color: var(--warm-brown); font-size: 0.9rem; line-height: 1.6;">
                                            {{ $item['desc'] }}
                                        </p>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex gap-2">
                                                @if($item['spicy'] > 0)
                                                    <span class="badge" style="background: rgba(230, 57, 70, 0.1); color: #e63946;">
                                                        <i class="fas fa-pepper-hot me-1"></i> Pedas {{ $item['spicy'] }}/5
                                                    </span>
                                                @endif
                                                @if($item['vegetarian'])
                                                    <span class="badge" style="background: rgba(42, 157, 143, 0.1); color: #2a9d8f;">
                                                        <i class="fas fa-leaf me-1"></i> Vegetarian
                                                    </span>
                                                @endif
                                            </div>
                                            <button class="btn btn-sm px-3 add-to-cart" 
                                                    style="background: var(--primary-red); color: white; border-radius: 8px;"
                                                    data-name="{{ $item['name'] }}" 
                                                    data-price="{{ $item['price'] }}">
                                                <i class="fas fa-plus me-1"></i> Pesan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Order Note -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="p-4 text-center" style="background: rgba(180, 34, 34, 0.05);">
                            <h5 class="mb-3 fw-bold" style="color: var(--primary-red);">
                                <i class="fas fa-info-circle me-2"></i> Informasi Pesanan
                            </h5>
                            <p class="mb-0" style="color: var(--warm-brown);">
                                Untuk pemesanan catering atau acara spesial, silakan hubungi kami di 
                                <strong style="color: var(--primary-red);">(021) 1234-5678</strong> atau 
                                <a href="/contact" style="color: var(--primary-red); text-decoration: none;">klik di sini</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .menu-item {
        transition: all 0.3s ease;
    }
    
    .btn-outline-primary {
        border: 2px solid var(--primary-red);
        color: var(--primary-red);
        border-radius: 10px;
    }
    
    .btn-outline-primary:hover {
        background: var(--primary-red);
        color: white;
    }
    
    .dropdown-item:hover {
        background: rgba(180, 34, 34, 0.1);
        color: var(--primary-red);
    }
    
    .add-to-cart {
        transition: all 0.3s ease;
    }
    
    .add-to-cart:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(180, 34, 34, 0.3);
    }
</style>
@endsection

@section('scripts')
<script>
    // Category filter functionality
    document.querySelectorAll('.dropdown-item[data-category]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const category = this.getAttribute('data-category');
            
            // Update dropdown button text
            document.getElementById('categoryFilter').innerHTML = 
                `<i class="fas fa-filter me-2"></i> ${this.textContent.trim()}`;
            
            // Filter menu items
            document.querySelectorAll('.menu-item').forEach(menuItem => {
                if (category === 'all' || menuItem.getAttribute('data-category') === category) {
                    menuItem.style.display = 'block';
                    menuItem.style.animation = 'fadeInUp 0.5s ease';
                } else {
                    menuItem.style.animation = 'fadeOut 0.3s ease';
                    setTimeout(() => {
                        menuItem.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-name');
            const itemPrice = this.getAttribute('data-price');
            
            // Animation
            const originalHTML = this.innerHTML;
            this.innerHTML = '<i class="fas fa-check me-1"></i> Ditambahkan';
            this.style.background = '#2a9d8f';
            
            // Create notification
            createNotification('success', `${itemName} berhasil ditambahkan ke keranjang!`);
            
            // Reset button after 2 seconds
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.style.background = '';
            }, 2000);
        });
    });
    
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
        
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                notification.style.transition = 'all 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }
        }, 3000);
    }
    
    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(10px); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection