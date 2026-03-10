@extends('layouts.admin')

@section('title', 'Kelola Gallery')
@section('page-title', 'Kelola Gallery')

@section('styles')
<style>
    /* ===== LUXURY AESTHETIC RED THEME WITH GOLD ACCENTS - OPTIMIZED SIZES ===== */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');
    
    :root {
        /* Premium Red Palette */
        --red-50: #FFF5F5;
        --red-100: #FFE4E6;
        --red-200: #FECDD3;
        --red-300: #FDA4AF;
        --red-400: #FB7185;
        --red-500: #DC143C;
        --red-600: #B91C1C;
        --red-700: #991B1B;
        --red-800: #7F1D1D;
        --red-900: #611515;
        
        /* Gold Accents */
        --gold-400: #FBBF24;
        --gold-500: #F59E0B;
        
        /* Neutral Colors */
        --gray-50: #F9FAFB;
        --gray-100: #F3F4F6;
        --gray-600: #4B5563;
        --gray-700: #374151;
        --gray-800: #1F2937;
        
        /* Gradients */
        --gradient-primary: linear-gradient(135deg, #DC143C, #B91C1C);
        --gradient-soft: linear-gradient(135deg, #FFF5F5, #FECDD3);
        
        /* Shadows */
        --shadow-md: 0 4px 20px rgba(220, 20, 60, 0.15);
        --shadow-lg: 0 8px 30px rgba(220, 20, 60, 0.2);
        
        /* Border Radius */
        --radius-lg: 20px;
        --radius-md: 12px;
        --radius-sm: 8px;
        --radius-full: 9999px;
        
        /* Fonts */
        --font-display: 'Playfair Display', serif;
        --font-body: 'Inter', sans-serif;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: var(--font-body);
        background: #F9FAFB;
    }

    /* ===== MAIN CONTAINER ===== */
    .gallery-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 1.5rem;
    }

    /* ===== HEADER ===== */
    .header-card {
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-md);
        margin-bottom: 1.5rem;
        border: 1px solid rgba(220, 20, 60, 0.1);
        overflow: hidden;
    }

    .header-content {
        padding: 1.5rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        background: linear-gradient(135deg, white, var(--red-50));
    }

    .header-title {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .header-icon {
        width: 48px;
        height: 48px;
        background: var(--gradient-primary);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        box-shadow: var(--shadow-md);
    }

    .header-text h1 {
        font-family: var(--font-display);
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--red-700);
        margin-bottom: 0.2rem;
    }

    .header-text p {
        font-size: 0.85rem;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .header-text p i {
        color: var(--gold-500);
        font-size: 0.75rem;
    }

    /* ===== BUTTON ===== */
    .btn-primary {
        background: var(--gradient-primary);
        color: white;
        border: none;
        padding: 0.75rem 1.8rem;
        border-radius: var(--radius-full);
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-md);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-primary i {
        font-size: 0.9rem;
    }

    /* ===== STATS CARDS ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: white;
        border-radius: var(--radius-md);
        padding: 1.2rem 1.5rem;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(220, 20, 60, 0.1);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        border-color: var(--gold-400);
    }

    .stat-icon {
        width: 45px;
        height: 45px;
        background: var(--gradient-soft);
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: var(--red-600);
    }

    .stat-info h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--red-700);
        line-height: 1.2;
    }

    .stat-info p {
        font-size: 0.75rem;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    /* ===== GALLERY GRID ===== */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.2rem;
        margin-top: 1rem;
    }

    /* ===== GALLERY CARD - PROPORTIONAL SIZES ===== */
    .gallery-card {
        background: white;
        border-radius: var(--radius-md);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        border: 1px solid rgba(220, 20, 60, 0.1);
        animation: cardReveal 0.4s ease forwards;
        opacity: 0;
        transform: translateY(15px);
    }

    @keyframes cardReveal {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .gallery-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: var(--gold-400);
    }

    /* ===== CARD IMAGE - PROPORTIONAL ===== */
    .card-image {
        position: relative;
        width: 100%;
        height: 160px; /* Lebih pendek dan proporsional */
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .card-image img {
        transform: scale(1.08);
    }

    /* ===== CATEGORY BADGE - LEBIH KECIL ===== */
    .category-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(255, 255, 255, 0.95);
        padding: 0.3rem 0.8rem;
        border-radius: var(--radius-full);
        font-size: 0.65rem;
        font-weight: 600;
        color: var(--red-600);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 0.3rem;
        border: 1px solid rgba(220, 20, 60, 0.2);
        z-index: 2;
    }

    .category-badge i {
        font-size: 0.6rem;
    }

    /* ===== STATUS BADGE - LEBIH KECIL ===== */
    .status-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 0.3rem 0.8rem;
        border-radius: var(--radius-full);
        font-size: 0.65rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.3rem;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .status-badge.active {
        background: rgba(16, 185, 129, 0.95);
        color: white;
    }

    .status-badge.inactive {
        background: rgba(239, 68, 68, 0.95);
        color: white;
    }

    .status-badge i {
        font-size: 0.6rem;
    }

    /* ===== CARD CONTENT - PADDING PROPORTIONAL ===== */
    .card-content {
        padding: 1rem;
    }

    .card-title {
        font-family: var(--font-display);
        font-size: 1rem; /* Ukuran normal */
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0.3rem;
        line-height: 1.4;
    }

    .card-description {
        font-size: 0.75rem; /* Kecil untuk deskripsi */
        color: var(--gray-600);
        line-height: 1.5;
        margin-bottom: 0.8rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ===== CARD FOOTER ===== */
    .card-footer {
        border-top: 1px solid rgba(220, 20, 60, 0.1);
        padding-top: 0.8rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .date-info {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        font-size: 0.7rem;
        color: var(--gray-600);
    }

    .date-info i {
        font-size: 0.65rem;
        color: var(--gold-500);
    }

    /* ===== ACTION BUTTONS - LEBIH KECIL ===== */
    .action-buttons {
        display: flex;
        gap: 0.4rem;
    }

    .btn-action {
        width: 28px;
        height: 28px;
        border-radius: var(--radius-sm);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
        background: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        text-decoration: none;
    }

    .btn-action i {
        font-size: 0.7rem;
    }

    .btn-action.edit {
        background: #EFF6FF;
        color: #3B82F6;
    }

    .btn-action.delete {
        background: #FEF2F2;
        color: #DC143C;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 3rem 1.5rem;
        background: white;
        border-radius: var(--radius-lg);
        border: 2px dashed rgba(220, 20, 60, 0.2);
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--red-400);
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        font-size: 0.85rem;
        color: var(--gray-600);
        margin-bottom: 1.5rem;
    }

    /* ===== ALERTS ===== */
    .alert {
        padding: 0.8rem 1.2rem;
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
        font-size: 0.85rem;
        background: white;
        border: 1px solid rgba(220, 20, 60, 0.1);
        box-shadow: var(--shadow-md);
    }

    .alert.success {
        border-left: 4px solid #10B981;
    }

    .alert.error {
        border-left: 4px solid #DC143C;
    }

    .alert i {
        font-size: 1rem;
    }

    .alert .btn-close {
        margin-left: auto;
        cursor: pointer;
        font-size: 1.2rem;
        opacity: 0.5;
        transition: opacity 0.3s ease;
    }

    .alert .btn-close:hover {
        opacity: 1;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .gallery-container {
            padding: 1rem;
        }

        .header-content {
            padding: 1.2rem;
        }

        .header-text h1 {
            font-size: 1.5rem;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="gallery-container">
    <!-- Header -->
    <div class="header-card">
        <div class="header-content">
            <div class="header-title">
                <div class="header-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div class="header-text">
                    <h1>Gallery</h1>
                    <p>
                        <i class="fas fa-home"></i>
                        Dashboard / <span style="color: var(--red-600);">Gallery</span>
                    </p>
                </div>
            </div>
            <a href="{{ route('admin.gallery.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Foto
            </a>
        </div>
    </div>

    <!-- Stats -->
    @if(isset($galleries) && $galleries->count() > 0)
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $galleries->count() }}</h3>
                <p>Total</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $galleries->where('is_active', true)->count() }}</h3>
                <p>Aktif</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $galleries->where('is_active', false)->count() }}</h3>
                <p>Tidak Aktif</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-tags"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $galleries->groupBy('category')->count() }}</h3>
                <p>Kategori</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert success">
            <i class="fas fa-check-circle" style="color: #10B981;"></i>
            {{ session('success') }}
            <span class="btn-close" onclick="this.parentElement.remove()">×</span>
        </div>
    @endif

    @if(session('error'))
        <div class="alert error">
            <i class="fas fa-exclamation-circle" style="color: #DC143C;"></i>
            {{ session('error') }}
            <span class="btn-close" onclick="this.parentElement.remove()">×</span>
        </div>
    @endif

    <!-- Gallery Grid -->
    @if(isset($galleries) && $galleries->count() > 0)
        <div class="gallery-grid">
            @foreach($galleries as $index => $item)
            @php
                $categoryLabels = [
                    'food' => ['name' => 'Kuliner', 'icon' => 'fa-utensils'],
                    'facility' => ['name' => 'Fasilitas', 'icon' => 'fa-building'],
                    'event' => ['name' => 'Acara', 'icon' => 'fa-calendar'],
                    'interior' => ['name' => 'Interior', 'icon' => 'fa-couch']
                ];
                $category = $categoryLabels[$item->category] ?? ['name' => ucfirst($item->category), 'icon' => 'fa-tag'];
            @endphp
            <div class="gallery-card" style="animation-delay: {{ $index * 0.03 }}s">
                <div class="card-image">
                    @if($item->image_path)
                        <img src="{{ $item->image_path }}" 
                             alt="{{ $item->caption }}"
                             loading="lazy"
                             onerror="this.src='https://via.placeholder.com/300x200?text=Error'">
                    @else
                        <div style="width: 100%; height: 100%; background: var(--gradient-soft);"></div>
                    @endif
                    
                    <!-- Category Badge -->
                    <span class="category-badge">
                        <i class="fas {{ $category['icon'] }}"></i>
                        {{ $category['name'] }}
                    </span>
                    
                    <!-- Status Badge -->
                    <span class="status-badge {{ $item->is_active ? 'active' : 'inactive' }}">
                        <i class="fas fa-{{ $item->is_active ? 'check' : 'times' }}"></i>
                        {{ $item->is_active ? 'Aktif' : 'Tidak' }}
                    </span>
                </div>
                
                <div class="card-content">
                    <h3 class="card-title">{{ $item->caption ?? 'Tanpa Judul' }}</h3>
                    
                    @if($item->description)
                    <p class="card-description">{{ Str::limit($item->description, 60) }}</p>
                    @endif
                    
                    <div class="card-footer">
                        <div class="date-info">
                            <i class="far fa-calendar"></i>
                            <span>{{ $item->created_at->format('d M Y') }}</span>
                        </div>
                        
                        <div class="action-buttons">
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" 
                               class="btn-action edit" title="Edit">
                                <i class="fas fa-pen"></i>
                            </a>
                            
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" 
                                  method="POST" 
                                  style="display: inline-block;"
                                  onsubmit="return confirm('Hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="empty-state">
            <i class="fas fa-images"></i>
            <h3>Belum Ada Foto</h3>
            <p>Tambahkan foto pertama Anda ke gallery</p>
            <a href="{{ route('admin.gallery.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i> Tambah Foto
            </a>
        </div>
    @endif
</div>

<script>
// Auto-hide alerts after 3 seconds
setTimeout(function() {
    document.querySelectorAll('.alert').forEach(function(alert) {
        alert.style.transition = 'opacity 0.3s ease';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 300);
    });
}, 3000);
</script>
@endsection