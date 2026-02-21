<?php
// app/Http/Controllers/Admin/PageContactController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageContactController extends Controller
{
    /**
     * Menampilkan form edit halaman kontak
     */
    public function edit()
    {
        $page = Page::findBySlug('contact');
        
        if (!$page) {
            $page = new Page([
                'slug' => 'contact',
                'title' => 'Kontak Kami',
                'meta_title' => 'Kontak - JOSS GANDOS',
                'meta_description' => 'Hubungi JOSS GANDOS untuk reservasi, catering, atau informasi lainnya. Kami siap melayani Anda',
                'content' => $this->getDefaultContent()
            ]);
        }
        
        return view('admin.pages.contact', compact('page'));
    }

    /**
     * Menyimpan perubahan halaman kontak
     */
    public function update(Request $request)
    {
        try {
            // Validasi data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                
                // Hero Section
                'hero_subtitle' => 'required|string|max:255',
                'hero_title_line1' => 'required|string|max:255',
                'hero_title_line2' => 'required|string|max:255',
                'hero_title_line3' => 'required|string|max:255',
                'hero_description' => 'required|string',
                'hero_image_url' => 'required|url',
                
                // Contact Info
                'address' => 'required|string',
                'phone' => 'required|string|max:50',
                'email' => 'required|email|max:255',
                'hours' => 'required|string|max:255',
                
                // Google Maps
                'map_embed' => 'nullable|string',
                
                // WhatsApp Admin
                'whatsapp_admin_1_name' => 'required|string|max:100',
                'whatsapp_admin_1' => 'required|string|max:20',
                'whatsapp_admin_2_name' => 'required|string|max:100',
                'whatsapp_admin_2' => 'required|string|max:20',
                
                // Delivery Services
                'delivery_gofood' => 'nullable|url',
                'delivery_grabfood' => 'nullable|url',
                
                // Social Media
                'facebook_url' => 'nullable|url',
                'instagram_url' => 'nullable|url',
                'twitter_url' => 'nullable|url',
                'linkedin_url' => 'nullable|url',
            ]);

            // Gabungkan title lines untuk hero_title
            $hero_title = trim($request->hero_title_line1 . ' ' . $request->hero_title_line2 . ' ' . $request->hero_title_line3);

            // Siapkan array content
            $content = [
                // Hero Section
                'hero_subtitle' => $request->hero_subtitle,
                'hero_title' => $hero_title,
                'hero_title_line1' => $request->hero_title_line1,
                'hero_title_line2' => $request->hero_title_line2,
                'hero_title_line3' => $request->hero_title_line3,
                'hero_description' => $request->hero_description,
                'hero_image_url' => $request->hero_image_url,
                
                // Contact Info
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'hours' => $request->hours,
                
                // Google Maps
                'map_embed' => $request->map_embed,
                
                // WhatsApp Admin
                'whatsapp_admin_1_name' => $request->whatsapp_admin_1_name,
                'whatsapp_admin_1' => $request->whatsapp_admin_1,
                'whatsapp_admin_2_name' => $request->whatsapp_admin_2_name,
                'whatsapp_admin_2' => $request->whatsapp_admin_2,
                
                // Delivery Services
                'delivery_gofood' => $request->delivery_gofood,
                'delivery_grabfood' => $request->delivery_grabfood,
                
                // Social Media
                'social_media' => [
                    'facebook' => $request->facebook_url,
                    'instagram' => $request->instagram_url,
                    'twitter' => $request->twitter_url,
                    'linkedin' => $request->linkedin_url,
                ],
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
                'twitter_url' => $request->twitter_url,
                'linkedin_url' => $request->linkedin_url,
            ];

            // Update atau buat halaman baru
            $page = Page::updateOrCreate(
                ['slug' => 'contact'],
                [
                    'title' => $request->title,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'content' => $content,
                ]
            );

            return redirect()->route('admin.pages.contact.edit')
                ->with('success', 'Halaman kontak berhasil diperbarui!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.pages.contact.edit')
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan validasi. Silakan periksa kembali form Anda.');
                
        } catch (\Exception $e) {
            Log::error('Error updating contact page: ' . $e->getMessage());
            return redirect()->route('admin.pages.contact.edit')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Mendapatkan default content untuk halaman kontak
     */
    private function getDefaultContent()
    {
        return [
            // Hero Section
            'hero_subtitle' => 'HUBUNGI KAMI',
            'hero_title' => 'Kami Siap Melayani Dengan Sepenuh Hati',
            'hero_title_line1' => 'Kami Siap',
            'hero_title_line2' => 'Melayani Dengan',
            'hero_title_line3' => 'Sepenuh Hati',
            'hero_description' => 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.',
            'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            
            // Contact Info
            'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
            'phone' => '(021) 1234-5678',
            'email' => 'info@jossgandos.com',
            'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
            
            // Google Maps
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
            
            // WhatsApp Admin
            'whatsapp_admin_1_name' => 'Admin 1',
            'whatsapp_admin_1' => '6289699071599',
            'whatsapp_admin_2_name' => 'Admin 2',
            'whatsapp_admin_2' => '6289532682495',
            
            // Delivery Services
            'delivery_gofood' => 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17',
            'delivery_grabfood' => 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d',
            
            // Social Media
            'social_media' => [
                'facebook' => '#',
                'instagram' => '#',
                'twitter' => '#',
                'linkedin' => '#',
            ],
            'facebook_url' => '#',
            'instagram_url' => '#',
            'twitter_url' => '#',
            'linkedin_url' => '#',
        ];
    }
}