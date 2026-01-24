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
                                <i class="fas fa-book-open me-1"></i> Menu Buku Digital
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-hand-point-up me-1"></i> Klik & Tarik Halaman
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Content with Realistic Book -->
    <section class="section-padding">
        <div class="container">
            <div class="menu-navigation mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="animate-fade-in">
                        <h2 class="fw-bold mb-2" style="color: var(--dark-charcoal); font-size: 2.2rem;">Menu Buku Digital</h2>
                        <p class="text-muted mb-0">Balik halaman seperti buku nyata untuk menjelajahi menu</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm px-3" id="prevPage" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red);">
                            <i class="fas fa-chevron-left me-1"></i> Halaman Sebelum
                        </button>
                        <span class="px-3 py-2" style="background: var(--light-gray); border-radius: 10px;">
                            <span id="currentPage">1</span>/<span id="totalPages">4</span>
                        </span>
                        <button class="btn btn-sm px-3" id="nextPage" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red);">
                            Halaman Berikut <i class="fas fa-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Realistic Book Container -->
            <div class="real-book-container">
                <!-- Book Cover - Front -->
                <div class="book-cover book-cover-front">
                    <div class="cover-content">
                        <div class="cover-title">
                            <h2 class="cover-main-title">JOSS</h2>
                            <h3 class="cover-sub-title">GANDOS</h3>
                            <div class="cover-decoration"></div>
                        </div>
                        <div class="cover-detail">
                            <h4 class="cover-book-title">Menu Buku Resep</h4>
                            <p class="cover-description">Kuliner Nusantara</p>
                        </div>
                        <div class="cover-gold-decoration">
                            <i class="fas fa-utensils"></i>
                            <i class="fas fa-leaf"></i>
                            <i class="fas fa-pepper-hot"></i>
                        </div>
                    </div>
                    <div class="cover-spine">
                        <div class="spine-text">JOSS GANDOS</div>
                        <div class="spine-decoration"></div>
                    </div>
                </div>
                
                <!-- Book Pages -->
                <div class="book-pages">
                    <!-- Page 1: Cover Inside -->
                    <div class="book-page page-cover-inside" data-page="0">
                        <div class="page-content">
                            <div class="page-margin">
                                <div class="margin-decoration"></div>
                            </div>
                            <div class="page-text">
                                <h3 class="page-inscription">
                                    <i class="fas fa-quote-left"></i>
                                    Setiap Rempah Bercerita Tentang Indonesia
                                    <i class="fas fa-quote-right"></i>
                                </h3>
                                <p class="page-author">- Chef Andi, Founder JOSS GANDOS</p>
                                <div class="page-logo">
                                    <div class="logo-circle">JG</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Page 2: Menu Utama -->
                    <div class="book-page page-active" data-page="1">
                        <div class="page-content">
                            <div class="page-header">
                                <div class="page-number">1</div>
                                <h3 class="page-title">
                                    <i class="fas fa-utensils me-2" style="color: var(--primary-red);"></i>
                                    Menu Utama
                                </h3>
                            </div>
                            
                            <div class="page-body">
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
                                    <div class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-front">
                                                <div class="item-header">
                                                    <h4 class="item-name">{{ $item['name'] }}</h4>
                                                    @if($item['best'])
                                                        <span class="item-badge">
                                                            <i class="fas fa-crown"></i> Terbaik
                                                        </span>
                                                    @endif
                                                </div>
                                                <p class="item-desc">{{ $item['desc'] }}</p>
                                                <div class="item-footer">
                                                    <div class="item-tags">
                                                        @if($item['spicy'] > 0)
                                                            <span class="item-tag spicy">
                                                                <i class="fas fa-pepper-hot"></i> Level {{ $item['spicy'] }}
                                                            </span>
                                                        @endif
                                                        @if($item['veg'])
                                                            <span class="item-tag veg">
                                                                <i class="fas fa-leaf"></i> Vegetarian
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="item-price">
                                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item-back">
                                                <div class="back-content">
                                                    <h5>{{ $item['name'] }}</h5>
                                                    <p>{{ $item['desc'] }}</p>
                                                    <button class="btn-order" data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}">
                                                        <i class="fas fa-plus"></i> Pesan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="page-footer">
                                <div class="page-corner"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Page 3: Pembuka & Sup -->
                    <div class="book-page" data-page="2">
                        <div class="page-content">
                            <div class="page-header">
                                <div class="page-number">2</div>
                                <h3 class="page-title">
                                    <i class="fas fa-leaf me-2" style="color: var(--primary-red);"></i>
                                    Pembuka & Sup
                                </h3>
                            </div>
                            
                            <div class="page-body">
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
                                    <div class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-front">
                                                <div class="item-header">
                                                    <h4 class="item-name">{{ $item['name'] }}</h4>
                                                </div>
                                                <p class="item-desc">{{ $item['desc'] }}</p>
                                                <div class="item-footer">
                                                    <div class="item-tags">
                                                        @if($item['spicy'] > 0)
                                                            <span class="item-tag spicy">
                                                                <i class="fas fa-pepper-hot"></i> Level {{ $item['spicy'] }}
                                                            </span>
                                                        @endif
                                                        @if($item['veg'])
                                                            <span class="item-tag veg">
                                                                <i class="fas fa-leaf"></i> Vegetarian
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="item-price">
                                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item-back">
                                                <div class="back-content">
                                                    <h5>{{ $item['name'] }}</h5>
                                                    <p>{{ $item['desc'] }}</p>
                                                    <button class="btn-order" data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}">
                                                        <i class="fas fa-plus"></i> Pesan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="page-footer">
                                <div class="page-corner"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Page 4: Minuman -->
                    <div class="book-page" data-page="3">
                        <div class="page-content">
                            <div class="page-header">
                                <div class="page-number">3</div>
                                <h3 class="page-title">
                                    <i class="fas fa-glass-whiskey me-2" style="color: var(--primary-red);"></i>
                                    Minuman Segar
                                </h3>
                            </div>
                            
                            <div class="page-body">
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
                                    <div class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-front">
                                                <div class="item-header">
                                                    <h4 class="item-name">{{ $item['name'] }}</h4>
                                                    @if($item['best'])
                                                        <span class="item-badge">
                                                            <i class="fas fa-star"></i> Rekomendasi
                                                        </span>
                                                    @endif
                                                </div>
                                                <p class="item-desc">{{ $item['desc'] }}</p>
                                                <div class="item-footer">
                                                    <div class="item-tags">
                                                        <span class="item-tag {{ $item['type'] }}">
                                                            <i class="fas fa-{{ $item['type'] == 'hot' ? 'fire' : 'snowflake' }}"></i>
                                                            {{ $item['type'] == 'hot' ? 'Panas' : 'Dingin' }}
                                                        </span>
                                                    </div>
                                                    <div class="item-price">
                                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item-back">
                                                <div class="back-content">
                                                    <h5>{{ $item['name'] }}</h5>
                                                    <p>{{ $item['desc'] }}</p>
                                                    <button class="btn-order" data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}">
                                                        <i class="fas fa-plus"></i> Pesan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="page-footer">
                                <div class="page-corner"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Page 5: Desserts -->
                    <div class="book-page" data-page="4">
                        <div class="page-content">
                            <div class="page-header">
                                <div class="page-number">4</div>
                                <h3 class="page-title">
                                    <i class="fas fa-ice-cream me-2" style="color: var(--primary-red);"></i>
                                    Pencuci Mulut
                                </h3>
                            </div>
                            
                            <div class="page-body">
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
                                    <div class="menu-item">
                                        <div class="menu-item-content">
                                            <div class="menu-item-front">
                                                <div class="item-header">
                                                    <h4 class="item-name">{{ $item['name'] }}</h4>
                                                    @if($item['best'])
                                                        <span class="item-badge">
                                                            <i class="fas fa-heart"></i> Favorit
                                                        </span>
                                                    @endif
                                                </div>
                                                <p class="item-desc">{{ $item['desc'] }}</p>
                                                <div class="item-footer">
                                                    <div class="item-tags">
                                                        <span class="item-tag {{ $item['type'] }}">
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
                                                    <div class="item-price">
                                                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="menu-item-back">
                                                <div class="back-content">
                                                    <h5>{{ $item['name'] }}</h5>
                                                    <p>{{ $item['desc'] }}</p>
                                                    <button class="btn-order" data-name="{{ $item['name'] }}" data-price="{{ $item['price'] }}">
                                                        <i class="fas fa-plus"></i> Pesan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="page-footer">
                                <div class="page-corner"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Page 6: Back Cover Inside -->
                    <div class="book-page page-cover-inside" data-page="5">
                        <div class="page-content">
                            <div class="page-margin">
                                <div class="margin-decoration"></div>
                            </div>
                            <div class="page-text">
                                <h3 class="page-closing">
                                    Terima Kasih Atas Kunjungan Anda
                                </h3>
                                <div class="contact-info">
                                    <p><i class="fas fa-map-marker-alt"></i> JL Baye Kuliner No. 123, Jakarta</p>
                                    <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                                    <p><i class="fas fa-clock"></i> Buka Setiap Hari 10:00 - 22:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Book Cover - Back -->
                <div class="book-cover book-cover-back">
                    <div class="back-cover-content">
                        <div class="back-logo">JG</div>
                        <p class="back-text">Restoran Indonesia</p>
                        <div class="back-decoration"></div>
                    </div>
                </div>
                
                <!-- Page Turn Handles -->
                <div class="page-turn-handles">
                    <div class="page-turn top-turn" id="topTurn">
                        <i class="fas fa-angle-up"></i>
                    </div>
                    <div class="page-turn bottom-turn" id="bottomTurn">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>
            </div>
            
            <!-- Page Navigation Tips -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card animate-fade-in">
                        <div class="p-4" style="background: rgba(180, 34, 34, 0.05); border-radius: 15px;">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="fw-bold mb-2" style="color: var(--primary-red);">
                                        <i class="fas fa-lightbulb me-2"></i> Tips Navigasi Buku
                                    </h5>
                                    <p class="mb-0" style="color: var(--warm-brown);">
                                        Klik area atas/bawah halaman untuk membalik • Gunakan tombol navigasi • Drag halaman dengan mouse
                                    </p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button class="btn btn-sm px-3" style="background: var(--primary-red); color: white;" onclick="autoFlipDemo()">
                                        <i class="fas fa-play me-1"></i> Demo Otomatis
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
    /* Real Book Container */
    .real-book-container {
        position: relative;
        width: 100%;
        max-width: 900px;
        height: 700px;
        margin: 0 auto;
        perspective: 2000px;
        transform-style: preserve-3d;
    }
    
    /* Book Covers */
    .book-cover {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, var(--primary-dark), #8a0000, var(--primary-red));
        border-radius: 5px 15px 15px 5px;
        transform-origin: left center;
        transition: transform 1s ease;
        z-index: 10;
        box-shadow: 
            0 20px 40px rgba(0,0,0,0.3),
            inset 0 1px 0 rgba(255,255,255,0.2),
            inset -5px 0 20px rgba(0,0,0,0.3);
        border: 1px solid rgba(0,0,0,0.2);
    }
    
    .book-cover-front {
        z-index: 20;
    }
    
    .cover-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 40px;
        color: #FFD700;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    
    .cover-title {
        margin-bottom: 40px;
    }
    
    .cover-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 5rem;
        font-weight: 900;
        color: #FFD700;
        text-shadow: 3px 3px 0 rgba(0,0,0,0.3);
        letter-spacing: 5px;
        margin-bottom: 0;
    }
    
    .cover-sub-title {
        font-family: 'Great Vibes', cursive;
        font-size: 3rem;
        color: #FFF;
        margin-top: -15px;
        text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
    }
    
    .cover-decoration {
        width: 200px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #FFD700, transparent);
        margin: 20px auto;
    }
    
    .cover-book-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #FFF;
        margin-bottom: 10px;
        font-weight: 500;
    }
    
    .cover-description {
        font-family: 'Inter', sans-serif;
        font-size: 1rem;
        color: rgba(255,255,255,0.8);
        letter-spacing: 3px;
        text-transform: uppercase;
    }
    
    .cover-gold-decoration {
        position: absolute;
        bottom: 30px;
        display: flex;
        gap: 30px;
        font-size: 1.5rem;
        color: #FFD700;
        opacity: 0.7;
    }
    
    .cover-spine {
        position: absolute;
        left: -25px;
        top: 20px;
        bottom: 20px;
        width: 25px;
        background: linear-gradient(to right, #8a0000, var(--primary-dark), #8a0000);
        border-radius: 5px 0 0 5px;
        box-shadow: -5px 0 15px rgba(0,0,0,0.3);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        writing-mode: vertical-rl;
        text-orientation: mixed;
    }
    
    .spine-text {
        color: #FFD700;
        font-family: 'Playfair Display', serif;
        font-size: 1.2rem;
        font-weight: 600;
        letter-spacing: 3px;
        transform: rotate(180deg);
    }
    
    .spine-decoration {
        width: 15px;
        height: 2px;
        background: #FFD700;
        margin: 10px 0;
    }
    
    .book-cover-back {
        z-index: 1;
        background: linear-gradient(145deg, var(--primary-dark), #8a0000);
    }
    
    .back-cover-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #FFD700;
    }
    
    .back-logo {
        font-size: 4rem;
        font-weight: 900;
        color: rgba(255,215,0,0.3);
        font-family: 'Playfair Display', serif;
    }
    
    .back-text {
        font-family: 'Inter', sans-serif;
        font-size: 1.2rem;
        color: rgba(255,255,255,0.5);
        letter-spacing: 5px;
        text-transform: uppercase;
        margin-top: 10px;
    }
    
    .back-decoration {
        width: 150px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #FFD700, transparent);
        margin-top: 20px;
    }
    
    /* Book Pages */
    .book-pages {
        position: absolute;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        z-index: 5;
    }
    
    .book-page {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, #f9f3e9 0%, #fff 5%, #fff 95%, #f9f3e9 100%);
        border-radius: 2px;
        transform-origin: left center;
        transition: transform 1s ease;
        box-shadow: 
            0 5px 10px rgba(0,0,0,0.1),
            inset 0 0 0 1px rgba(0,0,0,0.05);
        display: none;
        overflow: hidden;
    }
    
    .book-page.page-active {
        display: block;
        transform: rotateY(0deg);
        z-index: 15;
    }
    
    .book-page.turning {
        display: block;
        transform: rotateY(-180deg);
        z-index: 16;
    }
    
    .page-content {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 40px;
        background: #fff;
    }
    
    /* Page Margin for book-like feel */
    .page-margin {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        background: linear-gradient(to right, #f9f3e9, #f5f0e1);
        border-right: 1px solid rgba(0,0,0,0.1);
    }
    
    .margin-decoration {
        position: absolute;
        top: 50%;
        left: 20px;
        width: 3px;
        height: 100px;
        background: rgba(180, 34, 34, 0.2);
        transform: translate(-50%, -50%);
    }
    
    /* Page Content Styling */
    .page-header {
        position: relative;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid rgba(180, 34, 34, 0.1);
    }
    
    .page-number {
        position: absolute;
        top: -10px;
        right: 0;
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
        box-shadow: 0 4px 10px rgba(180, 34, 34, 0.3);
        font-family: 'Playfair Display', serif;
    }
    
    .page-title {
        font-family: 'Playfair Display', serif;
        color: var(--dark-charcoal);
        font-size: 2.2rem;
        position: relative;
        display: inline-block;
        padding-right: 60px;
    }
    
    .page-body {
        height: calc(100% - 120px);
        overflow-y: auto;
        padding-right: 10px;
    }
    
    /* Menu Items */
    .menu-item {
        margin-bottom: 15px;
        perspective: 1000px;
    }
    
    .menu-item-content {
        position: relative;
        width: 100%;
        height: 90px;
        transform-style: preserve-3d;
        transition: transform 0.6s;
        cursor: pointer;
    }
    
    .menu-item:hover .menu-item-content {
        transform: rotateY(180deg);
    }
    
    .menu-item-front, .menu-item-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 8px;
        padding: 15px;
    }
    
    .menu-item-front {
        background: white;
        border: 1px solid rgba(180, 34, 34, 0.1);
        box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }
    
    .item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 8px;
    }
    
    .item-name {
        font-weight: 600;
        color: var(--dark-charcoal);
        font-size: 1rem;
        margin: 0;
    }
    
    .item-badge {
        background: var(--accent-gold);
        color: white;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.7rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .item-desc {
        color: var(--warm-brown);
        font-size: 0.85rem;
        margin-bottom: 10px;
        line-height: 1.4;
    }
    
    .item-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .item-tags {
        display: flex;
        gap: 8px;
    }
    
    .item-tag {
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .item-tag.spicy {
        background: rgba(230, 57, 70, 0.1);
        color: #e63946;
    }
    
    .item-tag.veg {
        background: rgba(42, 157, 143, 0.1);
        color: #2a9d8f;
    }
    
    .item-tag.hot {
        background: rgba(180, 34, 34, 0.1);
        color: var(--primary-red);
    }
    
    .item-tag.cold {
        background: rgba(33, 158, 188, 0.1);
        color: #2196BC;
    }
    
    .item-price {
        font-weight: 600;
        color: var(--primary-red);
        font-size: 1rem;
    }
    
    .menu-item-back {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        transform: rotateY(180deg);
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    
    .back-content h5 {
        color: white;
        margin-bottom: 8px;
        font-size: 1rem;
    }
    
    .back-content p {
        color: rgba(255,255,255,0.8);
        font-size: 0.85rem;
        margin-bottom: 12px;
    }
    
    .btn-order {
        background: white;
        color: var(--primary-red);
        border: none;
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 0 auto;
    }
    
    .btn-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255,255,255,0.2);
    }
    
    /* Page Footer */
    .page-footer {
        position: absolute;
        bottom: 20px;
        left: 40px;
        right: 40px;
    }
    
    .page-corner {
        width: 30px;
        height: 30px;
        border-bottom: 2px solid rgba(180, 34, 34, 0.1);
        border-right: 2px solid rgba(180, 34, 34, 0.1);
        position: absolute;
        bottom: 0;
        right: 0;
    }
    
    /* Special Pages */
    .page-cover-inside .page-text {
        position: absolute;
        top: 50%;
        left: 60px;
        right: 40px;
        transform: translateY(-50%);
        text-align: center;
    }
    
    .page-inscription {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--dark-charcoal);
        margin-bottom: 20px;
        line-height: 1.4;
    }
    
    .page-inscription i {
        color: var(--primary-red);
        opacity: 0.3;
        margin: 0 10px;
    }
    
    .page-author {
        color: var(--warm-brown);
        font-style: italic;
        margin-bottom: 40px;
    }
    
    .page-logo {
        margin-top: 30px;
    }
    
    .logo-circle {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: bold;
        margin: 0 auto;
        box-shadow: 0 8px 20px rgba(180, 34, 34, 0.3);
    }
    
    .page-closing {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: var(--dark-charcoal);
        margin-bottom: 30px;
    }
    
    .contact-info {
        text-align: left;
        margin-top: 30px;
    }
    
    .contact-info p {
        color: var(--warm-brown);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .contact-info i {
        color: var(--primary-red);
        width: 20px;
    }
    
    /* Page Turn Handles */
    .page-turn-handles {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 25;
        pointer-events: none;
    }
    
    .page-turn {
        position: absolute;
        width: 100%;
        height: 80px;
        background: linear-gradient(to bottom, 
            transparent 0%, 
            rgba(255,255,255,0.1) 20%,
            rgba(255,255,255,0.2) 50%,
            rgba(255,255,255,0.1) 80%,
            transparent 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        pointer-events: all;
        transition: all 0.3s ease;
        opacity: 0;
    }
    
    .page-turn:hover {
        opacity: 1;
        background: linear-gradient(to bottom, 
            transparent 0%, 
            rgba(180, 34, 34, 0.05) 20%,
            rgba(180, 34, 34, 0.1) 50%,
            rgba(180, 34, 34, 0.05) 80%,
            transparent 100%);
    }
    
    .top-turn {
        top: 0;
    }
    
    .bottom-turn {
        bottom: 0;
    }
    
    .page-turn i {
        color: var(--primary-red);
        font-size: 2rem;
        opacity: 0.5;
    }
    
    /* Book States */
    .book-open .book-cover-front {
        transform: rotateY(-180deg);
    }
    
    .book-open .book-page[data-page="0"] {
        display: block;
        transform: rotateY(-10deg);
        z-index: 14;
    }
    
    /* Responsive Design */
    @media (max-width: 992px) {
        .real-book-container {
            height: 600px;
        }
        
        .cover-main-title {
            font-size: 4rem;
        }
        
        .cover-sub-title {
            font-size: 2.5rem;
        }
        
        .page-title {
            font-size: 1.8rem;
        }
        
        .page-inscription {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .real-book-container {
            height: 500px;
            transform: scale(0.9);
            transform-origin: top center;
        }
        
        .cover-content {
            padding: 20px;
        }
        
        .cover-main-title {
            font-size: 3rem;
        }
        
        .cover-sub-title {
            font-size: 2rem;
        }
        
        .page-content {
            padding: 20px;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .menu-item-content {
            height: 100px;
        }
    }
    
    /* Scrollbar for page body */
    .page-body::-webkit-scrollbar {
        width: 5px;
    }
    
    .page-body::-webkit-scrollbar-track {
        background: rgba(0,0,0,0.05);
        border-radius: 10px;
    }
    
    .page-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 10px;
    }
    
    /* Animation Keyframes */
    @keyframes pageTurn {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }
    
    @keyframes bookOpen {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }
    
    @keyframes subtleGlow {
        0%, 100% { box-shadow: 0 20px 40px rgba(0,0,0,0.3); }
        50% { box-shadow: 0 20px 50px rgba(180, 34, 34, 0.4); }
    }
</style>
@endsection

@section('scripts')
<script>
    // Book State Management
    let currentPage = 1;
    const totalPages = 5; // 1-5 (0 is cover inside, 5 is back cover inside)
    const bookContainer = document.querySelector('.real-book-container');
    const pages = document.querySelectorAll('.book-page');
    const currentPageEl = document.getElementById('currentPage');
    const totalPagesEl = document.getElementById('totalPages');
    const prevBtn = document.getElementById('prevPage');
    const nextBtn = document.getElementById('nextPage');
    const topTurn = document.getElementById('topTurn');
    const bottomTurn = document.getElementById('bottomTurn');
    
    totalPagesEl.textContent = totalPages;
    
    // Open book on load
    setTimeout(() => {
        bookContainer.classList.add('book-open');
        updateUI();
        
        // Add subtle glow animation to cover
        const cover = document.querySelector('.book-cover-front');
        cover.style.animation = 'subtleGlow 3s ease-in-out infinite';
    }, 1000);
    
    // Turn page function
    function turnPage(direction) {
        if (direction === 'next' && currentPage < totalPages) {
            const current = document.querySelector(`.book-page[data-page="${currentPage}"]`);
            const next = document.querySelector(`.book-page[data-page="${currentPage + 1}"]`);
            
            if (!current || !next) return;
            
            // Add turning animation
            current.classList.remove('page-active');
            current.classList.add('turning');
            
            // Show next page after animation
            setTimeout(() => {
                current.classList.remove('turning');
                next.classList.add('page-active');
                currentPage++;
                updateUI();
                
                // Play page turn sound effect (optional)
                playPageTurnSound();
            }, 800);
        } 
        else if (direction === 'prev' && currentPage > 1) {
            const current = document.querySelector(`.book-page[data-page="${currentPage}"]`);
            const prev = document.querySelector(`.book-page[data-page="${currentPage - 1}"]`);
            
            if (!current || !prev) return;
            
            // Reverse turning animation
            current.classList.remove('page-active');
            prev.classList.remove('turning');
            prev.classList.add('page-active');
            
            currentPage--;
            updateUI();
            
            // Play page turn sound effect (optional)
            playPageTurnSound();
        }
    }
    
    function updateUI() {
        currentPageEl.textContent = currentPage;
        
        // Update button states
        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages;
        
        // Add visual effects for current page
        pages.forEach(page => {
            page.style.boxShadow = '';
        });
        
        const activePage = document.querySelector(`.book-page[data-page="${currentPage}"]`);
        if (activePage) {
            activePage.style.boxShadow = 
                '0 5px 15px rgba(0,0,0,0.2), inset 0 0 0 1px rgba(0,0,0,0.05), 0 0 20px rgba(180, 34, 34, 0.1)';
        }
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => turnPage('prev'));
    nextBtn.addEventListener('click', () => turnPage('next'));
    
    // Top and bottom turn areas
    topTurn.addEventListener('click', () => turnPage('prev'));
    bottomTurn.addEventListener('click', () => turnPage('next'));
    
    // Click on page edges to turn
    pages.forEach(page => {
        page.addEventListener('click', (e) => {
            const rect = page.getBoundingClientRect();
            const clickX = e.clientX - rect.left;
            const clickY = e.clientY - rect.top;
            const width = rect.width;
            const height = rect.height;
            
            // Top 20% for previous page
            if (clickY < height * 0.2) {
                turnPage('prev');
            }
            // Bottom 20% for next page
            else if (clickY > height * 0.8) {
                turnPage('next');
            }
            // Right 10% for next page (like turning a real book)
            else if (clickX > width * 0.9) {
                turnPage('next');
            }
        });
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft' || e.key === 'PageUp') {
            turnPage('prev');
        } else if (e.key === 'ArrowRight' || e.key === 'PageDown' || e.key === ' ') {
            turnPage('next');
        }
    });
    
    // Drag to turn (simulated)
    let isDragging = false;
    let startX = 0;
    
    bookContainer.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.clientX;
    });
    
    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        
        const deltaX = e.clientX - startX;
        if (Math.abs(deltaX) > 50) {
            if (deltaX > 0) {
                turnPage('prev');
            } else {
                turnPage('next');
            }
            isDragging = false;
        }
    });
    
    document.addEventListener('mouseup', () => {
        isDragging = false;
    });
    
    // Touch support for mobile
    bookContainer.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });
    
    bookContainer.addEventListener('touchmove', (e) => {
        const currentX = e.touches[0].clientX;
        const deltaX = currentX - startX;
        
        if (Math.abs(deltaX) > 50) {
            if (deltaX > 0) {
                turnPage('prev');
            } else {
                turnPage('next');
            }
            startX = currentX;
        }
    });
    
    // Auto flip demo
    function autoFlipDemo() {
        let demoPage = currentPage;
        const demoInterval = setInterval(() => {
            if (demoPage < totalPages) {
                turnPage('next');
                demoPage++;
            } else {
                clearInterval(demoInterval);
                // Go back to start after demo
                setTimeout(() => {
                    while (currentPage > 1) {
                        turnPage('prev');
                    }
                }, 1000);
            }
        }, 1500);
    }
    
    // Page turn sound effect (optional)
    function playPageTurnSound() {
        // You can add actual sound files here
        const audio = new Audio('data:audio/wav;base64,UklGRigAAABXQVZFZm10IBIAAAABAAEAQB8AAEAfAAABAAgAZGF0YQ');
        audio.volume = 0.3;
        audio.play().catch(() => {
            // Silent fail if audio can't play
        });
    }
    
    // Order button functionality
    document.querySelectorAll('.btn-order').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const itemName = this.getAttribute('data-name');
            
            // Animate the card
            const card = this.closest('.menu-item-content');
            card.style.transform = 'rotateY(180deg)';
            
            // Show notification
            createNotification('success', `${itemName} ditambahkan ke pesanan!`);
            
            // Reset card after 2 seconds
            setTimeout(() => {
                card.style.transform = '';
            }, 2000);
        });
    });
    
    // Notification function
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
    
    // Add CSS for slide animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Show turn handles on hover
    bookContainer.addEventListener('mouseenter', () => {
        topTurn.style.opacity = '0.5';
        bottomTurn.style.opacity = '0.5';
    });
    
    bookContainer.addEventListener('mouseleave', () => {
        topTurn.style.opacity = '0';
        bottomTurn.style.opacity = '0';
    });
    
    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        updateUI();
        
        // Console message
        console.log('%c📖 Menu Buku JOSS GANDOS 📖', 'background: linear-gradient(135deg, #B22222, #D4A017); color: white; padding: 10px 20px; border-radius: 5px; font-size: 14px; font-weight: bold;');
        console.log('%cBalik halaman untuk menemukan kelezatan Nusantara!', 'color: #8B7355; font-style: italic;');
    });
</script>
@endsection