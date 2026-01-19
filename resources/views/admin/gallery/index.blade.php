@extends('layouts.admin')

@section('title', 'Kelola Gallery')
@section('page-title', 'Kelola Gallery')

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2>Gallery Foto</h2>
        <button type="button" class="btn btn-admin" data-bs-toggle="modal" data-bs-target="#addImageModal">
            <i class="fas fa-plus"></i> Tambah Foto
        </button>
    </div>

    <div class="row">
        {{-- Debug info --}}
        @php
            // Uncomment untuk debugging
            // dump($galleryItems ?? 'No galleryItems variable');
        @endphp

        @if(isset($galleryItems) && $galleryItems->count() > 0)
            @foreach($galleryItems as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-img-top" style="height: 200px; overflow: hidden;">
                        @if($item->image)
                        <img src="{{ asset('storage/gallery/' . $item->image) }}" 
                             alt="{{ $item->title }}" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                        <div class="d-flex align-items-center justify-content-center" style="height: 200px; background: #f8f9fa;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title ?? 'Tanpa Judul' }}</h5>
                        @if($item->description)
                        <p class="card-text text-muted">{{ Str::limit($item->description, 100) }}</p>
                        @endif
                        
                        @if($item->category)
                        <span class="badge bg-info mb-2">{{ $item->category }}</span>
                        @endif
                        
                        <div class="mt-3">
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> 
                    @if(!isset($galleryItems))
                        Data gallery tidak tersedia. Pastikan database dan model Gallery sudah diatur.
                    @else
                        Belum ada foto di gallery
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Modal Add Image -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Foto ke Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Foto *</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">File Foto *</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select" id="category" name="category">
                            <option value="">Pilih Kategori</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="fasilitas">Fasilitas</option>
                            <option value="acara">Acara</option>
                            <option value="interior">Interior</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-admin">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection