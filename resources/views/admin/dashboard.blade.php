@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('styles')
<style>
    /* Fix Header Overlap - Add proper spacing */
    .content-wrapper {
        margin-top: 20px;
    }
    
    .page-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
    }
    
    /* Ensure dashboard starts below header */
    @media (max-width: 991px) {
        .dashboard-container {
            margin-top: 80px;
        }
    }
    
    :root {
        --primary-red: #c62828;
        --primary-dark: #8e0000;
        --gradient-1: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        --gradient-2: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        --gradient-3: linear-gradient(135deg, #ef5350 0%, #e53935 100%);
        --gradient-4: linear-gradient(135deg, #ff5252 0%, #f44336 100%);
        --shadow-sm: 0 2px 10px rgba(0,0,0,0.05);
        --shadow-md: 0 8px 30px rgba(0,0,0,0.12);
        --shadow-lg: 0 15px 50px rgba(0,0,0,0.15);
    }
    
    /* Dashboard Container */
    .dashboard-container {
        background: linear-gradient(135deg, #fff5f5 0%, #ffebee 100%);
        min-height: 100vh;
        padding: 30px 15px;
    }
    
    /* Modern Stat Cards with Glassmorphism */
    .modern-stat-card {
        position: relative;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 30px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(255, 255, 255, 0.8);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        height: 100%;
    }
    
    .modern-stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: var(--card-gradient);
        border-radius: 24px 24px 0 0;
    }
    
    .modern-stat-card::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        opacity: 0.3;
        pointer-events: none;
    }
    
    .modern-stat-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: var(--shadow-lg);
        border-color: rgba(255, 255, 255, 1);
    }
    
    .modern-stat-card:hover .stat-icon-modern {
        transform: scale(1.15) rotate(5deg);
    }
    
    /* Stat Icon with Gradient Background */
    .stat-icon-modern {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        background: var(--card-gradient);
        color: white;
        margin-bottom: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        z-index: 1;
    }
    
    .stat-icon-modern::before {
        content: '';
        position: absolute;
        inset: -3px;
        background: var(--card-gradient);
        border-radius: 20px;
        opacity: 0;
        filter: blur(10px);
        transition: opacity 0.4s;
        z-index: -1;
    }
    
    .modern-stat-card:hover .stat-icon-modern::before {
        opacity: 0.7;
    }
    
    /* Stat Number with Animation */
    .stat-number-modern {
        font-size: 3rem;
        font-weight: 800;
        background: var(--card-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
        font-family: 'Poppins', sans-serif;
        line-height: 1;
    }
    
    .stat-label-modern {
        color: #64748b;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    /* Gradient Variations - All Red Tones */
    .gradient-purple { --card-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); }
    .gradient-pink { --card-gradient: linear-gradient(135deg, #c62828 0%, #b71c1c 100%); }
    .gradient-blue { --card-gradient: linear-gradient(135deg, #ef5350 0%, #e53935 100%); }
    .gradient-green { --card-gradient: linear-gradient(135deg, #ff5252 0%, #f44336 100%); }
    
    /* Enhanced Content Card */
    .enhanced-card {
        background: white;
        border-radius: 24px;
        box-shadow: var(--shadow-md);
        overflow: hidden;
        transition: all 0.4s ease;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .enhanced-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-5px);
    }
    
    .card-header-modern {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 25px 30px;
        border-bottom: 2px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
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
        background: linear-gradient(135deg, #c62828 0%, #8e0000 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* Modern Table Design */
    .table-modern {
        margin: 0;
    }
    
    .table-modern thead {
        background: linear-gradient(135deg, #c62828 0%, #8e0000 100%);
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
    
    .table-modern tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .table-modern tbody tr:hover {
        background: linear-gradient(90deg, rgba(198, 40, 40, 0.03) 0%, transparent 100%);
        transform: translateX(8px);
    }
    
    .table-modern tbody td {
        padding: 20px 25px;
        vertical-align: middle;
        border: none;
    }
    
    /* Enhanced User Avatar */
    .user-avatar-modern {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 5px 15px rgba(198, 40, 40, 0.3);
        border: 3px solid white;
        transition: all 0.3s ease;
    }
    
    .table-modern tbody tr:hover .user-avatar-modern {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    
    /* Modern Date Display */
    .date-display-modern {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 12px 16px;
        border-radius: 12px;
        text-align: center;
        border: 2px solid #f1f5f9;
        transition: all 0.3s ease;
    }
    
    .table-modern tbody tr:hover .date-display-modern {
        border-color: #c62828;
        background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
    }
    
    .date-day-modern {
        display: block;
        font-size: 1.8rem;
        font-weight: 800;
        background: linear-gradient(135deg, #c62828 0%, #8e0000 100%);
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
    
    /* Modern Time Badge */
    .time-badge-modern {
        background: linear-gradient(135deg, #ef5350 0%, #e53935 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
        display: inline-block;
        box-shadow: 0 4px 15px rgba(239, 83, 80, 0.3);
        border: 2px solid rgba(255,255,255,0.3);
    }
    
    /* Modern People Count */
    .people-count-modern {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #1e293b;
    }
    
    .people-count-modern i {
        font-size: 1.2rem;
        background: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* Enhanced Status Badges */
    .status-badge-modern {
        padding: 8px 18px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .status-pending {
        background: linear-gradient(135deg, #ff9800 0%, #f57c00 100%);
        color: white;
    }
    
    .status-confirmed {
        background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%);
        color: white;
    }
    
    .status-cancelled {
        background: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        color: white;
    }
    
    /* Quick Actions Card */
    .quick-actions-modern {
        background: white;
        border-radius: 24px;
        padding: 30px;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(0,0,0,0.05);
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
        background: linear-gradient(135deg, #c62828 0%, #b71c1c 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .action-btn-modern {
        background: white;
        border: 2px solid #f1f5f9;
        border-radius: 16px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        color: #1e293b;
        text-decoration: none;
        margin-bottom: 12px;
        position: relative;
        overflow: hidden;
    }
    
    .action-btn-modern::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--btn-gradient);
        transition: left 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 0;
    }
    
    .action-btn-modern:hover::before {
        left: 0;
    }
    
    .action-btn-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        border-color: transparent;
        color: white;
    }
    
    .action-icon-modern {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        background: var(--btn-gradient);
        color: white;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
        flex-shrink: 0;
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
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 3px;
    }
    
    .action-subtitle {
        font-size: 0.85rem;
        opacity: 0.7;
    }
    
    .btn-gradient-1 { --btn-gradient: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); }
    .btn-gradient-2 { --btn-gradient: linear-gradient(135deg, #c62828 0%, #b71c1c 100%); }
    .btn-gradient-3 { --btn-gradient: linear-gradient(135deg, #ef5350 0%, #e53935 100%); }
    .btn-gradient-4 { --btn-gradient: linear-gradient(135deg, #ff5252 0%, #f44336 100%); }
    
    /* System Info Card */
    .system-info-modern {
        background: linear-gradient(135deg, #c62828 0%, #8e0000 100%);
        border-radius: 24px;
        padding: 30px;
        color: white;
        box-shadow: 0 15px 40px rgba(198, 40, 40, 0.3);
        position: relative;
        overflow: hidden;
    }
    
    .system-info-modern::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        animation: bgMove 30s linear infinite;
    }
    
    @keyframes bgMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }
    
    .system-info-modern h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .info-item-modern {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 12px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }
    
    .info-item-modern:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateX(5px);
    }
    
    .info-label-modern {
        font-size: 0.85rem;
        opacity: 0.9;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }
    
    .info-value-modern {
        font-size: 1.1rem;
        font-weight: 700;
    }
    
    .status-online {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(16, 185, 129, 0.2);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        border: 1px solid rgba(16, 185, 129, 0.4);
    }
    
    .status-dot {
        width: 8px;
        height: 8px;
        background: #10b981;
        border-radius: 50%;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
    }
    
    /* Empty State */
    .empty-state-modern {
        padding: 60px 20px;
        text-align: center;
    }
    
    .empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #cbd5e1;
    }
    
    .empty-state-modern h5 {
        color: #475569;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .empty-state-modern p {
        color: #94a3b8;
    }
    
    /* Animations */
    .fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
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
    
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
    
    /* Floating Animation */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .float-animation {
        animation: float 3s ease-in-out infinite;
    }
    
    /* Button Hover Effect */
    .btn-modern {
        background: linear-gradient(135deg, #c62828 0%, #8e0000 100%);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 20px rgba(198, 40, 40, 0.3);
    }
    
    .btn-modern:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(198, 40, 40, 0.4);
        color: white;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .stat-number-modern {
            font-size: 2.5rem;
        }
        
        .card-header-modern {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        
        .table-responsive {
            border-radius: 0 0 24px 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="dashboard-container">
        <!-- Stats Cards Row -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="modern-stat-card gradient-purple fade-in-up">
                    <div class="stat-icon-modern float-animation">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalMenu ?? 0 }}</div>
                    <div class="stat-label-modern">Total Menu</div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="modern-stat-card gradient-pink fade-in-up delay-1">
                    <div class="stat-icon-modern float-animation" style="animation-delay: 0.5s;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalReservations ?? 0 }}</div>
                    <div class="stat-label-modern">Reservasi</div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="modern-stat-card gradient-blue fade-in-up delay-2">
                    <div class="stat-icon-modern float-animation" style="animation-delay: 1s;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalUsers ?? 0 }}</div>
                    <div class="stat-label-modern">Pengguna</div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6">
                <div class="modern-stat-card gradient-green fade-in-up delay-3">
                    <div class="stat-icon-modern float-animation" style="animation-delay: 1.5s;">
                        <i class="fas fa-store-alt"></i>
                    </div>
                    <div class="stat-number-modern">{{ $totalBranches ?? 0 }}</div>
                    <div class="stat-label-modern">Cabang</div>
                </div>
            </div>
        </div>
        
        <!-- Main Content Row -->
        <div class="row g-4">
            <!-- Recent Reservations -->
            <div class="col-lg-8">
                <div class="enhanced-card fade-in-up delay-1">
                    <div class="card-header-modern">
                        <h2>
                            <i class="fas fa-calendar-alt"></i>
                            Reservasi Terbaru
                        </h2>
                        <a href="{{ route('admin.reservations.index') }}" class="btn btn-modern">
                            <i class="fas fa-eye me-2"></i> Lihat Semua
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-modern">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user me-2"></i>Pelanggan</th>
                                    <th><i class="fas fa-calendar me-2"></i>Tanggal</th>
                                    <th><i class="fas fa-clock me-2"></i>Waktu</th>
                                    <th><i class="fas fa-user-friends me-2"></i>Tamu</th>
                                    <th><i class="fas fa-info-circle me-2"></i>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentReservations ?? [] as $reservation)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="user-avatar-modern">
                                                {{ strtoupper(substr($reservation->customer_name ?? $reservation->name ?? 'A', 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ $reservation->customer_name ?? $reservation->name ?? '-' }}</div>
                                                <small class="text-muted">{{ $reservation->email ?? '' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="date-display-modern">
                                            <span class="date-day-modern">{{ \Carbon\Carbon::parse($reservation->reservation_date ?? $reservation->date ?? now())->format('d') }}</span>
                                            <span class="date-month-modern">{{ \Carbon\Carbon::parse($reservation->reservation_date ?? $reservation->date ?? now())->format('M Y') }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="time-badge-modern">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $reservation->reservation_time ?? $reservation->time ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="people-count-modern">
                                            <i class="fas fa-users"></i>
                                            <strong>{{ $reservation->guest_count ?? $reservation->guests ?? $reservation->people ?? '0' }}</strong>
                                            <span class="text-muted">orang</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if(($reservation->status ?? '') == 'pending')
                                            <span class="status-badge-modern status-pending">
                                                <i class="fas fa-hourglass-half"></i>
                                                Pending
                                            </span>
                                        @elseif(($reservation->status ?? '') == 'confirmed')
                                            <span class="status-badge-modern status-confirmed">
                                                <i class="fas fa-check-circle"></i>
                                                Confirmed
                                            </span>
                                        @elseif(($reservation->status ?? '') == 'cancelled')
                                            <span class="status-badge-modern status-cancelled">
                                                <i class="fas fa-times-circle"></i>
                                                Cancelled
                                            </span>
                                        @else
                                            <span class="status-badge-modern" style="background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%); color: #475569;">
                                                {{ $reservation->status ?? '-' }}
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
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="quick-actions-modern fade-in-up delay-2 mb-4">
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
                    
                    <a href="{{ route('admin.users.index') }}" class="action-btn-modern btn-gradient-4">
                        <div class="action-icon-modern">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="action-text">
                            <div class="action-title">Kelola Pengguna</div>
                            <div class="action-subtitle">Manajemen user</div>
                        </div>
                    </a>
                </div>
                
                <!-- System Info -->
                <div class="system-info-modern fade-in-up delay-3">
                    <h2>
                        <i class="fas fa-server"></i>
                        Info Sistem
                    </h2>
                    
                    <div class="info-item-modern">
                        <div class="info-label-modern">Status Website</div>
                        <div class="info-value-modern d-flex justify-content-between align-items-center">
                            <span>Berjalan Normal</span>
                            <span class="status-online">
                                <span class="status-dot"></span>
                                Online
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-item-modern">
                        <div class="info-label-modern">Versi Sistem</div>
                        <div class="info-value-modern">v1.2.0</div>
                    </div>
                    
                    <div class="info-item-modern">
                        <div class="info-label-modern">Server Time</div>
                        <div class="info-value-modern" id="server-time">{{ now()->format('H:i:s') }}</div>
                    </div>
                    
                    <div class="info-item-modern">
                        <div class="info-label-modern">Terakhir Diperbarui</div>
                        <div class="info-value-modern">{{ now()->format('d F Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Live Clock Update
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        
        const timeElement = document.getElementById('server-time');
        if (timeElement) {
            timeElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
    }
    
    // Update every second
    setInterval(updateClock, 1000);
    
    // Counter Animation
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value;
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
            const endValue = parseInt(element.textContent) || 0;
            element.textContent = '0';
            animateValue(element, 0, endValue, 1500);
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
@endsection