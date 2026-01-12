@extends('layouts.app')

@section('title', 'Galeri - JOSS GANDOS')

@section('styles')
<style>
    .gallery-filter {
        margin-bottom: 30px;
    }
    
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        margin-bottom: 30px;
    }
    
    .gallery-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .gallery-item:hover .gallery-img {
        transform: scale(1.05);
    }
    
    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0,0,0,0.8));
        color: white;
        padding: 20px;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay {
        transform: translateY(0);
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="height: 60vh; margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Galeri<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Lihat suasana, hidangan, dan momen spesial di JOSS GANDOS
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Content -->
    <section class="section-padding" data-animate>
        <div class="container">
            <!-- Gallery Filter -->
            <div class="gallery-filter text-center mb-5">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">Semua</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="food">Makanan</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="facility">Fasilitas</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="interior">Interior</button>
                    <button type="button" class="btn btn-outline-primary" data-filter="event">Acara</button>
                </div>
            </div>
            
            <!-- Gallery Grid -->
            <div class="row" id="galleryGrid">
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
                    @endphp
                    
                    <div class="col-lg-4 col-md-6 mb-4" data-category="{{ $category }}">
                        <div class="gallery-item">
                            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q={{ $i * 10 }}" 
                                 class="gallery-img" alt="Gallery Image {{ $i }}">
                            <div class="gallery-overlay">
                                <h5 class="mb-2">{{ $title }}</h5>
                                <span class="badge bg-primary">{{ ucfirst($category) }}</span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <!-- Load More Button -->
            <div class="text-center mt-5">
                <button class="btn btn-primary" id="loadMore">
                    <i class="fas fa-plus me-2"></i> Tampilkan Lebih Banyak
                </button>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Gallery filter functionality
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            document.querySelectorAll('[data-filter]').forEach(btn => {
                btn.classList.remove('active');
            });
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            const items = document.querySelectorAll('#galleryGrid > div');
            
            items.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
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
            return;
        }
        
        // Simulate loading more items
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
            
            const item = document.createElement('div');
            item.className = 'col-lg-4 col-md-6 mb-4';
            item.setAttribute('data-category', category);
            item.innerHTML = `
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=${i * 10}" 
                         class="gallery-img" alt="Gallery Image ${i}">
                    <div class="gallery-overlay">
                        <h5 class="mb-2">${title}</h5>
                        <span class="badge bg-primary">${category.charAt(0).toUpperCase() + category.slice(1)}</span>
                    </div>
                </div>
            `;
            
            document.getElementById('galleryGrid').appendChild(item);
        }
        
        currentItems += 3;
        
        if (currentItems >= totalItems) {
            this.disabled = true;
            this.innerHTML = '<i class="fas fa-check me-2"></i> Semua Gambar Ditampilkan';
        }
    });
</script>
@endsection