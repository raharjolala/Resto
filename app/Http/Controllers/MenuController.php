<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('sort_order');
        }])->where('is_active', true)->orderBy('sort_order')->get();

        return view('pages.menu', compact('categories'));
    }
}