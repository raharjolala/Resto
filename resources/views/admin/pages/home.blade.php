@extends('layouts.admin')

@section('title', 'Edit Home Page')
@section('page-title', 'Edit Home Page')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit Home Page</h2>
        </div>
        
        <form action="{{ route('admin.pages.home.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @php
                $content = json_decode($page->content, true) ?? [];
            @endphp
            
            <!-- Hero Section -->
            <h4 class="mb-4 border-bottom pb-2">Hero Section</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="hero_title_line1">Judul Utama (Baris 1)</label>
                        <input type="text" class="form-control" id="hero_title_line1" name="hero_title_line1" 
                               value="{{ $content['hero_title_line1'] ?? 'Selamat Datang di' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="hero_title_line2">Judul Utama (Baris 2 - Span)</label>
                        <input type="text" class="form-control" id="hero_title_line2" name="hero_title_line2" 
                               value="{{ $content['hero_title_line2'] ?? 'JOSS GANDOS RESTO & CAFE' }}" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="hero_subtitle">Sub Judul Hero</label>
                    <textarea class="form-control" id="hero_subtitle" name="hero_subtitle" rows="3" required>{{ $content['hero_subtitle'] ?? 'Nikmati Berbagai Sajian Kuliner Lezat dengan Suasana yang Nyaman dan Ramah di Joss Gandos.' }}</textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="hero_button1_text">Teks Tombol 1</label>
                        <input type="text" class="form-control" id="hero_button1_text" name="hero_button1_text" 
                               value="{{ $content['hero_button1_text'] ?? 'LIHAT MENU' }}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="hero_button2_text">Teks Tombol 2</label>
                        <input type="text" class="form-control" id="hero_button2_text" name="hero_button2_text" 
                               value="{{ $content['hero_button2_text'] ?? 'RESERVASI MEJA' }}">
                    </div>
                </div>
            </div>
            
            <!-- Featured Menu Section -->
            <h4 class="mb-4 border-bottom pb-2 mt-5">Menu Favorit Section</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="featured_menu_title">Judul Menu Favorit</label>
                        <input type="text" class="form-control" id="featured_menu_title" name="featured_menu_title" 
                               value="{{ $content['featured_menu_title'] ?? 'MENU FAVORIT KAMI' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="featured_menu_subtitle">Subjudul Menu Favorit</label>
                        <input type="text" class="form-control" id="featured_menu_subtitle" name="featured_menu_subtitle" 
                               value="{{ $content['featured_menu_subtitle'] ?? 'Cicipi Berbagai Hidangan Favorit Kami yang Menggugah Selera' }}">
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="view_all_menu_text">Teks Tombol Lihat Menu</label>
                    <input type="text" class="form-control" id="view_all_menu_text" name="view_all_menu_text" 
                           value="{{ $content['view_all_menu_text'] ?? 'LIHAT MENU LENGKAP' }}">
                </div>
            </div>
            
            <!-- Promo Section -->
            <h4 class="mb-4 border-bottom pb-2 mt-5">Promo Section</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="promo_title">Judul Promo</label>
                        <input type="text" class="form-control" id="promo_title" name="promo_title" 
                               value="{{ $content['promo_title'] ?? 'PROMO SPESIAL' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="promo_subtitle">Subjudul Promo</label>
                        <input type="text" class="form-control" id="promo_subtitle" name="promo_subtitle" 
                               value="{{ $content['promo_subtitle'] ?? 'Nikmati berbagai penawaran menarik untuk pengalaman makan yang lebih spesial' }}">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="promo_discount">Diskon Promo</label>
                        <input type="text" class="form-control" id="promo_discount" name="promo_discount" 
                               value="{{ $content['promo_discount'] ?? 'DISKON 20%' }}">
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="promo_condition">Syarat Promo</label>
                        <input type="text" class="form-control" id="promo_condition" name="promo_condition" 
                               value="{{ $content['promo_condition'] ?? 'Untuk Pembelian Minimal Rp 100.000' }}">
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="promo_schedule">Jadwal Promo</label>
                    <textarea class="form-control" id="promo_schedule" name="promo_schedule" rows="2">{{ $content['promo_schedule'] ?? 'Setiap Hari Senin - Jumat<br>Pukul 14:00 - 17:00' }}</textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="rating_number">Rating Pelanggan</label>
                        <input type="text" class="form-control" id="rating_number" name="rating_number" 
                               value="{{ $content['rating_number'] ?? '5.0' }}">
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="menu_count">Jumlah Menu</label>
                        <input type="text" class="form-control" id="menu_count" name="menu_count" 
                               value="{{ $content['menu_count'] ?? '50+' }}">
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    <div class="form-group">
                        <label for="customer_count">Jumlah Pelanggan</label>
                        <input type="text" class="form-control" id="customer_count" name="customer_count" 
                               value="{{ $content['customer_count'] ?? '1000+' }}">
                    </div>
                </div>
            </div>
            
            <!-- About Section -->
            <h4 class="mb-4 border-bottom pb-2 mt-5">About Section</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="about_title">Judul About</label>
                        <input type="text" class="form-control" id="about_title" name="about_title" 
                               value="{{ $content['about_title'] ?? 'TENTANG JOSS GANDOS' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="about_subtitle">Subjudul About</label>
                        <input type="text" class="form-control" id="about_subtitle" name="about_subtitle" 
                               value="{{ $content['about_subtitle'] ?? 'Lebih dari sekadar restoran, pengalaman kuliner yang tak terlupakan' }}">
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="about_image">Gambar About</label>
                    <input type="file" class="form-control" id="about_image" name="about_image" accept="image/*">
                    @if(isset($content['about_image']) && $content['about_image'])
                        <div class="image-preview-container mt-2">
                            <p>Gambar saat ini:</p>
                            <img src="{{ asset('storage/pages/' . $content['about_image']) }}" 
                                 class="image-preview" alt="About Image" style="max-width: 300px;">
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="about_section_title">Judul Bagian About</label>
                    <input type="text" class="form-control" id="about_section_title" name="about_section_title" 
                           value="{{ $content['about_section_title'] ?? 'Sajian Autentik dengan Cita Rasa Terbaik' }}">
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="about_description">Deskripsi About (Paragraf 1)</label>
                    <textarea class="form-control" id="about_description" name="about_description" rows="3">{{ $content['about_description'] ?? 'JOSS GANDOS telah menjadi pilihan utama bagi pecinta kuliner Indonesia sejak 2015. Kami menghadirkan cita rasa autentik dengan bahan-bahan segar pilihan yang diolah oleh chef berpengalaman.' }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="about_description2">Deskripsi About (Paragraf 2)</label>
                    <textarea class="form-control" id="about_description2" name="about_description2" rows="3">{{ $content['about_description2'] ?? 'Dengan suasana yang nyaman dan pelayanan yang hangat, kami berkomitmen untuk memberikan pengalaman makan yang tak terlupakan bagi setiap pelanggan.' }}</textarea>
                </div>
            </div>
            
            <!-- Features List -->
            <div class="mb-3">
                <h5>Fitur Utama</h5>
                @for($i = 1; $i <= 5; $i++)
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="feature_{{$i}}_text">Fitur {{$i}} Text</label>
                                <input type="text" class="form-control" id="feature_{{$i}}_text" 
                                       name="feature_{{$i}}_text" 
                                       value="{{ $content["feature_{$i}_text"] ?? '' }}">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            
            <!-- Gallery Section -->
            <h4 class="mb-4 border-bottom pb-2 mt-5">Gallery Section</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="gallery_title">Judul Gallery</label>
                        <input type="text" class="form-control" id="gallery_title" name="gallery_title" 
                               value="{{ $content['gallery_title'] ?? 'GALERI KAMI' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="gallery_subtitle">Subjudul Gallery</label>
                        <input type="text" class="form-control" id="gallery_subtitle" name="gallery_subtitle" 
                               value="{{ $content['gallery_subtitle'] ?? 'Lihat suasana dan hidangan di JOSS GANDOS' }}">
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="view_gallery_text">Teks Tombol Lihat Gallery</label>
                    <input type="text" class="form-control" id="view_gallery_text" name="view_gallery_text" 
                           value="{{ $content['view_gallery_text'] ?? 'LIHAT GALERI LENGKAP' }}">
                </div>
            </div>
            
            <!-- Testimonials Section -->
            <h4 class="mb-4 border-bottom pb-2 mt-5">Testimonials Section</h4>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="testimonials_title">Judul Testimonials</label>
                        <input type="text" class="form-control" id="testimonials_title" name="testimonials_title" 
                               value="{{ $content['testimonials_title'] ?? 'TESTIMONI PELANGGAN' }}" required>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="testimonials_subtitle">Subjudul Testimonials</label>
                        <input type="text" class="form-control" id="testimonials_subtitle" name="testimonials_subtitle" 
                               value="{{ $content['testimonials_subtitle'] ?? 'Apa kata mereka tentang pengalaman di JOSS GANDOS' }}">
                    </div>
                </div>
            </div>
            
            <!-- Testimonial Items -->
            <h5>Testimoni Pelanggan</h5>
            @for($i = 1; $i <= 3; $i++)
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Testimoni {{$i}}</h6>
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    <label for="testimonial_{{$i}}_name">Nama</label>
                                    <input type="text" class="form-control" id="testimonial_{{$i}}_name" 
                                           name="testimonial_{{$i}}_name" 
                                           value="{{ $content["testimonial_{$i}_name"] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    <label for="testimonial_{{$i}}_location">Lokasi</label>
                                    <input type="text" class="form-control" id="testimonial_{{$i}}_location" 
                                           name="testimonial_{{$i}}_location" 
                                           value="{{ $content["testimonial_{$i}_location"] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    <label for="testimonial_{{$i}}_rating">Rating (1-5)</label>
                                    <input type="number" class="form-control" id="testimonial_{{$i}}_rating" 
                                           name="testimonial_{{$i}}_rating" min="1" max="5" 
                                           value="{{ $content["testimonial_{$i}_rating"] ?? 5 }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="testimonial_{{$i}}_text">Testimoni Text</label>
                            <textarea class="form-control" id="testimonial_{{$i}}_text" 
                                      name="testimonial_{{$i}}_text" rows="2">{{ $content["testimonial_{$i}_text"] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            @endfor
            
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
    
    <div class="content-card mt-4">
        <div class="card-header">
            <h3>Preview Home Page</h3>
        </div>
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> 
            Perubahan yang disimpan akan langsung terlihat di halaman utama website.
            <br><br>
            <strong>Tips:</strong>
            <ul class="mb-0">
                <li>Untuk gambar hero, gunakan gambar landscape dengan resolusi tinggi</li>
                <li>Gambar about sebaiknya berukuran 800x600px</li>
                <li>Testimoni akan ditampilkan dalam bentuk cards di halaman utama</li>
            </ul>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Preview image sebelum upload
    document.getElementById('hero_image')?.addEventListener('change', function(e) {
        const preview = document.getElementById('hero_image_preview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    document.getElementById('about_image')?.addEventListener('change', function(e) {
        const preview = document.getElementById('about_image_preview');
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
@endsection