<?php
// database/seeders/ContactPageSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class ContactPageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'contact'],
            [
                'title' => 'Kontak Kami',
                'content' => [
                    'hero_subtitle' => 'HUBUNGI KAMI',
                    'hero_title_line1' => 'Kami Siap',
                    'hero_title_line2' => 'Melayani Dengan',
                    'hero_title_line3' => 'Sepenuh Hati',
                    'hero_description' => 'Ada pertanyaan tentang menu, reservasi, atau ingin mengadakan acara spesial? Tim Joss Gandos siap membantu dan melayani Anda dengan sepenuh hati.',
                    'hero_image_url' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                    'address' => 'Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231',
                    'phone' => '(021) 1234-5678',
                    'email' => 'info@jossgandos.com',
                    'hours' => '10:00 - 22:00 WIB (Setiap Hari)',
                    'map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.715058999945!2d112.73278731532677!3d-7.270442994754604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa1a4d1c8b07%3A0xc79190bc5e7be85!2sJl.%20Jetis%20Seraten%2C%20Ketintang%2C%20Kec.%20Gayungan%2C%20Surabaya%2C%20Jawa%20Timur%2060231!5e0!3m2!1sid!2sid!4v1641914256999!5m2!1sid!2sid',
                    'whatsapp_admin_1' => '6289699071599',
                    'whatsapp_admin_1_name' => 'Admin 1',
                    'whatsapp_admin_2' => '6289532682495',
                    'whatsapp_admin_2_name' => 'Admin 2',
                    'delivery_gofood' => 'https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17',
                    'delivery_grabfood' => 'https://food.grab.com/id/en/restaurant/online-delivery/IDGFSTI00002n8d',
                    'facebook_url' => '#',
                    'instagram_url' => '#',
                    'twitter_url' => '#',
                    'linkedin_url' => '#',
                ]
            ]
        );
    }
}