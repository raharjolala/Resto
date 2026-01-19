<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    // Edit Home Page
    public function editHome()
    {
        // Cek apakah tabel pages ada
        try {
            $page = Page::where('name', 'home')->first();
            
            if (!$page) {
                // Buat halaman home default
                $page = Page::create([
                    'name' => 'home',
                    'title' => 'Selamat Datang di JOSS GANDOS',
                    'content' => json_encode([
                        'hero_subtitle' => 'Nikmati Berbagai Sajian Kuliner Lezat dengan Suasana yang Nyaman dan Ramah di Joss Gandos.',
                        'features' => [
                            ['title' => 'Makanan Lezat', 'description' => 'Hidangan berkualitas tinggi'],
                            ['title' => 'Pelayanan Ramah', 'description' => 'Staff profesional dan ramah'],
                            ['title' => 'Suasana Nyaman', 'description' => 'Tempat yang cozy untuk bersantai']
                        ]
                    ]),
                    'meta_description' => 'JOSS GANDOS - Restoran dan Cafe dengan makanan lezat dan suasana nyaman',
                    'meta_keywords' => 'restoran, cafe, makanan, minuman, joss gandos',
                    'is_active' => true
                ]);
            }
            
            return view('admin.pages.home', compact('page'));
            
        } catch (\Exception $e) {
            // Jika tabel tidak ada, buat dummy data
            $page = (object) [
                'name' => 'home',
                'title' => 'Selamat Datang di JOSS GANDOS',
                'content' => json_encode([
                    'hero_subtitle' => 'Nikmati Berbagai Sajian Kuliner Lezat dengan Suasana yang Nyaman dan Ramah di Joss Gandos.',
                    'features' => [
                        ['title' => 'Makanan Lezat', 'description' => 'Hidangan berkualitas tinggi'],
                        ['title' => 'Pelayanan Ramah', 'description' => 'Staff profesional dan ramah'],
                        ['title' => 'Suasana Nyaman', 'description' => 'Tempat yang cozy untuk bersantai']
                    ]
                ]),
            ];
            
            return view('admin.pages.home', compact('page'));
        }
    }
    
    public function updateHome(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:500',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'feature_title_1' => 'nullable|string|max:100',
            'feature_description_1' => 'nullable|string|max:200',
            'feature_title_2' => 'nullable|string|max:100',
            'feature_description_2' => 'nullable|string|max:200',
            'feature_title_3' => 'nullable|string|max:100',
            'feature_description_3' => 'nullable|string|max:200',
        ]);
        
        try {
            $page = Page::where('name', 'home')->first();
            
            if (!$page) {
                $page = new Page();
                $page->name = 'home';
            }
            
            $page->title = $request->title;
            
            // Prepare content
            $content = json_decode($page->content, true) ?? [];
            $content['hero_subtitle'] = $request->hero_subtitle;
            
            // Handle image upload
            if ($request->hasFile('hero_image')) {
                // Delete old image if exists
                if (isset($content['hero_image']) && $content['hero_image']) {
                    Storage::delete('public/pages/' . $content['hero_image']);
                }
                
                $imageName = time() . '.' . $request->hero_image->extension();
                $request->hero_image->storeAs('public/pages', $imageName);
                $content['hero_image'] = $imageName;
            }
            
            // Update features
            $features = [];
            for ($i = 1; $i <= 3; $i++) {
                if ($request->{"feature_title_$i"}) {
                    $features[] = [
                        'title' => $request->{"feature_title_$i"},
                        'description' => $request->{"feature_description_$i"}
                    ];
                }
            }
            $content['features'] = $features;
            
            $page->content = json_encode($content);
            $page->save();
            
            return redirect()->route('admin.pages.home.edit')
                ->with('success', 'Halaman home berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.home.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    // Edit About Page
    public function editAbout()
    {
        try {
            $page = Page::where('name', 'about')->first();
            
            if (!$page) {
                $page = Page::create([
                    'name' => 'about',
                    'title' => 'Tentang JOSS GANDOS',
                    'content' => json_encode([
                        'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat dengan bahan-bahan berkualitas tinggi.',
                        'history' => 'Didirikan pada tahun 2010, kami telah melayani pelanggan dengan penuh dedikasi.',
                        'vision' => 'Menjadi restoran terbaik di kota ini.',
                        'mission' => 'Menyajikan makanan berkualitas dengan pelayanan terbaik.',
                        'values' => [
                            ['title' => 'Kualitas', 'description' => 'Mengutamakan kualitas bahan baku dan proses pengolahan terbaik'],
                            ['title' => 'Kejujuran', 'description' => 'Berkomitmen pada kejujuran dalam setiap pelayanan dan transaksi'],
                            ['title' => 'Kolaborasi', 'description' => 'Bekerja sama untuk mencapai hasil terbaik bagi semua pihak']
                        ]
                    ]),
                    'meta_description' => 'Tentang JOSS GANDOS - Sejarah, visi, misi, dan nilai-nilai perusahaan',
                    'meta_keywords' => 'tentang kami, sejarah, visi misi, nilai perusahaan',
                    'is_active' => true
                ]);
            }
            
            return view('admin.pages.about', compact('page'));
            
        } catch (\Exception $e) {
            $page = (object) [
                'name' => 'about',
                'title' => 'Tentang JOSS GANDOS',
                'content' => json_encode([
                    'description' => 'JOSS GANDOS adalah restoran yang menyajikan berbagai hidangan lezat dengan bahan-bahan berkualitas tinggi.',
                    'history' => 'Didirikan pada tahun 2010, kami telah melayani pelanggan dengan penuh dedikasi.',
                    'vision' => 'Menjadi restoran terbaik di kota ini.',
                    'mission' => 'Menyajikan makanan berkualitas dengan pelayanan terbaik.',
                ]),
            ];
            
            return view('admin.pages.about', compact('page'));
        }
    }
    
    public function updateAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'history' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        try {
            $page = Page::where('name', 'about')->first();
            
            if (!$page) {
                $page = new Page();
                $page->name = 'about';
            }
            
            $page->title = $request->title;
            
            $content = json_decode($page->content, true) ?? [];
            $content['description'] = $request->description;
            $content['history'] = $request->history;
            $content['vision'] = $request->vision;
            $content['mission'] = $request->mission;
            
            if ($request->hasFile('image')) {
                if (isset($content['image']) && $content['image']) {
                    Storage::delete('public/pages/' . $content['image']);
                }
                
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/pages', $imageName);
                $content['image'] = $imageName;
            }
            
            $page->content = json_encode($content);
            $page->save();
            
            return redirect()->route('admin.pages.about.edit')
                ->with('success', 'Halaman about berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.about.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    // Edit Contact Page
    public function editContact()
    {
        try {
            $page = Page::where('name', 'contact')->first();
            
            if (!$page) {
                $page = Page::create([
                    'name' => 'contact',
                    'title' => 'Hubungi Kami',
                    'content' => json_encode([
                        'description' => 'Silakan hubungi kami untuk reservasi atau pertanyaan lainnya.',
                        'address' => 'JL Baye Kuliner No. 123, Jakarta, Indonesia',
                        'phone' => '(021) 1234-5678',
                        'email' => 'info@jossgandos.com',
                        'hours' => 'Setiap Hari: 10:00 - 22:00 WIB',
                        'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506864!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1641914256999!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
                    ]),
                    'meta_description' => 'Hubungi JOSS GANDOS untuk reservasi atau informasi lebih lanjut',
                    'meta_keywords' => 'kontak, alamat, telepon, email, jam operasional',
                    'is_active' => true
                ]);
            }
            
            return view('admin.pages.contact', compact('page'));
            
        } catch (\Exception $e) {
            $page = (object) [
                'name' => 'contact',
                'title' => 'Hubungi Kami',
                'content' => json_encode([
                    'description' => 'Silakan hubungi kami untuk reservasi atau pertanyaan lainnya.',
                    'address' => 'JL Baye Kuliner No. 123, Jakarta, Indonesia',
                    'phone' => '(021) 1234-5678',
                    'email' => 'info@jossgandos.com',
                    'hours' => 'Setiap Hari: 10:00 - 22:00 WIB',
                ]),
            ];
            
            return view('admin.pages.contact', compact('page'));
        }
    }
    
    public function updateContact(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'hours' => 'required|string|max:100',
            'map_embed' => 'nullable|string',
        ]);
        
        try {
            $page = Page::where('name', 'contact')->first();
            
            if (!$page) {
                $page = new Page();
                $page->name = 'contact';
            }
            
            $page->title = $request->title;
            
            $content = json_decode($page->content, true) ?? [];
            $content['description'] = $request->description;
            $content['address'] = $request->address;
            $content['phone'] = $request->phone;
            $content['email'] = $request->email;
            $content['hours'] = $request->hours;
            $content['map_embed'] = $request->map_embed;
            
            $page->content = json_encode($content);
            $page->save();
            
            return redirect()->route('admin.pages.contact.edit')
                ->with('success', 'Halaman kontak berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.pages.contact.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}