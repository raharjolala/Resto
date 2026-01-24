<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Show form to edit about page (Admin)
     */
    public function editAbout()
    {
        try {
            // Cari page berdasarkan slug (paling aman)
            $page = Page::where('slug', 'tentang-kami')->first();
            
            // Jika tidak ditemukan, buat baru TANPA kolom is_active dan name
            if (!$page) {
                Log::info('Creating default about page without is_active and name');
                
                $page = Page::create([
                    'slug' => 'tentang-kami',
                    'title' => 'Tentang Kami - JOSS GANDOS',
                    'content' => json_encode([
                        'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat dengan bahan-bahan berkualitas tinggi.',
                        'history' => 'Didirikan pada tahun 2017, kami telah melayani pelanggan dengan penuh dedikasi.',
                        'vision' => 'Menjadi restoran terbaik di kota ini.',
                        'mission' => 'Menyajikan makanan berkualitas dengan pelayanan terbaik.',
                        'image' => null
                    ]),
                    'meta_title' => 'Tentang Kami - JOSS GANDOS',
                    'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan nilai-nilai perusahaan',
                ]);
            }
            
            // Decode content jika masih JSON string
            if (is_string($page->content)) {
                $page->content = json_decode($page->content, true);
            }
            
            return view('admin.pages.about', compact('page'));
            
        } catch (\Exception $e) {
            Log::error('Error in editAbout: ' . $e->getMessage());
            
            // Fallback data
            $page = (object) [
                'id' => 1,
                'slug' => 'tentang-kami',
                'title' => 'Tentang Kami - JOSS GANDOS',
                'meta_title' => 'Tentang Kami - JOSS GANDOS',
                'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi',
                'content' => [
                    'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat dengan bahan-bahan berkualitas tinggi.',
                    'history' => 'Didirikan pada tahun 2017, kami telah melayani pelanggan dengan penuh dedikasi.',
                    'vision' => 'Menjadi restoran terbaik di kota ini.',
                    'mission' => 'Menyajikan makanan berkualitas dengan pelayanan terbaik.',
                    'image' => null
                ],
            ];
            
            return view('admin.pages.about', compact('page'))
                ->with('warning', 'Menggunakan data fallback: ' . $e->getMessage());
        }
    }

    /**
     * Update about page (Admin) - SIMPLIFIED
     */
    public function updateAbout(Request $request)
    {
        // Validasi
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'history' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);
        
        try {
            DB::beginTransaction();
            
            // Find page by slug
            $page = Page::where('slug', 'tentang-kami')->first();
            
            if (!$page) {
                // Create new page with minimal fields
                $page = new Page();
                $page->slug = 'tentang-kami';
            }
            
            // Update fields (hanya yang pasti ada)
            $page->title = $request->title;
            $page->meta_title = $request->meta_title;
            $page->meta_description = $request->meta_description;
            
            // Prepare content
            $content = is_array($page->content) ? $page->content : [];
            $content['description'] = $request->description;
            $content['history'] = $request->history;
            $content['vision'] = $request->vision;
            $content['mission'] = $request->mission;
            
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if (isset($content['image']) && $content['image']) {
                    Storage::delete('public/pages/' . $content['image']);
                }
                
                // Upload new image
                $imageName = 'about-' . time() . '.' . $request->image->extension();
                $request->image->storeAs('public/pages', $imageName);
                $content['image'] = $imageName;
            }
            
            $page->content = $content;
            $page->save();
            
            DB::commit();
            
            return redirect()->route('admin.pages.about.edit')
                ->with('success', 'Halaman about berhasil diperbarui!');
                
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating about page: ' . $e->getMessage());
            
            return redirect()->route('admin.pages.about.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display about page for frontend
     */
    public function indexAbout()
    {
        try {
            $page = Page::where('slug', 'tentang-kami')->first();
            
            if (!$page) {
                $content = [
                    'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat.',
                    'history' => 'Didirikan pada tahun 2017.',
                    'vision' => 'Menjadi restoran terbaik.',
                    'mission' => 'Menyajikan makanan berkualitas.',
                    'image' => null
                ];
            } else {
                $content = is_array($page->content) ? $page->content : json_decode($page->content, true);
            }
            
            $branchCount = Branch::count() ?: 2;
            
            return view('pages.about', compact('page', 'content', 'branchCount'));
            
        } catch (\Exception $e) {
            Log::error('Error in indexAbout: ' . $e->getMessage());
            
            $content = [
                'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat.',
                'history' => 'Didirikan pada tahun 2017.',
                'vision' => 'Menjadi restoran terbaik.',
                'mission' => 'Menyajikan makanan berkualitas.',
                'image' => null
            ];
            
            return view('pages.about', compact('content'));
        }
    }
}