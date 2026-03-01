@extends('layouts.admin')

@section('title', 'Kelola Reservasi')
@section('page-title', 'Kelola Reservasi')

@section('content')
<div class="container-fluid px-4">
    <!-- Statistik Reservasi with Red Gradient Theme -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card pending-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="stat-label">Pending</span>
                            <h2 class="stat-value mb-0">{{ $pendingCount ?? 0 }}</h2>
                            <small class="stat-trend">Menunggu konfirmasi</small>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card confirmed-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="stat-label">Confirmed</span>
                            <h2 class="stat-value mb-0">{{ $confirmedCount ?? 0 }}</h2>
                            <small class="stat-trend">Telah dikonfirmasi</small>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card completed-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="stat-label">Completed</span>
                            <h2 class="stat-value mb-0">{{ $completedCount ?? 0 }}</h2>
                            <small class="stat-trend">Selesai tepat waktu</small>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-check-double fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card cancelled-card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="stat-label">Cancelled</span>
                            <h2 class="stat-value mb-0">{{ $cancelledCount ?? 0 }}</h2>
                            <small class="stat-trend">Dibatalkan</small>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i class="fas fa-times-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show glass-alert" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show glass-alert" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Tabel Reservasi with Red Theme -->
    <div class="card main-card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 header-title">
                    <i class="fas fa-calendar-check me-2"></i>
                    Daftar Reservasi
                </h5>
                <div class="header-actions">
                    <span class="total-badge">
                        <i class="fas fa-database me-1"></i>
                        Total: {{ $totalCount ?? 0 }}
                    </span>
                    <button class="btn btn-sm btn-refresh" onclick="location.reload()">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="reservationsTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jumlah Tamu</th>
                            <th>Kontak</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr class="table-row-hover">
                            <td><span class="reservation-id">#{{ $reservation->id }}</span></td>
                            <td>
                                <div class="customer-name">{{ $reservation->customer_name }}</div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                            <td><span class="time-badge">{{ $reservation->reservation_time }}</span></td>
                            <td>
                                <span class="guest-badge">
                                    <i class="fas fa-users me-1"></i>
                                    {{ $reservation->guest_count }}
                                </span>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <div><i class="fas fa-phone-alt me-1"></i>{{ $reservation->phone }}</div>
                                    <small><i class="fas fa-envelope me-1"></i>{{ $reservation->email }}</small>
                                </div>
                            </td>
                            <td>
                                @if($reservation->status == 'pending')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock me-1"></i>Pending
                                    </span>
                                @elseif($reservation->status == 'confirmed')
                                    <span class="status-badge status-confirmed">
                                        <i class="fas fa-check-circle me-1"></i>Confirmed
                                    </span>
                                @elseif($reservation->status == 'cancelled')
                                    <span class="status-badge status-cancelled">
                                        <i class="fas fa-times-circle me-1"></i>Cancelled
                                    </span>
                                @elseif($reservation->status == 'completed')
                                    <span class="status-badge status-completed">
                                        <i class="fas fa-check-double me-1"></i>Completed
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="created-date">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $reservation->created_at ? $reservation->created_at->format('d/m/Y') : '-' }}
                                </span>
                                <br>
                                <small class="created-time">
                                    <i class="far fa-clock me-1"></i>
                                    {{ $reservation->created_at ? $reservation->created_at->format('H:i') : '-' }}
                                </small>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if($reservation->status == 'pending')
                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline action-form">
                                        @csrf
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="btn-action btn-confirm" title="Konfirmasi" onclick="return confirm('Konfirmasi reservasi ini?')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    
                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline action-form">
                                        @csrf
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="btn-action btn-cancel" title="Batalkan" onclick="return confirm('Batalkan reservasi ini?')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                    
                                    @elseif($reservation->status == 'confirmed')
                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline action-form">
                                        @csrf
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="btn-action btn-complete" title="Selesaikan" onclick="return confirm('Tandai reservasi ini sebagai selesai?')">
                                            <i class="fas fa-check-double"></i>
                                        </button>
                                    </form>
                                    @endif
                                    
                                    <button type="button" class="btn-action btn-view" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detailModal{{ $reservation->id }}"
                                            title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    
                                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline action-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" 
                                                onclick="return confirm('Hapus reservasi ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Modal Detail with Red Theme -->
                        <div class="modal fade" id="detailModal{{ $reservation->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content custom-modal">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title">
                                            <i class="fas fa-receipt me-2"></i>
                                            Detail Reservasi #{{ $reservation->id }}
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="info-card">
                                                    <h6 class="info-title">
                                                        <i class="fas fa-user-circle me-2"></i>Informasi Pelanggan
                                                    </h6>
                                                    <div class="info-content">
                                                        <p><strong>Nama:</strong> {{ $reservation->customer_name }}</p>
                                                        <p><strong>Email:</strong> {{ $reservation->email }}</p>
                                                        <p><strong>Telepon:</strong> {{ $reservation->phone }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-card">
                                                    <h6 class="info-title">
                                                        <i class="fas fa-calendar-alt me-2"></i>Detail Reservasi
                                                    </h6>
                                                    <div class="info-content">
                                                        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d F Y') }}</p>
                                                        <p><strong>Waktu:</strong> {{ $reservation->reservation_time }}</p>
                                                        <p><strong>Jumlah Tamu:</strong> {{ $reservation->guest_count }} Orang</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="special-requests-card">
                                                    <h6 class="special-requests-title">
                                                        <i class="fas fa-comment-dots me-2"></i>Permintaan Khusus
                                                    </h6>
                                                    <div class="special-requests-content">
                                                        @if($reservation->special_requests && trim($reservation->special_requests) !== '')
                                                            {{ $reservation->special_requests }}
                                                        @else
                                                            <em class="text-muted">Tidak ada permintaan khusus</em>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="info-card">
                                                    <h6 class="info-title">
                                                        <i class="fas fa-code me-2"></i>Kode Reservasi
                                                    </h6>
                                                    <div class="info-content">
                                                        <span class="reservation-code">{{ $reservation->reservation_code ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-card">
                                                    <h6 class="info-title">
                                                        <i class="fas fa-tag me-2"></i>Status
                                                    </h6>
                                                    <div class="info-content">
                                                        @if($reservation->status == 'pending')
                                                            <span class="modal-status status-pending">
                                                                <i class="fas fa-clock me-1"></i>Pending
                                                            </span>
                                                        @elseif($reservation->status == 'confirmed')
                                                            <span class="modal-status status-confirmed">
                                                                <i class="fas fa-check-circle me-1"></i>Confirmed
                                                            </span>
                                                        @elseif($reservation->status == 'cancelled')
                                                            <span class="modal-status status-cancelled">
                                                                <i class="fas fa-times-circle me-1"></i>Cancelled
                                                            </span>
                                                        @elseif($reservation->status == 'completed')
                                                            <span class="modal-status status-completed">
                                                                <i class="fas fa-check-double me-1"></i>Completed
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="timestamp-info">
                                                    <small>
                                                        <i class="far fa-clock me-1"></i>
                                                        Dibuat: {{ $reservation->created_at ? $reservation->created_at->format('d F Y H:i') : '-' }}
                                                        @if($reservation->updated_at && $reservation->updated_at != $reservation->created_at)
                                                            | Diupdate: {{ $reservation->updated_at->format('d F Y H:i') }}
                                                        @endif
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            <i class="fas fa-times me-1"></i>Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fas fa-calendar-times fa-4x mb-3"></i>
                                    <h5>Belum Ada Reservasi</h5>
                                    <p class="text-muted">Reservasi akan muncul di sini setelah pelanggan melakukan pemesanan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* Global Styles */
    body {
        font-family: 'Inter', sans-serif;
        background: #faf7f5;
    }

    /* Red Gradient Theme Variables */
    :root {
        --red-primary: #b42222;
        --red-secondary: #8b1a1a;
        --red-gradient: linear-gradient(135deg, #b42222, #8b1a1a, #6b1414);
        --red-light: #fee;
        --red-soft: #fff5f5;
    }

    /* Stat Cards with Red Theme */
    .stat-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(180, 34, 34, 0.1);
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--red-gradient);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(180, 34, 34, 0.2);
    }

    .pending-card { background: linear-gradient(135deg, #fef3e7, #fff); }
    .confirmed-card { background: linear-gradient(135deg, #e8f5e9, #fff); }
    .completed-card { background: linear-gradient(135deg, #e3f2fd, #fff); }
    .cancelled-card { background: linear-gradient(135deg, #ffebee, #fff); }

    .stat-label {
        color: #666;
        font-size: 0.9rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-value {
        color: var(--red-primary);
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.2;
    }

    .stat-trend {
        color: #999;
        font-size: 0.8rem;
    }

    .stat-icon-wrapper {
        width: 60px;
        height: 60px;
        background: var(--red-gradient);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        box-shadow: 0 5px 15px rgba(180, 34, 34, 0.3);
    }

    /* Main Card */
    .main-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .main-card .card-header {
        background: linear-gradient(135deg, #fff, #faf7f5);
        border-bottom: 2px solid var(--red-light);
        padding: 1.5rem;
    }

    .header-title {
        color: var(--red-primary);
        font-weight: 600;
        font-size: 1.2rem;
    }

    .total-badge {
        background: var(--red-soft);
        color: var(--red-primary);
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-weight: 500;
        margin-right: 0.5rem;
    }

    .btn-refresh {
        background: var(--red-soft);
        color: var(--red-primary);
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-refresh:hover {
        background: var(--red-gradient);
        color: white;
        transform: rotate(180deg);
    }

    /* Table Styles */
    .table {
        margin-bottom: 0;
    }

    .table thead th {
        background: var(--red-soft);
        color: var(--red-primary);
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-bottom: 2px solid var(--red-light);
        padding: 1rem;
    }

    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #f0e8e5;
    }

    .table-row-hover:hover {
        background: var(--red-soft) !important;
        transition: all 0.3s ease;
    }

    .reservation-id {
        font-weight: 600;
        color: var(--red-primary);
        background: var(--red-soft);
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.9rem;
    }

    .customer-name {
        font-weight: 500;
        color: #333;
    }

    .time-badge {
        background: #f0e8e5;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        color: var(--red-primary);
        font-weight: 500;
    }

    .guest-badge {
        background: #f0e8e5;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.85rem;
        color: var(--red-primary);
        font-weight: 500;
    }

    .contact-info {
        font-size: 0.9rem;
    }

    .contact-info small {
        color: #999;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }

    .status-pending {
        background: #fff3e0;
        color: #e67e22;
    }

    .status-confirmed {
        background: #e8f5e9;
        color: #27ae60;
    }

    .status-cancelled {
        background: #ffebee;
        color: #c0392b;
    }

    .status-completed {
        background: #e3f2fd;
        color: #2980b9;
    }

    .created-date {
        font-size: 0.85rem;
        color: #666;
    }

    .created-time {
        font-size: 0.75rem;
        color: #999;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 0.3rem;
        flex-wrap: wrap;
    }

    .btn-action {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: white;
        font-size: 0.9rem;
    }

    .btn-confirm {
        background: linear-gradient(135deg, #27ae60, #2ecc71);
    }

    .btn-confirm:hover {
        background: linear-gradient(135deg, #2ecc71, #27ae60);
        transform: scale(1.1);
    }

    .btn-cancel {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    .btn-cancel:hover {
        background: linear-gradient(135deg, #c0392b, #e74c3c);
        transform: scale(1.1);
    }

    .btn-complete {
        background: linear-gradient(135deg, #3498db, #2980b9);
    }

    .btn-complete:hover {
        background: linear-gradient(135deg, #2980b9, #3498db);
        transform: scale(1.1);
    }

    .btn-view {
        background: var(--red-gradient);
    }

    .btn-view:hover {
        background: var(--red-gradient);
        transform: scale(1.1);
        filter: brightness(1.1);
    }

    .btn-delete {
        background: linear-gradient(135deg, #95a5a6, #7f8c8d);
    }

    .btn-delete:hover {
        background: linear-gradient(135deg, #7f8c8d, #95a5a6);
        transform: scale(1.1);
    }

    /* Modal Styles */
    .custom-modal {
        border: none;
        border-radius: 25px;
        overflow: hidden;
    }

    .custom-modal-header {
        background: var(--red-gradient);
        color: white;
        border: none;
        padding: 1.5rem;
    }

    .custom-modal-header .btn-close {
        filter: brightness(0) invert(1);
    }

    .info-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 1.2rem;
        height: 100%;
    }

    .info-title {
        color: var(--red-primary);
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        border-bottom: 2px solid var(--red-light);
        padding-bottom: 0.5rem;
    }

    .info-content p {
        margin-bottom: 0.5rem;
        color: #555;
    }

    .info-content strong {
        color: #333;
        width: 80px;
        display: inline-block;
    }

    .special-requests-card {
        background: linear-gradient(135deg, #f8f9fa, #fff);
        border-radius: 15px;
        padding: 1.2rem;
        border-left: 4px solid var(--red-primary);
    }

    .special-requests-title {
        color: var(--red-primary);
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.8rem;
    }

    .special-requests-content {
        color: #555;
        line-height: 1.6;
        font-style: italic;
    }

    .reservation-code {
        background: var(--red-soft);
        color: var(--red-primary);
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-family: monospace;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .modal-status {
        padding: 0.5rem 1.2rem;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 500;
        display: inline-block;
    }

    .timestamp-info {
        text-align: right;
        color: #999;
        font-size: 0.8rem;
        padding-top: 1rem;
        border-top: 1px dashed #dee2e6;
    }

    /* Empty State */
    .empty-state {
        color: #999;
    }

    .empty-state i {
        color: var(--red-primary);
        opacity: 0.3;
    }

    .empty-state h5 {
        color: #666;
        margin-top: 1rem;
    }

    /* Glass Alert */
    .glass-alert {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: none;
        border-left: 4px solid;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .alert-success {
        border-left-color: #27ae60;
    }

    .alert-danger {
        border-left-color: #c0392b;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .stat-value {
            font-size: 2rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-action {
            width: 100%;
            margin: 2px 0;
        }
    }

    /* DataTables Customization */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid var(--red-light);
        border-radius: 10px;
        padding: 0.4rem 0.8rem;
        outline: none;
    }

    .dataTables_wrapper .dataTables_length select:focus,
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: var(--red-primary);
        box-shadow: 0 0 0 3px rgba(180, 34, 34, 0.1);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border-radius: 8px !important;
        margin: 0 3px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--red-gradient) !important;
        border: none !important;
        color: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--red-light) !important;
        border: none !important;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    var hasData = {{ $reservations->count() > 0 ? 'true' : 'false' }};
    
    if (hasData) {
        if ($.fn.DataTable.isDataTable('#reservationsTable')) {
            $('#reservationsTable').DataTable().destroy();
        }
        
        $('#reservationsTable').DataTable({
            "order": [[0, "desc"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [8] } // Changed from 9 to 8 since we removed one column
            ],
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "initComplete": function(settings, json) {
                console.log('DataTable initialized with red gradient theme');
            }
        });
    }

    // Add animation to stat cards on page load
    $('.stat-card').each(function(index) {
        $(this).css('animation', `fadeInUp 0.5s ease forwards ${index * 0.1}s`);
    });

    // Add hover effect to table rows
    $('.table-row-hover').hover(
        function() {
            $(this).find('.btn-action').css('transform', 'scale(1)');
        },
        function() {
            $(this).find('.btn-action').css('transform', 'scale(1)');
        }
    );
});

// Add animation keyframes
const style = document.createElement('style');
style.innerHTML = `
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
@endpush