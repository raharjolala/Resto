<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JOSS GANDOS - Restoran Indonesia Modern')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Great+Vibes&family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-red: #B22222;
            --primary-dark: #8B0000;
            --secondary-gold: #D4A017;
            --accent-gold: #FFC145;
            --neutral-cream: #FFF9F0;
            --dark-charcoal: #2C2C2C;
            --warm-brown: #8B7355;
            --light-gray: #F8F9FA;
            --batik-red: #B22222;
            --batik-gold: #D4A017;
            --batik-cream: #FFF9F0;
            --wayang-shadow: rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--dark-charcoal);
            line-height: 1.7;
            background-color: var(--neutral-cream);
            overflow-x: hidden;
            position: relative;
        }
        
        /* Enhanced Indonesian Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 160, 23, 0.03) 1px, transparent 1px),
                radial-gradient(circle at 90% 80%, rgba(178, 34, 34, 0.03) 1px, transparent 1px),
                linear-gradient(45deg, transparent 48%, rgba(178, 34, 34, 0.02) 48%, rgba(178, 34, 34, 0.02) 52%, transparent 52%),
                linear-gradient(-45deg, transparent 48%, rgba(212, 160, 23, 0.02) 48%, rgba(212, 160, 23, 0.02) 52%, transparent 52%);
            background-size: 80px 80px, 80px 80px, 40px 40px, 40px 40px;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Elegant Navigation with Indonesian Style */
        .navbar {
            background: rgba(255, 249, 240, 0.98) !important;
            backdrop-filter: blur(15px);
            padding: 12px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
            border-bottom: 2px solid rgba(139, 0, 0, 0.1);
            box-shadow: 0 4px 20px rgba(139, 0, 0, 0.08);
        }
        
        .navbar.scrolled {
            padding: 8px 0;
            box-shadow: 0 8px 30px rgba(139, 0, 0, 0.12);
        }
        
        .navbar-brand {
            font-family: 'Dancing Script', cursive;
            font-weight: 700;
            font-size: 2.6rem;
            color: var(--primary-red) !important;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 45px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
            border-radius: 50%;
            z-index: -1;
            box-shadow: 0 4px 12px rgba(178, 34, 34, 0.3);
        }
        
        .navbar-brand::after {
            content: '✻';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 1.4rem;
        }
        
        .indonesian-badge {
            font-family: 'Poppins', sans-serif;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            color: var(--secondary-gold);
            margin-top: 2px;
            text-transform: uppercase;
            background: rgba(212, 161, 23, 0.1);
            padding: 2px 10px;
            border-radius: 12px;
            display: inline-block;
        }
        
        .nav-link {
            color: var(--dark-charcoal) !important;
            font-weight: 500;
            padding: 12px 22px !important;
            margin: 0 6px;
            position: relative;
            transition: all 0.3s ease;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::before,
        .nav-link.active::before {
            width: 70%;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-red) !important;
            background: linear-gradient(135deg, rgba(180, 34, 34, 0.08), rgba(212, 161, 23, 0.08));
            transform: translateY(-2px);
        }
        
        /* Hero Sections */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(rgba(44, 44, 44, 0.9), rgba(44, 44, 44, 0.95)), 
                        url('https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
            margin-top: 76px;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 2px solid rgba(255, 193, 69, 0.15);
            border-radius: 12px;
            pointer-events: none;
        }
        
        .hero-section::after {
            content: '';
            position: absolute;
            top: 40px;
            left: 40px;
            right: 40px;
            bottom: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            pointer-events: none;
        }
        
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.1;
            color: white;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            position: relative;
            padding-bottom: 20px;
        }
        
        .hero-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 120px;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
            border-radius: 3px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        
        .hero-title span {
            color: var(--accent-gold);
            position: relative;
            display: inline-block;
        }
        
        .hero-title span::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, transparent, var(--accent-gold), transparent);
            opacity: 0.3;
            z-index: -1;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 600px;
            font-weight: 300;
            letter-spacing: 0.3px;
            line-height: 1.8;
        }
        
        /* Section Design */
        .section-padding {
            padding: 100px 0;
            position: relative;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 70px;
            text-align: center;
        }
        
        .section-title h2 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--dark-charcoal);
            font-family: 'Playfair Display', serif;
            position: relative;
            display: inline-block;
            padding: 0 50px;
        }
        
        .section-title h2::before,
        .section-title h2::after {
            content: '❖';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-red);
            font-size: 1.8rem;
            opacity: 0.7;
        }
        
        .section-title h2::before {
            left: 0;
        }
        
        .section-title h2::after {
            right: 0;
        }
        
        /* Modern Cards */
        .modern-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(178, 34, 34, 0.3);
        }
        
        /* Traditional Decoration */
        .traditional-decoration {
            position: relative;
            padding: 15px 0;
        }
        
        .traditional-decoration::before,
        .traditional-decoration::after {
            content: '✦';
            position: absolute;
            top: 50%;
            color: var(--secondary-gold);
            font-size: 1.4rem;
            opacity: 0.6;
        }
        
        .traditional-decoration::before {
            left: 0;
            transform: translateY(-50%);
        }
        
        .traditional-decoration::after {
            right: 0;
            transform: translateY(-50%);
        }
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-charcoal), #1a1a1a);
            color: white;
            padding: 100px 0 40px;
            position: relative;
            overflow: hidden;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold), var(--accent-gold));
            box-shadow: 0 2px 10px rgba(212, 160, 23, 0.3);
        }
        
        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 12px;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-gold), transparent);
        }
        
        .footer-logo {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            color: white;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .footer-logo::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-gold);
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 193, 69, 0.1);
        }
        
        .social-icon:hover {
            background: var(--accent-gold);
            color: var(--dark-charcoal);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 193, 69, 0.2);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 30px;
            margin-top: 60px;
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
            position: relative;
        }
        
        .copyright::before {
            content: '✧';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--accent-gold);
            font-size: 2rem;
            background: var(--dark-charcoal);
            padding: 0 20px;
        }
        
        /* Animations */
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
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeInUp 0.8s ease forwards;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3.5rem;
            }
            
            .section-title h2 {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .section-padding {
                padding: 80px 0;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
                padding: 0 40px;
            }
            
            .navbar-brand {
                font-size: 2.2rem;
                padding-left: 40px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .navbar-brand {
                font-size: 1.8rem;
                padding-left: 35px;
            }
            
            .section-title h2 {
                font-size: 2rem;
                padding: 0 30px;
            }
            
            .section-title h2::before,
            .section-title h2::after {
                font-size: 1.2rem;
            }
            
            .nav-link {
                padding: 10px 15px !important;
                margin: 2px 0;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .footer-logo {
                font-size: 2rem;
            }
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--neutral-cream);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--accent-gold));
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Traditional Welcome Banner -->
    <div class="welcome-banner d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="traditional-decoration text-center">
                        <div class="d-inline-block px-4 py-2" style="background: rgba(255, 255, 255, 0.9); border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                            <span class="me-3" style="color: var(--primary-red); font-weight: 600;">
                                <i class="fas fa-star me-1"></i> Warisan Rasa Indonesia
                            </span>
                            <span class="me-3" style="color: var(--warm-brown);">|</span>
                            <span class="me-3" style="color: var(--primary-red);">
                                <i class="fas fa-utensils me-1"></i> Resep Otentik
                            </span>
                            <span class="me-3" style="color: var(--warm-brown);">|</span>
                            <span style="color: var(--primary-red);">
                                <i class="fas fa-heart me-1"></i> Disajikan dengan Cinta
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Elegant Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                JOSS GANDOS
                <div class="indonesian-badge ms-2">RESTORAN INDONESIA</div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="/menu">
                            <i class="fas fa-utensils me-2"></i>Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
                            <i class="fas fa-history me-2"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="/gallery">
                            <i class="fas fa-images me-2"></i>Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">
                            <i class="fas fa-phone me-2"></i>Kontak
                        </a>
                    </li>
                    <li class="nav-item ms-3">
                        <a href="/reservation" class="btn btn-primary">
                            <i class="fas fa-calendar-alt me-2"></i> Reservasi
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Elegant Footer -->
    <footer>
        <div class="container position-relative">
            <!-- Traditional Decoration -->
            <div class="text-center mb-5">
                <div class="d-inline-block px-5 py-3" style="background: rgba(255, 255, 255, 0.05); border-radius: 30px; border: 1px solid rgba(255, 193, 69, 0.1);">
                    <span style="color: var(--accent-gold); font-family: 'Great Vibes', cursive; font-size: 1.8rem; letter-spacing: 5px;">
                        ˚✧₊⁎ TERIMA KASIH ⁎⁺˳✧༚
                    </span>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <a href="/" class="d-block mb-4">
                        <div class="d-flex flex-column align-items-start">
                            <span class="footer-logo">JOSS GANDOS</span>
                            <small class="mb-3" style="color: rgba(212, 160, 23, 0.8); letter-spacing: 3px; font-size: 0.9rem;">
                                RESTORAN INDONESIA
                            </small>
                            <div class="mt-2" style="width: 60px; height: 3px; background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));"></div>
                        </div>
                    </a>
                    <p class="text-white-50 mb-4" style="font-size: 0.95rem; line-height: 1.7;">
                        <i class="fas fa-quote-left me-2" style="color: var(--accent-gold); opacity: 0.5;"></i>
                        Menjaga keaslian cita rasa Indonesia dengan sentuhan modern. 
                        Setiap hidangan adalah cerita tentang warisan kuliner Nusantara 
                        yang kami jaga dengan penuh kebanggaan dan cinta.
                        <i class="fas fa-quote-right ms-2" style="color: var(--accent-gold); opacity: 0.5;"></i>
                    </p>
                    <div class="social-icons d-flex gap-3">
                        <a href="#" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5">
                    <h5 class="footer-title">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="/" class="text-white-50 text-decoration-none d-flex align-items-center hover-gold">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>Beranda
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="/menu" class="text-white-50 text-decoration-none d-flex align-items-center hover-gold">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>Menu
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="/about" class="text-white-50 text-decoration-none d-flex align-items-center hover-gold">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>Tentang
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="/gallery" class="text-white-50 text-decoration-none d-flex align-items-center hover-gold">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>Gallery
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="/contact" class="text-white-50 text-decoration-none d-flex align-items-center hover-gold">
                                <i class="fas fa-chevron-right me-2" style="font-size: 0.8rem;"></i>Kontak
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="footer-title">Jam Operasional</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="far fa-clock me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Setiap Hari</p>
                                <p class="mb-0 text-white-50">10:00 - 22:00 WIB</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-concierge-bell me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Layanan Catering</p>
                                <p class="mb-0 text-white-50">08:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="footer-title">Kontak</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-start mb-3">
                            <i class="fas fa-map-marker-alt me-3 mt-1" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Alamat</p>
                                <p class="mb-0 text-white-50 small">JL Baye Kuliner No. 123<br>Jakarta, Indonesia 10110</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-phone me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Telepon</p>
                                <p class="mb-0 text-white-50 small">(021) 1234-5678</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Email</p>
                                <p class="mb-0 text-white-50 small">info@jossgandos.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <div class="text-center mb-3">
                    <div style="height: 1px; background: linear-gradient(90deg, transparent, rgba(255, 193, 69, 0.3), transparent);"></div>
                </div>
                <p class="mb-2">&copy; 2015 - {{ date('Y') }} JOSS GANDOS. Hak cipta dilindungi.</p>
                <p class="mt-2" style="font-size: 0.85rem; color: rgba(255, 255, 255, 0.4);">
                    <i class="fas fa-leaf me-1"></i> Cita rasa Indonesia, disajikan dengan modernitas dan tradisi.
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth navigation
        document.addEventListener('DOMContentLoaded', function() {
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
            
            // Add active class to current nav link
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
            
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
            
            // Animate elements on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('section, .animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
            
            // Traditional greeting in console
            console.log('%c✨ Selamat Datang di JOSS GANDOS ✨', 'background: linear-gradient(135deg, #B22222, #D4A017); color: white; padding: 10px 20px; border-radius: 5px; font-size: 14px; font-weight: bold;');
            console.log('%cRumah Rasa Indonesia dengan Sentuhan Modern', 'color: #8B7355; font-style: italic;');
        });
        
        // Traditional notification function
        function showTraditionalNotification(message, type = 'success') {
            const colors = {
                success: { bg: '#2a9d8f', icon: 'check' },
                error: { bg: '#e63946', icon: 'exclamation' },
                info: { bg: '#4361ee', icon: 'info' },
                warning: { bg: '#f8961e', icon: 'exclamation-triangle' }
            };
            
            const notification = document.createElement('div');
            notification.className = `alert position-fixed top-0 end-0 m-4 shadow`;
            notification.style.cssText = `
                z-index: 9999;
                border-radius: 15px;
                border: 2px solid var(--primary-red);
                background: white;
                animation: slideInRight 0.3s ease-out;
                max-width: 350px;
            `;
            
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold)); 
                                border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                            <i class="fas fa-${colors[type].icon}"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
                        <small style="color: var(--warm-brown);">JOSS GANDOS Restoran</small>
                    </div>
                    <button type="button" class="btn-close ms-3" onclick="this.parentElement.parentElement.remove()"></button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.style.opacity = '0';
                    notification.style.transform = 'translateX(100%)';
                    notification.style.transition = 'all 0.3s ease';
                    setTimeout(() => notification.remove(), 300);
                }
            }, 5000);
        }
    </script>
    
    @yield('scripts')
</body>
</html>