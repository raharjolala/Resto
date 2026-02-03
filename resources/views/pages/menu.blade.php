@extends('layouts.app')

@section('title', 'Menu Digital - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), url('https://images.unsplash.com/photo-1578474846511-04ba529f0b88?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Jelajahi Kelezatan<br>
                            <span class="highlight">Nusantara</span>
                        </h1>
                        <p class="hero-subtitle">
                            Dari Sabang sampai Merauke, setiap sajian adalah perjalanan rasa yang tak terlupakan. 
                            Temukan favorit baru Anda di sini.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(180, 34, 34, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-utensils me-1"></i> Menu Digital Interaktif
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-hand-pointer me-1"></i> Klik & Pesan
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="hero-decoration animate-float">
                        <div class="decoration-circle">
                            <i class="fas fa-pepper-hot"></i>
                        </div>
                        <div class="decoration-line"></div>
                        <div class="decoration-circle">
                            <i class="fas fa-leaf"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Categories Navigation -->
    <section class="py-5" style="background: linear-gradient(to bottom, rgba(255, 249, 240, 0.95), rgba(255, 249, 240, 0.8));">
        <div class="container">
            <div class="text-center mb-5">
                <div class="section-title mb-4">
                    <h2 class="mb-3" style="font-size: 2.5rem; color: var(--dark-charcoal);">
                        Menu <span style="color: var(--primary-red);">Digital</span>
                    </h2>
                    <div class="title-decoration">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <p class="text-muted fs-5">Pilih kategori untuk menjelajahi kelezatan Nusantara</p>
            </div>
            
            <div class="row justify-content-center g-4">
                <div class="col-lg-10">
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5" id="menuCategories">
                        <button class="category-btn active" data-category="all">
                            <div class="category-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <span>Semua</span>
                        </button>
                        <button class="category-btn" data-category="main">
                            <div class="category-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <span>Menu Utama</span>
                        </button>
                        <button class="category-btn" data-category="appetizer">
                            <div class="category-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <span>Pembuka</span>
                        </button>
                        <button class="category-btn" data-category="drink">
                            <div class="category-icon">
                                <i class="fas fa-glass-whiskey"></i>
                            </div>
                            <span>Minuman</span>
                        </button>
                        <button class="category-btn" data-category="dessert">
                            <div class="category-icon">
                                <i class="fas fa-ice-cream"></i>
                            </div>
                            <span>Dessert</span>
                        </button>
                        <button class="category-btn" data-category="special">
                            <div class="category-icon">
                                <i class="fas fa-crown"></i>
                            </div>
                            <span>Spesial</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-6">
                    <div class="menu-search-container">
                        <div class="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" class="search-input" id="menuSearch" 
                               placeholder="Cari menu favorit Anda...">
                        <div class="search-decoration">
                            <i class="fas fa-pepper-hot"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Items Grid -->
    <section class="section-padding wood-bg">
        <div class="container">
            <!-- Menu Stats -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="menu-stats-card modern-card">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <div class="stats-item">
                                    <div class="stats-icon" style="background: rgba(178, 34, 34, 0.1);">
                                        <i class="fas fa-utensils" style="color: var(--primary-red);"></i>
                                    </div>
                                    <h4 class="stats-number mt-3" id="totalItems">20</h4>
                                    <p class="stats-label">Total Menu</p>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="stats-item">
                                    <div class="stats-icon" style="background: rgba(212, 160, 23, 0.1);">
                                        <i class="fas fa-crown" style="color: var(--secondary-gold);"></i>
                                    </div>
                                    <h4 class="stats-number mt-3" id="specialItems">5</h4>
                                    <p class="stats-label">Menu Spesial</p>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="stats-item">
                                    <div class="stats-icon" style="background: rgba(42, 157, 143, 0.1);">
                                        <i class="fas fa-leaf" style="color: #2a9d8f;"></i>
                                    </div>
                                    <h4 class="stats-number mt-3" id="vegItems">3</h4>
                                    <p class="stats-label">Vegetarian</p>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="stats-item">
                                    <div class="stats-icon" style="background: rgba(230, 57, 70, 0.1);">
                                        <i class="fas fa-pepper-hot" style="color: #e63946;"></i>
                                    </div>
                                    <h4 class="stats-number mt-3" id="spicyItems">8</h4>
                                    <p class="stats-label">Menu Pedas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Grid -->
            <div class="row g-4" id="menuGrid">
                @php
                    $menuItems = [
                        // Menu Utama
                        [
                            'id' => 1,
                            'name' => 'Nasi Goreng Spesial JOSS',
                            'description' => 'Nasi goreng dengan ayam suwir premium, udang segar, telur mata sapi, dan sayuran pilihan. Dibumbui rempah khas Indonesia yang membuatnya istimewa.',
                            'price' => 45000,
                            'category' => 'main',
                            'image' => 'https://images.unsplash.com/photo-1551189018-2c6c2b72d5c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['best_seller', 'spicy'],
                            'spicy_level' => 2,
                            'cooking_time' => '15 menit',
                            'calories' => '650 kcal',
                            'popularity' => 95
                        ],
                        [
                            'id' => 2,
                            'name' => 'Rendang Sapi Padang',
                            'description' => 'Daging sapi pilihan dimasak selama 8 jam dengan rempah-rempah khas Padang. Tekstur empuk dan bumbu meresap sempurna.',
                            'price' => 55000,
                            'category' => 'main',
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['best_seller', 'spicy', 'premium'],
                            'spicy_level' => 3,
                            'cooking_time' => '8 jam',
                            'calories' => '720 kcal',
                            'popularity' => 98
                        ],
                        [
                            'id' => 3,
                            'name' => 'Ayam Penyet Sambal Terasi',
                            'description' => 'Ayam kampung goreng krispi disajikan dengan sambal terasi pedas, lalapan segar, dan nasi putih panas.',
                            'price' => 42000,
                            'category' => 'main',
                            'image' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['spicy'],
                            'spicy_level' => 4,
                            'cooking_time' => '25 menit',
                            'calories' => '580 kcal',
                            'popularity' => 88
                        ],
                        [
                            'id' => 4,
                            'name' => 'Soto Betawi',
                            'description' => 'Soto khas Jakarta dengan kuah santan gurih, daging sapi, jeroan, dan emping melinjo. Disajikan dengan nasi atau ketupat.',
                            'price' => 38000,
                            'category' => 'main',
                            'image' => 'https://images.unsplash.com/photo-1547592180-85f173990554?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => [],
                            'spicy_level' => 1,
                            'cooking_time' => '40 menit',
                            'calories' => '520 kcal',
                            'popularity' => 85
                        ],
                        [
                            'id' => 5,
                            'name' => 'Gado-Gado Jakarta',
                            'description' => 'Salad khas Indonesia dengan sayuran segar, telur, tahu, tempe, dan bumbu kacang spesial. Makanan sehat dan bergizi.',
                            'price' => 35000,
                            'category' => 'main',
                            'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['vegetarian'],
                            'spicy_level' => 1,
                            'cooking_time' => '20 menit',
                            'calories' => '420 kcal',
                            'popularity' => 82
                        ],
                        [
                            'id' => 6,
                            'name' => 'Nasi Liwet Sunda',
                            'description' => 'Nasi liwet khas Sunda dengan ikan asin, ayam, telur, dan sayuran. Dimasak dengan rempah tradisional.',
                            'price' => 40000,
                            'category' => 'main',
                            'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['traditional'],
                            'spicy_level' => 2,
                            'cooking_time' => '45 menit',
                            'calories' => '610 kcal',
                            'popularity' => 87
                        ],

                        // Pembuka & Sup
                        [
                            'id' => 7,
                            'name' => 'Lumpia Sayur',
                            'description' => 'Lumpia renyah dengan isian sayuran segar dan daging ayam cincang. Disajikan dengan saus asam manis.',
                            'price' => 28000,
                            'category' => 'appetizer',
                            'image' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['vegetarian', 'best_seller'],
                            'spicy_level' => 0,
                            'cooking_time' => '15 menit',
                            'calories' => '280 kcal',
                            'popularity' => 90
                        ],
                        [
                            'id' => 8,
                            'name' => 'Sate Ayam',
                            'description' => '10 tusuk sate ayam dengan bumbu kacang khas. Disajikan dengan lontong, bawang goreng, dan kecap manis.',
                            'price' => 35000,
                            'category' => 'appetizer',
                            'image' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => [],
                            'spicy_level' => 2,
                            'cooking_time' => '20 menit',
                            'calories' => '320 kcal',
                            'popularity' => 92
                        ],
                        [
                            'id' => 9,
                            'name' => 'Pempek Palembang',
                            'description' => 'Pempek ikan tenggiri dengan cuko khas Palembang. Tekstur kenyal dengan rasa gurih yang khas.',
                            'price' => 32000,
                            'category' => 'appetizer',
                            'image' => 'https://images.unsplash.com/photo-1551189018-2c6c2b72d5c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => [],
                            'spicy_level' => 1,
                            'cooking_time' => '30 menit',
                            'calories' => '290 kcal',
                            'popularity' => 84
                        ],

                        // Minuman
                        [
                            'id' => 10,
                            'name' => 'Es Teh Manis',
                            'description' => 'Es teh dengan gula aren asli yang memberikan rasa manis alami. Menyegarkan dan cocok untuk semua menu.',
                            'price' => 12000,
                            'category' => 'drink',
                            'image' => 'https://images.unsplash.com/photo-1561047029-3000c68339ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => [],
                            'spicy_level' => 0,
                            'temperature' => 'dingin',
                            'calories' => '80 kcal',
                            'popularity' => 95
                        ],
                        [
                            'id' => 11,
                            'name' => 'Wedang Jahe',
                            'description' => 'Minuman hangat dari jahe segar dengan madu asli. Menghangatkan badan dan baik untuk kesehatan.',
                            'price' => 18000,
                            'category' => 'drink',
                            'image' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['healthy'],
                            'spicy_level' => 0,
                            'temperature' => 'panas',
                            'calories' => '60 kcal',
                            'popularity' => 88
                        ],
                        [
                            'id' => 12,
                            'name' => 'Es Cincau',
                            'description' => 'Cincau hitam dengan sirup gula merah dan santan. Minuman tradisional yang menyegarkan.',
                            'price' => 15000,
                            'category' => 'drink',
                            'image' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['best_seller', 'traditional'],
                            'spicy_level' => 0,
                            'temperature' => 'dingin',
                            'calories' => '120 kcal',
                            'popularity' => 93
                        ],

                        // Pencuci Mulut
                        [
                            'id' => 13,
                            'name' => 'Es Campur',
                            'description' => 'Es campur dengan buah-buahan segar, kolang-kaling, nata de coco, dan sirup vanila. Semangkuk kesegaran.',
                            'price' => 22000,
                            'category' => 'dessert',
                            'image' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['best_seller', 'sweet'],
                            'spicy_level' => 0,
                            'temperature' => 'dingin',
                            'calories' => '280 kcal',
                            'popularity' => 96
                        ],
                        [
                            'id' => 14,
                            'name' => 'Klepon',
                            'description' => 'Kue tradisional berisi gula merah dengan baluran kelapa parut. Manis legit dan kenyal.',
                            'price' => 18000,
                            'category' => 'dessert',
                            'image' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['traditional'],
                            'spicy_level' => 0,
                            'temperature' => 'normal',
                            'calories' => '150 kcal',
                            'popularity' => 89
                        ],

                        // Spesial Menu
                        [
                            'id' => 15,
                            'name' => 'Bebek Goreng JOSS',
                            'description' => 'Bebek pilihan digoreng krispi dengan bumbu rahasia khas JOSS GANDOS. Disajikan dengan sambal matah dan nasi.',
                            'price' => 65000,
                            'category' => 'special',
                            'image' => 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['signature', 'spicy', 'premium'],
                            'spicy_level' => 3,
                            'cooking_time' => '40 menit',
                            'calories' => '780 kcal',
                            'popularity' => 97
                        ],
                        [
                            'id' => 16,
                            'name' => 'Gurame Bakar Bumbu Rujak',
                            'description' => 'Gurame segar dibakar dengan bumbu rujak khas. Rasa manis, asam, pedas yang seimbang.',
                            'price' => 75000,
                            'category' => 'special',
                            'image' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'tags' => ['signature', 'spicy'],
                            'spicy_level' => 4,
                            'cooking_time' => '30 menit',
                            'calories' => '620 kcal',
                            'popularity' => 94
                        ],
                    ];
                @endphp

                @foreach($menuItems as $item)
                <div class="col-lg-4 col-md-6 menu-card-item" data-category="{{ $item['category'] }}">
                    <div class="modern-card menu-card" data-item-id="{{ $item['id'] }}">
                        <!-- Card Image -->
                        <div class="menu-card-img">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid">
                            <div class="menu-card-overlay">
                                <button class="quick-view-btn" data-bs-toggle="modal" data-bs-target="#detailModal" data-item='@json($item)'>
                                    <i class="fas fa-eye"></i> Detail
                                </button>
                            </div>
                            
                            <!-- Badges -->
                            <div class="menu-badges">
                                @if(in_array('best_seller', $item['tags']))
                                <div class="menu-badge best-seller">
                                    <i class="fas fa-crown"></i> Best Seller
                                </div>
                                @endif
                                @if(in_array('signature', $item['tags']))
                                <div class="menu-badge signature">
                                    <i class="fas fa-star"></i> Signature
                                </div>
                                @endif
                                @if(isset($item['popularity']) && $item['popularity'] > 90)
                                <div class="menu-badge popularity">
                                    <i class="fas fa-fire"></i> {{ $item['popularity'] }}%
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Card Content -->
                        <div class="menu-card-body">
                            <div class="menu-card-header">
                                <h3 class="menu-card-title">{{ $item['name'] }}</h3>
                                <div class="menu-card-price">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </div>
                            </div>
                            
                            <p class="menu-card-desc">{{ Str::limit($item['description'], 90) }}</p>
                            
                            <!-- Tags -->
                            <div class="menu-card-tags mb-3">
                                @if(in_array('vegetarian', $item['tags']))
                                <span class="menu-tag veg">
                                    <i class="fas fa-leaf"></i> Vegetarian
                                </span>
                                @endif
                                @if(in_array('spicy', $item['tags']) && isset($item['spicy_level']))
                                <span class="menu-tag spicy">
                                    @for($i = 0; $i < min($item['spicy_level'], 3); $i++)
                                        <i class="fas fa-pepper-hot"></i>
                                    @endfor
                                    Pedas
                                </span>
                                @endif
                                @if(in_array('traditional', $item['tags']))
                                <span class="menu-tag traditional">
                                    <i class="fas fa-landmark"></i> Tradisional
                                </span>
                                @endif
                                @if(in_array('premium', $item['tags']))
                                <span class="menu-tag premium">
                                    <i class="fas fa-gem"></i> Premium
                                </span>
                                @endif
                            </div>
                            
                            <!-- Additional Info -->
                            <div class="menu-card-info">
                                @if(isset($item['cooking_time']))
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $item['cooking_time'] }}</span>
                                </div>
                                @endif
                                @if(isset($item['calories']))
                                <div class="info-item">
                                    <i class="fas fa-bolt"></i>
                                    <span>{{ $item['calories'] }}</span>
                                </div>
                                @endif
                            </div>
                            
                            <!-- Action Button -->
                            <div class="menu-card-footer">
                                <button class="btn btn-primary w-100 order-btn" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#orderModal"
                                        data-item='@json($item)'>
                                    <i class="fas fa-utensils me-2"></i> Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- No Results Message -->
            <div id="noResults" class="text-center py-5 d-none">
                <div class="no-results-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <h4 class="mt-3 mb-2">Menu Tidak Ditemukan</h4>
                <p class="text-muted">Coba kategori lain atau gunakan kata kunci berbeda</p>
            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="py-5" style="background: linear-gradient(135deg, rgba(178, 34, 34, 0.05), rgba(212, 160, 23, 0.05));">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="mb-3" style="color: var(--dark-charcoal); font-size: 2rem;">Menu <span style="color: var(--primary-red);">Rekomendasi</span></h3>
                <p class="text-muted">Temukan favorit pelanggan kami</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="featured-card featured-1">
                        <div class="featured-content">
                            <div class="featured-badge">#1 Best Seller</div>
                            <h4>Rendang Sapi Padang</h4>
                            <p>Daging empuk dengan rempah khas</p>
                            <div class="featured-price">Rp 55.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="featured-card featured-2">
                        <div class="featured-content">
                            <div class="featured-badge">Signature Dish</div>
                            <h4>Bebek Goreng JOSS</h4>
                            <p>Bebek krispi dengan bumbu rahasia</p>
                            <div class="featured-price">Rp 65.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="featured-card featured-3">
                        <div class="featured-content">
                            <div class="featured-badge">Most Popular</div>
                            <h4>Es Campur</h4>
                            <p>Kesegaran dalam setiap sendok</p>
                            <div class="featured-price">Rp 22.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 position-relative">
                    <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" style="top: 20px; right: 20px; z-index: 1;"></button>
                </div>
                <div class="modal-body p-0">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- Order Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Pesan Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="orderModalBody">
                    <!-- Content will be loaded dynamically -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    /* Hero Decoration */
    .hero-decoration {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }
    
    .decoration-circle {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--accent-gold);
        border: 2px solid rgba(255, 193, 69, 0.3);
    }
    
    .decoration-line {
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);
    }
    
    /* Menu Categories */
    .category-btn {
        padding: 15px 25px;
        border: 2px solid transparent;
        background: white;
        color: var(--dark-charcoal);
        border-radius: 15px;
        font-weight: 500;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        min-width: 120px;
    }
    
    .category-btn:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 30px rgba(178, 34, 34, 0.15);
    }
    
    .category-btn.active {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        border-color: var(--primary-red);
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 30px rgba(178, 34, 34, 0.2);
    }
    
    .category-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: var(--primary-red);
        transition: all 0.3s ease;
    }
    
    .category-btn.active .category-icon {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        transform: rotate(15deg);
    }
    
    .category-btn span {
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    /* Search Bar */
    .menu-search-container {
        position: relative;
        background: white;
        border-radius: 15px;
        padding: 15px 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .search-icon {
        color: var(--primary-red);
        font-size: 1.2rem;
    }
    
    .search-input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 1rem;
        color: var(--dark-charcoal);
        background: transparent;
    }
    
    .search-input::placeholder {
        color: rgba(139, 115, 85, 0.6);
    }
    
    .search-decoration {
        color: var(--accent-gold);
        font-size: 1.1rem;
        opacity: 0.5;
    }
    
    /* Menu Stats */
    .menu-stats-card {
        padding: 30px;
        background: white !important;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    .stats-item {
        padding: 20px;
    }
    
    .stats-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto;
    }
    
    .stats-number {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--dark-charcoal);
        margin-bottom: 5px;
    }
    
    .stats-label {
        color: var(--warm-brown);
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    /* Menu Cards */
    .menu-card {
        height: 100%;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        background: white;
        position: relative;
        border: none;
    }
    
    .menu-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(178, 34, 34, 0.15);
    }
    
    .menu-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .menu-card:hover::before {
        opacity: 1;
    }
    
    .menu-card-img {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    
    .menu-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s ease;
    }
    
    .menu-card:hover .menu-card-img img {
        transform: scale(1.1);
    }
    
    .menu-card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent 50%);
        display: flex;
        align-items: flex-end;
        justify-content: center;
        padding: 25px;
        opacity: 0;
        transition: opacity 0.4s ease;
    }
    
    .menu-card:hover .menu-card-overlay {
        opacity: 1;
    }
    
    .quick-view-btn {
        background: white;
        color: var(--primary-red);
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .quick-view-btn:hover {
        background: var(--primary-red);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255,255,255,0.2);
    }
    
    /* Badges */
    .menu-badges {
        position: absolute;
        top: 15px;
        left: 15px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        z-index: 2;
    }
    
    .menu-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 5px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        backdrop-filter: blur(10px);
    }
    
    .menu-badge.best-seller {
        background: linear-gradient(135deg, #FFC145, #FFA000);
        color: white;
        border: 1px solid rgba(255,255,255,0.2);
    }
    
    .menu-badge.signature {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        border: 1px solid rgba(255,255,255,0.2);
    }
    
    .menu-badge.popularity {
        background: rgba(255, 255, 255, 0.95);
        color: var(--primary-red);
        border: 1px solid rgba(178, 34, 34, 0.2);
    }
    
    /* Card Body */
    .menu-card-body {
        padding: 25px;
    }
    
    .menu-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    
    .menu-card-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark-charcoal);
        margin: 0;
        flex: 1;
        line-height: 1.3;
    }
    
    .menu-card-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-red);
        white-space: nowrap;
        margin-left: 15px;
    }
    
    .menu-card-desc {
        color: var(--warm-brown);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
        min-height: 60px;
    }
    
    /* Tags */
    .menu-card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 20px;
    }
    
    .menu-tag {
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .menu-tag.veg {
        background: rgba(42, 157, 143, 0.15);
        color: #2a9d8f;
        border: 1px solid rgba(42, 157, 143, 0.2);
    }
    
    .menu-tag.spicy {
        background: rgba(230, 57, 70, 0.15);
        color: #e63946;
        border: 1px solid rgba(230, 57, 70, 0.2);
    }
    
    .menu-tag.traditional {
        background: rgba(139, 115, 85, 0.15);
        color: var(--warm-brown);
        border: 1px solid rgba(139, 115, 85, 0.2);
    }
    
    .menu-tag.premium {
        background: rgba(178, 34, 34, 0.15);
        color: var(--primary-red);
        border: 1px solid rgba(178, 34, 34, 0.2);
    }
    
    /* Info Items */
    .menu-card-info {
        display: flex;
        gap: 20px;
        padding: 15px 0;
        border-top: 1px solid rgba(0,0,0,0.05);
        border-bottom: 1px solid rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--warm-brown);
        font-size: 0.9rem;
    }
    
    .info-item i {
        color: var(--primary-red);
        width: 18px;
        font-size: 1rem;
    }
    
    /* Order Button */
    .order-btn {
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 1rem;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        border: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .order-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(178, 34, 34, 0.3);
    }
    
    /* No Results */
    .no-results-icon {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(178, 34, 34, 0.1), rgba(212, 160, 23, 0.1));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 2.5rem;
        color: var(--primary-red);
    }
    
    /* Featured Section */
    .featured-card {
        height: 300px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: flex-end;
        padding: 30px;
        transition: all 0.4s ease;
    }
    
    .featured-card:hover {
        transform: translateY(-10px);
    }
    
    .featured-1 {
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent), 
                    url('https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        background-size: cover;
        background-position: center;
    }
    
    .featured-2 {
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent), 
                    url('https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        background-size: cover;
        background-position: center;
    }
    
    .featured-3 {
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent), 
                    url('https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
        background-size: cover;
        background-position: center;
    }
    
    .featured-content {
        color: white;
        position: relative;
        z-index: 2;
    }
    
    .featured-badge {
        background: var(--accent-gold);
        color: var(--dark-charcoal);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 700;
        display: inline-block;
        margin-bottom: 10px;
    }
    
    .featured-content h4 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .featured-content p {
        opacity: 0.9;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }
    
    .featured-price {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--accent-gold);
    }
    
    /* Detail Modal */
    #detailModal .modal-content {
        border-radius: 25px;
        overflow: hidden;
        border: none;
        background: transparent;
    }
    
    .detail-modal-content {
        background: white;
        border-radius: 25px;
        overflow: hidden;
    }
    
    .detail-modal-img {
        height: 350px;
        width: 100%;
        object-fit: cover;
    }
    
    .detail-modal-body {
        padding: 40px;
    }
    
    .detail-price {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-red);
        margin-bottom: 20px;
    }
    
    .detail-description {
        color: var(--warm-brown);
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 30px;
    }
    
    .detail-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .detail-info-item {
        background: rgba(248, 249, 250, 0.5);
        border-radius: 15px;
        padding: 20px;
        text-align: center;
    }
    
    .detail-info-label {
        color: var(--warm-brown);
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    
    .detail-info-value {
        font-weight: 600;
        color: var(--dark-charcoal);
        font-size: 1.1rem;
    }
    
    /* Order Modal */
    #orderModal .modal-content {
        border-radius: 20px;
        border: none;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }
    
    /* Animations */
    .menu-card-item {
        animation: fadeInUp 0.6s ease-out forwards;
        animation-delay: calc(var(--item-index) * 0.1s);
        opacity: 0;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.05); }
        100% { transform: scale(1); }
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .category-btn {
            min-width: 100px;
            padding: 12px 20px;
        }
        
        .stats-number {
            font-size: 1.8rem;
        }
        
        .menu-card-img {
            height: 200px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-decoration {
            margin-top: 30px;
        }
        
        .category-btn {
            min-width: 90px;
            padding: 10px 15px;
        }
        
        .category-icon {
            width: 40px;
            height: 40px;
            font-size: 1.1rem;
        }
        
        .menu-search-container {
            padding: 12px 20px;
        }
        
        .menu-stats-card {
            padding: 20px;
        }
        
        .stats-item {
            padding: 15px;
        }
        
        .stats-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }
        
        .menu-card-title {
            font-size: 1.2rem;
        }
        
        .menu-card-price {
            font-size: 1.3rem;
        }
        
        .featured-card {
            height: 250px;
        }
    }
    
    @media (max-width: 576px) {
        .category-btn {
            min-width: 80px;
            padding: 8px 12px;
        }
        
        .category-btn span {
            font-size: 0.8rem;
        }
        
        .menu-card-body {
            padding: 20px;
        }
        
        .menu-card-info {
            flex-direction: column;
            gap: 10px;
        }
        
        .detail-modal-body {
            padding: 25px;
        }
        
        .detail-info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Menu Filtering
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const menuItems = document.querySelectorAll('.menu-card-item');
        const menuSearch = document.getElementById('menuSearch');
        const menuGrid = document.getElementById('menuGrid');
        const noResults = document.getElementById('noResults');
        
        // Stats elements
        const totalItemsEl = document.getElementById('totalItems');
        const specialItemsEl = document.getElementById('specialItems');
        const vegItemsEl = document.getElementById('vegItems');
        const spicyItemsEl = document.getElementById('spicyItems');
        
        // Calculate stats
        function calculateStats() {
            const total = menuItems.length;
            const special = Array.from(menuItems).filter(item => 
                item.dataset.category === 'special').length;
            const veg = Array.from(menuItems).filter(item => 
                item.querySelector('.menu-tag.veg')).length;
            const spicy = Array.from(menuItems).filter(item => 
                item.querySelector('.menu-tag.spicy')).length;
            
            // Animate numbers
            animateNumber(totalItemsEl, total);
            animateNumber(specialItemsEl, special);
            animateNumber(vegItemsEl, veg);
            animateNumber(spicyItemsEl, spicy);
        }
        
        function animateNumber(element, target) {
            let current = 0;
            const increment = target / 30;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.round(current);
            }, 30);
        }
        
        // Set animation delay for each card
        menuItems.forEach((item, index) => {
            item.style.setProperty('--item-index', index);
        });
        
        // Category Filter
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Update active button with animation
                categoryButtons.forEach(btn => {
                    btn.classList.remove('active');
                    btn.style.animation = 'none';
                    setTimeout(() => {
                        btn.style.animation = '';
                    }, 10);
                });
                this.classList.add('active');
                this.style.animation = 'pulse 0.3s ease';
                
                const category = this.dataset.category;
                filterMenu(category);
            });
        });
        
        // Search Filter
        menuSearch.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            filterMenu('all', searchTerm);
        });
        
        function filterMenu(category, searchTerm = '') {
            let visibleCount = 0;
            
            menuItems.forEach(item => {
                const itemCategory = item.dataset.category;
                const itemName = item.querySelector('.menu-card-title').textContent.toLowerCase();
                const itemDesc = item.querySelector('.menu-card-desc').textContent.toLowerCase();
                
                const matchesCategory = category === 'all' || itemCategory === category;
                const matchesSearch = !searchTerm || 
                    itemName.includes(searchTerm) || 
                    itemDesc.includes(searchTerm);
                
                if (matchesCategory && matchesSearch) {
                    item.style.display = 'block';
                    visibleCount++;
                    
                    // Add animation
                    item.style.animation = 'fadeInUp 0.5s ease-out forwards';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('d-none');
                menuGrid.classList.add('d-none');
            } else {
                noResults.classList.add('d-none');
                menuGrid.classList.remove('d-none');
            }
            
            // Update stats
            calculateStats();
        }
        
        // Quick View Modal
        document.querySelectorAll('.quick-view-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                const itemData = JSON.parse(this.dataset.item);
                showDetailModal(itemData);
            });
        });
        
        // Order Button
        document.querySelectorAll('.order-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                const itemData = JSON.parse(this.dataset.item);
                showOrderModal(itemData);
                
                // Button animation
                this.style.animation = 'pulse 0.3s ease';
                setTimeout(() => {
                    this.style.animation = '';
                }, 300);
            });
        });
        
        // Calculate initial stats
        calculateStats();
    });
    
    // Detail Modal
    function showDetailModal(item) {
        const modal = new bootstrap.Modal(document.getElementById('detailModal'));
        const modalBody = document.querySelector('#detailModal .modal-body');
        
        // Build modal content
        let tagsHTML = '';
        if (item.tags && item.tags.length > 0) {
            tagsHTML = item.tags.map(tag => {
                const tagClasses = {
                    'best_seller': 'danger',
                    'signature': 'warning',
                    'spicy': 'danger',
                    'vegetarian': 'success',
                    'traditional': 'secondary',
                    'premium': 'primary',
                    'healthy': 'success'
                }[tag] || 'secondary';
                
                const tagLabels = {
                    'best_seller': 'Best Seller',
                    'signature': 'Signature',
                    'spicy': 'Pedas',
                    'vegetarian': 'Vegetarian',
                    'traditional': 'Tradisional',
                    'premium': 'Premium',
                    'healthy': 'Sehat'
                }[tag] || tag;
                
                return `<span class="badge bg-${tagClasses} me-2 mb-2">${tagLabels}</span>`;
            }).join('');
        }
        
        // Spicy level indicator
        let spicyHTML = '';
        if (item.spicy_level && item.spicy_level > 0) {
            spicyHTML = `
                <div class="spicy-level mt-3">
                    <small class="text-muted d-block mb-2">Level Pedas:</small>
                    <div class="d-flex gap-1">
                        ${Array.from({length: 5}).map((_, i) => `
                            <div class="spicy-dot ${i < item.spicy_level ? 'active' : ''}"></div>
                        `).join('')}
                    </div>
                </div>
            `;
        }
        
        const content = `
            <div class="detail-modal-content">
                <img src="${item.image}" alt="${item.name}" class="detail-modal-img">
                <div class="detail-modal-body">
                    <h3 class="mb-3" style="color: var(--dark-charcoal); font-weight: 700;">${item.name}</h3>
                    <div class="detail-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                    
                    <div class="mb-4">
                        ${tagsHTML}
                        ${spicyHTML}
                    </div>
                    
                    <p class="detail-description">${item.description}</p>
                    
                    <div class="detail-info-grid">
                        <div class="detail-info-item">
                            <div class="detail-info-label">Kategori</div>
                            <div class="detail-info-value">${getCategoryName(item.category)}</div>
                        </div>
                        
                        ${item.cooking_time ? `
                        <div class="detail-info-item">
                            <div class="detail-info-label">Waktu Masak</div>
                            <div class="detail-info-value">${item.cooking_time}</div>
                        </div>
                        ` : ''}
                        
                        ${item.temperature ? `
                        <div class="detail-info-item">
                            <div class="detail-info-label">Suhu</div>
                            <div class="detail-info-value">${item.temperature}</div>
                        </div>
                        ` : ''}
                        
                        ${item.calories ? `
                        <div class="detail-info-item">
                            <div class="detail-info-label">Kalori</div>
                            <div class="detail-info-value">${item.calories}</div>
                        </div>
                        ` : ''}
                        
                        ${item.popularity ? `
                        <div class="detail-info-item">
                            <div class="detail-info-label">Popularitas</div>
                            <div class="detail-info-value">${item.popularity}%</div>
                        </div>
                        ` : ''}
                    </div>
                    
                    <div class="d-grid gap-2 mt-4">
                        <button class="btn btn-primary btn-lg py-3" 
                                onclick="showOrderModal(${JSON.stringify(item).replace(/"/g, '&quot;')})">
                            <i class="fas fa-utensils me-2"></i> Pesan Sekarang
                        </button>
                        <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        modalBody.innerHTML = content;
        modal.show();
        
        // Add spicy level dots style
        const style = document.createElement('style');
        style.textContent = `
            .spicy-dot {
                width: 25px;
                height: 8px;
                border-radius: 4px;
                background: #e0e0e0;
                transition: all 0.3s ease;
            }
            .spicy-dot.active {
                background: #e63946;
            }
            .spicy-dot.active:nth-child(1) { opacity: 0.6; }
            .spicy-dot.active:nth-child(2) { opacity: 0.8; }
            .spicy-dot.active:nth-child(3) { opacity: 1; }
            .spicy-dot.active:nth-child(4) { 
                opacity: 1;
                animation: pulse 1s infinite;
            }
            .spicy-dot.active:nth-child(5) { 
                opacity: 1;
                animation: pulse 0.5s infinite;
            }
        `;
        document.head.appendChild(style);
    }
    
    // Order Modal
    function showOrderModal(item) {
        const modal = new bootstrap.Modal(document.getElementById('orderModal'));
        const modalBody = document.getElementById('orderModalBody');
        
        const content = `
            <div class="text-center">
                <div class="mb-4">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center" 
                         style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));">
                        <i class="fas fa-utensils fa-2x text-white"></i>
                    </div>
                </div>
                
                <h5 class="mb-3">Pesan ${item.name}</h5>
                <p class="text-muted mb-4">Silakan hubungi kami untuk memesan menu ini:</p>
                
                <div class="order-info mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Menu:</span>
                        <strong>${item.name}</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Harga:</span>
                        <strong class="text-primary">Rp ${item.price.toLocaleString('id-ID')}</strong>
                    </div>
                </div>
                
                <div class="order-actions mt-4">
                    <a href="tel:+6289699071599" class="btn btn-primary btn-lg w-100 mb-3">
                        <i class="fas fa-phone me-2"></i> Telepon Sekarang
                    </a>
                    <a href="https://wa.me/6289699071599?text=Halo%2C%20saya%20ingin%20memesan%20${encodeURIComponent(item.name)}%20dari%20JOSS%20GANDOS" 
                       class="btn btn-success btn-lg w-100 mb-3" target="_blank">
                        <i class="fab fa-whatsapp me-2"></i> WhatsApp
                    </a>
                    <a href="{{ route('reservation.create') }}" class="btn btn-outline-primary w-100">
                        <i class="fas fa-calendar-alt me-2"></i> Reservasi Online
                    </a>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Jam operasional: 10:00 - 22:00 WIB
                    </small>
                </div>
            </div>
        `;
        
        modalBody.innerHTML = content;
        modal.show();
    }
    
    function getCategoryName(category) {
        const categories = {
            'main': 'Menu Utama',
            'appetizer': 'Pembuka',
            'drink': 'Minuman',
            'dessert': 'Pencuci Mulut',
            'special': 'Menu Spesial'
        };
        return categories[category] || category;
    }
    
    // Notification
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = 'position-fixed top-0 end-0 m-4 p-3 rounded shadow';
        notification.style.cssText = `
            background: white;
            border-left: 4px solid ${type === 'success' ? '#4CAF50' : type === 'error' ? '#F44336' : '#2196F3'};
            z-index: 9999;
            max-width: 350px;
            animation: slideInRight 0.3s ease-out;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        `;
        
        notification.innerHTML = `
            <div class="d-flex align-items-center">
                <div class="me-3">
                    <i class="fas fa-info-circle fa-lg" style="color: var(--primary-red);"></i>
                </div>
                <div class="flex-grow-1">
                    <div style="color: var(--dark-charcoal); line-height: 1.4;">${message}</div>
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
    
    // Add animation CSS
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(30px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Console welcome message
    console.log('%c🍽️ Menu Digital JOSS GANDOS 🍽️', 
        'background: linear-gradient(135deg, #B22222, #D4A017); color: white; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: bold;');
    console.log('%cSelamat menikmati kelezatan Nusantara!', 'color: #8B7355; font-style: italic;');
</script>
@endsection