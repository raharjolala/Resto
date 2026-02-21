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
        // Ambil data dari tabel pages untuk reservasi
        $page = Page::where('slug', 'reservation')->first();
        
        // Default content for reservation page
        $defaultContent = [
            'hero_subtitle' => 'RESERVASI ONLINE',
            'hero_title_line1' => 'Pesan Meja',
            'hero_title_line2' => 'Untuk Momen',
            'hero_title_line3' => 'Spesial Anda',
            'hero_description' => 'Pastikan tempat duduk terbaik untuk acara keluarga, pertemuan bisnis, atau momen romantis bersama orang tersayang di Joss Gandos.',
            'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
            'phone' => '(021) 1234-5678',
            'email' => 'info@jossgandos.com',
            'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
            'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
            'whatsapp_admin_1' => '6289699071599',
            'whatsapp_admin_1_name' => 'Admin 1',
            'whatsapp_admin_2' => '6289532682495',
            'whatsapp_admin_2_name' => 'Admin 2',
            'delivery_gofood' => 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17',
            'delivery_grabfood' => 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d',
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
        $content = $page ? array_merge($defaultContent, $page->content ?? []) : $defaultContent;

        $branches = Branch::where('is_active', true)->get();
        
        return view('pages.reservation', compact('content', 'branches'));
    }

    /**
     * Store a new reservation
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'guests' => 'required',
            'specialRequests' => 'nullable|string',
        ]);

        try {
            // Konversi guests ke integer jika bukan range
            $guestCount = $request->guests;
            if (strpos($request->guests, '-') !== false || strpos($request->guests, '+') !== false) {
                // Jika range (9-12 atau 13+), simpan sebagai string
                $guestCount = $request->guests;
            } else {
                // Jika angka biasa, konversi ke integer
                $guestCount = (int) $request->guests;
            }

            // Simpan reservasi - mapping form fields to database columns
            $reservation = Reservation::create([
                'customer_name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'reservation_date' => $request->date,
                'reservation_time' => $request->time,
                'guest_count' => $guestCount,
                'special_request' => $request->specialRequests,
                'status' => 'pending',
            ]);
            
            // Log success
            Log::info('Reservation created successfully', ['id' => $reservation->id]);
            
            // Generate reservation code
            $reservationCode = 'JOSS-' . strtoupper(substr(md5($reservation->id . time()), 0, 6));
            
            // Return JSON response untuk AJAX request
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reservasi berhasil! Kami akan menghubungi Anda untuk konfirmasi.',
                    'data' => [
                        'reservation_code' => $reservationCode,
                        'name' => $reservation->customer_name,
                        'email' => $reservation->email,
                        'date' => $reservation->reservation_date,
                        'time' => $reservation->reservation_time,
                        'guests' => $reservation->guest_count,
                    ]
                ]);
            }
            
            // Redirect response untuk form biasa
            return redirect()->back()->with('success', 'Reservasi berhasil! Kami akan menghubungi Anda untuk konfirmasi.');
            
        } catch (\Exception $e) {
            Log::error('Reservation error: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson()) {
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