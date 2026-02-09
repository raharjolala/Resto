@extends('layouts.app')

@section('title', 'Menu & Promo - JOSS GANDOS Restoran')

@section('styles')
<style>
    /* Hero Carousel Section - IMPROVED & FIXED */
    .hero-carousel-section {
        position: relative;
        margin-top: 80px;
        overflow: hidden;
        height: 85vh;
        min-height: 650px;
        max-height: 900px;
        background: linear-gradient(135deg, var(--dark-charcoal) 0%, #1a1a1a 100%);
    }
    
    .hero-carousel {
        height: 100%;
        position: relative;
    }
    
    .carousel-item {
        height: 100%;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        animation: zoomEffect 20s ease-in-out infinite alternate;
    }
    
    @keyframes zoomEffect {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.05);
        }
    }
    
    .carousel-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(0, 0, 0, 0.85) 0%,
            rgba(139, 0, 0, 0.5) 50%,
            rgba(212, 160, 23, 0.25) 100%);
        z-index: 1;
    }
    
    .carousel-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23D4A017' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
        z-index: 1;
        pointer-events: none;
    }
    
    .carousel-content {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        right: 0;
        padding: 0 8%;
        z-index: 2;
        color: white;
        text-align: center;
    }
    
    .promo-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        padding: 14px 35px;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 700;
        letter-spacing: 2px;
        margin-bottom: 35px;
        box-shadow: 0 10px 30px rgba(178, 34, 34, 0.5);
        text-transform: uppercase;
        border: 2px solid rgba(255, 255, 255, 0.3);
        animation: badgePulse 3s infinite;
        position: relative;
        overflow: hidden;
    }
    
    .promo-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.8s ease;
    }
    
    .promo-badge:hover::before {
        left: 100%;
    }
    
    @keyframes badgePulse {
        0%, 100% {
            transform: translateY(0) scale(1);
            box-shadow: 0 10px 30px rgba(178, 34, 34, 0.5);
        }
        50% {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 40px rgba(178, 34, 34, 0.7);
        }
    }
    
    .carousel-title {
        font-family: 'Libre Baskerville', serif;
        font-size: 5rem;
        font-weight: 800;
        margin-bottom: 25px;
        line-height: 1.1;
        text-shadow: 4px 4px 20px rgba(0, 0, 0, 0.7);
        position: relative;
        display: inline-block;
        background: linear-gradient(135deg, white, var(--accent-gold));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: titleGlow 3s ease-in-out infinite alternate;
    }
    
    @keyframes titleGlow {
        0% {
            filter: drop-shadow(0 0 10px rgba(255, 193, 69, 0.3));
        }
        100% {
            filter: drop-shadow(0 0 20px rgba(255, 193, 69, 0.6));
        }
    }
    
    .carousel-title::after {
        content: '';
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 200px;
        height: 5px;
        background: linear-gradient(90deg, transparent, var(--accent-gold), var(--primary-red), transparent);
        border-radius: 3px;
    }
    
    .carousel-subtitle {
        font-size: 1.6rem;
        max-width: 800px;
        margin: 40px auto 50px;
        opacity: 0.9;
        line-height: 1.7;
        font-family: 'Inter', sans-serif;
        font-weight: 300;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        padding: 0 20px;
    }
    
    .promo-price-container {
        background: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 25px 40px;
        display: inline-block;
        margin-bottom: 50px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }
    
    .promo-price {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 25px;
    }
    
    .current-price {
        font-size: 4.5rem;
        font-weight: 800;
        color: var(--accent-gold);
        text-shadow: 3px 3px 15px rgba(0, 0, 0, 0.5);
        position: relative;
        line-height: 1;
    }
    
    .current-price::before {
        content: 'Rp';
        font-size: 1.8rem;
        position: absolute;
        top: -15px;
        left: -45px;
        color: rgba(255, 255, 255, 0.7);
    }
    
    .old-price {
        font-size: 2.5rem;
        text-decoration: line-through;
        color: rgba(255, 255, 255, 0.4);
        position: relative;
        font-weight: 300;
    }
    
    .old-price::before {
        content: 'Rp';
        font-size: 1.2rem;
        position: absolute;
        top: -10px;
        left: -30px;
        color: rgba(255, 255, 255, 0.4);
    }
    
    .carousel-btn {
        background: linear-gradient(135deg, var(--accent-gold), var(--secondary-gold));
        color: var(--dark-charcoal);
        border: none;
        padding: 22px 55px;
        border-radius: 50px;
        font-weight: 800;
        font-size: 1.4rem;
        letter-spacing: 1px;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 15px 40px rgba(212, 160, 23, 0.5);
        position: relative;
        overflow: hidden;
        cursor: pointer;
        text-transform: uppercase;
    }
    
    .carousel-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.8s ease;
    }
    
    .carousel-btn:hover::before {
        left: 100%;
    }
    
    .carousel-btn:hover {
        transform: translateY(-8px) scale(1.05);
        box-shadow: 0 25px 60px rgba(212, 160, 23, 0.7);
        letter-spacing: 2px;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        margin: 0 50px;
        backdrop-filter: blur(15px);
        border: 2px solid rgba(255, 255, 255, 0.15);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        opacity: 0;
        animation: controlsFadeIn 1s ease forwards;
        animation-delay: 1s;
    }
    
    @keyframes controlsFadeIn {
        to {
            opacity: 1;
        }
    }
    
    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-50%) scale(1.15);
        border-color: rgba(255, 255, 255, 0.3);
    }
    
    .carousel-indicators {
        bottom: 60px;
        gap: 15px;
    }
    
    .carousel-indicators button {
        width: 18px !important;
        height: 18px !important;
        border-radius: 50%;
        margin: 0 !important;
        border: 3px solid rgba(255, 255, 255, 0.3);
        background: transparent;
        opacity: 0.7;
        transition: all 0.4s ease;
    }
    
    .carousel-indicators button.active {
        background: var(--accent-gold);
        border-color: var(--accent-gold);
        opacity: 1;
        transform: scale(1.3);
        box-shadow: 0 0 20px var(--accent-gold);
    }
    
    /* Menu Section */
    .menu-section {
        padding: 100px 0;
        background-color: var(--neutral-cream);
        position: relative;
        overflow: hidden;
    }
    
    .menu-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--secondary-gold), transparent);
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 70px;
        position: relative;
    }
    
    .section-title h2 {
        font-family: 'Libre Baskerville', serif;
        font-size: 3rem;
        color: var(--dark-charcoal);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
        padding: 0 50px;
    }
    
    .section-title h2::before,
    .section-title h2::after {
        content: '✻';
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-red);
        font-size: 2rem;
        opacity: 0.7;
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
        gap: 20px;
        margin-top: 20px;
    }
    
    .title-decoration span {
        width: 60px;
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
        width: 12px;
        height: 12px;
        background: var(--secondary-gold);
        border-radius: 50%;
    }
    
    .section-subtitle {
        color: var(--warm-brown);
        max-width: 700px;
        margin: 0 auto 40px;
        text-align: center;
        font-size: 1.2rem;
        line-height: 1.8;
        font-family: 'Inter', sans-serif;
    }
    
    /* Category Navigation */
    .category-nav {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 60px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(139, 0, 0, 0.1);
        backdrop-filter: blur(10px);
    }
    
    .category-btn {
        background: white;
        border: 2px solid var(--light-gray);
        color: var(--dark-charcoal);
        padding: 15px 30px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }
    
    .category-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }
    
    .category-btn:hover::before {
        left: 100%;
    }
    
    .category-btn:hover,
    .category-btn.active {
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        border-color: transparent;
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 15px 30px rgba(178, 34, 34, 0.25);
    }
    
    .category-btn i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }
    
    .category-btn:hover i,
    .category-btn.active i {
        transform: scale(1.2);
    }
    
    /* Menu Cards - FIXED TEXT ISSUE */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 40px;
    }
    
    .menu-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        height: 100%;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.03);
        cursor: default;
        transform-style: preserve-3d;
        perspective: 1000px;
    }
    
    .menu-card:hover {
        transform: translateY(-20px) rotateX(5deg);
        box-shadow: 0 40px 80px rgba(0, 0, 0, 0.15);
    }
    
    .menu-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-red), var(--secondary-gold), var(--accent-gold));
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 2;
    }
    
    .menu-card:hover::before {
        opacity: 1;
    }
    
    .menu-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(178, 34, 34, 0.05) 0%,
            rgba(212, 160, 23, 0.03) 50%,
            transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        pointer-events: none;
    }
    
    .menu-card:hover::after {
        opacity: 1;
    }
    
    .card-image {
        height: 250px;
        overflow: hidden;
        position: relative;
    }
    
    .card-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 50%, rgba(0, 0, 0, 0.3));
        opacity: 0;
        transition: opacity 0.6s ease;
    }
    
    .menu-card:hover .card-image::after {
        opacity: 1;
    }
    
    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1s cubic-bezier(0.23, 1, 0.32, 1);
        filter: brightness(0.95);
    }
    
    .menu-card:hover .card-image img {
        transform: scale(1.15);
        filter: brightness(1.05);
    }
    
    .card-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, var(--primary-red), var(--primary-dark));
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 1px;
        z-index: 2;
        opacity: 1;
        transition: all 0.4s ease;
        box-shadow: 0 5px 15px rgba(178, 34, 34, 0.3);
        border: 2px solid rgba(255, 255, 255, 0.2);
    }
    
    .menu-card:hover .card-badge {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(178, 34, 34, 0.4);
    }
    
    .card-content {
        padding: 30px;
        position: relative;
        background: white;
    }
    
    .card-content::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 30px;
        right: 30px;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--secondary-gold), transparent);
        opacity: 0;
        transition: opacity 0.6s ease;
    }
    
    .menu-card:hover .card-content::before {
        opacity: 1;
    }
    
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
        position: relative;
    }
    
    .card-title {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-charcoal);
        margin-bottom: 8px;
        line-height: 1.3;
        transition: color 0.4s ease;
        flex: 1;
        /* FIXED: Remove gradient text effects */
        background: none !important;
        -webkit-background-clip: initial !important;
        -webkit-text-fill-color: initial !important;
        background-clip: initial !important;
    }
    
    .menu-card:hover .card-title {
        color: var(--primary-dark);
        text-shadow: 0 2px 4px rgba(178, 34, 34, 0.1);
    }
    
    .card-price {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary-red);
        position: relative;
        padding: 5px 0;
        transition: all 0.4s ease;
        white-space: nowrap;
        margin-left: 15px;
        background: none;
        -webkit-text-fill-color: var(--primary-red);
    }
    
    .card-price::before {
        content: 'Rp';
        font-size: 0.9rem;
        position: absolute;
        top: -8px;
        left: -20px;
        color: var(--warm-brown);
    }
    
    .menu-card:hover .card-price {
        transform: scale(1.1);
        color: var(--primary-dark);
    }
    
    .card-desc {
        color: var(--warm-brown);
        font-size: 1rem;
        margin-bottom: 25px;
        line-height: 1.7;
        position: relative;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        transition: color 0.4s ease;
        background: none;
        -webkit-text-fill-color: var(--warm-brown);
    }
    
    .menu-card:hover .card-desc {
        color: var(--dark-charcoal);
        -webkit-text-fill-color: var(--dark-charcoal);
    }
    
    .card-tags {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    
    .card-tag {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.4s ease;
        border: 2px solid transparent;
        background: none;
        -webkit-text-fill-color: inherit;
    }
    
    .menu-card:hover .card-tag {
        transform: translateY(-3px);
    }
    
    .tag-spicy {
        background: rgba(230, 57, 70, 0.1);
        color: #e63946;
        border-color: rgba(230, 57, 70, 0.2);
        -webkit-text-fill-color: #e63946;
    }
    
    .menu-card:hover .tag-spicy {
        background: rgba(230, 57, 70, 0.15);
        box-shadow: 0 5px 15px rgba(230, 57, 70, 0.15);
    }
    
    .tag-veg {
        background: rgba(42, 157, 143, 0.1);
        color: #2a9d8f;
        border-color: rgba(42, 157, 143, 0.2);
        -webkit-text-fill-color: #2a9d8f;
    }
    
    .menu-card:hover .tag-veg {
        background: rgba(42, 157, 143, 0.15);
        box-shadow: 0 5px 15px rgba(42, 157, 143, 0.15);
    }
    
    .tag-best {
        background: rgba(212, 160, 23, 0.1);
        color: var(--secondary-gold);
        border-color: rgba(212, 160, 23, 0.2);
        -webkit-text-fill-color: var(--secondary-gold);
    }
    
    .menu-card:hover .tag-best {
        background: rgba(212, 160, 23, 0.15);
        box-shadow: 0 5px 15px rgba(212, 160, 23, 0.15);
    }
    
    .tag-popular {
        background: rgba(155, 89, 182, 0.1);
        color: #9b59b6;
        border-color: rgba(155, 89, 182, 0.2);
        -webkit-text-fill-color: #9b59b6;
    }
    
    .menu-card:hover .tag-popular {
        background: rgba(155, 89, 182, 0.15);
        box-shadow: 0 5px 15px rgba(155, 89, 182, 0.15);
    }
    
    .card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 2px solid rgba(0, 0, 0, 0.05);
        opacity: 0.8;
        transition: all 0.4s ease;
    }
    
    .menu-card:hover .card-footer {
        opacity: 1;
        border-top-color: rgba(212, 160, 23, 0.2);
    }
    
    .serving-info {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 0.9rem;
        color: var(--warm-brown);
        transition: all 0.3s ease;
        background: none;
        -webkit-text-fill-color: var(--warm-brown);
    }
    
    .menu-card:hover .serving-info {
        color: var(--dark-charcoal);
        -webkit-text-fill-color: var(--dark-charcoal);
    }
    
    .serving-info i {
        color: var(--secondary-gold);
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    
    .menu-card:hover .serving-info i {
        color: var(--primary-red);
        transform: scale(1.2);
    }
    
    .menu-icon {
        font-size: 1.5rem;
        color: var(--warm-brown);
        transition: all 0.4s ease;
    }
    
    .menu-card:hover .menu-icon {
        color: var(--primary-red);
        transform: rotate(15deg) scale(1.2);
    }
    
    /* Drink Cards */
    .drink-card {
        position: relative;
        overflow: hidden;
    }
    
    .drink-card .card-image {
        height: 220px;
    }
    
    .drink-type {
        position: absolute;
        top: 20px;
        left: 20px;
        background: rgba(0, 0, 0, 0.75);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        gap: 8px;
        z-index: 2;
        transition: all 0.4s ease;
        border: 2px solid rgba(255, 255, 255, 0.1);
        -webkit-text-fill-color: white;
    }
    
    .drink-card:hover .drink-type {
        transform: translateY(-5px);
        background: rgba(0, 0, 0, 0.85);
    }
    
    /* Special highlight for featured items */
    .featured-card {
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(212, 160, 23, 0.3);
    }
    
    .featured-card::after {
        content: '⭐ FEATURED';
        position: absolute;
        top: 25px;
        left: -35px;
        background: linear-gradient(135deg, var(--accent-gold), var(--secondary-gold));
        color: var(--dark-charcoal);
        padding: 8px 45px;
        font-size: 0.8rem;
        font-weight: 800;
        transform: rotate(-45deg);
        letter-spacing: 1.5px;
        box-shadow: 0 5px 20px rgba(212, 160, 23, 0.4);
        z-index: 2;
        border: 2px solid rgba(255, 255, 255, 0.3);
        -webkit-text-fill-color: var(--dark-charcoal);
    }
    
    /* Animations */
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
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.8s ease forwards;
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .carousel-title {
            font-size: 4rem;
        }
        
        .current-price {
            font-size: 3.5rem;
        }
        
        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 35px;
        }
    }
    
    @media (max-width: 992px) {
        .hero-carousel-section {
            height: 75vh;
            min-height: 550px;
        }
        
        .carousel-title {
            font-size: 3.2rem;
        }
        
        .carousel-subtitle {
            font-size: 1.4rem;
        }
        
        .current-price {
            font-size: 2.8rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
        }
        
        .menu-grid {
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .category-btn {
            padding: 12px 25px;
            font-size: 0.95rem;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            height: 60px;
            margin: 0 30px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-carousel-section {
            height: 70vh;
            min-height: 500px;
            margin-top: 70px;
        }
        
        .carousel-title {
            font-size: 2.8rem;
        }
        
        .carousel-subtitle {
            font-size: 1.2rem;
            padding: 0 10%;
        }
        
        .current-price {
            font-size: 2.5rem;
        }
        
        .current-price::before {
            font-size: 1.4rem;
            left: -35px;
        }
        
        .carousel-btn {
            padding: 18px 40px;
            font-size: 1.2rem;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            margin: 0 20px;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            padding: 0 40px;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            padding: 0 20px;
        }
        
        .category-nav {
            padding: 15px;
            gap: 10px;
        }
        
        .category-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
        
        .menu-grid {
            grid-template-columns: 1fr;
            gap: 30px;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .card-image {
            height: 220px;
        }
    }
    
    @media (max-width: 576px) {
        .hero-carousel-section {
            height: 65vh;
            min-height: 450px;
        }
        
        .carousel-title {
            font-size: 2.2rem;
        }
        
        .carousel-subtitle {
            font-size: 1.1rem;
            margin: 30px auto 40px;
        }
        
        .current-price {
            font-size: 2rem;
        }
        
        .old-price {
            font-size: 1.8rem;
        }
        
        .promo-badge {
            padding: 12px 25px;
            font-size: 1rem;
            margin-bottom: 25px;
        }
        
        .carousel-btn {
            padding: 15px 35px;
            font-size: 1.1rem;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
            padding: 0 30px;
        }
        
        .section-subtitle {
            font-size: 1rem;
            padding: 0 15px;
        }
        
        .card-title {
            font-size: 1.3rem;
        }
        
        .card-price {
            font-size: 1.5rem;
        }
        
        .card-price::before {
            font-size: 0.8rem;
            left: -15px;
        }
        
        .card-desc {
            font-size: 0.95rem;
        }
        
        .carousel-indicators {
            bottom: 40px;
        }
    }
</style>
@endsection

@section('content')
    <!-- Hero Carousel Section -->
    <section class="hero-carousel-section">
        <div id="promoCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <!-- Promo 1 -->
                <div class="carousel-item active" style="background-image: url('https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-content">
                        <span class="promo-badge">PROMO SPESIAL</span>
                        <h1 class="carousel-title">Rendang Sapi Premium</h1>
                        <p class="carousel-subtitle">Dimasak 8 jam dengan 27 rempah pilihan khas Padang. Promosi terbatas hanya bulan ini.</p>
                        <div class="promo-price-container">
                            <div class="promo-price">
                                <span class="current-price">45.000</span>
                                <span class="old-price">55.000</span>
                            </div>
                        </div>
                        <button class="carousel-btn">Pesan Sekarang</button>
                    </div>
                </div>
                
                <!-- Promo 2 -->
                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-content">
                        <span class="promo-badge">PAKET KELUARGA</span>
                        <h1 class="carousel-title">Paket Hemat 4 Orang</h1>
                        <p class="carousel-subtitle">Nikmati 4 menu utama plus minuman spesial dengan harga hemat hingga 30%.</p>
                        <div class="promo-price-container">
                            <div class="promo-price">
                                <span class="current-price">150.000</span>
                                <span class="old-price">210.000</span>
                            </div>
                        </div>
                        <button class="carousel-btn">Lihat Paket</button>
                    </div>
                </div>
                
                <!-- Promo 3 -->
                <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
                    <div class="carousel-content">
                        <span class="promo-badge">BUY 1 GET 1</span>
                        <h1 class="carousel-title">Minuman Segar Double</h1>
                        <p class="carousel-subtitle">Setiap pembelian 1 es teh manis atau jus alpukat dapat 1 gratis. Setiap hari pukul 14-16 WIB.</p>
                        <div class="promo-price-container">
                            <div class="promo-price">
                                <span class="current-price">Hemat 50%</span>
                            </div>
                        </div>
                        <button class="carousel-btn">Lihat Menu</button>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-section">
        <div class="container">
            <div class="section-title animate-fade-in">
                <h2>Menu Kuliner Nusantara</h2>
                <div class="title-decoration">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <p class="section-subtitle">Setiap hidangan dibuat dengan cinta dan rempah pilihan, menjaga keaslian rasa Indonesia dengan sentuhan modern yang elegan.</p>
            </div>
            
            <!-- Category Navigation -->
            <div class="category-nav animate-fade-in">
                <button class="category-btn active" data-category="all">
                    <i class="fas fa-utensils"></i> Semua Menu
                </button>
                <button class="category-btn" data-category="main">
                    <i class="fas fa-drumstick-bite"></i> Menu Utama
                </button>
                <button class="category-btn" data-category="appetizer">
                    <i class="fas fa-leaf"></i> Pembuka
                </button>
                <button class="category-btn" data-category="drink">
                    <i class="fas fa-glass-whiskey"></i> Minuman
                </button>
                <button class="category-btn" data-category="dessert">
                    <i class="fas fa-ice-cream"></i> Pencuci Mulut
                </button>
                <button class="category-btn" data-category="popular">
                    <i class="fas fa-fire"></i> Populer
                </button>
            </div>
            
            <!-- Menu Grid -->
            <div class="menu-grid">
                <!-- Main Dishes -->
                <div class="menu-card featured-card" data-category="main popular">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Nasi Goreng Spesial">
                        <span class="card-badge">BEST SELLER</span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Nasi Goreng Spesial JOSS</h3>
                            <span class="card-price">45.000</span>
                        </div>
                        <p class="card-desc">Dengan ayam suwir premium, udang segar, telur kampung, dan sayuran organik. Disajikan dengan kerupuk udang dan acar segar.</p>
                        <div class="card-tags">
                            <span class="card-tag tag-spicy">
                                <i class="fas fa-pepper-hot"></i> Pedas Level 2
                            </span>
                            <span class="card-tag tag-best">
                                <i class="fas fa-crown"></i> Terlaris
                            </span>
                            <span class="card-tag tag-popular">
                                <i class="fas fa-fire"></i> Populer
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-user-friends"></i>
                                <span>Untuk 1-2 orang</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card" data-category="main">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Rendang Sapi">
                        <span class="card-badge">PREMIUM</span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Rendang Sapi Padang</h3>
                            <span class="card-price">55.000</span>
                        </div>
                        <p class="card-desc">Dimasak 8 jam dengan 27 rempah pilihan khas Minang. Daging empuk dengan bumbu meresap sempurna.</p>
                        <div class="card-tags">
                            <span class="card-tag tag-spicy">
                                <i class="fas fa-pepper-hot"></i> Pedas Level 3
                            </span>
                            <span class="card-tag">
                                <i class="fas fa-clock"></i> 8 Jam Dimasak
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-user"></i>
                                <span>Untuk 1 orang</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-fire"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Appetizers -->
                <div class="menu-card" data-category="appetizer popular">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1563379091339-03246963d9d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Sate Ayam">
                        <span class="card-badge">SIGNATURE</span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Sate Ayam Madura Premium</h3>
                            <span class="card-price">35.000</span>
                        </div>
                        <p class="card-desc">12 tusuk sate ayam dengan bumbu kacang khas Madura. Disajikan dengan lontong, bawang merah, dan sambal kecap.</p>
                        <div class="card-tags">
                            <span class="card-tag tag-spicy">
                                <i class="fas fa-pepper-hot"></i> Pedas Level 2
                            </span>
                            <span class="card-tag tag-popular">
                                <i class="fas fa-star"></i> Favorit
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-user-friends"></i>
                                <span>Untuk 2-3 orang</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-utensil-spoon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card" data-category="appetizer">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Lumpia">
                        <span class="card-badge">VEGETARIAN</span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Lumpia Sayur Segar</h3>
                            <span class="card-price">28.000</span>
                        </div>
                        <p class="card-desc">Lumpia renyah dengan isian wortel, buncis, taoge, dan jamur. Disajikan dengan saus asam manis spesial.</p>
                        <div class="card-tags">
                            <span class="card-tag tag-veg">
                                <i class="fas fa-leaf"></i> Vegetarian
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-user-friends"></i>
                                <span>Untuk 2-3 orang</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Drinks -->
                <div class="menu-card drink-card" data-category="drink popular">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1561047029-3000c68339ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Es Cincau">
                        <span class="drink-type">
                            <i class="fas fa-snowflake"></i> Dingin Menyegarkan
                        </span>
                        <span class="card-badge">REKOMENDASI</span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Es Cincau Hitam Spesial</h3>
                            <span class="card-price">15.000</span>
                        </div>
                        <p class="card-desc">Cincau hitam organik dengan sirup gula merah aren dan santan segar. Menyegarkan di hari panas.</p>
                        <div class="card-tags">
                            <span class="card-tag tag-best">
                                <i class="fas fa-star"></i> Rekomendasi
                            </span>
                            <span class="card-tag tag-popular">
                                <i class="fas fa-glass"></i> Terlaris
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-glass"></i>
                                <span>500 ml - Jumbo</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-glass-whiskey"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card drink-card" data-category="drink">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1569760142069-bc6838de16c1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Wedang Jahe">
                        <span class="drink-type">
                            <i class="fas fa-fire"></i> Hangat Menyehatkan
                        </span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Wedang Jahe Madu Murni</h3>
                            <span class="card-price">18.000</span>
                        </div>
                        <p class="card-desc">Jahe segar pilihan dengan madu hutan asli. Menghangatkan tubuh dan baik untuk kesehatan.</p>
                        <div class="card-tags">
                            <span class="card-tag">
                                <i class="fas fa-heartbeat"></i> Menyehatkan
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-glass"></i>
                                <span>300 ml - Hangat</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-mug-hot"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Desserts -->
                <div class="menu-card" data-category="dessert">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Es Campur">
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Es Campur Spesial JOSS</h3>
                            <span class="card-price">22.000</span>
                        </div>
                        <p class="card-desc">Campuran buah segar, cincau, kolang-kaling, nata de coco, dan alpukat dengan sirup merah spesial.</p>
                        <div class="card-tags">
                            <span class="card-tag">
                                <i class="fas fa-snowflake"></i> Dingin Segar
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-bowl"></i>
                                <span>1 mangkok besar</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-ice-cream"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="menu-card" data-category="dessert">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Klepon">
                        <span class="card-badge">TRADISIONAL</span>
                    </div>
                    <div class="card-content">
                        <div class="card-header">
                            <h3 class="card-title">Klepon Gula Merah Autentik</h3>
                            <span class="card-price">18.000</span>
                        </div>
                        <p class="card-desc">Kue tradisional dari beras ketan dengan isi gula merah aren, dibalur kelapa parut segar.</p>
                        <div class="card-tags">
                            <span class="card-tag">
                                <i class="fas fa-history"></i> Tradisional
                            </span>
                        </div>
                        <div class="card-footer">
                            <div class="serving-info">
                                <i class="fas fa-box"></i>
                                <span>6 biji premium</span>
                            </div>
                            <div class="menu-icon">
                                <i class="fas fa-cookie-bite"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Category filtering
    document.addEventListener('DOMContentLoaded', function() {
        const categoryButtons = document.querySelectorAll('.category-btn');
        const menuCards = document.querySelectorAll('.menu-card');
        
        categoryButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const category = this.getAttribute('data-category');
                
                // Show/hide cards based on category
                menuCards.forEach(card => {
                    const cardCategories = card.getAttribute('data-category').split(' ');
                    
                    if (category === 'all' || cardCategories.includes(category)) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0) rotateX(0)';
                        }, 10);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px) rotateX(10deg)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
        
        // Auto-rotate carousel every 5 seconds
        const myCarousel = document.getElementById('promoCarousel');
        if (myCarousel) {
            const carousel = new bootstrap.Carousel(myCarousel, {
                interval: 5000,
                wrap: true
            });
        }
        
        // Remove click animation from cards
        menuCards.forEach(card => {
            card.addEventListener('click', function(e) {
                e.preventDefault();
            });
        });
        
        // Parallax effect for hero carousel
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const heroSection = document.querySelector('.hero-carousel-section');
            
            if (heroSection && scrolled < 600) {
                const rate = scrolled * -0.2;
                heroSection.style.transform = `translate3d(0, ${rate}px, 0)`;
            }
        });
        
        // Initialize all cards with fade-in animation
        menuCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(40px) rotateX(15deg)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) rotateX(0)';
            }, 100 + (index * 100));
        });
        
        // Console greeting
        console.log('%c🍽️ Menu Eksklusif JOSS GANDOS 🍽️', 
            'background: linear-gradient(135deg, #B22222, #D4A017); color: white; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: bold;');
        console.log('%c"Keaslian rasa Nusantara, disajikan dengan keanggunan modern."', 'color: #8B7355; font-style: italic; font-size: 14px;');
        
        // Add floating animation to promo badge
        const promoBadge = document.querySelector('.promo-badge');
        if (promoBadge) {
            promoBadge.classList.add('animate-float');
        }
        
        // Add subtle animation to category buttons on load
        setTimeout(() => {
            categoryButtons.forEach((btn, index) => {
                setTimeout(() => {
                    btn.style.transform = 'translateY(0)';
                    btn.style.opacity = '1';
                }, 200 + (index * 100));
            });
        }, 500);
    });
</script>
@endsection