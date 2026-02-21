<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - JOSS GANDOS</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
    @stack('styles')
    
    <style>
        :root {
            --primary-color: #C62828;
            --primary-dark: #8E0000;
            --primary-light: #ff5f52;
            --primary-super-light: #ffebee;
            --secondary-color: #C62828;
            --secondary-dark: #8E0000;
            --accent-color: #C62828;
            --dark-color: #1a1a2e;
            --dark-light: #2d2d44;
            --light-color: #f8f9fa;
            --gray-color: #6c757d;
            --gray-light: #e9ecef;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --sidebar-width: 280px;
            --topbar-height: 70px;
            --border-radius: 12px;
            --transition-speed: 0.3s;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--primary-super-light) 0%, #fff5f5 100%);
            color: var(--dark-color);
            min-height: 100vh;
            overflow-x: hidden;
        }
        
        /* Modern Sidebar dengan Warna Merah */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-dark) 0%, var(--primary-color) 100%);
            color: white;
            transition: all var(--transition-speed) cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 5px 0 25px rgba(198, 40, 40, 0.3);
        }
        
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }
        
        .sidebar-header {
            padding: 30px 25px;
            background: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            backdrop-filter: blur(10px);
        }
        
        .sidebar-header .logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 8px;
        }
        
        .sidebar-header .logo i {
            color: white;
            font-size: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .sidebar-header small {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        
        .sidebar-menu {
            padding: 25px 0;
        }
        
        .nav-item {
            margin: 5px 15px;
            border-radius: var(--border-radius);
            overflow: hidden;
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all var(--transition-speed) ease;
            text-decoration: none;
            border-left: 4px solid transparent;
            position: relative;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: width var(--transition-speed) ease;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            border-left-color: white;
        }
        
        .nav-link:hover::before, .nav-link.active::before {
            width: 100%;
        }
        
        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            color: white;
            transition: all var(--transition-speed) ease;
            z-index: 1;
        }
        
        .nav-link.active i {
            transform: scale(1.2);
        }
        
        .nav-link span {
            font-weight: 500;
            font-size: 0.95rem;
            z-index: 1;
        }
        
        /* Logout Button dengan Warna Merah Gelap */
        .logout-btn {
            margin-top: 30px;
            padding: 0 15px;
        }
        
        .logout-btn form {
            margin: 0;
        }
        
        .logout-btn button {
            width: 100%;
            background: rgba(142, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.9);
            padding: 16px 20px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            gap: 15px;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            font-weight: 500;
        }
        
        .logout-btn button:hover {
            background: rgba(142, 0, 0, 0.7);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(142, 0, 0, 0.3);
        }
        
        .logout-btn button i {
            color: white;
        }
        
        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: 100vh;
            transition: all var(--transition-speed) ease;
            background: transparent;
        }
        
        /* Top Bar dengan Warna Merah */
        .top-bar {
            background: white;
            padding: 15px 25px;
            border-radius: var(--border-radius);
            margin-bottom: 30px;
            box-shadow: 0 5px 20px rgba(198, 40, 40, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 30px;
            z-index: 100;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid rgba(198, 40, 40, 0.1);
        }
        
        .page-title h1 {
            color: var(--primary-dark);
            margin: 0;
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            position: relative;
            padding-left: 20px;
        }
        
        .page-title h1::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 30px;
            background: linear-gradient(180deg, var(--primary-color), var(--primary-dark));
            border-radius: 3px;
        }
        
        .breadcrumb {
            background: none;
            padding: 0;
            margin: 5px 0 0;
            font-size: 0.9rem;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color var(--transition-speed) ease;
        }
        
        .breadcrumb-item a:hover {
            color: var(--primary-dark);
        }
        
        .breadcrumb-item.active {
            color: var(--primary-dark);
            font-weight: 500;
        }
        
        /* User Info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-greeting {
            text-align: right;
        }
        
        .user-greeting .text-muted {
            color: var(--primary-color) !important;
            font-size: 0.9rem;
        }
        
        .user-greeting strong {
            color: var(--primary-dark);
            font-weight: 600;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.3rem;
            box-shadow: 0 5px 15px rgba(198, 40, 40, 0.3);
            transition: all var(--transition-speed) ease;
            cursor: pointer;
        }
        
        .user-avatar:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(198, 40, 40, 0.4);
        }
        
        /* Toggle Sidebar Button dengan Warna Merah */
        .toggle-sidebar {
            display: none;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            width: 45px;
            height: 45px;
            border-radius: var(--border-radius);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 5px 15px rgba(198, 40, 40, 0.3);
        }
        
        .toggle-sidebar:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(198, 40, 40, 0.4);
        }
        
        /* Content Cards dengan Warna Merah */
        .content-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: 0 10px 30px rgba(198, 40, 40, 0.08);
            margin-bottom: 30px;
            border: 1px solid rgba(198, 40, 40, 0.1);
            transition: all var(--transition-speed) ease;
            position: relative;
            overflow: hidden;
        }
        
        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--primary-dark));
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(198, 40, 40, 0.15);
            border-color: rgba(198, 40, 40, 0.2);
        }
        
        .card-header {
            border-bottom: 2px solid rgba(198, 40, 40, 0.1);
            padding-bottom: 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .card-header h2 {
            margin: 0;
            color: var(--primary-dark);
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
            position: relative;
            padding-left: 15px;
        }
        
        .card-header h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        /* Buttons dengan Warna Merah */
        .btn-admin {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: all var(--transition-speed) ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(198, 40, 40, 0.3);
            text-decoration: none;
        }
        
        .btn-admin:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(198, 40, 40, 0.4);
            color: white;
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
        }
        
        .btn-admin-outline {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: white;
            padding: 10px 22px;
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: all var(--transition-speed) ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        
        .btn-admin-outline:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(198, 40, 40, 0.3);
        }
        
        .btn-group-sm .btn {
            padding: 0.4rem 0.8rem;
            font-size: 0.875rem;
            border-radius: 6px;
        }
        
        /* Alerts dengan Warna Merah */
        .alert {
            border-radius: var(--border-radius);
            border: none;
            padding: 15px 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            color: #155724;
            border-left: 4px solid var(--success-color);
        }
        
        .alert-danger {
            background: rgba(198, 40, 40, 0.1);
            color: #721c24;
            border-left: 4px solid var(--primary-color);
        }
        
        .alert-info {
            background: rgba(23, 162, 184, 0.1);
            color: #0c5460;
            border-left: 4px solid var(--info-color);
        }
        
        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
        }
        
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        .table thead th {
            border-bottom: 2px solid rgba(198, 40, 40, 0.2);
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 15px 12px;
        }
        
        .table tbody td {
            padding: 15px 12px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .table tbody tr:hover {
            background-color: rgba(198, 40, 40, 0.02);
        }
        
        .badge {
            padding: 6px 12px;
            font-weight: 500;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        
        .badge.bg-success {
            background: linear-gradient(135deg, #28a745, #218838) !important;
        }
        
        .badge.bg-danger {
            background: linear-gradient(135deg, #dc3545, #c82333) !important;
        }
        
        .badge.bg-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800) !important;
            color: #212529;
        }
        
        .badge.bg-info {
            background: linear-gradient(135deg, #17a2b8, #138496) !important;
        }
        
        .badge.bg-secondary {
            background: linear-gradient(135deg, #6c757d, #5a6268) !important;
        }
        
        /* DataTables Custom Styles */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 20px;
        }
        
        .dataTables_wrapper .dataTables_length select,
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid rgba(198, 40, 40, 0.2);
            border-radius: 8px;
            padding: 8px 12px;
            margin: 0 5px;
            outline: none;
        }
        
        .dataTables_wrapper .dataTables_length select:focus,
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(198, 40, 40, 0.25);
        }
        
        .dataTables_wrapper .dataTables_info {
            padding-top: 15px;
            color: var(--gray-color);
        }
        
        .dataTables_wrapper .dataTables_paginate {
            padding-top: 15px;
        }
        
        .dataTables_wrapper .paginate_button {
            padding: 8px 12px;
            margin: 0 3px;
            border-radius: 6px;
            border: 1px solid rgba(198, 40, 40, 0.2);
            background: white;
            color: var(--primary-color) !important;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .dataTables_wrapper .paginate_button:hover {
            background: var(--primary-color);
            color: white !important;
            border-color: var(--primary-color);
        }
        
        .dataTables_wrapper .paginate_button.current {
            background: var(--primary-color);
            color: white !important;
            border-color: var(--primary-color);
        }
        
        .dataTables_processing {
            background: rgba(255, 255, 255, 0.9) !important;
            color: var(--primary-color) !important;
            border: none !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1) !important;
            z-index: 999 !important;
            border-radius: 30px !important;
            padding: 15px 30px !important;
            font-weight: 600 !important;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .sidebar {
                width: 250px;
            }
            .main-content {
                margin-left: 250px;
            }
        }
        
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .toggle-sidebar {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            
            .top-bar {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .user-info {
                width: 100%;
                justify-content: space-between;
            }
            
            .page-title h1 {
                font-size: 1.5rem;
            }
            
            .content-card {
                padding: 20px;
            }
            
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-header .btn-admin {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 8px;
            display: block;
        }
        
        .form-control, .form-select {
            border: 1px solid rgba(198, 40, 40, 0.2);
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(198, 40, 40, 0.25);
            outline: none;
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .input-group-text {
            background: linear-gradient(135deg, var(--primary-super-light), #fff);
            border: 1px solid rgba(198, 40, 40, 0.2);
            color: var(--primary-dark);
            font-weight: 600;
        }
        
        /* Image Preview */
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10px;
            border: 2px solid rgba(198, 40, 40, 0.2);
            padding: 5px;
            margin-top: 10px;
        }
    </style>
    
    @yield('styles')
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <i class="fas fa-utensils"></i>
                <span>JOSS GANDOS</span>
            </div>
            <small>Admin Panel</small>
        </div>
        
        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/pages/home') ? 'active' : '' }}" href="{{ route('admin.pages.home.edit') }}">
                        <i class="fas fa-home"></i>
                        <span>Edit Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/pages/about') ? 'active' : '' }}" href="{{ route('admin.pages.about.edit') }}">
                        <i class="fas fa-info-circle"></i>
                        <span>Edit About</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.menu.*') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">
                        <i class="fas fa-utensils"></i>
                        <span>Kelola Menu</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.promotions.*') ? 'active' : '' }}" href="{{ route('admin.promotions.index') }}">
                        <i class="fas fa-tags"></i>
                        <span>Kelola Promosi</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">
                        <i class="fas fa-images"></i>
                        <span>Kelola Gallery</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.pages.contact.*') ? 'active' : '' }}" href="{{ route('admin.pages.contact.edit') }}">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Edit Kontak</span>
                    </a>
                </li>

                
                <!-- Edit Halaman Reservasi -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.reservation.*') ? 'active' : '' }}" href="{{ route('admin.reservations.index') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Reservasi</span>
                    </a>
                </li>
            </ul>
            
            <div class="logout-btn">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="toggle-sidebar">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="page-title">
                <h1>@yield('page-title', 'Dashboard')</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('page-title', 'Dashboard')</li>
                    </ol>
                </nav>
            </div>
            
            <div class="user-info">
                <div class="user-greeting">
                    <div class="text-muted">Selamat datang,</div>
                    <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
                </div>
                <div class="user-avatar" title="{{ Auth::user()->email ?? 'Admin' }}" data-bs-toggle="tooltip">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show fade-in" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show fade-in" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show fade-in" role="alert">
                    <i class="fas fa-info-circle me-2"></i> {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables JS (Loaded but NOT initialized here) -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Toggle sidebar on mobile
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');
            
            if (window.innerWidth <= 992 && 
                !sidebar.contains(event.target) && 
                !toggleBtn.contains(event.target) && 
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(alert) {
                    if (alert) {
                        bootstrap.Alert.getOrCreateInstance(alert).close();
                    }
                });
            }, 5000);
            
            // Add hover effect to cards
            document.querySelectorAll('.content-card').forEach(function(card) {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Logo hover effect
            const brandLogo = document.querySelector('.sidebar-header .logo');
            if (brandLogo) {
                brandLogo.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                });
                brandLogo.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            }
            
            // Indonesian greeting in console
            console.log('%c✨ Selamat Datang di Admin Panel JOSS GANDOS ✨', 
                'background: linear-gradient(135deg, #C62828, #8E0000); color: white; padding: 12px 24px; border-radius: 8px; font-size: 16px; font-weight: bold;');
        });
        
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Fix for zoom 100% - prevent horizontal scroll
        function handleZoom() {
            const viewportWidth = window.innerWidth;
            const bodyWidth = document.body.clientWidth;
            
            if (bodyWidth > viewportWidth) {
                document.documentElement.style.overflowX = 'hidden';
                document.body.style.overflowX = 'hidden';
            } else {
                document.documentElement.style.overflowX = 'auto';
                document.body.style.overflowX = 'auto';
            }
        }
        
        window.addEventListener('load', handleZoom);
        window.addEventListener('resize', handleZoom);
    </script>
    
    @stack('scripts')
</body>
</html>