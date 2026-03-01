<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    /**
     * Display gallery page for public
     */
    public function index()
    {
        try {
            // Ambil semua data gallery dari database
            $galleryItems = Gallery::getActiveItems();
            
            Log::info('GalleryController@index - Total items from DB: ' . $galleryItems->count());
            
            // Jika tidak ada data di database, gunakan data dummy sebagai fallback
            if ($galleryItems->isEmpty()) {
                Log::info('GalleryController@index - No items in DB, using default items');
                $galleryItems = $this->getDefaultGalleryItems();
            }
            
            return view('pages.gallery', compact('galleryItems'));
            
        } catch (\Exception $e) {
            Log::error('Error in GalleryController@index: ' . $e->getMessage());
            
            $galleryItems = $this->getDefaultGalleryItems();
            return view('pages.gallery', compact('galleryItems'));
        }
    }

    /**
     * Display single gallery item
     */
    public function show($id)
    {
        try {
            $item = Gallery::findOrFail($id);
            return view('pages.gallery-detail', compact('item'));
        } catch (\Exception $e) {
            Log::error('Error in GalleryController@show: ' . $e->getMessage());
            return redirect()->route('gallery')->with('error', 'Gambar tidak ditemukan');
        }
    }

    /**
     * Get default gallery items if database is empty
     */
    private function getDefaultGalleryItems()
    {
        return collect([
            (object)[
                'id' => 1,
                'image_path' => 'https://restojossgandos.com/img/menu/gulaikepalaikansalmon-copy-1765340584.JPG',
                'caption' => 'Gulai Kepala Ikan Salmon',
                'category' => 'food',
                'created_at' => now(),
                'description' => 'Menu ikonik Joss Gandos, gulai kepala ikan salmon tanpa santan, kaya rempah'
            ],
            (object)[
                'id' => 2,
                'image_path' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'caption' => 'Suasana Interior Restoran',
                'category' => 'interior',
                'created_at' => now(),
                'description' => 'Suasana nyaman dan modern dengan kapasitas 100 orang'
            ],
            (object)[
                'id' => 3,
                'image_path' => 'https://images.unsplash.com/photo-1544025162-d76694265947?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'caption' => 'Acara Pernikahan',
                'category' => 'event',
                'created_at' => now(),
                'description' => 'Paket catering pernikahan lengkap dengan dekorasi dan pelayanan terbaik'
            ],
            (object)[
                'id' => 4,
                'image_path' => 'https://restojossgandos.com/img/menu/bebekgorengjoss-copy-1765340669.JPG',
                'caption' => 'Bebek Goreng Joss',
                'category' => 'food',
                'created_at' => now(),
                'description' => 'Bebek goreng khas dengan bumbu rempah pilihan'
            ],
            (object)[
                'id' => 5,
                'image_path' => 'https://images.unsplash.com/photo-1559925393-8be0ec4767c8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'caption' => 'Area Makan VIP',
                'category' => 'facility',
                'created_at' => now(),
                'description' => 'Ruang VIP eksklusif dengan AC dan TV untuk gathering keluarga'
            ],
            (object)[
                'id' => 6,
                'image_path' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'caption' => 'Catering Perusahaan',
                'category' => 'event',
                'created_at' => now(),
                'description' => 'Layanan catering untuk acara kantor dan seminar'
            ]
        ]);
    }
}