<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JOSS GANDOS RESTO & CAFE')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-red: #C62828;
            --dark-red: #8B0000;
            --light-red: #EF5350;
            --gold-accent: #FFD700;
            --warm-yellow: #FFC107;
            --dark-brown: #5D4037;
            --light-beige: #FFECB3;
            --wood-brown: #8B4513;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: #5D4037;
            line-height: 1.6;
            overflow-x: hidden;
            background-color: #FFF5F5;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect width="100" height="100" fill="%23FFF5F5"/><path d="M0,50 L100,50 M50,0 L50,100" stroke="%23FFCDD2" stroke-width="0.5"/></svg>');
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: var(--dark-red);
        }
        
        /* Batik Pattern with Red Theme */
        .batik-pattern-red {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120"><rect width="120" height="120" fill="none"/><circle cx="30" cy="30" r="2" fill="%23C62828" fill-opacity="0.1"/><circle cx="90" cy="30" r="2" fill="%23C62828" fill-opacity="0.1"/><circle cx="30" cy="90" r="2" fill="%23C62828" fill-opacity="0.1"/><circle cx="90" cy="90" r="2" fill="%23C62828" fill-opacity="0.1"/><path d="M20,60 Q60,20 100,60 Q60,100 20,60 Z" fill="none" stroke="%23C62828" stroke-width="1" stroke-opacity="0.05"/></svg>');
            background-size: 120px;
        }
        
        /* Navigation - Red Indonesian Style */
        .navbar {
            background: linear-gradient(135deg, var(--primary-red), var(--dark-red)) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(198, 40, 40, 0.25);
            padding: 12px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-bottom: 3px solid var(--gold-accent);
        }
        
        .navbar.scrolled {
            padding: 8px 0;
            background: linear-gradient(135deg, rgba(198, 40, 40, 0.98), rgba(139, 0, 0, 0.98)) !important;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2rem;
            color: var(--gold-accent) !important;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.4);
        }
        
        .navbar-brand i {
            margin-right: 12px;
            color: var(--gold-accent);
            background: rgba(255, 215, 0, 0.2);
            padding: 8px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover i {
            background: rgba(255, 215, 0, 0.3);
            transform: rotate(15deg);
        }
        
        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 10px 20px !important;
            margin: 0 5px;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s ease;
        }
        
        .navbar-nav .nav-link:hover::before {
            left: 100%;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--gold-accent) !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .navbar-nav .nav-link.active {
            color: var(--gold-accent) !important;
            background: rgba(255, 215, 0, 0.25);
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(255, 215, 0, 0.3);
        }
        
        .navbar-toggler {
            border: 2px solid rgba(255, 215, 0, 0.3);
            padding: 8px;
        }
        
        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.25);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 215, 0, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Hero Section - Red Theme */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(rgba(198, 40, 40, 0.85), rgba(139, 0, 0, 0.9)), 
                        url('https://images.unsplash.com/photo-1551503759-5c7ecd1520c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"><path d="M100,50 Q150,100 100,150 Q50,100 100,50 Z" fill="none" stroke="%23FFD700" stroke-width="1" stroke-opacity="0.1"/></svg>');
            background-size: 200px;
            opacity: 0.3;
            animation: floatPattern 20s linear infinite;
        }
        
        @keyframes floatPattern {
            0% { transform: translateY(0); }
            100% { transform: translateY(200px); }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }
        
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            color: var(--gold-accent);
        }
        
        .hero-title span {
            color: white;
            display: block;
            font-size: 2.8rem;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 30px;
            opacity: 0.95;
            max-width: 600px;
            font-weight: 300;
            letter-spacing: 0.5px;
        }
        
        /* Buttons - Red Theme */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
            border: none;
            padding: 14px 40px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(198, 40, 40, 0.3);
            color: white;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 25px rgba(198, 40, 40, 0.4);
            background: linear-gradient(135deg, var(--dark-red), var(--primary-red));
            color: white;
        }
        
        .btn-outline-primary {
            border: 2px solid var(--gold-accent);
            color: var(--gold-accent);
            padding: 14px 40px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 1px;
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: rgba(255, 215, 0, 0.1);
            border-color: white;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 215, 0, 0.2);
        }
        
        /* Section Styling */
        .section-padding {
            padding: 100px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 60px;
            text-align: center;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            color: var(--dark-red);
            padding-bottom: 15px;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--gold-accent));
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .section-title p {
            color: #8B7355;
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
        }
        
        /* Indonesian Card Design with Red Theme */
        .indo-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            box-shadow: 0 10px 30px rgba(198, 40, 40, 0.1);
            border: 1px solid #FFCDD2;
            position: relative;
        }
        
        .indo-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-red), var(--gold-accent));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .indo-card:hover::before {
            opacity: 1;
        }
        
        .indo-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(198, 40, 40, 0.15);
            border-color: var(--primary-red);
        }
        
        /* Menu Cards */
        .menu-card {
            background: linear-gradient(135deg, #FFF5F5, #FFECB3);
            border: 2px solid var(--primary-red);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(198, 40, 40, 0.15);
        }
        
        .menu-img {
            height: 220px;
            width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .menu-card:hover .menu-img {
            transform: scale(1.05);
        }
        
        .menu-content {
            padding: 25px;
        }
        
        .menu-title {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: var(--dark-red);
            font-family: 'Merriweather', serif;
        }
        
        .menu-description {
            color: #8B7355;
            font-size: 0.95rem;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .menu-price {
            color: var(--primary-red);
            font-weight: 700;
            font-size: 1.3rem;
            display: inline-block;
            padding: 5px 15px;
            background: rgba(198, 40, 40, 0.1);
            border-radius: 20px;
        }
        
        .featured-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
            color: white;
            padding: 6px 20px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(198, 40, 40, 0.3);
        }
        
        /* Promo Section */
        .promo-section {
            background: linear-gradient(135deg, var(--primary-red) 0%, var(--dark-red) 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .promo-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120"><circle cx="60" cy="60" r="40" fill="none" stroke="%23FFD700" stroke-width="1" stroke-opacity="0.1"/><path d="M30,30 L90,90 M90,30 L30,90" stroke="%23FFD700" stroke-width="1" stroke-opacity="0.1"/></svg>');
            background-size: 120px;
            opacity: 0.3;
        }
        
        .promo-content {
            position: relative;
            z-index: 2;
        }
        
        .promo-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 3px solid var(--gold-accent);
        }
        
        .stat-box {
            text-align: center;
            padding: 25px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .stat-box:hover {
            transform: translateY(-5px);
            background: white;
            box-shadow: 0 10px 25px rgba(198, 40, 40, 0.15);
        }
        
        .stat-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: var(--primary-red);
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-red);
        }
        
        /* Footer - Red Theme */
        footer {
            background: linear-gradient(135deg, var(--dark-red), #5D4037);
            color: white;
            padding: 80px 0 20px;
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
            background: linear-gradient(90deg, var(--primary-red), var(--gold-accent));
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--gold-accent);
            margin-bottom: 20px;
            display: block;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-logo:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .footer-about {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 25px;
            line-height: 1.8;
        }
        
        .footer-title {
            font-size: 1.3rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
            color: var(--gold-accent);
            font-family: 'Merriweather', serif;
        }
        
        .footer-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-red);
            border-radius: 2px;
        }
        
        .footer-links {
            list-style: none;
            padding-left: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 15px;
        }
        
        .footer-links li::before {
            content: '▶';
            position: absolute;
            left: 0;
            color: var(--gold-accent);
            font-size: 0.8rem;
            opacity: 0.7;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 3px 0;
        }
        
        .footer-links a:hover {
            color: var(--gold-accent);
            padding-left: 8px;
            transform: translateX(5px);
        }
        
        .contact-info {
            color: rgba(255, 255, 255, 0.8);
        }
        
        .contact-info p {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }
        
        .contact-info i {
            color: var(--gold-accent);
            margin-right: 12px;
            width: 20px;
            margin-top: 3px;
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 25px;
            margin-top: 50px;
            text-align: center;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        
        /* Social Icons */
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: var(--primary-red);
            transform: translateY(-3px) rotate(5deg);
            color: var(--gold-accent);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-title span {
                font-size: 2rem;
            }
            
            .section-padding {
                padding: 60px 0;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .navbar-nav {
                background: rgba(198, 40, 40, 0.95);
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                margin-top: 10px;
                backdrop-filter: blur(10px);
            }
            
            .btn-primary, .btn-outline-primary {
                padding: 12px 30px;
                font-size: 0.9rem;
            }
        }
        
        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        
        .slide-up {
            animation: slideUp 0.6s ease forwards;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Floating Animation */
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Logo Styling */
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--gold-accent);
            text-transform: uppercase;
            line-height: 1;
        }
        
        .logo-subtitle {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 300;
            letter-spacing: 2px;
            margin-top: 2px;
        }
    </style>
    
    @yield('styles')
</head>
<body class="batik-pattern-red">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="logo-text">
                    <div style="font-size: 2.2rem; line-height: 0.9;">JOSS</div>
                    <div style="font-size: 1.8rem; line-height: 0.9;">GANDOS</div>
                    <div class="logo-subtitle">RESTO & CAFE</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="/menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="/gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Kontak</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a href="/reservation" class="btn btn-primary">
                        <i class="fas fa-calendar-check me-2"></i> Pesan Meja
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <a href="/" class="footer-logo">
                        <div class="logo-text">
                            <div style="font-size: 2rem; line-height: 0.9;">JOSS</div>
                            <div style="font-size: 1.6rem; line-height: 0.9;">GANDOS</div>
                            <div class="logo-subtitle" style="color: rgba(255,255,255,0.8);">RESTO & CAFE</div>
                        </div>
                    </a>
                    <p class="footer-about">
                        Sejak 2015, JOSS GANDOS telah menghadirkan cita rasa autentik Indonesia dengan suasana yang hangat dan ramah. Nikmati keaslian kuliner Nusantara di tengah kenyamanan modern.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4 class="footer-title">Menu Cepat</h4>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/menu">Menu Restoran</a></li>
                        <li><a href="/about">Sejarah Kami</a></li>
                        <li><a href="/gallery">Galeri Foto</a></li>
                        <li><a href="/reservation">Reservasi Online</a></li>
                        <li><a href="/contact">Hubungi Kami</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="footer-title">Jam Buka</h4>
                    <div class="contact-info">
                        <p><i class="far fa-clock"></i> <strong>Setiap Hari</strong><br>10:00 - 22:00 WIB</p>
                        <p><i class="fas fa-concierge-bell"></i> <strong>Layanan Catering</strong><br>08:00 - 20:00 WIB</p>
                        <p><i class="fas fa-calendar-star"></i> <strong>Weekend & Holiday</strong><br>09:00 - 23:00 WIB</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="footer-title">Hubungi Kami</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> JL Baye Kuliner No. 123<br>Jakarta, Indonesia 10110</p>
                        <p><i class="fas fa-phone"></i> (021) 1234-5678</p>
                        <p><i class="fab fa-whatsapp"></i> 0812-3456-7890</p>
                        <p><i class="fas fa-envelope"></i> info@jossgandos.com</p>
                        <p><i class="fas fa-globe"></i> www.jossresto.com</p>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2015 - {{ date('Y') }} JOSS GANDOS RESTO & CAFE. All rights reserved. | Since 2015</p>
                <p class="mt-2" style="font-size: 0.85rem; opacity: 0.7;">Melayani dengan cinta dan cita rasa Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Add fade-in animation to sections
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);
        
        // Observe all sections
        document.querySelectorAll('section').forEach(el => {
            observer.observe(el);
        });
        
        // Add active class to current page in navigation
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
        
        // Floating animation for promo cards
        document.querySelectorAll('.floating').forEach(el => {
            el.style.animationDelay = Math.random() * 2 + 's';
        });
    </script>
    
    @yield('scripts')
</body>
</html>