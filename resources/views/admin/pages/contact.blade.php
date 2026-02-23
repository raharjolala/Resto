@extends('layouts.admin')

@section('title', 'Edit Kontak')
@section('page-title', 'Edit Informasi Kontak')

@section('content')
<div class="container-fluid px-4">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Edit Konten Halaman Kontak (Yang Muncul di Halaman Reservasi)</h5>
            <p class="text-muted mb-0">Data ini akan muncul di bagian informasi kontak halaman reservasi</p>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.pages.contact.update') }}" method="POST">
                @csrf

                <!-- Informasi Kontak -->
                <div class="form-section mb-4">
                    <h5 class="fw-bold" style="color: #b42222;">
                        <i class="fas fa-info-circle me-2"></i>Informasi Kontak
                    </h5>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Alamat</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" 
                                       value="{{ old('address', $page->content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Nomor Telepon</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone', $page->content['phone'] ?? '(021) 1234-5678') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email', $page->content['email'] ?? 'info@jossgandos.com') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Jam Operasional</label>
                                <input type="text" name="hours" class="form-control @error('hours') is-invalid @enderror" 
                                       value="{{ old('hours', $page->content['hours'] ?? '10:00 - 22:00 WIB (Setiap Hari)') }}">
                                @error('hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Google Maps Embed URL</label>
                                <textarea name="map_embed" rows="3" class="form-control @error('map_embed') is-invalid @enderror">{{ old('map_embed', $page->content['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid') }}</textarea>
                                @error('map_embed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Admins -->
                <div class="form-section mb-4">
                    <h5 class="fw-bold" style="color: #b42222;">
                        <i class="fab fa-whatsapp me-2"></i>Admin WhatsApp
                    </h5>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Admin 1 - Nama</label>
                                <input type="text" name="whatsapp_admin_1_name" class="form-control @error('whatsapp_admin_1_name') is-invalid @enderror" 
                                       value="{{ old('whatsapp_admin_1_name', $page->content['whatsapp_admin_1_name'] ?? 'Admin 1') }}">
                                @error('whatsapp_admin_1_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Admin 1 - Nomor WhatsApp</label>
                                <input type="text" name="whatsapp_admin_1" class="form-control @error('whatsapp_admin_1') is-invalid @enderror" 
                                       value="{{ old('whatsapp_admin_1', $page->content['whatsapp_admin_1'] ?? '6289699071599') }}">
                                <small class="text-muted">Format: 628xxx (tanpa + atau spasi)</small>
                                @error('whatsapp_admin_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Admin 2 - Nama</label>
                                <input type="text" name="whatsapp_admin_2_name" class="form-control @error('whatsapp_admin_2_name') is-invalid @enderror" 
                                       value="{{ old('whatsapp_admin_2_name', $page->content['whatsapp_admin_2_name'] ?? 'Admin 2') }}">
                                @error('whatsapp_admin_2_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Admin 2 - Nomor WhatsApp</label>
                                <input type="text" name="whatsapp_admin_2" class="form-control @error('whatsapp_admin_2') is-invalid @enderror" 
                                       value="{{ old('whatsapp_admin_2', $page->content['whatsapp_admin_2'] ?? '6289532682495') }}">
                                <small class="text-muted">Format: 628xxx (tanpa + atau spasi)</small>
                                @error('whatsapp_admin_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delivery Services -->
                <div class="form-section mb-4">
                    <h5 class="fw-bold" style="color: #b42222;">
                        <i class="fas fa-motorcycle me-2"></i>Layanan Delivery
                    </h5>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">GoFood URL</label>
                                <input type="url" name="delivery_gofood" class="form-control @error('delivery_gofood') is-invalid @enderror" 
                                       value="{{ old('delivery_gofood', $page->content['delivery_gofood'] ?? 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17') }}">
                                @error('delivery_gofood')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label fw-semibold">GrabFood URL</label>
                                <input type="url" name="delivery_grabfood" class="form-control @error('delivery_grabfood') is-invalid @enderror" 
                                       value="{{ old('delivery_grabfood', $page->content['delivery_grabfood'] ?? 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d') }}">
                                @error('delivery_grabfood')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="form-section mb-4">
                    <h5 class="fw-bold" style="color: #b42222;">
                        <i class="fas fa-share-alt me-2"></i>Media Sosial
                    </h5>
                    <hr>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Facebook URL</label>
                                <input type="url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" 
                                       value="{{ old('facebook_url', $page->content['facebook_url'] ?? '#') }}">
                                @error('facebook_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Instagram URL</label>
                                <input type="url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" 
                                       value="{{ old('instagram_url', $page->content['instagram_url'] ?? '#') }}">
                                @error('instagram_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">Twitter URL</label>
                                <input type="url" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" 
                                       value="{{ old('twitter_url', $page->content['twitter_url'] ?? '#') }}">
                                @error('twitter_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label fw-semibold">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" 
                                       value="{{ old('linkedin_url', $page->content['linkedin_url'] ?? '#') }}">
                                @error('linkedin_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2" style="background: linear-gradient(135deg, #b42222, #e63946); border: none;">
                        <i class="fas fa-save me-2"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('reservation.create') }}" class="btn btn-outline-secondary px-5 py-2 ms-2" target="_blank">
                        <i class="fas fa-eye me-2"></i> Lihat Halaman Reservasi
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid #b42222;
        margin-bottom: 25px;
    }
    .image-preview {
        max-width: 200px;
        max-height: 200px;
        border-radius: 8px;
        border: 2px solid #ddd;
        padding: 3px;
    }
    .btn-primary {
        background: linear-gradient(135deg, #b42222, #e63946);
        color: white;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
    }
    .btn-primary:hover {
        background: linear-gradient(135deg, #8a1a1a, #b42222);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(180, 34, 34, 0.3);
    }
</style>
@endpush