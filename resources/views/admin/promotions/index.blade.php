@extends('layouts.admin')

@section('title', 'Kelola Promosi')
@section('page-title', 'Kelola Promosi')

@section('styles')
<style>
    /* Red Gradient Theme - Consistent with Dashboard */
    :root {
        --red-50: #fff1f0;
        --red-100: #ffe5e3;
        --red-200: #ffc9c5;
        --red-300: #ff9d95;
        --red-400: #ff6b6b;
        --red-500: #f44336;
        --red-600: #e53935;
        --red-700: #d32f2f;
        --red-800: #c62828;
        --red-900: #b71c1c;
        
        --gradient-sunset: linear-gradient(135deg, #ff6b6b, #ee5a6f);
        --gradient-crimson: linear-gradient(135deg, #c62828, #8e1537);
        --gradient-coral: linear-gradient(135deg, #ff7e5f, #feb47b);
        --gradient-rose: linear-gradient(135deg, #e53935, #b71c1c);
        --gradient-burgundy: linear-gradient(135deg, #8e0000, #c62828);
        --gradient-scarlet: linear-gradient(135deg, #ff5252, #f44336);
        
        --shadow-sm: 0 4px 6px -1px rgba(198, 40, 40, 0.1), 0 2px 4px -1px rgba(198, 40, 40, 0.06);
        --shadow-md: 0 10px 15px -3px rgba(198, 40, 40, 0.15), 0 4px 6px -2px rgba(198, 40, 40, 0.1);
        --shadow-lg: 0 20px 25px -5px rgba(198, 40, 40, 0.2), 0 10px 10px -5px rgba(198, 40, 40, 0.1);
        --shadow-xl: 0 25px 50px -12px rgba(198, 40, 40, 0.25);
        
        --font-sans: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    }

    /* Main Container */
    .content-card {
        background: linear-gradient(145deg, #fff9f9 0%, #fff1f0 100%);
        border-radius: 32px;
        padding: 30px;
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
    }

    .content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, transparent, var(--red-400), var(--red-600), var(--red-800), transparent);
        opacity: 0.5;
    }

    /* Card Header */
    .card-header {
        background: linear-gradient(145deg, #ffffff, #fff5f5);
        border-radius: 24px !important;
        padding: 20px 24px;
        margin-bottom: 24px;
        border: 1px solid rgba(198, 40, 40, 0.1);
        box-shadow: var(--shadow-sm);
    }

    .card-header h2 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1a202c;
        margin: 0;
        font-family: var(--font-sans);
        position: relative;
        display: inline-block;
    }

    .card-header h2::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--gradient-crimson);
        border-radius: 2px;
    }

    /* Admin Button */
    .btn-admin {
        background: var(--gradient-crimson);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(198, 40, 40, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        position: relative;
        overflow: hidden;
        letter-spacing: 0.02em;
    }

    .btn-admin::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .btn-admin:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(198, 40, 40, 0.4);
        color: white;
    }

    .btn-admin:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-admin i {
        font-size: 1.1rem;
    }

    /* Alerts */
    .alert {
        padding: 16px 20px;
        margin-bottom: 24px;
        border-radius: 16px;
        animation: slideIn 0.4s cubic-bezier(0.2, 0.9, 0.3, 1);
        border: none;
        position: relative;
        overflow: hidden;
        font-weight: 500;
    }

    .alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .alert-success {
        background: linear-gradient(145deg, #f0fff4, #e6fffa);
        color: #22543d;
    }

    .alert-success::before {
        background: linear-gradient(135deg, #48bb78, #38a169);
    }

    .alert-danger {
        background: linear-gradient(145deg, #fff5f5, #fee);
        color: #742a2a;
    }

    .alert-danger::before {
        background: linear-gradient(135deg, #f56565, #c53030);
    }

    .alert i {
        font-size: 1.2rem;
    }

    .btn-close {
        filter: brightness(0.5);
        transition: all 0.2s ease;
    }

    .btn-close:hover {
        filter: brightness(0.8);
        transform: scale(1.1);
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    /* Table Container */
    .table-responsive {
        background: white;
        border-radius: 24px;
        padding: 4px;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(198, 40, 40, 0.1);
        overflow: hidden;
    }

    /* Modern Table */
    #promotions-table {
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }

    #promotions-table thead {
        background: var(--gradient-crimson);
    }

    #promotions-table thead th {
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        padding: 18px 16px;
        border: none;
        white-space: nowrap;
    }

    #promotions-table thead th:first-child {
        border-top-left-radius: 20px;
    }

    #promotions-table thead th:last-child {
        border-top-right-radius: 20px;
    }

    #promotions-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(198, 40, 40, 0.08);
    }

    #promotions-table tbody tr:last-child {
        border-bottom: none;
    }

    #promotions-table tbody tr:hover {
        background: linear-gradient(90deg, rgba(198, 40, 40, 0.04), transparent);
        transform: translateX(4px);
        box-shadow: 0 2px 8px rgba(198, 40, 40, 0.05);
    }

    #promotions-table tbody td {
        padding: 20px 16px;
        vertical-align: middle;
        color: #2d3748;
        font-size: 0.95rem;
        border: none;
    }

    /* Product Image */
    #promotions-table td img {
        width: 80px;
        height: 60px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    #promotions-table tbody tr:hover td img {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(198, 40, 40, 0.2);
    }

    /* Price Styling */
    #promotions-table td .text-muted.text-decoration-line-through {
        font-size: 0.8rem;
        opacity: 0.7;
    }

    #promotions-table td .text-danger.fw-bold {
        font-size: 1.1rem;
        background: linear-gradient(135deg, #e53935, #c62828);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    #promotions-table td .badge.bg-success {
        background: linear-gradient(135deg, #48bb78, #38a169) !important;
        padding: 4px 8px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.7rem;
        box-shadow: 0 2px 4px rgba(72, 187, 120, 0.3);
    }

    /* Badge Text */
    #promotions-table td .badge.bg-warning {
        background: linear-gradient(135deg, #ffb74d, #ff9800) !important;
        color: white !important;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.75rem;
        box-shadow: 0 2px 4px rgba(255, 152, 0, 0.3);
        text-transform: uppercase;
        letter-spacing: 0.02em;
    }

    /* Date Display */
    #promotions-table td small {
        font-size: 0.85rem;
        color: #4a5568;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    #promotions-table td small i {
        color: var(--red-600);
        width: 16px;
        font-size: 0.9rem;
    }

    /* Status Badges */
    #promotions-table td .badge {
        padding: 8px 14px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    #promotions-table td .badge.bg-success {
        background: linear-gradient(135deg, #48bb78, #38a169) !important;
    }

    #promotions-table td .badge.bg-info {
        background: linear-gradient(135deg, #4299e1, #3182ce) !important;
    }

    #promotions-table td .badge.bg-secondary {
        background: linear-gradient(135deg, #a0aec0, #718096) !important;
    }

    #promotions-table td .badge.bg-danger {
        background: linear-gradient(135deg, #f56565, #c53030) !important;
    }

    /* Sort Order Badge */
    #promotions-table td .badge.bg-secondary:last-child {
        background: linear-gradient(135deg, #c62828, #b71c1c) !important;
        min-width: 32px;
        text-align: center;
    }

    /* Action Buttons */
    #promotions-table td .d-flex {
        gap: 8px;
    }

    #promotions-table td .btn-sm {
        padding: 8px 12px;
        font-size: 0.8rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    #promotions-table td .btn-sm i {
        font-size: 0.9rem;
    }

    #promotions-table td .btn-primary {
        background: linear-gradient(135deg, #4299e1, #3182ce);
        color: white;
    }

    #promotions-table td .btn-primary:hover {
        background: linear-gradient(135deg, #3182ce, #2c5282);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(66, 153, 225, 0.4);
    }

    #promotions-table td .btn-danger {
        background: linear-gradient(135deg, #f56565, #c53030);
        color: white;
    }

    #promotions-table td .btn-danger:hover {
        background: linear-gradient(135deg, #c53030, #9b2c2c);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 101, 101, 0.4);
    }

    /* Empty State */
    #promotions-table td[colspan="9"] {
        padding: 60px 20px !important;
    }

    #promotions-table .text-muted {
        color: #4a5568 !important;
    }

    #promotions-table .text-muted i {
        color: var(--red-400);
        opacity: 0.5;
        font-size: 4rem;
        margin-bottom: 20px;
    }

    #promotions-table .text-muted h5 {
        font-size: 1.3rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
        font-family: var(--font-sans);
    }

    #promotions-table .text-muted p {
        color: #718096;
        font-size: 1rem;
        margin-bottom: 24px;
    }

    #promotions-table .text-muted .btn-admin {
        display: inline-flex;
        padding: 12px 28px;
        font-size: 0.95rem;
    }

    /* DataTables Customization */
    .dataTables_wrapper {
        padding: 20px;
    }

    .dataTables_length select {
        border: 2px solid rgba(198, 40, 40, 0.1);
        border-radius: 12px;
        padding: 6px 12px;
        margin: 0 8px;
        color: #2d3748;
        font-weight: 500;
    }

    .dataTables_filter input {
        border: 2px solid rgba(198, 40, 40, 0.1);
        border-radius: 30px;
        padding: 8px 16px 8px 40px;
        margin-left: 8px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23c62828' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: 12px center;
        transition: all 0.3s ease;
    }

    .dataTables_filter input:focus {
        outline: none;
        border-color: var(--red-600);
        box-shadow: 0 0 0 3px rgba(198, 40, 40, 0.1);
    }

    .dataTables_info {
        color: #4a5568;
        font-size: 0.9rem;
        padding: 12px 0;
    }

    .dataTables_paginate {
        padding: 12px 0;
    }

    .dataTables_paginate .paginate_button {
        border-radius: 12px !important;
        margin: 0 4px;
        padding: 8px 16px !important;
        color: #4a5568 !important;
        border: 1px solid rgba(198, 40, 40, 0.1) !important;
        background: white !important;
        transition: all 0.3s ease;
    }

    .dataTables_paginate .paginate_button:hover {
        background: linear-gradient(135deg, #fff5f5, #ffe5e3) !important;
        border-color: var(--red-600) !important;
        color: var(--red-800) !important;
        transform: translateY(-2px);
    }

    .dataTables_paginate .paginate_button.current {
        background: var(--gradient-crimson) !important;
        color: white !important;
        border: none !important;
        box-shadow: 0 4px 10px rgba(198, 40, 40, 0.3);
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .content-card {
            padding: 20px;
        }

        .card-header {
            flex-direction: column;
            gap: 16px;
            text-align: center;
        }

        .card-header h2::after {
            left: 50%;
            transform: translateX(-50%);
        }

        .btn-admin {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .content-card {
            padding: 15px;
        }

        .card-header h2 {
            font-size: 1.5rem;
        }

        #promotions-table thead th {
            font-size: 0.8rem;
            padding: 12px 8px;
        }

        #promotions-table tbody td {
            padding: 15px 8px;
            font-size: 0.85rem;
        }

        #promotions-table td .btn-sm {
            padding: 6px 10px;
        }
    }

    /* Tooltip */
    .tooltip {
        font-family: var(--font-sans);
    }

    .tooltip-inner {
        background: var(--gradient-crimson);
        border-radius: 12px;
        padding: 8px 16px;
        font-weight: 500;
        box-shadow: var(--shadow-md);
    }

    /* SweetAlert2 Customization */
    .swal2-popup {
        border-radius: 28px !important;
        padding: 30px !important;
        font-family: var(--font-sans) !important;
    }

    .swal2-title {
        font-size: 1.6rem !important;
        font-weight: 700 !important;
        color: #1a202c !important;
    }

    .swal2-html-container {
        font-size: 1rem !important;
        color: #4a5568 !important;
    }

    .swal2-html-container strong {
        color: var(--red-800);
    }

    .swal2-confirm {
        background: linear-gradient(135deg, #f56565, #c53030) !important;
        border-radius: 50px !important;
        padding: 12px 32px !important;
        font-weight: 600 !important;
        letter-spacing: 0.02em !important;
        box-shadow: 0 4px 12px rgba(245, 101, 101, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .swal2-confirm:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 20px rgba(245, 101, 101, 0.4) !important;
    }

    .swal2-cancel {
        background: linear-gradient(135deg, #a0aec0, #718096) !important;
        border-radius: 50px !important;
        padding: 12px 32px !important;
        font-weight: 600 !important;
        letter-spacing: 0.02em !important;
        box-shadow: 0 4px 12px rgba(113, 128, 150, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .swal2-cancel:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 20px rgba(113, 128, 150, 0.4) !important;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #ffefef;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #c62828, #b71c1c);
        border-radius: 4px;
        border: 2px solid #ffefef;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #b71c1c, #8e1537);
    }
</style>
@endsection

@section('content')
<!-- Your existing content remains exactly the same -->
<div class="content-card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Daftar Promosi</h2>
        <a href="{{ route('admin.promotions.create') }}" class="btn btn-admin">
            <i class="fas fa-plus"></i> Tambah Promosi Baru
        </a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-hover" id="promotions-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="10%">Gambar</th>
                    <th width="20%">Judul Promosi</th>
                    <th width="15%">Harga</th>
                    <th width="10%">Badge</th>
                    <th width="15%">Periode</th>
                    <th width="10%">Status</th>
                    <th width="5%">Urutan</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($promotions as $index => $promo)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ $promo->image_url }}" 
                             alt="{{ $promo->title }}" 
                             style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px;"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/80x60?text=No+Image';">
                    </td>
                    <td>
                        <strong>{{ $promo->title }}</strong>
                        <small class="d-block text-muted">{{ Str::limit($promo->description, 50) }}</small>
                    </td>
                    <td>
                        @if($promo->old_price && $promo->old_price > 0)
                            <span class="text-muted text-decoration-line-through small">Rp {{ number_format($promo->old_price, 0, ',', '.') }}</span><br>
                            <span class="text-danger fw-bold">Rp {{ number_format($promo->current_price, 0, ',', '.') }}</span>
                            @php
                                $discount = round((($promo->old_price - $promo->current_price) / $promo->old_price) * 100);
                            @endphp
                            <span class="badge bg-success ms-1">{{ $discount > 0 ? '-' . $discount . '%' : '' }}</span>
                        @else
                            <span class="fw-bold">Rp {{ number_format($promo->current_price, 0, ',', '.') }}</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-warning text-dark">{{ $promo->badge_text }}</span>
                    </td>
                    <td>
                        <small>
                            <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($promo->start_date)->format('d/m/Y') }}<br>
                            <i class="far fa-calendar-check"></i> {{ \Carbon\Carbon::parse($promo->end_date)->format('d/m/Y') }}
                        </small>
                    </td>
                    <td>
                        @php
                            $now = \Carbon\Carbon::now();
                            $start = \Carbon\Carbon::parse($promo->start_date);
                            $end = \Carbon\Carbon::parse($promo->end_date);
                        @endphp
                        
                        @if($promo->is_active)
                            @if($start <= $now && $end >= $now)
                                <span class="badge bg-success">Aktif</span>
                            @elseif($start > $now)
                                <span class="badge bg-info text-white">Akan Datang</span>
                            @else
                                <span class="badge bg-secondary">Kadaluarsa</span>
                            @endif
                        @else
                            <span class="badge bg-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge bg-secondary">{{ $promo->sort_order ?: '-' }}</span>
                    </td>
                    <td>
                        <!-- Aksi buttons - Pastikan ini muncul dengan benar -->
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.promotions.edit', $promo->id) }}" 
                               class="btn btn-sm btn-primary" 
                               title="Edit Promosi"
                               style="background-color: #0d6efd; border-color: #0d6efd; padding: 5px 10px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            
                            <!-- Form Delete Terpisah untuk Masing-masing Promosi -->
                            <form id="delete-form-{{ $promo->id }}" 
                                  action="{{ route('admin.promotions.destroy', $promo->id) }}" 
                                  method="POST" 
                                  style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="btn btn-sm btn-danger" 
                                        onclick="confirmDelete({{ $promo->id }}, '{{ addslashes($promo->title) }}')"
                                        title="Hapus Promosi"
                                        style="background-color: #dc3545; border-color: #dc3545; padding: 5px 10px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-tags fa-4x mb-3" style="opacity: 0.5;"></i>
                            <h5>Belum ada promosi yang ditambahkan</h5>
                            <p class="mb-3">Klik tombol "Tambah Promosi Baru" untuk membuat promosi pertama Anda.</p>
                            <a href="{{ route('admin.promotions.create') }}" class="btn btn-admin">
                                <i class="fas fa-plus"></i> Tambah Promosi
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Your existing scripts remain exactly the same -->
<!-- Include SweetAlert2 dari CDN jika belum ada -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Fungsi confirm delete yang ditingkatkan
function confirmDelete(id, title) {
    // Pastikan SweetAlert2 tersedia
    if (typeof Swal !== 'undefined') {
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
                // Submit form dengan ID yang sesuai
                const form = document.getElementById('delete-form-' + id);
                if (form) {
                    form.submit();
                } else {
                    Swal.showValidationMessage('Form tidak ditemukan');
                }
            }
        });
    } else {
        // Fallback ke confirm native
        if (confirm('Apakah Anda yakin ingin menghapus promosi "' + title + '"? Data yang sudah dihapus tidak dapat dikembalikan!')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
}

// Debugging: Cek apakah route tersedia
console.log('Delete route pattern: {{ route('admin.promotions.destroy', 1) }}');

$(document).ready(function() {
    // Initialize tooltips
    if (typeof $.fn.tooltip !== 'undefined') {
        $('[title]').tooltip();
    }
    
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 5000);
    
    // Simple table sorting without DataTable jika DataTable bermasalah
    if (typeof $.fn.DataTable !== 'undefined') {
        try {
            if ($('#promotions-table').length && !$.fn.DataTable.isDataTable('#promotions-table')) {
                $('#promotions-table').DataTable({
                    "language": {
                        "search": "Cari:",
                        "lengthMenu": "Tampilkan _MENU_ data",
                        "zeroRecords": "Data tidak ditemukan",
                        "info": "Menampilkan _START_-_END_ dari _TOTAL_ data",
                        "infoEmpty": "Tidak ada data",
                        "infoFiltered": "(disaring dari _MAX_ total data)",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "›",
                            "previous": "‹"
                        }
                    },
                    "order": [[7, 'asc']],
                    "pageLength": 10,
                    "columnDefs": [
                        { "orderable": false, "targets": [1, 8] }
                    ]
                });
            }
        } catch (e) {
            console.error('DataTable error:', e);
        }
    }
});
</script>

<!-- If you want to keep your existing inline styles, you can remove them as they're now in the styles section -->
<!-- But leaving them won't break anything as the new CSS will override them -->

<!-- Fallback script -->
<script>
// Fallback function jika SweetAlert gagal load
window.onerror = function(msg, url, line) {
    if (msg.includes('Swal is not defined')) {
        window.confirmDelete = function(id, title) {
            if (confirm('Apakah Anda yakin ingin menghapus promosi "' + title + '"?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        };
    }
};
</script>
@endsection