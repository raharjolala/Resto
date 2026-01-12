@extends('layouts.app')

@section('title', 'JOSS GANDOS RESTO & CAFE')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" data-animate>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Selamat Datang di<br>
                            <span>JOSS GANDOS RESTO & CAFE</span>
                        </h1>
                        <p class="hero-subtitle">
                            Nikmati Berbagai Sajian Kuliner Lezat dengan Suasana yang Nyaman dan Ramah di Joss Gandos.
                        </p>
                        <div class="mt-4">
                            <a href="/menu" class="btn btn-primary me-3">
                                <i class="fas fa-utensils me-2"></i> LIHAT MENU
                            </a>
                            <a href="/reservation" class="btn btn-outline-primary">
                                <i class="fas fa-calendar-check me-2"></i> RESERVASI MEJA
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section class="section-padding bg-light" data-animate>
        <div class="container">
            <div class="section-title">
                <h2>MENU FAVORIT KAMI</h2>
                <p>Cicipi Berbagai Hidangan Favorit Kami yang Menggugah Selera</p>
            </div>
            
            <div class="row">
                @forelse($featuredItems as $item)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="menu-card">
                            @if($item->is_featured)
                                <span class="featured-badge">FAVORIT</span>
                            @endif
                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 class="menu-img" alt="{{ $item->name }}">
                            <div class="menu-content">
                                <h4 class="menu-title">{{ $item->name }}</h4>
                                <p class="menu-description">{{ Str::limit($item->description, 80) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                    <a href="/menu" class="btn btn-sm btn-primary">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Demo content if no items in database -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="menu-card">
                            <span class="featured-badge">FAVORIT</span>
                            <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 class="menu-img" alt="Nasi Goreng Spesial">
                            <div class="menu-content">
                                <h4 class="menu-title">Nasi Goreng Spesial</h4>
                                <p class="menu-description">Nasi goreng dengan campuran daging ayam, udang, telur, dan sayuran segar</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp 25.000</span>
                                    <a href="/menu" class="btn btn-sm btn-primary">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="menu-card">
                            <span class="featured-badge">FAVORIT</span>
                            <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 class="menu-img" alt="Ayam Penyet">
                            <div class="menu-content">
                                <h4 class="menu-title">Ayam Penyet</h4>
                                <p class="menu-description">Ayam goreng krispi dengan sambal pedas khas dan lalapan segar</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp 25.000</span>
                                    <a href="/menu" class="btn btn-sm btn-primary">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="menu-card">
                            <span class="featured-badge">FAVORIT</span>
                            <img src="https://images.unsplash.com/photo-1594041680534-e8c8cdebd659?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 class="menu-img" alt="Sate Ayam">
                            <div class="menu-content">
                                <h4 class="menu-title">Sate Ayam</h4>
                                <p class="menu-description">Sate ayam dengan bumbu kacang khas dan lontong</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp 25.000</span>
                                    <a href="/menu" class="btn btn-sm btn-primary">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="menu-card">
                            <span class="featured-badge">FAVORIT</span>
                            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 class="menu-img" alt="Mie Goreng">
                            <div class="menu-content">
                                <h4 class="menu-title">Mie Goreng</h4>
                                <p class="menu-description">Mie goreng dengan tambahan seafood dan sayuran</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="menu-price">Rp 25.000</span>
                                    <a href="/menu" class="btn btn-sm btn-primary">
                                        Pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-5">
                <a href="/menu" class="btn btn-outline-primary px-5">
                    LIHAT MENU LENGKAP <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="section-padding promo-section" data-animate>
        <div class="container">
            <div class="section-title text-white">
                <h2>PROMO SPESIAL</h2>
                <p class="text-white-50">Nikmati berbagai penawaran menarik untuk pengalaman makan yang lebih spesial</p>
            </div>
            
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="promo-card">
                        <h3 class="text-primary mb-3">DISKON 20%</h3>
                        <h4 class="mb-3">Untuk Pembelian Minimal Rp 100.000</h4>
                        <p class="text-muted mb-4">
                            Setiap Hari Senin - Jumat<br>
                            Pukul 14:00 - 17:00
                        </p>
                        <a href="/menu" class="btn btn-primary">
                            <i class="fas fa-shopping-cart me-2"></i> PESAN SEKARANG
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="stat-box">
                                <div class="stat-icon text-warning">
                                    <i class="fas fa-star"></i>
                                </div>
                                <h3 class="stat-number">5.0</h3>
                                <p class="text-dark fw-semibold">Rating Pelanggan</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="stat-box">
                                <div class="stat-icon text-primary">
                                    <i class="fas fa-utensils"></i>
                                </div>
                                <h3 class="stat-number">50+</h3>
                                <p class="text-dark fw-semibold">Menu Lezat</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="stat-box">
                                <div class="stat-icon text-success">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h3 class="stat-number">1000+</h3>
                                <p class="text-dark fw-semibold">Pelanggan Puas</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="stat-box">
                                <div class="stat-icon text-danger">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h3 class="stat-number">8+</h3>
                                <p class="text-dark fw-semibold">Tahun Pengalaman</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section-padding" data-animate>
        <div class="container">
            <div class="section-title">
                <h2>TENTANG JOSS GANDOS</h2>
                <p>Lebih dari sekadar restoran, pengalaman kuliner yang tak terlupakan</p>
            </div>
            
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <div class="about-img">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid" alt="Joss Gandos Resto">
                    </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                    <h3 class="mb-4">Sajian Autentik dengan Cita Rasa Terbaik</h3>
                    <p class="mb-4">
                        JOSS GANDOS telah menjadi pilihan utama bagi pecinta kuliner Indonesia sejak 2015. 
                        Kami menghadirkan cita rasa autentik dengan bahan-bahan segar pilihan yang diolah oleh chef berpengalaman.
                    </p>
                    <p class="mb-4">
                        Dengan suasana yang nyaman dan pelayanan yang hangat, kami berkomitmen untuk memberikan 
                        pengalaman makan yang tak terlupakan bagi setiap pelanggan.
                    </p>
                    
                    <ul class="feature-list">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Bahan-bahan segar setiap hari</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Chef berpengalaman</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Pelayanan ramah dan profesional</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Harga terjangkau</span>
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            <span>Suasana nyaman dan bersih</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Branch Info -->
            <div class="row mt-5">
                @forelse($branches as $branch)
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $branch->name }}</h5>
                                <div class="contact-info mt-3">
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $branch->address }}</p>
                                    <p><i class="fas fa-phone"></i> {{ $branch->phone }}</p>
                                    <p><i class="fas fa-clock"></i> {{ $branch->opening_hours }}</p>
                                    @if($branch->email)
                                        <p><i class="fas fa-envelope"></i> {{ $branch->email }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Demo branch info -->
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">JOSS GANDOS - Jakarta Pusat</h5>
                                <div class="contact-info mt-3">
                                    <p><i class="fas fa-map-marker-alt"></i> JL Baye Kuliner No. 123, Jakarta, Indonesia</p>
                                    <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                                    <p><i class="fas fa-clock"></i> Senin - Minggu: 10:00 - 22:00</p>
                                    <p><i class="fas fa-envelope"></i> info@jossgandos.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">JOSS GANDOS - Bandung</h5>
                                <div class="contact-info mt-3">
                                    <p><i class="fas fa-map-marker-alt"></i> JL Braga No. 45, Bandung, Jawa Barat</p>
                                    <p><i class="fas fa-phone"></i> (022) 8765-4321</p>
                                    <p><i class="fas fa-clock"></i> Senin - Minggu: 10:00 - 22:00</p>
                                    <p><i class="fas fa-envelope"></i> bandung@jossgandos.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Gallery Preview -->
    <section class="section-padding bg-light" data-animate>
        <div class="container">
            <div class="section-title">
                <h2>GALERI KAMI</h2>
                <p>Lihat suasana dan hidangan di JOSS GANDOS</p>
            </div>
            
            <div class="row">
                @for($i = 1; $i <= 6; $i++)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="menu-card">
                            <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
                                 class="menu-img" alt="Gallery Image {{ $i }}">
                            <div class="menu-content">
                                <h5 class="menu-title">Suasana Restoran {{ $i }}</h5>
                                <p class="menu-description">Tampilan interior yang nyaman dan modern</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <div class="text-center mt-4">
                <a href="/gallery" class="btn btn-primary px-5">
                    <i class="fas fa-images me-2"></i> LIHAT GALERI LENGKAP
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section-padding" data-animate>
        <div class="container">
            <div class="section-title">
                <h2>TESTIMONI PELANGGAN</h2>
                <p>Apa kata mereka tentang pengalaman di JOSS GANDOS</p>
            </div>
            
            <div class="row">
                @forelse($reviews as $review)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="mb-3">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                                    @endfor
                                </div>
                                <p class="card-text fst-italic mb-4">"{{ Str::limit($review->review_text, 150) }}"</p>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">{{ $review->customer_name }}</h6>
                                        @if($review->branch_location)
                                            <small class="text-muted">{{ $review->branch_location }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- Demo testimonials -->
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <p class="card-text fst-italic mb-4">"Makanan sangat enak dan pelayanan ramah. Suasana restoran nyaman, cocok untuk keluarga."</p>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Budi Santoso</h6>
                                        <small class="text-muted">Jakarta</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <p class="card-text fst-italic mb-4">"Ayam penyetnya juara! Sambalnya pedas tapi enak. Tempatnya bersih dan pelayanan cepat."</p>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Sari Dewi</h6>
                                        <small class="text-muted">Bandung</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body">
                                <div class="mb-3">
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                    <i class="fas fa-star text-warning"></i>
                                </div>
                                <p class="card-text fst-italic mb-4">"Harga terjangkau dengan kualitas premium. Nasi goreng spesialnya wajib dicoba!"</p>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Rudi Hartono</h6>
                                        <small class="text-muted">Bekasi</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection