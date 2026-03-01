<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MenuCategorySeeder::class, // Seeder untuk kategori menu
            // Tambahkan seeder lain di bawah ini jika ada
            // UserSeeder::class,
            // MenuItemSeeder::class,
            // PromotionSeeder::class,
            // BranchSeeder::class,
        ]);
        
        $this->command->info('✅ Database seeding completed!');
    }
}