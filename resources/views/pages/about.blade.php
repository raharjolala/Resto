@extends('layouts.app')

@section('title', $page->meta_title ?? 'Tentang Kami - JOSS GANDOS')

@section('meta-description', $page->meta_description ?? 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan perjalanan restoran kami sejak 2017')

@section('content')
    <div class="about-page">
        <!-- CSS Styles -->
        <style>
            /* about.css - JOSS GANDOS Restaurant About Page */
            
            /* Modern Variables */
            :root {
                --glass-bg: rgba(255, 255, 255, 0.12);
                --glass-border: rgba(255, 255, 255, 0.2);
                --glass-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
                --primary-glow: 0 0 50px rgba(198, 40, 40, 0.25);
                --gold-glow: 0 0 50px rgba(212, 161, 23, 0.25);
                --transition-smooth: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                --transition-bounce: all 0.7s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                
                /* Color Palette - JOSS GANDOS Theme */
                --primary-red: #c62828;
                --primary-gold: #d4a117;
                --dark-red: #8B0000;
                --light-gold: #ffd700;
                --cream-bg: #f8f5f0;
                --dark-brown: #3E2723;
                --medium-brown: #5D4037;
                --light-cream: #fef9f3;
                --white: #ffffff;
            }
            
            /* Reset & Base Styles */
            .about-page {
                font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
                overflow-x: hidden;
            }
            
            /* White Batik Background */
            .main-batik-background {
                background-color: var(--white);
                position: relative;
                overflow: hidden;
                min-height: 100vh;
            }
            
            .batik-overlay {
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                pointer-events: none;
                z-index: 0;
                opacity: 0.12;
                background-image: 
                    radial-gradient(circle at 20% 30%, rgba(198, 40, 40, 0.08) 2px, transparent 2px),
                    radial-gradient(circle at 80% 70%, rgba(212, 161, 23, 0.06) 2px, transparent 2px),
                    radial-gradient(circle at 40% 80%, rgba(198, 40, 40, 0.07) 3px, transparent 3px),
                    radial-gradient(circle at 60% 20%, rgba(212, 161, 23, 0.05) 3px, transparent 3px),
                    radial-gradient(circle at 90% 40%, rgba(198, 40, 40, 0.06) 2px, transparent 2px),
                    radial-gradient(circle at 10% 60%, rgba(212, 161, 23, 0.07) 2px, transparent 2px),
                    repeating-linear-gradient(45deg, 
                        transparent, 
                        transparent 10px, 
                        rgba(198, 40, 40, 0.03) 10px, 
                        rgba(198, 40, 40, 0.03) 11px),
                    repeating-linear-gradient(-45deg, 
                        transparent, 
                        transparent 10px, 
                        rgba(212, 161, 23, 0.02) 10px, 
                        rgba(212, 161, 23, 0.02) 11px);
                background-size: 300px 300px, 250px 250px, 350px 350px, 400px 400px, 280px 280px, 320px 320px, 100px 100px, 100px 100px;
            }
            
            /* Enhanced Hero Section */
            .hero-batik-section {
                min-height: 100vh;
                display: flex;
                align-items: center;
                position: relative;
                background: 
                    radial-gradient(ellipse at 20% 50%, rgba(198, 40, 40, 0.10) 0%, transparent 60%),
                    radial-gradient(ellipse at 80% 20%, rgba(212, 161, 23, 0.08) 0%, transparent 60%),
                    linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 248, 248, 0.98) 100%);
                overflow: hidden;
                padding-top: 80px;
            }
            
            .hero-batik-section::before {
                content: '';
                position: absolute;
                width: 100%;
                height: 100%;
                background-image: 
                    url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="%23c62828" stroke-opacity="0.08" stroke-width="1"><path d="M20,20 Q40,5 60,20 T100,20" /><path d="M20,50 Q40,35 60,50 T100,50" /><path d="M20,80 Q40,65 60,80 T100,80" /><circle cx="50" cy="50" r="15"/></g></svg>');
                background-size: 150px;
                opacity: 0.3;
                animation: slow-pan 120s infinite linear;
            }
            
            @keyframes slow-pan {
                0% { transform: translate(0, 0) rotate(0deg); }
                25% { transform: translate(1%, 1%) rotate(0.5deg); }
                50% { transform: translate(0, 2%) rotate(0deg); }
                75% { transform: translate(-1%, 1%) rotate(-0.5deg); }
                100% { transform: translate(0, 0) rotate(0deg); }
            }
            
            /* Premium Title */
            .batik-title {
                font-family: 'Playfair Display', serif;
                font-weight: 800;
                background: linear-gradient(135deg, 
                    var(--dark-red) 0%, 
                    var(--primary-red) 25%, 
                    var(--primary-gold) 50%, 
                    #e6b422 75%, 
                    var(--light-gold) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-shadow: 
                    0 4px 15px rgba(198, 40, 40, 0.2),
                    0 2px 4px rgba(0, 0, 0, 0.05);
                position: relative;
                display: inline-block;
                letter-spacing: -0.5px;
            }
            
            .batik-title::after {
                content: '';
                position: absolute;
                bottom: -15px;
                left: 10%;
                width: 80%;
                height: 4px;
                background: linear-gradient(90deg, 
                    transparent, 
                    var(--primary-red), 
                    var(--primary-gold), 
                    var(--primary-red), 
                    transparent);
                border-radius: 2px;
                opacity: 0.8;
            }
            
            /* Enhanced Glassmorphism */
            .joss-gandos-glass {
                background: linear-gradient(135deg, 
                    rgba(255, 255, 255, 0.98) 0%,
                    rgba(255, 248, 240, 0.95) 100%);
                backdrop-filter: blur(15px);
                border: 2px solid rgba(212, 161, 23, 0.1);
                border-radius: 28px;
                box-shadow: 
                    0 20px 60px rgba(160, 80, 60, 0.15),
                    inset 0 1px 0 rgba(255, 255, 255, 0.8),
                    inset 0 -1px 0 rgba(198, 40, 40, 0.1);
                transition: var(--transition-smooth);
                position: relative;
                overflow: hidden;
            }
            
            .joss-gandos-glass::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, 
                    var(--primary-red) 0%, 
                    var(--primary-gold) 50%, 
                    var(--primary-red) 100%);
                opacity: 0.7;
            }
            
            /* History Section */
            .history-section {
                background: linear-gradient(135deg, var(--light-cream) 0%, #ffffff 100%);
                border-radius: 25px;
                padding: 60px;
                position: relative;
                overflow: hidden;
                border: 2px solid rgba(212, 161, 23, 0.1);
                box-shadow: 0 25px 70px rgba(160, 80, 60, 0.1);
                margin-bottom: 50px;
            }
            
            .history-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 6px;
                background: linear-gradient(90deg, var(--primary-red), var(--primary-gold), var(--primary-red));
            }
            
            /* Founder Section */
            .founder-card {
                background: linear-gradient(135deg, #ffffff 0%, var(--light-cream) 100%);
                border-radius: 25px;
                padding: 50px;
                position: relative;
                overflow: hidden;
                border: 2px solid rgba(212, 161, 23, 0.15);
                box-shadow: 0 25px 70px rgba(160, 80, 60, 0.12);
                transition: var(--transition-smooth);
                margin-bottom: 50px;
            }
            
            .founder-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 35px 90px rgba(160, 80, 60, 0.2);
            }
            
            .founder-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 6px;
                background: linear-gradient(90deg, var(--primary-red), var(--primary-gold), var(--primary-red));
            }
            
            .founder-image {
                width: 220px;
                height: 220px;
                border-radius: 50%;
                object-fit: cover;
                border: 8px solid white;
                box-shadow: 
                    0 20px 50px rgba(0, 0, 0, 0.2),
                    0 0 0 4px rgba(212, 161, 23, 0.2);
                transition: var(--transition-smooth);
            }
            
            .founder-image:hover {
                transform: scale(1.05);
                box-shadow: 
                    0 25px 60px rgba(0, 0, 0, 0.25),
                    0 0 0 5px rgba(198, 40, 40, 0.2);
            }
            
            .founder-quote {
                position: relative;
                padding-left: 50px;
                font-style: italic;
                color: var(--medium-brown);
                font-size: 1.2rem;
                line-height: 1.8;
                margin-top: 30px;
                padding-top: 20px;
                border-top: 2px solid rgba(212, 161, 23, 0.2);
            }
            
            .founder-quote::before {
                content: '"';
                position: absolute;
                left: 0;
                top: -10px;
                font-size: 80px;
                color: var(--primary-gold);
                opacity: 0.3;
                font-family: serif;
                line-height: 1;
            }
            
            /* Timeline Enhanced */
            .journey-timeline {
                position: relative;
                padding: 100px 0;
                background: linear-gradient(180deg, #ffffff, var(--cream-bg));
                margin-bottom: 50px;
            }
            
            .timeline-line {
                position: absolute;
                left: 50%;
                top: 0;
                bottom: 0;
                width: 6px;
                background: linear-gradient(to bottom, 
                    var(--primary-red) 0%, 
                    var(--primary-gold) 25%, 
                    var(--light-gold) 50%, 
                    var(--primary-gold) 75%, 
                    var(--primary-red) 100%);
                transform: translateX(-50%);
                border-radius: 3px;
                box-shadow: 0 0 20px rgba(198, 40, 40, 0.3);
            }
            
            .timeline-year {
                position: absolute;
                left: 50%;
                transform: translateX(-50%);
                background: linear-gradient(135deg, var(--primary-red), var(--primary-gold));
                color: white;
                padding: 15px 35px;
                border-radius: 30px;
                font-weight: 700;
                font-size: 1.3rem;
                box-shadow: 
                    0 15px 35px rgba(198, 40, 40, 0.4),
                    0 0 0 4px rgba(255, 255, 255, 0.2);
                z-index: 2;
                border: 3px solid white;
                white-space: nowrap;
                min-width: 250px;
                text-align: center;
            }
            
            .timeline-card {
                background: linear-gradient(135deg, #ffffff, #fff9f0);
                border-radius: 25px;
                padding: 45px;
                box-shadow: 
                    0 20px 50px rgba(0, 0, 0, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.8);
                border-left: 6px solid var(--primary-gold);
                position: relative;
                transition: var(--transition-smooth);
                overflow: hidden;
                margin-bottom: 30px;
            }
            
            .timeline-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--primary-red), var(--primary-gold));
            }
            
            .timeline-card:hover {
                transform: translateY(-8px) scale(1.02);
                box-shadow: 
                    0 30px 80px rgba(160, 80, 60, 0.2),
                    0 0 0 1px rgba(212, 161, 23, 0.2);
                border-left-color: var(--primary-red);
            }
            
            .milestone-icon {
                width: 70px;
                height: 70px;
                border-radius: 50%;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-gold));
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.8rem;
                margin-bottom: 25px;
                box-shadow: 0 10px 30px rgba(198, 40, 40, 0.3);
                transition: var(--transition-smooth);
            }
            
            .timeline-card:hover .milestone-icon {
                transform: scale(1.1) rotate(10deg);
                box-shadow: 0 15px 40px rgba(212, 161, 23, 0.4);
            }
            
            /* Vision & Mission Cards */
            .vision-card {
                background: linear-gradient(135deg, #ffffff, #fff9f0);
                border-radius: 25px;
                padding: 60px 50px;
                position: relative;
                overflow: hidden;
                border: 2px solid rgba(212, 161, 23, 0.15);
                height: 100%;
                transition: var(--transition-smooth);
                margin-bottom: 30px;
            }
            
            .vision-card:hover {
                transform: translateY(-10px);
                box-shadow: 
                    0 35px 90px rgba(160, 80, 60, 0.15),
                    0 0 0 2px rgba(212, 161, 23, 0.2);
            }
            
            .vision-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 8px;
                background: linear-gradient(90deg, var(--primary-red), var(--primary-gold), var(--primary-red));
                opacity: 0.9;
            }
            
            .vision-icon {
                width: 100px;
                height: 100px;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-gold));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 35px;
                box-shadow: 
                    0 20px 40px rgba(198, 40, 40, 0.3),
                    inset 0 1px 0 rgba(255, 255, 255, 0.3);
            }
            
            .vision-icon i {
                font-size: 3rem;
                color: white;
            }
            
            .mission-list {
                list-style: none;
                padding: 0;
            }
            
            .mission-list li {
                padding: 20px 0 20px 60px;
                position: relative;
                border-bottom: 1px solid rgba(212, 161, 23, 0.15);
                color: var(--medium-brown);
                font-size: 1.1rem;
                line-height: 1.7;
                transition: var(--transition-smooth);
            }
            
            .mission-list li:hover {
                transform: translateX(10px);
                color: var(--primary-red);
            }
            
            .mission-list li:last-child {
                border-bottom: none;
            }
            
            .mission-list li::before {
                content: '✓';
                position: absolute;
                left: 0;
                top: 20px;
                width: 40px;
                height: 40px;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-gold));
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 1.2rem;
                box-shadow: 0 5px 15px rgba(198, 40, 40, 0.3);
            }
            
            /* Team Cards */
            .team-card {
                background: linear-gradient(135deg, #ffffff, #fff9f0);
                border-radius: 25px;
                overflow: hidden;
                position: relative;
                transition: var(--transition-smooth);
                border: 3px solid transparent;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
                height: 100%;
                margin-bottom: 30px;
            }
            
            .team-card::before {
                content: '';
                position: absolute;
                inset: -3px;
                background: conic-gradient(from 0deg, 
                    var(--primary-red), 
                    var(--primary-gold), 
                    var(--primary-red));
                border-radius: 28px;
                opacity: 0;
                transition: opacity 0.6s ease;
                z-index: -1;
            }
            
            .team-card:hover::before {
                opacity: 1;
                animation: rotate-gradient 3s linear infinite;
            }
            
            @keyframes rotate-gradient {
                100% { transform: rotate(360deg); }
            }
            
            .team-card:hover {
                transform: translateY(-15px);
                box-shadow: 
                    0 40px 100px rgba(160, 80, 60, 0.25),
                    0 0 60px rgba(212, 161, 23, 0.2);
            }
            
            .team-image {
                width: 100%;
                height: 320px;
                object-fit: cover;
                transition: var(--transition-smooth);
            }
            
            .team-card:hover .team-image {
                transform: scale(1.05);
            }
            
            .team-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
                padding: 40px 30px 30px;
            }
            
            /* Stats Cards */
            .stat-card {
                background: rgba(255, 255, 255, 0.95);
                border-radius: 20px;
                padding: 25px;
                text-align: center;
                border: 2px solid rgba(212, 161, 23, 0.1);
                transition: var(--transition-smooth);
                height: 100%;
            }
            
            .stat-card:hover {
                transform: translateY(-5px);
                border-color: rgba(198, 40, 40, 0.3);
                box-shadow: 0 15px 40px rgba(160, 80, 60, 0.15);
            }
            
            .stat-number {
                font-size: 3rem;
                font-weight: 800;
                margin-bottom: 10px;
                background: linear-gradient(135deg, var(--primary-red), var(--primary-gold));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .stat-label {
                font-size: 0.9rem;
                font-weight: 600;
                color: var(--dark-brown);
                letter-spacing: 1px;
                text-transform: uppercase;
            }
            
            /* CTA Section */
            .cta-section {
                background: 
                    radial-gradient(ellipse at 20% 30%, rgba(198, 40, 40, 0.2) 0%, transparent 60%),
                    radial-gradient(ellipse at 80% 70%, rgba(212, 161, 23, 0.15) 0%, transparent 60%),
                    linear-gradient(135deg, var(--dark-red) 0%, var(--primary-red) 50%, var(--dark-red) 100%);
                position: relative;
                overflow: hidden;
                padding: 100px 0;
                margin-top: 50px;
                border-radius: 30px;
            }
            
            .cta-section::before {
                content: '';
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                background-image: 
                    url('data:image/svg+xml;utf8,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><g fill="none" stroke="%23ffffff" stroke-opacity="0.1" stroke-width="1"><path d="M20,20 Q40,5 60,20 T100,20" /><path d="M20,50 Q40,35 60,50 T100,50" /><path d="M20,80 Q40,65 60,80 T100,80" /><circle cx="50" cy="50" r="15"/></g></svg>');
                background-size: 150px;
                opacity: 0.2;
            }
            
            .cta-button {
                background: linear-gradient(135deg, 
                    #ffffff 0%, 
                    #FFE0B2 100%);
                color: var(--dark-red);
                border: none;
                padding: 20px 50px;
                border-radius: 50px;
                font-weight: 700;
                font-size: 1.2rem;
                text-transform: uppercase;
                letter-spacing: 2px;
                position: relative;
                overflow: hidden;
                transition: all 0.4s ease;
                box-shadow: 
                    0 20px 40px rgba(255, 255, 255, 0.1),
                    0 0 0 3px rgba(255, 255, 255, 0.2);
            }
            
            .cta-button:hover {
                transform: translateY(-5px) scale(1.05);
                box-shadow: 
                    0 30px 60px rgba(255, 255, 255, 0.2),
                    0 0 0 4px rgba(255, 255, 255, 0.3);
                color: var(--primary-red);
            }
            
            /* Scroll Indicator */
            .scroll-indicator {
                text-align: center;
                margin-top: 50px;
                opacity: 1;
                transition: all 0.5s ease;
            }
            
            .mouse {
                width: 30px;
                height: 50px;
                border: 2px solid var(--primary-red);
                border-radius: 15px;
                margin: 0 auto;
                position: relative;
            }
            
            .wheel {
                width: 4px;
                height: 8px;
                background: var(--primary-gold);
                border-radius: 2px;
                position: absolute;
                top: 10px;
                left: 50%;
                transform: translateX(-50%);
                animation: scroll-wheel 2s infinite;
            }
            
            @keyframes scroll-wheel {
                0% { transform: translateX(-50%) translateY(0); opacity: 1; }
                100% { transform: translateX(-50%) translateY(20px); opacity: 0; }
            }
            
            /* Section Spacing */
            .section-spacing {
                padding: 100px 0;
            }
            
            /* Responsive Design */
            @media (max-width: 1200px) {
                .display-1 {
                    font-size: 4rem;
                }
                
                .display-3 {
                    font-size: 2.8rem;
                }
                
                .timeline-year {
                    min-width: 220px;
                    font-size: 1.2rem;
                }
            }
            
            @media (max-width: 992px) {
                .hero-batik-section {
                    padding-top: 100px;
                    min-height: auto;
                    padding-bottom: 50px;
                }
                
                .history-section,
                .founder-card {
                    padding: 40px;
                }
                
                .timeline-line {
                    left: 40px;
                }
                
                .timeline-card {
                    margin-left: 70px;
                    width: calc(100% - 70px);
                    padding: 35px;
                }
                
                .timeline-year {
                    left: 40px;
                    transform: none;
                    min-width: 200px;
                    padding: 12px 25px;
                    font-size: 1.1rem;
                }
                
                .display-1 {
                    font-size: 3.5rem;
                }
                
                .display-3 {
                    font-size: 2.5rem;
                }
                
                .vision-card {
                    padding: 50px 40px;
                    margin-bottom: 30px;
                }
                
                .founder-card {
                    padding: 40px;
                }
                
                .section-spacing {
                    padding: 80px 0;
                }
            }
            
            @media (max-width: 768px) {
                .hero-batik-section {
                    padding-top: 120px;
                    min-height: 80vh;
                }
                
                .display-1 {
                    font-size: 3rem;
                }
                
                .display-3 {
                    font-size: 2.2rem;
                }
                
                .lead {
                    font-size: 1.2rem;
                }
                
                .history-section,
                .founder-card,
                .timeline-card,
                .vision-card {
                    padding: 30px;
                }
                
                .timeline-year {
                    min-width: 180px;
                    padding: 10px 20px;
                    font-size: 1rem;
                    left: 30px;
                }
                
                .timeline-line {
                    left: 30px;
                }
                
                .timeline-card {
                    margin-left: 60px;
                    width: calc(100% - 60px);
                }
                
                .founder-image {
                    width: 180px;
                    height: 180px;
                }
                
                .mission-list li {
                    padding: 15px 0 15px 50px;
                    font-size: 1rem;
                }
                
                .section-spacing {
                    padding: 60px 0;
                }
                
                .cta-section {
                    padding: 60px 20px;
                    margin: 30px 15px;
                    border-radius: 20px;
                }
            }
            
            @media (max-width: 576px) {
                .display-1 {
                    font-size: 2.5rem;
                }
                
                .display-3 {
                    font-size: 2rem;
                }
                
                .lead {
                    font-size: 1.1rem;
                }
                
                .history-section,
                .founder-card {
                    padding: 25px;
                    margin: 15px;
                }
                
                .timeline-year {
                    position: relative;
                    left: 0;
                    transform: none;
                    margin-bottom: 20px;
                    min-width: 100%;
                }
                
                .timeline-line {
                    left: 20px;
                }
                
                .timeline-card {
                    margin-left: 40px;
                    width: calc(100% - 40px);
                    padding: 25px;
                }
                
                .stat-number {
                    font-size: 2.5rem;
                }
                
                .cta-button {
                    padding: 15px 30px;
                    font-size: 1rem;
                }
            }
            
            /* Animation Classes */
            .fade-in {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }
            
            .fade-in.visible {
                opacity: 1;
                transform: translateY(0);
            }
            
            /* Custom Utilities */
            .text-gradient {
                background: linear-gradient(135deg, var(--primary-red), var(--primary-gold));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .border-gradient {
                border: 3px solid transparent;
                border-image: linear-gradient(135deg, var(--primary-red), var(--primary-gold)) 1;
            }
            
            .shadow-soft {
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            }
            
            .shadow-medium {
                box-shadow: 0 15px 50px rgba(0, 0, 0, 0.12);
            }
            
            .shadow-hard {
                box-shadow: 0 25px 70px rgba(0, 0, 0, 0.15);
            }
            
            /* Batik Border Elements */
            .batik-border-top {
                position: relative;
                padding-top: 40px;
            }
            
            .batik-border-top::before {
                content: '';
                position: absolute;
                top: 0;
                left: 10%;
                right: 10%;
                height: 20px;
                background-image: 
                    repeating-linear-gradient(90deg, 
                        transparent, 
                        transparent 15px, 
                        var(--primary-red) 15px, 
                        var(--primary-red) 20px,
                        transparent 20px,
                        transparent 35px,
                        var(--primary-gold) 35px,
                        var(--primary-gold) 40px),
                    repeating-linear-gradient(90deg, 
                        transparent, 
                        transparent 10px, 
                        var(--primary-gold) 10px, 
                        var(--primary-gold) 15px);
                background-size: 70px 100%, 50px 100%;
                background-position: 0 10px, 0 0;
                background-repeat: repeat-x;
            }
        </style>

        <div class="main-batik-background">
            <div class="batik-overlay"></div>
            
            <!-- Hero Section - MODIFIKASI -->
            <section class="hero-batik-section">
                <div class="container position-relative" style="z-index: 1;">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-10">
                            <div class="text-center mb-5">
                                <!-- Decorative Elements -->
                                <div class="mb-4">
                                    <div style="height: 8px; width: 200px; background: linear-gradient(90deg, var(--primary-red), var(--primary-gold), var(--primary-red)); margin: 0 auto; border-radius: 4px;"></div>
                                </div>
                                
                                <!-- Main Title - DINAMIS -->
                                <h1 class="display-1 batik-title mb-4 fade-in">
                                    {{ $page->title ?? 'JOSS GANDOS' }}
                                </h1>
                                
                                <!-- Subtitle Line -->
                                <div class="mb-4">
                                    <div style="height: 4px; width: 300px; background: linear-gradient(90deg, transparent, rgba(198, 40, 40, 0.7), transparent); margin: 0 auto;"></div>
                                </div>
                                
                                <!-- Description - DINAMIS -->
                                @if(isset($content['description']) && $content['description'])
                                <p class="lead mb-4 fade-in" data-delay="0.2s" style="max-width: 800px; margin: 0 auto; color: var(--medium-brown); line-height: 1.6;">
                                    {{ $content['description'] }}
                                    <br>
                                    <span class="fw-bold text-gradient" style="font-size: 2rem;">JOSS • MANTAP • LUAR BIASA</span>
                                </p>
                                @endif
                                
                                <!-- Image - DINAMIS -->
                                @if(isset($content['image']) && $content['image'])
                                <div class="my-5 fade-in" data-delay="0.3s">
                                    <img src="{{ asset('storage/pages/' . $content['image']) }}" 
                                         alt="{{ $page->title ?? 'About JOSS GANDOS' }}" 
                                         class="img-fluid rounded" 
                                         style="max-height: 400px; width: auto; border: 5px solid var(--primary-gold); box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
                                </div>
                                @endif
                                
                                <!-- Animated Stats -->
                                <div class="row justify-content-center g-4 mt-5">
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card fade-in" data-delay="0.3s">
                                            <div class="stat-number">8+</div>
                                            <p class="stat-label">TAHUN PENGALAMAN</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card fade-in" data-delay="0.4s">
                                            <div class="stat-number">50K+</div>
                                            <p class="stat-label">PELANGGAN SETIA</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card fade-in" data-delay="0.5s">
                                            <div class="stat-number">50+</div>
                                            <p class="stat-label">MENU PREMIUM</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-6">
                                        <div class="stat-card fade-in" data-delay="0.6s">
                                            <div class="stat-number">{{ $branchCount ?? '2' }}+</div>
                                            <p class="stat-label">CABANG</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Scroll Indicator -->
                                <div class="scroll-indicator mt-5 pt-5">
                                    <div class="mouse">
                                        <div class="wheel"></div>
                                    </div>
                                    <p class="text-muted mt-3 small" style="letter-spacing: 3px; font-weight: 500; color: var(--medium-brown);">
                                        SCROLL UNTUK MENJELAJAHI
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sejarah Kami Section - MODIFIKASI -->
            <section class="section-spacing">
                <div class="container">
                    <div class="history-section fade-in">
                        <div class="text-center mb-5">
                            <h2 class="display-3 fw-bold mb-4 batik-title">Sejarah Kami</h2>
                            <div class="mb-4">
                                <div style="height: 6px; width: 250px; background: linear-gradient(90deg, var(--primary-red), var(--primary-gold)); margin: 0 auto; border-radius: 3px;"></div>
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <!-- History content - DINAMIS -->
                                @if(isset($content['history']) && $content['history'])
                                <div class="mb-5">
                                    <div class="row g-4 mb-5">
                                        <div class="col-md-12">
                                            <div class="joss-gandos-glass h-100 p-5 fade-in" data-delay="0.2s">
                                                <h4 class="fw-bold mb-4" style="color: var(--dark-brown); font-size: 1.8rem;">
                                                    <i class="fas fa-history me-3" style="color: var(--primary-red);"></i>
                                                    Perjalanan Kami
                                                </h4>
                                                <div style="color: var(--medium-brown); line-height: 1.9; font-size: 1.1rem; white-space: pre-line;">
                                                    {!! nl2br(e($content['history'])) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <!-- Timeline section (static) -->
                                <div class="mt-5 pt-5 batik-border-top">
                                    <div class="text-center mb-5">
                                        <h3 class="display-4 fw-bold mb-3" style="color: var(--dark-brown);">PERJALANAN RESTO JOSS GANDOS</h3>
                                        <p class="lead mb-0" style="color: var(--primary-red); font-size: 1.5rem; font-weight: 600;">
                                            "Dari langkah kecil hingga menjadi resto kebanggaan bersama"
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Perjalanan Timeline Section -->
            <section class="journey-timeline">
                <div class="container position-relative">
                    <div class="timeline-line"></div>
                    
                    <!-- Timeline Items -->
                    <!-- 2017 -->
                    <div class="row justify-content-end mb-5 position-relative fade-in">
                        <div class="col-lg-5">
                            <div class="timeline-year">2017 — Awal Berdiri</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-seedling"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Didirikan oleh CEO Dr. Siswanto (ekspansi dari IT ke F&B)</li>
                                    <li class="mb-3">Mengusung menu khas Banyuwangi (Bebek & Rujak Soto)</li>
                                    <li class="mb-3">Nama awal: <strong>"Bebek Joss Gandos"</strong></li>
                                    <li class="mb-3">Fasilitas awal: Karaoke VIP, Wedding, Live Music setiap malam</li>
                                    <li class="mb-0">Tim awal: 15 orang dengan semangat kekeluargaan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2018-2019 -->
                    <div class="row justify-content-start mb-5 position-relative fade-in" data-delay="0.2s">
                        <div class="col-lg-5 offset-lg-1">
                            <div class="timeline-year">2018–2019 — Merintis & Inovasi</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-hands-helping"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Masa perjuangan mendapatkan kepercayaan customer dengan bangunan sederhana namun pelayanan prioritas</li>
                                    <li class="mb-3">Mengembangkan variasi menu (tidak hanya bebek)</li>
                                    <li class="mb-0">Menjadi pionir kuliner di kawasan Jemursari</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2020 -->
                    <div class="row justify-content-end mb-5 position-relative fade-in" data-delay="0.4s">
                        <div class="col-lg-5">
                            <div class="timeline-year">2020 — Bertahan di Pandemi</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Masa tersulit: tutup sementara 3 bulan & SDM terbatas</li>
                                    <li class="mb-3">Beradaptasi dengan jual sembako & pesan antar</li>
                                    <li class="mb-0">Bukti kekuatan dan solidaritas tim untuk survive</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2021 -->
                    <div class="row justify-content-start mb-5 position-relative fade-in" data-delay="0.6s">
                        <div class="col-lg-5 offset-lg-1">
                            <div class="timeline-year">2021 — Bangkit & Menu Baru</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Renovasi area VIP & Outdoor serta peluncuran menu baru</li>
                                    <li class="mb-3"><strong style="color: var(--primary-red);">Gulai Kepala Ikan Salmon (Menu Andalan)</strong></li>
                                    <li class="mb-3">Aneka menu nusantara autentik</li>
                                    <li class="mb-0">Paket acara (arisan, reuni, wedding, dll)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2022 -->
                    <div class="row justify-content-end mb-5 position-relative fade-in" data-delay="0.8s">
                        <div class="col-lg-5">
                            <div class="timeline-year">2022 — Semakin Dipercaya</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-star"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Peningkatan pesat customer event & gathering</li>
                                    <li class="mb-0">Fasilitas Karaoke VIP menjadi daya tarik utama</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2023 -->
                    <div class="row justify-content-start mb-5 position-relative fade-in" data-delay="1s">
                        <div class="col-lg-5 offset-lg-1">
                            <div class="timeline-year">2023 — Ekspansi & Menu Ikonik</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-expand-alt"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Renovasi besar: penambahan hingga 6 VIP Room</li>
                                    <li class="mb-0"><strong style="color: var(--primary-gold);">Gulai Kepala Ikan Salmon menjadi ikon</strong> (tanpa santan, kaya rempah, gurih)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2024 -->
                    <div class="row justify-content-end mb-5 position-relative fade-in" data-delay="1.2s">
                        <div class="col-lg-5">
                            <div class="timeline-year">2024 — Cabang Baru</div>
                            <div class="timeline-card">
                                <div class="milestone-icon">
                                    <i class="fas fa-store"></i>
                                </div>
                                <ul style="color: var(--medium-brown); line-height: 1.9; padding-left: 20px;">
                                    <li class="mb-3">Peningkatan layanan pesan antar & reservasi</li>
                                    <li class="mb-0"><strong style="color: var(--primary-red);">Agustus 2024: Resmi membuka cabang baru di Ketintang</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2025 - Special Card -->
                    <div class="row justify-content-center mb-5 position-relative fade-in" data-delay="1.4s">
                        <div class="col-lg-8 text-center">
                            <div class="timeline-year" style="background: linear-gradient(135deg, var(--primary-gold), var(--primary-red));">2025 — Sewindu Joss Gandos!</div>
                            <div class="timeline-card" style="background: linear-gradient(135deg, #fff9f0, #ffffff); border: 3px solid var(--primary-gold);">
                                <div class="milestone-icon" style="width: 90px; height: 90px; margin: 0 auto 30px; background: linear-gradient(135deg, var(--light-gold), var(--primary-gold));">
                                    <i class="fas fa-trophy fa-2x"></i>
                                </div>
                                <h3 class="fw-bold mb-4" style="color: var(--primary-red); font-size: 2.2rem;">
                                    8 Tahun Perjalanan Penuh Perjuangan & Inovasi
                                </h3>
                                <p style="color: var(--medium-brown); line-height: 1.9; font-size: 1.3rem; max-width: 700px; margin: 0 auto 30px;">
                                    Kami siap melangkah lebih jauh untuk menghadirkan pengalaman yang 
                                    <span class="fw-bold" style="color: var(--primary-red);">Joss</span>, 
                                    <span class="fw-bold" style="color: var(--primary-gold);">Mantap</span>, 
                                    dan <span class="fw-bold" style="color: var(--dark-red);">Luar Biasa</span>!
                                </p>
                                <div class="p-5 mt-4" style="background: linear-gradient(135deg, rgba(212, 161, 23, 0.1), rgba(198, 40, 40, 0.1)); border-radius: 15px; border-left: 5px solid var(--primary-red);">
                                    <p class="mb-0 fst-italic" style="color: var(--medium-brown); font-size: 1.3rem; line-height: 1.8;">
                                        "Terima kasih telah menjadi bagian dari perjalanan luar biasa kami."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Visi & Misi Section - MODIFIKASI -->
            <section class="section-spacing" style="background: linear-gradient(135deg, var(--white) 0%, var(--light-cream) 100%);">
                <div class="container">
                    <div class="text-center mb-5 pb-5">
                        <h2 class="display-3 fw-bold mb-4 batik-title">Visi & Misi</h2>
                        <p class="lead fade-in" style="color: var(--medium-brown); max-width: 700px; margin: 0 auto; font-size: 1.3rem;">
                            Panduan yang membimbing setiap langkah kami menuju keunggulan kuliner
                        </p>
                    </div>
                    
                    <div class="row g-5">
                        <!-- Visi - DINAMIS -->
                        <div class="col-lg-6">
                            <div class="vision-card fade-in">
                                <div class="vision-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h3 class="fw-bold mb-4 text-center" style="color: var(--dark-brown); font-size: 2.2rem;">VISI</h3>
                                @if(isset($content['vision']) && $content['vision'])
                                <p class="text-center" style="color: var(--medium-brown); line-height: 1.9; font-size: 1.3rem; padding: 0 20px; white-space: pre-line;">
                                    {{ $content['vision'] }}
                                </p>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Misi - DINAMIS -->
                        <div class="col-lg-6">
                            <div class="vision-card fade-in" data-delay="0.2s">
                                <div class="vision-icon">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h3 class="fw-bold mb-4 text-center" style="color: var(--dark-brown); font-size: 2.2rem;">MISI</h3>
                                @if(isset($content['mission']) && $content['mission'])
                                <div style="color: var(--medium-brown); line-height: 1.9; font-size: 1.1rem; padding: 0 20px; white-space: pre-line;">
                                    {!! nl2br(e($content['mission'])) !!}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Pendiri Section -->
            <section class="section-spacing" style="background: linear-gradient(180deg, var(--white), #f5f5f5);">
                <div class="container">
                    <div class="founder-card fade-in">
                        <div class="row align-items-center">
                            <!-- Founder Image -->
                            <div class="col-lg-5 text-center mb-5 mb-lg-0">
                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="founder-image" 
                                     alt="Dr. Siswanto - Pendiri Resto Joss Gandos">
                                <div class="mt-5">
                                    <h4 class="fw-bold mb-2" style="color: var(--dark-brown); font-size: 1.8rem;">Dr. Siswanto</h4>
                                    <p class="mb-2" style="color: var(--primary-red); font-weight: 700; font-size: 1.2rem; letter-spacing: 1px;">FOUNDER & CEO</p>
                                    <p class="mb-0" style="color: var(--medium-brown); font-weight: 500;">Pendiri Resto Joss Gandos</p>
                                </div>
                            </div>
                            
                            <!-- Founder Description -->
                            <div class="col-lg-7">
                                <h2 class="mb-4 batik-title" style="font-size: 2.8rem;">Pendiri Resto Joss Gandos</h2>
                                <p style="color: var(--medium-brown); line-height: 1.9; font-size: 1.2rem; margin-bottom: 25px;">
                                    Didirikan oleh <strong style="color: var(--primary-red);">Dr. Siswanto</strong> pada 
                                    <strong style="color: var(--primary-red);">28 Oktober 2017</strong>, Resto Joss Gandos lahir dari 
                                    semangat beliau untuk mengembangkan sayap ke dunia Food & Beverage (F&B) di luar 
                                    latar belakang IT. Berawal dari rintisan sederhana bernama 
                                    <strong style="color: var(--primary-gold);">"Bebek Joss Gandos"</strong>, beliau membawa resto ini 
                                    tumbuh menjadi pionir kuliner di kawasan Jemursari.
                                </p>
                                <p style="color: var(--medium-brown); line-height: 1.9; font-size: 1.2rem; margin-bottom: 30px;">
                                    Di bawah kepemimpinan beliau dengan filosofi semangat 
                                    <strong style="color: var(--primary-red);">"Joss, Mantap, dan Luar Biasa"</strong>, resto ini sukses 
                                    melewati tantangan pandemi dan terus berinovasi—salah satunya melalui menu ikonik 
                                    <strong style="color: var(--primary-gold);">Gulai Kepala Ikan Salmon</strong>. Dedikasi beliau adalah 
                                    memastikan setiap tamu merasakan kehangatan pelayanan dan cita rasa yang tak terlupakan.
                                </p>
                                
                                <!-- Founder Quote -->
                                <div class="founder-quote mt-5 pt-3">
                                    <p class="mb-0">
                                        "Di JOSS GANDOS, kami tidak hanya menyajikan makanan, kami menghidangkan 
                                        cerita dan kenangan yang akan selalu dikenang."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tim Kami Section -->
            <section class="section-spacing" style="background: linear-gradient(135deg, var(--white) 0%, var(--light-cream) 100%);">
                <div class="container">
                    <div class="text-center mb-5 pb-5">
                        <h2 class="display-3 fw-bold mb-4 batik-title">Tim Kami</h2>
                        <p class="lead fade-in" style="color: var(--medium-brown); max-width: 700px; margin: 0 auto; font-size: 1.3rem;">
                            Keluarga besar yang bekerja dengan hati untuk menghadirkan pengalaman terbaik
                        </p>
                    </div>
                    
                    <div class="row g-5">
                        <!-- Team Member 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card fade-in">
                                <img src="https://images.unsplash.com/photo-1583394293214-28ded15ee548?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="team-image" 
                                     alt="Head Chef">
                                <div class="team-overlay">
                                    <h5 class="fw-bold text-white mb-2" style="font-size: 1.6rem;">Sigit Priandoko</h5>
                                    <p class="mb-0" style="color: #FFD700; font-weight: 600; letter-spacing: 1px;">HEAD CULINARY ARTIST</p>
                                </div>
                                <div class="p-4">
                                    <p class="fst-italic mb-0 text-center" style="color: var(--medium-brown); line-height: 1.8;">
                                        "Setiap rempah memiliki karakter unik. Seni saya adalah menyatukan mereka dalam harmoni yang sempurna."
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Team Member 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card fade-in" data-delay="0.2s">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="team-image" 
                                     alt="Experience Director">
                                <div class="team-overlay">
                                    <h5 class="fw-bold text-white mb-2" style="font-size: 1.6rem;">Aning Suhartatik S.E.</h5>
                                    <p class="mb-0" style="color: #FFD700; font-weight: 600; letter-spacing: 1px;">EXPERIENCE DIRECTOR</p>
                                </div>
                                <div class="p-4">
                                    <p class="fst-italic mb-0 text-center" style="color: var(--medium-brown); line-height: 1.8;">
                                        "Pengalaman kuliner dimulai dari sapaan hangat dan berlanjut dalam setiap gigitan yang memuaskan."
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Team Member 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="team-card fade-in" data-delay="0.4s">
                                <img src="https://images.unsplash.com/photo-1559056199-641a0ac8b55e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                                     class="team-image" 
                                     alt="Service Manager">
                                <div class="team-overlay">
                                    <h5 class="fw-bold text-white mb-2" style="font-size: 1.6rem;">Budi Santoso</h5>
                                    <p class="mb-0" style="color: #FFD700; font-weight: 600; letter-spacing: 1px;">SERVICE MANAGER</p>
                                </div>
                                <div class="p-4">
                                    <p class="fst-italic mb-0 text-center" style="color: var(--medium-brown); line-height: 1.8;">
                                        "Setiap pelanggan adalah tamu kehormatan. Senyuman adalah bahasa universal kebahagiaan."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        </div>

        <!-- JavaScript for Animations -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Intersection Observer for fade-in animations
                const fadeElements = document.querySelectorAll('.fade-in');
                
                const fadeObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const delay = entry.target.dataset.delay || 0;
                            setTimeout(() => {
                                entry.target.classList.add('visible');
                            }, delay * 1000);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -100px 0px'
                });
                
                fadeElements.forEach(element => {
                    fadeObserver.observe(element);
                });
                
                // Animate stats numbers
                const statNumbers = document.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const originalText = stat.textContent;
                    const number = parseInt(originalText.replace(/[^0-9]/g, ''));
                    
                    if (!isNaN(number)) {
                        let current = 0;
                        const increment = number / 20;
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= number) {
                                current = number;
                                clearInterval(timer);
                            }
                            stat.textContent = Math.floor(current) + originalText.replace(number, '');
                        }, 50);
                    }
                });
                
                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        if (targetId === '#') return;
                        
                        const target = document.querySelector(targetId);
                        if (target) {
                            window.scrollTo({
                                top: target.offsetTop - 80,
                                behavior: 'smooth'
                            });
                        }
                    });
                });
                
                // Add hover effects to cards
                const cards = document.querySelectorAll('.timeline-card, .vision-card, .team-card, .founder-card, .stat-card');
                cards.forEach(card => {
                    card.addEventListener('mouseenter', function() {
                        this.style.zIndex = '10';
                    });
                    
                    card.addEventListener('mouseleave', function() {
                        this.style.zIndex = '1';
                    });
                });
                
                // Scroll indicator fade out
                window.addEventListener('scroll', function() {
                    const scrollIndicator = document.querySelector('.scroll-indicator');
                    if (scrollIndicator) {
                        if (window.scrollY > 100) {
                            scrollIndicator.style.opacity = '0';
                            scrollIndicator.style.transform = 'translateY(-20px)';
                            scrollIndicator.style.pointerEvents = 'none';
                        } else {
                            scrollIndicator.style.opacity = '1';
                            scrollIndicator.style.transform = 'translateY(0)';
                            scrollIndicator.style.pointerEvents = 'all';
                        }
                    }
                });
                
                // Add loading animation to page
                document.body.classList.add('loaded');
            });
            
            // Add CSS for loaded state
            const style = document.createElement('style');
            style.textContent = `
                body.loaded .hero-batik-section {
                    animation: fadeInUp 1s ease-out;
                }
                
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            `;
            document.head.appendChild(style);
        </script>
    </div>
@endsection