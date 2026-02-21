{{-- resources/views/admin/menu/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'Edit Menu')
@section('page-title', 'Edit Menu')

@section('styles')
<style>
    .image-preview-container {
        margin-top: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
        border: 1px dashed #dee2e6;
        text-align: center;
    }
    
    .image-preview {
        max-width: 100%;
        max-height: 200px;
        object-fit: contain;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .url-input-group {
        position: relative;
    }
    
    .url-preview-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #DC143C;
        cursor: pointer;
        z-index: 10;
    }
    
    .url-preview-icon:hover {
        color: #8B0000;
    }
    
    .sample-urls {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }
    
    .sample-url-btn {
        background: #f0f0f0;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .sample-url-btn:hover {
        background: #DC143C;
        color: white;
        border-color: #DC143C;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
    
    .form-group label {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .text-danger {
        color: #DC143C;
    }
    
    .form-control, .form-select {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px 15px;
        width: 100%;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #DC143C;
        outline: none;
        box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.1);
    }
    
    .form-check-input:checked {
        background-color: #DC143C;
        border-color: #DC143C;
    }
    
    .btn-admin {
        background: #DC143C;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-admin:hover {
        background: #8B0000;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 20, 60, 0.3);
    }
    
    .btn-admin-outline {
        background: transparent;
        color: #DC143C;
        border: 1px solid #DC143C;
        padding: 10px 25px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .btn-admin-outline:hover {
        background: #DC143C;
        color: white;
    }
    
    .content-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    
    .card-header {
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f0f0f0;
    }
    
    .card-header h2 {
        font-size: 24px;
        color: #333;
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit Menu: {{ $menuItem->name }}</h2>
            <p class="text-muted">Admin / Edit Menu</p>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.menu.update', $menuItem->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama Menu <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $menuItem->name) }}" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category_id">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category_id') is-invalid @enderror" 
                                id="category_id" 
                                name="category_id" 
                                required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
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
                <label for="description">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" 
                          name="description" 
                          rows="3">{{ old('description', $menuItem->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Harga <span class="text-danger">*</span></label>
                        <input type="number" 
                               class="form-control @error('price') is-invalid @enderror" 
                               id="price" 
                               name="price" 
                               min="0" 
                               value="{{ old('price', $menuItem->price) }}" 
                               required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">URL Gambar Menu</label>
                        <div class="url-input-group">
                            <input type="url" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image" 
                                   value="{{ old('image', $menuItem->image) }}" 
                                   placeholder="https://example.com/image.jpg"
                                   onchange="updatePreview(this.value)">
                            <i class="fas fa-eye url-preview-icon" onclick="previewUrl()" title="Preview Gambar"></i>
                        </div>
                        <small class="text-muted">Masukkan URL gambar (contoh: https://images.unsplash.com/...)</small>
                        
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
            <div class="image-preview-container" id="previewContainer" 
                 style="{{ $menuItem->image ? 'display: block;' : 'display: none;' }}">
                <h6>Preview Gambar:</h6>
                <img src="{{ $menuItem->image_url }}" 
                     class="image-preview" 
                     id="imagePreview" 
                     alt="Preview"
                     onerror="this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'">
            </div>
            
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_available" 
                               name="is_available" 
                               value="1" 
                               {{ old('is_available', $menuItem->is_available) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_available">Tersedia</label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" 
                               type="checkbox" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured', $menuItem->is_featured) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Tampilkan sebagai Fitur</label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sort_order">Urutan Tampil</label>
                        <input type="number" 
                               class="form-control @error('sort_order') is-invalid @enderror" 
                               id="sort_order" 
                               name="sort_order" 
                               min="0" 
                               value="{{ old('sort_order', $menuItem->sort_order ?? 0) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-admin-outline">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <div>
                    <button type="reset" class="btn btn-secondary me-2">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-admin">
                        <i class="fas fa-save"></i> Update Menu
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Show preview on page load if image exists
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        if (imageInput.value) {
            document.getElementById('previewContainer').style.display = 'block';
            document.getElementById('imagePreview').src = imageInput.value;
        }
    });

    function updatePreview(url) {
        const previewContainer = document.getElementById('previewContainer');
        const preview = document.getElementById('imagePreview');
        
        if (url) {
            preview.src = url;
            previewContainer.style.display = 'block';
        } else {
            previewContainer.style.display = 'none';
        }
    }
    
    function previewUrl() {
        const urlInput = document.getElementById('image');
        if (urlInput.value) {
            updatePreview(urlInput.value);
        } else {
            alert('Masukkan URL gambar terlebih dahulu!');
        }
    }
    
    function useSampleUrl(url) {
        document.getElementById('image').value = url;
        updatePreview(url);
    }
    
    // Handle image load error
    document.getElementById('imagePreview').onerror = function() {
        this.src = 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';
    };
    
    // Validate URL before form submit
    document.querySelector('form').addEventListener('submit', function(e) {
        const imageInput = document.getElementById('image');
        if (imageInput.value) {
            try {
                new URL(imageInput.value);
            } catch (_) {
                e.preventDefault();
                alert('URL gambar tidak valid. Pastikan URL diawali dengan http:// atau https://');
            }
        }
    });
</script>
@endsection