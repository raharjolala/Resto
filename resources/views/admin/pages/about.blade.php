@extends('layouts.admin')

@section('title', 'Edit About Page')
@section('page-title', 'Edit About Page')

@section('content')
<div class="form-container">
    <div class="content-card">
        <div class="card-header">
            <h2>Edit About Page</h2>
            <p class="text-muted mb-0">Semua data yang diedit di sini akan langsung terupdate di halaman /about</p>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        
        <form action="{{ route('admin.pages.about.update') }}" method="POST" enctype="multipart/form-data" id="aboutForm">
            @csrf
            
            @php
                $content = $page->content ?? [];
            @endphp
            
            <!-- SEO & Basic Info -->
            <div class="section-header mb-4">
                <h4 class="text-primary">
                    <i class="fas fa-info-circle me-2"></i>Informasi Dasar & SEO
                </h4>
                <hr>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="title">Judul Halaman *</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title', $page->title ?? 'Tentang Kami') }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="meta_title">Meta Title (SEO)</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" 
                               value="{{ old('meta_title', $page->meta_title ?? 'Tentang Kami - JOSS GANDOS') }}">
                        <small class="text-muted">Judul untuk SEO (maks 255 karakter)</small>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="meta_description">Meta Description (SEO)</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" 
                                  rows="2">{{ old('meta_description', $page->meta_description ?? 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017') }}</textarea>
                        <small class="text-muted">Deskripsi untuk SEO (maks 500 karakter)</small>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="image">Gambar Utama Halaman</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <small class="text-muted">Ukuran maksimal: 5MB. Format: JPG, PNG, GIF, WebP</small>
                        
                        @if(isset($content['image']) && $content['image'])
                            <div class="image-preview-container mt-2">
                                <p class="mb-1">Gambar saat ini:</p>
                                <img src="{{ asset('storage/pages/' . $content['image']) }}" 
                                     class="image-preview" 
                                     alt="About Image" 
                                     style="max-width: 200px; height: auto; border-radius: 8px; border: 2px solid #ddd;">
                                <div class="mt-1">
                                    <small class="text-muted">File: {{ $content['image'] }}</small>
                                </div>
                            </div>
                        @else
                            <div class="mt-2">
                                <small class="text-warning">Belum ada gambar yang diupload</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Hero Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-star me-2"></i>Hero Section (Bagian Atas)
                </h4>
                <hr>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="hero_subtitle">Subtitle Hero *</label>
                    <textarea class="form-control" id="hero_subtitle" name="hero_subtitle" rows="3" required>{{ old('hero_subtitle', $content['hero_subtitle'] ?? 'Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.') }}</textarea>
                    <small class="text-muted">Teks yang muncul di bawah judul utama</small>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="hero_image">URL Gambar Hero *</label>
                    <input type="url" class="form-control" id="hero_image" name="hero_image" 
                           value="{{ old('hero_image', $content['hero_image'] ?? 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" required>
                    <small class="text-muted">Link gambar untuk hero section</small>
                </div>
            </div>
            
            <!-- History Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-history me-2"></i>Sejarah Restoran
                </h4>
                <hr>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="history_description_1">Paragraf Sejarah 1 *</label>
                    <textarea class="form-control" id="history_description_1" name="history_description_1" rows="2" required>{{ old('history_description_1', $content['history_description_1'] ?? 'Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="history_description_2">Paragraf Sejarah 2 *</label>
                    <textarea class="form-control" id="history_description_2" name="history_description_2" rows="2" required>{{ old('history_description_2', $content['history_description_2'] ?? 'Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah Bebek Joss Gandos — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="history_description_3">Paragraf Sejarah 3 *</label>
                    <textarea class="form-control" id="history_description_3" name="history_description_3" rows="2" required>{{ old('history_description_3', $content['history_description_3'] ?? 'Nama Joss Gandos dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.') }}</textarea>
                </div>
            </div>
            
            <!-- Timeline -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="form-label mb-0">Timeline Sejarah *</label>
                    <button type="button" class="btn btn-sm btn-primary" id="add-timeline">
                        <i class="fas fa-plus"></i> Tambah Timeline
                    </button>
                </div>
                <div id="timeline-container">
                    @php
                        $timeline = $content['timeline'] ?? [];
                        if(empty($timeline)) {
                            $timeline = [
                                ['year' => '2017', 'title' => 'Awal Berdiri', 'items' => ['Didirikan oleh CEO Dr. Siswanto', 'Menu khas Banyuwangi (Bebek & Rujak Soto)', 'Nama awal: "Bebek Joss Gandos"', 'Fasilitas: Karaoke VIP, Wedding, Live Music', 'Tim awal: 15 orang']],
                                ['year' => '2018-19', 'title' => 'Merintis & Inovasi', 'items' => ['Masa perjuangan mendapatkan kepercayaan customer', 'Mengembangkan variasi menu', 'Menjadi pionir kuliner di Jemursari']],
                                ['year' => '2020', 'title' => 'Bertahan di Pandemi', 'items' => ['Tutup sementara 3 bulan & SDM terbatas', 'Beradaptasi dengan jual sembako & pesan antar', 'Bukti kekuatan dan solidaritas tim']],
                                ['year' => '2021', 'title' => 'Bangkit & Menu Baru', 'items' => ['Renovasi area VIP & Outdoor', 'Peluncuran Gulai Kepala Ikan Salmon', 'Aneka menu nusantara autentik']],
                                ['year' => '2022', 'title' => 'Semakin Dipercaya', 'items' => ['Peningkatan pesat customer event & gathering', 'Fasilitas Karaoke VIP menjadi daya tarik utama']],
                                ['year' => '2023', 'title' => 'Ekspansi & Menu Ikonik', 'items' => ['Renovasi besar: 6 VIP Room', 'Gulai Kepala Ikan Salmon menjadi ikon', 'Tanpa santan, kaya rempah']],
                                ['year' => '2024', 'title' => 'Cabang Baru', 'items' => ['Peningkatan layanan pesan antar & reservasi', 'Agustus 2024: Cabang baru di Ketintang']],
                                ['year' => '2025', 'title' => 'Sewindu Joss Gandos!', 'items' => ['8 tahun perjalanan penuh perjuangan', 'Siap melangkah lebih jauh', 'Pengalaman yang Joss, Mantap, Luar Biasa!']],
                            ];
                        }
                    @endphp
                    
                    @foreach($timeline as $index => $item)
                    <div class="timeline-item card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Tahun {{ $item['year'] ?? '' }}</h6>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-timeline" 
                                    {{ count($timeline) <= 1 ? 'disabled' : '' }}>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tahun *</label>
                                        <input type="text" class="form-control" name="timeline[{{ $index }}][year]" 
                                               value="{{ $item['year'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Judul *</label>
                                        <input type="text" class="form-control" name="timeline[{{ $index }}][title]" 
                                               value="{{ $item['title'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Item Timeline * (satu per baris)</label>
                                <textarea class="form-control timeline-items" name="timeline[{{ $index }}][items]" 
                                          rows="3" required>@if(isset($item['items'])){{ is_array($item['items']) ? implode("\n", $item['items']) : $item['items'] }}@endif</textarea>
                                <small class="text-muted">Masukkan satu item per baris</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Founder Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-user-tie me-2"></i>Bagian Founder
                </h4>
                <hr>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="founder_description">Deskripsi Founder *</label>
                    <textarea class="form-control" id="founder_description" name="founder_description" rows="2" required>{{ old('founder_description', $content['founder_description'] ?? 'Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="founder_story_1">Cerita Founder 1 *</label>
                    <textarea class="form-control" id="founder_story_1" name="founder_story_1" rows="2" required>{{ old('founder_story_1', $content['founder_story_1'] ?? 'Berawal dari rintisan sederhana bernama "Bebek Joss Gandos", beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="founder_story_2">Cerita Founder 2 *</label>
                    <textarea class="form-control" id="founder_story_2" name="founder_story_2" rows="2" required>{{ old('founder_story_2', $content['founder_story_2'] ?? 'Di bawah kepemimpinan beliau dengan filosofi semangat "Joss, Mantap, dan Luar Biasa", resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik Gulai Kepala Ikan Salmon.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="founder_commitment">Komitmen Founder *</label>
                    <textarea class="form-control" id="founder_commitment" name="founder_commitment" rows="2" required>{{ old('founder_commitment', $content['founder_commitment'] ?? 'Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="founder_image">URL Gambar Founder *</label>
                    <input type="url" class="form-control" id="founder_image" name="founder_image" 
                           value="{{ old('founder_image', $content['founder_image'] ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') }}" required>
                    <small class="text-muted">Link gambar founder</small>
                </div>
            </div>
            
            <!-- Vision Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-eye me-2"></i>Visi Perusahaan
                </h4>
                <hr>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="vision_quote">Quote Visi *</label>
                    <textarea class="form-control" id="vision_quote" name="vision_quote" rows="3" required>{{ old('vision_quote', $content['vision_quote'] ?? 'Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga.') }}</textarea>
                </div>
            </div>
            
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="form-label mb-0">Pilar Visi *</label>
                    <button type="button" class="btn btn-sm btn-primary" id="add-vision-pillar">
                        <i class="fas fa-plus"></i> Tambah Pilar Visi
                    </button>
                </div>
                <div id="vision-pillars-container">
                    @php
                        $visionPillars = $content['vision_pillars'] ?? [];
                        if(empty($visionPillars)) {
                            $visionPillars = [
                                ['icon' => 'fas fa-utensils', 'title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas dengan bahan segar'],
                                ['icon' => 'fas fa-heart', 'title' => 'Pelayanan Ramah', 'description' => 'Memberikan pengalaman terbaik bagi pelanggan'],
                                ['icon' => 'fas fa-leaf', 'title' => 'Inovasi', 'description' => 'Terus berinovasi dalam menu dan layanan'],
                                ['icon' => 'fas fa-users', 'title' => 'Kebersamaan', 'description' => 'Menciptakan suasana nyaman untuk keluarga'],
                            ];
                        }
                    @endphp
                    
                    @foreach($visionPillars as $index => $pillar)
                    <div class="vision-pillar-item card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Pilar {{ $index + 1 }}</h6>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-vision-pillar" 
                                    {{ count($visionPillars) <= 4 ? 'disabled' : '' }}>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Icon *</label>
                                        <input type="text" class="form-control" name="vision_pillars[{{ $index }}][icon]" 
                                               value="{{ $pillar['icon'] ?? '' }}" placeholder="fas fa-icon" required>
                                        <small class="text-muted">Contoh: fas fa-utensils</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Judul *</label>
                                        <input type="text" class="form-control" name="vision_pillars[{{ $index }}][title]" 
                                               value="{{ $pillar['title'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Deskripsi *</label>
                                        <input type="text" class="form-control" name="vision_pillars[{{ $index }}][description]" 
                                               value="{{ $pillar['description'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Mission Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-bullseye me-2"></i>Misi Perusahaan
                </h4>
                <hr>
            </div>
            
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="form-label mb-0">Daftar Misi *</label>
                    <button type="button" class="btn btn-sm btn-primary" id="add-mission">
                        <i class="fas fa-plus"></i> Tambah Misi
                    </button>
                </div>
                <div id="missions-container">
                    @php
                        $missions = $content['missions'] ?? [];
                        if(empty($missions)) {
                            $missions = [
                                ['icon' => 'fas fa-leaf', 'title' => 'Kualitas Premium', 'description' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar.'],
                                ['icon' => 'fas fa-smile', 'title' => 'Pelayanan Prima', 'description' => 'Pelayanan cepat, ramah, dan profesional.'],
                                ['icon' => 'fas fa-home', 'title' => 'Suasana Nyaman', 'description' => 'Suasana bersih, nyaman, dan bersahabat.'],
                                ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi Berkelanjutan', 'description' => 'Terus berinovasi menu dan layanan.'],
                                ['icon' => 'fas fa-broom', 'title' => 'Standar Kebersihan', 'description' => 'Menjaga standar kebersihan (hygiene) tertinggi.'],
                                ['icon' => 'fas fa-hand-holding-heart', 'title' => 'Kontribusi Sosial', 'description' => 'Kontribusi positif bagi lingkungan sekitar.'],
                            ];
                        }
                    @endphp
                    
                    @foreach($missions as $index => $mission)
                    <div class="mission-item card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">Misi {{ $index + 1 }}</h6>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-mission" 
                                    {{ count($missions) <= 6 ? 'disabled' : '' }}>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Icon *</label>
                                        <input type="text" class="form-control" name="missions[{{ $index }}][icon]" 
                                               value="{{ $mission['icon'] ?? '' }}" placeholder="fas fa-icon" required>
                                        <small class="text-muted">Contoh: fas fa-leaf</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Judul *</label>
                                        <input type="text" class="form-control" name="missions[{{ $index }}][title]" 
                                               value="{{ $mission['title'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Deskripsi *</label>
                                        <input type="text" class="form-control" name="missions[{{ $index }}][description]" 
                                               value="{{ $mission['description'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Team Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-users me-2"></i>Tim Kami
                </h4>
                <hr>
            </div>
            
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <label class="form-label mb-0">Anggota Tim *</label>
                    <button type="button" class="btn btn-sm btn-primary" id="add-team-member">
                        <i class="fas fa-plus"></i> Tambah Anggota Tim
                    </button>
                </div>
                <div id="team-members-container">
                    @php
                        $teamMembers = $content['team_members'] ?? [];
                        if(empty($teamMembers)) {
                            $teamMembers = [
                                ['name' => 'Ahmad Santoso', 'position' => 'Head Chef', 'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => '15 tahun pengalaman kuliner, spesialis masakan tradisional'],
                                ['name' => 'Sari Dewi', 'position' => 'Restaurant Manager', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'],
                                ['name' => 'Budi Hartono', 'position' => 'F&B Director', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'description' => 'Pengembangan menu dan kontrol kualitas bahan'],
                            ];
                        }
                    @endphp
                    
                    @foreach($teamMembers as $index => $member)
                    <div class="team-member-item card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">{{ $member['name'] ?? 'Anggota Tim' }}</h6>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-team-member" 
                                    {{ count($teamMembers) <= 3 ? 'disabled' : '' }}>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama *</label>
                                        <input type="text" class="form-control" name="team_members[{{ $index }}][name]" 
                                               value="{{ $member['name'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Posisi *</label>
                                        <input type="text" class="form-control" name="team_members[{{ $index }}][position]" 
                                               value="{{ $member['position'] ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>URL Gambar *</label>
                                        <input type="url" class="form-control" name="team_members[{{ $index }}][image]" 
                                               value="{{ $member['image'] ?? '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label>Deskripsi *</label>
                                <textarea class="form-control" name="team_members[{{ $index }}][description]" 
                                          rows="2" required>{{ $member['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- CTA Section -->
            <div class="section-header mb-4 mt-5">
                <h4 class="text-primary">
                    <i class="fas fa-bullhorn me-2"></i>Call to Action (CTA)
                </h4>
                <hr>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="cta_title">Judul CTA *</label>
                    <input type="text" class="form-control" id="cta_title" name="cta_title" 
                           value="{{ old('cta_title', $content['cta_title'] ?? 'Rasakan Cita Rasa Luar Biasa') }}" required>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="form-group">
                    <label for="cta_description">Deskripsi CTA *</label>
                    <textarea class="form-control" id="cta_description" name="cta_description" rows="3" required>{{ old('cta_description', $content['cta_description'] ?? 'Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan hidangan autentik dan pelayanan terbaik dari keluarga Joss Gandos.') }}</textarea>
                </div>
            </div>
            
            <!-- Submit Buttons -->
            <div class="d-flex justify-content-between mt-5 pt-4 border-top">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-admin-outline">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
                
                <div>
                    <button type="button" class="btn btn-warning me-2" id="previewBtn">
                        <i class="fas fa-eye"></i> Preview
                    </button>
                    <button type="submit" class="btn btn-admin">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>

<style>
.section-header {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 15px 20px;
    border-radius: 10px;
    border-left: 4px solid #B22222;
}

.image-preview-container {
    padding: 10px;
    background: #f8f9fa;
    border-radius: 5px;
    border: 1px solid #dee2e6;
}

.image-preview {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
}

.timeline-item, .vision-pillar-item, .mission-item, .team-member-item {
    border: 1px solid #dee2e6;
}

.timeline-item .card-header, 
.vision-pillar-item .card-header,
.mission-item .card-header,
.team-member-item .card-header {
    background-color: rgba(178, 34, 34, 0.1);
}

.btn-admin {
    background: linear-gradient(135deg, #B22222 0%, #8B0000 100%);
    color: white;
    border: none;
    padding: 10px 30px;
    border-radius: 5px;
    font-weight: 600;
}

.btn-admin:hover {
    background: linear-gradient(135deg, #8B0000 0%, #B22222 100%);
    color: white;
}

.btn-admin-outline {
    background: white;
    color: #B22222;
    border: 2px solid #B22222;
    padding: 10px 30px;
    border-radius: 5px;
    font-weight: 600;
}

.btn-admin-outline:hover {
    background: #B22222;
    color: white;
}

.remove-timeline,
.remove-vision-pillar,
.remove-mission,
.remove-team-member {
    border-color: #dc3545;
    color: #dc3545;
}

.remove-timeline:hover,
.remove-vision-pillar:hover,
.remove-mission:hover,
.remove-team-member:hover {
    background-color: #dc3545;
    color: white;
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Timeline Management
        const timelineContainer = document.getElementById('timeline-container');
        const addTimelineBtn = document.getElementById('add-timeline');
        let timelineIndex = {{ count($content['timeline'] ?? 8) }};
        
        if (addTimelineBtn) {
            addTimelineBtn.addEventListener('click', function() {
                const newIndex = timelineIndex++;
                const timelineDiv = document.createElement('div');
                timelineDiv.className = 'timeline-item card mb-3';
                timelineDiv.innerHTML = `
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Tahun Baru</h6>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-timeline">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tahun *</label>
                                    <input type="text" class="form-control" name="timeline[${newIndex}][year]" required>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Judul *</label>
                                    <input type="text" class="form-control" name="timeline[${newIndex}][title]" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Item Timeline * (satu per baris)</label>
                            <textarea class="form-control timeline-items" name="timeline[${newIndex}][items]" rows="3" required></textarea>
                            <small class="text-muted">Masukkan satu item per baris</small>
                        </div>
                    </div>
                `;
                timelineContainer.appendChild(timelineDiv);
                updateRemoveButtons();
            });
        }
        
        // Vision Pillars Management
        const visionPillarsContainer = document.getElementById('vision-pillars-container');
        const addVisionPillarBtn = document.getElementById('add-vision-pillar');
        let visionPillarIndex = {{ count($content['vision_pillars'] ?? 4) }};
        
        if (addVisionPillarBtn) {
            addVisionPillarBtn.addEventListener('click', function() {
                const newIndex = visionPillarIndex++;
                const pillarDiv = document.createElement('div');
                pillarDiv.className = 'vision-pillar-item card mb-3';
                pillarDiv.innerHTML = `
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Pilar Baru</h6>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-vision-pillar">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Icon *</label>
                                    <input type="text" class="form-control" name="vision_pillars[${newIndex}][icon]" placeholder="fas fa-icon" required>
                                    <small class="text-muted">Contoh: fas fa-utensils</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Judul *</label>
                                    <input type="text" class="form-control" name="vision_pillars[${newIndex}][title]" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Deskripsi *</label>
                                    <input type="text" class="form-control" name="vision_pillars[${newIndex}][description]" required>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                visionPillarsContainer.appendChild(pillarDiv);
                updateRemoveButtons();
            });
        }
        
        // Mission Management
        const missionsContainer = document.getElementById('missions-container');
        const addMissionBtn = document.getElementById('add-mission');
        let missionIndex = {{ count($content['missions'] ?? 6) }};
        
        if (addMissionBtn) {
            addMissionBtn.addEventListener('click', function() {
                const newIndex = missionIndex++;
                const missionDiv = document.createElement('div');
                missionDiv.className = 'mission-item card mb-3';
                missionDiv.innerHTML = `
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Misi Baru</h6>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-mission">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Icon *</label>
                                    <input type="text" class="form-control" name="missions[${newIndex}][icon]" placeholder="fas fa-icon" required>
                                    <small class="text-muted">Contoh: fas fa-leaf</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Judul *</label>
                                    <input type="text" class="form-control" name="missions[${newIndex}][title]" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Deskripsi *</label>
                                    <input type="text" class="form-control" name="missions[${newIndex}][description]" required>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                missionsContainer.appendChild(missionDiv);
                updateRemoveButtons();
            });
        }
        
        // Team Members Management
        const teamMembersContainer = document.getElementById('team-members-container');
        const addTeamMemberBtn = document.getElementById('add-team-member');
        let teamMemberIndex = {{ count($content['team_members'] ?? 3) }};
        
        if (addTeamMemberBtn) {
            addTeamMemberBtn.addEventListener('click', function() {
                const newIndex = teamMemberIndex++;
                const memberDiv = document.createElement('div');
                memberDiv.className = 'team-member-item card mb-3';
                memberDiv.innerHTML = `
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Anggota Tim Baru</h6>
                        <button type="button" class="btn btn-sm btn-outline-danger remove-team-member">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama *</label>
                                    <input type="text" class="form-control" name="team_members[${newIndex}][name]" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Posisi *</label>
                                    <input type="text" class="form-control" name="team_members[${newIndex}][position]" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>URL Gambar *</label>
                                    <input type="url" class="form-control" name="team_members[${newIndex}][image]" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label>Deskripsi *</label>
                            <textarea class="form-control" name="team_members[${newIndex}][description]" rows="2" required></textarea>
                        </div>
                    </div>
                `;
                teamMembersContainer.appendChild(memberDiv);
                updateRemoveButtons();
            });
        }
        
        // Remove buttons functionality
        function updateRemoveButtons() {
            // Timeline
            const timelineItems = timelineContainer.querySelectorAll('.timeline-item');
            const timelineRemoveBtns = timelineContainer.querySelectorAll('.remove-timeline');
            timelineRemoveBtns.forEach(btn => {
                btn.disabled = timelineItems.length <= 1;
                btn.onclick = function() {
                    if (timelineItems.length > 1) {
                        this.closest('.timeline-item').remove();
                        updateRemoveButtons();
                    }
                };
            });
            
            // Vision Pillars
            const visionPillarItems = visionPillarsContainer.querySelectorAll('.vision-pillar-item');
            const visionPillarRemoveBtns = visionPillarsContainer.querySelectorAll('.remove-vision-pillar');
            visionPillarRemoveBtns.forEach(btn => {
                btn.disabled = visionPillarItems.length <= 4;
                btn.onclick = function() {
                    if (visionPillarItems.length > 4) {
                        this.closest('.vision-pillar-item').remove();
                        updateRemoveButtons();
                    }
                };
            });
            
            // Missions
            const missionItems = missionsContainer.querySelectorAll('.mission-item');
            const missionRemoveBtns = missionsContainer.querySelectorAll('.remove-mission');
            missionRemoveBtns.forEach(btn => {
                btn.disabled = missionItems.length <= 6;
                btn.onclick = function() {
                    if (missionItems.length > 6) {
                        this.closest('.mission-item').remove();
                        updateRemoveButtons();
                    }
                };
            });
            
            // Team Members
            const teamMemberItems = teamMembersContainer.querySelectorAll('.team-member-item');
            const teamMemberRemoveBtns = teamMembersContainer.querySelectorAll('.remove-team-member');
            teamMemberRemoveBtns.forEach(btn => {
                btn.disabled = teamMemberItems.length <= 3;
                btn.onclick = function() {
                    if (teamMemberItems.length > 3) {
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
                // Open about page in new tab
                window.open('{{ route("about") }}', '_blank');
            });
        }
        
        // Form Validation
        const form = document.getElementById('aboutForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                // Validate minimum counts
                const timelineItems = timelineContainer.querySelectorAll('.timeline-item');
                const visionPillarItems = visionPillarsContainer.querySelectorAll('.vision-pillar-item');
                const missionItems = missionsContainer.querySelectorAll('.mission-item');
                const teamMemberItems = teamMembersContainer.querySelectorAll('.team-member-item');
                
                if (timelineItems.length < 1) {
                    e.preventDefault();
                    alert('Minimal harus ada 1 item timeline');
                    return false;
                }
                
                if (visionPillarItems.length < 1) {
                    e.preventDefault();
                    alert('Minimal harus ada 1 pilar visi');
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
    });
</script>
@endsection