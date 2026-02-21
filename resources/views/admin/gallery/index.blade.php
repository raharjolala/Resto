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

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        @if(isset($galleryItems) && $galleryItems->count() > 0)
            @foreach($galleryItems as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-img-top" style="height: 200px; overflow: hidden;">
                        @if($item->image_path)
                        <img src="{{ asset('storage/gallery/' . $item->image_path) }}" 
                             alt="{{ $item->caption }}" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                        <div class="d-flex align-items-center justify-content-center" style="height: 200px; background: #f8f9fa;">
                            <i class="fas fa-image fa-3x text-muted"></i>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->caption ?? 'Tanpa Judul' }}</h5>
                        
                        @php
                            $categoryLabels = [
                                'food' => 'Makanan',
                                'facility' => 'Fasilitas',
                                'event' => 'Acara',
                                'interior' => 'Interior'
                            ];
                        @endphp
                        
                        <span class="badge bg-{{ $item->category == 'food' ? 'success' : ($item->category == 'facility' ? 'warning' : ($item->category == 'event' ? 'info' : 'primary')) }} mb-2">
                            {{ $categoryLabels[$item->category] ?? ucfirst($item->category) }}
                        </span>
                        
                        <div class="mt-3">
                            <span class="badge bg-{{ $item->is_active ? 'success' : 'secondary' }}">
                                {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                            
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="d-inline float-end">
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
                    Belum ada foto di gallery. Klik tombol "Tambah Foto" untuk menambahkan.
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
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">File Foto *</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi (Opsional)</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                            <option value="">Pilih Kategori</option>
                            <option value="makanan" {{ old('category') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                            <option value="minuman" {{ old('category') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                            <option value="fasilitas" {{ old('category') == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                            <option value="acara" {{ old('category') == 'acara' ? 'selected' : '' }}>Acara</option>
                            <option value="interior" {{ old('category') == 'interior' ? 'selected' : '' }}>Interior</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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