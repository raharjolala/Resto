<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * Show the reservation form
     */
    public function create()
    {
        $branches = Branch::where('is_active', true)->get();
        return view('pages.reservation', compact('branches'));
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

            // Simpan reservasi - WITHOUT branch_id
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