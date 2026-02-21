@extends('layouts.admin')

@section('title', 'Kelola Promosi')
@section('page-title', 'Kelola Promosi')

@section('content')
<div class="content-card">
    <div class="card-header">
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
        <table class="table table-hover" id="dataTable">
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
                            <span class="badge bg-success ms-1">-{{ round((($promo->old_price - $promo->current_price) / $promo->old_price) * 100) }}%</span>
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
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('admin.promotions.edit', $promo->id) }}" class="btn btn-outline-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-outline-danger" 
                                    onclick="confirmDelete({{ $promo->id }}, '{{ $promo->title }}')"
                                    title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        
                        <!-- Hidden delete form for each promotion -->
                        <form id="delete-form-{{ $promo->id }}" 
                              action="{{ route('admin.promotions.destroy', $promo->id) }}" 
                              method="POST" 
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
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
@endsection

@section('scripts')
<script>
// Global delete confirmation function
function confirmDelete(id, title) {
    Swal.fire({
        title: 'Hapus Promosi?',
        text: `Apakah Anda yakin ingin menghapus promosi "${title}"? Tindakan ini tidak dapat dibatalkan.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DC143C',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

$(document).ready(function() {
    // Initialize DataTable with proper error handling
    if (typeof $.fn.DataTable !== 'undefined') {
        try {
            // Check if table exists and is not already a DataTable
            if ($('#dataTable').length && !$.fn.DataTable.isDataTable('#dataTable')) {
                $('#dataTable').DataTable({
                    "language": {
                        "search": "Cari:",
                        "lengthMenu": "Tampilkan _MENU_ data per halaman",
                        "zeroRecords": "Data tidak ditemukan",
                        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                        "infoFiltered": "(disaring dari _MAX_ total data)",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "<i class='fas fa-chevron-right'></i>",
                            "previous": "<i class='fas fa-chevron-left'></i>"
                        },
                        "emptyTable": "Tidak ada data yang tersedia"
                    },
                    "order": [[7, 'asc']], // Sort by Urutan column (index 7)
                    "pageLength": 10,
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Semua"]],
                    "autoWidth": false,
                    "columnDefs": [
                        { "orderable": false, "targets": [1, 8] }, // Disable sorting on image and action columns
                        { "searchable": false, "targets": [1, 4, 5, 7, 8] } // Disable search on certain columns
                    ]
                });
                console.log('DataTable initialized successfully');
            }
        } catch (e) {
            console.error('DataTable initialization error:', e);
        }
    } else {
        console.warn('DataTable library not loaded');
    }
    
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
});

// Alternative delete confirmation using native confirm (fallback if Swal is not available)
function confirmDeleteNative(id, title) {
    if (confirm('Apakah Anda yakin ingin menghapus promosi "' + title + '"?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>

@push('styles')
<style>
    /* Additional styles for better table display */
    .table td {
        vertical-align: middle;
    }
    
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }
    
    .btn-group .btn i {
        font-size: 0.875rem;
    }
    
    /* SweetAlert2 customization */
    .swal2-popup {
        font-family: 'Inter', sans-serif;
    }
    
    .swal2-title {
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .swal2-html-container {
        font-size: 1rem;
    }
    
    .swal2-confirm.swal2-styled {
        background-color: #DC143C !important;
    }
    
    .swal2-confirm.swal2-styled:focus {
        box-shadow: 0 0 0 3px rgba(220, 20, 60, 0.3) !important;
    }
    
    /* DataTable customization */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 1rem;
    }
    
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        padding: 0.375rem 0.75rem;
        margin-left: 0.5rem;
    }
    
    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #DC143C;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(220, 20, 60, 0.25);
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0.375rem 0.75rem;
        margin: 0 0.125rem;
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #DC143C;
        color: white !important;
        border-color: #DC143C;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #e9ecef;
        border-color: #dee2e6;
    }
    
    /* Alert animations */
    .alert {
        animation: slideIn 0.3s ease-out;
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
</style>
@endpush
@endsection