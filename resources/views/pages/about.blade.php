@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="resto-hero-section" style="height: 70vh; margin-top: 76px; background: linear-gradient(rgba(42, 42, 42, 0.85), rgba(42, 42, 42, 0.9)), url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-8">
                    <div class="hero-content text-white">
                        <h1 class="display-3 fw-bold mb-3" style="font-family: 'Playfair Display', serif;">
                            Tentang<br>
                            <span class="text-warning">JOSS GANDOS</span>
                        </h1>
                        <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.9;">
                            Lebih dari sekadar restoran, sebuah cerita tentang cita rasa dan pelayanan terbaik.
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-history me-1"></i> 8+ Tahun Pengalaman
                            </span>
                            <span class="badge bg-light text-dark px-3 py-2 rounded-pill">
                                <i class="fas fa-store me-1"></i> {{ $branchCount ?? 3 }}+ Cabang
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="resto-section-padding" style="padding: 5rem 0;">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-img position-relative" style="border-radius: 20px; overflow: hidden; box-shadow: 0 25px 50px rgba(0,0,0,0.1);">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid" alt="Joss Gandos Resto" style="transition: transform 0.5s ease;">
                        <div class="position-absolute top-0 start-0 p-4">
                            <span class="badge px-3 py-2" style="background: linear-gradient(135deg, #d4a574, #b38b5d); color: white; border-radius: 10px;">
                                <i class="fas fa-award me-2"></i> Since 2015
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="mb-4 fw-bold" style="color: #2a2a2a; font-size: 2.2rem;">Sejarah Kami</h2>
                    <p class="lead mb-4" style="font-size: 1.1rem; color: #555; line-height: 1.8;">
                        JOSS GANDOS didirikan pada tahun 2015 dengan misi menghadirkan cita rasa kuliner Indonesia 
                        yang autentik dalam suasana yang modern dan nyaman.
                    </p>
                    <p class="mb-4" style="color: #666; line-height: 1.8;">
                        Dimulai dari sebuah warung kecil di Jakarta, kini JOSS GANDOS telah berkembang menjadi 
                        restoran dengan beberapa cabang yang tersebar di berbagai kota.
                    </p>
                    
                    <div class="row mt-5">
                        <div class="col-md-6 mb-4">
                            <div class="text-center p-4" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-radius: 15px;">
                                <div class="stat-icon mb-3" style="color: #d4a574; font-size: 2.5rem;">
                                    <i class="fas fa-history"></i>
                                </div>
                                <h3 class="stat-number fw-bold mb-2" style="color: #2a2a2a; font-size: 2.2rem;">8+ Tahun</h3>
                                <p class="fw-semibold mb-0" style="color: #666;">Pengalaman</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="text-center p-4" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05)); border-radius: 15px;">
                                <div class="stat-icon mb-3" style="color: #d4a574; font-size: 2.5rem;">
                                    <i class="fas fa-store"></i>
                                </div>
                                <h3 class="stat-number fw-bold mb-2" style="color: #2a2a2a; font-size: 2.2rem;">{{ $branchCount ?? 3 }}+ Cabang</h3>
                                <p class="fw-semibold mb-0" style="color: #666;">Di Seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission -->
            <div class="row mt-5 g-4">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="card border-0 shadow-lg h-100" style="border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #2a2a2a, #1a1a1a); color: white;">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3" style="color: #d4a574; font-size: 2rem;">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="mb-0" style="color: white;">Visi Kami</h3>
                            </div>
                            <p class="fs-5 mb-0" style="opacity: 0.9; line-height: 1.8;">
                                Menjadi restoran kuliner Indonesia terdepan yang dicintai masyarakat dengan 
                                cita rasa autentik dan pelayanan terbaik.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-5">
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3" style="color: #d4a574; font-size: 2rem;">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h3 class="mb-0" style="color: #2a2a2a;">Misi Kami</h3>
                            </div>
                            <ul class="feature-list list-unstyled">
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: #2a9d8f;"></i>
                                    <span style="color: #555;">Menghidangkan makanan berkualitas dengan harga terjangkau</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: #2a9d8f;"></i>
                                    <span style="color: #555;">Memberikan pelayanan terbaik kepada pelanggan</span>
                                </li>
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: #2a9d8f;"></i>
                                    <span style="color: #555;">Melestarikan dan mengembangkan kuliner Indonesia</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="fas fa-check-circle me-3 mt-1" style="color: #2a9d8f;"></i>
                                    <span style="color: #555;">Menciptakan lingkungan kerja yang positif bagi karyawan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Values -->
            <div class="row mt-5">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold mb-3" style="color: #2a2a2a; font-size: 2.2rem;">Nilai-Nilai Kami</h2>
                    <p class="text-muted" style="font-size: 1.1rem;">Prinsip yang kami pegang teguh dalam setiap pelayanan</p>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg text-center h-100" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-5">
                            <div class="stat-icon mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.2)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="fas fa-heart fa-2x" style="color: #d4a574;"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: #2a2a2a;">Kualitas</h4>
                            <p class="text-muted mb-0">Mengutamakan kualitas bahan baku dan proses pengolahan terbaik</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg text-center h-100" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-5">
                            <div class="stat-icon mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.2)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="fas fa-handshake fa-2x" style="color: #d4a574;"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: #2a2a2a;">Kejujuran</h4>
                            <p class="text-muted mb-0">Berkomitmen pada kejujuran dalam setiap pelayanan dan transaksi</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-lg text-center h-100" style="border-radius: 20px; transition: all 0.3s ease;">
                        <div class="card-body p-5">
                            <div class="stat-icon mb-4" style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.2)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                <i class="fas fa-users fa-2x" style="color: #d4a574;"></i>
                            </div>
                            <h4 class="mb-3 fw-bold" style="color: #2a2a2a;">Kolaborasi</h4>
                            <p class="text-muted mb-0">Bekerja sama untuk mencapai hasil terbaik bagi semua pihak</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5" style="background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05));">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="fw-bold mb-3" style="color: #2a2a2a; font-size: 2.2rem;">Tim Kami</h2>
                    <p class="text-muted" style="font-size: 1.1rem;">Orang-orang di balik kesuksesan JOSS GANDOS</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="text-center">
                        <div class="mx-auto mb-3" style="width: 150px; height: 150px; border-radius: 50%; background: linear-gradient(135deg, #d4a574, #b38b5d); display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                            <i class="fas fa-user-chef"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Chef Andi</h5>
                        <p class="text-muted">Head Chef</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="text-center">
                        <div class="mx-auto mb-3" style="width: 150px; height: 150px; border-radius: 50%; background: linear-gradient(135deg, #2a9d8f, #21867a); display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Budi</h5>
                        <p class="text-muted">Restaurant Manager</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="text-center">
                        <div class="mx-auto mb-3" style="width: 150px; height: 150px; border-radius: 50%; background: linear-gradient(135deg, #4361ee, #3a0ca3); display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white;">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Sari</h5>
                        <p class="text-muted">Customer Service</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
<style>
    .resto-hero-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(to bottom, transparent, #f8f5f2);
        z-index: 1;
    }
    
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important;
    }
    
    .about-img:hover img {
        transform: scale(1.05);
    }
    
    .feature-list li {
        transition: transform 0.2s ease;
    }
    
    .feature-list li:hover {
        transform: translateX(10px);
    }
    
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
    
    .card {
        animation: fadeInUp 0.6s ease-out;
    }
    
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.4s; }
</style>
@endsection