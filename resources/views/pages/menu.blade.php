@extends('layouts.app')

@section('title', 'Menu & Promo - JOSS GANDOS Restoran')

@section('styles')
<style>
    /* All your existing CSS styles remain exactly the same */
    :root {
        --primary-red: #DC143C;
        --secondary-red: #B22222;
        --dark-red: #8B0000;
        --light-red: #FFE4E1;
        --accent-gold: #FFD700;
        --dark-charcoal: #2C2C2C;
        --warm-gray: #F5F5F5;
        --white: #FFFFFF;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: var(--white);
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
    }

    /* ==================== HERO CAROUSEL SECTION - ALL SIDES ROUNDED ==================== */
    .hero-carousel-section {
        position: relative;
        margin-top: 100px;
        height: 85vh;
        min-height: 600px;
        overflow: hidden;
        background: #0a0a0a;
        border-radius: 40px;
        margin: 100px 20px 0;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .hero-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 40px;
        overflow: hidden;
    }

    .hero-slide.active {
        opacity: 1;
        z-index: 1;
    }

    .hero-slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.8) 0%,
            rgba(220, 20, 60, 0.25) 50%,
            rgba(0, 0, 0, 0.95) 100%
        );
        z-index: 1;
        border-radius: 40px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 0 5%;
    }

    .hero-label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 215, 0, 0.25);
        color: var(--accent-gold);
        padding: 12px 30px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 2px;
        margin-bottom: 30px;
        text-transform: uppercase;
        animation: slideUpFade 0.8s 0.2s both;
    }

    @keyframes slideUpFade {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 4.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 20px;
        line-height: 1.2;
        letter-spacing: -1px;
        animation: slideUpFade 0.8s 0.4s both;
        text-shadow: 0 2px 20px rgba(0, 0, 0, 0.5);
    }

    .hero-subtitle {
        font-size: 1.4rem;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        font-weight: 300;
        line-height: 1.6;
        max-width: 700px;
        animation: slideUpFade 0.8s 0.6s both;
        padding: 0 20px;
    }

    .hero-price-container {
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 215, 0, 0.15);
        border-radius: 20px;
        padding: 25px 50px;
        margin-bottom: 40px;
        display: inline-block;
        animation: slideUpFade 0.8s 0.8s both;
        position: relative;
    }

    .price-display {
        display: flex;
        align-items: center;
        gap: 25px;
        justify-content: center;
    }

    .current-price {
        font-size: 3.5rem;
        font-weight: 700;
        color: var(--accent-gold);
        line-height: 1;
        font-family: 'Poppins', sans-serif;
    }

    .price-currency {
        font-size: 1.8rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
        margin-right: 5px;
    }

    .old-price {
        font-size: 2.5rem;
        color: rgba(255, 255, 255, 0.4);
        text-decoration: line-through;
        font-weight: 300;
    }

    .discount-badge {
        position: absolute;
        top: -15px;
        right: -15px;
        background: linear-gradient(135deg, #DC143C, #8B0000);
        color: white;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(220, 20, 60, 0.5);
        border: 2px solid rgba(255, 215, 0, 0.3);
        animation: pulse 2s infinite;
        z-index: 3;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    .discount-badge span:first-child {
        font-size: 1.8rem;
        line-height: 1;
    }

    .discount-badge span:last-child {
        font-size: 0.7rem;
        letter-spacing: 1px;
        margin-top: 2px;
    }

    /* Carousel Navigation Arrows */
    .carousel-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 215, 0, 0.3);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 20;
        font-size: 1.2rem;
    }

    .carousel-arrow:hover {
        background: var(--primary-red);
        border-color: var(--accent-gold);
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 0 20px rgba(220, 20, 60, 0.5);
    }

    .carousel-arrow.prev {
        left: 30px;
    }

    .carousel-arrow.next {
        right: 30px;
    }

    /* Carousel Navigation Dots */
    .carousel-nav {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        align-items: center;
        gap: 20px;
        z-index: 10;
    }

    .carousel-dots {
        display: flex;
        gap: 10px;
    }

    .carousel-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .carousel-dot.active {
        background: var(--accent-gold);
        transform: scale(1.2);
        box-shadow: 0 0 10px var(--accent-gold);
    }

    /* ==================== MENU SECTION - CLEAN & MINIMAL ==================== */
    .menu-section {
        padding: 80px 0;
        background: #fafafa;
        position: relative;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Category Filter */
    .category-filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 50px;
        padding: 0 20px;
    }

    .filter-btn {
        background: white;
        border: 1px solid #e0e0e0;
        color: #666;
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 500;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .filter-btn:hover {
        border-color: var(--primary-red);
        color: var(--primary-red);
    }

    .filter-btn.active {
        background: var(--primary-red);
        color: white;
        border-color: var(--primary-red);
    }

    /* Menu Grid */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        padding: 0 10px;
    }

    /* Menu Card - Enhanced Hover Effects */
    .menu-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        opacity: 0;
        transform: translateY(20px);
        animation: cardReveal 0.6s forwards;
        border: 1px solid rgba(220, 20, 60, 0);
    }

    @keyframes cardReveal {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ENHANCED HOVER EFFECTS */
    .menu-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px rgba(220, 20, 60, 0.2);
        border-color: var(--primary-red);
    }

    .card-image-container {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .card-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Image zoom effect on hover */
    .menu-card:hover .card-image-container img {
        transform: scale(1.12);
    }

    /* Image overlay effect on hover */
    .card-image-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(220, 20, 60, 0.2), rgba(139, 0, 0, 0.2));
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .menu-card:hover .card-image-container::after {
        opacity: 1;
    }

    .card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: white;
        color: var(--primary-red);
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        z-index: 2;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
    }

    /* Badge enhancement on hover */
    .menu-card:hover .card-badge {
        background: var(--primary-red);
        color: white;
        box-shadow: 0 6px 16px rgba(220, 20, 60, 0.3);
        transform: scale(1.05);
    }

    /* Category Icon Styling - Only for non-main course categories */
    .category-icon {
        position: absolute;
        top: 15px;
        left: 15px;
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
        font-size: 1.2rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        z-index: 2;
        transition: all 0.4s ease;
        border: 2px solid transparent;
    }

    /* Icon hover effect */
    .menu-card:hover .category-icon {
        transform: scale(1.1) rotate(5deg);
        background: var(--primary-red);
        color: white;
        border-color: var(--accent-gold);
        box-shadow: 0 6px 16px rgba(220, 20, 60, 0.4);
    }

    /* Icon colors for different categories */
    .category-icon.appetizer {
        background: linear-gradient(135deg, #4ECDC4, #45B7AA);
        color: white;
    }
    
    .category-icon.dessert {
        background: linear-gradient(135deg, #FFB6C1, #FF69B4);
        color: white;
    }
    
    .category-icon.drink {
        background: linear-gradient(135deg, #87CEEB, #00BFFF);
        color: white;
    }

    /* Hide icon for main course */
    .category-icon.main-course {
        display: none;
    }

    .card-content {
        padding: 20px;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
    }

    /* Content slide up effect on hover */
    .menu-card:hover .card-content {
        transform: translateY(-3px);
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 12px;
        transition: all 0.3s ease;
        padding-left: 0;
    }

    .card-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--dark-charcoal);
        line-height: 1.4;
        flex: 1;
        transition: color 0.3s ease;
    }

    /* Title color change on hover */
    .menu-card:hover .card-title {
        color: var(--primary-red);
    }

    .card-price {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary-red);
        margin-left: 15px;
        white-space: nowrap;
        transition: all 0.4s ease;
        position: relative;
    }

    /* Price animation on hover */
    .menu-card:hover .card-price {
        transform: scale(1.1);
        color: var(--dark-red);
    }

    .price-currency-small {
        font-size: 0.9rem;
        font-weight: 500;
        color: #888;
        margin-right: 2px;
        transition: color 0.3s ease;
    }

    .menu-card:hover .price-currency-small {
        color: var(--primary-red);
    }

    .card-description {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 15px;
        font-weight: 300;
        transition: all 0.4s ease;
        border-left: 2px solid transparent;
        padding-left: 0;
    }

    /* Description accent on hover */
    .menu-card:hover .card-description {
        color: #444;
        border-left: 2px solid var(--primary-red);
        padding-left: 12px;
    }

    /* Clean card footer - hanya untuk spacing */
    .card-footer {
        height: 5px;
        background: linear-gradient(to right, var(--primary-red), var(--accent-gold));
        width: 0;
        transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 0 0 20px 20px;
    }

    /* Footer gradient animation on hover */
    .menu-card:hover .card-footer {
        width: 100%;
    }

    /* Add a subtle shine effect */
    .menu-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, 0.2),
            transparent
        );
        transition: left 0.7s ease;
        z-index: 2;
        pointer-events: none;
    }

    .menu-card:hover::before {
        left: 100%;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-title {
            font-size: 4rem;
        }
        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 992px) {
        .hero-carousel-section {
            height: 75vh;
            min-height: 500px;
            border-radius: 35px;
            margin: 90px 15px 0;
        }
        .hero-slide {
            border-radius: 35px;
        }
        .hero-title {
            font-size: 3.5rem;
        }
        .hero-subtitle {
            font-size: 1.2rem;
        }
        .current-price {
            font-size: 3rem;
        }
        .menu-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .carousel-arrow {
            width: 45px;
            height: 45px;
        }
        .carousel-arrow.prev {
            left: 20px;
        }
        .carousel-arrow.next {
            right: 20px;
        }
        .category-icon {
            width: 35px;
            height: 35px;
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .hero-carousel-section {
            height: 65vh;
            min-height: 450px;
            border-radius: 30px;
            margin: 85px 10px 0;
        }
        .hero-slide {
            border-radius: 30px;
        }
        .hero-title {
            font-size: 2.8rem;
        }
        .hero-subtitle {
            font-size: 1.1rem;
            padding: 0 10px;
        }
        .current-price {
            font-size: 2.5rem;
        }
        .old-price {
            font-size: 2rem;
        }
        .hero-price-container {
            padding: 20px 35px;
        }
        .discount-badge {
            width: 60px;
            height: 60px;
            top: -12px;
            right: -12px;
        }
        .discount-badge span:first-child {
            font-size: 1.5rem;
        }
        .menu-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .card-image-container {
            height: 180px;
        }
        .carousel-arrow {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
        .category-icon {
            width: 32px;
            height: 32px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .hero-carousel-section {
            height: 60vh;
            min-height: 400px;
            border-radius: 25px;
            margin: 80px 8px 0;
        }
        .hero-slide {
            border-radius: 25px;
        }
        .hero-title {
            font-size: 2.2rem;
        }
        .hero-subtitle {
            font-size: 1rem;
        }
        .current-price {
            font-size: 2rem;
        }
        .old-price {
            font-size: 1.5rem;
        }
        .price-display {
            gap: 15px;
        }
        .category-filter {
            padding: 0 10px;
        }
        .filter-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
        .menu-grid {
            grid-template-columns: 1fr;
            max-width: 350px;
            margin: 0 auto;
        }
        .card-image-container {
            height: 200px;
        }
        .carousel-arrow {
            width: 35px;
            height: 35px;
        }
        .carousel-arrow.prev {
            left: 10px;
        }
        .carousel-arrow.next {
            right: 10px;
        }
        .category-icon {
            width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 400px) {
        .hero-carousel-section {
            margin-top: 75px;
            border-radius: 20px;
            margin: 75px 5px 0;
        }
        .hero-slide {
            border-radius: 20px;
        }
        .hero-title {
            font-size: 1.8rem;
        }
        .hero-subtitle {
            font-size: 0.9rem;
        }
        .current-price {
            font-size: 1.8rem;
        }
        .menu-grid {
            padding: 0 5px;
        }
        .carousel-arrow {
            width: 30px;
            height: 30px;
            font-size: 0.9rem;
        }
        .category-icon {
            width: 28px;
            height: 28px;
            font-size: 0.7rem;
        }
    }
</style>
@endsection

@section('content')
    <!-- Hero Carousel Section -->
    <section class="hero-carousel-section">
        <!-- Navigation Arrows -->
        <div class="carousel-arrow prev">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="carousel-arrow next">
            <i class="fas fa-chevron-right"></i>
        </div>

        <!-- Dynamic Promotions Slides -->
        @foreach($promotions as $index => $promo)
        <div class="hero-slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $promo->image_url }}');">
            <div class="hero-content">
                <div class="hero-label">
                    <i class="fas fa-fire"></i>
                    <span>{{ $promo->badge_text }}</span>
                </div>
                <h1 class="hero-title">{{ $promo->title }}</h1>
                <p class="hero-subtitle">{{ $promo->description }}</p>
                <div class="hero-price-container">
                    @if($promo->old_price)
                    <div class="discount-badge">
                        <span>{{ round((($promo->old_price - $promo->current_price) / $promo->old_price) * 100) }}%</span>
                        <span>OFF</span>
                    </div>
                    @endif
                    <div class="price-display">
                        <div class="current-price">
                            <span class="price-currency">Rp</span>
                            {{ number_format($promo->current_price, 0, ',', '.') }}
                        </div>
                        @if($promo->old_price)
                        <div class="old-price">Rp {{ number_format($promo->old_price, 0, ',', '.') }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Carousel Navigation -->
        <div class="carousel-nav">
            <div class="carousel-dots">
                @foreach($promotions as $index => $promo)
                <div class="carousel-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section">
        <div class="container">
            <!-- Category Filter -->
            <div class="category-filter">
                <button class="filter-btn active" data-category="all">
                    <i class="fas fa-th-large"></i> Semua
                </button>
                @foreach($categories as $category)
                <button class="filter-btn" data-category="{{ $category->id }}">
                    @php
                        $iconClass = '';
                        $categoryName = strtolower($category->name);
                        
                        if(str_contains($categoryName, 'main') || str_contains($categoryName, 'makanan utama')) {
                            $iconClass = 'fa-utensils';
                        } elseif(str_contains($categoryName, 'appetizer') || str_contains($categoryName, 'pembuka')) {
                            $iconClass = 'fa-leaf';
                        } elseif(str_contains($categoryName, 'dessert') || str_contains($categoryName, 'makanan penutup')) {
                            $iconClass = 'fa-cake-candles';
                        } elseif(str_contains($categoryName, 'drink') || str_contains($categoryName, 'minuman')) {
                            $iconClass = 'fa-mug-saucer';
                        } else {
                            $iconClass = 'fa-utensils';
                        }
                    @endphp
                    <i class="fas {{ $iconClass }}"></i> {{ $category->name }}
                </button>
                @endforeach
            </div>

            <!-- Menu Grid -->
            <div class="menu-grid">
                @forelse($categories as $category)
                    @foreach($category->menuItems as $index => $item)
                    <div class="menu-card" data-category="{{ $category->id }}" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="card-image-container">
                            <img src="{{ $item->image_url }}" 
                                 alt="{{ $item->name }}"
                                 onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                            
                            <!-- Category Icon - Only for non-main course categories -->
                            @php
                                $categoryName = strtolower($category->name);
                                $iconClass = 'fa-utensils';
                                $categoryType = '';
                                
                                if(str_contains($categoryName, 'appetizer') || str_contains($categoryName, 'pembuka')) {
                                    $iconClass = 'fa-leaf';
                                    $categoryType = 'appetizer';
                                } elseif(str_contains($categoryName, 'dessert') || str_contains($categoryName, 'makanan penutup')) {
                                    $iconClass = 'fa-cake-candles';
                                    $categoryType = 'dessert';
                                } elseif(str_contains($categoryName, 'drink') || str_contains($categoryName, 'minuman')) {
                                    $iconClass = 'fa-mug-saucer';
                                    $categoryType = 'drink';
                                } elseif(str_contains($categoryName, 'main') || str_contains($categoryName, 'makanan utama')) {
                                    // Main course - no icon
                                    $categoryType = 'main-course';
                                }
                            @endphp
                            
                            @if($categoryType != 'main-course')
                            <div class="category-icon {{ $categoryType }}">
                                <i class="fas {{ $iconClass }}"></i>
                            </div>
                            @endif
                            
                            @if($item->is_featured)
                            <div class="card-badge">Favorit</div>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="card-header">
                                <h3 class="card-title">{{ $item->name }}</h3>
                                <div class="card-price">
                                    <span class="price-currency-small">Rp</span>
                                    {{ number_format($item->price, 0, ',', '.') }}
                                </div>
                            </div>
                            <p class="card-description">{{ $item->description ?: 'Tidak ada deskripsi' }}</p>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    @endforeach
                @empty
                    <div class="col-12 text-center py-5">
                        <h3>Belum ada menu tersedia</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== SIMPLE CAROUSEL WITH PREV/NEXT BUTTONS ==========
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const prevBtn = document.querySelector('.carousel-arrow.prev');
    const nextBtn = document.querySelector('.carousel-arrow.next');
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function startAutoSlide() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 3000);
    }

    // Initialize
    if (slides.length > 0) {
        showSlide(currentSlide);
        startAutoSlide();
    }

    // Button controls
    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            startAutoSlide();
        });

        nextBtn.addEventListener('click', () => {
            nextSlide();
            startAutoSlide();
        });
    }

    // Dot controls
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            startAutoSlide();
        });
    });

    // Pause on hover
    const heroSection = document.querySelector('.hero-carousel-section');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        heroSection.addEventListener('mouseleave', () => {
            startAutoSlide();
        });
    }

    // ========== CATEGORY FILTER ==========
    const filterButtons = document.querySelectorAll('.filter-btn');
    const menuCards = document.querySelectorAll('.menu-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const category = this.getAttribute('data-category');

            // Filter cards with fade animation
            menuCards.forEach((card, index) => {
                const cardCategory = card.getAttribute('data-category');
                
                if (category === 'all' || cardCategory === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 50);
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

    // ========== INITIAL CARD ANIMATION ==========
    setTimeout(() => {
        menuCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            card.style.animation = 'cardReveal 0.6s forwards';
        });
    }, 300);

    // ========== SCROLL TO TOP ON RELOAD ==========
    window.onbeforeunload = function () {
        window.scrollTo(0, 0);
    }
});
</script>
@endsection