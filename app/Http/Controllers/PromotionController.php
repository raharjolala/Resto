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
            
            // Log untuk debugging
            Log::info('Creating new promotion:', [
                'title' => $data['title'],
                'start_date_input' => $request->start_date,
                'end_date_input' => $request->end_date,
                'timezone' => 'Asia/Jakarta (input akan dikonversi ke UTC oleh model)'
            ]);
            
            $promotion = Promotion::create($data);
            
            Log::info('Promotion created successfully:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'start_date_db' => $promotion->getRawStartDateAttribute(),
                'end_date_db' => $promotion->getRawEndDateAttribute(),
                'start_date_accessor' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date_accessor' => $promotion->end_date->format('Y-m-d H:i:s')
            ]);

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
     * Show the form for editing the specified promotion.
     */
    public function edit($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            
            Log::info('Editing promotion:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'start_date' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date' => $promotion->end_date->format('Y-m-d H:i:s'),
                'is_active' => $promotion->is_active
            ]);
            
            return view('admin.promotions.edit', compact('promotion'));
            
        } catch (\Exception $e) {
            Log::error('Error editing promotion: ' . $e->getMessage());
            return redirect()->route('admin.promotions.index')
                ->with('error', 'Promosi tidak ditemukan!');
        }
    }

    /**
     * Update the specified promotion in storage.
     */
    public function update(Request $request, $id)
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
            
            Log::info('Updating promotion:', [
                'id' => $id,
                'old_title' => $promotion->title,
                'new_title' => $data['title'],
                'start_date_input' => $request->start_date,
                'end_date_input' => $request->end_date
            ]);
            
            $promotion->update($data);
            
            // Refresh untuk mendapatkan data terbaru
            $promotion->refresh();
            
            Log::info('Promotion updated successfully:', [
                'id' => $promotion->id,
                'title' => $promotion->title,
                'start_date_db' => $promotion->getRawStartDateAttribute(),
                'end_date_db' => $promotion->getRawEndDateAttribute(),
                'start_date_accessor' => $promotion->start_date->format('Y-m-d H:i:s'),
                'end_date_accessor' => $promotion->end_date->format('Y-m-d H:i:s')
            ]);

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
     * Remove the specified promotion from storage.
     */
    public function destroy($id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            $title = $promotion->title;
            
            Log::info('Deleting promotion:', [
                'id' => $id,
                'title' => $title
            ]);
            
            $promotion->delete();
            
            Log::info('Promotion deleted successfully');
            
            return redirect()->route('admin.promotions.index')
                ->with('success', 'Promosi "' . $title . '" berhasil dihapus!');
                
        } catch (\Exception $e) {
            Log::error('Error deleting promotion: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}