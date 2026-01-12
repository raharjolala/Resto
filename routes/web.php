<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

// ==================== PUBLIC WEBSITE ROUTES ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

// ==================== ADMIN LOGIN ROUTES ====================
// Tampilkan halaman login admin (standalone)
Route::get('/admin/login', function () {
    // Jika sudah login sebagai admin, redirect ke dashboard
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login'); // Ini file login.blade.php Anda
})->name('admin.login')->middleware('guest');

// Handle login submit
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// ==================== ADMIN PROTECTED ROUTES ====================
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard - ini yang harus diakses setelah login
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // alias
    
    // Logout admin
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Menu Management Routes
    Route::get('/menu', [AdminController::class, 'menuIndex'])->name('admin.menu.index');
    Route::get('/menu/create', [AdminController::class, 'menuCreate'])->name('admin.menu.create');
    Route::post('/menu', [AdminController::class, 'menuStore'])->name('admin.menu.store');
    Route::get('/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('admin.menu.edit');
    Route::put('/menu/{id}', [AdminController::class, 'menuUpdate'])->name('admin.menu.update');
    Route::delete('/menu/{id}', [AdminController::class, 'menuDestroy'])->name('admin.menu.destroy');
    
    // Reservations Management Routes
    Route::get('/reservations', [AdminController::class, 'reservationsIndex'])->name('admin.reservations.index');
    Route::put('/reservations/{id}', [AdminController::class, 'reservationUpdate'])->name('admin.reservations.update');
    Route::delete('/reservations/{id}', [AdminController::class, 'reservationDestroy'])->name('admin.reservations.destroy');
    
    // Gallery Management Routes
    Route::get('/gallery', [AdminController::class, 'galleryIndex'])->name('admin.gallery.index');
    Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('admin.gallery.store');
    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('admin.gallery.destroy');
    
    // Branches Management Routes
    Route::get('/branches', [AdminController::class, 'branchesIndex'])->name('admin.branches.index');
    Route::post('/branches', [AdminController::class, 'branchStore'])->name('admin.branches.store');
    Route::put('/branches/{id}', [AdminController::class, 'branchUpdate'])->name('admin.branches.update');
    Route::delete('/branches/{id}', [AdminController::class, 'branchDestroy'])->name('admin.branches.destroy');
    
    // Users Management Routes
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::put('/users/{id}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    
    // Reviews Management Routes
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('admin.reviews.index');
    Route::put('/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('admin.reviews.update');
    Route::delete('/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('admin.reviews.destroy');
});

// ==================== FALLBACK/COMPATIBILITY ROUTES ====================
// Redirect login lama ke login admin baru
Route::get('/login', function () {
    return redirect()->route('admin.login');
});

// Logout untuk website utama (jika ada)
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');