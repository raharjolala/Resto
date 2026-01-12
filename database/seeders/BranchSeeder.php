<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        Branch::create([
            'name' => 'JOSS GANDOS - Jakarta Pusat',
            'address' => 'JL Baye Kuliner No. 123, Jakarta, Indonesia',
            'phone' => '(021) 1234-5678',
            'email' => 'jakarta@jossgandos.com',
            'map_link' => 'https://maps.google.com/?q=JOSS+GANDOS+Jakarta',
            'opening_hours' => 'Senin - Minggu: 10:00 - 22:00',
            'is_active' => true,
        ]);

        Branch::create([
            'name' => 'JOSS GANDOS - Bandung',
            'address' => 'JL Braga No. 45, Bandung, Jawa Barat',
            'phone' => '(022) 8765-4321',
            'email' => 'bandung@jossgandos.com',
            'map_link' => 'https://maps.google.com/?q=JOSS+GANDOS+Bandung',
            'opening_hours' => 'Senin - Minggu: 10:00 - 22:00',
            'is_active' => true,
        ]);
    }
}