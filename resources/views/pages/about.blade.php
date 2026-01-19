@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content animate-fade-in">
                        <h1 class="hero-title">
                            Cerita Kami<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Lebih dari sekadar restoran, ini adalah perjalanan cinta terhadap kuliner Indonesia 
                            yang diwariskan dari generasi ke generasi.
                        </p>
                        <div class="d-flex align-items-center gap-3 mt-4">
                            <span class="badge px-3 py-2" style="background: rgba(212, 161, 23, 0.2); color: var(--accent-gold); border-radius: 20px;">
                                <i class="fas fa-history me-1"></i> Sejak 2015
                            </span>
                            <span class="badge px-3 py-2" style="background: rgba(255, 255, 255, 0.2); color: white; border-radius: 20px;">
                                <i class="fas fa-store me-1"></i> 5+ Cabang
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="section-padding">
        <div class="container">
            <!-- Our Story -->
            <div class="row align-items-center mb-5 animate-fade-in">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded-4 shadow-lg" alt="Interior JOSS GANDOS">
                        <div class="position-absolute top-0 start-0 m-4">
                            <span class="badge px-3 py-2" style="background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); color: white; border-radius: 10px;">
                                <i class="fas fa-award me-2"></i> Since 2015
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="fw-bold mb-4" style="color: var(--dark-charcoal); font-size: 2.2rem;">Cerita Kami</h2>
                    <p class="mb-4" style="color: var(--warm-brown); line-height: 1.8; font-size: 1.1rem;">
                        JOSS GANDOS dimulai pada tahun 2015 dengan sebuah warung kecil di Jakarta. 
                        Didirikan oleh Chef Andi, yang membawa resep keluarga turun-temurun, 
                        kami tumbuh dengan satu misi: menghidangkan cita rasa Indonesia yang autentik.
                    </p>
                    <p class="mb-4" style="color: var(--warm-brown); line-height: 1.8; font-size: 1.1rem;">
                        Dari warung sederhana, kini kami telah berkembang menjadi restoran dengan 
                        beberapa cabang di kota besar. Namun, filosofi kami tetap sama: 
                        <strong style="color: var(--primary-red);">keaslian rasa, kualitas bahan, dan pelayanan terbaik.</strong>
                    </p>
                    
                    <!-- Stats -->
                    <div class="row mt-5">
                        <div class="col-md-6 mb-4">
                            <div class="modern-card h-100">
                                <div class="text-center p-4">
                                    <div class="mb-3">
                                        <i class="fas fa-history fa-3x" style="color: var(--primary-red);"></i>
                                    </div>
                                    <h3 class="fw-bold mb-2" style="color: var(--dark-charcoal); font-size: 2.2rem;">8+ Tahun</h3>
                                    <p class="fw-semibold mb-0" style="color: var(--warm-brown);">Pengalaman</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="modern-card h-100">
                                <div class="text-center p-4">
                                    <div class="mb-3">
                                        <i class="fas fa-store fa-3x" style="color: var(--primary-red);"></i>
                                    </div>
                                    <h3 class="fw-bold mb-2" style="color: var(--dark-charcoal); font-size: 2.2rem;">5+ Cabang</h3>
                                    <p class="fw-semibold mb-0" style="color: var(--warm-brown);">Di Seluruh Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission -->
            <div class="row mt-5 g-4 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="modern-card h-100" style="background: linear-gradient(135deg, var(--dark-charcoal), #1a1a1a); color: white;">
                        <div class="p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3" style="color: var(--accent-gold); font-size: 2rem;">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="mb-0" style="color: white;">Visi Kami</h3>
                            </div>
                            <p class="fs-5 mb-0" style="opacity: 0.9; line-height: 1.8;">
                                Menjadi restoran kuliner Indonesia terdepan yang dikenal secara global 
                                dengan cita rasa autentik, inovasi modern, dan komitmen terhadap keberlanjutan.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="modern-card h-100">
                        <div class="p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3" style="color: var(--primary-red); font-size: 2rem;">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h3 class="mb-0" style="color: var(--dark-charcoal);">Misi Kami</h3>
                            </div>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: var(--primary-red);"></i>
                                    <span style="color: var(--warm-brown);">Menghidangkan makanan berkualitas dengan bahan lokal terbaik</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: var(--primary-red);"></i>
                                    <span style="color: var(--warm-brown);">Melestarikan dan mengembangkan kuliner Indonesia tradisional</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: var(--primary-red);"></i>
                                    <span style="color: var(--warm-brown);">Memberikan pengalaman kuliner yang tak terlupakan</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: var(--primary-red);"></i>
                                    <span style="color: var(--warm-brown);">Mendukung petani dan produsen lokal Indonesia</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Values -->
            <div class="row mt-5 animate-fade-in" style="animation-delay: 0.3s;">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold mb-3" style="color: var(--dark-charcoal); font-size: 2.2rem;">Nilai-Nilai Kami</h2>
                    <p class="text-muted" style="font-size: 1.1rem;">Prinsip yang mendasari setiap tindakan kami</p>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="modern-card text-center h-100">
                        <div class="p-5">
                            <div class="mx-auto mb-4" style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-heart fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: var(--dark-charcoal);">Passion</h4>
                            <p class="text-muted mb-0">Cinta terhadap kuliner Indonesia dalam setiap hidangan</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="modern-card text-center h-100">
                        <div class="p-5">
                            <div class="mx-auto mb-4" style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-handshake fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: var(--dark-charcoal);">Integrity</h4>
                            <p class="text-muted mb-0">Kejujuran dalam setiap bahan dan pelayanan</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="modern-card text-center h-100">
                        <div class="p-5">
                            <div class="mx-auto mb-4" style="width: 80px; height: 80px; background: rgba(180, 34, 34, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-users fa-2x" style="color: var(--primary-red);"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: var(--dark-charcoal);">Community</h4>
                            <p class="text-muted mb-0">Bagian dari komunitas yang saling mendukung</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section-padding" style="background: var(--light-gray);">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Tim Kami</h2>
                <p>Orang-orang di balik kelezatan JOSS GANDOS</p>
            </div>
            
            <div class="row justify-content-center g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="modern-card text-center h-100">
                        <div class="p-4">
                            <div class="mx-auto mb-3" style="width: 150px; height: 150px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                                <i class="fas fa-user-chef"></i>
                            </div>
                            <h5 class="fw-bold mb-1">Chef Andi</h5>
                            <p class="text-muted mb-3">Founder & Head Chef</p>
                            <p class="small" style="color: var(--warm-brown);">
                                "Setiap hidangan adalah cerita tentang Indonesia yang ingin kami sampaikan kepada dunia."
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="modern-card text-center h-100">
                        <div class="p-4">
                            <div class="mx-auto mb-3" style="width: 150px; height: 150px; background: linear-gradient(135deg, #2a9d8f, #21867a); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <h5 class="fw-bold mb-1">Budi Santoso</h5>
                            <p class="text-muted mb-3">Restaurant Manager</p>
                            <p class="small" style="color: var(--warm-brown);">
                                "Mengutamakan pengalaman pelanggan dan kualitas pelayanan di setiap aspek."
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="modern-card text-center h-100">
                        <div class="p-4">
                            <div class="mx-auto mb-3" style="width: 150px; height: 150px; background: linear-gradient(135deg, #4361ee, #3a0ca3); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <h5 class="fw-bold mb-1">Sari Dewi</h5>
                            <p class="text-muted mb-3">Customer Service Head</p>
                            <p class="small" style="color: var(--warm-brown);">
                                "Setiap senyum pelanggan adalah motivasi kami untuk terus memberikan yang terbaik."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="text-white mb-3">Ingin tahu lebih banyak tentang kami?</h3>
                    <p class="text-white opacity-90 mb-0">Kunjungi restoran kami atau hubungi tim kami untuk informasi lebih lanjut</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="/contact" class="btn btn-light btn-lg px-5">
                        <i class="fas fa-phone-alt me-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection