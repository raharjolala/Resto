@extends('layouts.app')

@section('title', 'Menu - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="resto-hero-section" style="height: 70vh; margin-top: 76px; background: linear-gradient(rgba(42, 42, 42, 0.85), rgba(42, 42, 42, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8">
                    <div class="hero-content text-white">
                        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
                            Menu Lezat<br>
                            <span class="text-warning">JOSS GANDOS</span>
                        </h1>
                        <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.9;">
                            Jelajahi berbagai pilihan hidangan lezat yang kami sajikan dengan penuh cinta dan bahan-bahan pilihan terbaik.
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-star me-1"></i> 100+ Menu Tersedia
                            </span>
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-clock me-1"></i> Siap Disajikan
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Categories -->
    <section class="resto-section-padding" style="padding: 5rem 0;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 class="fw-bold mb-2" style="color: #2a2a2a; font-size: 2.2rem;">Semua Menu</h2>
                            <p class="text-muted mb-0">Pilih kategori favorit Anda atau jelajahi semua menu</p>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-gold dropdown-toggle px-4 py-2" type="button" id="categoryFilter" data-bs-toggle="dropdown" style="border: 2px solid #d4a574; color: #d4a574; border-radius: 10px;">
                                <i class="fas fa-filter me-2"></i> Filter Kategori
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow" style="border-radius: 10px; border: none;">
                                <li><a class="dropdown-item" href="#" data-category="all">
                                    <i class="fas fa-list me-2"></i> Semua Kategori
                                </a></li>
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="#" data-category="{{ $category->id }}">
                                        <i class="fas fa-utensils me-2"></i> {{ $category->name }}
                                    </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            @foreach($categories as $category)
                <div class="menu-category mb-5" data-category="{{ $category->id }}">
                    <div class="d-flex align-items-center mb-4 p-4" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-radius: 15px;">
                        <div class="bg-gold p-3 rounded me-3 shadow-sm" style="background: linear-gradient(135deg, #d4a574, #b38b5d);">
                            <i class="fas fa-utensils text-white fa-2x"></i>
                        </div>
                        <div>
                            <h3 class="mb-1 fw-bold" style="color: #2a2a2a; font-size: 1.8rem;">{{ $category->name }}</h3>
                            @if($category->description)
                                <p class="mb-0" style="color: #666;">{{ $category->description }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row g-4">
                        @foreach($category->menuItems->where('is_available', true) as $item)
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="resto-menu-card shadow-lg" style="background: white; border-radius: 20px; overflow: hidden; transition: all 0.3s ease; border: 1px solid rgba(0,0,0,0.05);">
                                    <div class="d-flex h-100">
                                        <div class="menu-img-container" style="width: 180px; flex-shrink: 0;">
                                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                                 class="h-100 w-100" style="object-fit: cover;" alt="{{ $item->name }}">
                                            @if($item->is_featured)
                                                <div class="featured-badge" style="position: absolute; top: 15px; left: 15px; background: linear-gradient(135deg, #e63946, #d62828); color: white; padding: 6px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600;">
                                                    <i class="fas fa-crown me-1"></i> FAVORIT
                                                </div>
                                            @endif
                                        </div>
                                        <div class="menu-content p-4 flex-grow-1 d-flex flex-column justify-content-between">
                                            <div>
                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                    <h4 class="menu-title mb-0 fw-bold" style="color: #2a2a2a; font-size: 1.3rem;">{{ $item->name }}</h4>
                                                    <span class="menu-price fw-bold" style="color: #d4a574; font-size: 1.4rem;">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                                </div>
                                                <p class="menu-description mb-3" style="color: #666; line-height: 1.6;">{{ $item->description }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    @if($item->spicy_level)
                                                        <span class="badge me-2" style="background: rgba(230, 57, 70, 0.1); color: #e63946;">
                                                            <i class="fas fa-pepper-hot me-1"></i> Pedas {{ $item->spicy_level }}/5
                                                        </span>
                                                    @endif
                                                    @if($item->is_vegetarian)
                                                        <span class="badge" style="background: rgba(42, 157, 143, 0.1); color: #2a9d8f;">
                                                            <i class="fas fa-leaf me-1"></i> Vegetarian
                                                        </span>
                                                    @endif
                                                </div>
                                                <button class="btn btn-order" style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border: none; border-radius: 10px; padding: 10px 20px; font-weight: 500; transition: all 0.3s ease;">
                                                    <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            
            @if($categories->isEmpty())
                <!-- Demo menu content -->
                <div class="text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-utensils fa-5x" style="color: #d4a574;"></i>
                    </div>
                    <h4 class="mb-3 fw-bold" style="color: #2a2a2a;">Belum ada menu tersedia</h4>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">Kami sedang mempersiapkan menu terbaik untuk Anda</p>
                    <a href="/" class="btn px-4 py-2" style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border-radius: 10px; font-weight: 500;">
                        <i class="fas fa-home me-2"></i> Kembali ke Home
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05));">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-2" style="color: #2a2a2a;">Ingin pesan dalam jumlah besar?</h3>
                    <p class="mb-0" style="color: #666;">Hubungi kami untuk catering dan acara spesial</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <button class="btn px-4 py-3" style="background: linear-gradient(135deg, #2a2a2a, #1a1a1a); color: white; border-radius: 12px; font-weight: 500;">
                        <i class="fas fa-phone-alt me-2"></i> Hubungi Kami
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* Custom styles for the menu page */
    .resto-hero-section {
        position: relative;
        overflow: hidden;
    }
    
    .resto-hero-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, transparent, #f8f5f2);
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .resto-menu-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
    }
    
    .resto-menu-card:hover {
        transform: translateY(-8px) scale(1.01);
        box-shadow: 0 20px 50px rgba(212, 165, 116, 0.15) !important;
    }
    
    .menu-img-container {
        position: relative;
        overflow: hidden;
    }
    
    .menu-img-container img {
        transition: transform 0.5s ease;
    }
    
    .resto-menu-card:hover .menu-img-container img {
        transform: scale(1.1);
    }
    
    .btn-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
        background: linear-gradient(135deg, #b38b5d, #9c7548) !important;
    }
    
    .dropdown-item {
        padding: 12px 20px;
        transition: all 0.2s ease;
    }
    
    .dropdown-item:hover {
        background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05));
        color: #d4a574;
        padding-left: 25px;
    }
    
    .btn-outline-gold:hover {
        background: linear-gradient(135deg, #d4a574, #b38b5d);
        color: white !important;
        border-color: #d4a574;
    }
    
    /* Animation for cards */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .resto-menu-card {
        animation: fadeInUp 0.6s ease-out;
    }
    
    .resto-menu-card:nth-child(2) { animation-delay: 0.1s; }
    .resto-menu-card:nth-child(3) { animation-delay: 0.2s; }
    .resto-menu-card:nth-child(4) { animation-delay: 0.3s; }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .resto-hero-section {
            height: 60vh !important;
        }
        
        .hero-title {
            font-size: 2.5rem !important;
        }
        
        .menu-img-container {
            width: 120px !important;
        }
        
        .menu-content {
            padding: 1rem !important;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Category filter functionality - Enhanced with animations
    document.querySelectorAll('[data-category]').forEach(category => {
        category.style.display = 'block';
    });
    
    document.querySelectorAll('.dropdown-item[data-category]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryId = this.getAttribute('data-category');
            
            // Update dropdown button text
            const filterBtn = document.querySelector('#categoryFilter');
            filterBtn.innerHTML = `<i class="fas fa-filter me-2"></i> ${this.textContent.trim()}`;
            
            // Add animation to button
            filterBtn.style.transform = 'scale(0.95)';
            setTimeout(() => {
                filterBtn.style.transform = 'scale(1)';
            }, 150);
            
            // Show/hide categories with fade animation
            document.querySelectorAll('.menu-category').forEach(category => {
                if (categoryId === 'all' || category.getAttribute('data-category') === categoryId) {
                    category.style.display = 'block';
                    category.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    category.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        category.style.display = 'none';
                    }, 300);
                }
            });
            
            // Show message if no items in selected category
            setTimeout(() => {
                const visibleCategories = document.querySelectorAll('.menu-category[style*="block"]');
                if (visibleCategories.length === 0) {
                    // You could add a "no items" message here
                }
            }, 350);
        });
    });
    
    // Add to cart functionality
    document.querySelectorAll('.btn-order').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.resto-menu-card');
            const itemName = card.querySelector('.menu-title').textContent;
            const itemPrice = card.querySelector('.menu-price').textContent;
            
            // Animation
            this.innerHTML = '<i class="fas fa-check me-2"></i> Ditambahkan';
            this.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
            
            // Create notification
            const notification = document.createElement('div');
            notification.className = 'alert alert-success position-fixed top-0 end-0 m-4 shadow';
            notification.style.zIndex = '9999';
            notification.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                <strong>${itemName}</strong> berhasil ditambahkan ke keranjang!
                <button type="button" class="btn-close ms-3" onclick="this.parentElement.remove()"></button>
            `;
            document.body.appendChild(notification);
            
            // Auto remove notification
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 3000);
            
            // Reset button after 2 seconds
            setTimeout(() => {
                this.innerHTML = '<i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang';
                this.style.background = 'linear-gradient(135deg, #d4a574, #b38b5d)';
            }, 2000);
            
            // You can add actual cart logic here
            console.log(`Added to cart: ${itemName} - ${itemPrice}`);
        });
    });
    
    // Add CSS for fadeOut animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(10px); }
        }
        
        .alert {
            animation: slideInRight 0.3s ease-out;
        }
        
        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection