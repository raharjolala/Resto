@extends('layouts.admin')

@section('title', 'Tambah Menu Baru')
@section('page-title', 'Tambah Menu Baru')

@section('styles')
<style>
    /* ===== PREMIUM RED GRADIENT THEME ===== */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    
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
        --shadow-inner: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        
        /* Border Radius */
        --radius-xs: 8px;
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
        background: #fafafa;
    }

    /* ===== MAIN CONTAINER ===== */
    .content-card {
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        animation: slideIn 0.5s ease;
    }

    .content-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        z-index: 10;
    }

    /* ===== HEADER SECTION ===== */
    .card-header {
        background: var(--gradient-glass);
        padding: 2rem 2.5rem;
        border-bottom: 1px solid rgba(220, 20, 60, 0.1);
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, var(--red-100) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.5;
        pointer-events: none;
        animation: float 10s ease-in-out infinite;
    }

    .card-header::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: -10%;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, var(--red-200) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.3;
        pointer-events: none;
        animation: float 15s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(20px, -20px) rotate(5deg); }
        66% { transform: translate(-10px, 10px) rotate(-5deg); }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-header h2 {
        font-size: 2rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
        position: relative;
        z-index: 2;
    }

    .card-header p {
        color: #666;
        font-size: 0.95rem;
        margin-bottom: 0;
        position: relative;
        z-index: 2;
    }

    .card-header p i {
        color: var(--red-500);
        margin-right: 5px;
    }

    /* ===== ALERT STYLES ===== */
    .alert-danger {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        border: 1px solid var(--red-300);
        border-radius: var(--radius-lg);
        padding: 1.5rem 2rem;
        margin: 2rem 2.5rem;
        color: var(--red-700);
        position: relative;
        overflow: hidden;
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .alert-danger::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-primary);
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .alert-danger li {
        padding: 5px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-danger li::before {
        content: '•';
        color: var(--red-500);
        font-weight: bold;
        font-size: 1.5rem;
    }

    /* ===== FORM STYLES ===== */
    form {
        padding: 2.5rem;
    }

    .form-group {
        margin-bottom: 1.8rem;
        animation: fadeIn 0.5s ease;
        animation-fill-mode: both;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }
    .form-group:nth-child(5) { animation-delay: 0.5s; }

    .form-group label {
        font-weight: 600;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
    }

    .form-group label i {
        color: var(--red-500);
        font-size: 1rem;
    }

    .text-danger {
        color: var(--red-500) !important;
        font-size: 0.85rem;
        font-weight: 500;
    }

    /* ===== FORM CONTROLS ===== */
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: var(--radius-md);
        padding: 0.9rem 1.2rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
        color: #1a1a1a;
    }

    .form-control:hover, .form-select:hover {
        border-color: var(--red-300);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--red-500);
        box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
        outline: none;
    }

    .form-control.is-invalid, .form-select.is-invalid {
        border-color: var(--red-500);
        background-image: none;
    }

    .invalid-feedback {
        color: var(--red-500);
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .invalid-feedback::before {
        content: '⚠️';
        font-size: 0.85rem;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
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
    }

    .url-preview-icon:hover {
        color: white;
        background: var(--gradient-primary);
        transform: scale(1.1);
        box-shadow: var(--shadow-md);
    }

    /* ===== SAMPLE URL BUTTONS ===== */
    .sample-urls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 12px;
    }

    .sample-url-btn {
        background: linear-gradient(145deg, #f8f9fa, #e9ecef);
        border: 1px solid rgba(220, 20, 60, 0.2);
        border-radius: var(--radius-full);
        padding: 0.6rem 1.2rem;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        color: #495057;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sample-url-btn i {
        color: var(--red-500);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .sample-url-btn:hover {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .sample-url-btn:hover i {
        color: white;
    }

    /* ===== IMAGE PREVIEW ===== */
    .image-preview-container {
        margin-top: 20px;
        padding: 20px;
        background: var(--gradient-glass);
        border-radius: var(--radius-lg);
        border: 2px dashed rgba(220, 20, 60, 0.3);
        text-align: center;
        transition: all 0.3s ease;
        animation: fadeIn 0.5s ease;
    }

    .image-preview-container:hover {
        border-color: var(--red-500);
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
    }

    .image-preview-container h6 {
        font-weight: 600;
        color: var(--red-700);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .image-preview-container h6 i {
        font-size: 1.2rem;
    }

    .image-preview {
        max-width: 100%;
        max-height: 250px;
        object-fit: contain;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        transition: all 0.3s ease;
        border: 4px solid white;
    }

    .image-preview:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-xl);
    }

    /* ===== SWITCH BUTTONS ===== */
    .form-check {
        padding: 1rem;
        background: var(--gradient-glass);
        border-radius: var(--radius-md);
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 70px;
    }

    .form-check:hover {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        border-color: var(--red-300);
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .form-check-input {
        width: 3rem;
        height: 1.5rem;
        margin: 0;
        cursor: pointer;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23DC143C'/%3e%3c/svg%3e");
        transition: all 0.3s ease;
    }

    .form-check-input:checked {
        background-color: var(--red-500);
        border-color: var(--red-500);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='white'/%3e%3c/svg%3e");
    }

    .form-check-input:focus {
        border-color: var(--red-500);
        box-shadow: 0 0 0 0.25rem rgba(220, 20, 60, 0.25);
    }

    .form-check-label {
        font-weight: 600;
        color: #2c3e50;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 0.95rem;
    }

    .form-check-label i {
        color: var(--red-500);
        font-size: 1rem;
    }

    /* ===== BUTTON STYLES ===== */
    .btn-admin {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.9rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
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
        background: transparent;
        color: var(--red-600);
        border: 2px solid var(--red-500);
        padding: 0.9rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .btn-admin-outline:hover {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-secondary {
        background: linear-gradient(145deg, #6c757d, #5a6268);
        color: white;
        border: none;
        padding: 0.9rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-secondary:hover {
        background: linear-gradient(145deg, #5a6268, #495057);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* ===== BUTTON GROUP ===== */
    .d-flex.justify-content-between {
        margin-top: 2.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid rgba(220, 20, 60, 0.1);
    }

    .d-flex.justify-content-between > div {
        display: flex;
        gap: 10px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .card-header {
            padding: 1.5rem;
        }

        form {
            padding: 1.5rem;
        }

        .alert-danger {
            margin: 1.5rem;
            padding: 1rem;
        }

        .btn-admin, .btn-admin-outline, .btn-secondary {
            padding: 0.8rem 1.5rem;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 1rem;
        }

        .d-flex.justify-content-between > div {
            justify-content: flex-end;
        }
    }

    /* ===== ADDITIONAL STYLES ===== */
    .text-muted {
        color: #6c757d !important;
        font-size: 0.85rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .text-muted i {
        color: var(--red-400);
    }

    .row {
        margin-bottom: 0;
    }

    .col-md-6, .col-md-4 {
        margin-bottom: 0;
    }

    /* Loading animation for buttons */
    .btn-admin:active {
        transform: scale(0.98);
    }

    /* Focus styles for better accessibility */
    .btn:focus, .form-control:focus, .form-select:focus {
        outline: none;
    }

    /* Disabled state */
    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="content-card">
        <div class="card-header">
            <h2>
                <i class="fas fa-plus-circle"></i>
                Tambah Menu Baru
            </h2>
            <p>
                <i class="fas fa-home"></i>
                Admin / <span style="color: var(--red-500); font-weight: 600;">Tambah Menu Baru</span>
            </p>
        </div>
        
        @if($errors->any())
            <div class="alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.menu.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">
                            <i class="fas fa-utensils"></i>
                            Nama Menu <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               placeholder="Contoh: Nasi Goreng Spesial"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id">
                            <i class="fas fa-tag"></i>
                            Kategori <span class="text-danger">*</span>
                        </label>
                        <select class="form-select @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="description">
                    <i class="fas fa-align-left"></i>
                    Deskripsi
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" 
                          name="description" 
                          rows="3" 
                          placeholder="Jelaskan detail menu...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">
                            <i class="fas fa-money-bill-wave"></i>
                            Harga <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" style="background: var(--gradient-soft); border: 2px solid #e9ecef; border-right: none; border-radius: var(--radius-md) 0 0 var(--radius-md); color: var(--red-600); font-weight: 600;">Rp</span>
                            <input type="number" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   id="price" 
                                   name="price" 
                                   min="0" 
                                   value="{{ old('price') }}" 
                                   placeholder="0"
                                   style="border-left: none; border-radius: 0 var(--radius-md) var(--radius-md) 0;"
                                   required>
                        </div>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">
                            <i class="fas fa-image"></i>
                            URL Gambar Menu
                        </label>
                        <div class="url-input-group">
                            <input type="url" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   value="{{ old('image') }}" 
                                   placeholder="https://example.com/image.jpg"
                                   onchange="showPreview(this.value)">
                            <i class="fas fa-eye url-preview-icon" onclick="previewUrl()" title="Preview Gambar"></i>
                        </div>
                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i>
                            Masukkan URL gambar (contoh: https://images.unsplash.com/...)
                        </small>
                        
                        <!-- Sample URLs for quick selection -->
                        <div class="sample-urls">
                            <span class="sample-url-btn" onclick="useSampleUrl('https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80')">
                                <i class="fas fa-drumstick-bite"></i> Rendang
                            </span>
                            <span class="sample-url-btn" onclick="useSampleUrl('https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80')">
                                <i class="fas fa-pizza-slice"></i> Pizza
                            </span>
                            <span class="sample-url-btn" onclick="useSampleUrl('https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80')">
                                <i class="fas fa-cocktail"></i> Minuman
                            </span>
                        </div>
                        
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Image Preview -->
            <div class="image-preview-container" id="previewContainer">
                <h6>
                    <i class="fas fa-eye"></i>
                    Preview Gambar:
                </h6>
                <img src="" class="image-preview" id="imagePreview" alt="Preview" onerror="this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
            </div>
            
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_available" 
                               name="is_available" 
                               value="1" 
                               {{ old('is_available', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">
                            <i class="fas fa-check-circle"></i>
                            Tersedia
                        </label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">
                            <i class="fas fa-star"></i>
                            Tampilkan sebagai Fitur
                        </label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sort_order">
                            <i class="fas fa-sort-numeric-down"></i>
                            Urutan Tampil
                        </label>
                        <input type="number" 
                               class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" 
                               name="sort_order" 
                               min="0" 
                               value="{{ old('sort_order', 0) }}"
                               placeholder="0">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('admin.menu.index') }}" class="btn-admin-outline">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <div>
                    <button type="reset" class="btn-secondary">
                        <i class="fas fa-undo-alt"></i>
                        Reset
                    </button>
                    <button type="submit" class="btn-admin">
                        <i class="fas fa-save"></i>
                        Simpan Menu
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function showPreview(url) {
        const previewContainer = document.getElementById('previewContainer');
        const preview = document.getElementById('imagePreview');
        
        if (url && url.trim() !== '') {
            preview.src = url;
            previewContainer.style.display = 'block';
            previewContainer.style.animation = 'fadeIn 0.5s ease';
        } else {
            previewContainer.style.display = 'none';
        }
    }
    
    function previewUrl() {
        const urlInput = document.getElementById('image');
        if (urlInput.value && urlInput.value.trim() !== '') {
            showPreview(urlInput.value);
        } else {
            // Sweet alert for empty URL
            Swal.fire({
                icon: 'info',
                title: 'URL Kosong',
                text: 'Masukkan URL gambar terlebih dahulu!',
                timer: 2000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true,
                background: 'white',
                iconColor: '#DC143C'
            });
        }
    }
    
    function useSampleUrl(url) {
        document.getElementById('image').value = url;
        showPreview(url);
        
        // Add animation to the input
        const input = document.getElementById('image');
        input.style.transform = 'scale(1.02)';
        input.style.borderColor = '#DC143C';
        setTimeout(() => {
            input.style.transform = 'scale(1)';
        }, 200);
    }
    
    // Handle image load error
    document.getElementById('imagePreview').onerror = function() {
        this.src = 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';
    };
    
    // Show preview if there's old input value
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        if (imageInput.value && imageInput.value.trim() !== '') {
            showPreview(imageInput.value);
        }
        
        // Add floating labels effect
        const inputs = document.querySelectorAll('.form-control, .form-select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('label')?.classList.add('text-danger');
            });
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('label')?.classList.remove('text-danger');
            });
        });
    });
    
    // Validate URL before form submit
    document.querySelector('form').addEventListener('submit', function(e) {
        const imageInput = document.getElementById('image');
        if (imageInput.value && imageInput.value.trim() !== '') {
            try {
                new URL(imageInput.value);
            } catch (_) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'URL Tidak Valid',
                    text: 'Pastikan URL diawali dengan http:// atau https://',
                    confirmButtonColor: '#DC143C'
                });
            }
        }
    });

    // Add animation to checkboxes
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            this.closest('.form-check').style.transform = 'scale(1.02)';
            setTimeout(() => {
                this.closest('.form-check').style.transform = 'scale(1)';
            }, 200);
        });
    });
</script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection