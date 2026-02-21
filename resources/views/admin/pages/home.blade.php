@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Halaman Home</h4>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i> Lihat Halaman User
                </a>
            </div>
        </div>
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

    <form action="{{ route('admin.pages.home.update') }}" method="POST">
        @csrf
        
        <!-- INFORMASI DASAR -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Informasi Dasar</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Halaman</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
                               value="{{ old('title', $page->title ?? 'Beranda') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Title (SEO)</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" 
                               value="{{ old('meta_title', $page->meta_title ?? '') }}">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description (SEO)</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" rows="3">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- HERO SECTION -->
        <div class="card mb-4">
            <div class="card-header bg-danger text-white">
                <h5 class="mb-0">Hero Section</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> Hero section menggunakan gambar dari URL. Pastikan URL gambar valid.
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control @error('hero_title_line1') is-invalid @enderror" name="hero_title_line1" 
                               value="{{ old('hero_title_line1', $page->content['hero_title_line1'] ?? 'Nikmati Kelezatan') }}" required>
                        @error('hero_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control @error('hero_title_line2') is-invalid @enderror" name="hero_title_line2" 
                               value="{{ old('hero_title_line2', $page->content['hero_title_line2'] ?? 'Hidangan Spesial') }}" required>
                        @error('hero_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Judul Baris 3</label>
                        <input type="text" class="form-control @error('hero_title_line3') is-invalid @enderror" name="hero_title_line3" 
                               value="{{ old('hero_title_line3', $page->content['hero_title_line3'] ?? 'di Joss Gandos') }}" required>
                        @error('hero_title_line3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi Hero</label>
                    <textarea class="form-control @error('hero_description') is-invalid @enderror" name="hero_description" rows="3" required>{{ old('hero_description', $page->content['hero_description'] ?? 'Rasakan sensasi kuliner terbaik dengan cita rasa autentik, bahan berkualitas, dan suasana nyaman yang cocok untuk keluarga, teman, atau acara spesial Anda.') }}</textarea>
                    @error('hero_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol Menu</label>
                        <input type="text" class="form-control @error('hero_button_menu') is-invalid @enderror" name="hero_button_menu" 
                               value="{{ old('hero_button_menu', $page->content['hero_button_menu'] ?? 'Lihat Menu') }}" required>
                        @error('hero_button_menu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol Reservasi</label>
                        <input type="text" class="form-control @error('hero_button_reservation') is-invalid @enderror" name="hero_button_reservation" 
                               value="{{ old('hero_button_reservation', $page->content['hero_button_reservation'] ?? 'Pesan Meja') }}" required>
                        @error('hero_button_reservation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">URL Gambar Hero</label>
                    <input type="url" class="form-control @error('hero_image_url') is-invalid @enderror" name="hero_image_url" 
                           value="{{ old('hero_image_url', $page->content['hero_image_url'] ?? 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw') }}" required>
                    @error('hero_image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    @if(isset($page->content['hero_image_url']))
                    <div class="mt-2">
                        <img src="{{ $page->content['hero_image_url'] }}" alt="Hero Preview" style="max-height: 100px; border-radius: 5px;">
                    </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Teks Premium Badge</label>
                    <input type="text" class="form-control @error('hero_premium_badge') is-invalid @enderror" name="hero_premium_badge" 
                           value="{{ old('hero_premium_badge', $page->content['hero_premium_badge'] ?? '#1 RESTO & CAFE KETINTANG') }}" required>
                    @error('hero_premium_badge')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- WELCOME SECTION -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Welcome Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control @error('welcome_title_line1') is-invalid @enderror" name="welcome_title_line1" 
                               value="{{ old('welcome_title_line1', $page->content['welcome_title_line1'] ?? 'Selamat Datang') }}" required>
                        @error('welcome_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control @error('welcome_title_line2') is-invalid @enderror" name="welcome_title_line2" 
                               value="{{ old('welcome_title_line2', $page->content['welcome_title_line2'] ?? 'Resto Joss Gandos') }}" required>
                        @error('welcome_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi Welcome</label>
                    <textarea class="form-control @error('welcome_description') is-invalid @enderror" name="welcome_description" rows="3" required>{{ old('welcome_description', $page->content['welcome_description'] ?? 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.') }}</textarea>
                    @error('welcome_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label">URL Gambar Welcome</label>
                    <input type="url" class="form-control @error('welcome_image_url') is-invalid @enderror" name="welcome_image_url" 
                           value="{{ old('welcome_image_url', $page->content['welcome_image_url'] ?? 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" required>
                    @error('welcome_image_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    @if(isset($page->content['welcome_image_url']))
                    <div class="mt-2">
                        <img src="{{ $page->content['welcome_image_url'] }}" alt="Welcome Preview" style="max-height: 100px; border-radius: 5px;">
                    </div>
                    @endif
                </div>
                
                <h6 class="mt-4 mb-3 p-2" style="background-color: #e9ecef;">Fitur Unggulan</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 1</label>
                        <input type="text" class="form-control @error('feature_1_text') is-invalid @enderror" name="feature_1_text" 
                               value="{{ old('feature_1_text', $page->content['feature_1_text'] ?? 'Bahan premium pilihan terbaik') }}" required>
                        @error('feature_1_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 2</label>
                        <input type="text" class="form-control @error('feature_2_text') is-invalid @enderror" name="feature_2_text" 
                               value="{{ old('feature_2_text', $page->content['feature_2_text'] ?? 'Chef berpengalaman & profesional') }}" required>
                        @error('feature_2_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 3</label>
                        <input type="text" class="form-control @error('feature_3_text') is-invalid @enderror" name="feature_3_text" 
                               value="{{ old('feature_3_text', $page->content['feature_3_text'] ?? 'Suasana nyaman untuk keluarga') }}" required>
                        @error('feature_3_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 4</label>
                        <input type="text" class="form-control @error('feature_4_text') is-invalid @enderror" name="feature_4_text" 
                               value="{{ old('feature_4_text', $page->content['feature_4_text'] ?? 'Pelayanan ramah & cepat') }}" required>
                        @error('feature_4_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                </div>
            </div>
        </div>

        <!-- SERVICES SECTION -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Services Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control @error('services_title_line1') is-invalid @enderror" name="services_title_line1" 
                               value="{{ old('services_title_line1', $page->content['services_title_line1'] ?? 'Fasilitas &') }}" required>
                        @error('services_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control @error('services_title_line2') is-invalid @enderror" name="services_title_line2" 
                               value="{{ old('services_title_line2', $page->content['services_title_line2'] ?? 'Pelayanan Premium') }}" required>
                        @error('services_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control @error('services_subtitle') is-invalid @enderror" name="services_subtitle" rows="2" required>{{ old('services_subtitle', $page->content['services_subtitle'] ?? 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda') }}</textarea>
                    @error('services_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h6 class="mt-4 mb-3 p-2" style="background-color: #e9ecef;">Detail Layanan (Semua Bisa Diedit)</h6>
                
                @for($i = 1; $i <= 6; $i++)
                @php
                    $iconDefault = $i == 1 ? 'fas fa-utensils' : ($i == 2 ? 'fas fa-users' : ($i == 3 ? 'fas fa-calendar-alt' : ($i == 4 ? 'fas fa-wifi' : ($i == 5 ? 'fas fa-mosque' : 'fas fa-parking'))));
                    $titleDefault = $i == 1 ? 'Dine In' : ($i == 2 ? 'Private Room' : ($i == 3 ? 'Event & Catering' : ($i == 4 ? 'Free WiFi' : ($i == 5 ? 'Musholla' : 'Parkir Luas'))));
                    $descDefault = $i == 1 ? 'Nikmati hidangan istimewa di ruangan ber-AC dengan suasana nyaman dan elegan' : 
                                   ($i == 2 ? 'Ruangan VIP untuk acara spesial, meeting, dan gathering dengan fasilitas karaoke' : 
                                   ($i == 3 ? 'Layanan catering dan penyelenggaraan acara untuk berbagai kebutuhan Anda' : 
                                   ($i == 4 ? 'Internet cepat gratis untuk mendukung aktivitas bisnis dan hiburan Anda' : 
                                   ($i == 5 ? 'Fasilitas musholla yang bersih dan nyaman untuk beribadah dengan tenang' : 
                                   'Area parkir yang luas dan aman untuk mobil dan motor kendaraan Anda'))));
                @endphp
                <div class="card mb-3 border">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Layanan {{ $i }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Icon (FontAwesome)</label>
                                <input type="text" class="form-control" name="service_{{ $i }}_icon" 
                                       value="{{ old('service_'.$i.'_icon', $page->content['service_'.$i.'_icon'] ?? $iconDefault) }}">
                                <small class="text-muted">Contoh: fas fa-utensils</small>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Judul</label>
                                <input type="text" class="form-control" name="service_{{ $i }}_title" 
                                       value="{{ old('service_'.$i.'_title', $page->content['service_'.$i.'_title'] ?? $titleDefault) }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" name="service_{{ $i }}_description" rows="2">{{ old('service_'.$i.'_description', $page->content['service_'.$i.'_description'] ?? $descDefault) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

       <!-- TESTIMONIALS SECTION -->
<div class="card mb-4">
    <div class="card-header bg-warning text-dark">
        <h5 class="mb-0">Testimonials Section</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Judul Baris 1</label>
                <input type="text" class="form-control @error('testimonials_title_line1') is-invalid @enderror" name="testimonials_title_line1" 
                       value="{{ old('testimonials_title_line1', $page->content['testimonials_title_line1'] ?? 'Apa Kata') }}" required>
                @error('testimonials_title_line1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Judul Baris 2 (Gradient)</label>
                <input type="text" class="form-control @error('testimonials_title_line2') is-invalid @enderror" name="testimonials_title_line2" 
                       value="{{ old('testimonials_title_line2', $page->content['testimonials_title_line2'] ?? 'Pelanggan Kami?') }}" required>
                @error('testimonials_title_line2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <textarea class="form-control @error('testimonials_subtitle') is-invalid @enderror" name="testimonials_subtitle" rows="2" required>{{ old('testimonials_subtitle', $page->content['testimonials_subtitle'] ?? 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos') }}</textarea>
            @error('testimonials_subtitle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <h6 class="mt-4 mb-3 p-2" style="background-color: #e9ecef;">Testimoni (Semua Bisa Diedit)</h6>
        
        @for($i = 1; $i <= 9; $i++)
        @php
            $nameDefault = $i == 1 ? 'Achmad Thoriq' : 
                          ($i == 2 ? 'Perpus Uinsa' : 
                          ($i == 3 ? 'Karenina Anisya' : 
                          ($i == 4 ? 'Filidyo Bramanta' : 
                          ($i == 5 ? 'M. Junianto Tri' : 
                          ($i == 6 ? 'Metha Prosper' :
                          ($i == 7 ? 'Budi Santoso' :
                          ($i == 8 ? 'Siti Nurhaliza' : 'Rizki Firmansyah')))))));
                          
            $textDefault = $i == 1 ? 'Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👍. Ngerayain ulang tahun disini seru banget!' : 
                          ($i == 2 ? 'Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen.' : 
                          ($i == 3 ? 'Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga.' : 
                          ($i == 4 ? 'Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup.' : 
                          ($i == 5 ? 'Layanan sat set dan super ramah. Mushola luas, bisa shalat jamaah. Ruangan VIP tersedia karaoke, mantab buat seru-seruan.' : 
                          ($i == 6 ? 'Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul' :
                          ($i == 7 ? 'Tempatnya cozy banget, cocok buat nongkrong sama teman-teman. Pelayanan cepat dan ramah, makanannya juga enak-enak. Bakal kesini lagi!' :
                          ($i == 8 ? 'Suasananya nyaman, bersih, dan staffnya sangat helpful. Menu variatif dan harganya terjangkau. Recommended buat makan keluarga.' :
                          'Live musicnya seru, makanannya lezat, minumannya juga segar-segar. Pelayanan memuaskan, bikin betah berlama-lama.')))))));
        @endphp
        <div class="card mb-3 border">
            <div class="card-header bg-light">
                <h6 class="mb-0">Testimoni {{ $i }}</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="testimonial_{{ $i }}_name" 
                               value="{{ old('testimonial_'.$i.'_name', $page->content['testimonial_'.$i.'_name'] ?? $nameDefault) }}">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Asal/Sumber</label>
                        <input type="text" class="form-control" name="testimonial_{{ $i }}_source" 
                               value="{{ old('testimonial_'.$i.'_source', $page->content['testimonial_'.$i.'_source'] ?? 'Google Reviews') }}">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Rating (1-5)</label>
                        <select class="form-control" name="testimonial_{{ $i }}_rating">
                            @for($r = 1; $r <= 5; $r++)
                            <option value="{{ $r }}" {{ (old('testimonial_'.$i.'_rating', $page->content['testimonial_'.$i.'_rating'] ?? 5) == $r) ? 'selected' : '' }}>{{ $r }} Bintang</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Testimoni</label>
                        <textarea class="form-control" name="testimonial_{{ $i }}_text" rows="2">{{ old('testimonial_'.$i.'_text', $page->content['testimonial_'.$i.'_text'] ?? $textDefault) }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

        <!-- CTA SECTION -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">CTA Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control @error('cta_title_line1') is-invalid @enderror" name="cta_title_line1" 
                               value="{{ old('cta_title_line1', $page->content['cta_title_line1'] ?? 'Siap Merasakan') }}" required>
                        @error('cta_title_line1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2 (Gradient)</label>
                        <input type="text" class="form-control @error('cta_title_line2') is-invalid @enderror" name="cta_title_line2" 
                               value="{{ old('cta_title_line2', $page->content['cta_title_line2'] ?? 'Pengalaman Kuliner Terbaik?') }}" required>
                        @error('cta_title_line2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi CTA</label>
                    <textarea class="form-control @error('cta_description') is-invalid @enderror" name="cta_description" rows="3" required>{{ old('cta_description', $page->content['cta_description'] ?? 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!') }}</textarea>
                    @error('cta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <h6 class="mt-4 mb-3 p-2" style="background-color: #e9ecef;">Tombol CTA</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol 1 (Pesan Sekarang)</label>
                        <input type="text" class="form-control" name="cta_button1_text" 
                               value="{{ old('cta_button1_text', $page->content['cta_button1_text'] ?? 'Pesan Sekarang') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol 2 (Reservasi Sekarang)</label>
                        <input type="text" class="form-control" name="cta_button2_text" 
                               value="{{ old('cta_button2_text', $page->content['cta_button2_text'] ?? 'Reservasi Sekarang') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-md-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    .card-header {
        font-weight: 600;
    }
    .form-label {
        font-weight: 500;
        color: #495057;
    }
</style>
@endsection