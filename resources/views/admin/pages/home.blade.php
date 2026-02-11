@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Halaman Home</h4>
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
        
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Informasi Dasar</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Halaman</label>
                        <input type="text" class="form-control" name="title" 
                               value="{{ old('title', $page->title ?? 'Beranda') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" 
                               value="{{ old('meta_title', $page->meta_title ?? '') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control" name="meta_description" rows="3">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Hero Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control" name="hero_title_line1" 
                               value="{{ old('hero_title_line1', $page->content['hero_title_line1'] ?? 'Selamat Datang di') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2</label>
                        <input type="text" class="form-control" name="hero_title_line2" 
                               value="{{ old('hero_title_line2', $page->content['hero_title_line2'] ?? 'Resto Joss Gandos') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control" name="hero_subtitle" rows="2" required>{{ old('hero_subtitle', $page->content['hero_subtitle'] ?? 'Pelopor No. 1 Resto dan Cafe di Jemursari') }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol 1</label>
                        <input type="text" class="form-control" name="hero_button1_text" 
                               value="{{ old('hero_button1_text', $page->content['hero_button1_text'] ?? 'Jelajahi') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Teks Tombol 2</label>
                        <input type="text" class="form-control" name="hero_button2_text" 
                               value="{{ old('hero_button2_text', $page->content['hero_button2_text'] ?? 'Reservasi') }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Welcome Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control" name="welcome_title_line1" 
                               value="{{ old('welcome_title_line1', $page->content['welcome_title_line1'] ?? 'Selamat Datang') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2</label>
                        <input type="text" class="form-control" name="welcome_title_line2" 
                               value="{{ old('welcome_title_line2', $page->content['welcome_title_line2'] ?? 'Resto Joss Gandos') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="welcome_description" rows="3" required>{{ old('welcome_description', $page->content['welcome_description'] ?? 'Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.') }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 1</label>
                        <input type="text" class="form-control" name="feature_1_text" 
                               value="{{ old('feature_1_text', $page->content['feature_1_text'] ?? 'Bahan premium pilihan terbaik') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 2</label>
                        <input type="text" class="form-control" name="feature_2_text" 
                               value="{{ old('feature_2_text', $page->content['feature_2_text'] ?? 'Chef berpengalaman & profesional') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 3</label>
                        <input type="text" class="form-control" name="feature_3_text" 
                               value="{{ old('feature_3_text', $page->content['feature_3_text'] ?? 'Suasana nyaman untuk keluarga') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fitur 4</label>
                        <input type="text" class="form-control" name="feature_4_text" 
                               value="{{ old('feature_4_text', $page->content['feature_4_text'] ?? 'Pelayanan ramah & cepat') }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jumlah Menu</label>
                        <input type="number" class="form-control" name="stat_menu_count" 
                               value="{{ old('stat_menu_count', $page->content['stat_menu_count'] ?? '50') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jumlah Pelanggan</label>
                        <input type="number" class="form-control" name="stat_customer_count" 
                               value="{{ old('stat_customer_count', $page->content['stat_customer_count'] ?? '1000') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Rating</label>
                        <input type="number" step="0.1" class="form-control" name="stat_rating_count" 
                               value="{{ old('stat_rating_count', $page->content['stat_rating_count'] ?? '5') }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Services Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control" name="services_title_line1" 
                               value="{{ old('services_title_line1', $page->content['services_title_line1'] ?? 'Fasilitas &') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2</label>
                        <input type="text" class="form-control" name="services_title_line2" 
                               value="{{ old('services_title_line2', $page->content['services_title_line2'] ?? 'Pelayanan Premium') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control" name="services_subtitle" rows="2" required>{{ old('services_subtitle', $page->content['services_subtitle'] ?? 'Nikmati berbagai fasilitas dan layanan terbaik untuk kenyamanan Anda') }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Testimonials Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control" name="testimonials_title_line1" 
                               value="{{ old('testimonials_title_line1', $page->content['testimonials_title_line1'] ?? 'Apa Kata') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2</label>
                        <input type="text" class="form-control" name="testimonials_title_line2" 
                               value="{{ old('testimonials_title_line2', $page->content['testimonials_title_line2'] ?? 'Pelanggan Kami?') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subtitle</label>
                    <textarea class="form-control" name="testimonials_subtitle" rows="2" required>{{ old('testimonials_subtitle', $page->content['testimonials_subtitle'] ?? 'Ribuan pelanggan puas telah merasakan kehangatan dan kelezatan Joss Gandos') }}</textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">CTA Section</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 1</label>
                        <input type="text" class="form-control" name="cta_title_line1" 
                               value="{{ old('cta_title_line1', $page->content['cta_title_line1'] ?? 'Siap Merasakan') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Judul Baris 2</label>
                        <input type="text" class="form-control" name="cta_title_line2" 
                               value="{{ old('cta_title_line2', $page->content['cta_title_line2'] ?? 'Pengalaman Kuliner Terbaik?') }}" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="cta_description" rows="3" required>{{ old('cta_description', $page->content['cta_description'] ?? 'Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!') }}</textarea>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary me-md-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection