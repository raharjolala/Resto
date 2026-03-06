@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('content')
@php
    // Ambil data dari database atau gunakan data yang sudah dikirim dari controller
    $galleryData = isset($galleryItems) && $galleryItems->count() > 0 
        ? $galleryItems 
        : collect([]);
    
    // Format data untuk JavaScript
    $galleryItemsForJs = [];
    
    if ($galleryData->count() > 0) {
        foreach ($galleryData as $item) {
            // Tentukan URL gambar - LANGSUNG GUNAKAN image_path karena sudah berupa URL
            $imageUrl = $item->image_path ?? 'https://via.placeholder.com/800x600?text=No+Image';
            
            $galleryItemsForJs[] = [
                'id' => $item->id,
                'image' => $imageUrl,
                'title' => $item->caption ?? 'Tanpa Judul',
                'category' => $item->category ?? 'food',
                'date' => isset($item->created_at) ? $item->created_at->format('d M Y') : now()->format('d M Y'),
                'desc' => $item->description ?? $item->caption ?? 'Deskripsi tidak tersedia',
            ];
        }
    }
@endphp

<!-- ELEGANT RED GRADIENT HERO SECTION DENGAN ANIMASI SUPER HIDUP -->
<section class="elegant-hero">
    <!-- Soft Gradient Background -->
    <div class="elegant-gradient"></div>
    
    <!-- Decorative Elements -->
    <div class="hero-shape shape-1"></div>
    <div class="hero-shape shape-2"></div>
    <div class="hero-shape shape-3"></div>
    
    <!-- Animated Particles -->
    <div class="particle-container">
        @for($i = 1; $i <= 30; $i++)
            <div class="particle"></div>
        @endfor
    </div>
    
    <div class="container">
        <div class="row align-items-center" style="min-height: 85vh;">
            <div class="col-lg-6 col-xl-6">
                <!-- Premium Badge dengan Animasi -->
                <div class="premium-badge animate__animated animate__fadeInUp">
                    <span class="badge-dot"></span>
                    <span>GALERI KULINER</span>
                    <span class="badge-dot"></span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="elegant-heading">
                    <span class="heading-line reveal-text">Jelajahi Keindahan</span>
                    <span class="heading-line gradient-highlight reveal-text" style="animation-delay: 0.2s">Setiap Hidangan</span>
                    <span class="heading-line reveal-text" style="animation-delay: 0.4s">& Momen Spesial</span>
                </h1>
                
                <!-- Description -->
                <p class="elegant-desc animate__animated animate__fadeInUp animate__delay-1s">
                    Abadikan setiap kelezatan dalam bingkai visual. Dari hidangan istimewa hingga suasana hangat yang menciptakan kenangan tak terlupakan bersama Joss Gandos.
                </p>
                
                <!-- CTA Buttons -->
                <div class="elegant-cta">
                    <a href="#gallery" class="btn-elegant btn-primary-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Jelajahi Galeri</span>
                        <i class="fas fa-images"></i>
                    </a>
                    <a href="#kategori" class="btn-elegant btn-outline-elegant animate__animated animate__fadeInUp animate__delay-1s">
                        <span>Lihat Kategori</span>
                        <i class="fas fa-th-large"></i>
                    </a>
                </div>
            </div>
            
            <!-- HERO IMAGE -->
            <div class="col-lg-6 col-xl-6">
                <div class="hero-image-wrapper animate__animated animate__fadeInRight animate__delay-0s">
                    <div class="hero-image-container hero-image-extra-large">
                        <div class="hero-image-frame hero-frame-premium">
                            <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwep6rJYnQKwaLTyXXQlPNaN2buR7611PcGRb-jfgrUlOOrfTCHNOWUExjFGQ8pXDH5AH9fmd5oc04zpGwafXoRTMtbXWUTU1L6NtcRLEjIVIduLreJO6OnaT19NHp5qL3xDxm7Qy=s1360-w1360-h1020-rw"
                                 alt="Galeri Resto Joss Gandos"
                                 class="hero-image img-fluid">
                            
                            <div class="image-overlay"></div>
                            <div class="image-glow"></div>
                            <div class="image-shine"></div>
                            
                            <div class="image-frame">
                                <div class="frame-corner top-left"></div>
                                <div class="frame-corner top-right"></div>
                                <div class="frame-corner bottom-left"></div>
                                <div class="frame-corner bottom-right"></div>
                            </div>
                            
                            <div class="image-premium-label animate__animated animate__pulse animate__infinite">
                                <span>#MOMENT JOSS GANDOS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>    

<!-- Gallery Section -->
<section class="gallery-section position-relative" id="gallery">
    <!-- Background Pattern -->
    <div class="pattern-bg"></div>
    
    <div class="container position-relative" style="z-index: 1;">
        
        <!-- Section Header -->
        <div class="section-header text-center mb-5">
            <span class="section-tag">GALERI FOTO</span>
            <h2 class="section-title">Galeri Kami</h2>
            <div class="section-divider mx-auto"></div>
            <p class="section-desc mx-auto">
                Temukan inspirasi kuliner dan suasana yang menciptakan pengalaman tak terlupakan
            </p>
        </div>
        
        <!-- Filter Navigation -->
        <div class="text-center mb-5" id="kategori">
            <div class="filter-wrapper">
                <div class="filter-nav d-inline-flex flex-wrap gap-3">
                    @php
                        $totalCount = $galleryData->count();
                        $foodCount = $galleryData->where('category', 'food')->count();
                        $facilityCount = $galleryData->where('category', 'facility')->count();
                        $eventCount = $galleryData->where('category', 'event')->count();
                        $interiorCount = $galleryData->where('category', 'interior')->count();
                    @endphp
                    
                    <button class="filter-btn active" data-filter="all">
                        <span class="filter-icon"><i class="fas fa-th-large"></i></span>
                        <span class="filter-label">Semua</span>
                        <span class="filter-badge">{{ $totalCount ?:0  }}</span>
                    </button>
                    <button class="filter-btn" data-filter="food">
                        <span class="filter-icon"><i class="fas fa-utensils"></i></span>
                        <span class="filter-label">Makanan</span>
                        <span class="filter-badge">{{ $foodCount ?: 0 }}</span>
                    </button>
                    <button class="filter-btn" data-filter="facility">
                        <span class="filter-icon"><i class="fas fa-building"></i></span>
                        <span class="filter-label">Fasilitas</span>
                        <span class="filter-badge">{{ $facilityCount ?: 0 }}</span>
                    </button>
                    <button class="filter-btn" data-filter="event">
                        <span class="filter-icon"><i class="fas fa-calendar-alt"></i></span>
                        <span class="filter-label">Acara</span>
                        <span class="filter-badge">{{ $eventCount ?: 0 }}</span>
                    </button>
                    <button class="filter-btn" data-filter="interior">
                        <span class="filter-icon"><i class="fas fa-store"></i></span>
                        <span class="filter-label">Interior</span>
                        <span class="filter-badge">{{ $interiorCount ?: 0 }}</span>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Gallery Grid -->
        <div class="row g-4" id="galleryGrid">
            @forelse($galleryItems as $index => $item)
                @php
                    // Tentukan URL gambar - LANGSUNG GUNAKAN image_path
                    $imageUrl = $item->image_path ?? 'https://via.placeholder.com/800x600?text=No+Image';
                    
                    // Tentukan icon dan label kategori
                    $categoryIcons = [
                        'food' => 'utensils',
                        'facility' => 'building',
                        'event' => 'calendar-alt',
                        'interior' => 'store'
                    ];
                    $categoryLabels = [
                        'food' => 'Makanan',
                        'facility' => 'Fasilitas',
                        'event' => 'Acara',
                        'interior' => 'Interior'
                    ];
                    $categoryIcon = $categoryIcons[$item->category] ?? 'image';
                    $categoryLabel = $categoryLabels[$item->category] ?? ucfirst($item->category);
                    
                    // Format tanggal
                    $formattedDate = $item->created_at ? $item->created_at->format('d M Y') : now()->format('d M Y');
                @endphp
                
                <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $item->category }}" data-index="{{ $index }}" style="display: block;">
                    <div class="gallery-card">
                        <div class="gallery-image-wrapper">
                            <img src="{{ $imageUrl }}" 
                                 alt="{{ $item->caption }}" 
                                 class="gallery-image"
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/800x600?text=Image+Not+Found';">
                            
                            <div class="image-overlay-gradient"></div>
                            
                            <!-- Category Tag -->
                            <div class="category-tag">
                                <i class="fas fa-{{ $categoryIcon }}"></i>
                                {{ $categoryLabel }}
                            </div>
                        </div>
                        
                        <div class="gallery-info">
                            <h5 class="gallery-title">{{ $item->caption }}</h5>
                            <p class="gallery-desc">{{ $item->description ?? $item->caption }}</p>
                            
                            <div class="gallery-footer">
                                <span class="gallery-date">
                                    <i class="far fa-calendar"></i>
                                    {{ $formattedDate }}
                                </span>
                                <button class="btn-view-gallery" data-index="{{ $index }}" data-bs-toggle="modal" data-bs-target="#lightboxModal">
                                    <i class="fas fa-expand-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Default Gallery Items jika database kosong -->
                @php
                    $defaultItems = [
                        [
                            'image' => 'https://restojossgandos.com/img/menu/gulaikepalaikansalmon-copy-1765340584.JPG',
                            'title' => 'Gulai Kepala Ikan Salmon',
                            'category' => 'food',
                            'date' => now()->format('d M Y'),
                            'desc' => 'Menu ikonik Joss Gandos, gulai kepala ikan salmon tanpa santan, kaya rempah'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Suasana Interior Restoran',
                            'category' => 'interior',
                            'date' => now()->format('d M Y'),
                            'desc' => 'Suasana nyaman dan modern dengan kapasitas 100 orang untuk acara spesial Anda'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Acara Pernikahan',
                            'category' => 'event',
                            'date' => now()->format('d M Y'),
                            'desc' => 'Paket catering pernikahan lengkap dengan dekorasi dan pelayanan terbaik'
                        ],
                        [
                            'image' => 'https://restojossgandos.com/img/menu/bebekgorengjoss-copy-1765340669.JPG',
                            'title' => 'Bebek Goreng Joss',
                            'category' => 'food',
                            'date' => now()->format('d M Y'),
                            'desc' => 'Bebek goreng khas dengan bumbu rempah pilihan'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Area Makan VIP',
                            'category' => 'facility',
                            'date' => now()->format('d M Y'),
                            'desc' => 'Ruang VIP eksklusif dengan AC dan TV untuk rapat atau gathering keluarga'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Catering Perusahaan',
                            'category' => 'event',
                            'date' => now()->format('d M Y'),
                            'desc' => 'Layanan catering untuk acara kantor, meeting, dan seminar dengan menu variatif'
                        ]
                    ];
                    
                    $galleryItemsForJs = $defaultItems;
                @endphp
                
                @foreach($defaultItems as $index => $item)
                    @php
                        $icon = $item['category'] == 'food' ? 'utensils' : 
                               ($item['category'] == 'facility' ? 'building' : 
                               ($item['category'] == 'event' ? 'calendar-alt' : 'store'));
                        $label = $item['category'] == 'food' ? 'Makanan' : 
                                ($item['category'] == 'facility' ? 'Fasilitas' : 
                                ($item['category'] == 'event' ? 'Acara' : 'Interior'));
                    @endphp
                    
                    <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $item['category'] }}" data-index="{{ $index }}" style="display: block;">
                        <div class="gallery-card">
                            <div class="gallery-image-wrapper">
                                <img src="{{ $item['image'] }}" 
                                     alt="{{ $item['title'] }}" 
                                     class="gallery-image" 
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/800x600?text=Image+Error';">
                                
                                <div class="image-overlay-gradient"></div>
                                
                                <!-- Category Tag -->
                                <div class="category-tag">
                                    <i class="fas fa-{{ $icon }}"></i>
                                    {{ $label }}
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
            @endforelse
            
            <!-- Hidden items untuk load more (hanya jika ada data lebih dari 6) -->
            @if($galleryData->count() > 6)
                @foreach($galleryData->slice(6) as $index => $item)
                    @php 
                        $actualIndex = $index + 6;
                        
                        // Tentukan URL gambar
                        $imageUrl = $item->image_path ?? 'https://via.placeholder.com/800x600?text=No+Image';
                        
                        $categoryIcons = [
                            'food' => 'utensils',
                            'facility' => 'building',
                            'event' => 'calendar-alt',
                            'interior' => 'store'
                        ];
                        $categoryLabels = [
                            'food' => 'Makanan',
                            'facility' => 'Fasilitas',
                            'event' => 'Acara',
                            'interior' => 'Interior'
                        ];
                        $categoryIcon = $categoryIcons[$item->category] ?? 'image';
                        $categoryLabel = $categoryLabels[$item->category] ?? ucfirst($item->category);
                        
                        $formattedDate = $item->created_at ? $item->created_at->format('d M Y') : now()->format('d M Y');
                    @endphp
                    
                    <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $item->category }}" data-index="{{ $actualIndex }}" style="display: none;">
                        <div class="gallery-card">
                            <div class="gallery-image-wrapper">
                                <img src="{{ $imageUrl }}" 
                                     alt="{{ $item->caption }}" 
                                     class="gallery-image"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/800x600?text=Image+Not+Found';">
                                
                                <div class="image-overlay-gradient"></div>
                                
                                <!-- Category Tag -->
                                <div class="category-tag">
                                    <i class="fas fa-{{ $categoryIcon }}"></i>
                                    {{ $categoryLabel }}
                                </div>
                            </div>
                            
                            <div class="gallery-info">
                                <h5 class="gallery-title">{{ $item->caption }}</h5>
                                <p class="gallery-desc">{{ $item->description ?? $item->caption }}</p>
                                
                                <div class="gallery-footer">
                                    <span class="gallery-date">
                                        <i class="far fa-calendar"></i>
                                        {{ $formattedDate }}
                                    </span>
                                    <button class="btn-view-gallery" data-index="{{ $actualIndex }}" data-bs-toggle="modal" data-bs-target="#lightboxModal">
                                        <i class="fas fa-expand-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        
        <!-- Load More Button (tampil jika ada lebih dari 6 item) -->
        @if($galleryData->count() > 6)
            <div class="text-center mt-5">
                <button class="btn-load-more" id="loadMore">
                    <span class="btn-icon"><i class="fas fa-plus-circle"></i></span>
                    <span class="btn-text">Muat Lebih Banyak</span>
                    <span class="btn-arrow"><i class="fas fa-arrow-down"></i></span>
                </button>
            </div>
        @endif
    </div>
</section>

<!-- Lightbox Modal - Premium Design -->
<div class="modal fade" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark border-0">
            <!-- Close Button -->
            <button type="button" class="lightbox-close" data-bs-dismiss="modal" aria-label="Close">
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
                        <button class="lightbox-nav-btn prev-btn" id="prevImage" type="button">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="lightbox-nav-btn next-btn" id="nextImage" type="button">
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
                                        <span id="currentImageNum2">1</span> / <span id="totalImages2">9</span>
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
    
    /* ============================================
       CSS VARIABLES - MODERN SOPHISTICATED PALETTE
    ============================================ */
    :root {
        /* Primary Colors - Refined & Sophisticated */
        --primary: #C62828;           /* Modern Red (lebih soft & elegant) */
        --primary-dark: #B71C1C;      /* Deep Wine Red */
        --primary-light: #EF5350;     /* Coral Red */
        
        /* Secondary & Accent - Warm & Balanced */
        --secondary: #F57C00;         /* Warm Orange */
        --accent: #FFA726;            /* Sophisticated Amber (bukan gold murni) */
        --accent-light: #FFB74D;      /* Light Amber */
        
        /* Neutral Colors */
        --dark: #1a1a1a;
        --light: #f8fafc;
        --white: #ffffff;
        --text-dark: #1e293b;
        --text-gray: #64748b;
        --border: #e2e8f0;
        
        /* Background Colors - Warm & Inviting */
        --bg-cream: #FFF8F0;          /* Warm Cream */
        --bg-peach: #FFEBEE;          /* Soft Peach */
        --hero-bg: #8D1212;           /* Rich Maroon (lebih terang dari sebelumnya) */
        
        /* Shadows */
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
        --shadow-md: 0 8px 30px rgba(0,0,0,0.12);
        --shadow-lg: 0 20px 60px rgba(0,0,0,0.15);
        
        /* Gradients - More Refined */
        --gradient-primary: linear-gradient(135deg, #C62828 0%, #F57C00 100%);
        --gradient-hero: radial-gradient(circle at 70% 30%, #A52A2A 0%, #8D1212 40%, #6B1111 100%);
        
        /* Transitions */
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ========== ELEGANT RED GRADIENT HERO ========== */
    .elegant-hero {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        padding: 100px 0 60px;
        margin-top: -80px;
        overflow: hidden;
        background: var(--hero-bg);
    }

    .elegant-gradient {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--gradient-hero);
        z-index: 1;
    }

    .hero-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        z-index: 2;
    }

    .shape-1 {
        width: 600px;
        height: 600px;
        background: rgba(198, 40, 40, 0.15);
        top: -200px;
        right: -100px;
        animation: shapeFloat 20s ease-in-out infinite;
    }

    .shape-2 {
        width: 400px;
        height: 400px;
        background: rgba(245, 124, 0, 0.12);
        bottom: -100px;
        left: -50px;
        animation: shapeFloat 25s ease-in-out infinite reverse;
    }
    
    .shape-3 {
        width: 300px;
        height: 300px;
        background: rgba(255, 167, 38, 0.1);
        top: 50%;
        left: 20%;
        filter: blur(100px);
        animation: shapeFloat 18s ease-in-out infinite;
    }

    @keyframes shapeFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.95); }
    }

    .particle-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 2;
    }

    .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 167, 38, 0.35);
        border-radius: 50%;
        animation: particleFloat 15s infinite linear;
    }

    .particle:nth-child(1) { top: 20%; left: 10%; animation-duration: 12s; }
    .particle:nth-child(2) { top: 70%; left: 20%; animation-duration: 18s; background: rgba(255,255,255,0.4); }
    .particle:nth-child(3) { top: 30%; left: 80%; animation-duration: 20s; width: 6px; height: 6px; }
    .particle:nth-child(4) { top: 80%; left: 40%; animation-duration: 14s; }
    .particle:nth-child(5) { top: 40%; left: 90%; animation-duration: 22s; width: 5px; height: 5px; }
    .particle:nth-child(6) { top: 50%; left: 50%; animation-duration: 16s; width: 8px; height: 8px; }
    .particle:nth-child(7) { top: 15%; left: 60%; animation-duration: 24s; }
    .particle:nth-child(8) { top: 85%; left: 75%; animation-duration: 19s; }
    .particle:nth-child(9) { top: 45%; left: 25%; animation-duration: 21s; }
    .particle:nth-child(10) { top: 10%; left: 40%; animation-duration: 17s; }

    @keyframes particleFloat {
        0% { transform: translateY(0) translateX(0); opacity: 0; }
        10% { opacity: 0.5; }
        90% { opacity: 0.5; }
        100% { transform: translateY(-100vh) translateX(20px); opacity: 0; }
    }

    .container {
        position: relative;
        z-index: 10;
    }

    .reveal-text {
        animation: revealText 1.5s cubic-bezier(0.2, 0.9, 0.4, 1) forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes revealText {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .premium-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 10px 24px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 100px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 20px;
    }

    .badge-dot {
        width: 8px;
        height: 8px;
        background: var(--accent-light);
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(255, 167, 38, 0.6);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.2); opacity: 0.8; }
    }

    .premium-badge span {
        color: white;
        font-size: 0.9rem;
        font-weight: 500;
        letter-spacing: 3px;
    }

    .elegant-heading {
        margin-bottom: 20px;
    }

    .heading-line {
        display: block;
        font-size: 4.2rem;
        font-weight: 700;
        line-height: 1.2;
        color: white;
        text-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .gradient-highlight {
        background: linear-gradient(120deg, #FFB74D, #FFA726, #F57C00);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
    }

    .elegant-desc {
        font-size: 1.2rem;
        line-height: 1.8;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        margin-bottom: 30px;
        font-weight: 300;
        letter-spacing: 0.3px;
    }

    .elegant-cta {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }

    .btn-elegant {
        position: relative;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 36px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1);
        overflow: hidden;
        border: none;
    }

    .btn-primary-elegant {
        background: white;
        color: var(--primary-dark);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .btn-primary-elegant:hover {
        background: #fff5f5;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        color: var(--primary-dark);
    }

    .btn-primary-elegant i {
        transition: transform 0.3s ease;
    }

    .btn-primary-elegant:hover i {
        transform: translateX(8px);
    }

    .btn-outline-elegant {
        background: transparent;
        color: white;
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(5px);
    }

    .btn-outline-elegant:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.8);
        transform: translateY(-3px);
    }

    /* ========== HERO IMAGE ========== */
    .hero-image-wrapper {
        position: relative;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    .hero-image-container.hero-image-extra-large {
        position: relative;
        width: 100%;
        max-width: 720px;
        margin: 0 auto;
    }

    .hero-image-frame.hero-frame-premium {
        position: relative;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.7);
        border: 12px solid rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        transition: all 0.5s cubic-bezier(0.2, 0.9, 0.4, 1);
        transform: translateY(0);
    }

    .hero-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.7s ease;
        object-fit: cover;
        aspect-ratio: 16/9;
    }

    .hero-image-frame.hero-frame-premium:hover {
        transform: translateY(-15px) scale(1.03);
        border-color: rgba(255, 167, 38, 0.6);
        box-shadow: 0 50px 80px -20px rgba(198, 40, 40, 0.6);
    }

    .hero-image-frame.hero-frame-premium:hover .hero-image {
        transform: scale(1.1);
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, 
            rgba(198, 40, 40, 0.2) 0%, 
            rgba(0, 0, 0, 0.4) 50%,
            rgba(198, 40, 40, 0.2) 100%);
        opacity: 0.3;
        transition: opacity 0.5s ease;
        z-index: 2;
        pointer-events: none;
    }

    .hero-image-frame.hero-frame-premium:hover .image-overlay {
        opacity: 0.7;
    }

    .image-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, 
            rgba(255, 167, 38, 0.3) 0%, 
            transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
        z-index: 3;
        pointer-events: none;
    }

    .hero-image-frame.hero-frame-premium:hover .image-glow {
        opacity: 0.8;
    }

    .image-shine {
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            to bottom right,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.2) 50%,
            rgba(255, 255, 255, 0) 100%
        );
        transform: rotate(30deg) translateX(-100%);
        transition: transform 0.8s ease;
        z-index: 4;
        pointer-events: none;
    }

    .hero-image-frame.hero-frame-premium:hover .image-shine {
        transform: rotate(30deg) translateX(100%);
    }

    .image-frame {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 5;
        pointer-events: none;
    }

    .frame-corner {
        position: absolute;
        width: 35px;
        height: 35px;
        border-color: rgba(255, 167, 38, 0.7);
        transition: all 0.4s ease;
    }

    .frame-corner.top-left {
        top: 20px;
        left: 20px;
        border-top: 3px solid var(--accent);
        border-left: 3px solid var(--accent);
    }

    .frame-corner.top-right {
        top: 20px;
        right: 20px;
        border-top: 3px solid var(--accent);
        border-right: 3px solid var(--accent);
    }

    .frame-corner.bottom-left {
        bottom: 20px;
        left: 20px;
        border-bottom: 3px solid var(--accent);
        border-left: 3px solid var(--accent);
    }

    .frame-corner.bottom-right {
        bottom: 20px;
        right: 20px;
        border-bottom: 3px solid var(--accent);
        border-right: 3px solid var(--accent);
    }

    .hero-image-frame.hero-frame-premium:hover .frame-corner {
        width: 50px;
        height: 50px;
        border-color: var(--accent-light);
    }

    .image-premium-label {
        position: absolute;
        bottom: 30px;
        left: 30px;
        background: rgba(255, 167, 38, 0.95);
        color: var(--primary-dark);
        padding: 10px 25px;
        border-radius: 50px;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 0.9rem;
        z-index: 7;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
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
    
    .filter-badge {
        background: rgba(255, 255, 255, 0.2);
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
        margin-left: 5px;
    }
    
    .filter-btn:not(.active) .filter-badge {
        background: rgba(139, 0, 0, 0.1);
        color: var(--red-primary);
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
        .heading-line {
            font-size: 3.2rem;
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
        .elegant-hero {
            min-height: auto;
            padding: 80px 0 40px;
        }
        
        .heading-line {
            font-size: 2.8rem;
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
        .heading-line {
            font-size: 2.2rem;
        }
        
        .elegant-cta {
            flex-direction: column;
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
        .heading-line {
            font-size: 1.8rem;
        }
        
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
    let allItems = @json($galleryItemsForJs);
    let isExpanded = false;
    
    console.log('Gallery items loaded:', allItems.length);
    
    // Set total images
    if (totalImages) totalImages.textContent = allItems.length;
    if (totalImages2) totalImages2.textContent = allItems.length;
    
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
            
            // Update load more button
            updateLoadMoreButton();
        });
    });
    
    // Load More Toggle functionality
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            isExpanded = !isExpanded;
            const activeFilter = document.querySelector('.filter-btn.active').dataset.filter;
            
            if (isExpanded) {
                // Show all items
                let visibleCount = 0;
                galleryItems.forEach((item, index) => {
                    if (activeFilter === 'all' || item.dataset.category === activeFilter) {
                        item.style.display = 'block';
                        item.style.animation = 'fadeIn 0.6s ease forwards';
                        item.style.animationDelay = (visibleCount * 0.05) + 's';
                        visibleCount++;
                    }
                });
                
                // Update button
                loadMoreBtn.classList.add('show-less');
                const btnText = loadMoreBtn.querySelector('.btn-text');
                const btnIcon = loadMoreBtn.querySelector('.btn-icon i');
                if (btnText) btnText.textContent = 'Tampilkan Lebih Sedikit';
                if (btnIcon) btnIcon.className = 'fas fa-minus-circle';
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
                const btnText = loadMoreBtn.querySelector('.btn-text');
                const btnIcon = loadMoreBtn.querySelector('.btn-icon i');
                if (btnText) btnText.textContent = 'Muat Lebih Banyak';
                if (btnIcon) btnIcon.className = 'fas fa-plus-circle';
                
                // Scroll to top of gallery
                document.querySelector('.gallery-section').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }
    
    function updateLoadMoreButton() {
        if (!loadMoreBtn) return;
        
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
    
    // Lightbox functionality
    function generateThumbnails() {
        if (!thumbnailsGrid) return;
        
        thumbnailsGrid.innerHTML = '';
        allItems.forEach((item, index) => {
            const thumb = document.createElement('div');
            thumb.className = 'thumbnail-item';
            if (index === currentIndex) thumb.classList.add('active');
            thumb.innerHTML = `<img src="${item.image}" alt="${item.title}" onerror="this.onerror=null; this.src='https://via.placeholder.com/150?text=Error';">`;
            thumb.addEventListener('click', () => {
                currentIndex = index;
                updateModal();
                updateThumbnailsActive();
            });
            thumbnailsGrid.appendChild(thumb);
        });
    }
    
    function updateThumbnailsActive() {
        document.querySelectorAll('.thumbnail-item').forEach((thumb, index) => {
            thumb.classList.toggle('active', index === currentIndex);
        });
    }
    
    viewBtns.forEach((btn) => {
        btn.addEventListener('click', function() {
            const index = parseInt(this.dataset.index);
            if (!isNaN(index) && index >= 0 && index < allItems.length) {
                currentIndex = index;
                updateModal();
                generateThumbnails();
            }
        });
    });
    
    function updateModal() {
        if (!allItems.length || currentIndex >= allItems.length) return;
        
        const item = allItems[currentIndex];
        
        // Update image
        if (modalImage) {
            modalImage.src = item.image;
            modalImage.style.animation = 'fadeIn 0.5s ease';
            modalImage.onerror = function() {
                this.onerror=null;
                this.src='https://via.placeholder.com/800x600?text=Image+Error';
            };
        }
        
        // Update info
        if (modalTitle) modalTitle.textContent = item.title;
        if (modalDate) modalDate.textContent = item.date;
        if (modalDesc) modalDesc.textContent = item.desc;
        
        // Update category badge
        if (modalCategory) {
            const categoryIcons = {
                'food': 'utensils',
                'facility': 'building',
                'event': 'calendar-alt',
                'interior': 'store'
            };
            const categoryLabels = {
                'food': 'Makanan',
                'facility': 'Fasilitas',
                'event': 'Acara',
                'interior': 'Interior'
            };
            const icon = categoryIcons[item.category] || 'image';
            const label = categoryLabels[item.category] || (item.category ? item.category.charAt(0).toUpperCase() + item.category.slice(1) : 'Galeri');
            
            modalCategory.innerHTML = `
                <i class="fas fa-${icon}"></i>
                <span>${label}</span>
            `;
        }
        
        // Update counters
        if (currentImageNum) currentImageNum.textContent = currentIndex + 1;
        if (currentImageNum2) currentImageNum2.textContent = currentIndex + 1;
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            if (allItems.length > 0) {
                currentIndex = (currentIndex - 1 + allItems.length) % allItems.length;
                updateModal();
                updateThumbnailsActive();
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            if (allItems.length > 0) {
                currentIndex = (currentIndex + 1) % allItems.length;
                updateModal();
                updateThumbnailsActive();
            }
        });
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('lightboxModal');
        if (modal && modal.classList.contains('show')) {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                if (prevBtn) prevBtn.click();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                if (nextBtn) nextBtn.click();
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
    
    // Initial load more button state
    updateLoadMoreButton();
});
</script>
@endsection