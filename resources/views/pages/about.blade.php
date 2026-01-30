@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')
@section('meta-description', 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017')

@section('content')
<!-- Modern Hero Section -->
<section class="modern-hero position-relative overflow-hidden">
    <div class="hero-bg-overlay"></div>
    <div class="container position-relative z-2">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-7">
                <div class="hero-content" data-aos="fade-up">
                    <div class="hero-badge mb-4">
                        <span class="badge badge-estimation">
                            <i class="fas fa-calendar-alt me-2"></i> Berdiri sejak 28 Oktober 2017
                        </span>
                    </div>
                    <h1 class="hero-title display-2 fw-bold text-white mb-4">
                        Cerita Kami<br>
                        <span class="hero-highlight">Lebih dari Sekadar Restoran</span>
                    </h1>
                    <p class="hero-subtitle lead text-light opacity-90 mb-5">
                        Delapan tahun silam, dari semangat untuk mengembangkan usaha di luar dunia IT, 
                        lahirlah Bebek Joss Gandos — dengan satu menu andalan yang terus menginspirasi.
                    </p>
                    
                    <div class="hero-cta">
                        <a href="#sejarah" class="btn btn-primary-red btn-lg px-4 py-3 me-3">
                            <i class="fas fa-history me-2"></i>Telusuri Sejarah Kami
                        </a>
                        <a href="#tim" class="btn btn-outline-light btn-lg px-4 py-3">
                            <i class="fas fa-users me-2"></i>Kenali Tim Kami
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="hero-image-wrapper" data-aos="fade-left" data-aos-delay="200">
                    <div class="floating-image">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-4" alt="JOSS GANDOS Interior Modern">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="floating-badge">
                        <i class="fas fa-utensils"></i>
                        <span>8 Tahun<br>Pengalaman</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <a href="#sejarah">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- Sejarah Section -->
<section id="sejarah" class="section-padding position-relative">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-header mb-5" data-aos="fade-right">
                    <span class="section-tag mb-3 d-inline-block">SEJARAH KAMI</span>
                    <h2 class="display-4 fw-bold mb-4">
                        Delapan Tahun<br>
                        <span class="text-gradient">Dedikasi & Inovasi</span>
                    </h2>
                    
                    <div class="history-card card border-0 shadow-lg rounded-4 mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div class="history-icon me-3">
                                    <i class="fas fa-calendar-check text-primary-red"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-2">Berdiri: 28 Oktober 2017</h5>
                                    <p class="text-muted mb-0">Pionir restoran di kawasan Jalan Jemursari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="history-content" data-aos="fade-up">
                    <p class="lead text-muted mb-4">
                        Perjalanan Joss Gandos Resto & Café dimulai delapan tahun silam, dari semangat untuk mengembangkan usaha di bidang lain di luar dunia IT.
                    </p>
                    <p class="text-muted mb-4">
                        Dengan keyakinan untuk menciptakan tempat makan yang berbeda, lahirlah <strong>Bebek Joss Gandos</strong> — sebuah rumah makan sederhana yang hanya mengandalkan satu menu andalan, yaitu bebek goreng khas dengan cita rasa mantap.
                    </p>
                    <p class="text-muted">
                        Nama <strong>'Joss Gandos'</strong> dipilih dengan harapan agar restoran ini selalu menghadirkan makanan dan minuman yang joss — mantap, lezat, dan luar biasa — bagi setiap tamu yang datang.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="journey-wrapper" data-aos="fade-left">
                    <div class="journey-header text-center mb-5">
                        <h3 class="display-6 fw-bold mb-3">Perjalanan Resto Joss Gandos</h3>
                        <p class="text-muted mb-0">Dari langkah kecil hingga menjadi resto kebanggaan bersama</p>
                    </div>
                    
                    <div class="modern-timeline">
                        <div class="timeline-item">
                            <div class="timeline-year">2017</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Awal Berdiri</h5>
                                <ul class="timeline-list">
                                    <li>Didirikan oleh CEO Dr. Siswanto</li>
                                    <li>Menu khas Banyuwangi (Bebek & Rujak Soto)</li>
                                    <li>Nama awal: "Bebek Joss Gandos"</li>
                                    <li>Fasilitas: Karaoke VIP, Wedding, Live Music</li>
                                    <li>Tim awal: 15 orang dengan semangat kekeluargaan</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2018-2019</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Merintis & Inovasi</h5>
                                <ul class="timeline-list">
                                    <li>Masa perjuangan mendapatkan kepercayaan customer</li>
                                    <li>Mengembangkan variasi menu (tidak hanya bebek)</li>
                                    <li>Menjadi pionir kuliner di kawasan Jemursari</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2020</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Bertahan di Pandemi</h5>
                                <ul class="timeline-list">
                                    <li>Tutup sementara 3 bulan & SDM terbatas</li>
                                    <li>Beradaptasi dengan jual sembako & pesan antar</li>
                                    <li>Bukti kekuatan dan solidaritas tim</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2021</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Bangkit & Menu Baru</h5>
                                <ul class="timeline-list">
                                    <li>Renovasi area VIP & Outdoor</li>
                                    <li>Peluncuran Gulai Kepala Ikan Salmon (Menu Andalan)</li>
                                    <li>Aneka menu nusantara autentik</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2022</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Semakin Dipercaya</h5>
                                <ul class="timeline-list">
                                    <li>Peningkatan pesat customer event & gathering</li>
                                    <li>Fasilitas Karaoke VIP menjadi daya tarik utama</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2023</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Ekspansi & Menu Ikonik</h5>
                                <ul class="timeline-list">
                                    <li>Renovasi besar: 6 VIP Room</li>
                                    <li>Gulai Kepala Ikan Salmon menjadi ikon</li>
                                    <li>Tanpa santan, kaya rempah, gurih</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2024</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Cabang Baru</h5>
                                <ul class="timeline-list">
                                    <li>Peningkatan layanan pesan antar & reservasi</li>
                                    <li>Agustus 2024: Cabang baru di Ketintang</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-year">2025</div>
                            <div class="timeline-content">
                                <h5 class="fw-bold text-primary-red mb-2">Sewindu Joss Gandos!</h5>
                                <ul class="timeline-list">
                                    <li>8 tahun perjalanan penuh perjuangan & inovasi</li>
                                    <li>Siap melangkah lebih jauh</li>
                                    <li>Pengalaman yang Joss, Mantap, dan Luar Biasa!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founder Section -->
<section class="founder-section section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="founder-image-wrapper" data-aos="fade-right">
                    <div class="founder-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-4" alt="Dr. Siswanto - Founder JOSS GANDOS">
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="founder-content ps-lg-5" data-aos="fade-left">
                    <span class="section-tag mb-3 d-inline-block">PENDIRI RESTO JOSS GANDOS</span>
                    <h2 class="display-5 fw-bold mb-4">
                        Dr. Siswanto:<br>
                        <span class="text-gradient">Dari IT ke Kuliner</span>
                    </h2>
                    
                    <div class="founder-desc">
                        <div class="intro-quote mb-4">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left text-primary-red"></i>
                            </div>
                            <p class="lead text-muted mb-0">
                                Didirikan oleh Dr. Siswanto pada 28 Oktober 2017, Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar latar belakang IT.
                            </p>
                        </div>
                        
                        <div class="founder-story mb-4">
                            <p class="text-muted mb-3">
                                Berawal dari rintisan sederhana bernama <strong>"Bebek Joss Gandos"</strong>, beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.
                            </p>
                            <p class="text-muted">
                                Di bawah kepemimpinan beliau dengan filosofi semangat <strong>"Joss, Mantap, dan Luar Biasa"</strong>, resto ini sukses melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik <strong>Gulai Kepala Ikan Salmon</strong>.
                            </p>
                        </div>
                        
                        <div class="founder-commitment bg-light-cream p-4 rounded-3 mb-4">
                            <h5 class="fw-bold mb-3 text-dark">
                                <i class="fas fa-heart text-primary-red me-2"></i>
                                Dedikasi Utama
                            </h5>
                            <p class="text-muted mb-0">
                                Dedikasi beliau adalah memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.
                            </p>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="vm-section section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center mb-6">
            <div class="col-lg-8 text-center">
                <div class="section-header" data-aos="fade-up">
                    <span class="section-tag mb-3 d-inline-block">KOMPAS KAMI</span>
                    <h2 class="display-4 fw-bold mb-4">Visi & Misi<br><span class="text-gradient">Restoran JOSS GANDOS</span></h2>
                    <p class="lead text-muted">Prinsip yang membimbing setiap langkah dan keputusan kami</p>
                </div>
            </div>
        </div>
        
        <div class="row g-5">
            <!-- Vision -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="vision-card card border-0 shadow-lg h-100">
                    <div class="card-header bg-primary-red text-white py-4 px-5 rounded-top-4">
                        <div class="d-flex align-items-center">
                            <div class="vision-icon me-4">
                                <i class="fas fa-eye fa-2x text-white"></i>
                            </div>
                            <div>
                                <span class="badge bg-white text-primary-red mb-2">VISI</span>
                                <h3 class="h4 mb-0 text-white">Menjadi Restoran Pilihan Utama</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <div class="vision-content">
                            <blockquote class="vision-quote mb-5">
                                <p class="lead text-dark fst-italic mb-0">"Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, pelayanan ramah, serta suasana nyaman untuk seluruh keluarga."</p>
                            </blockquote>
                            
                            <div class="vision-features">
                                <h5 class="fw-bold mb-4 text-dark">Pilar Utama Visi Kami:</h5>
                                <div class="row g-3">
                                    @foreach([
                                        ['icon' => 'fas fa-utensils', 'title' => 'Cita Rasa Autentik', 'desc' => 'Resep warisan dengan sentuhan modern'],
                                        ['icon' => 'fas fa-smile-beam', 'title' => 'Pelayanan Ramah', 'desc' => 'Tim yang melayani dengan senyuman'],
                                        ['icon' => 'fas fa-home-heart', 'title' => 'Suasana Nyaman', 'desc' => 'Lingkungan seperti di rumah sendiri'],
                                        ['icon' => 'fas fa-users', 'title' => 'Untuk Semua', 'desc' => 'Semua usia dan kebutuhan']
                                    ] as $pillar)
                                    <div class="col-md-6">
                                        <div class="feature-item">
                                            <div class="feature-icon">
                                                <i class="{{ $pillar['icon'] }} text-primary-red"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 text-dark fw-bold">{{ $pillar['title'] }}</h6>
                                                <small class="text-muted">{{ $pillar['desc'] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mission -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="mission-card card border-0 shadow-lg h-100">
                    <div class="card-header bg-secondary-gold text-dark py-4 px-5 rounded-top-4">
                        <div class="d-flex align-items-center">
                            <div class="mission-icon me-4">
                                <i class="fas fa-bullseye fa-2x text-dark"></i>
                            </div>
                            <div>
                                <span class="badge bg-white text-secondary-gold mb-2">MISI</span>
                                <h3 class="h4 mb-0 text-dark">Komitmen Kami kepada Anda</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <div class="mission-list">
                            @foreach([
                                ['icon' => 'fas fa-leaf', 'title' => 'Bahan Berkualitas', 'desc' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar'],
                                ['icon' => 'fas fa-user-clock', 'title' => 'Pelayanan Profesional', 'desc' => 'Pelayanan cepat, ramah, dan profesional'],
                                ['icon' => 'fas fa-couch', 'title' => 'Suasana Nyaman', 'desc' => 'Suasana bersih, nyaman, dan bersahabat'],
                                ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi Terus', 'desc' => 'Terus berinovasi menu dan layanan'],
                                ['icon' => 'fas fa-hand-sparkles', 'title' => 'Standar Kebersihan', 'desc' => 'Menjaga standar kebersihan (hygiene)'],
                                ['icon' => 'fas fa-hand-holding-heart', 'title' => 'Kontribusi Sosial', 'desc' => 'Kontribusi positif bagi lingkungan sekitar']
                            ] as $mission)
                            <div class="mission-item">
                                <div class="mission-item-icon">
                                    <i class="{{ $mission['icon'] }} text-white bg-secondary-gold"></i>
                                </div>
                                <div class="mission-item-content">
                                    <h6 class="fw-bold text-dark">{{ $mission['title'] }}</h6>
                                    <p class="text-muted mb-0">{{ $mission['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="tim" class="team-section section-padding">
    <div class="container">
        <div class="row justify-content-center mb-6">
            <div class="col-lg-8 text-center">
                <div class="section-header" data-aos="fade-up">
                    <span class="section-tag mb-3 d-inline-block">TIM KAMI</span>
                    <h2 class="display-4 fw-bold mb-4">Orang-orang Berdedikasi<br><span class="text-gradient">di Balik Layar</span></h2>
                    <p class="lead text-muted">Tim yang memastikan pengalaman bersantap Anda sempurna</p>
                </div>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach([
                ['name' => 'Ahmad Santoso', 'position' => 'Head Chef', 'image' => 'https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'desc' => '15 tahun pengalaman kuliner, spesialis masakan tradisional dengan sentuhan modern'],
                ['name' => 'Sari Dewi', 'position' => 'Restaurant Manager', 'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'desc' => 'Ahli dalam manajemen restoran dan pelayanan pelanggan'],
                ['name' => 'Budi Hartono', 'position' => 'Food & Beverage Director', 'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 'desc' => 'Bertanggung jawab atas pengembangan menu dan kualitas bahan']
            ] as $member)
            <div class="col-lg-4 col-md-6">
                <div class="team-card card border-0 shadow-lg h-100" data-aos="fade-up">
                    <div class="team-image-wrapper">
                        <img src="{{ $member['image'] }}" class="img-fluid" alt="{{ $member['name'] }}">
                        <div class="team-overlay"></div>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h5 class="fw-bold mb-1">{{ $member['name'] }}</h5>
                        <div class="team-position mb-3">
                            <span class="badge bg-primary-red">{{ $member['position'] }}</span>
                        </div>
                        <p class="text-muted mb-4">{{ $member['desc'] }}</p>
                        
                        <div class="team-social">
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="social-icon"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section section-padding">
    <div class="container">
        <div class="cta-wrapper bg-gradient-primary rounded-5 overflow-hidden" data-aos="fade-up">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="cta-content p-5">
                        <h2 class="display-5 fw-bold text-white mb-3">Rasakan Kehangatan<br>dan Cita Rasa Kami</h2>
                        <p class="lead text-light opacity-90 mb-4 mb-lg-0">
                            Kunjungi restoran kami dan nikmati pengalaman bersantap yang tak terlupakan dengan filosofi JOSS GANDOS.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cta-buttons p-5 text-center text-lg-end">
                        <a href="{{ route('reservation.create') }}" class="btn btn-light btn-lg px-4 py-3 fw-bold mb-3 w-100">
                            <i class="fas fa-calendar-check me-2"></i>Reservasi Sekarang
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg px-4 py-3 fw-bold w-100">
                            <i class="fas fa-map-marker-alt me-2"></i>Kunjungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    :root {
        --primary-red: #B22222;
        --primary-dark: #8B0000;
        --secondary-gold: #D4A017;
        --accent-gold: #FFC145;
        --light-cream: #FFF9F0;
        --dark-charcoal: #2C2C2C;
        --success-green: #28A745;
        --info-blue: #4361EE;
        --gray-800: #2D3748;
        --gray-700: #4A5568;
        --gray-100: #f8f9fa;
    }
    
    /* Modern Hero Section */
    .modern-hero {
        background: linear-gradient(135deg, rgba(25, 25, 25, 0.9) 0%, rgba(0, 0, 0, 0.9) 100%), 
                    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        padding: 140px 0 60px;
        margin-top: -80px;
        position: relative;
        overflow: hidden;
    }
    
    .hero-bg-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, 
                    rgba(178, 34, 34, 0.3) 0%, 
                    rgba(212, 160, 23, 0.3) 100%);
        z-index: 1;
    }
    
    .min-vh-80 {
        min-height: 80vh;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-highlight {
        background: linear-gradient(135deg, var(--accent-gold), #FFD700);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }
    
    .hero-highlight::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(135deg, var(--accent-gold), #FFD700);
        border-radius: 2px;
    }
    
    .badge-estimation {
        background: linear-gradient(135deg, var(--secondary-gold), var(--accent-gold));
        color: var(--dark-charcoal);
        font-weight: 600;
        padding: 12px 24px;
        border-radius: 50px;
        font-size: 1rem;
        border: none;
        box-shadow: 0 4px 15px rgba(212, 160, 23, 0.3);
    }
    
    .hero-image-wrapper {
        position: relative;
    }
    
    .floating-image {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        transform: perspective(1000px) rotateY(-5deg);
        transition: transform 0.5s ease;
    }
    
    .floating-image:hover {
        transform: perspective(1000px) rotateY(0deg);
    }
    
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, 
                    rgba(178, 34, 34, 0.1) 0%, 
                    rgba(212, 160, 23, 0.1) 100%);
    }
    
    .floating-badge {
        position: absolute;
        bottom: -20px;
        right: -20px;
        background: white;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        display: flex;
        align-items: center;
        gap: 15px;
        z-index: 2;
        animation: float 3s ease-in-out infinite;
    }
    
    .floating-badge i {
        font-size: 2rem;
        color: var(--primary-red);
    }
    
    .floating-badge span {
        font-weight: 600;
        color: var(--dark-charcoal);
        line-height: 1.3;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    .btn-primary-red {
        background: var(--primary-red);
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(178, 34, 34, 0.3);
    }
    
    .btn-primary-red:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(178, 34, 34, 0.4);
    }
    
    .btn-outline-light {
        border: 2px solid white;
        color: white;
        border-radius: 50px;
        background: transparent;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-outline-light:hover {
        background: white;
        color: var(--primary-red);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }
    
    .scroll-indicator a {
        display: block;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        animation: bounce 2s infinite;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    /* Section Styles */
    .section-padding {
        padding: 100px 0;
    }
    
    .mb-6 {
        margin-bottom: 5rem;
    }
    
    .mt-6 {
        margin-top: 5rem;
    }
    
    .section-tag {
        background: var(--primary-red);
        color: white;
        padding: 8px 24px;
        border-radius: 50px;
        font-size: 0.9rem;
        letter-spacing: 1px;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
    }
    
    .text-gradient {
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
    }
    
    /* Sejarah Section */
    .history-card {
        background: white;
        border-left: 5px solid var(--primary-red);
        transition: transform 0.3s ease;
    }
    
    .history-card:hover {
        transform: translateX(10px);
    }
    
    .history-icon {
        width: 50px;
        height: 50px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    /* Updated Journey Timeline */
    .journey-wrapper {
        padding: 30px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
    
    .journey-header {
        padding-bottom: 20px;
        border-bottom: 2px solid var(--primary-red);
        margin-bottom: 30px;
    }
    
    .modern-timeline {
        position: relative;
        padding-left: 0;
        max-height: 600px;
        overflow-y: auto;
        padding-right: 10px;
    }
    
    .modern-timeline::-webkit-scrollbar {
        width: 6px;
    }
    
    .modern-timeline::-webkit-scrollbar-track {
        background: rgba(178, 34, 34, 0.1);
        border-radius: 10px;
    }
    
    .modern-timeline::-webkit-scrollbar-thumb {
        background: var(--primary-red);
        border-radius: 10px;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        padding-left: 40px;
        padding-bottom: 25px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .timeline-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }
    
    .timeline-year {
        position: absolute;
        left: 0;
        top: 0;
        background: var(--primary-red);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        box-shadow: 0 4px 15px rgba(178, 34, 34, 0.3);
        min-width: 70px;
        text-align: center;
    }
    
    .timeline-content {
        background: rgba(178, 34, 34, 0.05);
        padding: 20px;
        border-radius: 12px;
        border-left: 4px solid var(--secondary-gold);
    }
    
    .timeline-content h5 {
        color: var(--primary-red);
        font-weight: 600;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .timeline-content h5::before {
        content: '';
        display: block;
        width: 8px;
        height: 8px;
        background: var(--secondary-gold);
        border-radius: 50%;
    }
    
    .timeline-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .timeline-list li {
        position: relative;
        padding-left: 20px;
        margin-bottom: 8px;
        color: var(--gray-700);
        font-size: 0.95rem;
    }
    
    .timeline-list li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--secondary-gold);
        font-weight: bold;
    }
    
    /* Philosophy Section */
    .philosophy-card {
        transition: all 0.4s ease;
        background: white;
        border: 2px solid transparent;
    }
    
    .philosophy-card:hover {
        border-color: var(--primary-red);
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(178, 34, 34, 0.15);
    }
    
    .philosophy-icon-wrapper {
        position: relative;
    }
    
    .philosophy-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        border: 3px solid;
        font-size: 2.5rem;
        transition: all 0.3s ease;
    }
    
    .philosophy-card:hover .philosophy-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }
    
    /* Founder Section - Enhanced */
    .founder-section {
        position: relative;
        overflow: hidden;
    }
    
    .founder-image-wrapper {
        position: relative;
    }
    
    .founder-image {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        border: 5px solid white;
    }
    
    .founder-image img {
        transition: transform 0.5s ease;
    }
    
    .founder-image:hover img {
        transform: scale(1.05);
    }
    
    .founder-badge {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        border: 3px solid var(--primary-red);
        min-width: 250px;
        text-align: center;
        z-index: 2;
    }
    
    .badge-icon {
        margin-bottom: 15px;
    }
    
    .founder-stats .stat-box {
        padding: 15px;
        background: white;
        border-radius: 12px;
        border: 2px solid rgba(178, 34, 34, 0.1);
        transition: all 0.3s ease;
    }
    
    .founder-stats .stat-box:hover {
        border-color: var(--primary-red);
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(178, 34, 34, 0.1);
    }
    
    .founder-stats .stat-number {
        font-size: 1.8rem;
        margin-bottom: 5px;
    }
    
    .founder-stats .stat-label {
        font-size: 0.9rem;
    }
    
    .intro-quote {
        position: relative;
        padding-left: 40px;
    }
    
    .quote-icon {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 1.5rem;
        opacity: 0.5;
    }
    
    .founder-commitment {
        border-left: 4px solid var(--primary-red);
        transition: all 0.3s ease;
    }
    
    .founder-commitment:hover {
        transform: translateX(5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .philosophy-point {
        transition: all 0.3s ease;
        border-color: rgba(0, 0, 0, 0.05) !important;
    }
    
    .philosophy-point:hover {
        transform: translateY(-5px);
        border-color: var(--primary-red) !important;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .point-icon {
        width: 50px;
        height: 50px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }
    
    .milestones-wrapper {
        background: linear-gradient(135deg, rgba(178, 34, 34, 0.03) 0%, rgba(212, 160, 23, 0.03) 100%);
        border: 1px solid rgba(178, 34, 34, 0.1);
    }
    
    .milestone-item {
        padding: 20px;
        transition: all 0.3s ease;
    }
    
    .milestone-item:hover {
        transform: translateY(-10px);
    }
    
    .milestone-icon {
        width: 80px;
        height: 80px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .milestone-item:hover .milestone-icon {
        transform: scale(1.1);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    /* Updated Vision & Mission Section */
    .vision-card, .mission-card {
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease;
        background: white;
    }
    
    .vision-card:hover, .mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important;
    }
    
    .vision-icon, .mission-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .vision-quote {
        position: relative;
        background: rgba(178, 34, 34, 0.05);
        padding: 25px;
        border-radius: 15px;
        border-left: 4px solid var(--primary-red);
    }
    
    .vision-quote::before {
        content: '"';
        position: absolute;
        top: -10px;
        left: 10px;
        font-size: 3rem;
        color: var(--primary-red);
        opacity: 0.2;
        font-family: Georgia, serif;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: var(--gray-100);
        border-radius: 12px;
        margin-bottom: 15px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .feature-item:hover {
        background: rgba(178, 34, 34, 0.05);
        transform: translateX(5px);
        border-color: rgba(178, 34, 34, 0.2);
    }
    
    .feature-icon {
        width: 40px;
        height: 40px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }
    
    .mission-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .mission-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 20px;
        background: var(--gray-100);
        border-radius: 15px;
        border-left: 4px solid var(--secondary-gold);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .mission-item:hover {
        background: rgba(212, 160, 23, 0.05);
        transform: translateX(10px);
        border-color: rgba(212, 160, 23, 0.2);
    }
    
    .mission-item-icon {
        width: 50px;
        height: 50px;
        background: var(--secondary-gold);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
        color: white;
        box-shadow: 0 4px 10px rgba(212, 160, 23, 0.3);
    }
    
    .mission-item-content h6 {
        color: var(--dark-charcoal);
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    /* Team Section */
    .team-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .team-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        border-color: var(--primary-red);
    }
    
    .team-image-wrapper {
        position: relative;
        height: 300px;
        overflow: hidden;
    }
    
    .team-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .team-card:hover .team-image-wrapper img {
        transform: scale(1.1);
    }
    
    .team-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .team-card:hover .team-overlay {
        opacity: 1;
    }
    
    .team-position .badge {
        background: var(--primary-red);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
    }
    
    .team-social {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 20px;
    }
    
    .social-icon {
        width: 40px;
        height: 40px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        background: var(--primary-red);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 10px rgba(178, 34, 34, 0.3);
    }
    
    /* Stats Section */
    .stat-box {
        padding: 40px 20px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .stat-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(178, 34, 34, 0.15);
        border-color: rgba(178, 34, 34, 0.2);
    }
    
    .stat-icon {
        width: 70px;
        height: 70px;
        background: rgba(178, 34, 34, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        transition: all 0.3s ease;
    }
    
    .stat-box:hover .stat-icon {
        background: var(--primary-red);
        color: white;
        transform: rotate(10deg) scale(1.1);
    }
    
    .stat-number {
        color: var(--primary-red);
        font-weight: 800;
    }
    
    /* CTA Section */
    .cta-wrapper {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        box-shadow: 0 30px 60px rgba(178, 34, 34, 0.3);
    }
    
    .btn-light {
        background: white;
        color: var(--primary-red);
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-light:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 255, 255, 0.3);
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .hero-title {
            font-size: 3rem;
        }
        
        .display-4 {
            font-size: 2.5rem;
        }
        
        .display-5 {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 992px) {
        .modern-hero {
            padding: 120px 0 60px;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .floating-image {
            transform: perspective(1000px) rotateY(0deg);
        }
        
        .founder-content {
            padding-left: 0 !important;
            margin-top: 40px;
        }
        
        .cta-buttons {
            text-align: center !important;
        }
        
        .timeline-year {
            position: relative;
            left: 0;
            top: 0;
            margin-bottom: 10px;
            display: inline-block;
        }
        
        .timeline-item {
            padding-left: 20px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .section-padding {
            padding: 80px 0;
        }
        
        .philosophy-icon {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
        
        .vision-card .card-body,
        .mission-card .card-body {
            padding: 30px;
        }
        
        .mission-item {
            padding: 15px;
        }
        
        .cta-content, .cta-buttons {
            text-align: center;
            padding: 30px !important;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .journey-wrapper {
            padding: 20px;
            margin-top: 30px;
        }
        
        .modern-timeline {
            max-height: 500px;
        }
        
        .founder-stats .stat-box {
            padding: 10px;
        }
        
        .milestone-item {
            padding: 15px;
        }
    }
    
    @media (max-width: 576px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .section-tag {
            padding: 6px 20px;
            font-size: 0.8rem;
        }
        
        .founder-badge {
            position: relative;
            bottom: auto;
            left: auto;
            transform: none;
            margin: 20px auto 0;
            max-width: 100%;
        }
        
        .team-image-wrapper {
            height: 250px;
        }
        
        .timeline-year {
            font-size: 0.8rem;
            padding: 6px 12px;
        }
        
        .timeline-list li {
            font-size: 0.9rem;
        }
        
        .point-icon {
            width: 40px;
            height: 40px;
        }
        
        .milestone-icon {
            width: 60px;
            height: 60px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Card hover effects
        document.querySelectorAll('.philosophy-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.philosophy-icon');
                if (icon) {
                    icon.style.transform = 'scale(1.15) rotate(10deg)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.philosophy-icon');
                if (icon) {
                    icon.style.transform = 'scale(1.1) rotate(5deg)';
                }
            });
        });
        
        // Founder stats hover
        document.querySelectorAll('.founder-stats .stat-box').forEach(box => {
            box.addEventListener('mouseenter', function() {
                const number = this.querySelector('.stat-number');
                if (number) {
                    number.style.transform = 'scale(1.2)';
                    number.style.color = 'var(--secondary-gold)';
                }
            });
            
            box.addEventListener('mouseleave', function() {
                const number = this.querySelector('.stat-number');
                if (number) {
                    number.style.transform = 'scale(1)';
                    number.style.color = 'var(--primary-red)';
                }
            });
        });
        
        // Philosophy points hover
        document.querySelectorAll('.philosophy-point').forEach(point => {
            point.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.point-icon');
                if (icon) {
                    icon.style.transform = 'rotate(15deg) scale(1.1)';
                }
            });
            
            point.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.point-icon');
                if (icon) {
                    icon.style.transform = 'rotate(0) scale(1)';
                }
            });
        });
        
        // Vision & Mission card effects
        document.querySelectorAll('.feature-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.feature-icon');
                if (icon) {
                    icon.style.transform = 'rotate(15deg)';
                    icon.style.background = 'var(--primary-red)';
                    icon.style.color = 'white';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.feature-icon');
                if (icon) {
                    icon.style.transform = 'rotate(0)';
                    icon.style.background = 'rgba(178, 34, 34, 0.1)';
                    icon.style.color = 'var(--primary-red)';
                }
            });
        });
        
        // Mission items hover
        document.querySelectorAll('.mission-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.mission-item-icon');
                if (icon) {
                    icon.style.transform = 'rotate(15deg) scale(1.1)';
                    icon.style.boxShadow = '0 6px 15px rgba(212, 160, 23, 0.4)';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.mission-item-icon');
                if (icon) {
                    icon.style.transform = 'rotate(0) scale(1)';
                    icon.style.boxShadow = '0 4px 10px rgba(212, 160, 23, 0.3)';
                }
            });
        });
        
        // Team card hover
        document.querySelectorAll('.team-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const socialIcons = this.querySelectorAll('.social-icon');
                socialIcons.forEach(icon => {
                    icon.style.transform = 'translateY(0)';
                });
            });
        });
        
        // Stats counter animation
        const statBoxes = document.querySelectorAll('.stat-box');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumber = entry.target.querySelector('.stat-number');
                    if (statNumber && !statNumber.classList.contains('animated')) {
                        statNumber.classList.add('animated');
                        animateNumber(statNumber);
                    }
                }
            });
        }, { threshold: 0.5 });
        
        statBoxes.forEach(box => observer.observe(box));
        
        function animateNumber(element) {
            const finalValue = element.textContent;
            const isPercentage = finalValue.includes('%');
            const numericValue = parseFloat(finalValue.replace(/[^0-9.]/g, ''));
            
            let start = 0;
            const duration = 2000;
            const increment = numericValue / (duration / 16);
            
            const timer = setInterval(() => {
                start += increment;
                if (start >= numericValue) {
                    element.textContent = finalValue;
                    clearInterval(timer);
                } else {
                    const displayValue = isPercentage 
                        ? Math.floor(start) + '%'
                        : Math.floor(start) + (finalValue.includes('K') ? 'K+' : '+');
                    element.textContent = displayValue;
                }
            }, 16);
        }
        
        // Parallax effect for hero
        const hero = document.querySelector('.modern-hero');
        if (hero) {
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                hero.style.backgroundPosition = `center ${rate}px`;
            });
        }
        
        // Timeline year hover effect
        const timelineYears = document.querySelectorAll('.timeline-year');
        timelineYears.forEach(year => {
            year.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.1)';
                this.style.boxShadow = '0 6px 20px rgba(178, 34, 34, 0.4)';
            });
            
            year.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 4px 15px rgba(178, 34, 34, 0.3)';
            });
        });
        
        // Milestone hover effect
        document.querySelectorAll('.milestone-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.milestone-icon');
                const title = this.querySelector('h5');
                
                if (icon) icon.style.transform = 'scale(1.15)';
                if (title) title.style.color = 'var(--primary-red)';
            });
            
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.milestone-icon');
                const title = this.querySelector('h5');
                
                if (icon) icon.style.transform = 'scale(1.1)';
                if (title) title.style.color = 'var(--dark-charcoal)';
            });
        });
    });
</script>
@endsection