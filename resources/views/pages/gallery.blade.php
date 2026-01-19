@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="resto-hero-section" style="height: 70vh; margin-top: 76px; background: linear-gradient(rgba(42, 42, 42, 0.85), rgba(42, 42, 42, 0.9)), url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8">
                    <div class="hero-content text-white">
                        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
                            Galeri<br>
                            <span class="text-warning">JOSS GANDOS</span>
                        </h1>
                        <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.9;">
                            Lihat suasana, hidangan, dan momen spesial di JOSS GANDOS
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-images me-1"></i> 100+ Foto
                            </span>
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-camera me-1"></i> Update Terbaru
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Content -->
    <section class="resto-section-padding" style="padding: 5rem 0;">
        <div class="container">
            <!-- Gallery Filter -->
            <div class="gallery-filter text-center mb-5">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <button type="button" class="btn px-4 py-2 active filter-btn" data-filter="all" 
                            style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border: none; border-radius: 10px;">
                        <i class="fas fa-th-large me-2"></i> Semua
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="food" 
                            style="background: rgba(212, 165, 116, 0.1); color: #d4a574; border: 2px solid rgba(212, 165, 116, 0.3); border-radius: 10px;">
                        <i class="fas fa-utensils me-2"></i> Makanan
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="facility" 
                            style="background: rgba(212, 165, 116, 0.1); color: #d4a574; border: 2px solid rgba(212, 165, 116, 0.3); border-radius: 10px;">
                        <i class="fas fa-building me-2"></i> Fasilitas
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="interior" 
                            style="background: rgba(212, 165, 116, 0.1); color: #d4a574; border: 2px solid rgba(212, 165, 116, 0.3); border-radius: 10px;">
                        <i class="fas fa-couch me-2"></i> Interior
                    </button>
                    <button type="button" class="btn px-4 py-2 filter-btn" data-filter="event" 
                            style="background: rgba(212, 165, 116, 0.1); color: #d4a574; border: 2px solid rgba(212, 165, 116, 0.3); border-radius: 10px;">
                        <i class="fas fa-calendar-alt me-2"></i> Acara
                    </button>
                </div>
            </div>
            
            <!-- Gallery Grid -->
            <div class="row g-4" id="galleryGrid">
                @for($i = 1; $i <= 12; $i++)
                    @php
                        $categories = ['food', 'facility', 'interior', 'event'];
                        $category = $categories[array_rand($categories)];
                        $titles = [
                            'Makanan Spesial JOSS GANDOS',
                            'Suasana Restoran yang Nyaman',
                            'Interior Modern & Elegan',
                            'Acara Spesial di JOSS GANDOS',
                            'Hidangan Favorit Pelanggan',
                            'Area Makan Keluarga'
                        ];
                        $title = $titles[array_rand($titles)];
                        $foodImages = [
                            'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                            'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                            'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                        ];
                        $facilityImages = [
                            'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                            'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                        ];
                        $interiorImages = [
                            'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                            'https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                        ];
                        $eventImages = [
                            'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                            'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                        ];
                        
                        $imageUrls = [
                            'food' => $foodImages[array_rand($foodImages)],
                            'facility' => $facilityImages[array_rand($facilityImages)],
                            'interior' => $interiorImages[array_rand($interiorImages)],
                            'event' => $eventImages[array_rand($eventImages)]
                        ];
                        $imageUrl = $imageUrls[$category];
                    @endphp
                    
                    <div class="col-lg-4 col-md-6 gallery-item" data-category="{{ $category }}">
                        <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); height: 100%;">
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img src="{{ $imageUrl }}?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q={{ $i * 10 }}" 
                                     class="gallery-img w-100 h-100" alt="Gallery Image {{ $i }}" 
                                     style="object-fit: cover; transition: transform 0.5s ease;">
                                <div class="position-absolute top-0 start-0 p-3">
                                    <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border-radius: 10px;">
                                        <i class="fas fa-{{ $category == 'food' ? 'utensils' : ($category == 'facility' ? 'building' : ($category == 'interior' ? 'couch' : 'calendar-alt')) }} me-1"></i>
                                        {{ ucfirst($category) }}
                                    </span>
                                </div>
                                <div class="gallery-overlay position-absolute w-100 h-100 d-flex align-items-end justify-content-center" 
                                     style="background: linear-gradient(transparent, rgba(42, 42, 42, 0.9)); transform: translateY(100%); transition: transform 0.3s ease; padding: 20px;">
                                    <div class="text-center">
                                        <h5 class="text-white mb-2">{{ $title }}</h5>
                                        <button class="btn btn-sm px-3 view-image" 
                                                style="background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3); border-radius: 20px;">
                                            <i class="fas fa-expand me-1"></i> Lihat Detail
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title mb-2" style="color: #2a2a2a;">{{ $title }}</h5>
                                <p class="card-text text-muted mb-0" style="font-size: 0.9rem;">
                                    <i class="fas fa-calendar-alt me-1" style="color: #d4a574;"></i>
                                    {{ date('d M Y', strtotime('-' . rand(0, 30) . ' days')) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <!-- Load More Button -->
            <div class="text-center mt-5">
                <button class="btn px-5 py-3" id="loadMore" 
                        style="background: linear-gradient(135deg, #2a2a2a, #1a1a1a); color: white; border: none; border-radius: 12px; font-weight: 500; transition: all 0.3s ease;">
                    <i class="fas fa-plus me-2"></i> Tampilkan Lebih Banyak
                </button>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
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
    
    .gallery-item {
        animation: fadeInUp 0.6s ease-out;
    }
    
    .gallery-item:nth-child(2) { animation-delay: 0.1s; }
    .gallery-item:nth-child(3) { animation-delay: 0.2s; }
    .gallery-item:nth-child(4) { animation-delay: 0.3s; }
    .gallery-item:nth-child(5) { animation-delay: 0.4s; }
    .gallery-item:nth-child(6) { animation-delay: 0.5s; }
    
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
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-10px) !important;
        box-shadow: 0 25px 50px rgba(212, 165, 116, 0.15) !important;
    }
    
    .card:hover .gallery-img {
        transform: scale(1.1);
    }
    
    .card:hover .gallery-overlay {
        transform: translateY(0);
    }
    
    .filter-btn {
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover, .filter-btn.active {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    
    /* Lightbox Modal */
    .lightbox-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.9);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
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
    }
    
    .close-lightbox {
        position: absolute;
        top: -50px;
        right: 0;
        background: none;
        border: none;
        color: white;
        font-size: 2rem;
        cursor: pointer;
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
                btn.style.background = 'rgba(212, 165, 116, 0.1)';
                btn.style.color = '#d4a574';
                btn.style.border = '2px solid rgba(212, 165, 116, 0.3)';
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            this.style.background = 'linear-gradient(135deg, #d4a574, #b38b5d)';
            this.style.color = 'white';
            this.style.border = 'none';
            
            const filter = this.getAttribute('data-filter');
            const items = document.querySelectorAll('.gallery-item');
            
            items.forEach((item, index) => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeInUp 0.5s ease-out';
                    item.style.animationDelay = (index * 0.1) + 's';
                } else {
                    item.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Load more functionality
    let currentItems = 12;
    const totalItems = 24;
    
    document.getElementById('loadMore').addEventListener('click', function() {
        if (currentItems >= totalItems) {
            this.disabled = true;
            this.innerHTML = '<i class="fas fa-check me-2"></i> Semua Gambar Ditampilkan';
            this.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
            return;
        }
        
        // Loading animation
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memuat...';
        this.disabled = true;
        
        // Simulate loading more items
        setTimeout(() => {
            for (let i = currentItems + 1; i <= currentItems + 3 && i <= totalItems; i++) {
                const categories = ['food', 'facility', 'interior', 'event'];
                const category = categories[Math.floor(Math.random() * categories.length)];
                const titles = [
                    'Makanan Spesial JOSS GANDOS',
                    'Suasana Restoran yang Nyaman',
                    'Interior Modern & Elegan',
                    'Acara Spesial di JOSS GANDOS',
                    'Hidangan Favorit Pelanggan',
                    'Area Makan Keluarga'
                ];
                const title = titles[Math.floor(Math.random() * titles.length)];
                
                const foodImages = [
                    'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80',
                    'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                ];
                const facilityImages = [
                    'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                ];
                const interiorImages = [
                    'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                ];
                const eventImages = [
                    'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
                ];
                
                const imageUrls = {
                    'food': foodImages[Math.floor(Math.random() * foodImages.length)],
                    'facility': facilityImages[Math.floor(Math.random() * facilityImages.length)],
                    'interior': interiorImages[Math.floor(Math.random() * interiorImages.length)],
                    'event': eventImages[Math.floor(Math.random() * eventImages.length)]
                };
                const imageUrl = imageUrls[category];
                
                const item = document.createElement('div');
                item.className = 'col-lg-4 col-md-6 gallery-item';
                item.setAttribute('data-category', category);
                item.style.animation = 'fadeInUp 0.6s ease-out';
                item.innerHTML = `
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden; transition: all 0.3s ease; height: 100%;">
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img src="${imageUrl}?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=${i * 10}" 
                                 class="gallery-img w-100 h-100" alt="Gallery Image ${i}" 
                                 style="object-fit: cover; transition: transform 0.5s ease;">
                            <div class="position-absolute top-0 start-0 p-3">
                                <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border-radius: 10px;">
                                    <i class="fas fa-${category == 'food' ? 'utensils' : (category == 'facility' ? 'building' : (category == 'interior' ? 'couch' : 'calendar-alt'))} me-1"></i>
                                    ${category.charAt(0).toUpperCase() + category.slice(1)}
                                </span>
                            </div>
                            <div class="gallery-overlay position-absolute w-100 h-100 d-flex align-items-end justify-content-center" 
                                 style="background: linear-gradient(transparent, rgba(42, 42, 42, 0.9)); transform: translateY(100%); transition: transform 0.3s ease; padding: 20px;">
                                <div class="text-center">
                                    <h5 class="text-white mb-2">${title}</h5>
                                    <button class="btn btn-sm px-3 view-image" 
                                            style="background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3); border-radius: 20px;">
                                        <i class="fas fa-expand me-1"></i> Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title mb-2" style="color: #2a2a2a;">${title}</h5>
                            <p class="card-text text-muted mb-0" style="font-size: 0.9rem;">
                                <i class="fas fa-calendar-alt me-1" style="color: #d4a574;"></i>
                                ${new Date(Date.now() - Math.floor(Math.random() * 30) * 24 * 60 * 60 * 1000).toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })}
                            </p>
                        </div>
                    </div>
                `;
                
                document.getElementById('galleryGrid').appendChild(item);
                
                // Add event listener to new view buttons
                item.querySelector('.view-image').addEventListener('click', function() {
                    openLightbox(imageUrl, title);
                });
            }
            
            currentItems += 3;
            
            if (currentItems >= totalItems) {
                this.innerHTML = '<i class="fas fa-check me-2"></i> Semua Gambar Ditampilkan';
                this.style.background = 'linear-gradient(135deg, #2a9d8f, #21867a)';
            } else {
                this.innerHTML = originalText;
                this.disabled = false;
            }
        }, 1000);
    });
    
    // Lightbox functionality
    function openLightbox(imageUrl, title) {
        const lightbox = document.createElement('div');
        lightbox.className = 'lightbox-modal';
        lightbox.innerHTML = `
            <div class="lightbox-content">
                <button class="close-lightbox">&times;</button>
                <img src="${imageUrl}" class="lightbox-img" alt="${title}">
                <div class="text-center mt-3">
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
            const card = this.closest('.card');
            const imageUrl = card.querySelector('.gallery-img').src;
            const title = card.querySelector('.card-title').textContent;
            openLightbox(imageUrl, title);
        });
    });
    
    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .lightbox-modal {
            animation: fadeIn 0.3s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    `;
    document.head.appendChild(style);
</script>
@endsection