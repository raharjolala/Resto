@extends('layouts.app')

@section('title', 'Menu - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="height: 60vh; margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Menu<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Jelajahi berbagai pilihan hidangan lezat yang kami sajikan dengan penuh cinta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Categories -->
    <section class="section-padding" data-animate>
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Semua Menu</h2>
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="categoryFilter" data-bs-toggle="dropdown">
                                Filter Kategori
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-category="all">Semua Kategori</a></li>
                                @foreach($categories as $category)
                                    <li><a class="dropdown-item" href="#" data-category="{{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            @foreach($categories as $category)
                <div class="menu-category mb-5" data-category="{{ $category->id }}">
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary p-3 rounded me-3">
                            <i class="fas fa-utensils text-white fa-2x"></i>
                        </div>
                        <div>
                            <h3 class="mb-0">{{ $category->name }}</h3>
                            @if($category->description)
                                <p class="text-muted mb-0">{{ $category->description }}</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        @foreach($category->menuItems->where('is_available', true) as $item)
                            <div class="col-lg-6 mb-4">
                                <div class="menu-card">
                                    <div class="d-flex">
                                        @if($item->image)
                                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" 
                                                 class="menu-img" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $item->name }}">
                                        @endif
                                        <div class="menu-content flex-grow-1">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h4 class="menu-title mb-1">{{ $item->name }}</h4>
                                                <span class="menu-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="menu-description">{{ $item->description }}</p>
                                            <div class="mt-3">
                                                @if($item->is_featured)
                                                    <span class="badge bg-warning me-2">FAVORIT</span>
                                                @endif
                                                <button class="btn btn-sm btn-primary">
                                                    <i class="fas fa-shopping-cart me-1"></i> Pesan
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
                <div class="text-center">
                    <div class="mb-4">
                        <i class="fas fa-utensils fa-4x text-muted"></i>
                    </div>
                    <h4 class="mb-3">Belum ada menu tersedia</h4>
                    <p class="text-muted mb-4">Kami sedang mempersiapkan menu terbaik untuk Anda</p>
                    <a href="/" class="btn btn-primary">
                        <i class="fas fa-home me-2"></i> Kembali ke Home
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Category filter functionality
    document.querySelectorAll('[data-category]').forEach(category => {
        category.style.display = 'block';
    });
    
    document.querySelectorAll('.dropdown-item[data-category]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryId = this.getAttribute('data-category');
            
            // Update dropdown button text
            document.querySelector('#categoryFilter').textContent = this.textContent;
            
            // Show/hide categories
            document.querySelectorAll('.menu-category').forEach(category => {
                if (categoryId === 'all' || category.getAttribute('data-category') === categoryId) {
                    category.style.display = 'block';
                } else {
                    category.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection