<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE ROUTES
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu Page
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Gallery Pages
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// About Page
Route::get('/about', [PageController::class, 'indexAbout'])->name('about');

// Contact Pages
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Reservation Pages
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN ROUTES (GUEST)
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', function () {
    if (auth()->check() && auth()->user()?->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login');
})->name('admin.login')->middleware('guest');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

/*
|--------------------------------------------------------------------------
| ADMIN PROTECTED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    /*
    |--------------------------------------------------------------------------
    | PAGE MANAGEMENT
    |--------------------------------------------------------------------------
    */
    
    // Home Page Edit
    Route::get('/pages/home/edit', [PageController::class, 'editHome'])->name('pages.home.edit');
    Route::post('/pages/home/update', [PageController::class, 'updateHome'])->name('pages.home.update');
    
    // About Page Edit
    Route::get('/pages/about/edit', [PageController::class, 'editAbout'])->name('pages.about.edit');
    Route::post('/pages/about/update', [PageController::class, 'updateAbout'])->name('pages.about.update');
    
    // Contact Page Edit - GUNAKAN CONTROLLER BARU
    Route::get('/pages/contact/edit', [App\Http\Controllers\Admin\PageContactController::class, 'edit'])->name('pages.contact.edit');
    Route::post('/pages/contact/update', [App\Http\Controllers\Admin\PageContactController::class, 'update'])->name('pages.contact.update');
    
    /*
    |--------------------------------------------------------------------------
    | MENU MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/menu', [AdminController::class, 'menuIndex'])->name('menu.index');
    Route::get('/menu/create', [AdminController::class, 'menuCreate'])->name('menu.create');
    Route::post('/menu', [AdminController::class, 'menuStore'])->name('menu.store');
    Route::get('/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('menu.edit');
    Route::put('/menu/{id}', [AdminController::class, 'menuUpdate'])->name('menu.update');
    Route::delete('/menu/{id}', [AdminController::class, 'menuDestroy'])->name('menu.destroy');
    
    /*
    |--------------------------------------------------------------------------
    | PROMOTION MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/promotions', [AdminController::class, 'promotionsIndex'])->name('promotions.index');
    Route::get('/promotions/create', [AdminController::class, 'promotionsCreate'])->name('promotions.create');
    Route::post('/promotions', [AdminController::class, 'promotionsStore'])->name('promotions.store');
    Route::get('/promotions/{id}/edit', [AdminController::class, 'promotionsEdit'])->name('promotions.edit');
    Route::put('/promotions/{id}', [AdminController::class, 'promotionsUpdate'])->name('promotions.update');
    Route::delete('/promotions/{id}', [AdminController::class, 'promotionsDestroy'])->name('promotions.destroy');
    
    /*
    |--------------------------------------------------------------------------
    | GALLERY MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/gallery', [AdminController::class, 'galleryIndex'])->name('gallery.index');
    Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('gallery.store');
    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('gallery.destroy');
    
    /*
    |--------------------------------------------------------------------------
    | RESERVATIONS MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/reservations', [AdminController::class, 'reservationsIndex'])->name('reservations.index');
    Route::put('/reservations/{id}', [AdminController::class, 'reservationUpdate'])->name('reservations.update');
    Route::delete('/reservations/{id}', [AdminController::class, 'reservationDestroy'])->name('reservations.destroy');
    
    /*
    |--------------------------------------------------------------------------
    | BRANCHES MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/branches', [AdminController::class, 'branchesIndex'])->name('branches.index');
    Route::post('/branches', [AdminController::class, 'branchStore'])->name('branches.store');
    Route::put('/branches/{id}', [AdminController::class, 'branchUpdate'])->name('branches.update');
    Route::delete('/branches/{id}', [AdminController::class, 'branchDestroy'])->name('branches.destroy');
    
    /*
    |--------------------------------------------------------------------------
    | USERS MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::put('/users/{id}', [AdminController::class, 'userUpdate'])->name('users.update');
    
    /*
    |--------------------------------------------------------------------------
    | REVIEWS MANAGEMENT
    |--------------------------------------------------------------------------
    */
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('reviews.index');
    Route::put('/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('reviews.update');
    Route::delete('/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('reviews.destroy');
    
    /*
    |--------------------------------------------------------------------------
    | SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::get('/settings', [AdminController::class, 'editSettings'])->name('settings.edit');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});

/*
|--------------------------------------------------------------------------
| FALLBACK/COMPATIBILITY ROUTES
|--------------------------------------------------------------------------
*/

// Redirect /login to admin login
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Logout route (for compatibility)
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Fallback route - catch all undefined routes and redirect to home
Route::fallback(function () {
    return redirect()->route('home');
});