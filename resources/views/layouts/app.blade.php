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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Great+Vibes&family=Dancing+Script:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600;700&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    
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
            --wood-light: #E8D7B8;
            --batik-pattern: #F0E6D2;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--dark-charcoal);
            line-height: 1.7;
            background-color: var(--neutral-cream);
            overflow-x: hidden;
            position: relative;
        }
        
        /* Background dengan tekstur kayu dan motif Indonesia */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23e8d7b8' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E"),
                linear-gradient(rgba(255, 249, 240, 0.95), rgba(255, 249, 240, 0.98));
            background-size: 300px, cover;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Ornamen sudut dengan motif batik */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M0,0 L100,0 L100,100 L0,100 Z' fill='none'/%3E%3Cpath d='M20,20 Q40,10 60,20 T100,20' stroke='%23B22222' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3Cpath d='M20,40 Q40,30 60,40 T100,40' stroke='%23D4A017' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3Cpath d='M20,60 Q40,50 60,60 T100,60' stroke='%23B22222' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3C/svg%3E");
            background-size: contain;
            background-repeat: no-repeat;
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
            background-image: 
                linear-gradient(to bottom, rgba(255, 249, 240, 0.98), rgba(255, 249, 240, 0.95)),
                url("data:image/svg+xml,%3Csvg width='200' height='80' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,40 Q25,20 50,40 T100,40 T150,40 T200,40' stroke='%23B22222' stroke-width='0.3' fill='none' opacity='0.05'/%3E%3C/svg%3E");
            background-size: cover, 200px 80px;
        }
        
        .navbar.scrolled {
            padding: 0.75rem 0;
            box-shadow: 0 8px 30px rgba(139, 0, 0, 0.1);
        }
        
        /* PERUBAHAN: Brand dengan Logo Image dan Teks */
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
            gap: 15px;
        }
        
        .navbar-brand:hover {
            transform: translateY(-2px);
        }
        
        .brand-logo {
            height: 50px;
            width: auto;
            display: block;
            transition: all 0.3s ease;
        }
        
        .navbar.scrolled .brand-logo {
            height: 40px;
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .brand-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-red);
            line-height: 1.1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .brand-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--secondary-gold);
            text-transform: uppercase;
            margin-top: 3px;
        }
        
        .nav-link {
            color: var(--dark-charcoal) !important;
            font-weight: 500;
            padding: 0.75rem 1.5rem !important;
            margin: 0 0.25rem;
            position: relative;
            transition: all 0.3s ease;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
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
        
        .nav-link::after {
            content: '•';
            position: absolute;
            right: -8px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-gold);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .nav-link:last-child::after {
            display: none;
        }
        
        .nav-link:hover::before,
        .nav-link.active::before {
            width: 60%;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            opacity: 0.5;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary-red) !important;
            background: rgba(178, 34, 34, 0.05);
            transform: translateY(-2px);
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
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M20,50 Q40,30 60,50 T100,50' stroke='%23D4A017' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3Cpath d='M0,30 Q20,10 40,30 T80,30' stroke='%23FFC145' stroke-width='0.5' fill='none' opacity='0.1'/%3E%3C/svg%3E");
            background-size: 200px;
            pointer-events: none;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
        }
        
        .hero-title {
            font-family: 'Libre Baskerville', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: white;
            position: relative;
            display: inline-block;
        }
        
        .hero-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-red), var(--accent-gold));
            border-radius: 2px;
        }
        
        .hero-title .highlight {
            color: var(--accent-gold);
            position: relative;
            font-style: italic;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            line-height: 1.8;
            font-family: 'Inter', sans-serif;
        }
        
        /* Section Design */
        .section-padding {
            padding: 5rem 0;
            position: relative;
        }
        
        .section-padding::before {
            content: '';
            position: absolute;
            top: 0;
            left: 10%;
            right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--secondary-gold), transparent);
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
            font-family: 'Libre Baskerville', serif;
            position: relative;
            display: inline-block;
            padding: 0 3rem;
        }
        
        .section-title h2::before,
        .section-title h2::after {
            content: '✻';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-red);
            font-size: 1.5rem;
            opacity: 0.5;
        }
        
        .section-title h2::before {
            left: 0;
        }
        
        .section-title h2::after {
            right: 0;
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
            position: relative;
        }
        
        .title-decoration span::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: var(--secondary-gold);
            border-radius: 50%;
        }
        
        /* Cards */
        .modern-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
            position: relative;
        }
        
        .modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .modern-card:hover::before {
            opacity: 1;
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
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            font-family: 'Montserrat', sans-serif;
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
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(178, 34, 34, 0.4);
        }
        
        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--dark-charcoal), #1a1a1a);
            color: white;
            padding: 5rem 0 2rem;
            position: relative;
            font-family: 'Inter', sans-serif;
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
        
        footer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold), var(--accent-gold));
            opacity: 0.3;
        }
        
        /* PERUBAHAN: Footer Logo dengan Image dan Teks */
        .footer-logo-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        
        .footer-logo-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 1.5rem;
        }
        
        .footer-logo {
            height: 60px;
            width: auto;
            display: block;
            transition: all 0.3s ease;
        }
        
        .footer-logo:hover {
            transform: scale(1.05);
        }
        
        .footer-brand-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .footer-brand-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            line-height: 1.1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .footer-brand-subtitle {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 1.5px;
            color: var(--accent-gold);
            text-transform: uppercase;
            margin-top: 3px;
        }
        
        .footer-title {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: white;
            font-family: 'Montserrat', sans-serif;
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
            position: relative;
            padding-left: 15px;
        }
        
        .footer-links li::before {
            content: '›';
            position: absolute;
            left: 0;
            color: var(--accent-gold);
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
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
            border: 1px solid rgba(255, 193, 69, 0.2);
        }
        
        .social-icon:hover {
            background: var(--accent-gold);
            color: var(--dark-charcoal);
            transform: translateY(-3px) rotate(5deg);
            box-shadow: 0 5px 15px rgba(255, 193, 69, 0.3);
        }
        
        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 2rem;
            margin-top: 4rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.9rem;
            position: relative;
        }
        
        .copyright::before {
            content: '✻';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--accent-gold);
            font-size: 1.2rem;
            background: linear-gradient(135deg, var(--dark-charcoal), #1a1a1a);
            padding: 0 15px;
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
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .section-title h2 {
                font-size: 2.2rem;
            }
            
            .brand-name {
                font-size: 1.3rem;
            }
            
            .footer-brand-name {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-padding {
                padding: 4rem 0;
            }
            
            .brand-logo {
                height: 40px;
            }
            
            .brand-name {
                font-size: 1.2rem;
            }
            
            .brand-subtitle {
                font-size: 0.7rem;
            }
            
            .nav-link {
                padding: 0.5rem 1rem !important;
                text-align: center;
            }
            
            .footer-logo {
                height: 50px;
            }
            
            .footer-brand-name {
                font-size: 1.3rem;
            }
            
            .footer-brand-subtitle {
                font-size: 0.7rem;
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
                padding: 0 2rem;
            }
            
            .section-padding {
                padding: 3rem 0;
            }
            
            body::after {
                width: 100px;
                height: 100px;
            }
            
            .brand-logo {
                height: 35px;
            }
            
            .brand-name {
                font-size: 1.1rem;
            }
            
            .brand-subtitle {
                font-size: 0.65rem;
                letter-spacing: 1px;
            }
            
            .footer-logo {
                height: 45px;
            }
            
            .footer-brand-name {
                font-size: 1.1rem;
            }
            
            .footer-brand-subtitle {
                font-size: 0.65rem;
                letter-spacing: 1px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .section-title h2 {
                font-size: 1.6rem;
            }
            
            .navbar-brand {
                gap: 10px;
            }
            
            .brand-logo {
                height: 30px;
            }
            
            .brand-name {
                font-size: 1rem;
            }
            
            .brand-subtitle {
                font-size: 0.6rem;
                letter-spacing: 0.5px;
            }
            
            .footer-logo-wrapper {
                gap: 10px;
            }
            
            .footer-logo {
                height: 40px;
            }
            
            .footer-brand-name {
                font-size: 1rem;
            }
            
            .footer-brand-subtitle {
                font-size: 0.6rem;
                letter-spacing: 0.5px;
            }
        }
        
        @media (max-width: 400px) {
            .navbar-brand {
                gap: 8px;
            }
            
            .brand-logo {
                height: 25px;
            }
            
            .brand-name {
                font-size: 0.9rem;
            }
            
            .brand-subtitle {
                font-size: 0.55rem;
            }
            
            .footer-logo-wrapper {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .footer-logo {
                height: 35px;
            }
            
            .footer-brand-name {
                font-size: 0.9rem;
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
            background: linear-gradient(var(--primary-red), var(--secondary-gold));
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(var(--primary-dark), var(--accent-gold));
        }
        
        /* Loading Spinner */
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid var(--neutral-cream);
            border-top: 4px solid var(--primary-red);
            border-right: 4px solid var(--secondary-gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Wood Texture Background */
        .wood-bg {
            background-image: 
                linear-gradient(rgba(232, 215, 184, 0.1), rgba(232, 215, 184, 0.05)),
                url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h100v100H0z' fill='none'/%3E%3Cpath d='M0 20h100M0 40h100M0 60h100M0 80h100' stroke='%238B7355' stroke-width='0.5' stroke-opacity='0.1'/%3E%3C/svg%3E");
            background-size: 100px;
        }
        
        /* Batik Pattern */
        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23B22222' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            background-size: 60px;
        }
        
        /* Wayang-inspired border */
        .wayang-border {
            position: relative;
        }
        
        .wayang-border::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                var(--primary-red) 20%, 
                var(--secondary-gold) 50%, 
                var(--primary-red) 80%, 
                transparent 100%);
        }
        
        /* Traditional Divider */
        .traditional-divider {
            height: 2px;
            background: linear-gradient(90deg, 
                transparent, 
                var(--primary-red) 25%, 
                var(--secondary-gold) 50%, 
                var(--primary-red) 75%, 
                transparent);
            margin: 2rem 0;
            position: relative;
        }
        
        .traditional-divider::before,
        .traditional-divider::after {
            content: '✦';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: var(--secondary-gold);
            font-size: 1.2rem;
        }
        
        .traditional-divider::before {
            left: 30%;
        }
        
        .traditional-divider::after {
            right: 30%;
        }
        
        /* Indonesian Pattern Overlay */
        .indonesian-pattern {
            position: relative;
        }
        
        .indonesian-pattern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg width='120' height='120' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M60,0 Q90,30 60,60 Q30,90 60,120' stroke='%23D4A017' stroke-width='0.3' fill='none' opacity='0.05'/%3E%3Cpath d='M0,60 Q30,90 60,60 Q90,30 120,60' stroke='%23B22222' stroke-width='0.3' fill='none' opacity='0.05'/%3E%3C/svg%3E");
            background-size: 120px;
            pointer-events: none;
            z-index: 0;
        }
        
        /* Enhanced Card Hover Effects */
        .modern-card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .modern-card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-red), var(--secondary-gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Border Animation */
        .border-animate {
            position: relative;
            border: 2px solid transparent;
            background: linear-gradient(var(--neutral-cream), var(--neutral-cream)) padding-box,
                        linear-gradient(135deg, var(--primary-red), var(--secondary-gold)) border-box;
            animation: borderRotate 3s linear infinite;
        }
        
        @keyframes borderRotate {
            0% {
                border-image: linear-gradient(0deg, var(--primary-red), var(--secondary-gold)) 1;
            }
            100% {
                border-image: linear-gradient(360deg, var(--primary-red), var(--secondary-gold)) 1;
            }
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- PERUBAHAN: Logo dan Teks di Header -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://restojossgandos.com/public/img/logojossgandos.png" 
                     alt="JOSS GANDOS - Restoran Indonesia" 
                     class="brand-logo">
                <div class="brand-text">
                    <div class="brand-name">JOSS GANDOS</div>
                    <div class="brand-subtitle">RESTORAN INDONESIA</div>
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
                <!-- PERUBAHAN: Logo dan Teks di Footer -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="footer-logo-container">
                        <div class="footer-logo-wrapper">
                            <img src="https://restojossgandos.com/public/img/logojossgandos.png" 
                                 alt="JOSS GANDOS - Restoran Indonesia" 
                                 class="footer-logo">
                            <div class="footer-brand-text">
                                <div class="footer-brand-name">JOSS GANDOS</div>
                                <div class="footer-brand-subtitle">RESTORAN INDONESIA</div>
                            </div>
                        </div>
                        <p class="text-white-50 mt-3 mb-4" style="font-size: 0.95rem; line-height: 1.7;">
                            Menjaga keaslian cita rasa Indonesia dengan sentuhan modern. 
                            Setiap hidangan adalah cerita tentang warisan kuliner Nusantara 
                            yang kami jaga dengan penuh kebanggaan.
                        </p>
                        <div class="social-icons">
                            <a href="https://instagram.com/jossgandos" class="social-icon" target="_blank" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://facebook.com/jossgandos" class="social-icon" target="_blank" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://wa.me/6281234567890" class="social-icon" target="_blank" aria-label="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://tiktok.com/@jossgandos" class="social-icon" target="_blank" aria-label="TikTok">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
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
                                <p class="mb-0 text-white-50 small">Jl. Raya Jemursari No.15<br>Surabaya, Indonesia 60237</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-phone me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Telepon</p>
                                <p class="mb-0 text-white-50 small">+62 896-9907-1599</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope me-3" style="color: var(--accent-gold); width: 20px;"></i>
                            <div>
                                <p class="mb-1 fw-semibold" style="color: white;">Email</p>
                                <p class="mb-0 text-white-50 small">bebekjossgandossby@gmail.com</p>
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
            const brandLogo = document.querySelector('.brand-logo');
            
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
            
            // Logo hover effect
            if (brandLogo) {
                brandLogo.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05) rotate(2deg)';
                });
                
                brandLogo.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) rotate(0)';
                });
            }
            
            // Footer logo hover effect
            const footerLogo = document.querySelector('.footer-logo');
            if (footerLogo) {
                footerLogo.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                });
                
                footerLogo.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            }
            
            // Brand text hover effect
            const brandText = document.querySelector('.brand-text');
            if (brandText) {
                brandText.addEventListener('mouseenter', function() {
                    this.querySelector('.brand-name').style.color = 'var(--primary-dark)';
                    this.querySelector('.brand-subtitle').style.color = 'var(--accent-gold)';
                });
                
                brandText.addEventListener('mouseleave', function() {
                    this.querySelector('.brand-name').style.color = 'var(--primary-red)';
                    this.querySelector('.brand-subtitle').style.color = 'var(--secondary-gold)';
                });
            }
            
            // Footer brand text hover effect
            const footerBrandText = document.querySelector('.footer-brand-text');
            if (footerBrandText) {
                footerBrandText.addEventListener('mouseenter', function() {
                    this.querySelector('.footer-brand-name').style.color = 'var(--accent-gold)';
                    this.querySelector('.footer-brand-subtitle').style.color = 'white';
                });
                
                footerBrandText.addEventListener('mouseleave', function() {
                    this.querySelector('.footer-brand-name').style.color = 'white';
                    this.querySelector('.footer-brand-subtitle').style.color = 'var(--accent-gold)';
                });
            }
            
            // Indonesian greeting in console
            console.log('%c✨ Selamat Datang di JOSS GANDOS ✨', 
                'background: linear-gradient(135deg, #B22222, #D4A017); color: white; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: bold;');
            
            // Add subtle animation to cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);
            
            // Observe all modern cards
            document.querySelectorAll('.modern-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
            
            // Add hover effect to social icons
            document.querySelectorAll('.social-icon').forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) rotate(10deg)';
                });
                
                icon.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) rotate(0)';
                });
            });
            
            // Add ripple effect to buttons
            document.querySelectorAll('.btn-primary').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.6);
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        width: ${size}px;
                        height: ${size}px;
                        top: ${y}px;
                        left: ${x}px;
                        pointer-events: none;
                    `;
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
            
            // Add CSS for ripple animation
            const rippleStyle = document.createElement('style');
            rippleStyle.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(rippleStyle);
            
            // Image preloading for better performance
            const logoUrl = 'https://restojossgandos.com/public/img/logojossgandos.png';
            const logoImage = new Image();
            logoImage.src = logoUrl;
            logoImage.onload = function() {
                console.log('Logo JOSS GANDOS berhasil dimuat');
            };
            logoImage.onerror = function() {
                console.warn('Logo gagal dimuat, menggunakan fallback');
                // Fallback untuk logo yang gagal dimuat
                document.querySelectorAll('.brand-logo, .footer-logo').forEach(logo => {
                    logo.alt = 'JOSS GANDOS - Restoran Indonesia';
                    logo.style.backgroundColor = '#B22222';
                    logo.style.padding = '10px';
                    logo.style.borderRadius = '5px';
                    logo.style.color = 'white';
                    logo.style.fontFamily = "'Poppins', sans-serif";
                    logo.style.fontSize = '1.2rem';
                    logo.style.fontWeight = '700';
                    logo.style.display = 'flex';
                    logo.style.alignItems = 'center';
                    logo.style.justifyContent = 'center';
                    logo.innerHTML = 'JOSS<br>GANDOS';
                    logo.style.lineHeight = '1.2';
                    logo.style.textAlign = 'center';
                    logo.style.width = '50px';
                    logo.style.height = '50px';
                });
            };
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
                border: 1px solid rgba(180, 34, 34, 0.1);
                border-radius: 12px;
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.95);
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
        `;
        document.head.appendChild(style);
        
        // Parallax effect for hero sections
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.hero-section');
            
            parallaxElements.forEach(element => {
                const rate = scrolled * -0.5;
                element.style.transform = `translate3d(0, ${rate}px, 0)`;
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>