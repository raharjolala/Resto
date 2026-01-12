<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Menu Categories
        $categories = [
            ['name' => 'Makanan Utama', 'description' => 'Hidangan utama khas Indonesia', 'sort_order' => 1],
            ['name' => 'Minuman', 'description' => 'Minuman segar dan sehat', 'sort_order' => 2],
            ['name' => 'Snack & Appetizer', 'description' => 'Cemilan dan pembuka selera', 'sort_order' => 3],
            ['name' => 'Dessert', 'description' => 'Hidangan penutup manis', 'sort_order' => 4],
        ];

        foreach ($categories as $category) {
            MenuCategory::create($category);
        }

        // Menu Items
        $menuItems = [
            [
                'category_id' => 1,
                'name' => 'Nasi Goreng Spesial',
                'description' => 'Nasi goreng dengan campuran daging ayam, udang, telur, dan sayuran segar',
                'price' => 25000,
                'image' => 'nasi-goreng.jpg',
                'is_featured' => true,
                'is_available' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => 1,
                'name' => 'Ayam Penyet',
                'description' => 'Ayam goreng krispi dengan sambal pedas khas dan lalapan segar',
                'price' => 25000,
                'image' => 'ayam-penyet.jpg',
                'is_featured' => true,
                'is_available' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => 1,
                'name' => 'Sate Ayam',
                'description' => 'Sate ayam dengan bumbu kacang khas dan lontong',
                'price' => 25000,
                'image' => 'sate-ayam.jpg',
                'is_featured' => true,
                'is_available' => true,
                'sort_order' => 3,
            ],
            [
                'category_id' => 1,
                'name' => 'Mie Goreng',
                'description' => 'Mie goreng dengan tambahan seafood dan sayuran',
                'price' => 25000,
                'image' => 'mie-goreng.jpg',
                'is_featured' => true,
                'is_available' => true,
                'sort_order' => 4,
            ],
            [
                'category_id' => 2,
                'name' => 'Es Teh Manis',
                'description' => 'Es teh dengan gula pasir khas Indonesia',
                'price' => 5000,
                'image' => 'es-teh.jpg',
                'is_featured' => false,
                'is_available' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => 2,
                'name' => 'Es Jeruk',
                'description' => 'Jeruk segar dengan es batu',
                'price' => 8000,
                'image' => 'es-jeruk.jpg',
                'is_featured' => false,
                'is_available' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}