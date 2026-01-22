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
                            Jelajahi Kelezatan<br>
                            <span>Nusantara</span>
                        </h1>
                        <p class="hero-subtitle">
                            Dari Sabang sampai Merauke, setiap sajian adalah perjalanan rasa yang tak terlupakan. 
                            Temukan favorit baru Anda di sini.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(180, 34, 34, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-book-open me-1"></i> Menu Flipbook
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-sync-alt me-1"></i> Halaman Interaktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Content with Enhanced Flip Book Style -->
    <section class="section-padding">
        <div class="container">
            <!-- Category Navigation - Bookmark Style -->
            <div class="menu-navigation mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="animate-fade-in">
                        <h2 class="fw-bold mb-2" style="color: var(--dark-charcoal); font-size: 2.2rem;">Menu Flipbook</h2>
                        <p class="text-muted mb-0">Balik halaman untuk menemukan kelezatan</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm px-3" id="prevPage" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red);">
                            <i class="fas fa-chevron-left me-1"></i> Sebelumnya
                        </button>
                        <span class="px-3 py-2" style="background: var(--light-gray); border-radius: 10px;">
                            <span id="currentPage">1</span>/<span id="totalPages">4</span>
                        </span>
                        <button class="btn btn-sm px-3" id="nextPage" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red);">
                            Selanjutnya <i class="fas fa-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Category Bookmarks -->
                <div class="row g-3 mb-4">
                    <div class="col-auto">
                        <button class="category-bookmark active" data-category="all">
                            <i class="fas fa-book me-1"></i> Semua
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="category-bookmark" data-category="mains">
                            <i class="fas fa-utensils me-1"></i> Menu Utama
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="category-bookmark" data-category="appetizers">
                            <i class="fas fa-leaf me-1"></i> Pembuka
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="category-bookmark" data-category="drinks">
                            <i class="fas fa-glass-whiskey me-1"></i> Minuman
                        </button>
                    </div>
                    <div class="col-auto">
                        <button class="category-bookmark" data-category="desserts">
                            <i class="fas fa-ice-cream me-1"></i> Pencuci Mulut
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Flip Book Container -->
            <div class="flip-book-container mb-5">
                <!-- Book Spine -->
                <div class="book-spine"></div>
                
                <!-- Flip Book -->
                <div class="flip-book-wrapper">
                    <div class="flip-book" id="flipBook">
                        <!-- Page 1: Menu Utama -->
                        <div class="flip-page active" data-page="1">
                            <div class="page-content">
                                <div class="page-header">
                                    <div class="page-number">1</div>
                                    <h3 class="page-title">
                                        <i class="fas fa-utensils me-2" style="color: var(--primary-red);"></i>
                                        Menu Utama
                                    </h3>
                                </div>
                                
                                <div class="row g-4">
                                    @php
                                        $mainDishes = [
                                            ['name' => 'Nasi Goreng Spesial JOSS', 'price' => 45000, 'desc' => 'Dengan ayam suwir, udang, telur, dan sayuran segar', 'spicy' => 2, 'veg' => false, 'best' => true, 'image' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Rendang Sapi Padang', 'price' => 55000, 'desc' => 'Dimasak 8 jam dengan rempah pilihan', 'spicy' => 3, 'veg' => false, 'best' => true, 'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Ayam Penyet Sambal Terasi', 'price' => 42000, 'desc' => 'Ayam krispi dengan sambal khas', 'spicy' => 4, 'veg' => false, 'best' => false, 'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Soto Betawi', 'price' => 38000, 'desc' => 'Soto khas Jakarta dengan santan', 'spicy' => 1, 'veg' => false, 'best' => false, 'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Gado-Gado Jakarta', 'price' => 35000, 'desc' => 'Salad khas dengan bumbu kacang', 'spicy' => 1, 'veg' => true, 'best' => false, 'image' => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Nasi Liwet Sunda', 'price' => 40000, 'desc' => 'Nasi liwet dengan ikan asin dan sayuran', 'spicy' => 2, 'veg' => false, 'best' => false, 'image' => 'https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                        ];
                                    @endphp
                                    
                                    @foreach($mainDishes as $item)
                                        <div class="col-lg-6">
                                            <div class="menu-card" data-category="mains">
                                                <div class="menu-card-inner">
                                                    <div class="menu-card-front">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="menu-image" style="background-image: url('{{ $item['image'] }}');"></div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="p-3">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal); font-size: 1rem;">{{ $item['name'] }}</h4>
                                                                        @if($item['best'])
                                                                            <span class="badge" style="background: var(--accent-gold); color: white; font-size: 0.6rem;">
                                                                                BEST
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <p class="text-muted mb-2" style="font-size: 0.8rem; line-height: 1.4;">{{ $item['desc'] }}</p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex gap-1">
                                                                            @if($item['spicy'] > 0)
                                                                                @for($i = 0; $i < $item['spicy']; $i++)
                                                                                    <i class="fas fa-pepper-hot" style="color: #e63946; font-size: 0.8rem;"></i>
                                                                                @endfor
                                                                            @endif
                                                                            @if($item['veg'])
                                                                                <i class="fas fa-leaf" style="color: #2a9d8f; font-size: 0.8rem;"></i>
                                                                            @endif
                                                                        </div>
                                                                        <span class="fw-bold" style="color: var(--primary-red); font-size: 0.9rem;">
                                                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-card-back">
                                                        <div class="text-center p-3">
                                                            <h5 class="mb-2" style="color: white; font-size: 1rem;">{{ $item['name'] }}</h5>
                                                            <p class="small mb-3" style="color: rgba(255,255,255,0.8);">{{ $item['desc'] }}</p>
                                                            <button class="btn btn-sm px-3 add-to-cart" 
                                                                    data-name="{{ $item['name'] }}" 
                                                                    data-price="{{ $item['price'] }}"
                                                                    style="background: white; color: var(--primary-red); font-size: 0.8rem;">
                                                                <i class="fas fa-plus me-1"></i> Tambah
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Page 2: Appetizers & Soups -->
                        <div class="flip-page" data-page="2">
                            <div class="page-content">
                                <div class="page-header">
                                    <div class="page-number">2</div>
                                    <h3 class="page-title">
                                        <i class="fas fa-leaf me-2" style="color: var(--primary-red);"></i>
                                        Pembuka & Sup
                                    </h3>
                                </div>
                                
                                <div class="row g-4">
                                    @php
                                        $appetizers = [
                                            ['name' => 'Lumpia Sayur', 'price' => 28000, 'desc' => 'Lumpia dengan isian sayuran segar', 'spicy' => 0, 'veg' => true, 'image' => 'https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Sate Ayam', 'price' => 35000, 'desc' => '10 tusuk sate dengan bumbu kacang', 'spicy' => 2, 'veg' => false, 'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Pempek Palembang', 'price' => 32000, 'desc' => 'Pempek ikan dengan cuko khas', 'spicy' => 1, 'veg' => false, 'image' => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Tahu Gejrot', 'price' => 25000, 'desc' => 'Tahu goreng dengan saus kecap pedas', 'spicy' => 3, 'veg' => true, 'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Sup Buntut', 'price' => 45000, 'desc' => 'Sup buntut dengan sayuran', 'spicy' => 1, 'veg' => false, 'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Keripik Tempe', 'price' => 18000, 'desc' => 'Tempe iris tipis digoreng krispi', 'spicy' => 0, 'veg' => true, 'image' => 'https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                        ];
                                    @endphp
                                    
                                    @foreach($appetizers as $item)
                                        <div class="col-lg-6">
                                            <div class="menu-card" data-category="appetizers">
                                                <div class="menu-card-inner">
                                                    <div class="menu-card-front">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="menu-image" style="background-image: url('{{ $item['image'] }}');"></div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="p-3">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal); font-size: 1rem;">{{ $item['name'] }}</h4>
                                                                    </div>
                                                                    <p class="text-muted mb-2" style="font-size: 0.8rem; line-height: 1.4;">{{ $item['desc'] }}</p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex gap-1">
                                                                            @if($item['spicy'] > 0)
                                                                                @for($i = 0; $i < $item['spicy']; $i++)
                                                                                    <i class="fas fa-pepper-hot" style="color: #e63946; font-size: 0.8rem;"></i>
                                                                                @endfor
                                                                            @endif
                                                                            @if($item['veg'])
                                                                                <i class="fas fa-leaf" style="color: #2a9d8f; font-size: 0.8rem;"></i>
                                                                            @endif
                                                                        </div>
                                                                        <span class="fw-bold" style="color: var(--primary-red); font-size: 0.9rem;">
                                                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-card-back">
                                                        <div class="text-center p-3">
                                                            <h5 class="mb-2" style="color: white; font-size: 1rem;">{{ $item['name'] }}</h5>
                                                            <p class="small mb-3" style="color: rgba(255,255,255,0.8);">{{ $item['desc'] }}</p>
                                                            <button class="btn btn-sm px-3 add-to-cart" 
                                                                    data-name="{{ $item['name'] }}" 
                                                                    data-price="{{ $item['price'] }}"
                                                                    style="background: white; color: var(--primary-red); font-size: 0.8rem;">
                                                                <i class="fas fa-plus me-1"></i> Tambah
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Page 3: Drinks -->
                        <div class="flip-page" data-page="3">
                            <div class="page-content">
                                <div class="page-header">
                                    <div class="page-number">3</div>
                                    <h3 class="page-title">
                                        <i class="fas fa-glass-whiskey me-2" style="color: var(--primary-red);"></i>
                                        Minuman Segar
                                    </h3>
                                </div>
                                
                                <div class="row g-4">
                                    @php
                                        $drinks = [
                                            ['name' => 'Es Teh Manis', 'price' => 12000, 'desc' => 'Es teh dengan gula aren asli', 'type' => 'cold', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1513558161293-cdaf765ed2fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Wedang Jahe', 'price' => 18000, 'desc' => 'Jahe hangat dengan madu asli', 'type' => 'hot', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Es Cincau', 'price' => 15000, 'desc' => 'Cincau hitam dengan sirup gula merah', 'type' => 'cold', 'best' => true, 'image' => 'https://images.unsplash.com/photo-1544145945-f90425340c7e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Kopi Tubruk', 'price' => 20000, 'desc' => 'Kopi khas Indonesia', 'type' => 'hot', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1511537190424-bbbab87ac5eb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Jus Alpukat', 'price' => 22000, 'desc' => 'Alpukat segar dengan susu kental', 'type' => 'cold', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1628992682633-bf2d40cb595f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Bajigur Sunda', 'price' => 25000, 'desc' => 'Minuman hangat khas Sunda', 'type' => 'hot', 'best' => true, 'image' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                        ];
                                    @endphp
                                    
                                    @foreach($drinks as $item)
                                        <div class="col-lg-6">
                                            <div class="menu-card" data-category="drinks">
                                                <div class="menu-card-inner">
                                                    <div class="menu-card-front">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="menu-image" style="background-image: url('{{ $item['image'] }}');"></div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="p-3">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal); font-size: 1rem;">{{ $item['name'] }}</h4>
                                                                        @if($item['best'])
                                                                            <span class="badge" style="background: var(--accent-gold); color: white; font-size: 0.6rem;">
                                                                                TOP
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <p class="text-muted mb-2" style="font-size: 0.8rem; line-height: 1.4;">{{ $item['desc'] }}</p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex gap-1">
                                                                            <span class="badge" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red); font-size: 0.7rem;">
                                                                                <i class="fas fa-{{ $item['type'] == 'hot' ? 'fire' : 'snowflake' }}"></i>
                                                                                {{ $item['type'] == 'hot' ? 'Panas' : 'Dingin' }}
                                                                            </span>
                                                                        </div>
                                                                        <span class="fw-bold" style="color: var(--primary-red); font-size: 0.9rem;">
                                                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-card-back">
                                                        <div class="text-center p-3">
                                                            <h5 class="mb-2" style="color: white; font-size: 1rem;">{{ $item['name'] }}</h5>
                                                            <p class="small mb-3" style="color: rgba(255,255,255,0.8);">{{ $item['desc'] }}</p>
                                                            <button class="btn btn-sm px-3 add-to-cart" 
                                                                    data-name="{{ $item['name'] }}" 
                                                                    data-price="{{ $item['price'] }}"
                                                                    style="background: white; color: var(--primary-red); font-size: 0.8rem;">
                                                                <i class="fas fa-plus me-1"></i> Tambah
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <!-- Page 4: Desserts -->
                        <div class="flip-page" data-page="4">
                            <div class="page-content">
                                <div class="page-header">
                                    <div class="page-number">4</div>
                                    <h3 class="page-title">
                                        <i class="fas fa-ice-cream me-2" style="color: var(--primary-red);"></i>
                                        Pencuci Mulut
                                    </h3>
                                </div>
                                
                                <div class="row g-4">
                                    @php
                                        $desserts = [
                                            ['name' => 'Es Campur', 'price' => 22000, 'desc' => 'Es campur dengan buah segar', 'type' => 'cold', 'best' => true, 'image' => 'https://images.unsplash.com/photo-1499636136210-6f4ee915583e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Klepon', 'price' => 18000, 'desc' => 'Kue tradisional isi gula merah', 'type' => 'normal', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Pisang Goreng', 'price' => 20000, 'desc' => 'Pisang goreng dengan keju dan coklat', 'type' => 'hot', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Bubur Sumsum', 'price' => 15000, 'desc' => 'Bubur dengan saus gula merah', 'type' => 'warm', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Lapis Legit', 'price' => 25000, 'desc' => 'Kue lapis legit khas Indonesia', 'type' => 'normal', 'best' => true, 'image' => 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                            ['name' => 'Martabak Manis', 'price' => 30000, 'desc' => 'Martabak dengan topping pilihan', 'type' => 'hot', 'best' => false, 'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                        ];
                                    @endphp
                                    
                                    @foreach($desserts as $item)
                                        <div class="col-lg-6">
                                            <div class="menu-card" data-category="desserts">
                                                <div class="menu-card-inner">
                                                    <div class="menu-card-front">
                                                        <div class="row g-0">
                                                            <div class="col-4">
                                                                <div class="menu-image" style="background-image: url('{{ $item['image'] }}');"></div>
                                                            </div>
                                                            <div class="col-8">
                                                                <div class="p-3">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <h4 class="mb-0 fw-bold" style="color: var(--dark-charcoal); font-size: 1rem;">{{ $item['name'] }}</h4>
                                                                        @if($item['best'])
                                                                            <span class="badge" style="background: var(--accent-gold); color: white; font-size: 0.6rem;">
                                                                                REC
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <p class="text-muted mb-2" style="font-size: 0.8rem; line-height: 1.4;">{{ $item['desc'] }}</p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="d-flex gap-1">
                                                                            <span class="badge" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red); font-size: 0.7rem;">
                                                                                @if($item['type'] == 'cold')
                                                                                    <i class="fas fa-snowflake"></i> Dingin
                                                                                @elseif($item['type'] == 'hot')
                                                                                    <i class="fas fa-fire"></i> Panas
                                                                                @elseif($item['type'] == 'warm')
                                                                                    <i class="fas fa-temperature-low"></i> Hangat
                                                                                @else
                                                                                    <i class="fas fa-utensil-spoon"></i> Normal
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                        <span class="fw-bold" style="color: var(--primary-red); font-size: 0.9rem;">
                                                                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-card-back">
                                                        <div class="text-center p-3">
                                                            <h5 class="mb-2" style="color: white; font-size: 1rem;">{{ $item['name'] }}</h5>
                                                            <p class="small mb-3" style="color: rgba(255,255,255,0.8);">{{ $item['desc'] }}</p>
                                                            <button class="btn btn-sm px-3 add-to-cart" 
                                                                    data-name="{{ $item['name'] }}" 
                                                                    data-price="{{ $item['price'] }}"
                                                                    style="background: white; color: var(--primary-red); font-size: 0.8rem;">
                                                                <i class="fas fa-plus me-1"></i> Tambah
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Page Turn Indicators -->
                <div class="page-turn-indicators">
                    <div class="page-turn prev-page" id="flipPrev">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="page-turn next-page" id="flipNext">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>
            
            <!-- Quick Order Summary -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card animate-fade-in">
                        <div class="p-4" style="background: rgba(180, 34, 34, 0.05); border-radius: 15px;">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="fw-bold mb-1" style="color: var(--primary-red);">
                                        <i class="fas fa-info-circle me-2"></i> Cara Menggunakan Flipbook
                                    </h5>
                                    <p class="mb-0" style="color: var(--warm-brown);">
                                        Klik item untuk menambah ke pesanan | Gunakan tombol navigasi untuk membalik halaman
                                    </p>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block">Tips</small>
                                    <button class="btn btn-sm px-3" style="background: var(--primary-red); color: white;" onclick="demoFlip()">
                                        <i class="fas fa-play me-1"></i> Lihat Demo
                                    </button>
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
    .flip-book-container {
        position: relative;
        perspective: 2000px;
        min-height: 700px;
        margin: 0 auto;
    }
    
    .book-spine {
        position: absolute;
        left: -20px;
        top: 0;
        bottom: 0;
        width: 40px;
        background: linear-gradient(90deg, var(--primary-dark), var(--primary-red));
        border-radius: 10px 0 0 10px;
        box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        z-index: 1;
    }
    
    .flip-book-wrapper {
        position: relative;
        width: 100%;
        height: 700px;
        transform-style: preserve-3d;
    }
    
    .flip-book {
        position: absolute;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 1s cubic-bezier(0.645, 0.045, 0.355, 1);
        transform-origin: left center;
    }
    
    .flip-page {
        position: absolute;
        width: 100%;
        height: 100%;
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 
            0 15px 35px rgba(0, 0, 0, 0.1),
            0 5px 15px rgba(0,0,0,0.05) inset,
            -5px 0 15px rgba(0,0,0,0.05);
        backface-visibility: hidden;
        transform-origin: left center;
        transition: transform 1s cubic-bezier(0.645, 0.045, 0.355, 1);
        border: 1px solid rgba(0, 0, 0, 0.05);
        overflow: hidden;
        display: none;
    }
    
    .flip-page.active {
        display: block;
        transform: rotateY(0deg) translateZ(0);
    }
    
    .flip-page.prev {
        display: block;
        transform: rotateY(-180deg) translateZ(-1px);
    }
    
    .flip-page.next {
        display: block;
        transform: rotateY(180deg) translateZ(-1px);
    }
    
    .page-header {
        position: relative;
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 3px solid rgba(180, 34, 34, 0.1);
    }
    
    .page-number {
        position: absolute;
        top: -20px;
        right: 0;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.5rem;
        box-shadow: 0 8px 20px rgba(180, 34, 34, 0.3);
        font-family: 'Playfair Display', serif;
    }
    
    .page-title {
        font-family: 'Playfair Display', serif;
        color: var(--dark-charcoal);
        font-size: 2.2rem;
        position: relative;
        display: inline-block;
    }
    
    .page-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
        border-radius: 2px;
    }
    
    /* Page Turn Indicators */
    .page-turn-indicators {
        position: absolute;
        top: 50%;
        left: -60px;
        right: -60px;
        transform: translateY(-50%);
        display: flex;
        justify-content: space-between;
        pointer-events: none;
        z-index: 10;
    }
    
    .page-turn {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        pointer-events: all;
        box-shadow: 0 5px 15px rgba(178, 34, 34, 0.4);
        transition: all 0.3s ease;
        border: 3px solid white;
    }
    
    .page-turn:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 25px rgba(178, 34, 34, 0.5);
    }
    
    .page-turn.prev-page {
        left: -25px;
    }
    
    .page-turn.next-page {
        right: -25px;
    }
    
    /* Menu Card Flip Effect */
    .menu-card {
        height: 120px;
        perspective: 1000px;
        cursor: pointer;
        margin-bottom: 15px;
    }
    
    .menu-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }
    
    .menu-card:hover .menu-card-inner {
        transform: rotateY(180deg);
    }
    
    .menu-card-front, .menu-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .menu-card-front {
        background: white;
        border: 2px solid rgba(180, 34, 34, 0.1);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        align-items: center;
    }
    
    .menu-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        border-radius: 10px 0 0 10px;
    }
    
    .menu-card-back {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        transform: rotateY(180deg);
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 15px;
    }
    
    /* Category Bookmarks */
    .category-bookmark {
        padding: 10px 20px;
        background: rgba(180, 34, 34, 0.1);
        border: 2px solid transparent;
        border-radius: 10px;
        color: var(--primary-red);
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .category-bookmark:hover,
    .category-bookmark.active {
        background: var(--primary-red);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(180, 34, 34, 0.3);
    }
    
    /* Flip Animation Keyframes */
    @keyframes flipToNext {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }
    
    @keyframes flipToPrev {
        0% { transform: rotateY(-180deg); }
        100% { transform: rotateY(0deg); }
    }
    
    @keyframes pageTurn {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }
    
    /* Enhanced Responsive Design */
    @media (max-width: 992px) {
        .flip-book-wrapper {
            height: 800px;
        }
        
        .page-title {
            font-size: 1.8rem;
        }
    }
    
    @media (max-width: 768px) {
        .flip-book-container {
            min-height: 850px;
        }
        
        .flip-book-wrapper {
            height: 850px;
        }
        
        .book-spine {
            display: none;
        }
        
        .page-turn-indicators {
            left: 10px;
            right: 10px;
        }
        
        .page-turn {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .menu-card {
            height: 140px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Flip Book Navigation
    let currentPage = 1;
    const totalPages = 4;
    const flipBook = document.getElementById('flipBook');
    const currentPageEl = document.getElementById('currentPage');
    const totalPagesEl = document.getElementById('totalPages');
    const prevBtn = document.getElementById('prevPage');
    const nextBtn = document.getElementById('nextPage');
    const flipPrev = document.getElementById('flipPrev');
    const flipNext = document.getElementById('flipNext');
    
    totalPagesEl.textContent = totalPages;
    
    // Initialize pages
    function initPages() {
        const pages = document.querySelectorAll('.flip-page');
        pages.forEach((page, index) => {
            page.classList.remove('active', 'prev', 'next');
            if (index + 1 === currentPage) {
                page.classList.add('active');
            }
        });
    }
    
    // Flip page animation
    function flipPage(direction) {
        if (direction === 'next' && currentPage < totalPages) {
            // Get current and next pages
            const current = document.querySelector(`.flip-page[data-page="${currentPage}"]`);
            const next = document.querySelector(`.flip-page[data-page="${currentPage + 1}"]`);
            
            if (!current || !next) return;
            
            // Add animation classes
            current.style.transform = 'rotateY(-180deg)';
            next.style.transform = 'rotateY(0deg)';
            next.style.display = 'block';
            
            // Update current page after animation
            setTimeout(() => {
                current.classList.remove('active');
                next.classList.add('active');
                currentPage++;
                updateUI();
            }, 300);
        } 
        else if (direction === 'prev' && currentPage > 1) {
            // Get current and previous pages
            const current = document.querySelector(`.flip-page[data-page="${currentPage}"]`);
            const prev = document.querySelector(`.flip-page[data-page="${currentPage - 1}"]`);
            
            if (!current || !prev) return;
            
            // Add animation classes
            current.style.transform = 'rotateY(180deg)';
            prev.style.transform = 'rotateY(0deg)';
            prev.style.display = 'block';
            
            // Update current page after animation
            setTimeout(() => {
                current.classList.remove('active');
                prev.classList.add('active');
                currentPage--;
                updateUI();
            }, 300);
        }
    }
    
    function updateUI() {
        currentPageEl.textContent = currentPage;
        
        // Update button states
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages;
        flipPrev.disabled = currentPage === 1;
        flipNext.disabled = currentPage === totalPages;
        
        // Add visual feedback for disabled buttons
        flipPrev.style.opacity = currentPage === 1 ? '0.5' : '1';
        flipNext.style.opacity = currentPage === totalPages ? '0.5' : '1';
    }
    
    // Event listeners for navigation
    prevBtn.addEventListener('click', () => flipPage('prev'));
    nextBtn.addEventListener('click', () => flipPage('next'));
    flipPrev.addEventListener('click', () => flipPage('prev'));
    flipNext.addEventListener('click', () => flipPage('next'));
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            flipPage('prev');
        } else if (e.key === 'ArrowRight') {
            flipPage('next');
        }
    });
    
    // Category Filtering
    document.querySelectorAll('.category-bookmark').forEach(bookmark => {
        bookmark.addEventListener('click', function() {
            // Update active bookmark
            document.querySelectorAll('.category-bookmark').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            const menuCards = document.querySelectorAll('.menu-card');
            
            menuCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Add to cart functionality
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const itemName = this.getAttribute('data-name');
            const itemPrice = this.getAttribute('data-price');
            
            // Show animation on card
            const card = this.closest('.menu-card-inner');
            card.style.transform = 'rotateY(180deg)';
            
            // Show notification
            createNotification('success', `${itemName} ditambahkan ke pesanan!`);
            
            // Reset card after 2 seconds
            setTimeout(() => {
                card.style.transform = '';
            }, 2000);
        });
    });
    
    // Demo flip animation
    function demoFlip() {
        if (currentPage < totalPages) {
            flipPage('next');
            setTimeout(() => {
                if (currentPage < totalPages) {
                    flipPage('next');
                }
            }, 1000);
        } else {
            // If on last page, go back to first
            while (currentPage > 1) {
                setTimeout(() => flipPage('prev'), (currentPage - 1) * 300);
            }
        }
    }
    
    // Auto flip on page load for demo effect
    document.addEventListener('DOMContentLoaded', function() {
        initPages();
        updateUI();
        
        // Small bounce animation on flip buttons
        setTimeout(() => {
            flipPrev.style.animation = 'bounce 1s 3';
            flipNext.style.animation = 'bounce 1s 3 0.5s';
        }, 1000);
    });
    
    // Create notification function
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
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                            border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
                    <small style="color: var(--warm-brown);">Menu berhasil ditambahkan</small>
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
    
    // Add CSS for bounce animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes bounce {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(-5px); }
        }
        
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection