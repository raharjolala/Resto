{{-- resources/views/admin/promotions/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Promosi')
@section('page-title', 'Edit Promosi')

@section('styles')
<style>
    .image-preview {
        max-width: 100%;
        max-height: 200px;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 5px;
        background: #f8f9fa;
        margin-top: 10px;
    }
    
    .image-preview-container.show {
        display: block;
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit Promosi: {{ $promotion->title }}</h2>
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
                                       value="{{ old('start_date', $promotion->start_date->format('Y-m-d\TH:i')) }}" required>
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
                                       value="{{ old('end_date', $promotion->end_date->format('Y-m-d\TH:i')) }}" required>
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
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        <strong>Status Promosi:</strong>
                        <ul class="mb-0 mt-2">
                            <li><strong>Mulai:</strong> {{ $promotion->start_date->format('d M Y H:i') }}</li>
                            <li><strong>Berakhir:</strong> {{ $promotion->end_date->format('d M Y H:i') }}</li>
                            <li>
                                <strong>Status Saat Ini:</strong> 
                                @if($promotion->is_active)
                                    @if($promotion->start_date <= now() && $promotion->end_date >= now())
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($promotion->start_date > now())
                                        <span class="badge bg-info">Akan Datang</span>
                                    @else
                                        <span class="badge bg-secondary">Kadaluarsa</span>
                                    @endif
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </li>
                        </ul>
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
            if (new Date(endDate.value) <= new Date(startDate.value)) {
                endDate.setCustomValidity('Tanggal berakhir harus setelah tanggal mulai');
            } else {
                endDate.setCustomValidity('');
            }
        } else {
            endDate.setCustomValidity('');
        }
    }
    
    startDate.addEventListener('input', validateDates);
    endDate.addEventListener('input', validateDates);
});
</script>
@endsection