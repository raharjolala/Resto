<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Admin Routes (Protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Menu Management Routes
    Route::get('/admin/menu', [AdminController::class, 'menuIndex'])->name('admin.menu.index');
    Route::get('/admin/menu/create', [AdminController::class, 'menuCreate'])->name('admin.menu.create');
    Route::post('/admin/menu', [AdminController::class, 'menuStore'])->name('admin.menu.store');
    Route::get('/admin/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('admin.menu.edit');
    Route::put('/admin/menu/{id}', [AdminController::class, 'menuUpdate'])->name('admin.menu.update');
    Route::delete('/admin/menu/{id}', [AdminController::class, 'menuDestroy'])->name('admin.menu.destroy');
    
    // Reservations Management Routes
    Route::get('/admin/reservations', [AdminController::class, 'reservationsIndex'])->name('admin.reservations.index');
    Route::put('/admin/reservations/{id}', [AdminController::class, 'reservationUpdate'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{id}', [AdminController::class, 'reservationDestroy'])->name('admin.reservations.destroy');
    
    // Gallery Management Routes
    Route::get('/admin/gallery', [AdminController::class, 'galleryIndex'])->name('admin.gallery.index');
    Route::post('/admin/gallery', [AdminController::class, 'galleryStore'])->name('admin.gallery.store');
    Route::delete('/admin/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('admin.gallery.destroy');
    
    // Branches Management Routes
    Route::get('/admin/branches', [AdminController::class, 'branchesIndex'])->name('admin.branches.index');
    Route::post('/admin/branches', [AdminController::class, 'branchStore'])->name('admin.branches.store');
    Route::put('/admin/branches/{id}', [AdminController::class, 'branchUpdate'])->name('admin.branches.update');
    Route::delete('/admin/branches/{id}', [AdminController::class, 'branchDestroy'])->name('admin.branches.destroy');
    
    // Users Management Routes
    Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::put('/admin/users/{id}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    
    // Reviews Management Routes
    Route::get('/admin/reviews', [AdminController::class, 'reviewsIndex'])->name('admin.reviews.index');
    Route::put('/admin/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('admin.reviews.update');
    Route::delete('/admin/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('admin.reviews.destroy');
});