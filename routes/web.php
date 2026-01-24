<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController; // Import PageController
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

// ==================== PUBLIC WEBSITE ROUTES ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// PASTIKAN ROUTE ABOUT MENGGUNAKAN PageController
Route::get('/about', [PageController::class, 'indexAbout'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

// ==================== ADMIN LOGIN ROUTES ====================
Route::get('/admin/login', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login');
})->name('admin.login')->middleware('guest');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// ==================== ADMIN PROTECTED ROUTES ====================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // ===== EDIT PAGES ROUTES =====
    // Home Page Edit
    Route::get('/pages/home/edit', [PageController::class, 'editHome'])->name('admin.pages.home.edit');
    Route::post('/pages/home/update', [PageController::class, 'updateHome'])->name('admin.pages.home.update');
    
    // About Page Edit
    Route::get('/pages/about/edit', [PageController::class, 'editAbout'])->name('admin.pages.about.edit');
    Route::post('/pages/about/update', [PageController::class, 'updateAbout'])->name('admin.pages.about.update');
    
    // Contact Page Edit
    Route::get('/pages/contact/edit', [PageController::class, 'editContact'])->name('admin.pages.contact.edit');
    Route::post('/pages/contact/update', [PageController::class, 'updateContact'])->name('admin.pages.contact.update');
    
    // Settings
    Route::get('/settings', [AdminController::class, 'editSettings'])->name('admin.settings.edit');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    // ===== END EDIT PAGES ROUTES =====
    
    // Menu Management
    Route::get('/menu', [AdminController::class, 'menuIndex'])->name('admin.menu.index');
    Route::get('/menu/create', [AdminController::class, 'menuCreate'])->name('admin.menu.create');
    Route::post('/menu', [AdminController::class, 'menuStore'])->name('admin.menu.store');
    Route::get('/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('admin.menu.edit');
    Route::put('/menu/{id}', [AdminController::class, 'menuUpdate'])->name('admin.menu.update');
    Route::delete('/menu/{id}', [AdminController::class, 'menuDestroy'])->name('admin.menu.destroy');
    
    // Reservations Management
    Route::get('/reservations', [AdminController::class, 'reservationsIndex'])->name('admin.reservations.index');
    Route::put('/reservations/{id}', [AdminController::class, 'reservationUpdate'])->name('admin.reservations.update');
    Route::delete('/reservations/{id}', [AdminController::class, 'reservationDestroy'])->name('admin.reservations.destroy');
    
    // Gallery Management
    Route::get('/gallery', [AdminController::class, 'galleryIndex'])->name('admin.gallery.index');
    Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('admin.gallery.store');
    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('admin.gallery.destroy');
    
    // Branches Management
    Route::get('/branches', [AdminController::class, 'branchesIndex'])->name('admin.branches.index');
    Route::post('/branches', [AdminController::class, 'branchStore'])->name('admin.branches.store');
    Route::put('/branches/{id}', [AdminController::class, 'branchUpdate'])->name('admin.branches.update');
    Route::delete('/branches/{id}', [AdminController::class, 'branchDestroy'])->name('admin.branches.destroy');
    
    // Users Management
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::put('/users/{id}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    
    // Reviews Management
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('admin.reviews.index');
    Route::put('/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('admin.reviews.update');
    Route::delete('/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('admin.reviews.destroy');
});

// ==================== FALLBACK/COMPATIBILITY ROUTES ====================
Route::get('/login', function () {
    return redirect()->route('admin.login');
});

// ==================== DEBUG ROUTES ====================
Route::get('/check-pages-columns', function() {
    try {
        echo "<h1>Checking Pages Table Structure</h1>";
        
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('pages');
        
        echo "<h2>Columns in 'pages' table:</h2>";
        echo "<ul>";
        foreach ($columns as $column) {
            echo "<li>$column</li>";
        }
        echo "</ul>";
        
        echo "<h2>Data in 'pages' table:</h2>";
        $pages = \Illuminate\Support\Facades\DB::table('pages')->get();
        
        if ($pages->isEmpty()) {
            echo "No data found";
        } else {
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>ID</th><th>Slug</th><th>Title</th><th>Created At</th></tr>";
            foreach ($pages as $page) {
                echo "<tr>";
                echo "<td>{$page->id}</td>";
                echo "<td>{$page->slug}</td>";
                echo "<td>{$page->title}</td>";
                echo "<td>{$page->created_at}</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
});

Route::get('/fix-pages-data', function() {
    try {
        echo "<h1>Fixing Pages Data</h1>";
        
        // Cek jika ada data dengan is_active
        $count = \Illuminate\Support\Facades\DB::table('pages')
            ->whereNotNull('is_active')
            ->count();
            
        echo "Pages with is_active column: $count<br>";
        
        // Jika ada, hapus kolom is_active dari data
        if ($count > 0) {
            \Illuminate\Support\Facades\DB::table('pages')
                ->update(['is_active' => null]);
            echo "Removed is_active data<br>";
        }
        
        echo "Done!";
        
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
});

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');