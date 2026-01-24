@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), 
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Galeri<br>
                            <span class="highlight">JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Jelajahi suasana, hidangan istimewa, dan momen berharga yang tercipta di JOSS GANDOS.
                            Setiap gambar bercerita tentang pengalaman kuliner yang autentik.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-images me-1"></i> 100+ Foto
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-camera me-1"></i> Update Terbaru
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-tag me-1"></i> 4 Kategori
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
                @php
                    $galleryItems = [
                        [
                            'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Nasi Goreng Spesial JOSS',
                            'category' => 'food',
                            'date' => '15 Jan 2024',
                            'desc' => 'Hidangan ikonik dengan cita rasa autentik Indonesia'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Interior Restoran',
                            'category' => 'interior',
                            'date' => '10 Jan 2024',
                            'desc' => 'Suasana hangat dengan sentuhan modern'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Acara Pernikahan',
                            'category' => 'events',
                            'date' => '5 Jan 2024',
                            'desc' => 'Momen spesial di JOSS GANDOS'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Rendang Sapi Padang',
                            'category' => 'food',
                            'date' => '20 Des 2023',
                            'desc' => 'Rendang dimasak 8 jam dengan rempah pilihan'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Area Makan VIP',
                            'category' => 'interior',
                            'date' => '15 Des 2023',
                            'desc' => 'Area eksklusif untuk acara spesial'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Catering Perusahaan',
                            'category' => 'events',
                            'date' => '10 Des 2023',
                            'desc' => 'Layanan catering untuk acara perusahaan'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Soto Betawi Premium',
                            'category' => 'food',
                            'date' => '5 Des 2023',
                            'desc' => 'Soto khas Jakarta dengan bahan premium'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1583394293214-28ded15ee548?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Chef in Action',
                            'category' => 'interior',
                            'date' => '30 Nov 2023',
                            'desc' => 'Tim chef kami sedang mempersiapkan hidangan'
                        ],
                        [
                            'image' => 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title' => 'Tahun Baru 2024',
                            'category' => 'events',
                            'date' => '1 Jan 2024',
                            'desc' => 'Perayaan tahun baru bersama pelanggan setia'
                        ]
                    ];
                @endphp
                
                @foreach($galleryItems as $index => $item)
                    <div class="col-lg-4 col-md-6 gallery-item animate-fade-in" 
                         data-category="{{ $item['category'] }}" 
                         style="animation-delay: {{ $index * 0.1 }}s;">
                        <div class="modern-card" style="border-radius: 20px; overflow: hidden; height: 100%;">
                            <!-- Image Container -->
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img src="{{ $item['image'] }}" 
                                     class="gallery-img w-100 h-100" 
                                     alt="{{ $item['title'] }}" 
                                     style="object-fit: cover; transition: transform 0.5s ease;">
                                
                                <!-- Category Badge -->
                                <div class="position-absolute top-0 start-0 p-3">
                                    <span class="badge px-3 py-2" 
                                          style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                 color: white; border-radius: 20px;">
                                        <i class="fas fa-{{ $item['category'] == 'food' ? 'utensils' : ($item['category'] == 'interior' ? 'store' : 'calendar-alt') }} me-1"></i>
                                        {{ ucfirst($item['category']) }}
                                    </span>
                                </div>
                                
                                <!-- Overlay -->
                                <div class="gallery-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center" 
                                     style="background: rgba(44, 44, 44, 0.7); opacity: 0; transition: opacity 0.3s ease; cursor: pointer;">
                                    <div class="text-center text-white p-3">
                                        <div class="mb-3">
                                            <i class="fas fa-expand-alt fa-2x"></i>
                                        </div>
                                        <h5 class="mb-2">{{ $item['title'] }}</h5>
                                        <small class="opacity-75">{{ $item['date'] }}</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-4">
                                <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">{{ $item['title'] }}</h5>
                                <p class="text-muted mb-3" style="font-size: 0.95rem; line-height: 1.6;">
                                    {{ $item['desc'] }}
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-1" style="color: var(--primary-red);"></i>
                                        {{ $item['date'] }}
                                    </small>
                                    <button class="btn btn-sm px-3 view-image" 
                                            style="background: var(--primary-red); color: white; border-radius: 20px;"
                                            data-image="{{ $item['image'] }}"
                                            data-title="{{ $item['title'] }}"
                                            data-category="{{ $item['category'] }}"
                                            data-date="{{ $item['date'] }}"
                                            data-desc="{{ $item['desc'] }}">
                                        <i class="fas fa-expand me-1"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Load More Button -->
            <div class="text-center mt-5 animate-fade-in" style="animation-delay: 0.5s;">
                <button class="btn btn-primary btn-lg px-5 py-3" id="loadMore">
                    <i class="fas fa-plus me-2"></i> Tampilkan Lebih Banyak
                </button>
            </div>
        </div>
    </section>
    
    <!-- Lightbox Modal -->
    <div class="lightbox-modal" id="lightboxModal">
        <div class="lightbox-content">
            <button class="close-lightbox" id="closeLightbox">&times;</button>
            <img id="lightboxImage" class="lightbox-img" alt="">
            <div class="lightbox-info text-white mt-4">
                <h4 id="lightboxTitle" class="fw-bold mb-2"></h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <small id="lightboxCategory" class="badge px-3 py-2"></small>
                    <small id="lightboxDate" class="opacity-75"></small>
                </div>
                <p id="lightboxDesc" class="mb-0 opacity-90"></p>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button class="btn btn-sm btn-outline-light" id="prevImage">
                        <i class="fas fa-chevron-left me-1"></i> Sebelumnya
                    </button>
                    <button class="btn btn-sm btn-outline-light" id="nextImage">
                        Selanjutnya <i class="fas fa-chevron-right ms-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    /* Gallery Item Styles */
    .gallery-img {
        transition: transform 0.5s ease;
    }
    
    .modern-card:hover .gallery-img {
        transform: scale(1.1);
    }
    
    .modern-card:hover .gallery-overlay {
        opacity: 1 !important;
    }
    
    /* Filter Buttons */
    .filter-btn {
        transition: all 0.3s ease;
        font-weight: 500;
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
        background: rgba(0, 0, 0, 0.95);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        animation: fadeIn 0.3s ease-out;
    }
    
    .lightbox-content {
        max-width: 90%;
        max-height: 90vh;
        position: relative;
        display: flex;
        flex-direction: column;
    }
    
    .lightbox-img {
        width: 100%;
        height: auto;
        max-height: 60vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
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
        z-index: 10000;
    }
    
    .close-lightbox:hover {
        opacity: 1;
    }
    
    .lightbox-info {
        margin-top: 20px;
        text-align: center;
    }
    
    .lightbox-info .badge {
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 20px;
    }
    
    /* Navigation Buttons */
    #prevImage, #nextImage {
        transition: all 0.3s ease;
    }
    
    #prevImage:hover, #nextImage:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }
    
    /* Loading Animation */
    .loading {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }
    
    .loading::after {
        content: '';
        width: 40px;
        height: 40px;
        border: 4px solid rgba(180, 34, 34, 0.1);
        border-top-color: var(--primary-red);
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .gallery-filter .btn {
            margin-bottom: 10px;
            width: 100%;
            max-width: 200px;
        }
        
        .lightbox-content {
            max-width: 95%;
        }
        
        .lightbox-img {
            max-height: 50vh;
        }
        
        #prevImage, #nextImage {
            font-size: 0.9rem;
            padding: 6px 12px;
        }
    }
    
    @media (max-width: 576px) {
        .gallery-item {
            animation-delay: 0s !important;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Gallery Filter Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        // Filter function
        function filterGallery(category) {
            galleryItems.forEach((item, index) => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'block';
                    item.style.animation = 'fadeInUp 0.5s ease';
                } else {
                    item.style.animation = 'fadeOut 0.3s ease';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
                btn.style.background = 'rgba(180, 34, 34, 0.1)';
                btn.style.color = 'var(--primary-red)';
                btn.style.border = '2px solid rgba(180, 34, 34, 0.2)';
            });
            
            const activeBtn = document.querySelector(`[data-filter="${category}"]`);
            if (activeBtn) {
                activeBtn.classList.add('active');
                activeBtn.style.background = 'linear-gradient(135deg, var(--primary-red), var(--secondary-gold))';
                activeBtn.style.color = 'white';
                activeBtn.style.border = 'none';
            }
        }
        
        // Add click event to filter buttons
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                filterGallery(filter);
            });
        });
        
        // Lightbox Functionality
        const lightboxModal = document.getElementById('lightboxModal');
        const lightboxImage = document.getElementById('lightboxImage');
        const lightboxTitle = document.getElementById('lightboxTitle');
        const lightboxCategory = document.getElementById('lightboxCategory');
        const lightboxDate = document.getElementById('lightboxDate');
        const lightboxDesc = document.getElementById('lightboxDesc');
        const closeLightbox = document.getElementById('closeLightbox');
        
        let currentImageIndex = 0;
        let currentImages = [];
        
        // Open lightbox
        function openLightbox(imageUrl, title, category, date, desc, index) {
            lightboxImage.src = imageUrl;
            lightboxTitle.textContent = title;
            
            // Set category with icon
            const icon = category === 'food' ? 'utensils' : (category === 'interior' ? 'store' : 'calendar-alt');
            lightboxCategory.innerHTML = `<i class="fas fa-${icon} me-1"></i>${category.charAt(0).toUpperCase() + category.slice(1)}`;
            
            lightboxDate.textContent = date;
            lightboxDesc.textContent = desc;
            
            currentImageIndex = index;
            currentImages = Array.from(galleryItems).filter(item => item.style.display !== 'none');
            
            lightboxModal.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }
        
        // Close lightbox
        function closeLightboxFunc() {
            lightboxModal.style.animation = 'fadeOut 0.3s ease-out';
            setTimeout(() => {
                lightboxModal.style.display = 'none';
                lightboxModal.style.animation = 'fadeIn 0.3s ease-out';
                document.body.style.overflow = 'auto';
            }, 300);
        }
        
        // Navigate to next image
        function nextImage() {
            if (currentImages.length > 0) {
                currentImageIndex = (currentImageIndex + 1) % currentImages.length;
                const item = currentImages[currentImageIndex];
                const image = item.querySelector('.gallery-img').src;
                const title = item.querySelector('h5').textContent;
                const category = item.getAttribute('data-category');
                const date = item.querySelector('small.text-muted').textContent;
                const desc = item.querySelector('p.text-muted').textContent;
                
                openLightbox(image, title, category, date, desc, currentImageIndex);
            }
        }
        
        // Navigate to previous image
        function prevImage() {
            if (currentImages.length > 0) {
                currentImageIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
                const item = currentImages[currentImageIndex];
                const image = item.querySelector('.gallery-img').src;
                const title = item.querySelector('h5').textContent;
                const category = item.getAttribute('data-category');
                const date = item.querySelector('small.text-muted').textContent;
                const desc = item.querySelector('p.text-muted').textContent;
                
                openLightbox(image, title, category, date, desc, currentImageIndex);
            }
        }
        
        // Add click event to view buttons
        document.querySelectorAll('.view-image').forEach((button, index) => {
            button.addEventListener('click', function() {
                const image = this.getAttribute('data-image');
                const title = this.getAttribute('data-title');
                const category = this.getAttribute('data-category');
                const date = this.getAttribute('data-date');
                const desc = this.getAttribute('data-desc');
                
                openLightbox(image, title, category, date, desc, index);
            });
        });
        
        // Add click event to gallery items (click on image)
        galleryItems.forEach((item, index) => {
            const imageContainer = item.querySelector('.gallery-overlay');
            imageContainer.addEventListener('click', function() {
                const image = item.querySelector('.gallery-img').src;
                const title = item.querySelector('h5').textContent;
                const category = item.getAttribute('data-category');
                const date = item.querySelector('small.text-muted').textContent;
                const desc = item.querySelector('p.text-muted').textContent;
                
                openLightbox(image, title, category, date, desc, index);
            });
        });
        
        // Close lightbox on X click
        closeLightbox.addEventListener('click', closeLightboxFunc);
        
        // Close lightbox on background click
        lightboxModal.addEventListener('click', function(e) {
            if (e.target === lightboxModal) {
                closeLightboxFunc();
            }
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (lightboxModal.style.display === 'flex') {
                if (e.key === 'Escape') {
                    closeLightboxFunc();
                } else if (e.key === 'ArrowRight') {
                    nextImage();
                } else if (e.key === 'ArrowLeft') {
                    prevImage();
                }
            }
        });
        
        // Navigation buttons
        document.getElementById('nextImage').addEventListener('click', nextImage);
        document.getElementById('prevImage').addEventListener('click', prevImage);
        
        // Load More Functionality
        let currentItems = 9;
        const loadMoreBtn = document.getElementById('loadMore');
        
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Memuat...';
                this.disabled = true;
                
                // Simulate loading more items
                setTimeout(() => {
                    // Add more gallery items (in real app, this would be an API call)
                    const additionalItems = [
                        {
                            'image': 'https://images.unsplash.com/photo-1565299507177-b0ac66763828?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title': 'Sate Ayam Madura',
                            'category': 'food',
                            'date': '25 Nov 2023',
                            'desc': 'Sate ayam dengan bumbu kacang khas Madura'
                        },
                        {
                            'image': 'https://images.unsplash.com/photo-1578474846511-04ba529f0b88?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title': 'Bar Area',
                            'category': 'interior',
                            'date': '20 Nov 2023',
                            'desc': 'Area bar dengan minuman khas Indonesia'
                        },
                        {
                            'image': 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                            'title': 'Ulang Tahun Korporat',
                            'category': 'events',
                            'date': '15 Nov 2023',
                            'desc': 'Perayaan ulang tahun perusahaan'
                        }
                    ];
                    
                    additionalItems.forEach((item, index) => {
                        const newIndex = currentItems + index;
                        const galleryItem = document.createElement('div');
                        galleryItem.className = 'col-lg-4 col-md-6 gallery-item animate-fade-in';
                        galleryItem.setAttribute('data-category', item.category);
                        
                        galleryItem.innerHTML = `
                            <div class="modern-card" style="border-radius: 20px; overflow: hidden; height: 100%;">
                                <div class="position-relative overflow-hidden" style="height: 250px;">
                                    <img src="${item.image}" 
                                         class="gallery-img w-100 h-100" 
                                         alt="${item.title}" 
                                         style="object-fit: cover; transition: transform 0.5s ease;">
                                    
                                    <div class="position-absolute top-0 start-0 p-3">
                                        <span class="badge px-3 py-2" 
                                              style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                     color: white; border-radius: 20px;">
                                            <i class="fas fa-${item.category === 'food' ? 'utensils' : (item.category === 'interior' ? 'store' : 'calendar-alt')} me-1"></i>
                                            ${item.category.charAt(0).toUpperCase() + item.category.slice(1)}
                                        </span>
                                    </div>
                                    
                                    <div class="gallery-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center" 
                                         style="background: rgba(44, 44, 44, 0.7); opacity: 0; transition: opacity 0.3s ease; cursor: pointer;">
                                        <div class="text-center text-white p-3">
                                            <div class="mb-3">
                                                <i class="fas fa-expand-alt fa-2x"></i>
                                            </div>
                                            <h5 class="mb-2">${item.title}</h5>
                                            <small class="opacity-75">${item.date}</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4">
                                    <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">${item.title}</h5>
                                    <p class="text-muted mb-3" style="font-size: 0.95rem; line-height: 1.6;">
                                        ${item.desc}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar-alt me-1" style="color: var(--primary-red);"></i>
                                            ${item.date}
                                        </small>
                                        <button class="btn btn-sm px-3 view-image" 
                                                style="background: var(--primary-red); color: white; border-radius: 20px;"
                                                data-image="${item.image}"
                                                data-title="${item.title}"
                                                data-category="${item.category}"
                                                data-date="${item.date}"
                                                data-desc="${item.desc}">
                                            <i class="fas fa-expand me-1"></i> Lihat
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        
                        document.getElementById('galleryGrid').appendChild(galleryItem);
                        
                        // Add event listeners to new items
                        const viewBtn = galleryItem.querySelector('.view-image');
                        viewBtn.addEventListener('click', function() {
                            openLightbox(
                                this.getAttribute('data-image'),
                                this.getAttribute('data-title'),
                                this.getAttribute('data-category'),
                                this.getAttribute('data-date'),
                                this.getAttribute('data-desc'),
                                newIndex
                            );
                        });
                        
                        // Add click event to image overlay
                        const overlay = galleryItem.querySelector('.gallery-overlay');
                        overlay.addEventListener('click', function() {
                            openLightbox(item.image, item.title, item.category, item.date, item.desc, newIndex);
                        });
                    });
                    
                    currentItems += 3;
                    
                    // Update button text if we have enough items
                    if (currentItems >= 12) {
                        this.innerHTML = '<i class="fas fa-check me-2"></i> Semua Gambar Ditampilkan';
                        this.disabled = true;
                        this.style.background = '#2a9d8f';
                    } else {
                        this.innerHTML = originalText;
                        this.disabled = false;
                    }
                }, 1000);
            });
        }
        
        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
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
        `;
        document.head.appendChild(style);
    });
</script>
@endsection