@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')

@section('meta-description', 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), 
                url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Warisan Rasa<br>
                            <span class="highlight">Indonesia</span>
                        </h1>
                        <p class="hero-subtitle">
                            Sebuah perjalanan panjang menjaga keaslian cita rasa Nusantara sambil berinovasi 
                            untuk menciptakan pengalaman kuliner yang tak terlupakan.
                        </p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-history me-1"></i> Est. 2017
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-store me-1"></i> 5 Lokasi
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-users me-1"></i> 50+ Staff
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
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="position-relative animate-fade-in">
                        <div class="modern-card" style="border: none; overflow: visible;">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                 class="img-fluid rounded-4" alt="Interior JOSS GANDOS">
                            <!-- Experience Badge -->
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
                    <div class="ps-lg-5 animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="section-title text-start mb-5">
                            <h2>Cerita Kami</h2>
                            <p class="text-muted">Dari warung kecil hingga restoran modern</p>
                            <div class="title-decoration justify-content-start">
                                <span style="width: 60px;"></span>
                            </div>
                        </div>
                        
                        <div class="timeline">
                            <div class="timeline-item mb-4">
                                <div class="d-flex">
                                    <div class="timeline-year me-4">
                                        <span class="fw-bold" style="color: var(--primary-red);">2017</span>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Dimulai dengan Visi</h5>
                                        <p class="mb-0 text-muted">Warung kecil di Jakarta dengan resep keluarga Chef Andi</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item mb-4">
                                <div class="d-flex">
                                    <div class="timeline-year me-4">
                                        <span class="fw-bold" style="color: var(--primary-red);">2019</span>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Ekspansi Pertama</h5>
                                        <p class="mb-0 text-muted">Cabang kedua di Bandung dengan menu regional yang lebih lengkap</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item mb-4">
                                <div class="d-flex">
                                    <div class="timeline-year me-4">
                                        <span class="fw-bold" style="color: var(--primary-red);">2021</span>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Modernisasi</h5>
                                        <p class="mb-0 text-muted">Transformasi menjadi restoran modern dengan konsep baru</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="d-flex">
                                    <div class="timeline-year me-4">
                                        <span class="fw-bold" style="color: var(--primary-red);">Sekarang</span>
                                    </div>
                                    <div class="timeline-content">
                                        <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Komitmen Terus</h5>
                                        <p class="mb-0 text-muted">Tetap menjaga keaslian rasa dengan inovasi pelayanan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Philosophy -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="modern-card animate-fade-in" style="animation-delay: 0.3s; background: linear-gradient(135deg, rgba(180, 34, 34, 0.05), rgba(212, 161, 23, 0.05)); border: none;">
                        <div class="p-5 text-center">
                            <div class="mb-4">
                                <i class="fas fa-quote-left fa-3x" style="color: var(--primary-red); opacity: 0.1;"></i>
                            </div>
                            <h3 class="fw-bold mb-4" style="color: var(--dark-charcoal);">Filosofi Kami</h3>
                            <p class="lead text-muted" style="max-width: 800px; margin: 0 auto; line-height: 1.8;">
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
    <section class="section-padding" style="background: linear-gradient(135deg, rgba(255, 249, 240, 0.5), rgba(255, 245, 230, 0.5));">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Visi & Misi</h2>
                <p class="text-muted mt-3">Prinsip yang mendasari setiap keputusan kami</p>
                <div class="title-decoration">
                    <span></span>
                    <i class="fas fa-bullseye" style="color: var(--primary-red);"></i>
                    <span></span>
                </div>
            </div>
            
            <div class="row g-5">
                <!-- Vision -->
                <div class="col-lg-6">
                    <div class="modern-card h-100 animate-fade-in">
                        <div class="p-5">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                    </div>
                                    <h3 class="mb-0" style="color: var(--dark-charcoal);">Visi</h3>
                                </div>
                            </div>
                            <div class="vision-content">
                                <p class="mb-4 text-muted" style="line-height: 1.8; font-size: 1.1rem;">
                                    Menjadi restoran Indonesia terdepan yang diakui secara internasional, 
                                    dengan komitmen untuk melestarikan warisan kuliner Nusantara sambil 
                                    terus berinovasi.
                                </p>
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check me-3 mt-1" style="color: var(--primary-red);"></i>
                                        <span class="text-muted">Perwakilan kuliner Indonesia di kancah global</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-check me-3 mt-1" style="color: var(--primary-red);"></i>
                                        <span class="text-muted">Pusat inovasi kuliner Indonesia modern</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="fas fa-check me-3 mt-1" style="color: var(--primary-red);"></i>
                                        <span class="text-muted">Destinasi utama wisata kuliner Indonesia</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Mission -->
                <div class="col-lg-6">
                    <div class="modern-card h-100 animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="p-5">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-3">
                                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                                    border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                                            <i class="fas fa-bullseye"></i>
                                        </div>
                                    </div>
                                    <h3 class="mb-0" style="color: var(--dark-charcoal);">Misi</h3>
                                </div>
                            </div>
                            <div class="mission-content">
                                <div class="mission-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="mission-number me-3">
                                            <span class="fw-bold" style="color: var(--primary-red); font-size: 2rem;">01</span>
                                        </div>
                                        <div class="mission-text">
                                            <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Kualitas Terbaik</h5>
                                            <p class="mb-0 text-muted">Menggunakan bahan-bahan lokal terbaik dengan standar kualitas tertinggi</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mission-item mb-4">
                                    <div class="d-flex align-items-start">
                                        <div class="mission-number me-3">
                                            <span class="fw-bold" style="color: var(--primary-red); font-size: 2rem;">02</span>
                                        </div>
                                        <div class="mission-text">
                                            <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Pelestarian Budaya</h5>
                                            <p class="mb-0 text-muted">Menjaga dan mengembangkan resep tradisional Indonesia</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mission-item">
                                    <div class="d-flex align-items-start">
                                        <div class="mission-number me-3">
                                            <span class="fw-bold" style="color: var(--primary-red); font-size: 2rem;">03</span>
                                        </div>
                                        <div class="mission-text">
                                            <h5 class="fw-bold mb-2" style="color: var(--dark-charcoal);">Inovasi Berkelanjutan</h5>
                                            <p class="mb-0 text-muted">Terus berinovasi dalam penyajian dan pengalaman kuliner</p>
                                        </div>
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
            <div class="section-title animate-fade-in">
                <h2>Nilai-Nilai Kami</h2>
                <p class="text-muted mt-3">Prinsip yang mendasari setiap tindakan kami</p>
                <div class="title-decoration">
                    <span></span>
                    <i class="fas fa-heart" style="color: var(--primary-red);"></i>
                    <span></span>
                </div>
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
                
                @foreach($values as $index => $value)
                    <div class="col-lg-4 col-md-6">
                        <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="p-4 text-center">
                                <div class="mb-4">
                                    <div class="mx-auto" style="width: 80px; height: 80px; 
                                          background: linear-gradient(135deg, rgba(180, 34, 34, 0.1), rgba(212, 161, 23, 0.1)); 
                                          border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="{{ $value['icon'] }} fa-2x" style="color: {{ $value['color'] }};"></i>
                                    </div>
                                </div>
                                <h4 class="mb-3 fw-bold" style="color: var(--dark-charcoal);">{{ $value['title'] }}</h4>
                                <p class="text-muted mb-0" style="line-height: 1.6;">
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
    <section class="section-padding" style="background: linear-gradient(135deg, rgba(255, 249, 240, 0.5), rgba(255, 245, 230, 0.5));">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Tim Kami</h2>
                <p class="text-muted mt-3">Orang-orang yang menghidupkan JOSS GANDOS</p>
                <div class="title-decoration">
                    <span></span>
                    <i class="fas fa-users" style="color: var(--primary-red);"></i>
                    <span></span>
                </div>
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
                
                @foreach($team as $index => $member)
                    <div class="col-lg-3 col-md-6">
                        <div class="modern-card h-100 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="team-card">
                                <!-- Avatar -->
                                <div class="team-avatar">
                                    <div style="width: 100px; height: 100px; 
                                          background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                          border-radius: 50%; display: flex; align-items: center; justify-content: center; 
                                          color: white; font-size: 2rem; font-weight: 600; margin: -50px auto 20px; 
                                          box-shadow: 0 10px 25px rgba(180, 34, 34, 0.3);">
                                        {{ $member['initials'] }}
                                    </div>
                                </div>
                                
                                <div class="p-4 text-center">
                                    <h5 class="fw-bold mb-1">{{ $member['name'] }}</h5>
                                    <p class="text-muted mb-3">{{ $member['role'] }}</p>
                                    
                                    <!-- Quote -->
                                    <div class="team-quote mb-4">
                                        <p class="mb-0 text-muted" style="font-style: italic; font-size: 0.9rem;">
                                            "{{ $member['quote'] }}"
                                        </p>
                                    </div>
                                    
                                    <!-- Social Links -->
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="#" class="social-link">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="#" class="social-link">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                            <a href="#" class="social-link">
                                                <i class="fab fa-twitter"></i>
                                            </a>
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

    <!-- Stats -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="animate-fade-in">
                        <div class="fw-bold display-5 text-white mb-2" id="yearCount">0</div>
                        <p class="text-white-50 mb-0">Tahun Pengalaman</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="animate-fade-in" style="animation-delay: 0.1s;">
                        <div class="fw-bold display-5 text-white mb-2" id="customerCount">0</div>
                        <p class="text-white-50 mb-0">Pelanggan Setia</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="animate-fade-in" style="animation-delay: 0.2s;">
                        <div class="fw-bold display-5 text-white mb-2" id="menuCount">0</div>
                        <p class="text-white-50 mb-0">Menu Premium</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="animate-fade-in" style="animation-delay: 0.3s;">
                        <div class="fw-bold display-5 text-white mb-2" id="branchCount">0</div>
                        <p class="text-white-50 mb-0">Cabang</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    /* Timeline Styles */
    .timeline {
        position: relative;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary-red), var(--secondary-gold));
        border-radius: 2px;
    }
    
    .timeline-item {
        position: relative;
        padding-left: 60px;
    }
    
    .timeline-year {
        position: absolute;
        left: 0;
        top: 0;
        width: 40px;
    }
    
    .timeline-year span {
        display: inline-block;
        padding: 2px 12px;
        background: white;
        border: 2px solid var(--primary-red);
        border-radius: 20px;
        font-size: 0.9rem;
    }
    
    /* Mission Item Styles */
    .mission-number {
        min-width: 40px;
    }
    
    /* Team Card Styles */
    .team-card {
        transition: all 0.3s ease;
    }
    
    .team-card:hover {
        transform: translateY(-5px);
    }
    
    .team-quote {
        position: relative;
        padding: 15px;
        background: rgba(180, 34, 34, 0.05);
        border-radius: 10px;
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
    
    /* Stats Counter */
    .display-5 {
        font-size: 3rem;
        font-weight: 700;
    }
    
    @media (max-width: 768px) {
        .timeline::before {
            left: 15px;
        }
        
        .timeline-item {
            padding-left: 45px;
        }
        
        .timeline-year {
            width: 30px;
        }
        
        .display-5 {
            font-size: 2.5rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Animated counters
    document.addEventListener('DOMContentLoaded', function() {
        // Counter animation
        function animateCounter(elementId, start, end, duration) {
            let current = start;
            const increment = (end - start) / (duration / 16);
            const element = document.getElementById(elementId);
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= end) {
                    current = end;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 16);
        }
        
        // Start counters when in viewport
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Start counting
                    animateCounter('yearCount', 0, 8, 2000);
                    animateCounter('customerCount', 0, 50, 2000);
                    animateCounter('menuCount', 0, 50, 2000);
                    animateCounter('branchCount', 0, 5, 2000);
                    
                    // Unobserve after animation
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        // Observe stats section
        const statsSection = document.querySelector('section.py-5');
        if (statsSection) {
            observer.observe(statsSection);
        }
        
        // Team card hover effect
        document.querySelectorAll('.team-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                const avatar = this.querySelector('.team-avatar > div');
                if (avatar) {
                    avatar.style.transform = 'scale(1.05)';
                    avatar.style.transition = 'transform 0.3s ease';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                const avatar = this.querySelector('.team-avatar > div');
                if (avatar) {
                    avatar.style.transform = 'scale(1)';
                }
            });
        });
    });
</script>
@endsection