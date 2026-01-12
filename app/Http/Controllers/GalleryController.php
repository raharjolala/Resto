<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        // For now, return a simple view without database
        return view('pages.gallery');
    }
}