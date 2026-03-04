@extends('layouts.admin')

@section('title', 'Kelola Menu')
@section('page-title', 'Kelola Menu')

@section('styles')
<style>
    /* ===== PREMIUM AESTHETIC RED THEME ===== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap');
    
    :root {
        /* Premium Red Palette */
        --red-50: #FFF5F5;
        --red-100: #FFE3E3;
        --red-200: #FFC9C9;
        --red-300: #FFA8A8;
        --red-400: #FF8787;
        --red-500: #DC143C;
        --red-600: #B22234;
        --red-700: #8B0000;
        --red-800: #5C0000;
        --red-900: #2E0000;
        
        /* Neutral Colors */
        --gray-50: #F8F9FA;
        --gray-100: #F1F3F5;
        --gray-200: #E9ECEF;
        --gray-300: #DEE2E6;
        --gray-400: #CED4DA;
        --gray-500: #ADB5BD;
        --gray-600: #6C757D;
        --gray-700: #495057;
        --gray-800: #343A40;
        --gray-900: #212529;
        
        /* Gradients Premium */
        --gradient-primary: linear-gradient(135deg, #DC143C 0%, #B22234 50%, #8B0000 100%);
        --gradient-soft: linear-gradient(135deg, #FFF5F5 0%, #FFE3E3 100%);
        --gradient-glass: linear-gradient(135deg, rgba(220, 20, 60, 0.05) 0%, rgba(139, 0, 0, 0.02) 100%);
        
        /* Shadows */
        --shadow-sm: 0 2px 8px rgba(220, 20, 60, 0.08);
        --shadow-md: 0 4px 20px rgba(220, 20, 60, 0.12);
        --shadow-lg: 0 8px 30px rgba(220, 20, 60, 0.16);
        
        /* Border Radius */
        --radius-sm: 8px;
        --radius-md: 12px;
        --radius-lg: 16px;
        --radius-xl: 24px;
        --radius-2xl: 32px;
        --radius-full: 9999px;
        
        /* Fonts */
        --font-sans: 'Inter', sans-serif;
        --font-serif: 'Playfair Display', serif;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: var(--font-sans);
        background: var(--gray-50);
    }

    /* ===== MAIN CONTAINER ===== */
    .menu-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
    }

    /* ===== HEADER CARD ===== */
    .header-card {
        background: white;
        border-radius: var(--radius-2xl);
        box-shadow: var(--shadow-lg);
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(220, 20, 60, 0.1);
        animation: slideDown 0.5s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .header-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        z-index: 10;
    }

    .header-content {
        padding: 2rem 2.5rem;
        background: linear-gradient(135deg, rgba(255, 245, 245, 0.8) 0%, white 100%);
        backdrop-filter: blur(10px);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .header-title {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .header-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-soft);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--red-500);
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(220, 20, 60, 0.2);
        transition: transform 0.3s ease;
    }

    .header-icon:hover {
        transform: scale(1.1) rotate(5deg);
    }

    .header-text h1 {
        font-family: var(--font-serif);
        font-size: 2.2rem;
        font-weight: 700;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.25rem;
    }

    .header-text p {
        color: var(--gray-600);
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .header-text p i {
        color: var(--red-500);
        font-size: 0.8rem;
    }

    /* ===== PREMIUM BUTTON ===== */
    .btn-premium {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 1rem 2.5rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 1rem;
        letter-spacing: 0.3px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-lg);
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
        cursor: pointer;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.6s ease;
    }

    .btn-premium:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: var(--shadow-lg);
        color: white;
        text-decoration: none;
    }

    .btn-premium:hover::before {
        left: 100%;
    }

    .btn-premium i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .btn-premium:hover i {
        transform: scale(1.2) rotate(90deg);
    }

    /* ===== STATS CARD ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1rem;
        animation: fadeIn 0.5s ease;
        animation-fill-mode: both;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--red-300);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-soft);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--red-500);
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1);
        background: var(--gradient-primary);
        color: white;
    }

    .stat-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 0.25rem;
    }

    .stat-info p {
        color: var(--gray-600);
        font-size: 0.85rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* ===== MAIN CARD ===== */
    .main-card {
        background: white;
        border-radius: var(--radius-2xl);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        border: 1px solid rgba(220, 20, 60, 0.1);
        animation: slideUp 0.5s ease 0.2s both;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card-header {
        padding: 1.5rem 2rem;
        background: var(--gradient-glass);
        border-bottom: 1px solid rgba(220, 20, 60, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h2 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--gray-800);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .card-header h2 i {
        color: var(--red-500);
        font-size: 1.2rem;
    }

    .card-header .badge {
        background: var(--gradient-soft);
        color: var(--red-600);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-full);
        font-size: 0.85rem;
        font-weight: 600;
        border: 1px solid rgba(220, 20, 60, 0.2);
    }

    /* ===== TABLE STYLES ===== */
    .table-wrapper {
        padding: 2rem;
        overflow-x: auto;
    }

    .menu-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .menu-table thead th {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--gray-600);
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 2px solid var(--gray-200);
    }

    .menu-table tbody tr {
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        border: 1px solid transparent;
        animation: slideRow 0.3s ease;
        animation-fill-mode: both;
    }

    @keyframes slideRow {
        from {
            opacity: 0;
            transform: translateX(-10px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* GANTI BAGIAN INI - HAPUS LOOP GANTI MANUAL */
    .menu-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
    .menu-table tbody tr:nth-child(2) { animation-delay: 0.10s; }
    .menu-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
    .menu-table tbody tr:nth-child(4) { animation-delay: 0.20s; }
    .menu-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
    .menu-table tbody tr:nth-child(6) { animation-delay: 0.30s; }
    .menu-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
    .menu-table tbody tr:nth-child(8) { animation-delay: 0.40s; }
    .menu-table tbody tr:nth-child(9) { animation-delay: 0.45s; }
    .menu-table tbody tr:nth-child(10) { animation-delay: 0.50s; }
    .menu-table tbody tr:nth-child(11) { animation-delay: 0.55s; }
    .menu-table tbody tr:nth-child(12) { animation-delay: 0.60s; }
    .menu-table tbody tr:nth-child(13) { animation-delay: 0.65s; }
    .menu-table tbody tr:nth-child(14) { animation-delay: 0.70s; }
    .menu-table tbody tr:nth-child(15) { animation-delay: 0.75s; }
    .menu-table tbody tr:nth-child(16) { animation-delay: 0.80s; }
    .menu-table tbody tr:nth-child(17) { animation-delay: 0.85s; }
    .menu-table tbody tr:nth-child(18) { animation-delay: 0.90s; }
    .menu-table tbody tr:nth-child(19) { animation-delay: 0.95s; }
    .menu-table tbody tr:nth-child(20) { animation-delay: 1.00s; }

    .menu-table tbody tr:hover {
        transform: translateY(-2px) scale(1.01);
        box-shadow: var(--shadow-lg);
        border-color: rgba(220, 20, 60, 0.2);
        background: linear-gradient(135deg, white, var(--red-50));
    }

    .menu-table tbody td {
        padding: 1rem;
        vertical-align: middle;
        color: var(--gray-800);
        border: none;
    }

    .menu-table tbody td:first-child {
        border-top-left-radius: var(--radius-lg);
        border-bottom-left-radius: var(--radius-lg);
    }

    .menu-table tbody td:last-child {
        border-top-right-radius: var(--radius-lg);
        border-bottom-right-radius: var(--radius-lg);
    }

    /* ===== NUMBER BADGE ===== */
    .number-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: var(--gradient-soft);
        border-radius: var(--radius-full);
        color: var(--red-600);
        font-weight: 600;
        font-size: 0.9rem;
        border: 2px solid white;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
    }

    .menu-table tbody tr:hover .number-badge {
        background: var(--gradient-primary);
        color: white;
        transform: scale(1.1);
    }

    /* ===== IMAGE STYLES ===== */
    .menu-image {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: var(--radius-lg);
        border: 3px solid white;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .menu-table tbody tr:hover .menu-image {
        transform: scale(1.1) rotate(2deg);
        box-shadow: var(--shadow-lg);
        border-color: var(--red-500);
    }

    .menu-image-placeholder {
        width: 70px;
        height: 70px;
        background: var(--gradient-soft);
        border-radius: var(--radius-lg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--red-500);
        border: 2px dashed var(--red-300);
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .menu-table tbody tr:hover .menu-image-placeholder {
        border-color: var(--red-500);
        color: var(--red-700);
        transform: scale(1.05);
        background: white;
    }

    /* ===== MENU INFO ===== */
    .menu-info {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .menu-name {
        font-weight: 700;
        color: var(--gray-900);
        font-size: 1.1rem;
        transition: color 0.3s ease;
        font-family: var(--font-serif);
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .menu-table tbody tr:hover .menu-name {
        color: var(--red-600);
    }

    .menu-description {
        font-size: 0.8rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 6px;
        line-height: 1.4;
    }

    .menu-description i {
        color: var(--red-400);
        font-size: 0.7rem;
    }

    /* ===== BADGES ===== */
    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 10px;
        border-radius: var(--radius-full);
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
    }

    .badge-status.available {
        background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
        color: #2E7D32;
        border: 1px solid #A5D6A7;
    }

    .badge-status.unavailable {
        background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
        color: #C62828;
        border: 1px solid #EF9A9A;
    }

    .badge-category {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: var(--gradient-soft);
        color: var(--red-700);
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 600;
        border: 1px solid var(--red-200);
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .badge-category i {
        color: var(--red-500);
        font-size: 0.7rem;
    }

    .menu-table tbody tr:hover .badge-category {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
    }

    .menu-table tbody tr:hover .badge-category i {
        color: white;
    }

    .badge-featured {
        background: linear-gradient(135deg, #FFF3E0, #FFE0B2);
        color: #E65100;
        padding: 2px 8px;
        border-radius: var(--radius-full);
        font-size: 0.65rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        border: 1px solid #FFB74D;
    }

    .badge-featured i {
        font-size: 0.6rem;
    }

    /* ===== PRICE TAG ===== */
    .price-tag {
        font-weight: 700;
        font-size: 1rem;
        color: var(--red-600);
        background: linear-gradient(135deg, var(--red-50), white);
        padding: 6px 12px;
        border-radius: var(--radius-full);
        display: inline-block;
        border: 1px solid var(--red-200);
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .menu-table tbody tr:hover .price-tag {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: scale(1.05);
    }

    /* ===== ACTION BUTTONS ===== */
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .menu-table tbody tr:hover .action-buttons {
        opacity: 1;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: var(--radius-md);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .btn-action::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-action:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-action i {
        font-size: 1rem;
        position: relative;
        z-index: 2;
        transition: transform 0.3s ease;
    }

    .btn-action:hover {
        transform: translateY(-3px) scale(1.1);
    }

    .btn-action:hover i {
        transform: scale(1.2);
    }

    .btn-action.edit {
        background: linear-gradient(135deg, #E3F2FD, #BBDEFB);
        color: #1976D2;
        border: 1px solid #90CAF9;
    }

    .btn-action.edit:hover {
        background: linear-gradient(135deg, #1976D2, #0D47A1);
        color: white;
    }

    .btn-action.delete {
        background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
        color: #C62828;
        border: 1px solid #EF9A9A;
    }

    .btn-action.delete:hover {
        background: linear-gradient(135deg, #C62828, #8B0000);
        color: white;
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: linear-gradient(135deg, var(--red-50), white);
        border-radius: var(--radius-2xl);
        position: relative;
        overflow: hidden;
    }

    .empty-state::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--red-200) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.3;
        animation: float 15s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(20px, -20px) rotate(5deg); }
        66% { transform: translate(-10px, 10px) rotate(-5deg); }
    }

    .empty-state i {
        font-size: 5rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .empty-state p {
        color: var(--gray-600);
        margin-bottom: 2rem;
        position: relative;
        z-index: 2;
    }

    /* ===== ALERTS ===== */
    .alert {
        padding: 1rem 1.5rem;
        border-radius: var(--radius-lg);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        animation: slideAlert 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    @keyframes slideAlert {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: currentColor;
    }

    .alert i {
        font-size: 1.2rem;
    }

    .alert-success {
        background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
        color: #2E7D32;
        border: 1px solid #A5D6A7;
    }

    .alert-danger {
        background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
        color: #C62828;
        border: 1px solid #EF9A9A;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .menu-container {
            padding: 1rem;
        }

        .header-content {
            flex-direction: column;
            align-items: start;
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .btn-premium {
            width: 100%;
            justify-content: center;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .table-wrapper {
            padding: 1rem;
        }

        .menu-image, .menu-image-placeholder {
            width: 50px;
            height: 50px;
        }

        .menu-name {
            font-size: 1rem;
        }

        .price-tag {
            font-size: 0.9rem;
            padding: 4px 8px;
        }

        .badge-category {
            padding: 4px 8px;
            font-size: 0.7rem;
        }

        .action-buttons {
            gap: 4px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
        }
    }

    @media (max-width: 576px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .header-text h1 {
            font-size: 1.8rem;
        }

        .header-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }

        .menu-table thead {
            display: none;
        }

        .menu-table tbody tr {
            display: block;
            margin-bottom: 1rem;
            padding: 1rem;
        }

        .menu-table tbody td {
            display: block;
            text-align: left;
            padding: 0.5rem;
            border: none;
        }

        .menu-table tbody td:before {
            content: attr(data-label);
            float: left;
            font-weight: 600;
            color: var(--red-600);
            width: 100px;
        }

        .menu-table tbody td:first-child {
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .menu-table tbody td:last-child {
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        }

        .action-buttons {
            justify-content: flex-end;
            margin-top: 0.5rem;
        }
    }

    /* ===== CUSTOM SCROLLBAR ===== */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: var(--gray-100);
        border-radius: var(--radius-full);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--gradient-primary);
        border-radius: var(--radius-full);
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--red-600);
    }
</style>
@endsection

@section('content')
<div class="menu-container">
    <!-- Header Card -->
    <div class="header-card">
        <div class="header-content">
            <div class="header-title">
                <div class="header-icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="header-text">
                    <h1>Kelola Menu</h1>
                    <p>
                        <i class="fas fa-home"></i>
                        Dashboard / <span style="color: var(--red-500); font-weight: 600;">Menu Management</span>
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.menu.create') }}" class="btn-premium">
                <i class="fas fa-plus-circle"></i>
                Tambah Menu Baru
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $menuItems->count() }}</h3>
                <p>Total Menu</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $menuItems->where('is_available', true)->count() }}</h3>
                <p>Tersedia</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $menuItems->where('is_available', false)->count() }}</h3>
                <p>Habis</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $menuItems->where('is_featured', true)->count() }}</h3>
                <p>Menu Featured</p>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="main-card">
        <div class="card-header">
            <h2>
                <i class="fas fa-list"></i>
                Daftar Menu
            </h2>
            <span class="badge">{{ $menuItems->count() }} items</span>
        </div>

        <div class="table-wrapper">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <table class="menu-table">
                <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th style="width: 100px">Gambar</th>
                        <th>Informasi Menu</th>
                        <th style="width: 150px">Kategori</th>
                        <th style="width: 120px">Harga</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menuItems as $index => $item)
                    <tr id="menu-row-{{ $item->id }}">
                        <td data-label="No">
                            <span class="number-badge">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td data-label="Gambar">
                            @if($item->image)
                                @if(filter_var($item->image, FILTER_VALIDATE_URL))
                                    <img src="{{ $item->image }}" 
                                         alt="{{ $item->name }}" 
                                         class="menu-image"
                                         loading="lazy"
                                         onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                                @else
                                    <img src="{{ asset('storage/menu/' . $item->image) }}" 
                                         alt="{{ $item->name }}" 
                                         class="menu-image"
                                         loading="lazy"
                                         onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                                @endif
                            @else
                                <div class="menu-image-placeholder">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            @endif
                        </td>
                        <td data-label="Informasi Menu">
                            <div class="menu-info">
                                <div class="menu-name">
                                    {{ $item->name }}
                                    @if($item->is_featured)
                                        <span class="badge-featured">
                                            <i class="fas fa-star"></i> Featured
                                        </span>
                                    @endif
                                </div>
                                @if($item->description)
                                    <div class="menu-description">
                                        <i class="fas fa-align-left"></i>
                                        {{ Str::limit($item->description, 60) }}
                                    </div>
                                @endif
                                <div style="display: flex; gap: 8px; margin-top: 4px; flex-wrap: wrap;">
                                    @if($item->is_available)
                                        <span class="badge-status available">
                                            <i class="fas fa-check-circle"></i> Tersedia
                                        </span>
                                    @else
                                        <span class="badge-status unavailable">
                                            <i class="fas fa-times-circle"></i> Habis
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td data-label="Kategori">
                            <span class="badge-category">
                                <i class="fas fa-tag"></i>
                                {{ $item->category->name ?? 'Tanpa Kategori' }}
                            </span>
                        </td>
                        <td data-label="Harga">
                            <span class="price-tag">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </span>
                        </td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <a href="{{ route('admin.menu.edit', $item->id) }}" 
                                   class="btn-action edit"
                                   title="Edit Menu">
                                    <i class="fas fa-pen"></i>
                                </a>
                                
                                <!-- FORM DELETE DENGAN SUBMIT LANGSUNG DAN KONFIRMASI -->
                                <form action="{{ route('admin.menu.destroy', $item->id) }}" 
                                      method="POST" 
                                      style="display: inline-block;"
                                      onsubmit="return confirm('⚠️ Apakah Anda yakin ingin menghapus menu \"{{ $item->name }}\"?\n\nTindakan ini tidak dapat dibatalkan!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-action delete"
                                            title="Hapus Menu">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fas fa-utensils"></i>
                                <h3>Belum Ada Menu</h3>
                                <p>Mulai tambahkan menu pertama Anda untuk ditampilkan di restoran.</p>
                                <a href="{{ route('admin.menu.create') }}" class="btn-premium">
                                    <i class="fas fa-plus-circle"></i> Tambah Menu Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Auto-hide alerts after 3 seconds with fade effect
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            alert.style.opacity = '0';
            alert.style.transform = 'translateX(-20px)';
            setTimeout(function() {
                alert.style.display = 'none';
            }, 500);
        });
    }, 3000);
});

// Add animation on page load
window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});
</script>
@endsection