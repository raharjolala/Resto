@extends('admin.layouts.app')

@section('title', 'Manajemen Promosi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Promosi</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Promosi
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($promotions as $promotion)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $promotion->image_url }}" alt="{{ $promotion->title }}" style="width: 100px; height: 60px; object-fit: cover;">
                                </td>
                                <td>{{ $promotion->title }}</td>
                                <td>
                                    Rp {{ number_format($promotion->current_price, 0, ',', '.') }}
                                    @if($promotion->old_price)
                                    <br><small class="text-muted"><s>Rp {{ number_format($promotion->old_price, 0, ',', '.') }}</s></small>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $promotion->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $promotion->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td>
                                    {{ $promotion->start_date->format('d/m/Y') }} - 
                                    {{ $promotion->end_date->format('d/m/Y') }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.promotions.edit', $promotion->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection