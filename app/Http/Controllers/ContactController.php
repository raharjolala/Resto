<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $branches = Branch::where('is_active', true)->get();
        return view('pages.contact', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Here you can save to database or send email
        // For now, just redirect with success message
        return redirect()->back()->with('success', 'Pesan Anda telah terkirim! Kami akan menghubungi Anda segera.');
    }
}