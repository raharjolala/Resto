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
    
    <!-- Google Fonts - More modern selection -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-red: #B22222; /* Slightly softer red */
            --primary-dark: #8B0000;
            --secondary-gold: #D4A017;
            --accent-gold: #FFC145;
            --neutral-cream: #FFF9F0;
            --dark-charcoal: #2C2C2C;
            --warm-brown: #8B7355;
            --light-gray: #F8F9FA;
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
        }
        
        /* Modern Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            padding: 20px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(180, 34, 34, 0.1);
        }
        
        .navbar.scrolled {
            padding: 15px 0;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--primary-red) !important;
            display: flex;
            align-items: center;
            position: relative;
            padding-left: 50px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            content: '\F2E7'; /* Utensils icon */
            font-size: 1.2rem;
        }
        
        .navbar-nav .nav-link {
            color: var(--dark-charcoal) !important;
            font-weight: 500;
            padding: 10px 20px !important;
            margin: 0 5px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            transition: width 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 80%;
        }
        
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--primary-red) !important;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
            border: none;
            padding: 14px 35px;
            font-weight: 600;
            border-radius: 30px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(180, 34, 34, 0.25);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(180, 34, 34, 0.35);
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-red));
        }
        
        /* Modern Hero Sections */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(rgba(44, 44, 44, 0.7), rgba(44, 44, 44, 0.8)), 
                        url('https://images.unsplash.com/photo-1578474846511-04ba529f0b88?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
            margin-top: 80px;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }
        
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 25px;
            line-height: 1.1;
            color: white;
        }
        
        .hero-title span {
            color: var(--accent-gold);
            display: inline-block;
            position: relative;
        }
        
        .hero-title span::after {
            content: '';
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 8px;
            background: rgba(212, 161, 23, 0.3);
            z-index: -1;
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 600px;
            font-weight: 300;
            letter-spacing: 0.5px;
        }
        
        /* Modern Section Styling */
        .section-padding {
            padding: 100px 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 60px;
            text-align: center;
        }
        
        .section-title h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
            color: var(--dark-charcoal);
            font-family: 'Playfair Display', serif;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        .section-title p {
            color: var(--warm-brown);
            max-width: 700px;
            margin: 30px auto 0;
            font-size: 1.1rem;
            line-height: 1.8;
        }
        
        /* Modern Cards */
        .modern-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
        }
        
        .modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .modern-card:hover::before {
            opacity: 1;
        }
        
        .modern-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.12);
        }
        
        /* Modern Footer */
        footer {
            background: var(--dark-charcoal);
            color: white;
            padding: 80px 0 30px;
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
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
        }
        
        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            display: block;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-about {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 25px;
            line-height: 1.8;
            font-size: 0.95rem;
        }
        
        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
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
            height: 2px;
            background: var(--accent-gold);
        }
        
        .footer-links {
            list-style: none;
            padding-left: 0;
        }
        
        .footer-links li {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 5px 0;
            position: relative;
            padding-left: 20px;
        }
        
        .footer-links a::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--accent-gold);
            opacity: 0;
            transform: translateX(-10px);
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 30px;
        }
        
        .footer-links a:hover::before {
            opacity: 1;
            transform: translateX(0);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
            margin-top: 60px;
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
        }
        
        /* Social Icons */
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }
        
        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .social-icon:hover {
            background: var(--primary-red);
            transform: translateY(-5px) rotate(8deg);
            color: white;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .section-padding {
                padding: 70px 0;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
            
            .navbar-nav {
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                margin-top: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-section {
                min-height: 80vh;
                background-attachment: scroll;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }
        
        .animate-fade-in {
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                JOSS GANDOS
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
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery') ? 'active' : '' }}" href="/gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">Kontak</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="/reservation" class="btn btn-primary">
                            <i class="fas fa-calendar-alt me-2"></i> Pesan Meja
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

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <a href="/" class="footer-logo">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <span class="fw-bold">JOSS GANDOS</span>
                                <small style="color: rgba(255,255,255,0.5);">RESTORAN INDONESIA</small>
                            </div>
                        </div>
                    </a>
                    <p class="footer-about">
                        Menghadirkan cita rasa autentik Indonesia dengan sentuhan modern. Setiap hidangan dibuat dengan bahan terbaik dan disajikan dengan penuh kasih.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4 class="footer-title">Navigasi</h4>
                    <ul class="footer-links">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/menu">Menu Lengkap</a></li>
                        <li><a href="/about">Tentang Kami</a></li>
                        <li><a href="/gallery">Galeri</a></li>
                        <li><a href="/reservation">Reservasi</a></li>
                        <li><a href="/contact">Kontak</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="footer-title">Jam Operasional</h4>
                    <div class="contact-info">
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 15px;">
                            <i class="far fa-clock me-2" style="color: var(--accent-gold);"></i> 
                            <strong>Setiap Hari</strong><br>
                            10:00 - 22:00 WIB
                        </p>
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 15px;">
                            <i class="fas fa-concierge-bell me-2" style="color: var(--accent-gold);"></i> 
                            <strong>Layanan Catering</strong><br>
                            08:00 - 20:00 WIB
                        </p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="footer-title">Kontak</h4>
                    <div class="contact-info">
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 15px;">
                            <i class="fas fa-map-marker-alt me-2" style="color: var(--accent-gold);"></i> 
                            JL Baye Kuliner No. 123<br>
                            Jakarta, Indonesia 10110
                        </p>
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 15px;">
                            <i class="fas fa-phone me-2" style="color: var(--accent-gold);"></i> 
                            (021) 1234-5678
                        </p>
                        <p style="color: rgba(255,255,255,0.8); margin-bottom: 15px;">
                            <i class="fas fa-envelope me-2" style="color: var(--accent-gold);"></i> 
                            info@jossgandos.com
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2015 - {{ date('Y') }} JOSS GANDOS. Hak cipta dilindungi.</p>
                <p class="mt-2" style="font-size: 0.85rem;">Cita rasa Indonesia, disajikan dengan modernitas.</p>
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
        
        // Smooth scroll and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to elements on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, observerOptions);
            
            // Observe sections
            document.querySelectorAll('section').forEach(el => {
                observer.observe(el);
            });
            
            // Add active class to current nav link
            const currentPath = window.location.pathname;
            document.querySelectorAll('.nav-link').forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>