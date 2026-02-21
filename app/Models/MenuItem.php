<?php
// app/Models/MenuItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'image',
        'is_available',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }
    
    /**
     * Get the image URL attribute
     */
    public function getImageUrlAttribute()
    {
        // If image is empty or null, return default image
        if (empty($this->image)) {
            return 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';
        }
        
        // If image is already a full URL (starts with http)
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        
        // If image is a filename from storage
        if (file_exists(public_path('storage/menu/' . $this->image))) {
            return asset('storage/menu/' . $this->image);
        }
        
        // If it's a number or invalid, return default
        if (is_numeric($this->image)) {
            return 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';
        }
        
        // Default fallback
        return 'https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80';
    }
}