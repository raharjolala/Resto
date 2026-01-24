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
    
    @stack('styles')
    
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
        
        /* Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 160, 23, 0.02) 1px, transparent 1px),
                radial-gradient(circle at 90% 80%, rgba(178, 34, 34, 0.02) 1px, transparent 1px);
            background-size: 120px 120px, 120px 120px;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Navigation */
        .navbar {
            background: rgba(255, 249, 240, 0.98) !important;
            backdrop-filter: blur(15px);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(139, 0, 0, 0.1);
            box-shadow: 0 4px 20px rgba(139, 0, 0, 0.05);
        }
        
        .navbar.scrolled {
            padding: 0.75rem 0;
            box-shadow: 0 8px 30px rgba(139, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-family: 'Dancing Script', cursive;
            font-weight: 700;
            font-size: 2.4rem;
            color: var(--primary-red) !important;
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .brand-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .brand-name {
            font-family: 'Dancing Script', cursive;
            font-size: 2.4rem;
            color: var(--primary-red);
            line-height: 1;
        }
        
        .brand-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 2px;
            color: var(--secondary-gold);
            text-transform: uppercase;
            margin-top: 2px;
        }
        
        .nav-link {
            color: var(--dark-charcoal) !important;
            font-weight: 500;
            padding: 0.75rem 1.5rem !important;
            margin: 0 0.25rem;
            position: relative;
            transition: all 0.3s ease;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0.5rem;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            border-radius: 2px;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::before,
        .nav-link.active::before {
            width: 60%;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-red) !important;
            background: rgba(178, 34, 34, 0.05);
        }
        
        /* Main Content */
        main {
            margin-top: 80px;
        }
        
        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(rgba(44, 44, 44, 0.85), rgba(44, 44, 44, 0.9)), 
                        url('https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
            color: white;
            padding: 4rem 0;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }
        
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: white;
        }
        
        .hero-title .highlight {
            color: var(--accent-gold);
            position: relative;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            line-height: 1.8;
        }
        
        /* Section Design */
        .section-padding {
            padding: 5rem 0;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 3rem;
            text-align: center;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--dark-charcoal);
            font-family: 'Playfair Display', serif;
            position: relative;
            display: inline-block;
            padding: 0 3rem;
        }
        
        .title-decoration {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .title-decoration span {
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            border-radius: 2px;
        }
        
        /* Cards */
        .modern-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
        }
        
        .modern-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
            border: none;
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(178, 34, 34, 0.3);
        }
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-charcoal), #1a1a1a);
            color: white;
            padding: 5rem 0 2rem;
            position: relative;
        }
        
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold), var(--accent-gold));
        }
        
        .footer-logo {
            font-family: 'Dancing Script', cursive;
            font-size: 2.2rem;
            color: white;
            margin-bottom: 1rem;
            display: inline-block;
        }
        
        .footer-logo::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
            margin-top: 0.5rem;
        }
        
        .footer-title {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            position: relative;
            padding-bottom: 0.75rem;
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
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.75rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--accent-gold);
            transform: translateX(5px);
        }
        
        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-gold);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: var(--accent-gold);
            color: var(--dark-charcoal);
            transform: translateY(-3px);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 2rem;
            margin-top: 4rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
        }
        
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-padding {
                padding: 4rem 0;
            }
            
            .navbar-brand .brand-name {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
            
            .section-padding {
                padding: 3rem 0;
            }
            
            .nav-link {
                padding: 0.5rem 1rem !important;
                text-align: center;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="brand-wrapper">
                    <span class="brand-name">JOSS GANDOS</span>
                    <span class="brand-subtitle">RESTORAN INDONESIA</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-2"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            <i class="fas fa-history me-2"></i>Tentang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('menu') ? 'active' : '' }}" href="{{ route('menu') }}">
                            <i class="fas fa-utensils me-2"></i>Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">
                            <i class="fas fa-images me-2"></i>Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                            <i class="fas fa-phone me-2"></i>Kontak
                        </a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="{{ route('reservation.create') }}" class="btn btn-primary">
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

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Logo and Description -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <a href="{{ route('home') }}" class="footer-logo">
                        JOSS GANDOS
                    </a>
                    <p class="text-white-50 mt-3 mb-4" style="font-size: 0.95rem; line-height: 1.7;">
                        Menjaga keaslian cita rasa Indonesia dengan sentuhan modern. 
                        Setiap hidangan adalah cerita tentang warisan kuliner Nusantara 
                        yang kami jaga dengan penuh kebanggaan.
                    </p>
                    <div class="social-icons">
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
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-5">
                    <h5 class="footer-title">Navigasi</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('menu') }}">Menu</a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>
                
                <!-- Opening Hours -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="footer-title">Jam Operasional</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="far fa-clock me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Setiap Hari</p>
                                <p class="mb-0 text-white-50 small">10:00 - 22:00 WIB</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-concierge-bell me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Layanan Catering</p>
                                <p class="mb-0 text-white-50 small">08:00 - 20:00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h5 class="footer-title">Hubungi Kami</h5>
                    <div class="mb-4">
                        <div class="d-flex align-items-start mb-3">
                            <i class="fas fa-map-marker-alt me-3 mt-1" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Alamat</p>
                                <p class="mb-0 text-white-50 small">Jl. Baye Kuliner No. 123<br>Jakarta, Indonesia 10110</p>
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
            
            <!-- Copyright -->
            <div class="copyright">
                <p class="mb-2">&copy; 2015 - {{ date('Y') }} JOSS GANDOS. Hak cipta dilindungi.</p>
                <p class="mt-3 small text-white-50">
                    Cita rasa Indonesia, disajikan dengan modernitas dan tradisi.
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Navbar scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
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
            
            // Indonesian greeting in console
            console.log('%c✨ Selamat Datang di JOSS GANDOS ✨', 
                'background: linear-gradient(135deg, #B22222, #D4A017); color: white; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: bold;');
        });
        
        // Notification function
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = 'position-fixed top-0 end-0 m-4 p-3 shadow rounded';
            notification.style.cssText = `
                background: white;
                border-left: 4px solid ${type === 'success' ? '#2ecc71' : type === 'error' ? '#e74c3c' : '#3498db'};
                z-index: 9999;
                max-width: 350px;
                animation: slideInRight 0.3s ease;
                font-family: 'Poppins', sans-serif;
            `;
            
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} 
                        me-3" style="color: ${type === 'success' ? '#2ecc71' : type === 'error' ? '#e74c3c' : '#3498db'};"></i>
                    <div>
                        <strong class="d-block" style="color: var(--dark-charcoal);">${message}</strong>
                        <small class="text-muted">JOSS GANDOS Restoran</small>
                    </div>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                notification.style.transition = 'all 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 4000);
        }
        
        // Add slideInRight animation for notifications
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
    
    @yield('scripts')
</body>
</html>