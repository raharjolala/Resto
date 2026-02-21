<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'slug',
        'title',
        'meta_title',
        'meta_description',
        'content',
        'image' // Tambahkan kolom image di sini
    ];

    protected $casts = [
        'content' => 'array'
    ];

    /**
     * Find page by slug
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    /**
     * Update or create page
     */
    public static function updateOrCreatePage($slug, $data)
    {
        return self::updateOrCreate(
            ['slug' => $slug],
            $data
        );
    }
}