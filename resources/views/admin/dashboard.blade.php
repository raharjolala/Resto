@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('styles')
<style>
    /* Stat Cards dengan Warna Merah */
    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(198, 40, 40, 0.1);
        transition: all 0.4s ease;
        border: 1px solid rgba(198, 40, 40, 0.1);
        position: relative;
        overflow: hidden;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(198, 40, 40, 0.2);
        border-color: rgba(198, 40, 40, 0.3);
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
    }
    
    .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: var(--primary-color);
        background: rgba(198, 40, 40, 0.1);
        width: 70px;
        height: 70px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid rgba(198, 40, 40, 0.2);
    }
    
    .stat-number {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--primary-color);
        margin-bottom: 5px;
        font-family: 'Poppins', sans-serif;
    }
    
    .stat-label {
        color: var(--primary-dark);
        font-size: 0.95rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* Table dengan Warna Merah */
    .table-red {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(198, 40, 40, 0.08);
        border: 1px solid rgba(198, 40, 40, 0.1);
    }
    
    .table-red thead {
        background: var(--primary-color);
        color: white;
    }
    
    .table-red thead th {
        border: none;
        padding: 15px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .table-red tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(198, 40, 40, 0.05);
    }
    
    .table-red tbody tr:hover {
        background-color: rgba(198, 40, 40, 0.03);
        transform: translateX(5px);
    }
    
    .table-red tbody td {
        padding: 15px 20px;
        vertical-align: middle;
        border-top: 1px solid rgba(198, 40, 40, 0.05);
    }
    
    /* Badge dengan Warna Merah Variasi */
    .badge-red {
        border-radius: 50px;
        padding: 6px 15px;
        font-weight: 600;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .badge-pending {
        background: rgba(255, 193, 7, 0.1);
        color: #d39e00;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }
    
    .badge-confirmed {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border: 1px solid rgba(40, 167, 69, 0.3);
    }
    
    .badge-cancelled {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.3);
    }
    
    /* Quick Actions Card dengan Warna Merah */
    .actions-card-red {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(198, 40, 40, 0.08);
        border: 1px solid rgba(198, 40, 40, 0.1);
        height: 100%;
        position: relative;
    }
    
    .actions-card-red::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--primary-color);
    }
    
    .actions-card-red h2 {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
        color: var(--primary-dark);
    }
    
    .actions-card-red h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary-color);
        border-radius: 3px;
    }
    
    .action-btn-red {
        background: white;
        border: 2px solid rgba(198, 40, 40, 0.15);
        color: var(--primary-dark);
        padding: 15px 20px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-align: left;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
        width: 100%;
    }
    
    .action-btn-red:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(198, 40, 40, 0.2);
        border-color: var(--primary-color);
    }
    
    .action-btn-red i {
        font-size: 1.2rem;
        width: 24px;
        color: var(--primary-color);
    }
    
    .action-btn-red:hover i {
        color: white;
    }
    
    /* System Info Card dengan Warna Merah */
    .system-card-red {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(198, 40, 40, 0.2);
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .system-card-red::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 20px 20px;
        opacity: 0.1;
    }
    
    .system-card-red h2 {
        color: white;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 25px;
        z-index: 1;
    }
    
    .system-card-red h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: white;
        border-radius: 3px;
        z-index: 1;
    }
    
    .info-item-red {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        z-index: 1;
    }
    
    .info-label-red {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 5px;
    }
    
    .info-value-red {
        font-size: 1.1rem;
        font-weight: 600;
        color: white;
    }
    
    /* Animations */
    .fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
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
    
    /* Grid Animation Delays */
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
    
    /* Additional Dashboard Elements */
    .user-avatar-sm {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.9rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 3px 10px rgba(198, 40, 40, 0.2);
    }
    
    .date-display {
        text-align: center;
        line-height: 1.2;
    }
    
    .date-day {
        display: block;
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
    }
    
    .date-month {
        display: block;
        font-size: 0.8rem;
        text-transform: uppercase;
        color: var(--primary-dark);
    }
    
    .time-badge {
        background: rgba(198, 40, 40, 0.1);
        color: var(--primary-color);
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.85rem;
        border: 1px solid rgba(198, 40, 40, 0.2);
    }
    
    .people-count {
        display: flex;
        align-items: center;
        color: var(--primary-dark);
    }
    
    .people-count i {
        color: var(--primary-color);
        margin-right: 8px;
    }
    
    .empty-state {
        padding: 40px 20px;
        text-align: center;
    }
    
    .empty-state i {
        color: var(--primary-color);
        opacity: 0.5;
        margin-bottom: 15px;
    }
    
    .empty-state h5 {
        color: var(--primary-dark);
        margin-bottom: 10px;
    }
    
    .empty-state p {
        color: var(--primary-dark);
        opacity: 0.7;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card fade-in-up">
            <div class="stat-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <div class="stat-number">{{ $menuCount }}</div>
            <div class="stat-label">Total Menu</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card fade-in-up delay-1">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-number">{{ $reservationCount }}</div>
            <div class="stat-label">Reservasi</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card fade-in-up delay-2">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number">{{ $userCount }}</div>
            <div class="stat-label">Pengguna</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card fade-in-up delay-3">
            <div class="stat-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="stat-number">{{ $branchCount }}</div>
            <div class="stat-label">Cabang</div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="content-card">
            <div class="card-header">
                <h2><i class="fas fa-calendar-alt me-2"></i>Reservasi Terbaru</h2>
                <a href="{{ route('admin.reservations.index') }}" class="btn btn-admin">
                    <i class="fas fa-eye me-1"></i> Lihat Semua
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-red">
                    <thead>
                        <tr>
                            <th><i class="fas fa-user me-1"></i> Nama</th>
                            <th><i class="fas fa-calendar me-1"></i> Tanggal</th>
                            <th><i class="fas fa-clock me-1"></i> Waktu</th>
                            <th><i class="fas fa-user-friends me-1"></i> Jumlah Orang</th>
                            <th><i class="fas fa-info-circle me-1"></i> Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentReservations as $reservation)
                        <tr class="fade-in-up">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar-sm me-3">
                                        {{ strtoupper(substr($reservation->customer_name ?? $reservation->name ?? 'A', 0, 1)) }}
                                    </div>
                                    <div>
                                        <strong class="text-primary-dark">{{ $reservation->customer_name ?? $reservation->name }}</strong><br>
                                        <small class="text-muted">{{ $reservation->email ?? '' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="date-display">
                                    <span class="date-day">{{ \Carbon\Carbon::parse($reservation->date ?? $reservation->reservation_date)->format('d') }}</span>
                                    <span class="date-month">{{ \Carbon\Carbon::parse($reservation->date ?? $reservation->reservation_date)->format('M') }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="time-badge">{{ $reservation->time ?? '-' }}</span>
                            </td>
                            <td>
                                <div class="people-count">
                                    <i class="fas fa-user-friends me-2"></i>
                                    <strong>{{ $reservation->people ?? $reservation->guests ?? '0' }}</strong> orang
                                </div>
                            </td>
                            <td>
                                @if($reservation->status == 'pending')
                                    <span class="badge badge-red badge-pending">
                                        <i class="fas fa-clock me-1"></i> Pending
                                    </span>
                                @elseif($reservation->status == 'confirmed')
                                    <span class="badge badge-red badge-confirmed">
                                        <i class="fas fa-check me-1"></i> Confirmed
                                    </span>
                                @elseif($reservation->status == 'cancelled')
                                    <span class="badge badge-red badge-cancelled">
                                        <i class="fas fa-times me-1"></i> Cancelled
                                    </span>
                                @else
                                    <span class="badge badge-red" style="background: rgba(108, 117, 125, 0.1); color: #6c757d; border-color: rgba(108, 117, 125, 0.3);">
                                        {{ $reservation->status }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-calendar-alt fa-3x"></i>
                                    <h5>Tidak ada reservasi terbaru</h5>
                                    <p>Belum ada reservasi yang dibuat</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="actions-card-red fade-in-up delay-2">
            <h2><i class="fas fa-bolt me-2"></i>Aksi Cepat</h2>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.menu.create') }}" class="action-btn-red">
                    <i class="fas fa-plus"></i>
                    <div>
                        <div>Tambah Menu Baru</div>
                        <small>Tambahkan item menu baru</small>
                    </div>
                </a>
                <a href="{{ route('admin.reservations.index') }}" class="action-btn-red">
                    <i class="fas fa-calendar-alt"></i>
                    <div>
                        <div>Kelola Reservasi</div>
                        <small>Lihat semua reservasi</small>
                    </div>
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="action-btn-red">
                    <i class="fas fa-images"></i>
                    <div>
                        <div>Kelola Gallery</div>
                        <small>Unggah foto baru</small>
                    </div>
                </a>
                <a href="{{ route('admin.users.index') }}" class="action-btn-red">
                    <i class="fas fa-user-cog"></i>
                    <div>
                        <div>Kelola Pengguna</div>
                        <small>Lihat daftar pengguna</small>
                    </div>
                </a>
            </div>
        </div>
        
        <div class="system-card-red fade-in-up delay-3 mt-4">
            <h2><i class="fas fa-info-circle me-2"></i>Informasi Sistem</h2>
            <div class="info-item-red">
                <div class="info-label-red">Website Status</div>
                <div class="info-value-red d-flex justify-content-between align-items-center">
                    <span>Berjalan Normal</span>
                    <span class="badge badge-red" style="background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.3);">
                        <i class="fas fa-circle me-1" style="color: #28a745;"></i> Online
                    </span>
                </div>
            </div>
            <div class="info-item-red">
                <div class="info-label-red">Versi Sistem</div>
                <div class="info-value-red">1.2.0</div>
            </div>
            <div class="info-item-red">
                <div class="info-label-red">Server Time</div>
                <div class="info-value-red">{{ now()->format('H:i:s') }}</div>
            </div>
            <div class="info-item-red">
                <div class="info-label-red">Terakhir Diperbarui</div>
                <div class="info-value-red">{{ now()->format('d F Y') }}</div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Live update server time
    function updateServerTime() {
        const now = new Date();
        const timeElement = document.querySelector('.system-card-red .info-value-red:nth-child(3)');
        if (timeElement) {
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            timeElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
    }
    
    // Update time every second
    setInterval(updateServerTime, 1000);
    
    // Initialize tooltips
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"]').tooltip();
        
        // Add animation to cards on hover
        $('.stat-card').hover(
            function() {
                $(this).css('transform', 'translateY(-8px)');
            },
            function() {
                $(this).css('transform', 'translateY(0)');
            }
        );
        
        // Add hover effect to action buttons
        $('.action-btn-red').hover(
            function() {
                $(this).css('transform', 'translateY(-3px)');
            },
            function() {
                $(this).css('transform', 'translateY(0)');
            }
        );
    });
</script>
@endsection
@endsection