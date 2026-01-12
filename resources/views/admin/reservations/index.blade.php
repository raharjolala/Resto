@extends('layouts.app')

@section('title', 'Kelola Reservasi - Admin')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="section-title text-start mb-0">Kelola Reservasi</h1>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> Fitur kelola reservasi dalam pengembangan.
                    </div>
                    
                    @if($reservations->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservations as $index => $reservation)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $reservation->customer_name }}</td>
                                            <td>{{ $reservation->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }} {{ $reservation->reservation_time }}</td>
                                            <td>{{ $reservation->guest_count }} orang</td>
                                            <td>
                                                <span class="badge bg-{{ $reservation->status == 'confirmed' ? 'success' : ($reservation->status == 'pending' ? 'warning' : 'secondary') }}">
                                                    {{ $reservation->status }}
                                                </span>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-success" onclick="alert('Fitur konfirmasi dalam pengembangan')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button class="btn btn-sm btn-info" onclick="alert('Fitur lihat dalam pengembangan')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-muted">Belum ada reservasi.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection