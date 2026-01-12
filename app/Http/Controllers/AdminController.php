<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\Branch;
use App\Models\Review;
use App\Models\Gallery;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Check if user is admin
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin');
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Hanya admin yang bisa login.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // DASHBOARD METHOD - THIS WAS MISSING
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }

        try {
            $menuCount = MenuItem::count();
            $reservationCount = Reservation::count();
            $userCount = User::count();
            $branchCount = Branch::count();
            $recentReservations = Reservation::latest()->limit(5)->get();
        } catch (\Exception $e) {
            // If tables don't exist yet, use default values
            $menuCount = 0;
            $reservationCount = 0;
            $userCount = User::count();
            $branchCount = 0;
            $recentReservations = collect([]);
        }

        return view('admin.dashboard', compact(
            'menuCount',
            'reservationCount',
            'userCount',
            'branchCount',
            'recentReservations'
        ));
    }

    public function menuIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $menuItems = MenuItem::with('category')->orderBy('category_id')->get();
        } catch (\Exception $e) {
            $menuItems = collect([]);
        }
        
        return view('admin.menu.index', compact('menuItems'));
    }
    
    public function menuCreate()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $categories = MenuCategory::where('is_active', true)->get();
        } catch (\Exception $e) {
            $categories = collect([]);
        }
        
        return view('admin.menu.create', compact('categories'));
    }
    
    public function menuStore(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
            'is_featured' => 'boolean',
        ]);
        
        try {
            MenuItem::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->image,
                'is_available' => $request->is_available ?? true,
                'is_featured' => $request->is_featured ?? false,
                'sort_order' => $request->sort_order ?? 0,
            ]);
            
            return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan menu: ' . $e->getMessage());
        }
    }
    
    public function menuEdit($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $menuItem = MenuItem::findOrFail($id);
            $categories = MenuCategory::where('is_active', true)->get();
            return view('admin.menu.edit', compact('menuItem', 'categories'));
        } catch (\Exception $e) {
            return redirect()->route('admin.menu.index')->with('error', 'Menu tidak ditemukan');
        }
    }
    
    public function menuUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'is_available' => 'boolean',
            'is_featured' => 'boolean',
        ]);
        
        try {
            $menuItem = MenuItem::findOrFail($id);
            $menuItem->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $request->image,
                'is_available' => $request->is_available ?? true,
                'is_featured' => $request->is_featured ?? false,
                'sort_order' => $request->sort_order ?? 0,
            ]);
            
            return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui menu: ' . $e->getMessage());
        }
    }
    
    public function menuDestroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $menuItem = MenuItem::findOrFail($id);
            $menuItem->delete();
            return redirect()->route('admin.menu.index')->with('success', 'Menu berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.menu.index')->with('error', 'Gagal menghapus menu');
        }
    }
    
    public function reservationsIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $reservations = Reservation::latest()->get();
        } catch (\Exception $e) {
            $reservations = collect([]);
        }
        
        return view('admin.reservations.index', compact('reservations'));
    }
    
    public function reservationUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
        ]);
        
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->update(['status' => $request->status]);
            return redirect()->route('admin.reservations.index')->with('success', 'Status reservasi berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui reservasi');
        }
    }
    
    public function reservationDestroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->delete();
            return redirect()->route('admin.reservations.index')->with('success', 'Reservasi berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.reservations.index')->with('error', 'Gagal menghapus reservasi');
        }
    }
    
    public function galleryIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $galleries = Gallery::latest()->get();
        } catch (\Exception $e) {
            $galleries = collect([]);
        }
        
        return view('admin.gallery.index', compact('galleries'));
    }
    
    public function galleryStore(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'category' => 'required|in:food,facility,event,interior',
        ]);
        
        try {
            // For now, just show success message
            return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil ditambahkan (demo mode)');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan gambar');
        }
    }
    
    public function galleryDestroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();
            return redirect()->route('admin.gallery.index')->with('success', 'Gambar berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.gallery.index')->with('error', 'Gagal menghapus gambar');
        }
    }
    
    public function branchesIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $branches = Branch::latest()->get();
        } catch (\Exception $e) {
            $branches = collect([]);
        }
        
        return view('admin.branches.index', compact('branches'));
    }
    
    public function branchStore(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'opening_hours' => 'nullable|string',
        ]);
        
        try {
            Branch::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'map_link' => $request->map_link,
                'opening_hours' => $request->opening_hours,
                'is_active' => $request->is_active ?? true,
            ]);
            
            return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan cabang');
        }
    }
    
    public function branchUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'opening_hours' => 'nullable|string',
        ]);
        
        try {
            $branch = Branch::findOrFail($id);
            $branch->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'map_link' => $request->map_link,
                'opening_hours' => $request->opening_hours,
                'is_active' => $request->is_active ?? true,
            ]);
            
            return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui cabang');
        }
    }
    
    public function branchDestroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $branch = Branch::findOrFail($id);
            $branch->delete();
            return redirect()->route('admin.branches.index')->with('success', 'Cabang berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.branches.index')->with('error', 'Gagal menghapus cabang');
        }
    }
    
    public function usersIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $users = User::where('role', 'user')->latest()->get();
        } catch (\Exception $e) {
            $users = collect([]);
        }
        
        return view('admin.users.index', compact('users'));
    }
    
    public function userUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
        ]);
        
        try {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            
            return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui pengguna');
        }
    }
    
    public function reviewsIndex()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $reviews = Review::latest()->get();
        } catch (\Exception $e) {
            $reviews = collect([]);
        }
        
        return view('admin.reviews.index', compact('reviews'));
    }
    
    public function reviewUpdate(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        $request->validate([
            'is_approved' => 'required|boolean',
        ]);
        
        try {
            $review = Review::findOrFail($id);
            $review->update(['is_approved' => $request->is_approved]);
            return redirect()->route('admin.reviews.index')->with('success', 'Status review berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui review');
        }
    }
    
    public function reviewDestroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Akses ditolak.');
        }
        
        try {
            $review = Review::findOrFail($id);
            $review->delete();
            return redirect()->route('admin.reviews.index')->with('success', 'Review berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.reviews.index')->with('error', 'Gagal menghapus review');
        }
    }
}