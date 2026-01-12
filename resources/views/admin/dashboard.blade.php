@extends('layouts.admin') <!-- PERUBAHAN: dari 'layouts.app' ke 'layouts.admin' -->

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <div class="stat-number">{{ $menuCount }}</div>
            <div class="stat-label">Total Menu</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-number">{{ $reservationCount }}</div>
            <div class="stat-label">Reservasi</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-number">{{ $userCount }}</div>
            <div class="stat-label">Pengguna</div>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="stat-card">
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
                <h2>Reservasi Terbaru</h2>
                <a href="{{ route('admin.reservations.index') }}" class="btn btn-admin-outline btn-sm">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jumlah Orang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentReservations as $reservation)
                        <tr>
                            <td>{{ $reservation->customer_name ?? $reservation->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservation->date ?? $reservation->reservation_date)->format('d/m/Y') }}</td>
                            <td>{{ $reservation->time ?? '-' }}</td>
                            <td>{{ $reservation->people ?? $reservation->guests ?? '-' }}</td>
                            <td>
                                @if($reservation->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($reservation->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($reservation->status == 'cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @else
                                    <span class="badge bg-secondary">{{ $reservation->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada reservasi terbaru</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="content-card">
            <div class="card-header">
                <h2>Aksi Cepat</h2>
            </div>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.menu.create') }}" class="btn btn-admin">
                    <i class="fas fa-plus"></i> Tambah Menu Baru
                </a>
                <a href="{{ route('admin.reservations.index') }}" class="btn btn-admin-outline">
                    <i class="fas fa-eye"></i> Lihat Semua Reservasi
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-admin-outline">
                    <i class="fas fa-image"></i> Kelola Gallery
                </a>
                <a href="{{ route('admin.users.index') }}" class="btn btn-admin-outline">
                    <i class="fas fa-user-cog"></i> Kelola Pengguna
                </a>
            </div>
        </div>
        
        <div class="content-card">
            <div class="card-header">
                <h2>Informasi Sistem</h2>
            </div>
            <div class="mb-3">
                <small class="text-muted">Website Status</small>
                <div class="d-flex justify-content-between">
                    <span>Berjalan Normal</span>
                    <span class="badge bg-success">Online</span>
                </div>
            </div>
            <div class="mb-3">
                <small class="text-muted">Versi Sistem</small>
                <div>1.0.0</div>
            </div>
            <div>
                <small class="text-muted">Terakhir Diperbarui</small>
                <div>{{ now()->format('d F Y') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection