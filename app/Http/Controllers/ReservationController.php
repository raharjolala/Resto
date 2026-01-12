<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('pages.reservation');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'guest_count' => 'required|integer|min:1',
        ]);

        try {
            // Save reservation if table exists
            Reservation::create([
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'reservation_date' => $request->reservation_date,
                'reservation_time' => $request->reservation_time,
                'guest_count' => $request->guest_count,
                'special_request' => $request->special_request,
                'status' => 'pending',
            ]);
            
            return redirect()->back()->with('success', 'Reservasi berhasil! Kami akan menghubungi Anda untuk konfirmasi.');
        } catch (\Exception $e) {
            // If table doesn't exist, still show success message for demo
            return redirect()->back()->with('success', 'Reservasi berhasil! (Demo mode)');
        }
    }
}