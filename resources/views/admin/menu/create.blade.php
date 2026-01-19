@extends('layouts.admin')

@section('title', 'Tambah Menu Baru')
@section('page-title', 'Tambah Menu Baru')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Tambah Menu Baru</h2>
        </div>
        
        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="name">Nama Menu *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="category_id">Kategori *</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="price">Harga *</label>
                        <input type="number" class="form-control" id="price" name="price" min="0" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="image">Gambar Menu</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <div class="image-preview-container mt-2">
                            <img src="" class="image-preview" alt="Preview">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" checked>
                        <label class="form-check-label" for="is_available">Tersedia</label>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                        <label class="form-check-label" for="is_featured">Tampilkan sebagai Fitur</label>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.menu.index') }}" class="btn btn-admin-outline">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-admin">
                    <i class="fas fa-save"></i> Simpan Menu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection