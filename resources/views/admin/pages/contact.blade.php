@extends('layouts.admin')

@section('title', 'Edit Kontak Page')
@section('page-title', 'Edit Kontak Page')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit Kontak Page</h2>
        </div>
        
        <form action="{{ route('admin.pages.contact.update') }}" method="POST">
            @csrf
            
            @php
                $content = json_decode($page->content, true);
            @endphp
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="title">Judul Halaman</label>
                    <input type="text" class="form-control" id="title" name="title" 
                           value="{{ $content['title'] ?? 'Hubungi Kami' }}" required>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="description">Deskripsi Halaman</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $content['description'] ?? 'Silakan hubungi kami untuk reservasi atau pertanyaan lainnya.' }}</textarea>
                </div>
            </div>
            
            <hr class="my-4">
            <h4>Informasi Kontak</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required>{{ $content['address'] ?? 'JL Baye Kuliner No. 123, Jakarta, Indonesia' }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" 
                               value="{{ $content['phone'] ?? '(021) 1234-5678' }}" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="{{ $content['email'] ?? 'info@jossgandos.com' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="hours">Jam Operasional</label>
                        <input type="text" class="form-control" id="hours" name="hours" 
                               value="{{ $content['hours'] ?? 'Setiap Hari: 10:00 - 22:00 WIB' }}" required>
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            <h4>Peta Lokasi</h4>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="map_embed">Embed Code Google Maps</label>
                    <textarea class="form-control" id="map_embed" name="map_embed" rows="4">{{ $content['map_embed'] ?? '' }}</textarea>
                    <small class="text-muted">Dapatkan embed code dari Google Maps</small>
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