@extends('layouts.admin')

@section('title', 'Edit Gallery')
@section('page-title', 'Edit Gallery')

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
        padding: 2rem;
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

    /* ===== HEADER SECTION ===== */
    .card-header {
        background: transparent;
        padding: 0;
        margin-bottom: 2rem;
        border: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .card-header h2 {
        font-size: 2rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header h2 i {
        font-size: 2.2rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 8px rgba(220, 20, 60, 0.3));
    }

    /* Edit Badge */
    .edit-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--gradient-soft);
        color: var(--red-700);
        padding: 0.4rem 1.2rem;
        border-radius: var(--radius-full);
        font-size: 0.9rem;
        font-weight: 600;
        margin-left: 1rem;
        border: 1px solid var(--red-200);
        box-shadow: var(--shadow-sm);
    }

    .edit-badge i {
        color: var(--red-500);
    }

    /* ===== BUTTON STYLES ===== */
    .btn-secondary {
        background: linear-gradient(145deg, #6c757d, #5a6268);
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        box-shadow: var(--shadow-sm);
    }

    .btn-secondary:hover {
        background: linear-gradient(145deg, #5a6268, #495057);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-secondary i {
        transition: transform 0.3s ease;
    }

    .btn-secondary:hover i {
        transform: translateX(-5px);
    }

    .btn-primary {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.8rem 2.5rem;
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

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary i {
        transition: transform 0.3s ease;
    }

    .btn-primary:hover i {
        transform: scale(1.2);
    }

    /* ===== ALERT STYLES ===== */
    .alert-danger {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        border: 1px solid var(--red-300);
        border-radius: var(--radius-lg);
        padding: 1.2rem 1.8rem;
        color: var(--red-700);
        position: relative;
        overflow: hidden;
        animation: slideDown 0.3s ease;
        margin-bottom: 2rem;
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

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .alert-danger li {
        padding: 2px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .alert-danger li::before {
        content: '•';
        color: var(--red-500);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .btn-close {
        filter: brightness(0.5);
        transition: all 0.3s ease;
    }

    .btn-close:hover {
        filter: brightness(0.2);
        transform: rotate(90deg);
    }

    /* ===== FORM STYLES ===== */
    form {
        position: relative;
    }

    .mb-3 {
        margin-bottom: 1.8rem !important;
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

    /* Stagger animation */
    .mb-3:nth-child(1) { animation-delay: 0.1s; }
    .mb-3:nth-child(2) { animation-delay: 0.2s; }
    .mb-3:nth-child(3) { animation-delay: 0.3s; }
    .mb-3:nth-child(4) { animation-delay: 0.4s; }
    .mb-3:nth-child(5) { animation-delay: 0.5s; }

    /* ===== FORM LABELS ===== */
    .form-label {
        font-weight: 700 !important;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
    }

    .form-label i {
        color: var(--red-500);
        font-size: 1rem;
    }

    .text-danger {
        color: var(--red-500) !important;
        font-size: 0.85rem;
        font-weight: 600;
    }

    /* ===== FORM CONTROLS ===== */
    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: var(--radius-md);
        padding: 0.8rem 1.2rem;
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
        animation: shake 0.3s ease;
    }

    .invalid-feedback::before {
        content: '⚠️';
        font-size: 0.85rem;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    /* ===== FORM TEXT ===== */
    .form-text {
        color: #6c757d;
        font-size: 0.8rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-text i {
        color: var(--red-400);
    }

    .form-text.text-info {
        color: var(--red-600) !important;
        background: var(--gradient-soft);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-full);
        border: 1px solid var(--red-200);
    }

    /* ===== SWITCH BUTTON ===== */
    .form-check {
        padding: 1rem;
        background: var(--gradient-glass);
        border-radius: var(--radius-md);
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 60px;
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

    /* ===== CURRENT IMAGE CARD ===== */
    .border.rounded.p-2.bg-light {
        background: var(--gradient-glass) !important;
        border: 2px dashed var(--red-300) !important;
        border-radius: var(--radius-lg) !important;
        padding: 1.5rem !important;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .border.rounded.p-2.bg-light:hover {
        border-color: var(--red-500) !important;
        background: linear-gradient(145deg, #fff5f5, #ffe4e8) !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .border.rounded.p-2.bg-light img {
        border-radius: var(--radius-md) !important;
        box-shadow: var(--shadow-lg);
        transition: all 0.3s ease;
        border: 4px solid white !important;
    }

    .border.rounded.p-2.bg-light img:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-xl);
    }

    .border.rounded.p-2.bg-light p {
        background: var(--gradient-soft);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        color: var(--red-700) !important;
        border: 1px solid var(--red-200);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin-top: 1rem;
    }

    .border.rounded.p-2.bg-light p i {
        color: var(--red-500);
    }

    /* Empty image state */
    .border.rounded.p-2.bg-light .py-4 {
        padding: 2rem !important;
    }

    .border.rounded.p-2.bg-light .fa-image {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .border.rounded.p-2.bg-light .mt-2 {
        color: var(--red-600);
        font-weight: 500;
    }

    /* ===== PREVIEW IMAGE ===== */
    #newImagePreview {
        margin-top: 1.5rem !important;
        padding: 1.5rem;
        background: var(--gradient-glass);
        border-radius: var(--radius-lg);
        border: 2px dashed rgba(220, 20, 60, 0.3);
        text-align: center;
        transition: all 0.3s ease;
        animation: fadeIn 0.5s ease;
    }

    #newImagePreview:hover {
        border-color: var(--red-500);
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
    }

    #newImagePreview hr {
        display: none;
    }

    #newImagePreview p {
        font-weight: 700;
        color: var(--red-700);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    #newImagePreview p::before {
        content: '\f03e';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        color: var(--red-500);
    }

    #preview {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        transition: all 0.3s ease;
        border: 4px solid white;
    }

    #preview:hover {
        transform: scale(1.02);
        box-shadow: var(--shadow-xl);
    }

    /* ===== DIVIDER ===== */
    hr {
        margin: 2rem 0;
        border: none;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--red-200), transparent);
        opacity: 0.5;
    }

    /* ===== FORM ACTIONS ===== */
    .text-end {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .content-card {
            padding: 1.5rem;
        }

        .card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: start;
        }

        .card-header h2 {
            font-size: 1.5rem;
        }

        .edit-badge {
            margin-left: 0;
            margin-top: 0.5rem;
        }

        .btn-secondary, .btn-primary {
            width: 100%;
            justify-content: center;
        }

        .text-end {
            flex-direction: column;
        }

        .text-end a, .text-end button {
            width: 100%;
            justify-content: center;
        }

        .row {
            margin: 0;
        }

        .col-md-8, .col-md-6, .col-md-4 {
            padding: 0;
        }

        .border.rounded.p-2.bg-light img {
            max-height: 150px;
        }
    }

    /* ===== COLUMN SPACING ===== */
    .row {
        margin: 0 -12px;
    }

    .col-md-8, .col-md-6, .col-md-4 {
        padding: 0 12px;
    }

    /* ===== URL INPUT SPECIAL STYLING ===== */
    #image_url {
        font-family: monospace;
        letter-spacing: 0.3px;
    }

    #image_url:valid {
        border-color: #28a745;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    /* ===== LOADING ANIMATION ===== */
    .btn-primary:active {
        transform: scale(0.98);
    }

    /* ===== CATEGORY SELECT ICONS ===== */
    select.form-select option {
        padding: 0.5rem;
    }

    select.form-select option[value="food"] {
        background-image: url('data:image/svg+xml;utf8,<i class="fas fa-utensils"></i>');
    }
</style>
@endsection

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2>
            <i class="fas fa-edit"></i>
            Edit Foto Gallery
            <span class="edit-badge">
                <i class="fas fa-image"></i>
                ID: #{{ $gallery->id }}
            </span>
        </h2>
        <a href="{{ route('admin.gallery.index') }}" class="btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    @if($errors->any())
    <div class="alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="mt-4">
        <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <!-- Title (caption) -->
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <i class="fas fa-heading"></i>
                            Judul Foto <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $gallery->caption) }}" 
                               placeholder="Masukkan judul foto..."
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            <i class="fas fa-align-left"></i>
                            Deskripsi
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4"
                                  placeholder="Jelaskan tentang foto ini...">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <!-- Category -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">
                                    <i class="fas fa-tag"></i>
                                    Kategori
                                </label>
                                <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                    <option value="food" {{ old('category', $gallery->category) == 'food' ? 'selected' : '' }}>
                                        🍽️ Makanan & Minuman
                                    </option>
                                    <option value="facility" {{ old('category', $gallery->category) == 'facility' ? 'selected' : '' }}>
                                        🏢 Fasilitas
                                    </option>
                                    <option value="event" {{ old('category', $gallery->category) == 'event' ? 'selected' : '' }}>
                                        📅 Acara
                                    </option>
                                    <option value="interior" {{ old('category', $gallery->category) == 'interior' ? 'selected' : '' }}>
                                        🛋️ Interior
                                    </option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">
                                    <i class="fas fa-toggle-on"></i>
                                    Status
                                </label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        <i class="fas fa-check-circle"></i>
                                        Aktif (ditampilkan di halaman publik)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <!-- Current Image -->
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-image"></i>
                            Foto Saat Ini
                        </label>
                        <div class="border rounded p-2 bg-light">
                            @if($gallery->image_path)
                                <img src="{{ $gallery->image_path }}" 
                                     alt="{{ $gallery->caption }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 200px; width: 100%; object-fit: contain;"
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/300x200/FFE4E8/DC143C?text=Image+Error';">
                                <p class="mt-2 text-muted small">
                                    <i class="fas fa-link"></i>
                                    {{ Str::limit($gallery->image_path, 40) }}
                                </p>
                            @else
                                <div class="py-4 text-center">
                                    <i class="fas fa-image fa-4x"></i>
                                    <p class="mt-2">Tidak ada gambar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- New Image URL -->
                    <div class="mb-3">
                        <label for="image_url" class="form-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            URL Gambar Baru
                        </label>
                        <input type="url" 
                               class="form-control @error('image_url') is-invalid @enderror" 
                               id="image_url" 
                               name="image_url" 
                               value="{{ old('image_url') }}"
                               placeholder="https://example.com/gambar-baru.jpg"
                               onchange="previewNewImageFromUrl(this)">
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text text-info">
                            <i class="fas fa-info-circle"></i>
                            Kosongkan jika tidak ingin mengganti URL gambar
                        </div>
                        
                        <!-- Preview New Image -->
                        <div id="newImagePreview" class="mt-2 text-center" style="display: none;">
                            <p class="mb-2 fw-bold">Preview URL Baru</p>
                            <img id="preview" src="#" alt="Preview" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div class="text-end">
                <a href="{{ route('admin.gallery.index') }}" class="btn-secondary">
                    <i class="fas fa-times"></i>
                    Batal
                </a>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function previewNewImageFromUrl(input) {
    const url = input.value.trim();
    const previewContainer = document.getElementById('newImagePreview');
    const previewImg = document.getElementById('preview');
    
    if (url) {
        // Show preview container with animation
        previewContainer.style.display = 'block';
        previewContainer.style.animation = 'fadeIn 0.5s ease';
        
        // Set preview image source
        previewImg.src = url;
        
        // Handle image load error
        previewImg.onerror = function() {
            this.src = 'https://via.placeholder.com/300x200/FFE4E8/DC143C?text=URL+Tidak+Valid';
            this.style.border = '2px solid #DC143C';
            
            // Show error toast
            Swal.fire({
                icon: 'error',
                title: 'URL Tidak Valid',
                text: 'Gambar tidak dapat dimuat. Periksa kembali URL gambar.',
                timer: 3000,
                showConfirmButton: false,
                position: 'top-end',
                toast: true,
                background: 'white',
                iconColor: '#DC143C'
            });
        };
        
        // Add success styling
        previewImg.onload = function() {
            this.style.border = '4px solid white';
        };
        
    } else {
        // Hide preview if URL is empty
        previewContainer.style.display = 'none';
    }
}

// Preview on page load if there's old input
document.addEventListener('DOMContentLoaded', function() {
    const urlInput = document.getElementById('image_url');
    if (urlInput.value && urlInput.value.trim() !== '') {
        previewNewImageFromUrl(urlInput);
    }
    
    // Add floating labels effect
    const inputs = document.querySelectorAll('.form-control, .form-select');
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
    const alerts = document.querySelectorAll('.alert-danger');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity 0.5s ease';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
    });
}, 5000);

// Confirm before leaving with unsaved changes
let formChanged = false;

document.querySelectorAll('input, select, textarea').forEach(input => {
    input.addEventListener('change', () => {
        formChanged = true;
    });
});

window.addEventListener('beforeunload', function(e) {
    if (formChanged) {
        e.preventDefault();
        e.returnValue = '';
    }
});
</script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection