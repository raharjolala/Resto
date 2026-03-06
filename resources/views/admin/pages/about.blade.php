@extends('layouts.admin')

@section('title', 'Edit About Page')
@section('page-title', 'Edit About Page')

@section('content')
<div class="container-fluid px-4">
    <!-- Header dengan Premium Red Gradient Theme -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="page-header d-flex align-items-center justify-content-between p-4 rounded-4" 
                 style="background: linear-gradient(145deg, #DC143C, #B22234, #8B0000); box-shadow: 0 20px 40px rgba(220, 20, 60, 0.3);">
                <div>
                    <h4 class="text-white mb-1 fw-bold" style="font-size: 1.8rem;">
                        <i class="fas fa-info-circle me-2"></i>Edit About Page
                    </h4>
                    <p class="text-white text-opacity-75 mb-0">
                        <i class="fas fa-sync-alt me-1 fa-spin" style="font-size: 0.8rem;"></i>
                        Semua data yang diedit di sini akan langsung terupdate di halaman /about
                    </p>
                </div>
                <a href="{{ route('about') }}" target="_blank" class="btn btn-light rounded-pill px-4 py-2 shadow-lg" 
                   style="background: rgba(255,255,255,0.95); border: none; color: #DC143C; font-weight: 600;">
                    <i class="fas fa-eye me-2"></i>Lihat Halaman About
                    <i class="fas fa-external-link-alt ms-1" style="font-size: 0.8rem;"></i>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show glass-alert" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">
                <i class="fas fa-check-circle fa-2x"></i>
            </div>
            <div>
                <strong class="d-block">Berhasil!</strong>
                {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show glass-alert" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon me-3">
                <i class="fas fa-exclamation-circle fa-2x"></i>
            </div>
            <div>
                <strong class="d-block">Oops!</strong>
                {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <form action="{{ route('admin.pages.about.update') }}" method="POST" enctype="multipart/form-data" id="aboutForm">
        @csrf
            
        @php
            $content = $page->content ?? [];
            
            // Ambil history paragraphs
            $historyParagraphs = [];
            for ($i = 1; $i <= 10; $i++) {
                if (isset($content['history_description_' . $i])) {
                    $historyParagraphs[] = $content['history_description_' . $i];
                }
            }
            if (empty($historyParagraphs)) {
                $historyParagraphs = [
                    'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.',
                    'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah Bebek Joss Gandos — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.',
                    'Nama Joss Gandos dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.',
                    'Berdiri pada 28 Oktober 2017, kami menjadi salah satu resto pionir di kawasan Jalan Jemursari, jauh sebelum banyak resto lain bermunculan di sepanjang jalan ini.'
                ];
            }
            
            // Timeline
            $timelineData = $content['timeline'] ?? [];
            if (!is_array($timelineData) || empty($timelineData)) {
                $timelineData = [
                    ['year' => '2017', 'title' => 'Awal Berdiri', 'items' => ['Didirikan oleh CEO Dr. Siswanto', 'Menu khas Banyuwangi (Bebek & Rujak Soto)', 'Nama awal: "Bebek Joss Gandos"', 'Fasilitas: Karaoke VIP, Wedding, Live Music', 'Tim awal: 15 orang']],
                    ['year' => '2018-19', 'title' => 'Merintis & Inovasi', 'items' => ['Masa perjuangan mendapatkan kepercayaan customer', 'Mengembangkan variasi menu', 'Menjadi pionir kuliner di Jemursari']],
                    ['year' => '2020', 'title' => 'Bertahan di Pandemi', 'items' => ['Tutup sementara 3 bulan & SDM terbatas', 'Beradaptasi dengan jual sembako & pesan antar', 'Bukti kekuatan dan solidaritas tim']],
                    ['year' => '2021', 'title' => 'Bangkit & Menu Baru', 'items' => ['Renovasi area VIP & Outdoor', 'Peluncuran Gulai Kepala Ikan Salmon', 'Aneka menu nusantara autentik']],
                    ['year' => '2022', 'title' => 'Semakin Dipercaya', 'items' => ['Peningkatan pesat customer event & gathering', 'Fasilitas Karaoke VIP menjadi daya tarik utama']],
                    ['year' => '2023', 'title' => 'Ekspansi & Menu Ikonik', 'items' => ['Renovasi besar: 6 VIP Room', 'Gulai Kepala Ikan Salmon menjadi ikon', 'Tanpa santan, kaya rempah']],
                    ['year' => '2024', 'title' => 'Cabang Baru', 'items' => ['Peningkatan layanan pesan antar & reservasi', 'Agustus 2024: Cabang baru di Ketintang']],
                    ['year' => '2025', 'title' => 'Sewindu Joss Gandos!', 'items' => ['8 tahun perjalanan penuh perjuangan', 'Siap melangkah lebih jauh']],
                ];
            }
            
            // Missions
            $missionsData = $content['missions'] ?? [];
            if (!is_array($missionsData) || empty($missionsData)) {
                $missionsData = [
                    ['title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar pilihan.'],
                    ['title' => 'Pelayanan Prima', 'description' => 'Memberikan pelayanan cepat, ramah, dan profesional kepada setiap tamu.'],
                    ['title' => 'Suasana Nyaman', 'description' => 'Menciptakan suasana bersih, nyaman, dan bersahabat untuk seluruh keluarga.'],
                    ['title' => 'Inovasi Berkelanjutan', 'description' => 'Terus berinovasi dalam menu dan layanan untuk kepuasan pelanggan.'],
                    ['title' => 'Standar Kebersihan', 'description' => 'Menjaga standar kebersihan (hygiene) tertinggi di setiap area.'],
                    ['title' => 'Kontribusi Sosial', 'description' => 'Memberikan kontribusi positif bagi lingkungan sekitar.'],
                ];
            }
            
            // Team Members
            $teamMembersData = $content['team_members'] ?? [];
            if (!is_array($teamMembersData) || empty($teamMembersData)) {
                $teamMembersData = [
                    ['name' => 'Ahmad Santoso', 'position' => 'Head Chef', 'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional'],
                    ['name' => 'Sari Dewi', 'position' => 'Restaurant Manager', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'],
                    ['name' => 'Budi Hartono', 'position' => 'F&B Director', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Pengembangan menu dan kontrol kualitas bahan'],
                ];
            }
        @endphp
        
        <!-- SEO & Basic Info -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.1s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        Informasi Dasar & SEO
                    </h5>
                    <span class="badge-status">SEO</span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading me-1" style="color: #DC143C;"></i>
                                Judul Halaman *
                            </label>
                            <input type="text" class="form-control custom-input" id="title" name="title" 
                                   value="{{ old('title', $page->title ?? 'Tentang Kami') }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tag me-1" style="color: #DC143C;"></i>
                                Meta Title (SEO)
                            </label>
                            <input type="text" class="form-control custom-input" id="meta_title" name="meta_title" 
                                   value="{{ old('meta_title', $page->meta_title ?? 'Tentang Kami - JOSS GANDOS') }}">
                            <small class="text-muted mt-1 d-block">
                                <i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>
                                Judul untuk SEO (maks 255 karakter)
                            </small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-align-left me-1" style="color: #DC143C;"></i>
                                Meta Description (SEO)
                            </label>
                            <textarea class="form-control custom-input" id="meta_description" name="meta_description" 
                                      rows="2">{{ old('meta_description', $page->meta_description ?? 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017') }}</textarea>
                            <small class="text-muted mt-1 d-block">
                                <i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>
                                Deskripsi untuk SEO (maks 500 karakter)
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.2s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-star"></i>
                        </span>
                        Hero Section (Bagian Atas)
                    </h5>
                    <span class="badge-status">Utama</span>
                </div>
            </div>
            <div class="card-body">
                <div class="info-alert mb-4">
                    <i class="fas fa-info-circle me-2"></i>
                    Hero section menggunakan gambar dari URL. Pastikan URL gambar valid.
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Subtitle Hero *</label>
                        <textarea class="form-control custom-input" id="hero_subtitle" name="hero_subtitle" rows="3" required>{{ old('hero_subtitle', $content['hero_subtitle'] ?? 'Delapan tahun perjalanan dari semangat IT hingga menjadi pionir kuliner di Jemursari dengan menu andalan yang menginspirasi.') }}</textarea>
                        <small class="text-muted">Teks yang muncul di bawah judul utama</small>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-link me-1" style="color: #DC143C;"></i>
                            URL Gambar Hero *
                        </label>
                        <div class="url-input-group">
                            <input type="url" class="form-control custom-input" id="hero_image" name="hero_image" 
                                   value="{{ old('hero_image', $content['hero_image'] ?? 'https://lh3.googleusercontent.com/p/AF1QipPeNAHLmZKVY7MohcUXoRkYk8UReqJKN78t9BgI=s1360-w1360-h1020-rw') }}" 
                                   required
                                   onchange="previewHeroImage(this.value)">
                            <i class="fas fa-eye url-preview-icon" onclick="previewHeroImage(document.getElementById('hero_image').value)" title="Preview Gambar"></i>
                        </div>
                        <small class="text-muted">Link gambar untuk hero section</small>
                    </div>
                </div>
                
                <div class="mt-3 image-preview-container" id="heroPreviewContainer" style="{{ isset($content['hero_image']) ? 'display: block;' : 'display: none;' }}">
                    <label class="form-label small">Preview Gambar Hero:</label>
                    <div class="image-preview-wrapper">
                        <img src="{{ $content['hero_image'] ?? '' }}" alt="Hero Preview" class="image-preview" id="heroPreview">
                    </div>
                </div>
            </div>
        </div>

        <!-- History Section dengan Paragraf yang Bisa Ditambah -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.3s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-history"></i>
                        </span>
                        Sejarah Restoran
                    </h5>
                    <button type="button" class="btn btn-add" id="add-history-paragraph">
                        <i class="fas fa-plus me-1"></i> Tambah Paragraf Sejarah
                    </button>
                </div>
            </div>
            <div class="card-body" id="history-paragraphs-container">
                @foreach($historyParagraphs as $index => $paragraph)
                <div class="history-paragraph-item card mb-3" data-index="{{ $index }}">
                    <div class="history-paragraph-header" data-bs-toggle="collapse" href="#historyParagraph{{ $index }}Collapse" role="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="historyParagraph{{ $index }}Collapse">
                        <div>
                            <i class="fas fa-paragraph me-2" style="color: #DC143C;"></i>
                            Paragraf Sejarah {{ $index + 1 }}
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-history-paragraph" 
                                onclick="event.stopPropagation()"
                                {{ count($historyParagraphs) <= 1 ? 'disabled' : '' }}>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse {{ $loop->first ? 'show' : '' }}" id="historyParagraph{{ $index }}Collapse">
                        <div class="history-paragraph-body">
                            <div class="form-group">
                                <label class="form-label small">Isi Paragraf *</label>
                                <textarea class="form-control custom-input" name="history_paragraphs[]" rows="3" required>{{ $paragraph }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Timeline -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.4s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-clock"></i>
                        </span>
                        Timeline Sejarah
                    </h5>
                    <button type="button" class="btn btn-add" id="add-timeline">
                        <i class="fas fa-plus me-1"></i> Tambah Timeline
                    </button>
                </div>
            </div>
            <div class="card-body" id="timeline-container">
                @foreach($timelineData as $index => $item)
                <div class="timeline-item card mb-3" data-index="{{ $index }}">
                    <div class="timeline-header" data-bs-toggle="collapse" href="#timeline{{ $index }}Collapse" role="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="timeline{{ $index }}Collapse">
                        <div>
                            <i class="fas fa-calendar-alt me-2" style="color: #DC143C;"></i>
                            <span class="fw-bold">{{ $item['year'] ?? '' }}</span> - {{ $item['title'] ?? '' }}
                        </div>
                        <div>
                            <span class="badge bg-light text-dark me-2">{{ count($item['items'] ?? []) }} item</span>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-timeline" 
                                    onclick="event.stopPropagation()"
                                    {{ count($timelineData) <= 1 ? 'disabled' : '' }}>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="collapse {{ $loop->first ? 'show' : '' }}" id="timeline{{ $index }}Collapse">
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label small">Tahun *</label>
                                        <input type="text" class="form-control custom-input" name="timeline[{{ $index }}][year]" 
                                               value="{{ $item['year'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-label small">Judul *</label>
                                        <input type="text" class="form-control custom-input" name="timeline[{{ $index }}][title]" 
                                               value="{{ $item['title'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label small">Item Timeline * (satu per baris)</label>
                                <textarea class="form-control custom-input timeline-items" name="timeline[{{ $index }}][items]" 
                                          rows="4" required>@if(isset($item['items'])){{ is_array($item['items']) ? implode("\n", $item['items']) : $item['items'] }}@endif</textarea>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>
                                    Masukkan satu item per baris
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Founder Section -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.5s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-user-tie"></i>
                        </span>
                        Bagian Founder
                    </h5>
                    <span class="badge-status">Founder</span>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Deskripsi Founder *</label>
                        <textarea class="form-control custom-input" id="founder_description" name="founder_description" rows="2" required>{{ old('founder_description', $content['founder_description'] ?? 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.') }}</textarea>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Cerita Founder (Awal Berdiri) *</label>
                        <textarea class="form-control custom-input" id="founder_story" name="founder_story" rows="2" required>{{ old('founder_story', $content['founder_story_1'] ?? 'Berawal dari rintisan sederhana bernama "Bebek Joss Gandos", beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.') }}</textarea>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Filosofi Founder *</label>
                        <textarea class="form-control custom-input" id="founder_philosophy" name="founder_philosophy" rows="2" required>{{ old('founder_philosophy', $content['founder_story_2'] ?? 'Di bawah kepemimpinan beliau dengan filosofi semangat "Joss, Mantap, dan Luar Biasa", resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik Gulai Kepala Ikan Salmon.') }}</textarea>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Komitmen Founder *</label>
                        <textarea class="form-control custom-input" id="founder_commitment" name="founder_commitment" rows="2" required>{{ old('founder_commitment', $content['founder_commitment'] ?? 'Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.') }}</textarea>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-link me-1" style="color: #DC143C;"></i>
                            URL Gambar Founder *
                        </label>
                        <div class="url-input-group">
                            <input type="url" class="form-control custom-input" id="founder_image" name="founder_image" 
                                   value="{{ old('founder_image', $content['founder_image'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" 
                                   required
                                   onchange="previewFounderImage(this.value)">
                            <i class="fas fa-eye url-preview-icon" onclick="previewFounderImage(document.getElementById('founder_image').value)" title="Preview Gambar"></i>
                        </div>
                        <small class="text-muted">Link gambar founder</small>
                    </div>
                </div>
                
                <div class="mt-3 image-preview-container" id="founderPreviewContainer" style="{{ isset($content['founder_image']) ? 'display: block;' : 'display: none;' }}">
                    <label class="form-label small">Preview Gambar Founder:</label>
                    <div class="image-preview-wrapper">
                        <img src="{{ $content['founder_image'] ?? '' }}" alt="Founder Preview" class="image-preview" id="founderPreview">
                    </div>
                </div>
            </div>
        </div>

        <!-- Vision Section -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.6s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-eye"></i>
                        </span>
                        Visi Perusahaan
                    </h5>
                    <span class="badge-status">Visi</span>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="form-group">
                        <label class="form-label">Visi Perusahaan *</label>
                        <textarea class="form-control custom-input" id="vision_quote" name="vision_quote" rows="3" required>{{ old('vision_quote', $content['vision_quote'] ?? 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.7s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-bullseye"></i>
                        </span>
                        Misi Perusahaan
                    </h5>
                    <button type="button" class="btn btn-add" id="add-mission">
                        <i class="fas fa-plus me-1"></i> Tambah Misi
                    </button>
                </div>
            </div>
            <div class="card-body" id="missions-container">
                @foreach($missionsData as $index => $mission)
                <div class="mission-item card mb-3" data-index="{{ $index }}">
                    <div class="mission-header" data-bs-toggle="collapse" href="#mission{{ $index }}Collapse" role="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="mission{{ $index }}Collapse">
                        <div>
                            <i class="fas fa-bullseye me-2" style="color: #DC143C;"></i>
                            {{ $mission['title'] ?? 'Misi' }}
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-mission" 
                                onclick="event.stopPropagation()"
                                {{ count($missionsData) <= 1 ? 'disabled' : '' }}>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse {{ $loop->first ? 'show' : '' }}" id="mission{{ $index }}Collapse">
                        <div class="mission-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">Judul *</label>
                                        <input type="text" class="form-control custom-input" name="missions[{{ $index }}][title]" 
                                               value="{{ $mission['title'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label small">Deskripsi *</label>
                                        <input type="text" class="form-control custom-input" name="missions[{{ $index }}][description]" 
                                               value="{{ $mission['description'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Team Section -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.8s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-users"></i>
                        </span>
                        Tim Kami
                    </h5>
                    <button type="button" class="btn btn-add" id="add-team-member">
                        <i class="fas fa-plus me-1"></i> Tambah Anggota Tim
                    </button>
                </div>
            </div>
            <div class="card-body" id="team-members-container">
                @foreach($teamMembersData as $index => $member)
                <div class="team-member-item card mb-3" data-index="{{ $index }}">
                    <div class="team-member-header" data-bs-toggle="collapse" href="#teamMember{{ $index }}Collapse" role="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="teamMember{{ $index }}Collapse">
                        <div>
                            <i class="fas fa-user-circle me-2" style="color: #DC143C;"></i>
                            {{ $member['name'] ?? 'Anggota Tim' }}
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-team-member" 
                                onclick="event.stopPropagation()"
                                {{ count($teamMembersData) <= 1 ? 'disabled' : '' }}>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse {{ $loop->first ? 'show' : '' }}" id="teamMember{{ $index }}Collapse">
                        <div class="team-member-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">Nama *</label>
                                        <input type="text" class="form-control custom-input" name="team_members[{{ $index }}][name]" 
                                               value="{{ $member['name'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">Posisi *</label>
                                        <input type="text" class="form-control custom-input" name="team_members[{{ $index }}][position]" 
                                               value="{{ $member['position'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">URL Gambar *</label>
                                        <input type="url" class="form-control custom-input" name="team_members[{{ $index }}][image]" 
                                               value="{{ $member['image'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label small">Deskripsi *</label>
                                <textarea class="form-control custom-input" name="team_members[{{ $index }}][description]" 
                                          rows="2" required>{{ $member['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- CTA Section -->
        <div class="card main-card mb-4 fade-in-up" style="animation-delay: 0.9s;">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 header-title">
                        <span class="header-icon">
                            <i class="fas fa-bullhorn"></i>
                        </span>
                        Call to Action (CTA)
                    </h5>
                    <span class="badge-status">CTA</span>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Judul CTA *</label>
                        <input type="text" class="form-control custom-input" id="cta_title" name="cta_title" 
                               value="{{ old('cta_title', $content['cta_title'] ?? 'Rasakan Cita Rasa Luar Biasa') }}" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-group">
                        <label class="form-label">Deskripsi CTA *</label>
                        <textarea class="form-control custom-input" id="cta_description" name="cta_description" rows="3" required>{{ old('cta_description', $content['cta_description'] ?? 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="d-flex justify-content-between mt-5 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-outline">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
            
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-preview me-2" id="previewBtn">
                    <i class="fas fa-eye me-2"></i>Preview
                </button>
                <button type="submit" class="btn btn-admin">
                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    /* ===== PREMIUM RED GRADIENT THEME ===== */
    :root {
        /* Red Gradient Palette */
        --red-50: #FFF1F3;
        --red-100: #FFE4E8;
        --red-200: #FFB3C1;
        --red-300: #FF8A9F;
        --red-400: #FF4D6D;
        --red-500: #DC143C;
        --red-600: #B22234;
        --red-700: #8B0000;
        --red-800: #5C0000;
        --red-900: #2E0000;
        
        /* Gradients */
        --gradient-primary: linear-gradient(145deg, #DC143C, #B22234, #8B0000);
        --gradient-secondary: linear-gradient(145deg, #FF4D6D, #DC143C);
        --gradient-soft: linear-gradient(145deg, #FFF1F3, #FFE4E8, #FFD1D9);
        --gradient-glass: linear-gradient(145deg, rgba(220, 20, 60, 0.05), rgba(139, 0, 0, 0.02));
        --gradient-shine: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        
        /* Shadows */
        --shadow-sm: 0 5px 20px rgba(220, 20, 60, 0.08);
        --shadow-md: 0 8px 30px rgba(220, 20, 60, 0.12);
        --shadow-lg: 0 15px 40px rgba(220, 20, 60, 0.18);
        --shadow-xl: 0 25px 50px rgba(220, 20, 60, 0.25);
        
        /* Border Radius */
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --radius-full: 9999px;
        
        /* Font */
        --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    * {
        font-family: var(--font-sans);
    }

    body {
        background: #faf7f5;
    }

    /* ===== PAGE HEADER ===== */
    .page-header {
        position: relative;
        overflow: hidden;
        border-radius: var(--radius-xl) !important;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.2), transparent 70%);
        border-radius: 50%;
        animation: floatHeader 15s ease-in-out infinite;
    }

    .page-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -10%;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
        border-radius: 50%;
        animation: floatHeader 20s ease-in-out infinite reverse;
    }

    @keyframes floatHeader {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(40px, -40px) scale(1.2); }
        66% { transform: translate(-20px, 20px) scale(0.8); }
    }

    .fa-spin {
        animation: fa-spin 2s infinite linear;
    }

    /* ===== MAIN CARD ===== */
    .main-card {
        border: none;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        background: white;
    }

    .main-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-5px);
    }

    .main-card .card-header {
        background: white;
        border-bottom: 2px solid var(--red-100);
        padding: 1.2rem 1.5rem;
        position: relative;
    }

    .main-card .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-primary);
    }

    .header-title {
        color: var(--red-700);
        font-weight: 700;
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .header-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: var(--gradient-soft);
        border-radius: var(--radius-md);
        color: var(--red-500);
        font-size: 1.2rem;
    }

    .badge-status {
        background: var(--gradient-soft);
        color: var(--red-700);
        padding: 6px 16px;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        font-weight: 600;
        border: 1px solid var(--red-200);
    }

    /* ===== FORM ELEMENTS ===== */
    .form-label {
        color: var(--red-700);
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .custom-input {
        border: 2px solid #e9ecef;
        border-radius: var(--radius-md);
        padding: 0.7rem 1rem;
        transition: all 0.3s ease;
        background: white;
        font-size: 0.95rem;
    }

    .custom-input:hover {
        border-color: var(--red-300);
    }

    .custom-input:focus {
        border-color: var(--red-500);
        box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
        outline: none;
    }

    /* ===== FILE INPUT ===== */
    .file-input-wrapper {
        position: relative;
    }

    .file-input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--red-500);
        pointer-events: none;
    }

    /* ===== INFO ALERT ===== */
    .info-alert {
        background: var(--gradient-soft);
        color: var(--red-700);
        padding: 1rem 1.5rem;
        border-radius: var(--radius-md);
        border-left: 4px solid var(--red-500);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
    }

    .info-alert i {
        font-size: 1.2rem;
        color: var(--red-500);
    }

    /* ===== URL INPUT GROUP ===== */
    .url-input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .url-input-group .form-control {
        padding-right: 50px;
    }

    .url-preview-icon {
        position: absolute;
        right: 15px;
        color: var(--red-500);
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.2rem;
        background: white;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: var(--radius-full);
        border: 2px solid var(--red-100);
    }

    .url-preview-icon:hover {
        background: var(--gradient-primary);
        color: white;
        transform: scale(1.1);
        border-color: transparent;
    }

    /* ===== IMAGE PREVIEW ===== */
    .image-preview-container {
        margin-top: 1rem;
        padding: 1rem;
        background: var(--gradient-soft);
        border-radius: var(--radius-md);
        border: 2px dashed var(--red-300);
        animation: fadeIn 0.5s ease;
    }

    .image-preview-wrapper {
        max-width: 200px;
        border-radius: var(--radius-md);
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        border: 4px solid white;
        transition: all 0.3s ease;
    }

    .image-preview-wrapper:hover {
        transform: scale(1.05);
        box-shadow: var(--shadow-xl);
    }

    .image-preview {
        width: 100%;
        height: auto;
        transition: transform 0.5s ease;
    }

    .image-preview:hover {
        transform: scale(1.1);
    }

    /* ===== TIMELINE, VISION, MISSION, TEAM ITEMS ===== */
    .timeline-item, .mission-item, .team-member-item, .history-paragraph-item {
        border: 2px solid var(--red-100);
        border-radius: var(--radius-md);
        overflow: hidden;
        transition: all 0.3s ease;
        background: white;
    }

    .timeline-item:hover, .mission-item:hover, .team-member-item:hover, .history-paragraph-item:hover {
        border-color: var(--red-500);
        box-shadow: var(--shadow-md);
    }

    .timeline-header, .mission-header, .team-member-header, .history-paragraph-header {
        background: linear-gradient(145deg, #fff5f5, #ffffff);
        padding: 1rem 1.2rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        color: var(--red-700);
        transition: all 0.3s ease;
    }

    .timeline-header:hover, .mission-header:hover, .team-member-header:hover, .history-paragraph-header:hover {
        background: linear-gradient(145deg, #ffe4e8, #fff5f5);
    }

    .timeline-body, .mission-body, .team-member-body, .history-paragraph-body {
        padding: 1.2rem;
        background: white;
        border-top: 2px solid var(--red-100);
    }

    /* ===== ADD BUTTON ===== */
    .btn-add {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.5rem 1.2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        overflow: hidden;
    }

    .btn-add::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-add:hover::before {
        left: 100%;
    }

    /* ===== REMOVE BUTTON ===== */
    .btn-outline-danger {
        border: 2px solid var(--red-500);
        color: var(--red-600);
        background: transparent;
        border-radius: var(--radius-full);
        padding: 0.2rem 0.8rem;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-danger:hover:not(:disabled) {
        background: var(--gradient-primary);
        border-color: transparent;
        color: white;
        transform: scale(1.05);
    }

    .btn-outline-danger:disabled {
        border-color: var(--red-200);
        color: var(--red-200);
        cursor: not-allowed;
    }

    /* ===== GLASS ALERT ===== */
    .glass-alert {
        background: white;
        backdrop-filter: blur(10px);
        border: none;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        animation: slideIn 0.5s ease;
        padding: 1.2rem 1.5rem;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.5rem;
    }

    .glass-alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .alert-success {
        border-left: 4px solid #28a745;
    }

    .alert-success::before {
        background: linear-gradient(145deg, #28a745, #20c997);
    }

    .alert-danger {
        border-left: 4px solid var(--red-500);
    }

    .alert-danger::before {
        background: var(--gradient-primary);
    }

    .alert-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.2);
    }

    .alert-success .alert-icon i {
        color: #28a745;
    }

    .alert-danger .alert-icon i {
        color: var(--red-500);
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-admin {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: var(--shadow-md);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
    }

    .btn-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-admin:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    .btn-admin:hover::before {
        left: 100%;
    }

    .btn-admin-outline {
        background: white;
        color: var(--red-600);
        border: 2px solid var(--red-500);
        padding: 0.8rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-admin-outline:hover {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-preview {
        background: linear-gradient(145deg, #f39c12, #e67e22);
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 10px 25px rgba(243, 156, 18, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .btn-preview:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(243, 156, 18, 0.4);
        color: white;
    }

    /* ===== ANIMATIONS ===== */
    .fade-in-up {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* ===== CUSTOM SCROLLBAR ===== */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: var(--red-100);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: var(--gradient-primary);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(145deg, #B22234, #8B0000);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 1rem;
        }
        
        .btn-admin, .btn-admin-outline, .btn-preview {
            width: 100%;
            justify-content: center;
        }

        .d-flex.gap-2 {
            flex-direction: column;
            width: 100%;
        }

        .timeline-header, .mission-header, .team-member-header, .history-paragraph-header {
            flex-direction: column;
            gap: 0.5rem;
            text-align: center;
        }

        .image-preview-wrapper {
            max-width: 100%;
        }
    }

    /* ===== TEXT UTILITIES ===== */
    .text-muted {
        color: #6c757d !important;
        font-size: 0.85rem;
    }

    .text-warning {
        color: #e67e22 !important;
    }

    .text-danger {
        color: var(--red-500) !important;
    }

    .badge.bg-warning {
        background: linear-gradient(145deg, #f39c12, #e67e22) !important;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: var(--radius-full);
        font-weight: 600;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview functions
        window.previewHeroImage = function(url) {
            const previewContainer = document.getElementById('heroPreviewContainer');
            const preview = document.getElementById('heroPreview');
            
            if (url && url.trim() !== '') {
                preview.src = url;
                previewContainer.style.display = 'block';
                
                preview.onerror = function() {
                    this.src = 'https://via.placeholder.com/300x200/FFE4E8/DC143C?text=URL+Tidak+Valid';
                };
            } else {
                previewContainer.style.display = 'none';
            }
        };

        window.previewFounderImage = function(url) {
            const previewContainer = document.getElementById('founderPreviewContainer');
            const preview = document.getElementById('founderPreview');
            
            if (url && url.trim() !== '') {
                preview.src = url;
                previewContainer.style.display = 'block';
                
                preview.onerror = function() {
                    this.src = 'https://via.placeholder.com/300x200/FFE4E8/DC143C?text=URL+Tidak+Valid';
                };
            } else {
                previewContainer.style.display = 'none';
            }
        };

        // Initialize previews
        const heroImage = document.getElementById('hero_image');
        if (heroImage && heroImage.value) {
            previewHeroImage(heroImage.value);
        }

        const founderImage = document.getElementById('founder_image');
        if (founderImage && founderImage.value) {
            previewFounderImage(founderImage.value);
        }

        // ========== HISTORY PARAGRAPHS MANAGEMENT ==========
        const historyContainer = document.getElementById('history-paragraphs-container');
        const addHistoryBtn = document.getElementById('add-history-paragraph');
        let historyIndex = {{ count($historyParagraphs) }};

        if (addHistoryBtn) {
            addHistoryBtn.addEventListener('click', function() {
                const newIndex = historyIndex++;
                const paragraphDiv = document.createElement('div');
                paragraphDiv.className = 'history-paragraph-item card mb-3';
                paragraphDiv.setAttribute('data-index', newIndex);
                paragraphDiv.innerHTML = `
                    <div class="history-paragraph-header" data-bs-toggle="collapse" href="#historyParagraph${newIndex}Collapse" role="button" aria-expanded="true">
                        <div>
                            <i class="fas fa-paragraph me-2" style="color: #DC143C;"></i>
                            Paragraf Sejarah Baru
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-history-paragraph" onclick="event.stopPropagation()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse show" id="historyParagraph${newIndex}Collapse">
                        <div class="history-paragraph-body">
                            <div class="form-group">
                                <label class="form-label small">Isi Paragraf *</label>
                                <textarea class="form-control custom-input" name="history_paragraphs[]" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                `;
                historyContainer.appendChild(paragraphDiv);
                updateHistoryRemoveButtons();
            });
        }

        function updateHistoryRemoveButtons() {
            const historyItems = historyContainer.querySelectorAll('.history-paragraph-item');
            const removeBtns = historyContainer.querySelectorAll('.remove-history-paragraph');
            removeBtns.forEach((btn) => {
                btn.disabled = historyItems.length <= 1;
                btn.onclick = function(e) {
                    e.stopPropagation();
                    if (historyItems.length > 1) {
                        this.closest('.history-paragraph-item').remove();
                        updateHistoryRemoveButtons();
                    }
                };
            });
        }

        // ========== TIMELINE MANAGEMENT ==========
        const timelineContainer = document.getElementById('timeline-container');
        const addTimelineBtn = document.getElementById('add-timeline');
        let timelineIndex = {{ count($timelineData) }};
        
        if (addTimelineBtn) {
            addTimelineBtn.addEventListener('click', function() {
                const newIndex = timelineIndex++;
                const timelineDiv = document.createElement('div');
                timelineDiv.className = 'timeline-item card mb-3';
                timelineDiv.setAttribute('data-index', newIndex);
                timelineDiv.innerHTML = `
                    <div class="timeline-header" data-bs-toggle="collapse" href="#timeline${newIndex}Collapse" role="button" aria-expanded="true">
                        <div>
                            <i class="fas fa-calendar-alt me-2" style="color: #DC143C;"></i>
                            <span class="fw-bold">Tahun Baru</span>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-timeline" onclick="event.stopPropagation()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse show" id="timeline${newIndex}Collapse">
                        <div class="timeline-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label small">Tahun *</label>
                                        <input type="text" class="form-control custom-input" name="timeline[${newIndex}][year]" required>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-label small">Judul *</label>
                                        <input type="text" class="form-control custom-input" name="timeline[${newIndex}][title]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label small">Item Timeline * (satu per baris)</label>
                                <textarea class="form-control custom-input timeline-items" name="timeline[${newIndex}][items]" rows="4" required></textarea>
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1" style="color: #DC143C;"></i>
                                    Masukkan satu item per baris
                                </small>
                            </div>
                        </div>
                    </div>
                `;
                timelineContainer.appendChild(timelineDiv);
                updateRemoveButtons();
            });
        }

        // ========== MISSIONS MANAGEMENT ==========
        const missionsContainer = document.getElementById('missions-container');
        const addMissionBtn = document.getElementById('add-mission');
        let missionIndex = {{ count($missionsData) }};
        
        if (addMissionBtn) {
            addMissionBtn.addEventListener('click', function() {
                const newIndex = missionIndex++;
                const missionDiv = document.createElement('div');
                missionDiv.className = 'mission-item card mb-3';
                missionDiv.setAttribute('data-index', newIndex);
                missionDiv.innerHTML = `
                    <div class="mission-header" data-bs-toggle="collapse" href="#mission${newIndex}Collapse" role="button" aria-expanded="true">
                        <div>
                            <i class="fas fa-bullseye me-2" style="color: #DC143C;"></i>
                            Misi Baru
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-mission" onclick="event.stopPropagation()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse show" id="mission${newIndex}Collapse">
                        <div class="mission-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">Judul *</label>
                                        <input type="text" class="form-control custom-input" name="missions[${newIndex}][title]" required>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label small">Deskripsi *</label>
                                        <input type="text" class="form-control custom-input" name="missions[${newIndex}][description]" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                missionsContainer.appendChild(missionDiv);
                updateRemoveButtons();
            });
        }

        // ========== TEAM MEMBERS MANAGEMENT ==========
        const teamMembersContainer = document.getElementById('team-members-container');
        const addTeamMemberBtn = document.getElementById('add-team-member');
        let teamMemberIndex = {{ count($teamMembersData) }};
        
        if (addTeamMemberBtn) {
            addTeamMemberBtn.addEventListener('click', function() {
                const newIndex = teamMemberIndex++;
                const memberDiv = document.createElement('div');
                memberDiv.className = 'team-member-item card mb-3';
                memberDiv.setAttribute('data-index', newIndex);
                memberDiv.innerHTML = `
                    <div class="team-member-header" data-bs-toggle="collapse" href="#teamMember${newIndex}Collapse" role="button" aria-expanded="true">
                        <div>
                            <i class="fas fa-user-circle me-2" style="color: #DC143C;"></i>
                            Anggota Tim Baru
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-team-member" onclick="event.stopPropagation()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="collapse show" id="teamMember${newIndex}Collapse">
                        <div class="team-member-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">Nama *</label>
                                        <input type="text" class="form-control custom-input" name="team_members[${newIndex}][name]" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">Posisi *</label>
                                        <input type="text" class="form-control custom-input" name="team_members[${newIndex}][position]" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label small">URL Gambar *</label>
                                        <input type="url" class="form-control custom-input" name="team_members[${newIndex}][image]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label small">Deskripsi *</label>
                                <textarea class="form-control custom-input" name="team_members[${newIndex}][description]" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>
                `;
                teamMembersContainer.appendChild(memberDiv);
                updateRemoveButtons();
            });
        }

        // ========== REMOVE BUTTONS FUNCTIONALITY ==========
        function updateRemoveButtons() {
            // History Paragraphs
            updateHistoryRemoveButtons();
            
            // Timeline
            const timelineItems = timelineContainer.querySelectorAll('.timeline-item');
            const timelineRemoveBtns = timelineContainer.querySelectorAll('.remove-timeline');
            timelineRemoveBtns.forEach((btn, index) => {
                btn.disabled = timelineItems.length <= 1;
                btn.onclick = function(e) {
                    e.stopPropagation();
                    if (timelineItems.length > 1) {
                        this.closest('.timeline-item').remove();
                        updateRemoveButtons();
                    }
                };
            });
            
            // Missions
            const missionItems = missionsContainer.querySelectorAll('.mission-item');
            const missionRemoveBtns = missionsContainer.querySelectorAll('.remove-mission');
            missionRemoveBtns.forEach((btn, index) => {
                btn.disabled = missionItems.length <= 1;
                btn.onclick = function(e) {
                    e.stopPropagation();
                    if (missionItems.length > 1) {
                        this.closest('.mission-item').remove();
                        updateRemoveButtons();
                    }
                };
            });
            
            // Team Members
            const teamMemberItems = teamMembersContainer.querySelectorAll('.team-member-item');
            const teamMemberRemoveBtns = teamMembersContainer.querySelectorAll('.remove-team-member');
            teamMemberRemoveBtns.forEach((btn, index) => {
                btn.disabled = teamMemberItems.length <= 1;
                btn.onclick = function(e) {
                    e.stopPropagation();
                    if (teamMemberItems.length > 1) {
                        this.closest('.team-member-item').remove();
                        updateRemoveButtons();
                    }
                };
            });
        }
        
        // Initialize remove buttons
        updateRemoveButtons();
        
        // Preview Button
        const previewBtn = document.getElementById('previewBtn');
        if (previewBtn) {
            previewBtn.addEventListener('click', function() {
                window.open('{{ route("about") }}', '_blank');
            });
        }
        
        // Form Validation
        const form = document.getElementById('aboutForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                const historyItems = historyContainer.querySelectorAll('.history-paragraph-item');
                const timelineItems = timelineContainer.querySelectorAll('.timeline-item');
                const missionItems = missionsContainer.querySelectorAll('.mission-item');
                const teamMemberItems = teamMembersContainer.querySelectorAll('.team-member-item');
                
                if (historyItems.length < 1) {
                    e.preventDefault();
                    alert('Minimal harus ada 1 paragraf sejarah');
                    return false;
                }
                
                if (timelineItems.length < 1) {
                    e.preventDefault();
                    alert('Minimal harus ada 1 item timeline');
                    return false;
                }
                
                if (missionItems.length < 1) {
                    e.preventDefault();
                    alert('Minimal harus ada 1 misi');
                    return false;
                }
                
                if (teamMemberItems.length < 1) {
                    e.preventDefault();
                    alert('Minimal harus ada 1 anggota tim');
                    return false;
                }
                
                return true;
            });
        }

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.glass-alert');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    });
</script>
@endpush
@endsection