@extends('layouts.admin')

@section('title', 'Kelola Menu')
@section('page-title', 'Kelola Menu')

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2>Daftar Menu</h2>
        <a href="{{ route('admin.menu.create') }}" class="btn btn-admin">
            <i class="fas fa-plus"></i> Tambah Menu Baru
        </a>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Fitur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($menuItems as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($item->image)
                            <img src="{{ asset('storage/menu/' . $item->image) }}" 
                                 alt="{{ $item->name }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                        @else
                            <div style="width: 60px; height: 60px; background: #eee; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-utensils text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $item->name }}</strong>
                        <small class="d-block text-muted">{{ Str::limit($item->description, 50) }}</small>
                    </td>
                    <td>
                        <span class="badge bg-secondary">{{ $item->category->name ?? 'Uncategorized' }}</span>
                    </td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>
                        @if($item->is_available)
                            <span class="badge bg-success">Tersedia</span>
                        @else
                            <span class="badge bg-danger">Habis</span>
                        @endif
                    </td>
                    <td>
                        @if($item->is_featured)
                            <span class="badge bg-warning">Fitur</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.menu.edit', $item->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST" 
                                  class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" 
                                        onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada menu yang ditambahkan</td>
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
        $('#dataTable').DataTable();
    });
</script>
@endsection