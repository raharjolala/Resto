@extends('layouts.admin')

@section('title', 'Edit About Page')
@section('page-title', 'Edit About Page')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit About Page</h2>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        
        <form action="{{ route('admin.pages.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @php
                $content = $page->content ?? [];
            @endphp
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="title">Judul Halaman *</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $page->title) }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="meta_title">Meta Title (SEO)</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" 
                               value="{{ old('meta_title', $page->meta_title) }}">
                        <small class="text-muted">Judul untuk SEO (maks 255 karakter)</small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="image">Gambar Halaman</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <small class="text-muted">Ukuran maksimal: 5MB. Format: JPG, PNG, GIF, WebP</small>
                        
                        @if(isset($content['image']) && $content['image'])
                            <div class="image-preview-container mt-2">
                                <p class="mb-1">Gambar saat ini:</p>
                                <img src="{{ asset('storage/pages/' . $content['image']) }}" 
                                     class="image-preview" 
                                     alt="About Image" 
                                     style="max-width: 200px; height: auto; border-radius: 8px; border: 2px solid #ddd;">
                                <div class="mt-1">
                                    <small class="text-muted">File: {{ $content['image'] }}</small>
                                </div>
                            </div>
                        @else
                            <div class="mt-2">
                                <small class="text-warning">Belum ada gambar yang diupload</small>
                            </div>
                        @endif
                        
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="meta_description">Meta Description (SEO)</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" 
                                  rows="2">{{ old('meta_description', $page->meta_description) }}</textarea>
                        <small class="text-muted">Deskripsi untuk SEO (maks 500 karakter)</small>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Deskripsi Utama *</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $content['description'] ?? '') }}</textarea>
                    <small class="text-muted">Deskripsi singkat tentang restoran (ditampilkan di hero section)</small>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="history">Sejarah *</label>
                    <textarea class="form-control editor" id="history" name="history" rows="6" required>{{ old('history', $content['history'] ?? '') }}</textarea>
                    <small class="text-muted">Sejarah berdirinya restoran</small>
                    @error('history')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="vision">Visi *</label>
                    <textarea class="form-control" id="vision" name="vision" rows="4" required>{{ old('vision', $content['vision'] ?? '') }}</textarea>
                    <small class="text-muted">Visi perusahaan</small>
                    @error('vision')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="mission">Misi *</label>
                    <textarea class="form-control" id="mission" name="mission" rows="4" required>{{ old('mission', $content['mission'] ?? '') }}</textarea>
                    <small class="text-muted">Misi perusahaan (gunakan poin-poin)</small>
                    @error('mission')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
                <button type="submit" class="btn btn-admin">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
        
        <div class="mt-5 pt-4 border-top">
            <h5>Informasi:</h5>
            <ul class="text-muted">
                <li>Data yang diedit di sini akan langsung terupdate di halaman <strong>/about</strong></li>
                <li>Gambar akan disimpan di: <code>storage/app/public/pages/</code></li>
                <li>Gunakan format list untuk misi (contoh: 1. Poin pertama, 2. Poin kedua)</li>
                <li>Field dengan tanda * wajib diisi</li>
            </ul>
        </div>
    </div>
</div>

@push('styles')
<style>
.image-preview-container {
    padding: 10px;
    background: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}
.image-preview {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor for history field
        if (document.getElementById('history')) {
            CKEDITOR.replace('history', {
                toolbar: [
                    ['Bold', 'Italic', 'Underline'],
                    ['NumberedList', 'BulletedList'],
                    ['Link', 'Unlink'],
                    ['RemoveFormat']
                ],
                height: 200
            });
        }
    });
</script>
@endpush
@endsection