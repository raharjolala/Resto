<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'image_path',
        'caption',
        'description',
        'category',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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

    /**
     * Get formatted date
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    /**
     * Get category label
     */
    public function getCategoryLabelAttribute()
    {
        $labels = [
            'food' => 'Makanan',
            'facility' => 'Fasilitas',
            'event' => 'Acara',
            'interior' => 'Interior'
        ];
        
        return $labels[$this->category] ?? ucfirst($this->category);
    }

    /**
     * Get category icon
     */
    public function getCategoryIconAttribute()
    {
        $icons = [
            'food' => 'utensils',
            'facility' => 'building',
            'event' => 'calendar-alt',
            'interior' => 'store'
        ];
        
        return $icons[$this->category] ?? 'image';
    }
}