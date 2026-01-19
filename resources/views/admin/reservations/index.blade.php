@extends('layouts.admin')

@section('title', 'Kelola Reservasi')
@section('page-title', 'Kelola Reservasi')

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2>Daftar Reservasi</h2>
    </div>
    
    <!-- Statistik Reservasi -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Pending</h5>
                    <h3>{{ $pendingCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Confirmed</h5>
                    <h3>{{ $confirmedCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Cancelled</h5>
                    <h3>{{ $cancelledCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Total</h5>
                    <h3>{{ $totalCount ?? 0 }}</h3>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <div class="table-responsive">
            <table id="reservationsTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Jumlah Orang</th>
                        <th>Kontak</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($reservation->date)) }}</td>
                        <td>{{ $reservation->time }}</td>
                        <td>{{ $reservation->people }}</td>
                        <td>
                            {{ $reservation->phone }}<br>
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
                            <div class="btn-group" role="group">
                                @if($reservation->status == 'pending')
                                <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="btn btn-sm btn-success" title="Konfirmasi">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </form>
                                <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="btn btn-sm btn-danger" title="Batalkan">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                                @endif
                                
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
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> Belum ada reservasi
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Cek apakah tabel sudah diinisialisasi
    if (!$.fn.DataTable.isDataTable('#reservationsTable')) {
        $('#reservationsTable').DataTable({
            "order": [[0, "desc"]],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
            "columnDefs": [
                { "orderable": false, "targets": [7] } // Non-aktifkan sorting untuk kolom aksi
            ]
        });
    }
});
</script>
@endpush