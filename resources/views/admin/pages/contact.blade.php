@extends('layouts.admin')

@section('title', 'Edit Kontak Page')
@section('page-title', 'Edit Kontak Page')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit Kontak Page</h2>
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
        
        @if($errors->any())
            <div class="alert alert-danger">
                <h5>Terjadi kesalahan validasi:</h5>
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('admin.pages.contact.update') }}" method="POST">
            @csrf
            
            @php
                $content = $page->content ?? [];
            @endphp
            
            <!-- Basic Information -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">Informasi Dasar</h4>
                
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Halaman <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" 
                           value="{{ old('title', $page->title ?? 'Kontak Kami') }}" required>
                    <small class="text-muted">Judul halaman ini (contoh: Kontak Kami)</small>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="meta_title" class="form-label">Meta Title (SEO)</label>
                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                           id="meta_title" name="meta_title" 
                           value="{{ old('meta_title', $page->meta_title ?? 'Kontak - JOSS GANDOS') }}">
                    @error('meta_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description (SEO)</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                              id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $page->meta_description ?? 'Hubungi JOSS GANDOS untuk reservasi, catering, atau informasi lainnya. Kami siap melayani Anda') }}</textarea>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <!-- Hero Section -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">Hero Section <span class="text-danger">* Semua field wajib diisi</span></h4>
                
                <div class="mb-3">
                    <label for="hero_subtitle" class="form-label">Subtitle / Badge <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('hero_subtitle') is-invalid @enderror" 
                           id="hero_subtitle" name="hero_subtitle" 
                           value="{{ old('hero_subtitle', $content['hero_subtitle'] ?? 'HUBUNGI KAMI') }}" required>
                    <small class="text-muted">Contoh: HUBUNGI KAMI, GET IN TOUCH, dll.</small>
                    @error('hero_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="hero_title_line1" class="form-label">Hero Title - Baris 1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('hero_title_line1') is-invalid @enderror" 
                               id="hero_title_line1" name="hero_title_line1" 
                               value="{{ old('hero_title_line1', $content['hero_title_line1'] ?? 'Kami Siap') }}" required>
                        @error('hero_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="hero_title_line2" class="form-label">Hero Title - Baris 2 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('hero_title_line2') is-invalid @enderror" 
                               id="hero_title_line2" name="hero_title_line2" 
                               value="{{ old('hero_title_line2', $content['hero_title_line2'] ?? 'Melayani Dengan') }}" required>
                        @error('hero_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="hero_title_line3" class="form-label">Hero Title - Baris 3 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('hero_title_line3') is-invalid @enderror" 
                               id="hero_title_line3" name="hero_title_line3" 
                               value="{{ old('hero_title_line3', $content['hero_title_line3'] ?? 'Sepenuh Hati') }}" required>
                        @error('hero_title_line3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="hero_description" class="form-label">Hero Description <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('hero_description') is-invalid @enderror" 
                              id="hero_description" name="hero_description" rows="3" required>{{ old('hero_description', $content['hero_description'] ?? 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.') }}</textarea>
                    @error('hero_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="hero_image_url" class="form-label">Hero Image URL <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('hero_image_url') is-invalid @enderror" 
                           id="hero_image_url" name="hero_image_url" 
                           value="{{ old('hero_image_url', $content['hero_image_url'] ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" required>
                    <small class="text-muted">URL gambar untuk hero section (harus URL valid)</small>
                    @error('hero_image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Preview Hero Image -->
                <div class="mt-2 mb-3">
                    <label class="form-label">Preview Hero Image:</label>
                    <div>
                        <img src="{{ old('hero_image_url', $content['hero_image_url'] ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" 
                             alt="Hero Preview" 
                             style="max-width: 200px; max-height: 150px; border-radius: 8px; border: 1px solid #ddd;"
                             onerror="this.src='https://via.placeholder.com/200x150?text=Image+Not+Found'">
                    </div>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">Informasi Kontak</h4>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" 
                              id="address" name="address" rows="3">{{ old('address', $content['address'] ?? 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" name="phone" 
                               value="{{ old('phone', $content['phone'] ?? '(021) 1234-5678') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" 
                               value="{{ old('email', $content['email'] ?? 'info@jossgandos.com') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="hours" class="form-label">Jam Operasional</label>
                    <input type="text" class="form-control @error('hours') is-invalid @enderror" 
                           id="hours" name="hours" 
                           value="{{ old('hours', $content['hours'] ?? '10:00 - 22:00 WIB (Setiap Hari)') }}">
                    @error('hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <!-- Google Maps -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">Google Maps</h4>
                
                <div class="mb-3">
                    <label for="map_embed" class="form-label">Embed Code Google Maps</label>
                    <textarea class="form-control @error('map_embed') is-invalid @enderror" 
                              id="map_embed" name="map_embed" rows="4">{{ old('map_embed', $content['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid') }}</textarea>
                    <small class="text-muted">Dapatkan embed code dari Google Maps (cukup URL src attribute-nya saja)</small>
                    @error('map_embed')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <!-- WhatsApp Admin -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">WhatsApp Admin</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_admin_1_name" class="form-label">Nama Admin 1</label>
                        <input type="text" class="form-control @error('whatsapp_admin_1_name') is-invalid @enderror" 
                               id="whatsapp_admin_1_name" name="whatsapp_admin_1_name" 
                               value="{{ old('whatsapp_admin_1_name', $content['whatsapp_admin_1_name'] ?? 'Admin 1') }}">
                        @error('whatsapp_admin_1_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_admin_1" class="form-label">Nomor WhatsApp Admin 1</label>
                        <input type="text" class="form-control @error('whatsapp_admin_1') is-invalid @enderror" 
                               id="whatsapp_admin_1" name="whatsapp_admin_1" 
                               value="{{ old('whatsapp_admin_1', $content['whatsapp_admin_1'] ?? '6289699071599') }}">
                        <small class="text-muted">Gunakan format internasional tanpa + (contoh: 628123456789)</small>
                        @error('whatsapp_admin_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_admin_2_name" class="form-label">Nama Admin 2</label>
                        <input type="text" class="form-control @error('whatsapp_admin_2_name') is-invalid @enderror" 
                               id="whatsapp_admin_2_name" name="whatsapp_admin_2_name" 
                               value="{{ old('whatsapp_admin_2_name', $content['whatsapp_admin_2_name'] ?? 'Admin 2') }}">
                        @error('whatsapp_admin_2_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_admin_2" class="form-label">Nomor WhatsApp Admin 2</label>
                        <input type="text" class="form-control @error('whatsapp_admin_2') is-invalid @enderror" 
                               id="whatsapp_admin_2" name="whatsapp_admin_2" 
                               value="{{ old('whatsapp_admin_2', $content['whatsapp_admin_2'] ?? '6289532682495') }}">
                        @error('whatsapp_admin_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Delivery Services -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">Layanan Delivery</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="delivery_gofood" class="form-label">Link GoFood</label>
                        <input type="url" class="form-control @error('delivery_gofood') is-invalid @enderror" 
                               id="delivery_gofood" name="delivery_gofood" 
                               value="{{ old('delivery_gofood', $content['delivery_gofood'] ?? 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17') }}">
                        @error('delivery_gofood')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="delivery_grabfood" class="form-label">Link GrabFood</label>
                        <input type="url" class="form-control @error('delivery_grabfood') is-invalid @enderror" 
                               id="delivery_grabfood" name="delivery_grabfood" 
                               value="{{ old('delivery_grabfood', $content['delivery_grabfood'] ?? 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d') }}">
                        @error('delivery_grabfood')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="mb-4">
                <h4 class="border-bottom pb-2">Media Sosial</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="facebook_url" class="form-label">Facebook URL</label>
                        <input type="url" class="form-control @error('facebook_url') is-invalid @enderror" 
                               id="facebook_url" name="facebook_url" 
                               value="{{ old('facebook_url', $content['facebook_url'] ?? '#') }}">
                        @error('facebook_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="instagram_url" class="form-label">Instagram URL</label>
                        <input type="url" class="form-control @error('instagram_url') is-invalid @enderror" 
                               id="instagram_url" name="instagram_url" 
                               value="{{ old('instagram_url', $content['instagram_url'] ?? '#') }}">
                        @error('instagram_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="twitter_url" class="form-label">Twitter URL</label>
                        <input type="url" class="form-control @error('twitter_url') is-invalid @enderror" 
                               id="twitter_url" name="twitter_url" 
                               value="{{ old('twitter_url', $content['twitter_url'] ?? '#') }}">
                        @error('twitter_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control @error('linkedin_url') is-invalid @enderror" 
                               id="linkedin_url" name="linkedin_url" 
                               value="{{ old('linkedin_url', $content['linkedin_url'] ?? '#') }}">
                        @error('linkedin_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Form Buttons -->
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    .form-container {
        padding: 20px;
    }
    
    .content-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .card-header {
        padding: 20px;
        border-bottom: 1px solid #e0e0e0;
    }
    
    .card-header h2 {
        margin: 0;
        font-size: 1.5rem;
        color: #333;
    }
    
    form {
        padding: 20px;
    }
    
    h4 {
        color: #b42222;
        margin-top: 20px;
        margin-bottom: 15px;
        font-size: 1.2rem;
        font-weight: 600;
    }
    
    .border-bottom {
        border-bottom: 2px solid #b42222 !important;
        padding-bottom: 8px;
    }
    
    .form-label {
        font-weight: 500;
        color: #555;
        margin-bottom: 5px;
    }
    
    .text-danger {
        color: #dc3545;
        font-weight: bold;
    }
    
    .form-control:focus {
        border-color: #b42222;
        box-shadow: 0 0 0 0.2rem rgba(180, 34, 34, 0.25);
    }
    
    .btn-primary {
        background: #b42222;
        border-color: #b42222;
    }
    
    .btn-primary:hover {
        background: #8a1a1a;
        border-color: #8a1a1a;
    }
    
    .btn-secondary {
        background: #6c757d;
        border-color: #6c757d;
    }
    
    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        margin: 20px 20px 0;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        margin: 20px 20px 0;
    }
    
    .invalid-feedback {
        display: block;
    }
    
    code {
        background: #f4f4f4;
        padding: 2px 5px;
        border-radius: 4px;
        font-size: 0.85rem;
        word-break: break-all;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview Hero Image saat URL berubah
        const heroImageInput = document.getElementById('hero_image_url');
        if (heroImageInput) {
            heroImageInput.addEventListener('change', function() {
                const previewContainer = this.closest('.mb-3').nextElementSibling;
                if (previewContainer && previewContainer.querySelector('img')) {
                    const img = previewContainer.querySelector('img');
                    img.src = this.value;
                }
            });
        }
        
        // Auto-format nomor WhatsApp (hapus karakter non-digit)
        const waInputs = ['whatsapp_admin_1', 'whatsapp_admin_2'];
        waInputs.forEach(id => {
            const input = document.getElementById(id);
            if (input) {
                input.addEventListener('blur', function() {
                    // Hanya simpan digit
                    this.value = this.value.replace(/\D/g, '');
                });
            }
        });
    });
</script>
@endsection