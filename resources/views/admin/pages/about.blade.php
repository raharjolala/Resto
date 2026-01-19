@extends('layouts.admin')

@section('title', 'Edit About Page')
@section('page-title', 'Edit About Page')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit About Page</h2>
        </div>
        
        <form action="{{ route('admin.pages.about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @php
                $content = json_decode($page->content, true);
            @endphp
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="title">Judul Halaman</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ $content['title'] ?? 'Tentang JOSS GANDOS' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="image">Gambar Halaman</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        @if(isset($content['image']) && $content['image'])
                            <div class="image-preview-container mt-2">
                                <p>Gambar saat ini:</p>
                                <img src="{{ asset('storage/pages/' . $content['image']) }}" 
                                     class="image-preview" alt="About Image">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Deskripsi Utama</label>
                    <textarea class="form-control editor" id="description" name="description" rows="4" required>{{ $content['description'] ?? '' }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="history">Sejarah</label>
                    <textarea class="form-control editor" id="history" name="history" rows="4" required>{{ $content['history'] ?? '' }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="vision">Visi</label>
                    <textarea class="form-control" id="vision" name="vision" rows="3" required>{{ $content['vision'] ?? '' }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="mission">Misi</label>
                    <textarea class="form-control" id="mission" name="mission" rows="3" required>{{ $content['mission'] ?? '' }}</textarea>
                </div>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-outline">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-admin">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection