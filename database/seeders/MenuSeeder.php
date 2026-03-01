<?php
// database/seeders/MenuSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama jika ada
        DB::table('menu_items')->truncate();
        DB::table('menu_categories')->truncate();
        
        // Buat kategori dengan sort_order yang benar
        $categories = [
            [
                'name' => 'Main Course',
                'description' => 'Hidangan utama istimewa dengan cita rasa autentik',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Appetizer',
                'description' => 'Makanan pembuka yang menggugah selera',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Dessert',
                'description' => 'Hidangan penutup manis yang sempurna',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Drink',
                'description' => 'Minuman segar untuk menemani santap Anda',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($categories as $categoryData) {
            $categoryId = DB::table('menu_categories')->insertGetId($categoryData);
            
            // Add menu items for each category
            $items = $this->getMenuItemsByCategory($categoryData['name'], $categoryId);
            
            foreach ($items as $item) {
                DB::table('menu_items')->insert($item);
            }
        }
    }

    private function getMenuItemsByCategory($category, $categoryId)
    {
        $menu = [
            'Main Course' => [
                [
                    'category_id' => $categoryId,
                    'name' => 'Rendang Sapi Premium',
                    'description' => 'Daging sapi dimasak 8 jam dengan 27 rempah pilihan khas Padang, empuk dan bumbu meresap',
                    'price' => 45000,
                    'image' => 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Ayam Bakar Taliwang',
                    'description' => 'Ayam bakar dengan bumbu khas Lombok, pedas gurih dengan sambal mentah segar',
                    'price' => 35000,
                    'image' => 'https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Ikan Bakar Jimbaran',
                    'description' => 'Ikan laut segar dibakar dengan bumbu bali, disajikan dengan sambal matah dan lalapan',
                    'price' => 55000,
                    'image' => 'https://images.unsplash.com/photo-1627308595171-d1b5d671a5fe?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Nasi Goreng Kampung',
                    'description' => 'Nasi goreng dengan bumbu tradisional, telur mata sapi, kerupuk, dan acar',
                    'price' => 28000,
                    'image' => 'https://images.unsplash.com/photo-1645177628172-a94c1f96e6e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Sate Ayam Madura',
                    'description' => '10 tusuk sate ayam dengan bumbu kacang spesial, lontong, dan bawang goreng',
                    'price' => 32000,
                    'image' => 'https://images.unsplash.com/photo-1626082927385-6d2db5c4b267?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ],
            'Appetizer' => [
                [
                    'category_id' => $categoryId,
                    'name' => 'Lumpia Semarang',
                    'description' => 'Lumpia rebung dengan daging ayam, disajikan dengan saus manis pedas',
                    'price' => 22000,
                    'image' => 'https://images.unsplash.com/photo-1604908177453-7462950a6a3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Perkedel Jagung',
                    'description' => 'Perkedel jagung manis dengan potongan cabai, gurih dan renyah',
                    'price' => 15000,
                    'image' => 'https://images.unsplash.com/photo-1617694658387-3aaeb1f3b7c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Tahu Telur',
                    'description' => 'Tahu goreng dengan telur, taoge, dan siraman bumbu kacang khas Jawa Timur',
                    'price' => 25000,
                    'image' => 'https://images.unsplash.com/photo-1645112411342-4665a12f48e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Cumi Goreng Tepung',
                    'description' => 'Cumi-cumi segar digoreng tepung krispi, disajikan dengan saus tartar',
                    'price' => 38000,
                    'image' => 'https://images.unsplash.com/photo-1639024471283-03518883512d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ],
            'Dessert' => [
                [
                    'category_id' => $categoryId,
                    'name' => 'Pisang Goreng Keju',
                    'description' => 'Pisang raja digoreng renyah, topping keju cheddar dan meses ceres',
                    'price' => 18000,
                    'image' => 'https://images.unsplash.com/photo-1657479384022-3a52b4b6fc9a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Es Campur',
                    'description' => 'Es serut dengan sirup merah, kelapa muda, alpukat, nangka, cincau, dan susu kental manis',
                    'price' => 22000,
                    'image' => 'https://images.unsplash.com/photo-1625484329842-7a3a2c7c2e9f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Klepon',
                    'description' => 'Kue tradisional dengan isian gula merah, dibalut kelapa parut, 5 pcs',
                    'price' => 15000,
                    'image' => 'https://images.unsplash.com/photo-1605267075437-21e3b6fb5c6d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Bubur Sumsum',
                    'description' => 'Bubur lembut dengan kuah gula merah cair dan santan kental',
                    'price' => 17000,
                    'image' => 'https://images.unsplash.com/photo-1618164435735-412d33e3f8b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ],
            'Drink' => [
                [
                    'category_id' => $categoryId,
                    'name' => 'Es Teh Manis',
                    'description' => 'Teh hitam pilihan dengan gula asli, disajikan dingin dengan es batu',
                    'price' => 8000,
                    'image' => 'https://images.unsplash.com/photo-1556679343-c1306ee5e952?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Jus Alpukat',
                    'description' => 'Jus alpukat segar dengan tambahan susu cokelat dan topping meses',
                    'price' => 18000,
                    'image' => 'https://images.unsplash.com/photo-1622597467836-f3285f2131b6?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 2,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Kopi Tubruk',
                    'description' => 'Kopi asli Indonesia diseduh dengan cara tradisional, mantap dan kental',
                    'price' => 12000,
                    'image' => 'https://images.unsplash.com/photo-1559525839-b184a4e698a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => true,
                    'sort_order' => 3,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Es Kelapa Muda',
                    'description' => 'Kelapa muda segar dengan sirup pandan, es batu, dan daging kelapa',
                    'price' => 20000,
                    'image' => 'https://images.unsplash.com/photo-1581006852262-55d1492a5da3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 4,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'category_id' => $categoryId,
                    'name' => 'Soda Gembira',
                    'description' => 'Soda manis dengan sirup merah dan susu kental manis, segar dan unik',
                    'price' => 15000,
                    'image' => 'https://images.unsplash.com/photo-1572490333292-9c23bb3e4504?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
                    'is_available' => true,
                    'is_featured' => false,
                    'sort_order' => 5,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        ];

        return $menu[$category] ?? [];
    }
}