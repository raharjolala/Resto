@extends('layouts.app')

@section('title', 'Admin Dashboard - JOSS GANDOS')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="section-title text-start mb-0">Admin Dashboard</h1>
                <div class="text-end">
                    <span class="badge bg-primary">Admin: {{ Auth::user()->name }}</span>
                </div>
            </div>
            
            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Menu</h5>
                            <h2 class="card-text">{{ $menuCount }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Reservasi</h5>
                            <h2 class="card-text">{{ $reservationCount }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-dark">
                        <div class="card-body">
                            <h5 class="card-title">Pengguna</h5>
                            <h2 class="card-text">{{ $userCount }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white">
                        <div class="card-body">
                            <h5 class="card-title">Cabang</h5>
                            <h2 class="card-text">{{ $branchCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Menu Management</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-primary" onclick="alert('Fitur akan segera tersedia')">
                                    <i class="fas fa-plus"></i> Tambah Menu Baru
                                </a>
                                <a href="#" class="btn btn-secondary" onclick="alert('Fitur akan segera tersedia')">
                                    <i class="fas fa-utensils"></i> Kelola Menu
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="mb-0">Gallery Management</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid">
                                <a href="#" class="btn btn-warning" onclick="alert('Fitur akan segera tersedia')">
                                    <i class="fas fa-images"></i> Kelola Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Reservasi Terbaru</h5>
                        </div>
                        <div class="card-body">
                            @if($recentReservations->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentReservations as $reservation)
                                                <tr>
                                                    <td>{{ $reservation->customer_name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : 'secondary') }}">
                                                            {{ $reservation->status }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-muted text-center">Belum ada reservasi</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Sistem Informasi</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <h6><i class="fas fa-info-circle"></i> Informasi Penting</h6>
                                <p class="mb-0">
                                    <strong>Website Status:</strong> Berjalan normal<br>
                                    <strong>Versi Sistem:</strong> 1.0.0<br>
                                    <strong>Terakhir Diperbarui:</strong> {{ now()->format('d F Y') }}
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="alert alert-success">
                                        <h6><i class="fas fa-check-circle"></i> Fitur yang Sudah Tersedia</h6>
                                        <ul class="mb-0">
                                            <li>Halaman Publik (Home, Menu, About, Gallery, Contact)</li>
                                            <li>Sistem Reservasi</li>
                                            <li>Admin Login</li>
                                            <li>Dashboard Admin</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-warning">
                                        <h6><i class="fas fa-tools"></i> Fitur dalam Pengembangan</h6>
                                        <ul class="mb-0">
                                            <li>CRUD Menu Management</li>
                                            <li>Gallery Upload</li>
                                            <li>Reservation Management</li>
                                            <li>Review System</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection