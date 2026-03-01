@extends('layouts.admin')

@section('title', 'Edit Halaman Home')
@section('page-title', 'Edit Halaman Home')

@section('content')
<div class="container-fluid px-4">
    <!-- Header with Premium Red Gradient Theme -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header d-flex align-items-center justify-content-between p-4 rounded-4" 
                 style="background: linear-gradient(145deg, #DC143C, #B22234, #8B0000); box-shadow: 0 20px 40px rgba(220, 20, 60, 0.3);">
                <div>
                    <h4 class="text-white mb-1 fw-bold" style="font-size: 1.8rem;">
                        <i class="fas fa-edit me-2"></i>Edit Halaman Home
                    </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}" class="text-white text-opacity-75 text-decoration-none">
                                    <i class="fas fa-home me-1"></i>Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Edit Home</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-light rounded-pill px-4 py-2 shadow-lg" 
                   style="background: rgba(255,255,255,0.95); border: none; color: #DC143C; font-weight: 600;">
                    <i class="fas fa-eye me-2"></i>Lihat Halaman User
                    <i class="fas fa-external-link-alt ms-1" style="font-size: 0.8rem;"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Alert styling with premium red theme --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show glass-alert" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">
                <i class="fas fa-check-circle fa-2x"></i>
            </div>
            <div>
                <strong class="d-block">Berhasil!</strong>
                {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show glass-alert" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">
                <i class="fas fa-exclamation-circle fa-2x"></i>
            </div>
            <div>
                <strong class="d-block">Oops!</strong>
                {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show glass-alert" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">
                <i class="fas fa-exclamation-triangle fa-2x"></i>
            </div>
            <div>
                <strong class="d-block">Terdapat Kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form action="{{ route('admin.pages.home.update') }}" method="POST">
        @csrf

        {{-- INFORMASI DASAR --}}
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.1s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        Informasi Dasar
                    </h5>
                    <span class="badge-status">SEO</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="fas fa-heading me-1" style="color: #DC143C;"></i>
                            Judul Halaman
                        </label>
                        <input type="text" class="form-control custom-input @error('title') is-invalid @enderror" name="title" 
                               value="{{ old('title', $page->title ?? 'Beranda') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            <i class="fas fa-tag me-1" style="color: #DC143C;"></i>
                            Meta Title (SEO)
                        </label>
                        <input type="text" class="form-control custom-input @error('meta_title') is-invalid @enderror" name="meta_title" 
                               value="{{ old('meta_title', $page->meta_title ?? '') }}">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fas fa-align-left me-1" style="color: #DC143C;"></i>
                        Meta Description (SEO)
                    </label>
                    <textarea class="form-control custom-input @error('meta_description') is-invalid @enderror" name="meta_description" rows="3">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
                    <small class="text-muted mt-1 d-block">
                        <i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>
                        Deskripsi ini akan muncul di hasil pencarian Google
                    </small>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- HERO SECTION --}}
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.2s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-images"></i>
                        </span>
                        Hero Section
                    </h5>
                    <span class="badge-status">Utama</span>
                </div>
            </div>
            <div class="card-body">
                <div class="info-alert mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    Hero section menggunakan gambar dari URL. Pastikan URL gambar valid.
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control custom-input @error('hero_title_line1') is-invalid @enderror" name="hero_title_line1" 
                               value="{{ old('hero_title_line1', $page->content['hero_title_line1'] ?? 'Nikmati Kelezatan') }}" required>
                        @error('hero_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control custom-input gradient-text-preview @error('hero_title_line2') is-invalid @enderror" name="hero_title_line2" 
                               value="{{ old('hero_title_line2', $page->content['hero_title_line2'] ?? 'Hidangan Spesial') }}" required>
                        @error('hero_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Baris 3</label>
                        <input type="text" class="form-control custom-input @error('hero_title_line3') is-invalid @enderror" name="hero_title_line3" 
                               value="{{ old('hero_title_line3', $page->content['hero_title_line3'] ?? 'di Joss Gandos') }}" required>
                        @error('hero_title_line3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi Hero</label>
                    <textarea class="form-control custom-input @error('hero_description') is-invalid @enderror" name="hero_description" rows="3" required>{{ old('hero_description', $page->content['hero_description'] ?? 'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.') }}</textarea>
                    @error('hero_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol Menu</label>
                        <input type="text" class="form-control custom-input @error('hero_button_menu') is-invalid @enderror" name="hero_button_menu" 
                               value="{{ old('hero_button_menu', $page->content['hero_button_menu'] ?? 'Lihat Menu') }}" required>
                        @error('hero_button_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol Reservasi</label>
                        <input type="text" class="form-control custom-input @error('hero_button_reservation') is-invalid @enderror" name="hero_button_reservation" 
                               value="{{ old('hero_button_reservation', $page->content['hero_button_reservation'] ?? 'Pesan Meja') }}" required>
                        @error('hero_button_reservation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fas fa-link me-1" style="color: #DC143C;"></i>
                        URL Gambar Hero
                    </label>
                    <div class="url-input-group">
                        <input type="url" class="form-control custom-input @error('hero_image_url') is-invalid @enderror" name="hero_image_url" 
                               value="{{ old('hero_image_url', $page->content['hero_image_url'] ?? 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw') }}" 
                               required
                               id="hero_image_url"
                               onchange="previewHeroImage(this.value)">
                        <i class="fas fa-eye url-preview-icon" onclick="previewHeroImage(document.getElementById('hero_image_url').value)" title="Preview Gambar"></i>
                    </div>
                    @error('hero_image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    <div class="mt-3 image-preview-container" id="heroPreviewContainer" style="{{ isset($page->content['hero_image_url']) ? 'display: block;' : 'display: none;' }}">
                        <label class="form-label small">Preview Gambar Hero:</label>
                        <div class="image-preview-wrapper">
                            <img src="{{ $page->content['hero_image_url'] ?? '' }}" alt="Hero Preview" class="image-preview" id="heroPreview">
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Teks Premium Badge</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                            <i class="fas fa-crown"></i>
                        </span>
                        <input type="text" class="form-control custom-input @error('hero_premium_badge') is-invalid @enderror" name="hero_premium_badge" 
                               value="{{ old('hero_premium_badge', $page->content['hero_premium_badge'] ?? '#1 RESTO & CAFE KETINTANG') }}" required>
                    </div>
                    @error('hero_premium_badge')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- WELCOME SECTION --}}
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.3s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-hand-peace"></i>
                        </span>
                        Welcome Section
                    </h5>
                    <span class="badge-status">Profil</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control custom-input @error('welcome_title_line1') is-invalid @enderror" name="welcome_title_line1" 
                               value="{{ old('welcome_title_line1', $page->content['welcome_title_line1'] ?? 'Selamat Datang') }}" required>
                        @error('welcome_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control custom-input gradient-text-preview @error('welcome_title_line2') is-invalid @enderror" name="welcome_title_line2" 
                               value="{{ old('welcome_title_line2', $page->content['welcome_title_line2'] ?? 'Resto Joss Gandos') }}" required>
                        @error('welcome_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi Welcome</label>
                    <textarea class="form-control custom-input @error('welcome_description') is-invalid @enderror" name="welcome_description" rows="3" required>{{ old('welcome_description', $page->content['welcome_description'] ?? 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.') }}</textarea>
                    @error('welcome_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">
                        <i class="fas fa-link me-1" style="color: #DC143C;"></i>
                        URL Gambar Welcome
                    </label>
                    <div class="url-input-group">
                        <input type="url" class="form-control custom-input @error('welcome_image_url') is-invalid @enderror" name="welcome_image_url" 
                               value="{{ old('welcome_image_url', $page->content['welcome_image_url'] ?? 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" 
                               required
                               id="welcome_image_url"
                               onchange="previewWelcomeImage(this.value)">
                        <i class="fas fa-eye url-preview-icon" onclick="previewWelcomeImage(document.getElementById('welcome_image_url').value)" title="Preview Gambar"></i>
                    </div>
                    @error('welcome_image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    <div class="mt-3 image-preview-container" id="welcomePreviewContainer" style="{{ isset($page->content['welcome_image_url']) ? 'display: block;' : 'display: none;' }}">
                        <label class="form-label small">Preview Gambar Welcome:</label>
                        <div class="image-preview-wrapper">
                            <img src="{{ $page->content['welcome_image_url'] ?? '' }}" alt="Welcome Preview" class="image-preview" id="welcomePreview">
                        </div>
                    </div>
                </div>
                
                <h6 class="sub-header">
                    <i class="fas fa-star me-2"></i>
                    Fitur Unggulan
                </h6>
                <div class="row">
                    @for($i = 1; $i <= 4; $i++)
                    <div class="col-md-6 mb-3">
                        <label class="form-label small">Fitur {{ $i }}</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                                <i class="fas fa-check"></i>
                            </span>
                            <input type="text" class="form-control custom-input @error('feature_'.$i.'_text') is-invalid @enderror" name="feature_{{ $i }}_text" 
                                   value="{{ old('feature_'.$i.'_text', $page->content['feature_'.$i.'_text'] ?? ($i == 1 ? 'Bahan premium pilihan terbaik' : ($i == 2 ? 'Chef berpengalaman & profesional' : ($i == 3 ? 'Suasana nyaman untuk keluarga' : 'Pelayanan ramah & cepat')))) }}" required>
                        </div>
                        @error('feature_'.$i.'_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        {{-- SERVICES SECTION --}}
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.4s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-concierge-bell"></i>
                        </span>
                        Services Section
                    </h5>
                    <span class="badge-status">Layanan</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control custom-input @error('services_title_line1') is-invalid @enderror" name="services_title_line1" 
                               value="{{ old('services_title_line1', $page->content['services_title_line1'] ?? 'Fasilitas &') }}" required>
                        @error('services_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control custom-input gradient-text-preview @error('services_title_line2') is-invalid @enderror" name="services_title_line2" 
                               value="{{ old('services_title_line2', $page->content['services_title_line2'] ?? 'Pelayanan Premium') }}" required>
                        @error('services_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control custom-input @error('services_subtitle') is-invalid @enderror" name="services_subtitle" rows="2" required>{{ old('services_subtitle', $page->content['services_subtitle'] ?? 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda') }}</textarea>
                    @error('services_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h6 class="sub-header">
                    <i class="fas fa-list me-2"></i>
                    Detail Layanan
                </h6>
                
                @for($i = 1; $i <= 6; $i++)
                @php
                    $iconDefault = $i == 1 ? 'fas fa-utensils' : ($i == 2 ? 'fas fa-users' : ($i == 3 ? 'fas fa-calendar-alt' : ($i == 4 ? 'fas fa-wifi' : ($i == 5 ? 'fas fa-mosque' : 'fas fa-parking'))));
                    $titleDefault = $i == 1 ? 'Dine In' : ($i == 2 ? 'Private Room' : ($i == 3 ? 'Event & Catering' : ($i == 4 ? 'Free WiFi' : ($i == 5 ? 'Musholla' : 'Parkir Luas'))));
                    $descDefault = $i == 1 ? 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan' : 
                                   ($i == 2 ? 'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke' : 
                                   ($i == 3 ? 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda' : 
                                   ($i == 4 ? 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda' : 
                                   ($i == 5 ? 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang' : 
                                   'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda'))));
                @endphp
                <div class="service-item mb-3">
                    <div class="service-header" data-bs-toggle="collapse" href="#service{{ $i }}Collapse" role="button" aria-expanded="false" aria-controls="service{{ $i }}Collapse">
                        <i class="{{ $iconDefault }} me-2" style="color: #DC143C;"></i>
                        Layanan {{ $i }}: {{ $titleDefault }}
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </div>
                    <div class="collapse" id="service{{ $i }}Collapse">
                        <div class="service-body">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <label class="form-label small">Icon (FontAwesome)</label>
                                    <input type="text" class="form-control custom-input" name="service_{{ $i }}_icon" 
                                           value="{{ old('service_'.$i.'_icon', $page->content['service_'.$i.'_icon'] ?? $iconDefault) }}">
                                    <small class="text-muted">Contoh: fas fa-utensils</small>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label class="form-label small">Judul</label>
                                    <input type="text" class="form-control custom-input" name="service_{{ $i }}_title" 
                                           value="{{ old('service_'.$i.'_title', $page->content['service_'.$i.'_title'] ?? $titleDefault) }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label class="form-label small">Deskripsi</label>
                                    <textarea class="form-control custom-input" name="service_{{ $i }}_description" rows="2">{{ old('service_'.$i.'_description', $page->content['service_'.$i.'_description'] ?? $descDefault) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        {{-- TESTIMONIALS SECTION --}}
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.5s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-star"></i>
                        </span>
                        Testimonials Section
                    </h5>
                    <span class="badge-status">Ulasan</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control custom-input @error('testimonials_title_line1') is-invalid @enderror" name="testimonials_title_line1" 
                               value="{{ old('testimonials_title_line1', $page->content['testimonials_title_line1'] ?? 'Apa Kata') }}" required>
                        @error('testimonials_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control custom-input gradient-text-preview @error('testimonials_title_line2') is-invalid @enderror" name="testimonials_title_line2" 
                               value="{{ old('testimonials_title_line2', $page->content['testimonials_title_line2'] ?? 'Pelanggan Kami?') }}" required>
                        @error('testimonials_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control custom-input @error('testimonials_subtitle') is-invalid @enderror" name="testimonials_subtitle" rows="2" required>{{ old('testimonials_subtitle', $page->content['testimonials_subtitle'] ?? 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos') }}</textarea>
                    @error('testimonials_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h6 class="sub-header">
                    <i class="fas fa-comments me-2"></i>
                    Testimoni Pelanggan
                </h6>
                
                @for($i = 1; $i <= 9; $i++)
                @php
                    $nameDefault = $i == 1 ? 'Achmad Thoriq' : 
                                  ($i == 2 ? 'Perpus Uinsa' : 
                                  ($i == 3 ? 'Karenina Anisya' : 
                                  ($i == 4 ? 'Filidyo Bramanta' : 
                                  ($i == 5 ? 'M. Junianto Tri' : 
                                  ($i == 6 ? 'Metha Prosper' :
                                  ($i == 7 ? 'Budi Santoso' :
                                  ($i == 8 ? 'Siti Nurhaliza' : 'Rizki Firmansyah')))))));
                          
                    $textDefault = $i == 1 ? 'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!' : 
                                  ($i == 2 ? 'Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.' : 
                                  ($i == 3 ? 'Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.' : 
                                  ($i == 4 ? 'Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.' : 
                                  ($i == 5 ? 'Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.' : 
                                  ($i == 6 ? 'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul' :
                                  ($i == 7 ? 'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!' :
                                  ($i == 8 ? 'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.' :
                                  'Live musicnya seru, makanannya lezat, minumannya juga segar-segar. Pelayanan memuaskan, bikin betah berlama-lama.')))))));
                @endphp
                <div class="testimonial-item mb-3">
                    <div class="testimonial-header" data-bs-toggle="collapse" href="#testimonial{{ $i }}Collapse" role="button" aria-expanded="false" aria-controls="testimonial{{ $i }}Collapse">
                        <i class="fas fa-user-circle me-2" style="color: #DC143C;"></i>
                        Testimoni {{ $i }}: {{ $nameDefault }}
                        <i class="fas fa-chevron-down ms-auto"></i>
                    </div>
                    <div class="collapse" id="testimonial{{ $i }}Collapse">
                        <div class="testimonial-body">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label class="form-label small">Nama</label>
                                    <input type="text" class="form-control custom-input" name="testimonial_{{ $i }}_name" 
                                           value="{{ old('testimonial_'.$i.'_name', $page->content['testimonial_'.$i.'_name'] ?? $nameDefault) }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label small">Asal/Sumber</label>
                                    <input type="text" class="form-control custom-input" name="testimonial_{{ $i }}_source" 
                                           value="{{ old('testimonial_'.$i.'_source', $page->content['testimonial_'.$i.'_source'] ?? 'Google Reviews') }}">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label small">Rating (1-5)</label>
                                    <select class="form-select custom-input" name="testimonial_{{ $i }}_rating">
                                        @for($r = 1; $r <= 5; $r++)
                                        <option value="{{ $r }}" {{ (old('testimonial_'.$i.'_rating', $page->content['testimonial_'.$i.'_rating'] ?? 5) == $r) ? 'selected' : '' }}>
                                            {{ $r }} Bintang {{ str_repeat('★', $r) }}
                                        </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label class="form-label small">Testimoni</label>
                                    <textarea class="form-control custom-input" name="testimonial_{{ $i }}_text" rows="2">{{ old('testimonial_'.$i.'_text', $page->content['testimonial_'.$i.'_text'] ?? $textDefault) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        {{-- CTA SECTION --}}
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.6s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-bullhorn"></i>
                        </span>
                        CTA Section
                    </h5>
                    <span class="badge-status">Call to Action</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control custom-input @error('cta_title_line1') is-invalid @enderror" name="cta_title_line1" 
                               value="{{ old('cta_title_line1', $page->content['cta_title_line1'] ?? 'Siap Merasakan') }}" required>
                        @error('cta_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control custom-input gradient-text-preview @error('cta_title_line2') is-invalid @enderror" name="cta_title_line2" 
                               value="{{ old('cta_title_line2', $page->content['cta_title_line2'] ?? 'Pengalaman Kuliner Terbaik?') }}" required>
                        @error('cta_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi CTA</label>
                    <textarea class="form-control custom-input @error('cta_description') is-invalid @enderror" name="cta_description" rows="3" required>{{ old('cta_description', $page->content['cta_description'] ?? 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!') }}</textarea>
                    @error('cta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h6 class="sub-header">
                    <i class="fas fa-buttons me-2"></i>
                    Tombol CTA
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol 1 (Pesan Sekarang)</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <input type="text" class="form-control custom-input" name="cta_button1_text" 
                                   value="{{ old('cta_button1_text', $page->content['cta_button1_text'] ?? 'Pesan Sekarang') }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol 2 (Reservasi Sekarang)</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: linear-gradient(145deg, #DC143C, #B22234); color: white; border: none;">
                                <i class="fas fa-calendar-check"></i>
                            </span>
                            <input type="text" class="form-control custom-input" name="cta_button2_text" 
                                   value="{{ old('cta_button2_text', $page->content['cta_button2_text'] ?? 'Reservasi Sekarang') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="d-flex justify-content-between mt-5 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-outline">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
            <button type="submit" class="btn btn-admin">
                <i class="fas fa-save me-2"></i>Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    /* ===== PREMIUM RED GRADIENT THEME ===== */
    :root {
        /* Red Gradient Palette */
        --red-50: #FFF1F3;
        --red-100: #FFE4E8;
        --red-200: #FFB3C1;
        --red-300: #FF8A9F;
        --red-400: #FF4D6D;
        --red-500: #DC143C;
        --red-600: #B22234;
        --red-700: #8B0000;
        --red-800: #5C0000;
        --red-900: #2E0000;
        
        /* Gradients */
        --gradient-primary: linear-gradient(145deg, #DC143C, #B22234, #8B0000);
        --gradient-secondary: linear-gradient(145deg, #FF4D6D, #DC143C);
        --gradient-soft: linear-gradient(145deg, #FFF1F3, #FFE4E8, #FFD1D9);
        --gradient-glass: linear-gradient(145deg, rgba(220, 20, 60, 0.05), rgba(139, 0, 0, 0.02));
        --gradient-shine: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        
        /* Shadows */
        --shadow-sm: 0 5px 20px rgba(220, 20, 60, 0.08);
        --shadow-md: 0 8px 30px rgba(220, 20, 60, 0.12);
        --shadow-lg: 0 15px 40px rgba(220, 20, 60, 0.18);
        --shadow-xl: 0 25px 50px rgba(220, 20, 60, 0.25);
        
        /* Border Radius */
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --radius-full: 9999px;
        
        /* Font */
        --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    * {
        font-family: var(--font-sans);
    }

    body {
        background: #faf7f5;
    }

    /* ===== PAGE HEADER ===== */
    .page-header {
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-xl) !important;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.2), transparent 70%);
        border-radius: 50%;
        animation: floatHeader 15s ease-in-out infinite;
    }

    .page-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
        border-radius: 50%;
        animation: floatHeader 20s ease-in-out infinite reverse;
    }

    @keyframes floatHeader {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(40px, -40px) scale(1.2); }
        66% { transform: translate(-20px, 20px) scale(0.8); }
    }

    .breadcrumb-item + .breadcrumb-item::before {
        color: rgba(255,255,255,0.5);
    }

    .breadcrumb-item a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-item a:hover {
        color: white;
    }

    /* ===== MAIN CARD ===== */
    .main-card {
        border: none;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        background: white;
    }

    .main-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-5px);
    }

    .main-card .card-header {
        background: white;
        border-bottom: 2px solid var(--red-100);
        padding: 1.2rem 1.5rem;
        position: relative;
    }

    .main-card .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-primary);
    }

    .header-title {
        color: var(--red-700);
        font-weight: 700;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: var(--gradient-soft);
        border-radius: var(--radius-md);
        color: var(--red-500);
        font-size: 1.2rem;
    }

    .badge-status {
        background: var(--gradient-soft);
        color: var(--red-700);
        padding: 6px 16px;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid var(--red-200);
    }

    /* ===== FORM ELEMENTS ===== */
    .form-label {
        color: var(--red-700);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .custom-input {
        border: 2px solid #e9ecef;
        border-radius: var(--radius-md);
        padding: 0.7rem 1rem;
        transition: all 0.3s ease;
        background: white;
        font-size: 0.95rem;
    }

    .custom-input:hover {
        border-color: var(--red-300);
    }

    .custom-input:focus {
        border-color: var(--red-500);
        box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
        outline: none;
    }

    .custom-input.is-invalid {
        border-color: var(--red-500);
        background-image: none;
    }

    .invalid-feedback {
        color: var(--red-500);
        font-size: 0.85rem;
        margin-top: 0.3rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .invalid-feedback::before {
        content: '⚠️';
        font-size: 0.85rem;
    }

    /* ===== GRADIENT TEXT PREVIEW ===== */
    .gradient-text-preview {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 700;
    }

    /* ===== INFO ALERT ===== */
    .info-alert {
        background: var(--gradient-soft);
        color: var(--red-700);
        padding: 1rem 1.5rem;
        border-radius: var(--radius-md);
        border-left: 4px solid var(--red-500);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
    }

    .info-alert i {
        font-size: 1.2rem;
        color: var(--red-500);
    }

    /* ===== SUB HEADER ===== */
    .sub-header {
        background: var(--gradient-soft);
        color: var(--red-700);
        padding: 0.8rem 1.2rem;
        border-radius: var(--radius-md);
        font-weight: 700;
        margin: 1.5rem 0 1rem 0;
        border-left: 4px solid var(--red-500);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sub-header i {
        color: var(--red-500);
    }

    /* ===== SERVICE & TESTIMONIAL ITEMS ===== */
    .service-item, .testimonial-item {
        border: 2px solid var(--red-100);
        border-radius: var(--radius-md);
        overflow: hidden;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
        background: white;
    }

    .service-item:hover, .testimonial-item:hover {
        border-color: var(--red-500);
        box-shadow: var(--shadow-md);
        transform: translateX(5px);
    }

    .service-header, .testimonial-header {
        background: linear-gradient(145deg, #fff5f5, #ffffff);
        padding: 1rem 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        color: var(--red-700);
        transition: all 0.3s ease;
    }

    .service-header i, .testimonial-header i {
        transition: transform 0.3s ease;
    }

    .service-header[aria-expanded="true"] i.fa-chevron-down,
    .testimonial-header[aria-expanded="true"] i.fa-chevron-down {
        transform: rotate(180deg);
    }

    .service-body, .testimonial-body {
        padding: 1.2rem;
        background: white;
        border-top: 2px solid var(--red-100);
    }

    /* ===== URL INPUT GROUP ===== */
    .url-input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .url-input-group .form-control {
        padding-right: 50px;
    }

    .url-preview-icon {
        position: absolute;
        right: 15px;
        color: var(--red-500);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.2rem;
        background: white;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-full);
        border: 2px solid var(--red-100);
    }

    .url-preview-icon:hover {
        background: var(--gradient-primary);
        color: white;
        transform: scale(1.1);
        border-color: transparent;
    }

    /* ===== IMAGE PREVIEW ===== */
    .image-preview-container {
        margin-top: 1rem;
        padding: 1rem;
        background: var(--gradient-soft);
        border-radius: var(--radius-md);
        border: 2px dashed var(--red-300);
        animation: fadeIn 0.5s ease;
    }

    .image-preview-wrapper {
        max-width: 200px;
        border-radius: var(--radius-md);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 4px solid white;
        transition: all 0.3s ease;
    }

    .image-preview-wrapper:hover {
        transform: scale(1.05);
        box-shadow: var(--shadow-xl);
    }

    .image-preview {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }

    .image-preview:hover {
        transform: scale(1.1);
    }

    /* ===== GLASS ALERT ===== */
    .glass-alert {
        background: white;
        backdrop-filter: blur(10px);
        border: none;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        animation: slideIn 0.5s ease;
        padding: 1.2rem 1.5rem;
        position: relative;
        overflow: hidden;
    }

    .glass-alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .alert-success {
        border-left: 4px solid #28a745;
    }

    .alert-success::before {
        background: linear-gradient(145deg, #28a745, #20c997);
    }

    .alert-danger {
        border-left: 4px solid var(--red-500);
    }

    .alert-danger::before {
        background: var(--gradient-primary);
    }

    .alert-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.2);
    }

    .alert-success .alert-icon i {
        color: #28a745;
    }

    .alert-danger .alert-icon i {
        color: var(--red-500);
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-admin {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.8rem 2.5rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: var(--shadow-md);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
    }

    .btn-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-admin:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    .btn-admin:hover::before {
        left: 100%;
    }

    .btn-admin-outline {
        background: white;
        color: var(--red-600);
        border: 2px solid var(--red-500);
        padding: 0.8rem 2.5rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-admin-outline:hover {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    /* ===== ANIMATIONS ===== */
    .fade-in-up {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Delay animations for each card */
    .fade-in-up:nth-child(1) { animation-delay: 0.1s; }
    .fade-in-up:nth-child(2) { animation-delay: 0.2s; }
    .fade-in-up:nth-child(3) { animation-delay: 0.3s; }
    .fade-in-up:nth-child(4) { animation-delay: 0.4s; }
    .fade-in-up:nth-child(5) { animation-delay: 0.5s; }
    .fade-in-up:nth-child(6) { animation-delay: 0.6s; }
    .fade-in-up:nth-child(7) { animation-delay: 0.7s; }

    /* ===== CUSTOM SCROLLBAR ===== */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: var(--red-100);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: var(--gradient-primary);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(145deg, #B22234, #8B0000);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn-admin, .btn-admin-outline {
            width: 100%;
            justify-content: center;
        }

        .service-header, .testimonial-header {
            font-size: 0.9rem;
        }

        .image-preview-wrapper {
            max-width: 100%;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Preview Hero Image
    function previewHeroImage(url) {
        const previewContainer = document.getElementById('heroPreviewContainer');
        const preview = document.getElementById('heroPreview');
        
        if (url && url.trim() !== '') {
            preview.src = url;
            previewContainer.style.display = 'block';
            
            // Handle image load error
            preview.onerror = function() {
                this.src = 'https://via.placeholder.com/300x200/FFE4E8/DC143C?text=URL+Tidak+Valid';
            };
        } else {
            previewContainer.style.display = 'none';
        }
    }

    // Preview Welcome Image
    function previewWelcomeImage(url) {
        const previewContainer = document.getElementById('welcomePreviewContainer');
        const preview = document.getElementById('welcomePreview');
        
        if (url && url.trim() !== '') {
            preview.src = url;
            previewContainer.style.display = 'block';
            
            // Handle image load error
            preview.onerror = function() {
                this.src = 'https://via.placeholder.com/300x200/FFE4E8/DC143C?text=URL+Tidak+Valid';
            };
        } else {
            previewContainer.style.display = 'none';
        }
    }

    // Initialize previews on page load
    document.addEventListener('DOMContentLoaded', function() {
        const heroUrl = document.getElementById('hero_image_url');
        const welcomeUrl = document.getElementById('welcome_image_url');
        
        if (heroUrl && heroUrl.value) {
            previewHeroImage(heroUrl.value);
        }
        
        if (welcomeUrl && welcomeUrl.value) {
            previewWelcomeImage(welcomeUrl.value);
        }

        // Add floating labels effect
        const inputs = document.querySelectorAll('.custom-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.mb-3')?.querySelector('.form-label')?.classList.add('text-danger');
            });
            input.addEventListener('blur', function() {
                this.closest('.mb-3')?.querySelector('.form-label')?.classList.remove('text-danger');
            });
        });
    });

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.glass-alert');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);

    // Character counter for meta description
    const metaDesc = document.querySelector('textarea[name="meta_description"]');
    if (metaDesc) {
        metaDesc.addEventListener('input', function() {
            const length = this.value.length;
            let counter = this.nextElementSibling;
            
            if (!counter || !counter.classList.contains('char-counter')) {
                counter = document.createElement('small');
                counter.classList.add('char-counter', 'text-muted', 'mt-1', 'd-block');
                this.parentNode.appendChild(counter);
            }
            
            counter.innerHTML = `<i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>${length} karakter (${155 - length} karakter tersisa untuk SEO)`;
            
            if (length > 155) {
                counter.style.color = '#dc3545';
            } else {
                counter.style.color = '#6c757d';
            }
        });
    }
</script>
@endsection