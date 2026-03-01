<?php
// database/seeders/MenuCategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Main Course',
                'description' => 'Hidangan utama pilihan dengan cita rasa istimewa. Dari nasi goreng spesial hingga aneka olahan ayam dan seafood.',
                'sort_order' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Appetizer',
                'description' => 'Hidangan pembuka yang menggugah selera. Cocok untuk memulai santapan Anda.',
                'sort_order' => 2,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dessert',
                'description' => 'Pencuci mulut manis untuk melengkapi santapan Anda. Berbagai pilihan dessert yang lezat.',
                'sort_order' => 3,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Drink',
                'description' => 'Minuman segar dan hangat untuk menemani hidangan. Dari es teh manis hingga kopi spesial.',
                'sort_order' => 4,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('menu_categories')->insert($categories);
        
        $this->command->info('✅ Menu categories seeded successfully!');
        $this->command->info('📋 Categories added: Main Course, Appetizer, Dessert, Drink');
    }
}