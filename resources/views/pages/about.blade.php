@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')
@section('meta-description', 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017')

@section('content')
<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Tentang<br>
                        <span class="hero-highlight">JOSS GANDOS</span>
                    </h1>
                    <p class="hero-subtitle">
                        Sebuah perjalanan cita rasa yang dimulai dari mimpi sederhana, 
                        tumbuh menjadi ikon kuliner Surabaya dengan filosofi "Joss, Mantap, dan Luar Biasa".
                    </p>
                    <div class="hero-badges">
                        <span class="badge badge-est">
                            <i class="fas fa-history me-1"></i> Est. 2017
                        </span>
                        <span class="badge badge-flavor">
                            <i class="fas fa-utensils me-1"></i> Cita Rasa Autentik
                        </span>
                        <span class="badge badge-family">
                            <i class="fas fa-users me-1"></i> Keluarga Besar
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="section-padding bg-light-cream">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Visi & Misi</h2>
            <p class="section-subtitle">Prinsip yang membimbing setiap langkah kami</p>
        </div>
        
        <div class="row g-4">
            <!-- Vision -->
            <div class="col-lg-6">
                <div class="card vision-card">
                    <div class="card-body p-4 p-md-5">
                        <div class="vision-header mb-4">
                            <div class="vision-icon">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="vision-title">
                                <span class="badge vision-badge">VISI</span>
                                <h3>Menjadi Restoran Pilihan Utama</h3>
                            </div>
                        </div>
                        
                        <div class="vision-content">
                            <blockquote class="vision-quote">
                                "Menjadi restoran pilihan utama di Surabaya yang dikenal dengan cita rasa autentik, 
                                pelayanan ramah, serta suasana nyaman untuk seluruh keluarga."
                            </blockquote>
                            
                            <div class="row g-3 mt-4">
                                <div class="col-6">
                                    <div class="vision-pill">
                                        <i class="fas fa-star"></i>
                                        <div>
                                            <small>Cita Rasa</small>
                                            <p>Autentik</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="vision-pill">
                                        <i class="fas fa-smile"></i>
                                        <div>
                                            <small>Pelayanan</small>
                                            <p>Ramah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="vision-pill">
                                        <i class="fas fa-home"></i>
                                        <div>
                                            <small>Suasana</small>
                                            <p>Nyaman</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="vision-pill">
                                        <i class="fas fa-users"></i>
                                        <div>
                                            <small>Untuk</small>
                                            <p>Keluarga</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mission -->
            <div class="col-lg-6">
                <div class="card mission-card">
                    <div class="card-body p-4 p-md-5">
                        <div class="mission-header mb-4">
                            <div class="mission-icon">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <div class="mission-title">
                                <span class="badge mission-badge">MISI</span>
                                <h3>Komitmen Kami</h3>
                            </div>
                        </div>
                        
                        <div class="mission-content">
                            <div class="row g-3">
                                @foreach([
                                    ['icon' => 'fas fa-seedling', 'title' => 'Bahan Berkualitas', 'desc' => 'Menyajikan hidangan berkualitas tinggi dengan bahan segar'],
                                    ['icon' => 'fas fa-concierge-bell', 'title' => 'Pelayanan Profesional', 'desc' => 'Pelayanan cepat, ramah, dan profesional'],
                                    ['icon' => 'fas fa-couch', 'title' => 'Suasana Nyaman', 'desc' => 'Suasana bersih, nyaman, dan bersahabat'],
                                    ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi Terus', 'desc' => 'Terus berinovasi menu dan layanan'],
                                    ['icon' => 'fas fa-hand-sparkles', 'title' => 'Standar Kebersihan', 'desc' => 'Menjaga standar kebersihan (hygiene)'],
                                    ['icon' => 'fas fa-hand-holding-heart', 'title' => 'Kontribusi Lingkungan', 'desc' => 'Kontribusi positif bagi lingkungan sekitar']
                                ] as $mission)
                                <div class="col-6">
                                    <div class="mission-item">
                                        <div class="mission-icon-small">
                                            <i class="{{ $mission['icon'] }}"></i>
                                        </div>
                                        <div class="mission-text">
                                            <h6>{{ $mission['title'] }}</h6>
                                            <p>{{ $mission['desc'] }}</p>
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
    </div>
</section>

<!-- Founder Story -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Pendiri Resto Joss Gandos</h2>
            <p class="section-subtitle">Dari IT ke Kuliner: Sebuah Perjalanan Inspiratif</p>
        </div>
        
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="founder-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         class="img-fluid rounded-4 shadow-lg" alt="Dr. Siswanto - Founder JOSS GANDOS">
                    
                    <div class="founder-badge">
                        <div class="badge-content">
                            <i class="fas fa-graduation-cap"></i>
                            <div>
                                <h6>Dr. Siswanto</h6>
                                <p>Founder & Visionary</p>
                                <small>IT Professional & Entrepreneur</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="founder-content">
                    <div class="story-intro mb-4">
                        <h3 class="story-title">From IT to F&B: A Digital Mind in Culinary World</h3>
                    </div>
                    
                    <div class="story-text mb-4">
                        <p class="story-lead">
                            Didirikan oleh <strong>Dr. Siswanto</strong> pada <strong>28 Oktober 2017</strong>, 
                            Resto Joss Gandos lahir dari semangat beliau untuk mengembangkan sayap ke dunia 
                            <span class="text-primary">Food & Beverage (F&B)</span> di luar latar belakang IT.
                        </p>
                        
                        <div class="milestones">
                            <div class="milestone">
                                <i class="fas fa-store"></i>
                                <div>
                                    <h5>Berawal dari Rintisan Sederhana</h5>
                                    <p>Berawal dari rintisan sederhana bernama <strong>"Bebek Joss Gandos"</strong>, 
                                    beliau membawa resto ini tumbuh menjadi pionir kuliner di kawasan Jemursari.</p>
                                </div>
                            </div>
                            
                            <div class="milestone">
                                <i class="fas fa-brain"></i>
                                <div>
                                    <h5>Filosofi "JOSS"</h5>
                                    <p>Di bawah kepemimpinan beliau dengan filosofi semangat <strong>"Joss, Mantap, dan Luar Biasa"</strong>, 
                                    resto ini sukses melewati tantangan pandemi dan terus berinovasi.</p>
                                </div>
                            </div>
                            
                            <div class="milestone">
                                <i class="fas fa-fish"></i>
                                <div>
                                    <h5>Menu Ikonik</h5>
                                    <p>Salah satu inovasi terbesar adalah menu ikonik <strong>Gulai Kepala Ikan Salmon</strong> 
                                    yang menjadi signature dish kami.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="founder-quote">
                        <div class="quote-content">
                            <i class="fas fa-quote-left quote-icon"></i>
                            <p class="quote-text">
                                Dedikasi saya adalah memastikan setiap tamu merasakan kehangatan pelayanan 
                                dan cita rasa yang tak terlupakan. Di JOSS GANDOS, kami tidak hanya menyajikan 
                                makanan, tapi juga pengalaman.
                            </p>
                            <div class="quote-author">
                                <div class="author-line"></div>
                                <small>Dr. Siswanto, Founder</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy -->
<section class="philosophy-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="philosophy-content">
                    <span class="section-tag">FILOSOFI KAMI</span>
                    <h2 class="text-white mb-4">Apa itu "JOSS"?</h2>
                    
                    <div class="philosophy-grid mb-4">
                        <div class="row g-3">
                            @foreach([
                                ['icon' => 'fas fa-fire', 'title' => 'JOSS', 'desc' => 'Semangat berkobar, energi positif'],
                                ['icon' => 'fas fa-thumbs-up', 'title' => 'MANTAP', 'desc' => 'Kualitas konsisten, kepuasan maksimal'],
                                ['icon' => 'fas fa-star', 'title' => 'LUAR BIASA', 'desc' => 'Pengalaman tak terlupakan, layanan istimewa']
                            ] as $philosophy)
                            <div class="col-4">
                                <div class="philosophy-item">
                                    <div class="philosophy-icon">
                                        <i class="{{ $philosophy['icon'] }}"></i>
                                    </div>
                                    <h5>{{ $philosophy['title'] }}</h5>
                                    <p>{{ $philosophy['desc'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <p class="philosophy-description">
                        Tiga kata sederhana ini menjadi roh dalam setiap aspek operasional kami. 
                        Dari pemilihan bahan baku hingga pelayanan di meja makan, filosofi JOSS-GANDOS 
                        adalah komitmen kami untuk memberikan yang terbaik.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="timeline-wrapper">
                    <div class="card timeline-card">
                        <div class="card-body p-4 p-md-5">
                            <div class="timeline-header text-center mb-4">
                                <h3>Our Journey Timeline</h3>
                                <p class="text-muted">Perjalanan 7 tahun penuh dedikasi</p>
                            </div>
                            
                            <div class="journey-timeline">
                                @foreach([
                                    ['year' => '2017', 'title' => 'Awal Pendirian', 'desc' => 'Bebek Joss Gandos pertama di Jemursari'],
                                    ['year' => '2018', 'title' => 'Ekspansi Menu', 'desc' => 'Penambahan menu ikan dan seafood'],
                                    ['year' => '2020', 'title' => 'Adaptasi Pandemi', 'desc' => 'Layanan delivery & takeaway premium'],
                                    ['year' => '2022', 'title' => 'Inovasi Signature', 'desc' => 'Launching Gulai Kepala Ikan Salmon'],
                                    ['year' => '2024', 'title' => 'Digital Experience', 'desc' => 'Pengembangan sistem reservasi online']
                                ] as $journey)
                                <div class="journey-item">
                                    <span class="journey-year">{{ $journey['year'] }}</span>
                                    <div class="journey-content">
                                        <h6>{{ $journey['title'] }}</h6>
                                        <p>{{ $journey['desc'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Komitmen Kami</h2>
            <p class="section-subtitle">Hal-hal yang tidak pernah kami kompromikan</p>
        </div>
        
        <div class="row g-4">
            @foreach([
                ['icon' => 'fas fa-leaf', 'title' => 'Bahan Segar Setiap Hari', 'desc' => 'Kerjasama langsung dengan petani dan nelayan lokal untuk bahan terbaik', 'stats' => '100%'],
                ['icon' => 'fas fa-user-tie', 'title' => 'Pelayanan Terlatih', 'desc' => 'Tim profesional dengan pelatihan berstandar internasional', 'stats' => '50+ Staff'],
                ['icon' => 'fas fa-shield-alt', 'title' => 'Standar Higienis', 'desc' => 'Proses masak dengan standar kebersihan tertinggi', 'stats' => 'ISO Certified'],
                ['icon' => 'fas fa-recycle', 'title' => 'Ramah Lingkungan', 'desc' => 'Pengurangan plastik dan program daur ulang aktif', 'stats' => 'Eco-Friendly'],
                ['icon' => 'fas fa-heart', 'title' => 'Untuk Keluarga', 'desc' => 'Desain interior yang nyaman untuk semua usia', 'stats' => 'Family-Oriented'],
                ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi Terus', 'desc' => 'Research & Development untuk menu baru setiap kuartal', 'stats' => '4x/Year']
            ] as $commitment)
            <div class="col-lg-4 col-md-6">
                <div class="card commitment-card">
                    <div class="card-body p-4">
                        <div class="commitment-header">
                            <div class="commitment-icon">
                                <i class="{{ $commitment['icon'] }}"></i>
                            </div>
                            <span class="commitment-stats">{{ $commitment['stats'] }}</span>
                        </div>
                        
                        <h5 class="commitment-title">{{ $commitment['title'] }}</h5>
                        <p class="commitment-desc">{{ $commitment['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Stats -->
<section class="stats-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <div class="stat-number counter" data-count="7">0</div>
                    <p class="stat-label">Tahun Berdiri</p>
                    <div class="stat-bar">
                        <div class="stat-progress"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <div class="stat-number counter" data-count="50000">0</div>
                    <p class="stat-label">Pelanggan Setia</p>
                    <div class="stat-bar">
                        <div class="stat-progress"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <div class="stat-number counter" data-count="50">0</div>
                    <p class="stat-label">Menu Spesial</p>
                    <div class="stat-bar">
                        <div class="stat-progress"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <div class="stat-number counter" data-count="100">0</div>
                    <p class="stat-label">Kepuasan Pelanggan</p>
                    <div class="stat-bar">
                        <div class="stat-progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card cta-card">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h2 class="cta-title mb-4">Tinggalkan Komentar Anda!</h2>
                        <p class="cta-text mb-4">
                            Kami selalu terbuka untuk masukan dan saran. Pengalaman Anda membantu kami 
                            untuk terus menjadi lebih baik setiap hari.
                        </p>
                        <div class="cta-buttons">
                            <a href="{{ route('contact') }}" class="btn btn-primary">
                                <i class="fas fa-comment me-2"></i> Beri Masukan
                            </a>
                            <a href="{{ route('reservation.create') }}" class="btn btn-secondary">
                                <i class="fas fa-calendar me-2"></i> Reservasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<style>
    /* ============================================
       CUSTOM VARIABLES
    ============================================ */
    :root {
        --primary-red: #B22222;
        --primary-dark: #8B0000;
        --secondary-gold: #D4A017;
        --accent-gold: #FFC145;
        --neutral-cream: #FFF9F0;
        --dark-charcoal: #2C2C2C;
        --light-cream: #FFF9F0;
        --light-gray: #F8F9FA;
    }
    
    /* ============================================
       HERO SECTION
    ============================================ */
    .about-hero {
        min-height: 70vh;
        background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), 
                    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        padding: 100px 0 80px;
        margin-top: -80px;
    }
    
    .hero-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 3.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }
    
    .hero-highlight {
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 600px;
        line-height: 1.8;
        margin-bottom: 2rem;
    }
    
    .hero-badges {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .hero-badges .badge {
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 500;
        border: none;
    }
    
    .badge-est {
        background: rgba(212, 161, 23, 0.2);
        color: var(--accent-gold);
    }
    
    .badge-flavor {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }
    
    .badge-family {
        background: rgba(212, 161, 23, 0.2);
        color: var(--accent-gold);
    }
    
    /* ============================================
       SECTION STYLES
    ============================================ */
    .section-padding {
        padding: 80px 0;
    }
    
    .bg-light-cream {
        background: linear-gradient(135deg, rgba(255, 249, 240, 0.5), rgba(255, 245, 230, 0.5));
    }
    
    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark-charcoal);
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        color: #6c757d;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .section-tag {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        border-radius: 6px;
        font-size: 0.8rem;
        letter-spacing: 1px;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
    }
    
    /* ============================================
       CARD STYLES
    ============================================ */
    .card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        height: 100%;
        background: white;
    }
    
    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }
    
    /* Vision Card */
    .vision-card {
        border-top: 4px solid var(--primary-red);
    }
    
    .vision-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    
    .vision-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .vision-badge {
        background: rgba(178, 34, 34, 0.1);
        color: var(--primary-red);
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: inline-block;
        margin-bottom: 0.5rem;
    }
    
    .vision-quote {
        font-size: 1.1rem;
        line-height: 1.6;
        color: var(--dark-charcoal);
        padding-left: 1.5rem;
        border-left: 3px solid var(--primary-red);
        margin: 1.5rem 0;
    }
    
    .vision-pill {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        background: rgba(178, 34, 34, 0.05);
        transition: all 0.3s ease;
    }
    
    .vision-pill:hover {
        background: rgba(178, 34, 34, 0.1);
        transform: translateY(-2px);
    }
    
    .vision-pill i {
        color: var(--secondary-gold);
        font-size: 1.2rem;
    }
    
    .vision-pill small {
        color: #6c757d;
        font-size: 0.8rem;
        display: block;
    }
    
    .vision-pill p {
        color: var(--dark-charcoal);
        font-weight: 600;
        margin: 0;
        font-size: 1rem;
    }
    
    /* Mission Card */
    .mission-card {
        border-top: 4px solid var(--secondary-gold);
    }
    
    .mission-header {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }
    
    .mission-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .mission-badge {
        background: rgba(212, 161, 23, 0.1);
        color: var(--secondary-gold);
        border-radius: 6px;
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: inline-block;
        margin-bottom: 0.5rem;
    }
    
    .mission-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.7);
        border-left: 3px solid var(--primary-red);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .mission-item:hover {
        background: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    
    .mission-icon-small {
        width: 40px;
        height: 40px;
        background: var(--primary-red);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }
    
    .mission-text h6 {
        color: var(--dark-charcoal);
        font-weight: 600;
        margin-bottom: 0.25rem;
        font-size: 0.95rem;
    }
    
    .mission-text p {
        color: #6c757d;
        font-size: 0.85rem;
        margin: 0;
        line-height: 1.5;
    }
    
    /* ============================================
       FOUNDER SECTION
    ============================================ */
    .founder-image-wrapper {
        position: relative;
    }
    
    .founder-badge {
        position: absolute;
        bottom: 1.5rem;
        left: 1.5rem;
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 2px solid var(--primary-red);
        max-width: 250px;
    }
    
    .badge-content {
        text-align: center;
    }
    
    .badge-content i {
        color: var(--primary-red);
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .badge-content h6 {
        color: var(--dark-charcoal);
        font-weight: 700;
        margin: 0;
    }
    
    .badge-content p {
        color: #6c757d;
        font-size: 0.9rem;
        margin: 0.25rem 0;
    }
    
    .badge-content small {
        color: #adb5bd;
        font-size: 0.8rem;
    }
    
    .story-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark-charcoal);
        margin-bottom: 1rem;
        position: relative;
        padding-left: 1rem;
    }
    
    .story-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(to bottom, var(--primary-red), var(--secondary-gold));
        border-radius: 2px;
    }
    
    .story-lead {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #6c757d;
        margin-bottom: 2rem;
    }
    
    .text-primary {
        color: var(--primary-red) !important;
        font-weight: 600;
    }
    
    .milestone {
        display: flex;
        gap: 1rem;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }
    
    .milestone:hover {
        background: white;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }
    
    .milestone i {
        color: var(--primary-red);
        font-size: 1.5rem;
        margin-top: 0.25rem;
    }
    
    .milestone h5 {
        color: var(--dark-charcoal);
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    
    .milestone p {
        color: #6c757d;
        margin: 0;
        line-height: 1.6;
    }
    
    .founder-quote {
        margin-top: 3rem;
    }
    
    .quote-content {
        background: linear-gradient(135deg, rgba(178, 34, 34, 0.05), rgba(212, 161, 23, 0.05));
        padding: 2rem;
        border-radius: 16px;
        position: relative;
    }
    
    .quote-icon {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        color: var(--primary-red);
        opacity: 0.3;
        font-size: 2rem;
    }
    
    .quote-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--dark-charcoal);
        margin-bottom: 1.5rem;
        padding-left: 3rem;
    }
    
    .quote-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .author-line {
        width: 40px;
        height: 2px;
        background: var(--primary-red);
    }
    
    .quote-author small {
        color: #6c757d;
        font-weight: 600;
    }
    
    /* ============================================
       PHILOSOPHY SECTION
    ============================================ */
    .philosophy-section {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }
    
    .philosophy-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('data:image/svg+xml,<svg width="60" height="60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="white" fill-opacity="0.1"><path d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/></g></g></svg>');
        background-size: 60px;
        opacity: 0.1;
    }
    
    .philosophy-content {
        position: relative;
        z-index: 2;
    }
    
    .philosophy-grid .philosophy-item {
        text-align: center;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .philosophy-grid .philosophy-item:hover {
        transform: translateY(-5px);
    }
    
    .philosophy-icon {
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }
    
    .philosophy-icon i {
        color: var(--accent-gold);
        font-size: 1.8rem;
    }
    
    .philosophy-item h5 {
        color: white;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .philosophy-item p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        margin: 0;
    }
    
    .philosophy-description {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.1rem;
        line-height: 1.8;
        margin: 0;
    }
    
    .timeline-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
    }
    
    .journey-timeline {
        position: relative;
        padding-left: 40px;
    }
    
    .journey-timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary-red), var(--secondary-gold));
    }
    
    .journey-item {
        position: relative;
        margin-bottom: 2rem;
    }
    
    .journey-item:last-child {
        margin-bottom: 0;
    }
    
    .journey-year {
        position: absolute;
        left: -40px;
        top: 0;
        display: inline-block;
        padding: 6px 12px;
        background: var(--primary-red);
        color: white;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        min-width: 60px;
        text-align: center;
    }
    
    .journey-content h6 {
        color: var(--dark-charcoal);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }
    
    .journey-content p {
        color: #6c757d;
        font-size: 0.9rem;
        margin: 0;
    }
    
    /* ============================================
       COMMITMENT CARDS
    ============================================ */
    .commitment-card {
        border-top: 3px solid var(--primary-red);
    }
    
    .commitment-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    
    .commitment-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-red);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    .commitment-icon i {
        font-size: 1.25rem;
    }
    
    .commitment-stats {
        background: var(--primary-red);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }
    
    .commitment-title {
        color: var(--dark-charcoal);
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }
    
    .commitment-desc {
        color: #6c757d;
        margin: 0;
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    /* ============================================
       STATS SECTION
    ============================================ */
    .stats-section {
        background: linear-gradient(135deg, rgba(178, 34, 34, 0.9), rgba(139, 0, 0, 0.9));
        padding: 80px 0;
    }
    
    .stat-item {
        padding: 1.5rem;
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .stat-label {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }
    
    .stat-bar {
        width: 100px;
        height: 4px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 2px;
        margin: 0 auto;
    }
    
    .stat-progress {
        width: 100%;
        height: 100%;
        background: var(--accent-gold);
        border-radius: 2px;
    }
    
    /* ============================================
       CTA SECTION
    ============================================ */
    .cta-card {
        background: linear-gradient(135deg, rgba(178, 34, 34, 0.05), rgba(212, 161, 23, 0.05));
        border: none;
    }
    
    .cta-title {
        color: var(--dark-charcoal);
        font-weight: 700;
        font-size: 2rem;
    }
    
    .cta-text {
        color: #6c757d;
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 0.75rem 2rem;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
    }
    
    .btn-primary {
        background: var(--primary-red);
        color: white;
    }
    
    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(178, 34, 34, 0.3);
    }
    
    .btn-secondary {
        background: var(--secondary-gold);
        color: white;
    }
    
    .btn-secondary:hover {
        background: #b8941f;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(212, 161, 23, 0.3);
    }
    
    /* ============================================
       RESPONSIVE DESIGN
    ============================================ */
    @media (max-width: 1200px) {
        .hero-title {
            font-size: 3rem;
        }
        
        .section-title {
            font-size: 2.2rem;
        }
    }
    
    @media (max-width: 992px) {
        .about-hero {
            min-height: 60vh;
            padding: 80px 0 60px;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .founder-badge {
            position: relative;
            bottom: auto;
            left: auto;
            margin-top: 1.5rem;
            max-width: 100%;
        }
        
        .philosophy-grid .col-4 {
            margin-bottom: 1.5rem;
        }
        
        .philosophy-item {
            margin-bottom: 2rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .section-padding {
            padding: 60px 0;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .vision-header,
        .mission-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        .journey-timeline {
            padding-left: 30px;
        }
        
        .journey-year {
            left: -30px;
        }
        
        .stat-number {
            font-size: 2rem;
        }
        
        .cta-buttons {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
    
    @media (max-width: 576px) {
        .about-hero {
            min-height: 50vh;
            padding: 60px 0 40px;
        }
        
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-badges {
            flex-direction: column;
        }
        
        .philosophy-grid .col-4 {
            width: 100%;
        }
        
        .mission-item {
            margin-bottom: 1rem;
        }
        
        .commitment-card {
            margin-bottom: 1.5rem;
        }
    }
    
    /* ============================================
       ANIMATIONS
    ============================================ */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fadeInUp 0.8s ease forwards;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animated counters
        const animateCounter = (element, start, end, duration) => {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                
                if (end >= 1000) {
                    element.textContent = value.toLocaleString('id-ID');
                } else {
                    element.textContent = value;
                }
                
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        };

        // Start counters when in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = document.querySelectorAll('.counter');
                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-count'));
                        animateCounter(counter, 0, target, 2000);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        // Observe stats section
        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        // Hover effects for cards
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Mission items hover effect
        document.querySelectorAll('.mission-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.mission-icon-small');
                if (icon) {
                    icon.style.transform = 'rotate(10deg) scale(1.1)';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.mission-icon-small');
                if (icon) {
                    icon.style.transform = 'rotate(0) scale(1)';
                }
            });
        });

        // Philosophy items hover effect
        document.querySelectorAll('.philosophy-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.philosophy-icon');
                if (icon) {
                    icon.style.transform = 'scale(1.05) rotate(5deg)';
                }
            });
            
            item.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.philosophy-icon');
                if (icon) {
                    icon.style.transform = 'scale(1) rotate(0)';
                }
            });
        });

        // Commitment cards hover effect
        document.querySelectorAll('.commitment-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.commitment-icon');
                const stats = this.querySelector('.commitment-stats');
                
                if (icon) icon.style.transform = 'translateY(-5px) rotate(10deg)';
                if (stats) stats.style.transform = 'scale(1.1)';
            });
            
            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.commitment-icon');
                const stats = this.querySelector('.commitment-stats');
                
                if (icon) icon.style.transform = 'translateY(0) rotate(0)';
                if (stats) stats.style.transform = 'scale(1)';
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add animation classes on scroll
        const animateOnScroll = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease forwards';
                    animateOnScroll.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        // Observe all cards and sections
        document.querySelectorAll('.card, .section-header').forEach(element => {
            element.style.opacity = '0';
            animateOnScroll.observe(element);
        });
    });
</script>
@endsection