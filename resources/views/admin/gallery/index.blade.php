@extends('layouts.admin')

@section('title', 'Kelola Gallery')
@section('page-title', 'Kelola Gallery')

@section('styles')
<style>
    /* ===== PREMIUM RED GRADIENT THEME ===== */
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
    
    :root {
        /* Red Gradient Palette */
        --red-50: #FFF1F3;
        --red-100: #FFE4E8;
        --red-200: #FFB3C1;
        --red-300: #FF8A9F;
        --red-400: #FF4D6D;
        --red-500: #DC143C;
        --red-600: #B22234;
        --red-700: #8B0000;
        --red-800: #5C0000;
        --red-900: #2E0000;
        
        /* Gradients */
        --gradient-primary: linear-gradient(145deg, #DC143C, #B22234, #8B0000);
        --gradient-secondary: linear-gradient(145deg, #FF4D6D, #DC143C);
        --gradient-soft: linear-gradient(145deg, #FFF1F3, #FFE4E8, #FFD1D9);
        --gradient-glass: linear-gradient(145deg, rgba(220, 20, 60, 0.05), rgba(139, 0, 0, 0.02));
        --gradient-shine: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        
        /* Shadows */
        --shadow-sm: 0 5px 20px rgba(220, 20, 60, 0.08);
        --shadow-md: 0 8px 30px rgba(220, 20, 60, 0.12);
        --shadow-lg: 0 15px 40px rgba(220, 20, 60, 0.18);
        --shadow-xl: 0 25px 50px rgba(220, 20, 60, 0.25);
        --shadow-hover: 0 20px 40px rgba(220, 20, 60, 0.2);
        
        /* Border Radius */
        --radius-xs: 8px;
        --radius-sm: 12px;
        --radius-md: 16px;
        --radius-lg: 24px;
        --radius-xl: 32px;
        --radius-full: 9999px;
        
        /* Font */
        --font-sans: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    * {
        font-family: var(--font-sans);
    }

    body {
        background: #fafafa;
    }

    /* ===== MAIN CONTAINER ===== */
    .content-card {
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(220, 20, 60, 0.1);
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        animation: slideIn 0.5s ease;
        padding: 2rem;
    }

    .content-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-primary);
        z-index: 10;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== HEADER SECTION ===== */
    .card-header {
        background: transparent;
        padding: 0;
        margin-bottom: 2rem;
        border: none;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .card-header h2 {
        font-size: 2rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header h2 i {
        font-size: 2.2rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        filter: drop-shadow(0 4px 8px rgba(220, 20, 60, 0.3));
    }

    /* ===== BUTTON STYLES ===== */
    .btn-primary {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: var(--gradient-shine);
        transition: left 0.5s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: var(--shadow-xl);
        color: white;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    .btn-primary i {
        font-size: 1rem;
        transition: transform 0.3s ease;
    }

    .btn-primary:hover i {
        transform: scale(1.2) rotate(90deg);
    }

    /* ===== ALERT STYLES ===== */
    .alert-success {
        background: linear-gradient(145deg, #f0f9f0, #e6f3e6);
        border: 1px solid rgba(40, 167, 69, 0.3);
        border-radius: var(--radius-lg);
        padding: 1rem 1.5rem;
        color: #1e7e34;
        position: relative;
        overflow: hidden;
        animation: slideDown 0.3s ease;
        margin-bottom: 2rem;
    }

    .alert-success::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(145deg, #28a745, #20c997);
    }

    .alert-danger {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        border: 1px solid var(--red-300);
        border-radius: var(--radius-lg);
        padding: 1rem 1.5rem;
        color: var(--red-700);
        position: relative;
        overflow: hidden;
        animation: slideDown 0.3s ease;
        margin-bottom: 2rem;
    }

    .alert-danger::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--gradient-primary);
    }

    .alert-info {
        background: var(--gradient-soft);
        border: 1px solid var(--red-200);
        border-radius: var(--radius-lg);
        padding: 3rem 2rem;
        color: var(--red-700);
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.5s ease;
    }

    .alert-info i {
        color: var(--red-500);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .btn-close {
        filter: brightness(0.5);
        transition: all 0.3s ease;
    }

    .btn-close:hover {
        filter: brightness(0.2);
        transform: rotate(90deg);
    }

    /* ===== CARD STYLES ===== */
    .card {
        border: none;
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        background: white;
        box-shadow: var(--shadow-sm);
        position: relative;
        animation: cardFadeIn 0.5s ease;
        animation-fill-mode: both;
    }

    @keyframes cardFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-hover);
    }

    .card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--gradient-primary);
        transform: scaleX(0);
        transition: transform 0.3s ease;
        z-index: 10;
    }

    .card:hover::after {
        transform: scaleX(1);
    }

    /* ===== CARD IMAGE ===== */
    .card-img-top {
        height: 240px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(145deg, #f8f9fa, #e9ecef);
    }

    .card-img-top img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card:hover .card-img-top img {
        transform: scale(1.1);
    }

    .position-absolute.top-0.start-0 {
        background: linear-gradient(145deg, #ffc107, #fd7e14) !important;
        color: #212529 !important;
        padding: 0.5rem 1.2rem !important;
        border-radius: var(--radius-full) !important;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 20;
    }

    .badge {
        padding: 0.6rem 1.2rem;
        border-radius: var(--radius-full);
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: var(--shadow-sm);
    }

    .badge i {
        font-size: 0.8rem;
    }

    .badge.bg-success {
        background: linear-gradient(145deg, #28a745, #20c997) !important;
    }

    .badge.bg-secondary {
        background: linear-gradient(145deg, #6c757d, #5a6268) !important;
    }

    /* ===== CARD BODY ===== */
    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.75rem;
    }

    .card:hover .card-title {
        color: var(--red-600);
    }

    .card-text {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .border-top {
        border-top: 2px solid rgba(220, 20, 60, 0.1) !important;
        padding-top: 1rem !important;
        margin-top: 1rem !important;
    }

    /* ===== ACTION BUTTONS ===== */
    .btn-outline-primary {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        color: var(--red-600);
        border: 1px solid var(--red-300);
        border-radius: var(--radius-full);
        padding: 0.4rem 1rem;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
    }

    .btn-outline-primary:hover {
        background: var(--gradient-primary);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    .btn-outline-danger {
        background: linear-gradient(145deg, #fff5f5, #ffe4e8);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.3);
        border-radius: var(--radius-full);
        padding: 0.4rem 1rem;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border: none;
        cursor: pointer;
    }

    .btn-outline-danger:hover {
        background: linear-gradient(145deg, #dc3545, #c82333);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(220, 53, 69, 0.3);
    }

    .d-inline {
        display: inline-block;
    }

    .text-muted small i {
        color: var(--red-400);
    }

    /* ===== EMPTY STATE ===== */
    .alert-info {
        background: var(--gradient-soft);
        border: 2px dashed var(--red-300);
        border-radius: var(--radius-xl);
        padding: 4rem 2rem;
        text-align: center;
    }

    .alert-info i {
        font-size: 4rem;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .alert-info h5 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--red-700);
        margin-bottom: 0.5rem;
    }

    .alert-info p {
        color: #666;
        font-size: 1rem;
    }

    .row {
        margin: -0.75rem;
    }

    .col-lg-4, .col-md-6 {
        padding: 0.75rem;
    }

    @media (max-width: 768px) {
        .content-card {
            padding: 1rem;
        }

        .card-header {
            flex-direction: column;
            gap: 1rem;
            align-items: start;
        }

        .card-header h2 {
            font-size: 1.5rem;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
        }

        .card-img-top {
            height: 200px;
        }
    }
</style>
@endsection

@section('content')
<div class="content-card">
    <div class="card-header">
        <h2>
            <i class="fas fa-images"></i>
            Gallery Foto
        </h2>
        <a href="{{ route('admin.gallery.create') }}" class="btn-primary">
            <i class="fas fa-plus-circle"></i>
            Tambah Foto
        </a>
    </div>

    @if(session('success'))
    <div class="alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row mt-4">
        @if(isset($galleries) && $galleries->count() > 0)
            @foreach($galleries as $item)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-img-top">
                        @if($item->image_path)
                            <img src="{{ $item->image_path }}" 
                                 alt="{{ $item->caption }}" 
                                 loading="lazy"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/800x600?text=Image+Not+Found';">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light h-100">
                                <i class="fas fa-image fa-4x" style="color: var(--red-300);"></i>
                            </div>
                        @endif
                        
                        @if(!$item->is_active)
                        <div class="position-absolute top-0 start-0">
                            <i class="fas fa-eye-slash me-1"></i>Tidak Aktif
                        </div>
                        @endif
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->caption ?? 'Tanpa Judul' }}</h5>
                        
                        @if($item->description)
                        <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                        @endif
                        
                        <div class="mt-3">
                            @php
                                $categoryLabels = [
                                    'food' => 'Makanan',
                                    'facility' => 'Fasilitas',
                                    'event' => 'Acara',
                                    'interior' => 'Interior'
                                ];
                                $categoryColors = [
                                    'food' => 'success',
                                    'facility' => 'warning',
                                    'event' => 'info',
                                    'interior' => 'primary'
                                ];
                            @endphp
                            
                            <span class="badge bg-{{ $categoryColors[$item->category] ?? 'secondary' }} me-2">
                                <i class="fas fa-tag"></i>
                                {{ $categoryLabels[$item->category] ?? ucfirst($item->category) }}
                            </span>
                            
                            <span class="badge bg-{{ $item->is_active ? 'success' : 'secondary' }}">
                                <i class="fas fa-{{ $item->is_active ? 'check-circle' : 'times-circle' }}"></i>
                                {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                        
                        <div class="mt-3 pt-3 border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="far fa-calendar-alt"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </small>
                            
                            <div>
                                <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn-outline-primary me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <!-- FORM DELETE LANGSUNG DENGAN KONFIRMASI JAVASCRIPT BIASA -->
                                <form action="{{ route('admin.gallery.destroy', $item->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirmDelete('{{ $item->caption ?? 'foto ini' }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-outline-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12">
                <div class="alert-info text-center">
                    <i class="fas fa-images"></i>
                    <h5>Belum ada foto di gallery</h5>
                    <p class="mb-0">Klik tombol "Tambah Foto" untuk menambahkan gambar ke gallery.</p>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Fungsi konfirmasi delete sederhana
    function confirmDelete(caption) {
        return confirm('Apakah Anda yakin ingin menghapus foto "' + caption + '"? Tindakan ini tidak dapat dibatalkan.');
    }

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        document.querySelectorAll('.alert-success, .alert-danger').forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(function() {
                if (alert && alert.remove) alert.remove();
            }, 500);
        });
    }, 5000);
</script>
@endsection