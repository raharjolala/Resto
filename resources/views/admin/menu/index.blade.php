@extends('layouts.admin')

@section('title', 'Kelola Menu')
@section('page-title', 'Kelola Menu')

@section('styles')
<style>
    /* ===== PREMIUM RED GRADIENT THEME V2 ===== */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        /* Red Gradient Palette */
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
        
        /* Gradients */
        --gradient-primary: linear-gradient(145deg, #DC143C, #B22234, #8B0000);
        --gradient-secondary: linear-gradient(145deg, #FF4D6D, #DC143C);
        --gradient-soft: linear-gradient(145deg, #FFF1F3, #FFE4E8, #FFD1D9);
        --gradient-glass: linear-gradient(145deg, rgba(220, 20, 60, 0.1), rgba(139, 0, 0, 0.05));
        --gradient-shine: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        
        /* Shadows */
        --shadow-sm: 0 5px 20px rgba(220, 20, 60, 0.08);
        --shadow-md: 0 8px 30px rgba(220, 20, 60, 0.12);
        --shadow-lg: 0 15px 40px rgba(220, 20, 60, 0.18);
        --shadow-xl: 0 25px 50px rgba(220, 20, 60, 0.25);
        --shadow-inner: inset 0 2px 4px rgba(0, 0, 0, 0.02);
        
        /* Border Radius */
        --radius-xs: 8px;
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --radius-full: 9999px;
        
        /* Typography */
        --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        
        /* Glass Effect */
        --glass-background: rgba(255, 255, 255, 0.85);
        --glass-border: 1px solid rgba(255, 255, 255, 0.5);
        --glass-shadow: 0 8px 32px rgba(220, 20, 60, 0.1);
    }

    * {
        font-family: var(--font-sans);
    }

    /* ===== MAIN CONTAINER ===== */
    .content-card {
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        position: relative;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .content-card:hover {
        box-shadow: var(--shadow-lg);
        transform: translateY(-2px);
    }

    .content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        z-index: 10;
    }

    /* ===== HEADER SECTION ===== */
    .card-header {
        background: var(--gradient-glass);
        padding: 2rem 2.5rem;
        border-bottom: 1px solid rgba(220, 20, 60, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        overflow: hidden;
        backdrop-filter: blur(10px);
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, var(--red-100) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.6;
        pointer-events: none;
        animation: float 10s ease-in-out infinite;
    }

    .card-header::after {
        content: '';
        position: absolute;
        bottom: -50%;
        left: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, var(--red-200) 0%, transparent 70%);
        border-radius: 50%;
        opacity: 0.4;
        pointer-events: none;
        animation: float 15s ease-in-out infinite reverse;
    }

    @keyframes float {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(20px, -20px) rotate(5deg); }
        66% { transform: translate(-10px, 10px) rotate(-5deg); }
    }

    .card-header h2 {
        margin: 0;
        font-size: 2rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
        z-index: 2;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header h2 i {
        font-size: 2.2rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 8px rgba(220, 20, 60, 0.3));
    }

    /* ===== PREMIUM BUTTON ===== */
    .btn-admin {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.9rem 2.2rem;
        border-radius: var(--radius-full);
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
        position: relative;
        z-index: 2;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
    }

    .btn-admin::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-admin:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    .btn-admin:hover::before {
        left: 100%;
    }

    .btn-admin i {
        font-size: 1.1rem;
        transition: transform 0.3s ease;
    }

    .btn-admin:hover i {
        transform: scale(1.2) rotate(90deg);
    }

    /* ===== TABLE STYLES ===== */
    .table-responsive {
        padding: 2rem 2.5rem;
        background: white;
    }

    .table {
        margin-bottom: 0;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .table thead th {
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--red-700);
        border: none;
        padding: 1rem 1rem;
        background: transparent;
        position: relative;
    }

    .table thead th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1rem;
        right: 1rem;
        height: 2px;
        background: var(--gradient-primary);
        border-radius: var(--radius-full);
        opacity: 0.3;
    }

    .table tbody tr {
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        cursor: pointer;
    }

    .table tbody tr:hover {
        transform: scale(1.02) translateY(-4px);
        box-shadow: var(--shadow-lg);
        background: white;
        z-index: 10;
    }

    .table tbody td {
        padding: 1.5rem 1rem;
        vertical-align: middle;
        color: #1a1a1a;
        border: none;
        background: white;
    }

    .table tbody td:first-child {
        border-top-left-radius: var(--radius-lg);
        border-bottom-left-radius: var(--radius-lg);
    }

    .table tbody td:last-child {
        border-top-right-radius: var(--radius-lg);
        border-bottom-right-radius: var(--radius-lg);
    }

    /* ===== IMAGE STYLES ===== */
    .menu-table-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: var(--radius-md);
        border: 3px solid white;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .table tbody tr:hover .menu-table-img {
        transform: scale(1.1) rotate(3deg);
        box-shadow: var(--shadow-xl);
        border-color: var(--red-500);
    }

    .menu-table-img-placeholder {
        width: 80px;
        height: 80px;
        background: var(--gradient-soft);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--red-500);
        border: 2px dashed var(--red-300);
        font-size: 1.8rem;
        transition: all 0.3s ease;
    }

    .menu-table-img-placeholder:hover {
        border-color: var(--red-500);
        color: var(--red-700);
        transform: scale(1.05);
        background: white;
    }

    /* ===== NUMBER BADGE ===== */
    .number-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        background: var(--gradient-soft);
        border-radius: var(--radius-full);
        color: var(--red-600);
        font-weight: 700;
        font-size: 1rem;
        border: 2px solid white;
        box-shadow: var(--shadow-sm);
    }

    .table tbody tr:hover .number-badge {
        background: var(--gradient-primary);
        color: white;
        transform: scale(1.1);
    }

    /* ===== MENU INFO ===== */
    .menu-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .menu-name {
        font-weight: 700;
        color: #1a1a1a;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        letter-spacing: -0.3px;
    }

    .table tbody tr:hover .menu-name {
        color: var(--red-600);
        transform: translateX(5px);
    }

    .menu-description {
        font-size: 0.8rem;
        color: #666;
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .menu-description i {
        color: var(--red-400);
        font-size: 0.7rem;
    }

    /* ===== BADGES ===== */
    .badge-custom {
        padding: 8px 16px;
        border-radius: var(--radius-full);
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: var(--shadow-sm);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(5px);
    }

    .badge-custom i {
        font-size: 0.9rem;
    }

    .badge-custom.available {
        background: linear-gradient(145deg, #28a745, #20c997);
        color: white;
    }

    .badge-custom.unavailable {
        background: linear-gradient(145deg, #dc3545, #c82333);
        color: white;
    }

    .badge-custom.category {
        background: linear-gradient(145deg, #f8f9fa, #e9ecef);
        color: var(--red-700);
        border: 1px solid var(--red-200);
    }

    .badge-custom.category i {
        color: var(--red-500);
    }

    .table tbody tr:hover .badge-custom {
        transform: scale(1.05);
        box-shadow: var(--shadow-lg);
    }

    /* ===== PRICE TAG ===== */
    .price-tag {
        font-weight: 800;
        font-size: 1.1rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -0.3px;
        position: relative;
        display: inline-block;
    }

    .price-tag::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -5px;
        right: -5px;
        bottom: -2px;
        background: var(--gradient-soft);
        border-radius: var(--radius-sm);
        z-index: -1;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
    }

    .table tbody tr:hover .price-tag::before {
        opacity: 1;
        transform: scale(1);
    }

    /* ===== ACTION BUTTONS ===== */
    .action-buttons {
        display: flex;
        gap: 8px;
        opacity: 0.7;
        transition: all 0.3s ease;
    }

    .table tbody tr:hover .action-buttons {
        opacity: 1;
    }

    .btn-action {
        width: 38px;
        height: 38px;
        border-radius: var(--radius-md);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .btn-action::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: var(--gradient-shine);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .btn-action:hover::before {
        opacity: 1;
    }

    .btn-action i {
        font-size: 1rem;
        position: relative;
        z-index: 2;
        transition: transform 0.3s ease;
    }

    .btn-action:hover {
        transform: translateY(-3px) rotate(5deg);
    }

    .btn-action:hover i {
        transform: scale(1.2);
    }

    .btn-action.edit {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        color: var(--red-600);
        border: 1px solid var(--red-200);
        box-shadow: 0 4px 10px rgba(220, 20, 60, 0.1);
    }

    .btn-action.edit:hover {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        box-shadow: var(--shadow-lg);
    }

    .btn-action.delete {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.2);
        box-shadow: 0 4px 10px rgba(220, 53, 69, 0.1);
    }

    .btn-action.delete:hover {
        background: linear-gradient(145deg, #dc3545, #c82333);
        color: white;
        border-color: transparent;
        box-shadow: 0 8px 20px rgba(220, 53, 69, 0.3);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 5rem 2rem;
        background: var(--gradient-soft);
        border-radius: var(--radius-xl);
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

    .empty-state i {
        font-size: 5rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 2;
    }

    .empty-state p {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 2rem;
        position: relative;
        z-index: 2;
    }

    /* ===== DATATABLES CUSTOMIZATION ===== */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 2rem;
    }

    .dataTables_wrapper .dataTables_length select,
    .dataTables_wrapper .dataTables_filter input {
        border: 2px solid var(--red-100);
        border-radius: var(--radius-full);
        padding: 0.6rem 1.5rem;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        background: white;
    }

    .dataTables_wrapper .dataTables_length select:focus,
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: var(--red-500);
        box-shadow: 0 0 0 4px rgba(220, 20, 60, 0.1);
        outline: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: none;
        border-radius: var(--radius-md);
        padding: 0.6rem 1.2rem;
        margin: 0 4px;
        transition: all 0.3s ease;
        background: white;
        color: #666 !important;
        font-weight: 500;
        box-shadow: var(--shadow-sm);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--gradient-primary) !important;
        color: white !important;
        box-shadow: var(--shadow-md);
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--gradient-soft) !important;
        border: none !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 992px) {
        .card-header {
            flex-direction: column;
            align-items: start;
            gap: 1.5rem;
            padding: 1.5rem;
        }

        .btn-admin {
            width: 100%;
            justify-content: center;
        }

        .table-responsive {
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem 0.8rem;
        }

        .menu-table-img,
        .menu-table-img-placeholder {
            width: 60px;
            height: 60px;
        }
    }

    /* ===== ANIMATIONS ===== */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .table tbody tr {
        animation: slideIn 0.5s ease forwards;
        animation-delay: calc(var(--index) * 0.05s);
        opacity: 0;
    }
</style>
@endsection

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2>
            <i class="fas fa-utensils"></i>
            Kelola Menu
        </h2>
        <a href="{{ route('admin.menu.create') }}" class="btn-admin">
            <i class="fas fa-plus-circle"></i>
            <span>Tambah Menu Baru</span>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table" id="menuTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Informasi Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $index => $item)
                <tr id="menu-row-{{ $item->id }}" style="--index: {{ $index }};">
                    <td>
                        <span class="number-badge">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>
                        @if($item->image)
                            @if(str_starts_with($item->image, 'http'))
                                <img src="{{ $item->image }}" 
                                     alt="{{ $item->name }}" 
                                     class="menu-table-img"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                            @else
                                <img src="{{ asset('storage/menu/' . $item->image) }}" 
                                     alt="{{ $item->name }}" 
                                     class="menu-table-img"
                                     loading="lazy"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                            @endif
                        @else
                            <div class="menu-table-img-placeholder">
                                <i class="fas fa-utensils"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="menu-info">
                            <div class="menu-name">{{ $item->name }}</div>
                            @if($item->description)
                                <div class="menu-description">
                                    <i class="fas fa-align-left"></i>
                                    {{ Str::limit($item->description, 50) }}
                                </div>
                            @endif
                            <div style="display: flex; gap: 8px; margin-top: 6px;">
                                @if($item->is_available)
                                    <span class="badge-custom available">
                                        <i class="fas fa-check-circle"></i> Tersedia
                                    </span>
                                @else
                                    <span class="badge-custom unavailable">
                                        <i class="fas fa-times-circle"></i> Habis
                                    </span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge-custom category">
                            <i class="fas fa-tag"></i>
                            {{ $item->category->name ?? 'Uncategorized' }}
                        </span>
                    </td>
                    <td>
                        <span class="price-tag">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.menu.edit', $item->id) }}" 
                               class="btn-action edit"
                               title="Edit Menu">
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            <button type="button" 
                                    class="btn-action delete-btn"
                                    data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}"
                                    title="Hapus Menu">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="fas fa-utensils"></i>
                            <p>Belum ada menu yang ditambahkan</p>
                            <a href="{{ route('admin.menu.create') }}" class="btn-admin">
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

<!-- Hidden form for delete -->
<form id="delete-form" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@section('scripts')
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#menuTable').DataTable({
        language: {
            processing: '<div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div>',
            search: '<i class="fas fa-search" style="color: #DC143C;"></i>',
            searchPlaceholder: 'Cari menu...',
            lengthMenu: 'Tampilkan _MENU_ data',
            info: 'Menampilkan _START_ - _END_ dari _TOTAL_ data',
            infoEmpty: 'Belum ada data',
            infoFiltered: '(disaring dari _MAX_ total data)',
            zeroRecords: 'Tidak ada data ditemukan',
            emptyTable: 'Tidak ada data dalam tabel',
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                last: '<i class="fas fa-angle-double-right"></i>'
            }
        },
        order: [[0, 'asc']],
        columnDefs: [
            { orderable: false, targets: [1, 5] }
        ],
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
        initComplete: function() {
            $('.dataTables_filter input').attr('placeholder', 'Cari menu...');
        }
    });

    // Handle delete button click
    $('.delete-btn').on('click', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        
        Swal.fire({
            title: 'Hapus Menu?',
            html: `
                <div style="text-align: center; padding: 20px;">
                    <i class="fas fa-exclamation-triangle" style="font-size: 3rem; color: #DC143C; margin-bottom: 1rem;"></i>
                    <p style="font-size: 1.1rem; margin-bottom: 0.5rem;">Anda akan menghapus menu:</p>
                    <strong style="color: #DC143C; font-size: 1.3rem; font-weight: 700;">"${name}"</strong>
                    <p style="color: #dc3545; margin-top: 20px; font-size: 0.95rem;">
                        <i class="fas fa-info-circle"></i> Tindakan ini tidak dapat dibatalkan!
                    </p>
                </div>
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DC143C',
            cancelButtonColor: '#6c757d',
            confirmButtonText: '<i class="fas fa-trash me-2"></i>Ya, Hapus!',
            cancelButtonText: '<i class="fas fa-times me-2"></i>Batal',
            reverseButtons: true,
            background: 'white',
            backdrop: 'rgba(220, 20, 60, 0.1)',
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const form = $('#delete-form');
                form.attr('action', `{{ url('admin/menu') }}/${id}`);
                form.submit();
            }
        });
    });

    // Show success message with animation
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false,
            position: 'top-end',
            toast: true,
            background: 'white',
            iconColor: '#28a745',
            showClass: {
                popup: 'animate__animated animate__fadeInRight'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutRight'
            }
        });
    @endif

    // Show error message
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonColor: '#DC143C'
        });
    @endif
});
</script>
@endsection