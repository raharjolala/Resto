@extends('layouts.admin')

@section('title', 'Kelola Promosi')
@section('page-title', 'Kelola Promosi')

@section('styles')
<style>
    /* ===== PREMIUM AESTHETIC RED THEME - CONSISTENT WITH MENU PAGE ===== */
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
    .promo-container {
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

    .promo-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .promo-table thead th {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--gray-600);
        padding: 0.75rem 1rem;
        text-align: left;
        border-bottom: 2px solid var(--gray-200);
    }

    .promo-table tbody tr {
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

    /* Animation delays for rows */
    .promo-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
    .promo-table tbody tr:nth-child(2) { animation-delay: 0.10s; }
    .promo-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
    .promo-table tbody tr:nth-child(4) { animation-delay: 0.20s; }
    .promo-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
    .promo-table tbody tr:nth-child(6) { animation-delay: 0.30s; }
    .promo-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
    .promo-table tbody tr:nth-child(8) { animation-delay: 0.40s; }
    .promo-table tbody tr:nth-child(9) { animation-delay: 0.45s; }
    .promo-table tbody tr:nth-child(10) { animation-delay: 0.50s; }
    .promo-table tbody tr:nth-child(11) { animation-delay: 0.55s; }
    .promo-table tbody tr:nth-child(12) { animation-delay: 0.60s; }
    .promo-table tbody tr:nth-child(13) { animation-delay: 0.65s; }
    .promo-table tbody tr:nth-child(14) { animation-delay: 0.70s; }
    .promo-table tbody tr:nth-child(15) { animation-delay: 0.75s; }
    .promo-table tbody tr:nth-child(16) { animation-delay: 0.80s; }
    .promo-table tbody tr:nth-child(17) { animation-delay: 0.85s; }
    .promo-table tbody tr:nth-child(18) { animation-delay: 0.90s; }
    .promo-table tbody tr:nth-child(19) { animation-delay: 0.95s; }
    .promo-table tbody tr:nth-child(20) { animation-delay: 1.00s; }

    .promo-table tbody tr:hover {
        transform: translateY(-2px) scale(1.01);
        box-shadow: var(--shadow-lg);
        border-color: rgba(220, 20, 60, 0.2);
        background: linear-gradient(135deg, white, var(--red-50));
    }

    .promo-table tbody td {
        padding: 1rem;
        vertical-align: middle;
        color: var(--gray-800);
        border: none;
    }

    .promo-table tbody td:first-child {
        border-top-left-radius: var(--radius-lg);
        border-bottom-left-radius: var(--radius-lg);
    }

    .promo-table tbody td:last-child {
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

    .promo-table tbody tr:hover .number-badge {
        background: var(--gradient-primary);
        color: white;
        transform: scale(1.1);
    }

    /* ===== IMAGE STYLES ===== */
    .promo-image {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: var(--radius-lg);
        border: 3px solid white;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .promo-table tbody tr:hover .promo-image {
        transform: scale(1.1) rotate(2deg);
        box-shadow: var(--shadow-lg);
        border-color: var(--red-500);
    }

    .promo-image-placeholder {
        width: 80px;
        height: 60px;
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

    .promo-table tbody tr:hover .promo-image-placeholder {
        border-color: var(--red-500);
        color: var(--red-700);
        transform: scale(1.05);
        background: white;
    }

    /* ===== PROMO INFO ===== */
    .promo-info {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .promo-title {
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

    .promo-table tbody tr:hover .promo-title {
        color: var(--red-600);
    }

    .promo-description {
        font-size: 0.8rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 6px;
        line-height: 1.4;
    }

    .promo-description i {
        color: var(--red-400);
        font-size: 0.7rem;
    }

    /* ===== BADGES ===== */
    .badge-promo {
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

    .badge-promo i {
        color: var(--red-500);
        font-size: 0.7rem;
    }

    .promo-table tbody tr:hover .badge-promo {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
    }

    .promo-table tbody tr:hover .badge-promo i {
        color: white;
    }

    /* Status Badges */
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
        white-space: nowrap;
    }

    .badge-status.active {
        background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
        color: #2E7D32;
        border: 1px solid #A5D6A7;
    }

    .badge-status.upcoming {
        background: linear-gradient(135deg, #E3F2FD, #BBDEFB);
        color: #1976D2;
        border: 1px solid #90CAF9;
    }

    .badge-status.expired {
        background: linear-gradient(135deg, #FFEBEE, #FFCDD2);
        color: #C62828;
        border: 1px solid #EF9A9A;
    }

    .badge-status.inactive {
        background: linear-gradient(135deg, #F5F5F5, #EEEEEE);
        color: #616161;
        border: 1px solid #BDBDBD;
    }

    .badge-sort {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #C62828, #8B0000);
        color: white;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        font-weight: 700;
        box-shadow: var(--shadow-sm);
        border: 2px solid white;
    }

    .promo-table tbody tr:hover .badge-sort {
        transform: scale(1.1);
        box-shadow: var(--shadow-md);
    }

    /* ===== PRICE TAG ===== */
    .price-container {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .old-price {
        font-size: 0.75rem;
        color: var(--gray-500);
        text-decoration: line-through;
    }

    .current-price {
        font-weight: 700;
        font-size: 1rem;
        color: var(--red-600);
        background: linear-gradient(135deg, var(--red-50), white);
        padding: 4px 10px;
        border-radius: var(--radius-full);
        display: inline-block;
        border: 1px solid var(--red-200);
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .promo-table tbody tr:hover .current-price {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: scale(1.05);
    }

    .discount-badge {
        background: linear-gradient(135deg, #4CAF50, #2E7D32);
        color: white;
        padding: 2px 6px;
        border-radius: var(--radius-full);
        font-size: 0.65rem;
        font-weight: 600;
        margin-left: 4px;
    }

    /* ===== DATE INFO ===== */
    .date-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .date-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.8rem;
        color: var(--gray-700);
    }

    .date-item i {
        color: var(--red-500);
        font-size: 0.75rem;
        width: 16px;
    }

    /* ===== ACTION BUTTONS ===== */
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .promo-table tbody tr:hover .action-buttons {
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
        text-decoration: none;
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
        .promo-container {
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

        .promo-image, .promo-image-placeholder {
            width: 60px;
            height: 45px;
        }

        .promo-title {
            font-size: 1rem;
        }

        .action-buttons {
            gap: 4px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
        }
    }

    @media (max-width: 768px) {
        .promo-table thead {
            display: none;
        }

        .promo-table tbody tr {
            display: block;
            margin-bottom: 1rem;
            padding: 1rem;
        }

        .promo-table tbody td {
            display: block;
            text-align: left;
            padding: 0.5rem;
            border: none;
        }

        .promo-table tbody td:before {
            content: attr(data-label);
            float: left;
            font-weight: 600;
            color: var(--red-600);
            width: 100px;
            font-size: 0.8rem;
        }

        .promo-table tbody td:first-child {
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .promo-table tbody td:last-child {
            border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        }

        .action-buttons {
            justify-content: flex-end;
            margin-top: 0.5rem;
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
<div class="promo-container">
    <!-- Header Card -->
    <div class="header-card">
        <div class="header-content">
            <div class="header-title">
                <div class="header-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="header-text">
                    <h1>Kelola Promosi</h1>
                    <p>
                        <i class="fas fa-home"></i>
                        Dashboard / <span style="color: var(--red-500); font-weight: 600;">Promotion Management</span>
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.promotions.create') }}" class="btn-premium">
                <i class="fas fa-plus-circle"></i>
                Tambah Promosi Baru
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-tags"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $promotions->count() }}</h3>
                <p>Total Promosi</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                @php
                    $now = \Carbon\Carbon::now();
                    $activeCount = $promotions->filter(function($promo) use ($now) {
                        return $promo->is_active && 
                               \Carbon\Carbon::parse($promo->start_date) <= $now && 
                               \Carbon\Carbon::parse($promo->end_date) >= $now;
                    })->count();
                @endphp
                <h3>{{ $activeCount }}</h3>
                <p>Promosi Aktif</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-info">
                @php
                    $upcomingCount = $promotions->filter(function($promo) use ($now) {
                        return $promo->is_active && 
                               \Carbon\Carbon::parse($promo->start_date) > $now;
                    })->count();
                @endphp
                <h3>{{ $upcomingCount }}</h3>
                <p>Akan Datang</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-info">
                @php
                    $featuredCount = $promotions->where('is_active', true)->where('badge_text', '!=', '')->count();
                @endphp
                <h3>{{ $featuredCount }}</h3>
                <p>Promosi Unggulan</p>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="main-card">
        <div class="card-header">
            <h2>
                <i class="fas fa-list"></i>
                Daftar Promosi
            </h2>
            <span class="badge">{{ $promotions->count() }} items</span>
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

            <table class="promo-table">
                <thead>
                    <tr>
                        <th style="width: 50px">No</th>
                        <th style="width: 100px">Gambar</th>
                        <th>Informasi Promosi</th>
                        <th style="width: 150px">Harga</th>
                        <th style="width: 100px">Badge</th>
                        <th style="width: 180px">Periode</th>
                        <th style="width: 100px">Status</th>
                        <th style="width: 60px">Urutan</th>
                        <th style="width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($promotions as $index => $promo)
                    @php
                        $now = \Carbon\Carbon::now();
                        $start = \Carbon\Carbon::parse($promo->start_date);
                        $end = \Carbon\Carbon::parse($promo->end_date);
                        
                        if($promo->is_active) {
                            if($start <= $now && $end >= $now) {
                                $statusClass = 'active';
                                $statusText = 'Aktif';
                                $statusIcon = 'fa-check-circle';
                            } elseif($start > $now) {
                                $statusClass = 'upcoming';
                                $statusText = 'Akan Datang';
                                $statusIcon = 'fa-clock';
                            } else {
                                $statusClass = 'expired';
                                $statusText = 'Kadaluarsa';
                                $statusIcon = 'fa-exclamation-circle';
                            }
                        } else {
                            $statusClass = 'inactive';
                            $statusText = 'Nonaktif';
                            $statusIcon = 'fa-ban';
                        }
                        
                        $discount = 0;
                        if($promo->old_price && $promo->old_price > 0) {
                            $discount = round((($promo->old_price - $promo->current_price) / $promo->old_price) * 100);
                        }
                    @endphp
                    <tr id="promo-row-{{ $promo->id }}">
                        <td data-label="No">
                            <span class="number-badge">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td data-label="Gambar">
                            @if($promo->image_url)
                                <img src="{{ $promo->image_url }}" 
                                     alt="{{ $promo->title }}" 
                                     class="promo-image"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                            @else
                                <div class="promo-image-placeholder">
                                    <i class="fas fa-tags"></i>
                                </div>
                            @endif
                        </td>
                        <td data-label="Informasi Promosi">
                            <div class="promo-info">
                                <div class="promo-title">
                                    {{ $promo->title }}
                                </div>
                                @if($promo->description)
                                    <div class="promo-description">
                                        <i class="fas fa-align-left"></i>
                                        {{ Str::limit($promo->description, 50) }}
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td data-label="Harga">
                            <div class="price-container">
                                @if($promo->old_price && $promo->old_price > 0)
                                    <span class="old-price">Rp {{ number_format($promo->old_price, 0, ',', '.') }}</span>
                                    <span class="current-price">
                                        Rp {{ number_format($promo->current_price, 0, ',', '.') }}
                                        @if($discount > 0)
                                            <span class="discount-badge">-{{ $discount }}%</span>
                                        @endif
                                    </span>
                                @else
                                    <span class="current-price">Rp {{ number_format($promo->current_price, 0, ',', '.') }}</span>
                                @endif
                            </div>
                        </td>
                        <td data-label="Badge">
                            @if($promo->badge_text)
                                <span class="badge-promo">
                                    <i class="fas fa-fire"></i>
                                    {{ $promo->badge_text }}
                                </span>
                            @else
                                <span class="badge-promo" style="opacity: 0.5;">
                                    <i class="fas fa-tag"></i>
                                    No Badge
                                </span>
                            @endif
                        </td>
                        <td data-label="Periode">
                            <div class="date-info">
                                <span class="date-item">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $start->format('d/m/Y') }}
                                </span>
                                <span class="date-item">
                                    <i class="fas fa-calendar-check"></i>
                                    {{ $end->format('d/m/Y') }}
                                </span>
                            </div>
                        </td>
                        <td data-label="Status">
                            <span class="badge-status {{ $statusClass }}">
                                <i class="fas {{ $statusIcon }}"></i>
                                {{ $statusText }}
                            </span>
                        </td>
                        <td data-label="Urutan">
                            <span class="badge-sort">
                                {{ $promo->sort_order ?? $index + 1 }}
                            </span>
                        </td>
                        <td data-label="Aksi">
                            <div class="action-buttons">
                                <a href="{{ route('admin.promotions.edit', $promo->id) }}" 
                                   class="btn-action edit"
                                   title="Edit Promosi">
                                    <i class="fas fa-pen"></i>
                                </a>
                                
                                <!-- FORM DELETE DENGAN SUBMIT LANGSUNG DAN KONFIRMASI -->
                                <form action="{{ route('admin.promotions.destroy', $promo->id) }}" 
                                      method="POST" 
                                      style="display: inline-block;"
                                      onsubmit="return confirmDelete(event, '{{ $promo->title }}', this)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn-action delete"
                                            title="Hapus Promosi">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <i class="fas fa-tags"></i>
                                <h3>Belum Ada Promosi</h3>
                                <p>Mulai tambahkan promosi pertama Anda untuk menarik lebih banyak pelanggan.</p>
                                <a href="{{ route('admin.promotions.create') }}" class="btn-premium">
                                    <i class="fas fa-plus-circle"></i> Tambah Promosi Pertama
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

// SweetAlert2 confirmation for delete
function confirmDelete(event, title, form) {
    event.preventDefault();
    
    Swal.fire({
        title: 'Konfirmasi Hapus',
        html: `Apakah Anda yakin ingin menghapus promosi <strong>"${title}"</strong>?<br><br>
               <span style="color: #dc3545; font-weight: 500;">Data yang sudah dihapus tidak dapat dikembalikan!</span>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        focusCancel: true,
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        preConfirm: () => {
            form.submit();
        }
    });
    
    return false;
}

// Add animation on page load
window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});
</script>
@endsection