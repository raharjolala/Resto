@extends('layouts.admin')

@section('title', 'Kelola Reservasi')
@section('page-title', 'Kelola Reservasi')

@section('content')
<div class="container-fluid px-4">
    <!-- Statistik Reservasi -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Pending</h6>
                            <h2 class="mb-0">{{ $pendingCount ?? 0 }}</h2>
                        </div>
                        <div class="rounded-circle bg-white bg-opacity-25 p-3">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Confirmed</h6>
                            <h2 class="mb-0">{{ $confirmedCount ?? 0 }}</h2>
                        </div>
                        <div class="rounded-circle bg-white bg-opacity-25 p-3">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Completed</h6>
                            <h2 class="mb-0">{{ $completedCount ?? 0 }}</h2>
                        </div>
                        <div class="rounded-circle bg-white bg-opacity-25 p-3">
                            <i class="fas fa-check-double fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-white-50 mb-2">Cancelled</h6>
                            <h2 class="mb-0">{{ $cancelledCount ?? 0 }}</h2>
                        </div>
                        <div class="rounded-circle bg-white bg-opacity-25 p-3">
                            <i class="fas fa-times-circle fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Tabel Reservasi -->
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Reservasi</h5>
                <span class="badge bg-primary">Total: {{ $totalCount ?? 0 }}</span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="reservationsTable" class="table table-striped table-hover" style="width:100%">
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
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->customer_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                            <td>{{ $reservation->reservation_time }}</td>
                            <td>{{ $reservation->guest_count }}</td>
                            <td>
                                <div>{{ $reservation->phone }}</div>
                                <small>{{ $reservation->email }}</small>
                            </td>
                            <td>
                                @if($reservation->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($reservation->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($reservation->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @elseif($reservation->status == 'completed')
                                    <span class="badge bg-info">Completed</span>
                                @endif
                            </td>
                            <td>
                                @if($reservation->branch)
                                    {{ $reservation->branch->name }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $reservation->created_at ? $reservation->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    @if($reservation->status == 'pending')
                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="btn btn-sm btn-success" title="Konfirmasi" onclick="return confirm('Konfirmasi reservasi ini?')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Batalkan" onclick="return confirm('Batalkan reservasi ini?')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                    @elseif($reservation->status == 'confirmed')
                                    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" class="btn btn-sm btn-info" title="Selesaikan" onclick="return confirm('Tandai reservasi ini sebagai selesai?')">
                                            <i class="fas fa-check-double"></i>
                                        </button>
                                    </form>
                                    @endif
                                    
                                    <button type="button" class="btn btn-sm btn-primary" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detailModal{{ $reservation->id }}"
                                            title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    
                                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-secondary" 
                                                onclick="return confirm('Hapus reservasi ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailModal{{ $reservation->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Reservasi #{{ $reservation->id }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <strong>Nama:</strong><br>
                                                    {{ $reservation->customer_name }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Email:</strong><br>
                                                    {{ $reservation->email }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Telepon:</strong><br>
                                                    {{ $reservation->phone }}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <strong>Tanggal:</strong><br>
                                                    {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d F Y') }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Waktu:</strong><br>
                                                    {{ $reservation->reservation_time }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Jumlah Tamu:</strong><br>
                                                    {{ $reservation->guest_count }}
                                                </div>
                                                <div class="mb-3">
                                                    <strong>Status:</strong><br>
                                                    @if($reservation->status == 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif($reservation->status == 'confirmed')
                                                        <span class="badge bg-success">Confirmed</span>
                                                    @elseif($reservation->status == 'cancelled')
                                                        <span class="badge bg-danger">Cancelled</span>
                                                    @elseif($reservation->status == 'completed')
                                                        <span class="badge bg-info">Completed</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                        @if($reservation->special_request)
                                        <div class="mb-3">
                                            <strong>Permintaan Khusus:</strong><br>
                                            <div class="p-3 bg-light rounded">
                                                {{ $reservation->special_request }}
                                            </div>
                                        </div>
                                        @endif
                                        
                                        <div class="mb-3">
                                            <strong>Dibuat:</strong><br>
                                            {{ $reservation->created_at ? $reservation->created_at->format('d F Y H:i') : '-' }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @empty
                        <tr>
                            <td colspan="10" class="text-center py-4">
                                <div class="alert alert-info mb-0">
                                    <i class="fas fa-info-circle me-2"></i> Belum ada reservasi
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
<style>
    .bg-warning {
        background: linear-gradient(135deg, #f39c12, #e67e22) !important;
    }
    .bg-success {
        background: linear-gradient(135deg, #27ae60, #2ecc71) !important;
    }
    .bg-info {
        background: linear-gradient(135deg, #3498db, #2980b9) !important;
    }
    .bg-danger {
        background: linear-gradient(135deg, #e74c3c, #c0392b) !important;
    }
    .btn-group .btn {
        margin: 0 2px;
    }
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }
    .card-header {
        background: white;
        border-bottom: 2px solid #f8f9fa;
        padding: 1.5rem;
    }
    table.dataTable thead th {
        border-bottom: 2px solid #dee2e6;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    // Check if table has data
    var hasData = {{ $reservations->count() > 0 ? 'true' : 'false' }};
    
    if (hasData) {
        // Destroy existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#reservationsTable')) {
            $('#reservationsTable').DataTable().destroy();
        }
        
        // Initialize DataTable with exact column count
        $('#reservationsTable').DataTable({
            "order": [[0, "desc"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [9] } // Disable sorting on action column (index 9)
            ],
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "initComplete": function(settings, json) {
                console.log('DataTable initialized successfully with 10 columns');
            }
        });
    } else {
        console.log('No data available, DataTable not initialized');
    }
});
</script>
@endpush