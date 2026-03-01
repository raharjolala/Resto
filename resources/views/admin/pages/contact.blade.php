{{-- resources/views/admin/pages/contact.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Kontak')
@section('page-title', 'Edit Informasi Kontak')

@section('content')
<div class="container-fluid px-4">
    <!-- Header dengan efek premium -->
    <div class="page-header mb-4">
        <div class="header-content">
            <h4 class="header-title">
                <i class="fas fa-address-card me-2"></i>
                Edit Informasi Kontak
            </h4>
            <p class="header-subtitle">Kelola informasi kontak yang akan tampil di halaman reservasi pelanggan</p>
        </div>
        <div class="header-decoration">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="card main-card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div class="header-icon-wrapper">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div class="ms-3">
                    <h5 class="mb-0 header-title">Edit Konten Halaman Kontak</h5>
                    <small class="text-muted">Data ini akan muncul di bagian informasi kontak halaman reservasi</small>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show glass-alert success-alert" role="alert">
                    <div class="alert-content">
                        <div class="alert-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="alert-message">
                            {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show glass-alert error-alert" role="alert">
                    <div class="alert-content">
                        <div class="alert-icon">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="alert-message">
                            {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- FORM TANPA @method('PUT') --}}
            <form action="{{ route('admin.pages.contact.update') }}" method="POST" class="aesthetic-form">
                @csrf

                <!-- Informasi Kontak -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <h5 class="section-title">Informasi Kontak</h5>
                        <span class="section-badge">Utama</span>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fas fa-map-marker-alt me-2"></i>Alamat
                                </label>
                                <div class="input-field">
                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" 
                                           value="{{ old('address', $page->content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231') }}">
                                    @error('address')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fas fa-phone-alt me-2"></i>Nomor Telepon
                                </label>
                                <div class="input-field">
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                           value="{{ old('phone', $page->content['phone'] ?? '(021) 1234-5678') }}">
                                    @error('phone')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <div class="input-field">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                           value="{{ old('email', $page->content['email'] ?? 'info@jossgandos.com') }}">
                                    @error('email')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fas fa-clock me-2"></i>Jam Operasional
                                </label>
                                <div class="input-field">
                                    <input type="text" name="hours" class="form-control @error('hours') is-invalid @enderror" 
                                           value="{{ old('hours', $page->content['hours'] ?? '10:00 - 22:00 WIB (Setiap Hari)') }}">
                                    @error('hours')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fas fa-map-marked-alt me-2"></i>Google Maps Embed URL
                                </label>
                                <div class="input-field">
                                    <textarea name="map_embed" rows="4" class="form-control @error('map_embed') is-invalid @enderror">{{ old('map_embed', $page->content['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid') }}</textarea>
                                    @error('map_embed')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Admins -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon whatsapp-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <h5 class="section-title">Admin WhatsApp</h5>
                        <span class="section-badge">Kontak Cepat</span>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-3">
                            <div class="input-wrapper">
                                <label class="input-label">Admin 1 - Nama</label>
                                <div class="input-field">
                                    <input type="text" name="whatsapp_admin_1_name" class="form-control @error('whatsapp_admin_1_name') is-invalid @enderror" 
                                           value="{{ old('whatsapp_admin_1_name', $page->content['whatsapp_admin_1_name'] ?? 'Admin 1') }}">
                                    @error('whatsapp_admin_1_name')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="input-wrapper">
                                <label class="input-label">Admin 1 - Nomor WhatsApp</label>
                                <div class="input-field">
                                    <input type="text" name="whatsapp_admin_1" class="form-control @error('whatsapp_admin_1') is-invalid @enderror" 
                                           value="{{ old('whatsapp_admin_1', $page->content['whatsapp_admin_1'] ?? '6289699071599') }}">
                                    <small class="input-hint">Format: 628xxx (tanpa + atau spasi)</small>
                                    @error('whatsapp_admin_1')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="input-wrapper">
                                <label class="input-label">Admin 2 - Nama</label>
                                <div class="input-field">
                                    <input type="text" name="whatsapp_admin_2_name" class="form-control @error('whatsapp_admin_2_name') is-invalid @enderror" 
                                           value="{{ old('whatsapp_admin_2_name', $page->content['whatsapp_admin_2_name'] ?? 'Admin 2') }}">
                                    @error('whatsapp_admin_2_name')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="input-wrapper">
                                <label class="input-label">Admin 2 - Nomor WhatsApp</label>
                                <div class="input-field">
                                    <input type="text" name="whatsapp_admin_2" class="form-control @error('whatsapp_admin_2') is-invalid @enderror" 
                                           value="{{ old('whatsapp_admin_2', $page->content['whatsapp_admin_2'] ?? '6289532682495') }}">
                                    <small class="input-hint">Format: 628xxx (tanpa + atau spasi)</small>
                                    @error('whatsapp_admin_2')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Services -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon delivery-icon">
                            <i class="fas fa-motorcycle"></i>
                        </div>
                        <h5 class="section-title">Layanan Delivery</h5>
                        <span class="section-badge">Partner</span>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Gofood_logo.svg/1280px-Gofood_logo.svg.png" alt="GoFood" style="height: 20px; margin-right: 8px;">
                                    GoFood URL
                                </label>
                                <div class="input-field">
                                    <input type="url" name="delivery_gofood" class="form-control @error('delivery_gofood') is-invalid @enderror" 
                                           value="{{ old('delivery_gofood', $page->content['delivery_gofood'] ?? 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17') }}">
                                    @error('delivery_gofood')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <img src="https://vectorseek.com/wp-content/uploads/2023/09/grab-food-Logo-Vector.svg-.png" alt="GrabFood" style="height: 20px; margin-right: 8px;">
                                    GrabFood URL
                                </label>
                                <div class="input-field">
                                    <input type="url" name="delivery_grabfood" class="form-control @error('delivery_grabfood') is-invalid @enderror" 
                                           value="{{ old('delivery_grabfood', $page->content['delivery_grabfood'] ?? 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d') }}">
                                    @error('delivery_grabfood')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="form-section">
                    <div class="section-header">
                        <div class="section-icon social-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <h5 class="section-title">Media Sosial</h5>
                        <span class="section-badge">Ikuti Kami</span>
                    </div>
                    
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fab fa-facebook me-2" style="color: #1877f2;"></i> Facebook URL
                                </label>
                                <div class="input-field">
                                    <input type="url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" 
                                           value="{{ old('facebook_url', $page->content['facebook_url'] ?? '#') }}">
                                    @error('facebook_url')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fab fa-instagram me-2" style="color: #e4405f;"></i> Instagram URL
                                </label>
                                <div class="input-field">
                                    <input type="url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" 
                                           value="{{ old('instagram_url', $page->content['instagram_url'] ?? '#') }}">
                                    @error('instagram_url')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="input-wrapper">
                                <label class="input-label">
                                    <i class="fab fa-tiktok me-2" style="color: #000;"></i> TikTok URL
                                </label>
                                <div class="input-field">
                                    <input type="url" name="tiktok_url" class="form-control @error('tiktok_url') is-invalid @enderror" 
                                           value="{{ old('tiktok_url', $page->content['tiktok_url'] ?? '#') }}">
                                    @error('tiktok_url')
                                        <div class="error-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save me-2"></i>
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('reservation.create') }}" class="btn-preview" target="_blank">
                        <i class="fas fa-eye me-2"></i>
                        Lihat Halaman Reservasi
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    /* Premium Red Gradient Theme */
    :root {
        --red-50: #fff5f5;
        --red-100: #ffe3e3;
        --red-200: #ffc9c9;
        --red-300: #ffa8a8;
        --red-400: #ff8787;
        --red-500: #ff6b6b;
        --red-600: #c92a2a;
        --red-700: #a61e1e;
        --red-800: #8b1a1a;
        --red-900: #6b1414;
        --gradient-primary: linear-gradient(135deg, #c92a2a 0%, #a61e1e 50%, #8b1a1a 100%);
        --gradient-soft: linear-gradient(135deg, #fff5f5 0%, #ffe3e3 100%);
        --gradient-hover: linear-gradient(135deg, #a61e1e 0%, #8b1a1a 50%, #6b1414 100%);
        --gradient-glow: linear-gradient(145deg, #fff5f5, #ffe3e3);
        --shadow-sm: 0 4px 6px rgba(169, 30, 30, 0.05);
        --shadow-md: 0 8px 15px rgba(169, 30, 30, 0.1);
        --shadow-lg: 0 15px 30px rgba(169, 30, 30, 0.15);
        --shadow-xl: 0 25px 50px rgba(169, 30, 30, 0.25);
        --border-radius-sm: 12px;
        --border-radius-md: 18px;
        --border-radius-lg: 24px;
        --border-radius-xl: 30px;
    }

    /* Global Styles */
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(135deg, #fcf9f7 0%, #f7f2ef 100%);
    }

    /* Page Header Premium */
    .page-header {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: var(--border-radius-xl);
        padding: 2.2rem 2.5rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(201, 42, 42, 0.1);
        box-shadow: var(--shadow-xl);
        position: relative;
        overflow: hidden;
        animation: slideDown 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .header-title {
        font-size: 2rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
    }

    .header-title i {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 2rem;
    }

    .header-subtitle {
        color: #718096;
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 0;
        position: relative;
        padding-left: 2rem;
    }

    .header-subtitle::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 1.5rem;
        height: 2px;
        background: var(--gradient-primary);
        border-radius: 2px;
    }

    .header-decoration {
        position: absolute;
        top: 0;
        right: 0;
        width: 400px;
        height: 100%;
        pointer-events: none;
    }

    .header-decoration span {
        position: absolute;
        background: var(--gradient-primary);
        border-radius: 50%;
        opacity: 0.05;
        filter: blur(50px);
        animation: float 6s ease-in-out infinite;
    }

    .header-decoration span:nth-child(1) {
        top: -80px;
        right: -80px;
        width: 250px;
        height: 250px;
        animation-delay: 0s;
    }

    .header-decoration span:nth-child(2) {
        bottom: -100px;
        right: 0;
        width: 300px;
        height: 300px;
        animation-delay: 2s;
    }

    .header-decoration span:nth-child(3) {
        top: 50%;
        right: 150px;
        transform: translateY(-50%);
        width: 150px;
        height: 150px;
        animation-delay: 4s;
    }

    /* Main Card Premium */
    .main-card {
        border: none;
        border-radius: var(--border-radius-xl);
        background: white;
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        animation: fadeInUp 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .main-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-5px);
    }

    .main-card .card-header {
        background: white;
        border-bottom: 2px solid rgba(201, 42, 42, 0.1);
        padding: 1.8rem 2.2rem;
        position: relative;
        overflow: hidden;
    }

    .main-card .card-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(201, 42, 42, 0.02) 0%, transparent 100%);
        pointer-events: none;
    }

    .header-icon-wrapper {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        box-shadow: var(--shadow-lg);
        position: relative;
        overflow: hidden;
    }

    .header-icon-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    /* Glass Alert Premium */
    .glass-alert {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(201, 42, 42, 0.1);
        border-radius: 20px;
        padding: 1.2rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-md);
        animation: slideInDown 0.5s ease;
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
        background: var(--gradient-primary);
    }

    .alert-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .alert-icon {
        width: 45px;
        height: 45px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        animation: pulse 2s infinite;
    }

    .success-alert .alert-icon {
        background: linear-gradient(135deg, #d4edda, #c3e6cb);
        color: #155724;
    }

    .error-alert .alert-icon {
        background: linear-gradient(135deg, #f8d7da, #f5c6cb);
        color: #721c24;
    }

    .alert-message {
        color: #2d3748;
        font-weight: 500;
        font-size: 1rem;
    }

    /* Form Sections Premium */
    .form-section {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: 2.2rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(201, 42, 42, 0.1);
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    .form-section:nth-child(2) { animation-delay: 0.1s; }
    .form-section:nth-child(3) { animation-delay: 0.2s; }
    .form-section:nth-child(4) { animation-delay: 0.3s; }
    .form-section:nth-child(5) { animation-delay: 0.4s; }

    .form-section:hover {
        border-color: #c92a2a;
        box-shadow: var(--shadow-lg);
        transform: translateY(-3px);
    }

    .form-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 0;
        background: var(--gradient-primary);
        transition: height 0.3s ease;
    }

    .form-section:hover::before {
        height: 100%;
    }

    .form-section::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(201,42,42,0.03) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .form-section:hover::after {
        opacity: 1;
    }

    .section-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        padding-bottom: 1.2rem;
        border-bottom: 2px dashed rgba(201, 42, 42, 0.2);
        position: relative;
    }

    .section-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .section-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    .section-icon.whatsapp-icon {
        background: linear-gradient(135deg, #25D366, #128C7E);
    }

    .section-icon.delivery-icon {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    }

    .section-icon.social-icon {
        background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcaf45);
    }

    .section-icon:hover {
        transform: scale(1.1) rotate(5deg);
    }

    .section-title {
        font-size: 1.4rem;
        font-weight: 700;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin: 0;
        flex: 1;
    }

    .section-badge {
        background: var(--gradient-soft);
        color: #c92a2a;
        padding: 0.5rem 1.2rem;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        border: 1px solid rgba(201, 42, 42, 0.2);
        box-shadow: var(--shadow-sm);
    }

    /* Input Wrappers Premium */
    .input-wrapper {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .input-label {
        display: block;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.8rem;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
    }

    .input-wrapper:hover .input-label {
        color: #c92a2a;
        transform: translateX(5px);
    }

    .input-field {
        position: relative;
    }

    .form-control {
        width: 100%;
        padding: 1rem 1.3rem;
        font-size: 0.95rem;
        border: 2px solid #edf2f7;
        border-radius: 16px;
        background: white;
        transition: all 0.3s cubic-bezier(0.23, 1, 0.32, 1);
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: #1a202c;
    }

    .form-control:hover {
        border-color: #c92a2a;
        background: #fffaf0;
    }

    .form-control:focus {
        outline: none;
        border-color: #c92a2a;
        box-shadow: 0 0 0 4px rgba(201, 42, 42, 0.1);
        background: white;
        transform: translateY(-2px);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        background-image: none;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
        line-height: 1.6;
    }

    .input-hint {
        display: block;
        margin-top: 0.6rem;
        font-size: 0.8rem;
        color: #a0aec0;
        padding-left: 0.5rem;
        border-left: 2px solid #cbd5e0;
        transition: all 0.3s ease;
    }

    .input-wrapper:hover .input-hint {
        border-left-color: #c92a2a;
        color: #718096;
    }

    .error-feedback {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        padding: 0.5rem 1rem;
        background: #fff5f5;
        border-radius: 10px;
        border-left: 3px solid #dc3545;
        animation: shake 0.3s ease;
    }

    /* Form Actions Premium */
    .form-actions {
        display: flex;
        gap: 1.5rem;
        align-items: center;
        justify-content: flex-start;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 2px solid #edf2f7;
        position: relative;
    }

    .form-actions::before {
        content: '';
        position: absolute;
        top: -2px;
        left: 0;
        width: 100px;
        height: 3px;
        background: var(--gradient-primary);
        border-radius: 3px;
    }

    .btn-save, .btn-preview {
        padding: 1.1rem 2.8rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        font-family: 'Plus Jakarta Sans', sans-serif;
        position: relative;
        overflow: hidden;
    }

    .btn-save {
        background: var(--gradient-primary);
        color: white;
        box-shadow: var(--shadow-lg);
    }

    .btn-save::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }

    .btn-save:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: var(--shadow-xl);
        background: var(--gradient-hover);
    }

    .btn-save:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-save i {
        position: relative;
        z-index: 1;
        transition: transform 0.3s ease;
    }

    .btn-save:hover i {
        transform: scale(1.1);
    }

    .btn-preview {
        background: white;
        color: #c92a2a;
        border: 2px solid #c92a2a;
        box-shadow: var(--shadow-sm);
    }

    .btn-preview::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(201, 42, 42, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .btn-preview:hover {
        background: #fff5f5;
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
        border-color: #a61e1e;
    }

    .btn-preview:hover::before {
        left: 100%;
    }

    /* Animations */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @keyframes shimmer {
        0% { transform: translateX(-100%) rotate(45deg); }
        100% { transform: translateX(100%) rotate(45deg); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* Loading States */
    .btn-save.loading {
        pointer-events: none;
        opacity: 0.8;
    }

    .btn-save.loading i {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #ffe3e3;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #c92a2a, #a61e1e);
        border-radius: 10px;
        border: 2px solid #ffe3e3;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #a61e1e, #8b1a1a);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }

        .header-title {
            font-size: 1.5rem;
        }

        .header-title i {
            font-size: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-save, .btn-preview {
            width: 100%;
            padding: 1rem;
        }

        .form-section {
            padding: 1.5rem;
        }

        .section-header {
            flex-wrap: wrap;
        }

        .section-badge {
            margin-left: auto;
        }
    }

    /* Print Styles */
    @media print {
        .btn-save, .btn-preview, .header-decoration {
            display: none;
        }
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Auto dismiss alerts with smooth animation
    $('.glass-alert').delay(5000).fadeOut(500, function() {
        $(this).alert('close');
    });

    // Add floating labels effect
    $('.form-control').each(function() {
        if ($(this).val()) {
            $(this).addClass('filled');
        }
    });

    $('.form-control').on('focus blur', function(e) {
        $(this).toggleClass('focused', e.type === 'focus');
    });

    // Add loading state on form submit
    $('form').on('submit', function() {
        $('.btn-save').addClass('loading').html('<i class="fas fa-spinner me-2"></i> Menyimpan...');
    });

    // Smooth hover effects with enhanced animations
    $('.form-section').hover(
        function() {
            $(this).find('.section-icon').css('transform', 'scale(1.1) rotate(5deg)');
            $(this).find('.section-badge').css({
                'background': 'var(--gradient-primary)',
                'color': 'white',
                'border-color': 'transparent'
            });
        },
        function() {
            $(this).find('.section-icon').css('transform', 'scale(1) rotate(0)');
            $(this).find('.section-badge').css({
                'background': 'var(--gradient-soft)',
                'color': '#c92a2a',
                'border-color': 'rgba(201, 42, 42, 0.2)'
            });
        }
    );

    // Input animation with enhanced feedback
    $('.form-control').on('input', function() {
        $(this).css({
            'border-color': '#c92a2a',
            'box-shadow': '0 0 0 4px rgba(201, 42, 42, 0.1)'
        });
        setTimeout(() => {
            $(this).css({
                'border-color': '#edf2f7',
                'box-shadow': 'none'
            });
        }, 500);
    });

    // Add ripple effect to buttons
    $('.btn-save, .btn-preview').on('click', function(e) {
        let ripple = $('<span class="ripple"></span>');
        let x = e.pageX - $(this).offset().left;
        let y = e.pageY - $(this).offset().top;
        
        ripple.css({
            top: y,
            left: x,
            position: 'absolute',
            width: '0',
            height: '0',
            borderRadius: '50%',
            background: 'rgba(255, 255, 255, 0.3)',
            transform: 'translate(-50%, -50%)',
            animation: 'ripple 0.6s ease-out',
            pointerEvents: 'none'
        });
        
        $(this).append(ripple);
        
        setTimeout(() => {
            ripple.remove();
        }, 600);
    });

    // Add floating animation to header decoration
    function floatAnimation() {
        $('.header-decoration span').each(function(index) {
            $(this).css({
                'animation': `float ${6 + index}s ease-in-out infinite`,
                'animation-delay': `${index * 2}s`
            });
        });
    }
    
    floatAnimation();

    // Add parallax effect to header decoration
    $(window).on('mousemove', function(e) {
        let mouseX = e.pageX / $(window).width();
        let mouseY = e.pageY / $(window).height();
        
        $('.header-decoration span').each(function(index) {
            let speed = (index + 1) * 20;
            let x = (mouseX * speed) - (speed / 2);
            let y = (mouseY * speed) - (speed / 2);
            
            $(this).css({
                transform: `translate(${x}px, ${y}px)`
            });
        });
    });

    // Add smooth scroll to form sections
    $('.section-header').on('click', function() {
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 500);
    });

    // Add character counter for textarea
    $('textarea').on('input', function() {
        let length = $(this).val().length;
        let maxLength = $(this).attr('maxlength');
        
        if (maxLength) {
            let remaining = maxLength - length;
            if (!$(this).next('.char-counter').length) {
                $(this).after('<small class="char-counter"></small>');
            }
            $(this).next('.char-counter').text(`${remaining} karakter tersisa`);
            
            if (remaining < 50) {
                $(this).next('.char-counter').css('color', '#dc3545');
            } else {
                $(this).next('.char-counter').css('color', '#6c757d');
            }
        }
    });

    // Add tooltip for social media icons
    $('.input-label i[class*="fa-"]').tooltip({
        placement: 'top',
        title: function() {
            return $(this).parent().text().trim();
        }
    });

    // Add animation on page load
    $('.form-section').each(function(index) {
        let delay = index * 100;
        $(this).css('animation-delay', delay + 'ms');
    });

    // Add smooth transition for error messages
    $('.error-feedback').hide().fadeIn(300);
});
</script>

<style>
    /* Additional animations for ripple effect */
    @keyframes ripple {
        to {
            width: 300px;
            height: 300px;
            opacity: 0;
        }
    }

    /* Char counter styling */
    .char-counter {
        display: block;
        margin-top: 0.5rem;
        font-size: 0.8rem;
        color: #6c757d;
        transition: color 0.3s ease;
    }

    /* Tooltip customization */
    .tooltip {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .tooltip .tooltip-inner {
        background: var(--gradient-primary);
        border-radius: 10px;
        padding: 0.5rem 1rem;
    }

    .tooltip .arrow::before {
        border-top-color: #c92a2a;
    }

    /* Loading animation enhancement */
    .btn-save.loading i {
        animation: spin 1s linear infinite;
    }

    /* Focus visible outline for accessibility */
    *:focus-visible {
        outline: 2px solid #c92a2a;
        outline-offset: 2px;
    }

    /* Selection styling */
    ::selection {
        background: rgba(201, 42, 42, 0.2);
        color: #c92a2a;
    }

    /* Placeholder styling */
    .form-control::placeholder {
        color: #a0aec0;
        font-size: 0.9rem;
        font-style: italic;
        opacity: 0.7;
    }

    /* Gradient text for icons */
    .fab, .fas {
        transition: all 0.3s ease;
    }

    .input-wrapper:hover .fab,
    .input-wrapper:hover .fas {
        transform: scale(1.2);
    }
</style>
@endpush