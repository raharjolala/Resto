@extends('layouts.admin')

@section('title', 'Cek Reservasi')
@section('page-title', 'Cek Data Reservasi')

@section('content')
<div class="container-fluid px-4">
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

    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-database me-2"></i>
                        Status Database Reservasi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box bg-info text-white p-3 rounded">
                                <h6>Total Reservasi</h6>
                                <h2>{{ $reservations->count() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box bg-warning text-white p-3 rounded">
                                <h6>Pending</h6>
                                <h2>{{ $reservations->where('status', 'pending')->count() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box bg-success text-white p-3 rounded">
                                <h6>Confirmed</h6>
                                <h2>{{ $reservations->where('status', 'confirmed')->count() }}</h2>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box bg-danger text-white p-3 rounded">
                                <h6>Cancelled</h6>
                                <h2>{{ $reservations->where('status', 'cancelled')->count() }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Reservasi di Database</h5>
                <button class="btn btn-sm btn-primary" onclick="window.location.reload()">
                    <i class="fas fa-sync-alt me-2"></i>Refresh
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($reservations->isEmpty())
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Perhatian!</strong> Belum ada data reservasi di database.
                    <hr>
                    <p class="mb-0">Silakan coba submit form reservasi dan cek halaman ini lagi.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="reservationsTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Tamu</th>
                                <th>Status</th>
                                <th>Cabang</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $r->reservation_code ?? '-' }}</span>
                                </td>
                                <td>{{ $r->customer_name }}</td>
                                <td>{{ $r->email }}</td>
                                <td>{{ $r->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($r->reservation_date)->format('d/m/Y') }}</td>
                                <td>{{ $r->reservation_time }}</td>
                                <td>{{ $r->guest_count }}</td>
                                <td>
                                    @if($r->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($r->status == 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($r->status == 'completed')
                                        <span class="badge bg-info">Completed</span>
                                    @elseif($r->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $r->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $r->branch->name ?? '-' }}</td>
                                <td>{{ $r->created_at ? $r->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#detailModal{{ $r->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Detail Modals -->
@foreach($reservations as $r)
<div class="modal fade" id="detailModal{{ $r->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-info-circle me-2"></i>
                    Detail Reservasi #{{ $r->id }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Kode Reservasi</th>
                                <td>: <span class="badge bg-primary">{{ $r->reservation_code ?? '-' }}</span></td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $r->customer_name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: {{ $r->email }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $r->phone }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>: {{ \Carbon\Carbon::parse($r->reservation_date)->format('d F Y') }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="40%">Waktu</th>
                                <td>: {{ $r->reservation_time }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Tamu</th>
                                <td>: {{ $r->guest_count }} Orang</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>: 
                                    @if($r->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($r->status == 'confirmed')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($r->status == 'completed')
                                        <span class="badge bg-info">Completed</span>
                                    @elseif($r->status == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Cabang</th>
                                <td>: {{ $r->branch->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat</th>
                                <td>: {{ $r->created_at ? $r->created_at->format('d F Y H:i') : '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <!-- Special Requests -->
                <div class="mt-4">
                    <h6 class="fw-bold" style="color: #b42222;">
                        <i class="fas fa-comment-dots me-2"></i>Permintaan Khusus
                    </h6>
                    @if($r->special_requests && trim($r->special_requests) !== '')
                        <div class="p-3 bg-light rounded border-start border-4" style="border-color: #b42222 !important;">
                            {{ $r->special_requests }}
                        </div>
                    @else
                        <div class="p-3 bg-light rounded border-start border-4" style="border-color: #b42222 !important;">
                            <em class="text-muted">Tidak ada permintaan khusus</em>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@push('styles')
<style>
    .info-box {
        transition: transform 0.3s;
    }
    .info-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .table th {
        background-color: #f8f9fa;
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.5rem 0.8rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function() {
    if ($('#reservationsTable tbody tr').length > 0) {
        $('#reservationsTable').DataTable({
            "order": [[0, "desc"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    }
});
</script>
@endpush