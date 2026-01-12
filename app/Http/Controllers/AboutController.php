<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        try {
            $branchCount = Branch::count();
        } catch (\Exception $e) {
            $branchCount = 2; // Default value
        }
        
        return view('pages.about', compact('branchCount'));
    }
}