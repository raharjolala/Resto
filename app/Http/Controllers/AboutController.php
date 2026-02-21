<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            $branchCount = Branch::count();
            
            // Ambil data about page dari database
            $page = Page::where('slug', 'about')->first();
            
            // Jika tidak ada data, tampilkan halaman dengan data default dari view
            if (!$page) {
                return view('pages.about', compact('branchCount'));
            }
            
            return view('pages.about', compact('branchCount', 'page'));
            
        } catch (\Exception $e) {
            $branchCount = 2; // Default value
            return view('pages.about', compact('branchCount'));
        }
    }
}