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
                    // Transform to match the expected format in the dashboard
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
                // Add the aliases
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
            
            // Return empty data in case of error
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
                // Add the aliases in error case too
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
     * Display menu items list
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
            // Find the menu item or fail
            $menuItem = MenuItem::with('category')->findOrFail($id);
            
            // Get categories for dropdown
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
     * Delete menu item
     */
    public function menuDestroy($id)
    {
        try {
            $menuItem = MenuItem::findOrFail($id);
            $menuItem->delete();

            return redirect()->route('admin.menu.index')
                ->with('success', 'Menu berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error deleting menu item: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==================== PROMOTION MANAGEMENT ====================

    /**
     * Display promotions list
     */
    public function promotionsIndex()
    {
        try {
            $promotions = Promotion::orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get();
                
            return view('admin.promotions.index', compact('promotions'));
            
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
            
            Promotion::create($data);

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi berhasil ditambahkan!');

        } catch (\Exception $e) {
            Log::error('Error creating promotion: ' . $e->getMessage());
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
            return view('admin.promotions.edit', compact('promotion'));
        } catch (\Exception $e) {
            Log::error('Error editing promotion: ' . $e->getMessage());
            return redirect()->route('admin.promotions.index')
                ->with('error', 'Promosi tidak ditemukan!');
        }
    }

    /**
     * Update promotion
     */
    public function promotionsUpdate(Request $request, $id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            
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
            
            $promotion->update($data);

            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error updating promotion: ' . $e->getMessage());
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
            $promotion->delete();
            
            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi berhasil dihapus!');
                
        } catch (\Exception $e) {
            Log::error('Error deleting promotion: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // ==================== GALLERY MANAGEMENT ====================

    /**
     * Display gallery list
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
     * Store new gallery item
     */
    public function galleryStore(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'is_active' => 'boolean',
            ]);

            $data = $request->except('image');
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/gallery', $imageName);
                $data['image'] = $imageName;
            }

            $data['is_active'] = $request->has('is_active');
            
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
     * Delete gallery item
     */
    public function galleryDestroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            if ($gallery->image) {
                Storage::delete('public/gallery/' . $gallery->image);
            }
            
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
     * Display reservations list with counts
     */
    public function reservationsIndex()
    {
        try {
            $reservations = Reservation::with('branch')
                ->orderBy('created_at', 'desc')
                ->get();
            
            // Calculate counts by status
            $pendingCount = Reservation::where('status', 'pending')->count();
            $confirmedCount = Reservation::where('status', 'confirmed')->count();
            $completedCount = Reservation::where('status', 'completed')->count();
            $cancelledCount = Reservation::where('status', 'cancelled')->count();
            $totalCount = Reservation::count();
            
            // Debug: Log the data to check if reservations exist
            Log::info('Reservations count: ' . $reservations->count());
            
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
     * Update reservation status
     */
    public function reservationUpdate(Request $request, $id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            
            $request->validate([
                'status' => 'required|in:pending,confirmed,completed,cancelled',
            ]);

            $reservation->update([
                'status' => $request->status,
            ]);

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
     * Display branches list
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
            
            // Check if branch has reservations
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
     * Display users list
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
     * Display reviews list
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

    // ==================== SETTINGS MANAGEMENT ====================

    /**
     * Show settings edit form
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