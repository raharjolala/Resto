@extends('layouts.admin')

@section('title', 'Kelola Menu')
@section('page-title', 'Kelola Menu')

@section('styles')
<style>
    .menu-table-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #f0f0f0;
    }
    
    .menu-table-img-placeholder {
        width: 60px;
        height: 60px;
        background: #f8f9fa;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #adb5bd;
        border: 2px dashed #dee2e6;
    }
    
    .badge-available {
        background: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .badge-unavailable {
        background: #dc3545;
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .badge-featured {
        background: #ffc107;
        color: #212529;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .category-badge {
        background: #e9ecef;
        color: #495057;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .btn-group-sm .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        border-radius: 0.375rem;
        margin: 0 2px;
    }
    
    .btn-outline-primary {
        color: #DC143C;
        border-color: #DC143C;
    }
    
    .btn-outline-primary:hover {
        background-color: #DC143C;
        border-color: #DC143C;
        color: white;
    }
    
    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        border-color: #dc3545;
        color: white;
    }
    
    .table th {
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6c757d;
        border-top: none;
        padding: 1rem 0.75rem;
    }
    
    .table td {
        padding: 1rem 0.75rem;
        vertical-align: middle;
        color: #212529;
    }
    
    .table tbody tr:hover {
        background-color: #fff5f5;
    }
    
    .menu-name {
        font-weight: 600;
        color: #212529;
        margin-bottom: 0.25rem;
    }
    
    .menu-description {
        font-size: 0.8rem;
        color: #6c757d;
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .price-text {
        font-weight: 600;
        color: #DC143C;
    }
    
    .content-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    
    .card-header {
        background: white;
        padding: 1.5rem;
        border-bottom: 2px solid #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .card-header h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
        color: #212529;
    }
    
    .btn-admin {
        background: #DC143C;
        color: white;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-admin:hover {
        background: #8B0000;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 20, 60, 0.3);
        color: white;
    }
    
    .btn-admin i {
        margin-right: 0.5rem;
    }
    
    .table-responsive {
        padding: 0 1.5rem 1.5rem;
    }
    
    /* DataTables customization */
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        padding: 0.5rem 1.5rem;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #DC143C;
        color: white !important;
        border: none;
    }
    
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #8B0000;
        color: white !important;
        border: none;
    }
    
    .empty-state {
        text-align: center;
        padding: 3rem;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }
    
    .empty-state p {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }
</style>
@endsection

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2><i class="fas fa-utensils me-2"></i> Daftar Menu</h2>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-admin">
            <i class="fas fa-plus"></i> Tambah Menu Baru
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover" id="menuTable">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th width="80">Gambar</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Fitur</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->image)
                            @if(str_starts_with($item->image, 'http'))
                                <img src="{{ $item->image }}" 
                                     alt="{{ $item->name }}" 
                                     class="menu-table-img"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                            @else
                                <img src="{{ asset('storage/menu/' . $item->image) }}" 
                                     alt="{{ $item->name }}" 
                                     class="menu-table-img"
                                     onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';">
                            @endif
                        @else
                            <div class="menu-table-img-placeholder">
                                <i class="fas fa-utensils"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="menu-name">{{ $item->name }}</div>
                        @if($item->description)
                            <div class="menu-description" title="{{ $item->description }}">
                                {{ Str::limit($item->description, 50) }}
                            </div>
                        @endif
                    </td>
                    <td>
                        <span class="category-badge">
                            <i class="fas fa-tag me-1"></i>
                            {{ $item->category->name ?? 'Uncategorized' }}
                        </span>
                    </td>
                    <td>
                        <span class="price-text">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </span>
                    </td>
                    <td>
                        @if($item->is_available)
                            <span class="badge-available">
                                <i class="fas fa-check-circle me-1"></i> Tersedia
                            </span>
                        @else
                            <span class="badge-unavailable">
                                <i class="fas fa-times-circle me-1"></i> Habis
                            </span>
                        @endif
                    </td>
                    <td>
                        @if($item->is_featured)
                            <span class="badge-featured">
                                <i class="fas fa-star me-1"></i> Fitur
                            </span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.menu.edit', $item->id) }}" 
                               class="btn btn-outline-primary" 
                               title="Edit Menu">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button type="button" 
                                    class="btn btn-outline-danger" 
                                    title="Hapus Menu"
                                    onclick="confirmDelete({{ $item->id }}, '{{ $item->name }}')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                        
                        <!-- Delete Form (hidden) -->
                        <form id="delete-form-{{ $item->id }}" 
                              action="{{ route('admin.menu.destroy', $item->id) }}" 
                              method="POST" 
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
                        <div class="empty-state">
                            <i class="fas fa-utensils"></i>
                            <p>Belum ada menu yang ditambahkan</p>
                            <a href="{{ route('admin.menu.create') }}" class="btn btn-admin">
                                <i class="fas fa-plus"></i> Tambah Menu Pertama
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
    $(document).ready(function() {
        // Initialize DataTable
        $('#menuTable').DataTable({
            language: {
                processing: "Memproses...",
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                infoFiltered: "(disaring dari _MAX_ total data)",
                loadingRecords: "Memuat...",
                zeroRecords: "Tidak ada data yang ditemukan",
                emptyTable: "Tidak ada data dalam tabel",
                paginate: {
                    first: "Pertama",
                    previous: "Sebelumnya",
                    next: "Selanjutnya",
                    last: "Terakhir"
                }
            },
            order: [[0, 'asc']],
            columnDefs: [
                { orderable: false, targets: [1, 7] } // Disable ordering on image and action columns
            ]
        });
    });

    // SweetAlert2 for delete confirmation
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Hapus Menu?',
            text: `Apakah Anda yakin ingin menghapus menu "${name}"? Tindakan ini tidak dapat dibatalkan.`,
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

    // Show success message if exists
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    // Show error message if exists
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            timer: 5000,
            showConfirmButton: true
        });
    @endif
</script>
@endsection