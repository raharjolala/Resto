<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Branch;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * Show the reservation form
     */
    public function create()
    {
        try {
            // Get settings from Page model (contact page)
            $contactPage = Page::where('slug', 'contact')->first();
            
            // Jika halaman contact tidak ditemukan, buat default settings
            if (!$contactPage) {
                $settings = [
                    'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
                    'phone' => '089699071599',
                    'email' => 'info@jossgandos.com',
                    'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
                    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
                    'whatsapp_admin_1' => '6289699071599',
                    'whatsapp_admin_1_name' => 'Admin 1',
                    'whatsapp_admin_2' => '6289532682495',
                    'whatsapp_admin_2_name' => 'Admin 2',
                    'delivery_gofood' => '#',
                    'delivery_grabfood' => '#',
                    'facebook_url' => '#',
                    'instagram_url' => '#',
                    'twitter_url' => '#',
                    'linkedin_url' => '#',
                    'tiktok_url' => '#',
                    'youtube_url' => '#',
                    'social_media' => [
                        'facebook' => '#',
                        'instagram' => '#',
                        'twitter' => '#',
                        'linkedin' => '#',
                        'tiktok' => '#',
                        'youtube' => '#',
                    ]
                ];
            } else {
                $settings = $contactPage->content;
                
                // Pastikan social_media array ada
                if (!isset($settings['social_media'])) {
                    $settings['social_media'] = [
                        'facebook' => $settings['facebook_url'] ?? '#',
                        'instagram' => $settings['instagram_url'] ?? '#',
                        'twitter' => $settings['twitter_url'] ?? '#',
                        'linkedin' => $settings['linkedin_url'] ?? '#',
                        'tiktok' => $settings['tiktok_url'] ?? '#',
                        'youtube' => $settings['youtube_url'] ?? '#',
                    ];
                }
            }
            
            // Get branches for dropdown
            $branches = Branch::where('is_active', true)->get();
            
            return view('pages.reservation', compact('settings', 'branches'));
            
        } catch (\Exception $e) {
            Log::error('Error in ReservationController@create: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            // Fallback settings jika terjadi error
            $settings = [
                'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
                'phone' => '089699071599',
                'email' => 'info@jossgandos.com',
                'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
                'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
                'whatsapp_admin_1' => '6289699071599',
                'whatsapp_admin_1_name' => 'Admin 1',
                'whatsapp_admin_2' => '6289532682495',
                'whatsapp_admin_2_name' => 'Admin 2',
                'delivery_gofood' => '#',
                'delivery_grabfood' => '#',
                'social_media' => [
                    'facebook' => '#',
                    'instagram' => '#',
                    'twitter' => '#',
                    'linkedin' => '#',
                    'tiktok' => '#',
                    'youtube' => '#',
                ]
            ];
            
            $branches = Branch::where('is_active', true)->get();
            
            return view('pages.reservation', compact('settings', 'branches'));
        }
    }

    /**
     * Store a new reservation - DENGAN DEBUGGING LENGKAP DAN PERBAIKAN NAMA FIELD
     */
    public function store(Request $request)
    {
        // LOG SEMUA DATA YANG DITERIMA
        Log::info('========== RESERVATION STORE START ==========');
        Log::info('Request method: ' . $request->method());
        Log::info('Request URL: ' . $request->fullUrl());
        Log::info('Request data: ', $request->all());
        
        // Validate request - PERBAIKAN VALIDASI SESUAI DENGAN NAMA FIELD DI FORM
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'guests' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'specialRequests' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed: ', $validator->errors()->toArray());
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Cek apakah tabel reservations ada
            try {
                $tableExists = \Schema::hasTable('reservations');
                Log::info('Table reservations exists: ' . ($tableExists ? 'Yes' : 'No'));
                
                if (!$tableExists) {
                    throw new \Exception('Table reservations does not exist. Please run migrations.');
                }
            } catch (\Exception $e) {
                Log::error('Error checking table: ' . $e->getMessage());
                throw $e;
            }
            
            // Generate unique reservation code
            $reservationCode = Reservation::generateReservationCode();
            Log::info('Generated reservation code: ' . $reservationCode);
            
            // Siapkan data untuk create - SESUAIKAN DENGAN NAMA KOLOM DI DATABASE
            $data = [
                'customer_name' => $request->name,          // form name -> customer_name
                'email' => $request->email,                  // form email -> email
                'phone' => $request->phone,                   // form phone -> phone
                'reservation_date' => $request->date,        // form date -> reservation_date
                'reservation_time' => $request->time,        // form time -> reservation_time
                'guest_count' => $request->guests,           // form guests -> guest_count
                'special_requests' => $request->specialRequests, // form specialRequests -> special_requests
                'status' => 'pending',
                'reservation_code' => $reservationCode
            ];
            
            // Tambahkan branch_id jika ada di request
            if ($request->has('branch_id') && !empty($request->branch_id)) {
                $data['branch_id'] = $request->branch_id;
            }
            
            Log::info('Data to be inserted: ', $data);
            
            // Create reservation
            $reservation = Reservation::create($data);
            
            Log::info('Reservation created successfully with ID: ' . $reservation->id);
            Log::info('Reservation data saved: ', $reservation->toArray());

            // Log untuk memastikan special_requests tersimpan
            Log::info('Special requests saved: ' . ($reservation->special_requests ?? 'null'));

            Log::info('========== RESERVATION STORE END (SUCCESS) ==========');

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reservasi berhasil! Silakan cek email Anda untuk konfirmasi.',
                    'data' => [
                        'reservation_code' => $reservationCode,
                        'reservation' => $reservation
                    ]
                ]);
            }

            return redirect()->route('reservation.create')
                ->with('success', 'Reservasi berhasil! Kode reservasi Anda: ' . $reservationCode);

        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error in ReservationController@store: ' . $e->getMessage());
            Log::error('SQL: ' . $e->getSql());
            Log::error('Bindings: ', $e->getBindings());
            Log::error($e->getTraceAsString());
            
            $errorMessage = 'Terjadi kesalahan database: ' . $e->getMessage();
            
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan database. Silakan coba lagi.'
                ], 500);
            }

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan database. Silakan coba lagi.')
                ->withInput();
                
        } catch (\Exception $e) {
            Log::error('Error in ReservationController@store: ' . $e->getMessage());
            Log::error('File: ' . $e->getFile());
            Log::error('Line: ' . $e->getLine());
            Log::error($e->getTraceAsString());
            
            Log::info('========== RESERVATION STORE END (ERROR) ==========');
            
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