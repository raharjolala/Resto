<?php
// app/Models/Gallery.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'caption',
        'category',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get all active gallery items
     */
    public static function getActiveItems($limit = null)
    {
        $query = self::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc');
        
        if ($limit) {
            $query->limit($limit);
        }
        
        return $query->get();
    }

    /**
     * Get gallery items by category
     */
    public static function getByCategory($category, $limit = null)
    {
        $query = self::where('is_active', true)
            ->where('category', $category)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc');
        
        if ($limit) {
            $query->limit($limit);
        }
        
        return $query->get();
    }
}