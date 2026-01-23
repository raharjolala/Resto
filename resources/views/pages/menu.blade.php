@extends('layouts.app')

@section('title', 'Menu Digital - Restoran Nusantara')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Menu Digital<br>
                            <span>Restoran Nusantara</span>
                        </h1>
                        <p class="hero-subtitle">
                            Jelajahi kelezatan kuliner Indonesia melalui pengalaman membaca buku digital. 
                            Balik halaman untuk menemukan cita rasa autentik nusantara.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-book-open me-1"></i> Buku Digital
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(212, 175, 55, 0.2); color: #D4AF37; border-radius: 20px;">
                                <i class="fas fa-utensils me-1"></i> Menu Tradisional
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(141, 110, 99, 0.2); color: #8D6E63; border-radius: 20px;">
                                <i class="fas fa-star me-1"></i> Cita Rasa Autentik
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="hero-image">
                        <i class="fas fa-book-open" style="font-size: 8rem; color: rgba(255,255,255,0.2);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Book Controls -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="modern-card animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                                <div>
                                    <h3 class="mb-1" style="color: #5D4037;">
                                        <i class="fas fa-book me-2" style="color: #D4AF37;"></i> Menu Digital Restoran Nusantara
                                    </h3>
                                    <p class="mb-0 text-muted">Klik area samping halaman atau gunakan tombol untuk membalik halaman</p>
                                </div>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-outline-primary" id="prevPage">
                                        <i class="fas fa-chevron-left me-2"></i> Sebelumnya
                                    </button>
                                    <span class="px-3 py-2 d-flex align-items-center" style="background: rgba(141, 110, 99, 0.1); border-radius: 8px; min-width: 90px; justify-content: center;">
                                        <span id="currentPage">1</span> / <span id="totalPages">5</span>
                                    </span>
                                    <button class="btn btn-outline-primary" id="nextPage">
                                        Selanjutnya <i class="fas fa-chevron-right ms-2"></i>
                                    </button>
                                    <button class="btn btn-primary" id="toggleView">
                                        <i class="fas fa-expand me-2"></i> Layar Penuh
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Flipbook Container -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-xl-11 col-lg-12">
                    <div id="flipbook-container" class="position-relative">
                        <!-- Book Shadow Effect -->
                        <div class="book-shadow"></div>
                        
                        <!-- Flipbook -->
                        <div id="flipbook" class="flipbook">
                            <!-- Cover Page -->
                            <div class="page page-cover page-left">
                                <div class="page-content" style="background: linear-gradient(135deg, #5D4037 0%, #8D6E63 100%);">
                                    <div class="page-inner h-100 d-flex flex-column justify-content-center align-items-center text-white text-center p-5">
                                        <div class="mb-4" style="border: 3px solid rgba(255,255,255,0.2); padding: 2.5rem; border-radius: 20px; background: rgba(0,0,0,0.2);">
                                            <h1 class="display-3 fw-bold mb-3" style="font-family: 'Brush Script MT', cursive;">Restoran Nusantara</h1>
                                            <div class="separator" style="height: 4px; width: 150px; background: #D4AF37; margin: 1.5rem auto;"></div>
                                            <h2 class="h1 fw-light">Menu Digital</h2>
                                        </div>
                                        <p class="lead mb-4" style="max-width: 500px; opacity: 0.9;">
                                            Cita Rasa Autentik Indonesia
                                        </p>
                                        <div class="mt-4">
                                            <button class="btn btn-lg btn-outline-light px-4" id="startReading">
                                                Buka Menu <i class="fas fa-arrow-right ms-2"></i>
                                            </button>
                                        </div>
                                        <div class="position-absolute bottom-0 start-0 w-100 p-4" style="opacity: 0.7;">
                                            <small><i class="fas fa-hand-point-up me-2"></i> Klik atau geser halaman untuk mulai</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Inside Cover -->
                            <div class="page page-left">
                                <div class="page-content">
                                    <div class="page-inner h-100 d-flex flex-column p-4 p-md-5" style="background: rgba(248, 243, 233, 0.95);">
                                        <div class="text-center mb-5">
                                            <h2 class="fw-bold mb-3" style="color: #5D4037; border-bottom: 3px solid #5D4037; display: inline-block; padding-bottom: 0.5rem;">
                                                Selamat Datang
                                            </h2>
                                            <p class="text-muted">Di Restoran Nusantara</p>
                                        </div>
                                        
                                        <div class="row align-items-center h-100">
                                            <div class="col-md-6">
                                                <div class="mb-4 p-4" style="background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                                                    <h3 class="fw-bold mb-3" style="color: #5D4037;">
                                                        <i class="fas fa-utensils me-2" style="color: #D4AF37;"></i>
                                                        Kuliner Nusantara
                                                    </h3>
                                                    <p style="color: #666; line-height: 1.8; text-align: justify;">
                                                        Restoran Nusantara menghadirkan kelezatan autentik masakan Indonesia 
                                                        dengan resep turun-temurun. Setiap hidangan dibuat dengan bahan pilihan 
                                                        dan rempah-rempah segar untuk memberikan pengalaman kuliner yang tak terlupakan.
                                                    </p>
                                                </div>
                                                
                                                <div class="mb-4 p-4" style="background: white; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                                                    <h4 class="fw-bold mb-3" style="color: #5D4037;">
                                                        <i class="fas fa-info-circle me-2" style="color: #D4AF37;"></i>
                                                        Cara Membaca Menu
                                                    </h4>
                                                    <ul class="list-unstyled" style="color: #666;">
                                                        <li class="mb-2"><i class="fas fa-hand-point-right me-2" style="color: #D4AF37;"></i> Klik area samping untuk membalik halaman</li>
                                                        <li class="mb-2"><i class="fas fa-mouse-pointer me-2" style="color: #D4AF37;"></i> Gunakan tombol navigasi di atas buku</li>
                                                        <li class="mb-2"><i class="fas fa-expand me-2" style="color: #D4AF37;"></i> Mode layar penuh untuk pengalaman terbaik</li>
                                                        <li><i class="fas fa-keyboard me-2" style="color: #D4AF37;"></i> Gunakan tombol panah keyboard</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative">
                                                    <div class="batik-border" style="overflow: hidden; border-radius: 10px; box-shadow: 0 15px 35px rgba(0,0,0,0.1);">
                                                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                                             class="img-fluid" alt="Makanan Indonesia">
                                                    </div>
                                                    <div class="position-absolute bottom-0 end-0 m-3">
                                                        <span class="badge px-3 py-2" style="background: #D4AF37; color: #5D4037;">
                                                            <i class="fas fa-heart me-1"></i> Favorit
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-auto pt-4 text-center">
                                            <p class="mb-0 fst-italic" style="color: #8D6E63; background: white; padding: 1rem; border-radius: 10px;">
                                                "Setiap hidangan adalah karya seni, setiap rempah adalah cerita"
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Page 1: Main Courses -->
                            <div class="page page-right">
                                <div class="page-content">
                                    <div class="page-inner h-100 d-flex flex-column p-4 p-md-5" style="background: rgba(248, 243, 233, 0.95);">
                                        <div class="page-header mb-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="page-number me-3" style="background: #5D4037; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                    1
                                                </div>
                                                <div>
                                                    <h2 class="fw-bold mb-0" style="color: #5D4037;">
                                                        <i class="fas fa-utensils me-2" style="color: #D4AF37;"></i>
                                                        Makanan Utama
                                                    </h2>
                                                    <p class="mb-0 text-muted">Hidangan utama dengan cita rasa khas Indonesia</p>
                                                </div>
                                            </div>
                                            <div class="separator" style="height: 3px; background: linear-gradient(to right, #5D4037, #D4AF37); width: 100%;"></div>
                                        </div>
                                        
                                        <div class="menu-items">
                                            <!-- Item 1 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.1s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden; position: relative;">
                                                            <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Nasi Goreng Spesial">
                                                            <div class="position-absolute top-0 start-0 m-2">
                                                                <span class="badge px-2 py-1" style="background: #5D4037; color: white; font-size: 0.7rem;">
                                                                    <i class="fas fa-crown me-1"></i> Spesial
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Nasi Goreng Spesial</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 45.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Nasi goreng dengan ayam suwir, udang, telur, sosis, dan sayuran segar. Disajikan dengan kerupuk, acar, dan sambal spesial.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-pepper-hot me-1"></i> Sedang
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-star me-1"></i> Best Seller
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Nasi Goreng Spesial" 
                                                                    data-price="45000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Item 2 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.2s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Rendang Sapi Padang">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Rendang Sapi Padang</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 55.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Daging sapi dimasak perlahan dengan 13 rempah khas Padang hingga empuk dan meresap. Disajikan dengan nasi putih hangat.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-pepper-hot me-1"></i> Pedas
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-award me-1"></i> Signature
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Rendang Sapi Padang" 
                                                                    data-price="55000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Item 3 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.3s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Sate Ayam Madura">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Sate Ayam Madura</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 35.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Sate ayam dengan bumbu kacang khas Madura, disajikan dengan lontong, acar, dan bawang merah. Rasa manis gurih yang khas.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-pepper-hot me-1"></i> Ringan
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-fire me-1"></i> Popular
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Sate Ayam Madura" 
                                                                    data-price="35000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-auto pt-4">
                                            <div class="page-footer p-3" style="border-top: 2px dashed rgba(93, 64, 55, 0.2); background: white; border-radius: 10px;">
                                                <p class="mb-0 text-center" style="color: #666; font-size: 0.9rem;">
                                                    <i class="fas fa-lightbulb me-1" style="color: #D4AF37;"></i>
                                                    <strong>Tips:</strong> Semua makanan utama disajikan dengan nasi putih dan lalapan segar
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Page 2: Drinks -->
                            <div class="page page-left">
                                <div class="page-content">
                                    <div class="page-inner h-100 d-flex flex-column p-4 p-md-5" style="background: rgba(248, 243, 233, 0.95);">
                                        <div class="page-header mb-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="page-number me-3" style="background: #5D4037; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                    2
                                                </div>
                                                <div>
                                                    <h2 class="fw-bold mb-0" style="color: #5D4037;">
                                                        <i class="fas fa-glass-whiskey me-2" style="color: #D4AF37;"></i>
                                                        Minuman
                                                    </h2>
                                                    <p class="mb-0 text-muted">Minuman tradisional untuk menemani santap Anda</p>
                                                </div>
                                            </div>
                                            <div class="separator" style="height: 3px; background: linear-gradient(to right, #5D4037, #D4AF37); width: 100%;"></div>
                                        </div>
                                        
                                        <div class="menu-items">
                                            <!-- Item 1 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.1s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Es Teh Manis">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Es Teh Manis</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 12.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Teh hitam diseduh dengan gula aren asli, disajikan dengan es batu. Tersedia pilihan kurang manis.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-leaf me-1"></i> Alami
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-snowflake me-1"></i> Dingin
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Es Teh Manis" 
                                                                    data-price="12000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Item 2 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.2s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Wedang Jahe">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Wedang Jahe</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 15.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Minuman jahe hangat dengan madu asli dan potongan jahe segar. Cocok untuk menghangatkan tubuh dan meningkatkan stamina.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-leaf me-1"></i> Herbal
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-fire me-1"></i> Hangat
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Wedang Jahe" 
                                                                    data-price="15000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Item 3 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.3s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Es Kelapa Muda">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Es Kelapa Muda</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 20.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Kelapa muda asli dengan es serut dan sirup gula merah. Disajikan dengan daging kelapa muda yang lembut dan segar.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-leaf me-1"></i> Alami
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-seedling me-1"></i> Fresh
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Es Kelapa Muda" 
                                                                    data-price="20000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-auto pt-4">
                                            <div class="page-footer p-3" style="border-top: 2px dashed rgba(93, 64, 55, 0.2); background: white; border-radius: 10px;">
                                                <div class="alert alert-light mb-0" style="background: rgba(93, 64, 55, 0.05); border: none;">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-info-circle me-3" style="color: #5D4037; font-size: 1.2rem;"></i>
                                                        <div>
                                                            <p class="mb-0" style="color: #666;">
                                                                <strong>Catatan:</strong> Semua minuman tersedia dalam ukuran regular (500ml). 
                                                                Tersedia juga pilihan <strong>Large (750ml)</strong> dengan tambahan Rp 5.000.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Page 3: Desserts -->
                            <div class="page page-right">
                                <div class="page-content">
                                    <div class="page-inner h-100 d-flex flex-column p-4 p-md-5" style="background: rgba(248, 243, 233, 0.95);">
                                        <div class="page-header mb-4">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="page-number me-3" style="background: #5D4037; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                    3
                                                </div>
                                                <div>
                                                    <h2 class="fw-bold mb-0" style="color: #5D4037;">
                                                        <i class="fas fa-ice-cream me-2" style="color: #D4AF37;"></i>
                                                        Pencuci Mulut
                                                    </h2>
                                                    <p class="mb-0 text-muted">Akhiri santap Anda dengan hidangan penutup yang manis</p>
                                                </div>
                                            </div>
                                            <div class="separator" style="height: 3px; background: linear-gradient(to right, #5D4037, #D4AF37); width: 100%;"></div>
                                        </div>
                                        
                                        <div class="menu-items">
                                            <!-- Item 1 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.1s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Es Campur Spesial">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Es Campur Spesial</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 22.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Campuran buah segar, cincau, kolang-kaling, nata de coco, dan kelapa muda dengan sirup gula merah spesial.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-leaf me-1"></i> Buah
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-snowflake me-1"></i> Dingin
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Es Campur Spesial" 
                                                                    data-price="22000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Item 2 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.2s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Pisang Goreng">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Pisang Goreng</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 15.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Pisang raja goreng dengan balutan tepung yang renyah, disajikan hangat dengan taburan keju parut dan susu kental manis.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-leaf me-1"></i> Buah
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-fire me-1"></i> Hangat
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Pisang Goreng" 
                                                                    data-price="15000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Item 3 -->
                                            <div class="menu-item animate-fade-in-up" style="animation-delay: 0.3s">
                                                <div class="d-flex align-items-start h-100">
                                                    <div class="flex-shrink-0 me-4">
                                                        <div class="image-container" style="width: 120px; height: 120px; border-radius: 10px; overflow: hidden;">
                                                            <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" 
                                                                 class="img-zoom w-100 h-100" style="object-fit: cover;" alt="Klepon">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                                            <h4 class="mb-0 fw-bold" style="color: #5D4037;">Klepon</h4>
                                                            <span class="fw-bold" style="color: #5D4037; font-size: 1.2rem;">Rp 12.000</span>
                                                        </div>
                                                        <p class="mb-3" style="color: #666;">Bola-bola ketan hijau berisi gula Jawa cair, dibalur kelapa parut. Disajikan hangat, lumer dimulut saat digigit.</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex gap-2">
                                                                <span class="badge" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;">
                                                                    <i class="fas fa-leaf me-1"></i> Tradisional
                                                                </span>
                                                                <span class="badge" style="background: rgba(212, 175, 55, 0.1); color: #D4AF37;">
                                                                    <i class="fas fa-heart me-1"></i> Favorit
                                                                </span>
                                                            </div>
                                                            <button class="btn btn-sm px-3 add-to-cart-book" 
                                                                    style="background: #5D4037; color: white; border-radius: 8px;"
                                                                    data-name="Klepon" 
                                                                    data-price="12000">
                                                                <i class="fas fa-plus me-1"></i> Pesan
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-auto pt-4">
                                            <div class="page-footer p-3" style="border-top: 2px dashed rgba(93, 64, 55, 0.2); background: white; border-radius: 10px;">
                                                <p class="mb-0 text-center" style="color: #666;">
                                                    <i class="fas fa-gift me-2" style="color: #D4AF37;"></i>
                                                    <strong>Promo:</strong> Dapatkan diskon 15% untuk pembelian 3 jenis pencuci mulut!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Back Cover -->
                            <div class="page page-cover page-right">
                                <div class="page-content" style="background: linear-gradient(135deg, #F8F3E9 0%, #E9DCC9 100%);">
                                    <div class="page-inner h-100 d-flex flex-column justify-content-center align-items-center p-5">
                                        <div class="text-center mb-5" style="max-width: 600px;">
                                            <h2 class="fw-bold mb-4" style="color: #5D4037;">
                                                Terima Kasih
                                            </h2>
                                            <p class="lead mb-4" style="color: #8D6E63;">
                                                Terima kasih telah menjelajahi menu Restoran Nusantara. 
                                                Kami berharap Anda menemukan hidangan yang sesuai dengan selera.
                                            </p>
                                            
                                            <div class="row mt-5">
                                                <div class="col-md-6 mb-4">
                                                    <div class="p-4" style="background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                                                        <i class="fas fa-phone-alt mb-3" style="color: #D4AF37; font-size: 2rem;"></i>
                                                        <h5 class="fw-bold mb-2">Pesan Sekarang</h5>
                                                        <p class="mb-0" style="color: #666;">(021) 1234-5678</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="p-4" style="background: white; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                                                        <i class="fas fa-map-marker-alt mb-3" style="color: #D4AF37; font-size: 2rem;"></i>
                                                        <h5 class="fw-bold mb-2">Lokasi Kami</h5>
                                                        <p class="mb-0" style="color: #666;">Jl. Nusantara No. 123, Jakarta</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-5">
                                                <button class="btn btn-lg px-5" style="background: #5D4037; color: white;" id="viewOrder">
                                                    <i class="fas fa-shopping-cart me-2"></i> Lihat Pesanan
                                                </button>
                                            </div>
                                            
                                            <div class="mt-4">
                                                <button class="btn btn-outline-primary px-4" onclick="location.reload()">
                                                    <i class="fas fa-redo me-2"></i> Baca Ulang Menu
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    :root {
        --dark-brown: #5D4037;
        --light-brown: #8D6E63;
        --cream: #F5E9D9;
        --gold: #D4AF37;
        --paper: #F8F3E9;
    }
    
    body {
        font-family: 'Georgia', 'Times New Roman', serif;
        background-color: var(--cream);
        color: var(--dark-brown);
        overflow-x: hidden;
        background-image: url('https://static.vecteezy.com/system/resources/thumbnails/004/483/945/small_2x/stock-background-pattern-floral-batik-free-vector.jpg');
        background-size: 300px;
        background-attachment: fixed;
        background-blend-mode: overlay;
        background-color: rgba(245, 233, 217, 0.9);
    }
    
    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(93, 64, 55, 0.9), rgba(141, 110, 99, 0.9)), url('https://static.vecteezy.com/system/resources/thumbnails/004/483/945/small_2x/stock-background-pattern-floral-batik-free-vector.jpg');
        background-size: cover;
        background-position: center;
        padding: 100px 0 80px;
        color: white;
        border-bottom: 5px solid var(--gold);
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .hero-title span {
        color: var(--gold);
        font-family: 'Brush Script MT', cursive;
        font-size: 4rem;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        max-width: 600px;
    }
    
    .hero-image {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    .section-padding {
        padding: 60px 0;
    }
    
    .modern-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        border: none;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Flipbook Container */
    #flipbook-container {
        min-height: 750px;
        margin-bottom: 3rem;
        position: relative;
    }
    
    .book-shadow {
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: -25px;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.2));
        border-radius: 5px;
        z-index: 0;
        transform: skewY(1deg);
        filter: blur(8px);
    }
    
    /* Flipbook Styling */
    .flipbook {
        position: relative;
        width: 100%;
        height: 750px;
        z-index: 1;
        perspective: 2000px;
        transform-style: preserve-3d;
    }
    
    .page {
        position: absolute;
        width: 50%;
        height: 100%;
        background: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transform-origin: left center;
        transform-style: preserve-3d;
        transition: transform 1s cubic-bezier(0.42, 0, 0.58, 1);
        border-radius: 0 3px 3px 0;
        cursor: pointer;
        backface-visibility: hidden;
    }
    
    .page-left {
        left: 0;
        transform-origin: right center;
        border-radius: 3px 0 0 3px;
    }
    
    .page-right {
        left: 50%;
        transform-origin: left center;
    }
    
    .page-cover {
        z-index: 10;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
    }
    
    .page-content {
        width: 100%;
        height: 100%;
        position: relative;
        background: white;
    }
    
    .page-inner {
        position: relative;
        overflow-y: auto;
        height: 100%;
    }
    
    /* Page Content */
    .page-header {
        position: relative;
        margin-bottom: 2rem;
    }
    
    .page-number {
        font-size: 1.2rem;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    
    .menu-item {
        padding: 1.5rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid transparent;
        background-color: white;
        margin-bottom: 1.5rem;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .menu-item:hover {
        background: #fffaf5;
        border-color: rgba(93, 64, 55, 0.2);
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .image-container {
        position: relative;
        transition: transform 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        border: 3px solid white;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .img-zoom {
        transition: transform 0.5s ease;
    }
    
    .img-zoom:hover {
        transform: scale(1.1);
    }
    
    /* Page Turning Effect */
    .page.turning {
        z-index: 20;
        box-shadow: -10px 5px 40px rgba(0, 0, 0, 0.3);
    }
    
    .page.turning-left {
        transform: rotateY(-180deg) translateX(-1px);
    }
    
    .page.turning-right {
        transform: rotateY(180deg) translateX(1px);
    }
    
    /* Book Spine */
    .page::after {
        content: '';
        position: absolute;
        top: 0;
        width: 15px;
        height: 100%;
        background: linear-gradient(to right, 
            rgba(93, 64, 55, 0.8) 0%, 
            rgba(141, 110, 99, 0.9) 50%, 
            rgba(212, 175, 55, 0.7) 100%);
        z-index: 2;
    }
    
    .page-left::after {
        right: 0;
        background: linear-gradient(to left, 
            rgba(93, 64, 55, 0.8) 0%, 
            rgba(141, 110, 99, 0.9) 50%, 
            rgba(212, 175, 55, 0.7) 100%);
    }
    
    .page-right::after {
        left: 0;
    }
    
    /* Navigation Controls */
    .flipbook-controls {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        transform: translateY(-50%);
        z-index: 30;
        pointer-events: none;
    }
    
    .flip-area {
        position: absolute;
        width: 100px;
        height: 100%;
        z-index: 25;
        cursor: pointer;
        pointer-events: all;
        transition: background 0.3s;
    }
    
    .flip-prev {
        left: 0;
    }
    
    .flip-next {
        right: 0;
    }
    
    .flip-area:hover {
        background: rgba(93, 64, 55, 0.05);
    }
    
    .flip-area:hover::before {
        content: '';
        position: absolute;
        top: 50%;
        width: 50px;
        height: 50px;
        background: var(--gold);
        color: var(--dark-brown);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        font-weight: bold;
        transform: translateY(-50%);
        box-shadow: 0 5px 20px rgba(93, 64, 55, 0.3);
    }
    
    .flip-prev:hover::before {
        left: 25px;
        content: '‹';
    }
    
    .flip-next:hover::before {
        right: 25px;
        content: '›';
    }
    
    /* Fullscreen Mode */
    .fullscreen #flipbook-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        background: white;
        padding: 2rem;
        margin: 0;
    }
    
    .fullscreen .book-shadow {
        display: none;
    }
    
    .fullscreen .flipbook {
        height: calc(100vh - 4rem);
    }
    
    /* Button Styles */
    .btn-primary {
        background-color: #5D4037;
        border-color: #5D4037;
    }
    
    .btn-primary:hover {
        background-color: #4a3129;
        border-color: #4a3129;
    }
    
    .btn-outline-primary {
        color: #5D4037;
        border-color: #5D4037;
    }
    
    .btn-outline-primary:hover {
        background-color: #5D4037;
        border-color: #5D4037;
        color: white;
    }
    
    /* Badge Styles */
    .badge {
        font-weight: 500;
        padding: 0.5rem 0.8rem;
    }
    
    /* Separator */
    .separator {
        height: 4px;
        border-radius: 2px;
    }
    
    /* Batik Border */
    .batik-border {
        border: 8px solid transparent;
        background: linear-gradient(45deg, #5D4037, #D4AF37, #8D6E63) border-box;
        -webkit-mask: 
            linear-gradient(#fff 0 0) padding-box, 
            linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor;
        mask-composite: exclude;
    }
    
    /* Animations */
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
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .flipbook {
            height: 700px;
        }
    }
    
    @media (max-width: 992px) {
        .flipbook {
            height: 650px;
        }
    }
    
    @media (max-width: 768px) {
        .flipbook {
            height: 500px;
        }
        
        .page {
            width: 100%;
        }
        
        .page-right {
            left: 0;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-title span {
            font-size: 3rem;
        }
        
        .flip-area {
            width: 50px;
        }
        
        .flip-area:hover::before {
            width: 40px;
            height: 40px;
            font-size: 1.5rem;
        }
        
        .flip-prev:hover::before {
            left: 10px;
        }
        
        .flip-next:hover::before {
            right: 10px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize variables
        let currentPage = 1;
        const totalPages = 5; // Cover + 3 content pages + back cover
        const flipbook = document.getElementById('flipbook');
        const pages = document.querySelectorAll('.page');
        const currentPageSpan = document.getElementById('currentPage');
        const totalPagesSpan = document.getElementById('totalPages');
        const prevBtn = document.getElementById('prevPage');
        const nextBtn = document.getElementById('nextPage');
        const toggleViewBtn = document.getElementById('toggleView');
        const startReadingBtn = document.getElementById('startReading');
        const viewOrderBtn = document.getElementById('viewOrder');
        let isTurning = false;
        let orderItems = [];
        
        // Set total pages
        totalPagesSpan.textContent = totalPages - 2; // Excluding covers
        
        // Initialize pages position
        function initializePages() {
            pages.forEach((page, index) => {
                if (index === 0) {
                    // Cover page
                    page.style.zIndex = totalPages - index;
                    page.style.transform = 'rotateY(0deg)';
                } else {
                    // Other pages
                    page.style.zIndex = totalPages - index;
                    if (page.classList.contains('page-left')) {
                        page.style.transform = 'rotateY(-180deg)';
                    } else {
                        page.style.transform = 'rotateY(0deg)';
                    }
                }
            });
            updateButtons();
        }
        
        // Turn page function
        function turnPage(direction) {
            if (isTurning) return;
            
            if (direction === 'next' && currentPage < totalPages - 1) {
                isTurning = true;
                const pageIndex = currentPage;
                const page = pages[pageIndex];
                
                page.classList.add('turning');
                if (page.classList.contains('page-left')) {
                    page.classList.add('turning-left');
                } else {
                    page.classList.add('turning-right');
                }
                
                currentPage++;
                updatePageDisplay();
                
                setTimeout(() => {
                    page.classList.remove('turning', 'turning-left', 'turning-right');
                    updateZIndex();
                    isTurning = false;
                }, 1000);
                
            } else if (direction === 'prev' && currentPage > 0) {
                isTurning = true;
                const pageIndex = currentPage - 1;
                const page = pages[pageIndex];
                
                page.classList.add('turning');
                if (page.classList.contains('page-left')) {
                    page.classList.remove('turning-left');
                } else {
                    page.classList.remove('turning-right');
                }
                
                currentPage--;
                updatePageDisplay();
                
                setTimeout(() => {
                    page.classList.remove('turning');
                    updateZIndex();
                    isTurning = false;
                }, 1000);
            }
        }
        
        // Update z-index of pages
        function updateZIndex() {
            pages.forEach((page, index) => {
                if (index < currentPage) {
                    page.style.zIndex = totalPages - index;
                } else {
                    page.style.zIndex = index + 1;
                }
            });
        }
        
        // Update page display
        function updatePageDisplay() {
            currentPageSpan.textContent = Math.max(1, Math.min(currentPage - 1, totalPages - 2));
            updateButtons();
        }
        
        // Update button states
        function updateButtons() {
            prevBtn.disabled = currentPage <= 1;
            nextBtn.disabled = currentPage >= totalPages - 1;
            
            if (prevBtn.disabled) {
                prevBtn.classList.add('disabled');
            } else {
                prevBtn.classList.remove('disabled');
            }
            
            if (nextBtn.disabled) {
                nextBtn.classList.add('disabled');
            } else {
                nextBtn.classList.remove('disabled');
            }
        }
        
        // Toggle fullscreen
        function toggleFullscreen() {
            const container = document.getElementById('flipbook-container');
            if (!document.fullscreenElement) {
                if (container.requestFullscreen) {
                    container.requestFullscreen();
                } else if (container.webkitRequestFullscreen) {
                    container.webkitRequestFullscreen();
                } else if (container.msRequestFullscreen) {
                    container.msRequestFullscreen();
                }
                document.body.classList.add('fullscreen');
                toggleViewBtn.innerHTML = '<i class="fas fa-compress me-2"></i> Keluar Layar Penuh';
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
                document.body.classList.remove('fullscreen');
                toggleViewBtn.innerHTML = '<i class="fas fa-expand me-2"></i> Layar Penuh';
            }
        }
        
        // Image zoom on hover
        function setupImageZoom() {
            document.querySelectorAll('.img-zoom').forEach(img => {
                img.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.1)';
                    this.style.transition = 'transform 0.5s ease';
                });
                
                img.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });
        }
        
        // Add to cart functionality
        function setupAddToCart() {
            document.querySelectorAll('.add-to-cart-book').forEach(button => {
                button.addEventListener('click', function() {
                    const itemName = this.getAttribute('data-name');
                    const itemPrice = parseInt(this.getAttribute('data-price'));
                    
                    // Animation
                    const originalHTML = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check me-1"></i> Ditambahkan';
                    this.style.background = '#2a9d8f';
                    this.disabled = true;
                    
                    // Add to order
                    orderItems.push({ name: itemName, price: itemPrice });
                    
                    // Create notification
                    createNotification('success', `${itemName} berhasil ditambahkan ke pesanan!`);
                    
                    // Reset button after 2 seconds
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                        this.style.background = '';
                        this.disabled = false;
                    }, 2000);
                });
            });
        }
        
        // Create notification
        function createNotification(type, message) {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type} position-fixed top-0 end-0 m-4 shadow`;
            notification.style.zIndex = '99999';
            notification.style.borderRadius = '10px';
            notification.style.border = '2px solid #5D4037';
            notification.style.background = 'white';
            notification.style.animation = 'slideInRight 0.3s ease-out';
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-3" style="color: #D4AF37; font-size: 1.2rem;"></i>
                    <div>
                        <strong class="d-block" style="color: #5D4037;">${message}</strong>
                        <small class="text-muted">Total item: ${orderItems.length}</small>
                    </div>
                    <button type="button" class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
                </div>
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateX(100%)';
                    notification.style.transition = 'all 0.3s ease';
                    setTimeout(() => notification.remove(), 300);
                }
            }, 3000);
        }
        
        // Click to flip areas
        function setupFlipAreas() {
            const flipbookContainer = document.getElementById('flipbook-container');
            
            // Create flip areas
            const flipPrev = document.createElement('div');
            flipPrev.className = 'flip-area flip-prev';
            flipPrev.addEventListener('click', () => turnPage('prev'));
            
            const flipNext = document.createElement('div');
            flipNext.className = 'flip-area flip-next';
            flipNext.addEventListener('click', () => turnPage('next'));
            
            flipbookContainer.appendChild(flipPrev);
            flipbookContainer.appendChild(flipNext);
        }
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                turnPage('prev');
            } else if (e.key === 'ArrowRight') {
                turnPage('next');
            } else if (e.key === 'f' || e.key === 'F') {
                toggleFullscreen();
            }
        });
        
        // View order summary
        if (viewOrderBtn) {
            viewOrderBtn.addEventListener('click', function() {
                if (orderItems.length === 0) {
                    createNotification('info', 'Belum ada item dalam pesanan.');
                    return;
                }
                
                let total = 0;
                let itemsList = '';
                
                orderItems.forEach((item, index) => {
                    total += item.price;
                    itemsList += `${index + 1}. ${item.name} - Rp ${item.price.toLocaleString()}<br>`;
                });
                
                const summary = `
                    <div class="alert alert-info position-fixed top-50 start-50 translate-middle shadow" 
                         style="z-index: 99999; border-radius: 15px; border: 2px solid #D4AF37; background: white; max-width: 500px; width: 90%;">
                        <div class="p-4">
                            <h5 class="mb-3" style="color: #5D4037;">
                                <i class="fas fa-shopping-cart me-2" style="color: #D4AF37;"></i>
                                Ringkasan Pesanan
                            </h5>
                            <div class="mb-3" style="color: #666; max-height: 300px; overflow-y: auto;">
                                ${itemsList}
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <strong style="color: #5D4037;">Total:</strong>
                                <strong style="color: #D4AF37; font-size: 1.2rem;">Rp ${total.toLocaleString()}</strong>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-sm w-100 mb-2" style="background: #5D4037; color: white;"
                                        onclick="alert('Pesanan akan diproses. Terima kasih!'); this.parentElement.parentElement.parentElement.remove();">
                                    <i class="fas fa-paper-plane me-2"></i> Konfirmasi Pesanan
                                </button>
                                <button class="btn btn-sm w-100" style="background: rgba(93, 64, 55, 0.1); color: #5D4037;"
                                        onclick="this.parentElement.parentElement.parentElement.remove()">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                // Remove any existing summary
                const existingSummary = document.querySelector('.alert-info.position-fixed');
                if (existingSummary) existingSummary.remove();
                
                document.body.insertAdjacentHTML('beforeend', summary);
            });
        }
        
        // Event listeners
        prevBtn.addEventListener('click', () => turnPage('prev'));
        nextBtn.addEventListener('click', () => turnPage('next'));
        toggleViewBtn.addEventListener('click', toggleFullscreen);
        
        if (startReadingBtn) {
            startReadingBtn.addEventListener('click', () => {
                turnPage('next');
            });
        }
        
        // Initialize
        initializePages();
        setupFlipAreas();
        setupImageZoom();
        setupAddToCart();
        
        // Add CSS for slideInRight animation if not exists
        if (!document.querySelector('style[data-flipbook-animations]')) {
            const style = document.createElement('style');
            style.setAttribute('data-flipbook-animations', 'true');
            style.textContent = `
                @keyframes slideInRight {
                    from {
                        opacity: 0;
                        transform: translateX(100%);
                    }
                    to {
                        opacity: 1;
                        transform: translateX(0);
                    }
                }
                
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
            `;
            document.head.appendChild(style);
        }
    });
</script>
@endsection