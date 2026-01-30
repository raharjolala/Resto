@extends('layouts.app')

@section('title', 'Menu Buku Digital - JOSS GANDOS')

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
                        <button class="btn btn-sm px-3" id="prevBtn" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red);">
                            <i class="fas fa-chevron-left me-1"></i> Halaman Sebelum
                        </button>
                        <span class="px-3 py-2" style="background: var(--light-gray); border-radius: 10px;">
                            <span id="currentSpread">1-2</span>/<span id="totalSpreads">3</span>
                        </span>
                        <button class="btn btn-sm px-3" id="nextBtn" style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red);">
                            Halaman Berikut <i class="fas fa-chevron-right ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Realistic Book Container -->
            <div class="real-book-container">
                <div class="book-shadow"></div>
                <div class="book">
                    <!-- COVER PAGE -->
                    <div class="hardcover_front">
                        <div class="cover-front-bg"></div>
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
                    
                    <!-- PAGE SPREAD 1 (inside cover + page 1) -->
                    <div class="page spread-1 active" data-spread="1">
                        <!-- LEFT PAGE (inside cover) -->
                        <div class="page-left">
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
                        
                        <!-- RIGHT PAGE (page 1) -->
                        <div class="page-right">
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
                                            ['name' => 'Nasi Goreng Spesial JOSS', 'price' => 45000, 'desc' => 'Dengan ayam suwir, udang, telur, dan sayuran segar', 'spicy' => 2, 'veg' => false, 'best' => true],
                                            ['name' => 'Rendang Sapi Padang', 'price' => 55000, 'desc' => 'Dimasak 8 jam dengan rempah pilihan', 'spicy' => 3, 'veg' => false, 'best' => true],
                                            ['name' => 'Ayam Penyet Sambal Terasi', 'price' => 42000, 'desc' => 'Ayam krispi dengan sambal khas', 'spicy' => 4, 'veg' => false, 'best' => false],
                                            ['name' => 'Soto Betawi', 'price' => 38000, 'desc' => 'Soto khas Jakarta dengan santan', 'spicy' => 1, 'veg' => false, 'best' => false],
                                            ['name' => 'Gado-Gado Jakarta', 'price' => 35000, 'desc' => 'Salad khas dengan bumbu kacang', 'spicy' => 1, 'veg' => true, 'best' => false],
                                            ['name' => 'Nasi Liwet Sunda', 'price' => 40000, 'desc' => 'Nasi liwet dengan ikan asin dan sayuran', 'spicy' => 2, 'veg' => false, 'best' => false],
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
                    </div>
                    
                    <!-- PAGE SPREAD 2 (pages 2-3) -->
                    <div class="page spread-2" data-spread="2">
                        <!-- LEFT PAGE (page 2) -->
                        <div class="page-left">
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
                                            ['name' => 'Lumpia Sayur', 'price' => 28000, 'desc' => 'Lumpia dengan isian sayuran segar', 'spicy' => 0, 'veg' => true],
                                            ['name' => 'Sate Ayam', 'price' => 35000, 'desc' => '10 tusuk sate dengan bumbu kacang', 'spicy' => 2, 'veg' => false],
                                            ['name' => 'Pempek Palembang', 'price' => 32000, 'desc' => 'Pempek ikan dengan cuko khas', 'spicy' => 1, 'veg' => false],
                                            ['name' => 'Tahu Gejrot', 'price' => 25000, 'desc' => 'Tahu goreng dengan saus kecap pedas', 'spicy' => 3, 'veg' => true],
                                            ['name' => 'Sup Buntut', 'price' => 45000, 'desc' => 'Sup buntut dengan sayuran', 'spicy' => 1, 'veg' => false],
                                            ['name' => 'Keripik Tempe', 'price' => 18000, 'desc' => 'Tempe iris tipis digoreng krispi', 'spicy' => 0, 'veg' => true],
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
                                    <div class="page-corner left"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- RIGHT PAGE (page 3) -->
                        <div class="page-right">
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
                                            ['name' => 'Es Teh Manis', 'price' => 12000, 'desc' => 'Es teh dengan gula aren asli', 'type' => 'cold', 'best' => false],
                                            ['name' => 'Wedang Jahe', 'price' => 18000, 'desc' => 'Jahe hangat dengan madu asli', 'type' => 'hot', 'best' => false],
                                            ['name' => 'Es Cincau', 'price' => 15000, 'desc' => 'Cincau hitam dengan sirup gula merah', 'type' => 'cold', 'best' => true],
                                            ['name' => 'Kopi Tubruk', 'price' => 20000, 'desc' => 'Kopi khas Indonesia', 'type' => 'hot', 'best' => false],
                                            ['name' => 'Jus Alpukat', 'price' => 22000, 'desc' => 'Alpukat segar dengan susu kental', 'type' => 'cold', 'best' => false],
                                            ['name' => 'Bajigur Sunda', 'price' => 25000, 'desc' => 'Minuman hangat khas Sunda', 'type' => 'hot', 'best' => true],
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
                    </div>
                    
                    <!-- PAGE SPREAD 3 (pages 4-5) -->
                    <div class="page spread-3" data-spread="3">
                        <!-- LEFT PAGE (page 4) -->
                        <div class="page-left">
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
                                            ['name' => 'Es Campur', 'price' => 22000, 'desc' => 'Es campur dengan buah segar', 'type' => 'cold', 'best' => true],
                                            ['name' => 'Klepon', 'price' => 18000, 'desc' => 'Kue tradisional isi gula merah', 'type' => 'normal', 'best' => false],
                                            ['name' => 'Pisang Goreng', 'price' => 20000, 'desc' => 'Pisang goreng dengan keju dan coklat', 'type' => 'hot', 'best' => false],
                                            ['name' => 'Bubur Sumsum', 'price' => 15000, 'desc' => 'Bubur dengan saus gula merah', 'type' => 'warm', 'best' => false],
                                            ['name' => 'Lapis Legit', 'price' => 25000, 'desc' => 'Kue lapis legit khas Indonesia', 'type' => 'normal', 'best' => true],
                                            ['name' => 'Martabak Manis', 'price' => 30000, 'desc' => 'Martabak dengan topping pilihan', 'type' => 'hot', 'best' => false],
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
                                    <div class="page-corner left"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- RIGHT PAGE (page 5 - closing page) -->
                        <div class="page-right">
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
                                    <div class="closing-logo mt-5">
                                        <div class="logo-circle">JG</div>
                                        <p class="mt-3 mb-0" style="color: var(--warm-brown);">JOSS GANDOS Restoran</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- BACK COVER -->
                    <div class="hardcover_back">
                        <div class="cover-back-bg"></div>
                        <div class="back-cover-content">
                            <div class="back-logo">JG</div>
                            <p class="back-text">Restoran Indonesia</p>
                            <div class="back-decoration"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Page turn handles -->
                <div class="page-turn left-turn" id="prevPageArea">
                    <div class="turn-indicator">
                        <i class="fas fa-angle-left"></i>
                        <span>Balik Halaman</span>
                    </div>
                </div>
                <div class="page-turn right-turn" id="nextPageArea">
                    <div class="turn-indicator">
                        <span>Balik Halaman</span>
                        <i class="fas fa-angle-right"></i>
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
                                        Klik area kiri/kanan buku untuk membalik • Gunakan tombol navigasi • Tarik halaman dengan mouse atau sentuhan
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
        max-width: 1000px;
        height: 700px;
        margin: 0 auto;
        perspective: 2000px;
    }
    
    .book-shadow {
        position: absolute;
        width: 90%;
        height: 30px;
        background: rgba(0,0,0,0.3);
        border-radius: 50%;
        bottom: -15px;
        left: 5%;
        filter: blur(10px);
        z-index: 0;
    }
    
    /* Main Book Container */
    .book {
        position: relative;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transform: translateZ(0);
    }
    
    /* Hard Covers */
    .hardcover_front, .hardcover_back {
        position: absolute;
        width: 50%;
        height: 100%;
        background: linear-gradient(145deg, var(--primary-dark), #8a0000, var(--primary-red));
        border-radius: 5px 15px 15px 5px;
        box-shadow: 
            -10px 0 30px rgba(0,0,0,0.3),
            inset 0 1px 0 rgba(255,255,255,0.2),
            inset -5px 0 20px rgba(0,0,0,0.3);
        transform-origin: left center;
        transition: transform 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        z-index: 20;
        overflow: hidden;
    }
    
    .hardcover_back {
        left: 50%;
        border-radius: 15px 5px 5px 15px;
        transform-origin: right center;
        background: linear-gradient(145deg, #8a0000, var(--primary-dark));
    }
    
    .cover-front-bg, .cover-back-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M20,20 Q40,10 60,20 T100,20" stroke="%23FFD700" stroke-width="0.5" fill="none" opacity="0.1"/><path d="M20,50 Q40,40 60,50 T100,50" stroke="%23FFD700" stroke-width="0.5" fill="none" opacity="0.1"/><path d="M20,80 Q40,70 60,80 T100,80" stroke="%23FFD700" stroke-width="0.5" fill="none" opacity="0.1"/></svg>');
        background-size: 100px;
        opacity: 0.3;
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
        z-index: 2;
    }
    
    .cover-title {
        margin-bottom: 40px;
    }
    
    .cover-main-title {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 900;
        color: #FFD700;
        text-shadow: 3px 3px 0 rgba(0,0,0,0.3);
        letter-spacing: 5px;
        margin-bottom: 0;
    }
    
    .cover-sub-title {
        font-family: 'Great Vibes', cursive;
        font-size: 2.8rem;
        color: #FFF;
        margin-top: -15px;
        text-shadow: 2px 2px 0 rgba(0,0,0,0.3);
    }
    
    .cover-decoration {
        width: 180px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #FFD700, transparent);
        margin: 20px auto;
    }
    
    .cover-book-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: #FFF;
        margin-bottom: 10px;
        font-weight: 500;
    }
    
    .cover-description {
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        color: rgba(255,255,255,0.8);
        letter-spacing: 3px;
        text-transform: uppercase;
    }
    
    .cover-gold-decoration {
        position: absolute;
        bottom: 30px;
        display: flex;
        gap: 30px;
        font-size: 1.3rem;
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
        font-size: 1.1rem;
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
        z-index: 2;
    }
    
    .back-logo {
        font-size: 3.5rem;
        font-weight: 900;
        color: rgba(255,215,0,0.3);
        font-family: 'Playfair Display', serif;
    }
    
    .back-text {
        font-family: 'Inter', sans-serif;
        font-size: 1.1rem;
        color: rgba(255,255,255,0.5);
        letter-spacing: 5px;
        text-transform: uppercase;
        margin-top: 10px;
    }
    
    .back-decoration {
        width: 130px;
        height: 2px;
        background: linear-gradient(90deg, transparent, #FFD700, transparent);
        margin-top: 20px;
    }
    
    /* Page Spreads */
    .page {
        position: absolute;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: transform 1.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        display: none;
    }
    
    .page.active {
        display: flex;
        transform: rotateY(0deg);
        z-index: 10;
    }
    
    .page-left, .page-right {
        position: relative;
        width: 50%;
        height: 100%;
        background: linear-gradient(to right, #f9f3e9 0%, #fff 5%, #fff 95%, #f9f3e9 100%);
        overflow: hidden;
    }
    
    .page-left {
        border-radius: 0 2px 2px 0;
        box-shadow: 
            inset 5px 0 10px rgba(0,0,0,0.05),
            0 5px 15px rgba(0,0,0,0.1);
    }
    
    .page-right {
        border-radius: 2px 0 0 2px;
        box-shadow: 
            inset -5px 0 10px rgba(0,0,0,0.05),
            0 5px 15px rgba(0,0,0,0.1);
    }
    
    /* Page Content */
    .page-content {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 40px;
        background: #fff;
        overflow-y: auto;
    }
    
    .page-left .page-content {
        border-right: 1px solid rgba(0,0,0,0.05);
    }
    
    .page-right .page-content {
        border-left: 1px solid rgba(0,0,0,0.05);
    }
    
    /* Page Margin */
    .page-margin {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 40px;
        background: linear-gradient(to right, #f9f3e9, #f5f0e1);
    }
    
    .page-right .page-margin {
        left: auto;
        right: 0;
        background: linear-gradient(to left, #f9f3e9, #f5f0e1);
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
    
    .page-right .margin-decoration {
        left: auto;
        right: 20px;
        transform: translate(50%, -50%);
    }
    
    /* Page Header */
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
        font-size: 1.1rem;
        box-shadow: 0 4px 10px rgba(180, 34, 34, 0.3);
        font-family: 'Playfair Display', serif;
    }
    
    .page-left .page-number {
        right: auto;
        left: 0;
    }
    
    .page-title {
        font-family: 'Playfair Display', serif;
        color: var(--dark-charcoal);
        font-size: 1.8rem;
        position: relative;
        display: inline-block;
        padding-right: 50px;
    }
    
    .page-left .page-title {
        padding-right: 0;
        padding-left: 50px;
    }
    
    /* Page Body */
    .page-body {
        height: calc(100% - 120px);
        overflow-y: auto;
        padding-right: 10px;
    }
    
    .page-left .page-body {
        padding-right: 5px;
        padding-left: 10px;
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
        font-size: 0.95rem;
        margin: 0;
    }
    
    .item-badge {
        background: var(--accent-gold);
        color: white;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.65rem;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    
    .item-desc {
        color: var(--warm-brown);
        font-size: 0.8rem;
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
        gap: 6px;
        flex-wrap: wrap;
    }
    
    .item-tag {
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 0.7rem;
        display: flex;
        align-items: center;
        gap: 3px;
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
        font-size: 0.95rem;
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
        font-size: 0.95rem;
    }
    
    .back-content p {
        color: rgba(255,255,255,0.8);
        font-size: 0.8rem;
        margin-bottom: 12px;
    }
    
    .btn-order {
        background: white;
        color: var(--primary-red);
        border: none;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.8rem;
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
    
    .page-corner.left {
        right: auto;
        left: 0;
        border-right: none;
        border-left: 2px solid rgba(180, 34, 34, 0.1);
    }
    
    /* Special Pages */
    .page-text {
        position: absolute;
        top: 50%;
        left: 60px;
        right: 60px;
        transform: translateY(-50%);
        text-align: center;
    }
    
    .page-inscription {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
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
    
    .page-logo, .closing-logo {
        margin-top: 30px;
    }
    
    .logo-circle {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        font-weight: bold;
        margin: 0 auto;
        box-shadow: 0 8px 20px rgba(180, 34, 34, 0.3);
    }
    
    .page-closing {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: var(--dark-charcoal);
        margin-bottom: 30px;
    }
    
    .contact-info {
        text-align: center;
        margin-top: 30px;
    }
    
    .contact-info p {
        color: var(--warm-brown);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    .contact-info i {
        color: var(--primary-red);
        width: 20px;
    }
    
    /* Page Turn Handles */
    .page-turn {
        position: absolute;
        top: 0;
        width: 80px;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 30;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .left-turn {
        left: 0;
    }
    
    .right-turn {
        right: 0;
    }
    
    .page-turn:hover {
        opacity: 1;
    }
    
    .turn-indicator {
        background: rgba(180, 34, 34, 0.1);
        padding: 15px 10px;
        border-radius: 8px;
        color: var(--primary-red);
        font-size: 0.8rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(180, 34, 34, 0.2);
    }
    
    .turn-indicator i {
        font-size: 1.5rem;
    }
    
    /* Book States */
    .book.open .hardcover_front {
        transform: rotateY(-180deg);
        z-index: 15;
    }
    
    .book.open .hardcover_back {
        transform: rotateY(180deg);
        z-index: 15;
    }
    
    /* Scrollbar */
    .page-body::-webkit-scrollbar {
        width: 4px;
    }
    
    .page-body::-webkit-scrollbar-track {
        background: rgba(0,0,0,0.05);
        border-radius: 10px;
    }
    
    .page-body::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 10px;
    }
    
    /* Animations */
    @keyframes pageFlip {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }
    
    @keyframes bookOpen {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }
    
    @keyframes subtleGlow {
        0%, 100% { box-shadow: -10px 0 30px rgba(0,0,0,0.3); }
        50% { box-shadow: -10px 0 40px rgba(180, 34, 34, 0.4); }
    }
    
    /* Responsive */
    @media (max-width: 992px) {
        .real-book-container {
            height: 600px;
        }
        
        .cover-main-title {
            font-size: 3.5rem;
        }
        
        .cover-sub-title {
            font-size: 2.2rem;
        }
        
        .page-content {
            padding: 25px;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .page-inscription {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .real-book-container {
            height: 500px;
        }
        
        .cover-content {
            padding: 20px;
        }
        
        .cover-main-title {
            font-size: 2.8rem;
        }
        
        .cover-sub-title {
            font-size: 1.8rem;
        }
        
        .page-content {
            padding: 20px;
        }
        
        .page-body {
            height: calc(100% - 100px);
        }
        
        .menu-item-content {
            height: 85px;
        }
        
        .page-turn {
            width: 50px;
        }
        
        .turn-indicator {
            padding: 10px 5px;
            font-size: 0.7rem;
        }
        
        .turn-indicator i {
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 576px) {
        .real-book-container {
            height: 450px;
        }
        
        .cover-main-title {
            font-size: 2.2rem;
        }
        
        .cover-sub-title {
            font-size: 1.4rem;
        }
        
        .page-content {
            padding: 15px;
        }
        
        .page-title {
            font-size: 1.3rem;
        }
        
        .menu-item-content {
            height: 95px;
        }
        
        .item-name {
            font-size: 0.9rem;
        }
        
        .item-desc {
            font-size: 0.75rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Book State Management
    let currentSpread = 1;
    const totalSpreads = 3;
    const book = document.querySelector('.book');
    const spreads = document.querySelectorAll('.page');
    const currentSpreadEl = document.getElementById('currentSpread');
    const totalSpreadsEl = document.getElementById('totalSpreads');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const prevPageArea = document.getElementById('prevPageArea');
    const nextPageArea = document.getElementById('nextPageArea');
    const hardcoverFront = document.querySelector('.hardcover_front');
    const hardcoverBack = document.querySelector('.hardcover_back');
    
    totalSpreadsEl.textContent = totalSpreads;
    
    // Open book on load
    setTimeout(() => {
        book.classList.add('open');
        hardcoverFront.style.animation = 'subtleGlow 3s ease-in-out infinite';
        updateUI();
    }, 800);
    
    // Turn page function
    function turnPage(direction) {
        if (direction === 'next' && currentSpread < totalSpreads) {
            const current = document.querySelector(`.page[data-spread="${currentSpread}"]`);
            const next = document.querySelector(`.page[data-spread="${currentSpread + 1}"]`);
            
            if (!current || !next) return;
            
            // Animate page turn
            current.style.transform = 'rotateY(-180deg)';
            current.style.opacity = '0';
            current.style.pointerEvents = 'none';
            
            setTimeout(() => {
                current.classList.remove('active');
                current.style.transform = '';
                current.style.opacity = '';
                current.style.pointerEvents = '';
                
                next.classList.add('active');
                next.style.opacity = '0';
                next.style.transform = 'rotateY(180deg)';
                
                // Animate new spread in
                setTimeout(() => {
                    next.style.transform = 'rotateY(0deg)';
                    next.style.opacity = '1';
                    currentSpread++;
                    updateUI();
                    
                    // Play page turn sound effect
                    playPageTurnSound();
                }, 50);
            }, 800);
        } 
        else if (direction === 'prev' && currentSpread > 1) {
            const current = document.querySelector(`.page[data-spread="${currentSpread}"]`);
            const prev = document.querySelector(`.page[data-spread="${currentSpread - 1}"]`);
            
            if (!current || !prev) return;
            
            // Animate page turn back
            current.style.transform = 'rotateY(180deg)';
            current.style.opacity = '0';
            current.style.pointerEvents = 'none';
            
            setTimeout(() => {
                current.classList.remove('active');
                current.style.transform = '';
                current.style.opacity = '';
                current.style.pointerEvents = '';
                
                prev.classList.add('active');
                prev.style.opacity = '0';
                prev.style.transform = 'rotateY(-180deg)';
                
                // Animate previous spread in
                setTimeout(() => {
                    prev.style.transform = 'rotateY(0deg)';
                    prev.style.opacity = '1';
                    currentSpread--;
                    updateUI();
                    
                    // Play page turn sound effect
                    playPageTurnSound();
                }, 50);
            }, 800);
        }
    }
    
    function updateUI() {
        // Update spread indicator
        const pageStart = (currentSpread - 1) * 2;
        const pageEnd = pageStart + 1;
        currentSpreadEl.textContent = `${pageStart + 1}-${pageEnd + 1}`;
        
        // Update button states
        prevBtn.disabled = currentSpread === 1;
        nextBtn.disabled = currentSpread === totalSpreads;
        
        // Update button styles
        prevBtn.style.opacity = currentSpread === 1 ? '0.5' : '1';
        nextBtn.style.opacity = currentSpread === totalSpreads ? '0.5' : '1';
        
        // Show/hide page turn areas
        prevPageArea.style.opacity = currentSpread === 1 ? '0' : '0.3';
        nextPageArea.style.opacity = currentSpread === totalSpreads ? '0' : '0.3';
        
        // Add visual effects for current spread
        spreads.forEach(spread => {
            spread.style.boxShadow = '';
        });
        
        const activeSpread = document.querySelector(`.page[data-spread="${currentSpread}"]`);
        if (activeSpread) {
            activeSpread.style.boxShadow = '0 10px 30px rgba(0,0,0,0.2)';
        }
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => turnPage('prev'));
    nextBtn.addEventListener('click', () => turnPage('next'));
    
    // Page turn areas
    prevPageArea.addEventListener('click', () => turnPage('prev'));
    nextPageArea.addEventListener('click', () => turnPage('next'));
    
    // Click on book edges to turn pages
    book.addEventListener('click', (e) => {
        const rect = book.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const width = rect.width;
        
        // Left 20% for previous page
        if (clickX < width * 0.2) {
            turnPage('prev');
        }
        // Right 20% for next page
        else if (clickX > width * 0.8) {
            turnPage('next');
        }
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft' || e.key === 'PageUp') {
            turnPage('prev');
        } else if (e.key === 'ArrowRight' || e.key === 'PageDown' || e.key === ' ') {
            turnPage('next');
        }
    });
    
    // Drag to turn
    let isDragging = false;
    let startX = 0;
    let dragThreshold = 50;
    
    book.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.clientX;
        book.style.cursor = 'grabbing';
    });
    
    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        
        const deltaX = e.clientX - startX;
        if (Math.abs(deltaX) > dragThreshold) {
            if (deltaX > 0) {
                turnPage('prev');
            } else {
                turnPage('next');
            }
            isDragging = false;
            book.style.cursor = '';
        }
    });
    
    document.addEventListener('mouseup', () => {
        isDragging = false;
        book.style.cursor = '';
    });
    
    // Touch support for mobile
    book.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        e.preventDefault();
    }, { passive: false });
    
    book.addEventListener('touchmove', (e) => {
        if (!startX) return;
        
        const currentX = e.touches[0].clientX;
        const deltaX = currentX - startX;
        
        if (Math.abs(deltaX) > 30) {
            if (deltaX > 0) {
                turnPage('prev');
            } else {
                turnPage('next');
            }
            startX = currentX;
        }
        e.preventDefault();
    }, { passive: false });
    
    book.addEventListener('touchend', () => {
        startX = 0;
    });
    
    // Auto flip demo
    function autoFlipDemo() {
        let demoSpread = currentSpread;
        const demoInterval = setInterval(() => {
            if (demoSpread < totalSpreads) {
                turnPage('next');
                demoSpread++;
            } else {
                clearInterval(demoInterval);
                // Return to start after demo
                setTimeout(() => {
                    while (currentSpread > 1) {
                        turnPage('prev');
                    }
                }, 1000);
            }
        }, 2000);
    }
    
    // Page turn sound effect
    function playPageTurnSound() {
        // Create a simple page turn sound using Web Audio API
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.setValueAtTime(150, audioContext.currentTime);
            oscillator.frequency.exponentialRampToValueAtTime(50, audioContext.currentTime + 0.3);
            
            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.3);
            
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.3);
        } catch (e) {
            // Fallback to silent if Web Audio API not supported
        }
    }
    
    // Order button functionality
    document.querySelectorAll('.btn-order').forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            const itemName = this.getAttribute('data-name');
            const itemPrice = this.getAttribute('data-price');
            
            // Animate the card
            const card = this.closest('.menu-item-content');
            card.style.transform = 'rotateY(180deg)';
            
            // Show notification
            createNotification('success', `${itemName} ditambahkan ke pesanan!`, `Rp ${parseInt(itemPrice).toLocaleString('id-ID')}`);
            
            // Reset card after 2 seconds
            setTimeout(() => {
                card.style.transform = '';
            }, 2000);
            
            // Here you would typically add to cart
            // addToCart(itemName, itemPrice);
        });
    });
    
    // Notification function
    function createNotification(type, message, detail) {
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
                    <small style="color: var(--warm-brown);">${detail || 'Menu berhasil ditambahkan'}</small>
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
    
    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
    
    // Show turn handles on hover
    book.addEventListener('mouseenter', () => {
        if (currentSpread > 1) prevPageArea.style.opacity = '0.3';
        if (currentSpread < totalSpreads) nextPageArea.style.opacity = '0.3';
    });
    
    book.addEventListener('mouseleave', () => {
        prevPageArea.style.opacity = '0';
        nextPageArea.style.opacity = '0';
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