@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('content')
    <!-- Hero Section - Enhanced Complex Design -->
    <section class="hero-gallery position-relative overflow-hidden">
        <!-- Animated Background -->
        <div class="hero-bg-wrapper">
            <div class="hero-bg-image" style="background: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover;"></div>
            <div class="hero-gradient-overlay"></div>
        </div>
        
        <!-- Animated Shapes -->
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
        
        <div class="container position-relative" style="z-index: 3;">
            <div class="row align-items-center min-vh-70">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <div class="hero-badge mb-4">
                            <i class="fas fa-camera me-2"></i>
                            <span>Galeri Foto Premium</span>
                        </div>
                        
                        <h1 class="hero-title mb-4">
                            Koleksi Foto
                            <span class="d-block text-gradient">JOSS GANDOS</span>
                        </h1>
                        
                        <p class="hero-subtitle mb-4">
                            Jelajahi momen-momen istimewa, hidangan lezat, dan suasana hangat yang 
                            menjadikan JOSS GANDOS destinasi kuliner terbaik di kota Anda.
                        </p>
                        
                        <div class="hero-stats">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-images"></i>
                                </div>
                                <div class="stat-info">
                                    <h3>100+</h3>
                                    <p>Foto</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                                <div class="stat-info">
                                    <h3>4</h3>
                                    <p>Kategori</p>
                                </div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="stat-info">
                                    <h3>HD</h3>
                                    <p>Kualitas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="hero-images-grid">
                        <div class="grid-item grid-item-1">
                            <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Food 1">
                        </div>
                        <div class="grid-item grid-item-2">
                            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Food 2">
                        </div>
                        <div class="grid-item grid-item-3">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Interior">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
            <span>Scroll untuk melihat</span>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section position-relative">
        <!-- Background Pattern -->
        <div class="pattern-bg"></div>
        
        <div class="container position-relative" style="z-index: 1;">
            
            <!-- Section Header -->
            <div class="section-header text-center mb-5">
                <div class="section-tag">Portfolio</div>
                <h2 class="section-title">Galeri Kami</h2>
                <div class="section-divider mx-auto"></div>
                <p class="section-desc mx-auto">
                    Temukan inspirasi kuliner dan suasana yang menciptakan pengalaman tak terlupakan
                </p>
            </div>
            
            <!-- Filter Navigation -->
            <div class="text-center mb-5">
                <div class="filter-wrapper">
                    <div class="filter-nav d-inline-flex flex-wrap gap-3">
                        <button class="filter-btn active" data-filter="all">
                            <span class="filter-icon"><i class="fas fa-th-large"></i></span>
                            <span class="filter-label">Semua</span>
                        </button>
                        <button class="filter-btn" data-filter="food">
                            <span class="filter-icon"><i class="fas fa-utensils"></i></span>
                            <span class="filter-label">Makanan</span>
                        </button>
                        <button class="filter-btn" data-filter="interior">
                            <span class="filter-icon"><i class="fas fa-store"></i></span>
                            <span class="filter-label">Interior</span>
                        </button>
                        <button class="filter-btn" data-filter="events">
                            <span class="filter-icon"><i class="fas fa-calendar-alt"></i></span>
                            <span class="filter-label">Acara</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Gallery Grid -->
            <div class="row g-4" id="galleryGrid">
                @php
                    $galleryItems = [
                        [
                            'image' => 'https://restojossgandos.com/img/menu/gulaikepalaikansalmon-copy-1765340584.JPG',
                            'title' => 'Nasi Goreng Spesial JOSS',
                            'category' => 'food',
                            'date' => '15 Jan 2024',
                            'desc' => 'Nasi goreng signature kami dengan bumbu rahasia, telur mata sapi, dan taburan bawang goreng'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Interior Restoran',
                            'category' => 'interior',
                            'date' => '10 Jan 2024',
                            'desc' => 'Suasana nyaman dan modern dengan kapasitas 100 orang untuk acara spesial Anda'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Acara Pernikahan',
                            'category' => 'events',
                            'date' => '5 Jan 2024',
                            'desc' => 'Paket catering pernikahan lengkap dengan dekorasi dan pelayanan terbaik'
                        ],
                        [
                            'image' => 'https://restojossgandos.com/img/menu/bebekgorengjoss-copy-1765340669.JPG',
                            'title' => 'Rendang Sapi Padang',
                            'category' => 'food',
                            'date' => '20 Des 2023',
                            'desc' => 'Rendang daging sapi premium dimasak selama 8 jam dengan rempah pilihan'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Area Makan VIP',
                            'category' => 'interior',
                            'date' => '15 Des 2023',
                            'desc' => 'Ruang VIP eksklusif dengan AC dan TV untuk rapat atau gathering keluarga'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Catering Perusahaan',
                            'category' => 'events',
                            'date' => '10 Des 2023',
                            'desc' => 'Layanan catering untuk acara kantor, meeting, dan seminar dengan menu variatif'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Soto Betawi Premium',
                            'category' => 'food',
                            'date' => '5 Des 2023',
                            'desc' => 'Soto khas Jakarta dengan kuah santan gurih, daging sapi empuk dan jeroan pilihan'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1583394293214-28ded15ee548?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Chef in Action',
                            'category' => 'interior',
                            'date' => '30 Nov 2023',
                            'desc' => 'Tim chef profesional kami yang berpengalaman lebih dari 15 tahun di bidang kuliner'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Tahun Baru 2024',
                            'category' => 'events',
                            'date' => '1 Jan 2024',
                            'desc' => 'Perayaan malam tahun baru dengan live music dan menu spesial untuk keluarga'
                        ]
                    ];
                @endphp
                
                @foreach($galleryItems as $index => $item)
                    <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $item['category'] }}" style="display: {{ $index >= 6 ? 'none' : 'block' }};">
                        <div class="gallery-card">
                            <div class="gallery-image-wrapper">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="gallery-image">
                                <div class="image-overlay-gradient"></div>
                                
                                <!-- Category Tag -->
                                <div class="category-tag">
                                    <i class="fas fa-{{ $item['category'] == 'food' ? 'utensils' : ($item['category'] == 'interior' ? 'store' : 'calendar-alt') }}"></i>
                                    {{ ucfirst($item['category']) }}
                                </div>
                            </div>
                            
                            <div class="gallery-info">
                                <h5 class="gallery-title">{{ $item['title'] }}</h5>
                                <p class="gallery-desc">{{ $item['desc'] }}</p>
                                
                                <div class="gallery-footer">
                                    <span class="gallery-date">
                                        <i class="far fa-calendar"></i>
                                        {{ $item['date'] }}
                                    </span>
                                    <button class="btn-view-gallery" data-index="{{ $index }}" data-bs-toggle="modal" data-bs-target="#lightboxModal">
                                        <i class="fas fa-expand-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Load More -->
            <div class="text-center mt-5">
                <button class="btn-load-more" id="loadMore">
                    <span class="btn-icon"><i class="fas fa-plus-circle"></i></span>
                    <span class="btn-text">Muat Lebih Banyak</span>
                    <span class="btn-arrow"><i class="fas fa-arrow-down"></i></span>
                </button>
            </div>
        </div>
    </section>
    
    <!-- Lightbox Modal - Premium Design -->
    <div class="modal fade" id="lightboxModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark border-0">
                <!-- Close Button -->
                <button type="button" class="lightbox-close" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>
                
                <div class="modal-body p-0">
                    <div class="lightbox-container">
                        <!-- Main Image Area -->
                        <div class="lightbox-main">
                            <div class="image-container">
                                <img id="modalImage" src="" alt="" class="modal-image">
                            </div>
                            
                            <!-- Navigation Buttons -->
                            <button class="lightbox-nav-btn prev-btn" id="prevImage">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button class="lightbox-nav-btn next-btn" id="nextImage">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            
                            <!-- Image Counter -->
                            <div class="image-counter">
                                <span id="currentImageNum">1</span> / <span id="totalImages">9</span>
                            </div>
                        </div>
                        
                        <!-- Info Sidebar -->
                        <div class="lightbox-sidebar">
                            <div class="sidebar-content">
                                <!-- Category Badge -->
                                <div class="sidebar-header">
                                    <div class="category-badge" id="modalCategory">
                                        <i class="fas fa-store"></i>
                                        <span>Interior</span>
                                    </div>
                                </div>
                                
                                <!-- Title & Description -->
                                <div class="sidebar-info">
                                    <h3 id="modalTitle" class="modal-title-text">Interior Restoran</h3>
                                    <p id="modalDesc" class="modal-description">
                                        Suasana nyaman dan modern dengan kapasitas 100 orang untuk acara spesial Anda
                                    </p>
                                </div>
                                
                                <!-- Meta Info -->
                                <div class="sidebar-meta">
                                    <div class="meta-row">
                                        <div class="meta-item">
                                            <i class="far fa-calendar"></i>
                                            <span id="modalDate">10 Jan 2024</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Photo Gallery Section -->
                                <div class="sidebar-photos">
                                    <div class="photos-header">
                                        <div class="photos-title">
                                            <i class="fas fa-images"></i>
                                            <span>GALERI FOTO</span>
                                        </div>
                                        <div class="photos-counter">
                                            <span id="currentImageNum2">2</span> / <span id="totalImages2">9</span>
                                        </div>
                                    </div>
                                    
                                    <div class="thumbnails-grid" id="thumbnailsGrid">
                                        <!-- Will be populated by JS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    :root {
        --red-dark: #1a0000;
        --red-primary: #8b0000;
        --red-light: #dc143c;
        --red-accent: #ff4757;
    }
    
    /* Animation Keyframes */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(5deg); }
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }
    
    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }
    
    /* Hero Section */
    .hero-gallery {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding: 100px 0 60px;
    }
    
    .min-vh-70 {
        min-height: 70vh;
    }
    
    .hero-bg-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
    }
    
    .hero-bg-image {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0.1;
    }
    
    .hero-gradient-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--red-dark) 0%, var(--red-primary) 50%, var(--red-light) 100%);
    }
    
    .hero-shapes {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 2;
        overflow: hidden;
    }
    
    .shape {
        position: absolute;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(255, 71, 87, 0.1), rgba(139, 0, 0, 0.1));
        animation: float 15s infinite ease-in-out;
    }
    
    .shape-1 {
        width: 400px;
        height: 400px;
        top: -100px;
        left: -100px;
        animation-delay: 0s;
    }
    
    .shape-2 {
        width: 300px;
        height: 300px;
        bottom: -50px;
        right: 10%;
        animation-delay: 3s;
    }
    
    .shape-3 {
        width: 200px;
        height: 200px;
        top: 50%;
        right: -50px;
        animation-delay: 6s;
    }
    
    .hero-content {
        animation: fadeIn 1s ease;
    }
    
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 10px 20px;
        border-radius: 30px;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        animation: pulse 2s infinite;
    }
    
    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    }
    
    .text-gradient {
        background: linear-gradient(135deg, #fff 0%, var(--red-accent) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 600px;
    }
    
    .hero-stats {
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 15px;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 20px 25px;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    
    .stat-item:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-5px);
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--red-light), var(--red-accent));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
    }
    
    .stat-info h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: white;
        margin: 0;
        line-height: 1;
    }
    
    .stat-info p {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
        margin: 5px 0 0 0;
    }
    
    .hero-images-grid {
        position: relative;
        height: 500px;
        display: none;
    }
    
    .grid-item {
        position: absolute;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        border: 3px solid rgba(255, 255, 255, 0.1);
    }
    
    .grid-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .grid-item:hover img {
        transform: scale(1.1);
    }
    
    .grid-item-1 {
        width: 250px;
        height: 250px;
        top: 0;
        left: 0;
        animation: float 10s infinite ease-in-out;
    }
    
    .grid-item-2 {
        width: 200px;
        height: 200px;
        top: 100px;
        right: 50px;
        animation: float 12s infinite ease-in-out;
        animation-delay: 2s;
    }
    
    .grid-item-3 {
        width: 220px;
        height: 220px;
        bottom: 50px;
        left: 100px;
        animation: float 14s infinite ease-in-out;
        animation-delay: 4s;
    }
    
    @media (min-width: 992px) {
        .hero-images-grid {
            display: block;
        }
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        text-align: center;
        animation: fadeIn 2s ease;
    }
    
    .scroll-mouse {
        width: 30px;
        height: 50px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 15px;
        position: relative;
        margin: 0 auto 10px;
    }
    
    .scroll-wheel {
        width: 4px;
        height: 10px;
        background: white;
        border-radius: 2px;
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%);
        animation: scroll 1.5s infinite;
    }
    
    @keyframes scroll {
        0% { opacity: 1; top: 8px; }
        100% { opacity: 0; top: 25px; }
    }
    
    .scroll-indicator span {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
        display: block;
    }
    
    /* Gallery Section */
    .gallery-section {
        padding: 100px 0;
        background: linear-gradient(to bottom, #ffffff 0%, #fff5f5 50%, #ffffff 100%);
    }
    
    .pattern-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(139, 0, 0, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(220, 20, 60, 0.03) 0%, transparent 50%);
        pointer-events: none;
    }
    
    .section-header {
        margin-bottom: 60px;
    }
    
    .section-tag {
        display: inline-block;
        background: linear-gradient(135deg, var(--red-primary), var(--red-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
        font-size: 0.95rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }
    
    .section-title {
        font-size: 3rem;
        font-weight: 800;
        color: var(--red-dark);
        margin-bottom: 20px;
    }
    
    .section-divider {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, var(--red-primary), var(--red-light));
        border-radius: 2px;
        margin-bottom: 20px;
    }
    
    .section-desc {
        color: #666;
        font-size: 1.1rem;
        max-width: 600px;
        line-height: 1.8;
    }
    
    /* Filter Navigation */
    .filter-wrapper {
        background: white;
        padding: 10px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(139, 0, 0, 0.1);
        display: inline-block;
    }
    
    .filter-nav {
        margin: 0;
        padding: 0;
    }
    
    .filter-btn {
        background: transparent;
        border: none;
        padding: 15px 25px;
        border-radius: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
    }
    
    .filter-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, var(--red-primary), var(--red-light));
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 15px;
        z-index: 0;
    }
    
    .filter-btn > * {
        position: relative;
        z-index: 1;
    }
    
    .filter-btn:hover {
        transform: translateY(-2px);
    }
    
    .filter-btn.active::before {
        opacity: 1;
    }
    
    .filter-icon {
        width: 35px;
        height: 35px;
        background: rgba(139, 0, 0, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .filter-btn.active .filter-icon {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }
    
    .filter-label {
        font-weight: 600;
        color: #333;
        transition: color 0.3s ease;
    }
    
    .filter-btn.active .filter-label {
        color: white;
    }
    
    .filter-btn .filter-badge {
        display: none;
    }
    
    /* Gallery Card */
    .gallery-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .gallery-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(139, 0, 0, 0.15);
    }
    
    .gallery-image-wrapper {
        position: relative;
        overflow: hidden;
        height: 280px;
        background: #f5f5f5;
    }
    
    .gallery-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .gallery-card:hover .gallery-image {
        transform: scale(1.1) rotate(2deg);
    }
    
    .image-overlay-gradient {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.3), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .gallery-card:hover .image-overlay-gradient {
        opacity: 1;
    }
    
    .category-tag {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 8px 15px;
        border-radius: 10px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--red-primary);
        display: flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        z-index: 2;
    }
    
    .gallery-info {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .gallery-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--red-dark);
        margin-bottom: 10px;
        line-height: 1.4;
    }
    
    .gallery-desc {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 15px;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .gallery-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }
    
    .gallery-date {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #999;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .gallery-date i {
        color: var(--red-light);
    }
    
    .btn-view-gallery {
        background: linear-gradient(135deg, var(--red-primary), var(--red-light));
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(139, 0, 0, 0.2);
    }
    
    .btn-view-gallery:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(139, 0, 0, 0.3);
    }
    
    /* Load More Button */
    .btn-load-more {
        background: linear-gradient(135deg, var(--red-primary), var(--red-light));
        border: none;
        padding: 18px 45px;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 12px;
        position: relative;
        overflow: hidden;
    }
    
    .btn-load-more::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }
    
    .btn-load-more:hover::before {
        width: 300px;
        height: 300px;
    }
    
    .btn-load-more:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(139, 0, 0, 0.4);
    }
    
    .btn-icon, .btn-text, .btn-arrow {
        position: relative;
        z-index: 1;
    }
    
    .btn-arrow {
        transition: transform 0.3s ease;
    }
    
    .btn-load-more:hover .btn-arrow {
        transform: translateY(3px);
    }
    
    .btn-load-more.show-less .btn-arrow {
        transform: rotate(180deg);
    }
    
    .btn-load-more.show-less:hover .btn-arrow {
        transform: rotate(180deg) translateY(-3px);
    }
    
    /* Premium Lightbox Modal - IMPROVED DESIGN */
    .lightbox-close {
        position: fixed;
        top: 30px;
        right: 30px;
        width: 55px;
        height: 55px;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        color: white;
        font-size: 1.6rem;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 1051;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }
    
    .lightbox-close:hover {
        background: var(--red-light);
        transform: rotate(90deg) scale(1.1);
        border-color: var(--red-light);
        box-shadow: 0 15px 40px rgba(220, 20, 60, 0.5);
    }
    
    .lightbox-container {
        display: flex;
        height: 100%;
        position: relative;
    }
    
    .lightbox-main {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 40px;
        background: #000;
        overflow: hidden;
    }
    
    .image-container {
        max-width: 100%;
        max-height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .modal-image {
        max-width: 85%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 20px;
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.6);
        animation: fadeIn 0.6s ease;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .modal-image:hover {
        transform: scale(1.02);
    }
    
    .lightbox-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 65px;
        height: 65px;
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 50%;
        color: white;
        font-size: 1.8rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
    }
    
    .lightbox-nav-btn:hover {
        background: linear-gradient(135deg, var(--red-primary), var(--red-light));
        border-color: transparent;
        transform: translateY(-50%) scale(1.15);
        box-shadow: 0 20px 50px rgba(139, 0, 0, 0.6);
    }
    
    .prev-btn {
        left: 50px;
    }
    
    .next-btn {
        right: 50px;
    }
    
    .image-counter {
        position: absolute;
        bottom: 50px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(15px);
        padding: 15px 35px;
        border-radius: 40px;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        letter-spacing: 1px;
    }
    
    /* Sidebar - Enhanced Design */
    .lightbox-sidebar {
        width: 420px;
        background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%);
        overflow-y: auto;
        border-left: 1px solid rgba(255, 255, 255, 0.08);
        position: relative;
        z-index: 2;
    }
    
    .sidebar-content {
        padding: 45px 35px;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .sidebar-header {
        margin-bottom: 35px;
        text-align: center;
    }
    
    .category-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(135deg, var(--red-primary), var(--red-light));
        padding: 14px 25px;
        border-radius: 50px;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        box-shadow: 0 10px 30px rgba(139, 0, 0, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.1);
        animation: pulse 2s infinite ease-in-out;
    }
    
    .category-badge i {
        font-size: 1.2rem;
    }
    
    .sidebar-info {
        margin-bottom: 35px;
        padding-bottom: 25px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        text-align: center;
    }
    
    .modal-title-text {
        font-size: 2.4rem;
        font-weight: 800;
        color: white;
        margin-bottom: 20px;
        line-height: 1.3;
        text-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.5px;
    }
    
    .modal-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.15rem;
        line-height: 1.8;
        margin: 0;
        font-weight: 400;
        text-align: center;
        max-width: 500px;
        margin: 0 auto;
    }
    
    .sidebar-meta {
        margin-bottom: 40px;
        padding-bottom: 25px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        text-align: center;
    }
    
    .meta-row {
        display: flex;
        justify-content: center;
        gap: 15px;
    }
    
    .sidebar-meta .meta-item {
        background: rgba(255, 255, 255, 0.05);
        padding: 18px 25px;
        border-radius: 15px;
        display: inline-flex;
        align-items: center;
        gap: 15px;
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.08);
        min-width: 180px;
        justify-content: center;
    }
    
    .sidebar-meta .meta-item:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    
    .sidebar-meta .meta-item i {
        color: var(--red-accent);
        font-size: 1.4rem;
    }
    
    /* Photo Gallery Section - Enhanced */
    .sidebar-photos {
        margin-top: auto;
        padding-top: 35px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
    }
    
    .photos-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    
    .photos-title {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        font-weight: 700;
        font-size: 1.2rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .photos-title i {
        color: var(--red-accent);
        font-size: 1.4rem;
    }
    
    .photos-counter {
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 20px;
        border-radius: 30px;
        color: white;
        font-weight: 700;
        font-size: 1.1rem;
        border: 1px solid rgba(255, 255, 255, 0.1);
        min-width: 80px;
        text-align: center;
    }
    
    .thumbnails-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
    }
    
    .thumbnail-item {
        aspect-ratio: 1;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid transparent;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        background: #1a1a1a;
    }
    
    .thumbnail-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(139, 0, 0, 0.3), rgba(220, 20, 60, 0.3));
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }
    
    .thumbnail-item:hover::before {
        opacity: 1;
    }
    
    .thumbnail-item:hover {
        border-color: var(--red-accent);
        transform: scale(1.08) rotate(2deg);
        box-shadow: 0 15px 35px rgba(139, 0, 0, 0.4);
    }
    
    .thumbnail-item.active {
        border-color: var(--red-light);
        box-shadow: 0 0 0 3px var(--red-light), 0 0 30px rgba(220, 20, 60, 0.6);
        transform: scale(1.08);
    }
    
    .thumbnail-item.active::before {
        opacity: 0;
    }
    
    .thumbnail-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .thumbnail-item:hover img {
        transform: scale(1.15);
    }
    
    /* Hide items for load more functionality */
    .gallery-item.hide {
        display: none !important;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .lightbox-sidebar {
            width: 380px;
        }
        
        .modal-title-text {
            font-size: 2rem;
        }
        
        .lightbox-nav-btn {
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
        }
    }
    
    @media (max-width: 992px) {
        .hero-title {
            font-size: 3rem;
        }
        
        .section-title {
            font-size: 2.5rem;
        }
        
        .lightbox-container {
            flex-direction: column-reverse;
        }
        
        .lightbox-sidebar {
            width: 100%;
            max-height: 45vh;
            border-left: none;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }
        
        .lightbox-main {
            padding: 30px 20px;
            flex: 2;
        }
        
        .modal-image {
            max-height: 70vh;
            max-width: 90%;
        }
        
        .lightbox-nav-btn {
            width: 55px;
            height: 55px;
            font-size: 1.5rem;
        }
        
        .prev-btn {
            left: 25px;
        }
        
        .next-btn {
            right: 25px;
        }
        
        .image-counter {
            bottom: 35px;
            padding: 12px 25px;
            font-size: 1.1rem;
        }
        
        .sidebar-content {
            padding: 30px 25px;
        }
        
        .category-badge {
            padding: 12px 20px;
            font-size: 1rem;
        }
    }
    
    @media (max-width: 768px) {
        .hero-gallery {
            min-height: auto;
            padding: 80px 0 40px;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-stats {
            gap: 15px;
        }
        
        .stat-item {
            padding: 15px 20px;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .filter-wrapper {
            width: 100%;
        }
        
        .filter-nav {
            flex-direction: column;
            width: 100%;
        }
        
        .filter-btn {
            width: 100%;
            justify-content: center;
        }
        
        .gallery-image-wrapper {
            height: 250px;
        }
        
        .gallery-info {
            padding: 15px;
        }
        
        .gallery-title {
            font-size: 1rem;
        }
        
        .gallery-desc {
            font-size: 0.85rem;
        }
        
        .lightbox-nav-btn {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }
        
        .lightbox-close {
            top: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            font-size: 1.4rem;
        }
        
        .image-counter {
            bottom: 25px;
            padding: 10px 20px;
            font-size: 1rem;
        }
        
        .sidebar-content {
            padding: 25px 20px;
        }
        
        .modal-title-text {
            font-size: 1.8rem;
        }
        
        .modal-description {
            font-size: 1.05rem;
        }
        
        .sidebar-meta .meta-item {
            padding: 15px 20px;
            font-size: 1rem;
            min-width: 160px;
        }
        
        .thumbnails-grid {
            gap: 12px;
        }
    }
    
    @media (max-width: 576px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .stat-item {
            width: 100%;
        }
        
        .btn-load-more {
            padding: 15px 35px;
            font-size: 0.9rem;
        }
        
        .lightbox-sidebar {
            max-height: 50vh;
        }
        
        .thumbnails-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .category-badge {
            padding: 10px 18px;
            font-size: 0.9rem;
        }
        
        .sidebar-meta .meta-item {
            padding: 12px 15px;
            font-size: 0.9rem;
            min-width: 140px;
        }
        
        .photos-title {
            font-size: 1rem;
        }
        
        .photos-counter {
            font-size: 1rem;
            padding: 8px 15px;
            min-width: 70px;
        }
        
        .lightbox-nav-btn {
            width: 45px;
            height: 45px;
            font-size: 1.2rem;
        }
        
        .prev-btn {
            left: 15px;
        }
        
        .next-btn {
            right: 15px;
        }
    }
    
    @media (max-width: 400px) {
        .thumbnails-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
        
        .modal-title-text {
            font-size: 1.6rem;
        }
        
        .modal-description {
            font-size: 0.95rem;
        }
        
        .sidebar-meta .meta-item {
            min-width: 120px;
            padding: 10px 12px;
            font-size: 0.85rem;
        }
        
        .photos-header {
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const viewBtns = document.querySelectorAll('.btn-view-gallery');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDate = document.getElementById('modalDate');
    const modalDesc = document.getElementById('modalDesc');
    const modalCategory = document.getElementById('modalCategory');
    const currentImageNum = document.getElementById('currentImageNum');
    const currentImageNum2 = document.getElementById('currentImageNum2');
    const totalImages = document.getElementById('totalImages');
    const totalImages2 = document.getElementById('totalImages2');
    const thumbnailsGrid = document.getElementById('thumbnailsGrid');
    const prevBtn = document.getElementById('prevImage');
    const nextBtn = document.getElementById('nextImage');
    const loadMoreBtn = document.getElementById('loadMore');
    
    let currentIndex = 0;
    let allItems = @json($galleryItems);
    let isExpanded = false;
    
    // Set total images
    totalImages.textContent = allItems.length;
    totalImages2.textContent = allItems.length;
    
    // Filter functionality
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            let visibleCount = 0;
            
            galleryItems.forEach((item, index) => {
                if (filter === 'all' || item.dataset.category === filter) {
                    if (!isExpanded && visibleCount >= 6) {
                        item.style.display = 'none';
                    } else {
                        item.style.display = 'block';
                        item.style.animation = 'fadeIn 0.6s ease forwards';
                    }
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Update load more button visibility
            updateLoadMoreButton();
        });
    });
    
    // Load More Toggle functionality
    loadMoreBtn.addEventListener('click', function() {
        isExpanded = !isExpanded;
        const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
        
        if (isExpanded) {
            // Show all items
            galleryItems.forEach((item, index) => {
                if (activeFilter === 'all' || item.dataset.category === activeFilter) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeIn 0.6s ease forwards';
                    item.style.animationDelay = (index * 0.05) + 's';
                }
            });
            
            // Update button
            loadMoreBtn.classList.add('show-less');
            loadMoreBtn.querySelector('.btn-text').textContent = 'Tampilkan Lebih Sedikit';
            loadMoreBtn.querySelector('.btn-icon i').className = 'fas fa-minus-circle';
        } else {
            // Show only first 6 items
            let visibleCount = 0;
            galleryItems.forEach((item, index) => {
                if (activeFilter === 'all' || item.dataset.category === activeFilter) {
                    if (visibleCount < 6) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                    visibleCount++;
                }
            });
            
            // Update button
            loadMoreBtn.classList.remove('show-less');
            loadMoreBtn.querySelector('.btn-text').textContent = 'Muat Lebih Banyak';
            loadMoreBtn.querySelector('.btn-icon i').className = 'fas fa-plus-circle';
            
            // Scroll to top of gallery
            document.querySelector('.gallery-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
    
    function updateLoadMoreButton() {
        const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
        let totalFilteredItems = 0;
        
        galleryItems.forEach(item => {
            if (activeFilter === 'all' || item.dataset.category === activeFilter) {
                totalFilteredItems++;
            }
        });
        
        if (totalFilteredItems <= 6) {
            loadMoreBtn.style.display = 'none';
        } else {
            loadMoreBtn.style.display = 'inline-flex';
        }
    }
    
    // Initial load more button state
    updateLoadMoreButton();
    
    // Lightbox functionality
    function generateThumbnails() {
        thumbnailsGrid.innerHTML = '';
        allItems.forEach((item, index) => {
            const thumb = document.createElement('div');
            thumb.className = 'thumbnail-item';
            if (index === currentIndex) thumb.classList.add('active');
            thumb.innerHTML = `<img src="${item.image}" alt="${item.title}">`;
            thumb.addEventListener('click', () => {
                currentIndex = index;
                updateModal();
            });
            thumbnailsGrid.appendChild(thumb);
        });
    }
    
    viewBtns.forEach((btn) => {
        btn.addEventListener('click', function() {
            currentIndex = parseInt(this.dataset.index);
            updateModal();
            generateThumbnails();
        });
    });
    
    function updateModal() {
        const item = allItems[currentIndex];
        
        // Update image
        modalImage.src = item.image;
        modalImage.style.animation = 'fadeIn 0.5s ease';
        
        // Update info
        modalTitle.textContent = item.title;
        modalDate.textContent = item.date;
        modalDesc.textContent = item.desc;
        
        // Update category badge
        const categoryIcons = {
            'food': 'utensils',
            'interior': 'store',
            'events': 'calendar-alt'
        };
        const icon = categoryIcons[item.category] || 'image';
        modalCategory.innerHTML = `
            <i class="fas fa-${icon}"></i>
            <span>${item.category.charAt(0).toUpperCase() + item.category.slice(1)}</span>
        `;
        
        // Update counters
        currentImageNum.textContent = currentIndex + 1;
        currentImageNum2.textContent = currentIndex + 1;
        
        // Update thumbnails
        document.querySelectorAll('.thumbnail-item').forEach((thumb, index) => {
            thumb.classList.toggle('active', index === currentIndex);
        });
    }
    
    prevBtn.addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + allItems.length) % allItems.length;
        updateModal();
    });
    
    nextBtn.addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % allItems.length;
        updateModal();
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('lightboxModal');
        if (modal && modal.classList.contains('show')) {
            if (e.key === 'ArrowLeft') {
                prevBtn.click();
            } else if (e.key === 'ArrowRight') {
                nextBtn.click();
            } else if (e.key === 'Escape') {
                const closeBtn = modal.querySelector('.lightbox-close');
                if (closeBtn) closeBtn.click();
            }
        }
    });
    
    // Parallax effect for hero
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroShapes = document.querySelectorAll('.shape');
        
        heroShapes.forEach((shape, index) => {
            const speed = (index + 1) * 0.1;
            shape.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
});
</script>
@endsection