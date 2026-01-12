<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Branch;
use App\Models\Review;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Temporarily use empty collections to avoid errors
        try {
            $featuredItems = MenuItem::where('is_featured', true)
                ->where('is_available', true)
                ->orderBy('sort_order')
                ->limit(4)
                ->get();
        } catch (\Exception $e) {
            $featuredItems = collect([]); // Empty collection
        }

        try {
            $branches = Branch::where('is_active', true)->get();
        } catch (\Exception $e) {
            $branches = collect([]);
        }

        try {
            $reviews = Review::where('is_approved', true)->latest()->limit(3)->get();
        } catch (\Exception $e) {
            $reviews = collect([]);
        }

        try {
            $gallery = Gallery::where('is_active', true)->latest()->limit(6)->get();
        } catch (\Exception $e) {
            $gallery = collect([]);
        }

        return view('pages.home', compact('featuredItems', 'branches', 'reviews', 'gallery'));
    }
}