{{-- resources/views/admin/promotions/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Promosi')
@section('page-title', 'Edit Promosi')

@section('styles')
<style>
    /* Premium Gradient Variables */
    :root {
        --gradient-primary: linear-gradient(135deg, #8B0000 0%, #B22222 50%, #DC143C 100%);
        --gradient-soft: linear-gradient(135deg, #FFF5F5 0%, #FFE4E4 100%);
        --gradient-card: linear-gradient(145deg, #FFFFFF 0%, #FFF8F8 100%);
        --gradient-hover: linear-gradient(135deg, #660000 0%, #8B0000 50%, #B22222 100%);
        --accent-red: #DC143C;
        --deep-red: #8B0000;
        --soft-red: #FFE4E1;
        --text-dark: #2D3436;
        --text-soft: #636E72;
        --shadow-sm: 0 4px 6px rgba(139, 0, 0, 0.05);
        --shadow-md: 0 8px 15px rgba(139, 0, 0, 0.1);
        --shadow-lg: 0 15px 30px rgba(139, 0, 0, 0.15);
        --border-radius: 16px;
    }

    /* Container Styling */
    .form-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Card Styling */
    .content-card {
        background: var(--gradient-card);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(220, 20, 60, 0.1);
        backdrop-filter: blur(10px);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .content-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg), 0 20px 40px rgba(139, 0, 0, 0.2);
    }

    /* Card Header */
    .card-header {
        background: var(--gradient-primary);
        padding: 25px 30px;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 100%);
        pointer-events: none;
    }

    .card-header h2 {
        margin: 0;
        color: white;
        font-size: 1.75rem;
        font-weight: 600;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        position: relative;
        z-index: 1;
    }

    /* Timezone Info */
    .timezone-info {
        background: var(--gradient-soft);
        border-left: 6px solid var(--accent-red);
        padding: 15px 20px;
        border-radius: 12px;
        margin: 20px 25px;
        box-shadow: var(--shadow-sm);
        animation: slideIn 0.5s ease;
    }

    .timezone-info i {
        color: var(--deep-red);
        font-size: 1.2rem;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 1rem;
    }

    .form-group label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
    }

    .form-control {
        border: 2px solid #FFE4E1;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        border-color: var(--accent-red);
        box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
        outline: none;
    }

    .form-control.is-invalid {
        border-color: #E74C3C;
        background-image: none;
    }

    .invalid-feedback {
        color: #E74C3C;
        font-size: 0.875rem;
        margin-top: 5px;
        font-weight: 500;
    }

    /* Input Group */
    .input-group {
        border-radius: 12px;
        overflow: hidden;
    }

    .input-group-text {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 12px 20px;
        font-weight: 600;
    }

    .input-group .form-control {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    /* Text Muted */
    .text-muted {
        color: var(--text-soft) !important;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }

    /* Image Preview */
    .image-preview-container {
        background: var(--gradient-soft);
        border-radius: 12px;
        padding: 20px;
        border: 2px dashed var(--accent-red);
        transition: all 0.3s ease;
    }

    .image-preview-container:hover {
        border-color: var(--deep-red);
        background: #FFF0F0;
    }

    .image-preview {
        width: 100%;
        max-height: 250px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: var(--shadow-md);
        transition: transform 0.3s ease;
    }

    .image-preview:hover {
        transform: scale(1.02);
    }

    /* Alert Boxes */
    .alert {
        border-radius: 16px;
        border: none;
        padding: 20px;
        margin-top: 20px;
        position: relative;
        overflow: hidden;
    }

    .alert-info {
        background: linear-gradient(135deg, #FFF0F5 0%, #FFE4E8 100%);
        border-left: 6px solid var(--deep-red);
        color: var(--text-dark);
    }

    .alert-warning {
        background: linear-gradient(135deg, #FFF3E0 0%, #FFE9D6 100%);
        border-left: 6px solid #FF6B6B;
        color: var(--text-dark);
    }

    .alert i {
        color: var(--deep-red);
        font-size: 1.2rem;
    }

    .badge {
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .badge.bg-success {
        background: linear-gradient(135deg, #28A745 0%, #20B2AA 100%);
    }

    .badge.bg-warning {
        background: linear-gradient(135deg, #FFC107 0%, #FFA500 100%);
    }

    .badge.bg-danger {
        background: linear-gradient(135deg, #DC3545 0%, #C82333 100%);
    }

    /* Form Check Switch */
    .form-check-input {
        width: 50px;
        height: 25px;
        margin-top: 8px;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: var(--deep-red);
        border-color: var(--deep-red);
    }

    .form-check-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-left: 10px;
        cursor: pointer;
    }

    /* Buttons */
    .btn-admin {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
    }

    .btn-admin:hover {
        background: var(--gradient-hover);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-admin-outline {
        background: transparent;
        color: var(--deep-red);
        border: 2px solid var(--deep-red);
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-admin-outline:hover {
        background: var(--gradient-soft);
        color: var(--deep-red);
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    /* Row and Column spacing */
    .row {
        margin: 0 15px;
    }

    .col-md-4, .col-md-6, .col-md-8, .col-md-12 {
        padding: 10px;
    }

    /* HR Styling */
    hr {
        margin: 25px 30px;
        border: none;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--accent-red), transparent);
    }

    /* Animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* List styling in alerts */
    .alert ul {
        list-style: none;
        padding-left: 0;
        margin-top: 15px;
    }

    .alert ul li {
        padding: 8px 0;
        border-bottom: 1px solid rgba(139, 0, 0, 0.1);
    }

    .alert ul li:last-child {
        border-bottom: none;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .card-header {
            padding: 20px;
        }
        
        .card-header h2 {
            font-size: 1.5rem;
        }
        
        .row {
            margin: 0;
        }
        
        .btn-admin, .btn-admin-outline {
            padding: 10px 20px;
            width: 100%;
            margin: 5px 0;
        }
        
        .d-flex {
            flex-direction: column;
            gap: 10px;
        }
    }

    /* Additional aesthetic touches */
    .form-control::placeholder {
        color: #B2BEC3;
        font-size: 0.9rem;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #FFE4E1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #8B0000 0%, #B22222 100%);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #8B0000;
    }

    /* Focus state for better accessibility */
    *:focus {
        outline: none;
    }

    /* Small animation for form elements */
    .form-control, .btn-admin, .btn-admin-outline, .alert {
        animation: fadeInUp 0.5s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit Promosi: {{ $promotion->title }}</h2>
        </div>
        
        {{-- Info Timezone --}}
        <div class="timezone-info">
            <i class="fas fa-info-circle"></i>
            <strong>Timezone:</strong> {{ config('app.timezone') }} 
            (Waktu sekarang: {{ \Carbon\Carbon::now(config('app.timezone'))->format('d M Y H:i:s') }})
        </div>
        
        <form action="{{ route('admin.promotions.update', $promotion->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="title">Judul Promosi *</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title', $promotion->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="description">Deskripsi *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" required>{{ old('description', $promotion->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="current_price">Harga Promosi *</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('current_price') is-invalid @enderror" 
                                           id="current_price" name="current_price" min="0" 
                                           value="{{ old('current_price', $promotion->current_price) }}" required>
                                </div>
                                @error('current_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="old_price">Harga Asli (Sebelum Diskon)</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('old_price') is-invalid @enderror" 
                                           id="old_price" name="old_price" min="0" 
                                           value="{{ old('old_price', $promotion->old_price) }}">
                                </div>
                                <small class="text-muted">Kosongkan jika tidak ada diskon</small>
                                @error('old_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="badge_text">Teks Badge *</label>
                                <input type="text" class="form-control @error('badge_text') is-invalid @enderror" 
                                       id="badge_text" name="badge_text" value="{{ old('badge_text', $promotion->badge_text) }}" required>
                                <small class="text-muted">Contoh: PROMO SPESIAL, PAKET KELUARGA, BUY 1 GET 1</small>
                                @error('badge_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="button_text">Teks Tombol *</label>
                                <input type="text" class="form-control @error('button_text') is-invalid @enderror" 
                                       id="button_text" name="button_text" value="{{ old('button_text', $promotion->button_text) }}" required>
                                <small class="text-muted">Contoh: Pesan Sekarang, Lihat Paket, Lihat Menu</small>
                                @error('button_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="start_date">Tanggal Mulai *</label>
                                <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" 
                                       value="{{ old('start_date', $promotion->start_date instanceof \Carbon\Carbon ? $promotion->start_date->format('Y-m-d\TH:i') : date('Y-m-d\TH:i', strtotime($promotion->start_date))) }}" 
                                       required>
                                <small class="text-muted d-block">
                                    <i class="fas fa-clock"></i> Timezone: {{ config('app.timezone') }}
                                </small>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="end_date">Tanggal Berakhir *</label>
                                <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" 
                                       value="{{ old('end_date', $promotion->end_date instanceof \Carbon\Carbon ? $promotion->end_date->format('Y-m-d\TH:i') : date('Y-m-d\TH:i', strtotime($promotion->end_date))) }}" 
                                       required>
                                <small class="text-muted d-block">
                                    <i class="fas fa-clock"></i> Timezone: {{ config('app.timezone') }}
                                </small>
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="sort_order">Urutan</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                       id="sort_order" name="sort_order" min="0" 
                                       value="{{ old('sort_order', $promotion->sort_order) }}">
                                <small class="text-muted">Semakin kecil angka, semakin awal tampil</small>
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="form-check form-switch mt-4">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                       {{ old('is_active', $promotion->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktifkan Promosi</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="image_url">URL Gambar *</label>
                        <input type="url" class="form-control @error('image_url') is-invalid @enderror" 
                               id="image_url" name="image_url" value="{{ old('image_url', $promotion->image_url) }}" 
                               required placeholder="https://...">
                        <small class="text-muted">Masukkan URL gambar dari Unsplash atau sumber lain</small>
                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <div class="image-preview-container mt-3 show">
                            <label class="form-label">Preview Gambar:</label>
                            <img src="{{ old('image_url', $promotion->image_url) }}" class="image-preview" id="image-preview" 
                                 onerror="this.src='https://via.placeholder.com/400x200?text=Gambar+Tidak+Ditemukan'">
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.promotions.index') }}" class="btn btn-admin-outline">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-admin">
                    <i class="fas fa-save"></i> Update Promosi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageUrl = document.getElementById('image_url');
    const previewImage = document.getElementById('image-preview');
    
    function updatePreview() {
        const url = imageUrl.value.trim();
        if (url) {
            previewImage.src = url;
            // Add loading animation
            previewImage.style.opacity = '0.5';
            previewImage.onload = function() {
                previewImage.style.opacity = '1';
            }
        }
    }
    
    imageUrl.addEventListener('input', updatePreview);
    
    // Validate old_price > current_price
    const currentPrice = document.getElementById('current_price');
    const oldPrice = document.getElementById('old_price');
    
    function validatePrices() {
        if (oldPrice.value && currentPrice.value) {
            if (parseFloat(oldPrice.value) <= parseFloat(currentPrice.value)) {
                oldPrice.setCustomValidity('Harga asli harus lebih besar dari harga promosi');
                oldPrice.reportValidity();
            } else {
                oldPrice.setCustomValidity('');
            }
        } else {
            oldPrice.setCustomValidity('');
        }
    }
    
    currentPrice.addEventListener('input', validatePrices);
    oldPrice.addEventListener('input', validatePrices);
    
    // Validate end_date > start_date
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    
    function validateDates() {
        if (startDate.value && endDate.value) {
            const start = new Date(startDate.value);
            const end = new Date(endDate.value);
            
            if (end <= start) {
                endDate.setCustomValidity('Tanggal berakhir harus setelah tanggal mulai');
                endDate.reportValidity();
            } else {
                endDate.setCustomValidity('');
            }
        } else {
            endDate.setCustomValidity('');
        }
    }
    
    startDate.addEventListener('change', validateDates);
    endDate.addEventListener('input', validateDates);
    
    // Set minimum date untuk end_date berdasarkan start_date
    startDate.addEventListener('change', function() {
        endDate.min = this.value;
        validateDates();
    });
    
    // Validasi form sebelum submit
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        validatePrices();
        validateDates();
        
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        form.classList.add('was-validated');
    });

    // Add smooth animation for form fields
    const formControls = document.querySelectorAll('.form-control');
    formControls.forEach(control => {
        control.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        
        control.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });
});
</script>
@endsection