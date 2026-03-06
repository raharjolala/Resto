<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Models\Promotion;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==================== PUBLIC ROUTES ====================

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Menu Page
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Gallery Pages
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{id}', [GalleryController::class, 'show'])->name('gallery.show');

// About Page
Route::get('/about', [PageController::class, 'indexAbout'])->name('about');

// Contact Page
Route::get('/contact', [PageController::class, 'indexContact'])->name('contact');

// Reservation Page
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');

// Contact form submission
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');

// ==================== AUTHENTICATION ROUTES ====================

// Admin Login Page
Route::get('/admin/login', function () {
    if (auth()->check() && auth()->user()?->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login');
})->name('admin.login')->middleware('guest');

// Admin Login Submit
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Redirect /login to admin login
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Logout route
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// ==================== ADMIN PROTECTED ROUTES ====================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Logout
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    // ===== PAGE MANAGEMENT =====
    
    // Home Page Edit & Update
    Route::get('/pages/home/edit', [PageController::class, 'editHome'])->name('pages.home.edit');
    Route::post('/pages/home/update', [PageController::class, 'updateHome'])->name('pages.home.update');
    
    // About Page Edit & Update
    Route::get('/pages/about/edit', [PageController::class, 'editAbout'])->name('pages.about.edit');
    Route::post('/pages/about/update', [PageController::class, 'updateAbout'])->name('pages.about.update');
    
    // Contact Page Edit & Update
    Route::get('/pages/contact/edit', [PageController::class, 'editContact'])->name('pages.contact.edit');
    Route::post('/pages/contact/update', [PageController::class, 'updateContact'])->name('pages.contact.update');
    
    // ===== MENU MANAGEMENT =====
    Route::get('/menu', [AdminController::class, 'menuIndex'])->name('menu.index');
    Route::get('/menu/create', [AdminController::class, 'menuCreate'])->name('menu.create');
    Route::post('/menu', [AdminController::class, 'menuStore'])->name('menu.store');
    Route::get('/menu/{id}/edit', [AdminController::class, 'menuEdit'])->name('menu.edit');
    Route::post('/menu/{id}/update', [AdminController::class, 'menuUpdate'])->name('menu.update');
    
    // PERBAIKAN: Gunakan Route::delete untuk method DELETE
    Route::delete('/menu/{id}', [AdminController::class, 'menuDestroy'])->name('menu.destroy');
    
    // ===== PROMOTIONS MANAGEMENT =====
    Route::get('/promotions', [AdminController::class, 'promotionsIndex'])->name('promotions.index');
    Route::get('/promotions/create', [AdminController::class, 'promotionsCreate'])->name('promotions.create');
    Route::post('/promotions', [AdminController::class, 'promotionsStore'])->name('promotions.store');
    Route::get('/promotions/{id}/edit', [AdminController::class, 'promotionsEdit'])->name('promotions.edit');
    Route::put('/promotions/{id}', [AdminController::class, 'promotionsUpdate'])->name('promotions.update');
    Route::delete('/promotions/{id}', [AdminController::class, 'promotionsDestroy'])->name('promotions.destroy');

    // Debug route
    Route::get('/debug-promotions', function() {
        $nowUTC = Carbon::now('UTC');
        $nowJakarta = Carbon::now('Asia/Jakarta');
        
        $promotions = Promotion::all();
        
        $data = [
            'server_info' => [
                'timezone_config' => config('app.timezone'),
                'php_timezone' => date_default_timezone_get(),
                'current_time_utc' => $nowUTC->format('Y-m-d H:i:s'),
                'current_time_jakarta' => $nowJakarta->format('Y-m-d H:i:s'),
            ],
            'database_stats' => [
                'total_promotions' => Promotion::count(),
                'active_flag_true' => Promotion::where('is_active', true)->count(),
                'using_scope_active' => Promotion::active()->count(),
            ],
            'promotions' => []
        ];
        
        foreach ($promotions as $promo) {
            $data['promotions'][] = [
                'id' => $promo->id,
                'title' => $promo->title,
                'is_active' => $promo->is_active,
                'sort_order' => $promo->sort_order,
                'start_date' => [
                    'raw_db' => $promo->getRawStartDateAttribute(),
                    'accessor' => $promo->start_date ? $promo->start_date->format('Y-m-d H:i:s') : null,
                    'timezone' => $promo->start_date ? $promo->start_date->timezoneName : null,
                ],
                'end_date' => [
                    'raw_db' => $promo->getRawEndDateAttribute(),
                    'accessor' => $promo->end_date ? $promo->end_date->format('Y-m-d H:i:s') : null,
                    'timezone' => $promo->end_date ? $promo->end_date->timezoneName : null,
                ],
                'status' => [
                    'label' => $promo->status['label'],
                    'class' => $promo->status['class'],
                ],
                'is_currently_active' => $promo->isCurrentlyActive(),
                'comparison_with_jakarta' => [
                    'start <= now' => $promo->start_date ? ($promo->start_date <= $nowJakarta) : false,
                    'end >= now' => $promo->end_date ? ($promo->end_date >= $nowJakarta) : false,
                    'result' => $promo->isCurrentlyActive()
                ]
            ];
        }
        
        return response()->json($data);
    });

   // Gallery routes - konsisten dengan menu
    Route::get('/gallery', [AdminController::class, 'galleryIndex'])->name('gallery.index');
    Route::get('/gallery/create', [AdminController::class, 'galleryCreate'])->name('gallery.create');
    Route::post('/gallery', [AdminController::class, 'galleryStore'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [AdminController::class, 'galleryEdit'])->name('gallery.edit');
    Route::put('/gallery/{id}', [AdminController::class, 'galleryUpdate'])->name('gallery.update');
    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDestroy'])->name('gallery.destroy');

    // ===== RESERVATIONS MANAGEMENT =====
    Route::get('/reservations', [AdminController::class, 'reservationsIndex'])->name('reservations.index');
    Route::post('/reservations/{id}', [AdminController::class, 'reservationUpdate'])->name('reservations.update');
    Route::delete('/reservations/{id}', [AdminController::class, 'reservationDestroy'])->name('reservations.destroy');
    
    // ===== RESERVATIONS CHECK (DEBUGGING) =====
    Route::get('/reservations/check', function() {
        $reservations = App\Models\Reservation::with('branch')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.reservations.check', compact('reservations'));
    })->name('reservations.check');

    // ===== USERS MANAGEMENT =====
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::post('/users/{id}', [AdminController::class, 'userUpdate'])->name('users.update');
    
    // ===== BRANCHES MANAGEMENT =====
    Route::get('/branches', [AdminController::class, 'branchesIndex'])->name('branches.index');
    Route::post('/branches', [AdminController::class, 'branchStore'])->name('branches.store');
    Route::post('/branches/{id}', [AdminController::class, 'branchUpdate'])->name('branches.update');
    Route::delete('/branches/{id}', [AdminController::class, 'branchDestroy'])->name('branches.destroy');
    
    // ===== REVIEWS MANAGEMENT =====
    Route::get('/reviews', [AdminController::class, 'reviewsIndex'])->name('reviews.index');
    Route::post('/reviews/{id}', [AdminController::class, 'reviewUpdate'])->name('reviews.update');
    Route::delete('/reviews/{id}', [AdminController::class, 'reviewDestroy'])->name('reviews.destroy');
    
    // ===== SETTINGS MANAGEMENT =====
    Route::get('/settings', [AdminController::class, 'editSettings'])->name('settings.edit');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});

// ==================== FALLBACK ROUTE ====================
Route::fallback(function () {
    return redirect()->route('home');
});