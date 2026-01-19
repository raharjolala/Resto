@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Galeri<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Jelajahi suasana, hidangan istimewa, dan momen berharga yang tercipta di JOSS GANDOS.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-images me-1"></i> 100+ Foto
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-camera me-1"></i> Update Terbaru
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Content -->
    <section class="section-padding">
        <div class="container">
            <!-- Gallery Filter -->
            <div class="gallery-filter text-center mb-5 animate-fade-in">
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <button type="button" class="btn px-4 py-2 active filter-btn" data-filter="all" 
                            style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); color: white; border: none; border-radius: 10px;">
                        <i class="fas fa-th-large me-2"></i> Semua
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="food" 
                            style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red); border: 2px solid rgba(180, 34, 34, 0.2); border-radius: 10px;">
                        <i class="fas fa-utensils me-2"></i> Makanan
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="interior" 
                            style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red); border: 2px solid rgba(180, 34, 34, 0.2); border-radius: 10px;">
                        <i class="fas fa-store me-2"></i> Interior
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="events" 
                            style="background: rgba(180, 34, 34, 0.1); color: var(--primary-red); border: 2px solid rgba(180, 34, 34, 0.2); border-radius: 10px;">
                        <i class="fas fa-calendar-alt me-2"></i> Acara
                    </button>
                </div>
            </div>
            
            <!-- Gallery Grid -->
            <div class="row g-4" id="galleryGrid">
                @for($i = 1; $i <= 9; $i++)
                    @php
                        $categories = ['food', 'interior', 'events'];
                        $category = $categories[array_rand($categories)];
                        $titles = [
                            'Makanan Spesial JOSS GANDOS',
                            'Suasana Restoran yang Nyaman',
                            'Interior Modern & Elegan',
                            'Acara Spesial di JOSS GANDOS',
                            'Hidangan Favorit Pelanggan',
                            'Area Makan Keluarga',
                            'Chef in Action',
                            'Bahan Baku Segar',
                            'Momen Spesial'
                        ];
                        $title = $titles[array_rand($titles)];
                        
                        // Better quality images
                        $imageUrls = [
                            'food' => [
                                'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                            ],
                            'interior' => [
                                'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                            ],
                            'events' => [
                                'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                            ]
                        ];
                        
                        $imageUrl = $imageUrls[$category][array_rand($imageUrls[$category])];
                    @endphp
                    
                    <div class="col-lg-4 col-md-6 gallery-item animate-fade-in" data-category="{{ $category }}" 
                         style="animation-delay: {{ $i * 0.1 }}s;">
                        <div class="modern-card" style="border-radius: 20px; overflow: hidden;">
                            <div class="position-relative overflow-hidden" style="height: 300px;">
                                <img src="{{ $imageUrl }}" 
                                     class="gallery-img w-100 h-100" alt="{{ $title }}" 
                                     style="object-fit: cover; transition: transform 0.5s ease;">
                                <div class="position-absolute top-0 start-0 p-3">
                                    <span class="badge px-3 py-2" style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); color: white; border-radius: 10px;">
                                        <i class="fas fa-{{ $category == 'food' ? 'utensils' : ($category == 'interior' ? 'store' : 'calendar-alt') }} me-1"></i>
                                        {{ ucfirst($category) }}
                                    </span>
                                </div>
                                <div class="gallery-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center" 
                                     style="background: rgba(44, 44, 44, 0.7); opacity: 0; transition: opacity 0.3s ease; padding: 20px;">
                                    <div class="text-center">
                                        <h5 class="text-white mb-3">{{ $title }}</h5>
                                        <button class="btn btn-sm px-4 view-image" 
                                                style="background: var(--primary-red); color: white; border-radius: 20px;">
                                            <i class="fas fa-expand me-1"></i> Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h5 class="mb-2 fw-bold" style="color: var(--dark-charcoal);">{{ $title }}</h5>
                                <p class="text-muted mb-0 small">
                                    <i class="fas fa-calendar-alt me-1" style="color: var(--primary-red);"></i>
                                    {{ date('d M Y', strtotime('-' . rand(0, 30) . ' days')) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <!-- Load More Button -->
            <div class="text-center mt-5 animate-fade-in" style="animation-delay: 0.5s;">
                <button class="btn btn-primary btn-lg px-5" id="loadMore">
                    <i class="fas fa-plus me-2"></i> Tampilkan Lebih Banyak
                </button>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .gallery-img {
        transition: transform 0.5s ease;
    }
    
    .modern-card:hover .gallery-img {
        transform: scale(1.1);
    }
    
    .modern-card:hover .gallery-overlay {
        opacity: 1 !important;
    }
    
    .filter-btn {
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover, .filter-btn.active {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(180, 34, 34, 0.3);
    }
    
    /* Lightbox Modal */
    .lightbox-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.95);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        animation: fadeIn 0.3s ease-out;
    }
    
    .lightbox-content {
        max-width: 90%;
        max-height: 90vh;
        position: relative;
    }
    
    .lightbox-img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    }
    
    .close-lightbox {
        position: absolute;
        top: -50px;
        right: 0;
        background: none;
        border: none;
        color: white;
        font-size: 2.5rem;
        cursor: pointer;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }
    
    .close-lightbox:hover {
        opacity: 1;
    }
    
    @media (max-width: 768px) {
        .gallery-filter .btn {
            margin-bottom: 10px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Gallery filter functionality
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = 'rgba(180, 34, 34, 0.1)';
                btn.style.color = 'var(--primary-red)';
                btn.style.border = '2px solid rgba(180, 34, 34, 0.2)';
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.style.background = 'linear-gradient(135deg, var(--primary-red), var(--secondary-gold))';
            this.style.color = 'white';
            this.style.border = 'none';
            
            const filter = this.getAttribute('data-filter');
            const items = document.querySelectorAll('.gallery-item');
            
            items.forEach((item, index) => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.animation = 'fadeInUp 0.5s ease';
                    }, 10);
                } else {
                    item.style.animation = 'fadeOut 0.3s ease';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Lightbox functionality
    function openLightbox(imageUrl, title) {
        const lightbox = document.createElement('div');
        lightbox.className = 'lightbox-modal';
        lightbox.innerHTML = `
            <div class="lightbox-content">
                <button class="close-lightbox">&times;</button>
                <img src="${imageUrl}" class="lightbox-img" alt="${title}">
                <div class="text-center mt-4">
                    <h5 class="text-white mb-0">${title}</h5>
                </div>
            </div>
        `;
        
        document.body.appendChild(lightbox);
        lightbox.style.display = 'flex';
        
        // Close on X click
        lightbox.querySelector('.close-lightbox').addEventListener('click', () => {
            lightbox.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                document.body.removeChild(lightbox);
            }, 300);
        });
        
        // Close on background click
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    document.body.removeChild(lightbox);
                }, 300);
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function closeOnEscape(e) {
            if (e.key === 'Escape') {
                lightbox.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => {
                    document.body.removeChild(lightbox);
                }, 300);
                document.removeEventListener('keydown', closeOnEscape);
            }
        });
    }
    
    // Add event listeners to view buttons
    document.querySelectorAll('.view-image').forEach(button => {
        button.addEventListener('click', function() {
            const card = this.closest('.modern-card');
            const imageUrl = card.querySelector('.gallery-img').src;
            const title = card.querySelector('h5').textContent;
            openLightbox(imageUrl, title);
        });
    });
    
    // Load more functionality
    let currentItems = 9;
    document.getElementById('loadMore').addEventListener('click', function() {
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memuat...';
        this.disabled = true;
        
        setTimeout(() => {
            // Add 3 more items
            for (let i = 0; i < 3; i++) {
                const categories = ['food', 'interior', 'events'];
                const category = categories[Math.floor(Math.random() * categories.length)];
                const titles = [
                    'Makanan Spesial JOSS GANDOS',
                    'Suasana Restoran yang Nyaman',
                    'Interior Modern & Elegan',
                    'Acara Spesial di JOSS GANDOS',
                    'Hidangan Favorit Pelanggan'
                ];
                const title = titles[Math.floor(Math.random() * titles.length)];
                
                const imageUrls = {
                    'food': 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'interior': 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'events': 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                };
                
                const galleryItem = document.createElement('div');
                galleryItem.className = 'col-lg-4 col-md-6 gallery-item animate-fade-in';
                galleryItem.setAttribute('data-category', category);
                galleryItem.innerHTML = `
                    <div class="modern-card" style="border-radius: 20px; overflow: hidden;">
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img src="${imageUrls[category]}" 
                                 class="gallery-img w-100 h-100" alt="${title}" 
                                 style="object-fit: cover; transition: transform 0.5s ease;">
                            <div class="position-absolute top-0 start-0 p-3">
                                <span class="badge px-3 py-2" style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); color: white; border-radius: 10px;">
                                    <i class="fas fa-${category == 'food' ? 'utensils' : (category == 'interior' ? 'store' : 'calendar-alt')} me-1"></i>
                                    ${category.charAt(0).toUpperCase() + category.slice(1)}
                                </span>
                            </div>
                            <div class="gallery-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center" 
                                 style="background: rgba(44, 44, 44, 0.7); opacity: 0; transition: opacity 0.3s ease; padding: 20px;">
                                <div class="text-center">
                                    <h5 class="text-white mb-3">${title}</h5>
                                    <button class="btn btn-sm px-4 view-image" 
                                            style="background: var(--primary-red); color: white; border-radius: 20px;">
                                        <i class="fas fa-expand me-1"></i> Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="mb-2 fw-bold" style="color: var(--dark-charcoal);">${title}</h5>
                            <p class="text-muted mb-0 small">
                                <i class="fas fa-calendar-alt me-1" style="color: var(--primary-red);"></i>
                                ${new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}
                            </p>
                        </div>
                    </div>
                `;
                
                document.getElementById('galleryGrid').appendChild(galleryItem);
                
                // Add event listener to new view button
                galleryItem.querySelector('.view-image').addEventListener('click', function() {
                    openLightbox(imageUrls[category], title);
                });
            }
            
            this.innerHTML = originalText;
            this.disabled = false;
            
            // If we have enough items, change button text
            currentItems += 3;
            if (currentItems >= 15) {
                this.innerHTML = '<i class="fas fa-check me-2"></i> Semua Gambar Ditampilkan';
                this.disabled = true;
                this.style.background = '#2a9d8f';
            }
        }, 1000);
    });
    
    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(20px); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection