<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Appetizers', 'description' => 'Start your meal right'],
            ['name' => 'Main Course', 'description' => 'Hearty main dishes'],
            ['name' => 'Desserts', 'description' => 'Sweet endings'],
            ['name' => 'Beverages', 'description' => 'Refreshing drinks'],
        ];

        foreach ($categories as $category) {
            $categoryId = DB::table('categories')->insertGetId($category);
            
            // Add menu items for each category
            $items = $this->getMenuItemsByCategory($category['name']);
            
            foreach ($items as $item) {
                DB::table('menu_items')->insert([
                    'category_id' => $categoryId,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'image' => $item['image'],
                    'is_available' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function getMenuItemsByCategory($category)
    {
        $menu = [
            'Appetizers' => [
                [
                    'name' => 'Bruschetta',
                    'description' => 'Toasted bread with tomatoes and basil',
                    'price' => 8.99,
                    'image' => 'appetizer1.jpg'
                ],
                [
                    'name' => 'Spring Rolls',
                    'description' => 'Vegetable spring rolls with sweet chili',
                    'price' => 9.99,
                    'image' => 'appetizer2.jpg'
                ],
            ],
            'Main Course' => [
                [
                    'name' => 'Grilled Salmon',
                    'description' => 'Atlantic salmon with lemon butter',
                    'price' => 24.99,
                    'image' => 'main1.jpg'
                ],
                [
                    'name' => 'Beef Steak',
                    'description' => 'Ribeye steak with red wine sauce',
                    'price' => 32.99,
                    'image' => 'main2.jpg'
                ],
            ],
            // Add more categories as needed
        ];

        return $menu[$category] ?? [];
    }
}