@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.9), rgba(44, 44, 44, 0.95)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Warisan Rasa<br>
                            <span>Indonesia</span>
                        </h1>
                        <p class="hero-subtitle">
                            Sebuah perjalanan panjang menjaga keaslian cita rasa Nusantara sambil berinovasi 
                            untuk menciptakan pengalaman kuliner yang tak terlupakan.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-history me-1"></i> Est. 2015
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-store me-1"></i> 5 Lokasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <div class="modern-card" style="border: none; overflow: visible;">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 class="img-fluid rounded-4" alt="Interior JOSS GANDOS">
                            <div class="position-absolute bottom-0 end-0 m-4">
                                <div class="bg-white p-3 rounded-4 shadow-lg">
                                    <div class="text-center">
                                        <div class="fw-bold" style="color: var(--primary-red); font-size: 1.8rem;">8+</div>
                                        <small class="text-muted">Tahun Pengalaman</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <div class="section-title text-start">
                            <h2>Cerita Kami</h2>
                            <p>Dari warung kecil hingga restoran modern</p>
                        </div>
                        
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-year">2015</div>
                                <div class="timeline-content">
                                    <h5 class="fw-bold">Dimulai dengan Visi</h5>
                                    <p class="mb-0">Warung kecil di Jakarta dengan resep keluarga Chef Andi</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-year">2018</div>
                                <div class="timeline-content">
                                    <h5 class="fw-bold">Ekspansi Pertama</h5>
                                    <p class="mb-0">Cabang kedua di Bandung dengan menu regional yang lebih lengkap</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-year">2021</div>
                                <div class="timeline-content">
                                    <h5 class="fw-bold">Modernisasi</h5>
                                    <p class="mb-0">Transformasi menjadi restoran modern dengan konsep baru</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-year">Sekarang</div>
                                <div class="timeline-content">
                                    <h5 class="fw-bold">Komitmen Terus</h5>
                                    <p class="mb-0">Tetap menjaga keaslian rasa dengan inovasi pelayanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Philosophy -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card" style="background: linear-gradient(135deg, rgba(180, 34, 34, 0.05), rgba(212, 161, 23, 0.05)); border: none;">
                        <div class="p-5 text-center">
                            <h3 class="fw-bold mb-4" style="color: var(--dark-charcoal);">Filosofi Kami</h3>
                            <p class="lead" style="color: var(--warm-brown); max-width: 800px; margin: 0 auto; line-height: 1.8;">
                                "Menjaga keaslian resep warisan Nusantara sambil mengadaptasinya dengan 
                                selera modern. Setiap hidangan adalah perpaduan sempurna antara tradisi dan inovasi."
                            </p>
                            <div class="mt-4">
                                <small class="text-muted">- Chef Andi, Founder JOSS GANDOS</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission -->
    <section class="section-padding" style="background: var(--light-gray);">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="modern-card h-100" style="border: 2px solid rgba(180, 34, 34, 0.1);">
                        <div class="p-5">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                    </div>
                                    <h3 class="mb-0" style="color: var(--dark-charcoal);">Visi</h3>
                                </div>
                            </div>
                            <div class="vision-content">
                                <p class="mb-4" style="color: var(--warm-brown); line-height: 1.8; font-size: 1.1rem;">
                                    Menjadi restoran Indonesia terdepan yang diakui secara internasional, 
                                    dengan komitmen untuk melestarikan warisan kuliner Nusantara sambil 
                                    terus berinovasi.
                                </p>
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check me-3 mt-1" style="color: var(--primary-red);"></i>
                                        <span style="color: var(--warm-brown);">Perwakilan kuliner Indonesia di kancah global</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check me-3 mt-1" style="color: var(--primary-red);"></i>
                                        <span style="color: var(--warm-brown);">Pusat inovasi kuliner Indonesia modern</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="fas fa-check me-3 mt-1" style="color: var(--primary-red);"></i>
                                        <span style="color: var(--warm-brown);">Destinasi utama wisata kuliner Indonesia</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="modern-card h-100" style="border: 2px solid rgba(180, 34, 34, 0.1);">
                        <div class="p-5">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fas fa-bullseye"></i>
                                        </div>
                                    </div>
                                    <h3 class="mb-0" style="color: var(--dark-charcoal);">Misi</h3>
                                </div>
                            </div>
                            <div class="mission-content">
                                <div class="mission-item mb-4">
                                    <div class="mission-number">01</div>
                                    <div class="mission-text">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Kualitas Terbaik</h5>
                                        <p class="mb-0" style="color: var(--warm-brown);">Menggunakan bahan-bahan lokal terbaik dengan standar kualitas tertinggi</p>
                                    </div>
                                </div>
                                
                                <div class="mission-item mb-4">
                                    <div class="mission-number">02</div>
                                    <div class="mission-text">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Pelestarian Budaya</h5>
                                        <p class="mb-0" style="color: var(--warm-brown);">Menjaga dan mengembangkan resep tradisional Indonesia</p>
                                    </div>
                                </div>
                                
                                <div class="mission-item">
                                    <div class="mission-number">03</div>
                                    <div class="mission-text">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Inovasi Berkelanjutan</h5>
                                        <p class="mb-0" style="color: var(--warm-brown);">Terus berinovasi dalam penyajian dan pengalaman kuliner</p>
                                    </div>
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
            <div class="section-title">
                <h2>Nilai-Nilai Kami</h2>
                <p>Prinsip yang mendasari setiap keputusan dan tindakan kami</p>
            </div>
            
            <div class="row g-4">
                @php
                    $values = [
                        ['icon' => 'fas fa-heart', 'title' => 'Integritas', 'desc' => 'Kejujuran dalam setiap bahan dan pelayanan', 'color' => 'var(--primary-red)'],
                        ['icon' => 'fas fa-users', 'title' => 'Kolaborasi', 'desc' => 'Bekerja sama untuk hasil terbaik', 'color' => 'var(--secondary-gold)'],
                        ['icon' => 'fas fa-star', 'title' => 'Kualitas', 'desc' => 'Tidak pernah kompromi dengan kualitas', 'color' => 'var(--accent-gold)'],
                        ['icon' => 'fas fa-leaf', 'title' => 'Keberlanjutan', 'desc' => 'Peduli terhadap lingkungan dan komunitas', 'color' => 'var(--primary-red)'],
                        ['icon' => 'fas fa-handshake', 'title' => 'Respek', 'desc' => 'Menghargai setiap pelanggan dan rekan', 'color' => 'var(--secondary-gold)'],
                        ['icon' => 'fas fa-lightbulb', 'title' => 'Inovasi', 'desc' => 'Terus belajar dan berinovasi', 'color' => 'var(--accent-gold)'],
                    ];
                @endphp
                
                @foreach($values as $value)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card h-100" style="border: none;">
                            <div class="p-4 text-center">
                                <div class="mb-4">
                                    <div class="mx-auto" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(180, 34, 34, 0.1), rgba(212, 161, 23, 0.1)); 
                                            border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="{{ $value['icon'] }} fa-2x" style="color: {{ $value['color'] }};"></i>
                                    </div>
                                </div>
                                <h4 class="mb-3 fw-bold" style="color: var(--dark-charcoal);">{{ $value['title'] }}</h4>
                                <p class="mb-0" style="color: var(--warm-brown); line-height: 1.6;">
                                    {{ $value['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="section-padding" style="background: linear-gradient(to right, rgba(180, 34, 34, 0.02), rgba(212, 161, 23, 0.02));">
        <div class="container">
            <div class="section-title">
                <h2>Tim Kami</h2>
                <p>Orang-orang yang menghidupkan JOSS GANDOS</p>
            </div>
            
            <div class="row g-4 justify-content-center">
                @php
                    $team = [
                        ['name' => 'Chef Andi', 'role' => 'Founder & Head Chef', 'quote' => 'Setiap rempah bercerita tentang Indonesia', 'initials' => 'CA'],
                        ['name' => 'Budi Santoso', 'role' => 'Restaurant Manager', 'quote' => 'Pengalaman pelanggan adalah prioritas utama', 'initials' => 'BS'],
                        ['name' => 'Sari Dewi', 'role' => 'Customer Service Head', 'quote' => 'Senyum adalah bahasa universal', 'initials' => 'SD'],
                        ['name' => 'Rina Wati', 'role' => 'Head of Procurement', 'quote' => 'Kualitas dimulai dari pemilihan bahan', 'initials' => 'RW'],
                    ];
                @endphp
                
                @foreach($team as $member)
                    <div class="col-lg-3 col-md-6">
                        <div class="modern-card h-100" style="border: none; overflow: visible;">
                            <div class="team-card">
                                <div class="team-avatar">
                                    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                border-radius: 50%; display: flex; align-items: center; justify-content: center; 
                                                color: white; font-size: 2rem; font-weight: 600; margin: -50px auto 20px; box-shadow: 0 10px 25px rgba(180, 34, 34, 0.3);">
                                        {{ $member['initials'] }}
                                    </div>
                                </div>
                                <div class="p-4 text-center">
                                    <h5 class="fw-bold mb-1">{{ $member['name'] }}</h5>
                                    <p class="text-muted mb-3">{{ $member['role'] }}</p>
                                    <div class="team-quote">
                                        <p class="mb-0" style="color: var(--warm-brown); font-style: italic; font-size: 0.9rem;">
                                            "{{ $member['quote'] }}"
                                        </p>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark)); position: relative; overflow: hidden;">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="text-white mb-3">Ingin tahu lebih banyak?</h3>
                    <p class="text-white opacity-90 mb-0">Kunjungi restoran kami atau hubungi tim kami untuk informasi lebih lanjut</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/contact" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-phone-alt me-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .timeline {
        position: relative;
        padding-left: 30px;
        margin-top: 30px;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary-red), var(--secondary-gold));
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        padding-left: 30px;
    }
    
    .timeline-item:last-child {
        margin-bottom: 0;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -36px;
        top: 5px;
        width: 12px;
        height: 12px;
        background: var(--primary-red);
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px var(--primary-red);
    }
    
    .timeline-year {
        position: absolute;
        left: -80px;
        top: 0;
        background: var(--primary-red);
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .timeline-content h5 {
        color: var(--dark-charcoal);
        margin-bottom: 5px;
    }
    
    .timeline-content p {
        color: var(--warm-brown);
        font-size: 0.95rem;
    }
    
    .mission-item {
        position: relative;
        padding-left: 60px;
    }
    
    .mission-number {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 2rem;
        font-weight: 700;
        color: rgba(180, 34, 34, 0.1);
    }
    
    .team-card {
        transition: all 0.3s ease;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
    }
    
    .team-quote {
        position: relative;
        padding: 15px;
        background: rgba(180, 34, 34, 0.05);
        border-radius: 10px;
        margin-top: 15px;
    }
    
    .team-quote::before {
        content: '"';
        position: absolute;
        top: -10px;
        left: 15px;
        font-size: 3rem;
        color: var(--primary-red);
        opacity: 0.2;
        font-family: 'Times New Roman', serif;
    }
    
    .social-link {
        width: 35px;
        height: 35px;
        background: rgba(180, 34, 34, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-red);
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .social-link:hover {
        background: var(--primary-red);
        color: white;
        transform: translateY(-3px);
    }
    
    @media (max-width: 768px) {
        .timeline-year {
            position: relative;
            left: 0;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .timeline-item {
            padding-left: 20px;
        }
        
        .timeline-item::before {
            left: -26px;
        }
    }
</style>
@endsection