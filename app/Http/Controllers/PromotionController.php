<?php
// app/Http/Controllers/Admin/PromotionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PromotionController extends Controller
{
    /**
     * Display a listing of promotions.
     */
    public function index()
    {
        try {
            $promotions = Promotion::orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get();
                
            return view('admin.promotions.index', compact('promotions'));
            
        } catch (\Exception $e) {
            Log::error('Error in PromotionController@index: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new promotion.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created promotion in storage.
     */
    public function store(Request $request)
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
     * Show the form for editing the specified promotion.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified promotion in storage.
     */
    public function update(Request $request, Promotion $promotion)
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
     * Remove the specified promotion from storage.
     */
    public function destroy(Promotion $promotion)
    {
        try {
            $promotion->delete();
            
            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi berhasil dihapus!');
                
        } catch (\Exception $e) {
            Log::error('Error deleting promotion: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}