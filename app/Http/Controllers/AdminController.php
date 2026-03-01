<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\MenuCategory;
use App\Models\Promotion;
use App\Models\Reservation;
use App\Models\Gallery;
use App\Models\Branch;
use App\Models\User;
use App\Models\Review;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Handle admin login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Display admin dashboard
     */
    public function dashboard()
    {
        try {
            $totalMenu = MenuItem::count();
            $totalPromotions = Promotion::count();
            $totalReservations = Reservation::count();
            $totalGallery = Gallery::count();
            $totalBranches = Branch::count();
            $totalUsers = User::count();
            $totalReviews = Review::count();
            
            // Add aliases for backward compatibility
            $menuCount = $totalMenu;
            $promotionCount = $totalPromotions;
            $reservationCount = $totalReservations;
            $galleryCount = $totalGallery;
            $branchCount = $totalBranches;
            $userCount = $totalUsers;
            $reviewCount = $totalReviews;
            
            $recentReservations = Reservation::with('branch')
                ->latest()
                ->limit(5)
                ->get()
                ->map(function($reservation) {
                    return (object)[
                        'customer_name' => $reservation->customer_name,
                        'name' => $reservation->customer_name,
                        'email' => $reservation->email,
                        'date' => $reservation->reservation_date,
                        'reservation_date' => $reservation->reservation_date,
                        'time' => $reservation->reservation_time,
                        'reservation_time' => $reservation->reservation_time,
                        'guests' => $reservation->guest_count,
                        'guest_count' => $reservation->guest_count,
                        'people' => $reservation->guest_count,
                        'status' => $reservation->status,
                        'branch' => $reservation->branch
                    ];
                });
            
            $recentMenuItems = MenuItem::with('category')
                ->latest()
                ->limit(5)
                ->get();
            
            $activePromotions = Promotion::where('is_active', true)
                ->where('start_date', '<=', now())
                ->where('end_date', '>=', now())
                ->count();

            return view('admin.dashboard', compact(
                'totalMenu',
                'totalPromotions',
                'totalReservations',
                'totalGallery',
                'totalBranches',
                'totalUsers',
                'totalReviews',
                'recentReservations',
                'recentMenuItems',
                'activePromotions',
                'menuCount',
                'promotionCount',
                'reservationCount',
                'galleryCount',
                'branchCount',
                'userCount',
                'reviewCount'
            ));
            
        } catch (\Exception $e) {
            Log::error('Error in dashboard: ' . $e->getMessage());
            
            return view('admin.dashboard', [
                'totalMenu' => 0,
                'totalPromotions' => 0,
                'totalReservations' => 0,
                'totalGallery' => 0,
                'totalBranches' => 0,
                'totalUsers' => 0,
                'totalReviews' => 0,
                'recentReservations' => collect([]),
                'recentMenuItems' => collect([]),
                'activePromotions' => 0,
                'menuCount' => 0,
                'promotionCount' => 0,
                'reservationCount' => 0,
                'galleryCount' => 0,
                'branchCount' => 0,
                'userCount' => 0,
                'reviewCount' => 0,
                'error' => 'Terjadi kesalahan saat memuat data'
            ]);
        }
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda berhasil logout');
    }

    // ==================== MENU MANAGEMENT ====================

    /**
     * Display list of menu items
     */
    public function menuIndex()
    {
        try {
            $menuItems = MenuItem::with('category')
                ->orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get();
            return view('admin.menu.index', compact('menuItems'));
        } catch (\Exception $e) {
            Log::error('Error in menuIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show form to create new menu item
     */
    public function menuCreate()
    {
        try {
            $categories = MenuCategory::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();
            return view('admin.menu.create', compact('categories'));
        } catch (\Exception $e) {
            Log::error('Error in menuCreate: ' . $e->getMessage());
            return redirect()->route('admin.menu.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Store new menu item
     */
    public function menuStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:menu_categories,id',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|url',
                'is_available' => 'sometimes|boolean',
                'is_featured' => 'sometimes|boolean',
                'sort_order' => 'nullable|integer',
            ]);

            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->image,
                'is_available' => $request->has('is_available') ? true : false,
                'is_featured' => $request->has('is_featured') ? true : false,
                'sort_order' => $request->sort_order ?? 0,
            ];
            
            MenuItem::create($data);

            return redirect()->route('admin.menu.index')
                ->with('success', 'Menu berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Error creating menu item: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form to edit menu item
     */
    public function menuEdit($id)
    {
        try {
            $menuItem = MenuItem::with('category')->findOrFail($id);
            $categories = MenuCategory::where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get();
            
            return view('admin.menu.edit', compact('menuItem', 'categories'));
            
        } catch (\Exception $e) {
            Log::error('Error in menuEdit: ' . $e->getMessage());
            return redirect()->route('admin.menu.index')
                ->with('error', 'Menu tidak ditemukan: ' . $e->getMessage());
        }
    }

    /**
     * Update menu item
     */
    public function menuUpdate(Request $request, $id)
    {
        try {
            $menuItem = MenuItem::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:menu_categories,id',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|url',
                'is_available' => 'sometimes|boolean',
                'is_featured' => 'sometimes|boolean',
                'sort_order' => 'nullable|integer',
            ]);

            $data = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->image,
                'is_available' => $request->has('is_available') ? true : false,
                'is_featured' => $request->has('is_featured') ? true : false,
                'sort_order' => $request->sort_order ?? 0,
            ];
            
            $menuItem->update($data);

            return redirect()->route('admin.menu.index')
                ->with('success', 'Menu berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating menu item: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete menu item - ENHANCED VERSION WITH DETAILED LOGGING
     */
    public function menuDestroy($id)
    {
        try {
            // Log awal untuk debugging
            Log::info('========== MENU DELETE ATTEMPT ==========');
            Log::info('Attempting to delete menu item with ID: ' . $id);
            Log::info('Request method: ' . request()->method());
            Log::info('Request URL: ' . request()->fullUrl());
            Log::info('Session ID: ' . session()->getId());
            Log::info('User ID: ' . (Auth::check() ? Auth::id() : 'Not authenticated'));
            
            // Cari menu item
            $menuItem = MenuItem::with('category')->find($id);
            
            if (!$menuItem) {
                Log::error('Menu item not found with ID: ' . $id);
                
                if (request()->wantsJson() || request()->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Menu tidak ditemukan!'
                    ], 404);
                }
                
                return redirect()->route('admin.menu.index')
                    ->with('error', 'Menu tidak ditemukan!');
            }
            
            $menuName = $menuItem->name;
            $categoryName = $menuItem->category ? $menuItem->category->name : 'No Category';
            
            Log::info('Found menu item:', [
                'id' => $menuItem->id,
                'name' => $menuName,
                'category' => $categoryName,
                'price' => $menuItem->price,
                'is_available' => $menuItem->is_available
            ]);
            
            // Hapus file gambar jika ada (bukan URL external)
            if ($menuItem->image && !filter_var($menuItem->image, FILTER_VALIDATE_URL)) {
                $imagePath = public_path('storage/menu/' . $menuItem->image);
                Log::info('Checking image path: ' . $imagePath);
                
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                    Log::info('Successfully deleted image file: ' . $imagePath);
                } else {
                    Log::warning('Image file not found: ' . $imagePath);
                }
            }
            
            // Simpan nama untuk flash message sebelum delete
            $menuNameForMessage = $menuName;
            
            // Lakukan delete
            $menuItem->delete();
            
            Log::info('Successfully deleted menu item from database. ID: ' . $id . ', Name: ' . $menuNameForMessage);
            
            // Verifikasi bahwa item benar-benar terhapus
            $checkDeleted = MenuItem::find($id);
            if ($checkDeleted) {
                Log::error('Menu item STILL EXISTS after delete! ID: ' . $id);
            } else {
                Log::info('Verified: Menu item no longer exists in database.');
            }
            
            Log::info('========== MENU DELETE SUCCESS ==========');
            
            // Untuk request AJAX
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Menu "' . $menuNameForMessage . '" berhasil dihapus!',
                    'id' => $id
                ]);
            }
            
            // Untuk request biasa
            return redirect()->route('admin.menu.index')
                ->with('success', 'Menu "' . $menuNameForMessage . '" berhasil dihapus!');
                
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('ModelNotFoundException: Menu item not found - ID: ' . $id);
            Log::error('Error message: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Menu tidak ditemukan!'
                ], 404);
            }
            
            return redirect()->route('admin.menu.index')
                ->with('error', 'Menu tidak ditemukan!');
                
        } catch (\Exception $e) {
            Log::error('Exception occurred while deleting menu item:');
            Log::error('Message: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            if (request()->wantsJson() || request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus menu: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Gagal menghapus menu: ' . $e->getMessage());
        }
    }

     // ==================== PROMOTION MANAGEMENT ====================

    /**
     * Display list of promotions
     */
    public function promotionsIndex()
    {
        try {
            $promotions = Promotion::orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Hitung statistik
            $activeCount = Promotion::active()->count();
            $upcomingCount = Promotion::upcoming()->count();
            $expiredCount = Promotion::expired()->count();
            $inactiveCount = Promotion::where('is_active', false)->count();
            
            return view('admin.promotions.index', compact(
                'promotions', 
                'activeCount', 
                'upcomingCount', 
                'expiredCount', 
                'inactiveCount'
            ));
            
        } catch (\Exception $e) {
            Log::error('Error in promotionsIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show form to create new promotion
     */
    public function promotionsCreate()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store new promotion
     */
    public function promotionsStore(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'current_price' => 'required|numeric|min:0',
                'old_price' => 'nullable|numeric|min:0|gt:current_price',
                'badge_text' => 'required|string|max:50',
                'button_text' => 'required|string|max:50',
                'image_url' => 'required|url',
                'sort_order' => 'nullable|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'is_active' => 'nullable|boolean',
            ]);

            $data = $request->all();
            $data['is_active'] = $request->has('is_active') ? true : false;
            
            // Log untuk debugging
            Log::info('========== PROMOTION CREATE ATTEMPT ==========');
            Log::info('Input data:', [
                'title' => $data['title'],
                'start_date_input' => $request->start_date,
                'end_date_input' => $request->end_date,
                'current_time_local' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                'timezone' => config('app.timezone')
            ]);
            
            $promotion = Promotion::create($data);
            
            Log::info('Promotion created:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'start_date_local' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date_local' => $promotion->end_date->format('Y-m-d H:i:s'),
                'start_date_raw' => $promotion->raw_start_date,
                'end_date_raw' => $promotion->raw_end_date,
                'is_active' => $promotion->is_active,
                'status' => $promotion->status['label']
            ]);
            Log::info('========== PROMOTION CREATE SUCCESS ==========');

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $promotion->title . '" berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Error creating promotion: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form to edit promotion
     */
    public function promotionsEdit($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            
            // Log untuk debugging
            Log::info('========== PROMOTION EDIT VIEW ==========');
            Log::info('Editing promotion:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'start_date_local' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date_local' => $promotion->end_date->format('Y-m-d H:i:s'),
                'start_date_raw' => $promotion->raw_start_date,
                'end_date_raw' => $promotion->raw_end_date,
                'now_local' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                'now_utc' => Carbon::now('UTC')->format('Y-m-d H:i:s'),
                'is_currently_active' => $promotion->isCurrentlyActive(),
                'status' => $promotion->status['label']
            ]);
            
            return view('admin.promotions.edit', compact('promotion'));
            
        } catch (\Exception $e) {
            Log::error('Error editing promotion: ' . $e->getMessage());
            return redirect()->route('admin.promotions.index')
                ->with('error', 'Promosi tidak ditemukan!');
        }
    }

    /**
     * Update promotion - VERSI LENGKAP DENGAN DEBUGGING
     */
    public function promotionsUpdate(Request $request, $id)
    {
        try {
            Log::info('========== PROMOTION UPDATE ATTEMPT ==========');
            Log::info('Promotion ID: ' . $id);
            Log::info('Request data:', $request->all());
            Log::info('Current time local: ' . Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'));
            Log::info('Current time UTC: ' . Carbon::now('UTC')->format('Y-m-d H:i:s'));
            Log::info('Timezone config: ' . config('app.timezone'));
            
            $promotion = Promotion::findOrFail($id);
            
            Log::info('Existing promotion data:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'old_start_date_local' => $promotion->start_date->format('Y-m-d H:i:s'),
                'old_end_date_local' => $promotion->end_date->format('Y-m-d H:i:s'),
                'old_start_date_raw' => $promotion->raw_start_date,
                'old_end_date_raw' => $promotion->raw_end_date,
                'old_is_active' => $promotion->is_active,
                'old_status' => $promotion->status['label']
            ]);
            
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'current_price' => 'required|numeric|min:0',
                'old_price' => 'nullable|numeric|min:0|gt:current_price',
                'badge_text' => 'required|string|max:50',
                'button_text' => 'required|string|max:50',
                'image_url' => 'required|url',
                'sort_order' => 'nullable|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'is_active' => 'nullable|boolean',
            ]);

            $data = $request->all();
            $data['is_active'] = $request->has('is_active') ? true : false;
            
            // Parse tanggal untuk verifikasi
            $startDateLocal = Carbon::parse($request->start_date, 'Asia/Jakarta');
            $endDateLocal = Carbon::parse($request->end_date, 'Asia/Jakarta');
            
            Log::info('Parsed dates:', [
                'start_date_input' => $request->start_date,
                'end_date_input' => $request->end_date,
                'start_date_local' => $startDateLocal->format('Y-m-d H:i:s'),
                'end_date_local' => $endDateLocal->format('Y-m-d H:i:s'),
                'start_date_utc' => $startDateLocal->copy()->setTimezone('UTC')->format('Y-m-d H:i:s'),
                'end_date_utc' => $endDateLocal->copy()->setTimezone('UTC')->format('Y-m-d H:i:s'),
            ]);
            
            // Simpan data lama untuk perbandingan
            $oldData = [
                'title' => $promotion->title,
                'start_date' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date' => $promotion->end_date->format('Y-m-d H:i:s'),
                'is_active' => $promotion->is_active,
                'status' => $promotion->status['label']
            ];
            
            // Update data
            $promotion->update($data);
            
            // Refresh model untuk mendapatkan data terbaru
            $promotion->refresh();
            
            Log::info('Update result:', [
                'old_data' => $oldData,
                'new_data' => [
                    'title' => $promotion->title,
                    'start_date_local' => $promotion->start_date->format('Y-m-d H:i:s'),
                    'end_date_local' => $promotion->end_date->format('Y-m-d H:i:s'),
                    'is_active' => $promotion->is_active,
                ],
                'raw_dates' => [
                    'start_date_db' => $promotion->raw_start_date,
                    'end_date_db' => $promotion->raw_end_date,
                ],
                'now_local' => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                'is_currently_active' => $promotion->isCurrentlyActive(),
                'status' => $promotion->status['label']
            ]);

            Log::info('========== PROMOTION UPDATE SUCCESS ==========');

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $promotion->title . '" berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating promotion: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete promotion
     */
    public function promotionsDestroy($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            
            Log::info('========== PROMOTION DELETE ATTEMPT ==========');
            Log::info('Attempting to delete promotion ID: ' . $id . ' Title: ' . $promotion->title);
            
            $title = $promotion->title;
            $promotion->delete();
            
            Log::info('Successfully deleted promotion ID: ' . $id);
            Log::info('========== PROMOTION DELETE SUCCESS ==========');
            
            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $title . '" berhasil dihapus!');
                
        } catch (\Exception $e) {
            Log::error('Error deleting promotion ID ' . $id . ': ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Gagal menghapus promosi: ' . $e->getMessage());
        }
    }

    // ==================== GALLERY MANAGEMENT ====================

    /**
     * Display list of gallery images
     */
    public function galleryIndex()
    {
        try {
            $galleries = Gallery::orderBy('created_at', 'desc')->get();
            return view('admin.gallery.index', compact('galleries'));
        } catch (\Exception $e) {
            Log::error('Error in galleryIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show form to create new gallery item
     */
    public function galleryCreate()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store new gallery image
     */
    public function galleryStore(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|in:food,facility,event,interior',
                'image_url' => 'required|url',
                'is_active' => 'boolean',
            ]);

            $data = [
                'caption' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'is_active' => $request->has('is_active'),
                'sort_order' => 0,
                'image_path' => $request->image_url,
            ];

            Gallery::create($data);

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Gambar berhasil ditambahkan ke gallery!');

        } catch (\Exception $e) {
            Log::error('Error creating gallery: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form to edit gallery item
     */
    public function galleryEdit($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return view('admin.gallery.edit', compact('gallery'));
        } catch (\Exception $e) {
            Log::error('Error in galleryEdit: ' . $e->getMessage());
            return redirect()->route('admin.gallery.index')
                ->with('error', 'Gambar tidak ditemukan!');
        }
    }

    /**
     * Update gallery item
     */
    public function galleryUpdate(Request $request, $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'category' => 'required|in:food,facility,event,interior',
                'image_url' => 'nullable|url',
                'is_active' => 'boolean',
            ]);

            $data = [
                'caption' => $request->title,
                'description' => $request->description,
                'category' => $request->category,
                'is_active' => $request->has('is_active'),
            ];
            
            if ($request->filled('image_url')) {
                $data['image_path'] = $request->image_url;
            }

            $gallery->update($data);

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Gambar berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating gallery: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete gallery image
     */
    public function galleryDestroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();

            return redirect()->route('admin.gallery.index')
                ->with('success', 'Gambar berhasil dihapus dari gallery!');

        } catch (\Exception $e) {
            Log::error('Error deleting gallery: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    
    // ==================== RESERVATIONS MANAGEMENT ====================

    /**
     * Display list of reservations
     */
    public function reservationsIndex()
    {
        try {
            $reservations = Reservation::with('branch')
                ->orderBy('created_at', 'desc')
                ->get();
            
            $pendingCount = Reservation::where('status', 'pending')->count();
            $confirmedCount = Reservation::where('status', 'confirmed')->count();
            $completedCount = Reservation::where('status', 'completed')->count();
            $cancelledCount = Reservation::where('status', 'cancelled')->count();
            $totalCount = Reservation::count();
            
            return view('admin.reservations.index', compact(
                'reservations', 
                'pendingCount', 
                'confirmedCount', 
                'completedCount', 
                'cancelledCount',
                'totalCount'
            ));
        } catch (\Exception $e) {
            Log::error('Error in reservationsIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update reservation status - MENGGUNAKAN POST
     */
    public function reservationUpdate(Request $request, $id)
    {
        try {
            Log::info('Updating reservation ID: ' . $id);
            Log::info('Request data: ', $request->all());
            
            $reservation = Reservation::findOrFail($id);
            
            $request->validate([
                'status' => 'required|in:pending,confirmed,completed,cancelled',
            ]);

            $reservation->update([
                'status' => $request->status,
            ]);

            Log::info('Reservation updated successfully. New status: ' . $request->status);

            $statusMessages = [
                'pending' => 'dikembalikan ke status Pending',
                'confirmed' => 'dikonfirmasi',
                'completed' => 'diselesaikan',
                'cancelled' => 'dibatalkan'
            ];

            $message = "Reservasi #{$reservation->id} berhasil {$statusMessages[$request->status]}!";

            return redirect()->route('admin.reservations.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            Log::error('Error updating reservation: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Delete reservation
     */
    public function reservationDestroy($id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->delete();

            return redirect()->route('admin.reservations.index')
                ->with('success', 'Reservasi berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting reservation: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==================== BRANCHES MANAGEMENT ====================

    /**
     * Display list of branches
     */
    public function branchesIndex()
    {
        try {
            $branches = Branch::orderBy('name')->get();
            return view('admin.branches.index', compact('branches'));
        } catch (\Exception $e) {
            Log::error('Error in branchesIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Store new branch
     */
    public function branchStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'map_link' => 'nullable|url',
                'opening_hours' => 'nullable|string',
                'is_active' => 'boolean',
            ]);

            $data = $request->all();
            $data['is_active'] = $request->has('is_active');
            
            Branch::create($data);

            return redirect()->route('admin.branches.index')
                ->with('success', 'Cabang berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Error creating branch: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Update branch
     */
    public function branchUpdate(Request $request, $id)
    {
        try {
            $branch = Branch::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'nullable|email|max:255',
                'map_link' => 'nullable|url',
                'opening_hours' => 'nullable|string',
                'is_active' => 'boolean',
            ]);

            $data = $request->all();
            $data['is_active'] = $request->has('is_active');
            
            $branch->update($data);

            return redirect()->route('admin.branches.index')
                ->with('success', 'Cabang berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating branch: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete branch
     */
    public function branchDestroy($id)
    {
        try {
            $branch = Branch::findOrFail($id);
            
            if ($branch->reservations()->count() > 0) {
                return redirect()->back()
                    ->with('error', 'Cabang tidak dapat dihapus karena masih memiliki data reservasi!');
            }
            
            $branch->delete();

            return redirect()->route('admin.branches.index')
                ->with('success', 'Cabang berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting branch: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==================== USERS MANAGEMENT ====================

    /**
     * Display list of users
     */
    public function usersIndex()
    {
        try {
            $users = User::orderBy('created_at', 'desc')->get();
            return view('admin.users.index', compact('users'));
        } catch (\Exception $e) {
            Log::error('Error in usersIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update user
     */
    public function userUpdate(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required|in:admin,user',
                'is_active' => 'boolean',
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('admin.users.index')
                ->with('success', 'User berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    // ==================== REVIEWS MANAGEMENT ====================

    /**
     * Display list of reviews
     */
    public function reviewsIndex()
    {
        try {
            $reviews = Review::with('user', 'branch')
                ->orderBy('created_at', 'desc')
                ->get();
            return view('admin.reviews.index', compact('reviews'));
        } catch (\Exception $e) {
            Log::error('Error in reviewsIndex: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update review
     */
    public function reviewUpdate(Request $request, $id)
    {
        try {
            $review = Review::findOrFail($id);
            
            $request->validate([
                'is_approved' => 'boolean',
                'is_featured' => 'boolean',
            ]);

            $review->update([
                'is_approved' => $request->has('is_approved'),
                'is_featured' => $request->has('is_featured'),
            ]);

            return redirect()->route('admin.reviews.index')
                ->with('success', 'Review berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating review: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Delete review
     */
    public function reviewDestroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();

            return redirect()->route('admin.reviews.index')
                ->with('success', 'Review berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting review: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==================== PAGE MANAGEMENT ====================

    /**
     * Edit contact page content
     */
    public function editContactPage()
    {
        try {
            $page = Page::where('slug', 'contact')->first();
            return view('admin.pages.contact', compact('page'));
        } catch (\Exception $e) {
            Log::error('Error in editContactPage: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update contact page content - DIPERBAIKI DENGAN VALIDASI YANG SESUAI FORM
     */
    public function updateContactPage(Request $request)
    {
        try {
            $rules = [
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'hours' => 'required|string|max:255',
                'map_embed' => 'required|string',
                'whatsapp_admin_1' => 'required|string|max:20',
                'whatsapp_admin_1_name' => 'required|string|max:255',
                'whatsapp_admin_2' => 'required|string|max:20',
                'whatsapp_admin_2_name' => 'required|string|max:255',
                'delivery_gofood' => 'nullable|url',
                'delivery_grabfood' => 'nullable|url',
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'twitter_url' => 'nullable|url',
                'linkedin_url' => 'nullable|url',
                'tiktok_url' => 'nullable|url',
                'youtube_url' => 'nullable|url',
            ];

            $request->validate($rules);

            $page = Page::where('slug', 'contact')->first();
            $existingContent = $page ? $page->content : [];

            $content = [
                'hero_subtitle' => $request->has('hero_subtitle') ? $request->hero_subtitle : ($existingContent['hero_subtitle'] ?? 'HUBUNGI KAMI'),
                'hero_title_line1' => $request->has('hero_title_line1') ? $request->hero_title_line1 : ($existingContent['hero_title_line1'] ?? 'Kami Siap'),
                'hero_title_line2' => $request->has('hero_title_line2') ? $request->hero_title_line2 : ($existingContent['hero_title_line2'] ?? 'Melayani Dengan'),
                'hero_title_line3' => $request->has('hero_title_line3') ? $request->hero_title_line3 : ($existingContent['hero_title_line3'] ?? 'Sepenuh Hati'),
                'hero_description' => $request->has('hero_description') ? $request->hero_description : ($existingContent['hero_description'] ?? 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.'),
                'hero_image_url' => $request->has('hero_image_url') ? $request->hero_image_url : ($existingContent['hero_image_url'] ?? 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'),
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'hours' => $request->hours,
                'map_embed' => $request->map_embed,
                'whatsapp_admin_1' => $request->whatsapp_admin_1,
                'whatsapp_admin_1_name' => $request->whatsapp_admin_1_name,
                'whatsapp_admin_2' => $request->whatsapp_admin_2,
                'whatsapp_admin_2_name' => $request->whatsapp_admin_2_name,
                'delivery_gofood' => $request->delivery_gofood,
                'delivery_grabfood' => $request->delivery_grabfood,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
                'twitter_url' => $request->twitter_url,
                'linkedin_url' => $request->linkedin_url,
                'tiktok_url' => $request->tiktok_url,
                'youtube_url' => $request->youtube_url,
                'social_media' => [
                    'facebook' => $request->facebook_url ?? ($existingContent['facebook_url'] ?? '#'),
                    'instagram' => $request->instagram_url ?? ($existingContent['instagram_url'] ?? '#'),
                    'twitter' => $request->twitter_url ?? ($existingContent['twitter_url'] ?? '#'),
                    'linkedin' => $request->linkedin_url ?? ($existingContent['linkedin_url'] ?? '#'),
                    'tiktok' => $request->tiktok_url ?? ($existingContent['tiktok_url'] ?? '#'),
                    'youtube' => $request->youtube_url ?? ($existingContent['youtube_url'] ?? '#'),
                ],
            ];

            Page::updateOrCreate(
                ['slug' => 'contact'],
                [
                    'title' => 'Kontak Kami',
                    'content' => $content
                ]
            );

            return redirect()->route('admin.pages.contact.edit')
                ->with('success', 'Halaman kontak berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating contact page: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Edit reservation page content
     */
    public function editReservationPage()
    {
        try {
            $page = Page::where('slug', 'reservation')->first();
            $branches = Branch::where('is_active', true)->get();
            return view('admin.pages.reservation', compact('page', 'branches'));
        } catch (\Exception $e) {
            Log::error('Error in editReservationPage: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update reservation page content
     */
    public function updateReservationPage(Request $request)
    {
        try {
            $request->validate([
                'hero_subtitle' => 'required|string|max:255',
                'hero_title_line1' => 'required|string|max:255',
                'hero_title_line2' => 'required|string|max:255',
                'hero_title_line3' => 'required|string|max:255',
                'hero_description' => 'required|string',
                'hero_image_url' => 'required|url',
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'hours' => 'required|string|max:255',
                'map_embed' => 'required|string',
                'whatsapp_admin_1' => 'required|string|max:20',
                'whatsapp_admin_1_name' => 'required|string|max:255',
                'whatsapp_admin_2' => 'required|string|max:20',
                'whatsapp_admin_2_name' => 'required|string|max:255',
                'delivery_gofood' => 'nullable|url',
                'delivery_grabfood' => 'nullable|url',
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'twitter_url' => 'nullable|url',
                'linkedin_url' => 'nullable|url',
            ]);

            $content = [
                'hero_subtitle' => $request->hero_subtitle,
                'hero_title_line1' => $request->hero_title_line1,
                'hero_title_line2' => $request->hero_title_line2,
                'hero_title_line3' => $request->hero_title_line3,
                'hero_description' => $request->hero_description,
                'hero_image_url' => $request->hero_image_url,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'hours' => $request->hours,
                'map_embed' => $request->map_embed,
                'whatsapp_admin_1' => $request->whatsapp_admin_1,
                'whatsapp_admin_1_name' => $request->whatsapp_admin_1_name,
                'whatsapp_admin_2' => $request->whatsapp_admin_2,
                'whatsapp_admin_2_name' => $request->whatsapp_admin_2_name,
                'delivery_gofood' => $request->delivery_gofood,
                'delivery_grabfood' => $request->delivery_grabfood,
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
                'twitter_url' => $request->twitter_url,
                'linkedin_url' => $request->linkedin_url,
                'social_media' => [
                    'facebook' => $request->facebook_url ?? '#',
                    'instagram' => $request->instagram_url ?? '#',
                    'twitter' => $request->twitter_url ?? '#',
                    'linkedin' => $request->linkedin_url ?? '#',
                ],
            ];

            Page::updateOrCreate(
                ['slug' => 'reservation'],
                [
                    'title' => 'Reservasi & Kontak',
                    'content' => $content
                ]
            );

            return redirect()->route('admin.pages.reservation.edit')
                ->with('success', 'Halaman reservasi berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating reservation page: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    // ==================== SETTINGS MANAGEMENT ====================

    /**
     * Edit settings
     */
    public function editSettings()
    {
        try {
            $settings = Page::where('slug', 'settings')->first();
            return view('admin.settings.edit', compact('settings'));
        } catch (\Exception $e) {
            Log::error('Error in editSettings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        try {
            $request->validate([
                'site_name' => 'required|string|max:255',
                'site_description' => 'nullable|string',
                'contact_email' => 'nullable|email',
                'contact_phone' => 'nullable|string|max:20',
                'address' => 'nullable|string',
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'tiktok_url' => 'nullable|url',
            ]);

            $settings = Page::updateOrCreate(
                ['slug' => 'settings'],
                [
                    'title' => 'Pengaturan Website',
                    'content' => $request->except('_token')
                ]
            );

            return redirect()->route('admin.settings.edit')
                ->with('success', 'Pengaturan berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating settings: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
}