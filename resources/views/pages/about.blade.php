@extends('layouts.app')

@section('title', 'Tentang Kami - JOSS GANDOS')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section" style="height: 60vh; margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="hero-content">
                        <h1 class="hero-title">
                            Tentang<br>
                            <span>JOSS GANDOS</span>
                        </h1>
                        <p class="hero-subtitle">
                            Lebih dari sekadar restoran, sebuah cerita tentang cita rasa dan pelayanan terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="section-padding" data-animate>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="about-img">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid" alt="Joss Gandos Resto">
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <h2 class="mb-4">Sejarah Kami</h2>
                    <p class="lead mb-4">
                        JOSS GANDOS didirikan pada tahun 2015 dengan misi menghadirkan cita rasa kuliner Indonesia 
                        yang autentik dalam suasana yang modern dan nyaman.
                    </p>
                    <p class="mb-4">
                        Dimulai dari sebuah warung kecil di Jakarta, kini JOSS GANDOS telah berkembang menjadi 
                        restoran dengan beberapa cabang yang tersebar di berbagai kota.
                    </p>
                    
                    <div class="row mt-5">
                        <div class="col-md-6 mb-4">
                            <div class="text-center">
                                <div class="stat-icon text-primary mb-3">
                                    <i class="fas fa-history fa-3x"></i>
                                </div>
                                <h3 class="stat-number">8+ Tahun</h3>
                                <p class="fw-semibold">Pengalaman</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="text-center">
                                <div class="stat-icon text-primary mb-3">
                                    <i class="fas fa-store fa-3x"></i>
                                </div>
                                <h3 class="stat-number">{{ $branchCount }} Cabang</h3>
                                <p class="fw-semibold">Di Seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Vision & Mission -->
            <div class="row mt-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <h3 class="text-primary mb-4">Visi Kami</h3>
                            <p class="fs-5">
                                Menjadi restoran kuliner Indonesia terdepan yang dicintai masyarakat dengan 
                                cita rasa autentik dan pelayanan terbaik.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-5">
                            <h3 class="text-primary mb-4">Misi Kami</h3>
                            <ul class="feature-list">
                                <li>
                                    <i class="fas fa-check-circle text-success"></i>
                                    <span>Menghidangkan makanan berkualitas dengan harga terjangkau</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success"></i>
                                    <span>Memberikan pelayanan terbaik kepada pelanggan</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success"></i>
                                    <span>Melestarikan dan mengembangkan kuliner Indonesia</span>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle text-success"></i>
                                    <span>Menciptakan lingkungan kerja yang positif bagi karyawan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Values -->
            <div class="row mt-5">
                <div class="col-12">
                    <h2 class="text-center mb-5">Nilai-Nilai Kami</h2>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="stat-icon text-primary mb-3">
                                <i class="fas fa-heart fa-2x"></i>
                            </div>
                            <h4 class="mb-3">Kualitas</h4>
                            <p class="text-muted">Mengutamakan kualitas bahan baku dan proses pengolahan terbaik</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="stat-icon text-primary mb-3">
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>
                            <h4 class="mb-3">Kejujuran</h4>
                            <p class="text-muted">Berkomitmen pada kejujuran dalam setiap pelayanan dan transaksi</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body p-4">
                            <div class="stat-icon text-primary mb-3">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <h4 class="mb-3">Kolaborasi</h4>
                            <p class="text-muted">Bekerja sama untuk mencapai hasil terbaik bagi semua pihak</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection