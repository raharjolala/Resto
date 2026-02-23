<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Branch;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Show the reservation form with contact information
     */
    public function create()
    {
        try {
            // Ambil data dari tabel pages untuk contact
            $contactPage = Page::where('slug', 'contact')->first();
            
            // Ambil branches untuk form reservasi
            $branches = Branch::where('is_active', true)->get();
            
            // Default content untuk halaman reservasi
            $defaultContent = [
                // Hero Section
                'hero_subtitle' => 'HUBUNGI KAMI',
                'hero_title_line1' => 'Kami Siap',
                'hero_title_line2' => 'Melayani Dengan',
                'hero_title_line3' => 'Sepenuh Hati',
                'hero_description' => 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                
                // Contact Information
                'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
                'phone' => '(021) 1234-5678',
                'email' => 'info@jossgandos.com',
                'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
                'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
                
                // WhatsApp Admins
                'whatsapp_admin_1' => '6289699071599',
                'whatsapp_admin_1_name' => 'Admin 1',
                'whatsapp_admin_2' => '6289532682495',
                'whatsapp_admin_2_name' => 'Admin 2',
                
                // Delivery Links
                'delivery_gofood' => 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17',
                'delivery_grabfood' => 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d',
                
                // Social Media
                'facebook_url' => '#',
                'instagram_url' => '#',
                'twitter_url' => '#',
                'linkedin_url' => '#',
                'social_media' => [
                    'facebook' => '#',
                    'instagram' => '#',
                    'twitter' => '#',
                    'linkedin' => '#',
                ],
            ];
            
            // Merge content dari database dengan default
            $content = $defaultContent;
            
            if ($contactPage && $contactPage->content) {
                $dbContent = $contactPage->content;
                
                foreach ($defaultContent as $key => $value) {
                    if (isset($dbContent[$key])) {
                        $content[$key] = $dbContent[$key];
                    }
                }
                
                if (isset($dbContent['social_media']) && is_array($dbContent['social_media'])) {
                    $content['social_media'] = array_merge($content['social_media'], $dbContent['social_media']);
                }
            }
            
            Log::info('Reservation page loaded', [
                'has_contact_page' => $contactPage ? 'yes' : 'no',
                'branches_count' => $branches->count()
            ]);
            
            // PERBAIKAN: Gunakan view yang benar
            // Cek apakah file view ada di resources/views/reservation.blade.php
            if (view()->exists('reservation')) {
                return view('reservation', compact('content', 'branches'));
            } 
            // Jika tidak ada, coba cek di folder pages
            elseif (view()->exists('pages.reservation')) {
                return view('pages.reservation', compact('content', 'branches'));
            }
            // Jika masih tidak ada, gunakan view default dari file yang Anda berikan sebelumnya
            else {
                // Tampilkan pesan error yang lebih jelas
                Log::error('View reservation not found');
                return response()->view('errors.404', [
                    'message' => 'Halaman reservasi tidak ditemukan. Silakan hubungi administrator.'
                ], 404);
            }
            
        } catch (\Exception $e) {
            Log::error('Error in ReservationController@create: ' . $e->getMessage());
            
            // Fallback ke error page
            return response()->view('errors.500', [
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a new reservation
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'guests' => 'required',
                'date' => 'required|date|after_or_equal:today',
                'time' => 'required',
                'specialRequests' => 'nullable|string|max:500',
            ]);

            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Validasi gagal',
                        'errors' => $validator->errors()
                    ], 422);
                }
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Generate unique reservation code
            $reservationCode = 'JOSS-' . strtoupper(substr(uniqid(), -6));

            // Prepare guest count
            $guestCount = $request->guests;
            if (in_array($request->guests, ['9-12', '13+'])) {
                $guestCount = $request->guests;
            } else {
                $guestCount = (int) $request->guests;
            }

            // Create reservation
            $reservation = Reservation::create([
                'customer_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'guest_count' => $guestCount,
                'reservation_date' => $request->date,
                'reservation_time' => $request->time,
                'special_requests' => $request->specialRequests,
                'status' => 'pending',
                'reservation_code' => $reservationCode,
            ]);

            Log::info('Reservation created successfully', ['id' => $reservation->id, 'code' => $reservationCode]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reservasi berhasil! Kami akan menghubungi Anda untuk konfirmasi.',
                    'data' => [
                        'reservation_code' => $reservationCode,
                        'name' => $reservation->customer_name,
                        'date' => $reservation->reservation_date,
                        'time' => $reservation->reservation_time,
                    ]
                ]);
            }

            return redirect()->route('reservation.create')
                ->with('success', 'Reservasi berhasil! Kami akan menghubungi Anda untuk konfirmasi.');

        } catch (\Exception $e) {
            Log::error('Error creating reservation: ' . $e->getMessage());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
}