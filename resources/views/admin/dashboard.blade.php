@extends('layouts.admin')

@section('title', content: 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('styles')
<style>
    /* ===== PREMIUM RED GRADIENT THEME V2 ===== */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        /* Red Gradient Palette - Enhanced */
        --red-50: #FFF1F3;
        --red-100: #FFE4E8;
        --red-200: #FFB3C1;
        --red-300: #FF8A9F;
        --red-400: #FF4D6D;
        --red-500: #DC143C;
        --red-600: #B22234;
        --red-700: #8B0000;
        --red-800: #5C0000;
        --red-900: #2E0000;
        
        /* Gradients - Premium */
        --gradient-primary: linear-gradient(145deg, #DC143C, #B22234, #8B0000);
        --gradient-secondary: linear-gradient(145deg, #FF4D6D, #DC143C);
        --gradient-tertiary: linear-gradient(145deg, #FF8A9F, #FF4D6D);
        --gradient-soft: linear-gradient(145deg, #FFF1F3, #FFE4E8, #FFD1D9);
        --gradient-glass: linear-gradient(145deg, rgba(220, 20, 60, 0.05), rgba(139, 0, 0, 0.02));
        --gradient-shine: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        
        /* Shadows - Enhanced */
        --shadow-sm: 0 5px 20px rgba(220, 20, 60, 0.08);
        --shadow-md: 0 8px 30px rgba(220, 20, 60, 0.12);
        --shadow-lg: 0 15px 40px rgba(220, 20, 60, 0.18);
        --shadow-xl: 0 25px 50px rgba(220, 20, 60, 0.25);
        --shadow-2xl: 0 30px 60px rgba(220, 20, 60, 0.3);
        --shadow-inner: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        
        /* Border Radius */
        --radius-xs: 8px;
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --radius-2xl: 40px;
        --radius-full: 9999px;
        
        /* Font */
        --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    * {
        font-family: var(--font-sans);
    }

    body {
        background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
    }

    /* ===== CONTENT WRAPPER ===== */
    .content-wrapper {
        margin-top: 20px;
        position: relative;
    }
    
    .page-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid rgba(220, 20, 60, 0.1);
    }

    /* ===== DASHBOARD CONTAINER ===== */
    .dashboard-container {
        background: linear-gradient(135deg, #fff5f5 0%, #ffebee 100%);
        min-height: 100vh;
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .dashboard-container::before {
        content: '';
        position: fixed;
        top: -50%;
        right: -20%;
        width: 800px;
        height: 800px;
        background: radial-gradient(circle, rgba(220, 20, 60, 0.03) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        animation: floatBackground 20s ease-in-out infinite;
    }

    .dashboard-container::after {
        content: '';
        position: fixed;
        bottom: -30%;
        left: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(139, 0, 0, 0.03) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        animation: floatBackground 25s ease-in-out infinite reverse;
    }

    @keyframes floatBackground {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(50px, -30px) scale(1.1); }
        66% { transform: translate(-30px, 50px) scale(0.9); }
    }

    /* ===== MODERN STAT CARDS ===== */
    .modern-stat-card {
        position: relative;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: var(--radius-xl);
        padding: 30px;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(255, 255, 255, 0.8);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        overflow: hidden;
        height: 100%;
    }

    .modern-stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--card-gradient);
        z-index: 2;
    }

    .modern-stat-card::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, rgba(255,255,255,0.8), transparent 70%);
        opacity: 0;
        transition: opacity 0.5s ease;
        pointer-events: none;
    }

    .modern-stat-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: var(--shadow-2xl);
        border-color: rgba(220, 20, 60, 0.3);
    }

    .modern-stat-card:hover::after {
        opacity: 1;
    }

    /* Stat Icon */
    .stat-icon-modern {
        width: 80px;
        height: 80px;
        border-radius: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        background: var(--card-gradient);
        color: white;
        margin-bottom: 20px;
        box-shadow: 0 15px 30px rgba(220, 20, 60, 0.3);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        z-index: 1;
    }

    .stat-icon-modern::before {
        content: '';
        position: absolute;
        inset: -5px;
        background: var(--card-gradient);
        border-radius: 24px;
        opacity: 0.4;
        filter: blur(15px);
        transition: opacity 0.4s;
        z-index: -1;
    }

    .modern-stat-card:hover .stat-icon-modern {
        transform: scale(1.1) rotate(5deg);
    }

    .modern-stat-card:hover .stat-icon-modern::before {
        opacity: 0.8;
        filter: blur(20px);
    }

    /* Stat Number */
    .stat-number-modern {
        font-size: 3.2rem;
        font-weight: 800;
        background: var(--card-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
        line-height: 1;
        letter-spacing: -1px;
    }

    .stat-label-modern {
        color: #64748b;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .stat-label-modern i {
        color: var(--red-500);
        font-size: 1rem;
    }

    /* Gradient Variations - All Red Tones */
    .gradient-purple { --card-gradient: linear-gradient(145deg, #DC143C, #B22234); }
    .gradient-pink { --card-gradient: linear-gradient(145deg, #FF4D6D, #DC143C); }
    .gradient-blue { --card-gradient: linear-gradient(145deg, #B22234, #8B0000); }

    /* ===== ENHANCED CARD ===== */
    .enhanced-card {
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: all 0.4s ease;
        border: 1px solid rgba(220, 20, 60, 0.1);
        position: relative;
    }

    .enhanced-card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-5px);
        border-color: rgba(220, 20, 60, 0.2);
    }

    .card-header-modern {
        background: linear-gradient(145deg, #ffffff 0%, #fff5f5 100%);
        padding: 25px 30px;
        border-bottom: 2px solid rgba(220, 20, 60, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .card-header-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-primary);
    }

    .card-header-modern h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-modern h2 i {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.8rem;
    }

    /* ===== MODERN TABLE ===== */
    .table-modern {
        margin: 0;
    }

    .table-modern thead {
        background: linear-gradient(145deg, #DC143C, #B22234);
        color: white;
    }

    .table-modern thead th {
        border: none;
        padding: 18px 25px;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
    }

    .table-modern thead th i {
        margin-right: 8px;
        font-size: 1rem;
    }

    .table-modern tbody tr {
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        border-bottom: 1px solid rgba(220, 20, 60, 0.1);
        cursor: pointer;
    }

    .table-modern tbody tr:hover {
        background: linear-gradient(90deg, rgba(220, 20, 60, 0.02), transparent);
        transform: translateX(8px) scale(1.01);
        box-shadow: var(--shadow-sm);
    }

    .table-modern tbody td {
        padding: 20px 25px;
        vertical-align: middle;
        border: none;
    }

    /* User Avatar */
    .user-avatar-modern {
        width: 50px;
        height: 50px;
        border-radius: 16px;
        background: var(--gradient-primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        box-shadow: 0 8px 20px rgba(220, 20, 60, 0.3);
        border: 3px solid white;
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover .user-avatar-modern {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 30px rgba(220, 20, 60, 0.4);
    }

    /* Date Display */
    .date-display-modern {
        background: linear-gradient(145deg, #f8f9fa, #ffffff);
        padding: 12px 16px;
        border-radius: 16px;
        text-align: center;
        border: 2px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        min-width: 100px;
    }

    .table-modern tbody tr:hover .date-display-modern {
        border-color: var(--red-500);
        background: linear-gradient(145deg, #fff5f5, #ffffff);
        transform: scale(1.02);
    }

    .date-day-modern {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
    }

    .date-month-modern {
        display: block;
        font-size: 0.75rem;
        text-transform: uppercase;
        color: #64748b;
        font-weight: 600;
        letter-spacing: 1px;
        margin-top: 4px;
    }

    /* Time Badge */
    .time-badge-modern {
        background: var(--gradient-primary);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 8px 20px rgba(220, 20, 60, 0.3);
        border: 1px solid rgba(255,255,255,0.3);
        transition: all 0.3s ease;
    }

    .table-modern tbody tr:hover .time-badge-modern {
        transform: scale(1.05);
        box-shadow: 0 12px 30px rgba(220, 20, 60, 0.4);
    }

    /* People Count */
    .people-count-modern {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1e293b;
        background: linear-gradient(145deg, #f8f9fa, #ffffff);
        padding: 8px 16px;
        border-radius: 30px;
        border: 1px solid rgba(220, 20, 60, 0.1);
    }

    .people-count-modern i {
        font-size: 1.2rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Status Badges */
    .status-badge-modern {
        padding: 8px 18px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        border: 1px solid rgba(255,255,255,0.3);
    }

    .status-pending {
        background: linear-gradient(145deg, #FF8A9F, #FF4D6D);
        color: white;
    }

    .status-confirmed {
        background: linear-gradient(145deg, #28a745, #20c997);
        color: white;
    }

    .status-cancelled {
        background: linear-gradient(145deg, #6c757d, #495057);
        color: white;
    }

    .table-modern tbody tr:hover .status-badge-modern {
        transform: scale(1.05);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    /* ===== QUICK ACTIONS CARD ===== */
    .quick-actions-modern {
        background: white;
        border-radius: var(--radius-xl);
        padding: 30px;
        box-shadow: var(--shadow-lg);
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        height: 100%;
    }

    .quick-actions-modern:hover {
        box-shadow: var(--shadow-xl);
    }

    .quick-actions-modern h2 {
        font-size: 1.4rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .quick-actions-modern h2 i {
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 1.6rem;
    }

    .action-btn-modern {
        background: white;
        border: 2px solid rgba(220, 20, 60, 0.1);
        border-radius: 20px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        color: #1e293b;
        text-decoration: none;
        margin-bottom: 15px;
        position: relative;
        overflow: hidden;
    }

    .action-btn-modern:last-child {
        margin-bottom: 0;
    }

    .action-btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--btn-gradient);
        transition: left 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: 0;
    }

    .action-btn-modern:hover::before {
        left: 0;
    }

    .action-btn-modern:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-xl);
        border-color: transparent;
        color: white;
    }

    .action-icon-modern {
        width: 60px;
        height: 60px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.6rem;
        background: var(--btn-gradient);
        color: white;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
        flex-shrink: 0;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .action-btn-modern:hover .action-icon-modern {
        background: white;
        transform: scale(1.1) rotate(5deg);
    }

    .action-btn-modern:hover .action-icon-modern i {
        background: var(--btn-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .action-text {
        position: relative;
        z-index: 1;
    }

    .action-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 4px;
    }

    .action-subtitle {
        font-size: 0.85rem;
        opacity: 0.7;
    }

    .btn-gradient-1 { --btn-gradient: linear-gradient(145deg, #DC143C, #B22234); }
    .btn-gradient-2 { --btn-gradient: linear-gradient(145deg, #FF4D6D, #DC143C); }
    .btn-gradient-3 { --btn-gradient: linear-gradient(145deg, #B22234, #8B0000); }

    /* ===== EMPTY STATE ===== */
    .empty-state-modern {
        padding: 60px 20px;
        text-align: center;
        background: linear-gradient(145deg, #f8f9fa, #ffffff);
        border-radius: var(--radius-lg);
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: var(--gradient-soft);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: var(--red-500);
        animation: floatIcon 3s ease-in-out infinite;
    }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .empty-state-modern h5 {
        color: #475569;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .empty-state-modern p {
        color: #94a3b8;
    }

    /* ===== BUTTON MODERN ===== */
    .btn-modern {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 40px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 10px 30px rgba(220, 20, 60, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
    }

    .btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-modern:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 20px 40px rgba(220, 20, 60, 0.4);
        color: white;
    }

    .btn-modern:hover::before {
        left: 100%;
    }

    /* ===== ANIMATIONS ===== */
    .fade-in-up {
        animation: fadeInUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        opacity: 0;
    }
    
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

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }

    /* Floating Animation */
    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 991px) {
        .dashboard-container {
            margin-top: 80px;
            padding: 20px 15px;
        }

        .stat-number-modern {
            font-size: 2.8rem;
        }

        .stat-icon-modern {
            width: 70px;
            height: 70px;
            font-size: 2rem;
        }

        .card-header-modern {
            flex-direction: column;
            gap: 15px;
            text-align: center;
            padding: 20px;
        }

        .card-header-modern h2 {
            font-size: 1.3rem;
        }

        .table-modern thead {
            display: none;
        }

        .table-modern tbody td {
            display: block;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid rgba(220, 20, 60, 0.1);
        }

        .table-modern tbody td:first-child {
            padding-top: 20px;
        }

        .table-modern tbody td:last-child {
            padding-bottom: 20px;
            border-bottom: none;
        }

        .table-modern tbody tr {
            margin-bottom: 20px;
            display: block;
            border: 1px solid rgba(220, 20, 60, 0.1);
            border-radius: var(--radius-lg);
        }

        .table-modern tbody tr:hover {
            transform: translateX(0) scale(1.02);
        }

        .d-flex.align-items-center {
            justify-content: center;
        }

        .people-count-modern {
            justify-content: center;
        }

        .action-btn-modern {
            padding: 15px;
        }

        .action-icon-modern {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .action-title {
            font-size: 1rem;
        }

        .action-subtitle {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 768px) {
        .stat-number-modern {
            font-size: 2.5rem;
        }

        .stat-icon-modern {
            width: 60px;
            height: 60px;
            font-size: 1.8rem;
        }

        .row.g-4 {
            --bs-gutter-y: 1rem;
        }

        .btn-modern {
            width: 100%;
            justify-content: center;
            padding: 10px 20px;
        }

        .date-display-modern {
            display: inline-block;
            min-width: 80px;
        }

        .date-day-modern {
            font-size: 1.8rem;
        }

        .quick-actions-modern h2 {
            font-size: 1.2rem;
        }
    }

    /* ===== LOADING STATES ===== */
    .btn-modern:active {
        transform: scale(0.98);
    }

    /* ===== SCROLLBAR STYLING ===== */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--gradient-primary);
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(145deg, #B22234, #8B0000);
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="dashboard-container">
        <!-- Stats Cards Row - Only 3 Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-4 col-md-4">
                <div class="modern-stat-card gradient-purple fade-in-up">
                    <div class="stat-icon-modern float-animation">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalMenu }}</div>
                    <div class="stat-label-modern">
                        <i class="fas fa-circle"></i>
                        Total Menu
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-md-4">
                <div class="modern-stat-card gradient-pink fade-in-up delay-1">
                    <div class="stat-icon-modern float-animation" style="animation-delay: 0.5s;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalReservations }}</div>
                    <div class="stat-label-modern">
                        <i class="fas fa-circle"></i>
                        Total Reservasi
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-md-4">
                <div class="modern-stat-card gradient-blue fade-in-up delay-2">
                    <div class="stat-icon-modern float-animation" style="animation-delay: 1s;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalUsers }}</div>
                    <div class="stat-label-modern">
                        <i class="fas fa-circle"></i>
                        Total Pengguna
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content Row - With Equal Columns -->
        <div class="row g-4">
            <!-- Recent Reservations - Takes 7 columns -->
            <div class="col-lg-7">
                <div class="enhanced-card fade-in-up delay-2">
                    <div class="card-header-modern">
                        <h2>
                            <i class="fas fa-calendar-alt"></i>
                            Reservasi Terbaru
                        </h2>
                        <a href="{{ route('admin.reservations.index') }}" class="btn-modern">
                            <i class="fas fa-eye me-2"></i> Lihat Semua
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user"></i>Pelanggan</th>
                                    <th><i class="fas fa-calendar"></i>Tanggal</th>
                                    <th><i class="fas fa-clock"></i>Waktu</th>
                                    <th><i class="fas fa-user-friends"></i>Tamu</th>
                                    <th><i class="fas fa-info-circle"></i>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentReservations as $reservation)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="user-avatar-modern">
                                                {{ strtoupper(substr($reservation->customer_name ?? $reservation->name ?? 'A', 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ $reservation->customer_name ?? $reservation->name }}</div>
                                                <small class="text-muted">{{ $reservation->email ?? '' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-display-modern">
                                            <span class="date-day-modern">{{ \Carbon\Carbon::parse($reservation->date ?? $reservation->reservation_date)->format('d') }}</span>
                                            <span class="date-month-modern">{{ \Carbon\Carbon::parse($reservation->date ?? $reservation->reservation_date)->format('M Y') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="time-badge-modern">
                                            <i class="fas fa-clock"></i>
                                            {{ $reservation->time ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="people-count-modern">
                                            <i class="fas fa-users"></i>
                                            <strong>{{ $reservation->people ?? $reservation->guests ?? '0' }}</strong>
                                            <span class="text-muted">orang</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if($reservation->status == 'pending')
                                            <span class="status-badge-modern status-pending">
                                                <i class="fas fa-hourglass-half"></i>
                                                Pending
                                            </span>
                                        @elseif($reservation->status == 'confirmed')
                                            <span class="status-badge-modern status-confirmed">
                                                <i class="fas fa-check-circle"></i>
                                                Confirmed
                                            </span>
                                        @elseif($reservation->status == 'cancelled')
                                            <span class="status-badge-modern status-cancelled">
                                                <i class="fas fa-times-circle"></i>
                                                Cancelled
                                            </span>
                                        @else
                                            <span class="status-badge-modern" style="background: linear-gradient(145deg, #e2e8f0 0%, #cbd5e1 100%); color: #475569;">
                                                {{ $reservation->status }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state-modern">
                                            <div class="empty-icon">
                                                <i class="fas fa-calendar-times"></i>
                                            </div>
                                            <h5>Belum Ada Reservasi</h5>
                                            <p>Reservasi baru akan muncul di sini</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions - Takes 5 columns -->
            <div class="col-lg-5">
                <div class="quick-actions-modern fade-in-up delay-3">
                    <h2>
                        <i class="fas fa-bolt"></i>
                        Aksi Cepat
                    </h2>
                    
                    <a href="{{ route('admin.menu.create') }}" class="action-btn-modern btn-gradient-1">
                        <div class="action-icon-modern">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="action-text">
                            <div class="action-title">Tambah Menu</div>
                            <div class="action-subtitle">Buat menu baru</div>
                        </div>
                    </a>
                    
                    <a href="{{ route('admin.reservations.index') }}" class="action-btn-modern btn-gradient-2">
                        <div class="action-icon-modern">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="action-text">
                            <div class="action-title">Kelola Reservasi</div>
                            <div class="action-subtitle">Lihat & atur reservasi</div>
                        </div>
                    </a>
                    
                    <a href="{{ route('admin.gallery.index') }}" class="action-btn-modern btn-gradient-3">
                        <div class="action-icon-modern">
                            <i class="fas fa-images"></i>
                        </div>
                        <div class="action-text">
                            <div class="action-title">Kelola Galeri</div>
                            <div class="action-subtitle">Upload foto baru</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Counter Animation with Easing
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            
            // Easing function for smooth animation
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const value = Math.floor(easeOutQuart * (end - start) + start);
            
            element.textContent = value.toLocaleString('id-ID');
            
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    
    // Initialize animations on page load
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stat numbers
        document.querySelectorAll('.stat-number-modern').forEach(element => {
            const endValue = parseInt(element.textContent.replace(/\D/g, '')) || 0;
            if (endValue > 0) {
                element.textContent = '0';
                animateValue(element, 0, endValue, 2000);
            }
        });
        
        // Add ripple effect to buttons
        const buttons = document.querySelectorAll('.btn-modern, .action-btn-modern');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
        
        // Initialize tooltips if Bootstrap is available
        if (typeof bootstrap !== 'undefined') {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    });
    
    // Add smooth scroll behavior
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
</script>

<style>
    /* Ripple Effect */
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
    }
    
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    /* Ensure buttons have position relative for ripple */
    .btn-modern, .action-btn-modern {
        position: relative;
        overflow: hidden;
    }
</style>
@endsection